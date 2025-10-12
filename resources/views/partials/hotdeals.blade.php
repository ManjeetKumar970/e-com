
<div class=" py-5">
             <div class="text-center">
                <h2 class="section-title">Hot Deals</h2>
                <p class="text-muted">Specialized technology for food service businesses</p>
            </div>
    <!-- hot deel 2 -->

     <div class="container-hot-deel py-5">
        <!-- Card 1 -->
@foreach ($products->slice(0, 4) as $product)
            
        <div class="product-card-hot-deel card-1">
            <div class="heart-icon-hot-deel" onclick="toggleHeart(this)"></div>

            <div class="image-section-hot-deel">
                            <a href="{{ route('product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">

                <img src="{{ asset('storage/' .($product->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="" class="product-image-hot-deel">
</a>
            </div>
            
            <div class="info-section-hot-deel">
                 <div class="hot-deal-badge">HOT DEAL</div>
                <div>
                    <h2 class="product-title-hot-deel">{{$product->name}}</h2>
                    <p class="product-category-hot-deel">{{$product->name}}</p>
                </div>
                <div class="pricing-section-hot-deel">
                    <div class="price-container-hot-deel">
                        <div class="current-price-hot-deel">
                            <span class="currency-hot-deel">₹</span>{{$product->sale_price}}
                        </div>
                        <div class="original-price-hot-deel">₹{{$product->regular_price}}</div>
                    </div>
                    <button class="add-button-hot-deel" onclick="addToCart(this)">+</button>
                </div>
            </div>
        </div>
@endforeach
        
</div>


    <script>
        function toggleHeart(element) {
            element.style.background = element.style.background === 'rgb(220, 53, 69)' ? '#ff6b4a' : '#dc3545';
            element.style.transform = 'scale(1.3)';
            setTimeout(() => {
                element.style.transform = 'scale(1)';
            }, 200);
        }

        function addToCart(element) {
            const originalText = element.innerHTML;
            
            element.innerHTML = '✓';
            element.style.background = '#28a745';
            element.style.transform = 'scale(1.2)';
            
            // Add success animation to the card
            const card = element.closest('.product-card');
            card.style.transform = 'translateY(-15px) scale(1.02)';
            card.style.boxShadow = '0 30px 60px rgba(40, 167, 69, 0.2)';
            
            setTimeout(() => {
                element.innerHTML = originalText;
                element.style.background = 'linear-gradient(135deg, #ff6b4a 0%, #ff8a65 100%)';
                element.style.transform = 'scale(1)';
                card.style.transform = '';
                card.style.boxShadow = '';
            }, 1500);
        }

        // Add stagger animation on load
        window.addEventListener('load', () => {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
        
    </script>