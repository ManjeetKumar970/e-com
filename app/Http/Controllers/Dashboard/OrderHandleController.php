<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OrderHandleController extends Controller
{
    public function orderview()
    {
        $orders = Order::with(['orderItems', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('dashboard.pages.order', compact('orders'));
    }

    public function getOrderDetails($id)
    {
        $order = Order::with(['items', 'user'])->findOrFail($id);
        
        return response()->json([
            'order_number' => $order->order_number,
            'order_date' => $order->created_at->format('M d, Y'),
            'first_name' => $order->first_name,
            'email' => $order->email,
            'phone' => $order->phone,
            'payment_method' => ucfirst($order->payment_method),
            'shipping_address' => $order->shipping_address,
            'subtotal' => number_format($order->subtotal, 2),
            'tracking_number' => $order->tracking_number,
            'courier_service' => $order->courier_service,
            'items' => $order->items->map(function($item) {
                return [
                    'name' => $item->product_name,
                    'quantity' => $item->quantity,
                    'price' => number_format($item->subtotal, 2)
                ];
            })
        ]);
    }


  public function updateOrder(Request $request)
{
    // Add this to see what data is coming in
    Log::info('Update Order Request:', $request->all());

    $validated = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'status' => 'required|in:pending,processing,shipped,delivered,cancelled,refunded',
        'notes' => 'nullable|string',
        'tracking_number' => 'nullable|string|max:255',
        'courier_name' => 'nullable|string|max:255',
        'bill_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'estimated_delivery' => 'nullable|date|after:today'
    ]);

    DB::beginTransaction();

    try {
        $order = Order::findOrFail($request->order_id);
        
        // Log current order state
        Log::info('Current Order Status:', ['id' => $order->id, 'status' => $order->order_status]);
        
        // Update status
        $order->order_status = $request->status;

        // Update notes
        if ($request->filled('notes')) {
            $order->notes = $request->notes;
        }

        // Handle shipping-related fields
        if (in_array($request->status, ['shipped', 'delivered'])) {
            
            if ($request->filled('tracking_number')) {
                $order->tracking_number = $request->tracking_number;
            }

            if ($request->filled('courier_name')) {
                $order->courier_name = $request->courier_name;
            }

            if ($request->filled('estimated_delivery')) {
                $order->estimated_delivery = $request->estimated_delivery;
            }

            // Handle file upload
            if ($request->hasFile('bill_document')) {
                // Delete old document
                if ($order->bill_document && Storage::disk('public')->exists($order->bill_document)) {
                    Storage::disk('public')->delete($order->bill_document);
                }

                $file = $request->file('bill_document');
                $filename = 'bill_' . $order->order_number . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('order_documents', $filename, 'public');
                $order->bill_document = $path;
            }

            // Set shipped date
            if ($request->status === 'shipped' && !$order->shipped_date) {
                $order->shipped_date = now();
            }

            // Set delivered date
            if ($request->status === 'delivered' && !$order->delivered_date) {
                $order->delivered_date = now();
            }
        }

        // Save the order
        $saved = $order->save();
        
        Log::info('Order Save Result:', ['saved' => $saved, 'new_status' => $order->order_status]);

        // Create order history
        OrderHistory::create([
            'order_id' => $order->id,
            'status' => $request->status,
            'notes' => $request->notes,
            'updated_by' => Auth::id(),
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Order updated successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Order Update Failed:', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect()->back()->with('error', 'Failed to update order: ' . $e->getMessage());
    }
}
/**
     * Track order page
     */
    public function trackOrder($trackingId)
    {
        $order = Order::where('tracking_id', $trackingId)
            ->with(['items', 'history'])
            ->firstOrFail();
        
        return view('dashboard.pages.order-track', compact('order'));
    }

    /**
     * Download bill document
     */
        public function downloadBill($id)
    {
        $order = Order::findOrFail($id);
        
        if (!$order->bill_document) {
            abort(404, 'Bill document not found');
        }
        
        return Storage::disk('public')->download($order->bill_document);
    }


    /**
     * Cancel order
     */
    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        
        if (in_array($order->status, ['delivered', 'cancelled'])) {
            return redirect()->back()->with('error', 'Cannot cancel this order');
        }
        
        $order->update(['status' => 'cancelled']);
        
        OrderHistory::create([
            'order_id' => $order->id,
            'status' => 'cancelled',
            'notes' => 'Order cancelled by admin',
            'updated_by' => Auth::id()
        ]);
        
        return redirect()->back()->with('success', 'Order cancelled successfully');
    }

    /**
     * Get order statistics
     */
    public function getOrderStats()
    {
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'processing_orders' => Order::whereIn('status', ['confirmed', 'processing'])->count(),
            'shipped_orders' => Order::where('status', 'shipped')->count(),
            'delivered_orders' => Order::where('status', 'delivered')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
            'total_revenue' => Order::where('status', 'delivered')->sum('total_amount'),
            'pending_revenue' => Order::whereIn('status', ['pending', 'confirmed', 'processing', 'shipped'])->sum('total_amount'),
        ];
        
        return response()->json($stats);
    }
}
