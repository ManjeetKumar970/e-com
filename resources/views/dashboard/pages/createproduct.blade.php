<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product - Barcode & IT Solutions</title>
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

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            padding-top: 2rem;
            border-top: 2px solid var(--gray-200);
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

    <body>
        <div class="main-container">
            <div class="container">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>
                            <div class="icon">
                                <i class="fas fa-barcode"></i>
                            </div>
                            Create New Product
                        </h1>
                        <a href="#" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Products
                        </a>
                    </div>
                </div>

                <form id="productForm" enctype="multipart/form-data" method="POST">
                    <!-- CSRF Token for Laravel (uncomment if using Laravel) -->
                    @csrf

                    <div class="two-column-layout">
                        <!-- Main Content -->
                        <div>
                            <!-- Product Type Selection -->
                            <div class="form-card">
                                <div class="section-title">
                                    <i class="fas fa-layer-group"></i>
                                    Select Product Type
                                </div>

                                <div class="product-type-selector">
                                    <div class="type-card" data-type="printer">
                                        <i class="fas fa-print"></i>
                                        <h6>Printer</h6>
                                        <p class="small-text mb-0">Thermal/Barcode Printer</p>
                                    </div>
                                    <div class="type-card" data-type="scanner">
                                        <i class="fas fa-barcode"></i>
                                        <h6>Scanner</h6>
                                        <p class="small-text mb-0">Barcode Scanner</p>
                                    </div>
                                    <div class="type-card" data-type="paper">
                                        <i class="fas fa-scroll"></i>
                                        <h6>Paper/Roll</h6>
                                        <p class="small-text mb-0">Thermal Roll/Paper</p>
                                    </div>
                                    <div class="type-card" data-type="ribbon">
                                        <i class="fas fa-tape"></i>
                                        <h6>Ribbon</h6>
                                        <p class="small-text mb-0">Barcode Ribbon</p>
                                    </div>
                                    <div class="type-card" data-type="accessory">
                                        <i class="fas fa-plug"></i>
                                        <h6>Accessory</h6>
                                        <p class="small-text mb-0">Cables & Parts</p>
                                    </div>
                                    <div class="type-card" data-type="other">
                                        <i class="fas fa-box"></i>
                                        <h6>Other IT</h6>
                                        <p class="small-text mb-0">General IT Products</p>
                                    </div>
                                </div>
                                <input type="hidden" name="product_type" id="productType" required>
                                <div class="invalid-feedback">Please select a product type</div>
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
                                            placeholder="e.g., Thermal Printer 80mm USB + LAN" required>
                                        <div class="invalid-feedback">Please provide a product name</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="productSKU" class="form-label">
                                            SKU <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="productSKU" name="sku"
                                            placeholder="AUTO-GENERATED" required readonly>
                                        <div class="invalid-feedback">SKU is required</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label">
                                            Category <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" id="category" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a category</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="brand" class="form-label">Brand <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="brand" name="brand"
                                            placeholder="e.g., TVS, Zebra, Honeywell" required>
                                        <div class="invalid-feedback">Please provide a brand name</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="modelNumber" class="form-label">Model Number</label>
                                        <input type="text" class="form-control" id="modelNumber"
                                            name="model_number" placeholder="e.g., RP-80USE">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="manufacturer" class="form-label">Manufacturer</label>
                                        <input type="text" class="form-control" id="manufacturer"
                                            name="manufacturer" placeholder="Manufacturing company">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="shortDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="shortDescription" name="short_description" rows="2"
                                        placeholder="Brief product description (max 500 characters)" maxlength="500"></textarea>
                                    <small class="text-muted">
                                        <span id="charCount">0</span>/500 characters
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="fullDescription" class="form-label">Full Description</label>
                                    <textarea class="form-control" id="fullDescription" name="description" rows="6"
                                        placeholder="Detailed product description, features, and benefits..."></textarea>
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
                                                name="regular_price" placeholder="0.00" step="0.01"
                                                min="0" required>
                                            <div class="invalid-feedback">Please provide a valid price</div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <div class="price-input-group">
                                            <span class="currency-symbol">₹</span>
                                            <input type="number" class="form-control" id="salePrice"
                                                name="sale_price" placeholder="0.00" step="0.01" min="0">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="costPrice" class="form-label">Cost Price (Purchase)</label>
                                        <div class="price-input-group">
                                            <span class="currency-symbol">₹</span>
                                            <input type="number" class="form-control" id="costPrice"
                                                name="cost_price" placeholder="0.00" step="0.01" min="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="hsnCode" class="form-label">HSN/SAC Code</label>
                                        <input type="text" class="form-control" id="hsnCode" name="hsn_code"
                                            placeholder="e.g., 84433210">
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="taxRate" class="form-label">GST Rate (%)</label>
                                        <select class="form-select" id="taxRate" name="tax_rate">
                                            <option value="0">0%</option>
                                            <option value="5">5%</option>
                                            <option value="12">12%</option>
                                            <option value="18" selected>18%</option>
                                            <option value="28">28%</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="barcode" class="form-label">Product Barcode</label>
                                        <input type="text" class="form-control" id="barcode" name="barcode"
                                            placeholder="EAN/UPC barcode">
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="isTaxable" name="is_taxable"
                                        checked>
                                    <label class="form-check-label" for="isTaxable">
                                        This product is taxable (GST applicable)
                                    </label>
                                </div>
                            </div>

                            <!-- Technical Specifications -->
                            <div class="form-card" id="techSpecsSection" style="display: none;">
                                <div class="section-title">
                                    <i class="fas fa-cog"></i>
                                    Technical Specifications
                                </div>

                                <!-- Printer Specs -->
                                <div id="printerSpecs" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="connectivity" class="form-label">Connectivity</label>
                                            <select class="form-select" name="connectivity">
                                                <option value="">Select</option>
                                                <option value="USB">USB</option>
                                                <option value="USB + LAN">USB + LAN</option>
                                                <option value="USB + WiFi">USB + WiFi</option>
                                                <option value="Bluetooth">Bluetooth</option>
                                                <option value="USB + LAN + WiFi">USB + LAN + WiFi</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="interfaceType" class="form-label">Interface Type</label>
                                            <select class="form-select" name="interface_type">
                                                <option value="">Select</option>
                                                <option value="USB 2.0">USB 2.0</option>
                                                <option value="USB 3.0">USB 3.0</option>
                                                <option value="Serial">Serial Port</option>
                                                <option value="Parallel">Parallel Port</option>
                                                <option value="Ethernet">Ethernet RJ45</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="printWidth" class="form-label">Print Width</label>
                                            <select class="form-select" name="print_width">
                                                <option value="">Select</option>
                                                <option value="58mm">58mm (2 inch)</option>
                                                <option value="80mm">80mm (3 inch)</option>
                                                <option value="110mm">110mm (4 inch)</option>
                                                <option value="A4">A4</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="resolution" class="form-label">Resolution (DPI)</label>
                                            <select class="form-select" name="resolution">
                                                <option value="">Select</option>
                                                <option value="203 DPI">203 DPI</option>
                                                <option value="300 DPI">300 DPI</option>
                                                <option value="600 DPI">600 DPI</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="printSpeed" class="form-label">Print Speed</label>
                                            <input type="text" class="form-control" name="print_speed"
                                                placeholder="e.g., 250mm/sec">
                                        </div>
                                    </div>
                                </div>

                                <!-- Scanner Specs -->
                                <div id="scannerSpecs" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="scanType" class="form-label">Scanner Type</label>
                                            <select class="form-select" name="scan_type">
                                                <option value="">Select</option>
                                                <option value="1D">1D Barcode Scanner</option>
                                                <option value="2D">2D Barcode Scanner</option>
                                                <option value="QR">QR Code Scanner</option>
                                                <option value="1D + 2D">1D + 2D Scanner</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="scanConnectivity" class="form-label">Connectivity</label>
                                            <select class="form-select" name="connectivity">
                                                <option value="">Select</option>
                                                <option value="USB">USB Wired</option>
                                                <option value="Bluetooth">Bluetooth Wireless</option>
                                                <option value="2.4GHz Wireless">2.4GHz Wireless</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Paper/Roll Specs -->
                                <div id="paperSpecs" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="paperSize" class="form-label">Paper/Roll Size</label>
                                            <select class="form-select" name="paper_size">
                                                <option value="">Select</option>
                                                <option value="57mm x 25mm">57mm x 25mm</option>
                                                <option value="57mm x 40mm">57mm x 40mm</option>
                                                <option value="80mm x 50mm">80mm x 50mm</option>
                                                <option value="80mm x 80mm">80mm x 80mm</option>
                                                <option value="110mm x 100mm">110mm x 100mm</option>
                                                <option value="A4">A4 (210mm x 297mm)</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="paperType" class="form-label">Paper Type</label>
                                            <select class="form-select" name="paper_type">
                                                <option value="">Select</option>
                                                <option value="Thermal">Thermal Paper</option>
                                                <option value="Bond">Bond Paper</option>
                                                <option value="Pre-printed">Pre-printed</option>
                                                <option value="Self-adhesive">Self-adhesive Label</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="rollLength" class="form-label">Roll Length (m)</label>
                                            <input type="number" class="form-control" name="roll_length"
                                                placeholder="e.g., 25">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="rollDiameter" class="form-label">Roll Diameter (mm)</label>
                                            <input type="number" class="form-control" name="roll_diameter"
                                                placeholder="e.g., 50">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="coreSize" class="form-label">Core Size (mm)</label>
                                            <select class="form-select" name="core_size">
                                                <option value="">Select</option>
                                                <option value="12">12mm</option>
                                                <option value="25">25mm</option>
                                                <option value="38">38mm</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="gsm" class="form-label">GSM (Weight)</label>
                                            <input type="text" class="form-control" name="gsm"
                                                placeholder="e.g., 55 GSM">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="sheetsPerPack" class="form-label">Sheets per Pack</label>
                                            <input type="number" class="form-control" name="sheets_per_pack"
                                                placeholder="For A4 paper">
                                        </div>
                                    </div>
                                </div>

                                <!-- Ribbon Specs -->
                                <div id="ribbonSpecs" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="ribbonType" class="form-label">Ribbon Type</label>
                                            <select class="form-select" name="ribbon_type">
                                                <option value="">Select</option>
                                                <option value="Wax">Wax Ribbon</option>
                                                <option value="Resin">Resin Ribbon</option>
                                                <option value="Wax-Resin">Wax-Resin Mix</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="ribbonSize" class="form-label">Ribbon Size</label>
                                            <select class="form-select" name="ribbon_size">
                                                <option value="">Select</option>
                                                <option value="110mm x 300m">110mm x 300m</option>
                                                <option value="110mm x 450m">110mm x 450m</option>
                                                <option value="64mm x 300m">64mm x 300m</option>
                                                <option value="84mm x 300m">84mm x 300m</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Compatibility (for consumables) -->
                            <div class="form-card" id="compatibilitySection" style="display: none;">
                                <div class="section-title">
                                    <i class="fas fa-link"></i>
                                    Compatible Devices
                                </div>

                                <div class="info-box">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Info:</strong> Select which printers/devices this consumable is compatible
                                    with.
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Add Compatible Models</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="compatibleModelInput"
                                            placeholder="Enter printer model (e.g., TVS RP-80USE)">
                                        <button class="btn btn-primary" type="button"
                                            onclick="addCompatibleModel()">
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
                                            name="stock_quantity" placeholder="0" value="0" min="0"
                                            required>
                                        <div class="invalid-feedback">Please provide stock quantity</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="lowStockThreshold" class="form-label">Low Stock Alert</label>
                                        <input type="number" class="form-control" id="lowStockThreshold"
                                            name="low_stock_threshold" placeholder="5" value="5"
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
                                            value="1" min="1">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="maxOrderQty" class="form-label">Maximum Order Quantity</label>
                                        <input type="number" class="form-control" name="maximum_order_quantity"
                                            placeholder="Leave blank for unlimited" min="1">
                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="trackInventory"
                                        name="track_inventory" checked>
                                    <label class="form-check-label" for="trackInventory">
                                        Track inventory for this product
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="allowBackorder"
                                        name="allow_backorder">
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

                                <div class="image-upload-area" id="imageUploadArea">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h6>Click to upload images</h6>
                                    <p class="text-muted mb-0">or drag and drop</p>
                                    <small class="text-muted">PNG, JPG up to 5MB (Max 10 images)</small>
                                    <input type="file" id="imageInput" name="images[]" multiple accept="image/*"
                                        style="display: none;">
                                </div>

                                <div class="image-preview-grid" id="imagePreviewGrid"></div>
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
                                        <input type="number" class="form-control" name="weight" placeholder="0.00"
                                            step="0.01" min="0">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="length" class="form-label">Length (cm)</label>
                                        <input type="number" class="form-control" name="length" placeholder="0"
                                            step="0.1" min="0">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="width" class="form-label">Width (cm)</label>
                                        <input type="number" class="form-control" name="width" placeholder="0"
                                            step="0.1" min="0">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="height" class="form-label">Height (cm)</label>
                                        <input type="number" class="form-control" name="height" placeholder="0"
                                            step="0.1" min="0">
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="freeShipping"
                                        name="free_shipping">
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
                                        <label for="warrantyPeriod" class="form-label">Warranty Period
                                            (months)</label>
                                        <input type="number" class="form-control" name="warranty_period"
                                            placeholder="e.g., 12" min="0">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="warrantyType" class="form-label">Warranty Type</label>
                                        <select class="form-select" name="warranty_type">
                                            <option value="manufacturer">Manufacturer Warranty</option>
                                            <option value="seller">Seller Warranty</option>
                                            <option value="none">No Warranty</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="warrantyDetails" class="form-label">Warranty Details</label>
                                    <textarea class="form-control" name="warranty_details" rows="3"
                                        placeholder="Describe warranty terms and conditions..."></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="productManual" class="form-label">Product Manual URL</label>
                                        <input type="url" class="form-control" name="product_manual_url"
                                            placeholder="https://...">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="driverDownload" class="form-label">Driver Download URL</label>
                                        <input type="url" class="form-control" name="driver_download_url"
                                            placeholder="https://...">
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
                                    <label for="packageContents" class="form-label">Package Contents (What's in the
                                        box)</label>
                                    <textarea class="form-control" name="package_contents" rows="3"
                                        placeholder="e.g., 1x Printer, 1x USB Cable, 1x Power Adapter, 1x User Manual"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="usageInstructions" class="form-label">Usage Instructions</label>
                                    <textarea class="form-control" name="usage_instructions" rows="3" placeholder="How to use this product..."></textarea>
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
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                        <option value="archived">Archived</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="visibility" class="form-label">Visibility</label>
                                    <select class="form-select" name="visibility">
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                        <option value="hidden">Hidden from catalog</option>
                                    </select>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" checked>
                                    <label class="form-check-label">
                                        <strong>Active</strong>
                                    </label>
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="is_featured">
                                    <label class="form-check-label">
                                        <strong>Featured Product</strong>
                                    </label>
                                    <small class="d-block text-muted">Show on homepage</small>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_new_arrival">
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
                                    <input class="form-check-input" type="checkbox" id="enableBulkPricing">
                                    <label class="form-check-label" for="enableBulkPricing">
                                        Enable bulk pricing
                                    </label>
                                </div>

                                <div id="bulkPricingSection" style="display: none;">
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
                                <button type="button" class="btn btn-secondary w-100 mb-2" onclick="saveAsDraft()">
                                    <i class="fas fa-save"></i> Save as Draft
                                </button>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-check"></i> Publish Product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('dashboard.partials.messagemode')
        <!-- welcome modal end -->

        <!-- js -->
        @include('dashboard.footer.footer')
        <!-- Toast Container -->
        <div class="toast-container" id="toastContainer"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
        <script>
            // Global variables
            let uploadedImages = [];
            let tags = [];
            let compatibleModels = [];
            let bulkPricing = [];
            let bulkPricingCounter = 0;

            // Initialize when DOM is loaded
            document.addEventListener('DOMContentLoaded', function() {
                initializeForm();
            });

            function initializeForm() {
                // Auto-generate SKU
                generateSKU();

                // Set up event listeners
                setupEventListeners();

                // Initialize stock status
                updateStockStatus();
            }

            function generateSKU() {
                const timestamp = Date.now().toString(36).toUpperCase();
                const random = Math.random().toString(36).substring(2, 5).toUpperCase();
                document.getElementById('productSKU').value = `PRD-${timestamp}${random}`;
            }

            function setupEventListeners() {
                // Product Type Selection
                document.querySelectorAll('.type-card').forEach(card => {
                    card.addEventListener('click', function() {
                        document.querySelectorAll('.type-card').forEach(c => c.classList.remove('active'));
                        this.classList.add('active');

                        const type = this.dataset.type;
                        document.getElementById('productType').value = type;

                        // Show/hide relevant specs
                        toggleSpecSections(type);
                    });
                });

                // Character counters
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

                // Price validation
                document.getElementById('salePrice').addEventListener('input', validateSalePrice);

                // Form submission
                document.getElementById('productForm').addEventListener('submit', handleFormSubmit);

                // Keyboard shortcuts
                document.addEventListener('keydown', function(e) {
                    if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                        e.preventDefault();
                        saveAsDraft();
                    }
                });
            }

            function toggleSpecSections(type) {
                document.getElementById('techSpecsSection').style.display = 'block';
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
                const previewGrid = document.getElementById('imagePreviewGrid');
                const uploadArea = document.getElementById('imageUploadArea');

                // Click to upload
                uploadArea.addEventListener('click', function() {
                    imageInput.click();
                });

                // File selection
                imageInput.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    handleImageFiles(files);
                });

                // Drag and drop
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
                files.forEach((file, index) => {
                    if (uploadedImages.length >= 10) {
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
                        renderImagePreviews();
                    };
                    reader.readAsDataURL(file);
                });
            }

            function removeImage(imageId) {
                uploadedImages = uploadedImages.filter(img => img.id !== imageId);
                renderImagePreviews();
            }

            function renderImagePreviews() {
                const previewGrid = document.getElementById('imagePreviewGrid');
                previewGrid.innerHTML = '';

                uploadedImages.forEach((img, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'image-preview-item';
                        previewItem.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        ${index === 0 ? '<span class="primary-badge">Primary</span>' : ''}
                        <button class="remove-btn" onclick="removeImage(${img.id})" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                        previewGrid.appendChild(previewItem);
                    };
                    reader.readAsDataURL(img.file);
                });
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

            // Compatible Models
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

            // Bulk Pricing
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

                // Calculate profit margin
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
                    document.getElementById('profitMargin').style.color = '';
                }

                // Calculate price with GST
                if (currentPrice > 0) {
                    const priceWithGST = currentPrice + (currentPrice * taxRate / 100);
                    document.getElementById('priceWithGST').textContent = '₹' + priceWithGST.toFixed(2);
                } else {
                    document.getElementById('priceWithGST').textContent = '₹0.00';
                }
            }

            function validateSalePrice(e) {
                const regularPrice = parseFloat(document.getElementById('regularPrice').value) || 0;
                const salePrice = parseFloat(e.target.value) || 0;

                if (salePrice > regularPrice && regularPrice > 0) {
                    e.target.setCustomValidity('Sale price cannot be greater than regular price');
                    e.target.classList.add('is-invalid');
                } else {
                    e.target.setCustomValidity('');
                    e.target.classList.remove('is-invalid');
                }
            }

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            function handleFormSubmit(e) {
                e.preventDefault();

                // Reset validation
                const form = e.target;
                form.classList.remove('was-validated');
                const invalidFields = form.querySelectorAll('.is-invalid');
                invalidFields.forEach(field => field.classList.remove('is-invalid'));

                // Validate required fields
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                        field.classList.add('is-valid');
                    }
                });

                // Check if product type is selected
                const productType = document.getElementById('productType').value;
                if (!productType) {
                    isValid = false;
                    document.getElementById('productType').classList.add('is-invalid');
                    showToast('Please select a product type', 'error');
                }

                if (!isValid) {
                    // Scroll to first error
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                    showToast('Please fill all required fields', 'error');
                    return;
                }

                // Prepare form data
                const formData = new FormData(form);

                // Add dynamic data
                formData.set('tags', JSON.stringify(tags));
                formData.set('compatible_models', JSON.stringify(compatibleModels));
                formData.set('bulk_pricing', JSON.stringify(bulkPricing));

                // Add images
                uploadedImages.forEach((img, index) => {
                    formData.append(`images[${index}]`, img.file);
                });

                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Product...';

                // Submit form data
                submitFormData(formData, submitBtn, originalText);
            }

            function submitFormData(formData, submitBtn, originalText) {
                // Use your actual route - make sure it's POST method
                const url = '{{ route('dashboard.createproduct') }}'

                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            // CSRF token will be automatically included by Laravel if you have the meta tag
                            // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            showToast(data.message || 'Product created successfully!', 'success');

                            // Redirect after success
                            setTimeout(() => {
                                window.location.href = data.redirect_url || '/products';
                            }, 2000);
                        } else {
                            // Handle validation errors or other errors
                            if (data.errors) {
                                const errorMessages = Object.values(data.errors).flat().join(', ');
                                throw new Error(errorMessages);
                            }
                            throw new Error(data.message || 'Failed to create product');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Error creating product: ' + error.message, 'error');
                    })
                    .finally(() => {
                        // Always re-enable the button
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                    });
            }

            function saveAsDraft() {
                const form = document.getElementById('productForm');
                const formData = new FormData(form);

                // Set status to draft
                formData.set('status', 'draft');

                // Add dynamic data
                formData.set('tags', JSON.stringify(tags));
                formData.set('compatible_models', JSON.stringify(compatibleModels));
                formData.set('bulk_pricing', JSON.stringify(bulkPricing));

                // Add images
                uploadedImages.forEach((img, index) => {
                    formData.append(`images[${index}]`, img.file);
                });

                console.log('Saving draft:', Object.fromEntries(formData));
                showToast('Draft saved successfully!', 'success');
            }

            function showToast(message, type = 'success') {
                const toastContainer = document.getElementById('toastContainer');
                const toast = document.createElement('div');
                toast.className = `toast ${type === 'error' ? 'error' : ''}`;
                toast.innerHTML = `
                <div class="toast-body d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle text-success' : 'fa-exclamation-circle text-danger'} me-2"></i>
                    ${message}
                </div>
            `;

                toastContainer.appendChild(toast);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }

            // Add Enter key handler for compatible models
            document.getElementById('compatibleModelInput').addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addCompatibleModel();
                }
            });
        </script>
    </body>

</html>
