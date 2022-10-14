<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user'); ?>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Informasi Transaksi</h6>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                      <div class="col-lg">
                                      <label>Nomor Pesanan</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value="<?php echo $_SESSION['no_penjualan'] ?>" disabled>
                                      </div>
                                      <div class="col-lg">
                                          <?php foreach($user as $usr) : ?>
                                          <label>Nama Pembeli</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value= "<?php echo $usr->nama_customer ?>" disabled>
                                          <?php endforeach; ?>
                                      </div>                                      
                                      <div class="col-lg">
                                          <label>Tanggal dibuat</label>
                                          <input style="text-align: center;" type="text" name="jumlahstok" class="form-control" value="<?php echo date('d-m-Y'); ?>" disabled>
                                      </div>
                                  </div>
                                </div>
                             </div>
<div class="row">

<div class="col-md-5">
                            <!-- Basic Card Example -->
                            <div class="card shadow ml-5 mr-5" style="width: 90%;height: 35rem;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary text-center">Form Pembayaran</h6>
                                </div>
                                <div class="card-body">
                                  <form id="form1" action="<?php echo base_url().'user/data_user/tambah_penjualan'?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                        <label>Bank Pembayaran</label>
                                          <select id="" name="bank" class="form-control id">
                                            <?php foreach($pembayaran as $pmbyrn) : ?>
                                            <option value="<?php echo $pmbyrn->id ?>"><?php echo $pmbyrn->nama_bank .' - '.  $pmbyrn->no_rekening .' a/n '.  $pmbyrn->nama_penerima?></option>
                                            <?php endforeach; ?>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pengiriman</label>
                                        <?php foreach($user as $usr) : ?>
                                        <input type="text" name="alamat" class="form-control" value="<?php echo $usr->alamat_customer ?>" disabled>
                                        <?php endforeach; ?>
                                      </div>
                                      <div class="form-group">
                                        <?php foreach($user as $usr) : ?>
                                        <label style="width: 200px;">Nomor Telepon Penerima</label>
                                        <input type="tel" name="catatan" class="form-control"  value="<?php echo $usr->nomor_telp?>" disabled>
                                        <!-- placeholder="Format : 081234567891" pattern="[0-9]{12}" -->
                                        <?php endforeach; ?>
                                      </div>
                                      <br>
                                      <div class="d-grid gap-2">
                                        <button class="btn btn-success">Pembayaran</button>
                                      </div>
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
                                  </tr>
                                </thead>

                                  <?php
                                  $no=1;
                                  $total=0;
                                  foreach ($this->cart->contents() as $items): 
                                  ?>
                                      <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td style="display:none;" class="id_detail"><?php echo $items->id; ?></td>
                                        <td><?php echo $items ['name'] ?></td>
                                        <td><?php echo $items ['qty'] ?></td>
                                        <td>Rp <?php echo number_format($items['price'], 0,', ','.') ?></td>
                                        <td align="left">Rp <?php echo number_format($items['subtotal'], 0,', ','.'); ?></td>
                                      </tr>
                                  <?php endforeach; ?>
                                  <?php  if(!empty($this->cart->contents())) { ?>
                                      <tr>
                                        <td colspan="4" align="right">Total :</td>
                                        <td align="left">Rp <?php echo number_format($this->cart->total(),0,',','.') ?></td>
                                      </tr>
                                      <?php } ?>
                              </table>
                              <a class="btn btn-primary" href="<?php echo base_url().'user/data_user/katalog'?>" role="button">Kembali Belanja</a>
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

    document.querySelector('#form1').addEventListener('submit', function(e) {
      var form = this;

      e.preventDefault();

      Swal.fire({
        title: 'Apakah Anda Ingin Lanjut Ke Halaman Pembayaran?',
        icon: 'info',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Pembayaran',
        confirmButtonColor: '#1cb024',
        denyButtonText: `Kembali Belanja`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          form.submit();
        } else if (result.isDenied) {
          window.location = "<?= base_url().'user/data_user/katalog'?>"
        }
      })
    })

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
