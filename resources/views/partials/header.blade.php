<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <title>Formatter Tech - Transform Your Business</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   
</head>
<style>
    /* Mobile Search Improvements */
    body{
     background-color: #f8f9fa;   
    }
    @media (max-width: 991.98px) {
        .input-group input.form-control {
            font-size: 0.85rem !important;
            padding: 0.5rem 0.75rem !important;
        }
        
        .input-group .btn {
            padding: 0.5rem 0.75rem !important;
        }
        
        .navbar-toggler {
            padding: 0.25rem 0.5rem;
            font-size: 1.1rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        /* Search bar hide/show animation */
        .search-bar-wrapper {
            max-height: 100px;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease, margin 0.3s ease;
            opacity: 1;
        }
        
        .search-bar-wrapper.hidden {
            max-height: 0;
            opacity: 0;
            margin-top: 0 !important;
        }
    }
    
    /* Better spacing for mobile icons */
    @media (max-width: 991.98px) {
        .col-8 .gap-2 {
            gap: 0.75rem !important;
        }
    }
</style>
<!-- Main Navigation -->
 <div class="top-bar d-none d-lg-block bg-dark text-white py-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-phone me-2"></i> +91 98765 43210
                    <i class="fas fa-envelope ms-3 me-2"></i> info@formattertech.com
                </div>
                <div>
                    GST: 09AADCF1234H1Z5
                </div>
            </div>
        </div>
    </div>
    @include('partials.alert')
<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <div class="row w-100 g-0 align-items-center">
            <!-- Logo -->
            <div class="col-4 col-lg-2">
                <a class="navbar-brand mb-0 d-flex align-items-center" href="#">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('images/logos/logo.png')}}" alt="" style="width: 50px; height: 60px;">
                    </div>
                </a>
            </div>

            <!-- Right Icons (Mobile) -->
            <div class="col-8 col-lg-3 order-lg-3 ms-lg-auto">
                <div class="d-flex justify-content-end align-items-center gap-2 gap-lg-3">
                    <!-- Account Dropdown (Desktop Only) -->
                  <div class="dropdown d-none d-lg-block d-flex align-items-center">
                    @if(Auth::check())
                        <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2" style="font-size: 30px;"></i> {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-user me-2 text-primary"></i> My Profile</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('wishlist.index') }}"><i class="fas fa-heart me-2 text-danger"></i> Wishlist <span class="badge bg-secondary ms-auto">{{$wishlistCount}}</span></a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-tag me-2 text-success"></i> Coupons</a></li>
                            <a class="dropdown-item d-flex align-items-center" 
                                href="{{ route('orderconfirmation', Auth::user()->id) }}">
                                <i class="fas fa-cart-shopping me-2 text-warning"></i> Order list
                            </a>                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="{{ route('userLogout') }}"><i class="fas fa-sign-out-alt me-2 text-secondary"></i> Logout</a></li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                            <i class="fas fa-user me-2" style="font-size: 30px;"></i> Login
                        </a>
                    @endif
                </div>
                    <!-- Account Dropdown (Mobile Only) -->
                    <div class="dropdown d-lg-none">
                        <a href="#" class="text-dark" id="accountDropdownMobile" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user" style="font-size: 24px;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="accountDropdownMobile">
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-user me-2 text-primary"></i> My Profile</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-heart me-2 text-danger"></i> Wishlist <span class="badge bg-secondary ms-auto">0</span></a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-tag me-2 text-success"></i> Coupons</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="as fa-cart-shopping me-2 text-warning"></i> Order list</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-sign-out-alt me-2 text-secondary"></i> Logout</a></li>
                        </ul>
                    </div>

                    <!-- Cart Dropdown -->
                   <!-- Cart Dropdown -->
<div class="dropdown">
     @if($cartCount > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            {{ $cartCount }}
            <span class="visually-hidden">items in cart</span>
        </span>
        @endif
         @if(Auth::check())
    <a href="#" 
       class="btn btn-link text-dark text-decoration-none position-relative d-flex align-items-center p-2" 
       id="cartDropdown" 
       data-bs-toggle="dropdown" 
       aria-expanded="false">
        <i class="fas fa-shopping-cart fs-4"></i>
        <span class="d-none d-lg-inline ms-2">Cart</span>
    </a>
    @endif
    <div class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-0" style="min-width: 380px;">
        @php
            $cartCollection = collect($cartItems ?? []);
        @endphp

        @if($cartCollection->isEmpty())
            <!-- Empty Cart State -->
            <div class="text-center py-5 px-3">
                <i class="fas fa-shopping-cart text-muted mb-3" style="font-size: 3rem; opacity: 0.3;"></i>
                <p class="text-muted mb-0">Your cart is empty</p>
            </div>
        @else
            <!-- Cart Items -->
            <div class="overflow-auto" style="max-height: 350px;">
                @foreach ($cartItems as $item)
                <div class="d-flex align-items-center p-3 border-bottom position-relative">
                    <!-- Product Image -->
                         <a href="{{ url('productreview/' .  $item->product->slug . '/' . $item->product->id) }}">
                        
                    <img src="{{ asset('storage/' . ($item->product->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                         alt="{{ $item->product->name }}" 
                         class="rounded me-3 flex-shrink-0"
                         style="width: 70px; height: 70px; object-fit: cover;"> </a>
                    
                    <!-- Product Details -->
                    <div class="flex-grow-1">
                        <h6 class="mb-1 fw-bold text-dark" style="font-size: 0.95rem;">
                            {{ $item->product->name }}
                        </h6>
                        <p class="mb-0 fw-semibold" style="color: #9ca3af; font-size: 0.9rem;">
                            ₹{{ number_format($item->product->sale_price, 2) }}
                        </p>
                    </div>
                    
                    <!-- Quantity Controls & Delete -->
                    <div class="d-flex flex-column align-items-end gap-2">
                        <!-- Quantity Selector -->
                        <div class="d-flex align-items-center border rounded" style="background: #f8f9fa;">
                            <button class="btn btn-sm border-0 px-2 py-1" style="font-size: 0.75rem; color: #9ca3af;">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                            <span class="px-3 py-1 fw-semibold " style="font-size: 0.9rem; min-width: 30px; text-align: center;">
                                {{ $item->quantity }}
                            </span>
                            <button class="btn btn-sm border-0 px-2 py-1" style="font-size: 0.75rem; color: #9ca3af;">
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('cart.remove') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                        <button class="btn btn-sm border-0 p-1" style="color: #9ca3af;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Cart Footer -->
            <div class="p-4">
                <!-- Subtotal -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-semibold" style="color: #60a5fa; font-size: 1.1rem;">Subtotal:</span>
                    <span class="fw-bold" style="color: #60a5fa; font-size: 1.3rem;">
                        ₹{{ number_format($cartItems->sum(fn($item) => $item->product->sale_price * $item->quantity), 2) }}
                    </span>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <a href="/productcheckout" 
                       class="btn text-white fw-semibold py-2 rounded-3 border-0" 
                       style="background: #60a5fa; font-size: 1rem;">
                        Checkout
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

                    <!-- Mobile Hamburger -->
                    <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="col-12 col-lg-7 order-lg-2 mt-2 mt-lg-0 search-bar-wrapper">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for thermal printers, barcode labels..." 
                           style="border-radius: 0.375rem 0 0 0.375rem; padding: 0.6rem 1rem; font-size: 0.9rem;">
                    <button class="btn btn-primary px-3 px-md-4" type="button" 
                            style="border-radius: 0 0.375rem 0.375rem 0;">
                        <i class="fas fa-search"></i>
                        <span class="d-none d-md-inline ms-2">Search</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Collapsible Menu (if you have one) -->
<div class="collapse navbar-collapse" id="navbarNav">
    <!-- Your navigation menu items go here -->
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        let lastScrollTop = 0;
        const searchBar = document.querySelector('.search-bar-wrapper');
        const scrollThreshold = 50; 
                if (window.innerWidth <= 991) {
            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                // Scrolling down
                if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
                    searchBar.classList.add('hidden');
                } 
                // Scrolling up
                else if (scrollTop < lastScrollTop) {
                    searchBar.classList.remove('hidden');
                }
                
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, false);
        }
        
        // Re-check on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                searchBar.classList.remove('hidden');
            }
        });
    });
</script>
{{-- add to card and wishlist function script --}}

<script>
// Check if user is logged in
const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
const loginUrl = "{{ route('login') }}";

function toggleHeart(element) {
    // Check if user is logged in
    if (!isLoggedIn) {
        if (confirm('Please login to add items to wishlist. Redirect to login page?')) {
            window.location.href = loginUrl;
        }
        return;
    }

    // Get product ID
        const card = element.closest('.product-card-hot-deel, .product-card-hot ,.product-card-pd');

    const productId = card.dataset.productId;
    
    if (!productId) {
        alert('Product ID not found');
        return;
    }

    // Get CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        alert('Security token missing. Please refresh the page.');
        return;
    }

    // Disable during request
    const currentBg = element.style.background;
    element.style.transform = 'scale(1.3)';

    // Make AJAX request
    fetch('/wishlist/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken.getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Toggle heart color based on wishlist status
            if (data.in_wishlist) {
                element.style.background = '#dc3545'; // Red - in wishlist
                element.setAttribute('data-in-wishlist', 'true');
            } else {
                element.style.background = '#ff6b4a'; // Orange - not in wishlist
                element.setAttribute('data-in-wishlist', 'false');
            }

            // Update wishlist count in header (if you have one)
            const wishlistCount = document.querySelector('.wishlist-count');
            if (wishlistCount) {
                wishlistCount.textContent = data.wishlist_count;
            }

            // Animation
            setTimeout(() => {
                element.style.transform = 'scale(1)';
            }, 200);
        } else {
            throw new Error(data.message || 'Failed to update wishlist');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to update wishlist. Please try again.');
        element.style.background = currentBg;
        element.style.transform = 'scale(1)';
    });
}

function addToCart(element) {
    // Check if user is logged in
    if (typeof isLoggedIn !== "undefined" && !isLoggedIn) {
        if (confirm('Please login to add items to cart. Redirect to login page?')) {
            window.location.href = loginUrl;
        }
        return;
    }

    // Find the nearest product card (supports multiple layouts)
    const card = element.closest('.product-card-hot-deel, .product-card-hot, .product-card-pd, .productview, .card-actions-ws');
    if (!card) {
        alert('Product card not found.');
        return;
    }

    // Get product ID
    const productId = card.dataset.productId;
    if (!productId) {
        alert('Product ID not found.');
        return;
    }

    // Detect quantity (from visible quantity span or dataset)
    const qtyElement = card.querySelector('.quantity-ws');
    const quantity = qtyElement 
        ? parseInt(qtyElement.textContent) || 1 
        : parseInt(card.dataset.qty) || 1;

    // Get CSRF token
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfMeta) {
        console.error('CSRF token not found. Add <meta name="csrf-token" content="{{ csrf_token() }}"> to your layout.');
        alert('Security token missing. Please refresh the page.');
        return;
    }
    const csrfToken = csrfMeta.getAttribute('content');

    // Button animation start
    element.disabled = true;
    const originalText = element.innerHTML;
    element.innerHTML = '⏳';

    // Send request
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity ?? 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Success UI feedback
            element.innerHTML = '✓';
            element.style.background = '#28a745';
            element.style.transform = 'scale(1.2)';

            const cartCount = document.querySelector('.cart-count');
            if (cartCount && data.cart_count) {
                cartCount.textContent = data.cart_count;
            }

            // Animate card glow
            card.style.transform = 'translateY(-15px) scale(1.02)';
            card.style.boxShadow = '0 30px 60px rgba(40, 167, 69, 0.2)';

            setTimeout(() => {
                // Reset after success
                element.innerHTML = originalText;
                element.style.background = 'linear-gradient(135deg, #ff6b4a 0%, #ff8a65 100%)';
                element.style.transform = 'scale(1)';
                element.disabled = false;
                card.style.transform = '';
                card.style.boxShadow = '';
            }, 1500);
        } else {
            throw new Error(data.message || 'Failed to add to cart');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to add product to cart. Please try again.');
        element.innerHTML = originalText;
        element.style.background = 'linear-gradient(135deg, #ff6b4a 0%, #ff8a65 100%)';
        element.disabled = false;
    });
}


// Add stagger animation on load
window.addEventListener('load', () => {
    const cards = document.querySelectorAll('.product-card-hot-deel,product-card-hot ,.product-card-pd ,.productview');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 200);
    });

    // Load wishlist status for logged-in users
    if (isLoggedIn) {
        loadWishlistStatus();
    }
});

// Load wishlist status for all products
function loadWishlistStatus() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) return;

    const cards = document.querySelectorAll('.product-card-hot-deel');
    cards.forEach(card => {
        const productId = card.dataset.productId;
        const heartIcon = card.querySelector('.heart-icon-hot-deel');

        fetch('/wishlist/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken.getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.in_wishlist) {
                heartIcon.style.background = '#dc3545';
                heartIcon.setAttribute('data-in-wishlist', 'true');
            }
        })
        .catch(error => console.error('Error loading wishlist status:', error));
    });
}
</script>
@include('partials.navbar')