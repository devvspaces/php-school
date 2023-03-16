<?php
$title = "Edit Profile";
$nav = "Profile";
include("header.php");
?>

<?php
$user0 = $_SESSION['users'];
$s0 = mysqli_query($con, "SELECT * FROM  students where username = '$user0'");

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
	$religion2 = mysqli_real_escape_string($con, $_POST['religion']);
	$address2 = mysqli_real_escape_string($con, $_POST['address']);
	$lga2 = mysqli_real_escape_string($con, $_POST['lga']);
	$state2 = mysqli_real_escape_string($con, $_POST['state']);
	$country2 = mysqli_real_escape_string($con, $_POST['country']);
	$parents2 = mysqli_real_escape_string($con, $_POST['parents']);
	$parentsp22 = mysqli_real_escape_string($con, $_POST['parentsp2']);
	$parentsp12 = mysqli_real_escape_string($con, $_POST['parentsp1']);
	$p_email2 = mysqli_real_escape_string($con, $_POST['parentse']);
	$date = date('d-m-y');
	if ($_FILES['file']['name'] == "") {
		$fdir = $image;
	} else {
		$temp = $_FILES["file"]["tmp_name"];
		$name = $_FILES["file"]["name"];
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		if ($_FILES["file"]["size"] > 200000) {
			echo "<div class='alert alert-danger '> 
            <a href='#'' class='close' data-dismiss='alert'> 
            &times; 
            </a> 
        <strong class='glyphicon glyphicon-alert'> </strong> <br>
       image too large should not be more than 200kb
        </div>";
			$fdir = "";
		} else {
			$random = uniqid(md5(rand(123456789, 234567891)));
			$newname = $random . "." . $ext;
			move_uploaded_file($_FILES["file"]["tmp_name"], "passport/" . $newname);
			$fdir = "passport/" . $newname;
		}
	}
	$slm = mysqli_query($con, "UPDATE students set fname = '$fname2', lname= '$lname2', mname = '$othname', dob ='$dob2', email = '$email2', phone = '$phone2',gender = '$gender2',  religion = '$religion2',address = '$address2', lga = '$lga2', state = '$state2', country = '$country2', parents = '$parents2', parents_phone1 = '$parentsp12', parents_phone2  = '$parentsp22', p_email = '$p_email2',   last_update = '$date', picture = '$fdir' where username = '$is' ");
	if (!$slm) {
		die(mysqli_error($con));
	}
}
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-bordered">
							<?php
							$user = $_SESSION['users'];
							$s2 = mysqli_query($con, "SELECT * FROM  students where username = '$users'");
							$sh2 = mysqli_fetch_array($s2);
							$fname = $sh2['fname'];
							$lname = $sh2['lname'];
							$mname = $sh2['mname'];
							$email = $sh2['email'];
							$phone = $sh2['phone'];
							$admission = $sh2['matric_no'];
							$gender = $sh2['gender'];
							$level = $sh2['level'];
							$address = $sh2['address'];
							$parents = $sh2['parents'];
							$parentsp1 = $sh2['parents_phone1'];
							$parentsp2 = $sh2['parents_phone2'];
							$pemail = $sh2['p_email'];
							$religion = $sh2['religion'];
							$state = $sh2['state'];
							$lga = $sh2['lga'];
							$country = $sh2['country'];
							$batch = $sh2['batch'];
							$last = $sh2['last_update'];
							$birthday = $sh2['dob'];
							$picture = $sh2['picture'];
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
								<form method="POST" enctype="multipart/form-data">
									<th>Passport</th>
									<th>
										<div id="image-preview">
											<label for="image-upload" id="image-label">Select</label>
											<input type="file" accept="image/*" name="file" class="form-control"
												id="image-upload" />
										</div>
									</th>
							</tr>

							<tr>
								<th>Last name</th>
								<th><input type="" name="lname" class="form-control" value="<?php echo $lname ?>"
										readonly required></th>
							</tr>
							<tr>
								<th>First name</th>
								<th><input type="" name="fname" id="name" class="form-control"
										value="<?php echo $fname ?>" readonly required></th>
							</tr>
							<tr>
								<th>Other name</th>
								<th><input type="" name="mname" class="form-control" value="<?php echo $mname ?>"
										readonly required></th>
							</tr>
							<tr>
								<th>Date of Birth</th>
								<th><input type="date" name="dob" class="form-control" value="<?php echo $birthday ?>"
										readonly></th>
							</tr>
							<tr>
								<th>Email </th>
								<th><input type="" name="email" class="form-control" value="<?php echo $email ?>"
										readonly></th>
							</tr>
							<tr>
								<th>Phone</th>
								<th><input type="" name="phone" class="form-control" value="<?php echo $phone ?>"
										readonly></th>
							</tr>
							<tr>
								<th>Gender</th>
								<th><select name="gender" class="form-control" disabled>
										<option value="">Select</option>
										<option style="display: none;" value="<?php echo $gender ?>"
											selected="selected">
											<?php echo $gender ?>
										</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select></th>
							</tr>
							<tr>
								<th>Religion</th>
								<th><select class="form-control" name="religion" required>
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
								<th>Address</th>
								<th><input type="" name="address" class="form-control" value="<?php echo $address ?>"
										required></th>
							</tr>
							<tr>
								<th>LGA</th>
								<th><input type="" name="lga" class="form-control" value="<?php echo $lga ?>" required>
								</th>
							</tr>
							<tr>
								<th>State</th>
								<th><input type="" name="state" class="form-control" value="<?php echo $state ?>"
										required></th>
							</tr>
							<tr>
								<th>Country</th>
								<th><input type="" name="country" class="form-control" value="<?php echo $country ?>"
										readonly></th>
							</tr>
							<tr>
								<th>Parent's name</th>
								<th><input type="" name="parents" class="form-control" value="<?php echo $parents ?>"
										required></th>
							</tr>
							<tr>
								<th>Parent's phone</th>
								<th><input type="" name="parentsp1" class="form-control"
										value="<?php echo $parentsp1 ?>" required></th>
							</tr>
							<tr>
								<th>Parent's phone 2</th>
								<th><input type="" name="parentsp2" class="form-control"
										value="<?php echo $parentsp2 ?>" required></th>
							</tr>
							<tr>
								<th>Parent's email</th>
								<th><input type="" name="parentse" class="form-control" value="<?php echo $pemail ?>"
										required></th>
							</tr>
						</table>
						<p class="text-center"><button type="submit" name="update"
								class="btn btn-success">update</button>
						</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../img-.js"></script>
<script type="text/javascript" src="select.js"></script>

<script type="text/javascript" src="bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#date").datepicker({
			format: "dd-mm-yyyy",
			autoclose: true
		});
	});
</script>

<?php include("../extras/footer.php") ?>