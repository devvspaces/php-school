<?php include("../conn.php") ?>
<?php session_start();
if (!isset($_SESSION['users'])) {
    header("location:../index.php");
}


$users = $_SESSION['users'];
$s1 = mysqli_query($con, "SELECT * FROM admin where username = '$users'");
$sh1 = mysqli_fetch_array($s1);
$name1 = $sh1['fname'] . " " . $sh1['lname'];
$img = $sh1['picture'];
$position = $sh1['position'];
if ($img == "") {
    $img2 = "passport/default.png";
} else {
    $img2 = $img;
}

$my_role_array = $sh1['role'];
$my_role_array = json_decode($my_role_array, true);

// List of lists for the sidebar nav items
// feather icons: https://feathericons.com/
$nav_items = [
    [
        "icon" => "home",
        "name" => "Dashboard",
        "link" => "./home.php"
    ],
    [
        "icon" => "users",
        "name" => "Manage Admin",
        "link" => "./madmin.php",
    ],
    [
        "icon" => "users",
        "name" => "Manage Staff",
        "link" => "./mstaff.php",
    ],
    [
        "icon" => "book-open",
        "name" => "Manage Faculty",
        "link" => "./mcollege.php",
    ],
    [
        "icon" => "grid",
        "name" => "Manage Departments",
        "link" => "./mdepartment.php",
    ],
    [
        "icon" => "users",
        "name" => "Manage Students",
        "link" => "./m_stu_cat.php",
    ],
    [
        "icon" => "credit-card",
        "name" => "Manage Fees",
        "link" => "./mfees.php",
    ],
    [
        "icon" => "bell",
        "name" => "Anouncement",
        "link" => "./canoucement.php",
    ],
    [
        "icon" => "calendar",
        "name" => "Calender",
        "link" => "./calendar.php",
    ],
    [
        "icon" => "message-square",
        "name" => "Bulk Message",
        "link" => "./bulk_message.php",
    ],

];

// List of lists for the mini sidebar nav items
$mini_nave_items = [
    [
        "icon" => "lock",
        "name" => "Change password",
        "link" => "cpassword.php"
    ],
    [
        "icon" => "user",
        "name" => "Admin Profile",
        "link" => "profile.php",
    ],
    [
        "icon" => "log-out",
        "name" => "Logout",
        "link" => "logout.php",
    ],
];

$role = "admin";

include("../class.php");
?>

<?php include("../extras/header.php") ?>

