<?php
// session_start();
include 'conn.php';

//	 check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// ini_set('display_errors', '1');
// require 'includes/PHPMailer.php';
// require 'includes/SMTP.php';
// require 'includes/Exception.php';
// //Define name spaces
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


// date_default_timezone_set("Africa/Lagos");
$dateTime = date("M d, Y, H:i:s");
$ymd = date('ymd');
$ym = date('ym');
$date = date("Y-m-d");
$date2 = new DateTime($date);
$week = date('y') . $date2->format("W");
if (isset($_SESSION['users'])) {
    $uid = $_SESSION['users'];
}
class Auth
{
    function __construct()
    {
        if (array_key_exists('key', $_GET)) {
            extract($_GET);
            if ($key == "AddMerchantForm") {
                // $this->RegisterMarchant();
            }
        }
    }
    function select16($val, $table, $col, $val2, $col2, $val3)
    {
        global $conn;
        $sqlstr = "SELECT $val FROM $table WHERE $col = '$val2' && $col2 = '$val3' LIMIT 1";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        $x = $result->num_rows;
        if ($x > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $row[$val];
            }
        } else {
            $res = 0;
        }
        return $res;
    }
    function select18($val, $table, $col, $val2, $col2, $val3, $col3, $val4)
    {
        global $conn;
        $sqlstr = "SELECT $val FROM $table WHERE $col = '$val2' && $col2 = '$val3' && $col3 = '$val4' LIMIT 1";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        $x = $result->num_rows;
        if ($x > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $row[$val];
            }
        } else {
            $res = 0;
        }
        return $res;
    }
    function countall9($table, $col, $val, $col2, $val2, $col3, $val3, $col4, $val4)
    {
        global $conn;
        $sqlstr = "SELECT * FROM $table WHERE $col = '$val' && $col2 = '$val2'&& $col3 = '$val3'&& $col4 = '$val4'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    function Log($user, $user_type, $action, $details)
    {
        global $conn;
        $ip = $this->getUserIP();
        $date = date("Y-m-d H:i:s");
        $sqlstr = "INSERT INTO logs (user,type,action,details,date,ip) VALUES ('$user','$user_type','$action','$details','$date','$ip')";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
    }

    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
    function If_image_exist($src)
    {
        $res = 0;
        if (@getimagesize($src)) {
            $res = 1;
        }
        return $res;
    }

    function getFirstWord($string)
    {
        global $conn, $mid;
        $arr = explode(' ', trim($string));
        return isset($arr[0]) ? $arr[0] : $string;
    }

    function Sms($phone, $message)
    {
        $email = "";
        $password = "";
        $sender_name = "";
        $recipients = $phone;
        $forcednd = "1";
        $data = array("email" => $email, "password" => $password, "message" => $message, "sender_name" => $sender_name, "recipients" => $recipients, "forcednd" => $forcednd);
        $data_string = json_encode($data);
        $ch = curl_init('https://api.bulksmslive.com/v2/app/sms');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
        $result = curl_exec($ch);
        return json_decode($result);
    }


    function SendMail($subject, $body, $email)
    {
        // $mail = new PHPMailer();
        // $mail->isSMTP();
        // $mail->Host = "";
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = "tls";
        // $mail->Port = "587";
        // $mail->Username = "";
        // $mail->Password = "";
        // $mail->Subject = $subject;
        // $mail->setFrom('');
        // $mail->FromName = "";
        // $mail->AddReplyTo('');
        // $mail->isHTML(true);

        // $mail->Body = $body;
        // $mail->addAddress("$email");
        // $mail->send();
    }
    function countall1($table)
    {
        global $conn;
        $sqlstr = "SELECT * FROM $table";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }

    function countall3($table, $col, $val)
    {
        global $conn;
        $sqlstr = "SELECT * FROM $table WHERE $col = '$val'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }


    function countall5($table, $col, $val, $col2, $val2)
    {
        global $conn;
        $sqlstr = "SELECT * FROM $table WHERE $col = '$val' && $col2 = '$val2'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }

    function countall7($table, $col, $val, $col2, $val2, $col3, $val3)
    {
        global $conn;
        $sqlstr = "SELECT * FROM $table WHERE $col = '$val' && $col2 = '$val2'&& $col3 = '$val3'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows;
    }
    function user($val, $table, $col, $val2)
    {
        global $conn;
        $sqlstr = "SELECT $val FROM $table WHERE $col = ? ORDER BY id DESC LIMIT 1";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("s", $val2);
        $stmt->execute();
        $result = $stmt->get_result();
        $x = $result->num_rows;
        if ($x > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $row[$val];
            }
        } else {
            $res = 0;
        }
        return $res;
    }

    function update5($table, $col, $val, $con, $val2)
    {
        global $conn;
        $sqlstr = "UPDATE $table SET $col = '$val' WHERE $con = '$val2'";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
    }

    function select14($val, $table, $col, $val2)
    {
        global $conn;
        $sqlstr = "SELECT $val FROM $table WHERE $col = ? LIMIT 1";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("s", $val2);
        $stmt->execute();
        $result = $stmt->get_result();
        $x = $result->num_rows;
        if ($x > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $row[$val];
            }
        } else {
            $res = 0;
        }
        return $res;
    }
    function select12($val, $table)
    {
        global $conn;
        $sqlstr = "SELECT $val FROM $table";
        $stmt = $conn->prepare($sqlstr);
        $stmt->execute();
        $result = $stmt->get_result();
        $x = $result->num_rows;
        if ($x > 0) {
            while ($row = $result->fetch_assoc()) {
                $res = $row[$val];
            }
        } else {
            $res = 0;
        }
        return $res;
    }
}
$auth = new Auth;
