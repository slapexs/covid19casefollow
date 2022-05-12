<?php
include_once('./backend/function.php');
include_once('./service/getdata.php');

// Check sesstion login
if (!isset($_SESSION['m_id'])) {
    header('location: ./login');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- External css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/favicon/virus.png" type="image/x-icon">
    <!-- Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>ระบบบันทึกและติดตามเคสผู้ป่วยโควิด-19 รพ.สต.ร้องกวาง</title>
</head>

<body onload="getstatcovid()">
    <?php
    include_once('./components/navbar.php');
    // Moda
    include_once('./components/modal_adduser.php');
    include_once('./components/modal_edituser.php');
    include_once('./components/modal_changepassworduser.php');
    include_once('./components/modal_editcase.php');
    ?>

    <div class="container">
        <?php
        switch ($page) {
            case 'profile':
                include_once('./pages/profile.php');
                break;
            case 'password';
                include_once('./pages/changepassword.php');
                break;
            case 'users':
                include_once('./pages/users.php');
                break;
            case 'allcase':
                include_once('./pages/allcase.php');
                break;
            case 'addcase':
                include_once('./pages/addcase.php');
                break;
            case 'viewcase':
                include_once('./pages/viewcase.php');
                break;
            case 'searchcase':
                include_once('./pages/searchcase.php');
                break;
            case 'mycase':
                include_once('./pages/mycase.php');
                break;

            default:
                include_once('./components/main.php');
                break;
        }
        ?>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Sweetalert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main js -->
    <script src="./assets/js/main.js"></script>
    <!-- Profile js -->
    <script src="./assets/js/profile.js"></script>
    <!-- Password -->
    <script src="./assets/js/password.js"></script>
    <!-- Case -->
    <script src="./assets/js/case.js"></script>
</body>

</html>