<?php
session_start();
include("connection.php");
if(isset($_SESSION['user_id'])){
    $UID=$_SESSION['user_id'];
    $query = "select * from bio_data where uniqueid = '$UID' limit 1";
		$result = mysqli_query($con,$query);
		$con->error;
		
		if($result && mysqli_num_rows($result) > 0)
		{
			
			$row = mysqli_fetch_assoc($result);
		}
        $id=$row['ID'];
        $name=$row["name"];
	$des=$row["designation"];
	$doj=$row["doj"];
	$noe=$row["noe"];
	$dob=$row["dob"];
	$email=$row["email"];
	$number=$row["phone"];
    $password=$row['password'];
	$address=$row["address"];
	$dept=$row["department"];
	$fname=$row["fname"];
	$mname=$row["mname"];
	$gender=$row["Gender"];
	$marital=$row["Marital"];
	$Religion=$row["Religion"];
	$nation=$row["Nationality"];
    $profile=$row["profile_pic"];
    $sign=$row["signpic"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CRR_Logo.ico" type="image/x-icon">
    <title>Update</title>
    <style>
        *{
      background-color: aliceblue;
    }
    .form-control{
      margin-bottom: 5px;
      border: none;
    }
    select{
      padding: 10px;
      border-radius: 10px;
    }
    input{
      padding: 10px;
    border-radius: 10px;
    border: 1px  solid;
    height: 20px;
    width: 160px;
}
button{
    padding: 10px;
    border-radius: 10px;
    border: 1px  solid;
    height: 50px;
    width: 160px;
}
td,th{
    margin-right: 10px;
}

    </style>
</head>
<body>
    <div class="header">
        <img src="assets/CRR_Logo_Black.png" height="90" width="290" alt=""><hr>
      </div>
      <div class="head">
        <center>
            <h3>Update Bio Data Form</h3>
            <h4>
                Check Data Before Uploading
            </h4>
        </center>

      </div>
      <form method="POST" action="editphp.php" enctype="multipart/form-data">
          <center>
              <table>
                  <tr>
                      <td>
                          Name
                      </td>
                      <td>
                          Unique ID
                      </td>
                  </tr>
              <tr>
                   <td>
                       <input required type="text" name="name" id="name" placeholder="Name Of the Employee" value="<?php echo $name?>" style="margin-right: 2px;" >
                    </td>
                    <td>
                        <input required type="text" name="UID" id="UID" placeholder="Unique ID" value="<?php echo $id?>">
                    </td>
                
              </tr>
              <tr>
                      <td>
                          Email
                      </td>
                      <td>
                          Phone Number
                      </td>
                  </tr>
              <tr>
                 <td><input required type="email" value="<?php echo $email?>" name="email" id="email" placeholder="Email"  style="margin-right: 2px;"></td>                    
                  <td><input required type="tel" value="<?php echo $number?>" id="phone" name="phone" maxlength="10" placeholder="Mobile Number"></td>
                
            </tr>
            <tr>
                <td>
                    Gender
                </td>
            </tr>
            <tr>
                <td>
                    <select name="gender">
                        <option <?=$gender == 'Male'   ? ' selected="selected"' : '';?> value="Male">Male</option>
                        <option <?=$gender == 'Female' ? ' selected="selected"' : '';?> value="Female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="branch">Select Branch</label>
                </td>
                <td>
                    <label>Designation</label>
                </td>
            </tr>
            <tr>
                
                 <td>
                     <input type="text" name="branch" value="<?php echo $dept?>" readonly>
                </td>                    
                  <td>
                      <input type="text" name="designation" id="des" value=<?php echo $des?> readonly>
                  </td>
                
            </tr>
            <tr>
                <td>
                    <label for="branch">Date Of Birth</label>
                </td>
                <td>
                    <label for="NOE">Nature Of Employement</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input required type="date" name="DOB" id="name" value="<?php echo $dob?>" min="1987-01-01">
                </td>
                <td>
                    <select name="NOE" id="NOE">
                        <option <?=$noe == 'Full Time' ? ' selected="selected"' : '';?> value="Full Time">Full Time</option>
                        <option <?=$noe == 'Part Time' ? ' selected="selected"' : '';?> value="Part Time">Part Time</option>
                      </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="marital">Marital Status</label>
                </td>
                <td>
                    <label for="DOB">Data Of Joining</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="marital" id="marital">
                        <option <?=$marital == 'Married' ? ' selected="selected"' : '';?> value="Married">Married</option>
                        <option <?=$marital == 'Single' ? ' selected="selected"' : '';?>  value="Single">Single</option>
                      </select>
                </td>
                <td>
                    <input type="date" name="DOJ" value="<?php echo $doj?>" id="DOB" required>
                </td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>Nationality</td>
            </tr>
            <tr>
                <td>
                    <input required type="text" value="<?php echo $Religion?>" name="religion" id="religion" placeholder="Religion">
                </td>
                <td>
                    <select name="nation" id="nation">
                        <option value="Indian">Indian</option>
                        <option value="NRI">NRI</option>
                      </select>
                </td>
            </tr>
            <tr>
                <td>
                    Father's Name
</td>
                <td>
                    Mother's Name
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="fname" id="fname" value="<?php echo $fname?>" placeholder="Father's Name">
                </td>
                <td>
                    <input type="text" name="mname" id="mname" value="<?php echo $mname?>" placeholder="Mother's Name">
                </td>
            </tr> 
            <tr>
                
                <td>
                    Password
                </td>
                <td>
                    <label for="Address">Address Complete</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" value="<?php echo $password?>" id="password" placeholder="Password" required>
                </td>
                <td>
                    <input type="text" name="address" id="address"  value="<?php echo $address?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    Profile Pic
                </td>
            
                <td>
                    Signature
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="profilepic" id="profilepic" accept=".jpg,.png,.jpeg">
                </td>
                <td>
                    <input type="file" name="signpic" id="signpic" accept=".jpg,.png,.jpeg">
                </td>
            </tr>
            </table><br>
            <button value="upload" type="submit">Submit</button>
          </center>
      </form>
</body>
</html>