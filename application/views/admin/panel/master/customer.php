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
                                <input type="text" class="form-control" id="search-customer" placeholder="Cari Customer" />
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
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-customer" class="table table-bordered" style="width: 100%;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center" style="width: 10%">No</th>
                                            <th>Nama Customer</th>
                                            <th>Nomor Telepon</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $this->db->get('cs_customer');
                                        foreach ($query->result_array() as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['customer_name']; ?></td>
                                            <td><?= $row['phone_number']; ?></td>
                                            <td><?= $row['address']; ?></td>                                                              
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>