<?php
session_start();
ob_start();
include('inc/connection.php');

$_SESSION['email'] = $_POST['username'];

$select_query = "SELECT * FROM `login`  WHERE username='".trim($_SESSION['email'])."' and `password`='".trim($_POST['password'])."'";
$result = $conn -> query($select_query);
$row = $result -> fetch_assoc();


    $level = (int)$row['level'];

    
   
    switch($level){
       
        case 1: echo "<script type='text/javascript'>window.top.location='zone.php';</script>"; 
        break;
        case 2:  echo "<script type='text/javascript'>window.top.location='commnew.php?ZCDR_CODE=".$row['ZONE_CODE']."';</script>"; 
        break;
        case 3: echo "<script type='text/javascript'>window.top.location='asst_commnew.php';</script>"; 
        break;
        case 4: echo "<script type='text/javascript'>window.top.location='rangenew.php';</script>"; 
        break;
        default: echo "<script type='text/javascript'>alert('Unauthorized Login'); window.location.href='index.php';</script>"; 
       
            
    }


?>