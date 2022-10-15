<?php $this->load->view('templates_admin/header'); ?>
<?php $this->load->view('templates_admin/sidebar_penjualan'); ?>


<div class="container-fluid">
  <table id="tables" class="table table-bordered text-center align-middle">
    <thead class="thead-dark">
      <tr>
        <th class="align-middle">No</th>
        <th class="align-middle id_penjualan">id_penjualan</th>
        <th class="align-middle">Nomor Transaksi</th>
        <th class="align-middle">Nama Pembeli</th>
        <th class="align-middle">Total Harga</th>
        <th class="align-middle">Tanggal Dibuat</th>
        <th class="align-middle">Status</th>
        <th class="align-middle aksi">AKSI</th>
      </tr>
    </thead>

    <?php
    $no = 1;
    foreach ($penjualan as $pjl) : ?>

      <tr>
        <td class="align-middle"><?php echo $no++ ?></td>
        <td class="align-middle id_penjualan"><?php echo $pjl->id ?></td>
        <td class="align-middle no_penjualan"><?php echo $pjl->no_transaksi ?></td>
        <td class="align-middle nama_pembeli"><?php echo $pjl->nama_customer ?></td>
        <td class="align-middle total_harga">Rp <?php echo number_format($pjl->total_harga, 0, ',', '.') ?></td>
        <td class="align-middle tanggal_dibuat"><?php echo $pjl->tanggal ?></td>
        <?php if ($pjl->status == 'Pembayaran Telah Dilakukan') : ?>
            <td class="align-middle" ><button class="btn btn-primary" style="border: 1px;" data-toggle="modal" data-target="#bukti_pembayaran<?php echo $pjl->id ?>"><?php echo $pjl->status ?> <i class="fas fa-file"></i></button></td>
          <?php else : ?>
             <td class="align-middle status"><?php echo $pjl->status ?></td>
        <?php endif; ?>
      <td class="align-middle">
        <?php if ($pjl->status == 'Pembayaran Telah Dilakukan') : ?>
          <?php echo anchor('admin/data_penjualan/status_berhasil/' . $pjl->no_transaksi, '<div class="btn btn-outline-primary btn-sm mb-3">Pembayaran Diterima</div>') ?>
          <br>
        <?php elseif ($pjl->status == 'Pembayaran Berhasil') : ?>
          <?php echo anchor('admin/data_penjualan/status_packing/' . $pjl->no_transaksi, '<div class="btn btn-outline-primary btn-sm mb-3">Packing</div>') ?>
          <br>
        <?php elseif ($pjl->status == 'Proses Packing') : ?>
          <?php echo anchor('admin/data_penjualan/status_pengiriman/' . $pjl->no_transaksi, '<div class="btn btn-outline-primary btn-sm mb-3">Pengiriman</div>') ?>
          <br>
        <?php elseif ($pjl->status == 'Proses Pengiriman') : ?>
          <?php echo anchor('admin/data_penjualan/status_selesai/' . $pjl->no_transaksi, '<div class="btn btn-outline-primary btn-sm mb-3">Selesai</div>') ?>
        <?php endif; ?>
  
        <?php echo anchor('admin/data_penjualan/detail/' . $pjl->no_transaksi, '<div class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></div>') ?>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_penjualan"><i class="fas fa-edit"></i></button>
        <?php if ($pjl->status == 'Menunggu Pembayaran') : ?>
          <a href="<?php echo base_url('admin/data_penjualan/batal_penjualan/' . $pjl->no_transaksi); ?>" class="btn btn-danger btn-sm tombol_hapus">Batal</a>
          <br>
        <?php else : ?>
          <a href="<?php echo base_url('admin/data_penjualan/hapus_penjualan/' . $pjl->no_transaksi); ?>" class="btn btn-danger btn-sm tombol_hapus"><i class="fas fa-trash"></i></a>
        <?php endif; ?>

      </td>
      </tr>
    <?php endforeach; ?>

  </table>
</div>


<?php
$no = 1;
foreach ($penjualan as $pjl) : ?>
  <!-- Modal Bukti Pembayaran -->
  <div class="modal fade" id="bukti_pembayaran<?php echo $pjl->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() . 'user/data_user/hapus_pembelian'; ?>" method="post" enctype="multipart/form-data">
            <img src="<?php echo base_url() . '/uploads/' . $pjl->bukti_pembayaran ?>" class="card-img-top mi-3" alt="...">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Edit -->
<div class="modal fade" id="edit_penjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'admin/data_penjualan/edit_penjualan'; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="id_penjualan" class="form-control id_penjualan" hidden>
          </div>
          <div class="form-group">
            <label>Nomor Transaksi</label>
            <input type="text" name="no_penjualan" class="form-control no_penjualan" disabled>
          </div>
          <div class="form-group">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control nama_pembeli" required>
          </div>
          <div class="form-group">
            <label>Total Harga</label>
            <input type="text" name="total_harga" class="form-control total_harga" disabled>
          </div>
          <div class="form-group">
            <label>Tanggal Dibuat</label>
            <input type="text" name="tanggal_dibuat" class="form-control tanggal_dibuat" required>
          </div>
          <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control status" required>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_penjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('admin/data_penjualan/hapus_penjualan'); ?>">
          <div class="form-group">
            <input type="text" name="id_penjualan" class="form-control id_penjualan_hapus" hidden>
            <p> Apakah Anda yakin ingin menghapus Data Penjualan berikut? </p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah_penjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Penjualan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'admin/data_penjualan/no_penjualan'; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-group">
              <label>Nama Pembeli</label>
              <input type="text" name="nama_pembeli" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Tanggal Dibuat</label>
              <input type="datetime-local" name="tanggal_dibuat" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- Datatables.net -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <script>
    $('#edit_penjualan').on('shown.bs.modal', function(e) {
      var button = $(e.relatedTarget);
      // console.log(_button, _button.parents("tr"));
      var row = button.parents("tr");
      var no_penjualan = row.find(".no_penjualan").text();
      var nama_pembeli = row.find(".nama_pembeli").text();
      var total_harga = row.find(".total_harga").text();
      var tanggal_dibuat = row.find(".tanggal_dibuat").text();
      var status = row.find(".status").text();
      var id_penjualan = row.find(".id_penjualan").text();


      $(this).find(".no_penjualan").val(no_penjualan);
      $(this).find(".nama_pembeli").val(nama_pembeli);
      $(this).find(".total_harga ").val(total_harga);
      $(this).find(".tanggal_dibuat").val(tanggal_dibuat);
      $(this).find(".status").val(status);
      $(this).find(".id_penjualan").val(id_penjualan);
    });

    $('#hapus_penjualan').on('shown.bs.modal', function(e) {
      var button = $(e.relatedTarget);
      // console.log(_button, _button.parents("tr"));
      var row = button.parents("tr");
      var id_penjualan_hapus = row.find(".id_penjualan").text();


      $(this).find(".id_penjualan_hapus").val(id_penjualan_hapus);

    });
  </script>
  <?php $this->load->view('templates_admin/footer'); ?>

  <script>

$(document).ready(function() {
    $('#tables').DataTable( {
        dom: 'Bfrtip',
        "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
        buttons: [
          {extend:'pdf',exportOptions: {columns: [0,2,3,4,5,6]}}, {extend:'print',exportOptions: {columns: [0,2,3,4,5,6]}}
        ],
        "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 1 ]} ]
      
      }).buttons().container().appendTo('#tables_wrapper .col-md-6:eq(0)');
} );

// $(function () {
//     $("#tables").DataTable({
//                         "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
//                         "buttons": [{extend:'csv',exportOptions: {columns: "thead th:not(.noExport)"}},
//                         {extend:'excel',exportOptions: {columns: "thead th:not(.noExport)"}},
//                         {extend:'pdf',exportOptions: {columns: "thead th:not(.noExport)"}},
//                         {text: 'Tambah Barang',action: function (e, node, config){$('#addModal').modal('show')}}
//                                   ],
//                         "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 1 ]} ]

//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



//   });

   
  </script>
    <script>
      $('.tombol_hapus').on('click', function(e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin ingin menghapus data penjualan berikut?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
    })
    </script>
  <script>
        /*  Initialize Sweet Alert */
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true
        })

        /*  get session message and color */
        var message = <?php echo json_encode($this->session->flashdata('message')) ?>;
        var icon = <?php echo json_encode($this->session->flashdata('icon')) ?>;

        /*  sweet alert message */
        if (Boolean(message)) {
            Toast.fire({
                icon: icon,
                title: message
            })
        }
    </script>
  <?php
    if ($this->session->flashdata('message') && $this->session->flashdata('icon')) {
        unset($_SESSION['message']);
        unset($_SESSION['icon']);
    }
    ?>
