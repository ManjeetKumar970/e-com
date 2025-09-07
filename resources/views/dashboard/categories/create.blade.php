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

        .category-type-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .category-type-title {
            color: white;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .type-radio-group {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 15px;
        }

        .type-radio-item {
            flex: 1;
            min-width: 120px;
        }

        .type-radio-input {
            display: none;
        }

        .type-radio-label {
            display: block;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            padding: 15px 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        .type-radio-label:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .type-radio-input:checked + .type-radio-label {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .type-icon {
            font-size: 24px;
            margin-bottom: 8px;
            display: block;
        }

        .form-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }

        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1em;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
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

    <div class="main-container ">
        <div class="container card card-box md-5">
            <div class="card-body">
                <h5 class="card-title text-center">Create Category & Sub Category</h5>
            </div>
        </div>

        <div class="container card card-box mt-3 pd-20 mb-20">
            <form method="POST" action="{{ route('dashboard.categories.storeCategory') }}" enctype="multipart/form-data">
                @csrf

                {{-- Category Type Section --}}
                <div class="category-type-section">
                    <h6 class="category-type-title">Category Type *</h6>
                    <div class="type-radio-group">
                        <div class="type-radio-item">
                            <input type="radio" name="category_type" value="IT" id="type_it" class="type-radio-input" required>
                            <label for="type_it" class="type-radio-label">
                                <span class="type-icon">💻</span>
                                IT
                            </label>
                        </div>
                        <div class="type-radio-item">
                            <input type="radio" name="category_type" value="Pager" id="type_pager" class="type-radio-input">
                            <label for="type_pager" class="type-radio-label">
                                <span class="type-icon">📟</span>
                                Pager
                            </label>
                        </div>
                        <div class="type-radio-item">
                            <input type="radio" name="category_type" value="Other" id="type_other" class="type-radio-input">
                            <label for="type_other" class="type-radio-label">
                                <span class="type-icon">📋</span>
                                Other
                            </label>
                        </div>
                    </div>
                </div>

                {{-- Basic Information Section --}}
                <div class="form-section">
                    <h6 class="section-title">Basic Information</h6>
                    
                    <div class="row mb-4">
                        {{-- Name --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="name" class="form-control" type="text" placeholder="Category Name" required />
                                <label>Category Name *</label>
                            </div>
                        </div>

                        {{-- Slug --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="slug" class="form-control" type="text" placeholder="Category Slug" />
                                <label>Category Slug (optional, auto-generated if empty)</label>
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <textarea name="description" class="form-control" placeholder="Category Description" style="height: 100px;"></textarea>
                                <label>Description</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Media Section --}}
                <div class="form-section">
                    <h6 class="section-title">Media Files</h6>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Icon</label>
                            <input type="file" name="icon" class="form-control" accept="image/*" />
                        </div>
                    </div>
                </div>

                {{-- Category Settings Section --}}
                <div class="form-section">
                    <h6 class="section-title">Category Settings</h6>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="">-- None (Main Category) --</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sort Order --}}
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="sort_order" class="form-control" type="number" value="0" />
                                <label>Sort Order</label>
                            </div>
                        </div>
                    </div>

                    {{-- Active & Show in Menu --}}
                    <div class="row mb-4">
                        <div class="col-md-6 form-check" style="padding-left: 40px;">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                        <div class="col-md-6 form-check" style="padding-left: 40px;">
                            <input type="checkbox" name="show_in_menu" class="form-check-input" id="show_in_menu">
                            <label class="form-check-label" for="show_in_menu">Show in Menu</label>
                        </div>
                    </div>
                </div>

                {{-- SEO Section --}}
                <div class="form-section">
                    <h6 class="section-title">SEO Settings</h6>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="meta_title" class="form-control" type="text" placeholder="Meta Title" />
                                <label>Meta Title</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <textarea name="meta_description" class="form-control" placeholder="Meta Description" style="height: 80px;"></textarea>
                                <label>Meta Description</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>
                            Create Category
                        </button>
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

    <script>
        // Auto-generate slug from name
        document.querySelector('input[name="name"]').addEventListener('input', function() {
            const name = this.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.querySelector('input[name="slug"]').value = slug;
        });

        // Add visual feedback for form sections
        document.querySelectorAll('.form-control, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-section').style.borderLeftColor = '#28a745';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.form-section').style.borderLeftColor = '#007bff';
            });
        });
    </script>
</body>

</html>