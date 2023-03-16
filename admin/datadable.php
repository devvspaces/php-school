<?php include("header.php") ?>
	<div class="content">
			<div class="col-sm-10 mb-5">
				<div class="content">
					<div id="p_heading">
						<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM admin where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$position = $sh1['position'];
					if($img==""){
						$img2 = "passport/default.png";
					}
					else{
						$img2 = $img;
					}
					?>
					 	<?php include("nav.php") ?>
					</div>

				<div class="panel-body">
					<h4>Manage Administrators</h4>
				</div>
				<div class="panel-body">
<?php
$query ="SELECT * FROM users "; 
$result = mysqli_query($con, $query); ?> 
 <div class="table-responsive table-box">
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
	   		 </div>
	   		</div>
	   	</div>
	   </div>
	   		 	<script> $(document).ready(function(){ $('#employee_data').DataTable(); }); </script> 



