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

					<div style="border: 1px solid #d7d7d7; border-radius: 5px; padding: 5px; ">
						<h4 class="text-center"> Promotion exercise</h4>

						<?php
						$detect = mysqli_query($con,"SELECT * FROM calender");
						$tell = mysqli_fetch_array($detect);
						$term = $tell['current_term'];
						$session_stop = $tell['s_stop'];
						$current_date = date('d-m-Y');
						if($term!=3){
							die("<p class='alert alert-danger'>you cannot carry promotion exercise at this time of the session</p>");
						}
						if(strtotime($session_stop) > strtotime($current_date)){
							die("you cannot carry promotion exercise at this time of the session");	
						}
						?>
						<h4 class="text-center">select the class</h4>
						<form method="GET" action="promotion2.php">
							<select name="clas" class="form-control" id="class" >		
								<option value="">Select</option>
								<?php
								$s2 = mysqli_query($con,"SELECT * from class");
								while($sh2 = mysqli_fetch_array($s2)){
									$class = $sh2['class'];
									?>
									<option value="<?php echo $class ?>"><?php echo $class ?></option>
									<?php
								}
								?>
							</select> <br>
							<p class="text-center"><input type="submit" name="submit" class="btn btn-primary" value="Go"></p>
						</form>
						<div style="margin-left:50%; display: none;" id="loader"><img src="img/ajax-loader.gif"></div>
						<div class="table-responsive table-box" id="record2"></div>
					</div>
				</div>
				<div class="panel-body">
					<div style="border: 1px solid #d7d7d7; border-radius: 5px; padding: 5px; ">
						<h4 class="text-center">Graduate SS3 students</h4>
						<p class="text-center"><button type="submit" class="btn btn-success" id="grad">Graduate</button></p>
						<div id="result"></div>
					</div>
				</div>
				<div class="panel-body">
					<div style="border: 1px solid #d7d7d7; border-radius: 5px; padding: 5px; ">
						<h4  class="text-center">Update class</h4>
						<p  class="text-center alert alert-info">This is done to udate the classes of promoted students to their new class Please note that this operation should be carried out after the promoion exercise for all classes have been completed</p>
						<form method="POST">
							<p class="text-center"><a href="#" class="btn btn-primary" data-bs-toggle='modal'data-bs-target='.bs-example-modal-smsdel' class=" btn btn-pink btn-sm">Update Classes</a></p>
							<div class="modal fade bs-example-modal-smsdel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
								<div class="modal-dialog modal-sm " role="document">
									<div class="modal-content" style="color: #666;">
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-label="Close" type="button"><span aria-hidden="true" >&times;</span></button><h4 class="modal-title">Update classes Confirmation</h4>
											<div class="modal-body">
												<p class="text-center"><span class="glyphicon glyphicon-update"></span><br> Have you completed the promotion exercise for all classes? If not do not proceed with this action until you have completed the promotion exercise for all the classes</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-success" data-dismiss="modal">Cancle</button> 
												<button class="btn btn-pink" name="update"> Update</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if(isset($_POST['update'])){
			$request1 = mysqli_query($con,"SELECT * FROM status where status = 'promoted' ");
			if(!$request1){
				die(mysqli_error());
			}
			while($request2 = mysqli_fetch_array($request1))
			{
				$mtl = $request2['student'];
				$mtl2 = $request2['class'];
				if($mtl2=='JSS 1'){
					$to = 'JSS 2';
				}
				elseif($mtl2=='JSS 2'){
					$to = 'JSS 3';
				}
					elseif($mtl2=='JSS 3'){
					$to = 'SSS 1';
				}
				elseif($mtl2 == 'SSS 1'){
					$to = 'SSS 2';
				}
				elseif($mtl2 == 'SSS 2'){
					$to = 'SSS 3';
				}
				$request3 = mysqli_query($con,"UPDATE students SET class = '$to' where admission_no = '$mtl' ");
				if(!$request3){
					die(mysqli_error($con));
				}
			}
		}
		?>
		
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#grad").click(function(){
			$("#grad").html("please wait");
			$.ajax({
				url:"graduate_ss3.php",
				method:"POST",
				data:{name:name},
				success:function(data){
					$('#grad').html("done");
					$('#result').html(data);
				}
			})
		});
	});
</script>