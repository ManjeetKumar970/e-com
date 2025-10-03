<!DOCTYPE html>
<html lang="en">
<head>
     @include('partials.head1')
     <link rel="stylesheet" href="{{ asset('css/conifmorder.css')}}">
</head>
<body>
        @include('partials.header')
    <!-- Header Section -->
    <div class="hero-section-pd">
        <div class="checkmark-order">
            <div class="checkmark-icon">✓</div>
        </div>
        <h1>Thank You for Your Order!</h1>
        <div class="order-number">Order #FT-2024-78954</div>
        <div class="confirmation-text">
            Your order has been successfully placed and is being processed. We've sent a<br>
            confirmation email to your.email@example.com with all the details.
        </div>
        <div class="action-buttons">
            <button class="btn btn-primary" onclick="alert('Downloading invoice...')">
                📄 Download Invoice
            </button>
            <button class="btn btn-secondary" onclick="alert('Tracking your order...')">
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
                        <div class="progress-line"></div>
                        <div class="progress-line-active"></div>
                        
                        <div class="progress-step">
                            <div class="step-icon completed">✓</div>
                            <div class="step-label">Order Placed</div>
                            <div class="step-date">Friday, 16:30 AM</div>
                        </div>
                        
                        <div class="progress-step">
                            <div class="step-icon pending">📦</div>
                            <div class="step-label">Processing</div>
                            <div class="step-date">In Progress</div>
                        </div>
                        
                        <div class="progress-step">
                            <div class="step-icon pending">🚚</div>
                            <div class="step-label">Shipped</div>
                            <div class="step-date">Expected Tomorrow</div>
                        </div>
                        
                        <div class="progress-step">
                            <div class="step-icon pending">📍</div>
                            <div class="step-label">Delivered</div>
                            <div class="step-date">Est. 2-3 Days</div>
                        </div>
                    </div>
                </div>

                <div class="content-grid">
                    <div class="items-section">
                        <div class="section-title">Items Ordered (3)</div>
                        
                        <div class="item">
                            <div class="item-details">
                                <h3>TSC Alpha-4 Thermal Printer</h3>
                                <div class="item-specs">Wireless, Cloud Integration</div>
                                <div class="item-specs">Qty: 1</div>
                            </div>
                            <div class="item-price">₹12,999</div>
                        </div>

                        <div class="item">
                            <div class="item-details">
                                <h3>Premium Barcode Labels</h3>
                                <div class="item-specs">Water Resistant, 100mm x 50mm</div>
                                <div class="item-specs">Qty: 5 Rolls</div>
                            </div>
                            <div class="item-price">₹4,495</div>
                        </div>

                        <div class="item">
                            <div class="item-details">
                                <h3>Thermal Paper Roll 80mm</h3>
                                <div class="item-specs">Premium Quality</div>
                                <div class="item-specs">Qty: 2 Packs</div>
                            </div>
                            <div class="item-price">₹2,998</div>
                        </div>
                    </div>

                    <div class="payment-section">
                        <div class="section-title">Payment Summary</div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value">₹20,492</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Discount (SAVE10)</span>
                            <span class="summary-value discount">-₹2,049</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">Delivery Charges</span>
                            <span class="summary-value free">FREE</span>
                        </div>
                        
                        <div class="summary-row">
                            <span class="summary-label">GST (18%)</span>
                            <span class="summary-value">₹3,320</span>
                        </div>
                        
                        <div class="total-row">
                            <span>Total Paid</span>
                            <span>₹21,763</span>
                        </div>

                        <div class="payment-method">
                            <div class="payment-method-label">Payment Method</div>
                            <div class="payment-card">Credit Card ending in 4567</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping & Billing Address -->
            <div class="address-grid">
                <div class="address-card product-card">
                    <div class="address-header">
                        <div class="address-icon">🚚</div>
                        <h3>Shipping Address</h3>
                    </div>
                    <div class="address-content">
                        <p class="address-name">Rajesh Kumar</p>
                        <p>123, MG Road, Koramangala</p>
                        <p>Bangalore, Karnataka - 560034</p>
                        <p>Phone: +91 98765 43210</p>
                    </div>
                </div>

                <div class="address-card product-card">
                    <div class="address-header">
                        <div class="address-icon">💳</div>
                        <h3>Billing Address</h3>
                    </div>
                    <div class="address-content">
                        <p class="address-name">Rajesh Kumar</p>
                        <p>123, MG Road, Koramangala</p>
                        <p>Bangalore, Karnataka - 560034</p>
                        <p>Email: rajesh.kumar@example.com</p>
                    </div>
                </div>
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