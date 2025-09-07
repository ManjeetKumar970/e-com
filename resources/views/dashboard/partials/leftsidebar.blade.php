<div class="left-side-bar">
    <!-- Brand Logo Section -->
    <div class="brand-logo">
        <a href="{{ route('dashboard.admindashboard') }}">
            <img src="{{asset('images/logos/logo.png')}}" alt="" class="dark-logo"  style="width: 50px;height: 50px;" />
            <img src="{{asset('images/logos/logo.png')}}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>

    <!-- User Profile Section -->
    <div class="user-info-section">
        <div class="user-profile">
            <div class="user-avatar">
                @if(Auth::user() && Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="Profile" class="rounded-circle">
                @else
                    <div class="avatar-placeholder">
                        <i class="bi bi-person-circle"></i>
                    </div>
                @endif
            </div>
            <div class="user-details">
                <h6 class="user-name">{{ Auth::user()->name ?? 'Admin User' }}</h6>
                <p class="user-role">Administrator</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <!-- Dashboard Section -->
                <li class="menu-section-title">
                    <span>MAIN NAVIGATION</span>
                </li>
                
                <li class="dropdown {{ request()->routeIs('dashboard.admindashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.admindashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span class="mtext">Dashboard</span>
                        @if(request()->routeIs('dashboard.admindashboard'))
                            <span class="active-indicator"></span>
                        @endif
                    </a>
                </li>

                <!-- Website Management Section -->
                <li class="menu-section-title">
                    <span>WEBSITE MANAGEMENT</span>
                </li>

                <li class="dropdown {{ request()->routeIs('navbar.*') ? 'active' : '' }}">
                    <a href="{{ route('navbar.index') }}" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-list-ul"></i>
                        </span>
                        <span class="mtext">Navigation Menu</span>
                        <span class="badge badge-primary">{{ \App\Models\Dashboard\NavbarItem::count() }}</span>
                        @if(request()->routeIs('navbar.*'))
                            <span class="active-indicator"></span>
                        @endif
                    </a>
                </li>

                <li class="dropdown {{ request()->routeIs('dashboard.slider') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.slider') }}" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-images"></i>
                        </span>
                        <span class="mtext">Hero Sliders</span>
                        @if(request()->routeIs('dashboard.slider'))
                            <span class="active-indicator"></span>
                        @endif
                    </a>
                </li>

                <!-- Product Management Section -->
                <li class="menu-section-title">
                    <span>PRODUCT MANAGEMENT</span>
                </li>

                <li class="dropdown {{ request()->routeIs('products.*') || request()->routeIs('dashboard.createbillingrols') || request()->routeIs('dashboard.barcodepage') || request()->routeIs('dashboard.billingprinter') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon">
                            <i class="bi bi-box-seam"></i>
                        </span>
                        <span class="mtext">Products</span>
                        <span class="dropdown-icon">
                           
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                                <span>Manage Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.createbillingrols') }}" class="{{ request()->routeIs('dashboard.createbillingrols') ? 'active' : '' }}">
                                <span>Billing Rolls</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.barcodepage') }}" class="{{ request()->routeIs('dashboard.barcodepage') ? 'active' : '' }}">
                                <span>Barcode Generator</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.billingprinter') }}" class="{{ request()->routeIs('dashboard.billingprinter') ? 'active' : '' }}">
                                <span>Billing Printer</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown {{ request()->routeIs('dashboard.categories.*') || request()->routeIs('dashboard.navcategory') ? 'active' : '' }}">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </span>
                        <span class="mtext">Categories</span>
                        <span class="dropdown-icon">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('dashboard.categories.index') }}" class="{{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                                <span>Product Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.navcategory') }}" class="{{ request()->routeIs('dashboard.navcategory') ? 'active' : '' }}">
                                <span>Navigation Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Analytics Section -->
                <li class="menu-section-title">
                    <span>ANALYTICS & REPORTS</span>
                </li>

                <li class="dropdown">
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-trophy"></i>
                        </span>
                        <span class="mtext">Best Sellers</span>
                        <span class="badge badge-success">New</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon">
                        </span>
                        <span class="mtext">Reports</span>
                        <span class="dropdown-icon">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="#">
                                <i class="bi bi-graph-up"></i>
                                <span>Sales Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-people"></i>
                                <span>Customer Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-box"></i>
                                <span>Inventory Report</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings Section -->
                <li class="menu-section-title">
                    <span>CUSTOMIZATION</span>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon">
                            <i class="bi bi-layout-text-window"></i>
                        </span>
                        <span class="mtext">Website Footer</span>
                        <span class="dropdown-icon">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="#">
                                <span>View Footer</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-pencil-square"></i>
                                <span>Edit Footer</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon">
                            <i class="bi bi-gear"></i>
                        </span>
                        <span class="mtext">System Settings</span>
                        <span class="dropdown-icon">
                        </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="#">
                                <i class="bi bi-sliders"></i>
                                <span>General Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-shield-check"></i>
                                <span>Security</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-envelope"></i>
                                <span>Email Settings</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Help Section -->
                <li class="menu-section-title">
                    <span>SUPPORT</span>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <span class="mtext">Help Center</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle no-arrow">
                        <span class="micon">
                            <i class="bi bi-headset"></i>
                        </span>
                        <span class="mtext">Contact Support</span>
                        <span class="badge badge-warning">24/7</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Quick Stats in Sidebar -->
        <div class="sidebar-stats">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-box"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ \App\Models\Dashboard\NavbarItem::count() ?? '0' }}</span>
                    <span class="stat-label">Menu Items</span>
                </div>
            </div>
            
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ \App\Models\Dashboard\Category::count() ?? '0' }}</span>
                    <span class="stat-label">Categories</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced Sidebar Styles */
.left-side-bar {
    width: 270px;
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

/* User Profile Section */
.user-info-section {
    padding: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 10px;
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.avatar-placeholder {
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(160, 43, 43, 0.7);
    font-size: 24px;
}

.user-details {
    flex: 1;
    min-width: 0;
}

.user-name {
    color: #0f0505;
    font-size: 14px;
    font-weight: 600;
    margin: 0 0 2px 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-role {
    color: rgba(255, 255, 255, 0.6);
    font-size: 12px;
    margin: 0;
}

/* Menu Section Titles */
.menu-section-title {
    padding: 15px 20px 8px 20px;
    margin-top: 10px;
}

.menu-section-title:first-child {
    margin-top: 0;
}

.menu-section-title span {
    color: rgba(0, 0, 0, 0.5);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
}

/* Enhanced Menu Items */
.sidebar-menu ul li {
    position: relative;
}

.sidebar-menu ul li > a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 0;
}

.sidebar-menu ul li > a:hover {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    padding-left: 50px;
}

.sidebar-menu ul li.active > a {
    background: linear-gradient(90deg, rgba(52, 152, 219, 0.2) 0%, transparent 100%);
    border-left: 3px solid #3498db;
    color: #fff;
}

/* Active Indicator */
.active-indicator {
    position: absolute;
    right: 15px;
    width: 8px;
    height: 8px;
    background: #3498db;
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.7); }
    70% { box-shadow: 0 0 0 6px rgba(52, 152, 219, 0); }
    100% { box-shadow: 0 0 0 0 rgba(52, 152, 219, 0); }
}

/* Icons */
.micon {
    width: 20px;
    text-align: center;
    margin-right: 12px;
    font-size: 16px;
}

.mtext {
    flex: 1;
    font-size: 14px;
    font-weight: 500;
}

/* Dropdown Icons */
.dropdown-icon {
    margin-left: auto;
    transition: transform 0.3s ease;
}

.dropdown.show .dropdown-icon {
    transform: rotate(180deg);
}

/* Badges */
.badge {
    padding: 2px 6px;
    font-size: 10px;
    border-radius: 10px;
    margin-left: auto;
}

.badge-primary {
    background: #3498db;
    color: white;
}

.badge-success {
    background: #27ae60;
    color: white;
}

.badge-warning {
    background: #f39c12;
    color: white;
}

/* Submenu Styles */
.submenu {
    background: rgba(0, 0, 0, 0.2);
    padding: 0;
}

.submenu li a {
    padding: 10px 20px 10px 55px;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.7);
    display: flex;
    align-items: center;
    gap: 10px;
}

.submenu li a:hover {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
}

.submenu li a.active {
    background: rgba(52, 152, 219, 0.2);
    color: #3498db;
}

/* Sidebar Stats */
.sidebar-stats {
    padding: 20px;
    margin-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
}

.stat-item:last-child {
    margin-bottom: 0;
}

.stat-icon {
    width: 35px;
    height: 35px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
}

.stat-info {
    display: flex;
    flex-direction: column;
}

.stat-number {
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    line-height: 1;
}

.stat-label {
    color: rgba(255, 255, 255, 0.6);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .left-side-bar {
        width: 100%;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .left-side-bar.show {
        transform: translateX(0);
    }
    
    .user-info-section {
        padding: 15px;
    }
    
    .sidebar-stats {
        display: none;
    }
}

/* Scrollbar Styling */
.customscroll::-webkit-scrollbar {
    width: 4px;
}

.customscroll::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.customscroll::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 4px;
}

.customscroll::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>