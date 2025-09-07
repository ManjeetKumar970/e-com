<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<head>
    <style>
        .menu-item {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .menu-hierarchy {
            padding-left: 30px;
            border-left: 2px solid #007bff;
            margin-left: 15px;
        }

        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #007bff;
        }

        .form-section h6 {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .menu-preview {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .menu-preview .navbar {
            margin-bottom: 0;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #007bff;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
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
                <h5 class="card-title" style="text-align: center;">
                    <i class="fas fa-bars"></i> Navigation Menu Management
                </h5>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Left Column - Create Menu Item -->
            <div class="col-md-6">
                <div class="card card-box pd-20">
                    <h6 class="card-title">
                        <i class="fas fa-plus-circle"></i> Create Menu Item
                    </h6>
                    
                    <form id="menu-form" method="POST" action="{{ route('navbar.store') }}">
                        @csrf
                        
                        <!-- Menu Type Selection -->
                        <div class="form-section">
                            <h6><i class="fas fa-cog"></i> Menu Type</h6>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menu_type" id="link_type" value="link" checked onchange="toggleMenuType()">
                                        <label class="form-check-label" for="link_type">
                                            <i class="fas fa-link"></i> Simple Link
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menu_type" id="dropdown_type" value="dropdown" onchange="toggleMenuType()">
                                        <label class="form-check-label" for="dropdown_type">
                                            <i class="fas fa-chevron-down"></i> Dropdown Menu
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menu_type" id="category_type" value="category" onchange="toggleMenuType()">
                                        <label class="form-check-label" for="category_type">
                                            <i class="fas fa-tags"></i> Category Link
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Basic Information -->
                        <div class="form-section">
                            <h6><i class="fas fa-info-circle"></i> Basic Information</h6>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="title" id="menu-title" class="form-control" type="text" placeholder="Menu Title" required />
                                        <label>Menu Title *</label>
                                    </div>
                                </div>
                            </div>

                            <!-- URL Field (for link type) -->
                            <div class="row mb-3" id="url-section">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="url" id="menu-url" class="form-control" type="text" placeholder="URL" />
                                        <label>URL</label>
                                        <small class="text-muted">e.g., /about, /contact, https://example.com</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Selection (for category type) -->
                            <div class="row mb-3" id="category-section" style="display: none;">
                                <div class="col-12">
                                    <label class="form-label">Select Category</label>
                                    <select name="category_id" id="category-select" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @php
                                            $categories = \App\Models\Dashboard\Category::active()
                                                ->orderBy('name')
                                                ->get();
                                        @endphp
                                        
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->parent ? $category->parent->name . ' → ' : '' }}{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Parent Menu (for dropdown items) -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label">Parent Menu Item</label>
                                    <select name="parent_id" id="parent-select" class="form-control">
                                        <option value="">-- Top Level Menu --</option>
                                        @php
                                            $parentMenus = \App\Models\Dashboard\NavbarItem::active()
                                                ->whereNull('parent_id')
                                                ->orderBy('sort_order')
                                                ->get();
                                        @endphp
                                        
                                        @foreach($parentMenus as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Leave empty for main menu item</small>
                                </div>
                            </div>
                        </div>

                        <!-- Advanced Options -->
                        <div class="form-section">
                            <h6><i class="fas fa-sliders-h"></i> Advanced Options</h6>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="sort_order" class="form-control" type="number" value="0" />
                                        <label>Sort Order</label>
                                        <small class="text-muted">Lower numbers appear first</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="icon" class="form-control" type="text" placeholder="Icon Class" />
                                        <label>Icon (Optional)</label>
                                        <small class="text-muted">e.g., fas fa-home, fas fa-shopping-cart</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Target</label>
                                    <select name="target" class="form-control">
                                        <option value="_self">Same Window</option>
                                        <option value="_blank">New Window</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" name="is_active" checked id="is_active">
                                        <label class="form-check-label" for="is_active">
                                            Menu Item Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    <i class="fas fa-save"></i> Create Menu Item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column - Current Menu Items -->
            <div class="col-md-6">
                <div class="card card-box pd-20">
                    <h6 class="card-title">
                        <i class="fas fa-list"></i> Current Menu Structure
                        <button class="btn btn-sm btn-outline-primary float-end" onclick="refreshMenuList()">
                            <i class="fas fa-refresh"></i> Refresh
                        </button>
                    </h6>
                    
                    <div id="menu-list">
                        @php
                            $menuItems = \App\Models\Dashboard\NavbarItem::with(['children', 'category'])
                                ->whereNull('parent_id')
                                ->orderBy('sort_order')
                                ->get();
                        @endphp

                        @if($menuItems->count() > 0)
                            @foreach($menuItems as $item)
                                <div class="menu-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>
                                                @if($item->icon) <i class="{{ $item->icon }}"></i> @endif
                                                {{ $item->title }}
                                            </strong>
                                            <br>
                                            <small class="text-muted">
                                                Type: {{ ucfirst($item->type) }}
                                                @if($item->category)
                                                    | Category: {{ $item->category->name }}
                                                @elseif($item->url)
                                                    | URL: {{ $item->url }}
                                                @endif
                                            </small>
                                        </div>
                                        <div>
                                            <label class="toggle-switch">
                                                <input type="checkbox" {{ $item->is_active ? 'checked' : '' }} 
                                                       onchange="toggleMenuStatus({{ $item->id }})">
                                                <span class="slider"></span>
                                            </label>
                                            <div class="btn-group btn-group-sm mt-1">
                                                <button class="btn btn-outline-primary" onclick="editMenuItem({{ $item->id }})">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" onclick="deleteMenuItem({{ $item->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Show children if any --}}
                                    @if($item->children->count() > 0)
                                        <div class="menu-hierarchy mt-2">
                                            @foreach($item->children as $child)
                                                <div class="menu-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <strong>
                                                                @if($child->icon) <i class="{{ $child->icon }}"></i> @endif
                                                                └ {{ $child->title }}
                                                            </strong>
                                                            <br>
                                                            <small class="text-muted">
                                                                @if($child->category)
                                                                    Category: {{ $child->category->name }}
                                                                @elseif($child->url)
                                                                    URL: {{ $child->url }}
                                                                @endif
                                                            </small>
                                                        </div>
                                                        <div>
                                                            <label class="toggle-switch">
                                                                <input type="checkbox" {{ $child->is_active ? 'checked' : '' }} 
                                                                       onchange="toggleMenuStatus({{ $child->id }})">
                                                                <span class="slider"></span>
                                                            </label>
                                                            <div class="btn-group btn-group-sm mt-1">
                                                                <button class="btn btn-outline-primary" onclick="editMenuItem({{ $child->id }})">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-outline-danger" onclick="deleteMenuItem({{ $child->id }})">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-bars fa-3x mb-3"></i>
                                <h6>No menu items created yet</h6>
                                <p>Create your first menu item using the form on the left.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Preview Section -->
        <div class="container card card-box mt-3 pd-20">
            <h6 class="card-title">
                <i class="fas fa-eye"></i> Live Menu Preview
                <button class="btn btn-sm btn-outline-success float-end" onclick="refreshPreview()">
                    <i class="fas fa-sync"></i> Update Preview
                </button>
            </h6>
            
            <div class="menu-preview">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <i class="fas fa-store"></i> Your Store
                        </a>
                        
                        <div class="navbar-nav" id="preview-menu">
                            @foreach($menuItems as $item)
                                @if($item->is_active)
                                    @if($item->children->count() > 0 && $item->type === 'dropdown')
                                        <div class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                                @if($item->icon) <i class="{{ $item->icon }}"></i> @endif
                                                {{ $item->title }}
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($item->children as $child)
                                                    @if($child->is_active)
                                                        <li>
                                                            <a class="dropdown-item" href="{{ $child->getFullUrl() }}">
                                                                @if($child->icon) <i class="{{ $child->icon }}"></i> @endif
                                                                {{ $child->title }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <a class="nav-link" href="{{ $item->getFullUrl() }}">
                                            @if($item->icon) <i class="{{ $item->icon }}"></i> @endif
                                            {{ $item->title }}
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </nav>
            </div>
            
            <div class="mt-3">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> 
                    This preview shows how your menu will appear on the frontend. 
                    Changes may take effect after page refresh.
                </small>
            </div>
        </div>
    </div>

    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

    <script>
        function toggleMenuType() {
            const menuType = document.querySelector('input[name="menu_type"]:checked').value;
            const urlSection = document.getElementById('url-section');
            const categorySection = document.getElementById('category-section');
            const parentSelect = document.getElementById('parent-select');

            // Reset visibility
            urlSection.style.display = 'none';
            categorySection.style.display = 'none';

            switch(menuType) {
                case 'link':
                    urlSection.style.display = 'block';
                    document.querySelector('input[name="type"]').value = 'link';
                    break;
                case 'dropdown':
                    document.querySelector('input[name="type"]').value = 'dropdown';
                    break;
                case 'category':
                    categorySection.style.display = 'block';
                    document.querySelector('input[name="type"]').value = 'link';
                    break;
            }
        }

        function toggleMenuStatus(itemId) {
            fetch(`/navbar/${itemId}/toggle-status`, {
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
                        title: "Menu item status updated!"
                    });
                    refreshPreview();
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
                    title: "Failed to update status"
                });
            });
        }

        function editMenuItem(itemId) {
            // Redirect to edit page or load edit modal
            window.location.href = `/navbar/${itemId}/edit`;
        }

        function deleteMenuItem(itemId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This menu item will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/navbar/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', 'Menu item has been deleted.', 'success');
                            refreshMenuList();
                            refreshPreview();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to delete menu item.', 'error');
                    });
                }
            });
        }

        function refreshMenuList() {
            location.reload();
        }

        function refreshPreview() {
            // Refresh just the preview section
            fetch(window.location.href)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newPreview = doc.getElementById('preview-menu');
                if (newPreview) {
                    document.getElementById('preview-menu').innerHTML = newPreview.innerHTML;
                }
            });
        }

        // Form submission
        document.getElementById('menu-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const menuType = document.querySelector('input[name="menu_type"]:checked').value;
            
            // Set the correct type based on menu type selection
            formData.set('type', menuType === 'dropdown' ? 'dropdown' : 'link');
            
            fetch("{{ route('navbar.store') }}", {
                method: 'POST',
                body: formData,
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
                        title: "Menu item created successfully!"
                    });
                    
                    // Reset form and refresh lists
                    this.reset();
                    refreshMenuList();
                } else {
                    throw new Error(data.message || 'Failed to create menu item');
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
                    title: error.message || "Failed to create menu item"
                });
            });
        });

        // Initialize form
        toggleMenuType();
    </script>
</body>

</html>