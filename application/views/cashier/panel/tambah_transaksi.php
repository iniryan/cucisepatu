<div class="content-wrapper">
    <!-- Main content -->
    <section class="content mt-3">
      	<div class="container-fluid">
	        <form id='form-transaksi' method="post">
      			<div class="row">
          			<!-- left column -->
          			<div class="col-md-6">
            			<!-- general form elements -->
            			<div class="card card-primary">
              				<div class="card-header">
                				<h3 class="card-title">Data Diri Customer</h3>
              				</div>
              				<!-- /.card-header -->
                			<div class="card-body">
                  				<div class="form-group">
                    				<label for="customer_name">Nama Customer</label>
                    				<input type="text" class="form-control" name="customer-name" placeholder="Enter Customer Name" required>
                  				</div>
                  				<div class="form-group">
                    				<label for="phone_number">Nomor yang bisa dihubungi</label>
                    				<input type="text" class="form-control" name="phone-number" placeholder="Enter Phone Number" required>
                  				</div>
                  				<div class="form-group">
                    				<label for="address">Alamat</label>
                    				<textarea class="form-control" rows="3" name="address" placeholder="Enter Address"></textarea>
                  				</div>
                			</div>
							<!-- /.card-body -->
                		</div>
						<!-- /.card -->
            		</div>
            		<!-- right column -->
          			<div class="col-md-6">
						<!-- general form elements -->
						<div id='form'>
							<div data-id='1' class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Data Sepatu</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<div class="form-group">
										<label for="brand">Brand Sepatu</label>
										<input type="text" class="form-control" name="brand" placeholder="Enter Shoes Brand" required>
									</div>
									<div class="form-group">
										<label for="color">Warna Sepatu</label>
										<input type="text" class="form-control" name="color" placeholder="Enter Shoes Color" required>
									</div>
									<div class="form-group">
										<label for="size">Ukuran Sepatu</label>
										<input type="text" class="form-control" name="size" placeholder="Enter Shoes Size" required>
									</div>
									<div class="form-group">
										<label for="Type_id">Tipe Sepatu</label>
										<select class="form-control level" name="type-id" style="width: 100%;" required>
											<option value="">-Pilih Tipe Sepatu-</option>
											<?php $type = $this->db->get('cs_type')->result();
											foreach ($type as $key) : ?>
												<option value="<?= $key->type_id;?>"><?= $key->type_name; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="treatment_id">Treatment</label>
										<select class="form-control level" name="treatment-id" style="width: 100%;" required>
											<option value="">-Pilih Treatment-</option>
											<?php $treatment = $this->db->get('cs_treatment')->result();
											foreach ($treatment as $key) : ?>
												<option data-price='<?=$key->price?>' value="<?= $key->treatment_id; ?>"><?= $key->treatment_name; ?> - <?= $key->estimated_time; ?> Hari</option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label for="note">Catatan</label>
										<textarea class="form-control" rows="3" name="note" id="note" placeholder="Enter Note or Description"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="d-flex justify-content-center">
							<button name='add-form' class="btn btn-success btn-lg rounded-circle"><i class="fas fa-plus"></i></button>
						</div>
                  		<!-- <button type="submit" class="btn btn-lg btn-primary float-right">Submit</button> -->
                  		<!-- btn coba lihat rincian pesanan -->
                  		<button type="submit" class="btn py-2 px-4 btn-primary float-right my-4 ">Submit</button>   
						<!-- /.card -->
					</div>
				</div>
			</form>
		</div>
	</section>
</div>