<?php $this->load->view('templates_admin/header'); ?>
<?php $this->load->view('templates_admin/sidebar_ikan'); ?>
<div class="container-fluid">
  <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Ikan</button>
  <table id="tables" class="table table-bordered text-center">
    <thead class="thead-dark">
      <tr>
        <th class="align-middle">No</th>
        <th class="align-middle">id</th>
        <th class="align-middle" style="width: 100px;">Nama Ikan</th>
        <th class="align-middle" style="width: 100px;">Jumlah Stok</th>
        <th class="align-middle" style="width: 80px;">Harga</th>
        <th class="align-middle" style="width: 330px;">Deskripsi</th>
        <th class="align-middle">AKSI</th>
      </tr>
    </thead>

    <?php
    $no = 1;
    foreach ($ikan as $katalog) : ?>
      <tr>
        <td class="align-middle no"><?php echo $no++ ?></td>
        <td class="align-middle id_ikan" style="display:none;"><?php echo $katalog->id ?></td>
        <td class="align-middle nama_ikan" id="nama_ikan"><?php echo $katalog->nama_ikan ?></td>
        <td class="align-middle stok"><?php echo $katalog->stok ?></td>
        <td class="align-middle harga">Rp <?php echo number_format($katalog->harga, 0, ',', '.'); ?></td>
        <td class="align-middle deskripsi"><?php echo $katalog->deskripsi ?></td>
        <td class="align-middle"><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#gambar_ikan<?php echo $katalog->id ?>"><i class="fas fa-fish"></i></button>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_ikan"><i class="fas fa-edit"></i></button>
          <a href="<?php echo base_url('admin/data_katalog/hapus_ikan/' . $katalog->id); ?>" class="btn btn-danger btn-sm tombol_hapus"><i class="fas fa-trash"></i></a>
        </td>

      </tr>
    <?php endforeach; ?>
  </table>
</div>


<?php
$no = 1;
foreach ($ikan as $katalog) : ?>
  <!-- Modal Bukti Pembayaran -->
  <div class="modal fade" id="gambar_ikan<?php echo $katalog->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gambar Ikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() . 'user/data_user/hapus_pembelian'; ?>" method="post" enctype="multipart/form-data">
            <img src="<?php echo base_url() . '/assets_landing/img/ikan/' . $katalog->gambar ?>" class="card-img-top mi-3" alt="...">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Katalog Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'admin/data_katalog/tambah_ikan'; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Ikan</label>
            <input type="text" name="nama_ikan" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="jumlahstok" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Gambar Ikan</label>
            <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1" required>
          </div>
          <div class="form-group">
            <label>Tanggal Input</label>
            <input type="datetime-local" name="tanggal" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php foreach ($ikan as $katalog) : ?>
  <div class="modal fade" id="edit_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Katalog Ikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() . 'admin/data_katalog/edit_ikan'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" name="id_ikan" class="form-control id_ikan" hidden>
            </div>
            <div class="form-group">
              <label>Nama Ikan</label>
              <input type="text" name="nama_ikan" class="form-control nama_ikan" required>
            </div>
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="number" name="jumlahstok" class="form-control stok" disabled>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control harga" required>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <input type="text" name="deskripsi" class="form-control deskripsi" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('admin/data_katalog/hapus_ikan'); ?>">
          <div class="form-group">
            <input type="text" name="id_ikan" class="form-control id_ikan_hapus" hidden>
            <p> Apakah Anda yakin ingin menghapus Data Ikan berikut? </p>
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
  $(document).ready(function() {
    $('#tables').DataTable({
      "retrieve": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "aoColumnDefs": [{
        "sClass": "dpass",
        "aTargets": [1]
      }]
    });
  });
</script>

<script>
  $('#edit_ikan').on('shown.bs.modal', function(e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_ikan = _row.find(".nama_ikan").text();
    var _stok = _row.find(".stok").text();
    var _deskripsi = _row.find(".deskripsi").text();
    var _id_ikan = _row.find(".id_ikan").text();
    var _harga = _row.find(".harga").text();




    $(this).find(".nama_ikan").val(_nama_ikan);
    $(this).find(".id_ikan").val(_id_ikan);
    $(this).find(".deskripsi").val(_deskripsi);
    $(this).find(".stok").val(_stok);
    $(this).find(".harga").val(_harga);
  });


  $('#hapus_ikan').on('shown.bs.modal', function(e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _id_ikan_hapus = _row.find(".id_ikan").text();


    $(this).find(".id_ikan_hapus").val(_id_ikan_hapus);

  });
</script>
<?php $this->load->view('templates_admin/footer'); ?>
<script>
  $('.tombol_hapus').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin ingin menghapus data ikan berikut?',
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