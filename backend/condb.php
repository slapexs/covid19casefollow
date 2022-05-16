<?php
// localhost
$hostname = "localhost";
$hostusername = "root";
$hostpassword = "";
$dbname = "covid19casefollow";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $hostusername, $hostpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Bangkok');
} catch (PDOException $error) {
    echo "Connect database fail" . $error->getMessage();
    exit();
}
