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

    <div class="main-container ">
        <div class="container card card-box md-5">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">Barcode Rols</h5>
            </div>
        </div>

        <div class="container card card-box mt-3 pd-20 mb-20">
            <form id="product-form" method="POST" action="{{ route('dashboard.storeProduct') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-6 md-2">
                        <div class="form-floating form-group">
                            <input name="name" class="form-control" type="text" placeholder="Fixed Name" required />
                              <input name="category" class="form-control" value="barcode" type="hidden" />
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
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="page_thickness" class="form-control" type="text" placeholder="Page Thickness" required />
                            <label>Page Thickness (mm) *</label>
                            <div class="invalid-feedback">Please provide page thickness.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="color" class="form-control" type="text" placeholder="Color" required />
                            <label>Color *</label>
                            <div class="invalid-feedback">Please provide a color.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="numberoflabel" class="form-control" type="number" placeholder="Number Of Labels" required />
                            <label>Number Of Labels *</label>
                             <div class="invalid-feedback">Please provide a Labels.</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 md-2">
                        <div class="form-group">
                            <select class="custom-select2 form-control select2-hidden-accessible" name="paper_type" style="width: 100%; height: 38px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <optgroup label="Select Paper Type" data-select2-id="17">
                                    <option value="XYZ" data-select2-id="18">XYZ</option>
                                </optgroup>
                            </select>
                            <label>Paper Type</label>
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
          <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')
    </div>

  

    <!-- Add Dropzone JS -->
 <script>
    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{ route('dashboard.storeProduct') }}", // not used because we handle fetch
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 3,
        maxFilesize: 2, // MB
        acceptedFiles: 'image/*',
        paramName: 'images[]',
        addRemoveLinks: true,
    });

    function validateForm(form) {
        const requiredFields = [
            'name',
            'size',
            'page_thickness',
            'color',
            'numberoflabel',
            'paper_type',
            'length',
            'core',
            'price'
        ];

        for (let fieldName of requiredFields) {
            let field = form.querySelector('[name="' + fieldName + '"]');

            if (!field) {
                showToast(`Missing field: ${fieldName}`);
                return false;
            }

            if (!String(field.value).trim()) {
                showToast(`Please fill the ${fieldName.replace('_', ' ')} field.`);
                field.focus();
                return false;
            }

            if (['price', 'length', 'numberoflabel'].includes(fieldName)) {
                if (isNaN(field.value) || parseFloat(field.value) <= 0) {
                    showToast(`Please enter a valid number for ${fieldName.replace('_', ' ')}`);
                    field.focus();
                    return false;
                }
            }
        }
        return true;
    }

    function showToast(message, icon = "warning") {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: icon,
            title: message,
        });
    }

    document.getElementById("submit-all").addEventListener("click", function (e) {
        e.preventDefault();
        var form = document.getElementById("product-form");

        if (!validateForm(form)) return;

        var formData = new FormData(form);

        // Add Dropzone images
        myDropzone.getAcceptedFiles().forEach((file) => {
            formData.append('images[]', file);
        });

        fetch("{{ route('dashboard.storeProduct') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            showToast(data.message || "Upload successful!", "success");
            myDropzone.removeAllFiles();
            form.reset();
        })
        .catch(err => {
            Swal.fire({
                icon: "error",
                title: "Upload failed",
                text: err.message || "Please try again."
            });
        });
    });
</script>

</body>

</html>