<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<head>
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">
    
    <style>
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #f1f3f4;
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }

        .price-cell {
            font-weight: 600;
            color: #28a745;
        }

        .sale-price {
            color: #dc3545;
            text-decoration: line-through;
            font-size: 0.85rem;
        }

        .stock-low {
            color: #ffc107;
        }

        .stock-out {
            color: #dc3545;
        }

        .stock-good {
            color: #28a745;
        }

        .action-buttons {
            white-space: nowrap;
        }

        .btn-group .btn {
            margin-right: 2px;
        }

        .category-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        .category-tag {
            font-size: 0.7rem;
            padding: 2px 6px;
            background: #e9ecef;
            border-radius: 3px;
            color: #495057;
        }

        .featured-badge {
            background: linear-gradient(45deg, #ffd700, #ffed4a);
            color: #333;
            font-weight: bold;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .card-header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }

        .stats-cards {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            flex: 1;
            min-width: 200px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .stats-card h3 {
            margin: 0;
            font-size: 1.8rem;
        }

        .stats-card p {
            margin: 5px 0 0 0;
            opacity: 0.9;
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
        <!-- Page Header -->
        <div class="container card card-box md-5">
            <div class="card-body">
                <div class="card-header-actions">
                    <div>
                        <h5 class="card-title mb-0">
                            <i class="fas fa-box-open"></i> Products Management
                        </h5>
                        <small class="text-muted">Manage your product inventory</small>
                    </div>
                    <div>
                        <a href="{{route('dashboard.products.create')}}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Add New Product
                        </a>
                        <button class="btn btn-outline-primary" onclick="refreshTable()">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            @php
                $totalProducts = \App\Models\Dashboard\Product::count();
                $activeProducts = \App\Models\Dashboard\Product::where('is_active', 1)->count();
                $featuredProducts = \App\Models\Dashboard\Product::where('is_featured', 1)->count();
                $lowStockProducts = \App\Models\Dashboard\Product::where('stock_quantity', '<=', 5)->count();
            @endphp
            
            <div class="stats-card">
                <h3>{{ $totalProducts }}</h3>
                <p><i class="fas fa-box"></i> Total Products</p>
            </div>
            <div class="stats-card">
                <h3>{{ $activeProducts }}</h3>
                <p><i class="fas fa-eye"></i> Active Products</p>
            </div>
            <div class="stats-card">
                <h3>{{ $featuredProducts }}</h3>
                <p><i class="fas fa-star"></i> Featured Products</p>
            </div>
            <div class="stats-card">
                <h3>{{ $lowStockProducts }}</h3>
                <p><i class="fas fa-exclamation-triangle"></i> Low Stock</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="filter-section">
            <h6><i class="fas fa-filter"></i> Quick Filters</h6>
            <div class="row">
                <div class="col-md-3">
                    <select id="statusFilter" class="form-control form-control-sm">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="categoryFilter" class="form-control form-control-sm">
                        <option value="">All Categories</option>
                        @php
                            $categories = \App\Models\Dashboard\Category::orderBy('name')->get();
                        @endphp
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="stockFilter" class="form-control form-control-sm">
                        <option value="">All Stock Levels</option>
                        <option value="in_stock">In Stock</option>
                        <option value="low_stock">Low Stock (≤5)</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="featuredFilter" class="form-control form-control-sm">
                        <option value="">All Products</option>
                        <option value="1">Featured Only</option>
                        <option value="0">Non-Featured</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">
                <i class="fas fa-list"></i> All Products
                <span class="badge badge-info float-right" id="product-count">{{ $totalProducts }} products</span>
            </div>

            <table class="data-table table table-striped table-bordered nowrap" id="products-table">
                <thead>
                    <tr>
                        <th class="table-plus">Image</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Categories</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Created</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $products = \App\Models\Dashboard\Product::with('categories')
                            ->orderBy('created_at', 'desc')
                            ->get();
                    @endphp
                    
                    @foreach($products as $product)
                    <tr data-product-id="{{ $product->id }}">
                        <td class="table-plus">
                            @if($product->images && count(json_decode($product->images, true)) > 0)
                                @php
                                    $images = json_decode($product->images, true);
                                    $firstImage = $images[0] ?? null;
                                @endphp
                                <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" class="product-image">
                            @else
                                <div class="product-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                            @if($product->short_description)
                                <br><small class="text-muted">{{ Str::limit($product->short_description, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            <code>{{ $product->sku }}</code>
                        </td>
                        <td class="price-cell">
                            @if($product->sale_price)
                                <span class="sale-price">${{ number_format($product->price, 2) }}</span><br>
                                <span>${{ number_format($product->sale_price, 2) }}</span>
                            @else
                                ${{ number_format($product->price, 2) }}
                            @endif
                        </td>
                        <td>
                            @if($product->stock_quantity <= 0)
                                <span class="badge badge-danger stock-out">Out of Stock</span>
                            @elseif($product->stock_quantity <= 5)
                                <span class="badge badge-warning stock-low">{{ $product->stock_quantity }} left</span>
                            @else
                                <span class="badge badge-success stock-good">{{ $product->stock_quantity }} in stock</span>
                            @endif
                        </td>
                        <td>
                            <div class="category-tags">
                                @forelse($product->categories as $category)
                                    <span class="category-tag">{{ $category->name }}</span>
                                @empty
                                    <span class="text-muted">No categories</span>
                                @endforelse
                            </div>
                        </td>
                        <td>
                            @switch($product->status)
                                @case('active')
                                    <span class="badge badge-success status-badge">Active</span>
                                    @break
                                @case('inactive')
                                    <span class="badge badge-secondary status-badge">Inactive</span>
                                    @break
                                @case('draft')
                                    <span class="badge badge-warning status-badge">Draft</span>
                                    @break
                                @default
                                    <span class="badge badge-light status-badge">Unknown</span>
                            @endswitch
                        </td>
                        <td>
                            @if($product->is_featured)
                                <span class="badge featured-badge status-badge">
                                    <i class="fas fa-star"></i> Featured
                                </span>
                            @else
                                <span class="badge badge-light status-badge">Regular</span>
                            @endif
                        </td>
                        <td>
                            {{ $product->created_at->format('M d, Y') }}<br>
                            <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.index', $product->id) }}" 
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" 
                                       class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-warning" 
                                            onclick="toggleFeatured({{ $product->id }})" 
                                            title="Toggle Featured">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button class="btn btn-sm btn-secondary" 
                                            onclick="toggleStatus({{ $product->id }})" 
                                            title="Toggle Status">
                                        <i class="fas fa-toggle-on"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" 
                                            onclick="deleteProduct({{ $product->id }})" 
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script>
        // Initialize DataTable
        let productsTable;
        
        $(document).ready(function() {
            productsTable = $('#products-table').DataTable({
                responsive: true,
                pageLength: 25,
                order: [[8, 'desc']], // Sort by created date
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"></i> Export Excel',
                        className: 'btn btn-success btn-sm'
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv"></i> Export CSV',
                        className: 'btn btn-info btn-sm'
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: [0, 9] }, // Disable sorting for image and actions
                    { searchable: false, targets: [0, 9] }
                ],
                language: {
                    search: "Search products:",
                    lengthMenu: "Show _MENU_ products per page",
                    info: "Showing _START_ to _END_ of _TOTAL_ products",
                    emptyTable: "No products found",
                    zeroRecords: "No matching products found"
                }
            });

            // Filter functionality
            $('#statusFilter').on('change', function() {
                const value = this.value;
                productsTable.column(6).search(value).draw();
            });

            $('#stockFilter').on('change', function() {
                const value = this.value;
                if (value === 'low_stock') {
                    productsTable.column(4).search('left|Out of Stock', true, false).draw();
                } else if (value === 'out_of_stock') {
                    productsTable.column(4).search('Out of Stock').draw();
                } else if (value === 'in_stock') {
                    productsTable.column(4).search('in stock').draw();
                } else {
                    productsTable.column(4).search('').draw();
                }
            });

            $('#featuredFilter').on('change', function() {
                const value = this.value;
                if (value === '1') {
                    productsTable.column(7).search('Featured').draw();
                } else if (value === '0') {
                    productsTable.column(7).search('Regular').draw();
                } else {
                    productsTable.column(7).search('').draw();
                }
            });

            $('#categoryFilter').on('change', function() {
                const value = this.value;
                if (value) {
                    // This is a simple search - you might want to implement server-side filtering for better performance
                    productsTable.draw();
                } else {
                    productsTable.column(5).search('').draw();
                }
            });
        });

        function toggleStatus(productId) {
            Swal.fire({
                title: 'Toggle Product Status',
                text: 'Are you sure you want to change this product status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, toggle it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/products/${productId}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Product status updated!"
                            });
                            setTimeout(() => location.reload(), 1000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to update status.', 'error');
                    });
                }
            });
        }

        function toggleFeatured(productId) {
            fetch(`/products/${productId}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Featured status updated!"
                    });
                    setTimeout(() => location.reload(), 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                Toast.fire({
                    icon: "error",
                    title: "Failed to update featured status"
                });
            });
        }

        function deleteProduct(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This product will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/products/${productId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', 'Product has been deleted.', 'success');
                            setTimeout(() => location.reload(), 1000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to delete product.', 'error');
                    });
                }
            });
        }

        function refreshTable() {
            location.reload();
        }

        // Auto-refresh every 5 minutes
        setInterval(function() {
            productsTable.ajax.reload(null, false);
        }, 300000);
    </script>
</body>

</html>