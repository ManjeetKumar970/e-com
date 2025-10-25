<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/conifmorder.css') }}">
    @include('partials.head')
</head>

<body>
    @include('partials.header')
    <!-- Header Section -->
    <div class="hero-section-pd">
        <div class="checkmark-order">
            <div class="checkmark-icon">✓</div>
        </div>

        <h1>Thank You for Your Order!</h1>

        <!-- Display first order number dynamically -->
        @php
            $firstOrder = $orderDetails->first();
        @endphp
        <div class="order-number">
            Order #{{ $firstOrder->order_number ?? 'N/A' }}
        </div>

        <!-- Confirmation text with dynamic email -->
        <div class="confirmation-text">
            Your order has been successfully placed and is being processed. We've sent a<br>
            confirmation email to {{ Auth::user()->email ?? ($firstOrder->billing_email ?? 'your.email@example.com') }}
            with all the details.
        </div>

        <div class="action-buttons">
            <button class="btn btn-primary"
                onclick="alert('Downloading invoice for order #{{ $firstOrder->order_number ?? '' }}')">
                📄 Download Invoice
            </button>
            <button class="btn btn-secondary"
                onclick="alert('Tracking your order #{{ $firstOrder->order_number ?? '' }}')">
                📦 Track Order
            </button>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-section-order">
        <div class="container">
            <!-- Order Status Card -->
            <div class="card">
                <div class="status-header">
                    <h2>Order Status</h2>
                    <span class="status-badge">Processing</span>
                </div>

                <div class="progress-container-order">
                    <div class="progress-bar-order">

                        @php
                            $steps = [
                                [
                                    'label' => 'Order Placed',
                                    'icon' => '✓',
                                    'status_key' => 'placed',
                                    'date' => $firstOrder->created_at ?? null,
                                ],
                                [
                                    'label' => 'Processing',
                                    'icon' => '📦',
                                    'status_key' => 'processing',
                                    'date' => $firstOrder->processing_date ?? 'In Progress',
                                ],
                                [
                                    'label' => 'Shipped',
                                    'icon' => '🚚',
                                    'status_key' => 'shipped',
                                    'date' => $firstOrder->shipped_date ?? 'Expected Tomorrow',
                                ],
                                [
                                    'label' => 'Delivered',
                                    'icon' => '📍',
                                    'status_key' => 'delivered',
                                    'date' => $firstOrder->delivered_date ?? 'Est. 2-3 Days',
                                ],
                            ];
                        @endphp

                        @foreach ($steps as $step)
                            @php
                                $completed =
                                    $firstOrder->status ??
                                    ('' === $step['status_key'] ||
                                        (in_array($step['status_key'], ['placed', 'processing', 'shipped']) &&
                                            $firstOrder->status) ??
                                        '' !== 'delivered');
                            @endphp
                            <div class="progress-step">
                                <div class="step-icon {{ $completed ? 'completed' : 'pending' }}">
                                    {{ $step['icon'] }}
                                </div>
                                <div class="step-label">{{ $step['label'] }}</div>
                                <div class="step-date">{{ $step['date'] }}</div>
                            </div>

                            @if (!$loop->last)
                                <div class="progress-line {{ $completed ? 'completed' : '' }}"></div>
                            @endif
                        @endforeach

                    </div>
                </div>


                <div class="content-grid">
                    <div class="items-section">
                        <div class="section-title">Items Ordered
                            ({{ $orderDetails->sum(fn($order) => $order->orderItems->count()) }})</div>

                        @foreach ($orderDetails as $orderdetail)
                            @foreach ($orderdetail->orderItems as $item)
                                <div class="item">
                                    <div class="item-details">
                                        <h3>{{ $item->product_name }}</h3>
                                        <div class="item-specs">{{ $item->product_details }}</div>
                                        <div class="item-specs">Qty: {{ $item->quantity }}</div>
                                    </div>
                                    <div class="item-price">
                                        ₹{{ number_format($item->unit_price * $item->quantity, 2) }}</div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>


                    <div class="payment-section">
                        <div class="section-title">Payment Summary</div>

                        @foreach ($orderDetails as $order)
                            <div class="summary-row">
                                <span class="summary-label">Subtotal</span>
                                <span class="summary-value">₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>

                            @if (!empty($order->discount_code))
                                <div class="summary-row">
                                    <span class="summary-label">Discount ({{ $order->discount_code }})</span>
                                    <span
                                        class="summary-value discount">-₹{{ number_format($order->discount_amount, 2) }}</span>
                                </div>
                            @endif

                            <div class="summary-row">
                                <span class="summary-label">Delivery Charges</span>
                                <span class="summary-value {{ $order->delivery_charges == 0 ? 'free' : '' }}">
                                    {{ $order->delivery_charges == 0 ? 'FREE' : '₹' . number_format($order->delivery_charges, 2) }}
                                </span>
                            </div>

                            <div class="summary-row">
                                <span class="summary-label">GST ({{ $order->gst_rate }}%)</span>
                                <span class="summary-value">₹{{ number_format($order->gst_amount, 2) }}</span>
                            </div>

                            <div class="total-row">
                                <span>Total Paid</span>
                                <span>₹{{ number_format($order->grand_total, 2) }}</span>
                            </div>

                            <div class="payment-method">
                                <div class="payment-method-label">Payment Method</div>
                                <div class="payment-card">
                                    {{ ucfirst($order->payment_method) }}
                                    @if ($order->card_last_digits)
                                        ending in {{ $order->card_last_digits }}
                                    @endif
                                </div>
                            </div>

                            @if (!$loop->last)
                                <hr class="my-3">
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>

            <!-- Shipping & Billing Address -->
            <div class="address-grid">
                @foreach ($orderDetails as $order)
                    <!-- Shipping Address -->
                    <div class="address-card ">
                        <div class="address-header">
                            <div class="address-icon">🚚</div>
                            <h3>Shipping Address</h3>
                        </div>
                        <div class="address-content">
                            <p class="address-name">{{ $order->name }}</p>
                            <p>{{ $order->street_address }}</p>
                            <p>{{ $order->address_line_2 }}</p>
                            <p>{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                            <p>Phone: {{ $order->phone }}</p>
                            @if ($order->email)
                                <p>Email: {{ $order->email }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <div class="address-card">
                        <div class="address-header">
                            <div class="address-icon">💳</div>
                            <h3>Billing Address</h3>
                        </div>
                        <div class="address-content">
                            <p class="address-name">{{ $order->name }}</p>
                            <p>{{ $order->street_address }}</p>
                            <p>{{ $order->address_line_2 }}</p>
                            <p>{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                            <p>Phone: {{ $order->phone }}</p>
                            @if ($order->email)
                                <p>Email: {{ $order->email }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions">
                <h3>Quick Actions</h3>
                <div class="action-grid">
                    <div class="action-card product-card" onclick="alert('View order details...')">
                        <div class="action-icon">👁️</div>
                        <div class="action-label">View Details</div>
                    </div>
                    <div class="action-card product-card" onclick="alert('Downloading invoice...')">
                        <div class="action-icon">📥</div>
                        <div class="action-label">Download Invoice</div>
                    </div>
                    <div class="action-card product-card" onclick="alert('Continue shopping...')">
                        <div class="action-icon">🛍️</div>
                        <div class="action-label">Continue Shopping</div>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="help-section">
                <h3>Need Help With Your Order?</h3>
                <p>Our customer support team is here to assist you 24/7</p>
                <div class="help-buttons">
                    <button class="help-btn" onclick="alert('Opening chat support...')">💬 Chat Support</button>
                    <button class="help-btn" onclick="alert('Calling customer care...')">📞 Call Us</button>
                    <button class="help-btn" onclick="alert('Opening email...')">✉️ Email Us</button>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')

</body>

</html>
