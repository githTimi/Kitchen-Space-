<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
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
     /* The popup background (overlay) */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* The popup box */
        .popup {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
        }

        .popup p {
            color: #555;
            margin-bottom: 20px;
        }

        .popup button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .popup button:hover {
            background: #0056b3;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
   @include('home.header')
   @include('home.about')

    <!--  gallary Section  -->
   @include('home.gallery')

    <!-- book a table Section  -->
   @include('home.book')

    <!-- BLOG Section  -->
   @include('home.blog')
    <!-- REVIEWS Section  -->
   @include('home.footer')  

   
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
     <script>
        // Check if there's a success message from Laravel
        @if (session('success'))
            // Show the popup
            document.getElementById('popupOverlay').style.display = 'flex';
        @endif

        // Close button functionality
        document.getElementById('closePopup')?.addEventListener('click', function() {
            document.getElementById('popupOverlay').style.display = 'none';
        });
    </script>

</body>
</html>
