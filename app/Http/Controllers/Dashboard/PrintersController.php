<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PrintersController extends Controller
{
    public function billingPrinter()
    {
        return view('dashboard.pages.billingprinter');
    }

    public function storePrinter(Request $request)
    {
        $data = $request->all();

        // Handle image uploads
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = $file->store('uploads/printers', 'public'); // Save to storage/app/public/uploads
                $imagePaths[] = $filename;
            }
        }
        $data['images'] = json_encode($imagePaths);
        Printer::create($data);

        return response()->json(['status' => 'success']);
    }
}
