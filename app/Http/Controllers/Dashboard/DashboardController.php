<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function adminDashboard()
{
    // Count orders
    $totalOrders = Order::withTrashed()->count();
    $pendingOrders = Order::where('order_status', 'pending')->count();
    $shippedOrders = Order::where('order_status', 'shipped')->count();
    $deliveredOrders = Order::where('order_status', 'delivered')->count();

    // Total sales (only delivered orders)
    $totalSales = Order::where('order_status', 'delivered')->sum('grand_total');

    return view('dashboard.admindashboard', compact(
        'totalOrders', 
        'pendingOrders', 
        'shippedOrders', 
        'deliveredOrders',
        'totalSales'
    ));
}

public function logout(Request $request){
     Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('index')->with('message', 'Logged out successfully');      
}

}
