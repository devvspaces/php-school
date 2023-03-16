<?php include("header.php") ?>
<script>

	window.onbeforeunload = function (e) {
		e = e || window.event;

// For IE and Firefox prior to version 4
if (e) {
	e.returnValue = 'please ensure you click the upload button before leaving this page';
}

// For Safari
return 'please ensure you click the upload button before leaving this page';
};
</script>
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
					$employee = $sh1['employee'];
					$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$return2 = $sh3['session'];
					$return1 = $sh3['current_semester'];
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
					<div class="alert alert-danger"> 
						<a href="#" class="close" data-dismiss="alert"> 
							&times; 
						</a> 
						Please take note
						<ul>
							<li>Always click upload before leaving the page or closing the page </li>
							<li>Goodluck!</li>
						</ul>
					</div>
					<?php 

					if(isset($_GET['is'])){
						$is = $_GET['is'];
						$sl2 = mysqli_query($con,"SELECT * from course where code = '$is'" );
						$sh2 = mysqli_fetch_array($sl2);
						$code = $sh2['code'];
						$level = $sh2['level'];
					}
					?>
					<h4>Students taking <?php echo $code ?></h4>
					<?php 
						$sl3 = mysqli_query($con,"SELECT * FROM course_registration where course_code = '$code' and session = '$return2' and semester = '$return1'");
					$num1 = mysqli_num_rows($sl3);
					?>
					<small>Total number of students:<?php echo $num1 ?></small>
				</div>
				<div class="panel-body">
					<div class="table-responsive table-box">
						<table class="table table-bordered">
							<tr>
								<th>Admission no</th>
								<th>Name</th>	
								<th>Scores</th>					
							</tr>
							<?php
							$record_date = date('d-m-Y');
							$run5 = mysqli_query($con,"SELECT * FROM result_record where code = '$is'  AND session = '$return2' and semester = '$return1' ");
							$return5 = mysqli_fetch_array($run5);
							$xcode = $return5['code'];
							$xsubject = $return5['course'];
							$xuniq = $return5['uniq'];
							$max_error = '';

							if(isset($_POST['upload'])){
								foreach ($_POST['s'] as $key => $val) {
									$score1 = $val;
									$student = $_POST['student'][$key];
									$aval = mysqli_query($con,"SELECT * from result where matric_no  = '$student' and session = '$return2' and semester = '$return1' and code = '$xcode' " );

									$num_record_check = mysqli_num_rows($aval);

									if($num_record_check >0)

									{

										echo "<p>Record already exist for $student</p>";
									}
									else{
										$msql = mysqli_query($con,"INSERT INTO  result (matric_no,code,session,semester,score,date_created,course,set_by,resultid) 

											VALUES('$student','$is','$return2','$return1','$score1','$record_date','$xsubject','$employee','$xuniq')");
										if(!$msql){
											die(mysqli_error($con));
										}

									}
								}
							}
							?>
							<form method="POST">
								<?php 
								$limit = 20;

									$pag1 = mysqli_query($con,"SELECT * FROM course_registration where course_code = '$code' and session = '$return2' and semester = '$return1'  ");

								
								$num_of_row = mysqli_num_rows($pag1);
								$no_of_pages = ceil($num_of_row/$limit);
								if(!isset($_GET['page'])){
									$page = 1;
								}
								else{
									$page = $_GET['page'];
								}
								$first_page = ($page-1)*$limit;
							
									$pag = mysqli_query($con,"SELECT * FROM course_registration where course_code = '$code' and session = '$return2' and semester = '$return1' limit ".$first_page.','. $limit. " ");

								while($sqlxx = mysqli_fetch_array($pag)){
									$studenty =  $sqlxx['matric_no'];
									// fetch students name from student table 
									$get_name = mysqli_query($con,"SELECT * FROM students where matric_no = '$studenty'");
									$show_name = mysqli_fetch_array($get_name);
									$name_get = $show_name['lname']." ".$show_name['fname'];
									// fetch score from result table

										$show_score = mysqli_query($con,"SELECT * FROM result where matric_no  = '$studenty' and session = '$return2' and semester = '$return1' and code = '$xcode'");
										$show_score2 = mysqli_fetch_array($show_score);
										$thescore = $show_score2['score'];

									?>
									<tr>
										<th><?php echo $studenty ?></th>
										<th><?php echo $name_get ?></th>
										<td>

											<input type="" name="s[]" class="form-control" value="<?php echo $thescore ?>"></td>
											<input type="hidden" name="student[]" value="<?php echo $studenty ?>">
										</tr>
										<?php
									}
									?>

								</table>
							</div>
							<p class="text-center"><button class="btn btn-success" name="upload">Upload</button></p>
						</form>
						<ul class="pagination">
							<?php
							for($page=1;$page<=$no_of_pages;$page++){
								?>
								<li><a href="uploadresult.php?is=<?php echo $is ?>&&page=<?php echo $page ?>&&type=<?php echo $type ?>"><?php echo $page ?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>