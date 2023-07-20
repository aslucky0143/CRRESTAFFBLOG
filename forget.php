<?php
    session_start();
    include('connection.php');
    $UID=$_POST['UID'];
    $dob=$_POST['DOB'];
    $query="select * from bio_data where ID='$UID' AND dob='$dob'";
    $query_exe=mysqli_query($con,$query);
    echo $con->error;
    $row=mysqli_fetch_assoc($query_exe);
    $pass=$row['password'];
    if($query_exe&&mysqli_num_rows($query_exe)){
        ECHO "HI";
        echo "<script>window.location.href='index.php';";
        echo "alert('Your Password Is $pass')";
        echo "</script>";    
    }
    else{
        echo "<script>window.location.href='ForgetPassword.html';";
        echo "alert('Wrong Credentials')";
        echo "</script>";    
    }