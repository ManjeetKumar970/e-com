<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('css/wishlist.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('partials.header')

    <div class="hero-section-pd">
        <div class="hero-background">
            <div class="moving-shape shape-1"></div>
            <div class="moving-shape shape-2"></div>
            <div class="moving-shape shape-3"></div>
            <div class="moving-shape shape-4"></div>
            <div class="moving-shape shape-5"></div>
        </div>
        <div class="container">
            <h1 class="hero-title">💖 My Wishlist</h1>
            <p class="hero-subtitle">Your curated collection of favorite products</p>
        </div>
    </div>

    <div class="container py-5">
        <!-- Wishlist Header -->
        <div class="wishlist-header" id="wishlist-header"
            style="{{ $wishlistItems->isEmpty() ? 'display: none;' : '' }}">
            <div class="wishlist-stats">
                <div class="stat-item">
                    <span class="stat-number" id="total-items">{{ $wishlistItems->count() }}</span>
                    <span class="stat-label">Items</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number"
                        id="total-value">₹{{ number_format($wishlistItems->sum('product.price'), 2) }}</span>
                    <span class="stat-label">Total Value</span>
                </div>
            </div>
            <button class="clear-all-btn" onclick="clearAll()">
                <i class="fas fa-trash-alt"></i> Clear All
            </button>
        </div>

        <!-- Wishlist Grid -->
        <div class="wishlist-grid" id="wishlist-container"
            style="{{ $wishlistItems->isEmpty() ? 'display: none;' : '' }}">
            @foreach ($wishlistItems as $wishlistItem)
                <div class="wishlist-card" data-price="{{ $wishlistItem->product->sale_price }}"
                    data-product-id="{{ $wishlistItem->product->id }}">
                    <div class="card-image-wrapper">
                        <img src="{{ $wishlistItem->product->productImages->first() ? asset('storage/' . $wishlistItem->product->productImages->first()->image_url) : 'https://via.placeholder.com/500' }}"
                            alt="{{ $wishlistItem->product->name }}" class="card-image">

                        @if ($wishlistItem->product->created_at->diffInDays(now()) < 7)
                            <span class="wishlist-badge">New Arrival</span>
                        @elseif($wishlistItem->product->is_bestseller ?? false)
                            <span class="wishlist-badge">Bestseller</span>
                        @elseif(($wishlistItem->product->stock ?? 10) < 5)
                            <span class="wishlist-badge">Limited Stock</span>
                        @else
                            <span class="wishlist-badge">Trending</span>
                        @endif

                        <button class="remove-btn-top" onclick="removeItem(this)" title="Remove from wishlist">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="card-body-ws">
                        <h3 class="card-title-ws">{{ $wishlistItem->product->name }}</h3>
                        <p class="card-description-ws">
                            {{ \Illuminate\Support\Str::limit($wishlistItem->product->short_description ?? ($wishlistItem->product->description ?? 'High-quality product'), 80) }}
                        </p>

                        <div class="price-section-ws">
                            <span
                                class="current-price-ws">₹{{ number_format($wishlistItem->product->sale_price, 2) }}</span>

                            @if (isset($wishlistItem->product->regular_price) &&
                                    $wishlistItem->product->sale_price > $wishlistItem->product->regular_price)
                                <span
                                    class="original-price-ws">₹{{ number_format($wishlistItem->product->sale_price, 2) }}</span>
                                <span class="discount-badge-ws">
                                    {{ round((($wishlistItem->product->sale_price - $wishlistItem->product->regular_price) / $wishlistItem->product->regular_price) * 100) }}%
                                    OFF
                                </span>
                            @else
                                <span
                                    class="original-price-ws">₹{{ number_format($wishlistItem->product->sale_price + 300, 2) }}</span>
                                <span class="discount-badge-ws">20% OFF</span>
                            @endif
                        </div>

                        <div class="card-actions-ws" data-product-id="{{ $wishlistItem->product->id }}">
                            <div class="quantity-control-ws">
                                <button class="qty-btn-ws" onclick="decreaseQty(this)" title="Decrease quantity">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span class="quantity-ws">1</span>
                                <button class="qty-btn-ws" onclick="increaseQty(this)" title="Increase quantity">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <button class="add-to-cart-btn-ws" onclick="addToCart(this)">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        <div class="empty-wishlist" id="empty-state"
            style="{{ $wishlistItems->isEmpty() ? 'display: block;' : 'display: none;' }}">
            <div class="empty-icon">💔</div>
            <h2 class="empty-title">Your Wishlist is Empty</h2>
            <p class="empty-subtitle">Start adding products you love!</p>
            <a href="{{ route('index') }}" class="shop-now-btn">
                <i class="fas fa-shopping-bag"></i> Shop Now
            </a>
        </div>
    </div>

    <div class="notification" id="notification">
        <div class="notification-content">
            <span class="notification-icon">✓</span>
            <span class="notification-text" id="notification-text">Item added to cart!</span>
        </div>
    </div>


    @include('partials.experience')
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function updateStats() {
            const cards = document.querySelectorAll('.wishlist-card');
            const totalItems = cards.length;
            let totalValue = 0;
            cards.forEach(card => {
                const price = parseFloat(card.dataset.price) || 0;
                const qty = parseInt(card.querySelector('.quantity-ws').textContent) || 1;
                totalValue += price * qty;
            });

            document.getElementById('total-items').textContent = totalItems;
            document.getElementById('total-value').textContent = '₹' + totalValue.toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            if (totalItems === 0) {
                document.getElementById('wishlist-container').style.display = 'none';
                document.getElementById('wishlist-header').style.display = 'none';
                document.getElementById('empty-state').style.display = 'block';
            }
        }

        function removeItem(btn) {
            const card = btn.closest('.wishlist-card');
            const productId = card.dataset.productId;

            if (!productId) return alert('Product ID not found');

            card.style.animation = 'cardDisappear 0.4s ease-out forwards';

            fetch('{{ route('wishlist.remove') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        setTimeout(() => {
                            card.remove();
                            updateStats();
                            alert(data.message || 'Item removed from wishlist');
                        }, 400);
                    } else {
                        card.style.animation = '';
                        alert(data.message || 'Failed to remove item');
                    }
                })
                .catch(err => {
                    console.error(err);
                    card.style.animation = '';
                    alert('Failed to remove item. Please try again.');
                });
        }

        function increaseQty(btn) {
            const qtyEl = btn.parentElement.querySelector('.quantity-ws');
            qtyEl.textContent = parseInt(qtyEl.textContent) + 1;
            updateStats();
        }

        function decreaseQty(btn) {
            const qtyEl = btn.parentElement.querySelector('.quantity-ws');
            if (parseInt(qtyEl.textContent) > 1) {
                qtyEl.textContent = parseInt(qtyEl.textContent) - 1;
                updateStats();
            }
        }

        function clearAll() {
            if (!confirm('Are you sure you want to clear your entire wishlist?')) return;

            const cards = document.querySelectorAll('.wishlist-card');

            fetch('{{ route('wishlist.clear') }}', {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        cards.forEach((card, i) => {
                            setTimeout(() => {
                                card.style.animation = 'cardDisappear 0.4s ease-out forwards';
                                setTimeout(() => card.remove(), 400);
                            }, i * 100);
                        });
                        setTimeout(updateStats, cards.length * 100 + 400);
                    } else {
                        alert(data.message || 'Failed to clear wishlist');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Error clearing wishlist');
                });
        }
    </script>
</body>
@include('partials.footer')

</html>
