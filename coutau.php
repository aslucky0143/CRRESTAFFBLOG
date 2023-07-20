<?php
session_start();
include('connection.php');
$UID=$_SESSION['user_id'];
$subname=$_POST['OrgName'];
$ugpg=$_POST['des'];
$r=date("hisdmy");
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
//$exp=date_diff(date_create($df), date_create($dt));
if(!is_numeric($subname)){
    $query="INSERT INTO `coutau`(`id`,`uniqueid`, `subname`, `ugpg`) 
                        VALUES ('$r','$UID','$subname','$ugpg')";
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
else{
    echo '<script>alert("Enter Proper Data");';
    echo '</script>';
    echo '<script>history.back();';
    echo '</script>';
}

?>