<div class="modal fade" id="modaledituser" tabindex="-1" aria-labelledby="modaledituserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaledituserLabel">แก้ไขบัญชีผู้ใช้</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formadminedituser">
                    <input type="hidden" name="admedt_mid" id="admedt_mid" readonly required>
                    <div class="form-group">
                        <label for="admedt_username">ชื่อบัญชีผู้ใช้</label>
                        <input type="text" name="admedt_username" id="admedt_username" class="form-control" placeholder="username" required>
                    </div>


                    <div class="form-group">
                        <label for="admedt_fname">ชื่อ</label>
                        <input type="text" name="admedt_fname" id="admedt_fname" class="form-control" placeholder="firstname" required>
                    </div>

                    <div class="form-group">
                        <label for="admedt_lname">นามสกุล</label>
                        <input type="text" name="admedt_lname" id="admedt_lname" class="form-control" placeholder="lastname" required>
                    </div>

                    <div class="form-group">
                        <label for="admedt_role">ประเภท</label>
                        <select name="admedt_role" id="admedt_role" class="form-control" required>
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