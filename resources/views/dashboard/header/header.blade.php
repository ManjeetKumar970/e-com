<div class="header">
    <div class="header-left">
        
        <!-- Mobile Menu Toggle -->
        <div class="menu-icon" data-toggle="left-sidebar-toggle">
            <i class="bi bi-list"></i>
        </div>
        
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.admindashboard') }}">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    @if(request()->routeIs('navbar.*'))
                        <li class="breadcrumb-item active">Navigation</li>
                    @elseif(request()->routeIs('products.*'))
                        <li class="breadcrumb-item active">Products</li>
                    @elseif(request()->routeIs('dashboard.categories.*'))
                        <li class="breadcrumb-item active">Categories</li>
                    @else
                        <li class="breadcrumb-item active">Overview</li>
                    @endif
                </ol>
            </nav>
        </div>

        <!-- Enhanced Search -->
        <div class="search-container">
            <div class="search-toggle-icon" data-toggle="header_search">
                <i class="bi bi-search"></i>
            </div>
            <div class="header-search">
                <form id="global-search-form">
                    <div class="search-input-container">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" class="form-control search-input" 
                               placeholder="Search products, categories, orders..." 
                               autocomplete="off" />
                        <div class="search-filter-toggle" data-toggle="dropdown">
                            <i class="bi bi-funnel"></i>
                        </div>
                    </div>
                    
                    <!-- Advanced Search Dropdown -->
                    <div class="dropdown-menu search-filters-dropdown">
                        <div class="search-filters">
                            <h6>Search Filters</h6>
                            <div class="filter-group">
                                <label>Search in:</label>
                                <div class="filter-options">
                                    <label class="filter-option">
                                        <input type="checkbox" value="products" checked>
                                        <span>Products</span>
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" value="categories">
                                        <span>Categories</span>
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" value="orders">
                                        <span>Orders</span>
                                    </label>
                                    <label class="filter-option">
                                        <input type="checkbox" value="customers">
                                        <span>Customers</span>
                                    </label>
                                </div>
                            </div>
                            <div class="filter-group">
                                <label>Date Range:</label>
                                <select class="form-control form-control-sm">
                                    <option>All Time</option>
                                    <option>Today</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Custom Range</option>
                                </select>
                            </div>
                            <div class="filter-actions">
                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearFilters()">Clear</button>
                                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- Search Results Dropdown -->
                <div class="search-results" style="display: none;">
                    <div class="search-results-header">
                        <span class="results-count">Found <strong>0</strong> results</span>
                    </div>
                    <div class="search-results-body">
                        <!-- Results will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-right">
        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="action-button" title="Add New Product">
                <a href="{{ route('dashboard.products.create') ?? '#' }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg"></i>
                    <span class="action-text">Add Product</span>
                </a>
            </div>
        </div>

        <!-- Theme Toggle -->
        <div class="theme-toggle" title="Toggle Theme">
            <button class="btn btn-ghost" onclick="toggleTheme()">
                <i class="bi bi-moon-stars" id="theme-icon"></i>
            </button>
        </div>

        <!-- Settings -->
        <div class="dashboard-setting">
            <div class="dropdown">
                <a class="dropdown-toggle settings-btn" href="#" data-toggle="dropdown" title="Dashboard Settings">
                    <i class="bi bi-gear"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right settings-dropdown">
                    <div class="dropdown-header">
                        <h6>Dashboard Settings</h6>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-palette"></i>
                        <span>Appearance</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-shield-check"></i>
                        <span>Privacy</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-question-circle"></i>
                        <span>Help & Support</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Notifications -->
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle notification-btn" href="#" data-toggle="dropdown" title="Notifications">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right notification-dropdown">
                    <div class="dropdown-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Notifications</h6>
                            <button class="btn btn-sm btn-outline-primary" onclick="markAllRead()">
                                Mark all read
                            </button>
                        </div>
                    </div>
                    
                    <div class="notification-list">
                        <div class="notification-item unread">
                            <div class="notification-avatar">
                                <div class="avatar-icon bg-success">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                            <div class="notification-content">
                                <h6>Order Completed</h6>
                                <p>Order #12345 has been successfully completed</p>
                                <small class="text-muted">2 minutes ago</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-sm btn-ghost" onclick="markAsRead(this)">
                                    <i class="bi bi-check"></i>
                                </button>
                            </div>
                        </div>

                        <div class="notification-item unread">
                            <div class="notification-avatar">
                                <div class="avatar-icon bg-warning">
                                    <i class="bi bi-exclamation-triangle"></i>
                                </div>
                            </div>
                            <div class="notification-content">
                                <h6>Low Stock Alert</h6>
                                <p>Product "Wireless Headphones" is running low on stock</p>
                                <small class="text-muted">1 hour ago</small>
                            </div>
                            <div class="notification-actions">
                                <button class="btn btn-sm btn-ghost" onclick="markAsRead(this)">
                                    <i class="bi bi-check"></i>
                                </button>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-avatar">
                                <div class="avatar-icon bg-info">
                                    <i class="bi bi-person-plus"></i>
                                </div>
                            </div>
                            <div class="notification-content">
                                <h6>New Customer Registration</h6>
                                <p>John Doe has registered as a new customer</p>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-avatar">
                                <img src="{{ asset('vendors/images/photo1.jpg') }}" alt="User Avatar" class="rounded-circle">
                            </div>
                            <div class="notification-content">
                                <h6>System Update</h6>
                                <p>Dashboard has been updated to version 2.1.0</p>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dropdown-footer">
                        <a href="#" class="view-all-notifications">View all notifications</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced User Profile -->
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle user-profile-btn" href="#" data-toggle="dropdown">
                    <div class="user-avatar">
                        @if(Auth::user() && Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="Profile Avatar">
                        @else
                            <img src="{{ asset('vendors/images/photo1.jpg') }}" alt="Default Avatar">
                        @endif
                        <div class="user-status online"></div>
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->name ?? session('user.name') ?? 'Admin User' }}</span>
                        <span class="user-role">Administrator</span>
                    </div>
                    <i class="bi bi-chevron-down dropdown-arrow"></i>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right user-dropdown">
                    <div class="dropdown-header">
                        <div class="user-profile-header">
                            <div class="user-avatar-large">
                                @if(Auth::user() && Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" alt="Profile Avatar">
                                @else
                                    <img src="{{ asset('vendors/images/photo1.jpg') }}" alt="Default Avatar">
                                @endif
                            </div>
                            <div class="user-details">
                                <h6>{{ Auth::user()->name ?? session('user.name') ?? 'Admin User' }}</h6>
                                <p>{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                                <span class="badge badge-success">Administrator</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="dropdown-body">
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-shield-check"></i>
                            <span>Privacy & Security</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-bell"></i>
                            <span>Notification Preferences</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-question-circle"></i>
                            <span>Help Center</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-chat-left-text"></i>
                            <span>Send Feedback</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('dashboard.logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Modern Header Styles */
/* .header {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 0 30px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
} */

.header-left {
    display: flex;
    align-items: center;
    gap: 25px;
    flex: 1;
}

.header-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

/* Menu Icon */
.menu-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #667eea;
}

.menu-icon:hover {
    background: #667eea;
    color: white;
}

/* Breadcrumb */
.breadcrumb-section {
    display: none;
}

.breadcrumb {
    margin: 0;
    background: none;
    padding: 0;
}

.breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
}

.breadcrumb-item.active {
    color: #495057;
    font-weight: 500;
}

/* Enhanced Search */
.search-container {
    position: relative;
}

.search-toggle-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(108, 117, 125, 0.1);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #6c757d;
}

.search-toggle-icon:hover {
    background: #6c757d;
    color: white;
}

.header-search {
    position: absolute;
    top: 50px;
    left: 0;
    width: 400px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
    z-index: 1000;
}

.header-search.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.search-input-container {
    position: relative;
    display: flex;
    align-items: center;
}

.search-input {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 12px 45px 12px 40px;
    width: 100%;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.search-icon {
    position: absolute;
    left: 12px;
    color: #6c757d;
}

.search-filter-toggle {
    position: absolute;
    right: 10px;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 8px;
    cursor: pointer;
    color: #6c757d;
}

.search-filters-dropdown {
    width: 300px;
    padding: 20px;
    border-radius: 12px;
    margin-top: 10px;
}

.filter-group {
    margin-bottom: 15px;
}

.filter-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 8px;
}

.filter-option {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 0;
    cursor: pointer;
}

.filter-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 15px;
}

/* Quick Actions */
.quick-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.action-button .btn {
    border-radius: 10px;
    padding: 8px 15px;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.action-text {
    font-size: 13px;
    font-weight: 500;
}

/* Theme Toggle */
.theme-toggle .btn {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 193, 7, 0.1);
    border: none;
    color: #ffc107;
    transition: all 0.3s ease;
}

.theme-toggle .btn:hover {
    background: #ffc107;
    color: white;
}

/* Settings Button */
.settings-btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(108, 117, 125, 0.1);
    border-radius: 10px;
    color: #6c757d;
    text-decoration: none;
    transition: all 0.3s ease;
}

.settings-btn:hover {
    background: #6c757d;
    color: white;
}

.settings-dropdown {
    width: 250px;
    border-radius: 12px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 0;
}

/* Enhanced Notifications */
.notification-btn {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(220, 53, 69, 0.1);
    border-radius: 10px;
    color: #dc3545;
    text-decoration: none;
    transition: all 0.3s ease;
}

.notification-btn:hover {
    background: #dc3545;
    color: white;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.notification-dropdown {
    width: 350px;
    border-radius: 12px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 0;
    max-height: 500px;
    overflow: hidden;
}

.notification-list {
    max-height: 350px;
    overflow-y: auto;
}

.notification-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 15px 20px;
    border-bottom: 1px solid #f8f9fa;
    transition: background 0.3s ease;
}

.notification-item.unread {
    background: rgba(102, 126, 234, 0.05);
}

.notification-item:hover {
    background: #f8f9fa;
}

.notification-avatar {
    flex-shrink: 0;
}

.avatar-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
}

.notification-content {
    flex: 1;
}

.notification-content h6 {
    margin: 0 0 4px 0;
    font-size: 14px;
    font-weight: 600;
}

.notification-content p {
    margin: 0 0 4px 0;
    font-size: 13px;
    color: #6c757d;
    line-height: 1.4;
}

.notification-actions {
    flex-shrink: 0;
}

.view-all-notifications {
    display: block;
    text-align: center;
    padding: 15px;
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    border-top: 1px solid #f8f9fa;
}

/* Enhanced User Profile */
.user-profile-btn {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 15px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 12px;
    text-decoration: none;
    color: #495057;
    transition: all 0.3s ease;
}

.user-profile-btn:hover {
    background: #667eea;
    color: white;
}

.user-avatar {
    position: relative;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    overflow: hidden;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 2px solid white;
}

.user-status.online {
    background: #28a745;
}

.user-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    min-width: 0;
}

.user-name {
    font-size: 14px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 120px;
}

.user-role {
    font-size: 11px;
    color: rgba(73, 80, 87, 0.7);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.dropdown-arrow {
    color: #6c757d;
    font-size: 12px;
    transition: transform 0.3s ease;
}

.dropdown.show .dropdown-arrow {
    transform: rotate(180deg);
}

.user-dropdown {
    width: 300px;
    border-radius: 12px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    padding: 0;
}

.user-profile-header {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
}

.user-avatar-large {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
}

.user-avatar-large img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.user-details h6 {
    margin: 0 0 4px 0;
    font-size: 16px;
    font-weight: 600;
}

.user-details p {
    margin: 0 0 8px 0;
    color: #6c757d;
    font-size: 13px;
}

.dropdown-body {
    padding: 10px 0;
}

.logout-form {
    margin: 0;
}

.logout-btn {
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    color: #dc3545;
}

.logout-btn:hover {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

/* Responsive Design */
@media (min-width: 992px) {
    .breadcrumb-section {
        display: block;
    }
    
    .search-toggle-icon {
        display: none;
    }
    
    .header-search {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        background: none;
        box-shadow: none;
        padding: 0;
        width: 300px;
    }
}

@media (max-width: 768px) {
    .header {
        padding: 0 15px;
    }
    
    .action-text {
        display: none;
    }
    
    .user-info {
        display: none;
    }
    
    .quick-actions {
        display: none;
    }
}
</style>

<script>
// Search functionality
function clearFilters() {
    document.querySelectorAll('.filter-option input[type="checkbox"]').forEach(cb => {
        cb.checked = false;
    });
    document.querySelector('.filter-group select').value = 'All Time';
}

// Theme toggle
function toggleTheme() {
    const themeIcon = document.getElementById('theme-icon');
    const body = document.body;
    
    if (body.classList.contains('dark-theme')) {
        body.classList.remove('dark-theme');
        themeIcon.className = 'bi bi-moon-stars';
    } else {
        body.classList.add('dark-theme');
        themeIcon.className = 'bi bi-sun';
    }
}

// Notification functions
function markAllRead() {
    document.querySelectorAll('.notification-item.unread').forEach(item => {
        item.classList.remove('unread');
    });
    document.querySelector('.notification-badge').textContent = '0';
}

function markAsRead(button) {
    const notificationItem = button.closest('.notification-item');
    notificationItem.classList.remove('unread');
    
    // Update badge count
    const badge = document.querySelector('.notification-badge');
    const currentCount = parseInt(badge.textContent);
    if (currentCount > 0) {
        badge.textContent = currentCount - 1;
    }
}

// Search toggle for mobile
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.querySelector('.search-toggle-icon');
    const headerSearch = document.querySelector('.header-search');
    
    if (searchToggle && headerSearch) {
        searchToggle.addEventListener('click', function() {
            headerSearch.classList.toggle('active');
        });
    }
});
</script>