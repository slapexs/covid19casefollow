<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-information-line"></i> ข้อมูลเคสผู้ป่วย</p>
    <hr>

    <div class="bg-light rounded p-3">
        <!-- ข้อมูลทั่วไป -->
        <div class="row">
            <div class="col">
                <p class="text-primary">ข้อมูลทั่วไป</p>
            </div>
            <div class="col-auto"><span class="text-muted">กำหนดกักตัว: </span> <span class="text-info"><?= $rviewcase['c_start_quarantine'] . ' - ' . $rviewcase['c_end_quarantine']; ?></span></div>
        </div>
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

        <div class="mt-4">
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
                </div>
            </div>

        </div>
    </div>

</div>