	<?php include("header.php");
	error_reporting(0);
	?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel panel-default">
					<div class="panel-heading" id="p_heading">
						<?php 
						$users = $_SESSION['users'];
						$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
						$img = $sh1['picture'];
						$class = $sh1['class'];
						$admission = $sh1['admission_no'];
						if($img==""){
							$img2="passport/default.png";
						}
						else{
							$img2 = $img;
						}
						?>
						<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
						<h4><?php echo $name1 ?></h4>
						<i><?php echo $class ?></i>
					</div>
					<div class="panel-body">
						<div id="contentx">
						<?php
						$msql3 = mysqli_query($con,"SELECT * FROM calender");
						$fetch3 = mysqli_fetch_array($msql3);
						$session = $fetch3['session'];
						$term = $fetch3['current_term'];
						$query = mysqli_query($con,"SELECT * FROM fees");
						while($fetch2 = mysqli_fetch_array($query)){
							$part = $fetch2['participant'];
							$code = $fetch2['code'];
							$list = explode(',', $part);
							$hay = array('all',$class, $admission);
							if(count(array_intersect($hay, $list))>0){
								//echo "yes";
								$code1 = $code;
							}
							else{
								//echo "no";
								$code1 = '';
							}							
							$sl2 = mysqli_query($con,"SELECT * FROM fees where code = '$code1' and session = '$session' and term = '$term'  ");
							$num0 += mysqli_num_rows($sl2);
						}
						$mis3 = mysqli_query($con,"SELECT * FROM paid_fees where student = '$admission'AND session = '$session' AND term = '$term' ");
						$num1 = mysqli_num_rows($mis3);
				//echo $num1;
						if($num1 != $num0){
							$status1 = "yet to be cleared";
						}
						else{
							$status1 = "cleared";
						}

						?>
						
						<div class="row">

							<div class="col-lg-1"><img src="logo.png" style="width: 90px; height: 90px;"></div>
							<div class="col-lg-11"><h4 class="text-center" style="font-weight: bold;"> <?php
							$path = "../name.txt";
							$name = file_get_contents($path);
							echo $name;?></h4><p style="text-align: center; font-weight: bold;">Clearance</p></div>
						</div>
						<br>
						<table class="table table-bordered">
							<tr>
								<th>Name</th>
								<th>Admission no</th>
								<th>Class</th>
								<th>Status</th>
							</tr>
							<tr>
								<td><?php echo $name1 ?></td>
								<td><?php echo $admission ?></td>
								<td><?php echo $class ?></td>
								<td><?php echo $status1 ?></td>
							</tr>

						</table>					
					</div>
				</div>
					<div class="panel-body">
						<div class="table-responsive table-box">

							<p class="text-center"><a href="#" class="btn btn-success" onclick="window.print()">Print clearance</a></p>
						</div>
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