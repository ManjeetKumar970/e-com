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
        <div>
            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-success">Create Category</a>
        </div>
    </div>
        <div class="card-box pb-10">
    <div class="h5 pd-20 mb-0">Categories</div>

    <table class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus">Name</th>
                <th>Slug</th>
                <th>Parent</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Show in Menu</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    {{-- Name --}}
                    <td class="table-plus">
                        <div class="name-avatar d-flex align-items-center">
                            <div class="avatar mr-2 flex-shrink-0">
                                <img
                                    src="{{ $category->image ? asset('storage/'.$category->image) : asset('vendors/images/default.jpg') }}"
                                    class="border-radius-100 shadow"
                                    width="40"
                                    height="40"
                                    alt="{{ $category->name }}"
                                />
                            </div>
                            <div class="txt">
                                <div class="weight-600">{{ $category->name }}</div>
                            </div>
                        </div>
                    </td>

                    {{-- Slug --}}
                    <td>{{ $category->slug }}</td>

                    {{-- Parent --}}
                    <td>{{ $category->parent ? $category->parent->name : '—' }}</td>

                    {{-- Sort Order --}}
                    <td>{{ $category->sort_order }}</td>

                    {{-- Status --}}
                    <td>
                        @if($category->is_active)
                            <span class="badge badge-pill" data-bgcolor="#e7f7e7" data-color="#28a745">Active</span>
                        @else
                            <span class="badge badge-pill" data-bgcolor="#fbeaea" data-color="#e95959">Inactive</span>
                        @endif
                    </td>

                    {{-- Show in Menu --}}
                    <td>
                        @if($category->show_in_menu)
                            <span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Yes</span>
                        @else
                            <span class="badge badge-pill" data-bgcolor="#fbeaea" data-color="#e95959">No</span>
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" data-color="#265ed7">
                                <i class="icon-copy dw dw-edit2"></i>
                            </a>
                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border:none;background:none;" onclick="return confirm('Are you sure?')" data-color="#e95959">
                                    <i class="icon-copy dw dw-delete-3"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
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