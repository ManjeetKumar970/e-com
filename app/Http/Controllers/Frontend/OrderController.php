<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(CheckoutRequest $request)
    {
        try {
            DB::beginTransaction();

            // Get cart items
            $cartItems = $this->getCartItems();

            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty');
            }

            // Calculate totals
            $calculations = $this->calculateOrderTotals($cartItems, $request->promo_code);

            // Check if COD selected, add extra charges
            if ($request->payment_method === 'cod') {
                $calculations['delivery_charges'] = 50;
                $calculations['grand_total'] += 50;
            }

            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'gst_number' => $request->gst_number,
                'email' => $request->email,
                'phone' => $request->phone,
                'street_address' => $request->street_address,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'state' => $request->state,
                'pin_code' => $request->pin_code,
                'country' => $request->country ?? 'India',
                'same_as_billing' => $request->has('same_as_billing'),
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'subtotal' => $calculations['regularPrice'],
                'discount' => $calculations['discount'],
                'delivery_charges' => $calculations['delivery_charges'],
                'gst_amount' => $calculations['gstAmount'],
                'gst_rate' => $calculations['gstRate'],
                'grand_total' => $calculations['grand_total'],
                'promo_code' => $request->promo_code,
                'order_status' => 'pending',
                'order_date' => now(),
            ]);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_name' => $cartItem->product->name,
                    'product_details' => $cartItem->product->interface_type ?? $cartItem->product->paper_size ?? null,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->product->sale_price,
                    'total_price' => $cartItem->product->sale_price * $cartItem->quantity,
                ]);
            }
             $this->clearCart();

            DB::commit();

            // Redirect based on payment method
            if ($request->payment_method === 'cod') {
                return redirect()->route('orderconfirmations', $order->id)
                    ->with('success', 'Order placed successfully!');
            } else {
                 return redirect()->route('orderconfirmations', $order->id)
                    ->with('success', 'Order placed successfully!');   //her we can add online payment
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function confirmation($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        // Check if user owns this order
        if (Auth::check() && $order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('checkout.confirmation', compact('order'));
    }

    // Helper methods
    private function getCartItems()
    {
        if (Auth::check()) {
            return CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            // For guest users, use session-based cart
            $sessionId = session()->getId();
            return CartItem::with('product')
                ->where('session_id', $sessionId)
                ->get();
        }
    }

    private function calculateOrderTotals($cartItems, $promoCode = null)
    {
        $regularPrice = $cartItems->sum(function ($item) {
            return $item->product->regular_price * $item->quantity;
        });

        $salePrice = $cartItems->sum(function ($item) {
            return $item->product->sale_price * $item->quantity;
        });

        $discount = $regularPrice - $salePrice;

        // Apply promo code discount if provided
        if ($promoCode) {
            // Add your promo code logic here
            // For now, we'll just use the existing discount
        }

        $gstRate = 18; // 18% GST (adjust as needed)
        $gstAmount = ($salePrice * $gstRate) / 100;
        $deliveryCharges = 0; // Free delivery by default
        $grandTotal = $salePrice + $gstAmount + $deliveryCharges;

        return [
            'regularPrice' => $regularPrice,
            'discount' => $discount,
            'gstRate' => $gstRate,
            'gstAmount' => $gstAmount,
            'delivery_charges' => $deliveryCharges,
            'grand_total' => $grandTotal,
        ];
    }

    private function clearCart()
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            $sessionId = session()->getId();
            CartItem::where('session_id', $sessionId)->delete();
        }
    }



  public function orderConfirmationById($orderId)
    {
        $order = Order::with('orderItems')->find($orderId);

        if (!$order) {
            return redirect()->route('index')->with('error', 'Order not found.');
        }

        // Check if the logged-in user owns this order
        if ($order->user_id != Auth::id()) {
            return redirect()->route('index')->with('error', 'Unauthorized access.');
        }

        return view('orderconfirmation', ['orderDetails' => collect([$order])]);
    }

   }

