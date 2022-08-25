<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Daftar Perusahaan</button>
    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Deskripsi</th>
        <th>Nomor Perusahaan</th>
        <th>Contact Person</th>
        <th>Alamat</th>
        <th>Domisili</th>
        <th>Jenis Budidaya</th>
        <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($perusahaan as $pshn) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pshn->perusahaan_nama ?></td>
                <td><?php echo $pshn->perusahaan_deskripsi ?></td>
                <td><?php echo $pshn->perusahaan_nomor ?></td>
                <td><?php echo $pshn->perusahaan_cp ?></td>
                <td><?php echo $pshn->perusahaan_alamat ?></td>
                <td><?php echo $pshn->perusahaan_domisili ?></td>
                <td><?php echo $pshn->perusahaan_jenis ?></td>
                <td><?php echo anchor ('admin/data_perusahaan/edit/' .$pshn->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                <td><?php echo anchor('admin/data_perusahaan/hapus/' .$pshn->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_perusahaan/tambah_aksi';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi Perusahaan</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nomor Perusahaan</label>
                    <input type="text" name="nomor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" name="cp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat Perusahaan</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Domisili</label>
                    <input type="text" name="domisili" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Budidaya</label>
                    <input type="text" name="jenis" class="form-control" required>
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