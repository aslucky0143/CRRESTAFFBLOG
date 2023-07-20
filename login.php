<?php 

session_start();

	include("connection.php");
	include("functions.php");
  if(!isset($_SESSION['user_id'])){
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['UID'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from bio_data where email = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
			
			if($result)
			{
        $err=$con->error;
				
				if($result&&mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['uniqueid'];
						header("Location: index.php");
						die;
					}
					else{
						echo '<script>alert("Enter Correct Credentials!!!");</script>';
					}//If password is wrong
					
				}
				else{
          echo '<script>alert("Incorrect Username!!!");</script>';
			}//if the  user is not registered
		}
			else{
				
			}	//if query fails
			
			
			
		}else
		{
			echo '<script>alert("Enter Login Credentials!!!")</script>';
		}
	}}else{
    echo '<script>window.location.href="index.php"</script>';
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRRE-Staff Blog- Login</title>
    <link rel="shortcut icon" href="CRR_Logo.ico" type="image/x-icon" />
    <style>
      body{
        
      background-image: url(assets/bg.jpg);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;

      }
      
      button {
        color: azure;
        background-color: rgb(53, 114, 226);
        padding: 1vh;
        padding-left: 3vh;
        padding-right: 4vh;
        border-radius: 1vh 1ch 1ch 1ch;
      }
      button:hover {
        color: rgb(9, 13, 245);
        background-color: rgb(255, 255, 255);
        padding: 1vh;
        padding-left: 3vh;
        padding-right: 4vh;
        border-radius: 1vh 1ch 1ch 1ch;
      }
      a {
        color: rgb(0, 4, 255);
        text-decoration: none;
      }
      a:visited {
        text-decoration: none;
      }
      body{
        color: aliceblue;
      }
    </style>
  </head>
  <body>
    <center style="margin: 6%">
      <div style="width: 18rem; background: transparent; ">
        <div>
          <h1 style="font-size:1.4cm;font-family: 'Times New Roman', Times, serif;">Login</h1>
          <script>
    function checker() {
        var result=confirm('Are you sure?');
        if(result==false){
            event.preventDefault();
        }
        
    }
</script>
          <form id="LoginForm" method="POST">
            <div>
              <img src="assets/CRR_Logo.png" alt="" height="310"/>
              <div style="margin-left: 2vh">
              <img src="icons/person_FILL0_wght400_GRAD0_opsz48.svg" alt="person" height="25px">
                <input
                  type="text"
                  placeholder="Email"
                  size="22vh"
                  height="20vh"
                  id="Username"
                  name="UID"
                  style="padding: 1vh"
                  required
                />
              </div>
            </div>
            <br />
            <div>
              <div style="margin-left: 2vh; margin-bottom: 2vh">
                <span><img src="icons/lock.svg" alt="" /></span>
                <input
                  type="password"
                  placeholder="Password"
                  size="20vh"
                  id="Password"
                  name="password"
                  style="padding: 1vh"
                  required
                />
              </div>
            </div>
            <div>
              <button type="submit" >Login</button>
            </div>
          </form>
          <div style="padding-top: 3vh">
            <a href="ForgetPassWord.html" id="Forget">Forget Password?</a>
          </div>
        </div>
      </div>
    </center>
  </body>
  <script src="myscript.js"></script>
</html>
