<?php include("header.php"); 
error_reporting(0);
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
<div class="container-fluid main-container">
	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
					$users = $_GET['users'];
					$s1  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
					$img = $sh1['picture'];
					if($img == ''){
						$img1 = 'passport/default.png';
					}
					else{
						$img1 = $img;
					}
					$employee = $sh1['employee'];
					$department= $sh1['department'];
					$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$term_begins = $sh2['t_start'];
					$term_ends = $sh2['t_stop'];
					$return1= $sh2['current_term'];

					if($return1 == "1"){
						$sur = "st";
					}
					elseif($return1 == "2"){
						$sur = "nd";
					}
					else {
						$sur = "rd";
					}
					$admission  = $_GET['student'];

					$att_get = mysqli_query($con,"SELECT * FROM attendance where session = '$return2' AND term = '$return1' and admission_no = '$admission' ");
					$att_num = mysqli_num_rows($att_get);
					$total_day = mysqli_query($con,"SELECT * FROM attendance  where  session = '$return2' AND term = '$return1' GROUP by date ");
					if(!$total_day){
						die(mysqli_error($con));
					}
					$day_num = mysqli_num_rows($total_day);

					?>

					<img src="<?php echo $img1 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $department ?></i>
				</div>
				<div class="panel-body">
					<p>View past result</p>
					<div class="row">
						<div class="col-lg-6">
							<br>
							<select class="form-control ses">
								<option value="">Session</option>
								<?php
								$old_res = mysqli_query($con, "SELECT * FROM  result where student = '$admission'  GROUP BY session ");
								while ($old_res2 = mysqli_fetch_array($old_res)) {
									$ses = $old_res2['session'];
									echo "<option  value='$ses'>$ses</option>";
								}
								?>
							</select>
						</div>
						<br>
						<div class="col-lg-6 col-sm-12" >
							<select class="form-control tem">
								<option value="">Term</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
					</div>
					<br>
					<?php
					$msql3 = mysqli_query($con,"SELECT * FROM calender");
					$fetch3 = mysqli_fetch_array($msql3);
					$session = $fetch3['session'];
					$term = $fetch3['current_term'];
					$admission = $_GET['student'];
				$ms_student  = mysqli_query($con,"SELECT * FROM students where admission_no ='$admission'");
					$check = mysqli_fetch_array($ms_student);
					$sname1 = $check['lname']." ".$check['fname']." ".$check['mname'];
					$class = $check['class'];
					$dobs = $check['dob'];
					function ageProcessor($bday = ''){
						$broken_pieces = explode('-',$bday);
						$dob = date_create( date('d-m-Y H:i:s', strtotime($bday)) );
						$now = date_create( date('Y-m-d H:i:s') );
						return date_diff( $dob, $now )->format('%y');
					}
					$ageget =  ageProcessor ($dobs); 
					if($dobs==""){
						$age = "";
					}
					else{
						$age = $ageget;
					}

					
						?>
						<div id="contents" class="col-lg-12">
							<div style="border:1px solid #d7d7d7; border-radius: 4px; padding: 5px;">
								<div id="editor"></div>
								<div class="row">

									<div class="col-lg-12"><span><img src="logo.png" style="width: 100px; height: 100px; position:absolute; left: 100px; top: 30px;"></span>&nbsp &nbsp  &nbsp<h2 class="text-center" style="font-weight: bold;"><?php echo $name ?></h2>
										<p style="text-align: center; font-weight: bold; font-size: 16px;">KM2, IFEWARA ROAD, ILE-IFE &nbsp &nbsp<sapan class='glyphicon glyphicon-phone'></sapan> 08034730770 </p>

										<p class="text-center"><span class="text-center" style=" padding:5px; font-size: 16px;color:#FFF; background-color:#000; ">MOTTO: From Acorn TO Oak</span></p>

										<p style="text-align: center; font-weight: bold; font-size:20px;"><?php echo $return1.$sur; ?> Term Report Sheet</p>
										<p style="text-align: center; font-weight: bold; color:#007670; font-size: 20px; font-family: Script MT Bold;">	<?php
										$class_detect = substr($class,0,3);  
										if($class_detect == "JSS"){
											echo "JUNIOR SECONDARY SCHOOL";
										}
										else{
											echo "SENIOR SECONDARY SCHOOL";
										}
										?>
									</p>
								</div>
							</div>

							<br>

							<div class="table-responsive table-box panel-1" style="font-size:14px;">
								<table class="table">
									<tr>
										<th style='font-weight:bold;'>Name:</th><td> <?php echo $sname1 ?></td>
										<th style='font-weight:bold;'>Class:</th><td> <?php echo $class ?></td>
										<th style='font-weight:bold;'>Admission no:</th><td> <?php echo $admission ?></td>

										<th style='font-weight:bold;'>Session:</th><td> <?php echo $return2 ?></td>
									</tr>
								</table>
								<table class="table">
									<tr>
										<th style='font-weight:bold;'>AGE:</th><td> <?php echo $age ?></td>
										<th style='font-weight:bold;'>ATTENDANCE:</th><td> <?php echo $att_num ?> Out Of <?php echo $day_num ?> </td>
										<th style='font-weight:bold;'>TERM BEGINS:</th><td> <?php echo $term_begins?></td>

										<th style='font-weight:bold;'>TERM ENDS:</th><td> <?php echo $term_ends ?></td>
									</tr>
								</table>
							</div>
							<div class=" col-lg-8 col-sm-12 panel-1" >
								<br>
								<div class="table-responsive table-box">
									<table class="table table-bordered">
										<tr>
											<th>SUBJECTS</th>
											<th>CASS</th>
											<th>EXAM</th>
											<th>TOTAL </th>
											<th>GRADE</th>
											<th>POSTN</th>
										</tr>
										<tr>
											<th>MAX MARKS OBTAINABLE</th>

											<th>40</th>
											<th>60</th>
											<th>100</th>
											<th></th>
											<th></th>
										</tr>
										<?php
										$ich = substr($class,0,3);
										$uman = $_SESSION['users2'];
										$run2 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' ");

										while($result2 = mysqli_fetch_array($run2)){

											$subject = $result2['subject'];
											$score = $result2['score'];
											$score2 = $result2['score2'];
											$score3 = $result2['score3'];
											$total1 = $score+$score2;
											$score4 = $result2['score4'];
											$last = $result2['last'];
											$codec = $result2['code'];
											$total3 = $total1+$score4;
											$final =mysqli_query($con,"SELECT * FROM subject_pos where student= '$admission' and code ='$codec' and session = '$return2' and term = '$return1' ");
											if(!$final){
												die(mysqli_error($con));
											}
											$pos_x = mysqli_fetch_array($final);

											$pox_y = $pos_x['pos'];
											if($last == ""){
												$total2 = $total3 ;
											}
											else{
												$total2 = ceil(($total3+$last)/2);
											}
											$total_mark_score +=$total2;
											if($ich == "SSS"){
												if($total2 >= 75){
													$grade = "A1";
												}
												elseif($total2 >=70){
													$grade = "B2";
												}
												elseif ($total2 >=65) {
													$grade = "B3";
												}
												elseif ($total2 >=60) {
													$grade = "C4";
												}
												elseif ($total2 >=55) {
													$grade = "C5";
												}
												elseif ($total2 >=50) {
													$grade = "C6";
												}
												elseif ($total2 >=45) {
													$grade = "D7";
												}
												elseif ($total2 >=40) {
													$grade = "E8";
												}
												else {
													$grade = "F9";
												}
											}

											else{
												if($total2 >= 70){
													$grade = "A";
												}
												elseif($total2 >=50){
													$grade = "C";
												}
												elseif ($total2 >=40) {
													$grade = "P";
												}
												else {
													$grade = "F";
												}
											}


											if($score<10){
												$color = "#f30";
											}
											else{
												$color = "#03f";
											}
											if($score2<10){
												$color5 = "#f30";
											}
											else{
												$color5 = "#03f";
											}
											if($score3<5){
												$color1 = "#f30";
											}
											else{
												$color1 = "#03f";
											}
											if($total1<20){
												$color2 = "#f30";
											}
											else{
												$color2 = "#03f";
											}
											if($score4<30){
												$color3 = "#f30";
											}
											else{
												$color3 = "#03f";
											}
											if($total2<50){
												$color4 = "#f30";
											}
											else{
												$color4 = "#03f";
											}
											if($total2 >= 70){
												$pre = "Excellent";
											}
											elseif($total2 >=60){
												$pre = "Good";
											}
											elseif ($total2 >=50) {
												$pre = "Average ";
											}
											elseif ($total2 >=40) {
												$pre = "fair ";
											}
											else {
												$pre = " very poor ";
											}
											?>

											<tr>
												<th style="text-transform: capitalize; font-size:14px;"><?php echo $subject ?></th>

												<td style=" color: <?php echo $color2 ?>"><?php echo $total1 ?></td>
												<td style="color: <?php echo $color3 ?>"><?php echo $score4 ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $total2 ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $grade ?></td>
												<td><?php echo $pox_y ?></td>


											</tr>
											<?php
										}
										$sub = mysqli_query($con, "SELECT * from subject where participant = '$class' and type = 'compulsory'");
										$number_of_c_subjects = mysqli_num_rows($sub);
										$el_show = mysqli_query($con,"SELECT * FROM elective_subject where student_id = '$admission'");
										$number_of_e_subjects = mysqli_num_rows($el_show);
										$total_subjects = $number_of_e_subjects + $number_of_c_subjects;
										$total_mark = $total_subjects*100;
										$total_mark_score;
										?>
										<tr>
											<th style="text-transform: capitalize; font-size:14px;"><b>TOTAL</b></th>
											<td></td>
											<td></td>
											<td><?php echo $total_mark_score ?></td>
											<td></td>
											<td></td>

										</tr>
									</table>
								
								</div>
								<?php 
								$sub = mysqli_query($con, "SELECT * from subject where participant = '$class' and type = 'compulsory'");
								$number_of_c_subjects = mysqli_num_rows($sub);
								$el_show = mysqli_query($con,"SELECT * FROM elective_subject where student_id = '$admission'");
								$number_of_e_subjects = mysqli_num_rows($el_show);
								$total_subjects = $number_of_e_subjects + $number_of_c_subjects;
								$total_mark = $total_subjects*100;
								$total_mark_score;
								$percentage = round(($total_mark_score/$total_mark)*100,1);
								$pos = mysqli_query($con,"SELECT * FROM per where admission_no = '$admission' and session = '$return2' and term = '$return1' ");
								$position = mysqli_fetch_array($pos);
								$post = $position['position'];
								$st_no = mysqli_query($con,"SELECT * FROM  students where class = '$class'");
								$no = mysqli_num_rows($st_no);
								if($percentage >= 70){
									$pre = "Excellent  performance";
								}
								elseif($percentage >=60){
									$pre = "Good  performance";
								}
								elseif ($percentage >=50) {
									$pre = "Average  performance ";
								}
								elseif ($percentage >=40) {
									$pre = "fair  performance ";
								}
								else {
									$pre = " very poor performance ";
								}
								if($percentage >40){
									$promotion_status = "PROMOTED";
								}
								else{
									$promotion_status = "TO REPEAT";
								}
								echo "<div class='thumbnail'><h5 class='text-left' style='font-weight:bold;'>Total percentage:". $percentage."%  <span style='float:right; margin-right:50px;'>Position: $post out of $no</span> ";if($return1 == 3){
									
									echo "<span class='' style='padding:5px' id='stamp'>Promotion Status: <span style='text-transform:uppercase; font-weight:bold;'>$promotion_status</span></span></h5>";

							
								}
								echo"</div>";
								?>

							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 panel-1">
								<br>
								<table class="table table-bordered">
									<tr>
										<th>SkillS</th>
										<th>Score
											<table border="1">
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>
												</tr>
											</table>
										</th>
									</tr>	

									<?php 
									$extral = mysqli_query($con,"SELECT * FROM extral_score where student_id = '$admission' and session = '$session' and term = '$term' and  activity != 'class teachers remarks' and  activity != 'Principals Remark' ");
									while($extral_show = mysqli_fetch_array($extral))
									{
										$activity = $extral_show['activity'];
										$ex_score = $extral_show['score'];
										?>
										<tr>
											<th><span style='font-size:12px;'><?php echo $activity ?></span></th>
											<td><table border="1" width="100%">
												<tr>
													<td><?php if($ex_score == 1){
														echo "<p style='font-size:10px;'>&#10004</p>"; 
														;														} 
														else{
															echo "<p style='font-size:10px; color:#fff;'>&#10004</p>";
														}
														?>

													</td>

													<td><?php if($ex_score == 2){
														echo "<p style='font-size:10px;'>&#10004</p>"; 
														;														} 
														else{
															echo "<p style='font-size:10px; color:#fff;'>&#10004</p>";
														}
														?>

													</td>
													<td><?php if($ex_score == 3){
														echo "<p style='font-size:10px;'>&#10004</p>"; 
														;														} 
														else{
															echo "<p style='font-size:10px; color:#fff;'>&#10004</p>";
														}
														?>

													</td>
													<td><?php if($ex_score == 4){
														echo "<p style='font-size:10px;'>&#10004</p>"; 
														;														} 
														else{
															echo "<p style='font-size:10px; color:#fff;'>&#10004</p>";
														}
														?>

													</td>
													<td><?php if($ex_score == 5){
														echo "<p style='font-size:10px;'>&#10004</p>"; 
														;														} 
														else{
															echo "<p style='font-size:10px; color:#fff;'>&#10004</p>";
														}
														?>

													</td>
												</tr>
											</table></td>
										</tr>
										<?php	
									}
									?>
								</table>


							</div>
							<div class="col-lg-8">
								<div class="thumbnail">
									<?php

									$extral2 = mysqli_query($con,"SELECT * FROM extral_score where student_id = '$admission' and session = '$session' and term = '$term' and  activity = 'class teachers remarks' ");
									$extral_show = mysqli_fetch_array($extral2);

									$activity = $extral_show['activity'];
									$score = $extral_show['score'];

									echo "<p  style='font-weight:bold; text-transform:capitalize;'> $activity: <span style='border-bottom:1px dotted #999; font-weight:normal !important;  '>$pre; $score</span></p>";

									?>
								</div>
							</div>
							<div class="col-lg-8">	<p style="background-color: #007670; color:#FFF;padding:5px; font-size: 13px;">NOTE: Any cancellation or erasure on this report sheet renders it invalid</p></div>
							<div class="col-lg-4"><p class="text-center"><span style='border-bottom:1px dotted #000;'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span><br>Principal's Signature <br></p></div>

							<div class="panel-2"></div>
							
					</div>
				</div>
				
				<div class="col-lg-12">
				<p class="text-center"><br><button class="btn btn-info" id="" onclick="generatePDF()" ><span class="glyphicon glyphicon-print"></span> Print Result</button></p></div>

			</div>
		</div>
	</div>
</div>
</div>
<div id="pop"></div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tem,.ses"). change(function(){
			var tem = $(".tem").val();
			var ses = $(".ses").val()
			$.ajax({
				method:"POST",
				url:"other.php",
				data:{tem:tem,ses:ses},
				success:function(data){
					$('.panel-1').hide();

					$('.panel-2').html(data);

				}
			})
		})
	})
</script>
</body>
</html>
