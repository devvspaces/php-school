<?php
$title = "Add an Announcement";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body report">
					<div class="panel-body">
						<?php
						if (isset($_POST['create'])) {
							$title = mysqli_real_escape_string($con, $_POST['title']);
							$content = mysqli_real_escape_string($con, $_POST['content']);
							$viewers = mysqli_real_escape_string($con, $_POST['viewers']);
							$date = date("d-m-y");
							$sql = mysqli_query($con, "INSERT INTO anoucement(title,content,viewers,dates)VALUES('$title','$content','$viewers','$date')");
							if (!$sql) {
								die(mysqli_error($con));
							} else {
								?>
								<div class="alert alert-success ">
									<a href="#" class="close" data-dismiss="alert">
										&times;
									</a>
									Announcement has been added successfully
								</div>
							<?php
							}
						}
						?>
						<form method="POST">
							<input type="" name="title" class="form-control" placeholder="title" required><br>
							<select name="viewers" class="form-control" required>
								<option value="">Viewers</option>
								<option value="all">All</option>
								<option value="staff">staff</option>
								<option value="student">student</option>
							</select><br>
							<textarea name="content" class="form-control" placeholder="content"></textarea><br>
							<p class="text-center"><button class="btn btn-pink" style="color:#fff;"
									name="create">Create</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../extras/footer.php") ?>