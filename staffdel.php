<?php
include("connection.php");
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$UID=$_GET['id'];
mysqli_query($con,"DELETE FROM `adminres` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `award` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `book` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `coutau` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `educinfo` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `membos` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `patents` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `projects` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `promemberships` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `publish` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `resgui` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `workexp` WHERE uniqueid='$UID'");
mysqli_query($con,"DELETE FROM `workshops` WHERE uniqueid='$UID'");
$a=mysqli_query($con,"DELETE FROM `bio_data` WHERE uniqueid='$UID'");
if($a){

    echo '<script>alert("Deleted SuccessFully");</script>';
    echo '<script>history.back()</script>';
}
