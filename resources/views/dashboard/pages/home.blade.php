<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

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
            <!-- Page Title -->
            <div class="card card-box mb-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Home Slider Images Management</h5>
                    <p class="text-center text-muted">Upload up to 4 images for your home page slider</p>
                </div>
            </div>

            <!-- Upload Form -->
            <div class="card card-box mb-4">
                <div class="card-body">
                    <form action="{{ route('slider.upload') }}" method="POST" enctype="multipart/form-data"
                        id="sliderForm">
                        @csrf

                        <!-- Alert Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 md-2">
                                <div class="form-floating form-group">
                                    <input name="title" class="form-control" type="text" placeholder="Img Title"
                                        required />
                                    <label>Title *</label>
                                </div>
                            </div>

                            <div class="col-md-6 md-2">
                                <div class="form-floating">
                                    <input name="dscription" class="form-control" type="text"
                                        placeholder="dscription" required />
                                    <label>dscription *</label>
                                </div>
                            </div>
                        </div>
                        <!-- File Input -->
                        <div class="mb-4">
                            <label for="sliderImages" class="form-label">Select Slider Images (Max 4)</label>
                            <input type="file" class="form-control" id="sliderImages" name="slider_images[]"
                                accept="image/jpeg,image/png,image/jpg,image/webp" multiple required>
                            <small class="text-muted">Accepted formats: JPG, JPEG, PNG, WEBP. Maximum size: 2MB per
                                image</small>
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-4" id="imagePreviewContainer" style="display: none;">
                            <label class="form-label">Preview:</label>
                            <div class="row" id="imagePreviews"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-upload me-2"></i>Upload Images
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Slider Images -->
            <div class="card card-box">
                <div class="card-body">
                    <h5 class="card-title mb-4">Current Slider Images ({{ $sliders->count() }}/4)</h5>

                    @if ($sliders->isEmpty())
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>No slider images uploaded yet
                        </div>
                    @else
                        <div class="row">
                            @foreach ($sliders as $slider)
                                <div class="col-md-6 col-lg-3 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $slider->image_path) }}" class="card-img-top"
                                            alt="Slider Image" style="height: 200px; object-fit: cover;">
                                        <div class="card-body p-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    Order: {{ $slider->order ?? $loop->iteration }}
                                                </small>
                                                <form action="{{ route('slider.delete', $slider->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this image?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.partials.messagemode')
    <!-- js -->
    @include('dashboard.footer.footer')

    <script>
        document.getElementById('sliderImages').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewContainer = document.getElementById('imagePreviewContainer');
            const previews = document.getElementById('imagePreviews');

            // Clear previous previews
            previews.innerHTML = '';

            // Check file count
            if (files.length > 4) {
                alert('You can only upload maximum 4 images!');
                this.value = '';
                previewContainer.style.display = 'none';
                return;
            }

            if (files.length > 0) {
                previewContainer.style.display = 'block';
                const title = document.querySelector('input[name="title"]').value;
                const description = document.querySelector('input[name="dscription"]').value;

                // Create preview for each file
                Array.from(files).forEach((file, index) => {
                    if (file.size > 2 * 1024 * 1024) {
                        alert(`Image ${index + 1} exceeds 2MB size limit!`);
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3 mb-3';
                        col.innerHTML = `
                    <div class="card">
                        <img src="${event.target.result}" 
                             class="card-img-top" 
                             alt="Preview"
                             style="height: 150px; object-fit: cover;">
                        <div class="card-body p-2">
                            <h6 class="card-title text-truncate mb-1">${title}</h6>
                            <p class="card-text text-truncate mb-0">${description}</p>
                            <small class="text-muted">${file.name}</small>
                        </div>
                    </div>
                `;
                        previews.appendChild(col);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                previewContainer.style.display = 'none';
            }
        });


        // Form validation
        document.getElementById('sliderForm').addEventListener('submit', function(e) {
            const files = document.getElementById('sliderImages').files;
            const currentCount = {{ $sliders->count() ?? 0 }};
            const totalCount = currentCount + files.length;

            if (totalCount > 4) {
                e.preventDefault();
                alert(
                    `You can only have 4 slider images total. You currently have ${currentCount} images and trying to add ${files.length} more.`);
                return false;
            }
        });
    </script>
</body>

</html>
