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
        </div>

        <!-- Case counter -->
        <div class="col-lg-5">
            <div class="bg-light rounded p-3">
                <h4><img src="./assets/image/clipboard.png" class="img-fluid" alt="case counter" draggable="false" width="32"> จำนวนเคสผู้ป่วยสะสม</h4>
                <hr class="">
                <ul class="list-group">
                    <?php for ($i=1; $i<14; $i++){ ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        หมู่ที่ <?= $i; ?>
                        <span class="badge badge-primary badge-pill"><?= number_format($i+1002, 0); ?></span>
                    </li>
                    <?php } ?>        
                </ul>            
            </div>
        </div>
    </div>
</div>