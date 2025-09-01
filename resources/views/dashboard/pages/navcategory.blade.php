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
            <h5 class="card-title text-center">Create Category & Sub Category</h5>
        </div>
    </div>

    <div class="container card card-box mt-3 pd-20 mb-20">
        <form method="POST" action="{{ route('dashboard.storeCategory') }}">
            @csrf

            {{-- Category Section --}}
            <div class="row mb-4" style="padding-top: 20px;">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="name" class="form-control" type="text" placeholder="Category Name" required />
                        <label>Category Name *</label>
                        <div class="invalid-feedback">Please provide a category name.</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="slug" class="form-control" type="text" placeholder="Category Slug" required />
                        <label>Category Slug *</label>
                        <div class="invalid-feedback">Please provide a slug.</div>
                    </div>
                </div>
            </div>

            {{-- Sub Category Section --}}
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="sub_name" class="form-control" type="text" placeholder="Sub Category Name" required />
                        <label>Sub Category Name *</label>
                        <div class="invalid-feedback">Please provide a subcategory name.</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input name="sub_slug" class="form-control" type="text" placeholder="Sub Category Slug" required />
                        <label>Sub Category Slug *</label>
                        <div class="invalid-feedback">Please provide a subcategory slug.</div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="row mt-4">
                <div class="col-12">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        Create
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
    </div>

  

   
</body>

</html>