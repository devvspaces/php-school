<?php include("../class.php") ?>
<?php
$number = array();
if (isset($_POST['send'])) {
	$receipient = "";
	$phone = "";
	$parents = $_POST['parents'];
	$staff = $_POST['staff'];
	$manual = $_POST['manual_input'];
	$receiver = $_POST['receiver'];

	$student_category = $_POST['student_category'];
	$faculty = $_POST['faculty'];
	$department = $_POST['department'];
	$level = $_POST['level'];

	$title = strip_tags($_POST['title']);
	$body = strip_tags($_POST['body']);
	if ($receiver == "parents" && $parents != "") {
		$receipient = $parents;
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from students ");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['parents_phone1'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		} else {
			$level_name = $auth->select14('level', 'level', 'sn', $receipient);
			$sql = mysqli_query($con, "SELECT * From students where level = '$level_name'");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['parents_phone1'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		}
	} elseif ($receiver == "staff" && $staff != "") {
		$receipient = $staff;
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from staff ");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['phone'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		} else {
			$dept_name = $auth->select14('department', 'department', 'dept_code', $receipient);
			$sql = mysqli_query($con, "SELECT * From staff where department = '$receipient' OR department = '$dept_name'");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['phone'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		}
	} elseif ($receiver == "students" && $student_category != "") {
		if ($student_category == "ALL") {
			$receipient = $student_category;
		} elseif ($student_category == "faculty") {
			$receipient = $faculty;
			$col = 'college';
			$val = $auth->select14('college_code', 'college', 'sn', $faculty);
		} elseif ($student_category == "department") {
			$receipient = $department;
			$col = 'department';
			$val = $auth->select14('dept_code', 'department', 'sn', $department);
		} elseif ($student_category == "level") {
			$receipient = $level;
			$col = 'level';
			$val = $auth->select14('level', 'level', 'sn', $level);
		}
		if ($receipient == "ALL") {
			$sql = mysqli_query($con, "SELECT * from students ");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['phone'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		} else {
			$sql = mysqli_query($con, "SELECT * From students where $col = '$val'");
			while ($res = mysqli_fetch_array($sql)) {
				//$phone = $res['parents_phone1'].",";
				//echo $phone;
				$number[] = $res['phone'];
			}
			//print_r($number);
			$opc = implode(",", $number);
		}
	} else {
		$receipient = $manual;
		$opc = $receipient;
	}
	//echo $opc;

	if ($opc == '') {
		echo "No number found under the selected category";
	} else {

		$message = $title . " " . $body . " from Hapa College";
		// $res = array("message" => $message, "receiver" => $opc);
		// $res = json_encode($res);
		// print_r($res);
		$res = $auth->sms($opc, $message);
		$res = json_encode($res);
		print_r($res);
		// $his = header("location:https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=fKOBgeDLXpFLKHTC4rq0fL7jGTkeVpqXTKdWKpec3UuD3CpPBlPltE5yPsYC&from=Hapa College&to=$opc&body=$message&dnd=1");

		//header("location:bulk_message.php?msg=sus");


	}
} else {
	die("<p style='color:f00;'>restricted access</p>");
}

?>