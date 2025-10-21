<div class="py-5">
    <div class="text-center">
        <h2 class="section-title">Hot Deals</h2>
        <p class="text-muted">Specialized technology for food service businesses</p>
    </div>

    <div class="container-hot-deel py-5">
        @foreach ($products->slice(0, 4) as $product)
         
        <div class="product-card-hot-deel card-1" data-product-id="{{ $product->id }}">
            <div class="heart-icon-hot-deel" 
                 onclick="toggleHeart(this)"
                 data-in-wishlist="false"
                 style="background: #ff6b4a">
            </div>

            <div class="image-section-hot-deel">
                <a href="{{ route('product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">
                    <img src="{{ asset('storage/' .($product->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                         alt="{{ $product->name }}" 
                         class="product-image-hot-deel">
                </a>
            </div>
            
            <div class="info-section-hot-deel">
                <div class="hot-deal-badge">HOT DEAL</div>
                <div>
                    <h2 class="product-title-hot-deel">{{ $product->name }}</h2>
                    <p class="product-category-hot-deel">{{ $product->category->name ?? 'Uncategorized' }}</p>
                </div>
                <div class="pricing-section-hot-deel">
                    <div class="price-container-hot-deel">
                        <div class="current-price-hot-deel">
                            <span class="currency-hot-deel">₹</span>{{ $product->sale_price }}
                        </div>
                        <div class="original-price-hot-deel">₹{{ $product->regular_price }}</div>
                    </div>
                    <button class="add-button-hot-deel" onclick="addToCart(this)">+</button>
                </div>
            </div>
        </div>
        
        @endforeach
    </div>
</div>
