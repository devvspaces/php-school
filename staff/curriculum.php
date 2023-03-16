	<?php include("header.php") ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
					//form submit will take place here
					if(isset($_POST['submit'])){
						$week  = $_POST['week'];
						$topic = mysqli_real_escape_string($con,$_POST['topic']);
						$description = mysqli_real_escape_string($con,$_POST['description']);
						$session = $_POST['session'];
						$term = $_POST['term'];
						$is = $_POST['subject'];
						$date = date("d-m-Y");
						$insert = mysqli_query($con,"INSERT INTO curriculum (course_code, topic, description,week,date,session,semester) VALUES ('$is','$topic','$description','$week','$date','$session','$term') ");
						if(!$insert){
							die(mysqli_error($con));
						}

					}
					?>

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
					<?php
					//siv - subject in view 
					$siv = $_GET['is'];
					// calendar 
					$calendar  = mysqli_query($con,"SELECT * FROM  calender ");
					$calender_s = mysqli_fetch_array($calendar);
					$return2= $calender_s['session'];
					$return1= $calender_s['current_semester'];

					//ubject detailing 
					$s2  = mysqli_query($con,"SELECT * FROM course where code = '$siv'");
						$siv2 = mysqli_fetch_array($s2);
					$title = $siv2['title'];
					$code = $siv2['code'];
					// curriculum detailing
					$cur = mysqli_query($con,"SELECT * FROM curriculum where course_code= '$code' and session = '$return2' and semester = '$return1' order by week asc");
				
					?>
					<h4>Curriculum for <?php echo $title ?></h4>
				</div>
				<div class="panel-body">
					<p class="text-right"><a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Activity</a></p>
				<div class="table-responsive table-box" id="contentx" style="padding: 5px;">
					<h4 class="text-center">Weekly Activities For <?php echo $title." ($code)" ?></h4>
					<table class="table-bordered table-striped">
						<?php
					while($cur2 = mysqli_fetch_array($cur)){
					$topic = $cur2['topic'];
					$week = $cur2['week'];
					$description = $cur2['description'];
					$curriculumid = $cur2['sn'];
					?>
						<tr>
							<th style="padding: 10px;">
								<p><span class="glyphicon glyphicon-calendar"></span> WEEK <?php echo $week ?> <a href="delete_curriculum.php?curriculumid=<?php echo $curriculumid ?>&&sbjid=<?php echo $code ?>" style="float: right;"><span class="glyphicon glyphicon-trash" ></span></a> 
									 <!--<a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sms"><span class="glyphicon glyphicon-edit" style="float: right;"></span></a>-->
								</p>
								<p><b>Topic</b>: <?php echo $topic ?> </p>
								<p style="font-weight: lighter;"><b>Description</b>:<?php echo $description ?>.</p>
							</th>
						</tr>
						<?php
					}
					?>
					</table>			
				</div>
				<div class="col-lg-12"><br><p class="text-center"><button class="btn" onclick="generatePDF()"><span class="glyphicon glyphicon-print"></span> Print</button></p></div>
			</div>
			</div>
		</div>
	</div>

		<!-- modal for create -->
		<div class="modal fade bs-example-modal-sms" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content" style="padding: 10px; color: #666;">
					<div class="modal-header"><h5 class="text-center">Create New Activity</h5></div>
					<form method="post" id="add_schedule">
						<input type="hidden" name="subject" value="<?php echo $siv?>">
						<input type="hidden" name="session" value="<?php echo $return2 ?>">
						<input type="hidden" name="term" value="<?php echo $return1 ?>">
						<label>Week</label>
						<select name="week" class="form-control" required>
							<option value="">Select Week</option>
							<?php
										for ($i=1; $i < 14 ; $i++) { 
											echo "<option value='$i'>Week $i</option>"
										;
									}
									
									?>
						</select>
						<label>Topic</label>
						<input type="" name="topic" class="form-control" placeholder="Topic">	
						<br>
						<label>Description</label>
						<textarea name="description" class="form-control" placeholder="Description"></textarea>
						<p class="text-center"><input type="submit" name="submit" class="btn btn-success add" value="Add"></p>
					</form>

				</div>
			</div>
		</div>
	<?php include("footer.php") ?>
	<script> 
	$(document).ready(function(){
	 $('#subject_data').DataTable(); 
	}); 
</script>

