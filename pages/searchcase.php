<div class="mt-5">
    <h1 class="text-muted"><i class="ri-search-line"></i> ค้นหาด้วย: <?= $keyword; ?></h1>
    <hr>
    <div class="bg-light">
        <div class="table-response">
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr class="text-center align-middle">
                        <th>ID</th>
                        <th>ผู้ป่วย</th>
                        <th>เลขประจำตัวระชาชน</th>
                        <th>หมู่ที่</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                </thead>

                <!-- Default table -->
                <?php if (!isset($villnum)) {  ?>
                    <tbody>
                        <?php while ($rsearchcase = $qsearchcase->fetch()) { ?>
                            <tr>
                                <td><?= $rsearchcase['c_id']; ?></td>
                                <td><?= $rsearchcase['c_fname'] . ' ' . $rsearchcase['c_lname']; ?></td>
                                <td><?= $rsearchcase['c_cardid']; ?></td>
                                <td class="text-center"><?= $rsearchcase['c_village_num']; ?></td>
                                <td class="text-center"><?= $rsearchcase['c_phone']; ?></td>

                                <td class="text-center">
                                    <a href="./?page=viewcase&cid=<?= base64_encode($rsearchcase['c_id']); ?>" class="btn btn-sm btn-info">ดูข้อมูล</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } else if (isset($villnum) && $villnum < 14) { ?>
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