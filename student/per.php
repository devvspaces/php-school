<?php
include("conn/conn.php");
error_reporting(0);
$class = mysqli_query($con,"SELECT * FROM students where class = 'SSS 2'");
while($new_class = mysqli_fetch_array($class)){
	$admission = $new_class['admission_no'];
	$class1 = $new_class['class'];
	$run2 = mysqli_query($con,"SELECT * FROM result where student = '$admission' and session = '2020/2021' and term = '2' ");
		$total_mark_score = 0;
		while($result2 = mysqli_fetch_array($run2)){
			$subject = $result2['subject'];
			$score = $result2['score'];
			$score2 = $result2['score2'];
			$score3 = $result2['score3'];
			$total1 = $score+$score2;
			$score4 = $result2['score4'];
			$last = $result2['last'];
			$total3 = $total1+$score4;
			if($last == ""){
				$total2 = $total3 ;
			}
			else{
			$total2 = ceil(($total3+$last)/2);
			}
			$total_mark_score +=$total3;
		}
$sub = mysqli_query($con, "SELECT * from subject where participant = '$class1' and type = 'compulsory'");
$number_of_c_subjects = mysqli_num_rows($sub);
//echo $number_of_c_subjects ;
$el_show = mysqli_query($con,"SELECT * FROM elective_subject where student_id = '$admission'");
$number_of_e_subjects = mysqli_num_rows($el_show);
//echo $number_of_e_subjects ;
$total_subjects = $number_of_e_subjects + $number_of_c_subjects;
$total_mark = $total_subjects*100;
//echo $total_mark;

$percentage = ($total_mark_score/$total_mark)*100;
echo $total_mark_score." - ".$admission." - ".$percentage."%"."<br>";
$cls = mysqli_query($con,"INSERT into per (per,admission_no,session,term) VALUES ('$percentage','$admission','2020/2021','2') ");
}
?>