<?php
session_start();
include ('connection.php');
if(isset($_SESSION['user_id'])){

    $id=$_GET['rn'];
    echo $id;
    $query="DELETE FROM `adminres` WHERE ID='$id'";
    $query_exe=mysqli_query($con,$query);
    if($query_exe){
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
}
else{
    header("Location:index.php");
}
?>