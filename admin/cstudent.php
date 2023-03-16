<?php
$title = "Create new student";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">

				<div class="report">
					<div class="panel-body">
						<a href="student_records.php" class="btn btn-pink mb-2">
							<span class="icon">
								<i data-feather="bar-chart-2"></i>
							</span>
							Student population
						</a>
						<a href="inactive_students.php" class="btn btn-pink mb-2">
							<span class="icon">
								<i data-feather="slash"></i>
							</span>
							Inactive students
						</a>
						<a class="btn btn-pink mb-2" href="imports.php">
							<span class="icon">
								<i data-feather="upload"></i>
							</span>
							Import students
						</a>
						<a class="btn btn-pink mb-2" href="student_excos.php">
							<span class="icon">
								<i data-feather="users"></i>
							</span>
							Student Excos
						</a>
					</div>
					<div class="panel-body">
						<?php
						if (isset($_POST['create'])) {
							$admission = mysqli_real_escape_string($con, $_POST['admission']);
							$username = $admission;
							$fname = mysqli_real_escape_string($con, $_POST['fname']);
							$lname = mysqli_real_escape_string($con, $_POST['lname']);
							$adate = mysqli_real_escape_string($con, $_POST['adate']);
							$batch = mysqli_real_escape_string($con, $_POST['batch']);


							$gender = mysqli_real_escape_string($con, $_POST['gender']);
							$level = mysqli_real_escape_string($con, $_POST['level']);
							$faculty = mysqli_real_escape_string($con, $_POST['faculty']);
							$department = mysqli_real_escape_string($con, $_POST['department']);
							$username2 = md5($username);
							$password2 = md5("passcode_1234");
							$type = "student";
							$date = date("d-m-y");
							$verify = mysqli_query($con, "SELECT * FROM users where userid = '$admission'");
							$num = mysqli_num_rows($verify);
							if ($num > 0) {
								die("admission number already exist");
							}
							$sql2 = mysqli_query($con, "INSERT INTO students(fname,lname,gender,level,college,department,username,date_admitted,batch)
						VALUES('$fname','$lname','$gender','$level','$faculty', '$department','$username2','$adate','$batch')");

							// $parents_id = $username . "_parent";
							// $password = "progenitor_1234";
							// $type = "parent";
							// $date = date("d-m-Y");
							// $en_par = md5($parents_id);
							// $en_password = md5($password);
							// $insert_user = mysqli_query($con, "INSERT INTO users(userid, userid2, password2, type, dates, status)VALUES ('$parents_id','$en_par','$en_password','$type','$date','0')");
							// if (!$insert_user) {
							// 	die("user error" . mysqli_error($con));
							// } else {
							// 	$insert_parent = mysqli_query($con, "INSERT INTO parent(parent_id, ward_id, ward_id2,username)VALUES ('$parents_id','$username','$username2','$en_par')");
							// }
							// if (!$insert_parent) {
							// 	die("parent error" . mysqli_error($con));
							// }
							if (!$sql2) {
								die(mysqli_error($con));
							} else {
								$last_id = $con->insert_id;
								$ID1 = str_pad($last_id, 4, "0", STR_PAD_LEFT);
								$matric_no = "mat" . $ID1;
								$auth->update5('students', 'matric_no', $matric_no, 'sn', $last_id);


								$sql = mysqli_query($con, "INSERT INTO users(userid,userid2,password2,type,dates)VALUES('$matric_no','$username2','$password2','$type','$date')");
								if (!$sql) {
									die(mysqli_error($con));
								}
								?>
								<div class="alert alert-success ">
									<a href="#" class="close" data-dismiss="alert">
										&times;
									</a>
									The student has been added successfully
								</div>
							<?php
							}
						}
						?>
						<form method="POST">
							<input type="" name="admission" class="form-control" placeholder="admission No"
								required><br>
							<input type="" name="fname" class="form-control" placeholder="First name" required><br>
							<input type="" name="lname" class="form-control" placeholder="Last name" required><br>
							<label>Admission Date</label>
							<input type="date" name="adate" class="form-control" placeholder="Admission date"
								required><br>
							<select name="batch" class="form-control class">
								<option value="">Select Admission batch</option>
								<?php
								$sl3 = mysqli_query($con, "SELECT * FROM session");
								while ($session1 = mysqli_fetch_array($sl3)) {
									$session = $session1['session'];
									$college_code = $session1['college_code'];
									?>
									<option value="<?php echo $session ?>">
										<?php echo $session ?>
									</option>
								<?php
								}
								?>
							</select><br>
							<select name="gender" class="form-control class">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select><br>


							<select name="level" class="form-control class">
								<option value="">Select Level</option>
								<option value="100">100 Level</option>
								<option value="200">200 Level</option>
								<option value="300">300 Level</option>
								<option value="400">400 Level</option>
								<option value="500">500 Level</option>
							</select><br>


							<select name="faculty" class="form-control class">
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
							<lablel>Select Department</lablel>
							<select name="department" class="form-control" id="opt">
								<option value="">Select Faculty first</option>
								<div></div>
							</select><br>
							<p class="text-center"><button class="btn btn-primary" name="create">Create</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.class').change(function () {
			var clas = $(this).val();
			$.ajax({
				url: "class_arm.php",
				method: "POST",
				data: {
					clas: clas
				},
				success: function (data) {
					$("#opt").html(data);
				}
			});
		});
	});
</script>
<?php include("../extras/footer.php") ?>