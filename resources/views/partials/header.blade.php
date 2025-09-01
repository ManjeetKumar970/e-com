 <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-2 me-2">
                       <img src="{{asset('images/logos/logo.png')}}" alt="" style="width: 40px; height: 60px;">
                    </div>
                </div>
            </a>

            <!-- Search Bar -->
            <div class="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for thermal printers, barcode labels..." style="width: 599; height: 47;max-width: 596px;padding-right: 48px;padding-left: 48px;angle: 0 deg;opacity: 1;">
                    <button class="btn btn-primary" type="button" style="box-shadow: 0px 1px 2px 0px #0000000F; box-shadow: 0px 1px 3px 0px #0000001A;">Search</button>
                </div>
            </div>

            <!-- Right Side Icons -->
            <div class="d-flex align-items-center gap-3">
    <!-- Account Dropdown -->
    <div class="container">
                    <div class="dropdown">
                        <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i> Manjeet
                        </a>
                          <ul class="dropdown-menu p-2 shadow" aria-labelledby="accountDropdown" style="min-width: 220px;">
                            <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fas fa-user me-2"></i> My Profile
            </a>
        </li>
       
      
        <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fas fa-heart me-2"></i> Wishlist <span class="badge bg-secondary ms-auto">2</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fas fa-tag me-2"></i> Coupons
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fas fa-bell me-2"></i> Notifications
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>
                        </ul>
                    </div>
</div>  

<div class="container">
                <!-- Cart Dropdown -->
                <div class="dropdown position-relative">
                    <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart me-1"></i> Cart
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-pill" style="font-size: 10px;">3</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="cartDropdown">
                        <li><a class="dropdown-item" href="#">View Cart</a></li>
                        <li><a class="dropdown-item" href="#">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div >


            <!-- Mobile Toggle -->
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavs">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
  @include('partials.navbar')
