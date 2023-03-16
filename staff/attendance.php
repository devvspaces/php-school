
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
					$employee = $sh1['employee'];
					$department= $sh1['department'];
					$today = date('d-m-y');
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
					<?php
					$check_query = mysqli_query($con,"SELECT * FROM class_arm where teacher = '$employee'");
					$mon = mysqli_num_rows($check_query);
					if($mon == 0){
						echo "<h4 class='text-center'>You do not currently administer any class</h4>";
					}
					else{
						$data = mysqli_fetch_array($check_query);
						$class = $data['class'];
						$arm = $data['arm'];
						$arm_id = $data['arm_id'];
						echo "<h4 class='text-center'>You Currently Administer $class $arm</h4><br>
						<p class='text-center'><a href='attendance.php' class='btn'>Attendance</a> <a href='prev_attendance.php' class='btn'>Previous Attendance</a></p>";
					}

					?>
					<?php
					$show_students = mysqli_query($con,"SELECT * FROM students where arm =  '$arm' and class = '$class' ");
					$num = mysqli_num_rows($show_students);
					echo "<p class='text-center'>STUDENTS in $class $arm<br> $num students in total</p>";
					?>
					<h4 class="text-center"> Attendance Sheet for Today <?php echo date('l, d F, Y') ?></h4>

					<div class="table-responsive table-box">
						<br>
						<table id="attendance_data" class="table table-bordered">
							<thead>
								<tr>
									<th>Admission no</th>
									<th>First name</th>
									<th>Last name</th>
									<th>Action</th>
									<th>Daily Report</th>
									<!--<th>Manual Input</th>-->
								</tr>
							</thead>
							<tbody>
							<?php
							while($show_it = mysqli_fetch_array($show_students)){
								$fname = $show_it['fname'];
								$lname = $show_it['lname'];
								$admin = $show_it['admission_no'];
								?>
								<tr>
									<td><?php echo $admin ?></td>
									<td><?php echo $fname ?></td>
									<td><?php echo $lname ?></td>

									<td>
										<?php
										$check_record = mysqli_query($con,"SELECT * FROM attendance where admission_no = '$admin' and date = '$today' ");
										if(mysqli_num_rows($check_record) == 0){
											?>

										<button class="btn  present" data='<?php echo $admin ?>'><span class="glyphicon glyphicon-ok"></span> Present</button>
										<button class="btn  absent" data='<?php echo $admin ?>'><span class="glyphicon glyphicon-remove"></span> Absent</button>
										<div class="status"></div>
										<?php
									}
									else{
										$data2 = mysqli_fetch_array($check_record);
										$status = $data2['status'];
										if($status == '1'){
											$status2 = 'present';
										}
										else{
											$status2 = "absent";
										}
										echo $status2;
									}
									?>
									</td> 
									<td>
									    	<?php
										$report_check = mysqli_query($con,"SELECT * FROM daily_report where admission_no = '$admin ' and date = '$today'");
										if(mysqli_num_rows($report_check)>0){
											echo "record inputted";
										}
										else{
										    ?>
									   
									    <textarea class="form-control report" placeholder="Press enter when you are done" data="<?php echo $admin ?>"   style="overflow:hidden;"></textarea>
										<?php
										}
									    ?>
									    <div class="res"></div>
									    </td>
									<!--<td>
										<?php
										/*$report_check = mysqli_query($con,"SELECT * FROM daily_report where admission_no = '$admin ' and date = '$today'");
										if(mysqli_num_rows($report_check)>0){
											echo "report sent";
										}
										else{
											?>
											 <input  class="form-control" placeholder="days absent (press enter when done)" data="<?php echo $admin ?>" > 
										<?php
										}
											*/
										?>

										<div class="res"></div>

									</td>-->
									    
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
	<?php include("footer.php") ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.present').click(function(){
				var student = $(this).attr("data");
				//alert(student);
				$.ajax({
               url:"attendance_control.php",
               method:"POST",
               data:{student:student,},
               context:this,
               success:function(data){ 
             		$(this).hide();
					$(this).siblings('.absent').hide();
					$(this).siblings('.status').html(data);

                
              }
            });
			})
		})
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.absent').click(function(){
				var student1 = $(this).attr("data");
				//alert(student);
				$.ajax({
               url:"attendance_control.php",
               method:"POST",
               data:{student1:student1,},
               context:this,
               success:function(data){ 
             		$(this).hide();
					$(this).siblings('.present').hide();
					$(this).siblings('.status').html(data);

                
              }
            });
			})
		})
	</script>
	<script type="text/javascript">
		   $(document).ready(function(){
    $('.report').keypress(function(event){
      if(event.which==13){
        event.preventDefault();
      }
    })
       $('.report').keypress(function(event){
        if(event.which==13){
         var report = $(this).val();
         var student2 = $(this).attr("data");
         $.ajax({
         url:"attendance_control.php",
         method:"POST",
         context:this,
         data:{report:report,student2:student2},
         success:function(data){
         $(this).hide()
         $(this).siblings('.res').html(data);
         }
              });
              };
   });    
 });
	</script>
	<script> 
    $(document).ready(function(){
      $('#attendance_data').DataTable(); 
    }); 
  </script>