<?php
session_start();
include 'connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="CRR_Logo.ico" type="image/x-icon">
    <title>Report</title>
    <script>
        $(function() {
            $('#drpdwn').change(function() {
                $('.info').hide();
                if ($(this).val() == "All") {
                    $('.info').show();
                }
                if ($(this).val() == "educinfo") {
                    $('#educinfo').show();
                }
                if ($(this).val() == "coutau") {
                    $('#coutau').show();
                }
                if ($(this).val() == "adminres") {
                    $('#adminres').show();
                }
                if ($(this).val() == "resjou") {
                    $('#resjou').show();
                }
                if ($(this).val() == "rescon") {
                    $('#rescon').show();
                }
                if ($(this).val() == "workexp") {
                    $('#workexp').show();
                }
                if ($(this).val() == "patents") {
                    $('#patents').show();
                }
                if ($(this).val() == "award") {
                    $('#award').show();
                }
                if ($(this).val() == "promem") {
                    $('#promem').show();
                }
                if ($(this).val() == "membos") {
                    $('#membos').show();
                }
                if ($(this).val() == "workshoporg") {
                    $('#workshoporg').show();
                }
                if ($(this).val() == "workshopattended") {
                    $('#workshopattended').show();
                }
                if ($(this).val() == "sponpro") {
                    $('#sponpro').show();
                }
                if ($(this).val() == "conpro") {
                    $('#conpro').show();
                }
                if ($(this).val() == "book") {
                    $('#book').show();
                }
            });
        });
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".mytab tr ").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).ready(function() {
            $("#getrp").click(function() {
                $("#drpdwn").hide();
                $("#search").hide();
                $("#getrp").hide();
                $("td a").hide();
                window.print();
                $("#drpdwn").show();
                $("#search").show();
                $("#getrp").show();
            });
        });
    </script>
    <style>
        #getrp :hover {
            background-color: purple;
            color: #dddddd;
        }

        .info {
            margin: 10%;
            border-radius: 50%;
        }

        th,
        th h4 {
            background-color: #b6b6b6;

        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #b6b6b6;
        }

        td {
            padding-right: 70px;
            padding-bottom: 10px;
        }

        * {
            background-color: aliceblue;
        }

        .form-control {
            margin-bottom: 5px;
            border: none;
        }

        input,
        select {
            padding: 10px;
            border-radius: 10px;
        }

        input {
            height: 20px;
            width: 350px;
        }

        button {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid;
            height: 50px;
            width: 160px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="assets/CRR_Logo_Black.png" height="90" width="290" alt="CRRE">
        <center>
            <h1>
                Personal Report
                <div id="search" style="display: block;" align="right">
                    <i><img src="icons/search.svg" style="padding-right:5px ;" alt="search"></i><input id="myInput" type="text" placeholder="Search..">
                </div>
            </h1>
        </center>
        <hr>
    </div>
    <center>
        <select id="drpdwn">
            <option selected value="All">All</option>
            <option value="educinfo">Educational Qualifications</option>
            <option value="workexp">Work Experience</option>
            <option value="coutau">Course Taught</option>
            <option value="adminres">Admin Responsibilities</option>
            <option value="resjou">Research Publications in Journals (National/International)</option>
            <option value="rescon">Research Papers in Conferences (National/International)</option>
            <option value="book">Books Published</option>
            <option value="workshoporg">Workshops/ FDPs/STTPs /etc., (Organised)</option>
            <option value="workshopattended">Workshops/ FDPs/STTPs /etc., (Attended)</option>
            <option value="sponpro">Sponsored Projects</option>
            <option value="conpro">Consultancy Projects</option>
            <option value="patents">Patents</option>
            <option value="award">Awards / Honours</option>
            <option value="promem">Professional Memberships</option>
            <option value="membos"> Membership in BOS/ Editorial Boards</option>
        </select>
    </center>
    <div style="display: block;" align="right">
        <button id="getrp">Get Report</button>
    </div>
    <!--   Educational Qualifications-->
    <div class="info" id="educinfo">
        <h2>
            | Educational Qualification
        </h2>
        <table style="border: 1px solid;">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Qualification</th>
                <th>Institute</th>
                <th>University/Board</th>
                <th>Specialization</th>
                <th>Year Of Passing</th>
                <th>Division/Class</th>
            </tr>
            <tbody class='mytab'>
                <?php
                include 'connection.php';                
                $query ="select * from bio_data where  designation!='Principal'";
                $query_exe1 = mysqli_query($con, $query);
                while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                    $tmpid = $row1['uniqueid'];
                    $query = "select * from educinfo where uniqueid='$tmpid'";
                    $query_exe = mysqli_query($con, $query);
                    if ($query_exe) {
                        while ($row = mysqli_fetch_assoc($query_exe)) {
                            echo "<tr>
                            <td>".$row1['name']."</td>
                            <td>".$row1['department']."</td>
                            <td>".$row1['designation']."</td>
                            <td>" .$row['qualification'] ."</td>
                            <td>" .$row['institute'] ."</td>
                            <td>" .$row['university'] ."</td>
                            <td>" .$row['specilization'] ."</td>
                            <td>" .$row['yearofpass'] ."</td>
                            <td>" .$row['divclass'] ."</td>
                    </tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Work Experience-->
    <div class="info" id="workexp">
        <h2>| Work Experience</h2>
        <table style="border: 1px solid;">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Name Of the Organization</th>
                <th>Designation</th>
                <th>Date From</th>
                <th>Date To</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';            
            $query ="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from workexp where uniqueid='$tmpid'";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['nameoforg'] ."</td>
                                <td>" .$row['designation'] ."</td>
                                <td>" .$row['datefrom'] ."</td>
                                <td>" .$row['dateto'] ."</td>            
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>


    </div>
    <!-- Course Taught-->
    <div class="info" id="coutau">
        <h2>| Courses taught</h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Subject Name</th>
                <th>UG/PG</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            echo $con->error;
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from coutau where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['subname'] ."</td>
                                <td>" .$row['ugpg'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!--  Admin Responsibilities-->
    <div class="info" id="adminres">
        <h2>
            | Administrative Responsibilities
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Description</th>
                <th>Level</th>

            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from adminres where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['description'] ."</td>
                                <td>" .$row['coldept'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!--Research Guidence-->
    <div class="info" id="resgui">
        <h2>
            | Research Guidence
        </h2>

        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th rowspan="2">Name Of the Employee</th>
                <th rowspan="2">Branch</th>
                <th rowspan="2">Designation</th>
                
                <th colspan="2"><h4>M.Tech </h4></th>
                <th colspan="2"><h4>Ph.D</h4></th>
            </tr>
            <tr>
                <th>Completed</th>
                <th>Ongoing</th>
                <th>Completed</th>
                <th>Ongoing</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from resgui where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['mcomp'] ."</td>
                                <td>" .$row['mong'] ."</td>
                                <td>" .$row['pcom'] ."</td>
                                <td>" .$row['pong'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Research Publications in Journals (National/International) -->
    <div class="info" id="resjou">
        <h2>
            | Research Publications in Journals (National/International)
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Author's Name</th>
                <th>Title Of the Paper</th>
                <th>Name Of the Journal</th>
                <th>National / International</th>
                <th>Month/ Year</th>
                <th>Volume, Issue No, Page Nos(Keep Format as it is )</th>
                <th>Upload File</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from publish where uniqueid='$tmpid' and type='J".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['author'] ."</td>
                                <td>" .$row['titleofpaper'] ."</td>
                                <td>" .$row['nameofjournal'] ."    </td>
                                <td>" .$row['nation'] ."    </td>
                                <td>" .$row['monthyear'] ."</td>
                                <td>" .$row['issueno'] ."</td>
                                <td><a target='parent' href='PubFiles/" .$row['file'] ."'>Open</a></td>
                        </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Research Papers in Conferences (National/International) -->
    <div class="info" id="rescon">
        <h2>
            | Research Papers in Conferences (National/International)
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Author's Name</th>
                <th>Title Of the Paper</th>
                <th>Name Of the Conference / Journal</th>
                <th>National / International</th>
                <th>Month/ Year</th>
                <th>Page No's</th>
                <th>Upload File</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from publish where uniqueid='$tmpid' and type='Con".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                        <td>" .$row['author'] ."</td>
                        <td>" .$row['titleofpaper'] ."</td>
                        <td>" .$row['nameofjournal'] ."</td>
                        <td>" .$row['nation'] ."</td>
                        <td>" .$row['monthyear'] ."</td>
                        <td>" .$row['issueno'] ."</td>
                        <td><a target='parent' href='PubFiles/" .$row['file'] ."'>Open</a></td>
                    </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Books Published -->
    <div class="info" id="book">
        <h2>
            | Books Published
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Author's Name</th>
                <th>Title Of the Paper</th>
                <th>Publisher</th>
                <th>ISBN</th>
                <th>Year Of Publication</th>
                <th>Upload File</th>
            </tr>
            <tbody class='mytab'>
                <?php
                include 'connection.php';
                
                $query="select * from bio_data where designation!='Principal'";
                $query_exe1 = mysqli_query($con, $query);
                while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                    $tmpid = $row1['uniqueid'];

                    $query = "select * from book where uniqueid=".$row1['uniqueid']." ";
                    $query_exe = mysqli_query($con, $query);
                    if ($query_exe) {
                        while ($row = mysqli_fetch_assoc($query_exe)) {
                            echo "<tr>
                                    <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                    <td>" .$row['authname'] ."</td>
                                    <td>" .$row['title'] ."</td>
                                    <td>" .$row['publisher'] ."</td>
                                    <td>" .$row['isbn'] ."</td>
                                    <td>" .$row['year'] ."</td>
                                    <td><a target='blank' href='PubFiles/" .$row['file'] ."'>Open</a></td>
                                </tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <!--  Workshops/ FDPs/STTPs /etc., (Organised)-->
    <div class="info" id="workshoporg">
        <h2>
            | Workshops/ FDPs/STTPs /etc., (Organised)
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
                <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Name of the Workshop/FDP/STTP/ etc.,</th>
                <th>Place</th>
                <th>Period From</th>
                <th>Period To</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from workshops where uniqueid='$tmpid' and type='Or".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                                <td>".$row1['name']."</td>
                                <td>".$row1['department']."</td>
                                <td>".$row1['designation']."</td>
                                <td>" .$row['name'] ."</td>
                                <td>" .$row['place'] ."</td>
                                <td>" .$row['datefrom'] ."</td>
                                <td>" .$row['dateto'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Workshops/ FDPs/STTPs /etc., (Attended)-->
    <div class="info" id="workshopattended">
        <h2>
            | Workshops/ FDPs/STTPs /etc., (Attended)
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Name of the Workshop/FDP/STTP/ etc.,</th>
                <th>Place</th>
                <th>Period From</th>
                <th>Period To</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from workshops where uniqueid='$tmpid' and type='A".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                                    <td>" .$row['name'] ."</td>
                                    <td>" .$row['place'] ."</td>
                                    <td>" .$row['datefrom'] ."</td>
                                    <td>" .$row['dateto'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>

        </table>
    </div>
    <!-- Sponsored Projects-->
    <div class="info" id="sponpro">
        <h2>
            | Sponsored Projects
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Title</th>
                <th>Sponsored By</th>
                <th>Amount (INR)</th>
                <th>Period (in years)</th>
                <th>Ongoing/Completed</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from projects where uniqueid='$tmpid' and type='Sp".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                                <td>" .$row['title'] ."</td>
                                <td>" .$row['Sponname'] ."</td>
                                <td>" .$row['amt'] ."</td>
                                <td>" .$row['period'] .' years' ."</td>
                                <td>" .$row['onco'] ."</td>
                            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Consultancy Projects-->
    <div class="info" id="conpro">
        <h2>
            | Consultancy Projects
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Title</th>
                <th>Agency</th>
                <th>Amount</th>
                <th>Period</th>
                <th>Ongoing/Completed</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from projects where uniqueid='$tmpid' and type='Cons".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                    <td>" .$row['title'] ."</td>
                <td>" .$row['Sponname'] ."</td>
                <td>" .$row['amt'] ."</td>
                <td>" .$row['period'] .' years' ."</td>
                <td>" .$row['onco'] ."</td>
            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Patents-->
    <div class="info" id="patents">
        <h2>
            | Patents
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Title</th>
                <th>Application Number</th>
                <th>Month/Year</th>
                <th>Filed/Granted</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from patents where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                    </td>
                    <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                    <td>" .$row['title'] ."</td>
                <td>" .$row['appnumber'] ."</td>
                <td>" .$row['date'] ."</td>
                <td>" .$row['type'] ."</td>
        
            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!--Awards/Honours Received-->
    <div class="info" id="award">
        <h2>
            | Awards/Honours Received
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Award Name</th>
                <th>Awarded by</th>
                <th>Contribution</th>
                <th>Date Received</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from award where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                    <td>" .$row['name'] ."</td>
                <td>" .$row['by'] ."</td>
                <td>" .$row['con'] ."</td>
                <td>" .$row['DR'] ."</td>
            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Professional Memberships-->
    <div class="info" id="promem">
        <h2>
            | Professional Memberships
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Membership Number</th>
                <th>Membership Type</th>

            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from promemberships where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                    <td>" .$row['name'] ."</td>
        <td>" .$row['number'] ."</td>
        <td>" .$row['type'] ."</td>

            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    <!-- Membership in BOS/ Editorial Boards-->
    <div class="info" id="membos">
        <h2>
            | Membership in BOS/ Editorial Boards
        </h2>
        <table style="border: 1px solid;margin: 10px; margin:20px">
            <tr>
            <th>Name Of the Employee</th> 
                <th>Branch</th> 
                <th>Designation</th>
                <th>Name of the University/ Journal</th>
                <th>Member/ Editor/ Reviewer</th>
                <th>Period</th>
            </tr>
            <tbody class='mytab'><?php
            include 'connection.php';
            
            $query="select * from bio_data where designation!='Principal'";
            $query_exe1 = mysqli_query($con, $query);
            while ($row1 = mysqli_fetch_assoc($query_exe1)) {
                $tmpid = $row1['uniqueid'];
                $query = "select * from membos where uniqueid=".$row1['uniqueid']." ";
                $query_exe = mysqli_query($con, $query);
                if ($query_exe) {
                    while ($row = mysqli_fetch_assoc($query_exe)) {
                        echo "<tr>
                        <td>".$row1['name']."</td>
                        <td>".$row1['department']."</td>
                        <td>".$row1['designation']."</td>
                    <td>" .$row['name'] ."</td>
        <td>" .$row['type'] ."</td>
        <td>" .$row['period'] ."</td>
            </tr>";
                    }
                }
            }
            ?></tbody>
        </table>
    </div>
    </center>
</body>

</html>