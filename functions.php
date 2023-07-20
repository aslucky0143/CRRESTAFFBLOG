<?php
function check_login($con)
{
	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "select * from bio_data where uniqueid = '$id' limit 1";
		$result = mysqli_query($con,$query);
		$con->error;
		
		if($result && mysqli_num_rows($result) > 0)
		{
			
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}