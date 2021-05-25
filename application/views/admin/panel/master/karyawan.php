<div class="content-wrapper">
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-6 mt-3">
                    <!-- search box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <div class="input-group">
                                <input type="text" class="form-control" id="search-karyawan" placeholder="Cari Karyawan" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-0"></div>
                <div class="col-lg-3 col-6 my-lg-3 mb-3">
                    <button class="btn btn-primary p-3" data-toggle="modal" data-target="#modal-karyawan" id="btn-tambah-karyawan">Tambah Karyawan</button>
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
                                <table id="table-karyawan" class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Gunawan</td>
                                            <td><div class="badge badge-light p-2 text-md">Kasir</div></td>
                                            <td><div class="badge badge-light p-2 text-md">Aktif</div></td>
                                            <td><button class="btn btn-danger p-2">Hapus</button>
                                            <button class="btn btn-warning p-2">Block</button>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Irma</td>
                                            <td><div class="badge badge-light p-2 text-md">Kasir</div></td>
                                            <td><div class="badge badge-light p-2 text-md">Aktif</div></td>
                                            <td><button class="btn btn-danger p-2">Hapus</button>
                                            <button class="btn btn-warning p-2">Block</button>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>Darma</td>
                                            <td><div class="badge badge-light p-2 text-md">Kang Cuci</div></td>
                                            <td><div class="badge badge-warning p-2 text-md">Block</div></td>
                                            <td><button class="btn btn-danger p-2">Hapus</button>
                                            <button class="btn btn-primary p-2">Aktifkan</button>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>Hari</td>
                                            <td><div class="badge badge-light p-2 text-md">Kang Cuci</div></td>
                                            <td><div class="badge badge-light p-2 text-md">Aktif</div></td>
                                            <td><button class="btn btn-danger p-2">Hapus</button>
                                            <button class="btn btn-warning p-2">Block</button>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>Mawardi</td>
                                            <td><div class="badge badge-light p-2 text-md">Kang Cuci</div></td>
                                            <td><div class="badge badge-light p-2 text-md">Aktif</div></td>
                                            <td><button class="btn btn-danger p-2">Hapus</button>
                                            <button class="btn btn-warning p-2">Block</button>
                                        </td>
                                        </tr>
                                    </tbody> -->
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = $this->db->get('cs_user');
                                        foreach ($query->result_array() as $row) { 
                                            if ($row['role'] != 1) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td class="text-capitalize"><?= $row['username']; ?></td>
                                            <td><?php $role = $row['role'];
                                                if ($role == 2) echo "<div class='badge badge-light p-2 text-md'>Kasir</div>";
                                                elseif ($role !=2) echo "<div class='badge badge-light p-2 text-md'>Kang Cuci</div>"; ?></td>
                                            <td><?php $status = $row['status'];
                                                if ($status == 1) echo "<div class='badge badge-light p-2 text-md'>Active</div>";
                                                else echo "<div class='badge badge-warning p-2 text-white text-md'>Blocked</div>"; ?></td>                
                                            <td><?php if ($role != 1) { ?>
                                                <?php if ($status !=0) { ?>
                                                    <button data-name='btn-update-status' data-status='0' data-id='<?=$row['user_id']?>' class="btn btn btn-warning p-2 px-3 text-white text-md">Block</button>
                                                <?php } else { ?>
                                                    <button data-name='btn-update-status' data-status='1' data-id='<?=$row['user_id']?>' class="btn btn btn-primary p-2 text-md">Aktifkan</button>
                                                <?php }} ?>
                                                <button data-link='delete_user' data-name='btn-delete' data-id='<?=$row['user_id']?>' class="btn btn-danger p-2 text-md">Hapus</button>
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
        </div>
        <!-- /.container-fluid -->
    </section>    
    <!-- /.content -->
    <!-- modal -->
    <div class="modal fade" id="modal-karyawan">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Akun Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-karyawan">
                        <div class="card-body">
                            <div class="form-group" data-validate = "Username is required!!">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" autocomplete="off" value="<?= set_value('username'); ?>"  placeholder="Enter Username" required>
                                <small class="text-danger m-auto" id="error-username"></small>
                            </div>
                            <div class="form-group" data-validate = "Password is required!!">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                                <small class="text-danger m-auto" id="error-password"></small>
                            </div>  
                            <div class="form-group" data-validate = "Confirm Password is required!!">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input type="password" name="password_confirm" class="form-control" id="password2" placeholder="Enter Confirm Password" required>
                                <small class="text-danger m-auto" id="error-password-confirm"></small>
                            </div>
                            <div class="form-group" data-validate = "Role is required!!">
                                <label for="role">Role</label>
                                <select class="form-control level" name="role" id="role" required>
                                    <option value="">-Pilih Role-</option>
                                    <option value="2">Kasir</option>
                                    <option value="3">Kang Cuci</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between tombol">
                            <button type="button" class="btn btn-default" data-dismiss="modal" >Tutup</button>
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