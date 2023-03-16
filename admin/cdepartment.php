<?php
	$title = "Create New Department";
	include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body">
					<?php
					if (isset($_POST['create'])) {
						$college_code = mysqli_real_escape_string($con, $_POST['college']);
						$college_name = $auth->select14('college_name', 'college', 'college_code', $college_code);
						$dept_name = mysqli_real_escape_string($con, $_POST['dept_name']);
						$dept_code = mysqli_real_escape_string($con, $_POST['dept_code']);

						$dept_name = strtoupper($dept_name);
						$dept_code = strtoupper($dept_code);
						$hod = $_POST['HOD'];
						$date = date("d-m-y");
						$sql = mysqli_query($con, "INSERT INTO department(college,code,department,dept_code,HOD)VALUES('$college_name','$college_code','$dept_name','$dept_code','$hod')");
						if (!$sql) {
							die(mysqli_error($con));
						} else {
							$details = "$users created department $dept_code";
							$auth->Log($users, 'admin', 'create_department', $details);
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
					<form method="POST">
						<input type="" name="dept_code" required placeholder="Department Short Code"
							class="form-control">
						<br>
						<input type="" name="dept_name" required placeholder="Department Name" class="form-control">
						<br>

						<label class="form-label">Select Faculty</label>
						<select name="college" class="form-select" required>
							<option value="">Select Faculty</option>
							<?php
							$sl3 = mysqli_query($con, "SELECT * FROM college");
							while ($sh13 = mysqli_fetch_array($sl3)) {
								$college_name = $sh13['college_name'];
								$college_code = $sh13['college_code'];
								?>
								<option value="<?php echo $college_code ?>">
									<?php echo $college_name ?>
								</option>
							<?php
							}
							?>
						</select><br>

						<label class="form-label">Select HOD</label>
						<select name="HOD" class="form-select">
							<option value="">Select HOD</option>
							<?php
							$sl3 = mysqli_query($con, "SELECT * FROM staff");
							while ($sh13 = mysqli_fetch_array($sl3)) {
								$staff_code = $sh13['employee'];
								$staff_name = $sh13['fname'] . " " . $sh13['lname'];
								?>
								<option value="<?php echo $staff_code ?>">
									<?php echo $staff_name ?>
								</option>
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

<script type="text/javascript">
	$(document).ready(function () {
		$('#dept').change(function () {
			var dept = $(this).val();
			$.ajax({
				url: "department.php",
				method: "POST",
				data: {
					dept: dept
				},
				success: function (data) {
					$("#opt").html(data);
				}
			});
		});
	});
</script>
<?php include("../extras/footer.php") ?>