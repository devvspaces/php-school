<?php include("conn/conn.php") ?>
<?php
$state = array(
"Abia" ,
"Adamawa" ,
"Anambra" ,
"Akwa Ibom" ,
"Bauchi" ,
"Bayelsa" ,
"Benue" ,
"Borno" ,
"Cross River" ,
"Delta" ,
"Ebonyi" ,
"Enugu" ,
"Edo" ,
"Ekiti" ,
"FCT - Abuja" ,
"Gombe" ,
"Imo" ,
"Jigawa" ,
"Kaduna" ,
"Kano" ,
"Katsina" ,
"Kebbi" ,
"Kogi" ,
"Kwara" ,
"Lagos" ,
"Nasarawa" ,
"Niger" ,
"Ogun" ,
"Ondo" ,
"Osun" ,
"Oyo" ,
"Plateau" ,
"Rivers" ,
"Sokoto" ,
"Taraba" ,
"Yobe" ,
"Zamfara"
);
$sql  = mysql_query("SELECT * FROM students where class ='JSS1'");
$emaildomain = array("gmail","yahoo","co.uk","hotmail","ymail","outlook");
$gender= array("male","female");
$religion= array("christainity","islam");

while($fetch = mysql_fetch_array($sql)){
	$admin = $fetch['admission_no'];
	$lname = $fetch['lname'];
	$fname = $fetch['fname'];
	$parent = "Mr and Mrs ".$lname;
	//date of birth
	$day = rand(10,27);
	$month = rand(1,9);
	$year = rand(2002,2005);
	$dob = $day."-0".$month."-".$year;
	$country = "nigeria";
	$state2 =  $state[array_rand($state)];
	$gender2 =  $gender[array_rand($gender)];
	$religion2=  $religion[array_rand($religion)];
	$goal =  $emaildomain[array_rand($emaildomain)];
	$random_email = $fname.$lname.'@'.$goal."com";
	$random_email2 = $lname.'@'.$goal."com";
	$phone = rand(10000000000,30000000000);
	$phone2 = rand(10000000000,30000000000);
	$phone3 = rand(10000000000,30000000000);

	$tts = mysql_query("UPDATE students set dob ='$dob', email = '$random_email',phone = '$phone',parents= '$parent',parents_phone1 = '$phone3', parents_phone2 = '$phone2',p_email='$random_email2', state ='$state2',country = '$country', gender = '$gender2', religion = '$religion2' where admission_no = '$admin' ");
}
if(!$tts){
	die(mysql_error());
}
else{echo "done"; }
?>
