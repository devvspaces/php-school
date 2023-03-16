<?php include ("conn/conn.php"); ?>
<?php 
if(isset($_POST['student'])){
	$status = $_POST['stats'];
	$student = $_POST['student'];
	$clas = $_POST['clas'];
		$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$term_begins = $sh2['t_start'];
					$term_ends = $sh2['t_stop'];
					$return1= $sh2['current_term'];
	$query0 = mysqli_query($con,"SELECT * FROM status WHERE student = '$student' and term = '$return2' and term = '$return1'");
	if(mysqli_num_rows($query0) >0){
		echo "This students fate has already been determined";
	}
	else{
	$query = mysqli_query($con,"INSERT INTO status (student,status,class,session,term)VALUES('$student','$status','$clas','$return2','$return1')");
	if(!$query){
		die(mysqli_error($con));
	}
	else{
		if($status=="promoted"){
			echo "promoted";
		}
		else{
			echo "to repeat";
			}
		}
	}
}
?>