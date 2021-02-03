<?php 

$db = mysqli_connect("localhost", "root", "", "sambhav");
extract($_GET);
echo "<script>alert('".$_GET['testname']."')</script>";
$sql = "INSERT INTO questions(question,correct_option,option_1,option_2,option_3,test_name) VALUES ('$question','$correct_option','$option_1','$option_2','$option_3','$testname')"; 
echo "<p>".mysqli_query($db, $sql)."</p>";
echo "<script>alert('added Successfully')</script>";
?>




