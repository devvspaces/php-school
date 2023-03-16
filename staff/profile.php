<?php
$title = "Profile";
include("header.php");
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="panel-heading panele" id="p_heading">
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
						<div class="ig-area">
							<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive dp" width="100px">
							<h4>
								<?php echo $name1 ?>
							</h4>
							<i><?php echo $department ?></i>
						</div>
					</div>
					<div class="rest">
						<div class="">
							<h4 class="mt-4 mb-5 fw-bold">View Staff</h4>
						</div>
						<?php
						$s2 = mysqli_query($con, "SELECT * FROM  staff where username = '$users'");
						$sh2 = mysqli_fetch_array($s2);
						$fname = $sh2['fname'];
						$lname = $sh2['lname'];
						$mname = $sh2['mname'];
						$email = $sh2['email'];
						$phone = $sh2['phone'];
						$gender = $sh2['gender'];
						$address = $sh2['address'];
						$religion = $sh2['religion'];
						$state = $sh2['state'];
						$lga = $sh2['lga'];
						$country = $sh2['country'];
						$last = $sh2['last_update'];
						$birthday = $sh2['dob'];
						$height = $sh2['height'];
						$weight = $sh2['weight'];
						$department = $sh2['department'];
						$employee = $sh2['employee'];
						$genotype = $sh2['genotype'];
						$level = $sh2['level'];
						$qualification = $sh2['qualification'];
						$job = $sh2['job_description'];
						$bank = $sh2['bank'];
						$acc = $sh2['acc'];
						$nok = $sh2['nok'];
						$rnok = $sh2['rnok'];
						$pnok = $sh2['pnok'];
						$anok = $sh2['anok'];
						$salary = $sh2['salary_status'];
						$datee = $sh2['date_employed'];
						$marital = $sh2['marital_status'];
						$blood_group = $sh2['blood_group'];
						$staff_passport = $sh2['picture'];

						function ageProcessor($bday = '')
						{
							$broken_pieces = explode('-', $bday);
							$dob = date_create(date('d-m-Y H:i:s', strtotime($bday)));
							$now = date_create(date('Y-m-d H:i:s'));
							return date_diff($dob, $now)->format('%y');
						}
						$ageget = ageProcessor($birthday);
						if ($birthday == "") {
							$age = "";
						} else {
							$age = $ageget;
						}

						?>


						<div class="panel-body">
							<div class="thumbnail">
								<h5>
									<span class="icon">
										<i data-feather="user"></i>
									</span> Bio
								</h5>

								<table class="table table-striped">
									<tr>
										<td class="td-style">Full Name</td>
										<td class="td-style">
											<?php echo $fname . ' ' . $mname . ' ' . $lname ?>
										</td>
										<td><img src="../staff/<?php echo $img2 ?>" class="thumbnail img-responsive"
												alt="passport" style="height: 120px; width: 120px;"></td>
									</tr>
									<tr>
										<td class="td-style">Date of birth</td>
										<td class="td-style">
											<?php echo $birthday ?>
										</td>
										<td></td>

									</tr>
									<tr>
										<td class="td-style">Age</td>
										<td class="td-style"><?php echo $age ?></td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">Gender</td>
										<td class="td-style">
											<?php echo $gender ?>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">LGA</td>
										<td class="td-style"><?php echo $lga ?></td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">State</td>
										<td class="td-style">
											<?php echo $state ?>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">Country</td>
										<td class="td-style">
											<?php echo $country ?>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">Religion</td>
										<td class="td-style">
											<?php echo $religion ?>
										</td>
										<td></td>
									</tr>
									<tr>
										<td class="td-style">Marital Status</td>
										<td class="td-style">
											<?php echo $marital ?>
										</td>
										<td></td>
									</tr>

								</table>
							</div>

							<div class="thumbnail">
								<h5><span class="icon">
										<i data-feather="phone"></i>
									</span> Contact info </h5>
								<table class="table table-striped">
									<tr>
										<td>Address</td>
										<td>
											<?php echo $address ?>
										</td>
									</tr>

									<tr>
										<td>email</td>
										<td><?php echo $email ?></td>
									</tr>
									<tr>
										<td>phone</td>
										<td>
											<?php echo $phone ?>
										</td>
									</tr>
								</table>

							</div>

							<div class="thumbnail">
								<h5><span class="icon">
										<i data-feather="user"></i>
									</span> Next of Kin</h5>
								<table class="table table-striped">
									<tr>
										<td>Name</td>
										<td>
											<?php echo $nok ?>
										</td>
									</tr>
									<tr>
										<td>Relationship</td>
										<td><?php echo $rnok ?></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											<?php echo $pnok ?>
										</td>
									</tr>
									<tr>
										<td>Address</td>
										<td>
											<?php echo $anok ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<h5>
									<span class="icon">
										<i data-feather="info"></i>
									</span> Job details
								</h5>
								<table class="table table-striped">
									<tr>
										<td>Department</td>
										<td>
											<?php echo $department ?>
										</td>
									</tr>
									<tr>
										<td>Job Description</td>
										<td><?php echo $job ?></td>
									</tr>
									<tr>
										<td>Level</td>
										<td>
											<?php echo $level ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<h5>
									<span class="icon">
										<i data-feather="briefcase"></i>
									</span> Salary & Bank Details
								</h5>
								<table class="table table-striped">
									<tr>
										<td>Bank Name</td>
										<td>
											<?php echo $bank ?>
										</td>
									</tr>
									<tr>
										<td>Account</td>
										<td><?php echo $acc ?></td>
									</tr>
									<tr>
										<td>Salary Structure</td>
										<td>
											<?php echo $salary ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<h5><span class="icon">
										<i data-feather="activity"></i>
									</span> Physical And Health Details</h5>
								<table class="table table-striped">
									<tr>
										<td>Height</td>
										<td>
											<?php echo $height ?>
										</td>
									</tr>
									<tr>
										<td>Weight</td>
										<td><?php echo $weight ?></td>
									</tr>
									<tr>
										<td>Blood Group</td>
										<td>
											<?php echo $blood_group ?>
										</td>
									</tr>
									<tr>
										<td>Genotype</td>
										<td><?php echo $genotype ?></td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<a href="edit.php?is=<?php echo $users ?>" class="btn btn-pink">
									<span class="icon">
										<i data-feather="edit-3"></i>
									</span> Edit staff
								</a>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include("../extras/footer.php") ?>