<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'street_address' => 'required|string|max:500',
            'address_line_2' => 'nullable|string|max:500',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'pin_code' => 'required|string|size:6',
            'country' => 'required|string|max:255',
            'same_as_billing' => 'nullable|boolean',
            'payment_method' => 'required|in:card,netbanking,upi,cod',
            'promo_code' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Phone number is required',
            'street_address.required' => 'Street address is required',
            'address_line_2' => 'Street address is required',
            'city.required' => 'City is required',
            'state.required' => 'State is required',
            'pin_code.required' => 'PIN code is required',
            'pin_code.size' => 'PIN code must be 6 digits',
            'country.required' => 'Country is required',
            'payment_method.required' => 'Please select a payment method',
            'payment_method.in' => 'Invalid payment method selected',
        ];
    }
    protected function prepareForValidation()
    {
        // Clean phone number
        if ($this->has('phone')) {
            $phone = preg_replace('/[^0-9]/', '', $this->phone);
            $this->merge(['phone' => $phone]);
        }

        // Clean PIN code
        if ($this->has('pin_code')) {
            $pinCode = preg_replace('/[^0-9]/', '', $this->pin_code);
            $this->merge(['pin_code' => $pinCode]);
        }

        // Clean GST number
        if ($this->has('gst_number')) {
            $gstNumber = strtoupper(trim($this->gst_number));
            $this->merge(['gst_number' => $gstNumber]);
        }
    }
}