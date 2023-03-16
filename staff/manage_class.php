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
				<div class="rest">
					<div class="">
						<?php
						$check_query = mysqli_query($con, "SELECT * FROM college where dean = '$employee'");
						$mon = mysqli_num_rows($check_query);

						$check_query_hod = mysqli_query($con, "SELECT * FROM department where HOD = '$employee'");
						$hod = mysqli_num_rows($check_query_hod);
						if ($mon != 0) {
							// echo "<h4 class='text-center'>YA A DEAN</h4>";
						} elseif ($hod != 0) {
							// echo "<h4 class='text-center'>YA AN HOD</h4>";
						} else {
							echo "<h4 class='text-center'>You are not Currently An Administrative Staff</h4>";
						}


						?>
						</tbody>
						</table>
					</div>
				</div>


				<div class="table-responsive table-box" id="record">
					<table id="attendance_data" class="table table-bordered table-striped">
						<thead id="data">
							<tr>
								<th>SN</th>
								<th>Faculty Code</th>
								<th>Faculty Name</th>
								<th>HOD</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$faculty_code = $_GET['is'];
							$serial = 0;
							$s2  = mysqli_query($con, "SELECT * FROM department WHERE code = '$faculty_code'");
							while ($sh2 = mysqli_fetch_array($s2)) {
								$sn = $sh2['sn'];
								$code = $sh2['dept_code'];
								$department = $sh2['department'];
								$HOD = $sh2['HOD'];
								if ($HOD == "" || $auth->countall3('staff', 'employee', $HOD) < 1) {
									$HOD = "N/A";
								}
								$serial++;
							?>

								<tr>
									<td><?php echo $serial ?></td>
									<td><?php echo $code ?></td>
									<td><?php echo $department ?></td>
									<td><?php echo $HOD ?></td>
									<td></a>
										<a href="edit_dept.php?is=<?php echo $sn ?>" class=" btn btn-pink btn-sm">Edit</span></a>
										<a href="manage_staff.php?is=<?php echo $code ?>&type=department" class=" btn btn-pink btn-sm">Staffs</span></a>
									</td>
								</tr>

							<?php
							}
							?>
						</tbody>
					</table>
					<!-- pagenation -->
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>
	<script>
		$(document).ready(function() {
			$('#attendance_data').DataTable();
		});
	</script>