<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Product - {{ $product->name }}</title>
    @include('../dashboard.header.head')
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-700: #374151;
            --gray-900: #111827;
        }

        .container {
            max-width: 1400px;
        }

        .page-header h1 {
            color: var(--gray-900);
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-header .icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            padding: 0.65rem;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .image-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            background: var(--gray-50);
            transition: all 0.3s;
            cursor: pointer;
        }

        .image-upload-area:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .image-upload-area i {
            font-size: 2.5rem;
            color: var(--gray-400);
            margin-bottom: 0.75rem;
        }

        .image-preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .image-preview-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid var(--gray-200);
            aspect-ratio: 1;
        }

        .image-preview-item.primary-image {
            border-color: var(--success);
            border-width: 3px;
        }

        .image-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-preview-item .remove-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: var(--danger);
            color: white;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.8rem;
            z-index: 10;
        }

        .image-preview-item .remove-btn:hover {
            background: #dc2626;
            transform: scale(1.1);
        }

        .image-preview-item .primary-badge {
            position: absolute;
            bottom: 0.5rem;
            left: 0.5rem;
            background: var(--success);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .image-preview-item .set-primary-btn {
            position: absolute;
            bottom: 0.5rem;
            left: 0.5rem;
            background: var(--gray-700);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-size: 0.7rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .image-preview-item .set-primary-btn:hover {
            background: var(--primary);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .tag-input-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 0.65rem;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            min-height: 50px;
        }

        .tag-item {
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
        }

        .tag-item .remove-tag {
            cursor: pointer;
            opacity: 0.8;
        }

        .tag-item .remove-tag:hover {
            opacity: 1;
        }

        .tag-input {
            border: none;
            outline: none;
            flex: 1;
            min-width: 150px;
            font-size: 0.9rem;
        }

        .price-input-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .currency-symbol {
            background: var(--gray-100);
            padding: 0.65rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            color: var(--gray-700);
        }

        .stock-status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
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

        .spec-row {
            background: var(--gray-50);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            border: 1px solid var(--gray-200);
        }

        .info-box {
            background: #eff6ff;
            border-left: 4px solid var(--primary);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .info-box i {
            color: var(--primary);
        }

        .two-column-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 992px) {
            .two-column-layout {
                grid-template-columns: 1fr;
            }
        }

        .sidebar-card {
            position: sticky;
            top: 20px;
        }

        .product-type-selector {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .type-card {
            border: 2px solid var(--gray-200);
            padding: 1.25rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .type-card:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .type-card.active {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.1);
        }

        .type-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .type-card h6 {
            margin: 0;
            font-weight: 600;
        }

        .compatible-list {
            max-height: 200px;
            overflow-y: auto;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            padding: 0.75rem;
        }

        .compatible-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem;
            background: var(--gray-50);
            border-radius: 6px;
            margin-bottom: 0.5rem;
        }

        .small-text {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-bottom: 0.5rem;
            min-width: 300px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
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
    <!-- left-side-bar -->
    @include('../dashboard.partials.leftsidebar')

    <div class="main-container">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>
                        <div class="icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        Edit Product
                    </h1>
                    <a href="" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form id="productForm" enctype="multipart/form-data" method="POST"
                action="{{ route('dashboard.products.update', $product->id) }}">
                @csrf
                <input type="hidden" name="_method" value="POST">

                <div class="two-column-layout">
                    <!-- Main Content -->
                    <div>
                        <!-- Product Type Selection -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-layer-group"></i>
                                Product Type
                            </div>

                            <div class="product-type-selector">
                                <div class="type-card {{ $product->product_type == 'printer' ? 'active' : '' }}"
                                    data-type="printer">
                                    <i class="fas fa-print"></i>
                                    <h6>Printer</h6>
                                    <p class="small-text mb-0">Thermal/Barcode Printer</p>
                                </div>
                                <div class="type-card {{ $product->product_type == 'scanner' ? 'active' : '' }}"
                                    data-type="scanner">
                                    <i class="fas fa-barcode"></i>
                                    <h6>Scanner</h6>
                                    <p class="small-text mb-0">Barcode Scanner</p>
                                </div>
                                <div class="type-card {{ $product->product_type == 'paper' ? 'active' : '' }}"
                                    data-type="paper">
                                    <i class="fas fa-scroll"></i>
                                    <h6>Paper/Roll</h6>
                                    <p class="small-text mb-0">Thermal Roll/Paper</p>
                                </div>
                                <div class="type-card {{ $product->product_type == 'ribbon' ? 'active' : '' }}"
                                    data-type="ribbon">
                                    <i class="fas fa-tape"></i>
                                    <h6>Ribbon</h6>
                                    <p class="small-text mb-0">Barcode Ribbon</p>
                                </div>
                                <div class="type-card {{ $product->product_type == 'accessory' ? 'active' : '' }}"
                                    data-type="accessory">
                                    <i class="fas fa-plug"></i>
                                    <h6>Accessory</h6>
                                    <p class="small-text mb-0">Cables & Parts</p>
                                </div>
                                <div class="type-card {{ $product->product_type == 'other' ? 'active' : '' }}"
                                    data-type="other">
                                    <i class="fas fa-box"></i>
                                    <h6>Other IT</h6>
                                    <p class="small-text mb-0">General IT Products</p>
                                </div>
                            </div>
                            <input type="hidden" name="product_type" id="productType"
                                value="{{ $product->product_type }}" required>
                        </div>

                        <!-- Basic Information -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-info-circle"></i>
                                Basic Information
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="productName" class="form-label">
                                        Product Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="productName" name="name"
                                        value="{{ old('name', $product->name) }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="productSKU" class="form-label">
                                        SKU <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="productSKU" name="sku"
                                        value="{{ old('sku', $product->sku) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">
                                        Category <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="category" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="brand" class="form-label">Brand <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="brand" name="brand"
                                        value="{{ old('brand', $product->brand) }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="modelNumber" class="form-label">Model Number</label>
                                    <input type="text" class="form-control" id="modelNumber" name="model_number"
                                        value="{{ old('model_number', $product->model_number) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="manufacturer" class="form-label">Manufacturer</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                                        value="{{ old('manufacturer', $product->manufacturer) }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="shortDescription" class="form-label">Short Description</label>
                                <textarea class="form-control" id="shortDescription" name="short_description" rows="2" maxlength="500">{{ old('short_description', $product->short_description) }}</textarea>
                                <small class="text-muted">
                                    <span id="charCount">{{ strlen($product->short_description ?? '') }}</span>/500
                                    characters
                                </small>
                            </div>

                            <div class="mb-3">
                                <label for="fullDescription" class="form-label">Full Description</label>
                                <textarea class="form-control" id="fullDescription" name="description" rows="6">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Pricing & GST -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-rupee-sign"></i>
                                Pricing & GST
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="regularPrice" class="form-label">
                                        Regular Price (MRP) <span class="text-danger">*</span>
                                    </label>
                                    <div class="price-input-group">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number" class="form-control" id="regularPrice"
                                            name="regular_price"
                                            value="{{ old('regular_price', $product->regular_price) }}"
                                            step="0.01" min="0" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="salePrice" class="form-label">Sale Price</label>
                                    <div class="price-input-group">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number" class="form-control" id="salePrice" name="sale_price"
                                            value="{{ old('sale_price', $product->sale_price) }}" step="0.01"
                                            min="0">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="costPrice" class="form-label">Cost Price (Purchase)</label>
                                    <div class="price-input-group">
                                        <span class="currency-symbol">₹</span>
                                        <input type="number" class="form-control" id="costPrice" name="cost_price"
                                            value="{{ old('cost_price', $product->cost_price) }}" step="0.01"
                                            min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="hsnCode" class="form-label">HSN/SAC Code</label>
                                    <input type="text" class="form-control" id="hsnCode" name="hsn_code"
                                        value="{{ old('hsn_code', $product->hsn_code) }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="taxRate" class="form-label">GST Rate (%)</label>
                                    <select class="form-select" id="taxRate" name="tax_rate">
                                        <option value="0" {{ $product->tax_rate == 0 ? 'selected' : '' }}>0%
                                        </option>
                                        <option value="5" {{ $product->tax_rate == 5 ? 'selected' : '' }}>5%
                                        </option>
                                        <option value="12" {{ $product->tax_rate == 12 ? 'selected' : '' }}>12%
                                        </option>
                                        <option value="18" {{ $product->tax_rate == 18 ? 'selected' : '' }}>18%
                                        </option>
                                        <option value="28" {{ $product->tax_rate == 28 ? 'selected' : '' }}>28%
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="barcode" class="form-label">Product Barcode</label>
                                    <input type="text" class="form-control" id="barcode" name="barcode"
                                        value="{{ old('barcode', $product->barcode) }}">
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="isTaxable" name="is_taxable"
                                    {{ $product->is_taxable ? 'checked' : '' }}>
                                <label class="form-check-label" for="isTaxable">
                                    This product is taxable (GST applicable)
                                </label>
                            </div>
                        </div>

                        <!-- Technical Specifications -->
                        <div class="form-card" id="techSpecsSection">
                            <div class="section-title">
                                <i class="fas fa-cog"></i>
                                Technical Specifications
                            </div>

                            <!-- Printer Specs -->
                            <div id="printerSpecs"
                                style="display: {{ $product->product_type == 'printer' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="connectivity" class="form-label">Connectivity</label>
                                        <select class="form-select" name="connectivity">
                                            <option value="">Select</option>
                                            <option value="USB"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'USB' ? 'selected' : '' }}>
                                                USB</option>
                                            <option value="USB + LAN"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'USB + LAN' ? 'selected' : '' }}>
                                                USB + LAN</option>
                                            <option value="USB + WiFi"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'USB + WiFi' ? 'selected' : '' }}>
                                                USB + WiFi</option>
                                            <option value="Bluetooth"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'Bluetooth' ? 'selected' : '' }}>
                                                Bluetooth</option>
                                            <option value="USB + LAN + WiFi"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'USB + LAN + WiFi' ? 'selected' : '' }}>
                                                USB + LAN + WiFi</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="interfaceType" class="form-label">Interface Type</label>
                                        <select class="form-select" name="interface_type">
                                            <option value="">Select</option>
                                            <option value="USB 2.0"
                                                {{ ($product->specifications['interface_type'] ?? '') == 'USB 2.0' ? 'selected' : '' }}>
                                                USB 2.0</option>
                                            <option value="USB 3.0"
                                                {{ ($product->specifications['interface_type'] ?? '') == 'USB 3.0' ? 'selected' : '' }}>
                                                USB 3.0</option>
                                            <option value="Serial"
                                                {{ ($product->specifications['interface_type'] ?? '') == 'Serial' ? 'selected' : '' }}>
                                                Serial Port</option>
                                            <option value="Parallel"
                                                {{ ($product->specifications['interface_type'] ?? '') == 'Parallel' ? 'selected' : '' }}>
                                                Parallel Port</option>
                                            <option value="Ethernet"
                                                {{ ($product->specifications['interface_type'] ?? '') == 'Ethernet' ? 'selected' : '' }}>
                                                Ethernet RJ45</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="printWidth" class="form-label">Print Width</label>
                                        <select class="form-select" name="print_width">
                                            <option value="">Select</option>
                                            <option value="58mm"
                                                {{ ($product->specifications['print_width'] ?? '') == '58mm' ? 'selected' : '' }}>
                                                58mm (2 inch)</option>
                                            <option value="80mm"
                                                {{ ($product->specifications['print_width'] ?? '') == '80mm' ? 'selected' : '' }}>
                                                80mm (3 inch)</option>
                                            <option value="110mm"
                                                {{ ($product->specifications['print_width'] ?? '') == '110mm' ? 'selected' : '' }}>
                                                110mm (4 inch)</option>
                                            <option value="A4"
                                                {{ ($product->specifications['print_width'] ?? '') == 'A4' ? 'selected' : '' }}>
                                                A4</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="resolution" class="form-label">Resolution (DPI)</label>
                                        <select class="form-select" name="resolution">
                                            <option value="">Select</option>
                                            <option value="203 DPI"
                                                {{ ($product->specifications['resolution'] ?? '') == '203 DPI' ? 'selected' : '' }}>
                                                203 DPI</option>
                                            <option value="300 DPI"
                                                {{ ($product->specifications['resolution'] ?? '') == '300 DPI' ? 'selected' : '' }}>
                                                300 DPI</option>
                                            <option value="600 DPI"
                                                {{ ($product->specifications['resolution'] ?? '') == '600 DPI' ? 'selected' : '' }}>
                                                600 DPI</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="printSpeed" class="form-label">Print Speed</label>
                                        <input type="text" class="form-control" name="print_speed"
                                            value="{{ $product->specifications['print_speed'] ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Scanner Specs -->
                            <div id="scannerSpecs"
                                style="display: {{ $product->product_type == 'scanner' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="scanType" class="form-label">Scanner Type</label>
                                        <select class="form-select" name="scan_type">
                                            <option value="">Select</option>
                                            <option value="1D"
                                                {{ ($product->specifications['scan_type'] ?? '') == '1D' ? 'selected' : '' }}>
                                                1D Barcode Scanner</option>
                                            <option value="2D"
                                                {{ ($product->specifications['scan_type'] ?? '') == '2D' ? 'selected' : '' }}>
                                                2D Barcode Scanner</option>
                                            <option value="QR"
                                                {{ ($product->specifications['scan_type'] ?? '') == 'QR' ? 'selected' : '' }}>
                                                QR Code Scanner</option>
                                            <option value="1D + 2D"
                                                {{ ($product->specifications['scan_type'] ?? '') == '1D + 2D' ? 'selected' : '' }}>
                                                1D + 2D Scanner</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="scanConnectivity" class="form-label">Connectivity</label>
                                        <select class="form-select" name="connectivity">
                                            <option value="">Select</option>
                                            <option value="USB"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'USB' ? 'selected' : '' }}>
                                                USB Wired</option>
                                            <option value="Bluetooth"
                                                {{ ($product->specifications['connectivity'] ?? '') == 'Bluetooth' ? 'selected' : '' }}>
                                                Bluetooth Wireless</option>
                                            <option value="2.4GHz Wireless"
                                                {{ ($product->specifications['connectivity'] ?? '') == '2.4GHz Wireless' ? 'selected' : '' }}>
                                                2.4GHz Wireless</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Paper/Roll Specs -->
                            <div id="paperSpecs"
                                style="display: {{ $product->product_type == 'paper' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="paperSize" class="form-label">Paper/Roll Size</label>
                                        <select class="form-select" name="paper_size">
                                            <option value="">Select</option>
                                            <option value="57mm x 25mm"
                                                {{ ($product->specifications['paper_size'] ?? '') == '57mm x 25mm' ? 'selected' : '' }}>
                                                57mm x 25mm</option>
                                            <option value="57mm x 40mm"
                                                {{ ($product->specifications['paper_size'] ?? '') == '57mm x 40mm' ? 'selected' : '' }}>
                                                57mm x 40mm</option>
                                            <option value="80mm x 50mm"
                                                {{ ($product->specifications['paper_size'] ?? '') == '80mm x 50mm' ? 'selected' : '' }}>
                                                80mm x 50mm</option>
                                            <option value="80mm x 80mm"
                                                {{ ($product->specifications['paper_size'] ?? '') == '80mm x 80mm' ? 'selected' : '' }}>
                                                80mm x 80mm</option>
                                            <option value="110mm x 100mm"
                                                {{ ($product->specifications['paper_size'] ?? '') == '110mm x 100mm' ? 'selected' : '' }}>
                                                110mm x 100mm</option>
                                            <option value="A4"
                                                {{ ($product->specifications['paper_size'] ?? '') == 'A4' ? 'selected' : '' }}>
                                                A4 (210mm x 297mm)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="paperType" class="form-label">Paper Type</label>
                                        <select class="form-select" name="paper_type">
                                            <option value="">Select</option>
                                            <option value="Thermal"
                                                {{ ($product->specifications['paper_type'] ?? '') == 'Thermal' ? 'selected' : '' }}>
                                                Thermal Paper</option>
                                            <option value="Bond"
                                                {{ ($product->specifications['paper_type'] ?? '') == 'Bond' ? 'selected' : '' }}>
                                                Bond Paper</option>
                                            <option value="Pre-printed"
                                                {{ ($product->specifications['paper_type'] ?? '') == 'Pre-printed' ? 'selected' : '' }}>
                                                Pre-printed</option>
                                            <option value="Self-adhesive"
                                                {{ ($product->specifications['paper_type'] ?? '') == 'Self-adhesive' ? 'selected' : '' }}>
                                                Self-adhesive Label</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="rollLength" class="form-label">Roll Length (m)</label>
                                        <input type="number" class="form-control" name="roll_length"
                                            value="{{ $product->specifications['roll_length'] ?? '' }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="rollDiameter" class="form-label">Roll Diameter (mm)</label>
                                        <input type="number" class="form-control" name="roll_diameter"
                                            value="{{ $product->specifications['roll_diameter'] ?? '' }}">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="coreSize" class="form-label">Core Size (mm)</label>
                                        <select class="form-select" name="core_size">
                                            <option value="">Select</option>
                                            <option value="12"
                                                {{ ($product->specifications['core_size'] ?? '') == '12' ? 'selected' : '' }}>
                                                12mm</option>
                                            <option value="25"
                                                {{ ($product->specifications['core_size'] ?? '') == '25' ? 'selected' : '' }}>
                                                25mm</option>
                                            <option value="38"
                                                {{ ($product->specifications['core_size'] ?? '') == '38' ? 'selected' : '' }}>
                                                38mm</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="gsm" class="form-label">GSM (Weight)</label>
                                        <input type="text" class="form-control" name="gsm"
                                            value="{{ $product->specifications['gsm'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="sheetsPerPack" class="form-label">Sheets per Pack</label>
                                        <input type="number" class="form-control" name="sheets_per_pack"
                                            value="{{ $product->specifications['sheets_per_pack'] ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Ribbon Specs -->
                            <div id="ribbonSpecs"
                                style="display: {{ $product->product_type == 'ribbon' ? 'block' : 'none' }};">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="ribbonType" class="form-label">Ribbon Type</label>
                                        <select class="form-select" name="ribbon_type">
                                            <option value="">Select</option>
                                            <option value="Wax"
                                                {{ ($product->specifications['ribbon_type'] ?? '') == 'Wax' ? 'selected' : '' }}>
                                                Wax Ribbon</option>
                                            <option value="Resin"
                                                {{ ($product->specifications['ribbon_type'] ?? '') == 'Resin' ? 'selected' : '' }}>
                                                Resin Ribbon</option>
                                            <option value="Wax-Resin"
                                                {{ ($product->specifications['ribbon_type'] ?? '') == 'Wax-Resin' ? 'selected' : '' }}>
                                                Wax-Resin Mix</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="ribbonSize" class="form-label">Ribbon Size</label>
                                        <select class="form-select" name="ribbon_size">
                                            <option value="">Select</option>
                                            <option value="110mm x 300m"
                                                {{ ($product->specifications['ribbon_size'] ?? '') == '110mm x 300m' ? 'selected' : '' }}>
                                                110mm x 300m</option>
                                            <option value="110mm x 450m"
                                                {{ ($product->specifications['ribbon_size'] ?? '') == '110mm x 450m' ? 'selected' : '' }}>
                                                110mm x 450m</option>
                                            <option value="64mm x 300m"
                                                {{ ($product->specifications['ribbon_size'] ?? '') == '64mm x 300m' ? 'selected' : '' }}>
                                                64mm x 300m</option>
                                            <option value="84mm x 300m"
                                                {{ ($product->specifications['ribbon_size'] ?? '') == '84mm x 300m' ? 'selected' : '' }}>
                                                84mm x 300m</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Compatibility -->
                        <div class="form-card" id="compatibilitySection"
                            style="display: {{ in_array($product->product_type, ['paper', 'ribbon']) ? 'block' : 'none' }};">
                            <div class="section-title">
                                <i class="fas fa-link"></i>
                                Compatible Devices
                            </div>

                            <div class="info-box">
                                <i class="fas fa-info-circle"></i>
                                <strong>Info:</strong> Select which printers/devices this consumable is compatible with.
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Add Compatible Models</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="compatibleModelInput"
                                        placeholder="Enter printer model">
                                    <button class="btn btn-primary" type="button" onclick="addCompatibleModel()">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>

                            <div id="compatibleList" class="compatible-list"></div>
                            <input type="hidden" name="compatible_models" id="compatibleModelsHidden">
                        </div>

                        <!-- Inventory Management -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-boxes"></i>
                                Inventory Management
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="stockQuantity" class="form-label">
                                        Stock Quantity <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="stockQuantity"
                                        name="stock_quantity"
                                        value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0"
                                        required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="lowStockThreshold" class="form-label">Low Stock Alert</label>
                                    <input type="number" class="form-control" id="lowStockThreshold"
                                        name="low_stock_threshold"
                                        value="{{ old('low_stock_threshold', $product->low_stock_threshold) }}"
                                        min="1">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Current Status</label>
                                    <div>
                                        <span class="stock-status stock-in" id="stockStatus">
                                            <i class="fas fa-check-circle"></i> In Stock
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="minOrderQty" class="form-label">Minimum Order Quantity</label>
                                    <input type="number" class="form-control" name="minimum_order_quantity"
                                        value="{{ old('minimum_order_quantity', $product->minimum_order_quantity) }}"
                                        min="1">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="maxOrderQty" class="form-label">Maximum Order Quantity</label>
                                    <input type="number" class="form-control" name="maximum_order_quantity"
                                        value="{{ old('maximum_order_quantity', $product->maximum_order_quantity) }}"
                                        min="1">
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="trackInventory"
                                    name="track_inventory" {{ $product->track_inventory ? 'checked' : '' }}>
                                <label class="form-check-label" for="trackInventory">
                                    Track inventory for this product
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="allowBackorder"
                                    name="allow_backorder" {{ $product->allow_backorder ? 'checked' : '' }}>
                                <label class="form-check-label" for="allowBackorder">
                                    Allow orders when out of stock (backorder)
                                </label>
                            </div>
                        </div>

                        <!-- Product Images -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-images"></i>
                                Product Images
                            </div>

                            <!-- Existing Images -->
                            @if ($product->productImages && $product->productImages->count() > 0)
                                <div class="image-preview-grid mb-3">
                                    @foreach ($product->productImages as $image)
                                        <div class="image-preview-item {{ $image->is_primary ? 'primary-image' : '' }}"
                                            data-image-id="{{ $image->id }}">
                                            <img src="{{ asset('storage/' . $image->image_url) }}"
                                                alt="{{ $image->alt_text }}">

                                            @if ($image->is_primary)
                                                <span class="primary-badge">Primary</span>
                                            @else
                                                <button type="button" class="set-primary-btn"
                                                    onclick="setPrimaryImage({{ $product->id }}, {{ $image->id }})">
                                                    Set Primary
                                                </button>
                                            @endif

                                            <button class="remove-btn" type="button"
                                                onclick="deleteExistingImage({{ $image->id }})">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Upload New Images -->
                            <div class="image-upload-area" id="imageUploadArea">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <h6>Click to upload new images</h6>
                                <p class="text-muted mb-0">or drag and drop</p>
                                <small class="text-muted">PNG, JPG up to 5MB (Max 10 images total)</small>
                                <input type="file" id="imageInput" name="images[]" multiple accept="image/*"
                                    style="display: none;">
                            </div>

                            <div class="image-preview-grid" id="imagePreviewGrid"></div>
                            <input type="hidden" name="deleted_images" id="deletedImagesHidden">
                        </div>

                        <!-- Dimensions & Weight -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-ruler-combined"></i>
                                Dimensions & Weight (for Shipping)
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="number" class="form-control" name="weight"
                                        value="{{ old('weight', $product->weight) }}" step="0.01"
                                        min="0">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="length" class="form-label">Length (cm)</label>
                                    <input type="number" class="form-control" name="length"
                                        value="{{ old('length', $product->length) }}" step="0.1"
                                        min="0">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="width" class="form-label">Width (cm)</label>
                                    <input type="number" class="form-control" name="width"
                                        value="{{ old('width', $product->width) }}" step="0.1" min="0">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="height" class="form-label">Height (cm)</label>
                                    <input type="number" class="form-control" name="height"
                                        value="{{ old('height', $product->height) }}" step="0.1"
                                        min="0">
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="freeShipping"
                                    name="free_shipping" {{ $product->free_shipping ? 'checked' : '' }}>
                                <label class="form-check-label" for="freeShipping">
                                    Free shipping for this product
                                </label>
                            </div>
                        </div>

                        <!-- Warranty & Support -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-shield-alt"></i>
                                Warranty & Support
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="warrantyPeriod" class="form-label">Warranty Period (months)</label>
                                    <input type="number" class="form-control" name="warranty_period"
                                        value="{{ old('warranty_period', $product->warranty_period) }}"
                                        min="0">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="warrantyType" class="form-label">Warranty Type</label>
                                    <select class="form-select" name="warranty_type">
                                        <option value="manufacturer"
                                            {{ $product->warranty_type == 'manufacturer' ? 'selected' : '' }}>
                                            Manufacturer Warranty</option>
                                        <option value="seller"
                                            {{ $product->warranty_type == 'seller' ? 'selected' : '' }}>Seller
                                            Warranty</option>
                                        <option value="none"
                                            {{ $product->warranty_type == 'none' ? 'selected' : '' }}>No Warranty
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="warrantyDetails" class="form-label">Warranty Details</label>
                                <textarea class="form-control" name="warranty_details" rows="3">{{ old('warranty_details', $product->warranty_details) }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="productManual" class="form-label">Product Manual URL</label>
                                    <input type="url" class="form-control" name="product_manual_url"
                                        value="{{ old('product_manual_url', $product->product_manual_url) }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="driverDownload" class="form-label">Driver Download URL</label>
                                    <input type="url" class="form-control" name="driver_download_url"
                                        value="{{ old('driver_download_url', $product->driver_download_url) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-card">
                            <div class="section-title">
                                <i class="fas fa-list-ul"></i>
                                Additional Information
                            </div>

                            <div class="mb-3">
                                <label for="packageContents" class="form-label">Package Contents</label>
                                <textarea class="form-control" name="package_contents" rows="3">{{ old('package_contents', $product->package_contents) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="usageInstructions" class="form-label">Usage Instructions</label>
                                <textarea class="form-control" name="usage_instructions" rows="3">{{ old('usage_instructions', $product->usage_instructions) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Tags</label>
                                <div class="tag-input-container" id="tagContainer">
                                    <input type="text" class="tag-input" id="tagInput"
                                        placeholder="Type and press Enter">
                                </div>
                                <input type="hidden" name="tags" id="tagsHidden">
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div>
                        <!-- Status & Visibility -->
                        <div class="form-card sidebar-card">
                            <div class="section-title">
                                <i class="fas fa-eye"></i>
                                Publish Settings
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>Draft
                                    </option>
                                    <option value="published"
                                        {{ $product->status == 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ $product->status == 'archived' ? 'selected' : '' }}>
                                        Archived</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="visibility" class="form-label">Visibility</label>
                                <select class="form-select" name="visibility">
                                    <option value="public" {{ $product->visibility == 'public' ? 'selected' : '' }}>
                                        Public</option>
                                    <option value="private"
                                        {{ $product->visibility == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="hidden" {{ $product->visibility == 'hidden' ? 'selected' : '' }}>
                                        Hidden from catalog</option>
                                </select>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_active"
                                    {{ $product->is_active ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    <strong>Active</strong>
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_featured"
                                    {{ $product->is_featured ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    <strong>Featured Product</strong>
                                </label>
                                <small class="d-block text-muted">Show on homepage</small>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_new_arrival"
                                    {{ $product->is_new_arrival ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    <strong>New Arrival</strong>
                                </label>
                                <small class="d-block text-muted">Show in new products</small>
                            </div>
                        </div>

                        <!-- Bulk Pricing -->
                        <div class="form-card sidebar-card">
                            <div class="section-title">
                                <i class="fas fa-percent"></i>
                                Bulk Discount
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="enableBulkPricing"
                                    {{ !empty($product->bulk_pricing) ? 'checked' : '' }}>
                                <label class="form-check-label" for="enableBulkPricing">
                                    Enable bulk pricing
                                </label>
                            </div>

                            <div id="bulkPricingSection"
                                style="display: {{ !empty($product->bulk_pricing) ? 'block' : 'none' }};">
                                <div id="bulkPricingList"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary w-100"
                                    onclick="addBulkPricing()">
                                    <i class="fas fa-plus"></i> Add Tier
                                </button>
                            </div>
                            <input type="hidden" name="bulk_pricing" id="bulkPricingHidden">
                        </div>

                        <!-- Quick Info -->
                        <div class="form-card sidebar-card">
                            <div class="section-title">
                                <i class="fas fa-chart-line"></i>
                                Product Analytics
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">Profit Margin</small>
                                <div class="h5 mb-0" id="profitMargin">—</div>
                            </div>

                            <hr>

                            <div class="mb-2">
                                <small class="text-muted">Final Price (with GST)</small>
                                <div class="h5 mb-0" id="priceWithGST">₹0.00</div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-card sidebar-card">
                            <button type="submit" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-save"></i> Update Product
                            </button>
                            <a href="" class="btn btn-secondary w-100">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('dashboard.partials.messagemode')
    @include('dashboard.footer.footer')

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global variables
        let uploadedImages = [];
        let deletedImages = [];
        let tags = @json($product->tags ?? []);
        let compatibleModels = @json($product->compatible_models ?? []);
        let bulkPricing = @json($product->bulk_pricing ?? []);
        let bulkPricingCounter = bulkPricing.length;

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeForm();
        });

        function initializeForm() {
            setupEventListeners();
            updateStockStatus();
            calculateAnalytics();
            renderTags();
            renderCompatibleModels();
            updateCompatibleModelsHidden();

            if (bulkPricing.length > 0) {
                bulkPricing.forEach((item, index) => {
                    item.id = index + 1;
                });
                bulkPricingCounter = bulkPricing.length;
                renderBulkPricing();
            }
        }

        function setupEventListeners() {
            // Product Type Selection
            document.querySelectorAll('.type-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.type-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const type = this.dataset.type;
                    document.getElementById('productType').value = type;
                    toggleSpecSections(type);
                });
            });

            // Character counter
            document.getElementById('shortDescription').addEventListener('input', function(e) {
                document.getElementById('charCount').textContent = e.target.value.length;
            });

            // Stock status update
            document.getElementById('stockQuantity').addEventListener('input', updateStockStatus);
            document.getElementById('lowStockThreshold').addEventListener('input', updateStockStatus);

            // Image upload
            setupImageUpload();

            // Tags functionality
            setupTags();

            // Bulk Pricing
            document.getElementById('enableBulkPricing').addEventListener('change', function(e) {
                const section = document.getElementById('bulkPricingSection');
                section.style.display = e.target.checked ? 'block' : 'none';

                if (e.target.checked && bulkPricing.length === 0) {
                    addBulkPricing();
                }
            });

            // Price calculations
            document.getElementById('regularPrice').addEventListener('input', calculateAnalytics);
            document.getElementById('costPrice').addEventListener('input', calculateAnalytics);
            document.getElementById('salePrice').addEventListener('input', calculateAnalytics);
            document.getElementById('taxRate').addEventListener('change', calculateAnalytics);

            // Form submission
            document.getElementById('productForm').addEventListener('submit', handleFormSubmit);
        }

        function toggleSpecSections(type) {
            document.getElementById('printerSpecs').style.display = 'none';
            document.getElementById('scannerSpecs').style.display = 'none';
            document.getElementById('paperSpecs').style.display = 'none';
            document.getElementById('ribbonSpecs').style.display = 'none';
            document.getElementById('compatibilitySection').style.display = 'none';

            if (type === 'printer') {
                document.getElementById('printerSpecs').style.display = 'block';
            } else if (type === 'scanner') {
                document.getElementById('scannerSpecs').style.display = 'block';
            } else if (type === 'paper') {
                document.getElementById('paperSpecs').style.display = 'block';
                document.getElementById('compatibilitySection').style.display = 'block';
            } else if (type === 'ribbon') {
                document.getElementById('ribbonSpecs').style.display = 'block';
                document.getElementById('compatibilitySection').style.display = 'block';
            }
        }

        function updateStockStatus() {
            const quantity = parseInt(document.getElementById('stockQuantity').value) || 0;
            const threshold = parseInt(document.getElementById('lowStockThreshold').value) || 5;
            const statusEl = document.getElementById('stockStatus');

            statusEl.className = 'stock-status';

            if (quantity === 0) {
                statusEl.classList.add('stock-out');
                statusEl.innerHTML = '<i class="fas fa-times-circle"></i> Out of Stock';
            } else if (quantity <= threshold) {
                statusEl.classList.add('stock-low');
                statusEl.innerHTML = '<i class="fas fa-exclamation-circle"></i> Low Stock';
            } else {
                statusEl.classList.add('stock-in');
                statusEl.innerHTML = '<i class="fas fa-check-circle"></i> In Stock';
            }
        }

        function setupImageUpload() {
            const imageInput = document.getElementById('imageInput');
            const uploadArea = document.getElementById('imageUploadArea');

            uploadArea.addEventListener('click', function() {
                imageInput.click();
            });

            imageInput.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);
                handleImageFiles(files);
            });

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, () => {
                    uploadArea.style.borderColor = 'var(--primary)';
                    uploadArea.style.background = 'rgba(37, 99, 235, 0.1)';
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, () => {
                    uploadArea.style.borderColor = '';
                    uploadArea.style.background = '';
                });
            });

            uploadArea.addEventListener('drop', function(e) {
                const files = e.dataTransfer.files;
                handleImageFiles(Array.from(files));
            });
        }

        function handleImageFiles(files) {
            const existingCount = document.querySelectorAll('.image-preview-item').length;

            files.forEach((file, index) => {
                if ((existingCount + uploadedImages.length) >= 10) {
                    showToast('Maximum 10 images allowed', 'error');
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    showToast('Please upload only image files', 'error');
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    showToast('Image size should be less than 5MB', 'error');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageId = Date.now() + index;
                    uploadedImages.push({
                        id: imageId,
                        file: file
                    });
                    renderNewImagePreviews();
                };
                reader.readAsDataURL(file);
            });
        }

        function renderNewImagePreviews() {
            const previewGrid = document.getElementById('imagePreviewGrid');
            previewGrid.innerHTML = '';

            uploadedImages.forEach((img, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'image-preview-item';
                    previewItem.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button class="remove-btn" onclick="removeNewImage(${img.id})" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    previewGrid.appendChild(previewItem);
                };
                reader.readAsDataURL(img.file);
            });
        }

        function removeNewImage(imageId) {
            uploadedImages = uploadedImages.filter(img => img.id !== imageId);
            renderNewImagePreviews();
        }

        function deleteExistingImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                deletedImages.push(imageId);
                document.querySelector(`[data-image-id="${imageId}"]`).remove();
                document.getElementById('deletedImagesHidden').value = JSON.stringify(deletedImages);
                showToast('Image will be deleted when you save', 'success');
            }
        }

        function setPrimaryImage(imageId) {
            // Update UI
            document.querySelectorAll('.image-preview-item').forEach(item => {
                item.classList.remove('primary-image');
                const badge = item.querySelector('.primary-badge');
                const btn = item.querySelector('.set-primary-btn');
                if (badge) badge.remove();
                if (btn) btn.remove();
            });

            const targetItem = document.querySelector(`[data-image-id="${imageId}"]`);
            targetItem.classList.add('primary-image');
            targetItem.innerHTML = targetItem.innerHTML.replace(
                /<button class="set-primary-btn".*?<\/button>/,
                '<span class="primary-badge">Primary</span>'
            );

            // Add hidden input for primary image
            let primaryInput = document.getElementById('primary_image_id');
            if (!primaryInput) {
                primaryInput = document.createElement('input');
                primaryInput.type = 'hidden';
                primaryInput.name = 'primary_image_id';
                primaryInput.id = 'primary_image_id';
                document.getElementById('productForm').appendChild(primaryInput);
            }
            primaryInput.value = imageId;

            showToast('Primary image updated', 'success');
        }

        function setupTags() {
            const tagInput = document.getElementById('tagInput');

            tagInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const tag = tagInput.value.trim();

                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        renderTags();
                        tagInput.value = '';
                        updateTagsHidden();
                    }
                }
            });
        }

        function removeTag(tag) {
            tags = tags.filter(t => t !== tag);
            renderTags();
            updateTagsHidden();
        }

        function renderTags() {
            const tagContainer = document.getElementById('tagContainer');
            const tagElements = tagContainer.querySelectorAll('.tag-item');
            tagElements.forEach(el => el.remove());

            tags.forEach(tag => {
                const tagElement = document.createElement('span');
                tagElement.className = 'tag-item';
                tagElement.innerHTML = `
                    ${tag}
                    <span class="remove-tag" onclick="removeTag('${tag}')">
                        <i class="fas fa-times"></i>
                    </span>
                `;
                tagContainer.insertBefore(tagElement, document.getElementById('tagInput'));
            });
        }

        function updateTagsHidden() {
            document.getElementById('tagsHidden').value = JSON.stringify(tags);
        }

        function addCompatibleModel() {
            const input = document.getElementById('compatibleModelInput');
            const model = input.value.trim();

            if (model && !compatibleModels.includes(model)) {
                compatibleModels.push(model);
                renderCompatibleModels();
                input.value = '';
                updateCompatibleModelsHidden();
            }
        }

        function removeCompatibleModel(model) {
            compatibleModels = compatibleModels.filter(m => m !== model);
            renderCompatibleModels();
            updateCompatibleModelsHidden();
        }

        function renderCompatibleModels() {
            const list = document.getElementById('compatibleList');
            list.innerHTML = '';

            compatibleModels.forEach(model => {
                const item = document.createElement('div');
                item.className = 'compatible-item';
                item.innerHTML = `
                    <span>${model}</span>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeCompatibleModel('${model}')">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                list.appendChild(item);
            });
        }

        function updateCompatibleModelsHidden() {
            document.getElementById('compatibleModelsHidden').value = JSON.stringify(compatibleModels);
        }

        function addBulkPricing() {
            bulkPricingCounter++;
            const item = {
                id: bulkPricingCounter,
                min_quantity: '',
                price: ''
            };
            bulkPricing.push(item);
            renderBulkPricing();
        }

        function removeBulkPricing(id) {
            bulkPricing = bulkPricing.filter(item => item.id !== id);
            renderBulkPricing();
        }

        function renderBulkPricing() {
            const list = document.getElementById('bulkPricingList');
            list.innerHTML = '';

            bulkPricing.forEach(item => {
                const div = document.createElement('div');
                div.className = 'spec-row mb-2';
                div.innerHTML = `
                    <div class="row g-2">
                        <div class="col-5">
                            <input type="number" class="form-control form-control-sm" 
                                   placeholder="Min Qty" 
                                   value="${item.min_quantity}"
                                   onchange="updateBulkPricingItem(${item.id}, 'min_quantity', this.value)">
                        </div>
                        <div class="col-5">
                            <input type="number" class="form-control form-control-sm" 
                                   placeholder="Price" step="0.01"
                                   value="${item.price}"
                                   onchange="updateBulkPricingItem(${item.id}, 'price', this.value)">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-danger w-100" onclick="removeBulkPricing(${item.id})">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;
                list.appendChild(div);
            });

            updateBulkPricingHidden();
        }

        function updateBulkPricingItem(id, field, value) {
            const item = bulkPricing.find(i => i.id === id);
            if (item) {
                item[field] = value;
                updateBulkPricingHidden();
            }
        }

        function updateBulkPricingHidden() {
            const data = bulkPricing.map(item => ({
                min_quantity: item.min_quantity,
                price: item.price
            }));
            document.getElementById('bulkPricingHidden').value = JSON.stringify(data);
        }

        function calculateAnalytics() {
            const regularPrice = parseFloat(document.getElementById('regularPrice').value) || 0;
            const salePrice = parseFloat(document.getElementById('salePrice').value) || 0;
            const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
            const taxRate = parseFloat(document.getElementById('taxRate').value) || 0;

            const currentPrice = salePrice > 0 ? salePrice : regularPrice;

            if (regularPrice > 0 && costPrice > 0) {
                const margin = ((regularPrice - costPrice) / regularPrice * 100).toFixed(2);
                document.getElementById('profitMargin').textContent = margin + '%';

                if (margin < 20) {
                    document.getElementById('profitMargin').style.color = 'var(--danger)';
                } else if (margin < 40) {
                    document.getElementById('profitMargin').style.color = 'var(--warning)';
                } else {
                    document.getElementById('profitMargin').style.color = 'var(--success)';
                }
            } else {
                document.getElementById('profitMargin').textContent = '—';
            }

            if (currentPrice > 0) {
                const priceWithGST = currentPrice + (currentPrice * taxRate / 100);
                document.getElementById('priceWithGST').textContent = '₹' + priceWithGST.toFixed(2);
            } else {
                document.getElementById('priceWithGST').textContent = '₹0.00';
            }
        }

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function handleFormSubmit(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            // Add new images
            uploadedImages.forEach((img, index) => {
                formData.append(`images[${index}]`, img.file);
            });

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast(data.message || 'Product updated successfully!', 'success');
                        setTimeout(() => {
                            window.location.href = data.redirect_url || '{{ route('dashboard.home') }}';
                        }, 1500);
                    } else {
                        throw new Error(data.message || 'Failed to update product');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Error: ' + error.message, 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                });
        }

        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerHTML = `
                <div class="toast-body d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle text-success' : 'fa-exclamation-circle text-danger'} me-2"></i>
                    ${message}
                </div>
            `;

            toastContainer.appendChild(toast);
            setTimeout(() => toast.remove(), 5000);
        }

        // Enter key handler
        document.getElementById('compatibleModelInput').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addCompatibleModel();
            }
        });
    </script>
</body>

</html>
