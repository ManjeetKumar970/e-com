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
       @foreach($parentCategories as $parentCategor)
   <div class="container card card-box mt-3 pd-20 mb-20">
     <form method="POST" action="{{ route('dashboard.categories.update', $category->slug) }}">
         @method('PUT')
        @csrf

        {{-- Category Section --}}
        <div class="row mb-4" style="padding-top: 20px;">
            {{-- Name --}}
            <div class="col-md-6">
                <div class="form-floating">
                    <input name="name" class="form-control" type="text" value="{{old('name',$category->name)}}" placeholder="Category Name" required />
                    <label>Category Name *</label>
                </div>
            </div>

            {{-- Slug --}}
            <div class="col-md-6">
                <div class="form-floating">
<input name="slug" class="form-control" type="text" placeholder="Category Slug" value="{{ old('slug', $category->slug) }}" />
                    <label>Category Slug (optional, auto-generated if empty)</label>
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="form-floating">
                   <textarea name="description" class="form-control" placeholder="Category Description" style="height: 100px;">{{ old('description', $category->description) }}</textarea>
                    <label>Description</label>
                </div>
            </div>
        </div>

        {{-- Image & Icon --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="col-md-6">
                <label class="form-label">Icon</label>
                <input type="file" name="icon" class="form-control" />
            </div>
        </div>

        {{-- Parent Category --}}
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
            <div class="col-md-6 form-check">
                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <div class="col-md-6 form-check">
                <input type="checkbox" name="show_in_menu" class="form-check-input" id="show_in_menu">
                <label class="form-check-label" for="show_in_menu">Show in Menu</label>
            </div>
        </div>

        {{-- Meta Fields --}}
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

        {{-- Submit --}}
        <div class="row mt-4">
            <div class="col-12">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    Create Category
                </button>
            </div>
        </div>
   
    </form>
</div>
     @endforeach
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