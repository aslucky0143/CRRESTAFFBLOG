<?php
session_start();
include('connection.php');

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$r=date("hisdmy");
$ong1=$_POST['ong'];
$comp1=$_POST['comp'];
$ong2=$_POST['pong'];
$comp2=$_POST['pcomp'];
$UID=$_SESSION['user_id'];
ECHO $UID;
if(mysqli_num_rows(mysqli_query($con,"select * from resgui where uniqueid='$UID'"))==0){
    $query="INSERT INTO `resgui`(`id`, `uniqueid`, `mong`, `mcomp`, `pong`, `pcom`) 
                        VALUES ('$r','$UID','$ong1','$comp1','$ong2','$comp2')";
}else {
    # code...
    $query="UPDATE `resgui` SET `id`='$r',`uniqueid`='$UID',`mong`='$ong1',`mcomp`='$comp1',`pong`='$ong2',`pcom`='$comp2' WHERE uniqueid='$UID'";
}
$query_exe=mysqli_query($con,$query);
echo $con->error;
if($query_exe){
    echo '<script>alert("Updated Successfully")</script>';
    echo '<script>window.location.href="index.php"</script>';
}