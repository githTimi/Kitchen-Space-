<!DOCTYPE html>
<html lang="en">
<head>
	@include('cart.css')
    <style>
         .food-card {

  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.food-card:hover {
  transform: scale(1.03);
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

.food-img {
  width: 100%;
  height: 200px;        /* fixed uniform height */
  object-fit: fill;    /* keeps image filling the box */
}

.food-desc {
  font-size: 0.9rem;
  color: #ddd;          /* lighter text for readability */
}
 @media (min-width: 992px) {
      .custom-lg-padding {
        padding-left: 2rem !important;
        padding-right: 1.75rem !important;
      }
    }
    .input-field {
    width: 50%;
    padding: 10px;
    border: 2px solid #dddddd;
    border-radius: 6px;
    outline: none;
    transition: 0.3s;
    margin-bottom: 15px;
}

.input-field:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}
.labe{
  width: 7%;
}
@media (max-width: 500px) {
    .labe {
        width: 15%;
       
    }
}

    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @include('cart.header')
    @include('cart.body')
     
@include('cart.footer')

   
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="assets/js/foodhut.js"></script>

</body>
</html>
