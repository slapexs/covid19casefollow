<div class="mt-md-5">
    <p class="display-4 text-muted"><i class="ri-lock-password-line"></i> เปลี่ยนรหัสผ่าน</p>
    <hr>

    <div class="row">
        <!-- Edit profile -->
        <div class="col-lg-6">
            <div class="bg-light rounded p-3" id="div_changepassword">
                <div class="form-group">
                    <p class="text-primary">เปลี่ยนรหัสผ่าน</p>
                </div>

                <form action="" id="formchangepassword">
                    <input type="hidden" name="smid" id="smid" class="form-control-plaintext" value="<?= $smid; ?>" readonly required>
                    <div class="form-group">
                        <label for="curpassword">รหัสผ่านปัจจุบัน</label>
                        <input type="password" name="curpassword" id="curpassword" class="form-control"  required>
                    </div>

                    <div class="form-group">
                        <label for="newpassword">รหัสผ่านใหม่</label>
                        <input type="password" name="newpassword" id="newpassword" class="form-control"  required>
                    </div>

                    <div class="form-group">
                        <label for="cf_newpassword">ยืนยันรหัสผ่านใหม่</label>
                        <input type="password" name="cf_newpassword" id="cf_newpassword" class="form-control" required>
                    </div>

                    <div class="mt-2 text-right">
                        <button class="btn btn-primary" type="submit">บันทึก</button>
                        <button class="btn btn-outline-secondary" type="reset">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>