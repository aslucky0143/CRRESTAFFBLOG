<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_SESSION['user_id'];
$name=$_POST['title'];
$sponname=$_POST['sponby'];
$amt=$_POST['amt'];
$period=$_POST['period'];
$onco=$_POST['onco'];
$r=date("hisdmy");
$query="INSERT INTO `projects`(`id`,`uniqueid`, `title`,`Sponname`, `amt`, `period`, `onco`, `type`)
                         VALUES ('$r','$UID','$name','$sponname','$amt','$period','$onco','Sponsored')";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo '<script>alert("Uploaded Successfully");</script>' ;
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo $con->error;
}