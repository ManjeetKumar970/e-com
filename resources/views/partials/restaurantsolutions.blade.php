<style>
    a.product-link {
  z-index: 10;
 
}
    </style>
<section class="py-5 bg-light">
        <div class="container-fluid">
            <div class="text-center mb-5">
                <h2 class="section-title">Restaurant Solutions</h2>
                <p class="text-muted">Specialized technology for food service businesses</p>
            </div>
           
        <div class="products-grid-hot">
            @if(isset($products) && $products->count() > 0)
          @foreach ($products->slice(0, 5) as $product)
            <div class="product-card-hot">
                <div class="product-header-hot">
            <div class="heart-icon-hot-deel" onclick="toggleHeart(this)"></div>
                </div>
                <a href="{{ route('product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">
                <div class="product-image-hot">
                    <div class="product-icon">
                        <img src="{{ asset('storage/' . ($product->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="{{$product->name}}" class="product-image">
                    </div>
                </div>
                </a>
                <h3 class="product-title">{{$product->name}}</h3>
                <p class="product-description">High-speed printing with wireless connectivity and cloud integration.</p>
                <div class="product-footer">
                    <div class="price-section">
                        <div class="current-price">₹{{ $product->sale_price }}</div>
                        <div class="original-price">{{ $product->regular_price }}</div>
                    </div>
                    <button class="add-btn" onclick="addToCart('TSC Alpha-4')">+</button>
                </div>
            </div>
        @endforeach
        @endif
            
        </div>
        </div>
    </section>