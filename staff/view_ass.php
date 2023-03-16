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
					<h4>Assignment</h4>
				</div>
				<div class="panel-body">
				<div class='table-responsive table-box'>
				<table class="table table-bordered table-striped" id="class_data">
				<thead>
					<tr>
						<th>Student</th>
						<th>Submitted file</th>
						<th>Date submitted</th>
						<th>Grade</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$ass_id = $_GET['ass_id'];
					if(isset($_POST['grade'])){
						$grd = mysqli_real_escape_string($con,$_POST['grade']);
						$std = $_POST['std'];
						$grd_en = mysqli_query($con,"UPDATE ass_sub set grade = '$grd' where student = '$std' and ass_id = '$ass_id'");
					}
					$sel_ass = mysqli_query($con,"SELECT * FROM ass_sub where ass_id = '$ass_id'");
					while($ass_show = mysqli_fetch_array($sel_ass)){
						$student = $ass_show['student'];
						$file = $ass_show['file'];
						$date = $ass_show['sub_date'];
						$grade = $ass_show['grade'];
						if($grade==''){
							$grade2 = "<form method='POST'><input type='' class='form-control' name='grade' placeholder='enter grade and press enter'><input type='hidden' name='std' value='$student' ></form>";
						}
						else{
							$grade2 = $grade;
						}
						echo"

					<tr>
						<td>$student</td>
						<td><a class='btn' href='../student/$file'>download</a></td>
						<td>$date</td>
						<td>$grade2</td>
					</tr>
						";
					}
					?>
					</tbody>
				</table>
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