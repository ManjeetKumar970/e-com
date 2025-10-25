<style>
    .sidebar-pd {
        background: white;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        max-width: 350px;
    }

    .filter-section {
        margin-bottom: 28px;
        padding-bottom: 24px;
        border-bottom: 1px solid #e9ecef;
    }

    .filter-section:last-of-type {
        border-bottom: none;
    }

    .filter-section h5 {
        font-size: 16px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .filter-section h5 i {
        font-size: 12px;
        color: #718096;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .filter-section h5 i:hover {
        color: #4a5568;
    }

    /* Bootstrap form-check override for better alignment */
    .form-check {
        padding-left: 0;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-check-input-pd {
        width: 18px;
        height: 18px;
        margin: 0;
        cursor: pointer;
        border: 2px solid #cbd5e0;
        border-radius: 4px;
        flex-shrink: 0;
    }

    .form-check-input-pd:checked {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    .form-check-input-pd:focus {
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        border-color: #ff6b6b;
    }

    .form-check-label {
        color: #4a5568;
        font-size: 14px;
        cursor: pointer;
        margin: 0;
        user-select: none;
    }

    .count-badge {
        color: #a0aec0;
        font-size: 13px;
        margin-left: auto;
        flex-shrink: 0;
    }

    .price-range-inputs {
        display: flex;
        gap: 12px;
    }

    .price-input {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .price-input:focus {
        border-color: #ff6b6b;
        box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.1);
        outline: none;
    }

    .apply-filters-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #ff6b6b, #ee5a52);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .apply-filters-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }

    .apply-filters-btn:active {
        transform: translateY(0);
    }
</style>
<div class="container">
    <div class="sidebar-pd">
        <!-- Categories -->
        <div class="filter-section">
            <h5>Categories <i class="fas fa-minus"></i></h5>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="thermal-printers">
                <label class="form-check-label flex-grow-1" for="thermal-printers">Thermal Printers</label>
                <span class="count-badge">(45)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="barcode-labels">
                <label class="form-check-label flex-grow-1" for="barcode-labels">Barcode Labels</label>
                <span class="count-badge">(130)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="billing-rolls">
                <label class="form-check-label flex-grow-1" for="billing-rolls">Billing Rolls</label>
                <span class="count-badge">(89)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="pos-systems">
                <label class="form-check-label flex-grow-1" for="pos-systems">POS Systems</label>
                <span class="count-badge">(25)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="barcode-scanners">
                <label class="form-check-label flex-grow-1" for="barcode-scanners">Barcode Scanners</label>
                <span class="count-badge">(38)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="cash-drawers">
                <label class="form-check-label flex-grow-1" for="cash-drawers">Cash Drawers</label>
                <span class="count-badge">(15)</span>
            </div>
        </div>

        <!-- Brands -->
        <div class="filter-section">
            <h5>Brands <i class="fas fa-minus"></i></h5>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="tsc">
                <label class="form-check-label flex-grow-1" for="tsc">TSC</label>
                <span class="count-badge">(42)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="zebra">
                <label class="form-check-label flex-grow-1" for="zebra">Zebra</label>
                <span class="count-badge">(35)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="epson">
                <label class="form-check-label flex-grow-1" for="epson">Epson</label>
                <span class="count-badge">(62)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="honeywell">
                <label class="form-check-label flex-grow-1" for="honeywell">Honeywell</label>
                <span class="count-badge">(28)</span>
            </div>
        </div>

        <!-- Price Range -->
        <div class="filter-section">
            <h5>Price Range <i class="fas fa-minus"></i></h5>
            <div class="price-range-inputs">
                <input type="number" class="form-control price-input" placeholder="Min ₹">
                <input type="number" class="form-control price-input" placeholder="Max ₹">
            </div>
        </div>

        <!-- Features -->
        <div class="filter-section">
            <h5>Features <i class="fas fa-minus"></i></h5>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="wireless">
                <label class="form-check-label flex-grow-1" for="wireless">Wireless</label>
                <span class="count-badge">(65)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="usb-connected">
                <label class="form-check-label flex-grow-1" for="usb-connected">USB Connected</label>
                <span class="count-badge">(89)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="cloud-enabled">
                <label class="form-check-label flex-grow-1" for="cloud-enabled">Cloud Enabled</label>
                <span class="count-badge">(34)</span>
            </div>
            <div class="form-check">
                <input class="form-check-input-pd" type="checkbox" id="gst-ready">
                <label class="form-check-label flex-grow-1" for="gst-ready">GST Ready</label>
                <span class="count-badge">(112)</span>
            </div>
        </div>

        <button class="apply-filters-btn">Apply Filters</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle filter checkboxes
        const filterCheckboxes = document.querySelectorAll('.form-check-input-pd');
        filterCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
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

        // Handle collapsible sections
        const sectionHeaders = document.querySelectorAll('.filter-section h5 i');
        sectionHeaders.forEach(icon => {
            icon.addEventListener('click', function() {
                const section = this.closest('.filter-section');
                const content = Array.from(section.children).filter(el => el.tagName !== 'H5');

                content.forEach(el => {
                    if (el.style.display === 'none') {
                        el.style.display = '';
                        this.classList.remove('fa-plus');
                        this.classList.add('fa-minus');
                    } else {
                        el.style.display = 'none';
                        this.classList.remove('fa-minus');
                        this.classList.add('fa-plus');
                    }
                });
            });
        });
    });
</script>
