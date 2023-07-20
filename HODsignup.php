<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CRR_Logo.ico" type="image/x-icon">
    
    <title>Registration</title>
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
td{
    padding-right: 70px;
    padding-bottom: 10px;
}

    </style>
</head>
<body>
    <div class="header">
        <img src="assets/CRR_Logo_Black.png" height="90" width="290" alt=""><hr>
    </div>
    <div class="head">
        <center>
            <h3>Registration Form</h3>
            <h5></h5>
        </center>
        
    </div>
    <form method="POST" action="act.php" enctype="multipart/form-data">
          <?php $dept='CSE' ?>
          <center>
            <table>
                <tr>
                    <td>
                        Name Of the Employee
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
                      Phone Number
                  </td>
              </tr>
              <tr>
                <div class="form-control">
                 <td><input required type="email" name="email" id="email" placeholder="Email"  style="margin-right: 2px;"></td>                    
                  <td><input required type="Phone" id="phone" name="phone" maxlength="10" placeholder="Mobile Number"></td>
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
                <td>
                    <label for="branch">Select Branch</label>
                </td>
                <td>
                    <label for="designation">
                        Select Designation
                    </label>
                </td>
            </tr>
            <tr>
                <div class="form-control">
                 <td>
                     
                            <input name="branch" value=<?php echo $dept?>  readonly>
                     
                </td>                    
                <td>
                      <select name='designation' id='designation'>
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
          <h5>** Unique Id Is Permenent Check twice before Submitting</h5>
          <button type="submit">Submit</button>
          </div>
          </center>
      </form>
</body>
</html>