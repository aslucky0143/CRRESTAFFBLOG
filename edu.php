<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$Qname=$_POST['qualification'];
$Iname=$_POST['institute'];
$Uname=$_POST['university'];
$Sname=$_POST['specialization'];
$YOP  =$_POST['YOP'];
$DIV  =$_POST['DIV'];
$tmp= $_SESSION['user_id'];
$r=date("hisdmy");
$query="INSERT INTO `educinfo`(`ID`,`uniqueid`, `qualification`, `institute`, `university`, `specilization`, `yearofpass`, `divclass`) 
                        VALUES ('$r','$tmp','$Qname','$Iname','$Uname','$Sname','$YOP','$DIV')";
if(!mysqli_num_rows(mysqli_query($con,"select * from educinfo where qualification='$Qname' and specilization='$Sname' and uniqueid='$tmp'"))>0){

    $res=mysqli_query($con,$query);
    if($res){
        echo '<script>alert("Uploaded Sucessfully");';
        echo '</script>';
        echo '<script>window.location.href="index.php"</script>';
    }
    else{
        echo $con->error;
    }
}else{
    echo '<script>alert("Duplicate Record");';
        echo '</script>';
        echo '<script>window.location.href="index.php"</script>';
}
?>