<div class="sidebar-pd">
                    <!-- Categories -->
                    <div class="filter-section">
                        <h5>Categories <i class="fas fa-minus float-end"></i></h5>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="thermal-printers">
                            <label class="form-check-label flex-grow-1" for="thermal-printers">Thermal Printers</label>
                            <span class="count-badge">(45)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="barcode-labels">
                            <label class="form-check-label flex-grow-1" for="barcode-labels">Barcode Labels</label>
                            <span class="count-badge">(130)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="billing-rolls">
                            <label class="form-check-label flex-grow-1" for="billing-rolls">Billing Rolls</label>
                            <span class="count-badge">(89)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="pos-systems">
                            <label class="form-check-label flex-grow-1" for="pos-systems">POS Systems</label>
                            <span class="count-badge">(25)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="barcode-scanners">
                            <label class="form-check-label flex-grow-1" for="barcode-scanners">Barcode Scanners</label>
                            <span class="count-badge">(38)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="cash-drawers">
                            <label class="form-check-label flex-grow-1" for="cash-drawers">Cash Drawers</label>
                            <span class="count-badge">(15)</span>
                        </div>
                    </div>

                    <!-- Brands -->
                    <div class="filter-section">
                        <h5>Brands <i class="fas fa-minus float-end"></i></h5>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="tsc">
                            <label class="form-check-label flex-grow-1" for="tsc">TSC</label>
                            <span class="count-badge">(42)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="zebra">
                            <label class="form-check-label flex-grow-1" for="zebra">Zebra</label>
                            <span class="count-badge">(35)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="epson">
                            <label class="form-check-label flex-grow-1" for="epson">Epson</label>
                            <span class="count-badge">(62)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="honeywell">
                            <label class="form-check-label flex-grow-1" for="honeywell">Honeywell</label>
                            <span class="count-badge">(28)</span>
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-section">
                        <h5>Price Range <i class="fas fa-minus float-end"></i></h5>
                        <div class="price-range-inputs">
                            <input type="number" class="form-control price-input" placeholder="Min ₹">
                            <input type="number" class="form-control price-input" placeholder="Max ₹">
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="filter-section">
                        <h5>Features <i class="fas fa-minus float-end"></i></h5>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="wireless">
                            <label class="form-check-label flex-grow-1" for="wireless">Wireless</label>
                            <span class="count-badge">(65)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="usb-connected">
                            <label class="form-check-label flex-grow-1" for="usb-connected">USB Connected</label>
                            <span class="count-badge">(89)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="cloud-enabled">
                            <label class="form-check-label flex-grow-1" for="cloud-enabled">Cloud Enabled</label>
                            <span class="count-badge">(34)</span>
                        </div>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" id="gst-ready">
                            <label class="form-check-label flex-grow-1" for="gst-ready">GST Ready</label>
                            <span class="count-badge">(112)</span>
                        </div>
                    </div>

                    <button class="apply-filters-btn">Apply Filters</button>
                </div>




    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Handle wishlist buttons
            const wishlistBtns = document.querySelectorAll('.btn-wishlist');
            wishlistBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.style.color = '#e53e3e';
                        this.style.borderColor = '#e53e3e';
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.style.color = '#a0aec0';
                        this.style.borderColor = '#e2e8f0';
                    }
                });
            });

            // Handle add to cart buttons
            const cartBtns = document.querySelectorAll('.btn-add-cart');
            cartBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const originalText = this.textContent;
                    this.textContent = 'Added!';
                    this.style.background = 'linear-gradient(135deg, #48bb78, #38a169)';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = 'linear-gradient(135deg, #ff6b6b, #ee5a52)';
                    }, 2000);
                });
            });

            // Handle filter checkboxes
            const filterCheckboxes = document.querySelectorAll('.form-check-input');
            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // You can add filtering logic here
                    console.log(`Filter ${this.id} ${this.checked ? 'enabled' : 'disabled'}`);
                });
            });

            // Handle apply filters button
            const applyFiltersBtn = document.querySelector('.apply-filters-btn');
            applyFiltersBtn.addEventListener('click', function() {
                const originalText = this.textContent;
                this.textContent = 'Filters Applied!';
                
                setTimeout(() => {
                    this.textContent = originalText;
                }, 2000);
            });

            // Handle sort dropdown
            const sortSelect = document.querySelector('.sort-dropdown');
            sortSelect.addEventListener('change', function() {
                console.log(`Sorting by: ${this.value}`);
                // Add sorting logic here
            });
        });
    </script>

                   