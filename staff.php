<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Control Panel For Staff</title>
    <style>
        .info{
            margin: 10%;
            border-radius: 50%;
        }th{
            color:whitesmoke;
        }
    </style>
</head>
<body>
<nav  style="background:linear-gradient(45deg,rgb(79, 23, 207),rgb(79, 23, 207),rgb(248, 248, 248),rgb(108, 23, 206));">
        <div class="container-fluid" >
          <a class="navbar-brand" href="#">
            <img src="assets/CRR_Logo_White.png" alt="" width="830" height="260">
          </a>
        </div>
    </nav>
    <div class="info">
                <h2 style="margin-bottom: 20px;">
                   | Staff Management : <?php echo$_GET['des']?>
               </h2>
        <table style="border: 1px solid;">
                <tr style="background:linear-gradient(45deg,rgb(79, 23, 207),rgb(79, 23, 207),rgb(108, 23, 206));">
                    <th>
                        Name Of The Staff
                    </th>
                    <th>
                        Designation
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            
            <tbody>
                <?php
                include("connection.php");
                $tmpid=$_SESSION["user_id"];
                $dept=$_GET['des'];
                $query="select uniqueid,name,designation from bio_data where department='$dept' and designation!='HOD' and designation!='Principal'";
                $query_exe=mysqli_query($con,$query);
                if($query_exe){
                    
                    while($row=mysqli_fetch_assoc($query_exe)){
                        echo "<tr>
                    <td>
                        ".$row['name']."
                    </td>
                    <td>
                    ".$row['designation']."
                    </td>
                    <td>
                    <a onclick='checker()' href='staffdel.php?id=".$row['uniqueid']."'>Delete Employee</a>
                    </td>
                    </tr>";
                    }
                    
                }
                ?>
            </tbody>
        </table>

    </div>

</body>
<script>
    function checker() {
        var result=confirm('Are you sure?');
        if(result==false){
            event.preventDefault();
        }
        
    }
</script>
</html>