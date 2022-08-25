<!-- Header and Sidebar -->
<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user'); ?>

<!-- Additional Style -->
<style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/additional.css">

<!-- Main Content -->
<div class="container-fluid">
  <article class="card">
    <header class="card-header"> My Orders / Tracking </header>
    <div class="card-body">
      <?php foreach ($penjualan as $pjl) { ?>
        <h6>Nomor Penjualan : <?= $pjl->no_penjualan ?></h6>
        <article class="card">
          <div class="card-body row">
            <div class="col-3"> <strong>Nama Pembeli :</strong> <br><?= $pjl->nama_pembeli ?> </div>
            <div class="col"> <strong>Alamat Pengiriman:</strong> <br> <?= $pjl->alamat_pengiriman ?>, | <i class="fa fa-phone"></i> +1598675986 </div>
            <div class="col"> <strong>Status:</strong> <br> <?= $pjl->status ?> </div>
            
          </div>
        </article>
        <div class="track" style="margin-bottom: 5rem;">
          <?php if ($pjl->status == 'Pembayaran Telah Dilakukan') : ?>
            <div class="step active"> <span class="icon"> <i class="fas fa-dollar-sign"></i> </span> <span class="text">Pembayaran Telah Dilakukan</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text"> Proses Packing</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Proses Pengiriman </span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-map-marker-alt"></i> </span> <span class="text">Selesai</span> </div>
          <?php elseif ($pjl->status == 'Pembayaran Berhasil') : ?>
            <div class="step active"> <span class="icon"> <i class="fas fa-dollar-sign"></i> </span> <span class="text">Pembayaran Telah Dilakukan</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text"> Proses Packing</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Proses Pengiriman </span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-map-marker-alt"></i> </span> <span class="text">Selesai</span> </div>
          <?php elseif ($pjl->status == 'Proses Packing') : ?>
            <div class="step active"> <span class="icon"> <i class="fas fa-dollar-sign"></i> </span> <span class="text">Pembayaran Telah Dilakukan</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
            <div class="step active"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text"> Proses Packing</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Proses Pengiriman </span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-map-marker-alt"></i> </span> <span class="text">Selesai</span> </div>
          <?php elseif ($pjl->status == 'Proses Pengiriman') : ?>
            <div class="step active"> <span class="icon"> <i class="fas fa-dollar-sign"></i> </span> <span class="text">Pembayaran Telah Dilakukan</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
            <div class="step active"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text"> Proses Packing</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Proses Pengiriman </span> </div>
            <div class="step"> <span class="icon"> <i class="fas fa-map-marker-alt"></i> </span> <span class="text">Selesai</span> </div>
          <?php elseif ($pjl->status == 'Selesai') : ?>
            <div class="step active"> <span class="icon"> <i class="fas fa-dollar-sign"></i> </span> <span class="text">Pembayaran Telah Dilakukan</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
            <div class="step active"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text"> Proses Packing</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Proses Pengiriman </span> </div>
            <div class="step active"> <span class="icon"> <i class="fas fa-map-marker-alt"></i> </span> <span class="text">Selesai</span> </div>
          <?php endif; ?>
        </div>
      <?php } ?>
      <hr>
      <table id="tables" class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Nama ikan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($detail as $dtl) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td class="no_penjualan"><?php echo $dtl->nama_ikan ?></td>
            <td class="nama_pembeli"><?php echo $dtl->jumlah ?></td>
            <td class="total_harga">Rp <?php echo number_format($dtl->harga, 0, ',', '.') ?></td>
            <td class="total_harga">Rp <?php echo number_format($dtl->subtotal_harga, 0, ',', '.') ?></td>
          </tr>
        <?php } ?>
      </table>
      <hr>
      <a href="<?php echo base_url() . 'user/data_user/pembelian'; ?>" class="btn btn-blue" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
    </div>
  </article>
</div>


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
            <label>Nomor Penjualan</label>
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
<?php
$no = 1;
foreach ($penjualan as $pjl) : ?>
  <!-- Modal Hapus -->
  <div class="modal fade" id="detail_penjualan<?php echo $pjl->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penjualan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url() . 'user/data_user/hapus_pembelian'; ?>" method="post" enctype="multipart/form-data">
            <img src="<?php echo base_url() . '/uploads/' . $pjl->bukti_pembayaran ?>" class="card-img-top mi-3" alt="...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

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
  <script>
    $(document).ready(function() {
      $('#tables').DataTable({});
    });
  </script>
  <?php $this->load->view('templates_admin/footer'); ?>