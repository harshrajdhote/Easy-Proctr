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
<body>
<?php  include 'header.html' ?>

<div class="container"> 
     <? include 'databaseconnect.php'; ?>
    
     <h2></h2>
     <div class="row">
            <form class="col s12" method="post">
            <div class="row">
                <div class="input-field col s12">
                <input placeholder="Placeholder" id="test_name" type="text" class="validate" name="test_name">
                <label for="first_name">Test Name</label>
                </div>
            
            </div>

            <div class="row">
                <div class="s12">
                <label for="group1">&nbsp;&nbsp;Test Type</label>
                            <label>
                                <input name="test_type" type="radio" checked value="online" />
                                <span>Online</span>
                            </label>
                           
                            <label>
                                <input name="test_type" type="radio" value="offline"/>
                                <span>Offline</span>
                            </label>
                            
                </div>
            </div> 
            
            <!-- question 1 -->
            <div class="row">
                <div class="input-field col s12">
                <input placeholder="Placeholder" id="question" type="text" class="validate" name = "question">
                <label for="question">Question 1</label>
                </div>
            
            </div>
            <!-- options question 1 -->
            <div class="row">
                <div class="input-field col s12">
                <input placeholder="Placeholder" id="correct_option" type="text" class="validate" name="correct_option">
                <label for="correct_option">Correct Option</label>
                </div>
            
            </div>
            <div class="row">
            <div class="input-field col s12">
                <input placeholder="Placeholder" id="option_1" type="text" class="validate" name="option_1">
                <label for="option_1">Option 1</label>
                </div>
            
            </div>
            <div class="row">
            <div class="input-field col s12">
                <input placeholder="Placeholder" id="option_2" type="text" class="validate" name="option_2">
                <label for="option_2">Option 2</label>
                </div>
            
            </div>
            <div class="row">
            <div class="input-field col s10">
                <input placeholder="Placeholder" id="option_3" type="text" class="validate" name="option_3">
                <label for="option_3">Option 3</label>
                </div>
                <div class="input-field col s2">
            <button class="btn waves-effect light-green" id="addQuestion">Add</button>
            </div> 

            <!-- End Question 1 -->

            <div class="row">
            
            <div class="input-field col s6">
            <button class="btn waves-effect light-green" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
            </div>
            </div>































            
            
        </form>



        <?php
         if(isset($_POST['action']))
         {
             extract($_POST);
             $sql = "INSERT INTO test(test_name,start_time,end_time,test_type) VALUES ('$test_name','','','$test_type')"; 
             echo "<p>".mysqli_query($db, $sql)."</p>";
         }





        ?>
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