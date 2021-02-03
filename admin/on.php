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
    <link rel="stylesheet" href="./css/exam.css">
    <script src="./js/questions.js"></script>
    <script src="./js/audio.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="./css/system_test.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #228B22;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

    #sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  float:right;
  
}
    </style>



<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"26661727a9c464aa0bb3139bcef45a83b","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
</head>

<body oncopy="return false;" oncut="return false;" onpaste="return false;" oncontextmenu="return false;" >
<?php  include 'header.html' ?>
<div class="alert" id="warning">
  <span class="closebtn" onclick="start()">&times;</span> 
  <strong>Warning!</strong> test is going on...
</div>
<!-- <div id="content"></div> -->
<!-- <div class="camera" id = "sticky">
            <video id="video">Video stream not available.</video>
        </div> -->
        <!-- <div><button id="startbutton">Take photo</button></div> -->
        
<div class="container" > 
     <? include 'databaseconnect.php'; ?>
     <!-- <button onclick="openFullscreen();">Fullscreen Mode</button> -->
     <h2></h2>
     <div class="row">
        

        <?php
        


        ?>

        <div id="result" hidden></div>
        <!-- <button onclick="start()">Listen</button> -->

        <div class="row">
        <div class="col l12 m12 s12">
          <div class="row"><center>
            <div class="col s6">
                    <div class="card">
                                    <div class="card-image">
                                    <div class="camera" >
            <video id="video">Video stream not available.</video>
        </div>
        <canvas id="canvas" ></canvas>
                                    <span class="card-title"><center>Harshraj Dhote</center></span>
                                    </div>
                                    <div class="card-content">
                                    <p style="color:red" id="alert_activity">Activity Status</p>
                                    </div>
                                    <!-- <div class="card-action">
                                    <a href="#">This is a link</a>
                                    </div> -->
                    </div>
          </div></center>
        </div>
        </div>

             
  </div>
        
</div> 
    

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
    </script>
    <!-- <script src="./js/restricted.js"></script> -->
    
    <script>
    //  openFullscreen();
    </script>
    
 </body>
</html>