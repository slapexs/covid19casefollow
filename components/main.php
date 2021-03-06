<div class="mt-5">
    <div class="row">
        <!-- Phrae covid19 stat -->
        <div class="col-lg-7">
            <div class="bg-light rounded p-3">
                <h4><img src="./assets/image/mask.png" class="img-fluid" alt="human-virus" draggable="false" width="32"> สถิติผู้ติดเชื้อในจังหวัดแพร่</h4>
                <hr class="mb-0">
                <div class="row">
                    <div class="col-md-6 px-2">
                        <div class="badge-newcase text-center mt-3 p-4 rounded">
                            <h3 id="stat-newcase">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </h3>
                            <p class="mb-0">ผู้ติดเชื้อรายใหม่วันนี้</p>
                        </div>
                    </div>

                    <div class="col-md-6 px-2">
                        <div class="badge-totalcase text-center mt-3 p-4 rounded">
                            <h3 id="stat-totalcase">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </h3>
                            <p class="mb-0">ผู้ติดเชื้อสะสม</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6 px-2">
                        <div class="badge-newdeath text-center mt-3 p-4 rounded">
                            <h3 id="stat-newdeath">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </h3>
                            <p class="mb-0">ผู้เสียชีวิตวันนี้</p>
                        </div>
                    </div>

                    <div class="col-md-6 px-2">
                        <div class="badge-totaldeath text-center mt-3 p-4 rounded">
                            <h3 id="stat-totaldeath">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </h3>
                            <p class="mb-0">ผู้เสียชีวิตสะสม</p>
                        </div>
                    </div>
                </div>

                <div class="mt-2 text-center">
                    <small class="text-muted">ข้อมูลล่าสุด: กรมควบคุมโรค
                        <span id="date-update">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span></small>
                </div>

            </div>

            <!-- End of quarantine -->

            <div class="card mt-3 shadow mb-md-3">
                <div class="card-body">
                    <h5><img src="./assets/image/search.png" class="img-fluid" alt="case search" draggable="false" width="32"> ค้นหาเคสผู้ป่วย</h5>
                    <hr>

                    <form action="" id="formcasesearch">
                        <div class="form-group row">
                            <div class="col">
                            <input type="text" name="searchcase_name" id="searchcase_name" class="form-control" placeholder="ค้นหาด้วยเลขประจำตัวประชาชน" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary" type="submit">ค้นหา</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Case counter -->
        <div class="col-lg-5">
            <div class="bg-light rounded p-3">
                <h4><img src="./assets/image/clipboard.png" class="img-fluid" alt="case counter" draggable="false" width="32"> จำนวนเคสผู้ป่วยสะสม</h4>
                <hr class="">
                <div class="list-group">
                    <?php for ($i = 1; $i < 14; $i++) {
                        $cntcase = "SELECT * FROM `cases` WHERE `c_village_num` = :villnum";
                        $qcntcase = $conn->prepare($cntcase);
                        $qcntcase->bindParam(':villnum', $i);
                        $qcntcase->execute();
                        $rcntcase = $qcntcase->rowCount();
                    ?>
                        <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="viewcasebyvillnum('<?= $i; ?>')">
                            หมู่ที่ <?= $i; ?>
                            <span class="text-primary"><?= number_format($rcntcase, 0); ?></span>
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>