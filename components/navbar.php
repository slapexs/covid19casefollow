<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./">หน้าแรก</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainnavbar">
            <ul class="navbar-nav ml-auto">
                <?php if ($smrole <= 1) { ?>
                    <li class="nav-item <?= ($page == 'allcase' ? 'active' : '') ?>">
                        <a class="nav-link" href="./?page=allcase"><i class="ri-list-ordered"></i> เคสผู้ป่วยทั้งหมด</a>
                    </li>
                    <li class="nav-item <?= ($page == 'addcase' ? 'active' : '') ?>">
                        <a class="nav-link" href="./?page=addcase"><i class="ri-file-add-line"></i> เพิ่มเคสผู้ป่วย</a>
                    </li>
                    <li class="nav-item <?= ($page == 'mycase' ? 'active' : '') ?>">
                        <a class="nav-link" href="./?page=mycase"><i class="ri-folder-line"></i> เคสที่รับผิดชอบ</a>
                    </li>
                <?php } ?>

                <?php if ($smrole == 2) { ?>
                    <li class="nav-item <?= ($page == 'users' ? 'active' : '') ?>">
                        <a class="nav-link" href="./?page=users"><i class="ri-group-line"></i> จัดการบัญชีผู้ใช้</a>
                    </li>
                <?php } ?>

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