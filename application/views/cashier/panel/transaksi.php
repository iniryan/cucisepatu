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
                                <input type="text" class="form-control" id="search-history-transaksi" placeholder="Cari Kode Transaksi" />
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
                                <table id="table-history-transaksi" class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr class="text-center">
                                            <th class="text-center">No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Atas Nama</th>
                                            <th>Kasir</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Status Paid</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $this->db->query('SELECT * FROM cs_transaction 
                                        join cs_user 
                                        on cs_transaction.user_id = cs_user.user_id 
                                        join cs_customer 
                                        on cs_transaction.customer_id = cs_customer.customer_id');

                                        foreach ($query->result_array() as $row) { 
                                            if ($row['status_paid'] < 2 ) {?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['transaction_code']; ?></td>
                                            <td><?= $row['customer_name']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['created_transaction']; ?></td>
                                            <td><div class='btn btn-success p-2 text-md d-block'>Lunas</div>    
                                            </td>   
                                            <td>
                                                <a href="<?= base_url('cashier/detail_transaksi/history/'.$row['transaction_id']); ?>" class="btn btn-primary p-2 d-block"><i class="fas fa-eye"></i></a>
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
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>