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
    <link rel="stylesheet" href="./css/system_test.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.16.0.min.js"></script>
    <script src="./js/aws-cognito-sdk.min.js"></script>
    <script src="./js/amazon-cognito-identity.min.js"></script>
    
    <meta charset="UTF-8">
<script>
 
</script>






</head>
<body>
<?php  include 'header.html' ?>

<div class="container"> 
     <? include 'databaseconnect.php'; ?>
    
     <h2></h2>
     <div class="row"><center>
     <div class="contentarea">
        <h3>
            System Check
        </h3>
        <div class="camera">
            <video id="video">Video stream not available.</video>
        </div>
        <!-- <div><button id="startbutton">Take photo</button></div> -->
        <canvas id="canvas" ></canvas>
        <!-- <div class="output" hidden>
            <img id="photo" alt="The screen capture will appear in this box.">
        </div> -->


        <!-- <H1>Age Estimator</H1>
  <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
  <p id="opResult"></p> -->

    </div>
        <div class="col s12">
                <h4>Prerequisites</h4>
                <ul>
                <li>p1</li>
                <li>p2</li>
        </div>
        <div class="col s12">
                <h4>Prerequisites</h4>
                <ul>
                <li>p1</li>
                <li>p2</li>
        </div>


</center>
        
  </div>
        
</div> 
    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    <script src="./js/system_test_camera.js"></script>
 </body>
</html>