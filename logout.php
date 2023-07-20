<?php

session_start();

if(isset($_SESSION['user_id']))
{
	
	unset($_SESSION['user_id']);

}

sleep(2);

echo '<script>alert("Logged Out Sucessfully");';
echo '</script>';
echo '<script>window.location.href="index.php";';
echo '</script>';
die;