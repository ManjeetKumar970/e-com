<!DOCTYPE html>
<html lang="en">
<!-- head  -->
@include('../dashboard.header.head')

<head>
    <style>
        .table-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .badge-status {
            font-size: 0.75rem;
        }
        
        .hierarchy-indent {
            padding-left: 2rem;
        }
        
        .parent-item {
            font-weight: 600;
        }
        
        .child-item {
            color: #6c757d;
            font-style: italic;
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

    <div class="main-container" data-toggle="left-sidebar-toggle">
        <div class="container card card-box mb-5">
            <div class="card-body">
                <h5 class="card-title text-center">Navbar Management</h5>
            </div>
            <div class="p-3">
                <a href="{{ route('navbar.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Create Navbar Item
                </a>
            </div>
        </div>

        <div class="card-box pb-10">
            <div class="h5 pd-20 mb-0">Navbar Items</div>

            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Title</th>
                        <th>Type</th>
                        <th>URL</th>
                        <th>Parent</th>
                        <th>Category</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Target</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($navbarItems as $navbarItem)
                        <tr>
                            <td class="table-plus">
                                <div class="d-flex align-items-center">
                                    @if($navbarItem->icon)
                                        <i class="{{ $navbarItem->icon }} me-2"></i>
                                    @endif
                                    <span class="parent-item">{{ $navbarItem->title }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $navbarItem->type)) }}</span>
                            </td>
                            <td>
                                @if($navbarItem->url)
                                    <a href="{{ $navbarItem->getFullUrl() }}" target="_blank" class="text-primary">
                                        {{ Str::limit($navbarItem->url, 30) }}
                                    </a>
                                @elseif($navbarItem->category)
                                    <span class="text-muted">Category Link</span>
                                @else
                                    <span class="text-muted">No URL</span>
                                @endif
                            </td>
                            <td>
                                @if($navbarItem->parent)
                                    <span class="text-muted">{{ $navbarItem->parent->title }}</span>
                                @else
                                    <span class="badge bg-secondary">Top Level</span>
                                @endif
                            </td>
                            <td>
                                @if($navbarItem->category)
                                    <span class="badge bg-primary">{{ $navbarItem->category->name }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $navbarItem->sort_order }}</span>
                            </td>
                            <td>
                                @if($navbarItem->is_active)
                                    <span class="badge bg-success badge-status">Active</span>
                                @else
                                    <span class="badge bg-danger badge-status">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $navbarItem->target ?: '_self' }}</span>
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('navbar.edit', $navbarItem->id) }}" 
                                       class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('navbar.destroy', $navbarItem->id) }}" 
                                          method="POST" style="display: inline-block;" 
                                          onsubmit="return confirm('Are you sure you want to delete this navbar item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        {{-- Display children if any --}}
                        @if($navbarItem->children && $navbarItem->children->count() > 0)
                            @foreach($navbarItem->children as $child)
                                <tr class="table-secondary">
                                    <td class="table-plus">
                                        <div class="d-flex align-items-center hierarchy-indent">
                                            @if($child->icon)
                                                <i class="{{ $child->icon }} me-2"></i>
                                            @endif
                                            <span class="child-item">
                                                ↳ {{ $child->title }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst(str_replace('_', ' ', $child->type)) }}</span>
                                    </td>
                                    <td>
                                        @if($child->url)
                                            <a href="{{ $child->getFullUrl() }}" target="_blank" class="text-primary">
                                                {{ Str::limit($child->url, 30) }}
                                            </a>
                                        @elseif($child->category)
                                            <span class="text-muted">Category Link</span>
                                        @else
                                            <span class="text-muted">No URL</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $navbarItem->title }}</span>
                                    </td>
                                    <td>
                                        @if($child->category)
                                            <span class="badge bg-primary">{{ $child->category->name }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $child->sort_order }}</span>
                                    </td>
                                    <td>
                                        @if($child->is_active)
                                            <span class="badge bg-success badge-status">Active</span>
                                        @else
                                            <span class="badge bg-danger badge-status">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $child->target ?: '_self' }}</span>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('navbar.edit', $child->id) }}" 
                                               class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('navbar.destroy', $child->id) }}" 
                                                  method="POST" style="display: inline-block;" 
                                                  onsubmit="return confirm('Are you sure you want to delete this navbar item?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- welcome modal start -->
    @include('dashboard.partials.messagemode')
    <!-- welcome modal end -->

    <!-- js -->
    @include('dashboard.footer.footer')

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('.data-table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },
            });
        });
    </script>
</body>
</html>