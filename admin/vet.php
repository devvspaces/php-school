<?php include("header.php") ?>
<div class="container-fluid main-container">
	<div class="row main">
		<?php
		include("linkpanel.php") ?>

		<div class="col-sm-9 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
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
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $position ?></i>
				</div>
				<div class="panel-body">
					<div class="thumbnail">
						<h4 class="text-center">SELECT THE CLASS AND SUBJECT</h4>
						<div class="row">
							<form method="POST">
						<div class="col-lg-6 form-group" > 
							<select name="class" class="form-control clas" required>
								<option value="">Select Class</option>
								<?php
								$get_class = mysqli_query($con,"SELECT * FROM class");
								while($show_class = mysqli_fetch_array($get_class)){
									$c_class = $show_class['class'];
									echo "<option value='$c_class'>$c_class</option>";

								}

								?>
							</select>
						</div>
						<div class="col-lg-6 form-group" > 
							
								
									<div id="content-x">
										<select class="form-control">
											<option value="">Select Sujbect</option>
										</select>
									</div>
								
								
							
						</div>
						<p class="text-center"><button class="btn" type="submit" name="submit" >Search</button></p> 
					</form>
					</div>
			</div>
		</div>
		<div class="panel-body">
			<?php if(isset($_POST['submit'])){
				$class = $_POST['class'];
				$subject = $_POST['subject'];
				//echo $class." ".$subject;

				$qx = mysqli_query($con,"SELECT * FROM calender ");
				$sh3 = mysqli_fetch_array($qx);
				$return2 = $sh3['session'];
				$return1 = $sh3['current_term'];
				$sl2 = mysqli_query($con,"SELECT * from subject where sn = '$subject'" );
							$sh2 = mysqli_fetch_array($sl2);
							$code = $sh2['code'];
							$participant = $sh2['participant'];
							$title = $sh2['title'];
							$type2 = $sh2['type'];
							$ich = substr($participant,0,3);
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
									<th>SUBJECT</th>
									<th>SUBJECT CODE</th>
									<th>CLASS</th>
									<th>SESSION</th>
									<th>TERM</th>
								</tr>
								<tr>
									<td><?php echo $title ?></td>
									<th><?php echo $code ?></th>
									<td><?php echo $participant ?></td>
									<td><?php echo $return2 ?></td>
									<td><?php echo $return1 ?></td>
								</tr>
							</table>
							<table id="class_data" class="table table-striped table-bordered">
							    <thead>
								<tr>
									<th>Admission no</th>
									<th>CA1</th>
									<th>CA2</th>
									<th>CAT</th>
									<th>Exam</th>
									<th>T1</th>
									<th>LTC</th>
									<th>T2</th>
									<th>GR</th>
									<th>POS  <a href="position1.php?sbj=<?php echo $code ?>&&class=<?php echo $participant ?>" title="compute position" class="btn btn-sm"><span class="glyphicon glyphicon-edit"></span></a></th>
								</tr>
								</thead>
								<tbody>
								<?php 

								if($type2 == "elective"){
									$pag = mysqli_query($con,"SELECT * FROM elective_subject where subject_id = '$is' and session = '$return2' and term = '$return1'");

								}
								else{
									$pag = mysqli_query($con,"SELECT * from students where class = '$participant'");
								}

								while($sqlxx = mysqli_fetch_array($pag)){
									$studenty =  $sqlxx['admission_no'];
								$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$studenty' and code = '$code'  and session = '$return2' and term = '$return1' and exam_type ='CA1'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ca1 = $sh5['score'];
									// ca2
									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$studenty' and code = '$code'  and session = '$return2' and term = '$return1' and exam_type ='CA2'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ca2 = $sh5['score'];
									$catotal = $ca1+$ca2;
									// exam
									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$studenty' and code = '$code'  and session = '$return2' and term = '$return1' and exam_type ='ett'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$ett= $sh5['score'];
									$total1 = $ett+$catotal;
									//last term cumul

									$msquery2 = mysqli_query($con,"SELECT * FROM result   where student = '$studenty' and code = '$code'  and session = '$return2' and term = '$return1' and exam_type ='last'  ");
								
									$sh5 = mysqli_fetch_array($msquery2);
									$admno = $sh5['student'];
									$last= $sh5['score'];
									
									//check subject position
									$final =mysqli_query($con,"SELECT * FROM subject_pos where student= '$studenty' and code ='$code' and session = '$return2' and term = '$return1' ");
									if(!$final){
									    die(mysqli_error($con));
									}
									$pos_x = mysqli_fetch_array($final);
									
									$pox_y = $pos_x['pos'];


									//color
									if($ca1<10){
										$color = "#f30";
									}
									else{
										$color = "#03f";
									}
									if($ca2<10){
										$color5 = "#f30";
									}
									else{
										$color5 = "#03f";
									}
									
									if($catotal<20){
										$color2 = "#f30";
									}
									else{
										$color2 = "#03f";
									}
									if($ett<30){
										$color3 = "#f30";
									}
									else{
										$color3 = "#03f";
									}
									if($total1<50){
										$color4 = "#f30";
									}
									else{
										$color4 = "#03f";
									}
									if($last<50){
										$color9 = "#f30";
									}
									else{
										$color9 = "#03f";
									}
									if($last==""){
										$total2 = $total1;
									}
									else{
										$total2 = ceil(($last+$total1)/2);
									}
								
									if($total2<50){
										$color10 = "#f30";
									}
									else{
										$color10 = "#03f";
									}
									if($ich=="SSS"){
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
									$grade1[] = $grade; 
									?>
								

									<tr>
										<td><?php echo $studenty?></td>
										<td style="color: <?php echo $color ?>"><?php echo $ca1 ?></td>
										<td style="color: <?php echo $color5 ?>"><?php echo $ca2 ?></td>
										<td style="color: <?php echo $color2 ?>"><?php echo $catotal ?></td>
										<td style="color: <?php echo $color3 ?>"><?php echo $ett ?></td>
										<td style="color: <?php echo $color4 ?>"><?php echo $total1 ?></td>
										<td style="color: <?php echo $color9 ?>"><?php echo $last ?></td>
										<td style="color: <?php echo $color10 ?>"><?php echo $total2 ?></td>
										<td style="color: <?php echo $color10 ?>" ><?php echo $grade ?></td>
										<td><?php echo $pox_y ?></td>
									</tr>

									<?php
									
								}
								?>
                                </tbody>
							</table>
						</div>
						</div>
			<?php
			}
			?>
		</div>
		</div>
	</div>
</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
    $(document).ready(function(){
       $('.clas').change(function(){
         var clas = $(".clas").val();
         $.ajax({
         url:"q_subjects.php",
         method:"POST",
         data:{clas:clas,},
         success:function(data){
         $('#content-x').html(data);
         //alert(data);
              }
   });    
 });
 });

        </script>
