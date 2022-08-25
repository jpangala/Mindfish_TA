<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PERUSAHAAN</h3>

    <?php foreach($perusahaan as $pshn) : ?>
    <form method="post" action="<?php echo base_url().'admin/data_perusahaan/update' ?>">
    <div class="for-group">
            <label>Nama Perusahaan</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $pshn->id?>">
            <input type="text" name="nama" class="form-control" value="<?php echo $pshn->perusahaan_nama ?>">       
        </div>
        <div class="for-group">
            <label>Deskripsi Perusahaan</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo $pshn->perusahaan_deskripsi ?>">
        </div>
        <div class="for-group">
            <label>Alamat Perusahaan</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $pshn->perusahaan_alamat ?>">
        </div>
        <div class="for-group">
            <label>Domisili</label>
            <input type="text" name="domisili" class="form-control" value="<?php echo $pshn->perusahaan_domisili ?>">
        </div>
        <div class="for-group">
            <label>Nomor Perusahaan</label>
            <input type="text" name="nomor" class="form-control" value="<?php echo $pshn->perusahaan_nomor ?>">
        </div>
        <div class="for-group">
            <label>Contact Person</label>
            <input type="text" name="cp" class="form-control" value="<?php echo $pshn->perusahaan_cp ?>">
        </div>
        <div class="for-group">
            <label>Jenis Budidaya</label>
            <input type="text" name="jenis" class="form-control" value="<?php echo $pshn->perusahaan_jenis ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

    </form>
    <?php endforeach; ?>
</div>