<?php
$title = "Edit Profile";
include("header.php");
?>

<?php
$user0 = $_SESSION['users'];
$s0 = mysqli_query($con, "SELECT * FROM  staff where username = '$user0'");

$sh0 = mysqli_fetch_array($s0);
$image = $sh0['picture'];
?>

<?php
if (isset($_POST['update'])) {
	$is = $_GET['is'];
	$fname2 = mysqli_real_escape_string($con, $_POST['fname']);
	$lname2 = mysqli_real_escape_string($con, $_POST['lname']);
	$othname = mysqli_real_escape_string($con, $_POST['mname']);
	$dob2 = mysqli_real_escape_string($con, $_POST['dob']);
	$email2 = mysqli_real_escape_string($con, $_POST['email']);
	$phone2 = mysqli_real_escape_string($con, $_POST['phone']);
	$gender2 = mysqli_real_escape_string($con, $_POST['gender']);
	$level2 = mysqli_real_escape_string($con, $_POST['level']);
	$qualification2 = mysqli_real_escape_string($con, $_POST['qualification']);
	$department2 = mysqli_real_escape_string($con, $_POST['department']);
	$job_description2 = mysqli_real_escape_string($con, $_POST['job']);
	$religion2 = mysqli_real_escape_string($con, $_POST['religion']);
	$marital_status2 = mysqli_real_escape_string($con, $_POST['marital']);
	$address2 = mysqli_real_escape_string($con, $_POST['address']);
	$lga2 = mysqli_real_escape_string($con, $_POST['lga']);
	$state2 = mysqli_real_escape_string($con, $_POST['state']);
	$country2 = mysqli_real_escape_string($con, $_POST['country']);
	$bank2 = mysqli_real_escape_string($con, $_POST['bank']);
	$nok2 = mysqli_real_escape_string($con, $_POST['nok']);
	$rnok2 = mysqli_real_escape_string($con, $_POST['rnok']);
	$pnok2 = mysqli_real_escape_string($con, $_POST['pnok']);
	$salary_status2 = mysqli_real_escape_string($con, $_POST['salary']);
	$account = mysqli_real_escape_string($con, $_POST['acc']);
	$date = date('d-m-y');
	if ($_FILES['file']['name'] == "") {
		$fdir = $image;
	} else {
		$temp = $_FILES["file"]["tmp_name"];
		$name = $_FILES["file"]["name"];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		if ($_FILES["file"]["size"] > 200000) {
			$fdir = "";

			echo "<div class='alert alert-danger '> 
            <a href='#'' class='close' data-dismiss='alert'> 
            &times; 
            </a> 
        <strong class='glyphicon glyphicon-alert'> </strong> <br>
        image too large should not be more than 200kb
        </div>";
		} else {
			$random = uniqid(md5(rand(123456789, 234567891)));
			$newname = $random . "." . $ext;
			move_uploaded_file($_FILES["file"]["tmp_name"], "passport/" . $newname);
			$fdir = "passport/" . $newname;
		}
	}
	$slm = mysqli_query($con, "UPDATE staff set fname = '$fname2', lname= '$lname2', mname = '$othname', dob ='$dob2', email = '$email2', phone = '$phone2',gender = '$gender2', level = '$level2', qualification = '$qualification2', department = '$department2', job_description = '$job_description2', religion = '$religion2', marital_status = '$marital_status2', address = '$address2', lga = '$lga2', state = '$state2', country = '$country2', bank = '$bank2', nok = '$nok2',  rnok = '$rnok2', pnok = '$pnok2', salary_status = '$salary_status2', acc= '$account',last_update = '$date', picture = '$fdir' where username = '$is' ");
	if (!$slm) {
		die(mysqli_error());
	}
}
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading" id="p_heading">
						<?php
						$users = $_SESSION['users'];
						$s1 = mysqli_query($con, "SELECT * FROM staff where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['fname'] . " " . $sh1['lname'];
						$img = $sh1['picture'];
						$department = $sh1['department'];

						if ($img == "") {
							$img2 = "passport/default.png";
						} else {
							$img2 = $img;
						}
						?>
						<img src="<?php echo $img2 ?>" id="imgs" class="img-fluid mx-auto d-block">
						<h4>
							<?php echo $name1 ?>
						</h4>
						<i><?php echo $department ?></i>
					</div>
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
							<table class="table table-bordered">
								<?php
								$user = $_SESSION['users'];
								$s2 = mysqli_query($con, "SELECT * FROM  staff where username = '$users'");
								$sh2 = mysqli_fetch_array($s2);
								$fname = $sh2['fname'];
								$lname = $sh2['lname'];
								$mname = $sh2['mname'];
								$email = $sh2['email'];
								$phone = $sh2['phone'];
								$gender = $sh2['gender'];
								$picture = $sh2['picture'];
								$employee = $sh2['employee'];
								$address = $sh2['address'];
								$religion = $sh2['religion'];
								$lga = $sh2['lga'];
								$state = $sh2['state'];
								$country = $sh2['country'];
								$level = $sh2['level'];
								$qualification = $sh2['qualification'];
								$job = $sh2['job_description'];
								$bank = $sh2['bank'];
								$acc = $sh2['acc'];
								$nok = $sh2['nok'];
								$rnok = $sh2['rnok'];
								$pnok = $sh2['pnok'];
								$salary = $sh2['salary_status'];
								$datee = $sh2['date_employed'];
								$marital = $sh2['marital_status'];
								$last = $sh2['last_update'];
								$birthday = $sh2['dob'];

								function ageProcessor($bday = '')
								{
									$broken_pieces = explode('-', $bday);
									$dob = date_create(date('d-m-Y H:i:s', strtotime($bday)));
									$now = date_create(date('Y-m-d H:i:s'));
									return date_diff($dob, $now)->format('%y');
								}
								$ageget = ageProcessor($birthday);
								$age = $ageget;
								?>
								<tr>
									<th>passport</th>
									<th>
										<div id="image-preview">
											<label for="image-upload" id="image-label">Select</label>
											<input type="file" name="file" class="form-control" id="image-upload" />
										</div>
									</th>
								</tr>
								<tr>
									<th>First name</th>
									<th><input type="" name="fname" id="name" class="form-control"
											value="<?php echo $fname ?>" required></th>
								</tr>
								<tr>
									<th>Last name</th>
									<th><input type="" name="lname" class="form-control" value="<?php echo $lname ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Other name</th>
									<th><input type="" name="mname" class="form-control" value="<?php echo $mname ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Date of birth</th>
									<th><input type="date" name="dob" class="form-control"
											value="<?php echo $birthday ?>" required></th>
								</tr>
								<tr>
									<th>Email </th>
									<th><input type="" name="email" class="form-control" value="<?php echo $email ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Phone</th>
									<th><input type="" name="phone" class="form-control" value="<?php echo $phone ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Gender</th>
									<th><select name="gender" class="form-control" required>
											<option value="">Select</option>
											<option style="display: none;" value="<?php echo $gender ?>"
												selected="<?= $gender ?>">
												<?php echo $gender ?>
											</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select></th>
								</tr>
								<tr>
									<th>Level</th>
									<th><input type="" name="level" class="form-control" value="<?php echo $level ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Qualification</th>
									<th><input type="" name="qualification" class="form-control"
											value="<?php echo $qualification ?>" required></th>
								</tr>
								<tr>
									<th>Department</th>
									<th><select name="department" class="form-control" required>
											<option value="">Select</option>
											<option style="display: none;" value="<?php echo $department ?>"
												selected="selected">
												<?php echo $department ?>
											</option>
											<option value="Art">Art</option>
											<option value="Science">Science</option>
											<option value="Commericial">Commericial</option>
											<option value="Languages">Languages</option>
										</select></th>
								</tr>
								<tr>
									<th>Job description</th>
									<th><input type="" name="job" class="form-control" value="<?php echo $job ?>"
											required></th>
								</tr>
								<tr>
									<th>Religion</th>
									<th><select class="form-control" name="religion" required="">
											<option value="">Select</option>
											<option style="display: none;" value="<?php echo $religion ?>"
												selected="selected">
												<?php echo $religion ?>
											</option>
											<option value="christainity">Christianity</option>
											<option value="islam">Islam</option>
											<option value="others">Others</option>
										</select></th>
								</tr>
								<tr>
									<th>Marital status</th>
									<th><select name="marital" class="form-control" required>
											<option value="">select</option>
											<option style="display: none;" value="<?php echo $marital ?>"
												selected="selected">
												<?php echo $marital ?>
											</option>
											<option value="single">Single</option>
											<option value="Married">Married</option>
										</select></th>
								</tr>
								<tr>
									<th>Address</th>
									<th><input type="" name="address" class="form-control"
											value="<?php echo $address ?>" required></th>
								</tr>
								<tr>
									<th>LGA</th>
									<th><input type="" name="lga" class="form-control" value="<?php echo $lga ?>"
											required></th>
								</tr>
								<tr>
									<th>State</th>
									<th><input type="" name="state" class="form-control" value="<?php echo $state ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Country</th>
									<th><input type="" name="country" class="form-control"
											value="<?php echo $country ?>" required></th>
								</tr>
								<tr>
									<th>Bank name</th>
									<th><input type="" name="bank" class="form-control" value="<?php echo $bank ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Next of Kin</th>
									<th><input type="" name="nok" class="form-control" value="<?php echo $nok ?>"
											required></th>
								</tr>
								<tr>
									<th>Relationship of Next of kin</th>
									<th><input type="" name="rnok" class="form-control" value="<?php echo $rnok ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Next of Kin Phone</th>
									<th><input type="" name="pnok" class="form-control" value="<?php echo $pnok ?>"
											required>
									</th>
								</tr>
								<tr>
									<th>Salary status</th>
									<th><input type="" name="salary" class="form-control" value="<?php echo $salary ?>"
											required></th>
								</tr>
								<tr>
									<th>Account no</th>
									<th><input type="" name="acc" class="form-control" value="<?php echo $acc ?>"
											required></th>
								</tr>
								<tr>
									<th>
										Update
									</th>
									<th>
										<button type="submit" name="update" class="btn btn-pink">Update</button>
									</th>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="img-.js"></script>
<script type="text/javascript" src="select.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#date").datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
</script>

<?php include("../extras/footer.php") ?>