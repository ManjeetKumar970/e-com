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
                <h5 class="card-title" style="text-align: center;">Product Create</h5>
            </div>
        </div>

        <div class="container card card-box mt-3">
            <form id="product-form" method="POST" action="{{ route('dashboard.storebillingrols') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-6 md-2">
                        <div class="form-floating form-group">
                            <input name="name" class="form-control" type="text" placeholder="Fixed Name" required />
                            <label>Fixed Name *</label>
                            <div class="invalid-feedback">Please provide a fixed name.</div>
                        </div>
                    </div>
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="size" class="form-control" type="text" placeholder="Size Index" required />
                            <label>Size Index *</label>
                            <div class="invalid-feedback">Please provide a size index.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="page_thickness" class="form-control" type="text" placeholder="Page Thickness" required />
                            <label>Page Thickness (mm) *</label>
                            <div class="invalid-feedback">Please provide page thickness.</div>
                        </div>
                    </div>
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="color" class="form-control" type="text" placeholder="Color" required />
                            <label>Color *</label>
                            <div class="invalid-feedback">Please provide a color.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="custom-select2 form-control select2-hidden-accessible" name="paper_type" style="width: 100%; height: 38px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <optgroup label="Pacific Time Zone" data-select2-id="17">
                                    <option value="CA" data-select2-id="18">California</option>
                                    <option value="NV" data-select2-id="19">Nevada</option>
                                    <option value="OR" data-select2-id="20">Oregon</option>
                                    <option value="WA" data-select2-id="21">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone" data-select2-id="22">
                                    <option value="AZ" data-select2-id="23">Arizona</option>
                                    <option value="CO" data-select2-id="24">Colorado</option>
                                    <option value="ID" data-select2-id="25">Idaho</option>
                                    <option value="MT" data-select2-id="26">Montana</option>
                                    <option value="NE" data-select2-id="27">Nebraska</option>
                                    <option value="NM" data-select2-id="28">New Mexico</option>
                                    <option value="ND" data-select2-id="29">North Dakota</option>
                                    <option value="UT" data-select2-id="30">Utah</option>
                                    <option value="WY" data-select2-id="31">Wyoming</option>
                                </optgroup>
                            </select>
                            <label>Single Select *</label>
                        </div>
                    </div>
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="length" class="form-control" type="number" placeholder="Length" required />
                            <label>Length (cm) *</label>
                            <div class="invalid-feedback">Please provide a valid length.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="core" class="form-control" type="text" placeholder="Core" required />
                            <label>Core Diameter (mm) *</label>
                            <div class="invalid-feedback">Please provide core diameter.</div>
                        </div>
                    </div>
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <input name="price" class="form-control" type="number" step="0.01" placeholder="Price" required />
                            <label>Price *</label>
                            <div class="invalid-feedback">Please provide a valid price.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 md-2">
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="Description" style="height: 100px"></textarea>
                            <label>Description</label>
                        </div>
                    </div>
                    <div class="col-md-6 md-2">
                        <div class="dropzone" id="myDropzone"></div>
                        <label>Upload Img</label>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button id="submit-all" type="button" class="btn btn-success btn-lg btn-block">
                            Submit
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

    <!-- Add Dropzone JS -->
   <script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{ route('dashboard.storebillingrols') }}", // Not used directly
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 3,
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        paramName: 'images[]',
        addRemoveLinks: true,
    });

    function validateForm(form) {
        // List all required fields from your form
        const requiredFields = [
            'name',
            'size', 
            'page_thickness',
            'color',
            'state',
            'length',
            'core',
            'price'
        ];
        
        // Check each required field
        for (let fieldName of requiredFields) {
            let field = form.querySelector('[name="' + fieldName + '"]');
            
            if (!field) {
                console.error(`Field ${fieldName} not found`);
                continue;
            }
            
            // Special handling for select2 if needed
            if (fieldName === 'state' && field.classList.contains('select2-hidden-accessible')) {
                if (!field.value) {
                    alert('Please select a state');
                    return false;
                }
                continue;
            }
            
            if (!field.value.trim()) {
                alert(`Please fill the ${fieldName.replace('_', ' ')} field.`);
                field.focus();
                return false;
            }
            
            // Additional validation for specific fields
            if (fieldName === 'price' || fieldName === 'length') {
                if (isNaN(field.value) || parseFloat(field.value) <= 0) {
                    alert(`Please enter a valid number for ${fieldName.replace('_', ' ')}`);
                    field.focus();
                    return false;
                }
            }
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

        // Check if files are uploaded (if required)
        if (myDropzone.getAcceptedFiles().length === 0) {
            alert("Please upload at least one image.");
            return; 
        }
        var formData = new FormData(form);
        myDropzone.getAcceptedFiles().forEach((file, index) => {
            formData.append('images[]', file);
        });
        fetch("{{ route('dashboard.storebillingrols') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                alert(data.message || "Upload successful!");
                myDropzone.removeAllFiles();
                form.reset();
                window.location.reload();
            })
            .catch(error => {
                console.error("Upload failed:", error);
                alert(error.message || "Upload failed. Please check console for details.");
            });
    });
</script>
</body>

</html>