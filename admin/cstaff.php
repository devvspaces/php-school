<?php
$title = "Create New Staff";
include("header.php");
?>
<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="report">
					<div class="panel-body">
						<?php
						if (isset($_POST['create'])) {
							extract($_POST);
							$employee = strtoupper(uniqid());
							$username = md5($employee);

							// $password = uniqid();
							$password2 = md5("staff_1234");
							$type = "staff";
							$date = date("d-m-y");

							if ($auth->countall3('staff', 'email', $email) > 0) {
								$_SESSION['error_msg'] = "Email already exists";
							} elseif ($auth->countall3('staff', 'phone', $phone) > 0) {
								$_SESSION['error_msg'] = "Phone number already exists";
							} else {
								$sql = mysqli_query($con, "INSERT INTO users(userid,userid2,password2,type,dates)VALUES('$employee','$username','$password2','$type','$date')");
								if (!$sql) {
									die(mysqli_error($con));
								} else {
									$users_id = $con->insert_id;
								}
								$faculty = $auth->select14('code', 'department', 'dept_code', $department);
								$sql2 = mysqli_query($con, "INSERT INTO staff(fname,mname,lname,gender,username,employee,job_description,marital_status,address,phone,email,lga,state,country,date_employed,dob,department,college)
							VALUES('$fname','$mname','$lname','$gender','$username','$employee','$job_description','$marital_status','$address','$phone','$email','$lga','$state','$country','$date_employed','$dob','$department','$faculty')");
								if (!$sql2) {
									die(mysqli_error($con));
								} else {
									$staff_id = $con->insert_id;
									$auth->update5('users', 'staff_id', $staff_id, 'sn', $users_id);
									$_SESSION['success_msg'] = "Staff added successfully";
									$details = "$users added a new staff with staff id $employee";
									$auth->Log($users, 'admin', 'create_staff', $details);
								}
							}
						}
						?>

						<?php
						if (isset($_SESSION['success_msg'])) {
							?>
							<div class="alert alert-success ">
								<a href="#" class="close" data-dismiss="alert">
									&times;
								</a>
								<?= $_SESSION['success_msg'] ?>
							</div>
						<?php } ?>




						<?php
						if (isset($_SESSION['error_msg'])) {
							?>
							<div class="alert alert-error">
								<a href="#" class="close" data-dismiss="alert">
									&times;
								</a>
								<?= $_SESSION['error_msg'] ?>
							</div>
						<?php } ?>

						<?php
						unset($_SESSION['success_msg']);
						unset($_SESSION['error_msg']);
						?>
						<form method="POST">
							<div class="row">
								<div class="col-md-6">
									<input type="" name="fname" class="form-control" placeholder="First name"
										required><br>
									<input type="" name="mname" class="form-control" placeholder="Middle name"
										required><br>
									<input type="" name="lname" class="form-control" placeholder="Last name"
										required><br>
									<label>Gender</label>
									<select name="gender" class="form-control" required>
										<option value="">Select</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select><br>
									<label>Job description</label>
									<select name="job_description" class="form-control" required>
										<option value="">Select</option>
										<option value="teaching">Teaching</option>
										<option value="vocational worker">Vocational Worker</option>
										<option value="Administrator">Administrator</option>
									</select><br>
									<label>Marital Status</label>
									<select name="marital_status" class="form-control" required>
										<option value="">Select</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Others">Others</option>
									</select><br>
									<input type="" name="address" class="form-control" placeholder="Address"
										required><br>
								</div>
								<div class="col-md-6">
									<input type="" name="phone" class="form-control" placeholder="Phone number"
										required><br>
									<input type="email" name="email" class="form-control" placeholder="E-mail Address"
										required><br>
									<input type="" name="lga" class="form-control" placeholder="LGA"><br>
									<input type="" name="state" class="form-control" placeholder="State" required><br>
									<input type="" name="country" class="form-control" value="Nigeria"
										placeholder="Country" required><br>

									<label>Employment Date</label>
									<input type="date" name="date_employed" class="form-control"
										placeholder="Employment date"><br>


									<label>DOB</label>
									<input type="date" name="dob" class="form-control" placeholder="DOB" required><br>
									<label>Select Department</label>
									<select name="department" class="form-control" required>
										<option value="">Select Department</option>
										<?php
										$sl3 = mysqli_query($con, "SELECT * FROM department");
										while ($sh13 = mysqli_fetch_array($sl3)) {
											$department = $sh13['department'];
											$dept_code = $sh13['dept_code'];
											?>
											<option value="<?php echo $dept_code ?>">
												<?php echo $department ?>
											</option>
										<?php
										}
										?>
									</select><br>
								</div>
							</div>

							<p class="text-center"><button class="btn btn-pink" name="create">Create</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include("../extras/footer.php") ?>