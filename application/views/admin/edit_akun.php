<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA AKUN</h3>

    <?php foreach($akun as $akn) : ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'admin/data_akun/update' ?>">
    <div class="for-group">
            <label>Username</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $akn->id?>">
            <input type="text" name="username" class="form-control" value="<?php echo $akn->username ?>">       
        </div>
        <div class="for-group">
            <label>Password Baru</label>
            <input type="text" name="password" class="form-control" value="">
        </div>
        <div class="for-group">
            <label>Nama Pembudidaya</label>
            <input type="text" name="name" class="form-control" value="<?php echo $akn->nama ?>">
        </div>
        <div class="for-group">
            <label>Nomor</label>
            <input type="text" name="nomor" class="form-control" value="<?php echo $akn->nomor ?>">
        </div>
        <div class="for-group">
            <label>Gambar Pengguna</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <div class="for-group">
            <label>Tanggal Daftar</label>
            <input type="date" name="daftar" class="form-control" value="<?php echo $akn->tanggal_daftar ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

    </form>
    <?php endforeach; ?>
</div>