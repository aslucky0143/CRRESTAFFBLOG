<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$r=date("hisdmy");
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
$UID=$_SESSION['user_id'];
$auth  =$_POST['authname'];
$title =$_POST['title'];
$name  =$_POST['jouname'];
$nation=$_POST['nation'];
$year  =$_POST['mon'];
$pg    =$_POST['pgno'];
$file=$r.$_FILES['file']['name'];
$a=move_uploaded_file($_FILES['file']['tmp_name'],'PubFiles/'.$file);
$query="INSERT INTO `publish`(`id`, `uniqueid`, `author`, `titleofpaper`, `nameofjournal`,`nation`, `type`, `monthyear`, `issueno`, `file`) 
                     VALUES ('$r','$UID','$auth','$title','$name','$nation','Conference','$year','$pg','$file')";
$query_exe=mysqli_query($con,$query);
echo $con->error;
if($query_exe){
	echo '<script>alert("Uploaded Sucessfully");';
    echo '</script>';
    echo '<script>window.location.href="index.php";';
    echo '</script>';
}
}