 <?php include("conn/conn.php"); ?>
 <?php
     if (!empty($_FILES["employee_file"]["name"])) {
          $output = '';
          $date = date('d-m-y');
          $allowed_ext = array("csv");
          $extension = "csv"; //end(explode(".", $_FILES["employee_file"]["name"]));  
          if (in_array($extension, $allowed_ext)) {
               $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');
               fgetcsv($file_data);
               while ($row = fgetcsv($file_data)) {
                    $userid = mysqli_real_escape_string($con, $row[0]);
                    $password = mysqli_real_escape_string($con, $row[1]);
                    $password2 = md5($password);
                    $userid2 = md5($userid);
                    $fname = mysqli_real_escape_string($con, $row[2]);
                    $lname = mysqli_real_escape_string($con, $row[3]);
                    $job_description = mysqli_real_escape_string($con, $row[4]);
                    $department = mysqli_real_escape_string($con, $row[5]);
                    $query3 = "SELECT * FROM users where userid = '$userid'";
                    $retval = mysqli_query($con, $query3);
                    $num  = mysqli_num_rows($retval);
                    if ($num > 0) {
                         die("dubble entry of admission number");
                    }
                    $query2 = "INSERT INTO staff(fname,lname,employee,job_description,department,username)
                VALUES('$fname','$lname','$userid','$job_description','$department','$userid2')";
                    $st = mysqli_query($con, $query2);
                    if (!$st) {
                         die(mysqli_error($con));
                    } else {
                         $staff_id = $con->insert_id;

                         $query = "  
                INSERT INTO users  
                     (userid,password2,userid2,type,dates,staff_id)  
                     VALUES ('$userid','$password2', '$userid2','staff','$date','$staff_id')  
                ";
                         mysqli_query($con, $query);
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
          } else {
               echo 'Error1';
          }
     } else {
          echo "no file selected";
     }
     ?>