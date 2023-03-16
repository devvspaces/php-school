<?php
$title = "Profile";
include("header.php");
?>

<div class="viewbox-content">
<div class="content">
	<div class="col-sm-10 mb-5">
		<div class="content">
			<div class="report">
				<div class="panel-body">
					<table class="table table-bordered">
						<?php
						$user = $_SESSION['users'];
						$s2 = mysqli_query($con, "SELECT * FROM  admin where username = '$users'");
						$sh2 = mysqli_fetch_array($s2);
						$fname = $sh2['fname'];
						$lname = $sh2['lname'];
						$mname = $sh2['mname'];
						$email = $sh2['email'];
						$phone = $sh2['phone'];
						$gender = $sh2['gender'];
						$employee = $sh2['employee_id'];
						$last = $sh2['last_update'];
						$job = $sh2['job_description'];
						$department = $sh2['department'];
						?>
						<tr>
							<th>Employee id</th>
							<th><?php echo $employee ?></th>
						</tr>
						<tr>
							<th>First name</th>
							<th>
								<?php echo $fname ?>
							</th>
						</tr>
						<tr>
							<th>Last name</th>
							<th><?php echo $lname ?></th>
						</tr>
						<tr>
							<th>Other name</th>
							<th>
								<?php echo $mname ?>
							</th>
						</tr>

						<tr>
							<th>email </th>
							<th>
								<?php echo $email ?>
							</th>
						</tr>
						<tr>
							<th>Phone</th>
							<th><?php echo $phone ?></th>
						</tr>

						<tr>
							<th>Department</th>
							<th>
								<?php echo $department ?>
							</th>
						</tr>
						<tr>
							<th>Job description</th>
							<th><?php echo $job ?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php include("../extras/footer.php") ?>