<div class="mt-5">
    <p class="display-4 text-muted"><i class="ri-list-ordered"></i> เคสผู้ป่วยทั้งหมด</p>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <?php for ($i = 1; $i < 14; $i++) {
                    // Count case by village number
                    if (isset($smid) && $smrole == 1) {
                        $cnt = $conn->prepare("SELECT * FROM `cases` WHERE `c_village_num` = :villnum");
                        $cnt->bindParam(':villnum', $i);
                        $cnt->execute();
                        $ccnt = $cnt->rowCount();
                    }
                ?>

                    <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        หมู่ที่ <?= $i; ?>
                        <span class="text-primary"><?= number_format($ccnt, 0); ?></span>
                    </button>

                <?php } ?>

            </div>
        </div>

        <div class="col-md-9">
            <div class="bg-light rounded">
                <div class="table-response">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr class="text-center align-middle">
                                <th>ID</th>
                                <th>ผู้ป่วย</th>
                                <th>เลขประจำตัวระชาชน</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>เพิ่มเติม</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($rallcase = $qallcase->fetch()) { ?>
                                <tr>
                                    <td class="text-center"><?= $rallcase['c_id']; ?></td>
                                    <td><?= $rallcase['c_fname'] . ' ' . $rallcase['c_lname']; ?></td>
                                    <td><?= $rallcase['c_cardid']; ?></td>
                                    <td><?= $rallcase['c_phone']; ?></td>

                                    <td class="text-center">
                                        <a href="./?page=viewcase&cid=<?= base64_encode($rallcase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>