<style>
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 2rem;
}

.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: auto;
}

.floating-element {
    position: absolute;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    z-index: 1;
}

.floating-element:hover {
    z-index: 100 !important;
    animation-play-state: paused;
}

/* Positioning for 12 images */
.floating-element:nth-child(1) {
    top: 5%;
    left: 3%;
    animation: float1 8s infinite;
}

.floating-element:nth-child(2) {
    top: 12%;
    right: 5%;
    animation: float2 10s infinite;
}

.floating-element:nth-child(3) {
    bottom: 8%;
    left: 4%;
    animation: float3 12s infinite;
}

.floating-element:nth-child(4) {
    top: 40%;
    left: 8%;
    animation: float4 9s infinite;
}

.floating-element:nth-child(5) {
    bottom: 12%;
    right: 8%;
    animation: float5 11s infinite;
}

.floating-element:nth-child(6) {
    top: 55%;
    right: 12%;
    animation: float6 13s infinite;
}

.floating-element:nth-child(7) {
    top: 25%;
    left: 15%;
    animation: float1 14s infinite;
}

.floating-element:nth-child(8) {
    bottom: 35%;
    right: 18%;
    animation: float2 11s infinite;
}

.floating-element:nth-child(9) {
    top: 70%;
    left: 25%;
    animation: float3 10s infinite;
}

.floating-element:nth-child(10) {
    top: 15%;
    left: 50%;
    animation: float4 13s infinite;
}

.floating-element:nth-child(11) {
    bottom: 25%;
    left: 35%;
    animation: float5 9s infinite;
}

.floating-element:nth-child(12) {
    top: 45%;
    right: 25%;
    animation: float6 12s infinite;
}

.floating-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid rgba(255, 255, 255, 0.3);
    transform-style: preserve-3d;
}

.floating-element:hover .floating-card {
    transform: scale(1.3) translateZ(50px) rotateY(5deg);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
    border: 3px solid #667eea;
}

.card-image {
    width: 100%;
    height: 180px;
    overflow: hidden;
    position: relative;
}

.card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.3));
    opacity: 0;
    transition: opacity 0.4s ease;
}

.floating-element:hover .card-image::after {
    opacity: 1;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.floating-element:hover .card-image img {
    transform: scale(1.2) rotate(2deg);
}

.card-content {
    padding: 15px;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 1));
    position: relative;
    overflow: hidden;
}

.card-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, transparent, #667eea, transparent);
    transition: left 0.5s ease;
}

.floating-element:hover .card-content::before {
    left: 100%;
}

.card-title {
    font-size: 1rem;
    font-weight: 700;
    color: #667eea;
    margin: 0;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}

.floating-element:hover .card-title {
    color: #764ba2;
    transform: translateY(-2px);
    letter-spacing: 1px;
}

/* Pulsing glow effect on hover */
@keyframes pulse-glow {
    0%, 100% {
        box-shadow: 0 30px 80px rgba(102, 126, 234, 0.6);
    }
    50% {
        box-shadow: 0 30px 80px rgba(118, 75, 162, 0.8);
    }
}

.floating-element:hover .floating-card {
    animation: pulse-glow 2s infinite;
}

/* Variable sizes */
.floating-element:nth-child(1) .floating-card { width: 200px; }
.floating-element:nth-child(2) .floating-card { width: 180px; }
.floating-element:nth-child(3) .floating-card { width: 220px; }
.floating-element:nth-child(4) .floating-card { width: 190px; }
.floating-element:nth-child(5) .floating-card { width: 210px; }
.floating-element:nth-child(6) .floating-card { width: 195px; }
.floating-element:nth-child(7) .floating-card { width: 185px; }
.floating-element:nth-child(8) .floating-card { width: 205px; }
.floating-element:nth-child(9) .floating-card { width: 200px; }
.floating-element:nth-child(10) .floating-card { width: 190px; }
.floating-element:nth-child(11) .floating-card { width: 215px; }
.floating-element:nth-child(12) .floating-card { width: 195px; }

/* Floating animations */
@keyframes float1 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-25px) rotate(2deg); }
    50% { transform: translateY(-15px) rotate(-2deg); }
    75% { transform: translateY(-35px) rotate(1deg); }
}

@keyframes float2 {
    0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
    33% { transform: translateY(-30px) translateX(15px) rotate(-3deg); }
    66% { transform: translateY(-20px) translateX(-15px) rotate(3deg); }
}

@keyframes float3 {
    0%, 100% { transform: translateX(0) rotate(0deg); }
    50% { transform: translateX(25px) rotate(4deg); }
}

@keyframes float4 {
    0%, 100% { transform: translateY(0) scale(1); }
    25% { transform: translateY(-20px) scale(1.05); }
    50% { transform: translateY(-40px) scale(1); }
    75% { transform: translateY(-20px) scale(0.95); }
}

@keyframes float5 {
    0%, 100% { transform: rotate(0deg) translateY(0); }
    33% { transform: rotate(3deg) translateY(-25px); }
    66% { transform: rotate(-3deg) translateY(-15px); }
}

@keyframes float6 {
    0%, 100% { transform: translateX(0) translateY(0); }
    25% { transform: translateX(-20px) translateY(-15px); }
    50% { transform: translateX(-30px) translateY(-25px); }
    75% { transform: translateX(-15px) translateY(-20px); }
}

.content-wrapper {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 800px;
    padding: 3rem 2rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    pointer-events: auto;
}

.main-heading {
    font-size: 3.5rem;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 1.5rem;
    line-height: 1.2;
    text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.3);
}

.subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2.5rem;
    line-height: 1.6;
}



.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(255, 255, 255, 0.4);
}

.btn-secondary {
    background: transparent;
    color: #ffffff;
    border-color: #ffffff;
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 1024px) {
    .floating-element:nth-child(n+9) {
        display: none;
    }
}

@media (max-width: 768px) {
    .main-heading {
        font-size: 2.5rem;
    }
    
    .subtitle {
        font-size: 1.1rem;
    }
    
    .floating-element:nth-child(n+6) {
        display: none;
    }
    
    .floating-card {
        width: 150px !important;
    }
    
    .card-image {
        height: 120px !important;
    }
    
    .card-title {
        font-size: 0.85rem;
    }
    
    .floating-element:hover .floating-card {
        transform: scale(1.2) translateZ(30px);
    }
}

@media (max-width: 480px) {
    .floating-element:nth-child(n+4) {
        display: none;
    }
    
    .floating-card {
        width: 130px !important;
    }
    
    .card-image {
        height: 100px !important;
    }
}
</style>
{{-- style="background-image: url('{{asset('images/slider/homeimg1.jpg')}}');" --}}
<div class="hero-section">
    <div class="floating-elements">
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/billingrolls.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Thermal Printers</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/cash-register-box-poster-3.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Billing Software</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/cash-register-box-poster-3.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">POS Systems</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/scanner.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Barcode Scanners</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/cash-register-box-poster-3.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Cash Drawers</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/printer-barcode-2.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Label Printers</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/logos/icons/receipt-printer-poster-1.png')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Receipt Printers</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/slider/homeimg1.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Mobile POS</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/slider/homeimg1.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Payment Terminals</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/slider/homeimg1.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Inventory Systems</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/slider/homeimg1.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Display Systems</h3>
                </div>
            </div>
        </div>
        
        <div class="floating-element">
            <div class="floating-card">
                <div class="card-image">
                    <img src="{{asset('images/slider/homeimg1.jpg')}}" alt="">
                </div>
                <div class="card-content">
                    <h3 class="card-title">Card Readers</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <h1 class="main-heading">
            Transform Your Business with<br>
            Smart Solutions
        </h1>
        
        <p class="subtitle">
            From thermal printers to billing software - everything your business needs to run efficiently
        </p>

        <div class="cta-buttons">
            <a href="#" class="btn btn-primary">Explore Products</a>
            <a href="#" class="btn btn-secondary">Get Free Demo</a>
        </div>
    </div>
</div>