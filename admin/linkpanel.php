<?php 
$users = $_SESSION['users'];
$s1  = mysqli_query($con,"SELECT * FROM admin where username = '$users'");
$s2 = mysqli_fetch_array($s1);
$position = $s2['position'];
$description = $s2['job_description'];
?>

<div class="">
	
	<ul> 
		
		<?php
		if($position == 'admin'){
			$get_function = mysqli_query($con,"SELECT * FROM admin_function ");
			while($show_function = mysqli_fetch_array($get_function)){
				$function = $show_function['link'];
				echo $function;
			} 
			$sql1 = mysqli_query($con,"SELECT * FROM result_access");
			$sql2 = mysqli_fetch_array($sql1);
			$status = $sql2['status'];
			if($status==1){

				echo "<a class='' href='resaccess.php'><span class='glyphicon glyphicon-remove'></span> <span>deny result access</span></a>";
			}
			else{

				echo "<a class=''  href='resaccess.php'><span class='glyphicon glyphicon-ok'></span> <span>Allow result access</span></a>";
			}
		}
		else{


			$work = explode(',', $description);
			foreach($work as $key=>$value) {
			$get_fun = mysqli_query($con,"SELECT * FROM admin_function where function = '$value' ");
			$show_fun = mysqli_fetch_array($get_fun);
			$fun = $show_fun['link'];
				echo $fun;
			}


		
		}
		?>
		</ul>
	</div>