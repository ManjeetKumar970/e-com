 <section class="py-5">
     <div class="text-center ">
         <h5>Our Products</h5>

         <div class="text-center mb-5">
             <h2 class="section-title">Browse by Category</h2>
             <p class="text-muted">Explore our comprehensive range of business solutions</p>
         </div>
         <div class="row g-4 justify-content-center">
             <!-- Item 1 -->
             @foreach ($categories as $category)
                 <div class="col-lg-2 col-md-4 col-sm-6">
                     <div class="category-card text-center p-3 rounded shadow-sm h-100 product-card-hot">
                         <a href="{{ route('product.show', ['slug' => $category->slug, 'id' => $category->id]) }}">
                             <img src="{{ asset('storage/' . $category->image_url) }}" alt="{{ $category->name }}"
                                 class="category-icon">
                         </a>
                         <h6 class="fw-bold">{{ $category->name }}</h6>
                         <small class="text-muted">45+ Models</small>
                     </div>
                 </div>
             @endforeach
         </div>

 </section>
