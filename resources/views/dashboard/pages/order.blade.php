<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<style>
    .order-status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .status-pending { background: #fff3cd; color: #856404; }
    .status-confirmed { background: #cfe2ff; color: #084298; }
    .status-processing { background: #cff4fc; color: #055160; }
    .status-shipped { background: #d1e7dd; color: #0f5132; }
    .status-delivered { background: #d1e7dd; color: #0a3622; }
    .status-cancelled { background: #f8d7da; color: #842029; }
    
    .main-container {
        padding: 20px;
        margin-left: 260px;
        margin-top: 70px;
    }
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    
    .order-table {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .order-table table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .order-table th {
        background: #f8f9fa;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }
    
    .order-table td {
        padding: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .order-table tr:hover {
        background: #f8f9fa;
    }
    
    .action-btn {
        padding: 6px 12px;
        margin: 0 3px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 13px;
        transition: all 0.3s;
    }
    
    .btn-view {
        background: #0d6efd;
        color: white;
    }
    
    .btn-update {
        background: #198754;
        color: white;
    }
    
    .btn-track {
        background: #fd7e14;
        color: white;
    }
    
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 9999;
    }
    
    .modal-content {
        background: white;
        margin: 50px auto;
        padding: 30px;
        width: 90%;
        max-width: 600px;
        border-radius: 10px;
        max-height: 85vh;
        overflow-y: auto;
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .close-modal {
        font-size: 28px;
        cursor: pointer;
        color: #666;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
    }
    
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }
    
    .delivery-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
        display: none;
    }
    
    .delivery-section.active {
        display: block;
    }
    
    .btn-submit {
        background: #198754;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        width: 100%;
        margin-top: 15px;
    }
    
    .btn-submit:hover {
        background: #157347;
    }
    
    .order-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .detail-item {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    
    .detail-label {
        font-size: 12px;
        color: #666;
        margin-bottom: 5px;
    }
    
    .detail-value {
        font-weight: 600;
        color: #333;
    }
</style>

<body>
    <!-- loader -->
    @include('../dashboard.partials.loader')
    <!-- header -->
    @include('dashboard.header.header')
    <!-- right-sidebar -->
    @include('../dashboard.partials.sidebar')
    <!-- end right-sidebar -->
    <!-- left-side-bar -->
    @include('../dashboard.partials.leftsidebar')

    <div class="main-container" >
    <div class="container">
        <div class="page-header">
            <h1>Order Management</h1>
            <div>
                <select id="statusFilter" style="padding: 8px 15px; border-radius: 5px; border: 1px solid #ddd;">
                    <option value="">All Orders</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>

        <div class="order-table">
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Order Status</th>
                        <th>Payment</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    @forelse($orders ?? [] as $order)
                    <tr data-status="{{ $order->order_status }}">
                        <td><strong>#{{ $order->order_number }}</strong></td>
                        <td>
                            <div>{{ $order->name }}</div>
                            <small style="color: #666;">{{ $order->email }}</small>
                        </td>
                        <td>{{ date('M d, Y', strtotime($order->created_at)) }}</td>
                        <td><strong>${{ number_format($order->subtotal, 2) }}</strong></td>
                        <td>
                            <span class="order-status-badge status-{{ $order->order_status }}">
                                {{ ucfirst($order->order_status) }}
                            </span>
                        </td>
                        <td>{{ ucfirst($order->payment_status) }}</td>
                        <td>
                            <button class="action-btn btn-view" onclick="viewOrder({{ $order->id }})">
                                View
                            </button>
                            <button class="action-btn btn-update" onclick="updateOrder({{ $order->id }})">
                                Update
                            </button>
                            @if($order->tracking_id)
                            <button class="action-btn btn-track" onclick="trackOrder('{{ $order->tracking_id }}')">
                                Track
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #666;">
                            No orders found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Order Modal -->
    <div id="viewOrderModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Order Details</h2>
                <span class="close-modal" onclick="closeModal('viewOrderModal')">&times;</span>
            </div>
            <div id="orderDetailsContent">
                <!-- Order details will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Update Order Modal -->
    <div id="updateOrderModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Order Status</h2>
                <span class="close-modal" onclick="closeModal('updateOrderModal')">&times;</span>
            </div>
            <form action="{{ route('order.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" id="updateOrderId">
                
                <div class="form-group">
                    <label>Order Status *</label>
                    <select name="status" id="orderStatus" required onchange="toggleDeliverySection()">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Order Notes</label>
                    <textarea name="notes" placeholder="Add any notes about this order update..."></textarea>
                </div>

                <!-- Delivery Details Section (Shows when status is Shipped/Delivered) -->
                <div id="deliverySection" class="delivery-section">
                    <h3 style="margin-bottom: 15px; color: #198754;">Delivery Information</h3>
                    
                    <div class="form-group">
                        <label>Tracking ID *</label>
                        <input type="text" name="tracking_number" placeholder="Enter tracking number">
                    </div>

                    <div class="form-group">
                        <label>Courier Service *</label>
                        <input type="text" name="courier_name" placeholder="e.g., FedEx, DHL, UPS">
                    </div>

                    <div class="form-group">
                        <label>Upload Bill/Invoice</label>
                        <input type="file" name="bill_document" accept=".pdf,.jpg,.jpeg,.png">
                        <small style="color: #666; display: block; margin-top: 5px;">
                            Accepted formats: PDF, JPG, PNG (Max 5MB)
                        </small>
                    </div>

                    <div class="form-group">
                        <label>Estimated Delivery Date</label>
                        <input type="date" name="estimated_delivery" min="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <button type="submit" class="btn-submit">Update Order</button>
            </form>
        </div>
    </div>
    </div>
    @include('dashboard.partials.messagemode')
    <!-- js -->
    
    {{-- @include('dashboard.footer.footer') --}}

    <script>
        // Filter orders by status
        document.getElementById('statusFilter').addEventListener('change', function() {
            const status = this.value.toLowerCase();
            const rows = document.querySelectorAll('#orderTableBody tr');
            
            rows.forEach(row => {
                if (!status || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // View order details
        function viewOrder(orderId) {
            fetch(`/order/${orderId}/details`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('orderDetailsContent').innerHTML = `
                        <div class="order-details-grid">
                            <div class="detail-item">
                                <div class="detail-label">Order Number</div>
                                <div class="detail-value">#${data.order_number}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Order Date</div>
                                <div class="detail-value">${data.order_date}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Customer Name</div>
                                <div class="detail-value">${data.customer_name}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Email</div>
                                <div class="detail-value">${data.customer_email}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Phone</div>
                                <div class="detail-value">${data.customer_phone}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Payment Method</div>
                                <div class="detail-value">${data.payment_method}</div>
                            </div>
                        </div>
                        
                        <h3 style="margin: 20px 0 15px;">Shipping Address</h3>
                        <div style="background: #f8f9fa; padding: 15px; border-radius: 5px;">
                            ${data.shipping_address}
                        </div>

                        <h3 style="margin: 20px 0 15px;">Order Items</h3>
                        <table style="width: 100%;">
                            ${data.items.map(item => `
                                <tr>
                                    <td>${item.name}</td>
                                    <td>Qty: ${item.quantity}</td>
                                    <td style="text-align: right;">$${item.price}</td>
                                </tr>
                            `).join('')}
                            <tr style="border-top: 2px solid #dee2e6; font-weight: 600;">
                                <td colspan="2">Total</td>
                                <td style="text-align: right;">$${data.total_amount}</td>
                            </tr>
                        </table>

                        ${data.tracking_id ? `
                            <h3 style="margin: 20px 0 15px;">Tracking Information</h3>
                            <div style="background: #d1e7dd; padding: 15px; border-radius: 5px;">
                                <strong>Tracking ID:</strong> ${data.tracking_id}<br>
                                <strong>Courier:</strong> ${data.courier_service}
                            </div>
                        ` : ''}
                    `;
                    document.getElementById('viewOrderModal').style.display = 'block';
                })
                .catch(error => console.error('Error:', error));
        }

        // Update order
        function updateOrder(orderId) {
            document.getElementById('updateOrderId').value = orderId;
            document.getElementById('updateOrderModal').style.display = 'block';
        }

        // Track order
        function trackOrder(trackingId) {
            // Redirect to tracking page or open tracking modal
            window.open(`/order/track/${trackingId}`, '_blank');
        }

        // Toggle delivery section
        function toggleDeliverySection() {
            const status = document.getElementById('orderStatus').value;
            const deliverySection = document.getElementById('deliverySection');
            
            if (status === 'shipped' || status === 'delivered') {
                deliverySection.classList.add('active');
            } else {
                deliverySection.classList.remove('active');
            }
        }

        // Close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal on outside click
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>