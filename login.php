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
    <title>Login | ระบบบันทึกและติดตามเคสผู้ป่วยโควิด-19 รพ.สต.ร้องกวาง</title>
</head>

<body>
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h4><i class="ri-logout-box-r-line"></i> เข้าสู่ระบบ</h4>
                        <hr>
                        <form action="" id="formlogin">
                            <div class="form-group">
                                <label for="m_username">ชื่อบัญชีผู้ใช้</label>
                                <input type="text" name="m_username" id="m_username" class="form-control" autocomplete="off" placeholder="username" required>
                            </div>

                            <div class="form-group">
                                <label for="m_password">รหัสผ่าน</label>
                                <input type="password" name="m_password" id="m_password" class="form-control" autocomplete="off" placeholder="password" required>
                            </div>

                            <div class="mt-2 text-center">
                                <button class="btn btn-primary" id="btnlogin" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>