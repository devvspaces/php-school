<?php include("header.php") ?>
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
				<h4>Create New Department</h4>
			</div>
			<div class="panel-body">
				<?php
				if (isset($_POST['create'])) {
					$college1_name = mysqli_real_escape_string($con, $_POST['collegename']);
					$college1_code = mysqli_real_escape_string($con, $_POST['collegecode']);
					$dept_name = mysqli_real_escape_string($con, $_POST['dept_name']);
					$dept_code = mysqli_real_escape_string($con, $_POST['dept_code']);
					$hod = $_POST['HOD'];
					$date = date("d-m-y");
					$sql = mysqli_query($con, "INSERT INTO department(college,code,department,dept_code,HOD)VALUES('$college1_name','$college1_code','$dept_name','$dept_code','$hod')");
					if (!$sql) {
						die(mysqli_error($con));
					} else {
				?>
						<div class="alert alert-success ">
							<a href="#" class="close" data-dismiss="alert">
								&times;
							</a>
							Department has been added successfully
						</div>
				<?php
					}
				}
				?>
				<?php
				$is = $_GET['is'];
				$s2  = mysqli_query($con, "SELECT * FROM college where college_code = '$is'  ");
				$sh2 = mysqli_fetch_array($s2);
				$sn = $sh2['sn'];
				$college_name = $sh2['college_name'];
				$college_code = $sh2['college_code'];				?>
				<form method="POST">
					<input type="" name="collegecode" readonly="" class="form-control" value="<?php echo $college_code ?>">
					<br>
					<input type="" name="collegename" readonly="" class="form-control" value="<?php echo $college_name ?>">
					<br>
					<input type="" name="dept_name" class="form-control" placeholder="title" required><br>
					<input type="" name="dept_code" class="form-control" placeholder="code" required><br>

					<select name="HOD" class="form-control" required>
						<option value="">HOD</option>
						<?php
						$sl3 = mysqli_query($con, "SELECT * FROM staff");
						while ($sh13 = mysqli_fetch_array($sl3)) {
							$staff_code = $sh13['employee'];
							$staff_name = $sh13['fname'] . " " . $sh13['lname'];
						?>
							<option value="<?php echo $staff_code ?>"><?php echo $staff_name ?></option>
						<?php
						}
						?>
					</select><br>
					<br>
					<button class="btn btn-primary" name="create">Create</button>
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