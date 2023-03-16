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
					<?php
					$xml = $_SESSION['users2'];
					$is = $_GET['is'];
					$run1= mysqli_query($con,"SELECT * FROM course where code = '$is'");
					$return = mysqli_fetch_array($run1);
					$code = $return['code'];
					$course = $return['title'];
					echo "<h4 class='text-center'>Edit Result for $course</h4>";
					$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$return2 = $sh3['session'];
					$return1 = $sh3['current_semester'];	
					$sl2 = mysqli_query($con,"SELECT * FROM result_query where result = 'result'");
					$sh2=mysqli_fetch_array($sl2);
					$status = $sh2['status'];
					if($status == 0){
						?>
						<div class="alert alert-danger "> 
							<a href="#" class="close" data-dismiss="alert"> 
								&times; 
							</a> 
							Editing of this result is no longer possible 
						</div>

						<?php
					}
					else
					{
						?>
						<a href="editresult.php?code=<?php echo $code?>" class="btn">Edit this result</a>
					
						<?php
					}
					?>
					<div style="height: 10px;"></div>
					<table class="table table-bordered">
						<tr>
							<th>students</th>
							<th>scores</th>
						</tr>
							<?php
							$run = mysqli_query($con,"SELECT * FROM result where code = '$code' AND session = '$return2' and semester = '$return1'   order by matric_no asc ");
							while($result = mysqli_fetch_array($run)){
								$student = $result['matric_no'];
								$score = $result['score'];
								?>
								<tr>
									<td><?php echo $student ?> </td>
									<td><?php echo $score ?></td>
								</tr>
								<?php
							}
						
						?>
					</table>



				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
