
<section class="best-selling-products">
        <div class="container-fluid">
            <p class="section-subtitle">FEATURED</p>
            <h2 class="section-title">Best Selling Products</h2>
            <p class="section-desc">Top-rated equipment trusted by thousands of businesses</p>

            <div class="product-grid">
        
                <div class="product-card large">
                    <div class="product-info">
                        <h3>{{ $products->get(0)->name }}
                        <a href="{{ route('product.show', ['slug' => $products->get(0)->slug, 'id' => $products->get(0)->id]) }}" class="explore-btn">Explore Products</a>
                    </div>
                    <img 
                        src="{{ asset('storage/' . ($products->get(0)->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                        alt="{{ $products->get(0)->name }}">
                </div>

               
                <div class="right-grid">
          
                    <div class="product-card-mid beige">
                        <img src="{{ asset('storage/' . ($products->get(1)->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="{{ $products->get(1)->name }}">
                        <div>
                            <h4>{{ $products->get(1)->name }}</h4>
                            <a href="{{ route('product.show', ['slug' => $products->get(1)->slug, 'id' => $products->get(1)->id]) }}" class="explore-btn">Explore Products</a>
                        </div>
                    </div>
                    
                   
                    <div class="product-card small gray" >
                        <img src="{{ asset('storage/' . ($products->get(2)->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="{{ $products->get(2)->name }}" class="image-content">
                        <div>
                            <h4>{{ $products->get(2)->name }}</h4>
                            <a href="{{ route('product.show', ['slug' => $products->get(2)->slug, 'id' => $products->get(2)->id]) }}" class="explore-btn">Explore Products</a>
                        </div>
                    </div>
                    
            
                    <div class="product-card small dark">
                        <img src="{{ asset('storage/' . ($products->get(3)->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="{{ $products->get(3)->name }}">
                        <div>
                            <h4>{{ $products->get(3)->name }}</h4>
                            <a href="{{ route('product.show', ['slug' => $products->get(3)->slug, 'id' => $products->get(3)->id]) }}" class="explore-btn">Explore Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



 <section class="container-fluid" >
 
<div class="main-container">
        <!-- Left Static Section -->
        <div class="static-section">
            <div class="static-content">
                <h1>{{ $products->get(4)->name ??"" }}</h1>
                <p>{{ $products->get(4)->short_description ??"best product" }}</p>
                <a href="{{ route('product.show', ['slug' => $products->get(4)->slug, 'id' => $products->get(4)->id]) }}" class="explore-btn" >Explore Products</a>
            </div>
            <!-- Office workplace illustration -->
            <img src="{{ asset('storage/' . ($products->get(3)->primaryImage->image_url ?? 'images/no-image.png')) }}" alt="{{ $products->get(3)->name }}" class="img-fluid" style="width: 500px;height: 350px;">

        </div>

        <!-- Right Slider Section -->
<div class="slider-section">
    <div class="slider-container">
        <div class="slider-wrapper" id="sliderWrapper">
            @foreach ($products as $index => $product)
            <div class="slide">
                <img 
                    src="{{ asset('storage/' . ($product->primaryImage->image_url ?? 'images/no-image.png')) }}" 
                    alt="{{ $product->name }}"
                    class="img-fluid" style="width: 500px;height: 350px;">
                
                <div class="product-info" style="text-align: center">
                    <h3>{{ $product->name }}</h3>
                    <h4>{{ $product->category->name ?? 'Product' }}</h4>
                    
                    @if($product->regular_price)
                    <div class="price-container">
                        <span class="current-price">₹{{ number_format($product->sale_price, 0) }}</span>
                        @if($product->sale_price && $product->regular_price > $product->sale_price)
                        <span class="old-price">₹{{ number_format($product->regular_price, 0) }}</span>
                        @endif
                    </div>
                    @endif
                    
                    <div class="action-buttons" style="text-align: center">
                  <a href="{{ route('product.show', ['slug' => $product->slug, 'id' => $product->id]) }}" class="explore-btn" >Explore Products</a>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="slider-arrows">
            <button class="arrow" id="prevBtn">‹</button>
            <button class="arrow" id="nextBtn">›</button>
        </div>

        <div class="slider-nav" id="sliderNav">
            @foreach ($products->take(10) as $index => $product)
            <div class="{{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></div>
            @endforeach
        </div>
    </div>
</div>

</div>
    </div>
 </section>

<script>
    // Dynamic slider based on product count
    const totalSlides = {{ $products->take(10)->count() }};
    let currentSlide = 0;
    const sliderWrapper = document.getElementById('sliderWrapper');
    const navDots = document.querySelectorAll('.nav-dot');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    function updateSlider() {
        const translateX = -currentSlide * 100;
        sliderWrapper.style.transform = `translateX(${translateX}%)`;
        
        navDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function goToSlide(slideIndex) {
        currentSlide = slideIndex;
        updateSlider();
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }

    function compareProduct(productId) {
        // Your compare logic here
        console.log('Comparing product:', productId);
        alert('Product added to comparison!');
    }

    // Event listeners
    if (prevBtn && nextBtn) {
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);
    }

    // Auto-slide functionality
    let autoSlideInterval = setInterval(nextSlide, 4000);

    // Pause auto-slide on hover
    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        sliderContainer.addEventListener('mouseleave', () => {
            autoSlideInterval = setInterval(nextSlide, 4000);
        });

        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;

        sliderContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        sliderContainer.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });

        sliderContainer.addEventListener('touchend', () => {
            if (startX - endX > 50) {
                nextSlide();
            } else if (endX - startX > 50) {
                prevSlide();
            }
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
</script>
</body>
</html>


   