
  <!DOCTYPE html>
<html>
  <head> 
   
   @include('admin.css')
   <style>
      td {
    white-space: normal !important;
    word-wrap: break-word !important;
    overflow: visible !important;
    max-width: none !important;
     }
     .bd{
    border: 2px solid black;
    padding: 10px;
    width: 25%;
    height: 120px;
    margin: 5px;
    border-radius: 5px;
    text-align: center;
     }
     .bd#usa:hover {
  transform: scale(1.2); /* makes it slightly bigger */
  border-color: rgb(98, 98, 202); /* change border color */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* optional shadow */
}
.bd#ust:hover {
  transform: scale(1.2); /* makes it slightly bigger */
  border-color: rgb(110, 238, 195); /* change border color */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* optional shadow */
}
.bd#usg:hover {
  transform: scale(1.2); /* makes it slightly bigger */
  border-color: rgb(34, 177, 34); /* change border color */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* optional shadow */
}
     #us{
      color: rgb(98, 98, 202);
      font-size: 20px;
      font-weight: bold;
     }
     #ut{
      color: rgb(110, 238, 195);
      font-size: 20px;
      font-weight: bold;
     }
      #ug{
        color: rgb(34, 177, 34);
        font-size: 20px;
        font-weight: bold;
      }
      
   </style>
  </head>
  <body>
       @include('admin.header')
       @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           @include('admin.body')
      </div>
    </div>
    @include('admin.js')
  </body>
</html>