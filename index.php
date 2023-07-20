<?php
session_start();
include("connection.php");
include("functions.php");
$row = check_login($con);
$UID = $row["ID"];
$name = $row["name"];
$des = $row["designation"];
$doj = $row["doj"];
$noe = $row["noe"];
$dob = $row["dob"];
$email = $row["email"];
$number = $row["phone"];
$address = $row["address"];
$dept = $row["department"];
$fname = $row["fname"];
$mname = $row["mname"];
$gender = $row["Gender"];
$marital = $row["Marital"];
$Religion = $row["Religion"];
$nation = $row["Nationality"];
$profile = $row["profile_pic"];
$sign = $row["signpic"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel='shortcut icon' href='CRR_Logo.ico' type='image/x-icon'>
    <title>Profile</title>
    <style>
        .info {
            margin: 10%;
            border-radius: 50%;
        }

        .action a {
            color: rgb(115, 115, 115);
            font-weight: 400;
            font-size: larger;
            text-decoration: none;
            margin-left: 1ch;

        }

        .action a:hover {
            color: white;
            font-weight: 400;
            font-size: larger;
            background-color: rgb(137, 100, 221);
            padding: 1vh;
            text-decoration: none;
            margin-left: 1ch;
            border: rgb(242, 242, 242) transparent;
        }

        .action {
            margin-top: 3ch;
        }
    </style>
</head>

<body onload="document.body.style.zoom = '80%'">
    <nav class="navbar sticky-top" style="background:linear-gradient(45deg,rgb(79, 23, 207),rgb(79, 23, 207),rgb(248, 248, 248),rgb(108, 23, 206));">
        <div class="container-fluid">
            <img src="assets/CRR_Logo_White.png" alt="Click to Top" width="830" height="260" onclick="window.location.href='#'">
        </div>
    </nav>
    <!-- Bio-data-->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="position-relative">
                <h1 class="ms-5 mt-5 flex"><?php echo $name; ?></h1>
                <h5 style="font-weight: 100;" class="ms-5">| <?php echo $des; ?>, <?php echo $dept; ?></h5>
                <div class="position-absolute top-0 end-0 me-5" style="margin-right: 4px;"><br>
                    <img src="profilepics/<?php echo $profile ?>" alt="" width="220" height="220"><br>
                    <hr>
                    <img src="signatures/<?php echo $sign ?>" alt="" width="220" height="50"><br>
                    <div class="action">
                        <a href="logout.php"> Logout</a>

                        <?php if (strtoupper($des) == "HOD") {
                            echo "
                                  <a href='prinedit.php'> Edit</a>
                                  <a href='HODsignup.php?des=$dept'> Add New Staff</a><br>
                                  <a href='staffreport.php?des=$dept'> Staff Wise report</a><br>
                                  <a href='staff.php?des=$dept'> Staff Control Panel</a>
                                  ";
                        } elseif (strtoupper($des) == "PRINCIPAL") {

                            echo "<a href='prinsignup.php?des=$des'> Add New Staff</a><br>
                                     <a href='prinedit.php'> Edit</a>
                                     <a href='prinreport.php?des=$dept'> Department Wise report</a><br>
                                     <a href='princonpanel.php?des=$dept'> Staff Control Panel</a>";
                        } else {
                            echo "<a href='edit.php'> Edit</a>";
                        }
                        ?>
                        <a href="report.php">Personal Report</a>
                    </div>
                </div>
                <div class="m-5">
                    Unique ID : <?php echo $UID; ?> <br>
                    Date Of Birth: <?php echo $dob; ?> <br>
                    Nature Of Employment : <?php echo $noe; ?> <br>
                    Date Of Joining : <?php echo $doj; ?> <br>
                    Email : <?php echo $email; ?> <br>
                    Phone : <?php echo $number; ?> <br>
                    <b>Address Of Communication :</b><br> <?php $str = $address;
                                                            $len = strlen($str);
                                                            for ($i = 0; $i < $len; ++$i) {
                                                                echo $str[$i];
                                                                if ($str[$i] == ',') {
                                                                    echo '<br>';
                                                                }
                                                            }

                                                            ?><br>



                    <h3 class="mt-5"> | Family Details</h3>
                    Father Name : <?php echo $fname; ?> <br>
                    Mother Name : <?php echo $mname; ?> <br>
                    Gender : <?php echo $gender; ?> <br>
                    Marital Status : <?php echo $marital; ?> <br>
                    Religion : <?php echo $Religion; ?> <br>
                    Nationality : <?php echo $nation; ?> <br>

                </div>

            </div>
        </div>
    </div>
    <!-- Educational Qualifications-->
    <form action="edu.php" method="post">
        <div class="info">
            <h2>| Educational Qualification</h2>
            <table style="border: 1px solid;">
                <tr>
                    <th>Qualification</th>
                    <th>Institute</th>
                    <th>University/Board</th>
                    <th>Specialization</th>
                    <th>Year Of Passing</th>
                    <th>Division/Class</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from educinfo where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['qualification'] . "</td>
            <td>" . $row['institute'] . "</td>
            <td>" . $row['university'] . "</td>
            <td>" . $row['specilization'] . "</td>
            <td>" . $row['yearofpass'] . "</td>
            <td>" . $row['divclass'] . "</td>
            <td><a href='edudel.php?rn=$id' onclick='checker()'>Delete</a></td>
        </tr>";
                    }
                }
                ?>
                <tr>
                    <td><input required type="text" name="qualification" id="qualification"></td>
                    <td><input required type="text" name="institute" id="institute"></td>
                    <td><input required type="text" name="university" id="university"></td>
                    <td><input required type="text" name="specialization" id="specialization"></td>
                    <td><input required type="number" accept="" name="YOP" min="1900" max="2099" maxlength="4" /></td>
                    <td><input required type="text" name="DIV" id="DIV"></td>
                    <td><button type="submit">Add</button></td>
                </tr>

            </table>


        </div>
    </form>
    <!-- Work Experience-->
    <form action="workexp.php" method="post">
        <div class="info">

            <h2>| Work Experience</h2>
            <table style="border: 1px solid;">
                <tr>
                    <th>Name Of the Organization</th>
                    <th>Designation</th>
                    <th>Date From</th>
                    <th>Date To</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from workexp where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['nameoforg'] . "</td>
            <td>" . $row['designation'] . "</td>
            <td>" . $row['datefrom'] . "</td>
            
            <td>" . $row['dateto'] . "</td>
           <td><a href='workexpdel.php?rn=$id' onclick='checker()'>Delete</a></td>
        </tr>";
                    }
                }

                ?>

                <tr>
                    <td><input required type="text" name="NOO" id="NOO"></td>
                    <td><input required type="text" name="des" id="des"></td>
                    <td><input required type="date" name="DF" id="DF"></td>
                    <td><input required type="date" name="DT" id="DT"></td>
                    <td><button type="submit">Add</button></td>
                </tr>

            </table>


        </div>
    </form>
    <!-- Course Taught-->
    <form action="coutau.php" method="post">
        <div class="info">
            <h2>| Courses taught</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Subject Name</th>
                    <th>UG/PG</th>

                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from coutau where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['subname'] . "</td>
            <td>" . $row['ugpg'] . "</td>
            <td><a href='coutaudel.php?rn=$id' onclick='checker()'>Delete</a></td>
        </tr>";
                    }
                }

                ?>
                <tr>
                    <td><input required type="text" name="OrgName" id="OrgName" size="50" required></td>
                    <td><select name="des" id="des">
                            <option value="UG">UG</option>
                            <option value="PG">PG</option>
                        </select>
                    </td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!--  Admin Responsibilities-->
    <form action="Admin_Responsibilities.php" method="post">
        <div class="info">
            <h2>| Administrative Responsibilities</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Description</th>
                    <th>Level</th>

                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from adminres where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['description'] . "</td>
            <td>" . $row['coldept'] . "</td>
            <td><a href='adminresdel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
        </tr>";
                    }
                }
                ?>
                <tr>
                    <td><input required required type="text" name="descr" id="descr" size="50" required></td>
                    <td><select name="level" id="level">
                            <option value="Department">Department</option>
                            <option value="College">College</option>
                        </select>
                    </td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!--Research Guidence-->
    <form action="ResGui.php" method="post">
        <div class="info">
            <h2>| Research Guidence</h2>

            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th colspan="2">
                        <h4>M.Tech </h4>
                    </th>

                    <th colspan="2">
                        <h4>Ph.D</h4>
                    </th>
                </tr>
                <tr>
                    <th>Completed</th>
                    <th>Ongoing</th>
                    <th>Completed</th>
                    <th>Ongoing</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from resgui where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    $row = mysqli_fetch_assoc($query_exe);
                    if (isset($row['mcomp'])) {
                        $id = $row['id'];

                        echo "<tr>
                <td>" . $row['mcomp'] . "</td>
                <td>" . $row['mong'] . "</td>
                <td>" . $row['pcom'] . "</td>
                    <td>" . $row['pong'] . "</td>
            </tr>";
                        $m1 = $row['mcomp'];
                        $m2 = $row['mong'];
                        $m3 = $row['pcom'];
                        $m4 = $row['pong'];
                    } else {
                        echo "<tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                        <td>0</td>
                </tr>";
                    }
                }
                ?>

                <tr>
                    <th><input value="<?php echo (isset($m1)) ? $m1 : ''; ?>" type="tel" name="comp" id="ong" max="20" maxlength="2" required></th>
                    <th><input value="<?php echo (isset($m2)) ? $m2 : '' ?>" type="tel" name="ong" id="comp" max="20" maxlength="2" required></th>
                    <th><input value="<?php echo (isset($m3)) ? $m3 : '' ?>" type="tel" name="pcomp" id="pong" max="20" maxlength="2" required></th>
                    <th><input value="<?php echo (isset($m4)) ? $m4 : '' ?>" type="tel" name="pong" id="pcomp" max="20" maxlength="2" required></th>
                    <th><button type="submit">Update</button></th>
                </tr>
            </table>
        </div>
    </form>
    <!-- Research Publications in Journals (National/International) -->
    <form action="ResJou.php" method="post" enctype="multipart/form-data">
        <div class="info">
            <h2>| Research Publications in Journals (National/International)</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Author's Name</th>
                    <th>Title Of the Paper</th>
                    <th>Name Of the Journal</th>
                    <th>National / International</th>
                    <th>Month/ Year</th>
                    <th>Volume, Issue No, Page Nos(Keep Format as it is )</th>
                    <th>Upload File</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from publish where uniqueid='$tmpid' and type='Journals'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['author'] . "</td>
            <td>" . $row['titleofpaper'] . "</td>
            <td>" . $row['nameofjournal'] . "</td>
                <td>" . $row['nation'] . "</td>
            <td>" . $row['monthyear'] . "</td>
            <td>" . $row['issueno'] . "</td>
            <td><a target='parent' href='PubFiles/" . $row['file'] . "'>Open</a></td>
            <td><a href='ResJoudel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
        </tr>";
                    }
                }

                ?>
                <tr>
                    <td><input type="text" name="authname" id="authname"></td>
                    <td><input type="text" name="title" id="title"></td>
                    <td><input type="text" name="jouname" id="jouname"></td>
                    <td><select name="nation" id="nation">
                            <option value="National">National</option>
                            <option value="International">International</option>
                        </select>
                    </td>
                    <td><input type="month" name="mon" id="mon"></td>
                    <td><input type="text" name="pgno" id="pgno"></td>
                    <td><input type="file" name="file" id="file" accept=".pdf,.jpg,.png,.jpeg" required></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Research Papers in Conferences (National/International) -->
    <form action="ResCon.php" method="POST" enctype="multipart/form-data">
        <div class="info">
            <h2>| Research Papers in Conferences (National/International)</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Author's Name</th>
                    <th>Title Of the Paper</th>
                    <th>Name Of the Conference / Journal</th>
                    <th>National / International</th>
                    <th>Month/ Year</th>
                    <th>Page No's</th>
                    <th>Upload File</th>
                </tr>

                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from publish where uniqueid='$tmpid' and type='Conference'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['author'] . "</td>
            <td>" . $row['titleofpaper'] . "</td>
            <td>" . $row['nameofjournal'] . "</td>
                <td>" . $row['nation'] . "</td>
            <td>" . $row['monthyear'] . "</td>
            <td>" . $row['issueno'] . "</td>
            <td><a target='blank' href='PubFiles/" . $row['file'] . "'>Open</a></td>
            <td><a href='ResJoudel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
        </tr>";
                    }
                }

                ?>
                <tr>
                    <td><input required type="text" name="authname" id="authname"></td>
                    <td><input required type="text" name="title" id="title"></td>
                    <td><input required type="text" name="jouname" id="jouname"></td>
                    <td><select name="nation" id="nation">
                            <option value="National">National</option>
                            <option value="International">International</option>
                        </select>
                    </td>
                    <td><input required type="month" name="mon" id="mon"></td>
                    <td><input required type="text" name="pgno" id="pgno"></td>
                    <td><input type="file" name="file" accept=".pdf" required></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!--Books Published-->
    <form action="book.php" method="POST" enctype="multipart/form-data">
        <div class="info">
            <h2>| Books Published</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Author's Name</th>
                    <th>Title Of the Paper</th>
                    <th>Publisher</th>
                    <th>ISBN</th>
                    <th>Year Of Publication</th>
                    <th>Upload File</th>
                </tr>

                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "SELECT * FROM `book` WHERE  uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];
                        echo "<tr>
            <td>" . $row['authname'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['publisher'] . "</td>
                <td>" . $row['isbn'] . "</td>
            <td>" . $row['year'] . "</td>
            <td><a target='blank' href='PubFiles/" . $row['file'] . "'>Open</a></td>
            <td><a href='bookdel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
        </tr>";
                    }
                }

                ?>
                <tr>
                    <td><input required type="text" name="authname" id="authname"></td>
                    <td><input required type="text" name="title" id="title"></td>
                    <td><input required type="text" name="pub" id="pub"></td>
                    <td><input required type="text" name="isbn" id="isbn"></td>

                    <td><input required type="number" max="2100" min="1900" name="year" id="mon"></td>
                    <td><input type="file" name="file" accept=".pdf" required></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!--  Workshops/ FDPs/STTPs /etc., (Organised)-->
    <form action="workshoporganized.php" method="post">
        <div class="info">
            <h2>| Workshops/ FDPs/STTPs /etc., (Organised)</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Name of the Workshop/FDP/STTP/ etc.,</th>
                    <th>Place</th>
                    <th>Period From</th>
                    <th>Period To</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from workshops where uniqueid='$tmpid' and type='Organized'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                }
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['name'] . "</td>
        <td>" . $row['place'] . "</td>
        <td>" . $row['datefrom'] . "</td>
        <td>" . $row['dateto'] . "</td>
        <td><a href='workshoporganizeddel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required required type="text" name="nameofworkshop" id="nameofworkshop"></td>
                    <td><input required required type="text" name="place" id="place"></td>
                    <td><input required required type="date" name="DF" id="DF"></td>
                    <td><input required required type="date" name="DT" id="DT"></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Workshops/ FDPs/STTPs /etc., (Attended)-->
    <form action="workshopattended.php" method="post">
        <div class="info">
            <h2>| Workshops/ FDPs/STTPs /etc., (Attended)</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Name of the Workshop/FDP/STTP/ etc.,</th>
                    <th>Place</th>
                    <th>Period From</th>
                    <th>Period To</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from workshops where uniqueid='$tmpid' and type='Attended'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {

                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        $id = $row['id'];

                        echo "<tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['place'] . "</td>
            <td>" . $row['datefrom'] . "</td>
            <td>" . $row['dateto'] . "</td>
            <td><a href='workshoporganizeddel.php?rn=$id' onclick='checker()'>Delete</a>    </td></tr>";
                    }
                }

                ?>
                <tr>
                    <td><input required required type="text" name="nameofworkshop" id="nameofworkshop"></td>
                    <td><input required required type="text" name="place" id="place"></td>
                    <td><input required required type="date" name="DF" id="DF"></td>
                    <td><input required required type="date" name="DT" id="DT"></td>
                    <td><button type="submit">Add</button></td>
                </tr>

            </table>
        </div>
    </form>
    <!-- Sponsored Projects-->
    <form action="SponsoredProjects.php" method="post">
        <div class="info">
            <h2>| Sponsored Projects</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Title</th>
                    <th>Sponsored By</th>
                    <th>Amount (INR)</th>
                    <th>Period (in years)</th>
                    <th>Ongoing/Completed</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from projects where uniqueid='$tmpid' and type='Sponsored'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                }
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['title'] . "</td>
        <td>" . $row['Sponname'] . "</td>
        <td>" . $row['amt'] . "</td>
        <td>" . $row['period'] . ' years' . "</td>
        <td>" . $row['onco'] . "</td>
        <td><a href='Spondel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required type="text" name="title" id="title"></td>
                    <td><input required type="text" name="sponby" id="sponby"></td>
                    <td><input required type="number" name="amt" id="amt"></td>
                    <td><input required type="number" max="30" name="period" id="period"></td>
                    <td><select name="onco" id="onco">
                            <option value="Completed">Completed</option>
                            <option value="Ongoing">Ongoing</option>
                        </select>
                    </td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Consultancy Projects-->
    <form action="ConsultancyProjects.php" method="POST">
        <div class="info">
            <h2>| Consultancy Projects</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Title</th>
                    <th>Agency</th>
                    <th>Amount</th>
                    <th>Period </th>
                    <th>Ongoing/Completed</th>

                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from projects where uniqueid='$tmpid' and type='Consultancy'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                }
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];

                    echo "<tr>
        <td>" . $row['title'] . "</td>
        <td>" . $row['Sponname'] . "</td>
        <td>" . $row['amt'] . "</td>
        <td>" . $row['period'] . ' years' . "</td>
        <td>" . $row['onco'] . "</td>
        <td><a href='Spondel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required type="text" name="title" id="title"></td>
                    <td> <input required type="text" name="sponby" id="sponby"></td>
                    <td> <input required type="number" name="amt" id="amt"></td>
                    <td> <input required type="number" name="period" id="period"></td>
                    <td><select name="onco" id="onco">
                            <option value="Completed">Completed</option>
                            <option value="Ongoing">Ongoing</option>
                        </select>
                    </td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Patents-->
    <form action="patents.php" method="post">
        <div class="info">
            <h2>| Patents</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Title</th>
                    <th>Application Number</th>
                    <th>Month/Year</th>
                    <th>Filed/Granted</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from patents where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['title'] . "</td>
        <td>" . $row['appnumber'] . "</td>
        <td>" . $row['date'] . "</td>
        <td>" . $row['type'] . "</td>
        <td><a href='patentsdel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required required type="text" name="title" id="title"></td>
                    <td><input required required type="number" name="appno" id="appno"></td>
                    <td><input required required type="month" name="year" id="year"></td>
                    <td><select name="type" id="type">
                            <option value="Filed">Filed</option>
                            <option value="Granted">Granted</option>
                        </select>
                    </td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!--Awards/Honours Received-->
    <form action="award.php" method="post">
        <div class="info">
            <h2>| Awards/Honours Received</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Award Name</th>
                    <th>Awarded by</th>
                    <th>Contribution</th>
                    <th>Date Received</th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from award where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['name'] . "</td>
        <td>" . $row['by'] . "</td>
        <td>" . $row['con'] . "</td>
        <td>" . $row['DR'] . "</td>
        <td><a href='awarddel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required type="text" name="name" id="name"></td>
                    <td><input required type="text" name="by" id="by"></td>
                    <td><input required type="text" name="con" id="con"></td>
                    <td><input required type="date" name="dateR" id="dateR"></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Professional Memberships-->
    <form action="mem.php" method="post">
        <div class="info">
            <h2>| Professional Memberships</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Name Of Professional Body</th>
                    <th>Membership Number</th>
                    <th>Membership Type</th>

                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from promemberships where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['name'] . "</td>
        <td>" . $row['number'] . "</td>
        <td>" . $row['type'] . "</td>
        <td><a href='promemdel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }

                ?>
                <tr>
                    <td><input required type="text" name="name" id="name"></td>
                    <td><input required type="number" name="num" id="num"></td>
                    <td><input required type="text" name="type" id="type"></td>
                    <td><button type="submit">Add</button></td>
                </tr>
            </table>
        </div>
    </form>
    <!-- Membership in BOS/ Editorial Boards-->
    <form action="membos.php" method="post">
        <div class="info">
            <h2>| Membership in BOS/ Editorial Boards</h2>
            <table style="border: 1px solid;margin: 10px; margin:20px">
                <tr>
                    <th>Name of the University/ Journal </th>
                    <th>Member/ Editor/ Reviewer</th>
                    <th>Period </th>
                </tr>
                <?php
                include("connection.php");
                $tmpid = $_SESSION["user_id"];
                $query = "select * from membos where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_exe)) {
                    $id = $row['id'];
                    echo "<tr>
        <td>" . $row['name'] . "</td>
        <td>" . $row['type'] . "</td>
        <td>" . $row['period'] . "</td>
        <td><a href='membosdel.php?rn=$id' onclick='checker()'>Delete</a>    </td>
    </tr>";
                }
                ?>
                <tr>
                    <td><input required type="text" name="name" id="name"></td>
                    <td><select name="type" id="type">
                            <option value="Member">Member</option>
                            <option value="Editor">Editor</option>
                            <option value="Reviewer">Reviewer</option>
                        </select></td>
                    <td><input required type="number" name="period" id="period" onKeyPress="if(this.value.length==2) return false;" /></td>
                    <td><button type="submit">Add</button></td>
                </tr>

            </table>
        </div>
    </form>
</body>
<script src="js/bootstrap.js">
    
</script>
<script>
    function checker() {
        var result = confirm('Are you sure?');
        if (result == false) {
            event.preventDefault();
        }
    }
</script>
</html>