<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <!-- <script src='main.js'></script> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
   
    <script src="./js/charts.js">
</script>






</head>
<body>
<?php  include 'header.html' ?>

    <div class="container"> 
     <? include 'databaseconnect.php'; ?>
     <style>
      .card {
  overflow: visible;
}
.profile-pic {
  margin-top: 0em;
  z-index: 1;
  position: relative;
}

.profile-pic > img {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.controls {
  cursor: pointer;
}


     </style>
     <h2></h2>
     <div class="row">
        <div class="col l12 m12 s12">
          <div class="row">
            <div class="col s6">
            <div id="onoffContainer" style="height: 300px; width: 100%;"></div>
          
            </div>
            <div class="col s6">
            <div id="passfailContainer" style="height: 300px; width: 100%;"></div>
            </div>

            
          </div>
          
        </div>
    </div>
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
</html>