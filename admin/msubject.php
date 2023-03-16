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
					</div>lass="panel-body">
					<h4>Manage subject</h4>
					<a href="csubject.php" class="btn btn-pink">Create new subject</a>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM elective_window");
					$dop = mysqli_fetch_array($sql);
					$status_q = $dop['status'];
					if($status_q == 0){
						?>
						<a href="lock_elective.php?data=1" class="btn btn-pink"><span class="glyphicon glyphicon-lock"></span> Elective subject</a>
						<?php
							}	
						else{
							?>
							<a href="lock_elective.php?data2=0" class="btn btn-pink">open Elective subject</a>
							<?php
						}
						?>

					</div>
					<div class="panel-body">
						<div class="table-responsive table-box">
							<table id="subject_data" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Subject code</th>
									<th>Subject title</th>
									<th>department</th>
									<th>class</th>
									<th>Anchor</th>
									<th>Action</th>
								</tr>
							</thead>
								<tbody>
								<?php
								
									$s2  = mysqli_query($con,"SELECT * FROM subject");
								
								while($sh2 = mysqli_fetch_array($s2)){
									$sn = $sh2['sn'] ;
									$title = $sh2['title'];
									$code= $sh2['code'];
									$department = $sh2['department'];
									$participant = $sh2['participant'];
									$teacher = $sh2['teacher'];
									$sqlx = mysqli_query($con,"SELECT * FROM staff where employee = '$teacher' ");
									$sh4x = mysqli_fetch_array($sqlx);
									$name =$sh4x["lname"]." ".$sh4x["fname"];
									?>
									<tr>
										<td><?php echo $code ?></td>
										<td><?php echo $title ?></td>
										<td><?php echo $department ?></td>
										<td><?php echo $participant ?></td>
										<td><?php echo $name."($teacher)" ?></td>
										<td><a href="#" data-bs-toggle='modal'data-bs-target='.bs-example-modal-smsdel' class=" btn btn-pink btn-sm remove1" data='deletes.php?is=<?php echo $sn ?>'><span class="glyphicon glyphicon-trash"></span></a> <a href="esubject.php?is=<?php echo $sn ?>" class=" btn btn-pink btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>

									</tr>
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
	<!-- modal for student delete begins -->
	<div class="modal fade bs-example-modal-smsdel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
		<div class="modal-dialog modal-sm " role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span aria-hidden="true" >&times;</span></button><h4 class="modal-title">Delete Subject Confirmation</h4>
					<div class="modal-body">
						<p class="text-center"><span class="glyphicon glyphicon-trash"></span><br> Are you sure you want to delete this subject<br><small>Nb: this action cannot be reversed</small> ?</p>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" data-dismiss="modal">Cancel</button> 
						<a href="" class="btn btn-danger remove" data="">Delete</a></div>
					</div>
				</div>
			</div>
		</div>
		<!--modal ends -->
		<?php include("footer.php") ?>
		<script type="text/javascript">

			$(document).ready(function(){
				$('.remove1').click(function(){
					var data1 = $(this).attr('data');
					$('.remove').attr("href",data1);
				})
			})
		</script>
<script> 
    $(document).ready(function(){
      $('#subject_data').DataTable(); 
    }); 
  </script> 