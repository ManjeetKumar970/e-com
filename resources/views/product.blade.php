<!doctype html>
<html class="no-js" lang="en">
     @extends('layouts.app')
    @section('content')
    <body data-mobile-nav-style="classic">
        <!-- start header -->
<pre>{{ json_encode($barcodes, JSON_PRETTY_PRINT) }}</pre>
        <!-- end header --> 
        <!-- start section -->
        <section class="top-space-margin half-section bg-gradient-very-light-gray">
            <div class="container">
                <div class="row align-items-center justify-content-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                    <div class="col-12 col-xl-8 col-lg-10 text-center position-relative page-title-extra-large">
                        <h1 class="alt-font fw-600 text-dark-gray mb-10px">Shop</h1> 
                    </div>
                    <div class="col-12 breadcrumb breadcrumb-style-01 d-flex justify-content-center">
                        <ul>
                            <li><a href="demo-fashion-store.html">Home</a></li> 
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="pt-0 ps-6 pe-6 lg-ps-2 lg-pe-2 sm-ps-0 sm-pe-0">
            <div class="container-fluid">
                <div class="row flex-row-reverse"> 
                    <div class="col-xxl-10 col-lg-9 ps-5 md-ps-15px md-mb-60px">
                        <ul class="shop-modern shop-wrapper grid-loading grid grid-4col xl-grid-3col sm-grid-2col xs-grid-1col gutter-extra-large text-center" data-anime='{ "el": "childs", "translateY": [-15, 0], "opacity": [0,1], "duration": 300, "delay": 0, "staggervalue": 150, "easing": "easeOutQuad" }'>
                            <li class="grid-sizer"></li>
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-01.jpg" alt=""> 
                                            <span class="lable new">New</span>
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Textured sweater</a>
                                        <div class="price lh-22 fs-16"><del>$200.00</del>$189.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-02.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Traveller shirt</a>
                                        <div class="price lh-22 fs-16"><del>$350.00</del>$289.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-03.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Crewneck sweatshirt</a>
                                        <div class="price lh-22 fs-16"><del>$220.00</del>$199.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-04.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Skinny trousers</a>
                                        <div class="price lh-22 fs-16"><del>$300.00</del>$259.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-05.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Sleeve sweater</a>
                                        <div class="price lh-22 fs-16"><del>$250.00</del>$239.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-06.jpg" alt=""> 
                                            <span class="lable hot">Hot</span>
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Pocket sweatshirt</a>
                                        <div class="price lh-22 fs-16"><del>$200.00</del>$189.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-07.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Cotton sweater</a>
                                        <div class="price lh-22 fs-16"><del>$150.00</del>$129.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-08.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Texture regular</a>
                                        <div class="price lh-22 fs-16"><del>$170.00</del>$120.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-09.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Sequined dress</a>
                                        <div class="price lh-22 fs-16"><del>$190.00</del>$150.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-10.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Bermuda shorts</a>
                                        <div class="price lh-22 fs-16"><del>$120.00</del>$100.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-11.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Traveller shirt</a>
                                        <div class="price lh-22 fs-16"><del>$300.00</del>$259.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="shop-box mb-10px">
                                    <div class="shop-image mb-20px">
                                        <a href="demo-fashion-store-single-product.html">
                                            <img src="images/demo-fashion-store-product-12.jpg" alt=""> 
                                            <div class="shop-overlay bg-gradient-gray-light-dark-transparent"></div>
                                        </a>
                                        <div class="shop-buttons-wrap">
                                            <a href="demo-fashion-store-single-product.html" class="alt-font btn btn-small btn-box-shadow btn-white btn-round-edge left-icon add-to-cart">
                                                <i class="feather icon-feather-shopping-bag"></i><span class="quick-view-text button-text">Add to cart</span>
                                            </a>
                                        </div>
                                        <div class="shop-hover d-flex justify-content-center"> 
                                            <ul>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="feather icon-feather-heart fs-16"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="w-40px h-40px bg-white text-dark-gray d-flex align-items-center justify-content-center rounded-circle ms-5px me-5px" data-bs-toggle="tooltip" data-bs-placement="left" title="Quick shop"><i class="feather icon-feather-eye fs-16"></i></a>
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                    <div class="shop-footer text-center">
                                        <a href="demo-fashion-store-single-product.html" class="alt-font text-dark-gray fs-19 fw-500">Textured sweater</a>
                                        <div class="price lh-22 fs-16"><del>$300.00</del>$259.00</div>
                                    </div>
                                </div>
                            </li>
                            <!-- end shop item -->
                        </ul>
                        <div class="w-100 d-flex mt-4 justify-content-center md-mt-30px">
                            <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">01</a></li>
                                <li class="page-item active"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#">04</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @include('partials/fliterproduct')
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start footer -->
        @include('partials.cookie')
        <!-- end footer -->
        <!-- start cookie message -->
        <div id="cookies-model" class="cookie-message bg-dark-gray border-radius-8px"> 
            <div class="cookie-description fs-14 text-white mb-20px lh-22">We use cookies to enhance your browsing experience, serve personalized ads or content, and analyze our traffic. By clicking "Allow cookies" you consent to our use of cookies. </div>   
            <div class="cookie-btn">
                <a href="#" class="btn btn-transparent-white border-1 border-color-transparent-white-light btn-very-small btn-switch-text btn-rounded w-100 mb-15px" aria-label="btn">
                    <span>
                        <span class="btn-double-text" data-text="Cookie policy">Cookie policy</span> 
                    </span>
                </a> 
                <a href="#" class="btn btn-white btn-very-small btn-switch-text btn-box-shadow accept_cookies_btn btn-rounded w-100" data-accept-btn aria-label="text">
                    <span>
                        <span class="btn-double-text" data-text="Allow cookies">Allow cookies</span> 
                    </span>
                </a>
            </div> 
        </div>
        <!-- end cookie message -->
        <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
            <a href="#" class="scroll-top" aria-label="scroll">
                <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
            </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/vendors.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
     @endsection
</html>