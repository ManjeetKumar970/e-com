<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customebarcod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customebarcods extends Controller
{
        public function store(Request $request)
    {
        $user_id = Auth::id();


        // dd($request->all());

        $validated = $request->validate([
            'unitSystem' => 'nullable|string',
            'width' => 'required|integer',
            'length' => 'required|integer',
            'quantity' => 'required|integer',
            'material' => 'nullable|string',
            'adhesive' => 'nullable|string',
            'barcodeType' => 'nullable|string',
            'options' => 'nullable|array',
            'totalPrice' => 'nullable|string',
        ]);
        if ($user_id) {
            $validated['user_id'] = $user_id;
        }
        $barcodeOrder = Customebarcod::create($validated);
        return response()->json([
            'message' => 'Barcode order created successfully!',
            'data' => $barcodeOrder,
        ]);
    }


    public function show($id)
    {
        $order = Customebarcod::findOrFail($id);
        return response()->json($order);
    }

    // Delete an order
    public function destroy($id)
    {
        Customebarcod::findOrFail($id)->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}