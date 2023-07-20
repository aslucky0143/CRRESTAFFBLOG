<?php
session_start();
if(isset($_SESSION['user_id'])){

}
else{
    header("Location: index.php");
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
    <title>Personal Report</title>
    <script>
       
    $(function () {
        $('#drpdwn').change(function () {
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
        });
    });
    </script>
    <style>
        .info{
            margin: 10%;
            border-radius: 50%;
        }th,th h4{
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
        td{
    padding-right: 70px;
    padding-bottom: 10px;
}
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

    </style>
</head>
<body>
<div class="header">
        <img src="assets/CRR_Logo_Black.png" height="90" width="290" alt="CRRE">
        <center>
            <h2>
            Department Report
            </h2>
        </center>
        <hr>
</div>
<center>
          <select  id="drpdwn">
              <option selected value="All">All</option>
              <option  value="educinfo">Educational Qualifications</option>
              <option  value="workexp">Work Experience</option>
              <option  value="coutau">Course Taught</option>
              <option  value="adminres">Admin Responsibilities</option>
              <option  value="resjou">Research Publications in Journals (National/International)</option>
              <option  value="rescon">Research Papers in Conferences (National/International)</option>
              <option  value="workshoporg">Workshops/ FDPs/STTPs /etc., (Organised)</option>
              <option  value="workshopattended">Workshops/ FDPs/STTPs /etc., (Attended)</option>
              <option  value="sponpro">Sponsored Projects</option>
              <option  value="conpro">Consultancy Projects</option>
              <option  value="patents">Patents</option>
              <option  value="award">Awards / Honours</option>
              <option  value="promem">Professional Memberships</option>
              <option  value="membos"> Membership in BOS/ Editorial Boards</option>
          </select>
</center>

<!-- Educational Qualifications-->          
<div class="info" id="educinfo" >

           <h2 >
               | Educational Qualification
           </h2>
          <table style="border: 1px solid;">
        <tr>
            <th>
                Qualification
            </th>
            <th>
                Institute
            </th>
            <th>
                University/Board
            </th>
            <th>
                Specialization
            </th>
            <th>
                Year Of Passing
            </th>
            <th>
                Division/Class
            </th>
            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from educinfo where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['qualification']."
            </td>
            <td>
            ".$row['institute']."
            </td>
            <td>
            ".$row['university']."
            </td>
            <td>
            ".$row['specilization']."
            </td>
            <td>
            ".$row['yearofpass']."
            </td>
            <td>
            ".$row['divclass']."
            </td>
            
        </tr>";
            }
            
        }
        ?>        
    </table>


</div> 

<!-- Work Experience-->
            <div class="info" id="workexp" >
                    
           <h2 >
               | Work Experience
           </h2>
          <table style="border: 1px solid;">
        <tr>
            <th>
                Name Of the Organization
            </th>
            <th>
                Designation
            </th>
            <th>
                Date From
            </th>
            <th>
                Date To
            </th>           
    </tr>
    <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from workexp where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['nameoforg']."
            </td>
            <td>
            ".$row['designation']."
            </td>
            <td>
            ".$row['datefrom']."
            </td>
            
            <td>
            ".$row['dateto']."
            </td>
        </tr>";
            }
        }
        
        ?>
    </table>


</div> 
            
<!-- Course Taught-->
            
            <div class="info" id="coutau" >
           <h2 >
           | Courses taught
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
                Subject Name
            </th>
            <th>
                UG/PG
            </th>
            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from coutau where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['subname']."
            </td>
            <td>
            ".$row['ugpg']."
            </td>
            
        </tr>";
            }
        }
        
        ?>
    </table>
</div>  
            
<!--  Admin Responsibilities-->            
            
            <div class="info" id="adminres" >
           <h2 >
           | Administrative Responsibilities
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
                Description
            </th>
            <th>
                Level
            </th>
            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from adminres where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['description']."
            </td>
            <td>
            ".$row['coldept']."
            </td>
            
        </tr>";
            }
            
        }
        ?>
    </table>
</div>   
            
<!--Research Guidence-->
            
            <div class="info" id="resgui" >
                    <h2>
                       | Research Guidence
                    </h2>
                
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
                        <th>
                            Completed
                        </th>
                        <th>
                            Ongoing
                        </th>
                        <th>
                            Completed
                        </th>
                        <th>
                            Ongoing
                        </th>
                    </tr>
                    <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from resgui where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            $row=mysqli_fetch_assoc($query_exe);
            if(isset($row['mcomp'])){
                    $id=$row['id'];

                    echo "<tr>
                <td>
                    ".$row['mcomp']."
                </td>
                <td>
                    ".$row['mong']."
                </td>
                <td>
                    ".$row['pcom']."
                    </td>
                    <td>
                        ".$row['pong']."
                    </td>
            </tr>";
                }else{
                    echo "<tr>
                    <td>
                        0
                    </td>
                    <td>
                        0
                    </td>
                    <td>
                        0
                        </td>
                        <td>
                         0
                        </td>
                </tr>"; 
                }
        
        }
        ?>
                </table>
                </div>
            
<!-- Research Publications in Journals (National/International) -->
            
            <div class="info" id="resjou" >
           <h2 >
           | Research Publications in Journals (National/International)
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Author's Name
            </th>
            <th>
                Title Of the Paper
            </th>
            <th>
                Name Of the Journal
            </th>
            <th>
                National / International
            </th>
            <th>
                Month/ Year
            </th>
            <th>
                Volume, Issue No, Page Nos(Keep Format as it is )
            </th>
            <th>
            Upload File
            </th>
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from publish where uniqueid='$tmpid' and type='Journals'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['author']."
            </td>
            <td>
                ".$row['titleofpaper']."
            </td>
            <td>
                ".$row['nameofjournal']."
                </td>
                <td>
                    ".$row['nation']."
                </td>
            <td>
                ".$row['monthyear']."
            </td>
            <td>
                ".$row['issueno']."
            </td>
            <td>
            <a target='parent' href='PubFiles/".$row['file']."'>Open</a>
            </td>
            
        </tr>";
            }
        }
        
        ?>
         </table>
            </div>
            
<!-- Research Papers in Conferences (National/International) -->
            
            <div class="info" id="rescon" >
           <h2 >
           | Research Papers in Conferences (National/International)
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
                Author's Name
            </th>
            <th>
                Title Of the Paper
            </th>
            <th>
                Name Of the Conference / Journal
            </th>
            <th>
                National / International
            </th>
            <th>
                Month/ Year
            </th>
            <th>
                Page No's
            </th>
            <th>
                Upload File
            </th>
        </tr>
        
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from publish where uniqueid='$tmpid' and type='Conference'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];
                echo "<tr>
            <td>
                ".$row['author']."
            </td>
            <td>
                ".$row['titleofpaper']."
            </td>
            <td>
                ".$row['nameofjournal']."
                </td>
                <td>
                    ".$row['nation']."
                </td>
            <td>
                ".$row['monthyear']."
            </td>
            <td>
                ".$row['issueno']."
            </td>
            <td>
            <a target='blank' href='PubFiles/".$row['file']."'>Open</a>
            </td>
            
        </tr>";
            }
        }
        
        ?>
         </table>
            </div>
                        
<!--  Workshops/ FDPs/STTPs /etc., (Organised)-->     
            
            <div class="info" id="workshoporg" >
           <h2 >
           | Workshops/ FDPs/STTPs /etc., (Organised)
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Name of the Workshop/FDP/STTP/ etc.,
            </th>
            <th>
                Place
            </th>
            <th>
                Period From
            </th>
            <th>
                Period To
            </th>
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from workshops where uniqueid='$tmpid' and type='Organized'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
        }
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
            echo "<tr>
        <td>
            ".$row['name']."
        </td>
        <td>
        ".$row['place']."
        </td>
        <td>
        ".$row['datefrom']."
        </td>
        <td>
        ".$row['dateto']."
        </td>
       
    </tr>";
        }
        
        ?>
    </table>
</div> 
            
<!-- Workshops/ FDPs/STTPs /etc., (Attended)-->            
            
            <div class="info" id="workshopattended" >
           <h2 >
               | Workshops/ FDPs/STTPs /etc., (Attended)
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Name of the Workshop/FDP/STTP/ etc.,
            </th>
            <th>
                Place
            </th>
            <th>
                Period From
            </th>
            <th>
                Period To
            </th>
        </tr>
            <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from workshops where uniqueid='$tmpid' and type='Attended'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
            while($row=mysqli_fetch_assoc($query_exe)){
                $id=$row['id'];

                echo "<tr>
            <td>
                ".$row['name']."
            </td>
            <td>
            ".$row['place']."
            </td>
            <td>
            ".$row['datefrom']."
            </td>
            <td>
            ".$row['dateto']."
            </td>
            
            
        </tr>";
            }
        }
        
        ?>
        
    </table>
</div> 
            
<!-- Sponsored Projects-->
           
           <div class="info" id="sponpro" >
           <h2 >
           | Sponsored Projects
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Title
            </th>
            <th>
            Sponsored By
            </th>
            <th>
                Amount (INR)
            </th>
            <th>
                Period (in years)
            </th>
            <th>
                Ongoing/Completed
            </th>
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from projects where uniqueid='$tmpid' and type='Sponsored'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
        }
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
            echo "<tr>
        <td>
            ".$row['title']."
        </td>
        <td>
        ".$row['Sponname']."
        </td>
        <td>
        ".$row['amt']."
        </td>
        <td>
        ".$row['period'].' years'."
        </td>
        <td>
        ".$row['onco']."
        </td>
        
    </tr>";
        }
        
        ?>
    </table>
</div> 
           
<!-- Consultancy Projects-->            
            
            <div class="info" id="conpro" >
           <h2 >
           | Consultancy Projects
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Title
            </th>
            <th>
            Agency
            </th>
            <th>
                Amount
            </th>
            <th>
                Period 
            </th>
            <th>
                Ongoing/Completed
            </th>
            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from projects where uniqueid='$tmpid' and type='Consultancy'";
        $query_exe=mysqli_query($con,$query);
        if($query_exe){
            
        }
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];

            echo "<tr>
        <td>
            ".$row['title']."
        </td>
        <td>
        ".$row['Sponname']."
        </td>
        <td>
        ".$row['amt']."
        </td>
        <td>
        ".$row['period'].' years'."
        </td>
        <td>
        ".$row['onco']."
        </td>
        
    </tr>";
        }
        
        ?>
    </table>
</div> 

<!-- Patents-->
            
            <div class="info" id="patents" >
           <h2 >
           | Patents
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
                Title
            </th>
            <th>
                Application Number
            </th>
            <th>
                Month/Year
            </th>
            <th>
                Filed/Granted
            </th>            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from patents where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
            echo "<tr>
        <td>
            ".$row['title']."
        </td>
        <td>
        ".$row['appnumber']."
        </td>
        <td>
        ".$row['date']."
        </td>
        <td>
        ".$row['type']."
        </td>

    </tr>";
        }
        
        ?>
    </table>
</div> 
            
<!--Awards/Honours Received-->            
            
            <div class="info" id="award" >
           <h2 >
           | Awards/Honours Received
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Award Name
            </th>
            <th>
            Awarded by
            </th>
            <th>
                Contribution
            </th>
            <th>
                Date Received
            </th>
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from award where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
            echo "<tr>
        <td>
            ".$row['name']."
        </td>
        <td>
        ".$row['by']."
        </td>
        <td>
        ".$row['con']."
        </td>
        <td>
        ".$row['DR']."
        </td>

    </tr>";
        }
        
        ?>
    </table>
</div> 
            
<!-- Professional Memberships-->            
            
            <div class="info" id="promem" >
           <h2 >
           | Professional Memberships
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
            Name Of Professional Body
            </th>
            <th>
            Membership Number
            </th>
            <th>
                Membership Type
            </th>
            
        </tr>
        <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from promemberships where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
        echo "<tr>
        <td>
            ".$row['name']."
        </td>
        <td>
        ".$row['number']."
        </td>
        <td>
        ".$row['type']."
        </td>

    </tr>";
        }
        
        ?>
    </table>
</div> 
            
<!-- Membership in BOS/ Editorial Boards-->            
            
            <div class="info" id="membos" >
           <h2 >
           | Membership in BOS/ Editorial Boards
           </h2>
          <table style="border: 1px solid;margin: 10px; margin:20px">
        <tr>
            <th>
                Name of the University/ Journal 
            </th>
            <th>
                Member/ Editor/ Reviewer
            </th>    
            <th>
                Period 
            </th>           
        </tr>
            <?php
        include("connection.php");
        $tmpid=$_SESSION["user_id"];
        $query="select * from membos where uniqueid='$tmpid'";
        $query_exe=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($query_exe)){
            $id=$row['id'];
            echo "<tr>
        <td>
            ".$row['name']."
        </td>
        <td>
        ".$row['type']."
        </td>
        <td>
        ".$row['period']."
        </td>
        
        
    </tr>";
        }
        
        ?>

    </table>
</div> 
            
    </center>
    </body>
</html>