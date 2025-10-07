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
                        <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2" style="font-size: 30px;"></i> Manjeet
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-user me-2 text-primary"></i> My Profile</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-heart me-2 text-danger"></i> Wishlist <span class="badge bg-secondary ms-auto">2</span></a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-tag me-2 text-success"></i> Coupons</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-bell me-2 text-warning"></i> Notifications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-sign-out-alt me-2 text-secondary"></i> Logout</a></li>
                        </ul>
                    </div>

                    <!-- Account Dropdown (Mobile Only) -->
                    <div class="dropdown d-lg-none">
                        <a href="#" class="text-dark" id="accountDropdownMobile" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user" style="font-size: 24px;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="accountDropdownMobile">
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-user me-2 text-primary"></i> My Profile</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-heart me-2 text-danger"></i> Wishlist <span class="badge bg-secondary ms-auto">2</span></a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-tag me-2 text-success"></i> Coupons</a></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-bell me-2 text-warning"></i> Notifications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-sign-out-alt me-2 text-secondary"></i> Logout</a></li>
                        </ul>
                    </div>

                    <!-- Cart Dropdown -->
                    <div class="dropdown position-relative d-flex align-items-center">
                        <a href="#" class="text-decoration-none text-dark" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-shopping-cart" style="font-size: 24px;"></i>
                            <span class="d-none d-lg-inline ms-1">Cart</span>
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill badge-cart">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown" style="min-width: 250px;">
                            <li class="px-3 py-2">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://via.placeholder.com/50" alt="Product" class="me-2 rounded">
                                    <div class="flex-grow-1">
                                        <small class="d-block">Thermal Printer</small>
                                        <small class="text-muted">₹5,999</small>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-center fw-bold text-primary" href="#">View Cart (3 items)</a></li>
                            <li><a class="dropdown-item text-center btn btn-primary text-white" href="#">Checkout</a></li>
                        </ul>
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
        const scrollThreshold = 50; // Minimum scroll distance to trigger hide/show
        
        // Only apply on mobile screens
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

@include('partials.navbar')