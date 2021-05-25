<header class="header">
      <!-- Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-transparent">
        <div class="container-fluid">
          <div class="d-flex align-items-center"><a class="navbar-brand py-1" href="<?= base_url('customer'); ?>"><img src="<?= base_url('assets/adminlte/dist/img/logocs(5).png'); ?>" width="200px" alt="Directory logo"></a>
          </div>
          
        </div>
      </nav>
      <!-- /Navbar -->
    </header>
    <div class="content-wrapper" style="margin-left: 0; ">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="content">
        <div class="container py-5">
            <div class="col-sm-6 my-3">
              <h2 class="m-0 text-dark"><small> Hasil Pencarian :</small><?= $transaction->transaction_code?></h2>
            </div>
            <div class="row">
                <div class="col-12">
      
      
                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="col-12">
                      <img src="<?= base_url('assets/adminlte/dist/img/logocs(5).png'); ?>" width="200px" alt="Directory logo">
                      <?php if ($transaction->status_paid == 1) {?>
                        <button type="button" class="btn btn-success my-2 px-4 float-right">Paid</button>
                      <?php }elseif ($transaction->status_paid == 2) {?>
                        <button type="button" class="btn btn-warning my-2 px-4 float-right">Dp 50%</button>
                      <?php }?>
                    </div>
                    <div class="row py-3 px-3">
                      <div class="col-12 mt-3">
                        <small class="float-left text-sm">
                          Kode Transaksi : <b><h3><?= $transaction->transaction_code?></h3></b>
                        </small>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info px-4">
							          <div class="col-sm-4 invoice-col">
	                            Atas Nama
                            	<address><strong><?=$transaction->customer_name?></strong><br></address>
                          	</div>
                          	<!-- /.col -->
                          	<div class="col-sm-4 invoice-col">
                            Kasir
                          	  <address><strong><?=$transaction->username?></strong></address>
                          	</div>
                          	<div class="col-sm-4 invoice-col">
	                          	Tanggal Transaksi
                          	  	<address><strong><?=$transaction->created_transaction?></strong></address>
                          	  
                          	</div>
							<!-- /.col -->
						</div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    <div class="row px-4">
                      <div class="col-12 table-responsive">
                        <table class="table">
                          <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Kode Sepatu</th>
                              <th>Brand</th>
                              <!-- <th>Color -Size</th> -->
                              <th>Tipe Sepatu</th>
                              <th>Treatment</th>
                              <th>Harga</th>
                              <th>Status</th>
                              <th>Tanggal Update</th>
                              <!-- <th>Detail</th> -->
                          </tr>
                      </thead>
                      <tbody>
                      <?php $no =1;
											foreach($shoes as $item){?>
											<tr class="text-center">
												<td><?=$no++?></td>
												<td><?=$item->shoes_code?></td>
												<td><?=$item->brand?></td>
												<td><?=$item->type_name?></td>
												<td><?=$item->treatment_name.' - '.$item->estimated_time?> Hari</td>
												<td>Rp <?=number_format($item->price,0,',','.');?></td>
												<td>
													<?php if ($item->status == 1) {?>
														<p>Masuk waiting list</p>
													<?php }elseif ($item->status == 2) {?>
														<p>Sedang diproses</p>
													<?php }elseif ($item->status == 3) {?>
														<p>Menunggu Pengambilan</p>
                          <?php }elseif ($item->status == 4) {?>
														<p>Sudah Diambil</p>
													<?php }?>
												</td>
												<td>
                          <?= date('d/m/Y - H:i',strtotime($item->updated_at)) ?>
													<!-- <button class="btn btn-primary" data-id="<?= $item->detail_transaction_id?>" data-name="btn-detail-sepatu"><i class="fas fa-eye"></i></button> -->
												</td>
											</tr>
										<?php }?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <div class="row px-4">
                      
                      <!-- accepted payments column -->
                      <div class="col-8">
                        Catatan
                        <?php foreach($shoes as $i){?>
                          <address class="mt-2 mb-0 mr-5"><p class="text-md"><b><?=$i->note?></b></p></address>
                        <?php }?>
                      </div>
                      <!-- /.col -->                      
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div>
            </div>
            </div>
        <!-- /.row -->
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