<div class="mt-md-5">
    <p class="display-4 text-muted"><i class="ri-user-line"></i> ข้อมูลส่วนตัว</p>
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <div class="bg-light rounded p-3">
                <div class="form-group">
                    <button type="button" class="btn btn-warning btn-sm float-right" id="btn_editprofile" onclick="show_div_editprofile('show')"><i class="ri-edit-line"></i> แก้ไข</button>
                    <p><?= $racc['m_username'] . ' <span class="text-primary">(' . $memberroles[$racc['m_role']] . ')</span>' ?></p>
                </div>

                <div class="form-group">
                    <label for="m_fname">ชื่อ</label>
                    <input type="text" name="m_fname" id="m_fname" class="form-control" value="<?= $racc['m_fname'] ?>" readonly required>
                </div>

                <div class="form-group">
                    <label for="m_lname">นามสกุล</label>
                    <input type="text" name="m_lname" id="m_lname" class="form-control" value="<?= $racc['m_lname'] ?>" readonly required>
                </div>
            </div>
        </div>

        <!-- Edit profile -->
        <div class="col-lg-6">
            <div class="bg-light rounded p-3 d-none" id="div_editprofile">
                <div class="form-group">
                    <p class="text-warning">แก้ไขโปรไฟล์</p>
                </div>

                <form action="" id="formeditprofile">
                    <input type="hidden" name="edit_mid" id="edit_mid" class="form-control-plaintext" value="<?= $smid; ?>" readonly required>
                    <div class="form-group">
                        <label for="edit_mfname">ชื่อ</label>
                        <input type="text" name="edit_mfname" id="edit_mfname" class="form-control" value="<?= $racc['m_fname'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_mlname">นามสกุล</label>
                        <input type="text" name="edit_mlname" id="edit_mlname" class="form-control" value="<?= $racc['m_lname'] ?>" required>
                    </div>

                    <div class="mt-2 text-right">
                        <button class="btn btn-primary" type="submit">บันทึก</button>
                        <button class="btn btn-outline-secondary" type="button" onclick="show_div_editprofile('hide')">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>