<?php $this->load->view('templates_admin/header'); ?>
<?php $this->load->view('templates_admin/sidebar_penjualan'); ?>
<style>

      label {
        display: inline-block;
        width: 150px;
      }
</style>

<div class="container-fluid">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Penjualan</h6>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg">
                                      <?php foreach($penjualan as $katalog) : ?>
                                      <label>Nomor Pesanan</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value="<?php echo $katalog->no_penjualan ?>" disabled>
                                      </div>
                                      <div class="col-lg">
                                          <label>Nama Pembeli</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value= "<?php echo $katalog->nama_pembeli ?>" disabled>
                                      </div>                                      
                                      <div class="col-lg">
                                          <label>Tanggal dibuat</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value="<?php echo $katalog->tanggal_dibuat ?>" disabled>
                                      </div>
                                      <?php endforeach; ?>
                                  </div>
                                </div>
                             </div>
<div class="row">

<div class="col-md-5">
                            <!-- Basic Card Example -->
                            <div class="card shadow ml-5 mr-5" style="width: 90%;height: 35rem;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Form Ikan</h6>
                                </div>
                                <div class="card-body">
                                  <form action="<?php echo base_url().'admin/data_penjualan/tambah_penjualan/'.$id;?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label>Nama Ikan</label>
                                      <select id="nama_ikan" name="nama_ikan" class="form-control id">
                                      <?php foreach($ikan as $katalog) : ?>
                                      <option value="<?php echo $katalog->id ?>"><?php echo $katalog->nama_ikan?> - Rp <?php echo number_format($katalog->harga,0,',','.'); ?></option>
                                      <?php endforeach; ?>
                                      </select>
                                    </div>
                                      <div class="form-group">
                                        <label>Jumlah</label>
                                        <input id="jumlah" type="number" name="jumlah" class="form-control" required>
                                      </div>
                                      <br>
                                      <br>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                  </form>
                                </div>
                            </div>
</div>


                            <!-- Basic Card Example -->

                            
                            <div class="card shadow ml-5" style="width: 50%;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Preview pesanan</h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-hover text-nowrap">
                                <thead class="thead-dark">
                                  <tr>
                                  <th>No</th>
                                  <th>Nama ikan</th>
                                  <th>Jumlah</th>
                                  <th>Harga</th>
                                  <th>Subtotal</th>
                                  <th colspan="3">AKSI</th>
                                  </tr>
                                </thead>

                                  <?php
                                  $no=1;
                                  $total=0;
                                  foreach ($detail as $items): 
                                  $total += $items->subtotal_harga;
                                  $_SESSION["total"] = $total;
                                  ?>
                                      <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td style="display:none;" class="id_detail"><?php echo $items->id; ?></td>
                                        <td><?php echo $items->nama_ikan; ?></td>
                                        <td><?php echo $items->jumlah; ?></td>
                                        <td>Rp <?php echo number_format($items->harga,0,',','.'); ?></td>
                                        <td align="left">Rp <?php echo number_format($items->subtotal_harga,0,',','.'); ?></td>
                                        <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_detail"><i class="fas fa-trash"></i></button></td>
                                      </tr>
                                  <?php endforeach; ?>
                                  <?php  if(!empty($detail)) { ?>
                                      <tr>
                                        <td colspan="4" align="right">Total :</td>
                                        <td align="left">Rp <?php echo number_format($total,0,',','.') ?></td>
                                        <td><a class="btn btn-success" href="<?php echo base_url().'admin/data_penjualan/save/'.$id;?>" role="button">Save</a></td>
                                      </tr>
                                      <?php } ?>
                              </table>
                                </div>
                            </div>                 
  </div>
</div>
</div>


<!-- Modal Tambah -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Katalog Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/tambah_ikan';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama pembeli</label>
                    <input type="text" name="nama" class="form-control" required>
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
<div class="modal fade" id="edit_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/edit_ikan';?>" method="post" enctype="multipart/form-data">
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

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('admin/data_penjualan/hapus_ikan/'.$id); ?>">
      <div class="form-group">
      <input type="text" name="id_detail"  class="form-control id_detail_hapus" hidden>
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
<?php $this->load->view('templates_admin/footer'); ?>

<script>
    $('#edit_ikan').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_ikan = _row.find(".nama_ikan").text();
    var _stok = _row.find(".stok").text();
    var _deskripsi = _row.find(".deskripsi").text();
    var _id_ikan = _row.find(".id_ikan").text();
   


    $(this).find(".nama_ikan").val(_nama_ikan);
    $(this).find(".id_ikan").val(_id_ikan);
    $(this).find(".deskripsi").val(_deskripsi);
    $(this).find(".stok").val(_stok);
    });


    $('#hapus_detail').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    console.log("tr");
    var _row = _button.parents("tr");
    var _id_detail_hapus = _row.find(".id_detail").text();

    
    $(this).find(".id_detail_hapus").val(_id_detail_hapus);

    });

    // $(document).ready(function(){
    //   $('#nama_ikan').change(function(){
    //     var id = $(this).val();
    //     $.ajax({
    //       type: "POST",
    //       url: "",
    //       data: {
    //         id: id
    //       },
    //       dataType: "JSON",
    //       success: function (response){
    //         $('#jumlah').html(response);
    //       }
    //     })
    //   });
    // });
//     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
//     $(document).ready(function(){
//   $(".id").change(function(){
//     // var id = $(this).val();
//     // console.log(id);
//     alert("test");
//   });
// });

//       $.ajax({
//         type: "post",
//         url: "<?php echo base_url('Data_penjualan/ikan') ?>",
//         data: {
//             id: id
//           },
//         dataType: "JSON",
//         success: function (data){
//           console.log(data);
//         }
//       });
//     }
//     </script>
    
</script>