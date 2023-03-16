<nav style='border: none !important; outline: none !important;' class='navbar navbar-default'>
  <div class="container nav">
    <!-- Mobile hambuger -->
    <div class="settings">
      <ul>
        <li class="dropdown"><a href="" style='border: none !important; outline: none !important;' class="navbar-toggle collapsed dropdown-toggle list-right" data-bs-toggle="dropdown" data-hover="dropdown">
            <span class='sr-only'>
            </span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <i class="fa fa-dashboard"></i><a href="./home.php">Dashboard</a>
            </li>
            <li><i class="fa fa-user"></i> <a href="./madmin.php">Manage Admin</a></li>
            <li><i class="fa fa-user"></i> <a href="./mstaff.php">Manage Staff</a></li>
            <li><i class="fa fa-graduation-cap"></i> <a href="./mcollege.php">Manage Faculty</a></li>
            <li><i class="fa fa-graduation-cap"></i> <a href="./mcollege.php">Manage Departments</a></li>
            <li><i class="fa fa-users"></i> <a href="./m_stu_cat.php">Manage Students</a></li>
            <li><i class="fa fa-dollar"></i> <a href="./mfees.php">Manage Fees</a></li>
            <li><i class="fa fa-bullhorn"></i> <a href="./canoucement.php">Anouncement</a></li>
            <li><i class="fa fa-calendar" aria-hidden="true"></i> <a href="./calendar.php">Calender</a></li>
            <li><i class="fa fa-envelope"></i> <a href="./bulk_message.php">Bulk Message</a></li>
            <!-- <li><i class="fa fa-times"></i> <a href="#">Deny Access</a></li> -->
          </ul>
    </div>

    <p></p>
    <p></p>
    <h3>Welcome <?php echo $name1 ?></h3>
    <p></p>
    <p></p>

    <div class="settings">
      <ul>
        <li class="dropdown"><a href="" class="dropdown-toggle list-right" data-bs-toggle="dropdown" data-hover="dropdown"><img src="<?php echo $img2 ?>" width="50px" id="imgs"></a>
          <ul class="dropdown-menu">
            <li><a href="cpassword.php"><span class="glyphicon glyphicon-wrench "></span> Change password</a></li>
            <li><a href="profile.php"><span class="glyphicon glyphicon-user list-right"></span> Admin Profile</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out list-right"></span> Logout</a></li>
          </ul>
    </div>

  </div>
</nav>