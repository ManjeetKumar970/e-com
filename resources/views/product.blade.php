<!DOCTYPE html>
<html lang="en">
<head>

    @include('partials.head1')
    
</head>
<body>
    @include('partials.header')
    <!-- Hero Section -->
    <div class="hero-section-pd">
        <div class="container">
            <h1>Business Equipment & Solutions</h1>
            <p>Find the perfect tools to streamline your operations and boost productivity</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- sidebar-pd -->
            <div class="col-lg-3">
                @include('partials.filterpart')
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Results Header -->
                @include('partials.lowpriceandhighprice')

                <!-- Product Grid -->
                <div class="row">
                    <!-- Product 1 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-bestseller">Best Seller</div>
                            <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Thermal Printers</div>
                            <h6 class="product-title">TSC Alpha-4 Thermal Printer</h6>
                            <ul class="product-features">
                                <li>High-speed printing</li>
                                <li>Wireless connectivity</li>
                                <li>Multiple size support</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹12,999</span>
                                <span class="original-price">₹15,999</span>
                                <span class="discount-badge">19% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>



                    <!-- Product 2 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-new">New</div>
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Barcode Scanners</div>
                            <h6 class="product-title">ProScan X200 Scanner</h6>
                            <ul class="product-features">
                                <li>2D barcode support</li>
                                <li>Lightning fast scanning</li>
                                <li>Durable design</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹4,999</span>
                                <span class="original-price">₹6,999</span>
                                <span class="discount-badge">29% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">POS Software</div>
                            <h6 class="product-title">SmartPOS Pro Software</h6>
                            <ul class="product-features">
                                <li>Inventory management</li>
                                <li>GST billing integrated</li>
                                <li>Multi-store support</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹19,999</span>
                                <span class="original-price">₹24,999</span>
                                <span class="discount-badge">20% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">POS Software</div>
                            <h6 class="product-title">SmartPOS Pro Software</h6>
                            <ul class="product-features">
                                <li>Complete inventory management</li>
                                <li>GST billing integrated</li>
                                <li>Cloud backup</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹19,999</span>
                                <span class="original-price">₹24,999</span>
                                <span class="discount-badge">20% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-popular">Popular</div>
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Barcode Labels</div>
                            <h6 class="product-title">Premium Barcode Labels</h6>
                            <ul class="product-features">
                                <li>Water resistant</li>
                                <li>Strong adhesive</li>
                                <li>Multiple sizes</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹899</span>
                                <span class="original-price">₹1,299</span>
                                <span class="discount-badge">31% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Billing Rolls</div>
                            <h6 class="product-title">Thermal Paper Roll 80mm</h6>
                            <ul class="product-features">
                                <li>Premium quality paper</li>
                                <li>Long lasting print</li>
                                <li>Pack of 50 rolls</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹1,499</span>
                                <span class="original-price">₹1,999</span>
                                <span class="discount-badge">25% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 7 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-best-value">Best Value</div>
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Cash Drawers</div>
                            <h6 class="product-title">Heavy Duty Cash Drawer</h6>
                            <ul class="product-features">
                                <li>5 Bill / 8 coin slots</li>
                                <li>RJ11 connection</li>
                                <li>Metal construction</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹3,299</span>
                                <span class="original-price">₹4,499</span>
                                <span class="discount-badge">27% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 8 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-best-value">Best Value</div>
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Cash Drawers</div>
                            <h6 class="product-title">Heavy Duty Cash Drawer</h6>
                            <ul class="product-features">
                                <li>5 Bill / 8 coin slots</li>
                                <li>RJ11 connection</li>
                                <li>Metal construction</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹3,299</span>
                                <span class="original-price">₹4,499</span>
                                <span class="discount-badge">27% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 9 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-new">New</div>
                            <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Thermal Printers</div>
                            <h6 class="product-title">Zebra ZD220 Desktop Printer</h6>
                            <ul class="product-features">
                                <li>Compact design</li>
                                <li>Easy setup</li>
                                <li>USB & Ethernet</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹8,999</span>
                                <span class="original-price">₹11,999</span>
                                <span class="discount-badge">25% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 10 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Custom Labels</div>
                            <h6 class="product-title">Custom Printed Labels</h6>
                            <ul class="product-features">
                                <li>Your logo & design</li>
                                <li>Multiple materials</li>
                                <li>Minimum 1000 pcs</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹2,499</span>
                                <span class="text-muted">Per 1000 pcs</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Get Quote</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 12 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="product-card-pd position-relative">
                            <div class="product-badge badge-hot-deal">Hot Deal</div>
                             <div class="product-image-pd">
                                <img src="{{asset('/images/products/2pd.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">Thermal Printers</div>
                            <h6 class="product-title">Epson TM-T82 Receipt Printer</h6>
                            <ul class="product-features">
                                <li>Auto cutter</li>
                                <li>ESC/POS compatible</li>
                                <li>Energy efficient</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹7,499</span>
                                <span class="original-price">₹9,999</span>
                                <span class="discount-badge">25% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Product pagination">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">36</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Experience the Difference -->
    @include('partials.experience')
</body>
    <!-- Footer -->
  @include('partials.footer')