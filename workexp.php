<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_SESSION['user_id'];
$name=$_POST['NOO'];
$des =$_POST['des'];
$df  =$_POST['DF'];
$dt  =$_POST['DT'];
$r=date("hisdmy");

$query="INSERT INTO `workexp`(`id`,`uniqueid`, `nameoforg`, `designation`, `datefrom`, `dateto`) 
                        VALUES ('$r','$UID','$name','$des','$df','$dt')";
if(!mysqli_num_rows(mysqli_query($con,"select * from workexp where nameoforg='$name' and designation='$des' and uniqueid='$UID'"))>0){
    $query_exe=mysqli_query($con,$query);

    if($query_exe){
        echo "<script>alert('Uploaded Successfully!!')</script>";
        echo "<script>window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('Error Occurred!! Check Data Entered');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}else{
    echo "<script>alert('Duplicate data entered');</script>";
        echo "<script>window.location.href='index.php';</script>";
}