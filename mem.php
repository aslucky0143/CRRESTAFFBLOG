<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_SESSION['user_id'];
$name=$_POST['name'];
$num=$_POST['num'];
$type=$_POST['type'];
$r=date("hisdmy");

$query="INSERT INTO `promemberships`(`id`, `uniqueid`, `name`, `number`, `type`)
                            VALUES ('$r','$UID','$name','$num','$type')";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo '<script>alert("Uploaded Successfully");</script>' ;
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo $con->error;
}