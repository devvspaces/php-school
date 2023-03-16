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
					<h4>Create a new Class</h4>
					<a href="create_class.php" class="btn btn-primary">Create A new Class</a>
				</div>
				<div class="panel-body">
				<?php 
				if(isset($_POST['create'])){
				$class = mysqli_real_escape_string($con,$_POST['class']);
				$verify = mysqli_query($con,"SELECT * FROM class where class = '$class'");
				$num = mysqli_num_rows($verify);
					if($num > 0 ){
						die("class already exist");
					}
				$sql=mysqli_query($con,"INSERT INTO class(class)VALUES('$class')");
				if(!$sql){
					die(mysqli_error($con));
				}
			else{
				?>
					<div class="alert alert-success "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
        The class has been added successfully
        </div>
				<?php
		}
	}
				?>
				<form method="POST">
					<input type="" name="class" class="form-control" placeholder="Class" required><br>
					<p class="text-center"><button class="btn btn-primary" name="create">Create</button></p>
				</form>
				</div>
				</div>
			</div>
			</div>
		</div>
	<?php include("footer.php") ?>