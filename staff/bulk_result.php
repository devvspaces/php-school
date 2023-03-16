<?php include("header.php"); 
error_reporting(0);
?>
<!--This style is to transform the Subject into sentence case-->
<style>
	.form-label {
		text-transform: lowercase;
	}

	.form-label:first-letter {
		text-transform: uppercase;
	}
	th {
		color:#555 !important;
	}
</style>
<!--End here-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script type="text/javascript" src="print.js"></script>
<div class="container-fluid main-container">

	<div class="row main">
		<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
					//this is to get the details of the staff protal
					$users = $_SESSION['users'];
					$s3  = mysqli_query($con,"SELECT * FROM staff where username = '$users'");
					$sh3 = mysqli_fetch_array($s3);
					$name2 = $sh3['lname']." ".$sh3['fname']." ".$sh3['mname'];
					$img = $sh3['picture'];
					if($img == ''){
						$img1 = 'passport/default.png';
					}
					else{
						$img1 = $img;
					}
					$employee = $sh3['employee'];
					$department = $sh3['department'];
					//c for choosen
					$admission = $_GET['student'];
					//details of the student in view
					$s1  = mysqli_query($con,"SELECT * FROM students where admission_no = '$admission'");
					$sh1 = mysqli_fetch_array($s1);
					$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
					$dobs = $sh1['dob'];
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
					$class = $sh1['class'];
					$admission = $sh1['admission_no'];
					$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					
					$term_begins = $sh2['t_start'];
					$term_ends = $sh2['t_stop'];

					//either the current term or selected term is determined here
					if(isset($_POST['c_sess'])){
						$return2 = $_POST['c_sess'];
						$return1 = $_POST['c_term'];
					}
					else{
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];
					}
					if($return1 == "1"){
						$sur = "st";
					}
					elseif($return1 == "2"){
						$sur = "nd";
					}
					else {
						$sur = "rd";
					}
					$att_get = mysqli_query($con,"SELECT * FROM attendance where session = '$return2' AND term = '$return1' and admission_no = '$admission' ");
					$att_num = mysqli_num_rows($att_get);
					$total_day = mysqli_query($con,"SELECT * FROM attendance  where  session = '$return2' AND term = '$return1' GROUP by date ");
					if(!$total_day){
						die(mysqli_error($con));
					}
					$day_num = mysqli_num_rows($total_day);

					?>

					<img src="<?php echo $img1 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name2 ?></h4>
					<i><?php echo $department ?></i>
				</div>
				<div class="panel-body">
					<h4 class="text-center">View past result</h4>
					<div class="row">
						<div class="col-lg-6">
							<br>
							<form method="POST">
							<select class="form-control" name = "c_sess" >
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
							<select class="form-control" name="c_term">
								<option value="">Term</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="col-lg-12">
							<br>
						<p class="text-center"><button class="btn" type="submit" name="submit">VIEW</button></p>
					</div>
				</form>
					</div>
				</div>
				<div class="panel-body">
					<br>
					<?php
					$dal = mysqli_query($con,"SELECT * FROM daily_report where admission_no = '$admission' ");
					$ret = mysqli_fetch_array($dal);
					$abs = $ret['report'];

						?>
						<div id="contentx">
							<div style="border:1px solid #d7d7d7; border-radius: 4px; padding:1px;">
								<div id="editor"></div>
								<div class="row">
									<div class="col-lg-12"><span><img src="logo.png" style="width: 70px; height: 70px; position:absolute; left: 100px; top: 30px;"></span>&nbsp &nbsp  &nbsp<h3 class="text-center" style="font-weight: bold;"><?php echo $name ?></h3>
										<p style="text-align: center; font-weight: bold; font-size: 12px;">KM3, AKURE-OWO EXPRESS ROAD,SHASHA, <br>OBA-ILE AKURE ONDO STATE <br>&nbsp &nbsp<sapan class='glyphicon glyphicon-phone'></sapan> 08035042727 </p>
										<p style="text-align: center; font-weight: bold; font-size:14px;"><?php echo $return1.$sur; ?> Term Report Sheet</p>
										<p style="text-align: center; font-weight: bold; color:#1d3390; font-size: 14px; font-family: Script MT Bold;">	<?php
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

							<div class="table-responsive table-box panel-1" style="font-size:12px;  padding: 2px;">
								<table class="table">
									<tr>
										<th style='font-weight:bold;'>Name:</th><td> <?php echo $name1 ?></td>
										<th style='font-weight:bold;'>Class:</th><td> <?php echo $class ?></td>
										<th style='font-weight:bold;'>Admission no:</th><td> <?php echo $admission ?></td>

										<th style='font-weight:bold;'>Session:</th><td> <?php echo $return2 ?></td>
									</tr>
									<tr>
										<th style='font-weight:bold;'>AGE:</th><td> <?php echo $age ?></td>
										<th style='font-weight:bold;'>ATTENDANCE:</th><td>  </td>
										<th style='font-weight:bold;'>TERM BEGINS:</th><td> <?php echo $term_begins?></td>

										<th style='font-weight:bold;'>TERM ENDS:</th><td> <?php echo $term_ends ?></td>
									</tr>
								</table>
							</div>
							<div class=" col-lg-9 col-sm-12 panel-1" >
								<br>
								<div class="table-responsive table-box">
									<table class="table table-bordered">
										<tr>
											<th>SUBJECTS</th>
											<th>CA1</th>
											<th>CA2</th>
											<th>CAT</th>
											<th>EXAM</th>
											<th>T1</th>
											<th>LTC</th>
											<th>TC</th>
											<th>GR</th>
											<th>POS</th>
										</tr>
										
										<?php
										$ich = substr($class,0,3);
										$run2 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' group by code  ");

										while($result2 = mysqli_fetch_array($run2)){
											$codec = $result2['code'];
											$subject = $result2['subject'];
										$m1 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' and code = '$codec' and exam_type = 'CA1'  ");
										$ms1 = mysqli_fetch_array($m1);
										$ca1 = $ms1['score'];

										// ca2

										$m2 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' and code = '$codec' and exam_type = 'CA2'  ");
										$ms2 = mysqli_fetch_array($m2);
										$ca2 = $ms2['score'];

										//exam

										$e1 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' and code = '$codec' and exam_type = 'ett'  ");
										$e2 = mysqli_fetch_array($e1);
										$ett = $e2['score'];

										//last
										$last1 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '$return2' and term = '$return1' and code = '$codec' and exam_type = 'last'  ");
										$last2 = mysqli_fetch_array($last1);
										$ltc = $last2['score'];
										$total1 = $ca1+$ca2;
										$total3= $total1+$ett;
											$final =mysqli_query($con,"SELECT * FROM subject_pos where student= '$admission' and code ='$codec' and session = '$return2' and term = '$return1' ");
											if(!$final){
												die(mysqli_error($con));
											}
											$pos_x = mysqli_fetch_array($final);

											$pox_y = $pos_x['pos'];
											if($ltc == ""){
												$total2 = $total3 ;
											}
											else{
												$total2 = ceil(($total3+$ltc)/2);
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
												elseif($total2 >=60){
													$grade = "B";
												}
												elseif($total2 >=50){
													$grade = "C";
												}
												elseif ($total2 >=45) {
													$grade = "D";
												}

												elseif ($total2 >=40) {
													$grade = "E";
												}
												else {
													$grade = "F";
												}
											}

											//ca1
											if($ca1<10){
												$color = "#f30";
											}
											else{
												$color = "#03f";
											}
											//ca2
											if($ca2<10){
												$color11 = "#f30";
											}
											else{
												$color11 = "#03f";
											}
											//cat
											if($total1<20){
												$color2 = "#f30";
											}
											else{
												$color2 = "#03f";
											}
											//ett
											if($ett<30){
												$color3 = "#f30";
											}
											else{
												$color3 = "#03f";
											}
											//t1
											if($total2<50){
												$color4 = "#f30";
											}

											else{
												$color4 = "#03f";
											}
											//t2
											if($total3<50){
												$color5 = "#f30";
											}
											else{
												$color5 = "#03f";
											}
											//last
											if($ltc<50){
												$color6 = "#f30";
											}
											else{
												$color6 = "#03f";
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
												<th style="text-transform: capitalize; font-size:12px;"><?php echo $subject ?></th>
												<td style="color: <?php echo $color ?>"><?php echo $ca1 ?></td>
												<td style="color: <?php echo $color11 ?>"><?php echo $ca2 ?></td>
												<td style=" color: <?php echo $color2 ?>"><?php echo $total1 ?></td>
												<td style="color: <?php echo $color3 ?>"><?php echo $ett ?></td>
												<td style="color: <?php echo $color5 ?>"><?php echo $total3 ?></td>
												<td style="color: <?php echo $color6 ?>"><?php echo $ltc ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $total2 ?> </td>
												<td style="color: <?php echo $color4 ?>"><?php echo $grade ?></td>
												<td style="color: <?php echo $color4 ?>"><?php echo $pox_y ?></td>
												


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
											<td></td>
											<td></td>
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
								$el_show = mysqli_query($con,"SELECT * FROM elective_subject where student_id = '$admission' and session = '$return2' and term = '$return1'");
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
								if($percentage >40){
									$promotion_status = "PROMOTED";
								}
								else{
									$promotion_status = "TO REPEAT";
								}
								?>
								<div class="thumbnail">
									<?php

									$extral2 = mysqli_query($con,"SELECT * FROM extral_score where student_id = '$admission' and session = '$return2' and term = '$return1' and  activity = 'class teachers remarks' ");
									$extral_show = mysqli_fetch_array($extral2);

									$activity = $extral_show['activity'];
									$score = $extral_show['score'];

									echo "<p  style='font-weight:bold; text-transform:capitalize;'> $activity: <span style='border-bottom:1px dotted #999; font-weight:normal !important;'>$score</span></p>";

									?>
								</div>
							</div>
							<div class="col-lg-3 col-md-12 col-sm-12 panel-1">
								<br>
								<table class="table table-bordered">
									<tr>
										<th>SkillS</th>
										<th>Rating</th>
									</tr>	

									<?php 
									$extral = mysqli_query($con,"SELECT * FROM extral_score where student_id = '$admission' and session = '$return2' and term = '$return1' and  activity != 'class teachers remarks' and  activity != 'Principals Remark' ");
									while($extral_show = mysqli_fetch_array($extral))
									{
										$activity = $extral_show['activity'];
										$ex_score = $extral_show['score'];
										?>
										<tr>
											<th><span style='font-size:12px;'><?php echo $activity ?></span></th>
											<td><?php echo $ex_score ?></td>
										</tr>
										<?php	
									}
									?>
								</table>

								<div class='thumbnail'>
								<table class="table table-bordered table-striped">
									<tr>
										<th>Overall Percentage:<?php echo $percentage."%" ?></th>
										
									</tr>
									<tr>
										<th>Position: <?php echo $post ." out of ". $no ?></th>
									</tr>
									<tr>
										<th><?php  if($return1 == 3){

									echo "<span class='' style='padding:5px' id='stamp'>Promotion Status: <span style='text-transform:uppercase; font-weight:bold;'>$promotion_status</span></span>"; } ?>
										
									</th>
									</tr>
								</table>
								<p class="text-center"><span style='border-bottom:1px dotted #000;'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span><br>Principal's Signature <br></p>
							</div>
							<p style="font-size: 10px;">&copy<?php echo date("Y")?> HAPA COLLEGE GOD IS OUR SOURCE</p>
							</div>
							
							
					</div>

				</div>
				<div class="col-lg-12">
				<p class="text-center"><br><button class="btn btn-info" id="" onclick="generatePDF()" ><span class="glyphicon glyphicon-print"></span> Print Result</button></p></div>

			</div>
		</div>
	</div>
</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>