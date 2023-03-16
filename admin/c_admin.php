<?php
$title = "Create Admin";
include("header.php");
?>

<div class="viewbox-content">

	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">

				<div class="panel-body">
					<h4>Create Admin</h4>
					<a href="madmin.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Manage
						admins</a>
				</div>
				<div class="panel-body">
					<?php
					if (isset($_POST['submit'])) {
						$username = $_POST['username'];
						$staff_id = $auth->select14('sn', 'staff', 'username', $username);
						$position = 'subadmin';

						$roles = array();
						if (!empty($_POST['function'])) {
							foreach ($_POST['function'] as $role) {
								array_push($roles, $role);
							}
						}
						$role = json_encode($roles);


						// $description = implode(',', $function);
						// print_r($description);
						// exit();
						//echo $username;
						$staff_search = mysqli_query($con, "SELECT * FROM staff where sn = '$staff_id'");
						$staff_check = mysqli_fetch_array($staff_search);
						$employee_id = $staff_check['employee'];
						$employee_id2 = $staff_check['username'];
						$fname = $staff_check['fname'];
						$lname = $staff_check['lname'];
						$description = $staff_check['job_description'];
						$femployee = $employee_id . "_admin";
						$femployee2 = md5($femployee);
						$password = 'password@1234';
						$password2 = md5($password);
						$type = 'admin';
						//echo $employee_id;
						$date = date("d-m-y");
						$admin_check = mysqli_query($con, "SELECT * FROM admin where staff_id = '$staff_id'");
						if (mysqli_num_rows($admin_check) == 0) {

							$sql = mysqli_query($con, "INSERT INTO users(userid,userid2,password2,type,dates,staff_id)VALUES('$femployee','$femployee2','$password2','$type','$date','$staff_id')");
							if (!$sql) {
								// die(mysqli_error($con));
							} else {

								$sql2 = mysqli_query($con, "INSERT INTO admin(employee_id,fname,lname,username,position,department,job_description,staff_user_name,role,staff_id)VALUES('$femployee','$fname','$lname','$femployee2','$position','$description','$description','$username','$role','$staff_id')");
								if (!$sql2) {
									die(mysqli_error($con));
								} else {
									if (!$sql) {
										$auth->update5('users', 'staff_id', $staff_id, 'userid', $femployee);
									}
									$auth->update5('staff', 'role', $role, 'sn', $staff_id);
									$uid = $_SESSION['users'];
									$details = "$uid created an admin account with staff ID $staff_id";
									$auth->Log($uid, 'admin', 'create admin', $details);
									echo "<div class='alert alert-success'>This staff is now an admin with the username $femployee and default password $password</div>";
								}
							}
						} else {
							echo "<p class='alert alert-danger'>staff is already an admin</p>";
						}
					}
					?>
					<form method="POST">
						<select name="username" class="form-control" required>
							<option value="">--Select Staff--</option>
							<?php
							$sqlstr = "SELECT * FROM staff";
							$stmt = $con->prepare($sqlstr);
							$stmt->execute();
							$result = $stmt->get_result();
							while ($row = $result->fetch_assoc()):
								extract($row);
								?>
								<option value="<?= $username ?>">
									<?="$lname $fname" ?>
								</option>
							<?php endwhile; ?>
						</select><br>
						<button type="button" class="btn btn-primary btn-lg show-modal" data-bs-toggle="modal"
							data-bs-target="#myModal">
							Select roles
						</button><br><br>
						<p class="text-center"><button class="btn btn-pink" name="submit">Create</button></p>
						<div class="modal-box">
							<!-- Button trigger modal -->
							<!-- Modal -->
							<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<div class="modal-body">
											<br>
											<h4 class='modal-title title'>Select the Task you want this admin to perform
											</h4>
											<hr>
											<div class="form-check form-check-inline"
												style="font-size: 14px; text-align: justify;">
												<?php
												$get_function = mysqli_query($con, "SELECT * FROM admin_function ");
												while ($show_function = mysqli_fetch_array($get_function)) {
													$link = $show_function['link'];
													$function = $show_function['function'];
													$function_id = $show_function['sn'];
													?>
													<p'><input class='form-check-input' type='checkbox' name='function[]'
															value='<?= $function_id ?>'>
														<?= $function ?>
														</p>
													<?php } ?>
											</div>
										</div>
										<!-- <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
										<button class="btn btn-success remove1" type="submit" name="update_admin" data="">Proceed</button> -->
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../extras/footer.php") ?>