<div class="content-wrapper">
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-12 mt-3">
                <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-sepatu" placeholder="Cari Kode Sepatu"/>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- ./col -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-deepclean-tab" data-toggle="pill" href="#pills-deepclean" role="tab" aria-controls="pills-deepclean" aria-selected="true">Deep Clean</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-fastclean-tab" data-toggle="pill" href="#pills-fastclean" role="tab" aria-controls="pills-fastclean" aria-selected="false">Fast Clean</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-unyellow-tab" data-toggle="pill" href="#pills-unyellow" role="tab" aria-controls="pills-unyellow" aria-selected="false">Unyellow</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-deepclean" role="tabpanel" aria-labelledby="pills-deepclean-tab">
                            <!-- Main row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="table-sepatu-dcl" class="table table-bordered" style="width: 100%;">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Sepatu</th>
                                                            <th>Brand</th>
                                                            <th>Tipe Sepatu</th>
                                                            <th>Treatment</th>
                                                            <th>Deadline</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $query = $this->db->query('SELECT * FROM cs_detail_transaction AS detail
                                                        JOIN cs_shoes AS shoes
                                                        ON detail.shoes_id = shoes.shoes_id
                                                        JOIN cs_treatment AS treatment
                                                        ON detail.treatment_id = treatment.treatment_id
                                                        JOIN cs_type AS tipe
                                                        ON shoes.type_id = tipe.type_id
                                                        WHERE shoes.status != 4');
                                                        foreach ($query->result_array() as $row) { 
                                                        if ($row['treatment_id'] == 1) {?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $row['shoes_code']; ?></td>
                                                            <td><?= $row['brand']; ?></td>
                                                            <td><?= $row['type_name']; ?></td>
                                                            <td><?= $row['treatment_name']; ?></td>
                                                            <td><?= $row['estimated_time']; ?> Hari</td>
                                                            <td>
                                                                <?php if ($row['status'] == 1) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-light" role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100" style="width: 0%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Masuk waiting list</small>
                                                                <?php }elseif ($row['status'] == 2) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-warning" role="progressbar" aria-volumenow="50" aria-volumemin="0" aria-volumemax="100" style="width: 50%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Sedang diproses</small>
                                                                <?php }elseif ($row['status'] == 3) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-volumenow="75" aria-volumemin="0" aria-volumemax="100" style="width: 75%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Menunggu Pengambilan</small>
                                                                <?php }?>
                                                            </td>
                                                            <td>                                                        
                                                                <button class="btn btn-primary" data-id="<?= $row['detail_transaction_id']?>" data-name="btn-detail-sepatu"><i class="fas fa-eye"></i></button>
                                                            </td>                                                                 
                                                        </tr>
                                                    <?php }}?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (main row) -->
                        </div>  
                        <div class="tab-pane fade" id="pills-fastclean" role="tabpanel" aria-labelledby="pills-fastclean-tab">
                            <!-- Main row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="table-sepatu-fcl" class="table table-bordered" style="width: 100%;">
                                                    <thead class="bg-light">
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Kode Sepatu</th>
                                                            <th>Brand</th>
                                                            <th>Tipe Sepatu</th>
                                                            <th>Treatment</th>
                                                            <th>Estimated Time</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $query = $this->db->query('SELECT * FROM cs_detail_transaction AS detail
                                                        JOIN cs_shoes AS shoes
                                                        ON detail.shoes_id = shoes.shoes_id
                                                        JOIN cs_treatment AS treatment
                                                        ON detail.treatment_id = treatment.treatment_id
                                                        JOIN cs_type AS tipe
                                                        ON shoes.type_id = tipe.type_id
                                                        WHERE shoes.status != 4');
                                                        foreach ($query->result_array() as $row) { 
                                                        if ($row['treatment_id'] == 2) {?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $row['shoes_code']; ?></td>
                                                            <td><?= $row['brand']; ?></td>
                                                            <td><?= $row['type_name']; ?></td>
                                                            <td><?= $row['treatment_name']; ?></td>
                                                            <td><?= $row['estimated_time']; ?> Hari</td>
                                                            <td>
                                                                <?php if ($row['status'] == 1) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-light" role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100" style="width: 0%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Masuk waiting list</small>
                                                                <?php }elseif ($row['status'] == 2) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-warning" role="progressbar" aria-volumenow="50" aria-volumemin="0" aria-volumemax="100" style="width: 50%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Sedang diproses</small>
                                                                <?php }elseif ($row['status'] == 3) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-volumenow="75" aria-volumemin="0" aria-volumemax="100" style="width: 75%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Menunggu Pengambilan</small>
                                                                <?php }?>
                                                            </td>
                                                            <td>                                                        
                                                                <button class="btn btn-primary" data-id="<?= $row['detail_transaction_id']?>" data-name="btn-detail-sepatu"><i class="fas fa-eye"></i></button>
                                                            </td>                                                                 
                                                        </tr>
                                                    <?php } }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <!-- /.row (main row) -->
                        </div>
                        <div class="tab-pane fade" id="pills-unyellow" role="tabpanel" aria-labelledby="pills-unyellow-tab">
                            <!-- Main row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="table-sepatu-unyl" class="table table-bordered" style="width: 100%;">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Sepatu</th>
                                                            <th>Brand</th>
                                                            <th>Tipe Sepatu</th>
                                                            <th>Treatment</th>
                                                            <th>Estimated Time</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        $query = $this->db->query('SELECT * FROM cs_detail_transaction AS detail
                                                        JOIN cs_shoes AS shoes
                                                        ON detail.shoes_id = shoes.shoes_id
                                                        JOIN cs_treatment AS treatment
                                                        ON detail.treatment_id = treatment.treatment_id
                                                        JOIN cs_type AS tipe
                                                        ON shoes.type_id = tipe.type_id
                                                        WHERE shoes.status != 4');
                                                        foreach ($query->result_array() as $row) { 
                                                        if ($row['treatment_id'] == 3) {?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $row['shoes_code']; ?></td>
                                                            <td><?= $row['brand']; ?></td>
                                                            <td><?= $row['type_name']; ?></td>
                                                            <td><?= $row['treatment_name']; ?></td>
                                                            <td><?= $row['estimated_time']; ?> Hari</td>
                                                            <td>
                                                                <?php if ($row['status'] == 1) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-light" role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100" style="width: 0%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Masuk waiting list</small>
                                                                <?php }elseif ($row['status'] == 2) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-warning" role="progressbar" aria-volumenow="50" aria-volumemin="0" aria-volumemax="100" style="width: 50%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Sedang diproses</small>
                                                                <?php }elseif ($row['status'] == 3) {?>
                                                                    <div class="progress progress-sm">
                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-volumenow="75" aria-volumemin="0" aria-volumemax="100" style="width: 75%">
                                                                        </div>
                                                                    </div>
                                                                    <small>Menunggu Pengambilan</small>
                                                                <?php }?>
                                                            </td>
                                                            <td>                                                        
                                                                <button class="btn btn-primary" data-id="<?= $row['detail_transaction_id']?>" data-name='btn-detail-sepatu'><i class="fas fa-eye"></i></button>
                                                            </td>                                                                 
                                                        </tr>
                                                    <?php }}?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (main row) -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- modal -->
    <div class="modal fade" id="timeline-status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Sepatu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-4">
                                <div>Kode Sepatu</div>
                                <h2><b data-sepatu="kode"></b></h2>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div>Brand</div>
                                    <p><b data-sepatu="brand"></b></p>
                                </div>
                                <div class="col-6">
                                    <div>Color</div>
                                    <p><b data-sepatu="warna"></b></p>
                                </div>
                                <div class="col-2">
                                    <div>Size</div>
                                    <p><b data-sepatu="size"></b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div>Tipe Sepatu</div>
                                    <p><b data-sepatu="tipe"></b></p>
                                </div>
                                <div class="col-6">
                                    <div>Treatment</div>
                                    <p><b data-sepatu="treatment"></b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div>Catatan :</div>
                                    <p><i data-sepatu="note"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- The time line -->
                            <div class="timeline" data-timeline='timeline'>
                                <div data-status='1'></div>
                                <div data-status='2'></div>
                                <div data-status='3'></div>
                                <div data-status='4'></div>
                            </div>
                        </div>
                    <!-- /.col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-update" class="btn btn-md float-right text-bold"> Ubah Status</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>  
    <!-- /.modal -->
</div>
