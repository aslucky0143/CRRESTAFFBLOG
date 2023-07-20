<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_SESSION['user_id'];
$name=$_POST['title'];
$appnum=$_POST['appno'];
$date=$_POST['year'];
$type=$_POST['type'];
$r=date("hisdmy");
$query="INSERT INTO `patents`(`id`,`uniqueid`, `title`, `appnumber`, `date`, `type`)
                     VALUES ('$r','$UID','$name','$appnum','$date','$type')";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo '<script>alert("Uploaded Successfully");</script>' ;
    echo "<script>window.location.href='index.php'</script>";
}else{
    echo $con->error;
}