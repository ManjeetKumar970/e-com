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
        <div class="container card card-box md-5">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;">Slider Images</h5>
            </div>
        </div>


        <div class="container card card-box mt-3 pd-20 mb-20">
            <form id="product-form" method="POST" action="{{ route('dashboard.slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-4 md-2">
                        <div class="form-floating form-group">
                            <input name="title1" class="form-control" type="text" placeholder="Title" required />
                            <label>Title *</label>
                            <div class="invalid-feedback">Please provide a title name.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="description1" class="form-control" type="text" placeholder="Size Index" required />
                            <label>Description *</label>
                            <div class="invalid-feedback">Please provide a description.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="img1" id="img1" class="form-control" type="file" placeholder="Page Thickness" required />
                            <label>Img 1 *</label>
                        </div>
                        <img id="preview-img1" src="#" alt="Image 1 Preview" style="display:none; max-height: 100px; margin-top: 10px;" />

                    </div>
                </div>

               <div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-4 md-2">
                        <div class="form-floating form-group">
                            <input name="title2" class="form-control" type="text" placeholder="Title " required />
                            <label>Title *</label>
                            <div class="invalid-feedback">Please provide a title name.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="description2" class="form-control" type="text" placeholder="Size Index" required />
                            <label>Description *</label>
                            <div class="invalid-feedback">Please provide a description.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="img2" id="img2" class="form-control" type="file" placeholder="Page Thickness" required />
                            <label>Img 2 *</label>
                        </div><img id="preview-img2" src="#" alt="Image 2 Preview" style="display:none; max-height: 100px; margin-top: 10px;" />


                    </div>
                </div><div class="row mb-5" style="padding-top: 20px;">
                    <div class="col-md-4 md-2">
                        <div class="form-floating form-group">
                            <input name="title3" class="form-control" type="text" placeholder="Title" required />
                            <label>Title  *</label>
                            <div class="invalid-feedback">Please provide a title name.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="description3" class="form-control" type="text" placeholder="Size Index" required />
                            <label>Description *</label>
                            <div class="invalid-feedback">Please provide a description.</div>
                        </div>
                    </div>
                    <div class="col-md-4 md-2">
                        <div class="form-floating">
                            <input name="img3" id="img3" class="form-control" type="file" placeholder="Page Thickness" required />
                            <label>Img 3 *</label>
                        </div>
                        <img id="preview-img3" src="#" alt="Image 3 Preview" style="display:none; max-height: 100px; margin-top: 10px;" />
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
</div>
    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

</body>
<script>
    function previewImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
                preview.style.display = 'none';
            }
        });
    }

    previewImage("img1", "preview-img1");
    previewImage("img2", "preview-img2");
    previewImage("img3", "preview-img3");
</script>

<script>
    document.getElementById('submit-all').addEventListener('click', function () {
        const form = document.getElementById('product-form');
        if (form.checkValidity()) {
            form.submit();
        } else {
            form.classList.add('was-validated');
        }
    });
</script>
</html>