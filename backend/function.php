<?php
error_reporting(0);
session_start();
include_once('./condb.php');

// Variables
$smid = $_SESSION['m_id'];
$page = $_GET['page'];
$memberroles = ['อสม.', 'แพทย์', 'แอดมิน'];
$smrole = $_SESSION['m_role'];
$cid = base64_decode($_GET['cid']);
$casestatus = ['<span class="badge badge-danger">กำลังรักษาตัว</span>', '<span class="badge badge-success">รักษาหาย</span>', '<span class="badge badge-info">รอรับเคส</span>', '<span class="badge badge-dark">เสียชีวิต</span>'];
$villnum = $_GET['villnum'];
$keyword = base64_decode($_GET['keyword']);

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
if (isset($_POST['editprofile'])) {
    $data = $_POST['editprofile'];

    $update = "UPDATE `members` SET `m_fname` = :fname, `m_lname` = :lname WHERE `m_id` = :mid";
    $qupdate = $conn->prepare($update);
    $qupdate->bindParam('mid', $data[0]);
    $qupdate->bindParam('fname', $data[1]);
    $qupdate->bindParam('lname', $data[2]);
    $qupdate->execute();
    if ($qupdate) {
        $res_msg = 'updated';
    }
    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Change password
if (isset($_POST['changepassword'])) {
    $data = $_POST['changepassword'];
    $user = "SELECT * FROM `members` WHERE `m_id` = :mid";
    $quser = $conn->prepare($user);
    $quser->bindParam(':mid', $data[0]);
    $quser->execute();
    $ruser = $quser->fetch();
    $curpassword = $ruser['m_password'];

    // Check current password
    if (password_verify($data[1], $curpassword)) {

        // Check new password match
        if ($data[2] == $data[3]) {
            // Change password
            $hashpwd = password_hash($data[2], PASSWORD_DEFAULT);
            $update = "UPDATE `members` SET `m_password` = :newpassword WHERE `m_id` = :mid";
            $qupdate = $conn->prepare($update);
            $qupdate->bindParam(':mid', $data[0]);
            $qupdate->bindParam(':newpassword', $hashpwd);
            $qupdate->execute();
            if ($qupdate) {
                $res_msg = 'pwd_changed';
            }
        } else {
            $res_msg = 'newpwd_notmatch';
        }
    } else {
        $res_msg = 'curpwd_invalid';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Delete user
if (isset($_POST['deluser'])) {
    $delmid = $_POST['deluser'];
    $del = "DELETE FROM `members` WHERE `m_id` = :delmid";
    $qdel = $conn->prepare($del);
    $qdel->bindParam(':delmid', $delmid);
    $qdel->execute();
    if ($qdel) {
        $res_msg = 'deleted';
    } else {
        $res_msg = 'note_delete';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Add user
if (isset($_POST['adduser'])) {
    $data = $_POST['adduser'];
    // Check username
    $finduser = "SELECT * FROM `members` WHERE `m_username` = :username";
    $qfinduser = $conn->prepare($finduser);
    $qfinduser->bindParam(':username', $data[0]);
    $qfinduser->execute();
    $cfinduser = $qfinduser->rowCount();
    if ($cfinduser < 1) {
        $hashpwd = password_hash($data[1], PASSWORD_DEFAULT);
        $ins = "INSERT INTO `members` (`m_username`, `m_password`, `m_fname`, `m_lname`, `m_role`) VALUES (:username, :hashpassword, :fname, :lname, :mrole)";
        $qins = $conn->prepare($ins);
        $qins->bindParam(':username', $data[0]);
        $qins->bindParam(':hashpassword', $hashpwd);
        $qins->bindParam(':fname', $data[2]);
        $qins->bindParam(':lname', $data[3]);
        $qins->bindParam(':mrole', $data[4]);
        $qins->execute();
        if ($qins) {
            $res_msg = 'inserted';
        } else {
            $res_msg = 'not_insert';
        }
    } else {
        $res_msg = 'username_invalid';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Admin edit user
if (isset($_POST['adminedituser'])) {
    $data = $_POST['adminedituser'];
    // Check admin role
    if ($smrole == 2) {
        $update = "UPDATE `members` SET `m_username` = :musername, `m_fname` = :fname, `m_lname` = :lname, `m_role` = :mrole WHERE `m_id` = :mid";
        $qupdate = $conn->prepare($update);
        $qupdate->bindParam(':musername', $data[1]);
        $qupdate->bindParam(':fname', $data[2]);
        $qupdate->bindParam(':lname', $data[3]);
        $qupdate->bindParam(':mrole', $data[4]);
        $qupdate->bindParam(':mid', $data[0]);
        $qupdate->execute();

        if ($qupdate) {
            $res_msg = 'updated';
        } else {
            $res_msg = "not_update";
        }
    } else {
        $res_msg = 'invalid_role';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Admin change user password
if (isset($_POST['adminchangeuserpassword'])) {
    $data = $_POST['adminchangeuserpassword'];

    // Check admin role
    if ($smrole == 2) {
        // Check match password
        if ($data[1] == $data[2]) {
            // Change user password
            $hashpwd = password_hash($data[1], PASSWORD_DEFAULT);
            $chgpwd = "UPDATE `members` SET `m_password` = :newpassword WHERE `m_id` = :mid";
            $qchgpwd = $conn->prepare($chgpwd);
            $qchgpwd->bindParam(':newpassword', $hashpwd);
            $qchgpwd->bindParam(':mid', $data[0]);
            $qchgpwd->execute();
            if ($qchgpwd) {
                $res_msg = 'changed';
            } else {
                $res_msg = 'not_change';
            }
        } else {
            $res_msg = 'password_not_match';
        }
    } else {
        $res_msg = 'invalid_role';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Doctor add case
if (isset($_POST['addcase'])) {
    $data = $_POST['addcase'];


    $addr = $data[11] . ' ม.' . $data[2] . ' ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140';
    if ($smrole <= 1) {
        ($smrole == 1 ? $c_status =  0 : $c_status = 2);

        $ins = "INSERT INTO `cases` (`c_id`, `c_ref_docid`, `c_village_num`, `c_fname`, `c_lname`, `c_cardid`, `c_address`, `c_phone`, `c_detail`, `c_note`, `c_start_quarantine`, `c_end_quarantine`, `c_status`) VALUES (:cid, :crefdocid, :cvillagenum, :cfname, :clname, :ccardid, :caddress, :cphone, :cdetail, :cnote, :cstart, :cend, :cstatus)";

        $qins = $conn->prepare($ins);
        $qins->bindParam(':cid', $data[0]);
        $qins->bindParam(':crefdocid', $data[1]);
        $qins->bindParam(':cvillagenum', $data[2]);
        $qins->bindParam(':cfname', $data[3]);
        $qins->bindParam(':clname', $data[4]);
        $qins->bindParam(':ccardid', $data[5]);
        $qins->bindParam(':caddress', $addr);
        $qins->bindParam(':cphone', $data[6]);
        $qins->bindParam(':cdetail', $data[7]);
        $qins->bindParam(':cnote', $data[8]);
        $qins->bindParam(':cstart', $data[9]);
        $qins->bindParam(':cend', $data[10]);
        $qins->bindParam(':cstatus', $c_status);
        $qins->execute();
        if ($qins) {
            $res_msg = 'inserted';
        } else {
            $res_msg = 'note_insert';
        }
    } else {
        $res_msg = 'role_invalid';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Doctor get case
if (isset($_POST['getcase'])) {
    $caseid = $_POST['getcase'];
    $caseinprogress = 0;
    $get = "UPDATE `cases` SET `c_status` = :getcase WHERE `c_id` = :caseid";
    $qget = $conn->prepare($get);
    $qget->bindParam(':getcase', $caseinprogress);
    $qget->bindParam(':caseid', $caseid);
    $qget->execute();
    if ($qget) {
        $res_msg = 'geted';
    } else {
        $res_msg = 'non_get';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Doctor update case status
if (isset($_POST['updatecase_status'])) {
    $data = $_POST['updatecase_status'];
    $update = "UPDATE `cases` SET `c_status` = :casestatus WHERE `c_id` = :caseid";
    $qupdate = $conn->prepare($update);
    $qupdate->bindParam(':casestatus', $data[1]);
    $qupdate->bindParam(':caseid', $data[0]);
    $qupdate->execute();
    if ($qupdate) {
        $res_msg = "updated";
    } else {
        $res_msg = "no_update";
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Doctor delete case
if (isset($_POST['deletecase'])) {
    $data = $_POST['deletecase'];
    // Findcase
    $fndcase = "SELECT * FROM `cases` WHERE `c_id` = :caseid";
    $qfndcase = $conn->prepare($fndcase);
    $qfndcase->bindParam(':caseid', $data[0]);
    $qfndcase->execute();
    $rfndcase = $qfndcase->fetch();
    $ref_docid = $rfndcase['c_ref_docid'];

    // Check ref_docid
    if ($ref_docid == $data[1]) {
        $delcase = "DELETE FROM `cases` WHERE `c_id` = :caseid";
        $qdelcase = $conn->prepare($delcase);
        $qdelcase->bindParam(':caseid', $data[0]);
        $qdelcase->execute();
        if ($qdelcase) {
            $res_msg = 'deleted';
        } else {
            $res_msg = 'not_delete';
        }
    } else {
        $res_msg = 'cant_delete';
    }

    $response = ['msg' => $res_msg];
    echo json_encode($response);
}

// Doctor get case data for edit
if (isset($_POST['getcasedata_foredit'])){
    $data = $_POST['getcasedata_foredit'];

    $find = $conn->prepare("SELECT * FROM `cases` WHERE `c_id` = :caseid");
    $find->bindParam(':caseid', $data);
    $find->execute();
    $rfind = $find->fetch();

    $response = $rfind;
    echo json_encode($response);
}

// Function doctor edit case
if (isset($_POST['editcase'])){
    $data = $_POST['editcase'];
    $addr = $data[11] . ' ม.' . $data[5] . ' ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140';
    // Check ref_docid
    $case = $conn->prepare("SELECT * FROM `cases` WHERE `c_id` = :caseid");
    $case->bindParam(':caseid', $data[0]);
    $case->execute();
    $rcase = $case->fetch();
    if ($rcase['c_ref_docid'] == $smid){
        // Update case
        $update = $conn->prepare("UPDATE `cases` SET `c_fname` = :fname, `c_lname` = :lname, `c_cardid` = :cardid, `c_address` = :addr, `c_phone` = :phone, `c_village_num` = :villnum, `c_detail` = :detail, `c_note` = :note, `c_start_quarantine` = :qstart, `c_end_quarantine` = :qend WHERE `c_id` = :caseid");
        $update->bindParam(':fname', $data[1]);
        $update->bindParam(':lname', $data[2]);
        $update->bindParam(':cardid', $data[3]);
        $update->bindParam(':addr', $addr);
        $update->bindParam(':phone', $data[4]);
        $update->bindParam(':villnum', $data[5]);
        $update->bindParam(':detail', $data[7]);
        $update->bindParam(':note', $data[8]);
        $update->bindParam(':qstart', $data[9]);
        $update->bindParam(':qend', $data[10]);
        $update->bindParam(':caseid', $data[0]);
        $update->execute();
        if ($update){
            $res_msg = 'updated';
        }else{
            $res_msg = 'not_update';
        }
    }else{
        $res_msg = 'mid_not_match';
    }
    $response = ['msg' => $res_msg];
    echo json_encode($response);

}