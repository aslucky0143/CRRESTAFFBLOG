<?php 
session_start();

	include("connection.php");
	include("functions.php");
    date_default_timezone_set("Asia/Kolkata");
    $r=date("hisdmy");
	$row=check_login($con);
	
	if (isset($_SESSION['user_id'])) {
		# code...
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$ID=  		$_POST['UID'];
			$name=		$_POST["name"];
			$des= 		$_POST["designation"];
			$dept=		$_POST["branch"];
			$doj=		$_POST["DOJ"];
			$noe=		$_POST["NOE"];
			$dob=		$_POST["DOB"];
			$UID=		$_SESSION['user_id'];
			$email=		$_POST["email"];
			$number=	$_POST["phone"];
			$address=	$_POST["address"];
			$password=  $_POST["password"];
			$fname=     $_POST["fname"];
			$mname=     $_POST["mname"];
			$gender=    $_POST["gender"];
			$marital=   $_POST["marital"];
			$Religion=  $_POST["religion"];
			$nation=    $_POST["nation"];
			$query = "UPDATE `bio_data` SET `ID`='$ID',`name`='$name',`designation`='$des',
												`department`='$dept',`doj`='$doj',`noe`='$noe',
												`dob`='$dob',`email`='$email',
												`phone`='$number',`address`='$address',`password`='$password',
												`fname`='$fname',`mname`='$mname',`Gender`='$gender',
												`Marital`='$marital',`Religion`='$Religion',`Nationality`='$nation'";
			if(!empty($_FILES['profilepic']['name'])&&!empty($_FILES['signpic']['name'])){
				$profile=$r.$_FILES['profilepic']['name'];
				move_uploaded_file($_FILES['profilepic']['tmp_name'],'profilepics/'.$profile);
				$sign=$r.$_FILES['signpic']['name'];
				move_uploaded_file($_FILES['signpic']['tmp_name'],'signatures/'.$sign);
				$query=$query.",`profile_pic`='$profile',`signpic`='$sign'";
			}elseif (!empty($_FILES['profilepic']['name'])) {
				$profile=$r.$_FILES['profilepic']['name'];
				move_uploaded_file($_FILES['profilepic']['tmp_name'],'profilepics/'.$profile);
				$query=$query.",`profile_pic`='$profile'";
			}elseif (!empty($_FILES['signpic']['name'])) {
				$sign=$r.$_FILES['signpic']['name'];
				move_uploaded_file($_FILES['signpic']['tmp_name'],'signatures/'.$sign);
				$query=$query.",`signpic`='$sign'";
			}
			else{
				$profile=$row['profile_pic'];
				$sign=$row['signpic'];
			}
			$query=$query." where uniqueid='$UID'";
                    
						$res=mysqli_query($con, $query);
						echo $con->error;
                        if($res){
            
                           echo "<script>alert('Uploaded  Successfully')</script>";
                           echo "<script>window.location.href='INDEX.php'</script>";                    
                            
                        }else{                        
                            echo "<script>alert('Unknown Error Occured!!!')</script>";
                            echo "<script>window.location.href='edit.php'</script>";
						}

	}}
?>