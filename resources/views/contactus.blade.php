<!DOCTYPE html>
<html lang="en">
<head>
   @include('partials.head1')
</head>
<body>
    @include('partials.header')
     <!-- Hero Section -->
    <div class="hero-section-pd">
        <div class="container">
            <h1>Get in Touch</h1>
            <p>Find the perfect tools to streamline your operations and boost productivity</p>
        </div>
    </div>
    <div class="container">
        <!-- Contact Cards Section -->
        <div class="contact-section">
            <div class="contact-card">
                <div class="contact-icon phone">📞</div>
                <h3>Call Us</h3>
                <div class="contact-info">+91 919199191</div>
                <div class="contact-details">+91 92929292</div>
                <div class="contact-details">Mon-Sat: 9:00 AM - 7:00 PM</div>
            </div>

            <div class="contact-card">
                <div class="contact-icon email">✉️</div>
                <h3>Email Us</h3>
                <div class="contact-info">info@formattertech.com</div>
                <div class="contact-details">support@formattertech.com</div>
                <div class="contact-details">24/7 Support Available</div>
            </div>

            <div class="contact-card">
                <div class="contact-icon location">📍</div>
                <h3>Visit Us</h3>
                <div class="contact-info">Industrial Area, Phase 2</div>
                <div class="contact-details">Chandigarh 160002</div>
                <div class="contact-details">Mon-Sat: 10:00 AM - 6:00 PM</div>
            </div>

            <div class="contact-card">
                <div class="contact-icon chat">💬</div>
                <h3>Live Chat</h3>
                <div class="contact-info">Instant Support</div>
                <div class="contact-details">Average response: 2 mins</div>
                <a href="#" class="btn btn-primary">Start Chat</a>
            </div>
        </div>

        <!-- Marketplace Section -->
        <div class="marketplace-section">
            <div class="marketplace-header">
                <h2>Find Us On Major Marketplaces</h2>
                <p>Shop with confidence on India's most trusted e-commerce platforms</p>
            </div>

            <div class="marketplace-grid">
                <div class="marketplace-card">
                    <div class="marketplace-logo" style="color: #2563eb; font-size: 32px; font-weight: bold;">Flipkart</div>
                    <h3>Flipkart</h3>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="marketplace-stats">4.8/5 Rating • 10,000+ Orders</div>
                    <div class="marketplace-stats">Flipkart Assured Seller</div>
                    <div class="marketplace-stats">7-Day Replacement Policy</div>
                    <a href="#" class="btn btn-flipkart btn-marketplace">Visit Our Store</a>
                </div>

                <div class="marketplace-card">
                    <div class="marketplace-logo" style="color: #232f3e; font-size: 32px; font-weight: bold;">amazon</div>
                    <h3>Amazon India</h3>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="marketplace-stats">4.7/5 Rating • 15,000+ Reviews</div>
                    <div class="marketplace-stats">Amazon's Choice Products</div>
                    <div class="marketplace-stats">Prime Delivery Available</div>
                    <a href="#" class="btn btn-amazon btn-marketplace">Shop on Amazon</a>
                </div>

                <div class="marketplace-card">
                    <div class="marketplace-logo" style="color: #ff6d2d; font-size: 32px; font-weight: bold;">IndiaMART</div>
                    <h3>IndiaMART</h3>
                    <div class="rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="marketplace-stats">4.9/5 Rating • Verified Supplier</div>
                    <div class="marketplace-stats">GST Registered • TrustSEAL</div>
                    <div class="marketplace-stats">Bulk Orders Welcome</div>
                    <a href="#" class="btn btn-indiamart btn-marketplace">Get Quotes</a>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="contact-form-section">
            <div class="form-card-cu">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and we'll get back to you within 24 hours</p>

                <form>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="firstName">First Name <span class="required">*</span></label>
                            <input type="text" id="firstName" class="form-control" placeholder="Enter your first name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name <span class="required">*</span></label>
                            <input type="text" id="lastName" class="form-control" placeholder="Enter your last name">
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" class="form-control" placeholder="your.email@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-control" placeholder="+91 98765 43210">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" class="form-control" placeholder="Your company name">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject <span class="required">*</span></label>
                        <select id="subject" class="form-control">
                            <option>Select a subject</option>
                            <option>Product Inquiry</option>
                            <option>Technical Support</option>
                            <option>Partnership</option>
                            <option>General Question</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" class="form-control" placeholder="Tell us how we can help you..."></textarea>
                    </div>

                    <div class="checkbox-container">
                        <input type="checkbox" id="newsletter">
                        <label for="newsletter">Subscribe to our newsletter for updates and offers</label>
                    </div>

                    <button type="submit" class="btn-send">Send Message</button>
                </form>
            </div>

            <div class="sidebar-card">
                <div class="business-hours contact-card">
                    <h3>Business Hours</h3>
                    <div class="hours-row">
                        <span>Monday - Friday</span>
                        <span>9:00 AM - 7:00 PM</span>
                    </div>
                    <div class="hours-row">
                        <span>Saturday</span>
                        <span>10:00 AM - 6:00 PM</span>
                    </div>
                    <div class="hours-row">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                    <div class="holiday-notice">
                        🎁 Holiday hours may vary
                    </div>
                </div>

                <div class="support-links contact-card" >
                    <h3>Quick Support Links</h3>
                    <a href="#" class="support-link">📚 Knowledge Base</a>
                    <a href="#" class="support-link">🎫 Submit a Ticket</a>
                    <a href="#" class="support-link">📖 User Manuals</a>
                    <a href="#" class="support-link">⚡ Warranty Claims</a>
                    <a href="#" class="support-link">📦 Track Order</a>
                    <a href="#" class="support-link">🔄 Return Policy</a>
                </div>

                <div class="social-section contact-card">
                    <h3>Connect With Us</h3>
                    <p>Follow us on social media for updates, tips, and exclusive offers</p>
                    <div class="social-links">
                        <a href="#" class="social-link">📘</a>
                        <a href="#" class="social-link">🐦</a>
                        <a href="#" class="social-link">💼</a>
                        <a href="#" class="social-link">✉️</a>
                        <a href="#" class="social-link">▶️</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Find Our Office Section -->
        <div class="office-section">
            <h2 class="section-title">Find Our Office</h2>
            <div class="office-content">
                <div class="map-container">
                    <div class="map-placeholder">
                        <div class="map-marker">📍</div>
                        <div class="map-controls">
                            <button class="map-control zoom-in">+</button>
                            <button class="map-control zoom-out">−</button>
                        </div>
                        <div class="map-overlay">
                            <div class="map-info">
                                <strong>FormatterTech</strong><br>
                                Industrial Area, Phase 2<br>
                                Chandigarh 160002
                            </div>
                        </div>
                    </div>
                </div>
                <div class="directions-card">
                    <h3>How to Reach Us</h3>
                    <div class="direction-item">
                        <div class="direction-icon car">🚗</div>
                        <div class="direction-content">
                            <h4>By Car:</h4>
                            <p>Free parking available at our premises. Located near Industrial Area Phase 2 main entrance.</p>
                        </div>
                    </div>
                    <div class="direction-item">
                        <div class="direction-icon bus">🚌</div>
                        <div class="direction-content">
                            <h4>By Public Transport:</h4>
                            <p>Bus routes 21, 45, and 67 stop at Industrial Area. 5-minute walk from the bus stop.</p>
                        </div>
                    </div>
                    <div class="direction-item">
                        <div class="direction-icon plane">✈️</div>
                        <div class="direction-content">
                            <h4>From Airport:</h4>
                            <p>25 km from Chandigarh International Airport. Approximately 40 minutes by taxi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="faq-grid">
                <div class="faq-card">
                    <h4>What are your delivery timelines?</h4>
                    <p>Standard delivery takes 3-5 business days within city limits. Express delivery available for urgent orders.</p>
                </div>
                <div class="faq-card">
                    <h4>Do you provide installation services?</h4>
                    <p>Yes, we offer professional installation for all POS systems and large equipment. Charges apply based on location.</p>
                </div>
                <div class="faq-card">
                    <h4>What is your return policy?</h4>
                    <p>We accept returns within 7 days of delivery for unopened products. Terms and conditions apply.</p>
                </div>
                <div class="faq-card">
                    <h4>Do you offer bulk discounts?</h4>
                    <p>Yes, special pricing available for orders above ₹50,000. Contact our sales team for custom quotes.</p>
                </div>
                <div class="faq-card">
                    <h4>Are your products GST compliant?</h4>
                    <p>Yes, all our products are GST compliant. We provide proper GST invoices for all purchases.</p>
                </div>
                <div class="faq-card">
                    <h4>Do you offer warranty on products?</h4>
                    <p>Yes, we offer manufacturer warranty on all products ranging from 1-3 years depending on the product category.</p>
                </div>
            </div>
        </div>
    </div>
@include('partials.footer')
 
</body>
</html>