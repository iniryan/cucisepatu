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
                                <input type="text" class="form-control" id="search-history-sepatu" placeholder="Cari Kode Sepatu" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-deepcleandone-tab" data-toggle="pill" href="#pills-deepcleandone" role="tab" aria-controls="pills-deepcleandone" aria-selected="true">Deep Clean</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-fastcleandone-tab" data-toggle="pill" href="#pills-fastcleandone" role="tab" aria-controls="pills-fastcleandone" aria-selected="false">Fast Clean</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-unyellowdone-tab" data-toggle="pill" href="#pills-unyellowdone" role="tab" aria-controls="pills-unyellowdone" aria-selected="false">Unyellow</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-deepcleandone" role="tabpanel" aria-labelledby="pills-deepcleandone-tab">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="width: 100%;" id="table-history-sepatu-dcl">
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
                                                ON shoes.type_id = tipe.type_id');
                                                foreach ($query->result_array() as $row) { 
                                                if ($row['status'] == 4 && $row['treatment_id'] == 1) {?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $row['shoes_code']; ?></td>
                                                    <td><?= $row['brand']; ?></td>
                                                    <td><?= $row['color']; ?></td>
                                                    <td><?= $row['size']; ?></td>
                                                    <td><?= $row['treatment_name']; ?></td>
                                                    <td><?= $row['updated_at']; ?></td>
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
                <div class="tab-pane fade" id="pills-fastcleandone" role="tabpanel" aria-labelledby="pills-fastcleandone-tab">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-history-sepatu-fcl" class="table table-bordered" style="width: 100%;">
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
                                                ON shoes.type_id = tipe.type_id');
                                                foreach ($query->result_array() as $row) { 
                                                if ($row['status'] == 4 && $row['treatment_id'] == 2) {?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $row['shoes_code']; ?></td>
                                                    <td><?= $row['brand']; ?></td>
                                                    <td><?= $row['color']; ?></td>
                                                    <td><?= $row['size']; ?></td>
                                                    <td><?= $row['treatment_name']; ?></td>
                                                    <td><?= $row['updated_at']; ?></td>
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
                <div class="tab-pane fade" id="pills-unyellowdone" role="tabpanel" aria-labelledby="pills-unyellowdone-tab">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table-history-sepatu-unyl" class="table table-bordered" style="width: 100%;">
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
                                                ON shoes.type_id = tipe.type_id');
                                                foreach ($query->result_array() as $row) { 
                                                if ($row['status'] == 4 && $row['treatment_id'] == 3) {?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $row['shoes_code']; ?></td>
                                                    <td><?= $row['brand']; ?></td>
                                                    <td><?= $row['color']; ?></td>
                                                    <td><?= $row['size']; ?></td>
                                                    <td><?= $row['treatment_name']; ?></td>
                                                    <td><?= $row['updated_at']; ?></td>
                                                    <td>
                                                        <button class="btn btn-primary" data-id="<?=$row['detail_transaction_id']?>" data-name='btn-detail-sepatu'><i class="fas fa-eye"></i></button>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- modal -->
    <div class="modal fade" id="timeline-status">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Sepatu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body px-5 py-4">
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
                        </div>
                        <div class="col-6">
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
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>