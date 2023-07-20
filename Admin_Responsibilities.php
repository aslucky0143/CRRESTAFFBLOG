<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}else{

    $r=date("hisdmy");
    $desc=$_POST['descr'];
    $UID=$_SESSION['user_id'];
    $level=$_POST['level'];
    $query="INSERT INTO `adminres`(`ID`, `uniqueid`, `description`, `coldept`)
                           VALUES ('$r','$UID','$desc','$level')";
    $res=mysqli_query($con,$query);
    if($res){
        echo '<script>alert("Uploaded Sucessfully");';
        echo '</script>';
        echo '<script>window.location.href="index.php";';
        echo '</script>';
    }
    else{
        echo $con->error;
    }
}

