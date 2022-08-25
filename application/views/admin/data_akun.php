<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Daftar Akun</button>
    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>Nama Budidaya</th>
        <th>Username</th>
        <th>Nama Pembudidaya</th>
        <th>Nomor</th>
        <th>Alamat</th>
        <th>Domisili</th>
        <th>Tanggal Daftar</th>
        <th>Foto</th>
        <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($akun as $akn) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $akn->nama_budidaya ?></td>
                <td><?php echo $akn->username ?></td>
                <td><?php echo $akn->nama ?></td>
                <td><?php echo $akn->nomor ?></td>
                <td><?php echo $akn->alamat ?></td>
                <td><?php echo $akn->domisili ?></td>
                <td><?php echo $akn->tanggal_daftar ?></td>
                <td><img src="<?php echo base_url().'/uploads/'.$akn->user_image?>" class="card-img-top mi-3" style="height:20;width:10%; alt="..."></td>
                <td><?php echo anchor ('admin/data_akun/edit/' .$akn->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_akun/hapus/' .$akn->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
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
            <form action="<?php echo base_url().'admin/data_akun/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Pembudidaya</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Budidaya</label>
                    <input type="text" name="budidaya" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat Budidaya</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nomor</label>
                    <input type="text" name="nomor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="daftar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="gambar" class="form-control"required>
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