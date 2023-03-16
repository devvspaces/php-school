<?php
$title = "Manage Courses";
include("header.php");
?>

<div class="viewbox-content">
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
				<div class="panel">
					<div class="panel-heading panele" id="p_heading">
						<?php
						$users = $_SESSION['users'];
						$s1 = mysqli_query($con, "SELECT * FROM staff where username = '$users'");
						$sh1 = mysqli_fetch_array($s1);
						$name1 = $sh1['fname'] . " " . $sh1['lname'];
						$img = $sh1['picture'];
						$department = $sh1['department'];
						if ($img == "") {
							$img2 = "passport/default.png";
						} else {
							$img2 = $img;
						}
						?>
						<div class="ig-area">
							<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive dp" width="100px">
							<h4>
								<?php echo $name1 ?>
							</h4>
							<i><?php echo $department ?></i>
						</div>
					</div>
					<div class="rest">
						<div class="">
							<h4>View subject</h4>
						</div>
						<div class="">
							<div class="table-responsive table-box">
								<table id="subject_data" class="table table-bordered">
									<thead>
										<tr>
											<th>Title</th>
											<th>Code</th>
											<th>Students</th>
											<th>Result</th>
											<th>Uploaded result</th>
											<th>Print Report Sheet</th>
											<th>curriculum</th>
										</tr>
									</thead>
									<?php
									echo $user = $_SESSION['users2'];
									$s2 = mysqli_query($con, "SELECT * FROM course where teacher = '$user'");
									while ($sh2 = mysqli_fetch_array($s2)) {
										$sn1 = $sh2['sn'];
										$title = $sh2['title'];
										$code = $sh2['code'];
										?>
										<tr>
											<th><?php echo $title ?></th>
											<td>
												<?php echo $code ?>
											</td>
											<th><a href="viewstudents.php?is=<?php echo $code ?>" class="btn btn-pink">View
													students</a></th>
											<th><a href="passresult.php?is=<?php echo $code ?>" class=" btn btn-pink">Upload
													result</a></th>
											<th><a href="uploaded.php?is=<?php echo $code ?>" class=" btn btn-pink">
													Uploaded result</a></th>
											<th><a href="printdmx.php?is=<?php echo $code ?>"
													class=" btn btn-pink">Print</a></th>
											<th><a href="curriculum.php?is=<?php echo $code ?>"
													class="btn btn-pink">Curriculum</a></th>
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
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#subject_data').DataTable();
	});
</script>

<?php include("../extras/footer.php") ?>