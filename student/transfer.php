<?php
include 'session.php';
include '../databaseconnect.php';
extract($_GET);
$ses_sql = mysqli_query($db,"select * from test where testname = '".$test_selected."'");
$array = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);         
$test_type = $array['test_type'];
$newURL = "./system_check.php?test_type=".$test_selected;
if(strcmp($test_type,"online"))
    header('Location: '.$newURL);   
else
    header('Location: offline_test.html');



?>
