<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <style>
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f5f5f5;
            border-radius: 25px;
            padding: 5px;
        }

        .qty-btn {
            background: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .qty-input {
            font-weight: 600;
            width: 100px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            height: 38px;
            min-width: 30px;
        }
    </style>
</head>

<body>
    @include('partials.header')

    <div class="container">
        <div class="progress-container">
            <div class="step-wrapper">
                <div class="step">
                    <div class="step-circle complete">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="step-label complete">Cart</div>
                </div>
                <div class="step-line complete"></div>
                <div class="step">
                    <div class="step-circle active">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="step-label active">Checkout</div>
                </div>
                <div class="step-line upcoming"></div>
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
        <form id="checkoutForm" method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="express-checkout">
                        <h2>Express Checkout</h2>
                        <div class="payment-btn-group">
                            <button type="button" class="payment-btn">
                                <i class="fab fa-google"></i> G Pay
                            </button>
                            <button type="button" class="payment-btn">
                                <i class="fas fa-mobile-alt"></i> PhonePe
                            </button>
                            <button type="button" class="payment-btn">
                                <i class="fas fa-wallet"></i> Paytm
                            </button>
                        </div>
                        <div class="divider">OR CONTINUE WITH</div>
                    </div>

                    <div class="billing-section">
                        <h3>Billing Information</h3>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="first_name"
                                    placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="last_name"
                                    placeholder="Enter last name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Company Name (Optional)</label>
                            <input type="text" class="form-control" name="company_name"
                                placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">GST Number (Optional)</label>
                            <input type="text" class="form-control" name="gst_number" placeholder="Enter GST number">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="your.email@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="+91 98765 43210"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="billing-section">
                        <h3>Shipping Address</h3>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="sameAddress" name="same_as_billing"
                                disabled>
                            <label class="form-check-label" for="sameAddress">
                                Same as billing address
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Street Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="street_address"
                                placeholder="House no, Building, Street" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address Line 2</label>
                            <input type="text" class="form-control" name="address_line_2"
                                placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="city" placeholder="Enter city"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                <select class="form-select" name="state" required>
                                    <option value="" selected disabled>Select State</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">PIN Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pin_code" placeholder="6-digit PIN"
                                    maxlength="6" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                <select class="form-select" name="country" required>
                                    <option value="India" selected>India</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="billing-section">
                        <h3>Payment Method</h3>
                        <div class="payment-method-card active" onclick="selectPayment(this)">
                            <div class="d-flex align-items-center">
                                <input type="radio" name="payment_method" id="card" value="card" checked>
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
                                <input type="radio" name="payment_method" id="netbanking" value="netbanking">
                                <div class="ms-3">
                                    <label for="netbanking" class="mb-0 fw-semibold">Net Banking</label>
                                    <div class="text-muted small">All major banks supported</div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method-card" onclick="selectPayment(this)">
                            <div class="d-flex align-items-center">
                                <input type="radio" name="payment_method" id="upi" value="upi">
                                <div class="ms-3">
                                    <label for="upi" class="mb-0 fw-semibold">UPI</label>
                                    <div class="text-muted small">Google Pay, PhonePe, Paytm & more</div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method-card" onclick="selectPayment(this)">
                            <div class="d-flex align-items-center">
                                <input type="radio" name="payment_method" id="cod" value="cod">
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

                        @forelse ($cartItems as $cartItem)
                            <div class="product-item">
                                <div class="product-details">
                                    <h5>{{ $cartItem->product->name }}</h5>
                                    <p>{{ $cartItem->product->interface_type ?? $cartItem->product->paper_size }}</p>
                                    <div class="container">
                                        <div class="quantity-control" data-product-id="{{ $cartItem->product->id }}">
                                            <button type="button" class="qty-btn decrease">-</button>
                                            <input type="number" class="qty-input" min="1"
                                                value="{{ $cartItem->quantity }}">
                                            <button type="button" class="qty-btn increase">+</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="product-price">
                                    ₹{{ number_format($cartItem->product->sale_price * $cartItem->quantity, 2) }}
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Your cart is empty.</p>
                        @endforelse

                        <div class="promo-section">
                            <input type="text" class="form-control" name="promo_code" id="promoCode"
                                placeholder="Enter promo code">
                            <button type="button" class="btn-apply" onclick="applyPromo()">Apply</button>
                        </div>

                        <div class="order-totals">
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
                            <div class="row total-amount">
                                <div class="col">Total Amount</div>
                                <div class="col text-end">₹{{ number_format($grandTotal, 2) }}</div>
                            </div>
                        </div>

                        <button type="submit" class="btn-place-order">
                            Place Order • ₹{{ number_format($grandTotal, 2) }}
                        </button>

                        <div class="trust-badges">
                            <div class="trust-badge">
                                <i class="fas fa-lock"></i>
                                <div>Secure Payment</div>
                            </div>
                            <div class="trust-badge">
                                <i class="fas fa-shield-halved"></i>
                                <div>SSL Encrypted</div>
                            </div>
                            <div class="trust-badge">
                                <i class="fas fa-check-circle"></i>
                                <div>100% Safe</div>
                            </div>
                        </div>

                        <div class="features-section">
                            <div class="feature-item">
                                <i class="fas fa-truck"></i>
                                <div>
                                    <h6>Free Delivery</h6>
                                    <p>On orders above ₹999</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-undo"></i>
                                <div>
                                    <h6>Easy Returns</h6>
                                    <p>7 day return policy</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-file-invoice"></i>
                                <div>
                                    <h6>GST Invoice</h6>
                                    <p>Business ready billing</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-headset"></i>
                                <div>
                                    <h6>24/7 Support</h6>
                                    <p>Dedicated customer care</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('partials.footer')

    <script>
        function selectPayment(card) {
            const allCards = document.querySelectorAll('.payment-method-card');
            allCards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            const radio = card.querySelector('input[type="radio"]');
            radio.checked = true;
        }

        function applyPromo() {
            const promoCode = document.getElementById('promoCode').value.trim();
            if (promoCode) {
                // You can add AJAX call here to validate promo code
                alert('Promo code will be applied at checkout');
            } else {
                alert('Please enter a promo code');
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = '{{ csrf_token() }}';

            document.querySelectorAll('.quantity-control').forEach(control => {
                const productId = control.dataset.productId;
                const input = control.querySelector('.qty-input');
                const decreaseBtn = control.querySelector('.decrease');
                const increaseBtn = control.querySelector('.increase');

                // Handle increase
                increaseBtn.addEventListener('click', () => {
                    input.value = parseInt(input.value) + 1;
                    updateCart(productId, input.value);
                });

                // Handle decrease
                decreaseBtn.addEventListener('click', () => {
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        updateCart(productId, input.value);
                    }
                });

                // Handle manual typing
                input.addEventListener('change', () => {
                    const newQty = parseInt(input.value);
                    if (newQty >= 1) {
                        updateCart(productId, newQty);
                    } else {
                        input.value = 1;
                    }
                });
            });

            function updateCart(productId, quantity) {
                fetch('{{ route('cart.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: quantity
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Cart updated');
                            // Optional: Reload totals dynamically
                            location.reload();
                        } else {
                            alert(data.message || 'Error updating cart');
                        }
                    })
                    .catch(err => console.error('Error:', err));
            }
        });
    </script>

</body>

</html>
