<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$r=date("hisdmy");
$UID=$_SESSION['user_id'];
$name=$_POST['nameofworkshop'];
$place=$_POST['place'];
$DF=$_POST['DF'];
$DT=$_POST['DT'];
$query="INSERT INTO `workshops`(`id`,`uniqueid`, `name`, `place`, `datefrom`, `dateto`, `type`) 
                        VALUES ('$r','$UID','$name','$place','$DF','$DT','Organized')";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo '<script>alert("Uploaded Successfully");</script>' ;
}else{
    echo $con->error;
}
echo "<script>window.location.href='index.php'</script>";