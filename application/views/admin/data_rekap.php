<html>
<head>

</head>
<body>
<div class="container-fluid">
    <a href="<?php echo base_url().'admin/data_rekap/export';?>"><button class="btn btn-sm btn-success mb-3" ><i class="fas fa-plus fa-sm"></i> Export ke Excel</button></a>
    <table class="table table-bordered">
        <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Nama Ikan</th>
        <th>Request</th>
        <th>Keterangan</th>
        <th>Pesanan Masuk</th>
        <th>Pesanan Selesai</th>
        <th>Status</th>

        </tr>

        <?php
        $no=1;
        foreach($rekap as $rkp) : ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $rkp->perusahaan_nama ?></td>
                <td><?php echo $rkp->nama_ikan ?></td>
                <td><?php echo $rkp->request ?></td>
                <td><?php echo $rkp->umur ?></td>
                <td><?php echo $rkp->pesanan_masuk ?></td>
                <td><?php echo $rkp->pesanan_selesai ?></td>
                <td><?php echo $rkp->status ?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </table>
</div>
</body>
