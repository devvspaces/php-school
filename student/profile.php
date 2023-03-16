<?php
$title = "Profile";
include("header.php");
?>
<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="rest">
						<?php
						$s2 = mysqli_query($con, "SELECT * FROM  students where username = '$users'");
						$sh2 = mysqli_fetch_array($s2);
						$fname = $sh2['fname'];
						$lname = $sh2['lname'];
						$mname = $sh2['mname'];
						$email = $sh2['email'];
						$phone = $sh2['phone'];
						$admission = $sh2['matric_no'];
						$gender = $sh2['gender'];
						$college = $sh2['college'];
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
						$height = $sh2['height'];
						$weight = $sh2['weight'];
						$genotype = $sh2['genotype'];
						$blood_group = $sh2['blood_group'];
						$student_passport = $sh2['picture'];
						$disabilities = $sh2['disability'];
						$department = $sh2['department'];
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
								<h5><span class="glyphicon glyphicon-user"></span> Bio</h5>

								<table class="table table-striped">
									<tr>
										<td class="td-style">Full Name</td>
										<td class="td-style">
											<?php echo $lname . ' ' . $mname . ' ' . $fname ?>
										</td>
										<td><img src="../student/<?php echo $student_passport ?>"
												class="thumbnail img-responsive" alt="passport"
												style="height: 120px; width: 120px;"></td>
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

								</table>
							</div>

							<div class="thumbnail">
								<h5><span class="glyphicon glyphicon-phone-alt"></span> Contact info </h5>
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
								<h5><span class=" fa fa-group"></span> Parents / Guardian info </h5>
								<table class="table table-striped">
									<tr>
										<td>Name</td>
										<td>
											<?php echo $parents ?>
										</td>
									</tr>
									<tr>
										<td>email</td>
										<td><?php echo $pemail ?></td>
									</tr>
									<tr>
										<td>Phone</td>
										<td>
											<?php echo $parentsp1 ?>
										</td>
									</tr>
									<tr>
										<td>Alternative Phone</td>
										<td>
											<?php echo $parentsp2 ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<h5><span class=" fa fa-book"></span> Academic Details</h5>
								<table class="table table-striped">
									<tr>
										<td>Level</td>
										<td>
											<?php echo $level ?>
										</td>
									</tr>
									<tr>
										<td>Matric Number</td>
										<td><?php echo $admission ?></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td>College</td>
										<td>
											<?php echo $college ?>
										</td>
									</tr>
									<tr>
										<td>Department</td>
										<td><?php echo $department ?></td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<h5><span class=" fa fa-medkit"></span> Physical And Health Details</h5>
								<table class="table table-striped">
									<tr>
										<td>Height</td>
										<td>
											<?php echo $height ?> cm
										</td>
									</tr>
									<tr>
										<td>Weight</td>
										<td><?php echo $weight ?> Kg</td>
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
									<tr>
										<td>Medical Conditions/ Disabilities</td>
										<td>
											<?php echo $disabilities ?>
										</td>
									</tr>
								</table>
							</div>
							<div class="thumbnail">
								<a href="edit.php?is=<?php echo $users ?>" class="btn btn-pink"
									title="edit student"><span class="icon">
										<i data-feather="edit-3"></i>
									</span> Edit details</a>
								<?php
								$sql1 = mysqli_query($con, "SELECT * FROM result_access");
								$sql2 = mysqli_fetch_array($sql1);
								$status = $sql2['jss3'];
								if ($status == 1 && $class == "JSS3") {
									?>
									<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm"
										class="btn btn-pink"><span class=""></span>choose your class</a>
									<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
										aria-labelledby="mySmallModalLabel">
										<div class="modal-dialog modal-sm" role="document">
											<div class="modal-content" style="padding: 10px;" id="if">
												<div class="modal-header">Choose your class for ss1</div>
												<select class="form-control" id="clas3">
													<option value="">Select</option>
													<option value="SS1_science">SS1_science</option>
													<option value="SS1_art">SS1_art</option>
													<option value="SS1_commericial">SS1_commericial</option>
												</select>
												<div class="modal-footer">
													<button class="btn btn-sm btn-danger"
														data-dismiss="modal">cancel</button>
													<button class="btn btn-sm btn-success" id="btn2">Save</button>
												</div>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#btn2').click(function () {
			var clas3 = $('#clas3').val();
			var id = "<?php echo $users ?>";
			$.ajax({
				url: "mon.php",
				method: "POST",
				data: {
					clas3,
					clas3,
					id: id,
				},
				success: function (data) {
					$('.modal-content').html(data);
					setTimeout(function () {
						window.location.reload();
					}, 2000);
				}
			});
		});
	});
</script>
<?php include("../extras/footer.php") ?>