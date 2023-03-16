<?php
include("header.php");
include("../class.php");
?>
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
				<div class="panel-body">
					<!-- <a href="manage_faculty.php" class="btn btn-pink">Manage Faculties</a><br><br> -->
					<?php
					if (isset($_POST['create'])) {
						$name = mysqli_real_escape_string($con, $_POST['name']);
						$code = mysqli_real_escape_string($con, $_POST['code']);
						$sn = $_POST['sn'];

						$old_name = $auth->select14('department', 'department', 'sn', $sn);
						$old_code = $auth->select14('department', 'dept_code', 'sn', $sn);
						$date = date("d-m-y");
						$sql = mysqli_query($con, "UPDATE department set department = '$name',dept_code = '$code' where sn = '$sn' ");
						if (!$sql) {
							die(mysqli_error($con));
						} else {
							$auth->update5('staff', 'department', $name, 'department', $old_name);
							$auth->update5('staff', 'department', $code, 'department', $old_code);
					?>
							<div class="alert alert-success ">
								<a href="#" class="close" data-dismiss="alert">
									&times;
								</a>
								Department has been updated successfully
							</div>
					<?php
						}
					}
					?>


					<?php
					if (isset($_GET['is'])) {
						$is = $_GET['is'];
						$check_college = mysqli_query($con, "SELECT * FROM department where sn  = '$is'");
						$show_college = mysqli_fetch_array($check_college);
						$sn = $show_college['sn'];
						$code = $show_college['dept_code'];
						$college_name = $show_college['department'];
						$dean = $show_college['HOD'];
					}
					?>
					<form method="POST">
						<input type="hidden" name="sn" value="<?php echo $sn ?>">
						<label>Department Name</label>
						<input type="" name="name" class="form-control" placeholder="title" value="<?php echo $college_name ?>" required><br>
						<label>Department Short Code</label>
						<input type="" name="code" value="<?php echo $code ?>" class="form-control" placeholder="code" required><br>
						<label>Department HOD</label>
						<select name="HOD" class="form-control" required disabled>
							<option value="">--Select HOD---</option>
							<?php
							$sl3 = mysqli_query($con, "SELECT * FROM staff");
							while ($sh13 = mysqli_fetch_array($sl3)) {
								$staff_code = $sh13['employee'];
								$x = '';
								if ($dean == $staff_code) {
									$x = 'selected';
								}
								$staff_name = $sh13['fname'] . " " . $sh13['lname'];
							?>
								<option <?= $x ?> value="<?php echo $staff_code ?>"><?php echo $staff_name ?> (<?= $staff_code ?>)</option>
							<?php
							}
							?>
						</select><br>
						<br>
						<button class="btn btn-primary" name="create">Update</button>
					</form>
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