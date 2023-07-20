<?php
session_start();
include ('connection.php');
$id=$_GET['rn'];
echo $id;
$query="DELETE FROM `workshops` WHERE ID='$id'";
$query_exe=mysqli_query($con,$query);
if($query_exe){
    echo $con->error;
   echo '<script>alert("Record Deleted Sucessfully");';
   echo '</script>';
   echo '<script>window.location.href="index.php";';
   echo '</script>';
}
else{
    echo '<script>alert("Record Delete Unsucessfully");';
    echo '</script>';
    echo '<script>window.location.href="index.php";';
    echo '</script>';
}
?>