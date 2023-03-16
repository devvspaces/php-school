 <head>
   <link rel="stylesheet" href="../css/new-css.css">

 </head>
 <style>
   .img-admin {
     /* width:90px; */
     /* margin:2rem 2rem; */
     /* margin:1rem 0rem; */
     position: absolute;

     /* left:30px; */
     /* height:30px; */
     width: 50px;
   }

   .nav .yamm-fw a:active {
     color: #900c3f;
   }

   .nav .yamm-fw a {
     color: #8d0507;
   }

   .nav .yamm-fw a:visited {
     color: #8d0507;
     text-decoration: none;
   }

   .nav .yamm-fw a span {
     margin-right: 5px;
   }

   .nav .yamm-fw a:hover {
     color: #900c3f;
     text-decoration: none;
   }

   .nav .yamm-fw a:before {
     content: "";
     position: absolute;
     width: 100%;
     height: 4px;
     bottom: -2px;
     left: 0;
     color: #900c3f;
     background-color: #000;
     visibility: hidden;
     -webkit-transform: scaleX(0);
     transform: scaleX(0);
     -webkit-transition: all 0.3s ease-in-out 0s;
     transition: all 0.3s ease-in-out 0s;
   }

   .nav li.active a:before,
   .nav a:hover:before {
     visibility: visible;
     -webkit-transform: scaleX(1);
     transform: scaleX(1);
   }
 </style>
 </head>

 <body>
   <nav class="navbar nav-staff navbar-default">

     <!-- <div class=""> -->
     <div class="img-admin">
       <a class="navbar-brand" href="#">
         <img src="logo.jpg" width="100px" height="40px" alt="">
       </a>
     </div>

     <div class="navbar-collapse collapse navbar-right">
       <ul class="nav navbar-nav">
         <li class="dropdown yamm-fw"><a href="home.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-home"></span> Home</a>
         </li>
         <li class="dropdown yamm-fw"><a href="finance.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-usd"></span> Finance</a>
         </li>
         <li class="dropdown yamm-fw"><a href="subject.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-folder-open"></span> Courses</a>
         </li>
         <li class="dropdown yamm-fw"><a href="time_table.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-time"></span> Time Table</a>
         </li>
         <li class="dropdown yamm-fw"><a href="profile.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-user"></span> Profile</a>
         </li>
         <li class="dropdown yamm-fw"><a href="result.php" class="dropdown-toggle" data-hover="dropdown"><span class="glyphicon glyphicon-file"></span> Result</a>
         </li>
         <li class="dropdown yamm-fw" id="bell"><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"><span class="glyphicon glyphicon-bell"></span> Notification
             <?php
              $user = $_SESSION['users'];
              $sl18 = mysqli_query($con, "SELECT * FROM notification  where matric_no = '$user' and status = '0' ");
              $num1 = mysqli_num_rows($sl18);

              ?>
             <span class="badge"><?php echo $num1 ?></span></a>
           <ul class="dropdown-menu">
             <?php
              $user = $_SESSION['users'];
              $sl17 = mysqli_query($con, "SELECT * FROM notification  where matric_no = '$user' order by sn desc limit 4");
              while ($sh17 = mysqli_fetch_array($sl17)) {
                $snx = $sh17['sn'];
                $title = $sh17['title'];
                $body = $sh17['content'];
              ?>
               <li><a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm<?php echo $snx ?>"><?php echo $title ?></a></li>
             <?php
              }
              ?>
           </ul>
         </li>
         <li class="dropdown yamm-fw"><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"><span class="glyphicon glyphicon-cog"></span> Settings <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="cpassword.php"><span class="glyphicon glyphicon-wrench"></span> Change password</a></li>
             <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
           </ul>
         </li>
       </ul>
   </nav>
   <?php
    $user = $_SESSION['users'];
    $sl190 = mysqli_query($con, "SELECT * FROM notification  where matric_no = '$user' order by sn desc limit 4");
    while ($sh90 = mysqli_fetch_array($sl190)) {
      $snx = $sh90['sn'];
      $title = $sh90['title'];
      $body = $sh90['content'];
      $sender = $sh90['sender'];
      $date = $sh90['dates'];
    ?>
     <div class="modal fade bs-example-modal-sm<?php echo $snx ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
       <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content" style="padding: 10px;">
           <div class="modal-header">
             <?php echo $title ?>
           </div>
           <?php echo $body ?>
           <div class="modal-footer">
             <p>From:<?php echo $sender ?></p><small><i><?php echo $date ?></i></small>
           </div>
         </div>
       </div>
     </div>
   <?php
    }
    ?>
   <script type="text/javascript">
     $(document).ready(function() {
       $('#bell').click(function() {
         var bell = "bell";
         $.ajax({
           url: "upate.php",
           method: "POST",
           data: {
             bell: bell
           },
           success: function(data) {
             $(".badge").html(data)
           }
         })
       })
     })
   </script>