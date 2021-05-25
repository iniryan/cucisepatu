<div class="content-wrapper">
  	<section class="content">
      	<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Main content -->
					<div class="invoice mt-3 p-3 mb-3">
						<!-- title row -->
						<div class="row py-3 px-3">
							<div class="col-8">
								<small class="float-left text-sm">
								Kode Transaksi : <b><h3 data-invoice='id'><?=$transaction->transaction_code?></h3></b>
								</small>
							</div>
							<div class="col-4">
								<?php if ($transaction->status_paid == 1) {?>
									<button type="button" class="btn btn-success my-2 px-4 float-right">Paid</button>
								<?php }elseif ($transaction->status_paid == 2) {?>
									<button type="button" class="btn btn-warning my-2 px-4 float-right">Dp 50%</button>
								<?php }?>
						  	</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info px-4">
							<div class="col-sm-4 invoice-col">
	                            Atas Nama
                            	<address><strong><?=$transaction->customer_name?></strong><br></address>
                            	Nomor yang bisa dihubungi
                            	<address><strong><?=$transaction->phone_number?></strong></address>
                          	</div>
                          	<!-- /.col -->
                          	<div class="col-sm-4 invoice-col">
                          	  	Alamat
                          	  	<address><strong><?=$transaction->address?><br></strong></address>
                          	</div>
                          	<div class="col-sm-4 invoice-col">
	                          	Tanggal Transaksi
                          	  	<address><strong><?=$transaction->created_transaction?></strong></address>
                          	  	Kasir
                          	  	<address><strong><?=$transaction->username?></strong></address>
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
											<th>Tipe Sepatu</th>
											<th>Treatment</th>
											<th>Harga</th>
											<th>Status</th>
											<th>Detail</th>
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
												<td><?=$item->treatment_name?></td>
												<td>Rp <?=number_format($item->price,0,',','.');?></td>
												<td>
													<?php if ($item->status == 1) {?>
														<div class="progress progress-sm">
															<div class="progress-bar bg-light" role="progressbar" aria-volumenow="0" aria-volumemin="0" aria-volumemax="100" style="width: 0%">
															</div>
														</div>
														<small>Masuk waiting list</small>
													<?php }elseif ($item->status == 2) {?>
														<div class="progress progress-sm">
															<div class="progress-bar bg-warning" role="progressbar" aria-volumenow="50" aria-volumemin="0" aria-volumemax="100" style="width: 50%">
															</div>
														</div>
														<small>Sedang diproses</small>
													<?php }elseif ($item->status == 3) {?>
														<div class="progress progress-sm">
															<div class="progress-bar bg-success" role="progressbar" aria-volumenow="75" aria-volumemin="0" aria-volumemax="100" style="width: 75%">
															</div>
														</div>
														<small>Menunggu Pengambilan</small>
													<?php }else{?>
														<div class="progress progress-sm">
															<div class="progress-bar bg-primary" role="progressbar" aria-volumenow="100" aria-volumemin="0" aria-volumemax="100" style="width: 100%">
															</div>
														</div>
														<small>Sudah Diambil Customer</small>
													<?php

													}?>
												</td>
												<td>
													<button class="btn btn-primary" data-id="<?= $item->detail_transaction_id?>" data-name="btn-detail-sepatu"><i class="fas fa-eye"></i></button>
												</td>
											</tr>
										<?php }?>
                              		</tbody>
								</table>
							</div>
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
								<input type="hidden" name="metode" value='1'>
							</div>
							<!-- /.col -->
							<div class="container" id="kolom-pembayaran">
							<div class="col-4">
								<h6><b>Total Dibayar</b></h6>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp </span>
									</div>
									<input data-invoice='total' type="text" class="form-control" value="<?= $transaction->total ?>" readonly>
									<input data-invoice='total-hidden' type="hidden" class="form-control" value="<?= $transaction->total ?>" readonly>
								</div>
								<h6><b>Bayar</b></h6>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
									</div>
									<input data-invoice='bayar' type="number" class="form-control" placeholder="" required>
								</div>
								<h6><b>Kembalian</b></h6>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
									</div>
									<input data-invoice='kembalian' type="text" class="form-control" placeholder="" readonly>
								</div>
							</div>
							</div>
						</div>
						<!-- /.row -->
						<div class="row no-print my-3 mr-2">
							<div class="col-12">
								<button data-name='btn-bayar' type="button" disabled='disabled' class="btn btn-success float-right py-2 px-4"><i class="far fa-credit-card"></i> &nbsp; SubmitPayment</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	
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