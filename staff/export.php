<?php include('conn/conn.php') ?>
<?php  
$qx = mysqli_query($con,"SELECT * FROM calender ");
          $sh3 = mysqli_fetch_array($qx);
          $session = $sh3['session'];
          $term = $sh3['current_term'];
if(!empty($_FILES["file_result"]["name"]))  
{  
  $output = ''; 
  $max_error = ''; 
  $allowed_ext = array("csv");  
  $extension = end(explode(".", $_FILES["file_result"]["name"]));  
  if(in_array($extension, $allowed_ext))  
  {  
   $file_data = fopen($_FILES["file_result"]["tmp_name"], 'r');  
   fgetcsv($file_data);  
   while($row = fgetcsv($file_data))  
   {  
    $student = mysqli_real_escape_string($con, $row[0]);
    $score1 = mysqli_real_escape_string($con,$row[1]);
    $type = $_POST["type"];
    $code = $_POST['code'];
    if($type=="CA1"){
      $max = file("../score.txt")[0];
      if($score1> $max){
         $max_error = 1;
       }
       else{
      $msql = mysqli_query($con,"UPDATE result set score = '$score1' where student = '$student' AND code = '$code'AND session = '$session' and term = '$term' ");
      }

    }
    elseif ($type == 'CA2'){
      $max = file("../score.txt")[1];
      if($score1 > $max){
        $max_error = 1;
      }
      else{

        $msql = mysqli_query($con,"UPDATE result set score2 = '$score1' where student = '$student' AND code = '$code'AND session = '$session' and term = '$term' ");
      }
    }
    elseif ($type == 'CA3'){
      $max = file("../score.txt")[3];
      if($score1 > $max){
        $max_error = 1;
      }
      else{
        $msql = mysqli_query($con,"UPDATE result set score3 = '$score1' where student = '$student' and code = '$code' AND session = '$session' and term = '$term' ");
      }
    }
    elseif ($type == 'ett'){
      $max = file("../score.txt")[3];
      if($score1 > $max){
        $max_error = 1;
      }
      else{
        $msql = mysqli_query($con,"UPDATE result set score4 = '$score1' where student = '$student' and code = '$code' AND session = '$session' and term = '$term' ");
      }
    }
    elseif ($type == 'last'){
      $msql = mysqli_query($con,"UPDATE result set last = '$score1' where student = '$student' and code = '$code' AND session = '$session' and term = '$term'");
    }

  }   
  ?>
  <div class="alert alert-success "> 
    <a href="#" class="close" data-dismiss="alert"> 
      &times; 
    </a> 
    <span class="glyphicon glyphicon-ok"></span> completed
  </div>
  <?php
}  
else  
{  
 echo 'Error1';  
}  
}  
else  
{  
  echo "no file selected";  
}  
?>  