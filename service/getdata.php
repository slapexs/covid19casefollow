<?php
include_once('./backend/condb.php');
// Get user data if lgin pass
if (isset($smid)){
    $acc = "SELECT * FROM `members` WHERE `m_id` = :smid";
    $qacc = $conn->prepare($acc);
    $qacc->bindParam(':smid', $smid);
    $qacc->execute();
    $racc = $qacc->fetch();
}

// All users
if (isset($smid) && $smrole == 2){
    $allusers = "SELECT * FROM `members` ORDER BY `m_id` ASC";
    $qallusers = $conn->prepare($allusers);
    $qallusers->execute();
}