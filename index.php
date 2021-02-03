<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sambhav Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Welcome to Pariksha Portal</h2>
  <!-- Button to Open the Modal -->
  
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form">
    SignUp
  </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminlogin">
    Admin Login
  </button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentlogin">
    Student Login
  </button>
    <a href = "http://www.walchandsangli.ac.in/" ><button type="button" class="btn btn-primary" >
    More Details
  </button></a>
<!-- Applicant form -->
    <div class="modal" id="form">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Application form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
        <form action="./index.php" method="post" enctype="multipart/form-data">
            
            
          
            <label align="right">Name </label>
            <input type="text" name="name" required/><br>
		
		  
<!--
            <lable align="right">POST</lable>
            <select name = "post" >
                <option value="Member">Member</option>
  	         </select>
-->
            
           
            
            
                            
            
            
             Mobile No
            <input name ="contact" type="text" placeholder="10 Digits only" required>
            
           <br> 
                     
            <label align="right">Email </label>
            <input type="text" name="email" required/><br>   
                           
            
            <label align="right">Password </label>
            <input type="password" name="password" required/><br>   
                           
            
                            <label align="right">Photo Id</label>
            <input type="file" name="image" required/><br>   
                            <input type="submit" name="register" value="submit" />
                                     

        </form>
    
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
    
    
<?php
    
    
   include 'databaseconnect.php';
   if(isset($_POST['register']))
    {
        
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = $_POST['contact'];
        $password = $_POST['password'];
        $img = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "./img/".$img; 
        $sql = "INSERT INTO students(name,phone,email,img,password) VALUES ('$name','$phone','$email','$img','$password')"; 
        mysqli_query($db, $sql); 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Successfully Registered"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
      echo "<script> alert(".$msg."); </script>";      
    }
      ?>
      
      
    
    
  <!--login -->
  <div class="modal" id="studentlogin">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Student Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
         <div class="modal-body">
           <form action="./student/login.php" method="post">
                <div class="form-group">
                <label for="email">User ID</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
              </div>
                  <div class="form-group form-check" >
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- end stud login -->
  <!--admin login -->
  <div class="modal" id="adminlogin">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
         <div class="modal-body">
           <form action="./admin/login.php" method="post">
                <div class="form-group">
                <label for="email">User ID</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
              </div>
                  <div class="form-group form-check" >
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  <!-- end admin login -->
  
</div>

</body>
</html>
