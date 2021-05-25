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
                                <input type="text" class="form-control" id="search-tipesepatu" placeholder="Cari Tipe Sepatu" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-0"></div>
                <div class="col-lg-3 col-6 my-lg-3 mb-3">          
                    <button class="btn btn-primary p-3" data-toggle="modal" data-target="#modal-tipesepatu" id="btn-Tipesepatu">Tambah Tipe Sepatu</button>
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
                                <table id="table-tipe" class="table table-bordered" style="width: 100%;">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center" style="width: 10%">No</th>
                                            <th>Tipe Sepatu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $this->db->get('cs_type');
                                        foreach ($query->result_array() as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $row['type_name']; ?></td>
                                            <td>
                                                <button data-link="delete_tipesepatu" data-name="btn-delete" data-id="<?=$row['type_id'];?>" class="btn btn-danger p-2 text-md">Hapus</button>
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
    <!-- /.content -->
    <!-- modal -->
    <div class="modal fade" id="modal-tipesepatu">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tipe Sepatu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tipesepatu">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="type-name">Nama Tipe Sepatu</label>
                                <input type="text" name="type-name" class="form-control" id="type_name" autocomplete="off" placeholder="Enter Here" required>
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