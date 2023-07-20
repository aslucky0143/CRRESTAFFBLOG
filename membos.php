<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_SESSION['user_id'];
$name=$_POST['name'];
$period=$_POST['period'];
$type=$_POST['type'];
$r=date("hisdmy");
$query="INSERT INTO `membos`(`id`,`uniqueid`, `name`, `type`, `period`)
                     VALUES ('$r','$UID','$name','$type','$period')";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo '<script>alert("Uploaded Successfully");</script>' ;
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo $con->error;
}