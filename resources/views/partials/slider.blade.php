<!DOCTYPE html>
<html lang="en">
<head>
    <style>
       
            .hero-slidehomer {
                position: relative;
                width: 100%;
                height: 100vh;
                overflow: hidden;
                background: #000;
            }

            .slidehomehome {
                position: absolute;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 1.2s ease-in-out;
            }

            .slidehome.active {
                opacity: 1;
                z-index: 1;
            }

            .slidehome-image {
                position: absolute;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transform: scale(1);
                transition: transform 7s ease-out;
            }

            .slidehome.active .slidehome-image {
                transform: scale(1.08);
            }

            /* Subtle gradient overlay - minimal */
            .slidehome-overlay {
                position: absolute;
                width: 100%;
                height: 100%;
                background: linear-gradient(to bottom, 
                    rgba(0, 0, 0, 0.2) 0%, 
                    rgba(0, 0, 0, 0.1) 50%, 
                    rgba(0, 0, 0, 0.4) 100%);
                z-index: 1;
            }

            .slidehome-content {
                position: absolute;
                bottom: 8rem;
                left: 14rem;
                z-index: 2;
                color: white;
                max-width: 700px;
                transform: translateY(30px);
                opacity: 0;
                transition: all 0.8s ease-out 0.3s;
            }

            .slidehome.active .slidehome-content {
                transform: translateY(0);
                opacity: 1;
            }

            .slidehome-title {
                font-size: 3.5rem;
                font-weight: 800;
                margin-bottom: 1rem;
                line-height: 1.2;
                text-shadow: 2px 4px 20px rgba(0, 0, 0, 0.8);
                animation: fadeInUp 0.8s ease-out 0.5s both;
            }

            .slidehome-subtitle {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                font-weight: 400;
                line-height: 1.6;
                text-shadow: 1px 2px 10px rgba(0, 0, 0, 0.8);
                animation: fadeInUp 0.8s ease-out 0.7s both;
            }

            .slidehome-cta {
                animation: fadeInUp 0.8s ease-out 0.9s both;
            }


            .btn-primary:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 30px rgba(255, 255, 255, 0.5);
            }

            .btn-secondary {
                background: transparent;
                color: white;
                border-color: white;
            }

            .btn-secondary:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-3px);
            }

            /* Navigation Dots */
            .slidehomer-nav {
                position: absolute;
                bottom: 3rem;
                left: 6rem;
                z-index: 10;
                display: flex;
                gap: 1rem;
            }

            .nav-dot {
                width: 14px;
                height: 14px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                cursor: pointer;
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }

            .nav-dot:hover {
                background: rgba(255, 255, 255, 0.7);
                transform: scale(1.2);
            }

            .nav-dot.active {
                background: white;
                width: 50px;
                border-radius: 10px;
            }

            /* Arrow Navigation */
            .slidehomer-arrow {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 10;
                width: 70px;
                height: 70px;
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }

            .slidehomer-arrow:hover {
                background: rgba(255, 255, 255, 0.25);
                transform: translateY(-50%) scale(1.1);
                border-color: rgba(255, 255, 255, 0.6);
            }

            .slidehomer-arrow.prev {
                left: 2rem;
            }

            .slidehomer-arrow.next {
                right: 2rem;
            }

            .slidehomer-arrow svg {
                width: 28px;
                height: 28px;
                fill: white;
            }

            /* slidehome Counter */
            .slidehome-counter {
                position: absolute;
                top: 2rem;
                right: 2rem;
                z-index: 10;
                color: white;
                font-size: 1.2rem;
                font-weight: 600;
                background: rgba(0, 0, 0, 0.3);
                padding: 0.8rem 1.5rem;
                border-radius: 30px;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
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

            /* Thumbnail Navigation (Optional) */
            .thumbnail-nav {
                position: absolute;
                bottom: 3rem;
                right: 4rem;
                z-index: 10;
                display: flex;
                gap: 1rem;
            }

            .thumbnail {
                width: 80px;
                height: 60px;
                border-radius: 8px;
                overflow: hidden;
                cursor: pointer;
                border: 3px solid transparent;
                transition: all 0.3s ease;
                opacity: 0.6;
            }

            .thumbnail:hover {
                opacity: 0.8;
                transform: translateY(-5px);
            }

            .thumbnail.active {
                border-color: white;
                opacity: 1;
            }

            .thumbnail img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* Responsive */
            @media (max-width: 1024px) {
                .thumbnail-nav {
                    display: none;
                }
            }

            @media (max-width: 768px) {
                .slidehome-content {
                    left: 2rem;
                    right: 2rem;
                    bottom: 6rem;
                }

                .slidehome-title {
                    font-size: 2.5rem;
                }

                .slidehome-subtitle {
                    font-size: 1.1rem;
                }

                .btn {
                    padding: 0.8rem 1.8rem;
                    font-size: 1rem;
                }

                .slidehomer-arrow {
                    width: 50px;
                    height: 50px;
                }

                .slidehomer-arrow.prev {
                    left: 1rem;
                }

                .slidehomer-arrow.next {
                    right: 1rem;
                }

                .slidehomer-nav {
                    left: 2rem;
                }

                .slidehome-counter {
                    top: 1rem;
                    right: 1rem;
                    font-size: 1rem;
                    padding: 0.6rem 1.2rem;
                }
            }

            @media (max-width: 480px) {
                .slidehome-title {
                    font-size: 2rem;
                }

                .slidehome-subtitle {
                    font-size: 1rem;
                }

                .btn {
                    display: block;
                    margin: 0.5rem 0;
                }

                .slidehome-content {
                    left: 1.5rem;
                    right: 1.5rem;
                }
            }
    </style>
</head>
<body>
    <div class="hero-slidehomer">
        <!-- slidehome 1 -->
        <div class="slidehome active">
            <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?w=1920&q=80" alt="Business Solutions" class="slidehome-image">
            <div class="slidehome-overlay"></div>
            <div class="slidehome-content">
                <h1 class="slidehome-title">Transform Your Business</h1>
                <p class="slidehome-subtitle">Smart thermal printers and billing solutions for modern enterprises</p>
                <div class="slidehome-cta">
                    <a href="#" class="btn btn-primary">Explore Products</a>
                    <a href="#" class="btn btn-secondary">Get Free Demo</a>
                </div>
            </div>
        </div>

        <!-- slidehome 2 -->
        <div class="slidehome">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920&q=80" alt="Technology" class="slidehome-image">
            <div class="slidehome-overlay"></div>
            <div class="slidehome-content">
                <h1 class="slidehome-title">Cutting-Edge Technology</h1>
                <p class="slidehome-subtitle">High-speed thermal printing solutions that boost productivity</p>
                <div class="slidehome-cta">
                    <a href="#" class="btn btn-primary">View Solutions</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>

        <!-- slidehome 3 -->
        <div class="slidehome">
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1920&q=80" alt="Integration" class="slidehome-image">
            <div class="slidehome-overlay"></div>
            <div class="slidehome-content">
                <h1 class="slidehome-title">Seamless Integration</h1>
                <p class="slidehome-subtitle">Connect your business with cloud-based billing software</p>
                <div class="slidehome-cta">
                    <a href="#" class="btn btn-primary">Start Free Trial</a>
                    <a href="#" class="btn btn-secondary">Contact Sales</a>
                </div>
            </div>
        </div>

        <!-- slidehome 4 -->
        <div class="slidehome">
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=1920&q=80" alt="Support" class="slidehome-image">
            <div class="slidehome-overlay"></div>
            <div class="slidehome-content">
                <h1 class="slidehome-title">24/7 Support</h1>
                <p class="slidehome-subtitle">Expert assistance whenever you need it, wherever you are</p>
                <div class="slidehome-cta">
                    <a href="#" class="btn btn-primary">Get Support</a>
                    <a href="#" class="btn btn-secondary">Call Now</a>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <div class="slidehomer-arrow prev" onclick="changeslidehome(-1)">
            <svg viewBox="0 0 24 24">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            </svg>
        </div>
        <div class="slidehomer-arrow next" onclick="changeslidehome(1)">
            <svg viewBox="0 0 24 24">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            </svg>
        </div>

        <!-- Navigation Dots -->
        <div class="slidehomer-nav">
            <div class="nav-dot active" onclick="goToslidehome(0)"></div>
            <div class="nav-dot" onclick="goToslidehome(1)"></div>
            <div class="nav-dot" onclick="goToslidehome(2)"></div>
            <div class="nav-dot" onclick="goToslidehome(3)"></div>
        </div>

        <!-- slidehome Counter -->
        <div class="slidehome-counter">
            <span id="current-slidehome">1</span> / <span id="total-slidehomes">4</span>
        </div>

        <!-- Thumbnail Navigation -->
        <div class="thumbnail-nav">
            <div class="thumbnail active" onclick="goToslidehome(0)">
                <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?w=200&q=80" alt="slidehome 1">
            </div>
            <div class="thumbnail" onclick="goToslidehome(1)">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=200&q=80" alt="slidehome 2">
            </div>
            <div class="thumbnail" onclick="goToslidehome(2)">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=200&q=80" alt="slidehome 3">
            </div>
            <div class="thumbnail" onclick="goToslidehome(3)">
                <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=200&q=80" alt="slidehome 4">
            </div>
        </div>
    </div>

    <script>
        let currentslidehome = 0;
        const slidehomes = document.querySelectorAll('.slidehome');
        const dots = document.querySelectorAll('.nav-dot');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const currentslidehomeEl = document.getElementById('current-slidehome');
        const autoPlayInterval = 5000;
        let autoPlayTimer;

        function showslidehome(index) {
            slidehomes.forEach(slidehome => slidehome.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            
            currentslidehome = (index + slidehomes.length) % slidehomes.length;
            
            slidehomes[currentslidehome].classList.add('active');
            dots[currentslidehome].classList.add('active');
            thumbnails[currentslidehome].classList.add('active');
            currentslidehomeEl.textContent = currentslidehome + 1;
        }

        function changeslidehome(direction) {
            showslidehome(currentslidehome + direction);
        }

        function goToslidehome(index) {
            showslidehome(index);
        }

        function startAutoPlay() {
            autoPlayTimer = setInterval(() => {
                changeslidehome(1);
            }, autoPlayInterval);
        }

        function stopAutoPlay() {
            clearInterval(autoPlayTimer);
        }

        // Initialize
        startAutoPlay();

        // Pause on hover
        document.querySelector('.hero-slidehomer').addEventListener('mouseenter', stopAutoPlay);
        document.querySelector('.hero-slidehomer').addEventListener('mouseleave', startAutoPlay);

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') changeslidehome(-1);
            if (e.key === 'ArrowRight') changeslidehome(1);
        });

        // Touch swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        document.querySelector('.hero-slidehomer').addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.querySelector('.hero-slidehomer').addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) changeslidehome(1);
            if (touchEndX - touchStartX > 50) changeslidehome(-1);
        });
    </script>
</body>
</html>