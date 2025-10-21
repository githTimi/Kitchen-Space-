
  <!DOCTYPE html>
<html>
  <head> 
   <base href="/public">
   @include('admin.css')
   <style>
    label{
        display: inline-block;
        width: 200px;
        color: white;
    }
    .div_deg{
        padding: 10px;
    }
   </style>
  </head>
  <body>
       @include('admin.header')
       @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <h1>Update Food Details</h1>
           <h2>{{$food ->title}}</h2>

           <form action="{{ route('food.update', $food->id) }}"method= "post" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="div_deg">
              <label for="" >Food Title</label>
              <input type="text" name="title" value="{{$food ->title}}" required>
            </div>
            <div class="div_deg">
              <label for="" >Food Details</label>
              <textarea name="details"  cols="50" rows="5" required>{{$food ->details}}</textarea>
            </div>
            <div class="div_deg">
              <label for="" >Food Price</label>
              <input type="text" name="price" value="{{$food ->price}}" required >
            </div>
            <div class="div_deg">
              <label for="" >Old Food Image</label>
              <img width="150" src="{{ asset('foodimage/' . $food->img) }}" alt="">
        
            </div>
            <div class="div_deg">
              <label for="" >Change Food Image</label>
              <input type="file" name="img" >
               <div class="div_deg">
               <button type="submit" class="btn btn-primary">Update</button>
         
           </form>
      </div>
    </div>
    @include('admin.js')
  </body>
</html>