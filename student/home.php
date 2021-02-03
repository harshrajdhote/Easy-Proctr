<?php
   include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <!-- <script src='main.js'></script> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<?php  include 'header.html' ?>

    <div class="container"> 
     <?php  include '../databaseconnect.php'; 
            $ses_sql = mysqli_query($db,"select * from students where email = '".$_SESSION['login_user']."'");
   
            $array = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
            
            $login_session = $array['email'];     
            
            $ses_sql = mysqli_query($db,"select * from test ");
   
            // $array = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
            
            // while ($row = mysqli_fetch_array( $ses_sql)) { 
            //   echo "<p>".$row['test_name']."</p>";
            // } 
             
     
     ?>
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
     <h2>My Profile</h2>
     <div class="row">
  <div class="col l12 m12 s12">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-image">
            <img src="http://www.img.lirent.net/2014/10/Android-Lollipop-wallpapers-Download.jpg" alt="" />
          </div>
          <div class="card-content">
            <div class="row">
              <div class="col s4 profile-pic">
               <?php echo "<img class='circle responsive-img' src='../img/".$array['img']."' alt='' />"; ?>
              </div>
              <div class="col s8 profile-pic">
             <br>
                <p><h5>Id : <?php echo $array['id'];   ?></h5></p>
                <p><h5>Contact no : <?php echo $array['phone']  ?></h5></p>
                <p><h5>Email   : <?php echo $array['email']  ?></h5></p>
                <form action="./transfer.php">
                <p><h5>Available Exams : </h5></p>           
                <!-- <select> -->
                
                            <?php
                            while ($row = mysqli_fetch_array( $ses_sql)) { 
                            echo "
                            <label>
                            <input name='test_selected' type='radio' checked value='".$row['test_name']."' />
                            <span>".$row['test_name']."</span>
                        </label>";

                            } 
                          ?>
                <!-- </select> -->
                <br>
                <button class="btn waves-effect light-green" type="submit" name="action">Start Test
                <i class="material-icons right">send</i>
            </button>
                
                </form>
                
                
                <p></p>
            </div>
             
            </div>
            <span class="card-title black-text"><?php  echo $array['name'] ?></span>
          </div>
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