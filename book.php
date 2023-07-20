<?php
session_start();
include('connection.php');
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}else{
    $r=date("hisdmy");
    $auth=$_POST['authname'];
    $title=$_POST['title'];
    $pub=$_POST['pub'];
    $isbn=$_POST['isbn'];
    $year=$_POST['year'];
    $file=$r.$_FILES['file']['name'];
    $a=move_uploaded_file($_FILES['file']['tmp_name'],'PubFiles/'.$file);
    $UID=$_SESSION['user_id'];
    $query="INSERT INTO `book`(`id`, `uniqueid`, `authname`, `title`, `publisher`, `isbn`, `year`, `file`) 
                        VALUES ('$r','$UID','$auth','$title','$pub','$isbn','$year','$file')";
    $res=mysqli_query($con,$query);
    if($res && $a){
        echo '<script>alert("Uploaded Sucessfully");';
        echo '</script>';
        echo '<script>window.location.href="index.php";</script>';
    }
    else{
        echo $con->error;
    }
}

