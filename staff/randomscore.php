<?php include("conn/conn.php") ?>
<?php 
$first_query = mysqli_query($con,"SELECT * from elective_subject where student_id = 'HC/ADM/22/SS/001'");
	while($ccc = mysqli_fetch_array($first_query)){
		$cls = $ccc['subject_id'];
$qx = mysqli_query($con,"SELECT * FROM calender ");
$sh3 = mysqli_fetch_array($qx);
$session = $sh3['session'];
$term = $sh3['current_term'];

$query4 = mysqli_query($con,"SELECT * FROM subject where sn = '$cls'");
$mimi = mysqli_fetch_array($query4);{
	$subjectid = $mimi['sn'];
	$subject = $mimi['title'];
	$xcode = $mimi['code'];
	$xtype =  "last";
	$name =  "$xcode $xtype  result for $term term of $session session";
}
$sqlmix = mysqli_query($con,"SELECT * FROM  result_record where code = '$xcode' AND type= '$xtype'");
if(mysqli_num_rows($sqlmix) > 0){
	die("The result of this form already exist");
}
else{
	$score1 =  rand(91,97);
	$sqlxx = mysqli_query($con,"INSERT INTO result_record (name,session,term,subject,code,type,subjectid)VALUES('$name','$session','$term','$subject','$xcode','last','$subjectid')");
	if(!$sqlxx){
		die(mysqli_error($con));
	}
		
			$student = "HC/ADM/22/SS/001";
			$run2 = mysqli_query($con,"INSERT into result(subject,code,student,resultid,session,term,exam_type,score)VALUES('$subject','$xcode','$student','$subjectid','$session','$term','last','$score1')");
		if(!$run2){
			die(mysqli_error($con));
		}
}
}

?>