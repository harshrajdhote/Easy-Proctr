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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
<script>
 $(document).ready(function(){
  $("#addQuestion").click(function(){
     //alert("kel")

    //  if($(this).attr('id') == "addQuestion"){
     $.get(
                  "./add_question.php",
                  { 
                    question : $("#question").val(),
                    correct_option : $("#correct_option").val(),
                    option_1 : $("#option_1").val(),
                    option_2 : $("#option_2").val(),
                    option_3 : $("#option_3").val(),
                    test_name : $("#test_name").val()



                   },
                  function(data) {
                     console.log(data);
                  }
               );
            // }


  });
  
});


</script>






</head>
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
<body>
<?php  include 'header.html' ?>

<div class="container"> 
     <? include 'databaseconnect.php'; ?>
    
     <h2></h2>
     <div class="row">
        <div class="col l12 m12 s12">
          <div class="row">
            <div class="col s6">
                    <div class="card">
                                    <div class="card-image">
                                    <img src="../img/nostream.jpg">
                                    <span class="card-title">Sathish</span>
                                    </div>
                                    <div class="card-content">
                                    <p style="color:red">Suspicious Activity detected</p>
                                    </div>
                                    <!-- <div class="card-action">
                                    <a href="#">This is a link</a>
                                    </div> -->
                    </div>
            </div>
            <div class="col s6">
            <div class="card">
                                    <div class="card-image">
                                    <img src="../img/nostream.jpg">
                                    <span class="card-title">Peter</span>
                                    </div>
                                    <div class="card-content">
                                    <p style="color:red">Suspicious Activity detected</p>
                                    </div>
                                    <!-- <div class="card-action">
                                    <a href="#">This is a link</a>
                                    </div> -->
                    </div>
            </div>

            
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
 </body>
</html>