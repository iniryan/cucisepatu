<footer class="main-footer">
  <strong>Copyright &copy; 2020</strong><div class="float-right d-none d-sm-inline-block"></div>
</footer>  
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery/jquery.min.js"></script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/'); ?>adminlte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/'); ?>adminlte/dist/js/demo.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
  	$(document).ready(function(){
        var tbl_history_dcl = $("#table-history-sepatu-dcl").DataTable({"sDom": 'ltrip',"lengthChange": false,});
        var tbl_history_fcl = $("#table-history-sepatu-fcl").DataTable({"sDom": 'ltrip',"lengthChange": false,});
        var tbl_history_unyl = $("#table-history-sepatu-unyl").DataTable({"sDom": 'ltrip',"lengthChange": false,});      
        var tbl_sepatu_dcl = $("#table-sepatu-dcl").DataTable({"sDom": 'ltrip',"lengthChange": false,});      
        var tbl_sepatu_fcl = $("#table-sepatu-fcl").DataTable({"sDom": 'ltrip',"lengthChange": false,});      
        var tbl_sepatu_unyl = $("#table-sepatu-unyl").DataTable({"sDom": 'ltrip',"lengthChange": false,});

        $('#search-history-sepatu').on( 'keyup', function () {
            tbl_history_dcl.search( this.value ).draw();
            tbl_history_fcl.search( this.value ).draw();
            tbl_history_unyl.search( this.value ).draw();
        });

        $('#search-sepatu').on( 'keyup', function () {
            tbl_sepatu_dcl.search( this.value ).draw();
            tbl_sepatu_fcl.search( this.value ).draw();
            tbl_sepatu_unyl.search( this.value ).draw();
        });

        $(`button[data-name='btn-detail-sepatu']`).on('click', function() {
			const id = $(this).data('id');
			const status1 = `<i class="fas fa-clock bg-gray"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah masuk ke waiting list.</h3>`;
			const status2 = `<i class="fa fa-spinner bg-yellow"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu sedang diproses oleh Kang Cuci.</h3>`;
			const status3 = `<i class="fas fa-check bg-green"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah selesai dicuci, menunggu pengambilan.</h3>`;
			const status4 = `<i class="fas fa-check bg-blue"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah diambil oleh Customer</h3>`;
			const status5 = `<i class="fas fa-check bg-blue"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah diantar ke Customer</h3>`;
			
			$.ajax({
				url: "<?= base_url('worker/detail_sepatu'); ?>",
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
                url: "<?= base_url('worker/update_sepatu'); ?>",
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
                    })
                }
            });
        });
  	})
</script>
</body>
</html>