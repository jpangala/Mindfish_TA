<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user');?>
<div class="container-fluid">
    <table id="tables" class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th>No</th>
        <th>id_penjualan</th>
        <th>Nomor Transaksi</th>
        <th>Total Harga</th>
        <th>Tanggal Dibuat</th>
        <th>Status</th>
        <th >AKSI</th>
        </tr>
    </thead>
        <?php
        $no=1;
        foreach($penjualan as $pjl) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td class="id_penjualan"><?php echo $pjl->id ?></td>
                <td class="no_penjualan"><?php echo $pjl->no_transaksi ?></td>
                <td class="total_harga">Rp <?php echo number_format($pjl->total_harga,0,',','.') ?></td> 
                <td class="tanggal_dibuat"><?php echo $pjl->tanggal ?></td>
                <td class="status"><?php echo $pjl->status ?></td>
                <td>
                <?php if($pjl->status == 'Menunggu Pembayaran') : ?>
                  <?php echo anchor ('user/data_user/invoice_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Bayar</div>') ?>
                <?php elseif($pjl->status == 'Pembayaran Telah Dilakukan') : ?>
                  <?php echo anchor ('user/data_user/detail_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Details</div>') ?>          
                <?php elseif($pjl->status == 'Pembayaran Berhasil') : ?>
                  <?php echo anchor ('user/data_user/detail_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Details</div>') ?>          
                <?php elseif($pjl->status == 'Proses Packing') : ?>
                  <?php echo anchor ('user/data_user/detail_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Details</div>') ?>          
                <?php elseif($pjl->status == 'Proses Pengiriman') : ?>
                  <?php echo anchor ('user/data_user/detail_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Details</div>') ?>          
                <?php elseif($pjl->status == 'Proses Selesai') : ?>
                  <?php echo anchor ('user/data_user/detail_pembelian/' .$pjl->no_transaksi, '<div class="btn btn-success btn-sm">Details</div>') ?>          
                <?php endif; ?>
                </td>
                <!-- <button  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_penjualan"><i class="fas fa-edit"></i></button>
                <button  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_penjualan"><i class="fas fa-trash"></i></button></td> -->
            </tr>
        <?php  endforeach; ?>

    </table>
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
            <form action="<?php echo base_url().'admin/data_penjualan/edit_penjualan';?>" method="post" enctype="multipart/form-data">
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
        $no=1;
        foreach($penjualan as $pjl) : ?>
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
      <form action="<?php echo base_url().'user/data_user/hapus_pembelian';?>" method="post" enctype="multipart/form-data">
      <img src="<?php echo base_url().'/uploads/'.$pjl->bukti_pembayaran?>" class="card-img-top mi-3"  alt="...">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
      <button type="submit" class="btn btn-danger">Ya</button>
    </div>
      </form>
  </div>
</div>
</div>
<?php  endforeach; ?>

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
            <form action="<?php echo base_url().'admin/data_penjualan/no_penjualan';?>" method="post" enctype="multipart/form-data">
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
  $(document).ready(function() {
    $('#tables').DataTable({
      "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
      "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [1]} ]
    });
} );
</script>


<script>
    $('#edit_penjualan').on('shown.bs.modal', function (e) {
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

    $('#hapus_penjualan').on('shown.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var row = button.parents("tr");
    var id_penjualan_hapus = row.find(".id_penjualan").text();

    
    $(this).find(".id_penjualan_hapus").val(id_penjualan_hapus);

    });

</script>
<?php $this->load->view('templates_admin/footer');?>
