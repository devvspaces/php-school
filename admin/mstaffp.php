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

				<div class="report">
				<div class="panel-body">
					<h4>Manage staff</h4>
					<a href="cstaff.php" class="btn btn-pink"><span class="glyphicon glyphicon-plus"></span> Create new staff member</a>
					<a href="import_staff.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span> Import Staff</a>
					<a href="staff_records.php" class="btn btn-pink"><span class="glyphicon glyphicon-import"></span> Staff Population</a>					
				</div>
				<div class="panel-body">
					<div style="padding: 5px;" id="contentx">
					<div class="table-responsive table-box">
						<h4 class="text-center">Hapa College</h4>
						<h5 class="text-center">Staff portal Details</h5>
						<p>URL: www.hapacollege.org.ng/portal</p>
						<p>General password: staff_1234</p>
						<table  class="table table-bordered table-striped" style="font-size: 13px;">
							<thead>
								<tr>
									<th>Sn</th>
									<th>User Name</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Department</th>
								</tr>
							</thead>
							<tbody id="record">
								<?php

								$s2  = mysqli_query($con,"SELECT * FROM staff ");
								$i=0;
								while($sh2 = mysqli_fetch_array($s2)){
									$employee = $sh2['employee'];
									$fname= $sh2['fname'];
									$lname = $sh2['lname'];
									$department = $sh2['department'];
									$username = $sh2['username'];
									$i++;
									if($position != 'admin'){
										$admin_action = "";
									}
									else{
										$admin_action = "<a href='#' data='$username' data-bs-toggle='modal'data-bs-target='.bs-example-modal-smsadmin' class='btn btn-pink cadmin'><span class='glyphicon glyphicon-user'></span></a>";
									}
									?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $employee ?></td>
										<td><?php echo $fname ?></td>
										<td><?php echo $lname ?></td>
										<td><?php echo $department ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
					</div>		
				</div>
					<p class="text-center"><button class="btn btn-pink" onclick="generatePDF()"><span class="glyphicon glyphicon-print"></span> Print</button></p>				
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-smsdel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
	<div class="modal-dialog modal-sm " role="document">
		<div class="modal-content" style="color: #777;">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span aria-hidden="true" >&times;</span></button><h4 class="modal-title text-center">Delete Staff Confirmation</h4>
				<div class="modal-body">
					<p class="text-center"><span class="glyphicon glyphicon-trash"></span><br> Are you sure you want to delete this Member of Staff?<br><small>Nb: this action cannot be reversed</small> </p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" data-dismiss="modal">Cancel</button> 
					<a href="" class="btn btn-danger remove1" data="">Delete</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- admin -->
	<div class="modal fade bs-example-modal-smsadmin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
		<div class="modal-dialog modal-md " role="document">
			<div class="modal-content" style="color: #777;">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span aria-hidden="true" >&times;</span></button><h4 class="modal-title text-center">Add Staff as an Administrator</h4>
					<div class="modal-body">
						<form class="" method="POST" action="c_admin.php">
							<input type="hidden" name="username" value="" class="ids">
							<h4>Select the Task you want this admin to perform</h4>
							<div class="form-check form-check-inline" style="font-size: 14px; text-align: justify;">
								<?php
								$get_function = mysqli_query($con,"SELECT * FROM admin_function ");
								while($show_function = mysqli_fetch_array($get_function)){
									$link = $show_function['link'];
									$function = $show_function['function'];
									echo "<p'><input class='form-check-input' type='checkbox' name='function[]' value='$function' > $function</p>";
								} 
								?>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal">Cancel</button> 
							<button name="submit" class="btn btn-pink" type="submit">Proceed</a></div>
							</form> 
						</div>
					</div>
				</div>
			</div>
			<?php include("footer.php") ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.remove').click(function(){
						var dat = $(this).attr("data");
						$('.remove1').attr("href",dat);
					})
				})
			</script>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.cadmin').click(function(){
						var imd = $(this).attr("data");
						$('.ids').val(imd)
					})
				})
			</script>
				<script> 
		$(document).ready(function(){
			$('#staff_data').DataTable(); 
		}); 
	</script> 
