<?php include("conn/conn.php") ?>
<?php session_start();
if(!isset($_SESSION['users'])){
  header("location:..\index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css.css">
<meta name="viewport" content="width=device-width, initial- scale=1.0">
<title>staff portal</title>
<script type="text/javascript" src='jquery.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="jquery.tabledit.min.js" ></script>
</head>
<body>
	<?php include("header.php") ?>
	<div class="container-fluid main-container">
		<div class="row main">
			<div class="col-lg-12 panel-container">
			<div class="panel panel-default">
				<div class="panel-heading" id="p_heading">
					<?php 
				$users = $_SESSION['users'];
				$s1  = mysql_query("SELECT * FROM staff where username = '$users'");
				$sh1 = mysql_fetch_array($s1);
				$name1 = $sh1['fname']." ".$sh1['lname'];
				$img = $sh1['picture'];
				$department= $sh1['department'];
				if($img==""){
					$img2 = "passport/default.png";
				}
				else{
					$img2 = $img;
				}
				?>
					<img src="<?php echo $img2 ?>" id="imgs" class="img-responsive">
					<h4><?php echo $name1 ?></h4>
					<i><?php echo $department ?></i>
				</div>
				<div class="panel-body">
						</div>
				<div class="panel-body">
						<?php
						$xml = $_SESSION['users2'];
						$is = $_GET['is'];
						$run1= mysql_query("SELECT * FROM subject where sn = '$is'");
						$return = mysql_fetch_array($run1);
							$code = $return['code'];
							$subject = $return['title'];
							echo $subject."<br>";
							?>
							<br>
							<select class="form-control" name="val" id="sel">
							<?php
						$run = mysql_query("SELECT *  FROM  result_record where code = '$code'  ");
						while ($return2 = mysql_fetch_array($run)){
							$title = $return2['name'];
							$sn = $return2['sn'];
							$uniq = $return2['uniq'];
							$type = $return2['type'];
						?>
						<option value="<?php echo $type ?>" id="<?php echo $sn ?>"><?php echo $type ?></option>
						<?php
					}

				
				?>
					</select>
					<input type="hidden" name="val2" value="<?php echo $code ?>" id="hid">
<div style="margin-left:50%; display: none;" id="loader"><img src="img/ajax-loader.gif"></div>
 
	<table class="table table-bordered" id="editable_table">
		<tr>
			<th>name</th>
			<th>class</th>
		</tr>
		<tr>
			<th>goak</th>
			<th>good</th>
		</tr>
	</table>
					<div id="record"></div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#sel").change(function(){
			var val = $('#sel').val();
			var val2 = $('#hid').val();
			$('#loader').show();
			$.ajax({
				method: "POST",
				url: "filter2.php",
				data:{val:val,val2:val2},
				success: function(data){
					$('#record').html(data);
					$('#loader').hide();
				}
			})
		})
	})
</script>
<script type="text/javascript">
	 $(document).ready(function(){
	 	$('#editable_table').Tabledit({
	 		url: "filter.php",
	 		columns:{
	 			identifier:[0, "student"]
	 			editable:[[1, 'score'],]
	 		},
	 		restoreButton:false,
	 		onSuccess:function(data, textStatus, jqXHR){
	 			if(data.action == 'delete')
	 			{
	 				$('#'+data.id).remove();
	 			}
	 		}
	 	});
	 });
</script>
</body>
</html>