<?php
error_reporting(0);
session_start();
include_once('./condb.php');

// Variables
$smid = $_SESSION['m_id'];
$page = $_GET['page'];
$memberroles = ['อสม.', 'แพทย์', 'แอดมิน'];

// Checklogin
if (isset($_POST['checklogin'])) {
    $data = $_POST['checklogin'];
    $res_msg = "";

    // Check username password
    $finduser = "SELECT * FROM `members` WHERE `m_username` = :username";
    $qfinduser = $conn->prepare($finduser);
    $qfinduser->bindParam(':username', $data[0]);
    $qfinduser->execute();
    $rfinduser = $qfinduser->fetch();
    $cfinduser = $qfinduser->rowCount();

    // Check password
    if ($cfinduser > 0) {
        if (password_verify($data[1], $rfinduser['m_password'])) {
            $_SESSION['m_id'] = $rfinduser['m_id'];
            $_SESSION['m_username'] = $rfinduser['m_username'];
            $_SESSION['m_password'] = $rfinduser['m_password'];
            $_SESSION['m_role'] = $rfinduser['m_role'];
            $res_msg = 'success';
            // header('location: ./');
        } else {
            $res_msg = 'password_invalid';
        }
    } else {
        $res_msg = 'username_not_found';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Edit profile
if (isset($_POST['editprofile'])){
    $data = $_POST['editprofile'];

    $update = "UPDATE `members` SET `m_fname` = :fname, `m_lname` = :lname WHERE `m_id` = :mid";
    $qupdate = $conn->prepare($update);
    $qupdate->bindParam('mid', $data[0]);
    $qupdate->bindParam('fname', $data[1]);
    $qupdate->bindParam('lname', $data[2]);
    $qupdate->execute();
    if ($qupdate){
        $res_msg = 'updated';
    }
    $response = ['msg' => $res_msg];
    echo json_encode($response);
}
