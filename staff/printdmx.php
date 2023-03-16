<?php include("header.php") ?>
<style type="text/css">
/*@media print {
body *{ visibility: hidden; }
#contentx *{visibility: visible;}
#contentx {position: absolute; top: 40px; left: 30px;}*/
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php //error_reporting(0) ;?>
					<?php 
					$users = $_SESSION['users'];
					$s1  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['fname']." ".$sh1['lname'];
					$img = $sh1['picture'];
					$department= $sh1['department'];
					if(isset($_POST['view_res'])){
						$return2 = $_POST['sessioon'];
						$return1 = $_POST['termm'];
					}
					else{
						$s2  = mysqli_query($con,"SELECT * FROM  calender ");
						$sh2 = mysqli_fetch_array($s2);
						$return2= $sh2['session'];
						$return1= $sh2['current_semester'];
					}
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
					<div class='thumbnail'>
						<h4 class="text-center">View Previous Results</h4>
						<form method="POST">
							<div class="col-lg-6">
								<small>Select Sesssion</small>
								<select class="form-control" name = "sessioon">
									<option value="">Select Session </option>
									<?php 
									$old_res = mysqli_query($con,"SELECT * FROM result group by session");
									while($old_res2 = mysqli_fetch_array($old_res)){
										$sessioon = $old_res2['session'];
										echo "<option value='$sessioon'>$sessioon</option>";
									}

									?>
								</select>
							</div>

							<div class="col-lg-6">
								<small>Select term</small>
								<select class="form-control" name="termm">
									<option value="">Select Semester </option>
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
								<br>
							</div>

							<p class="text-center"><button class="btn" name="view_res">View</button></p>
						</form>
					</div>
				</div>
				<div class="panel-body" id="contentx">
					<?php 
					if(isset($_GET['is'])){
						$is = $_GET['is'];
						$sl2 = mysqli_query($con,"SELECT * from course where code = '$is'" );
						$sh2 = mysqli_fetch_array($sl2);
						$code = $sh2['code'];
						$level = $sh2['level'];
						$title = $sh2['title'];
					}
					?>
					<div style="background-color:#fff; color: #999; border:1px solid #D7D7D7; padding:10px; border-radius: 4px;"> 
						<div class="row">
							<div class="col-lg-1"><img src="logo.png" style="width: 90px; height: 90px;"></div>

							<div class="col-lg-10"><h4 class="text-center" style="font-weight: bold;"><?php echo $name ?></h4><p style="text-align: center; font-weight: bold;">Score Sheet</p></div>
						</div>
						<br>
						<div class="table-responsive table-box">
							<table class="table table-striped table-bordered">
								<tr>
									<th>TITLE</th>
									<th>COURSE CODE</th>
									<th>LEVEL</th>
									<th>SESSION</th>
									<th>SEMESTER</th>
								</tr>
								<tr>
									<td><?php echo $title ?></td>
									<th><?php echo $code ?></th>
									<td><?php echo $level ?></td>
									<td><?php echo $return2 ?></td>
									<td><?php echo $return1 ?></td>
								</tr>
							</table>
							<table id="class_data" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Admission no</th>
										<th>Name</th>
										<th>Score</th>
										<th>Grade</th>
										<th>Remark</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$pag = mysqli_query($con,"SELECT * FROM course_registration where course_code = '$code' and session = '$return2' and semester = '$return1'");								
									while($sqlxx = mysqli_fetch_array($pag)){
										$studenty =  $sqlxx['matric_no'];
											$get_name = mysqli_query($con,"SELECT * FROM students where matric_no = '$studenty'");
								$show_name = mysqli_fetch_array($get_name);
								$name_get = $show_name['lname']." ".$show_name['fname'];
										$msquery2 = mysqli_query($con,"SELECT * FROM result   where matric_no = '$studenty' and code = '$code'  and session = '$return2' and semester = '$return1'");
										$sh5 = mysqli_fetch_array($msquery2);
										$score = $sh5['score'];
											if($score >= 70){
												$grade = "A";
												$remark = "PASS";
											}
											elseif($score >=60){
												$grade = "B";
												$remark = "PASS";
											}
											elseif($score >=50){
												$grade = "C";
												$remark = "PASS";
											}
											elseif ($score >=45) {
												$grade = "D";
												$remark = "PASS";
											}

											elseif ($score >=40) {
												$grade = "E";
												$remark = "PASS";
											}
											else {
												$grade = "F";
												$remark = "FAIL";
											}
										$grade1[] = $grade; 
										?>


										<tr>
											<td><?php echo $studenty?></td>
											<td><?php echo $name_get ?></td>
											<td><?php echo $score ?></td>
											<td><?php echo $grade ?></td>
											<td><?php echo $remark ?></td>
											
										</tr>

										<?php

									}
									?>
								</tbody>
							</table>
						</div>
						<hr>
						<h4 class="text-center">Result Summary</h4>
						<div class="row">
							<div class="col-lg-12">
								<?php 
								$ss = array_count_values($grade1);
								

									if(empty($ss['A'])){
										$ss1  = "0";
									}
									else{
										$ss1 = $ss['A'];
									}
									if(empty($ss['B'])){
										$ss2  = "0";
									}
									else{
										$ss2 = $ss['B'];
									}
									
									if(empty($ss['C'])){
										$ss6  = "0";
									}
									else{
										$ss6 = $ss['C'];
									}
									if(empty($ss['D'])){
										$ss7  = "0";
									}
									else{
										$ss7 = $ss['D'];
									}
									if(empty($ss['E'])){
										$ss8  = "0";
									}
									else{
										$ss8 = $ss['E'];
									}
									if(empty($ss['F'])){
										$ss9  = "0";
									}
									else{
										$ss9 = $ss['F'];
									}
									echo "<table class='table table-bordered table-striped'>
									<tr><th>Grades </th>
									<th>No of students</th>
									</tr>
									<tr>
									<td>A</td><td>$ss1</td>
									</tr>
									<tr>
									<td>B</td><td>$ss2</td>
									</tr>
									<tr>
									<td>C</td><td>$ss6</td>
									</tr>
									<tr>
									<td>D</td><td>$ss7</td>
									</tr>
									<tr>
									<td>E</td><td>$ss8</td>
									</tr>
									<tr>
									<td>F</td><td>$ss9</td>
									</tr></table>";
								?>
							</div>

						</div>
						<div class="row">
							<div class="col-lg-6">
								<p>recorded by:</p>
								<small>name........................................................................</small>
								<small>signature & date ..................................................................</small>
							</div>
							<div class="col-lg-6">
								<p>approved by:</p>
								<small>name ..........................................................................</small>
								<small>signature & date .....................................................................</small>
							</div>
						</div>

						<p class="text-center"><br><button class="btn btn-info" onclick="generatePDF()">print result</button></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script> 
	$(document).ready(function(){
		$('#class_data').DataTable(); 
	}); 
</script> 