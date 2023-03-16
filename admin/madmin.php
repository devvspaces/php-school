<?php
$title = "Manage Administrators";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body report">
					<div class="panel-body">
						<a href="c_admin.php" class="btn btn-pink mb-3"><span class="glyphicon glyphicon-plus"></span> Create
							new admin</a>
					</div>

					<div class="panel-body">
						<div class="table-responsive table-box">
							<table id="data" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>SN</th>
										<th> Employees id</th>
										<th> First name</th>
										<th> last name</th>
										<th> Functions</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="record">
									<?php
									$serial = 0;
									$s2 = mysqli_query($con, "SELECT * FROM admin");
									while ($sh2 = mysqli_fetch_array($s2)) {
										$employee = $sh2['employee_id'];
										$fname = $sh2['fname'];
										$lname = $sh2['lname'];
										$id = $sh2['sn'];
										$functions = $sh2['job_description'];
										$username = $sh2['username'];
										$staff_id = $sh2['staff_id'];
										$admin_roles = $auth->select14('role', 'staff', 'sn', $staff_id);
										if ($staff_id == 0) {
											$admin_roles = $sh2['role'];
										}
										if ($admin_roles != "") {
											$admin_roles = json_decode($admin_roles, true);
										} else {
											$admin_roles = array();
										}
										$serial++;
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
											<td><?php echo $functions ?></td>
											<td>
												<a href="javascript:" data="delete_admin.php?is=<?php echo $username ?>"
													type="button" class="btn show-modal remove" data-bs-toggle="modal"
													data-bs-target="#DeleteModal<?= $id ?>"><span
														class="glyphicon glyphicon-trash"></span></a>
												<a href="javascript:" data="<?php echo $username ?>" type="button"
													data-bs-toggle="modal" data-bs-target="#myModal<?= $id ?>"
													class=" btn show-modal btn-pink edit"><span
														class="glyphicon glyphicon-pencil"></span></a>

											</td>

										</tr>
										<div class="modal-box">
											<!-- Button trigger modal -->
											<!-- <button type="button" class="btn btn-primary btn-lg show-modal" data-bs-toggle="modal" data-bs-target="#myModal">
												view modal
											</button> -->
											<!-- Modal -->
											<div class="modal fade" id="myModal<?= $id ?>" data-backdrop="static"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">

														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
														<form class="" method="POST" action="#">
															<div class="modal-body">
																<input type="hidden" name="id" value="<?= $id ?>"
																	class="ids">
																<br>
																<h4 class='modal-title title'>Select the Task you want this
																	admin to perform</h4>
																<hr>
																<div class="form-check form-check-inline"
																	style="font-size: 14px; text-align: justify;">
																	<?php
																	$get_function = mysqli_query($con, "SELECT * FROM admin_function ");
																	while ($show_function = mysqli_fetch_array($get_function)) {
																		$link = $show_function['link'];
																		$function = $show_function['function'];
																		$function_id = $show_function['sn'];
																		$x = "";
																		if (in_array($function_id, $admin_roles)) {
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
															<button class="btn btn-success remove1" type="submit"
																name="update_admin" data="">Proceed</button>
														</form>
													</div>
												</div>
											</div>
										</div>


										<div class="modal fade bs-example-modal-smsdel" tabindex="-1"
											id="DeleteModal<?= $id ?>" role="dialog" aria-labelledby="mySmallModalLabel">
											<div class="modal-dialog modal-sm " role="document">
												<div class="modal-content" style="color: #777;">
													<div class="modal-header">
														<button class="close" data-dismiss="modal" aria-label="Close"
															type="button"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title text-center">Delete Admin Confirmation</h4>
														<div class="modal-body">
															<p class="text-center"><span
																	class="glyphicon glyphicon-trash"></span><br> Are you
																sure you want to remove this staff from the administrators
																?<br><small>Nb: this action cannot be reversed</small> ?</p>
														</div>
														<div class="modal-footer">
															<button class="btn btn-success"
																data-dismiss="modal">Cancel</button>
															<a href="" class="btn btn-danger remove1" data="">Delete</a>
														</div>
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
</div>

<script>
	$(document).ready(function () {
		$('#data').DataTable({
			"processing": true,
		});
	});
</script>

<?php include("../extras/footer.php") ?>