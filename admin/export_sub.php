<?php include("conn/conn.php"); ?>
 <?php   
 if(!empty($_FILES["employee_file"]["name"]))  
 {  
      $output = '';  
      $date = date('d-m-y');
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
                $title = mysqli_real_escape_string($con, $row[0]);  
                $code =  mysqli_real_escape_string($con, $row[1]);
                $class = mysqli_real_escape_string($con, $row[2]);                
                $type =  mysqli_real_escape_string($con, $row[3]);
                $teacher= mysqli_real_escape_string($con, $row[4]);
                $department= mysqli_real_escape_string($con, $row[5]);
                $date = date("d-m-Y");
                //$class = mysqli_real_escape_string($con, $row[4]);
                //$batch = mysqli_real_escape_string($con, $row[5]);
                //$arm = mysqli_real_escape_string($con,$row[6]);
                //$gender = ""; //mysqli_escape_string($con,$row[7]);  
                $query2 = "INSERT INTO subject(title,code,department,participant,teacher,type,dates)VALUES('$title','$code','$department','$class','$teacher','$type','$date')";
                mysqli_query($con,$query2);
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