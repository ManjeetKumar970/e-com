{{-- Toast Container (Place this in your layout file) --}}
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999" id="toastContainer">

    @if (session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>✗ Error!</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('warning'))
        <div class="toast align-items-center text-bg-warning border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>⚠ Warning!</strong> {{ session('warning') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('info'))
        <div class="toast align-items-center text-bg-info border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>ℹ Info!</strong> {{ session('info') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-autohide="true" data-bs-delay="7000">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>✗ Validation Error!</strong>
                    <ul class="mb-0 mt-1 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

</div>

{{-- JavaScript to initialize toasts and handle AJAX responses --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all existing toasts
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl, {
                autohide: true,
                delay: 5000
            });
        });

        // Show all toasts
        toastList.forEach(toast => toast.show());
    });

    // Function to show toast dynamically
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toastContainer');

        // Define colors for different types
        const colors = {
            success: 'text-bg-success',
            error: 'text-bg-danger',
            danger: 'text-bg-danger',
            warning: 'text-bg-warning',
            info: 'text-bg-info'
        };
        const icons = {
            success: '✓',
            error: '✗',
            danger: '✗',
            warning: '⚠',
            info: 'ℹ'
        };

        const colorClass = colors[type] || 'text-bg-success';
        const icon = icons[type] || '✓';
        const typeLabel = type.charAt(0).toUpperCase() + type.slice(1);

        // Create toast element
        const toastHTML = `
            <div class="toast align-items-center ${colorClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>${icon} ${typeLabel}!</strong> ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;

        // Insert toast into container
        toastContainer.insertAdjacentHTML('beforeend', toastHTML);
        const toastElement = toastContainer.lastElementChild;
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: 5000
        });

        toast.show();
        toastElement.addEventListener('hidden.bs.toast', function() {
            toastElement.remove();
        });
    }
    window.addEventListener('error', function(e) {
        if (e.error && e.error.response) {
            showToast('An error occurred. Please try again.', 'error');
        }
    });
</script>
<style>
    .toast {
        min-width: 300px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .toast-body {
        font-size: 0.95rem;
    }
</style>
