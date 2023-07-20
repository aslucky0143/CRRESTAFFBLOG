<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
$uid=$_SESSION['USER_ID'];
$Author=$_POST['Author'];
$nop=$_POST['NOP'];
$nat=$_POST['nat'];
$vol=$_POST['vol'];
$issno=$_POST['issno'];
$pgno=$_POST['pgno'];
$r=date("hisdmy");
//files upload
$file=$_FILES['file']['name'];

echo $file;
$a=move_uploaded_file($_FILES['file']['tmp_name'],'profilepics/'.$file);
if($a){
    $query="INSERT INTO `publish`(`id`,`uniqueid`, `author`, `titleofpaper`, `nameofjournal`, `type`, `monthyear`, `issueno`, `file`) 
                            VALUES ('$r','$uid','$Author','$nop','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')";
}

