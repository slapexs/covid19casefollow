<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./">หน้าแรก</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainnavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= (isset($smid) ?  $racc['m_username'] : ''); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./?page=profile"><i class="ri-user-line"></i> แก้ไขโปรไฟล์</a>
                        <a class="dropdown-item" href="./?page=password"><i class="ri-lock-password-line"></i> แก้ไขรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./logout" onclick="return confirm('ออกจากระบบ ?')"><i class="ri-logout-box-line"></i> ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>