<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    @include('../dashboard.header.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2><i class="fas fa-folder-open"></i> Category Management</h2>
                        <p class="text-muted mb-0">Manage your product categories</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal"
                        onclick="openAddModal()">
                        <i class="fas fa-plus"></i> Add Category
                    </button>
                </div>
            </div>

            <div class="category-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">All Categories</h5>
                    <input type="text" class="form-control w-25" id="searchInput" placeholder="Search categories...">
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="categoryTable">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Parent Category</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>
                                        @if ($cat->image_url)
                                            @if (filter_var($cat->image_url, FILTER_VALIDATE_URL))
                                                <img src="{{ $cat->image_url }}" width="50"
                                                    alt="{{ $cat->name }}">
                                            @else
                                                <img src="{{ asset('storage/' . $cat->image_url) }}" width="50"
                                                    alt="{{ $cat->name }}">
                                            @endif
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>{{ $cat->parent ? $cat->parent->name : '—' }}</td>
                                    <td>{{ $cat->display_order }}</td>
                                    <td>
                                        <span class="badge {{ $cat->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $cat->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning"
                                            onclick="openEditModal({{ $cat->id }})" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="deleteCategory({{ $cat->id }})" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No categories yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Category Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form id="categoryForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">

                        <div class="modal-body">
                            <input type="hidden" name="category_id" id="categoryId">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="categoryName" class="form-label">Category Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="categoryName" required
                                        maxlength="100">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="categorySlug" class="form-label">Slug <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="slug" class="form-control" id="categorySlug" required
                                        maxlength="100">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="categoryDescription" rows="3"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="parentCategory" class="form-label">Parent Category</label>
                                    <select name="parent_id" class="form-select" id="parentCategory">
                                        <option value="">None (Top Level)</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="displayOrder" class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control" id="displayOrder"
                                        value="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category Image</label>
                                <ul class="nav nav-tabs mb-3" id="imageTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="upload-tab" data-bs-toggle="tab"
                                            data-bs-target="#upload-pane" type="button">Upload</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="url-tab" data-bs-toggle="tab"
                                            data-bs-target="#url-pane" type="button">URL</button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="imageTabContent">
                                    <div class="tab-pane fade show active" id="upload-pane" role="tabpanel">
                                        <div class="mb-2">
                                            <input type="file" name="image_file" class="form-control"
                                                id="imageFile" accept="image/*">
                                            <small class="text-muted">Accepted formats: JPG, PNG, GIF, WebP (Max:
                                                2MB)</small>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="url-pane" role="tabpanel">
                                        <input type="url" name="image_url" class="form-control" id="imageUrl"
                                            maxlength="255" placeholder="https://example.com/image.jpg">
                                    </div>
                                </div>

                                <div id="imagePreviewContainer" class="mt-3 d-none">
                                    <img id="imagePreview" class="image-preview" alt="Preview"
                                        style="max-width: 200px; max-height: 200px;">
                                    <button type="button" class="btn btn-sm btn-danger mt-2" onclick="clearImage()">
                                        <i class="fas fa-times"></i> Remove Image
                                    </button>
                                </div>
                            </div>

                            <div class="form-check form-switch" style="padding-left: 3.25rem;">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive"
                                    checked>
                                <label class="form-check-label" for="isActive">Active</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this category?</p>
                        <p class="text-danger"><strong>This action cannot be undone.</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')
    <script>
        // Auto-generate slug from name
        document.getElementById('categoryName').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('categorySlug').value = slug;
        });

        // Open Add Modal
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Add Category';
            document.getElementById('categoryForm').action = "{{ route('dashboard.storecategory') }}";
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('categoryForm').reset();
            document.getElementById('categoryId').value = '';
            document.getElementById('isActive').checked = true;
            clearImage();
        }

        // Open Edit Modal
        function openEditModal(id) {
            document.getElementById('modalTitle').textContent = 'Edit Category';

            fetch(`/dashboard/categories/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('categoryId').value = data.id;
                    document.getElementById('categoryName').value = data.name;
                    document.getElementById('categorySlug').value = data.slug;
                    document.getElementById('categoryDescription').value = data.description || '';
                    document.getElementById('parentCategory').value = data.parent_id || '';
                    document.getElementById('displayOrder').value = data.display_order;
                    document.getElementById('isActive').checked = data.is_active;

                    // Update form action and method
                    document.getElementById('categoryForm').action = `/dashboard/categories/${id}/update`;
                    document.getElementById('formMethod').value = 'POST';

                    // Show image preview if exists
                    if (data.image_url) {
                        const preview = document.getElementById('imagePreview');
                        const container = document.getElementById('imagePreviewContainer');

                        if (data.image_url.startsWith('http')) {
                            preview.src = data.image_url;
                        } else {
                            preview.src = `/storage/${data.image_url}`;
                        }
                        container.classList.remove('d-none');
                    }

                    // Open modal
                    const modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                    modal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error loading category data');
                });
        }

        // Delete Category
        function deleteCategory(id) {
            document.getElementById('deleteForm').action = `/dashboard/categories/${id}`;
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }

        // Clear Image
        function clearImage() {
            document.getElementById('imageFile').value = '';
            document.getElementById('imageUrl').value = '';
            document.getElementById('imagePreview').src = '';
            document.getElementById('imagePreviewContainer').classList.add('d-none');
        }

        // Image Preview
        document.getElementById('imageFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreviewContainer').classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('imageUrl').addEventListener('input', function(e) {
            if (e.target.value) {
                document.getElementById('imagePreview').src = e.target.value;
                document.getElementById('imagePreviewContainer').classList.remove('d-none');
            }
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function(e) {
            const searchText = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#categoryTable tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        });
    </script>
</body>

</html>
