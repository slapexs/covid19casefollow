<div class="modal fade" id="modaladduser" tabindex="-1" aria-labelledby="modaladduserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaladduserLabel">เพิ่มบัญชีผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formadduser">
                    <div class="form-group">
                        <label for="m_username">ชื่อบัญชีผู้ใช้</label>
                        <input type="text" name="m_username" id="m_username" class="form-control" placeholder="username" required>
                    </div>

                    <div class="form-group">
                        <label for="m_password">รหัสผ่าน</label>
                        <input type="password" name="m_password" id="m_password" class="form-control" placeholder="password" required>
                    </div>

                    <div class="form-group">
                        <label for="m_fname">ชื่อ</label>
                        <input type="text" name="m_fname" id="m_fname" class="form-control" placeholder="firstname" required>
                    </div>

                    <div class="form-group">
                        <label for="m_lname">นามสกุล</label>
                        <input type="text" name="m_lname" id="m_lname" class="form-control" placeholder="lastname" required>
                    </div>

                    <div class="form-group">
                        <label for="m_role">ประเภท</label>
                        <select name="m_role" id="m_role" class="form-control" required>
                            <option value="0" selected disabled hidden>-- เลือกสถานะ</option>
                            <option value="0">อสม.</option>
                            <option value="1">แพทย์</option>
                            <option value="2">แอดมิน</option>
                        </select>
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