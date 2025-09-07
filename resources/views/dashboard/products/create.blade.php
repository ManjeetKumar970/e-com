<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<head>
    <!-- Add Dropzone CSS -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" />
    <style>
        .dropzone {
            border: 2px dashed #ced4da;
            border-radius: 0.375rem;
            background: #f8f9fa;
            min-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .dropzone .dz-message {
            text-align: center;
            margin: 0;
        }

        .dz-preview .dz-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dz-details,
        .dz-progress,
        .dz-success-mark,
        .dz-error-mark {
            display: none;
        }

        .category-checkbox {
            margin: 5px 0;
        }

        .form-section {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }

        .form-section h6 {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 15px;
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
        <div class="container card card-box md-5">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">Add New Product</h5>
            </div>
        </div>

        <div class="container card card-box mt-3 pd-20 mb-20">
            <form id="product-form" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Basic Product Information -->
                <div class="form-section">
                    <h6><i class="fas fa-info-circle"></i> Basic Information</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating form-group">
                                <input name="name" id="product-name" class="form-control" type="text" placeholder="Product Name" required />
                                <label>Product Name *</label>
                                <div class="invalid-feedback">Please provide a product name.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="slug" id="product-slug" class="form-control" type="text" placeholder="URL Slug" readonly />
                                <label>URL Slug (Auto-generated)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="sku" class="form-control" type="text" placeholder="Product SKU" required />
                                <label>SKU (Product Code) *</label>
                                <div class="invalid-feedback">Please provide a unique SKU.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                                <label>Status *</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  Size    -->
                <div class="form-section">
                    <h6><i class="fas fa-info-circle"></i>Size decription</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating form-group">
                                <input name="name" id="product-name" class="form-control" type="text" placeholder="Product Name" required />
                                <label>Product Size *</label>
                                <div class="invalid-feedback">Please provide a product Size.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="core" id="core" class="form-control" type="text" placeholder="Core"  />
                                <label>Core</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="paper_color" class="form-control" type="text" placeholder="Product Color" required />
                                <label>Paper Color *</label>
                                <div class="invalid-feedback">Please provide a Paper Color.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="paper_type" class="form-control" type="text" placeholder="Paper Type" required />
                                <label>Paper Type *</label>
                                <div class="invalid-feedback">Please provide a Type.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Information -->
                <div class="form-section">
                    <h6><i class="fas fa-dollar-sign"></i> Pricing & Inventory</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="price" class="form-control" type="number" step="0.01" min="0" placeholder="Regular Price" required />
                                <label>Regular Price * ($)</label>
                                <div class="invalid-feedback">Please provide a valid price.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="sale_price" class="form-control" type="number" step="0.01" min="0" placeholder="Sale Price" />
                                <label>Sale Price ($)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="stock_quantity" class="form-control" type="number" min="0" placeholder="Stock Quantity" value="0" />
                                <label>Stock Quantity</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="form-section">
                    <h6><i class="fas fa-tags"></i> Categories</h6>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label">Select Categories *</label>
                            <div class="border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                                @php
                                    $categories = \App\Models\Dashboard\Category::active()
                                        ->orderBy('name')
                                        ->get()
                                        ->groupBy('parent_id');
                                @endphp
                                
                                @if($categories->has(null))
                                    @foreach($categories[null] as $mainCategory)
                                        <div class="category-checkbox">
                                            <input type="checkbox" name="categories[]" value="{{ $mainCategory->id }}" 
                                                   id="cat_{{ $mainCategory->id }}" class="form-check-input">
                                            <label for="cat_{{ $mainCategory->id }}" class="form-check-label fw-bold">
                                                {{ $mainCategory->name }}
                                            </label>
                                        </div>
                                        
                                        @if($categories->has($mainCategory->id))
                                            @foreach($categories[$mainCategory->id] as $subCategory)
                                                <div class="category-checkbox ms-4">
                                                    <input type="checkbox" name="categories[]" value="{{ $subCategory->id }}" 
                                                           id="cat_{{ $subCategory->id }}" class="form-check-input">
                                                    <label for="cat_{{ $subCategory->id }}" class="form-check-label">
                                                        └ {{ $subCategory->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @else
                                    <div class="text-muted text-center">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        No categories available. Please create categories first.
                                        <br>
                                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary mt-2">
                                            Create Categories
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <small class="text-muted">Select at least one category. First selected will be primary category.</small>
                        </div>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="form-section">
                    <h6><i class="fas fa-align-left"></i> Product Description</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="short_description" class="form-control" placeholder="Short Description" style="height: 100px"></textarea>
                                <label>Short Description</label>
                                <small class="text-muted">Brief description for product listings</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="description" class="form-control" placeholder="Detailed Description" style="height: 100px"></textarea>
                                <label>Detailed Description</label>
                                <small class="text-muted">Full product details</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Images -->
                <div class="form-section">
                    <h6><i class="fas fa-images"></i> Product Images</h6>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropzone" id="myDropzone">
                                <div class="dz-message">
                                    <i class="fas fa-cloud-upload-alt fa-3x mb-2"></i>
                                    <p>Drop images here or click to upload</p>
                                    <small class="text-muted">Upload multiple product images (Max: 2MB each)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Options -->
                <div class="form-section">
                    <h6><i class="fas fa-cogs"></i> Additional Options</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="is_active">
                                <label class="form-check-label" for="is_active">
                                    <strong>Product Active</strong>
                                    <small class="d-block text-muted">Show this product on website</small>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured">
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured Product</strong>
                                    <small class="d-block text-muted">Display in featured sections</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="weight" class="form-control" type="number" step="0.01" min="0" placeholder="Weight" />
                                <label>Weight (kg)</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row mt-4">
                    <div class="col-12">
                        <button id="submit-all" type="button" class="btn btn-success btn-lg btn-block">
                            <i class="fas fa-save"></i> Create Product
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg ms-2">
                            <i class="fas fa-arrow-left"></i> Back to Products
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

    <!-- Add Dropzone JS -->
    <script>
        // Auto-generate slug from product name
        document.getElementById('product-name').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            document.getElementById('product-slug').value = slug;
        });

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "{{ route('products.store') }}", // Not used directly
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFilesize: 2,
            acceptedFiles: 'image/*',
            paramName: 'images[]',
            addRemoveLinks: true,
            dictDefaultMessage: "Drop images here or click to upload",
            dictRemoveFile: "Remove",
            dictFileTooBig: "File is too big (max 2MB)",
            dictInvalidFileType: "Invalid file type. Only images allowed."
        });

        function validateForm(form) {
            // List all required fields
            const requiredFields = [
                'name',
                'sku', 
                'price',
                'status'
            ];

            // Check each required field
            for (let fieldName of requiredFields) {
                let field = form.querySelector('[name="' + fieldName + '"]');

                if (!field || !field.value.trim()) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: `Please fill the ${fieldName.replace('_', ' ')} field.`
                    });
                    if (field) field.focus();
                    return false;
                }

                // Additional validation for specific fields
                if (fieldName === 'price' && (isNaN(field.value) || parseFloat(field.value) <= 0)) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: "Please enter a valid price."
                    });
                    field.focus();
                    return false;
                }
            }

            // Check if at least one category is selected
            const categoryCheckboxes = form.querySelectorAll('input[name="categories[]"]:checked');
            if (categoryCheckboxes.length === 0) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "warning",
                    title: "Please select at least one category."
                });
                return false;
            }

            return true;
        }

        document.getElementById("submit-all").addEventListener("click", function(e) {
            e.preventDefault();
            var form = document.getElementById("product-form");

            // Validate form first
            if (!validateForm(form)) {
                return;
            }

            // Show loading state
            const submitButton = this;
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Product...';
            submitButton.disabled = true;

            var formData = new FormData(form);
            
            // Add images from dropzone
            myDropzone.getAcceptedFiles().forEach((file, index) => {
                formData.append('images[]', file);
            });

            fetch("{{ route('products.store') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: data.message || "Product created successfully!"
                    });

                    // Reset form and dropzone
                    myDropzone.removeAllFiles();
                    form.reset();
                    
                    // Redirect to products list after delay
                    setTimeout(() => {
                        window.location.href = "{{ route('products.index') }}";
                    }, 2000);
                })
                .catch(error => {
                    console.error("Upload failed:", error);
                    
                    // Handle validation errors
                    if (error.errors) {
                        let errorMessages = [];
                        for (let field in error.errors) {
                            errorMessages = errorMessages.concat(error.errors[field]);
                        }
                        
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: errorMessages.join('<br>')
                        });
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: error.message || "Failed to create product. Please try again."
                        });
                    }
                })
                .finally(() => {
                    // Reset button state
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                });
        });

        // Sale price validation - should be less than regular price
        document.querySelector('[name="sale_price"]').addEventListener('input', function() {
            const regularPrice = parseFloat(document.querySelector('[name="price"]').value);
            const salePrice = parseFloat(this.value);
            
            if (salePrice && regularPrice && salePrice >= regularPrice) {
                this.setCustomValidity('Sale price must be less than regular price');
                this.reportValidity();
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>

</html>