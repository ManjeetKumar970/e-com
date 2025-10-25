<!DOCTYPE html>
<html lang="en">
@include('../dashboard.header.head')

<body>
    @include('../dashboard.partials.loader')
    @include('dashboard.header.header')
    @include('../dashboard.partials.sidebar')
    @include('../dashboard.partials.leftsidebar')

    <div class="main-container">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="row mb-3">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h4>Notification Management</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#notificationModal" onclick="resetForm()">
                            <i class="fas fa-plus"></i> Create Notification
                        </button>
                    </div>
                </div>

                <!-- Notifications Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>User</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($notifications as $notification)
                                            <tr>
                                                <td>{{ $notification->id }}</td>
                                                <td>
                                                    @if ($notification->is_global)
                                                        <span class="badge bg-info"><i
                                                                class="fas fa-globe me-1"></i>Global</span>
                                                    @else
                                                        <span class="badge bg-primary"><i
                                                                class="fas fa-user me-1"></i>Personal</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($notification->is_global)
                                                        <span class="text-muted">All Users</span>
                                                    @else
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-xs me-2">
                                                                <span
                                                                    class="avatar-title rounded-circle bg-primary text-white">
                                                                    {{ substr($notification->user->name, 0, 1) }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-0">{{ $notification->user->name }}</h6>
                                                                <small
                                                                    class="text-muted">{{ $notification->user->email }}</small>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ Str::limit($notification->title, 30) }}</td>
                                                <td>{{ Str::limit($notification->message, 50) }}</td>
                                                <td>
                                                    @if ($notification->is_read)
                                                        <span class="badge bg-success">Read</span>
                                                    @else
                                                        <span class="badge bg-warning">Unread</span>
                                                    @endif
                                                </td>
                                                <td>{{ $notification->created_at->format('M d, Y h:i A') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            title="Edit" data-bs-toggle="modal"
                                                            data-bs-target="#notificationModal"
                                                            onclick='editNotification(@json($notification))'>
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            title="Delete"
                                                            onclick="deleteNotification({{ $notification->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">No notifications found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if ($notifications->hasPages())
                                    <div class="mt-3">{{ $notifications->links() }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-bell me-2"></i><span id="modalTitle">Create
                            Notification</span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="notificationForm" method="POST" action="{{ route('dashboard.notifications.store') }}">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="notification_id" id="notification_id">

                    <div class="modal-body">
                        <!-- Notification Type -->
                        <div class="mb-3">
                            <label class="form-label">Notification Type <span class="text-danger">*</span></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notification_type"
                                    id="type_personal" value="personal" checked onchange="toggleUserSelect()">
                                <label class="form-check-label" for="type_personal"><i
                                        class="fas fa-user text-primary me-1"></i> Personal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="notification_type" id="type_global"
                                    value="global" onchange="toggleUserSelect()">
                                <label class="form-check-label" for="type_global"><i
                                        class="fas fa-globe text-info me-1"></i> Global</label>
                            </div>
                        </div>

                        <!-- User Selection -->
                        <div class="mb-3" id="userSelectDiv">
                            <label for="user_id" class="form-label">Select User <span
                                    class="text-danger">*</span></label>
                            <select name="user_id" id="user_id" class="form-select">
                                <option value="">Choose a user...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="is_global" id="is_global" value="0">

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">Message <span
                                    class="text-danger">*</span></label>
                            <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                        </div>

                        <!-- Is Read -->
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_read" id="is_read" class="form-check-input"
                                value="1">
                            <label class="form-check-label" for="is_read">Mark as read</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><span id="submitBtnText">Create
                                Notification</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('dashboard.footer.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleUserSelect() {
            const isGlobal = document.getElementById('type_global').checked;
            const userSelectDiv = document.getElementById('userSelectDiv');
            const userSelect = document.getElementById('user_id');
            const isGlobalInput = document.getElementById('is_global');

            if (isGlobal) {
                userSelectDiv.style.display = 'none';
                userSelect.removeAttribute('required');
                userSelect.value = '';
                isGlobalInput.value = '1';
            } else {
                userSelectDiv.style.display = 'block';
                userSelect.setAttribute('required', 'required');
                isGlobalInput.value = '0';
            }
        }

        function resetForm() {
            const form = document.getElementById('notificationForm');
            form.reset();
            form.action = "{{ route('dashboard.notifications.store') }}";
            document.getElementById('formMethod').value = 'POST';
            document.getElementById('modalTitle').textContent = 'Create Notification';
            document.getElementById('submitBtnText').textContent = 'Create Notification';
            document.getElementById('notification_id').value = '';
            document.getElementById('type_personal').checked = true;
            toggleUserSelect();
        }

        function editNotification(notification) {
            const form = document.getElementById('notificationForm');
            document.getElementById('modalTitle').textContent = 'Edit Notification';
            document.getElementById('submitBtnText').textContent = 'Update Notification';
            form.action = "{{ url('dashboard/admin/notifications') }}/" + notification.id;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('notification_id').value = notification.id;

            if (notification.is_global) {
                document.getElementById('type_global').checked = true;
            } else {
                document.getElementById('type_personal').checked = true;
                document.getElementById('user_id').value = notification.user_id;
            }
            toggleUserSelect();

            document.getElementById('title').value = notification.title;
            document.getElementById('message').value = notification.message;
            document.getElementById('is_read').checked = notification.is_read;
        }

        function deleteNotification(id) {
            if (confirm('Are you sure you want to delete this notification?')) {
                fetch("{{ url('dashboard/admin/notifications') }}/" + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) location.reload();
                    })
                    .catch(err => alert('Error deleting notification'));
            }
        }

        // Auto-open modal if validation errors exist
        @if ($errors->any())
            const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
            modal.show();
        @endif
    </script>
