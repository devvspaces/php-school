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
					<h4> Edit Profile</h4>
				</div>
				<div class="panel-body">
				<?php
if(isset($_POST['update'])){
$is = $_GET['is'];
$fname2 = mysqli_real_escape_string($con,$_POST['fname']);
$lname2 = mysqli_real_escape_string($con,$_POST['lname']);
$othname = mysqli_real_escape_string($con,$_POST['mname']);
$dob2 = mysqli_real_escape_string($con,$_POST['dob']);
$level2 = mysqli_real_escape_string($con,$_POST['level']);
$email2 = mysqli_real_escape_string($con,$_POST['email']);  
$phone2 = mysqli_real_escape_string($con,$_POST['phone']);
$gender2 = mysqli_real_escape_string($con,$_POST['gender']);
$religion2 = mysqli_real_escape_string($con,$_POST['religion']);
$address2 = mysqli_real_escape_string($con,$_POST['address']);
$lga2 = mysqli_real_escape_string($con,$_POST['lga']);
$state2 = mysqli_real_escape_string($con,$_POST['state']);
$country2 = mysqli_real_escape_string($con,$_POST['country']);
$parents2 = mysqli_real_escape_string($con,$_POST['parents']);
$parentsp22 = mysqli_real_escape_string($con,$_POST['parentsp2']);
$parentsp12 = mysqli_real_escape_string($con,$_POST['parentsp1']);
$p_email2 = mysqli_real_escape_string($con,$_POST['parentse']);
$height = mysqli_escape_string($con, $_POST['height']);
$weight = mysqli_escape_string($con, $_POST['weight']);
$genotype = mysqli_escape_string($con, $_POST['genotype']);
$blood_group = mysqli_real_escape_string($con, $_POST['blood_group']);
$disability2 = mysqli_real_escape_string($con,$_POST['disability']);
$department2 = $_POST['department'];
$college2 = $_POST['college2'];
$date = date('d-m-y');
$slm = mysqli_query($con,"UPDATE students set fname = '$fname2', lname= '$lname2', mname = '$othname', dob ='$dob2', email = '$email2', phone = '$phone2',gender = '$gender2',  religion = '$religion2',address = '$address2', lga = '$lga2', state = '$state2', country = '$country2', parents = '$parents2', parents_phone1 = '$parentsp12', parents_phone2  = '$parentsp22', p_email = '$p_email2',   last_update = '$date', level = '$level2',height = '$height', weight = '$weight',blood_group = '$blood_group', genotype = '$genotype', disability = '$disability2',college= '$college2', department = '$department2' where username = '$is' ");
if(!$slm){
	die(mysqli_error($con));
}
else{
	?>
	 <div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
        <span class="glyphicon glyphicon-ok"></span> updated successfully
        </div>
	<?php
}
}

?>

					<table class="table table-bordered">
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
					$student_passport = $sh2['picture'];
					$height = $sh2['height'];
					$weight = $sh2['weight'];
					$genotype = $sh2['genotype'];
					$blood_group = $sh2['blood_group'];
					$disability = $sh2['disability'];
					$department = $sh2['department'];
					$college = $sh2['college'];
				function ageProcessor($bday = ''){
				$broken_pieces = explode('-',$bday);
				$dob = date_create( date('d-m-Y H:i:s', strtotime($bday)) );
				$now = date_create( date('Y-m-d H:i:s') );
				return date_diff( $dob, $now )->format('%y');}
				$ageget =  ageProcessor ($birthday); 
				$age =  $ageget;
					?>
					<form method="POST" enctype="multipart/form-data">
						<tr>
							<th>Passport</th>
							<th><img style="height: 120px; width: 100px;" src="../student/<?php echo $student_passport?>" class="img-responsive thumbnail"></th>
						</tr>
					<tr>
							<th>Matric Number</th>
							<th><input type="" name="matric" id="name" class="form-control" value="<?php echo $matric ?>" required ></th>
						</tr>
							<tr>
							<th>Last name</th>
							<th><input type="" name="lname" class="form-control" value="<?php echo $lname ?>" required ></th>
						</tr>
						<tr>
							<th>First name</th>
							<th><input type="" name="fname" id="name" class="form-control" value="<?php echo $fname ?>" required ></th>
						</tr>
					
						<tr>
							<th>Other name</th>
							<th><input type="" name="mname" class="form-control" value="<?php echo $mname  ?>" required></th>
						</tr>
						<tr>
							<th>date of birth</th>
							<th><input type="date" name="dob" class="form-control" value="<?php echo $birthday ?>" required></th>
						</tr>
						<tr>
							<th>Level</th>
							<th><select class="form-control" name="level" required="">
								<option value="">Select</option>
								<option style="display: none;" value="<?php echo $level ?>" selected = "selected" ><?php echo $level ?></option>
								<?php 
						$sl3 = mysqli_query($con,"SELECT * FROM level");
						while($sh13=mysqli_fetch_array($sl3)){
							$class2 = $sh13['level'];
							?>
							<option value="<?php echo $class2 ?>"><?php echo $class2 ?></option>
							<?php
						}
							?>
							</select></th>
						</tr>
						<tr>
							<th>College</th>
							<th>
								<select class="form-control" name="college2">
									<option style="display: none;" value="<?php echo $college?>" selected ="selected" ><?php echo $college?></option>
									<option value="">Select College</option>
									<?php
				                  $get_colleges = mysqli_query($con,"SELECT * FROM college");
				                  while($show_college = mysqli_fetch_array($get_colleges)){
				                  	$college = $show_college['college_name'];
				                  	$college_code = $show_college['college_code'];

				                  	echo  "<option value='$college_code'>$college</option>";

				                  }  

				                  ?>
								</select>

							</th>
						</tr>
						<tr>
							<th>Department</th>
							<th>
								<select class="form-control" name="department">
									<option style="display: none;" value="<?php echo $department?>" selected ="selected" ><?php echo $department?></option>
									<option value="">Select Department</option>
									<?php
				                  $get_department = mysqli_query($con,"SELECT * FROM department");
				                  while($show_department = mysqli_fetch_array($get_department)){
				                  	$department = $show_department['department'];
				                  	$dept_code = $show_department['dept_code'];

				                  	echo  "<option value='$dept_code'>$department</option>";

				                  }  

				                  ?>
								</select>

							</th>
						</tr>
						<tr>
							<th>email </th>
							<th><input type="" name="email" class="form-control" value="<?php echo $email ?>" required></th>
						</tr>
						<tr>
							<th>Phone</th>
							<th><input type="" name="phone" class="form-control" value="<?php echo $phone?>" required></th>
						</tr>
						<tr>
							<th>gender</th>
							<th><select name="gender" class="form-control" required>
								<option value="">Select</option>
								<option style="display: none;" value="<?php echo $gender ?>" selected = "selected" ><?php echo $gender ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select></th>
						</tr>
						<tr>
							<th>Religion</th>
							<th><select class="form-control" name="religion" required="">
								<option value="">Select</option>
								<option style="display: none;" value="<?php echo $religion ?>" selected ="selected" ><?php echo $religion ?></option>
								<option value="christainity">Christianity</option>
								<option value="islam">Islam</option>
								<option value="others">Others</option>
							</select></th>
						</tr>
						<tr>
							<th>Address</th>
							<th><input type="" name="address" class="form-control" value="<?php echo $address ?>" required></th>
						</tr>
						<tr>
							<th>lga</th>
							<th><input type="" name="lga" class="form-control" value="<?php echo $lga ?>" required></th>
						</tr>
						<tr>
								<th>state</th>
								<th><input type="" name="state" class="form-control" value="<?php echo $state?>" required></th>
							</tr>
							<tr>
								<th>country</th>
								<th><input type="" name="country" class="form-control" value="<?php echo $country?>" required></th>
							</tr>
							<tr>
								<th>parents name</th>
								<th><input type="" name="parents" class="form-control" value="<?php echo $parents?>" required></th>
							</tr>
							<tr>
								<th>parents phone</th>
								<th><input type="" name="parentsp1" class="form-control" value="<?php echo $parentsp1?>" required></th>
							</tr>
							<tr>
								<th>parents phone 2</th>
								<th><input type="" name="parentsp2" class="form-control" value="<?php echo $parentsp2?>" ></th>
							</tr>
							<tr>
								<th>parents email</th>
								<th><input type="" name="parentse" class="form-control" value="<?php echo $pemail?>" required></th>
							</tr>
							<tr>
								<th>Genotype</th>
								<th>
									<select class="form-control" name="genotype" >
								<option value="">Select</option>
								<option style="display: none;" value="<?php echo $genotype ?>" selected ="selected" ><?php echo $genotype ?></option>
								<option value="AA">AA</option>
								<option value="AS">AS</option>
								<option value="SS">SS</option>
								<option value="AC">AC</option>
							</select>
								</th>
							</tr>
							<tr>
								<th>Blood Group</th>
								<th>
									<select class="form-control" name="blood_group">
								<option value="">Select</option>
								<option style="display: none;" value="<?php echo $blood_group ?>" selected ="selected" ><?php echo $blood_group ?></option>
								<option value="0+">O+</option>
								<option value="0-">0-</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
							</select>
								</th>
							</tr>
							<tr>
								<th>Height (cm)</th>
								<th><input type="" name="height" class="form-control" value="<?php echo $height?>"></th>
							</tr>
							<tr>
								<th>Weight (kg)</th>
								<th><input type="" name="weight" class="form-control" value="<?php echo $weight?>"></th>
							</tr>

							<tr>
								<th>Medical conditions/ Disability</th>
								<th><input type="" name="disability" class="form-control" value="<?php echo $disability?>"></th>
							</tr>
						<tr>
							<th>
								update
							</th>
							<th>
								<button type="submit" name="update" class="btn btn-success">update</button>
							</th>
						</tr>
					</table>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>