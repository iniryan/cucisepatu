<div class="content-wrapper">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Main content -->
					<div class="invoice mt-3 p-3 mb-3">
						<!-- title row -->
						<div class="row py-3 px-4">						
							<div class="col-12 mt-3">
								<small class="float-left text-sm">
									Kode Transaksi : <b><h3 data-invoice="id"><?=$transaction->transaction_code?></h3></b>
								</small>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info px-4">
							<!-- /.col -->
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
										<tr>
											<th>No</th>
											<th>Kode Sepatu</th>
											<th>Brand</th>
											<th>Color - Size</th>
											<th>Tipe Sepatu</th>
											<th>Treatment</th>
											<th>Estimated Time</th>
											<th>Harga</th>
										</tr>
									</thead>
									<tbody>
									<?php $no =1;
											foreach($shoes as $item){?>
											<tr class="text-center">
												<td><?=$no++?></td>
												<td><?=$item->shoes_code?></td>
												<td><?=$item->brand?></td>
												<td><?=$item->color.' - '.$item->size?> </td>
												<td><?=$item->type_name?></td>
												<td><?=$item->treatment_name?></td>
												<td><?=$item->estimated_time?> Hari</td>
												<td>Rp <?=number_format($item->price,0,',','.');?></td>
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
								<p class="lead">Metode Pembayaran</p>
								<select class="form-control" name="metode" style="width: 40%;" required>
									<option value="">Pilih Tipe Pembayaran</option>
									<option value="2">DP 50%</option>
									<option value="1">Bayar Penuh</option>
								</select> 
								<div class="form-check mt-2">
									<input class="form-check-input" type="checkbox" value="1" id="delivery" name="delivery">
									<label class="form-check-label" for="delivery">
										Delivery
									</label>
								</div>
								
							</div>
							<!-- /.col -->
							<div class="col-4">
							<h6><b>Total Dibayar</b></h6>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp</span>
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
						<!-- /.row -->
						<!-- this row will not appear when printing -->
						<div class="row no-print my-3 mr-2">
							<div class="col-12">
								<button data-name='btn-bayar' type="button" disabled='disabled' class="btn btn-success float-right py-2 px-4"><i class="far fa-credit-card"></i> &nbsp; SubmitPayment</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
    </section>
</div>