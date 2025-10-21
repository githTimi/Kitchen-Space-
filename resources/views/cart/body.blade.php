<div class="container py-3">
  <h3 class="mb-4 text-center fw-bold">🛒 My Cart</h3>

  @if($cart->count() > 0)
    @foreach($cart as $item)
      <article class=" border-bottom border-white text-black rounded shadow-sm mb-3 p-3"  >
        <div class="row text-center text-sm-start">
          <!-- Product Image -->
          <div class="col-3 col-sm-2 mb-3 mb-sm-0  ">
            <img 
              src="{{ asset('foodimage/' . $item->img) }}"
              alt="{{ $item->title }}"
              class="img-fluid rounded"
     style="object-fit: cover; aspect-ratio: 1 / 1; max-width: 100%; height: 92px;"
            >
          </div>

          <!-- Item Info -->
          <div class="col-6 col-sm-8 mb-2 mb-sm-0">
            <h6 class="fw-bold text-secondary fs-6 fs-md-5 mb-1">{{ $item->title }}</h6>
            <p class="text-info fs-7 fs-md-6 mb-0">{{ $item->details }}</p>
          </div>

          <!-- Price -->
         <div class="col-3 col-sm-2 text-end">
        <span class="fw-bold text-success fs-6 fs-md-5 fs-sm-4">
          ₦{{ number_format($item->price, 2) }}
        </span>
      </div>
        </div>

        <footer class="border-0 pt-3 mt-2 ">
          <div class="custom-lg-padding d-flex flex-column  flex-sm-row justify-content-between align-items-center gap-2 ">
            <!-- Remove Button -->
            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger btn-sm w-100 w-sm-auto">× Remove</button>
            </form>

            <!-- Quantity Controls -->
            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
              @csrf
              @method('PATCH')
              <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">−</button>
              <span class="mx-2 fw-semibold">{{ $item->quantity }}</span>
              <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">+</button>
            </form>
          </div>
        </footer>
      </article>
    @endforeach

    <!-- Total Section -->
    <div class="mt-4 text-end">
      <h5 class="fw-bold">
        Total: ₦{{ number_format($cart->sum(fn($i) => $i->price * $i->quantity), 2) }}
      </h5>
      <form action="{{route('order.store')}}" method="post">
         @csrf 
         <div>
          <label for="name" class="labe">Name</label>
          <input type="text" name="name" class="input-field"value="{{Auth()->user()->name}}">
         </div>
         <div>
          <label for="email" class="labe">Email</label>
          <input type="text" name="email" class="input-field" value="{{Auth()->user()->email}}" >
         </div>
         <div>
          <label for="phone" class="labe">Phone</label>
          <input type="text" name="phone" class="input-field" value="{{Auth()->user()->phone}}">
         </div>
         <div>
          <label for="address" class="labe">Address</label>
          <input type="text" name="address" class="input-field" value="{{Auth()->user()->address}}">
         </div>
       
      <button class="btn btn-primary mt-2">Proceed to Checkout</button>
      </form>
    </div>

  @else
    <div class="text-center text-muted py-5">
      <p>No items in your cart yet.</p>
      <a href="{{url('home')}}" class="btn btn-outline-primary">Continue Shopping</a>
    </div>
  @endif
</div>
