<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{asset('css/productreview.css')}}">
 <style>

    </style>
</head>
<body>
@include('partials.header')

    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Thermal Printers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">EPSON TM-T20III</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Main Product Section -->
    <div class="container product-card my-5" >
        <div class="row">
            @if($product)                
  
            <!-- Product Images -->
            <div class="col-lg-6 mb-4">
                <div class="product-image-container" id="main-product-image">
                <img src="{{ asset('storage/' . ($product->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                    alt="{{ $product->name }}" 
                    class="product-image-pv" 
                    id="mainProductImage">
            </div>
                
              <!-- Thumbnails -->
            <div class="thumbnail-container">
                @foreach ($product->productImages as $image)
                    <div class="thumbnail {{ $loop->first ? 'active' : '' }}" 
                        data-image="{{ asset('storage/' . $image->image_url) }}">
                        <img src="{{ asset('storage/' . $image->image_url) }}" 
                            alt="{{ $product->name }} image {{ $loop->iteration }}">
                    </div>
                @endforeach
            </div>
                
                <!-- Video Section -->
                <div class="video-container position-relative" style="padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    @if(!empty($product->product_video_url))
                        @php
                            // Extract YouTube video ID from URL
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $product->product_video_url, $matches);
                            $videoId = $matches[1] ?? null;
                        @endphp

                        @if($videoId)
                            <div id="video-placeholder-{{ $videoId }}" class="video-placeholder position-absolute top-0 start-0 w-100 h-100" 
                                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); cursor: pointer;"
                                onclick="playVideo('{{ $videoId }}')">
                                <div class="video-overlay d-flex flex-column justify-content-center align-items-center h-100">
                                    <i class="fas fa-play-circle fa-3x mb-3 text-white" style="opacity: 0.9;"></i>
                                    <h5 class="text-white mb-2">Watch Product Demo</h5>
                                    <p class="mb-0 text-white small">Click to play</p>
                                </div>
                            </div>
                            
                            <div id="video-iframe-{{ $videoId }}" class="position-absolute top-0 start-0 w-100 h-100" style="display: none;">
                                <!-- YouTube iframe will be inserted here -->
                            </div>

                            <!-- Optional: Button to open on YouTube -->
                            <a href="{{ $product->product_video_url }}" target="_blank" 
                             style="top: 10px; right: 10px; z-index: 1000; opacity: 0.9;">
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-lg-6">
                <h1 class="h2 mb-3">{{$product->name }}</h1>
                <p class="text-muted mb-3">{{$product->short_description}}</p>
                
                <!-- Rating -->
                <div class="d-flex align-items-center mb-3">
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="ms-1 text-dark">4.6</span>
                    </div>
                    <span class="rating-info">2,847 ratings and 892 reviews</span>
                </div>
                
                <!-- Price Section -->
                <div class="mb-4">
                    <div class="special-price-badge">Special Price</div>
                    <div>
                        <span class="current-price">₹{{ $product->sale_price }}</span>
                        <span class="original-price">₹{{ $product->regular_price }}</span>
                        <span class="discount-badge">{{ round(100 - ($product->sale_price / $product->regular_price * 100)) }}% off</span>
                    </div>
                </div>
                
                <!-- Product Specifications -->
                <div class="mb-4">
                    <table class="table table-sm product-specs-table">
                        <tr>
                            <td>Category</td>
                            <td>{{$product->category->name}}</td>
                        </tr>
                        <tr>
                            <td>Product Model</td>
                            <td>{{$product->model_number ??0}}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{$product->model_number ??0}}mm</td>
                        </tr>
                        <tr>
                            <td>Diameter</td>
                            <td>{{$product->model_number ??0}}mm</td>
                        </tr>
                        <tr>
                            <td>Core</td>
                            <td>{{$product->model_number ??0}}" Inch</td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>{{$product->model_number ??0}}</td>
                        </tr>
                        <tr>
                            <td>Standard Packing</td>
                            <td>{{$product->model_number ??0}}</td>
                        </tr>
                        <tr>
                            <td>Product Weight</td>
                            <td>{{$product->print_width ??0}}gm</td>
                        </tr>
                        <tr>
                            <td>Min Order Limit</td>
                            <td>{{$product->model_number ??0}}</td>
                        </tr>
                        <tr>
                            <td>Roll Length</td>
                            <td>{{$product->model_number ??0}}</td>
                        </tr>
                    </table>
                </div>
                @if(isset($product->paper_type))
                <!-- Material Selection -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Material:</label>
                    <select class="form-select">
                        <option>Select Material</option>
                        <option>Standard Thermal Paper</option>
                        <option>Premium Thermal Paper</option>
                        <option>Eco-Friendly Paper</option>
                    </select>
                </div>
                
                <!-- Quantity Selection -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Quantity:</label>
                    <select class="form-select">
                        <option>Select Quantity</option>
                        <option>1 Roll</option>
                        <option>5 Rolls</option>
                        <option>10 Rolls</option>
                        <option>16 Rolls (Standard Pack)</option>
                        <option>50 Rolls (Bulk)</option>
                    </select>
                </div>
                
                <!-- Core Selection -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Core:</label>
                    <select class="form-select">
                        <option>Select Core</option>
                        <option>1/2" Inch</option>
                        <option>3/4" Inch</option>
                        <option>1" Inch</option>
                    </select>
                </div>
                @endif
                <!-- Action Buttons -->
                <div class="action-buttons productview" data-product-id="{{ $product->id }}">
                    <button class="btn btn-primary btn-lg flex-fill me-2 add-to-cart-btn"  onclick="addToCart(this)">
                        <i class="fas fa-shopping-cart me-2"></i>ADD TO CART
                    </button>
                    <a href="/productcheckout" class="btn btn-success btn-lg flex-fill buy-now-btn">
                        <i class="fas fa-bolt me-2"></i>BUY NOW
                    </a>
                </div>
                
                <!-- Download Link -->
                <div class="text-center mt-3">
                    <a href="#" class="text-primary text-decoration-none">
                        <i class="fas fa-download me-1"></i>Download Product Catalog
                    </a>
                    <br>
                    <small class="text-muted">Complete specifications & compatibility guide</small>
                </div>
                
                <div class="action-buttons mt-3 justify-content-center">
                    <a href="#" class="btn-icon" title="Wishlist">
                        <i class="far fa-heart"></i>
                    </a>
                    <a href="#" class="btn-icon" title="Compare">
                        <i class="fas fa-balance-scale"></i>
                    </a>
                    <a href="#" class="btn-icon" title="Share">
                        <i class="fas fa-share-alt"></i>
                    </a>
                    <a href="#" class="btn-icon" title="Download">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn-icon" title="Print">
                        <i class="fas fa-print"></i>
                    </a>
                    <a href="#" class="btn-icon" title="Settings">
                        <i class="fas fa-cog"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
        <!-- Product Description -->
    @if(!isset($product->paper_type)) 

        <div class="container product-card py-5" style="margin-bottom: 10px;">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Product Description</h3>
                        </div>
                        <div class="card-body">
                           
                            <p> {{$product->short_description     ??''}}</p>
                            
                            <h5 class="mt-4 mb-3">Key Features:</h5>
                            <ul class="feature-list">
                                 <p> {{$product->description     ??''}}</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Highlights Section -->
        <div class="container product-card" style="margin-bottom: 10px;">
        <!-- Product Highlights Section -->
        <h2>Product Highlights</h2>
        <div class="highlights-grid">
            <div class="highlight-card">
                <div class="icon-wrapper icon-speed">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <h3>High Speed Printing</h3>
                <p>Print speed up to 250mm/sec for efficient business operations</p>
            </div>

            <div class="highlight-card">
                <div class="icon-wrapper icon-connectivity">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3>Multiple Connectivity</h3>
                <p>USB, Ethernet, and Serial ports for versatile connection options</p>
            </div>

            <div class="highlight-card">
                <div class="icon-wrapper icon-reliable">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Reliable & Durable</h3>
                <p>Built for heavy-duty commercial use with 2-year warranty</p>
            </div>

            <div class="highlight-card">
                <div class="icon-wrapper icon-integration">
                    <i class="fas fa-plug"></i>
                </div>
                <h3>Easy Integration</h3>
                <p>Compatible with Windows, Linux, Android, and iOS systems</p>
            </div>
        </div>
        </div>
        <div class="container product-card py-5" style="margin-bottom: 10px;">
        <!-- What's in the Box Section -->
        <div class="box-section">
            <h2>What's in the Box</h2>
            <div class="box-grid">
                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <p>EPSON TM-T20III Printer</p>
                </div>

                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-plug"></i>
                    </div>
                    <p>Power Adapter & Cable</p>
                </div>

                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-usb"></i>
                    </div>
                    <p>USB Cable</p>
                </div>

                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <p>Quick Setup Guide</p>
                </div>

                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-compact-disc"></i>
                    </div>
                    <p>Driver CD & Documentation</p>
                </div>

                <div class="box-item highlight-card">
                    <div class="box-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <p>Warranty Registration Card</p>
                </div>
            </div>
        </div>
     </div>
     @endif
        <!-- What's in the Box Section -->
        <!-- View Similar Products Section -->
        <div class="container   product-card py-5" style="margin-bottom: 10px;">
            <h3 class="">View Similar Products</h3>
            <div class="row g-4">
                @foreach ($relatedProducts as $relatedProduct)
            
                <div class="col-md-6 col-lg-3">
                     <a href="{{ route('product.show', ['slug' => $relatedProduct->slug, 'id' => $relatedProduct->id]) }}" style="text-decoration: none; color: inherit;">
                    <div class="product-card">
                      
                        <div class="product-image">
                          <img src="{{ asset('storage/' .($relatedProduct->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="" class="img-fluid">
                        </div>
                        
                        <div class="p-3">
                            <h6 class="fw-bold mb-2">{{$relatedProduct->name}}</h6>
                            <div class="price">₹{{$relatedProduct->sale_price}}</div>
                            <div class="original-price">₹{{$relatedProduct->regular_price}}</div>
                        </div>
                    </a>

                    </div>
                    
                </div>
                
                 @endforeach
            </div>
        </div>
  






   <div class="container product-card py-4" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-12">
                <!-- Customer Reviews Section -->
            <h2 class="card-title">Customer Reviews & Ratings</h2>
            
            <!-- Overall Rating -->
            <div class="overall-rating">
                <div class="rating-summary">
                    <div class="rating-number">4.6</div>
                    <div class="star-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="rating-count">2,847 ratings & 892 reviews</div>
                </div>
                
                <div class="rating-breakdown">
                    <div class="rating-row">
                        <span class="rating-label">5★</span>
                        <div class="rating-bar">
                            <div class="rating-fill" style="width: 68%"></div>
                        </div>
                        <span class="rating-percent">68%</span>
                    </div>
                    <div class="rating-row">
                        <span class="rating-label">4★</span>
                        <div class="rating-bar">
                            <div class="rating-fill" style="width: 22%"></div>
                        </div>
                        <span class="rating-percent">22%</span>
                    </div>
                    <div class="rating-row">
                        <span class="rating-label">3★</span>
                        <div class="rating-bar">
                            <div class="rating-fill" style="width: 7%"></div>
                        </div>
                        <span class="rating-percent">7%</span>
                    </div>
                    <div class="rating-row">
                        <span class="rating-label">2★</span>
                        <div class="rating-bar">
                            <div class="rating-fill" style="width: 2%"></div>
                        </div>
                        <span class="rating-percent">2%</span>
                    </div>
                    <div class="rating-row">
                        <span class="rating-label">1★</span>
                        <div class="rating-bar">
                            <div class="rating-fill" style="width: 1%"></div>
                        </div>
                        <span class="rating-percent">1%</span>
                    </div>
                </div>
            </div>

            <!-- Individual Reviews -->
            <div id="reviewsList">
                <!-- First Review (Always Visible) -->
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-avatar">R</div>
                        <div class="reviewer-info">
                            <div class="reviewer-top">
                                <div>
                                    <h6 class="reviewer-name">Rajesh Kumar</h6>
                                    <small class="review-date">15 Aug 2025</small>
                                </div>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="review-title">Excellent printer for restaurant use!</h6>
                    <p class="review-text">I purchased this for my restaurant and it's been working flawlessly for 6 months now. Print quality is crisp, speed is impressive, and the setup was very easy. Handles high volume printing during rush hours without any issues. Highly recommended for commercial use.</p>
                    <div class="review-actions">
                        <span class="helpful-badge">👍 Helpful (47)</span>
                        <span class="not-helpful">👎 Not Helpful (2)</span>
                    </div>
                </div>

                <!-- Hidden Reviews -->
                <div class="review-card hidden" data-hidden-review>
                    <div class="review-header">
                        <div class="reviewer-avatar">P</div>
                        <div class="reviewer-info">
                            <div class="reviewer-top">
                                <div>
                                    <h6 class="reviewer-name">Priya Sharma</h6>
                                    <small class="review-date">12 Aug 2025</small>
                                </div>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="review-title">Great value for money</h6>
                    <p class="review-text">Perfect for our retail store. The ethernet connectivity makes it easy to connect to our POS system. Print speed is fantastic and paper loading is very convenient. FormationTech's customer service was also very helpful during setup.</p>
                    <div class="review-actions">
                        <span class="helpful-badge">👍 Helpful (34)</span>
                        <span class="not-helpful">👎 Not Helpful (1)</span>
                    </div>
                </div>

                <div class="review-card hidden" data-hidden-review>
                    <div class="review-header">
                        <div class="reviewer-avatar">S</div>
                        <div class="reviewer-info">
                            <div class="reviewer-top">
                                <div>
                                    <h6 class="reviewer-name">Suresh Patel</h6>
                                    <small class="review-date">02 July 2025</small>
                                </div>
                                <div class="star-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="review-title">Good printer, minor setup issues</h6>
                    <p class="review-text">Overall satisfied with the printer performance. Print quality and speed are good. Had some initial setup issues with drivers on Windows 11, but FormationTech support helped resolve it quickly. Would recommend having technical support readily available during installation.</p>
                    <div class="review-actions">
                        <span class="helpful-badge">👍 Helpful (28)</span>
                        <span class="not-helpful">👎 Not Helpful (5)</span>
                    </div>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary" id="showMoreBtn" onclick="showMoreReviews()">Show More Reviews</button>
                <button class="btn btn-info" onclick="openReviewModal()">Write a Review</button>
            </div>
     
            </div>
        </div>
    </div>
   <!-- Review Modal -->
    <div class="modal" id="reviewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Write Your Review</h3>
                <button class="close-btn" onclick="closeReviewModal()">×</button>
            </div>
            
            <form onsubmit="submitReview(event)">
                <div class="form-group">
                    <label class="form-label">Your Name *</label>
                    <input type="text" class="form-input" id="reviewerName" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Rating *</label>
                    <div class="rating-input" id="ratingInput">
                        <i class="far fa-star" data-rating="1" onclick="setRating(1)"></i>
                        <i class="far fa-star" data-rating="2" onclick="setRating(2)"></i>
                        <i class="far fa-star" data-rating="3" onclick="setRating(3)"></i>
                        <i class="far fa-star" data-rating="4" onclick="setRating(4)"></i>
                        <i class="far fa-star" data-rating="5" onclick="setRating(5)"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Review Title *</label>
                    <input type="text" class="form-input" id="reviewTitle" placeholder="Sum up your experience" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Your Review *</label>
                    <textarea class="form-textarea" id="reviewText" placeholder="Share your experience with this product..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Review</button>
            </form>
        </div>
    </div>
<!-- FAQ Section -->
<div class="container product-card" style="margin-bottom: 10px">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Frequently Asked Questions</h5>
                        
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        What paper sizes does this printer support?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        This printer supports various paper sizes including 80mm thermal paper rolls, which are standard for receipt printing.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        Is installation support provided?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, we provide comprehensive installation support including driver setup and configuration assistance.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        What is the expected lifespan of this printer?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        With proper maintenance, this printer is designed to last 5-7 years in commercial environments with moderate to heavy usage.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                        Can this printer work with mobile devices?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, this printer supports mobile connectivity and is compatible with various mobile POS applications.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                        What type of warranty is included?
                                    </button>
                                </h2>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        This printer comes with a 2-year manufacturer warranty covering parts and labor for any manufacturing defects.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container product-card py-5" style="margin-bottom: 10px;">
        <div class="col-lg-12">
                <!-- Technical Specifications -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Technical Specifications</h5>
                        
                        <div class="spec-row py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Print Speed</small>
                                    <div class="fw-bold">260 mm/sec</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Paper Width</small>
                                    <div class="fw-bold">80mm</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="spec-row py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Connectivity</small>
                                    <div class="fw-bold">USB, Ethernet, Serial</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Paper Cut</small>
                                    <div class="fw-bold">Partial Cut</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="spec-row py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">OS Support</small>
                                    <div class="fw-bold">Windows, Linux, Android, iOS</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Weight</small>
                                    <div class="fw-bold">1.6 kg</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="spec-row py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Warranty</small>
                                    <div class="fw-bold">2 Years Manufacturer Warranty</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Dimensions</small>
                                    <div class="fw-bold">150 x 195 x 148 mm</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="spec-row py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Power Supply</small>
                                    <div class="fw-bold">Adapter: 1.5A (Standby: 0.1A)</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Operating Temperature</small>
                                    <div class="fw-bold">5°C to 45°C</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="py-3">
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Humidity Range</small>
                                    <div class="fw-bold">10% to 80% (Non-condensing)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<div class="container py-10 product-card" style="margin-bottom: 10px;">
        <!-- Customers Also Viewed Section -->
        <div class="customers-section">
            <h2 class="customers-title">Customers Also Viewed</h2>
            
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-image">EPSON TM-U220</div>
                        <div class="product-name">EPSON TM-U220 Dot Matrix Printer</div>
                        <div class="product-price">₹7,250</div>
                        <div class="product-rating">
                            <span class="star">★</span> 4.3 (1,234)
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-image">TSC TTP-244</div>
                        <div class="product-name">TSC TTP-244 Plus Label Printer</div>
                        <div class="product-price">₹12,999</div>
                        <div class="product-rating">
                            <span class="star">★</span> 4.5 (892)
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-image">Honeywell 1250g</div>
                        <div class="product-name">Honeywell 1250g Barcode Scanner</div>
                        <div class="product-price">₹4,850</div>
                        <div class="product-rating">
                            <span class="star">★</span> 4.7 (2,156)
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-image">POS Terminal</div>
                        <div class="product-name">All-in-One POS Terminal System</div>
                        <div class="product-price">₹24,999</div>
                        <div class="product-rating">
                            <span class="star">★</span> 4.2 (756)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <div class="container product-card">
  <div class="policy-section">
        <h2 class="customers-title">Return & Exchange Policy</h2>
        
        <div class="policy-grid">
            <div class="policy-card">
                <div class="policy-icon return-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <h4 class="policy-title">7 Days Return</h4>
                <p class="policy-description">
                    Easy returns within 7 days of delivery. No questions asked for unused items in original packaging.
                </p>
            </div>

            <div class="policy-card">
                <div class="policy-icon exchange-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h4 class="policy-title">Exchange Available</h4>
                <p class="policy-description">
                    Exchange facility available for defective products or size/model changes within 7 days.
                </p>
            </div>

            <div class="policy-card">
                <div class="policy-icon warranty-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4 class="policy-title">Warranty Protected</h4>
                <p class="policy-description">
                    All products are covered under manufacturer warranty. Extended warranty options available.
                </p>
            </div>

            <div class="policy-card">
                <div class="policy-icon pickup-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h4 class="policy-title">Free Pickup</h4>
                <p class="policy-description">
                    Free pickup service for returns and exchanges. Schedule pickup through customer support.
                </p>
            </div>
        </div>
    </div>
</div>
   
<center class="py-5">  <button class="btn btn-success">
        <i class="fas fa-share-alt"></i>
        Share
    </button>
</center>  

    <!-- Zoom Modal -->
    <div class="zoom-modal" id="zoomModal">
        <span class="close-btn">&times;</span>
        <img src="" alt="Zoomed Image" id="zoomedImage">
    </div>

    <!-- Bootstrap JS -->    
    <script>
        // Thumbnail click functionality with image switching
        document.querySelectorAll('.thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Remove active class from all thumbnails
                document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
                // Add active class to clicked thumbnail
                this.classList.add('active');
                
                // Get the image URL from data-image attribute
                const imageUrl = this.getAttribute('data-image');
                const mainImage = document.getElementById('mainProductImage');
                
                // Add fade effect
                mainImage.style.opacity = '0.3';
                
                setTimeout(() => {
                    mainImage.src = imageUrl;
                    mainImage.style.opacity = '1';
                }, 200);
            });
        });
        
        // Image zoom functionality
        document.getElementById('mainProductImage').addEventListener('click', function() {
            const modal = document.getElementById('zoomModal');
            const zoomedImg = document.getElementById('zoomedImage');
            
            zoomedImg.src = this.src;
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
        
        // Close zoom modal
        document.querySelector('.close-btn').addEventListener('click', function() {
            const modal = document.getElementById('zoomModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        // Close modal when clicking outside
        document.getElementById('zoomModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('zoomModal');
                if (modal.style.display === 'flex') {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            }
        });
        
        // Thumbnail hover effect
        document.querySelectorAll('.thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('mouseenter', function() {
                const mainImage = document.getElementById('mainProductImage');
                mainImage.style.transform = 'scale(1.02)';
            });
            
            thumbnail.addEventListener('mouseleave', function() {
                const mainImage = document.getElementById('mainProductImage');
                mainImage.style.transform = 'scale(1)';
            });
        });
        
        // Add to cart functionality
        document.querySelector('.add-to-cart-btn').addEventListener('click', function() {
            // Add loading state
            const btn = this;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check me-2"></i>Added to Cart!';
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-success');
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-primary');
                    btn.disabled = false;
                }, 2000);
            }, 1000);
        });
        
        // Buy now functionality
        document.querySelector('.buy-now-btn').addEventListener('click', function() {
            // Add loading state
            const btn = this;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            btn.disabled = true;
            
            setTimeout(() => {
                alert('Redirecting to secure checkout...');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 1500);
        });    
        // Additional Buy Now buttons functionality (in description section)
        document.querySelectorAll('button[style*="background-color: #6c5ce7"]').forEach(btn => {
            btn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                this.disabled = true;
                
                setTimeout(() => {
                    alert('Redirecting to secure checkout...');
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            });
        });
        
        // Action button functionalities
        document.querySelectorAll('.btn-icon').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const title = this.getAttribute('title');
                
                // Add visual feedback
                const icon = this.querySelector('i');
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin';
                
                setTimeout(() => {
                    icon.className = originalClass;
                    alert(`${title} functionality would be implemented here.`);
                }, 500);
            });
        });
        
        // Download Product Catalog functionality
        document.querySelectorAll('a[href="#"]').forEach(link => {
            if (link.textContent.includes('Download Product Catalog')) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');
                    const originalClass = icon.className;
                    
                    icon.className = 'fas fa-spinner fa-spin me-1';
                    
                    setTimeout(() => {
                        icon.className = 'fas fa-check me-1';
                        alert('Downloading product catalog...');
                        
                        setTimeout(() => {
                            icon.className = originalClass;
                        }, 2000);
                    }, 1000);
                });
            }
        });
        
        // Smooth scroll animation for page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to main elements
            const elements = document.querySelectorAll('.product-image-container, .thumbnail-container, .video-placeholder, h1, .rating-stars, .current-price, .product-specs-table');
            
            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
        
        // Enhanced image loading with placeholder
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '0';
                this.style.transform = 'scale(0.8)';
                
                setTimeout(() => {
                    this.style.transition = 'all 0.3s ease';
                    this.style.opacity = '1';
                    this.style.transform = 'scale(1)';
                }, 50);
            });
        });
    </script>


 <script>
        let selectedRating = 0;
        let reviewsVisible = false;

        function showMoreReviews() {
            const hiddenReviews = document.querySelectorAll('[data-hidden-review]');
            const btn = document.getElementById('showMoreBtn');
            
            if (!reviewsVisible) {
                hiddenReviews.forEach(review => {
                    review.classList.remove('hidden');
                });
                btn.textContent = 'Show Less';
                reviewsVisible = true;
            } else {
                hiddenReviews.forEach(review => {
                    review.classList.add('hidden');
                });
                btn.textContent = 'Show More Reviews';
                reviewsVisible = false;
            }
        }

        function openReviewModal() {
            document.getElementById('reviewModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeReviewModal() {
            document.getElementById('reviewModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        function setRating(rating) {
            selectedRating = rating;
            const stars = document.querySelectorAll('#ratingInput i');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('far');
                    star.classList.add('fas', 'active');
                } else {
                    star.classList.remove('fas', 'active');
                    star.classList.add('far');
                }
            });
        }

        function submitReview(event) {
            event.preventDefault();
            
            if (selectedRating === 0) {
                alert('Please select a rating!');
                return;
            }

            const name = document.getElementById('reviewerName').value;
            const title = document.getElementById('reviewTitle').value;
            const text = document.getElementById('reviewText').value;

            // Create new review element
            const reviewCard = document.createElement('div');
            reviewCard.className = 'review-card';
            
            const initial = name.charAt(0).toUpperCase();
            const today = new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
            
            const stars = Array(5).fill(0).map((_, i) => 
                i < selectedRating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>'
            ).join('');

            reviewCard.innerHTML = `
                <div class="review-header">
                    <div class="reviewer-avatar">${initial}</div>
                    <div class="reviewer-info">
                        <div class="reviewer-top">
                            <div>
                                <h6 class="reviewer-name">${name}</h6>
                                <small class="review-date">${today}</small>
                            </div>
                            <div class="star-rating">${stars}</div>
                        </div>
                    </div>
                </div>
                <h6 class="review-title">${title}</h6>
                <p class="review-text">${text}</p>
                <div class="review-actions">
                    <span class="helpful-badge">👍 Helpful (0)</span>
                    <span class="not-helpful">👎 Not Helpful (0)</span>
                </div>
            `;
            const reviewsList = document.getElementById('reviewsList');
            reviewsList.insertBefore(reviewCard, reviewsList.firstChild);
            alert('Thank you for your review!');
            closeReviewModal();
        }

        function resetForm() {
            document.getElementById('reviewerName').value = '';
            document.getElementById('reviewTitle').value = '';
            document.getElementById('reviewText').value = '';
            setRating(0);
        }
        document.getElementById('reviewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeReviewModal();
            }
        });
    </script>
<script>
function playVideo(videoId) {
    const placeholder = document.getElementById('video-placeholder-' + videoId);
    const iframeContainer = document.getElementById('video-iframe-' + videoId);
    
    // Hide placeholder
    placeholder.style.display = 'none';
    
    // Create and insert YouTube iframe
    const iframe = document.createElement('iframe');
    iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
    iframe.setAttribute('frameborder', '0');
    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
    iframe.setAttribute('allowfullscreen', '');
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.position = 'absolute';
    iframe.style.top = '0';
    iframe.style.left = '0';
    
    iframeContainer.appendChild(iframe);
    iframeContainer.style.display = 'block';
}
</script>

<style>
.video-placeholder {
    transition: transform 0.3s ease;
}

.video-placeholder:hover {
    transform: scale(1.02);
}

.video-placeholder:hover .video-overlay i {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}
</style>
</body>
    @include('partials.footer')
</html>