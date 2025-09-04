<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\BillingRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillingRols extends Controller
{
     public function createBillingRols()
    {
        return view('dashboard.pages.createbillingrols');
    }

public function storeBillingRols(Request $request)
{
  $data = $request->all();

    // Handle image uploads
    $imagePaths = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $file) {
            $filename = $file->store('uploads/billingroll', 'public');
            $imagePaths[] = $filename;
        }
    }
    $data['images'] = json_encode($imagePaths);
    BillingRol::create($data);

    return response()->json(['status' => 'success']);
}

    

    public function editBillingRols($id)
    {
        // Logic to edit billing roles
        // Fetch the billing role by ID and return the edit view
    }
}
