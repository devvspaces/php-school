	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading" id="p_heading">
						<?php 
						$users = $_SESSION['users'];
						$s1  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['fname']." ".$sh1['lname'];
						$img = $sh1['picture'];
						$department= $sh1['department'];
						if($img==""){
							$img2 = "passport/default.png";
						}
						else{
							$img2 = $img;
						}
						?>
						<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $department ?></i>
					</div>
					<div class="panel-body">
						<h4>Time Table</h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive table-box">
							<p><a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"class="btn btn-success">Add new schedule</a></p>
							<table class="table table-bordered table-striped">
								<tr>
									<th>Day</th>
									<th>Time</th>
									<th>Venue</th>
								</tr>
								<?php 
								if(isset($_GET['is'])){
									$is = $_GET['is'];
										?>
											</table>
										</td>
										<tr>
											<?php
										}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- modal for create -->
		<div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content" style="padding: 10px; color: #666;">
					<div class="modal-header"><h5 class="text-center">Create New Period</h5></div>
					<form method="post" id="add_schedule">
						<input type="hidden" name="course" value="<?php echo $is?>">
						<input type="hidden" name="level" value="<?php echo $level ?>">
						<input type="hidden" name="set_by" value="<?php echo $users ?>">
						<label>Day</label>
						<select name="day" class="form-control day_sel" required>
							<option value="">Select Day</option>
							<option value="monday">Monday</option>
							<option value="tuesday">Tuesday</option>
							<option value="wednesday">Wednesday</option>
							<option value="thursday">Thursday</option>
							<option value="friday">Friday</option>
						</select><br>
						<label>Time</label>
						<input type="time" name="time" class="form-control" required>
						<br>
						<label>Venue</label>
						<input type="" name="venue" class="form-control" required>
						<br>
						
						<p class="text-center"><input type="submit" name="submit" class="btn btn-success add" value="Add"></p>
						<div class="view_result"></div>

					</form>

				</div>
			</div>
		</div>
		<!-- modal for create ends -->
			<!-- modal for create -->
		<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content" style="padding: 10px; color: #666;">
					<div class="modal-header"><h4 class="text-center">Delete Schedule</h4></div>
					<p class="text-center"><span class="glyphicon glyphicon-trash"></span></p>
					<p class="text-center">Are you sure tou want to delete data ?</p>
					<div class="modal-footer">
						<p><a class="btn btn-success remove1" href=''>Delete</a>
						<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- modal for create ends -->
		<?php include("footer.php") ?>
		<script type="text/javascript">
 $(document).ready(function(){  
    $('#add_schedule').on("submit", function(e){  
      e.preventDefault(); 
      $('.add').attr("disabled","disabled");
      $.ajax({  
        url:"add_schedule.php",  
        method:"POST",  
        data:new FormData(this),  
        contentType:false,        
        cache:false,              
        processData:false,          
        success: function(data){  

          if(data=='done')  
          {  
            $('.view_result').html("<div class='alert alert-success'>Period added successfully</div>");
          }
          else  
          {  
            $('.view_result').html("<div class='alert alert-danger'>"+data+"</div>");
            
          }          
          $('.add').removeAttr("disabled");
          load_period();

        }  
      });  


    });  
  });  
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.remove').click(function(){
					var data = $(this).attr('data');
					//alert( data);
					$('.remove1').attr("href",data);
				})
			})
		</script>