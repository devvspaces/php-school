<?php
if(isset($_POST['send'])){
	$title = $_POST['title'];
	$body = $_POST['body'];
	$message = $title." ".$body;
	$whatsapp = "08148677134,";

	header("location:https://api.whatsapp.com/send?phone=$whatsapp&text=$title%20%0$body");
}

?>