<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<head>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        
        .icon-preview {
            font-size: 1.2rem;
            margin-left: 0.5rem;
        }
        
        .conditional-field {
            display: none;
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
        }
        
        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #dee2e6;
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
            <div class="card card-box">
                <div class="card-header">
                    <h4 class="card-title">Edit Navbar Item</h4>
                    <a href="{{ route('navbar.index') }}" class="btn btn-secondary btn-sm float-end">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('navbar.update', $navbar->id) }}" method="POST" id="navbarForm">
                        @csrf
                        @method('PUT')
                        
                        {{-- Basic Information Section --}}
                        <div class="form-section">
                            <h5 class="section-title">Basic Information</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title', $navbar->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                        <select class="form-control @error('type') is-invalid @enderror" 
                                                id="type" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="link" {{ old('type', $navbar->type) == 'link' ? 'selected' : '' }}>Link</option>
                                            <option value="dropdown" {{ old('type', $navbar->type) == 'dropdown' ? 'selected' : '' }}>Dropdown</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="parent_id" class="form-label">Parent Item</label>
                                        <select class="form-control @error('parent_id') is-invalid @enderror" 
                                                id="parent_id" name="parent_id">
                                            <option value="">No Parent (Top Level)</option>
                                            @foreach($parentItems as $parentItem)
                                                <option value="{{ $parentItem->id }}" 
                                                        {{ old('parent_id', $navbar->parent_id) == $parentItem->id ? 'selected' : '' }}>
                                                    {{ $parentItem->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sort_order" class="form-label">Sort Order</label>
                                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                               id="sort_order" name="sort_order" value="{{ old('sort_order', $navbar->sort_order) }}" min="0">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Link Configuration Section --}}
                        <div class="form-section">
                            <h5 class="section-title">Link Configuration</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="url-field">
                                        <label for="url" class="form-label">URL</label>
                                        <input type="url" class="form-control @error('url') is-invalid @enderror" 
                                               id="url" name="url" value="{{ old('url', $navbar->url) }}" 
                                               placeholder="https://example.com or /internal/path">
                                        @error('url')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group" id="category-field">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" 
                                                id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" 
                                                        {{ old('category_id', $navbar->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="target" class="form-label">Target</label>
                                        <select class="form-control @error('target') is-invalid @enderror" 
                                                id="target" name="target">
                                            <option value="_self" {{ old('target', $navbar->target) == '_self' ? 'selected' : '' }}>Same Window</option>
                                            <option value="_blank" {{ old('target', $navbar->target) == '_blank' ? 'selected' : '' }}>New Window</option>
                                        </select>
                                        @error('target')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon" class="form-label">Icon (Font Awesome)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                                                   id="icon" name="icon" value="{{ old('icon', $navbar->icon) }}" 
                                                   placeholder="fa fa-home or fas fa-home">
                                            <span class="input-group-text">
                                                <i id="icon-preview" class="icon-preview {{ $navbar->icon }}"></i>
                                            </span>
                                        </div>
                                        <small class="form-text text-muted">
                                            Examples: fa fa-home, fas fa-user, fab fa-facebook
                                        </small>
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Status and Settings Section --}}
                        <div class="form-section">
                            <h5 class="section-title">Status & Settings</h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" 
                                                   id="is_active" name="is_active" value="1" 
                                                   {{ old('is_active', $navbar->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="extra_attributes" class="form-label">Extra Attributes (JSON)</label>
                                <textarea class="form-control @error('extra_attributes') is-invalid @enderror" 
                                          id="extra_attributes" name="extra_attributes" rows="3" 
                                          placeholder='{"class": "custom-class", "data-toggle": "modal"}'
                                >{{ old('extra_attributes', is_array($navbar->extra_attributes) ? json_encode($navbar->extra_attributes, JSON_PRETTY_PRINT) : $navbar->extra_attributes) }}</textarea>
                                <small class="form-text text-muted">
                                    Optional JSON object for additional HTML attributes
                                </small>
                                @error('extra_attributes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Update Navbar Item
                            </button>
                            <a href="{{ route('navbar.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

    <script>
        $(document).ready(function() {
            // Handle type change
            $('#type').change(function() {
                var type = $(this).val();
                
                if (type === 'link') {
                    $('#url-field').show();
                    $('#category-field').hide();
                    $('#url').prop('required', true);
                    $('#category_id').prop('required', false);
                } else if (type === 'dropdown') {
                    $('#url-field').hide();
                    $('#category-field').hide();
                    $('#url').prop('required', false);
                    $('#category_id').prop('required', false);
                } else {
                    $('#url-field').show();
                    $('#category-field').show();
                    $('#url').prop('required', false);
                    $('#category_id').prop('required', false);
                }
            });
            
            // Icon preview
            $('#icon').on('input', function() {
                var iconClass = $(this).val();
                $('#icon-preview').attr('class', 'icon-preview ' + iconClass);
            });
            
            // JSON validation for extra_attributes
            $('#extra_attributes').on('blur', function() {
                var value = $(this).val().trim();
                if (value && value !== '') {
                    try {
                        JSON.parse(value);
                        $(this).removeClass('is-invalid');
                    } catch (e) {
                        $(this).addClass('is-invalid');
                        if (!$(this).next('.invalid-feedback').length) {
                            $(this).after('<div class="invalid-feedback">Invalid JSON format</div>');
                        }
                    }
                }
            });
            
            // Trigger initial type change
            $('#type').trigger('change');
        });
    </script>
</body>
</html>