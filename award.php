<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}else{

    $UID=$_SESSION['user_id'];
    $r=date("hisdmy");
    $name=$_POST['name'];
    $by=$_POST['by'];
    $contri=$_POST['con'];
    $DR=$_POST['dateR'];
    
    $query="INSERT INTO `award`(`id`,`uniqueid`, `name`, `by`, `con`, `DR`) 
                        VALUES ('$r','$UID','$name','$by','$contri','$DR')";
    $query_exe=mysqli_query($con,$query);
    if($query_exe){
        echo '<script>alert("Uploaded Successfully");</script>' ;
        echo "<script>window.location.href='index.php'</script>";
    }else{
        echo $con->error;
    }
}