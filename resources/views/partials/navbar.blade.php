     <!-- Category Navigation -->
<nav class="navbar navbar-expand-lg p-0 category-nav" 
     style="background: linear-gradient(135deg, #4285f4, #1a73e8); z-index: 1000;">
             <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/">
                            <i class="fas fa-th me-1"></i> All Categories
                        </a>
                    </li>
                    @foreach ($categories->slice(0,3) as $categorie  )
                        <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="{{ route('product.show', ['slug' => $categorie->slug, 'id' => $categorie->id]) }}">
                            <i class="fas fa-print me-1"></i> {{ $categorie->name }}
                        </a>
                    </li>
                    @endforeach
                      {{-- <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/product">
                            <i class="fas fa-barcode me-1"></i> Barcode Labels
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/product">
                            <i class="fas fa-cash-register me-1"></i> Billing Machines
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/product">
                            <i class="fas fa-desktop me-1"></i> POS Software
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/contactus">
                            <i class="fas fa-boxes me-1"></i> Bulk Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/custombarcode">
                            <i class="fas fa-tools me-1"></i> Custom Solutions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-medium px-3 py-3" href="/contactus">
                            <i class="fas fa-headset me-1"></i> Support
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

