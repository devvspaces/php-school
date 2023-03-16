<?php
$title = "Create Faculty";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">

				<div class="panel-body mb-4">
					<a href="mcollege.php" class="btn btn-pink">Manage Faculties</a>
				</div>
				<div class="panel-body">
					<?php
					if (isset($_POST['create'])) {
						$name = mysqli_real_escape_string($con, $_POST['name']);
						$code = mysqli_real_escape_string($con, $_POST['code']);
						$dean = mysqli_real_escape_string($con, $_POST['dean']);

						$name = strtoupper($name);
						$code = strtoupper($code);
						if ($auth->countall3('college', 'college_code', $code) > 0) {
							echo "Faculty Short Code already exists";
						} elseif ($auth->countall3('college', 'college_name', $name) > 0) {
							echo "Faculty name already exists";
						} else {
							$date = date("d-m-y");
							$sql = mysqli_query($con, "INSERT INTO college(college_name,college_code,dean)VALUES('$name','$code','$dean')");
							if (!$sql) {
								die(mysqli_error($con));
							} else {
								?>
								<div class="alert alert-success ">
									<a href="#" class="close" data-dismiss="alert">
										&times;
									</a>
									Faculty has been added successfully
								</div>
							<?php
							}
						}
					}
					?>
					<form method="POST">
						<input type="" name="name" class="form-control" placeholder="Faculty Name" required><br>
						<input type="" name="code" class="form-control" placeholder="Faculty Short Code" required><br>

						<select name="dean" class="form-control">
							<option value="">Dean</option>
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
						</select>
						<button class="btn btn-pink mt-3" name="create">Create</button>
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