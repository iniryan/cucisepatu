<footer class="main-footer">
    <strong>Copyright &copy; 2020</strong>
</footer>  

<!-- jQuery -->
<!-- <script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>adminlte/dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(document).ready(function() {
    var tbl_history_transaksi = $("#table-history-transaksi").DataTable({"sDom": 'ltrip',"lengthChange": false,});      
    var tbl_transaksi = $("#table-transaksi").DataTable({"sDom": 'ltrip',"lengthChange": false,});      

    $('#search-history-transaksi').on( 'keyup', function () {
            tbl_history_transaksi.search( this.value ).draw();
        });
    $('#search-transaksi').on( 'keyup', function () {
        tbl_transaksi.search( this.value ).draw();
    });

    $(`button[data-name='btn-detail-sepatu']`).on('click', function() {
        const id = $(this).data('id');
        const status1 = `<i class="fas fa-clock bg-gray"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah masuk ke waiting list.</h3>`;
        const status2 = `<i class="fa fa-spinner bg-yellow"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu sedang diproses oleh Kang Cuci.</h3>`;
        const status3 = `<i class="fas fa-check bg-green"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah selesai dicuci, menunggu pengambilan.</h3>`;
        const status4 = `<i class="fas fa-check bg-blue"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah diambil oleh Customer</h3>`;
        const status5 = `<i class="fas fa-check bg-blue"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah diantar ke Customer</h3>`;
        
        $.ajax({
            url: "<?= base_url('cashier/detail_sepatu'); ?>",
            type: 'POST',
            data: {id},
        }).then(res=>{
            const result = JSON.parse(res);
            const time = result.data[0].updated_at;
            console.log(result);
            if (result.success) {
                $(`[data-sepatu='kode']`).text(`${result.data[0].shoes_code}`);
                $(`[data-sepatu='brand']`).text(`${result.data[0].brand}`);
                $(`[data-sepatu='warna']`).text(`${result.data[0].color}`);
                $(`[data-sepatu='size']`).text(`${result.data[0].size}`);
                $(`[data-sepatu='tipe']`).text(`${result.data[0].type_name}`);
                $(`[data-sepatu='treatment']`).text(`${result.data[0].treatment_name}`);
                $(`[data-sepatu='note']`).text(`${result.data[0].note}`);
                if (result.data[0].status <= 2) {
                    $(`[data-status='1']`).empty();
                    $(`[data-status='2']`).empty();
                    $(`[data-status='3']`).empty();
                    $(`[data-status='4']`).empty();
                    if (result.data[0].status <= 1) {
                        $(`[data-status='1']`).html(`${status1}<span class="time" style='float:none;'><i class="fas fa-clock"></i> ${time}</span></div>`);
                        $(`[data-status='2']`).empty();
                        $(`[data-status='3']`).empty();
                        $(`[data-status='4']`).empty();
                        $('#btn-update').removeClass('btn-primary, btn-success');
                        $('#btn-update').addClass('btn-warning');
                        $('#btn-update').html('Proses Sepatu');
                    }else{
                        $(`[data-status='1']`).html(`${status1}</div>`);
                        $(`[data-status='2']`).html(`${status2}<span class="time" style='float:none;'><i class="fas fa-clock"></i> ${time}</span></div>`);
                        $(`[data-status='3']`).empty();
                        $(`[data-status='4']`).empty();
                        $('#btn-update').removeClass('btn-warning, btn-primary');
                        $('#btn-update').addClass('btn-success');
                        $('#btn-update').html('Proses Sepatu Selesai');
                    }
                }else{
                    if (result.data[0].status <= 3) {
                        $(`[data-status='1']`).html(`${status1}</div>`);
                        $(`[data-status='2']`).html(`${status2}</div>`);
                        $(`[data-status='3']`).html(`${status3}<span class="time" style='float:none;'><i class="fas fa-clock"></i> ${time}</span></div>`);
                        $('#btn-update').removeClass('btn-success, btn-warning');
                        $('#btn-update').addClass('btn-primary');
                        result.data[0].delivery==1?$('#btn-update').html('Sepatu Telah Diambil'):$('#btn-update').html('Sepatu Telah Diantar');
                    }else{
                        $(`[data-status='1']`).html(`${status1}</div>`);
                        $(`[data-status='2']`).html(`${status2}</div>`);
                        $(`[data-status='3']`).html(`${status3}</div>`);
                        $(`[data-status='4']`).html(`${result.data[0].delivery==1?status5:status4}<span class="time" style='float:none;'><i class="fas fa-clock"></i> ${time}</span></div>`);
                    }
                }
                $('#btn-update').attr('data-id', id);
                $('#btn-update').attr('data-id-status', result.data[0].status);
                $('#timeline-status').modal('toggle');
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        }).catch(err=>{
            console.log(err);
        });
    });

    $('#btn-update').on('click', function() {
        const id = $(this).data('id');
        const status = $(this).data('id-status');
        $.ajax({
            url: "<?= base_url('cashier/update_sepatu'); ?>",
            type: 'POST',
            data: {status,id},
        }).then(res=>{
            const result = JSON.parse(res);
            if (result.success) {
                $('#timeline-status').modal('hide');
                Swal.fire(
                    'Success',
                    'Berhasil update status sepatu',
                    'success'
                ).then(function(){
                    location.reload();
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    });

    $('[name="metode"]').on('change', function() {
        updateTotal()
    });

    $(`[name='delivery']`).on('change', function() {
        updateTotal()
    })

    const updateTotal=()=>{
        const checkbox = $('[name="delivery"]').prop('checked');
        const delivery= checkbox ? 15000 : 0;
        const total_view = $(`[data-invoice='total']`);
        const total_hidden = parseInt($(`[data-invoice='total-hidden']`).val())+delivery;
        const method=$('[name="metode"]').val() == 2 ? total_hidden*0.5 : total_hidden;
        total_view.val(method);
    }

    $(`[data-invoice='bayar']`).on('keyup', function() {
        const bayar = $(`[data-invoice='bayar']`).val();
        const total = $(`[data-invoice='total']`).val();
        try {
            const kembalian = eval(bayar-total)
            $(`[data-invoice='kembalian']`).val(kembalian>=0?kembalian:'');

            if(kembalian < 0)
                $(`button[data-name='btn-bayar']`).attr('disabled', 'disabled');
            else
                $(`button[data-name='btn-bayar']`).removeAttr('disabled');

        } catch (error) {
            console.error(error);
        }
    });

    $(`button[data-name='btn-bayar']`).on('click', function() {
        const id = $(`[data-invoice='id']`).text();
        const bayar = $(`[data-invoice='bayar']`).val();
        const checkbox = $('[name="delivery"]').prop('checked');
        const kembalian = $(`[data-invoice='kembalian']`).val();
        const total_hidden = parseInt($(`[data-invoice='total-hidden']`).val());
        const delivery= checkbox ? 15000 : 0;
        const total = total_hidden + delivery;
        let metode = $(`[name='metode'] option:selected`).val();
        if(metode==0 || metode == undefined){
            metode=1;
        }
        $.ajax({
            url: "<?= base_url('cashier/update_transaction'); ?>",
            type: 'POST',
            data: {bayar,kembalian,id,metode,total,checkbox},
        }).then(res=>{
            const result = JSON.parse(res);
            if (result.success) {
                Swal.fire(
                    'Success',
                    'Berhasil update status transaksi',
                    'success'
                ).then(function() {
                    window.location = '<?= base_url('cashier/transaksi')?>';
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        })
    });        
    
    $(`#form-transaksi`).on('submit', function(e) {
        e.preventDefault();
        const customer_name = $(`#form-transaksi [name='customer-name']`).val();
        const phone_number = $(`#form-transaksi [name='phone-number']`).val();
        const address = $(`#form-transaksi [name='address']`).val();

        let data=[];
        $('#form-transaksi').find('#form [data-id]').each((i,el)=>{
            const brand = $(el).find('[name="brand"]').val(),
            color = $(el).find('[name="color"]').val(),
            size = $(el).find('[name="size"]').val(),
            type = $(el).find('[name="type-id"]').val(),
            treatment = $(el).find('[name="treatment-id"]').val(),
            note = $(el).find('[name="note"]').val(),
            price = $(el).find(`[name='treatment-id'] option:selected`).data('price');
            data.push({brand,color,size,type,treatment,note,price})
        })

        $.ajax({
            url: "<?= base_url('cashier/add_transaction'); ?>",
            type: 'POST',
            data: {customer_name,phone_number,address,data},
        }).then(res=>{
            const result = JSON.parse(res);
            console.log(result);
            if (result.success) {
                Swal.fire(
                    'Success',
                    'Berhasil menambahkan transaksi',
                    'success'
                ).then(function() {
                    window.location = `<?= base_url('cashier/rincian_pesanan/')?>${result.id}`;
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }  
        })
    });

    $(`[name='add-form']`).on('click', function(){
        
        const id = $('#form').find(`[data-id]:last-child`).data('id');
        let content= `<div data-id='${id+1}' class="card card-success">
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
                        </div>`
        $('#form').append(content);
    });
  })
</script>

</body>
</html>