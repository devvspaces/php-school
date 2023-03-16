<?php

error_reporting(0);
session_start();
include("../class.php");

if (!isset($_SESSION['users'])) {
    header("location:../index.php");
} else {
    $uid = $_SESSION['users'];
    $my_id = $auth->select14('employee', 'staff', 'username', $uid);
}


$users = $_SESSION['users'];
$s1  = mysqli_query($con, "SELECT * FROM staff where username = '$users'");
$sh1 = mysqli_fetch_array($s1);
$name1 = $sh1['fname'] . " " . $sh1['lname'];
$img = $sh1['picture'];
$department = $sh1['department'];
if ($img == "") {
    $img2 = "passport/default.png";
} else {
    $img2 = $img;
}


// List of lists for the sidebar nav items
// feather icons: https://feathericons.com/
$nav_items = [
    [
        "icon" => "home",
        "name" => "Home",
        "link" => "./home.php"
    ],
    [
        "icon" => "user",
        "name" => "Profile",
        "link" => "./profile.php",
    ],
    [
        "icon" => "book-open",
        "name" => "Manage Courses",
        "link" => "./subject.php",
    ],
    [
        "icon" => "award",
        "name" => "Student Performance",
        "link" => "./students_performance.php",
    ],
    [
        "icon" => "credit-card",
        "name" => "Manage Fees",
        "link" => "./mfees.php",
    ],
    [
        "icon" => "monitor",
        "name" => "CBT",
        "link" => "https://hapacollege.org.ng/etest",
    ],
];

if ($auth->countall3('college', 'dean', $my_id) > 0) {
    array_push($nav_items, [
        "icon" => "grid",
        "name" => "Manage Faculty",
        "link" => "./manage_faculty.php",
    ]);
}

if ($auth->countall3('department', 'HOD', $my_id) > 0) {
    array_push($nav_items, [
        "icon" => "grid",
        "name" => "Manage Department",
        "link" => "./manage_class.php",
    ]);
}

// List of lists for the mini sidebar nav items
$mini_nave_items = [
    [
        "icon" => "lock",
        "name" => "Change password",
        "link" => "cpassword.php"
    ],
    [
        "icon" => "log-out",
        "name" => "Logout",
        "link" => "logout.php",
    ],
];

$role = "admin";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('../extras/fonts.php') ?>

    <link rel="stylesheet" href="datatable/css/dataTables.bootstrap.min.css" />

    <link href="./img/logo (2).jpg" rel="icon">
    <link href="logo.png" rel="apple-touch-icon">
    <?php include('../extras/base_head.php') ?>

    <title>Hapa college|Staff portal</title>
</head>

<?php include('../extras/body.php') ?>