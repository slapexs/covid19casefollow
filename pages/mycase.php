<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-folder-line"></i> เคสที่รับผิดชอบ</p>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php for ($i = 1; $i < 14; $i++) {
                    // Count case by village number
                    if (isset($smid) && $smrole <= 1) {
                        $cnt = $conn->prepare("SELECT * FROM `cases` WHERE `c_village_num` = :villnum AND `c_ref_docid` = :smid");
                        $cnt->bindParam(':villnum', $i);
                        $cnt->bindParam(':smid', $smid);
                        $cnt->execute();
                        $ccnt = $cnt->rowCount();
                    }
                ?>
                    <a href="./?page=mycase&villnum=<?= $i; ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        หมู่ที่ <?= $i; ?>
                        <span class="text-primary"><?= number_format($ccnt, 0); ?></span>
                    </a>


                <?php } ?>

            </div>
        </div>

        <div class="col-md-9">
            <!-- Download file -->
            <div class="text-right mb-2">
                <button class="btn btn-danger btn-sm" type="button" onclick="downloadmycase('pdf', '<?= $smid; ?>')"><i class="ri-file-pdf-line"></i> ดาวน์โหลดไฟล์ PDF</button>
                <button class="btn btn-success btn-sm" type="button" onclick="downloadmycase('xlsx', '<?= $smid; ?>')"><i class="ri-file-excel-line"></i> ดาวน์โหลดไฟล์ Excel</button>
            </div>
            <div class="bg-light rounded">

                <div class="table-response">
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
                                <?php while ($rmycase = $qmycase->fetch()) { ?>
                                    <tr>
                                        <td><?= $rmycase['c_id']; ?></td>
                                        <td><?= $rmycase['c_fname'] . ' ' . $rmycase['c_lname']; ?></td>
                                        <td><?= $rmycase['c_cardid']; ?></td>
                                        <td class="text-center"><?= $rmycase['c_village_num']; ?></td>
                                        <td class="text-center"><?= $rmycase['c_phone']; ?></td>
                                        <td class="text-center"><?= $casestatus[$rmycase['c_status']]; ?></td>

                                        <td class="text-center">
                                            <a href="./?page=viewcase&cid=<?= base64_encode($rmycase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } else if (isset($villnum) && $villnum < 14) { ?>
                            <tbody>
                                <?php while ($rfindmycase = $qfindmycase->fetch()) { ?>
                                    <tr>
                                        <td><?= $rfindmycase['c_id']; ?></td>
                                        <td><?= $rfindmycase['c_fname'] . ' ' . $rfindmycase['c_lname']; ?></td>
                                        <td><?= $rfindmycase['c_cardid']; ?></td>
                                        <td class="text-center"><?= $rfindmycase['c_village_num']; ?></td>
                                        <td class="text-center"><?= $rfindmycase['c_phone']; ?></td>
                                        <td class="text-center"><?= $casestatus[$rfindmycase['c_status']]; ?></td>
                                        <td class="text-center">
                                            <a href="./?page=viewcase&cid=<?= base64_encode($rfindmycase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
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