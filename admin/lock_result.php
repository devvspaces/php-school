<?php include("header.php") ?>
	<div class="content">
			<div class="col-sm-10 mb-5">
				<div class="content">
					<div id="p_heading">
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
					 	<?php include("nav.php") ?>
					</div>

				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>Result</th><th>Action</th>
						</tr>
						<tr>
							<td>CA1</td>
							<td><?php $sql = mysqli_query($con,"SELECT * FROM result_query where result = 'CA1' and status = '0' ");
								if(mysqli_num_rows($sql) == 0){
									echo"
								<a href='lock_result2.php?is=CA1&&it=lock' class='btn'><span class='glyphicon glyphicon-lock'></span> LOCK</a>"; }
								else
								{
										echo"
								<a href='lock_result2.php?is=CA1&&it=unlock' class='btn'><span class='glyphicon glyphicon-open-lock'></span> UNLOCK</a>"; 
								}
								?>

								</td>
						</tr>
						<tr>
							<td>CA2</td>
							<td><?php $sql = mysqli_query($con,"SELECT * FROM result_query where result = 'CA2' and status = '0' ");
								if(mysqli_num_rows($sql) == 0){
									echo"
								<a href='lock_result2.php?is=CA2&&it=lock' class='btn'><span class='glyphicon glyphicon-lock'></span> LOCK</a>"; }
								else
								{
										echo"
								<a href='lock_result2.php?is=CA2&&it=unlock' class='btn'><span class='glyphicon glyphicon-open-lock'></span> UNLOCK</a>"; 
								}
								?>

								</td>
						</tr>
						<tr>
							<td>Last</td>
							<td><?php $sql = mysqli_query($con,"SELECT * FROM result_query where result = 'last' and status = '0' ");
								if(mysqli_num_rows($sql) == 0){
									echo"
								<a href='lock_result2.php?is=last&&it=lock' class='btn'><span class='glyphicon glyphicon-lock'></span> LOCK</a>"; }
								else
								{
										echo"
								<a href='lock_result2.php?is=last&&it=unlock' class='btn'><span class='glyphicon glyphicon-open-lock'></span> UNLOCK</a>"; 
								}
								?>

								</td>
						</tr>
						<tr>
							<td>Examination</td>
							<td><?php $sql = mysqli_query($con,"SELECT * FROM result_query where result = 'ett' and status = '0' ");
								if(mysqli_num_rows($sql) == 0){
									echo"
								<a href='lock_result2.php?is=ett&&it=lock' class='btn'><span class='glyphicon glyphicon-lock'></span> LOCK</a>"; }
								else
								{
										echo"
								<a href='lock_result2.php?is=ett&&it=unlock' class='btn'><span class='glyphicon glyphicon-open-lock'></span> UNLOCK</a>"; 
								}
								?>

								</td>
						</tr>
					</table>
				</div>

			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>