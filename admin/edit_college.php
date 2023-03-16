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
				<h4>Edit Faculty</h4>
				<a href="ccollege.php" class="btn btn-pink">Create Faculty</a>
				<a href="mcollege.php" class="btn btn-pink">Manage Faculties</a>
			</div>
			<div class="panel-body">
				<?php
				if (isset($_POST['create'])) {
					$name = mysqli_real_escape_string($con, $_POST['name']);
					$code = mysqli_real_escape_string($con, $_POST['code']);


					$name = strtoupper($name);
					$code = strtoupper($code);


					$dean = mysqli_real_escape_string($con, $_POST['dean']);
					$sn = $_POST['sn'];
					$date = date("d-m-y");


					$old_faculty_code = $auth->select14('college_code', 'college', 'sn', $sn);
					$old_faculty_name = $auth->select14('college_name', 'college', 'sn', $sn);
					$sql = mysqli_query($con, "UPDATE college set college_name = '$name',college_code = '$code' ,dean = '$dean' where sn = '$sn' ");
					if (!$sql) {
						die(mysqli_error($con));
					} else {
						$auth->update5('course', 'college', $name, 'college', $old_faculty_name);
						$auth->update5('course', 'college_code', $code, 'college_code', $old_faculty_code);


						$auth->update5('department', 'college', $name, 'college', $old_faculty_name);
						$auth->update5('department', 'code', $code, 'code', $old_faculty_code);
						$auth->update5('fees', 'college', $code, 'college', $old_faculty_code);
						$auth->update5('program', 'school', $code, 'school', $old_faculty_code);
				?>
						<div class="alert alert-success ">
							<a href="#" class="close" data-dismiss="alert">
								&times;
							</a>
							Faculty has been updated successfully
						</div>
				<?php
					}
				}
				?>


				<?php
				if (isset($_GET['is'])) {
					$is = $_GET['is'];
					$check_college = mysqli_query($con, "SELECT * FROM college where sn  = '$is'");
					$show_college = mysqli_fetch_array($check_college);
					$sn = $show_college['sn'];
					$code = $show_college['college_code'];
					$college_name = $show_college['college_name'];
					$dean = $show_college['dean'];
					$sn = $show_college['sn'];
				}

				?>
				<form method="POST">
					<input type="hidden" name="sn" value="<?php echo $sn ?>">
					<input type="" name="name" class="form-control" placeholder="title" value="<?php echo $college_name ?>" required><br>
					<input type="" name="code" value="<?php echo $code ?>" class="form-control" placeholder="code" required><br>

					<select name="dean" class="form-control" required>
						<option value="">--Select Dean---</option>
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