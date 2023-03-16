<?php
include("header.php");
include("../class.php");
?>
<div class="content">
	<div class="col-sm-10 mb-5">
		<div class="content">
			<div id="p_heading">
				<?php
				$users = $_SESSION['users'];
				$s1  = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
				$sh1 = mysqli_fetch_array($s1);
				$name1 = $sh1['fname'] . " " . $sh1['lname'];
				$img = $sh1['picture'];
				$position = $sh1['position'];
				if ($img == "") {
					$img2 = "passport/default.png";
				} else {
					$img2 = $img;
				}
				?>
				<?php include("nav.php") ?>
			</div>

			<div class="panel-body">
				<h4>Edit Department</h4>
				<a href="cdepartment.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create new Department</a>
				<a href="mdepartment.php" class="btn btn-pink"> Manage Departments</a>
			</div>
			<div class="panel-body">
				<?php
				if (isset($_POST['create'])) {
					$hod = mysqli_real_escape_string($con, $_POST['hod']);
					$name = mysqli_real_escape_string($con, $_POST['name']);
					$code = mysqli_real_escape_string($con, $_POST['code']);

					$name = strtoupper($name);
					$code = strtoupper($code);

					$sn = $_POST['sn'];
					$date = date("d-m-y");
					$old_dept = $auth->select14('dept_code', 'department', 'sn', $sn);
					$old_dept2 = $auth->select14('department', 'department', 'sn', $sn);
					$sql = mysqli_query($con, "UPDATE department set department = '$name',dept_code = '$code' ,HOD = '$hod' where sn = '$sn' ");
					if (!$sql) {
						die(mysqli_error($con));
					} else {
						$auth->update5('admin', 'department', $code, 'department', $old_dept);
						$auth->update5('course', 'dept_code', $code, 'dept_code', $old_dept);
						$auth->update5('course', 'department', $name, 'department', $old_dept2);
						$auth->update5('fees', 'department', $code, 'department', $old_dept);
						$auth->update5('gone_staff', 'department', $code, 'department', $old_dept);
						$auth->update5('left_students', 'department', $code, 'department', $old_dept);
						$auth->update5('program', 'department', $code, 'department', $old_dept);
						$auth->update5('staff', 'department', $code, 'department', $old_dept);
						$auth->update5('students', 'department', $code, 'department', $old_dept);


						$details = "$users changed department name from $old_dept to $code";
						$auth->Log($users, 'admin', 'create_staff', $details);
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
					$code = $show_college['code'];
					$college_name = $show_college['college'];
					$hod = $show_college['HOD'];
					$department = $show_college['department'];
					$dept_code  = $show_college['dept_code'];
					$sn = $show_college['sn'];
				}

				?>
				<form method="POST">
					<label>Faculty</label>
					<input type="" name="collegename" readonly="" class="form-control" value="<?php echo $college_name . " ($code)" ?>"><br>
					<input type="hidden" name="sn" value="<?php echo $sn ?>">

					<input type="" name="name" class="form-control" placeholder="title" value="<?php echo $department ?>" required><br>
					<input type="" name="code" value="<?php echo $dept_code ?>" class="form-control" placeholder="code" required><br>

					<select name="hod" class="form-control">
						<option value="">--Select HOD---</option>
						<?php
						$sl3 = mysqli_query($con, "SELECT * FROM staff");
						while ($sh13 = mysqli_fetch_array($sl3)) {
							$staff_code = $sh13['employee'];
							$x = '';
							if ($hod == $staff_code) {
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
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#dept').change(function() {
			var dept = $(this).val();
			$.ajax({
				url: "department.php",
				method: "POST",
				data: {
					dept: dept
				},
				success: function(data) {
					$("#opt").html(data);
				}
			});
		});
	});
</script>