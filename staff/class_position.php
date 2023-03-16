<?php
include("conn/conn.php");
error_reporting(0);
ob_start();
if(isset($_GET['class'])){
$class2 = $_GET['class'];
$arm = $_GET['arm'];
$s2  = mysqli_query($con,"SELECT * FROM  calender ");
					$sh2 = mysqli_fetch_array($s2);
					$sn = $sh2['sn'] ;
					$return2= $sh2['session'];
					$return1= $sh2['current_term'];

$class = mysqli_query($con,"SELECT * FROM students where class = '$class2'");
while($new_class = mysqli_fetch_array($class)){
	$admission = $new_class['admission_no'];
	$class1 = $new_class['class'];
	$total_mark_score = 0;
	$run2 = mysqli_query($con,"SELECT SUM(score) AS ca1total FROM result where student = '$admission' and session = '$return2' and term = '$return1' and exam_type = 'CA1' ");
		$result2 = mysqli_fetch_array($run2);
			$ca1t1 = $result2['ca1total'];

		$run3 = mysqli_query($con,"SELECT SUM(score) AS ca2total FROM result where student = '$admission' and session = '$return2' and term = '$return1' and exam_type = 'CA2' ");
		$result3 = mysqli_fetch_array($run3);
			$ca2t2 = $result3['ca2total'];
			
			//echo $ca2t2."<br>";

			$run4 = mysqli_query($con,"SELECT SUM(score) AS etttotal FROM result where student = '$admission' and session = '$return2' and term = '$return1' and exam_type = 'ett' ");
		$result4 = mysqli_fetch_array($run4);
			$ett = $result4['etttotal'];
			
			//echo $admission."-".$ett."<br>";

			$run5 = mysqli_query($con,"SELECT SUM(score) AS lasttotal FROM result where student = '$admission' and session = '$return2' and term = '$return1' and exam_type = 'last' ");
		$result5 = mysqli_fetch_array($run5);
			$last = $result5['lasttotal'];
			
			//echo $admission."-".$ett."-".$last."<br>";
			$net_total = $last+$ett+$ca2t2+$ca1t1;
			if($last== 0){
				$final_total = $net_total;
			}
			else{
				$final_total = $net_total/2;
			}

			//echo $admission."-".$final_total."<br>";
			
			$total_mark_score = $final_total;
$sub = mysqli_query($con, "SELECT * from subject where participant = '$class1' and type = 'compulsory'");
$number_of_c_subjects = mysqli_num_rows($sub);
//echo $number_of_c_subjects ;
$el_show = mysqli_query($con,"SELECT * FROM elective_subject where student_id = '$admission' and session = '$result2' and term = '$return1'");
$number_of_e_subjects = mysqli_num_rows($el_show);
//echo $number_of_e_subjects ;
$total_subjects = $number_of_e_subjects + $number_of_c_subjects;
$total_mark = $total_subjects*100;
//echo $total_mark."<br>";
$percentage = ($total_mark_score/$total_mark)*100;
//echo $total_mark_score." - ".$admission." - ".$percentage."%"."<br>";
$pos_check = mysqli_query($con,"SELECT * FROM per where admission_no = '$admission' and session = '$return2' and term = '$return1' and class = '$class1'");
if(!$pos_check){
	die(mysqli_error($con));
}
if(mysqli_num_rows($pos_check)>0){
	//echo "record already exist";
	$update_query = mysqli_query($con,"UPDATE per set per = '$percentage' where admission_no = '$admission' and session = '$return2' and term = '$return1' ");
}
else{
	$cls = mysqli_query($con,"INSERT into per (per,admission_no,session,term,class) VALUES ('$percentage','$admission','$return2','$return1','$class1' ) ");
}

}
 function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
 $rank  =  mysqli_query($con," SELECT admission_no,per, FIND_IN_SET( per, (SELECT GROUP_CONCAT( per  ORDER BY per DESC ) FROM per   where class = '$class2' and session = '$return2' and term = '$return1'  ) ) AS position FROM per where class = '$class2' and session = '$return2' and term = '$return1'");
				               	if(!$rank){
				                 		die(mysqli_error($con));
				                 	}
				               		while ($rank2 = mysqli_fetch_array($rank))
				               		{
				               		$rank3 = $rank2['position'];
				               		$ml_score = $rank2['per'];
				               		$sd = $rank2['admission_no'];
				               		$or = ordinal($rank3);
				               		echo$ml_score."-".$rank3."-".$or."<br>";
				               	$add = mysqli_query($con,"UPDATE per set position = '$or'  where admission_no = '$sd' and class = '$class2' and session = '$return2' and term = '$return1'");
				               	if(!$add){
				               		die(mysqli_error($con));
				               	}
				               	ob_end_clean();
				               	header('location:'.$_SERVER["HTTP_REFERER"]);
				               	}

}
?>