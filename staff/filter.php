<?php include("conn/conn.php") ?>
<?php session_start() ?>
<?php
$val3 = $_POST['val3'];
$valx = $_POST['val'];
$val4 = $_POST['val4'];
$val2 = $_POST['val2'];
$qx = mysqli_query($con,"SELECT * FROM calender ");
					$sh3 = mysqli_fetch_array($qx);
					$session = $sh3['session'];
					$term = $sh3['current_term'];
?>
<div style="height: 5px;"></div>
 <?php 
            $sl2 = mysqli_query($con,"SELECT * FROM result_query where result = '$valx'  ");
            $sh2=mysqli_fetch_array($sl2);
            $status = $sh2['status'];
            if($status == 0){
              ?>
       <div class="alert alert-danger "> 
            <a href="#" class="close" data-dismiss="alert"> 
            &times; 
            </a> 
        Editing of this result is no longer possible 
        </div>

            <?php
            }
            else
            {
              ?>
<a href="editresult.php?type=<?php echo $valx ?>&&is=<?php echo $val3 ?> &&code=<?php echo $val2 ?>" class="btn btn-info">Edit this result</a>

<?php
}
?>
<div style="height: 10px;"></div>
<table class="table table-bordered">
<tr>
	<th>students</th>
	<th>scores</th>
</tr>

<?php if(isset($_POST['val'])){
$val2 = $_POST['val2'];
$val = $_POST['val'];
$val4 = $_POST['val4'];
$run = mysqli_query($con,"SELECT * FROM result where code = '$val2' AND session = '$session' and term = '$term' and exam_type = '$val'  order by student asc ");
while($result = mysqli_fetch_array($run)){
	$student = $result['student'];
	$score = $result['score'];
?>
<tr>
	<td><?php echo $student ?> </td>
	<td><?php echo $score ?></td>
</tr>
	<?php

}
}
?>
</table>
