<?php
include_once('./backend/condb.php');

// Generate case id 
function getcaseid($n) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return date('dmy').'-'.$randomString;
}

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

// All case
if (isset($smid)){
    $allcase = "SELECT * FROM `cases`";
    $qallcase = $conn->prepare($allcase);
    $qallcase->execute();
}

// View case
if (isset($smid)){
    $viewcase = "SELECT * FROM `cases` as c INNER JOIN `members` as m ON m.m_id = c.c_ref_docid WHERE`c_id` = :cid";
    $qviewcase = $conn->prepare($viewcase);
    $qviewcase->bindParam(':cid', $cid);
    $qviewcase->execute();
    $rviewcase = $qviewcase->fetch();
}

// View case by village number
if (isset($smid)){
    $findcase = "SELECT * FROM `cases` WHERE `c_village_num` = :villnum";
    $qfindcase = $conn->prepare($findcase);
    $qfindcase->bindParam(':villnum', $villnum);
    $qfindcase->execute();
}

// Search case
if (isset($smid)) {
    // Search by phone
    $searchcase = "SELECT * FROM `cases` WHERE `c_cardid` = :cardid";
    $qsearchcase = $conn->prepare($searchcase);
    $qsearchcase->bindParam(':cardid', $keyword);
    $qsearchcase->execute();    
}

// Get all doctor for staff send case
if (isset($smid)){
    $docrole = 1;
    $doctors = "SELECT * FROM `members` WHERE `m_role` = :docrole";
    $qdoctors = $conn->prepare($doctors);
    $qdoctors->bindParam(':docrole', $docrole);
    $qdoctors->execute();

}

// My all case
if (isset($smid)){
    $mycase = "SELECT * FROM `cases` WHERE `c_ref_docid` = :smid";
    $qmycase = $conn->prepare($mycase);
    $qmycase->bindParam(':smid', $smid);
    $qmycase->execute();
}

// Find my case by vill num
if (isset($smid)){
    $findmycase = "SELECT * FROM `cases` WHERE `c_village_num` = :villnum AND `c_ref_docid` = :smid";
    $qfindmycase = $conn->prepare($findmycase);
    $qfindmycase->bindParam(':villnum', $villnum);
    $qfindmycase->bindParam(':smid', $smid);
    $qfindmycase->execute();
}