<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA PESANAN</h3>

    <?php foreach($pesanan as $psn) : ?>
    <?php $test = $psn->perusahaan_nama ?>
    <form method="post" action="<?php echo base_url().'admin/data_pesanan/update' ?>">
        <div class="for-group">
            <label>Nama Perusahaan</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $psn->id?>">
            <select name="perusahaan" class="form-control">
                <?php foreach($perusahaan as $pshn) : ?>
                <option value="<?php echo $pshn->id ?>"><?php echo $pshn->perusahaan_nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="for-group">
            <label>Nama Ikan</label>
            <select name="ikan" class="form-control">
                <?php foreach($ikan as $ikn) : ?>
                <option value="<?php echo $ikn->id; ?>" <?php if($psn->nama_ikan == $ikn->nama_ikan) {echo "selected = selected";} ?>><?php echo $ikn->nama_ikan ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="for-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $psn->umur ?>">
        </div>
        <div class="for-group">
            <label>Jumlah</label>
            <input type="number" name="request" class="form-control" value="<?php echo $psn->request ?>">
        </div>
        <div class="for-group mb-3">
            <label>Pesanan Masuk</label>
            <input type="date" name="masuk" class="form-control" value="<?php echo $psn->pesanan_masuk ?>">
        </div>
        <div class="for-group mb-3">
            <label>Pesanan Selesai</label>
            <input type="date" name="selesai" class="form-control" value="<?php echo $psn->pesanan_selesai ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

    </form>
    <?php endforeach; ?>
</div>