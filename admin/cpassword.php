<?php
$title = "Change your password";
include("header.php");
?>

<div class="viewbox-content">
	<div class="content">
		<div class="col-sm-10 mb-5">
			<div class="content">
				<div class="panel-body">
					<?php
					if (isset($_POST['create'])) {
						$user = $_SESSION['users'];
						$old = mysqli_real_escape_string($con, $_POST['old']);
						$new1 = mysqli_real_escape_string($con, $_POST['new1']);
						$new2 = mysqli_real_escape_string($con, $_POST['new2']);
						$olda = md5($old);
						$new1a = md5($new1);
						$new2a = md5($new2);
						$query1 = mysqli_query($con, "SELECT * from users where userid2 = '$user' ");
						$sh1 = mysqli_fetch_array($query1);
						$oldpassword = $sh1['password2'];
						$error = array();
						if ($olda != $oldpassword) {
							$error['old'] = "<p class='alert alert-danger'>Your old password is not correct</p>";
						}
						if ($new2a != $new1a) {
							$error['new'] = "<p class='alert alert-danger'>your password does not match</p>";
						}
						if (count($error) == 0) {
							$sql = mysqli_query($con, "UPDATE users SET password2 = '$new2a' where userid2 = '$user'");
							if (!$sql) {
								die(mysqli_error($con));
							} else {
								echo "<p class='alert alert-success'>done</p>";
							}

						}
					}
					?>
					<form method="POST">
						<input type="password" name="old" class="form-control" placeholder="Enter your old password"
							required><br>
						<input type="password" name="new1" class="form-control" placeholder="enter the new password"
							required><br>
						<input type="password" name="new2" class="form-control" placeholder="enter the password again"
							required><br>
						<?php
						if (isset($error['old']))
							echo $error['old'] . "<br>";
						if (isset($error['new']))
							echo $error['new'] . "<br>";
						?>
						<p class="text-center"><button class="btn btn-pink"
								style="color:#fff; border-radius:10px;" name="create">Change</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("../extras/footer.php") ?>