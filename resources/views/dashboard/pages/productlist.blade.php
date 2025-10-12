<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Dashboard</title>
    @include('../dashboard.header.head')
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- DataTables JS + jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .dataTables_filter {
    display: none; /* hide built-in search since we have custom search */
}
.dataTables_paginate .pagination {
    justify-content: end;
}
#productTable th, #productTable td {
    vertical-align: middle;
}
        .container {
            max-width: 1400px;
        }

        /* Page Header */
        .page-header {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .page-header h2 {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0;
            color: var(--dark);
            font-weight: 700;
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border: 1px solid #e2e8f0;
        }

        /* Status Badges */
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-published {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .status-draft {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status-archived {
            background: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }

        /* Stock Status */
        .stock-status {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .stock-in {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .stock-low {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .stock-out {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Product Image */
        .product-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
        }

        /* Action Buttons */
        .action-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 2px;
            transition: all 0.2s;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        .btn-view {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        /* Filters */
        .filter-section {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        /* Price styling */
        .price-regular {
            color: var(--dark);
            font-weight: 600;
        }

        .price-sale {
            color: var(--danger);
            text-decoration: line-through;
            font-size: 0.875rem;
        }

        .price-final {
            color: var(--success);
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                margin-left: 0;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
        }

        /* Loading spinner */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .loading-spinner.active {
            display: block;
        }
    </style>
</head>
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
    
    <div class="main-container">
        <div class="container">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2><i class="fas fa-boxes"></i> Product Management</h2>
                        <p class="text-muted mb-0">Manage your products inventory</p>
                    </div>
                    <a href="{{ route('dashboard.products') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Product
                    </a>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="filter-section">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Category</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Stock Status</label>
                        <select class="form-select" id="stockFilter">
                            <option value="">All Stock</option>
                            <option value="in_stock">In Stock</option>
                            <option value="low_stock">Low Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Actions</label>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary w-50" onclick="applyFilters()">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                            <button class="btn btn-outline-secondary w-50" onclick="resetFilters()">
                                <i class="fas fa-redo"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">All Products</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-success btn-sm" onclick="exportProducts()">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-columns"></i> Columns
                            </button>
                            <ul class="dropdown-menu" id="columnToggle">
                                <li><a class="dropdown-item" href="#" data-column="1"><input type="checkbox" checked> Image</a></li>
                                <li><a class="dropdown-item" href="#" data-column="2"><input type="checkbox" checked> Name</a></li>
                                <li><a class="dropdown-item" href="#" data-column="3"><input type="checkbox" checked> SKU</a></li>
                                <li><a class="dropdown-item" href="#" data-column="4"><input type="checkbox" checked> Category</a></li>
                                <li><a class="dropdown-item" href="#" data-column="5"><input type="checkbox" checked> Price</a></li>
                                <li><a class="dropdown-item" href="#" data-column="6"><input type="checkbox" checked> Stock</a></li>
                                <li><a class="dropdown-item" href="#" data-column="7"><input type="checkbox" checked> Status</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover" id="productTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Labels</th>
                            </tr>

                        <tbody id="productTableBody">
                            @foreach ($products as $product) 
                            <tr data-id="{{ $product->id }}" 
                                data-status="{{ $product->status }}" 
                                data-category-id="{{ $product->category_id }}"
                                data-stock-status="{{ $product->stock_quantity > 10 ? 'in_stock' : ($product->stock_quantity > 0 ? 'low_stock' : 'out_of_stock') }}">
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->primaryImage)
                                        <img src="{{ asset('storage/' . $product->primaryImage->image_url) }}" 
                                            alt="{{ $product->name }}" class="product-image">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="product-image">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->category ? $product->category->name : 'Uncategorized' }}</td>
                                <td>
                                    @if($product->sale_price)
                                        <span class="price-sale">${{ number_format($product->regular_price, 2) }}</span>
                                        <span class="price-final ms-2">${{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="price-regular">${{ number_format($product->regular_price, 2) }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->stock_quantity > 10)
                                        <span class="stock-status stock-in">In Stock ({{ $product->stock_quantity }})</span>
                                    @elseif($product->stock_quantity > 0)
                                        <span class="stock-status stock-low">Low Stock ({{ $product->stock_quantity }})</span>
                                    @else
                                        <span class="stock-status stock-out">Out of Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select product-status-dropdown" data-product-id="{{ $product->id }}">
                                        <option value="published" {{ $product->status === 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="draft" {{ $product->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="archived" {{ $product->status === 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="" class="action-btn btn-view" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="" class="action-btn btn-edit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="action-btn btn-delete" title="Delete" onclick="confirmDelete({{ $product->id }})">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                                <td>
                                    <select class="form-select product-label-dropdown" data-product-id="{{ $product->id }}">
                                        <option value="">Select label</option>
                                        <option value="New" {{ $product->prodcutlabel == 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Best Seller" {{ $product->prodcutlabel == 'Best Seller' ? 'selected' : '' }}>Best Seller</option>
                                        <option value="Popular" {{ $product->prodcutlabel == 'Popular' ? 'selected' : '' }}>Popular</option>
                                        <option value="Hot Deal" {{ $product->prodcutlabel == 'Hot Deal' ? 'selected' : '' }}>Hot Deal</option>
                                        <option value="Best Value" {{ $product->prodcutlabel == 'Best Value' ? 'selected' : '' }}>Best Value</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Loading products...</p>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted" id="paginationInfo">
                        Showing 0 to 0 of 0 entries
                    </div>
                    <nav>
                        <ul class="pagination mb-0" id="pagination">
                            <!-- Pagination will be generated here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product? This action cannot be undone.</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Warning:</strong> This will permanently remove the product and all associated data.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete Product</button>
                </div>
            </div>
        </div>
    </div>

  
    
</body>
 @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')    

</html>
<script>
$(document).ready(function(){
    $('.product-label-dropdown').change(function(){
        let label = $(this).val();
        let productId = $(this).data('product-id');

        $.ajax({
            url: "{{ route('product.updateLabel') }}", // Route to handle update
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                label: label
            },
            success: function(response){
                if(response.success){
                    alert('Label updated successfully!');
                } else {
                    alert('Failed to update label!');
                }
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        });
    });
});
$(document).ready(function(){
    $('.product-status-dropdown').change(function(){
        let status = $(this).val();
        let productId = $(this).data('product-id');

        $.ajax({
            url: "{{ route('product.updateStatus') }}", // route to handle status update
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId,
                status: status
            },
            success: function(response){
                if(response.success){
                    alert('Status updated successfully!');
                } else {
                    alert('Failed to update status!');
                }
            },
            error: function(xhr){
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
<script>
$(document).ready(function () {
    let table = $('#productTable').DataTable({
        pageLength: 10,
        order: [[0, 'desc']],
        dom: '<"top"f>rt<"bottom"lp><"clear">',
        columnDefs: [
            { targets: [1, 8, 9], orderable: false }
        ]
    });

    // --- Search Filter ---
    $('#searchInput').on('keyup', function () {
        table.search(this.value).draw();
    });

    // --- Status Filter (using data attributes) ---
    $('#statusFilter').on('change', function () {
        const val = this.value;
        
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                if (settings.nTable !== table.table().node()) return true;
                
                const row = table.row(dataIndex).node();
                const rowStatus = $(row).data('status');
                
                return val === '' || rowStatus === val;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    // --- Category Filter (using data attributes) ---
    $('#categoryFilter').on('change', function () {
        const categoryId = this.value;
        
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                if (settings.nTable !== table.table().node()) return true;
                
                const row = table.row(dataIndex).node();
                const rowCategoryId = $(row).data('category-id');
                
                return categoryId === '' || rowCategoryId == categoryId;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    // --- Stock Filter (using data attributes) ---
    $('#stockFilter').on('change', function () {
        const val = this.value;
        
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                if (settings.nTable !== table.table().node()) return true;
                
                const row = table.row(dataIndex).node();
                const rowStockStatus = $(row).data('stock-status');
                
                return val === '' || rowStockStatus === val;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    // --- Reset Filters ---
    window.resetFilters = function() {
        $('#searchInput').val('');
        $('#statusFilter, #categoryFilter, #stockFilter').val('');
        table.search('').columns().search('').draw();
    };
});
</script>
