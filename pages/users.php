<?php
// Check role user
if ($smrole != 2) {
    header('location: ./');
}
?>

<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-group-line"></i> จัดการบัญชีผู้ใช้</p>
    <hr>

    <div class="bg-light rounded p-3">
        <div class="row mb-2">
            <div class="col">
                <h5><i class="ri-group-line"></i> บัญชีผู้ใช้ทั้งหมด</h5>
            </div>

            <div class="col-auto">
                <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#modaladduser"><i class="ri-user-add-line"></i> เพิ่มบัญชีผู้ใช้</button>
            </div>
        </div>


        <div class="table-responsie">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">ไอดี</th>
                        <th>ชื่อบัญชีผู้ใช้</th>
                        <th>ชื่อ-สกุล</th>
                        <th>สถานะ</th>
                        <th class="text-center">ตัวเลือก</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($rallusers = $qallusers->fetch()) { ?>
                        <tr>
                            <td class="text-center"><?= $rallusers['m_id']; ?></td>
                            <td><?= $rallusers['m_username']; ?></td>
                            <td><?= $rallusers['m_fname']. ' '. $rallusers['m_lname']; ?></td>
                            <td><?= $memberroles[$rallusers['m_role']]; ?></td>
                            <td width="15%" class="text-center">
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-warning" type="button" id="btn_edituser" data-toggle="dropdown" aria-expanded="false">แก้ไข</button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btn_edituser">
                                            <button class="dropdown-item" type="button"><i class="ri-user-line"></i> โปรไฟล์</button>
                                            <button class="dropdown-item" type="button"><i class="ri-lock-password-line"></i> รหัสผ่าน</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-secondary" type="button" onclick="deluser('<?= $rallusers['m_id']; ?>', '<?= $smid; ?>')">ลบบัญชี</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>