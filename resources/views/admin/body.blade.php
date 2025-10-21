<div class="m-2 d-flex justify-content-center ">
      <div class="bd" id="usa"><p><i class="fa-regular fa-user fa-3x"></i> </p> <span>Total Users</span>
      <span id="us">{{$total_user}}</span></div>
       <div class=" bd" id="usg"> <p><i class="fa-solid fa-bowl-food fa-3x"></i></p><span>Total Orders</span>
      <span id="ug">{{$total_order}}</span></div>
        <div class=" bd" id="ust"><p><i class="fa-solid fa-table fa-3x"></i></p> <span class="color-green">Total Bookings</span>
        <span id="ut">{{$total_book}}</span></div>
       
</div>
<h1 class="text-center mb-1">
  Available Orders!
</h1>
<div class="table-responsive">
<table class="table table-striped table-bordered align-middle">
  <thead class="table-dark">
    <tr>
      <th scope="col">Customer Name</th>
    
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Food Name</th>
     
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Change Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($order as $order)
    <tr>
      <td>{{ $order->name }}</td>
      
      <td>{{ $order->phone }}</td>
      <td style =" word-wrap: break-word;
    overflow: visible;">{{ $order->address }}</td>
      <td>{{ $order->title }}</td>
      
      <td>{{ $order->quantity }}</td>
      <td>${{ $order->price * $order->quantity }}</td>
      <td><img src="{{ asset('foodimage/' . $order->img) }}" style="width: 100px; height: 100px; object-fit: cover;"
      alt="{{ $order->title }}"></td>
      <td>{{ $order ->delivery_status}}</td>
      <td class="py-2"> 
         <form action="{{ route('order.update', $order->id) }}"method= "post" enctype="multipart/form-data" class="mb-2">
            @csrf
             @method('PUT')
             <input type="submit" value="Delivered" style="background-color: green; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">
  
          </form>
          <form action="{{ route('order.destroy', $order->id) }}"method= "post" enctype="multipart/form-data">
            @csrf
             @method('DELETE')
             <input type="submit" value="Delete" style="background-color: rgb(117, 0, 128); color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">
  
          </form>
       </td>
     
    </tr>
  
    @endforeach
  </tbody>

  </div>

 
  @if ($book->count() > 0)
   
  <div class="table-responsive Mt-3">
    <caption class="text-center mt-2"> <h1>Tables Booked!</h1> </caption>
   
<table class="table table-striped table-bordered align-middle mt-3">

  <thead class="table-dark">
    <tr>
      <th scope="col">Phone Number</th>
    
      <th scope="col">Number of Guests</th>
      <th scope="col">Time</th>
      <th scope="col">Date</th>
      <th scope="col">Delete Booking</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($book as $book)
    <tr>
      <td>{{ $book->phone }}</td>
      
      <td>{{ $book->guests }}</td>
      <td>{{ $book->time }}</td>
      <td>{{ $book->date }}</td>
      <td class="py-2"> 
         
          <form action="{{ url('book_destroy', $book->id) }}"method= "get" enctype="multipart/form-data">
            @csrf
             @method('DELETE')
             <input type="submit" value="Cancelled" style="background-color: rgb(117, 0, 128); color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">
  
          </form>
       </td>
      
     
    </tr>
  
    @endforeach
  </tbody>

  </div>
  @else
  <div class="text-center text-muted py-5"> 
 <p>No tables booked yet.</p>
  </div>
 
  @endif