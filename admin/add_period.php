<?php
include("conn/conn.php");
$day = $_POST['day'];
$period = mysqli_real_escape_string($con,$_POST['period']);
$duration = mysqli_real_escape_string($con,$_POST['duration']);
$start_time = mysqli_real_escape_string($con,$_POST['start_time']);
$xtime = date("H:i", strtotime($start_time));
$c_time = strtotime($start_time);
$end_time = date("H:i",strtotime("+$duration minutes",$c_time));
$period_check = mysqli_query($con,"SELECT * FROM period_format where day = '$day' and period = '$period'");
$time_check = mysqli_query($con,"SELECT * FROM period_format where day = '$day' and start_time = '$start_time'");
if(mysqli_num_rows($period_check) != 0){
	echo "period $period already exist for this day";
}
elseif (mysqli_num_rows($time_check) != 0) {
		echo " a period is already starting at this time";
}
elseif ($duration< 5){
			echo "duration cannot be less than 30 mins";

}
elseif ($duration >60){
			echo "duration cannot be more than 60 mins";
}
else{
	$insert =  mysqli_query($con,"INSERT INTO period_format(period, day, start_time, end_time,duration)VALUES('$period','$day','$xtime','$end_time','$duration')");
	if(!$insert){
		die(mysqli_error($con));
	}
	else{
		echo "success";
	}

}



?>
