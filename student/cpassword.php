	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
			<div class="panel">
				<div class="panel-heading panele" id="p_heading">
					<?php 
				$users = $_SESSION['users'];
				$s1  = mysqli_query($con,"SELECT * FROM students where username = '$users'");
				$sh1 = mysqli_fetch_array($s1);
				$name1 = $sh1['lname']." ".$sh1['fname']." ".$sh1['mname'];
				$img = $sh1['picture'];
				$class = $sh1['class'];
				if($img==""){
					$img2 = "passport/default.png";
				}
				else{
					$img2 = $img;
				}
				?>
					<div class="ig-area">	
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive dp" width="100px">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $class ?></i>
					</div>
				</div>
				<div class="rest">
				<div class="">
					<h4> change your password</h4>
				</div>
				<div class="panel-body">
				<?php 
				if(isset($_POST['create'])){
				$user = $_SESSION['users'];
				$old = mysqli_real_escape_string($con,$_POST['old']);
				$new1 = mysqli_real_escape_string($con,$_POST['new1']);
				$new2 = mysqli_real_escape_string($con,$_POST['new2']);
				$olda = md5($old);
				$new1a = md5($new1);
				$new2a = md5($new2);
				$query1 = mysqli_query($con,"SELECT * from users where userid2 = '$user' ");
				$sh1 = mysqli_fetch_array($query1);
				$oldpassword = $sh1['password2'];
				$error = array();
                if($olda!= $oldpassword){
                 $error['old'] = "Your old password is not correct";
                 }
                 if($new2a!= $new1a){
                 	$error['new'] = "your password does not match";
                 }
                 if(count($error)==0){
				$sql=mysqli_query($con,"UPDATE users SET password2 = '$new2a' where userid2 = '$user'");
				if(!$sql){
					die(mysqli_error($con));
				}
				else{
					?>
					<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
       you have successfully changed you password
        </div>
					<?php
				}
		
		}
	}
				?>
				<form method="POST">
					<input type="password" name="old" class="form-control" placeholder="Enter your old password" required><br>
					<input type="password" name="new1" class="form-control" placeholder="enter the new password" required><br>
					<input type="password" name="new2" class="form-control" placeholder="enter the password again" required><br>
					 <?php
if(isset($error['old'])) echo $error['old']."<br>"; 
if(isset($error['new'])) echo $error['new']."<br>";
?>
					<button class="btn btn-primary" name="create">change</button>
				</form>
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