 <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">

        <h2 class="section-title py-5">ALL OUR GOOD DISHES</h2>
 </div>
        <div class="container my-4"> 
  <div class="row g-4">
    @foreach ($food as $item)
      <div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3">
        <div class="food-card bg-transparent border h-100 d-flex flex-column">
          <img src="{{ asset('foodimage/' . $item->img) }}" 
               alt="{{ $item->title }}" 
               class="food-img card-img-top">
          
          <div class="p-3 d-flex flex-column flex-grow-1">
            <h1 class="text-center mb-4">
              <span class="badge bg-primary"> ₦{{ number_format($item->price, 2) }}</span>
            </h1>
            <h4 class="pt-2 pb-2">{{ $item->title }}</h4>
            <p class="food-desc mt-auto">{{ $item->details }}</p>
            <form action="{{ route('food.add_cart', $item->id) }}" method="POST">
                @csrf
                <input type="number" value="1" name="quantity" required >
                <input type="submit" value="Add To Cart" class="btn btn-info">
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

        </div>
       
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup">
            <h2>Success 🎉</h2>
            <p>{{ session('success') }}</p>
            <button id="closePopup">OK</button>
        </div>
    </div>
