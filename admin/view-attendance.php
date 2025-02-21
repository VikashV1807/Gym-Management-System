<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TheGym</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
  <h1><a href="dashboard.html">TheGym Admin</a></h1>
</div>
<?php include 'includes/topheader.php'?>
<?php $page="attendance"; include 'includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> <a href="attendance.php" class="current">Manage Attendance</a> </div>
    <h1 class="text-center">Attendance List <i class="fas fa-calendar"></i></h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <i class='fas fa-th'></i> </span>
            <h5>Attendance Table</h5>
          </div>
          <div class='widget-content nopadding'> 

        
          <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Plan</th>
                  <th>Attendance Count</th> 
                </tr>
              </thead>

             <?php include "dbcon.php";
              
                     $qry="SELECT * FROM members WHERE status = 'Active'";
                    $result=mysqli_query($conn,$qry);
                   
              $cnt = 1;
            while($row=mysqli_fetch_array($result)){ ?>
            
           <tbody> 
               
                <td><div class='text-center'><?php echo $cnt; ?></div></td>
                <td><div class='text-center'><?php echo $row['fullname']; ?></div></td>
                <td><div class='text-center'><?php if($row['plan'] == 1) { echo $row['plan']. ' Month';} else if($row['plan'] == '0') { echo'Expired';} else { echo $row['plan']. ' Months'; } ?></div></td>
                <td><div class='text-center'><?php if($row['attendance_count'] == 1) { echo $row['attendance_count']. ' Day';} else if($row['attendance_count'] == '0') { echo'None';} else { echo $row['attendance_count']. ' Days'; } ?>  </div></td>
              </tbody>
           <?php $cnt++; } ?>
           

            </table>
          </div>
        </div>
   
		
	
      </div>
    </div>
  </div>
</div>

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By Vikash and Varun</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>


<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script>  
<script src="../js/matrix.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

</script>
</body>
</html>
