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
                            <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="accountDropdown" >
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-user me-2 text-primary"></i> My Profile</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-heart me-2 text-danger"></i> Wishlist <span class="badge bg-secondary ms-auto">2</span></a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-tag me-2 text-success"></i> Coupons</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-bell me-2 text-warning"></i> Notifications</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-sign-out-alt me-2 text-secondary"></i> Logout</a></li>
                            </ul>
                        </div>

                        <!-- Account Icon (Mobile Only) -->
                        <a href="#" class="text-dark d-lg-none" data-bs-toggle="dropdown">
                            <i class="fas fa-user me-2" style="font-size: 30px;"></i>
                        </a>

                        <!-- Cart Dropdown -->
                        <div class="dropdown position-relative d-flex align-items-center">
                            <a href="#" class="text-decoration-none text-dark" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
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
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="col-12 col-lg-7 order-lg-2 search-wrapper">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Search for thermal printers, barcode labels...">
                        <button class="btn btn-primary search-btn px-4" type="button">
                            <i class="fas fa-search"></i>
                            <span class="d-none d-md-inline ms-2">Search</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  @include('partials.navbar')
