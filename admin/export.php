<?php
include("../class.php");
session_start();
?>
<?php
if (!empty($_FILES["employee_file"]["name"])) {
     $output = '';
     $date = date('d-m-y');
     $allowed_ext = array("csv");
     $extension = "csv";
     $total_imported = 0;
     if (in_array($extension, $allowed_ext)) {
          $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');
          fgetcsv($file_data);
          while ($row = fgetcsv($file_data)) {
               $fname = mysqli_real_escape_string($con, $row[0]);
               $mname = mysqli_real_escape_string($con, $row[1]);
               $lname = mysqli_real_escape_string($con, $row[2]);
               $userid = $admission_no = mysqli_real_escape_string($con, $row[3]);
               $program = mysqli_real_escape_string($con, $row[4]);
               $email = mysqli_real_escape_string($con, $row[5]);
               $phone = mysqli_real_escape_string($con, $row[6]);
               $gender = mysqli_real_escape_string($con, $row[7]);
               $level = mysqli_real_escape_string($con, $row[8]);
               $faculty = mysqli_real_escape_string($con, $row[9]);
               $department = mysqli_real_escape_string($con, $row[10]);


               $faculty = strtoupper($faculty);
               $department = strtoupper($department);


               $address = mysqli_real_escape_string($con, $row[11]);
               $religion = mysqli_real_escape_string($con, $row[12]);
               $lga = mysqli_real_escape_string($con, $row[13]);
               $state = mysqli_real_escape_string($con, $row[14]);
               $country = mysqli_real_escape_string($con, $row[15]);
               $parent = mysqli_real_escape_string($con, $row[16]);
               $p_phone = mysqli_real_escape_string($con, $row[17]);
               $p_email = mysqli_real_escape_string($con, $row[18]);
               $dob = mysqli_real_escape_string($con, $row[19]);
               $admitted_date = mysqli_real_escape_string($con, $row[20]);
               $batch = mysqli_real_escape_string($con, $row[21]);

               if ($admission_no == "") {
                    $userid = $admission_no = strtoupper(uniqid()); //Generate random admission no
               }
               // $password = uniqid();
               $password = "password";
               $password2 = md5($password);
               $userid2 = md5($userid);
               if ($admission_no !== "") {
                    // $query3 = "SELECT * FROM users where userid = '$userid'";
                    // $retval = mysqli_query($con, $query3);
                    // $num  = mysqli_num_rows($retval);
                    // if ($num > 0) {
                    //      die("admission number already exist");
                    // }
               }

               // $faculty = $auth->select14('code', 'department', 'dept_code', $department);
               $type = "student";
               $date = date("d-m-y");
               $sql2 = mysqli_query($con, "INSERT INTO students(fname,mname,lname,admission_no,program,email,phone,gender,level,college,department,address,religion,lga,state,country,dates,parents,parents_phone1,p_email,dob,username,date_admitted,batch)
			VALUES('$fname','$mname','$lname','$admission_no','$program', '$email','$phone','$gender','$level','$faculty','$department','$address','$religion', '$lga','$state','$country','$date','$parent','$p_phone','$p_email','$dob','$userid2', '$admitted_date','$batch')");

               if (!$sql2) {
                    die(mysqli_error($con));
               } else {
                    $total_imported++;
                    $last_id = $con->insert_id;
                    $ID1 = str_pad($last_id, 4, "0", STR_PAD_LEFT);
                    $matric_no  = "mat" . $ID1;
                    $auth->update5('students', 'matric_no', $matric_no, 'sn', $last_id);


                    $sql = mysqli_query($con, "INSERT INTO users(userid,userid2,password2,type,dates)VALUES('$matric_no','$userid2','$password2','$type','$date')");
                    if (!$sql) {
                         die(mysqli_error($con));
                    }


                    // Send mail to the student
                    // $subject="";
                    // $body = "";
                    // $auth->SendMail($subject, $body, $email);
               }
          }
          $users = $_SESSION['users'];
          $details = "$users imported $total_imported students";
          $auth->Log($users, 'admin', 'create_fee', $details);
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