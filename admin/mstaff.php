<?php
$title = "Manage Staff";
include("header.php");
?>

<div class="viewbox-content">

	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<?php
				if (isset($_POST['Priviledge'])) {
					$username = $_POST['username'];
					$staff_id = $auth->select14('sn', 'staff', 'username', $username);

					$roles = array();
					if (!empty($_POST['function'])) {
						foreach ($_POST['function'] as $role) {
							array_push($roles, $role);
						}
					}
					$role = json_encode($roles);


					$auth->update5('staff', 'role', $role, 'sn', $staff_id);
					echo "<div class='alert alert-success'>This staff has been granted the specified priviledges.</div>";
				}
				?>
				<div class="report">
					<div class="panel-body">
						<h4>Manage staff</h4>
						<a href="cstaff.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create
							new
							staff member</a>
						<a href="import_staff.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span>
							Import Staff</a>
						<a href="staff_records.php" class="btn btn-pink"><span
								class="glyphicon glyphicon-import"></span>
							Staff Population</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive table-box">
							<table id="staff_data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>SN</th>
										<th>Employees id</th>
										<th>First name</th>
										<th>Last name</th>
										<th>Department</th>
										<th>View</th>
										<th>Make Admin</th>
										<th>Assign Priviledges</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody id="record">
									<?php
									$serial = 0;
									$s2 = mysqli_query($con, "SELECT * FROM staff ");
									while ($sh2 = mysqli_fetch_array($s2)) {
										$employee = $sh2['employee'];
										$fname = $sh2['fname'];
										$lname = $sh2['lname'];
										$department = $sh2['department'];
										$username = $sh2['username'];
										$staff_roles = $sh2['role'];
										if ($staff_roles != "") {
											$staff_roles = json_decode($staff_roles, true);
										} else {
											$staff_roles = array();
										}
										$serial++;
										$sn = $sh2['sn'];
										if ($position != 'admin') {
											$admin_action = "";
										} else {
											$admin_action = "<a href='#' data='$username' data-bs-toggle='modal'data-bs-target='.bs-example-modal-smsadmin' class='btn btn-pink cadmin'><span class='glyphicon glyphicon-user'></span></a>";
										}
										$admin_action2 = "<a href='#' data='$username' data-bs-toggle='modal'data-bs-target='#role_myModal$sn' class='btn btn-pink cadmin2'><span class='glyphicon glyphicon-user'></span></a>";
										?>
										<tr>
											<td><?php echo $serial ?></td>
											<td>
												<?php echo $employee ?>
											</td>
											<td><?php echo $fname ?></td>
											<td>
												<?php echo $lname ?>
											</td>
											<td><?php echo $department ?></td>
											<td>
												<a href="view_staff.php?is=<?php echo $username ?>"
													class=" btn btn-pink"><span
														class="glyphicon glyphicon-eye-open"></span></a>
											</td>
											<td>
												<?php echo $admin_action ?>
											</td>
											<td>
												<?php echo $admin_action2 ?>
											</td>
											<td>
												<a href="" data="delete_staff.php?is=<?php echo $username ?>" type="button"
													class="btn show-modal remove" data-bs-toggle="modal"
													data-bs-target="#myModal"><span
														class="glyphicon glyphicon-trash"></span></a>
											</td>

										</tr>





										<div class="modal-box">
											<div class="modal fade" id="role_myModal<?= $sn ?>" data-backdrop="static"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">

														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<form class="" method="POST" action="">
															<div class="modal-body">
																<input type="hidden" name="username"
																	value="<?= $username ?>">
																<br>
																<h4 class='modal-title title'>Select the Task you want this
																	staff to perform</h4>
																<hr>
																<div class="form-check form-check-inline"
																	style="font-size: 14px; text-align: justify;">
																	<?php
																	$get_function = mysqli_query($con, "SELECT * FROM admin_function ");
																	while ($show_function = mysqli_fetch_array($get_function)) {
																		$sn = $show_function['sn'];
																		$function = $show_function['function'];
																		$function_id = $show_function['sn'];
																		$x = "";
																		if (in_array($function_id, $staff_roles)) {
																			$x = "checked";
																		}
																		?>
																		<p><input class='form-check-input' <?= $x ?>
																				type='checkbox' name='function[]'
																				value='<?= $function_id ?>'>
																			<?= $function ?>
																		</p>
																	<?php } ?>
																</div>
															</div>
															<button class="btn btn-danger"
																data-dismiss="modal">Cancel</button>
															<button class="btn btn-success" name="Priviledge"
																data="">Proceed</button>
														</form>
													</div>
												</div>
											</div>
										</div>









									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- modal -->

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="modal-box">
					<!-- Button trigger modal -->
					<!-- <button type="button" class="btn btn-primary btn-lg show-modal" data-bs-toggle="modal" data-bs-target="#myModal">
				  view modal
				</button> -->
					<!-- Modal -->
					<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<div class="modal-body">

									<h4 class="modal-title text-center title"><span
											class="glyphicon glyphicon-trash"></span> Delete Staff Confirmation</h4>
									<p class="text-center"><br> Are you sure you want to delete this
										Staff?<br><small>NB:
											this action cannot be reversed</small> </p>
									<button class="btn btn-success" data-dismiss="modal">Cancel</button>
									<a href="" class="btn btn-danger remove1" data="">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- admin -->
	<div class="modal fade bs-example-modal-smsadmin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
		<div class="modal-dialog modal-md " role="document">
			<div class="modal-content" style="color: #777;">
				<form class="modal-header" method="POST" action="c_admin.php">
					<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center">Add Staff as an Administrator</h4>
					<div class="modal-body">
						<div class="">
							<input type="hidden" name="username" value="" class="ids">
							<h4>Select the Task you want this admin to perform</h4>
							<div class="form-check form-check-inline" style="font-size: 14px; text-align: justify;">
								<?php
								$get_function = mysqli_query($con, "SELECT * FROM admin_function ");
								while ($show_function = mysqli_fetch_array($get_function)) {
									$link = $show_function['link'];
									$function = $show_function['function'];
									$sn = $show_function['sn'];

									?>
									<p><input class='form-check-input' type='checkbox' name='function[]' value='<?= $sn ?>'>
										<?= $function ?>
									</p>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="modal">Cancel</button>
						<button name="submit" class="btn btn-pink" type="submit">Proceed</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('.remove').click(function () {
			var dat = $(this).attr("data");
			$('.remove1').attr("href", dat);
		})
	})
	$(document).ready(function () {
		$('.cadmin').click(function () {
			var imd = $(this).attr("data");
			$('.ids').val(imd)
		})
	})

	$(document).ready(function () {
		$('.cadmin2').click(function () {
			var imd = $(this).attr("data");
			$('.ids2').val(imd)
		})
	})
</script>
<script>
	$(document).ready(function () {
		$('#staff_data').DataTable();
	});
</script>

<?php include("../extras/footer.php") ?>