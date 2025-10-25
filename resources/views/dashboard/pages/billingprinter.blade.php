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
                <h5 class="card-title" style="text-align: center;">Printers</h5>
            </div>
        </div>

        <div class="container card card-box mt-3 pd-20 mb-20">
            <form id="product-form" method="POST" action="{{ route('dashboard.storeprinter') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-4 md-2">
                        <div class="form-floating form-group">
                            <input name="name" class="form-control" type="text" placeholder="Printer Name "
                                required />
                            <label>Printer Name *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="brand" class="form-control" type="text" placeholder="Brand" required />
                            <label>Brand *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-group">
                            <select class="custom-select2 form-control select2-hidden-accessible" name="printer_type"
                                style="width: 100%; height: 38px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <optgroup label="Printer" data-select2-id="6">
                                    <option value="billing_printer" data-select2-id="5">Billing Printer</option>
                                    <option value="barcode_printer" data-select2-id="4">Barcode Printer</option>
                                    <option value="a4_printer" data-select2-id="3">A4 Printer</option>
                                </optgroup>
                            </select>
                            <label>Printer Type</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="model_number" class="form-control" type="text" placeholder="Page Thickness"
                                required />
                            <label>Model Mumber *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="dpi" class="form-control" type="number" placeholder="Dpi" required />
                            <label>dpi *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-group">
                            <select class="custom-select2 form-control select2-hidden-accessible" name="connectivity"
                                style="width: 100%; height: 38px" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <optgroup label="Connectivity" data-select2-id="6">
                                    <option value="windows" data-select2-id="5">Windows</option>
                                    <option value="mac" data-select2-id="4">Mac</option>
                                    <option value="linux-ubuntu " data-select2-id="2">linux/ubuntu</option>
                                </optgroup>
                            </select>
                            <label>Connectivity</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="print_speed" class="form-control" type="text" placeholder="Printer Speed"
                                required />
                            <label>Print Speed *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="price" class="form-control" type="number" step="0.01" placeholder="Price"
                                required />
                            <label>Price *</label>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="warranty" class="form-control" type="number" step="0.01"
                                placeholder="Warranty" required />
                            <label>Warranty *</label>
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
            url: "{{ route('dashboard.storeprinter') }}", // Not used directly
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
                'brand',
                'model_number',
                'price'
            ];

            // Check each required field
            for (let fieldName of requiredFields) {
                let field = form.querySelector('[name="' + fieldName + '"]');

                if (!field) {
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
                        title: (`Please fill the ${fieldName.replace('_', ' ')} field.`)
                    });
                    continue;
                }

                if (!field.value.trim()) {
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
                        title: (`Please fill the ${fieldName.replace('_', ' ')} field.`)
                    });
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
                // alert("Please upload at least one image.");
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
                    title: (`Please upload at least one image.`)
                });
                return;
            }
            var formData = new FormData(form);
            myDropzone.getAcceptedFiles().forEach((file, index) => {
                formData.append('images[]', file);
            });
            fetch("{{ route('dashboard.storeprinter') }}", {
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
                    alert(data.message || "Upload successful!");
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
                        title: data.message || "Upload successful!"
                    });

                    myDropzone.removeAllFiles();
                    form.reset();
                    setTimeout(() => {
                        window.location.reload()
                    }, 3000)
                })
                .catch(error => {
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
                        title: ("Upload failed:", error)
                    });
                    return;
                    console.error("Upload failed:", error);
                    alert(error.message || "Upload failed. Please check console for details.");
                });
        });
    </script>
</body>

</html>
