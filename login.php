            <?php
            session_start();
            $host = "localhost";  
            $username = "root";  
            $password = "";  
            $database = "portal";  
            try{
              $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
              $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
              if(isset($_POST["login"])) 
                 
              {  
                $userid = $_POST['userid'];
                if(empty($_POST["userid"]) || empty($_POST["password"]))  
                {  
                  echo "<p class='alert alert-danger'>All fields are required";  
                }  
                else  
                {  
                  $query = "SELECT * FROM users WHERE userid = :userid AND password = :password";  
                  $statement = $connect->prepare($query);  
                  $statement->execute(  
                    array(  
                      'userid'     =>     $_POST["userid"],  
                      'password'     =>     $_POST["password"]  
                    )  
                  );  
                  $result = $statement->fetchAll();
                  $count = $statement->rowCount();  
                  if($count > 0)  
                  {  
                    foreach ($result as $row ) {
# code...

                      setcookie('userid',$userid, time()+60+60+7);
                      $_SESSION["userid"] = $row["userid"];
                      $_SESSION["users"] = $row["userid2"]; 
                      $_SESSION['type'] = $row['type'];
                      $type = $row['type'];
                      $active = $row['active'];
                      $presence = $row['presence'];
                      if ($type == "admin"){
                  header("location:admin/home.php");
                } 
                elseif ($type == "staff"){
                  header("location:staff/home.php");
                elseif ($type == "student"){
                  if($active == '0' AND $presence == '1'){
                    session_destroy();
                    echo"
                    <div class='alert alert-danger '> 
                    <a href='#'' class='close' data-dismiss='alert'> 
                    &times; 
                    </a> 
                    you are not an active student hence you can no longer access this portal
                    </div>";
                  }
                  elseif($presence == '0'){
                    session_destroy();
                    echo "<div class='alert alert-danger'> 
                    <a href='#' class='close' data-dismiss='alert'> 
                    &times; 
                    </a> 
                    you are no longer a student of this School hence you cannot access this portal
                    again 
                    </div>";
                  }
                  else{
                    header("location:student/home.php");
                  }

                } 
                    }
                  }  
                  else  
                  {  
                    echo "<p class='alert alert-danger'>Wrong username or password inputed</label>";  
                  }  
                }  
              } 
              }
              catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
            ?>  
           