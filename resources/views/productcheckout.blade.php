<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 15px;
        }
        .express-checkout {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .express-checkout h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .payment-btn-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .payment-btn {
            flex: 1;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 500;
        }
        .payment-btn:hover {
            border-color: #5469d4;
            background: #f8f9ff;
        }
        .payment-btn.active {
            border-color: #5469d4;
            background: #f8f9ff;
        }
        .divider {
            text-align: center;
            color: #999;
            margin: 25px 0;
            position: relative;
        }
        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #e0e0e0;
        }
        .divider::before {
            left: 0;
        }
        .divider::after {
            right: 0;
        }
        .billing-section {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .billing-section h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 500;
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #5469d4;
            box-shadow: 0 0 0 0.2rem rgba(84, 105, 212, 0.15);
        }
        .payment-method-card {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .payment-method-card:hover {
            border-color: #5469d4;
            background: #f8f9ff;
        }
        .payment-method-card.active {
            border-color: #5469d4;
            background: #f8f9ff;
        }
        .payment-method-card input[type="radio"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .payment-icons {
            display: flex;
            gap: 8px;
            margin-left: auto;
        }
        .payment-icons span {
            padding: 4px 8px;
            background: #f5f5f5;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            color: #666;
        }
        .order-summary {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: sticky;
            top: 20px;
        }
        .order-summary h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
        }
        .product-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
        }
        .product-item:last-of-type {
            border-bottom: none;
        }
        .product-details h5 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .product-details p {
            font-size: 12px;
            color: #666;
            margin: 0;
        }
        .product-price {
            margin-left: auto;
            font-weight: 600;
            font-size: 14px;
        }
        .promo-section {
            display: flex;
            gap: 10px;
            margin: 20px 0;
        }
        .promo-section input {
            flex: 1;
        }
        .btn-apply {
            background: #5469d4;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            white-space: nowrap;
        }
        .order-totals {
            margin: 25px 0;
        }
        .order-totals .row {
            margin-bottom: 12px;
            font-size: 14px;
        }
        .order-totals .total-amount {
            font-size: 20px;
            font-weight: 700;
            padding-top: 15px;
            border-top: 2px solid #e0e0e0;
            margin-top: 15px;
        }
        .discount-amount {
            color: #28a745;
        }
        .btn-place-order {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 20px;
            transition: transform 0.2s;
        }
        .btn-place-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        .trust-badges {
            display: flex;
            justify-content: space-around;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #f0f0f0;
        }
        .trust-badge {
            text-align: center;
            font-size: 11px;
        }
        .trust-badge i {
            font-size: 24px;
            margin-bottom: 8px;
            display: block;
        }
        .trust-badge .fa-lock { color: #FFD700; }
        .trust-badge .fa-shield-halved { color: #FFD700; }
        .trust-badge .fa-check-circle { color: #28a745; }
        .features-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #f0f0f0;
        }
        .feature-item {
            display: flex;
            gap: 10px;
            font-size: 12px;
        }
        .feature-item i {
            color: #5469d4;
            font-size: 20px;
        }
        .feature-item div h6 {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 3px;
        }
        .feature-item div p {
            margin: 0;
            color: #666;
            font-size: 11px;
        }
        @media (max-width: 991px) {
            .order-summary {
                position: static;
                margin-top: 30px;
            }
        }
        @media (max-width: 768px) {
            .payment-btn-group {
                flex-direction: column;
            }
            .features-section {
                grid-template-columns: 1fr;
            }
        }


        .progress-container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .step-wrapper {
            display: flex;
            align-items: center;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 20px;
            color: white;
            transition: all 0.3s ease;
        }

        .step-circle.complete {
            background-color: #28a745;
        }

        .step-circle.active {
            background-color: #007bff;
        }

        .step-circle.upcoming {
            background-color: #6c757d;
        }

        .step-label {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        .step-label.complete,
        .step-label.active {
            color: #212529;
        }

        .step-label.upcoming {
            color: #6c757d;
        }

        .step-line {
            width: 100px;
            height: 3px;
            margin: 0 20px;
            position: relative;
            top: -20px;
        }

        .step-line.complete {
            background-color: #28a745;
        }

        .step-line.upcoming {
            background-color: #dee2e6;
        }

        @media (max-width: 576px) {
            .step-line {
                width: 50px;
                margin: 0 10px;
            }
            
            .step-circle {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .step-label {
                font-size: 12px;
            }
            }
    </style>
</head>
<body>
    @include('partials.header')

     <div class="container">
        <div class="progress-container">
            <div class="step-wrapper">
                <!-- Step 1: Cart -->
                <div class="step">
                    <div class="step-circle complete">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="step-label complete">Cart</div>
                </div>

                <!-- Line 1 -->
                <div class="step-line complete"></div>

                <!-- Step 2: Checkout -->
                <div class="step">
                    <div class="step-circle active">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="step-label active">Checkout</div>
                </div>

                <!-- Line 2 -->
                <div class="step-line upcoming"></div>

                <!-- Step 3: Confirmation -->
                <div class="step">
                    <div class="step-circle upcoming">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="step-label upcoming">Confirmation</div>
                </div>
            </div>
        </div>
    </div>


    <div class="checkout-container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Express Checkout -->
                <div class="express-checkout">
                    <h2>Express Checkout</h2>
                    <div class="payment-btn-group">
                        <button class="payment-btn">
                            <i class="fab fa-google"></i> G Pay
                        </button>
                        <button class="payment-btn">
                            <i class="fas fa-mobile-alt"></i> PhonePe
                        </button>
                        <button class="payment-btn">
                            <i class="fas fa-wallet"></i> Paytm
                        </button>
                    </div>
                    <div class="divider">OR CONTINUE WITH</div>
                </div>

                <!-- Billing Information -->
                <div class="billing-section">
                    <h3>Billing Information</h3>
                    <form id="checkoutForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">GST Number (Optional)</label>
                            <input type="text" class="form-control" placeholder="Enter GST number">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="your.email@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" placeholder="+91 98765 43210" required>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Shipping Address -->
                <div class="billing-section">
                    <h3>Shipping Address</h3>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="sameAddress">
                        <label class="form-check-label" for="sameAddress">
                            Same as billing address
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Street Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="House no, Building, Street" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter city" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option selected disabled>Select State</option>
                                <option>Karnataka</option>
                                <option>Maharashtra</option>
                                <option>Tamil Nadu</option>
                                <option>Delhi</option>
                                <option>Gujarat</option>
                                <option>Rajasthan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">PIN Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="6-digit PIN" maxlength="6" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Country <span class="text-danger">*</span></label>
                            <select class="form-select" required>
                                <option selected>India</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="billing-section">
                    <h3>Payment Method</h3>
                    <div class="payment-method-card active" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <input type="radio" name="payment" id="card" checked>
                            <div class="ms-3">
                                <label for="card" class="mb-0 fw-semibold">Credit/Debit Card</label>
                                <div class="text-muted small">Pay securely with your card</div>
                            </div>
                            <div class="payment-icons">
                                <span>VISA</span>
                                <span>MC</span>
                                <span>RuPay</span>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method-card" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <input type="radio" name="payment" id="netbanking">
                            <div class="ms-3">
                                <label for="netbanking" class="mb-0 fw-semibold">Net Banking</label>
                                <div class="text-muted small">All major banks supported</div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method-card" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <input type="radio" name="payment" id="upi">
                            <div class="ms-3">
                                <label for="upi" class="mb-0 fw-semibold">UPI</label>
                                <div class="text-muted small">Google Pay, PhonePe, Paytm & more</div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method-card" onclick="selectPayment(this)">
                        <div class="d-flex align-items-center">
                            <input type="radio" name="payment" id="cod">
                            <div class="ms-3">
                                <label for="cod" class="mb-0 fw-semibold">Cash on Delivery</label>
                                <div class="text-muted small">Pay when you receive (₹50 extra charges)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="col-lg-5">
    <div class="order-summary">
        <h3>Order Summary</h3>

        {{-- Loop through Cart Items --}}
        @forelse ($cartItems as $cartItem)
            <div class="product-item d-flex justify-content-between align-items-start mb-3">
                <div class="product-details">
                    <h5>{{ $cartItem->product->name }}</h5>
                    <p>{{ $cartItem->product->interface_type ?? $cartItem->product->paper_size }}</p>
                    <p>Qty: {{ $cartItem->quantity }}</p>
                </div>
                <div class="product-price text-end">
                    ₹{{ number_format($cartItem->product->sale_price * $cartItem->quantity, 2) }}
                </div>
            </div>
        @empty
            <p class="text-muted">Your cart is empty.</p>
        @endforelse

        {{-- Promo Code --}}
        <div class="promo-section mt-3">
            <input type="text" class="form-control mb-2" placeholder="Enter promo code">
            <button class="btn-apply">Apply</button>
        </div>

        {{-- Order Totals --}}
        <div class="order-totals mt-4">
            <div class="row">
                <div class="col">Subtotal</div>
                <div class="col text-end">₹{{ number_format($regularPrice, 2) }}</div>
            </div>
            <div class="row">
                <div class="col">Discount</div>
                <div class="col text-end text-success">-₹{{ number_format($discount, 2) }}</div>
            </div>
            <div class="row">
                <div class="col">Delivery Charges</div>
                <div class="col text-end text-success fw-semibold">FREE</div>
            </div>
            <div class="row">
                <div class="col">GST ({{ $gstRate }}%)</div>
                <div class="col text-end">₹{{ number_format($gstAmount, 2) }}</div>
            </div>
            <hr>
            <div class="row total-amount fw-bold">
                <div class="col">Total Amount</div>
                <div class="col text-end">₹{{ number_format($grandTotal, 2) }}</div>
            </div>
        </div>

        {{-- Place Order Button --}}
        <button class="btn-place-order mt-3 w-100" onclick="placeOrder()">
            Place Order • ₹{{ number_format($grandTotal, 2) }}
        </button>

        {{-- Trust Badges --}}
        <div class="trust-badges mt-4 d-flex justify-content-between">
            <div class="trust-badge text-center">
                <i class="fas fa-lock"></i>
                <div>Secure Payment</div>
            </div>
            <div class="trust-badge text-center">
                <i class="fas fa-shield-halved"></i>
                <div>SSL Encrypted</div>
            </div>
            <div class="trust-badge text-center">
                <i class="fas fa-check-circle"></i>
                <div>100% Safe</div>
            </div>
        </div>

        {{-- Extra Features --}}
        <div class="features-section mt-4">
            <div class="feature-item d-flex align-items-center mb-2">
                <i class="fas fa-truck me-2"></i>
                <div>
                    <h6>Free Delivery</h6>
                    <p>On orders above ₹999</p>
                </div>
            </div>
            <div class="feature-item d-flex align-items-center mb-2">
                <i class="fas fa-undo me-2"></i>
                <div>
                    <h6>Easy Returns</h6>
                    <p>7 day return policy</p>
                </div>
            </div>
            <div class="feature-item d-flex align-items-center mb-2">
                <i class="fas fa-file-invoice me-2"></i>
                <div>
                    <h6>GST Invoice</h6>
                    <p>Business ready billing</p>
                </div>
            </div>
            <div class="feature-item d-flex align-items-center">
                <i class="fas fa-headset me-2"></i>
                <div>
                    <h6>24/7 Support</h6>
                    <p>Dedicated customer care</p>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

    @include('partials.footer')
</body>
</html>