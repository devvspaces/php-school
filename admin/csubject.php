<?php include("header.php") ?>
<div class="content">
	<div class="col-sm-10 mb-5">
		<div class="content">
			<div id="p_heading">
				<?php
				$users = $_SESSION['users'];
				$s1  = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
				$sh1 = mysqli_fetch_array($s1);
				$name1 = $sh1['fname'] . " " . $sh1['lname'];
				$img = $sh1['picture'];
				$position = $sh1['position'];
				if ($img == "") {
					$img2 = "passport/default.png";
				} else {
					$img2 = $img;
				}
				?>
				<?php include("nav.php") ?>
			</div>

			<div class="panel-body">
				<h4>Create new subject</h4>
				<a href="csubject.php" class="btn btn-pink">Create new Subject</a>
			</div>
			<div class="panel-body">
				<?php
				if (isset($_POST['create'])) {
					$title = mysqli_real_escape_string($con, $_POST['title']);
					$code = mysqli_real_escape_string($con, $_POST['code']);
					$department = mysqli_real_escape_string($con, $_POST['department']);
					$teacher = mysqli_real_escape_string($con, $_POST['teacher']);
					$participant = mysqli_real_escape_string($con, $_POST['participant']);
					$type = mysqli_real_escape_string($con, $_POST['type']);
					$date = date("d-m-y");
					$sql = mysqli_query($con, "INSERT INTO subject(title,code,department,teacher,dates,participant,type)VALUES('$title','$code','$department','$teacher','$date','$participant','$type')");
					if (!$sql) {
						die(mysqli_error($con));
					} else {
				?>
						<div class="alert alert-success ">
							<a href="#" class="close" data-dismiss="alert">
								&times;
							</a>
							subject has been added successfully
						</div>
				<?php
					}
				}
				?>
				<form method="POST">
					<input type="" name="title" class="form-control" placeholder="title" required><br>
					<input type="" name="code" class="form-control" placeholder="code" required><br>
					<select class="form-control" name="department" id="dept" required>
						<option value="">Department</option>
						<option value="Art">Art</option>
						<option value="Science">Science</option>
						<option value="Commercial">Commercial</option>
					</select><br>
					<select class="form-control" name="type" required>
						<option value="">Type</option>
						<option value="compulsory">compulsory</option>
						<option value="elective">elective</option>

					</select><br>
					<div id="opt"></div>

					<select name="participant" class="form-control" required>
						<option value="">participant</option>
						<?php
						$sl3 = mysqli_query($con, "SELECT * FROM class");
						while ($sh13 = mysqli_fetch_array($sl3)) {
							$class = $sh13['class'];
						?>
							<option value="<?php echo $class ?>"><?php echo $class ?></option>
						<?php
						}
						?>
					</select><br>
					<br>
					<button class="btn btn-primary" name="create">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#dept').change(function() {
			var dept = $(this).val();
			$.ajax({
				url: "department.php",
				method: "POST",
				data: {
					dept: dept
				},
				success: function(data) {
					$("#opt").html(data);
				}
			});
		});
	});
</script>