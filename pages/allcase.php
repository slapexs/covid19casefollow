<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-list-ordered"></i> เคสผู้ป่วยทั้งหมด</p>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php for ($i = 1; $i < 14; $i++) {
                    // Count case by village number
                    if (isset($smid)) {
                        $cnt = $conn->prepare("SELECT * FROM `cases` WHERE `c_village_num` = :villnum");
                        $cnt->bindParam(':villnum', $i);
                        $cnt->execute();
                        $ccnt = $cnt->rowCount();
                    }
                ?>

                    <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="viewcasebyvillnum('<?= $i; ?>')">
                        หมู่ที่ <?= $i; ?>
                        <span class="text-primary"><?= number_format($ccnt, 0); ?></span>
                    </button>

                <?php } ?>

            </div>
        </div>

        <div class="col-md-9">
            <!-- Download file -->
            <?php if (!isset($villnum)){ ?>
            <div class="text-right mb-2">
                <button class="btn btn-danger btn-sm" type="button" onclick="downloadallcase('pdf')"><i class="ri-file-pdf-line"></i> ดาวน์โหลดไฟล์ PDF</button>
                <button class="btn btn-success btn-sm" type="button" onclick="downloadallcase('xlsx')"><i class="ri-file-excel-line"></i> ดาวน์โหลดไฟล์ Excel</button>
            </div>
            <?php } ?>
            <div class="bg-light rounded">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr class="text-center align-middle">
                                <th>ID</th>
                                <th>ผู้ป่วย</th>
                                <th>เลขประจำตัวระชาชน</th>
                                <th>หมู่ที่</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>สถานะ</th>
                                <th>เพิ่มเติม</th>
                            </tr>
                        </thead>

                        <!-- Default table -->
                        <?php if (!isset($villnum)) {  ?>
                            <tbody>
                                <?php while ($rallcase = $qallcase->fetch()) { ?>
                                    <tr>
                                        <td><?= $rallcase['c_id']; ?></td>
                                        <td><?= $rallcase['c_fname'] . ' ' . $rallcase['c_lname']; ?></td>
                                        <td><?= $rallcase['c_cardid']; ?></td>
                                        <td class="text-center"><?= $rallcase['c_village_num']; ?></td>
                                        <td class="text-center"><?= $rallcase['c_phone']; ?></td>
                                        <td class="text-center"><?= $casestatus[$rallcase['c_status']]; ?></td>

                                        <td class="text-center">
                                            <a href="./?page=viewcase&cid=<?= base64_encode($rallcase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } else if (isset($villnum) && $villnum < 14){ ?>
                            <tbody>
                                <?php while ($rfindcase = $qfindcase->fetch()) { ?>
                                    <tr>
                                        <td><?= $rfindcase['c_id']; ?></td>
                                        <td><?= $rfindcase['c_fname'] . ' ' . $rfindcase['c_lname']; ?></td>
                                        <td><?= $rfindcase['c_cardid']; ?></td>
                                        <td class="text-center"><?= $rfindcase['c_village_num']; ?></td>
                                        <td class="text-center"><?= $rfindcase['c_phone']; ?></td>

                                        <td class="text-center">
                                            <a href="./?page=viewcase&cid=<?= base64_encode($rfindcase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>