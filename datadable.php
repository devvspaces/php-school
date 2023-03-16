<?php include("conn.php") ?>
<?php
$query ="SELECT * FROM users "; 
$result = mysqli_query($con, $query); ?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title> 
	<script src="jquery.js"></script> 
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	 <script src="datatable/js/jquery.dataTables.min.js"></script> 
	 <script src="datatable/js/dataTables.bootstrap.min.js"></script>
	  <link rel="stylesheet" href="datatable/css/dataTables.bootstrap.min.css" /> </head>
	   <body> <br /><br /> 
	   	<div class="container"> 
	   		<h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3> <br /> <div class="table-responsive table-box">
	   		 <table id="employee_data" class="table table-striped table-bordered"> 
	   		 	<thead> <tr> <td>Name</td> 
	   		 	<td>Address</td> 
	   		 	<td>Gender</td>
	   		 	 <td>Designation</td> 
	   		 	 <td>Age</td> </tr> 
	   		 	</thead> 
	   		 	<?php while($row = mysqli_fetch_array($result)) { 
	   		 		echo ' <tr> <td>'.$row["userid2"].'</td> <td>'.$row["type"].'</td> <td>'.$row["password2"].'</td> <td>'.$row["status"].'</td> <td>'.$row["active"].'</td> </tr> '; 
	   		 		} ?> 
	   		 	</table>
	   		 	 </div>
	   		 	 </div> 
	   		 </body> 
	   		 	</html> 
	   		 	<script> $(document).ready(function(){ $('#employee_data').DataTable(); }); </script> 



