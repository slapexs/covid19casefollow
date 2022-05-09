<div class="modal fade" id="modaleditcase" tabindex="-1" aria-labelledby="modaleditcaseLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditcaseLabel">แก้ไขเคสผู้ป่วย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formeditcase">
                    <input type="hidden" name="editcase_id" id="editcase_id" class="form-control" readonly required>
                    <div class="mb-3">
                        <p class="text-primary">ข้อมูลผู้ป่วย</p>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_fname">ชื่อจริง</label>
                                    <input type="text" name="editcase_fname" id="editcase_fname" class="form-control" placeholder="Firstname" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_lname">นามสกุล</label>
                                    <input type="text" name="editcase_lname" id="editcase_lname" class="form-control" placeholder="Lastname" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_cardid">เลขประจำตัวประชาชน</label>
                                    <input type="text" name="editcase_cardid" id="editcase_cardid" class="form-control" placeholder="Card id" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_phone">เบอร์โทรศัพท์:</label>
                                    <input type="text" name="editcase_phone" id="editcase_phone" class="form-control" placeholder="Phone number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="text-primary">ข้อมูลที่อยู่</p>
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="editcase_housenumber">บ้านเลขที่</label>
                                    <input type="text" name="editcase_housenumber" id="editcase_housenumber" class="form-control" placeholder="House number" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="editcase_village_num">หมู่ที่</label>
                                    <select name="editcase_village_num" id="editcase_village_num" class="form-control" required>
                                        <?php for ($i = 1; $i < 14; $i++) { ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <label for="editcase_address">ที่อยู่</label>
                                <input type="text" name="editcase_address" id="editcase_address" class="form-control" placeholder="ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="text-primary">ข้อมูลอาการ</p>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_detail">อาการ</label>
                                    <textarea name="editcase_detail" id="editcase_detail" rows="4" class="form-control" placeholder="Symptoms"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_note">หมายเหตุ</label>
                                    <textarea name="editcase_note" id="editcase_note" rows="4" class="form-control" placeholder="Note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="text-primary">กำหนดกักตัว</p>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_start_quarantine">เริ่ม</label>
                                    <input type="date" name="editcase_start_quarantine" id="editcase_start_quarantine" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editcase_end_quarantine">สิ้นสุด</label>
                                    <input type="date" name="editcase_end_quarantine" id="editcase_end_quarantine" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
                </form>
            </div>
        </div>
    </div>
</div>