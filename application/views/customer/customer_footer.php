<!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="<?= base_url('assets/'); ?>adminlte/plugins/jquery/jquery.min.js"></script> -->
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>adminlte/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 50) {
            $("nav").addClass("bg-white");
        } else {
            $("nav").removeClass("bg-white");
        }
    });

    $('#btn-search').on('click', function() {
      const id = $(`[name='search']`).val()
      console.log('cliked');
      $.ajax({
          url: `<?= base_url('customer/search/')?>${id}`,
          type: 'GET',
      }).then(res=>{
          const result = JSON.parse(res);
          console.log(result);
          if (result.status) {
              window.location = `<?= base_url('customer/detail/')?>${id}`;
          }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode tidak ditemukan',
            })
          }
      })
    })

    $(`button[data-name='btn-detail-sepatu']`).on('click', function() {
            const id = $(this).data('id');
            const status1 = `<i class="fas fa-clock bg-gray"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu telah masuk ke waiting list.</h3>`;
            const status2 = `<i class="fa fa-spinner bg-yellow"></i><div class="timeline-item"><h3 class="timeline-header no-border">Sepatu sedang diproses oleh Kang Cuci.</h3>`;
            const status3 = `<i class="fas fa-check bg-green"></i><div class="timeline-item">
            <h3 class="timeline-header no-border">Sepatu telah selesai dicuci, menunggu pengambilan.</h3>`;

            $.ajax({
                url: "<?= base_url('admin/detail_sepatu'); ?>",
                type: 'POST',
                data: {id},
            }).then(res=>{
                const result = JSON.parse(res);
                console.log(result);
                if (result.success) {
                    $(`[data-sepatu='kode']`).text(`${result.data[0].shoes_code}`);
                    $(`[data-sepatu='brand']`).text(`${result.data[0].brand}`);
                    $(`[data-sepatu='warna']`).text(`${result.data[0].color}`);
                    $(`[data-sepatu='size']`).text(`${result.data[0].size}`);
                    $(`[data-sepatu='tipe']`).text(`${result.data[0].type_name}`);
                    $(`[data-sepatu='treatment']`).text(`${result.data[0].treatment_name}-${result.data[0].estimated_time} Hari`);
                    if (result.data[0].status == 1) {
                        $(`[data-status='1']`).html(`${status1}<span class="time"><i class="fas fa-clock"></i>${result.data[0].updated_at}</span>`);
                        $(`[data-status='2']`).remove();
                        $(`[data-status='3']`).remove();
                        $('#btn-update').removeClass('btn-primary, btn-success');
                        $('#btn-update').addClass('btn-warning');
                    }else if(result.data[0].status == 2) {
                        $(`[data-status='1']`).html(status1);
                        $(`[data-status='2']`).html(`${status2}<span class="time"><i class="fas fa-clock"></i>${result.data[0].updated_at}</span>`);
                        $(`[data-status='3']`).remove();
                        $('#btn-update').removeClass('btn-warning, btn-primary');
                        $('#btn-update').addClass('btn-success');
                    }else if(result.data[0].status == 3) {
                        $(`[data-status='1']`).html(status1);
                        $(`[data-status='2']`).html(status2);
                        $(`[data-status='3']`).html(`${status3}<span class="time"><i class="fas fa-clock"></i>${result.data[0].updated_at}</span>`);
                        $('#btn-update').removeClass('btn-success, btn-warning');
                        $('#btn-update').addClass('btn-primary');
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
            })
        });
  })
</script>
</body>
</html>