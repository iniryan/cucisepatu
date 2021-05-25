<div class="content-wrapper">
    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $this->db->where('status_paid', '1')->from('cs_transaction');echo $this->db->count_all_results(); ?></h3>
                <p>Transaksi Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 mt-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $this->db->count_all('cs_shoes'); ?></h3>
                <p>Sepatu Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-6 col-12 mt-3">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari_kode" id="search-transaksi" placeholder="Cari Kode Transaksi" />
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
                    <table id="table-transaksi" class="table table-bordered" style="width: 100%;">
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
                                JOIN cs_user 
                                ON cs_transaction.user_id = cs_user.user_id 
                                JOIN cs_customer 
                                on cs_transaction.customer_id = cs_customer.customer_id');
                                foreach ($query->result_array() as $row) { 
                                    if($row['status_paid'] != 1 ) {?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $row['transaction_code']; ?></td>
                                    <td><?= $row['customer_name']; ?></td>
                                    <td><?= $row['username']; ?></td>
                                    <td><?= $row['created_transaction']; ?></td>
                                    <td>
                                        <?php $status_paid = $row['status_paid'];
                                            if ($status_paid < 2) 
                                              {echo "<div class='btn btn-success p-2 text-md d-block'>Lunas</div>";}
                                            elseif ($status_paid == 2){
                                              echo "<div class='btn btn-warning p-2 text-md d-block'>50%</div>";
                                            }
                                        ?>
                                    </td>   
                                    <td>
                                        <a class="btn btn-primary py-2" href="<?= base_url('admin/detail_transaksi/transaksi/') . $row['transaction_id']; ?>"><i class="fas fa-eye"></i></a>
                                    </td>                                                                 
                                </tr>
                                <?php }} ?>
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