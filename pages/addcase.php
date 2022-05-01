<?php
if ($smrole >= 1) {
    header('location: ./');
}
?>

<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-file-add-line"></i> เพิ่มเคสผู้ป่วย</p>
    <hr>

    <div class="bg-light rounded p-3">
        <form action="" id="formaddcase">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="c_id">รหัสเคสผู้ป่วย</label>
                        <input type="text" name="c_id" id="c_id" class="form-control" value="<?= getcaseid(5); ?>" placeholder="caseid" required readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="c_ref_docid">แพทย์เจ้าของเคส</label>
                    <input type="hidden" name="c_ref_docid" id="c_ref_docid" value="<?= $smid; ?>" class="form-control" readonly required>
                    <input type="text" name="c_ref_docname" id="c_ref_docname" class="form-control" value="<?= $racc['m_fname'] . '  ' . $racc['m_lname']; ?>" placeholder="Doctor" required readonly>
                </div>

                <div class="col-md-4">
                    <label for="c_date">วันที่ลงข้อมูล</label>
                    <input type="text" name="c_date" id="c_date" class="form-control" value="<?= date('d/m/Y'); ?>" readonly required>
                </div>
            </div>


            <div class="row">
                <!-- ข้อมูลผู้ป่วย -->
                <div class="col-md-4 my-4">
                    <p class="text-muted">ข้อมูลผู้ป่วย</p>
                    <div class="form-group">
                        <label for="c_fname">ชื่อจริง</label>
                        <input type="text" name="c_fname" id="c_fname" class="form-control" placeholder="firstname" required>
                    </div>

                    <div class="form-group">
                        <label for="c_lname">นามสกุล</label>
                        <input type="text" name="c_lname" id="c_lname" class="form-control" placeholder="lastname" required>
                    </div>

                    <div class="form-group">
                        <label for="c_cardid">เลขประจำตัวประชาชน</label>
                        <input type="text" name="c_cardid" id="c_cardid" class="form-control" placeholder="card id" minlength="13" maxlength="13" required>
                    </div>

                    <div class="form-group">
                        <label for="c_phone">เบอร์โทรศัพท์</label>
                        <input type="text" name="c_phone" id="c_phone" class="form-control" placeholder="phone number" required>
                    </div>
                </div>

                <!-- ข้อมูลที่อยู่ -->
                <div class="col-md-4 my-4">
                    <p class="text-muted">ข้อมูลที่อยู่</p>
                    <div class="form-group">
                        <label for="c_housenumber">บ้านเลขที่</label>
                        <input type="text" name="c_housenumber" id="c_housenumber" class="form-control" placeholder="house number" onchange="edithousenum(this)" required>
                    </div>

                    <div class="form-group">
                        <label for="c_village_num">หมู่ที่</label>
                        <select name="c_village_num" id="c_village_num" class="form-control" onchange="editvilnum(this)" required>
                            <option value="0" disabled hidden selected>-- ตัวเลือก</option>
                            <?php for ($i = 1; $i < 14; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="border rounded p-4 text-center">
                            <small class="text-muted" id="c_address">ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140</small>
                        </div>
                    </div>
                </div>

                <!-- ข้อมูลอาการ -->
                <div class="col-md-4 my-4">
                    <p class="text-muted">ข้อมูลอาการ</p>
                    <div class="form-group">
                        <label for="c_detail">อาการ</label>
                        <textarea name="c_detail" id="c_detail" class="form-control" rows="4" placeholder="symptoms" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="c_note">หมายเหตุ</label>
                        <textarea name="c_note" id="c_note" class="form-control" rows="4" placeholder="note" required></textarea>
                    </div>
                </div>
            </div>

            <!-- กำหนดกักตัว -->
            <p class="text-muted">กำหนดการกักตัว</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="c_start_quarantine">เริ่ม</label>
                        <input type="date" name="c_start_quarantine" id="c_start_quarantine" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="c_end_quarantine">สิ้นสุด</label>
                        <input type="date" name="c_end_quarantine" id="c_end_quarantine" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="mt-3 text-right">
                <button class="btn btn-primary" type="submit">บันทึก</button>
                <button class="btn btn-outline-secondary" type="reset">ยกเลิก</button>
            </div>
        </form>
    </div>
</div>