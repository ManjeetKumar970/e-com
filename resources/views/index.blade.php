<!DOCTYPE html>
<html lang="en">
    
@include('partials.head1')
<body>
   @include('partials.header')

   @include('partials.slider')
    <!-- Hero Section -->
   
    <!-- Browse by Category -->
   <section class="py-5" id="categories">
    <div class="container">
        <div class="text-center ">
         <h5>Our Products</h5>
    </div>
        <div class="text-center mb-5">
            <h2 class="section-title">Browse by Category</h2>
            <p class="text-muted">Explore our comprehensive range of business solutions</p>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Item 1 -->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">Thermal Printers</h6>
                    <small class="text-muted">45+ Models</small>
                </div>
            </div>

            <!-- Item 2 (duplicate removed for unique entry) -->
            
            <!-- Item 3 -->
            <div class="col-lg-2 col-md-4 col-sm-6 " >
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">Barcode Labels</h6>
                    <small class="text-muted">100+ Types</small>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">POS Systems</h6>
                    <small class="text-muted">25+ Solutions</small>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">Scanners</h6>
                    <small class="text-muted">30+ Models</small>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">Cash Drawers</h6>
                    <small class="text-muted">15+ Options</small>
                </div>
            </div>

            <!-- Item 7 -->
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="category-card text-center p-3 rounded shadow-sm h-100">
                    <img src="{{ asset('images/logos/icons/barcode.svg') }}" alt="Thermal Printers" class="icons">
                    <h6 class="fw-bold">Software</h6>
                    <small class="text-muted">10+ Solutions</small>
                </div>
            </div>
        </div>
    </div>
</section>


  @include('partials.bestseller')

    <!-- Hot Deals -->

    @include('partials.hotdeals')
   
    <!-- Restaurant Solutions -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Restaurant Solutions</h2>
                <p class="text-muted">Specialized technology for food service businesses</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-utensils" style="font-size: 60px; color: var(--primary-color);"></i>
                        </div>
                        <div class="p-4">
                            <h6 class="fw-bold">TEC Alpha-4 Restaurant POS</h6>
                            <div class="price-tag">₹22,999</div>
                            <button class="btn btn-primary-custom btn-sm mt-2">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-receipt" style="font-size: 60px; color: var(--primary-color);"></i>
                        </div>
                        <div class="p-4">
                            <h6 class="fw-bold">TEC Alpha-4 Kitchen Printer</h6>
                            <div class="price-tag">₹12,999</div>
                            <button class="btn btn-primary-custom btn-sm mt-2">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-clipboard-list" style="font-size: 60px; color: var(--primary-color);"></i>
                        </div>
                        <div class="p-4">
                            <h6 class="fw-bold">TEC Alpha-4 Order Management</h6>
                            <div class="price-tag">₹15,999</div>
                            <button class="btn btn-primary-custom btn-sm mt-2">Order Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-chart-pie" style="font-size: 60px; color: var(--primary-color);"></i>
                        </div>
                        <div class="p-4">
                            <h6 class="fw-bold">TEC Alpha-4 Restaurant Analytics</h6>
                            <div class="price-tag">₹18,999</div>
                            <button class="btn btn-primary-custom btn-sm mt-2">Order Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience the Difference -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--secondary-color), var(--dark-blue));">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="text-white fw-bold">Experience the Difference</h2>
                <p class="text-white-50">Why thousands of businesses choose our solutions</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="experience-card">
                        <div class="category-icon mb-3" style="background: var(--primary-color);">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5 class="text-white fw-bold">Express Delivery</h5>
                        <p class="text-white-50">Fast and reliable delivery to your doorstep with real-time tracking</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="experience-card">
                        <div class="category-icon mb-3" style="background: var(--primary-color);">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <h5 class="text-white fw-bold">Warranty Protection</h5>
                        <p class="text-white-50">Comprehensive warranty coverage and dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="experience-card">
                        <div class="category-icon mb-3" style="background: var(--primary-color);">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5 class="text-white fw-bold">Expert Guidance</h5>
                        <p class="text-white-50">24/7 customer support and technical assistance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="container">
        <div class="cta-section text-center">
            <h2 class="fw-bold mb-4">Need Custom Solutions for Your Business?</h2>
            <p class="mb-4">Get personalized recommendations and pricing for your specific needs</p>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-light btn-lg">Contact Sales</button>
                <button class="btn btn-outline-light btn-lg">Request Demo</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-3"><i class="fas fa-cube me-2"></i>Formatter Tech</h5>
                    <p class="text-white-50">Transforming businesses with smart technology solutions since 2015.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white-50"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white-50"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Products</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Solutions</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Support</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Product Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50 text-decoration-none">POS Systems</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Billing Software</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Restaurant Solutions</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Analytics Tools</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="fw-bold mb-3">Contact Info</h6>
                    <ul class="list-unstyled">
                        <li class="text-white-50"><i class="fas fa-phone me-2"></i>+91 98765 43210</li>
                        <li class="text-white-50"><i class="fas fa-envelope me-2"></i>info@formattertech.com</li>
                        <li class="text-white-50"><i class="fas fa-map-marker-alt me-2"></i>Bengaluru, Karnataka</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 text-white-50">
            <div class="text-center">
                <p class="text-white-50 mb-0">&copy; 2025 Formatter Tech. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add to cart functionality
        let cartCount = 3; // Initial cart count
        
        document.querySelectorAll('.btn-primary-custom').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get product info
                const productCard = this.closest('.product-card');
                const productName = productCard.querySelector('h5, h6').textContent;
                const priceElement = productCard.querySelector('.price-tag');
                const price = priceElement ? priceElement.textContent : 'Price on request';
                
                // Update cart count
                cartCount++;
                const cartBadge = document.querySelector('.badge.bg-danger');
                if (cartBadge) {
                    cartBadge.textContent = cartCount;
                }
                
                // Visual feedback
                this.innerHTML = '<i class="fas fa-check me-1"></i>Added!';
                this.style.background = '#28a745';
                
                // Reset button after 2 seconds
                setTimeout(() => {
                    this.innerHTML = this.textContent.includes('Buy Now') ? 'Buy Now' : 
                                   this.textContent.includes('Order Now') ? 'Order Now' : 'Add to Cart';
                    this.style.background = '';
                }, 2000);
                
                // Show toast notification
                showToast(`${productName} added to cart!`);
            });
        });
        
        // Toast notification function
        function showToast(message) {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle text-success me-2"></i>
                    <span>${message}</span>
                </div>
            `;
            
            // Toast styles
            toast.style.cssText = `
                position: fixed;
                top: 100px;
                right: 20px;
                background: white;
                padding: 15px 20px;
                border-radius: 10px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.2);
                z-index: 9999;
                transform: translateX(400px);
                transition: transform 0.3s ease;
                border-left: 4px solid #28a745;
            `;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                toast.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }
        
        // Search functionality
        document.querySelector('.input-group button').addEventListener('click', function() {
            const searchTerm = document.querySelector('.input-group input').value;
            if (searchTerm.trim()) {
                showToast(`Searching for: ${searchTerm}`);
                // Here you would implement actual search logic
            }
        });
        
        // Enter key for search
        document.querySelector('.input-group input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('.input-group button').click();
            }
        });
        
        // Category hover effects
        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Product card interactions
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.product-image i');
                if (icon) {
                    icon.style.transform = 'scale(1.1) rotate(5deg)';
                    icon.style.transition = 'transform 0.3s ease';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.product-image i');
                if (icon) {
                    icon.style.transform = 'scale(1) rotate(0deg)';
                }
            });
        });