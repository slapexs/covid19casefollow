<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-information-line"></i> ข้อมูลเคสผู้ป่วย</p>
    <hr>

    <!-- if status case is 2 -->
    <?php if ($rviewcase['c_status'] == 2) { ?>
        <div class="row mb-2">
            <div class="col-lg-4 ml-auto">
                <div class="card">
                    <div class="card-body ">
                        <p>รับเคสผู้ป่วย</p>
                        <?php if ($rviewcase['c_ref_docid'] == $smid) { ?>
                            <button class="btn btn-primary btn-lg btn-block" type="button" onclick="getcase('<?= $rviewcase['c_id']; ?>', '<?= $rviewcase['c_ref_docid']; ?>', '<?= $smid; ?>')">รับเคส</button>
                        <?php } else { ?>
                            <button class="btn btn-primary btn-lg btn-block disabled" type="button" disabled>ไม่สามารถรับเคสได้</button>
                            <small class="text-danger">เนื่องจากที่อยู่ผู้ป่วยอยู่นอกการรับผิดชอบ</small>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Case action -->
    <div class="row mb-3">
        <div class="col-md-5">
            <?php if ($rviewcase['c_status'] != 2) {
                if ($rviewcase['c_ref_docid'] == $smid) {

            ?>
            <div class="card">
                <div class="card-body">
                    <h5>แก้ไขสถานะเคสผู้ป่วย</h5>
                    <form action="" id="updatecase">
                        <input type="hidden" name="c_update_id" id="c_update_id" value="<?= $rviewcase['c_id']; ?>" class="form-control" readonly required>
                        <div class="form-row">
                            <div class="col">
                                <select name="c_update_status" id="c_update_status" class="form-control" required>
                                    <option value="0">กำลังรักษา</option>
                                    <option value="1">รักษาหายแล้ว</option>
                                    <option value="3">เสียชีวิต</option>
                                </select>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-primary" type="submit">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        <div class="col-md-auto">
            <div class="card">
                <div class="card-body">
                    <h5>แก้ไขเคสผู้ป่วย</h5>
                    <button class="btn btn-warning btn-sm" type="button" onclick="editcase('<?= $rviewcase['c_id']; ?>')">แก้ไขข้อมูล</button>
                    <button class="btn btn-outline-secondary btn-sm" type="button" onclick="deletecase('<?= $rviewcase['c_id']; ?>', '<?= $smid; ?>')">ลบเคสผู้ป่วย</button>
                </div>
            </div>
        </div>

        <?php }
            } ?>
    </div>

    <div class="bg-light rounded p-3">
        <!-- ข้อมูลทั่วไป -->
        <p class="text-primary">ข้อมูลทั่วไป</p>
        <div class="row">
            <div class="col-md">
                <p class="mb-0"><span class="text-muted">รหัสเคสผู้ป่วย:</span> &emsp; <span><?= $rviewcase['c_id']; ?></span></p>
            </div>
            <div class="col-md">
                <p class="mb-0"><span class="text-muted">แพทย์เจ้าของเคส:</span> &emsp; <?= $rviewcase['m_fname'] . ' ' . $rviewcase['m_lname']; ?></p>
            </div>
            <div class="col-md">
                <p class="mb-0"><span class="text-muted">วันที่ลงข้อมูล:</span> &emsp; <?= $rviewcase['c_timestamp']; ?></p>
            </div>
        </div>

        <div class="mt-5">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-primary">ข้อมูลผู้ป่วย</p>
                    <p class="mb-1"><span class="text-muted">ชื่อ-สกุล:</span> &emsp; <?= $rviewcase['c_fname'] . ' ' . $rviewcase['c_lname']; ?></p>
                    <p class="mb-1"><span class="text-muted">เลขประจำตัวประชาชน:</span> &emsp; <?= $rviewcase['c_cardid']; ?></p>
                    <p class="mb-1"><span class="text-muted">เบอร์โทรศัพท์:</span> &emsp; <?= $rviewcase['c_phone']; ?></p>
                    <p class="mb-1"><span class="text-muted">ที่อยู่: </span><?= $rviewcase['c_address']; ?></p>
                    <p class="mb-1"><span class="text-muted">สถานะ: </span><?= $casestatus[$rviewcase['c_status']]; ?></p>
                </div>

                <div class="col-md-6">
                    <p class="text-primary">ข้อมูลอาการ</p>
                    <p class="mb-4"><?= $rviewcase['c_detail']; ?></p>
                    <p class="text-primary">หมายเหตุ</p>
                    <p><?= $rviewcase['c_note']; ?></p>
                    <p class="text-primary">กำหนดกักตัว</p>
                    <p><?= $rviewcase['c_start_quarantine'] . ' - ' . $rviewcase['c_end_quarantine']; ?></p>
                </div>
            </div>

        </div>
    </div>

</div>