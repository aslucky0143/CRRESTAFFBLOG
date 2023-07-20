<?php 
session_start();

	include("connection.php");
	include("functions.php");
    date_default_timezone_set("Asia/Kolkata");
    $r=date("hisdmy");
    if(isset($_SESSION['user_id'])){

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $name=$_POST["name"];
            $des=$_POST["designation"];
            $dept=$_POST["branch"];
            $doj=$_POST['DOJ'];
            $noe=$_POST["NOE"];
            $dob=$_POST["DOB"];
            $UID=$_POST["UID"];
            $email=$_POST["email"];
            $number=$_POST["phone"];
            $address=$_POST["address"];
            $password=  $_POST["password"];
            $fname=     $_POST["fname"];
            $mname=     $_POST["mname"];
            $gender=    $_POST["gender"];
            $marital=   $_POST["marital"];
            $Religion=  $_POST["religion"];
            $nation=    $_POST["nation"];
            $profilepic=$r.$_FILES['profilepic']['name'];
            move_uploaded_file($_FILES['profilepic']['tmp_name'],'profilepics/'.$profilepic);
            $signpic=   $r.$_FILES['signpic']['name'];
            
            move_uploaded_file($_FILES['signpic']['tmp_name'],'signatures/'.$signpic);
            
                if(mysqli_num_rows(mysqli_query($con,"select * from bio_data where email='$email'"))==0){
                    if(mysqli_num_rows(mysqli_query($con,"select * from bio_data where phone='$number'"))==0){
                        if(mysqli_num_rows(mysqli_query($con,"select * from bio_data where department='$dept' and designation='HOD' "))==0){
                            $query = "INSERT INTO `bio_data`(`uniqueid`,`name`, `designation`, `department`, `doj`,  `noe`, `dob`,  `ID`,      `email`, `phone`,   `address`, `password`, `fname`, `mname`, `Gender`, `Marital`, `Religion`,`Nationality`,`profile_pic`,`signpic`) 
                                                    VALUES ('$r',       '$name', '$des',        '$dept',     '$doj', '$noe','$dob', '$UID',    '$email', '$number','$address','$password','$fname','$mname','$gender','$marital','$Religion','$nation',  '$profilepic','$signpic')";
                            $res=mysqli_query($con, $query);
                            echo $con->error;
                            if($res){
                
                               echo "<script>alert('User Created Successfully')</script>";
                               echo $con->error;
                               echo "<script>window.location.href='INDEX.php'</script>";                    
                                
                            }else{                        
                                echo "<script>alert('Unknown Error Occured!!!')</script>";
                                echo "<script>window.location.back()</script>";
                            }
                    }else{
                        echo "<script>alert('HOD Profile Existed!!!')</script>";
                        echo "<script>window.location.back()</script>";                        
                    }
                }else
                    {
                        echo "<script>alert('Existing Mobile Number')</script>";
                        echo "<script>window.location.back()</script>";
                    }
                }else
                {
                    echo "<script>alert('Existing Email ')</script>";
                    echo "<script>window.location.back()</script>";
                }
                //save to database
            }
            
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CRR_Logo.ico" type="image/x-icon">
    <title>Registration</title>
    <style>
        button:hover {
            background-color: rgb(31, 87, 207);
            color: aliceblue;
        }
        td{
            padding-right: 70px;
            padding-bottom: 10px;
        }
        *{
            font-family:'Times New Roman', Times, serif;
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

    </style>
</head>
<body>
    <div class="header">
        <img src="assets/CRR_Logo_Black.png" height="90" width="290" alt=""><hr>
      <div class="head">
        <center>
            <h3>Registration Form</h3>
            <h5></h5>
        </center>

      </div>
      <form method="POST" enctype="multipart/form-data">
          <center>
              <table>
                  <tr>
                      <td>
                          Name Of The Employee
                      </td>
                      <td>
                          Unique ID
                      </td>
                  </tr>
              <tr>
                  <div class="form-control">
                   <td><input required type="text" name="name" id="name" placeholder="Name Of the Employee" style="margin-right: 2px;"></td>
                    <td><input required type="text" name="UID" id="UID" placeholder="Unique ID"></td>
                </div>
              </tr>
              <tr>
                  <td>
                      Email
                  </td>
                  <td>
                      Mobile Number
                  </td>
              </tr>
              <tr>
                <div class="form-control">
                 <td><input required type="email" name="email" id="email" placeholder="Email"  style="margin-right: 2px;"></td>                    
                  <td><input required type="number" id="phone" name="phone" maxlength="10" placeholder="Mobile Number"></td>
                </div>
            </tr>
            <tr>
                <td>
                    Gender
                </td>
            </tr>
            <tr>
                <td>
                    <select name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="branch">Select Branch</label></td>
                <td><label for="designation">Designation</label></td>
            </tr>
            <tr>
                <div class="form-control">
                 <td>
                     <select name='branch' id='branch'>
                        <option value='CSE'>Computer Science and Engineering</option>
                        <option value='IT'>Information Technology</option>
                        <option value='EEE'>Electrical and Electronics Engineering</option>
                        <option value='ECE'>Electronics and Communication Engineering</option>
                        <option value='MECH'>Mechanical Engineering</option>
                        <option value='CIV'>Civil Engineering</option>
                        <option value='AIDS'>Artificial Innumberigence and Data Science</option>
                     </select>
                </td>                    
                <td>
                      <select name='designation' id='designation'>
                          <option value='HOD'>Head Of The Department</option>
                          <option value="Assistant Professor">Assistant Professor</option>
                          <option value="Associate Professor">Associate Professor</option>
                          <option value="Professor">Professor</option>
                      </select>
                  </td>
                </div>
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
                    <input required type="date" name="DOB" id="DOB" min="1987-01-01">
                </td>
                <td>
                    <select name="NOE" id="NOE">
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
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
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                      </select>
                </td>
                <td>
                    <input type="date" name="DOJ" id="DOJ" required>
                </td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>Nationality</td>
            </tr>
            <tr>
                <td>
                    <input required type="text" name="religion" id="religion" placeholder="Religion">
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
                    <label for="fname">
                        Father's Name
                    </label>
                </td>
                <td>
                    <label for="mname">
                        Mother's Name
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="fname" id="fname" placeholder="Father's Name">
                </td>
                <td>
                    <input type="text" name="mname" id="mname" placeholder="Mother's Name">
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
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </td>
                <td>
                    <input type="text" name="address" id="address" required>
                </td>
            </tr>
            <tr>
                <td>
                    Profile Picture
                </td>
                <td>
                    Signature Picture
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

            
                
            
          </table>
          <div style="margin-top: 50px;"> 
                <button type="submit" >Submit</button>
          </div>
          </center>
      </form>
</body>
</html>