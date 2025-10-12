<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    @include('partials.header')
    <!-- Hero Section -->
    <div class="hero-section-pd">
    <div class="hero-background">
        <div class="moving-shape shape-1"></div>
        <div class="moving-shape shape-2"></div>
        <div class="moving-shape shape-3"></div>
        <div class="moving-shape shape-4"></div>
        <div class="moving-shape shape-5"></div>
    </div>
    <div class="container">
        <h1 class="hero-title">Business Equipment & Solutions</h1>
        <p class="hero-subtitle">Find the perfect tools to streamline your operations and boost productivity</p>
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
              @if(isset($products) && $products->count() > 0)
          @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 py-2">
            <div class="product-card-pd position-relative">
                @php
                    $labelClass = strtolower(str_replace(' ', '', $product->prodcutlabel ?? ''));
                @endphp

                @if(!empty($product->prodcutlabel))
                    <div class="product-badge badge-{{ $labelClass }}">
                        {{ $product->prodcutlabel }}
                    </div>
                @endif

                <div class="product-image-pd">
                    <img src="{{ asset('storage/' . ($product->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                         alt="{{ $product->name }}" 
                         class="img-fluid">
                </div>

                <div class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</div>
                <h6 class="product-title">{{ $product->name }}</h6>

                <ul class="product-features">
                    <li>High-speed printing</li>
                    <li>Wireless connectivity</li>
                    <li>Multiple size support</li>
                </ul>

                <div class="price-section-pd">
                    <span class="current-price">₹{{ $product->sale_price }}</span>
                    <span class="original-price">₹{{ $product->regular_price }}</span>
                    <span class="discount-badge" style="display: inline-block;
                                    padding: 2px 6px;
                                    font-size: 0.8rem;
                                    font-weight: bold;
                                    color: #fff;
                                    background-color: #e53935;
                                    border-radius: 4px;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;">
                        {{ round(100 - ($product->sale_price / $product->regular_price * 100)) }}% OFF
                    </span>
                </div>

                <div class="d-flex">
                    <button class="btn-add-cart">Add to Cart</button>
                    <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                </div>
            </div>
        </div>
    @endforeach
@else
@endif

                    <!-- Product 2 -->

                    @foreach ($allProducts as $allProduct)
                      @php
                            $labelClass = strtolower(str_replace(' ', '', $allProduct->prodcutlabel));
                        @endphp
                         <div class="col-lg-4 col-md-6 py-2">
                        <div class="product-card-pd position-relative" >
                            <div class="product-badge badge-{{$labelClass}}">{{$allProduct->prodcutlabel}}</div>
                             <div class="product-image-pd">
                                <img src="{{ asset('storage/' .($allProduct->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="" class="img-fluid">
                            </div>
                            <div class="product-category">{{ $allProduct->name}}</div>
                            <h6 class="product-title">{{ $allProduct->name}}</h6>
                            <ul class="product-features">
                                <li>2D barcode support</li>
                                <li>Lightning fast scanning</li>
                                <li>Durable design</li>
                            </ul>
                            <div class="price-section-pd">
                                <span class="current-price">₹{{ $allProduct->sale_price}}</span>
                                <span class="original-price">₹{{ $allProduct->regular_price}}</span>
                                <span class="discount-badge" style="display: inline-block;
                                    padding: 2px 6px;
                                    font-size: 0.8rem;
                                    font-weight: bold;
                                    color: #fff;
                                    background-color: #e53935;
                                    border-radius: 4px;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;">{{ round(100 - ($allProduct->sale_price / $allProduct->regular_price * 100)) }}% OFF</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-wishlist-pd"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
             @endforeach
                   
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