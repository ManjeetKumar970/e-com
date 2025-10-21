<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
   public function store(Request $request)
{
    $validated = $request->validate([
        'firstName' => 'required|string|max:100',
        'lastName'  => 'required|string|max:100',
        'email'     => 'required|email|max:150',
        'phone'     => 'nullable|string|max:20',
        'company'   => 'nullable|string|max:150',
        'subject'   => 'required|string|max:150',
        'message'   => 'required|string',
        'newsletter'=> 'nullable|boolean',
    ]);

    $validated['newsletter'] = $request->has('newsletter');

    ContactMessage::create($validated);
    return redirect()->back()->with('success', 'Your query has been received. We’ll get back to you soon!');
}

}
