<html>
<head>

</head>
<body>
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Pesanan</button>
    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th >Nama Perusahaan</th>
        <th>Nama Ikan</th>
        <th>Keterangan</th>
        <th>Request Terpenuhi</th>
        <th>Pesanan Masuk</th>
        <th>Pesanan Selesai</th>
        <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($pesanan as $psn) : ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $psn->perusahaan_nama ?></td>
                <td><?php echo $psn->nama_ikan ?></td>
                <td><?php echo $psn->umur ?></td>
                <td><?php echo $psn->request_temp_admin." / ".$psn->request ?></td>
                <td><?php echo $psn->pesanan_masuk ?></td>
                <td><?php echo $psn->pesanan_selesai ?></td>
                <td><?php echo anchor ('admin/data_pesanan/detail/' .$psn->id, '<div class="btn btn-success btn-sm"><i class="fas fa-info-circle"></i></div>') ?>
                <?php if($psn->request_temp == 0) echo '<a href="'.base_url().'admin/data_pesanan/proses/'.$psn->id.'"><div class="btn btn-success btn-sm" ><i class="far fa-check-square"></i></div></a>'?></td>
                <td><?php echo anchor ('admin/data_pesanan/edit/' .$psn->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_pesanan/hapus/' .$psn->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_pesanan/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <select name="perusahaan" class="form-control">
                    <?php foreach($perusahaan as $pshn) : ?>
                    <option value="<?php echo $pshn->id ?>"><?php echo $pshn->perusahaan_nama ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Ikan</label>
                    <select name="ikan" class="form-control">
                    <?php foreach($ikan as $ikn) : ?>
                    <option value="<?php echo $ikn->id ?>"><?php echo $ikn->nama_ikan ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="request" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pesanan Masuk</label>
                    <input type="date" name="masuk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pesanan Selesai</label>
                    <input type="date" name="selesai" class="form-control" required>
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
</body>
