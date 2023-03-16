
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
<?php include("header.php") ?>
	<div class="content">
			<div class="col-sm-10 mb-5">
				<div class="content">
					<div id="p_heading">
						<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM admin where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$position = $sh1['position'];
					if($img==""){
						$img2 = "passport/default.png";
					}
					else{
						$img2 = $img;
					}
					?>
					 	<?php include("nav.php") ?>
					</div>
				<div class="panel-body">
					<h4>View Student</h4>
				</div>
				<?php
					$user = $_GET['is'];
					$s2 = mysqli_query($con,"SELECT * FROM  students where username = '$user'");
					$sh2 = mysqli_fetch_array($s2);
					$fname = $sh2['fname'];
					$lname = $sh2['lname'];
					$mname = $sh2['mname'];
					$email = $sh2['email'];
					$phone = $sh2['phone'];
					$matric = $sh2['matric_no'];
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
					$height = $sh2['height'];
					$weight = $sh2['weight'];
					$genotype = $sh2['genotype'];
					$blood_group = $sh2['blood_group']; 
					$student_passport = $sh2['picture'];
					$disabilities = $sh2['disability'];
					$department = $sh2['department'];
					$college = $sh2['college'];
				function ageProcessor($bday = ''){
				$broken_pieces = explode('-',$bday);
				$dob = date_create( date('d-m-Y H:i:s', strtotime($bday)) );
				$now = date_create( date('Y-m-d H:i:s') );
				return date_diff( $dob, $now )->format('%y');
			}
				$ageget =  ageProcessor ($birthday); 
			    if($birthday == ""){
						$age = "";
					}
					else{
						$age = $ageget;
					}
					?>

	
				<div class="panel-body">
					<div id="contentx">
					<div class="thumbnail">
						<h5><span class="glyphicon glyphicon-user"></span> Bio</h5>

						<table class="table table-striped">
							<tr>
								<td class="td-style">Full Name</td>
								<td class="td-style"><?php echo $lname.' '.$mname.' '.$fname ?></td>
								<td><img src="../student/<?php echo $student_passport ?>" class="thumbnail img-responsive" alt="passport" style="height: 120px; width: 120px;" ></td>
							</tr>
							<tr>
								<td class="td-style">Date of birth</td>
								<td class="td-style"><?php echo $birthday ?></td>
								<td></td>
								
							</tr>
							<tr>
								<td class="td-style">Age</td>
								<td class="td-style"><?php echo $age ?></td>
								<td></td>
							</tr>
							<tr>
								<td class="td-style">Gender</td>
								<td class="td-style"><?php echo $gender ?></td>
								<td></td>
							</tr>
							<tr>
								<td class="td-style">LGA</td>
								<td class="td-style"><?php echo $lga ?></td>
								<td></td>
							</tr>
							<tr>
								<td class="td-style">State</td>
								<td class="td-style"><?php echo $state ?></td>
								<td></td>
							</tr>
							<tr>
								<td class="td-style">Country</td>
								<td class="td-style"><?php echo $country ?></td>
								<td></td>
							</tr>
							<tr>
								<td class="td-style">Religion</td>
								<td class="td-style"><?php echo $religion ?></td>
								<td></td>
							</tr>

						</table>
					</div>

					<div class="thumbnail" >
						<h5><span class="glyphicon glyphicon-phone-alt"></span> Contact info </h5>
						<table class="table table-striped">
							<tr>
								<td>Address</td>
								<td><?php echo $address ?></td>
							</tr>

							<tr>
								<td>email</td>
								<td><?php echo $email ?></td>
							</tr>
							<tr>
								<td>phone</td>
								<td><?php echo $phone ?></td>
							</tr>
						</table>

					</div>

					<div class="thumbnail">
						<h5><span class=" fa fa-group"></span> parents/guardian info </h5>
						<table class="table table-striped">
							<tr>
								<td>Name</td>
								<td><?php echo $parents ?></td>
							</tr>
							<tr>
								<td>email</td>
								<td><?php echo $pemail ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?php echo $parentsp1 ?></td>
							</tr>
							<tr>
								<td>Alternative Phone</td>
								<td><?php echo $parentsp2 ?></td>
							</tr>
						</table>
					</div>
					<div class="thumbnail">
						<h5><span class=" fa fa-book"></span> Accademic Details</h5>
						<table class="table table-striped">
							<tr>
								<td>College</td>
							<td><?php echo $college ?></td>
							</tr>
							<tr>
								<td>Department</td>
							<td><?php echo $department ?></td>
							</tr>
							<tr>
								<td>Level</td>
							<td><?php echo $level ?></td>
							</tr>
							<tr>
								<td>Matriculation Number</td>
							<td><?php echo $matric ?></td>
							</tr>
							</table>
					</div>
					<div class="thumbnail">
						<h5><span class=" fa fa-medkit"></span> Physical And Health Details</h5>
						<table class="table table-striped">
							<tr>
								<td>Height</td>
								<td><?php echo $height ?> cm</td>
							</tr>
							<tr>
								<td>Weight</td>
								<td><?php echo $weight ?> Kg</td>
							</tr>
							<tr>
								<td>Blood Group</td>
								<td><?php echo $blood_group ?></td>
							</tr>
							<tr>
								<td>Genotype</td>
								<td><?php echo $genotype ?></td>
							</tr>
							<tr>
								<td>Medical Conditions/ Disabilities</td>
								<td><?php echo $disabilities ?></td>
							</tr>
						</table>
					</div>
				</div>
					<div class="thumbnail">
				<h5><span class="fa fa-wrench"></span> Admin Actions</h5>
			<a href="edit2.php?is=<?php echo $user ?>" class=" btn btn-pink btn-sm" title="edit student"><span class="glyphicon glyphicon-pencil"></span> Edit student's details</a>
            <a href="mss.php?is=<?php echo $user ?>" class=" btn btn-pink btn-sm" title="Manage subject"><span class="glyphicon glyphicon-pencil"></span> Manage Courses</a>
            <a href="reset.php?is=<?php echo $user ?>" class=" btn btn-pink btn-sm" title='reset password'><span class="glyphicon glyphicon-edit"></span> Reset Password</a>
					</div>
				</div>
				<div class="panel-body">
					<p class="text-center"><button class="btn" onclick="generatePDF()"><span class="glyphicon glyphicon-print"></span> Print</button></p>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>