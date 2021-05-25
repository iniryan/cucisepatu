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
                                <input type="text" class="form-control" id="search-treatment" placeholder="Cari Treatment" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-0"></div>
                <div class="col-lg-3 col-6 my-lg-3 mb-3">
                    <button class="btn btn-primary p-3" data-toggle="modal" data-target="#modal-treatment" id="btn-tambahTreatment">Tambah Treatment</button>
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
                                <table id="table-treatment" class="table table-bordered" style="width: 100%;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Treatment</th>
                                            <th>Price</th>
                                            <th>Estimated Time</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $this->db->get('cs_treatment');
                                        foreach ($query->result_array() as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['treatment_name']; ?></td>
                                            <td>Rp.<?= number_format($row['price'], 0, ',', '.') ?></td>
                                            <td><?= $row['estimated_time']; ?> Hari</td>
                                            <td>
                                                <button data-link='delete_treatment' data-name='btn-delete' data-id='<?= $row['treatment_id']; ?>' class="btn btn-danger p-2 text-md">Hapus</button>
                                            </td>                                                                
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
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- modal -->
    <div class="modal fade" id="modal-treatment">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Treatment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form-treatment">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="treatment_name">Nama Treatment</label>
                                <input type="text" name="treatment-name" class="form-control" id="treatment_name" autocomplete="off" placeholder="Enter Here" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" min='0' name="price" class="form-control" id="price" placeholder="Rp" required>
                            </div>
                            <div class="form-group">
                                <label for="estimated_time">Estimated Time</label>
                                <input type="text" name="estimated-time" class="form-control" id="estimated_time" placeholder="Hari" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between tombol">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="submit">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
