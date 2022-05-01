<div class="modal fade" id="modalchangepassword" tabindex="-1" aria-labelledby="modalchangepasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalchangepasswordLabel">เปลี่ยนรหัสผ่านบัญชีผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formadminchangepassworduser">
                    <input type="hidden" name="admchgpwd_mid" id="dmchgpwd_mid" readonly required>

                    <div class="form-group">
                        <label for="admchgpwd_username">ชื่อบัญชีผู้ใช้</label>
                        <input type="text" name="admchgpwd_username" id="admchgpwd_username" class="form-control" placeholder="username" readonly required>
                    </div>

                    <div class="form-group">
                        <label for="admchgpwd_newpassword">รหัสผ่านใหม่</label>
                        <input type="password" name="admchgpwd_newpassword" id="admchgpwd_newpassword" class="form-control" placeholder="new password" required>
                    </div>

                    <div class="form-group">
                        <label for="admchgpwd_cfnewpassword">ยืนยันรหัสผ่านใหม่</label>
                        <input type="password" name="admchgpwd_cfnewpassword" id="admchgpwd_cfnewpassword" class="form-control" placeholder="confirm new password" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>