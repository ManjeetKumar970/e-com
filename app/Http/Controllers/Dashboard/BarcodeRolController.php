<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\BarcodeRol;
use Illuminate\Http\Request;

class BarcodeRolController extends Controller
{
    public function barcodepage()
    {
        return view('dashboard.pages.barcode');
    }
    public function storeBarcodeRols(Request $request)
    {
        $data = $request->all();
        // Handle image uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = $file->store('uploads/barcode', 'public'); // Save to storage/app/public/uploads
                $imagePaths[] = $filename;
            }
        }
        $data['images'] = json_encode($imagePaths);
        BarcodeRol::create($data);

        return response()->json(['status' => 'success']);
    }
}
