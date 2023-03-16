<?php include("header.php") ?>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel">
				<div class="panel-heading panele" id="p_heading">
					<?php
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con, "SELECT * FROM staff where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname'] . " " . $sh1['lname'];
					$img = $sh1['picture'];
					$employee = $sh1['employee'];
					$department = $sh1['department'];
					// $my_roles = $sh1['role'];
					// if ($my_roles == "") {
					// 	$my_roles = array();
					// } else {
					// 	$my_roles = json_decode($my_roles, true);
					// }
					if ($img == "") {
						$img2 = "passport/default.png";
					} else {
						$img2 = $img;
					}
					$s2  = mysqli_query($con, "SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'];
					$return2 = $sh2['session'];
					$return1 = $sh2['current_semester'];
					?>
					<div class="ig-area">
						<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive dp" width="100px">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $department ?></i>
					</div>
				</div>
				<div class="report">
					<div class="panel-body">
						<h4>Manage staff</h4>
						<!-- <a href="cstaff.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create new staff member</a>
						<a href="manage_faculty.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span>Manage Faculty</a>
						<a href="manage_class.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span>Manage Department</a> -->
					</div>
					<div class="panel-body">
						<div class="table-responsive table-box">
							<table id="staff_data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>SN</th>
										<th>Employees id</th>
										<th>First name</th>
										<th>Last name</th>
										<th>Department</th>
										<!-- <th>View</th> -->
									</tr>
								</thead>
								<tbody id="record">
									<?php
									if (isset($_GET['is']) && isset($_GET['type'])) {
										$type = $_GET['type'];
										$is = $_GET['is'];
										if ($type == "faculty") {
											$faculty_name = $auth->select14('college_name', 'college', 'college_code', $is);
											$s2  = mysqli_query($con, "SELECT * FROM staff WHERE college = '$is' OR college = '$faculty_name'");
										} else {
											$dept_name = $auth->select14('department', 'department', 'dept_code', $is);
											$s2  = mysqli_query($con, "SELECT * FROM staff WHERE department = '$is' OR department = '$dept_name'");
										}
									} else {
										header('location:manage_faculty.php');
									}
									$serial = 0;
									while ($sh2 = mysqli_fetch_array($s2)) {
										$employee = $sh2['employee'];
										$fname = $sh2['fname'];
										$lname = $sh2['lname'];
										$department = $sh2['department'];
										$username = $sh2['username'];
										$serial++;
									?>
										<tr>
											<td><?php echo $serial ?></td>
											<td><?php echo $employee ?></td>
											<td><?php echo $fname ?></td>
											<td><?php echo $lname ?></td>
											<td><?php echo $department ?></td>
											<!-- <td>
												<a href="view_staff.php?is=<?php echo $username ?>" class=" btn btn-pink"><span class="glyphicon glyphicon-eye-open"></span></a>
											</td> -->

										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script>
		$(document).ready(function() {
			$('#staff_data').DataTable();
		});
	</script>