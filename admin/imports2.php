<?php include("conn/conn.php") ?>
<?php session_start();
if (!isset($_SESSION['users'])) {
     header("location:..\index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../css.css">
     <meta name="viewport" content="width=device-width, initial- scale=1.0">
     <title>Admin portal</title>
</head>

<body>
     <?php include("header.php") ?>
     <div class="content">
          <div class="col-sm-10 mb-5">
               <div class="content">
                    <div id="p_heading">
                         <?php
                         $users = $_SESSION['users'];
                         $s1  = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
                         $sh1 = mysqli_fetch_array($s1);
                         $name1 = $sh1['fname'] . " " . $sh1['lname'];
                         $img = $sh1['picture'];
                         $position = $sh1['position'];
                         if ($img == "") {
                              $img2 = "passport/default.png";
                         } else {
                              $img2 = $img;
                         }
                         ?>
                         <?php include("nav.php") ?>
                    </div>

                    <div class="panel-body">
                         <h4><span class="glyphicon glyphicon-import"></span> Import students<small>* note the file must be in csv format</small></h4>
                    </div>
                    <div class="panel-body" style="background-color: #eee;">
                         <form id="upload_csv" method="post" enctype="multipart/form-data">
                              <input type="file" name="employee_file" style="margin-top:15px;" id="file" />
                              <button type="submit" name="upload" id="upload" style="margin-top:10px;" class="btn btn-info">Upload</button>
                              <progress id="prog" max="100" value="0" style="display:none;"></progress>
                              <div style="clear:both"></div>
                         </form>
                         <div id="loaded2"></div>
                    </div>

               </div>
          </div>
          <?php include("linkpanel.php") ?>
     </div>
     </div>
     <?php include("footer.php") ?>
     <script src='jquery.js'></script>
     <script src="bootstrap/js/bootstrap.js"></script>
     <script src="jquery.form.min.js"></script>
     <script>
          $(document).ready(function() {
               $('#upload_csv').on("submit", function(e) {
                    e.preventDefault(); //form will not submitted  
                    $(this).ajaxSubmit({
                         url: "export.php",
                         method: "POST",
                         data: new FormData(this),
                         contentType: false, // The content type used when sending data to the server.  
                         cache: false, // To unable request pages to be cached  
                         processData: false, // To send DOMDocument or non processed data file it is set to false  
                         beforeSend: function() {
                              $("#prog").show();
                              $("#prog").attr('value', '0');

                         },
                         uploadProgress: function(event, position, total, percentCompelete) {
                              $("#prog").attr('value', percentCompelete);
                              $("#percent").html(percentCompelete + '%');
                         },
                         success: function(data) {
                              if (data == 'Error1') {
                                   alert("Invalid File");
                              } else if (data == "Error2") {
                                   alert("Please Select File");
                              } else {
                                   $('#upload').html("Upload")
                                   $('#loaded2').html(data);
                                   $('#loaded').val("");
                              }
                         }
                    })
               });
          });
     </script>
</body>

</html>