<!DOCTYPE html>
<html lang="en">
<head>
      @include('partials.head1')
        <link rel="stylesheet" href="{{ asset('css/barcode.css') }}">
</head>
<body>
    @include('partials.header')

   <!-- Hero Section -->
        <div class="hero-section-pd">
            <div class="container">
                <h1>🏷️ Barcode Label Configurator</h1>
                <p>Design and customize your perfect barcode labels with real-time preview</p>
            </div>
        </div>
    <div class="container-br">
        <div class="config-section">
            
        <div class="form-grid">
                        <div class="form-group">
                           <div class="form-group">
                            <label class="required">Unit System</label>
                            <select id="unitSystem">
                                <option value="mm">Millimeters (mm)</option>
                                <option value="cm">Centimeters (cm)</option>
                                <option value="inch">Inches (in)</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="required">Barcode Width</label>
                            <div class="input-container">
                                <input type="number" id="barcodeWidth" placeholder="Enter width" step="0.1" value="50">
                                <span class="unit" id="widthUnit">mm</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="required">Barcode Length</label>
                            <div class="input-container">
                                <input type="number" id="barcodeLength" placeholder="Enter length" step="0.1" value="30">
                                <span class="unit" id="lengthUnit">mm</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="required">Quantity</label>
                            <div class="input-container">
                                <input type="number" id="quantity" placeholder="Enter quantity (e.g., 1000)" min="100" max="10000" value="1000">
                                <span class="unit">#</span>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-group">
                        <div class="dropdown-item-br">
                            <label>Label Material</label>
                            <select id="labelMaterial">
                                <option value="paper">📄 Paper (Standard)</option>
                                <option value="vinyl">🔧 Vinyl (Durable)</option>
                                <option value="polyester">💎 Polyester (Premium)</option>
                                <option value="polypropylene">🛡️ Polypropylene (Weather-resistant)</option>
                            </select>
                        </div>

                        <div class="dropdown-item-br">
                            <label>Barcode Type</label>
                            <select id="barcodeType">
                                <option value="CODE128">Code 128 (Versatile)</option>
                                <option value="CODE39">Code 39 (Industry Standard)</option>
                                <option value="EAN13">EAN-13 (Retail)</option>
                                <option value="UPC">UPC-A (North America)</option>
                                <option value="ITF14">ITF-14 (Shipping)</option>
                            </select>
                        </div>

                        <div class="dropdown-item-br">
                            <label>Adhesive Type</label>
                            <select id="adhesiveType">
                                <option value="permanent">🔒 Permanent (Strong bond)</option>
                                <option value="removable">🔄 Removable (Clean removal)</option>
                                <option value="repositionable">📍 Repositionable (Multiple uses)</option>
                                <option value="freezer">❄️ Freezer Grade (Cold resistant)</option>
                            </select>
                        </div>
                    </div>

                    <div class="options-section">
                        <div class="options-title">Additional Options</div>
                        <div class="options-grid">
                            <div class="checkbox-item" data-option="sequential">
                                <input type="checkbox" id="sequential">
                                <label for="sequential">Sequential Numbering</label>
                            </div>
                            <div class="checkbox-item" data-option="logo">
                                <input type="checkbox" id="logo">
                                <label for="logo">Add Company Logo</label>
                            </div>
                            <div class="checkbox-item" data-option="color">
                                <input type="checkbox" id="color">
                                <label for="color">Color Printing</label>
                            </div>
                            <div class="checkbox-item" data-option="uv">
                                <input type="checkbox" id="uv">
                                <label for="uv">UV Lamination</label>
                            </div>
                            <div class="checkbox-item" data-option="perforation">
                                <input type="checkbox" id="perforation">
                                <label for="perforation">Perforation Lines</label>
                            </div>
                            <div class="checkbox-item" data-option="express">
                                <input type="checkbox" id="express">
                                <label for="express">Express Delivery</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="preview-section">
                    <h3 style="text-align: center; color: #333; margin-bottom: 20px;">Label Size Preview</h3>
                    
                    <div class="size-presets">
                        <h4>Quick Size Selection</h4>
                        <div class="preset-buttons">
                            <button class="preset-btn" onclick="selectPresetSize(38, 38)">38×38mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(38, 25)">38×25mm</button>
                            <button class="preset-btn active" onclick="selectPresetSize(50, 25)">50×25mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(50, 38)">50×38mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(75, 50)">75×50mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(75, 25)">75×25mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(100, 100)">100×100mm</button>
                            <button class="preset-btn" onclick="selectPresetSize(100, 150)">100×150mm</button>

                        </div>
                    </div>

                    <div class="preview-container">
                        <div class="label-preview-wrapper">
                            <div class="label-actual-size" id="labelActualSize">
                                <div class="size-indicators">
                                    <div class="width-indicator">
                                        <div class="size-label width-label" id="widthLabel">50mm</div>
                                    </div>
                                    <div class="height-indicator">
                                        <div class="size-label height-label" id="heightLabel">30mm</div>
                                    </div>
                                </div>
                                
                                <div class="barcode-preview">
                                    <svg id="barcode"></svg>
                                </div>
                                <div class="barcode-text" id="barcodeText">123456789012</div>
                            </div>
                        </div>
                        
                        <div class="scale-info" id="scaleInfo">
                            Actual size preview (1:1 scale on most screens)
                        </div>
                        <p class="preview-text">Preview updates based on your specifications</p>
                    </div>
                </div>

                <div class="pricing-section">
                    <div class="pricing-grid">
                        <div class="price-breakdown">
                            <div class="price-row">
                                <span>Base Price (<span id="priceQuantity">1000</span> labels)</span>
                                <span id="basePrice">₹2,499</span>
                            </div>
                            <div class="price-row">
                                <span>Additional Options</span>
                                <span id="additionalPrice">₹500</span>
                            </div>
                            <div class="price-row">
                                <span>GST (18%)</span>
                                <span id="gstPrice">₹540</span>
                            </div>
                        </div>
                        <div class="total-price">
                            <div>Total Estimated Price</div>
                            <div id="totalPrice">₹3,539</div>
                        </div>
                    </div>

                    <div class="action-buttons">
                        <button class="btn-br btn-secondary" onclick="saveConfiguration()">Save Configuration</button>
                        <button class="btn-br btn-primary" onclick="requestQuote()">Request Quote</button>
                    </div>
                </div>
            </div>

   
  <div class="toast" id="toast"></div>

    <script>
        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            initializeForm();
            updatePreview();
            updatePricing();
            generateBarcode();
        });

        function initializeForm() {
            // Add event listeners for all form inputs
            const inputs = ['unitSystem', 'barcodeWidth', 'barcodeLength', 'quantity'];
            inputs.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('change', handleFormChange);
                    element.addEventListener('input', handleFormChange);
                }
            });

            // Add event listeners for checkboxes
            const checkboxes = document.querySelectorAll('.checkbox-item input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const item = this.closest('.checkbox-item');
                    if (this.checked) {
                        item.classList.add('checked');
                    } else {
                        item.classList.remove('checked');
                    }
                    updatePricing();
                });
            });

            // Add click handlers for checkbox items
            const checkboxItems = document.querySelectorAll('.checkbox-item');
            checkboxItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (e.target.type !== 'checkbox') {
                        const checkbox = this.querySelector('input[type="checkbox"]');
                        checkbox.checked = !checkbox.checked;
                        checkbox.dispatchEvent(new Event('change'));
                    }
                });
            });

            // Add event listeners for dropdowns
            const dropdowns = ['labelMaterial', 'barcodeType', 'adhesiveType'];
            dropdowns.forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.addEventListener('change', function() {
                        updatePricing();
                        generateBarcode();
                    });
                }
            });
        }

        function handleFormChange() {
            updatePreview();
            updatePricing();
            generateBarcode();
            updateUnits();
        }

        function updateUnits() {
            const unitSystem = document.getElementById('unitSystem').value;
            document.getElementById('widthUnit').textContent = unitSystem;
            document.getElementById('lengthUnit').textContent = unitSystem;
        }

        function selectPresetSize(width, length) {
            document.getElementById('barcodeWidth').value = width;
            document.getElementById('barcodeLength').value = length;
            
            // Update active preset button
            document.querySelectorAll('.preset-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            handleFormChange();
        }

        function updatePreview() {
            const width = parseFloat(document.getElementById('barcodeWidth').value) || 50;
            const length = parseFloat(document.getElementById('barcodeLength').value) || 30;
            const unit = document.getElementById('unitSystem').value;
            
            // Convert to pixels (assuming 96 DPI)
            let widthPx, lengthPx;
            switch(unit) {
                case 'mm':
                    widthPx = width * 3.78; // mm to px
                    lengthPx = length * 3.78;
                    break;
                case 'cm':
                    widthPx = width * 37.8; // cm to px
                    lengthPx = length * 37.8;
                    break;
                case 'inch':
                    widthPx = width * 96; // inch to px
                    lengthPx = length * 96;
                    break;
                default:
                    widthPx = width * 3.78;
                    lengthPx = length * 3.78;
            }
            
            const labelElement = document.getElementById('labelActualSize');
            labelElement.style.width = widthPx + 'px';
            labelElement.style.height = lengthPx + 'px';
            
            // Update size labels
            document.getElementById('widthLabel').textContent = width + unit;
            document.getElementById('heightLabel').textContent = length + unit;
        }

        function generateBarcode() {
            const barcodeType = document.getElementById('barcodeType').value;
            const svg = document.getElementById('barcode');
            
            // Clear previous barcode
            svg.innerHTML = '';
            
            try {
                let barcodeValue = "123456789012";
                let options = {
                    format: barcodeType,
                    width: 2,
                    height: 60,
                    displayValue: false,
                    margin: 5,
                    background: "transparent"
                };
                
                // Adjust barcode value based on type
                switch(barcodeType) {
                    case 'EAN13':
                        barcodeValue = "1234567890128";
                        break;
                    case 'UPC':
                        barcodeValue = "123456789012";
                        break;
                    case 'CODE39':
                        barcodeValue = "FTPL123";
                        break;
                    case 'ITF14':
                        barcodeValue = "12345678901231";
                        break;
                    default:
                        barcodeValue = "FTPL123";
                }
                
                JsBarcode(svg, barcodeValue, options);
                document.getElementById('barcodeText').textContent = barcodeValue;
            } catch (error) {
                console.warn('Barcode generation failed:', error);
                svg.innerHTML = '<rect width="100" height="60" fill="#f0f0f0" stroke="#ccc"/><text x="50" y="35" text-anchor="middle" font-family="Arial" font-size="10" fill="#666">Barcode</text>';
            }
        }

        function updatePricing() {
            const quantity = parseInt(document.getElementById('quantity').value) || 1000;
            
            // Base pricing tiers
            let basePrice;
            if (quantity <= 500) {
                basePrice = 3000;
            } else if (quantity <= 1000) {
                basePrice = 2500;
            } else if (quantity <= 2000) {
                basePrice = 4500;
            } else if (quantity <= 5000) {
                basePrice = 9000;
            } else {
                basePrice = 15000;
            }
            
            // Calculate additional options cost
            let additionalCost = 0;
            const checkedOptions = document.querySelectorAll('.checkbox-item input:checked');
            
            checkedOptions.forEach(option => {
                switch(option.id) {
                    case 'sequential':
                        additionalCost += 300;
                        break;
                    case 'logo':
                        additionalCost += 500;
                        break;
                    case 'color':
                        additionalCost += 800;
                        break;
                    case 'uv':
                        additionalCost += 400;
                        break;
                    case 'perforation':
                        additionalCost += 200;
                        break;
                    case 'express':
                        additionalCost += 600;
                        break;
                }
            });
            
            // Material cost adjustment
            const material = document.getElementById('labelMaterial').value;
            let materialMultiplier = 1;
            switch(material) {
                case 'vinyl':
                    materialMultiplier = 1.3;
                    break;
                case 'polyester':
                    materialMultiplier = 1.5;
                    break;
                case 'polypropylene':
                    materialMultiplier = 1.4;
                    break;
            }
            
            basePrice *= materialMultiplier;
            
            const subtotal = basePrice + additionalCost;
            const gst = subtotal * 0.18;
            const total = subtotal + gst;
            
            // Update display
            document.getElementById('priceQuantity').textContent = quantity.toLocaleString();
            document.getElementById('basePrice').textContent = '₹' + Math.round(basePrice).toLocaleString();
            document.getElementById('additionalPrice').textContent = '₹' + additionalCost.toLocaleString();
            document.getElementById('gstPrice').textContent = '₹' + Math.round(gst).toLocaleString();
            document.getElementById('totalPrice').textContent = '₹' + Math.round(total).toLocaleString();
        }

        function saveConfiguration() {
            const config = {
                unitSystem: document.getElementById('unitSystem').value,
                width: document.getElementById('barcodeWidth').value,
                length: document.getElementById('barcodeLength').value,
                quantity: document.getElementById('quantity').value,
                material: document.getElementById('labelMaterial').value,
                barcodeType: document.getElementById('barcodeType').value,
                adhesive: document.getElementById('adhesiveType').value,
                options: Array.from(document.querySelectorAll('.checkbox-item input:checked')).map(cb => cb.id),
                timestamp: new Date().toISOString()
            };
            
            // In a real application, this would save to a database
            console.log('Configuration saved:', config);
            showToast('Configuration saved successfully! 💾');
        }

        function requestQuote() {
            const formData = {
                unitSystem: document.getElementById('unitSystem').value,
                width: document.getElementById('barcodeWidth').value,
                length: document.getElementById('barcodeLength').value,
                quantity: document.getElementById('quantity').value,
                material: document.getElementById('labelMaterial').value,
                barcodeType: document.getElementById('barcodeType').value,
                adhesive: document.getElementById('adhesiveType').value,
                options: Array.from(document.querySelectorAll('.checkbox-item input:checked')).map(cb => cb.id),
                totalPrice: document.getElementById('totalPrice').textContent
            };
            
            // In a real application, this would submit to a server
            console.log('Quote requested:', formData);
            showToast('Quote request submitted successfully! 🚀 We\'ll contact you within 24 hours.');
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 4000);
        }

        // Add some interactive enhancements
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for any internal links
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
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

            // Add loading animation for buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!this.classList.contains('loading')) {
                        this.classList.add('loading');
                        setTimeout(() => {
                            this.classList.remove('loading');
                        }, 2000);
                    }
                });
            });

            // Add ripple effect to buttons
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .btn {
                position: relative;
                overflow: hidden;
            }
            
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
            
            .btn.loading {
                pointer-events: none;
                opacity: 0.8;
            }
            
            .btn.loading::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 20px;
                height: 20px;
                margin: -10px 0 0 -10px;
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-top: 2px solid rgba(255, 255, 255, 0.8);
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
 @include('partials.experience')
</body>
    <!-- Footer -->
  @include('partials.footer')
</html>