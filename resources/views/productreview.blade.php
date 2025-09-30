<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head1')
  <style>
    
        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 60px;
        }

        .highlight-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .highlight-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .icon-wrapper {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .icon-speed {
            background-color: #fff3cd;
            color: #f39c12;
        }

        .icon-connectivity {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .icon-reliable {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .icon-integration {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .highlight-card h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #1a1a1a;
        }

        .highlight-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        .box-section {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .box-section h2 {
            margin-bottom: 40px;
        }

        .box-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
        }

        .box-item {
            text-align: center;
        }

        .box-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #666;
        }

        .box-item p {
            font-size: 13px;
            color: #666;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            .highlights-grid {
                grid-template-columns: 1fr;
            }

            .box-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }



        .breadcrumb-nav {
            background-color: #f8f9fa;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .product-image-container {
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            border-radius: 8px;
            padding: 20px;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .product-image {
            max-width: 100%;
            max-height: 350px;
            object-fit: contain;
            transition: transform 0.3s ease;
            cursor: zoom-in;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .product-image:hover {
            transform: scale(1.05);
        }
        
        .thumbnail-container {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }
        
        .thumbnail {
            width: 60px;
            height: 60px;
            border: 2px solid #dee2e6;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 3px;
            transition: transform 0.3s ease;
        }
        
        .thumbnail:hover img {
            transform: scale(1.1);
        }
        
        .thumbnail.active {
            border-color: #007bff;
        }
        
        .thumbnail:hover {
            border-color: #007bff;
        }
        
        .thumbnail::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s ease;
            z-index: 2;
        }
        
        .thumbnail:hover::before {
            left: 100%;
        }
        
        .rating-stars {
            color: #28a745;
            margin-right: 10px;
        }
        
        .rating-info {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .special-price-badge {
            background-color: #28a745;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 10px;
            display: inline-block;
        }
        
        .current-price {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }
        
        .original-price {
            font-size: 1.2rem;
            color: #6c757d;
            text-decoration: line-through;
            margin-left: 10px;
        }
        
        .discount-badge {
            background-color: #ff6b35;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-left: 10px;
        }
        
        .product-specs-table {
            background-color: #f8f9fa;
        }
        
        .product-specs-table td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }
        
        .product-specs-table td:first-child {
            background-color: #e9ecef;
            font-weight: 500;
            width: 30%;
        }
        
        .feature-list {
            list-style: none;
            padding-left: 0;
        }
        
        .feature-list li {
            padding: 5px 0;
            position: relative;
            padding-left: 20px;
        }
        
        .feature-list li:before {
            content: "•";
            color: #28a745;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #dee2e6;
            background-color: white;
            color: #6c757d;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .btn-icon:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        
        .video-placeholder {
            border-radius: 8px;
            text-align: center;
            color: #6c757d;
            margin-top: 20px;
            cursor: pointer;
            transition: transform 0.3s ease;
            overflow: hidden;
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1560472355-536de3962603?w=400&h=250&fit=crop&crop=center');
            background-size: cover;
            background-position: center;
            min-height: 200px;
        }
        
        .video-placeholder:hover {
            transform: scale(1.02);
        }
        
        .video-overlay {
            background: rgba(0,0,0,0.6);
            border-radius: 8px;
            padding: 40px 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            border: none;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
            background: linear-gradient(135deg, #ff5722, #ff7043);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }
        
        .zoom-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }
        
        .zoom-modal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            animation: zoomIn 0.3s ease;
        }
        
        .zoom-modal .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            z-index: 10000;
        }
        
        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @media (max-width: 768px) {
            .current-price {
                font-size: 1.5rem;
            }
            
            .product-image-container {
                min-height: 250px;
            }
            
            .action-buttons {
                justify-content: center;
            }
        }


         .policy-section {
            width: 100%;
            max-width: 1200px;
        }

    

        .policy-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .policy-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
        }

        .policy-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .policy-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .policy-card:hover::before {
            opacity: 1;
        }

        .policy-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 2rem;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
        }

        .policy-card:hover .policy-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .return-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
        }

        .exchange-icon {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: #fff;
        }

        .warranty-icon {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: #fff;
        }

        .pickup-icon {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: #fff;
        }

        .policy-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .policy-description {
            font-size: 0.95rem;
            color: #4a5568;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }


            .policy-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .policy-card {
                padding: 30px 20px;
            }

            .policy-icon {
                width: 70px;
                height: 70px;
                font-size: 1.8rem;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .policy-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .policy-card:nth-child(1) { animation-delay: 0.1s; }
        .policy-card:nth-child(2) { animation-delay: 0.2s; }
        .policy-card:nth-child(3) { animation-delay: 0.3s; }
        .policy-card:nth-child(4) { animation-delay: 0.4s; }
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
    <div class="container product-card my-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6 mb-4">
                <div class="product-image-container" id="main-product-image">
                    <img src="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=500&h=400&fit=crop&crop=center" 
                         alt="EPSON TM-T20III Thermal Printer" 
                         class="product-image" 
                         id="mainProductImage">
                </div>
                
                <!-- Thumbnails -->
                <div class="thumbnail-container">
                    <div class="thumbnail active" data-image="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=500&h=400&fit=crop&crop=center">
                        <img src="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=60&h=60&fit=crop&crop=center" alt="Main Printer View">
                    </div>
                    <div class="thumbnail" data-image="https://images.unsplash.com/photo-1587560699334-cc4ff634909a?w=500&h=400&fit=crop&crop=center">
                        <img src="https://images.unsplash.com/photo-1587560699334-cc4ff634909a?w=60&h=60&fit=crop&crop=center" alt="Control Panel">
                    </div>
                    <div class="thumbnail" data-image="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&h=400&fit=crop&crop=center">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=60&h=60&fit=crop&crop=center" alt="Connectivity">
                    </div>
                    <div class="thumbnail" data-image="https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=500&h=400&fit=crop&crop=center">
                        <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?w=60&h=60&fit=crop&crop=center" alt="Setup Guide">
                    </div>
                </div>
                
                <!-- Video Section -->
                <div class="video-placeholder">
                    <div class="video-overlay">
                        <i class="fas fa-play-circle fa-3x mb-3 text-white"></i>
                        <h5 class="text-white">Play</h5>
                        <p class="mb-0 text-white">Product demonstration video</p>
                    </div>
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="col-lg-6">
                <h1 class="h2 mb-3">EPSON TM-T20III Thermal Receipt Printer</h1>
                <p class="text-muted mb-3">High Speed Business Printer (Black)</p>
                
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
                        <span class="current-price">₹8,450</span>
                        <span class="original-price">₹12,999</span>
                        <span class="discount-badge">35% off</span>
                    </div>
                </div>
                
                <!-- Product Specifications -->
                <div class="mb-4">
                    <table class="table table-sm product-specs-table">
                        <tr>
                            <td>Category</td>
                            <td>THERMAL POS ROLLS</td>
                        </tr>
                        <tr>
                            <td>Product Model</td>
                            <td>SW-TR79X50</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>79mm</td>
                        </tr>
                        <tr>
                            <td>Diameter</td>
                            <td>60mm</td>
                        </tr>
                        <tr>
                            <td>Core</td>
                            <td>1/2" Inch</td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>Roll</td>
                        </tr>
                        <tr>
                            <td>Standard Packing</td>
                            <td>16 Rolls Packing</td>
                        </tr>
                        <tr>
                            <td>Product Weight</td>
                            <td>200gm</td>
                        </tr>
                        <tr>
                            <td>Min Order Limit</td>
                            <td>1 Roll</td>
                        </tr>
                        <tr>
                            <td>Roll Length</td>
                            <td>50Mtr</td>
                        </tr>
                    </table>
                </div>
                
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
                
                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary btn-lg flex-fill me-2 add-to-cart-btn">
                        <i class="fas fa-shopping-cart me-2"></i>ADD TO CART
                    </button>
                    <button class="btn btn-success btn-lg flex-fill buy-now-btn">
                        <i class="fas fa-bolt me-2"></i>BUY NOW
                    </button>
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
        </div>
    </div>
        <!-- Product Description -->
        <div class="container product-card py-5">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Product Description</h3>
                    </div>
                    <div class="card-body">
                        <p>The EPSON TM-T20III is a high-performance thermal receipt printer designed for modern business environments. With its sleek design and robust functionality, this printer delivers exceptional print quality and reliability for retail, hospitality, and service industries.</p>
                        
                        <h5 class="mt-4 mb-3">Key Features:</h5>
                        <ul class="feature-list">
                            <li>Print speed up to 250mm/sec for fast customer service</li>
                            <li>Multiple connectivity options: USB, Ethernet, and Serial ports</li>
                            <li>Compact design perfect for space-constrained counters</li>
                            <li>ENERGY STAR qualified for reduced power consumption</li>
                            <li>Easy drop-in paper loading mechanism</li>
                            <li>Reliable partial cut function</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Product Highlights Section -->
        <div class="container card">
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
        <div class="container card py-5">
        <!-- What's in the Box Section -->
        <div class="box-section">
            <h2>What's in the Box</h2>
            <div class="box-grid">
                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-print"></i>
                    </div>
                    <p>EPSON TM-T20III Printer</p>
                </div>

                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-plug"></i>
                    </div>
                    <p>Power Adapter & Cable</p>
                </div>

                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-usb"></i>
                    </div>
                    <p>USB Cable</p>
                </div>

                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <p>Quick Setup Guide</p>
                </div>

                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-compact-disc"></i>
                    </div>
                    <p>Driver CD & Documentation</p>
                </div>

                <div class="box-item">
                    <div class="box-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <p>Warranty Registration Card</p>
                </div>
            </div>
        </div>
     </div>
     
        <!-- What's in the Box Section -->
        <!-- View Similar Products Section -->
        <div class="container   product-card py-5">
            <h3 class="">View Similar Products</h3>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-image">
                            EPSON TM series
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-2">EPSON TM-U220 Dot Matrix Printer</h6>
                            <div class="price">₹7,250</div>
                            <div class="original-price">₹8,500</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-image">
                            TSC TTP series
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-2">TSC TTP-244 Plus Label Printer</h6>
                            <div class="price">₹12,999</div>
                            <div class="original-price">₹15,000</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-image">
                            Honeywell 1250g
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-2">Honeywell 1250g Barcode Scanner</h6>
                            <div class="price">₹4,850</div>
                            <div class="original-price">₹5,500</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-image">
                            POS Terminal
                        </div>
                        <div class="p-3">
                            <h6 class="fw-bold mb-2">All-in-One POS Terminal System</h6>
                            <div class="price">₹24,999</div>
                            <div class="original-price">₹28,000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  






    <div class="container product-card py-4">
        <div class="row">
            <div class="col-12">
                <!-- Customer Reviews Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Customer Reviews & Ratings</h5>
                        
                        <!-- Overall Rating -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h2 class="display-4 mb-1">4.6</h2>
                                    <div class="star-rating mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="text-muted">1,647 ratings & 892 reviews</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <!-- Rating Breakdown -->
                                <div class="mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <small>5 <i class="fas fa-star text-warning"></i></small>
                                        </div>
                                        <div class="col-8">
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: 68%"></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <small class="text-muted">68%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <small>4 <i class="fas fa-star text-warning"></i></small>
                                        </div>
                                        <div class="col-8">
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: 22%"></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <small class="text-muted">22%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <small>3 <i class="fas fa-star text-warning"></i></small>
                                        </div>
                                        <div class="col-8">
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: 7%"></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <small class="text-muted">7%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <small>2 <i class="fas fa-star text-warning"></i></small>
                                        </div>
                                        <div class="col-8">
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: 2%"></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <small class="text-muted">2%</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-2">
                                            <small>1 <i class="fas fa-star text-warning"></i></small>
                                        </div>
                                        <div class="col-8">
                                            <div class="rating-bar">
                                                <div class="rating-fill" style="width: 1%"></div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <small class="text-muted">1%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Individual Reviews -->
                        <div class="review-card p-3 mb-3">
                            <div class="d-flex mb-2">
                                <div class="reviewer-avatar me-3">R</div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="mb-0">Rajesh Kumar</h6>
                                            <small class="text-muted">Top Reviewer</small>
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
                            <h6 class="mb-2">Excellent printer for restaurant use!</h6>
                            <p class="mb-2 text-muted">I purchased this for my restaurant and it's been working flawlessly for 6 months now. Print quality is crisp, speed is impressive, and the setup was very easy. Handles high volume printing during rush hours without any issues. Highly recommended for commercial use.</p>
                            <div class="d-flex gap-2">
                                <button class="btn helpful-badge">
                                    <i class="fas fa-thumbs-up me-1"></i> Helpful (17)
                                </button>
                                <button class="btn btn-link text-muted p-0">
                                    <i class="fas fa-flag me-1"></i> Not Helpful (2)
                                </button>
                            </div>
                        </div>

                        <div class="review-card p-3 mb-3">
                            <div class="d-flex mb-2">
                                <div class="reviewer-avatar me-3">P</div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="mb-0">Priya Sharma</h6>
                                            <small class="text-muted">3 days ago</small>
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
                            <h6 class="mb-2">Great value for money</h6>
                            <p class="mb-2 text-muted">Perfect for our retail store. The ethernet connectivity makes it easy to connect to our POS system. Print speed is fantastic and paper loading is very convenient. FormationTech's customer service was also very helpful during setup.</p>
                            <div class="d-flex gap-2">
                                <button class="btn helpful-badge">
                                    <i class="fas fa-thumbs-up me-1"></i> Helpful (14)
                                </button>
                                <button class="btn btn-link text-muted p-0">
                                    <i class="fas fa-flag me-1"></i> Not Helpful (3)
                                </button>
                            </div>
                        </div>

                        <div class="review-card p-3 mb-3">
                            <div class="d-flex mb-2">
                                <div class="reviewer-avatar me-3">S</div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="mb-0">Suresh Patel</h6>
                                            <small class="text-muted">1 week ago</small>
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
                            <h6 class="mb-2">Good printer, minor setup issues</h6>
                            <p class="mb-2 text-muted">Overall satisfied with the printer performance. Print quality and speed are good. Had some initial setup issues with drivers on Windows 11, but FormationTech support helped resolve it quickly. Would recommend having technical support readily available during installation.</p>
                            <div class="d-flex gap-2">
                                <button class="btn helpful-badge">
                                    <i class="fas fa-thumbs-up me-1"></i> Helpful (26)
                                </button>
                                <button class="btn btn-link text-muted p-0">
                                    <i class="fas fa-flag me-1"></i> Not Helpful (3)
                                </button>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary">View All Reviews</button>
                        </div>
                    </div>
                </div>

                <!-- FAQ Section -->
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

            
        </div>
    </div>
    <div class="container product-card py-5">
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
<div class="container py-10 product-card">
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


<div class="container product-card py-5">
    <h2 class="section-title">Return & Exchange Policy</h2>
    <div class="row">
        <div class="col-3">
            <div class="policy-card">
                <div class="policy-icon return-icon">
                    <i class="fas fa-undo-alt"></i>
                </div>
                <h4 class="policy-title">7 Days Return</h4>
                <p class="policy-description">
                    Easy returns within 7 days of delivery. No questions asked for unused items in original packaging.
                </p>
            </div>
        </div>

        <div class="col-3">
            <div class="policy-card">
                <div class="policy-icon exchange-icon">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <h4 class="policy-title">Exchange Available</h4>
                <p class="policy-description">
                    Exchange facility available for defective products or size/model changes within 7 days.
                </p>
            </div>
        </div>

        <div class="col-3">
            <div class="policy-card">
                <div class="policy-icon warranty-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4 class="policy-title">Warranty Protected</h4>
                <p class="policy-description">
                    All products are covered under manufacturer warranty. Extended warranty options available.
                </p>
            </div>
        </div>

        <div class="col-3">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
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
        
        // Additional Add to Cart buttons functionality (in description section)
        document.querySelectorAll('button[style*="background-color: #ff6b47"]').forEach(btn => {
            btn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Adding...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
                    this.style.backgroundColor = '#28a745';
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.style.backgroundColor = '#ff6b47';
                        this.disabled = false;
                    }, 2000);
                }, 1000);
            });
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
        
        // Video placeholder click
        document.querySelector('.video-placeholder').addEventListener('click', function() {
            const overlay = this.querySelector('.video-overlay');
            overlay.style.background = 'rgba(0,0,0,0.8)';
            
            setTimeout(() => {
                alert('Video player would open here.');
                overlay.style.background = 'rgba(0,0,0,0.6)';
            }, 200);
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


 
</body>
    @include('partials.footer')
</html>