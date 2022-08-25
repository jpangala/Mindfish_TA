<link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/additional.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/gallery.css">

<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user'); ?>
<div class="container-fluid">
  <a data-toggle="modal" data-target="#hapus_ikan" href="<?php echo base_url('user/data_user/detail_keranjang') ?>" class="btn btn-sm btn-danger mt-2">Item Keranjang : <?php echo count($this->cart->contents()); ?></a>
  <div class="row text-center mt-4">
    <div class="tm-gallery-page">
      <?php foreach ($ikan as $brg) : ?>
        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
          <div class="card mb-5">
            <figure class="effect-ming tm-video-item">
              <img src="<?php echo base_url('assets_landing/img/ikan/' . $brg->gambar) ?>" class="card-img-top" alt="...">
              <figcaption class="d-flex align-items-center justify-content-center">
                <h2>Detail</h2>
                <?php echo anchor('user/data_user/detail_product/' . $brg->id, '<div class="order-now-link">Detail</div>') ?>
              </figcaption>
            </figure>
            <div class="card-body" style="padding: 10px;">
              <h5 class="tm-gallery-title"><?php echo $brg->nama_ikan ?></h5>
              <span class="tm-gallery-price">Rp <?php echo number_format($brg->harga, 0, ', ', '.') ?></span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('admin/data_katalog/hapus_ikan'); ?>">
          <div class="form-group">
            <table id="table" class="table table-striped">
              <tr>
                <th>No</th>
                <th>Nama Ikan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
              <?php
              $no = 1;
              foreach ($this->cart->contents() as $items) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $items['name'] ?></td>
                  <td><?php echo $items['qty'] ?></td>
                  <td>Rp. <?php echo number_format($items['price'], 0, ', ', '.') ?></td>
                  <td>Rp. <?php echo number_format($items['subtotal'], 0, ', ', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('user/data_user/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
        <a href="<?php echo base_url('user/data_user/pembayaran') ?>" class="btn btn-sm btn-success">Checkout</a>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal gambar -->
<div class="modal fade" id="gambar_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url('assets_landing/img/ikan/') ?>arwana_superred" class="card-img-top" alt="...">
        <p id="test" class="test"></p>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <?php $this->load->view('templates_admin/footer'); ?>



  <script>
        /*  Initialize Sweet Alert */
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true
        })

        /*  get session message and color */
        var message = <?php echo json_encode($this->session->flashdata('message')) ?>;
        var icon = <?php echo json_encode($this->session->flashdata('icon')) ?>;

        console.log(message);

        /*  sweet alert message */
        if (Boolean(message)) {
            Toast.fire({
                icon: icon,
                title: message
            })
        }
    </script>
  <script>
    $('#edit_ikan').on('shown.bs.modal', function(e) {
      var _button = $(e.relatedTarget);
      // console.log(_button, _button.parents("tr"));
      var _row = _button.parents("tr");
      var _nama_ikan = _row.find(".nama_ikan").text();
      var _stok = _row.find(".stok").text();
      var _deskripsi = _row.find(".deskripsi").text();
      var _id_ikan = _row.find(".id_ikan").text();
      var _harga = _row.find(".harga").text();




      $(this).find(".nama_ikan").val(_nama_ikan);
      $(this).find(".id_ikan").val(_id_ikan);
      $(this).find(".deskripsi").val(_deskripsi);
      $(this).find(".stok").val(_stok);
      $(this).find(".harga").val(_harga);
    });


    $('#hapus_ikan').on('shown.bs.modal', function(e) {
      var _button = $(e.relatedTarget);
      // console.log(_button, _button.parents("tr"));
      var _row = _button.parents("tr");
      var _id_ikan_hapus = _row.find(".id_ikan").text();


      $(this).find(".id_ikan_hapus").val(_id_ikan_hapus);

    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tables').DataTable({
        "aoColumnDefs": [{
          "sClass": "dpass",
          "aTargets": [1]
        }]

      });
    });
  </script>
    <?php
    if ($this->session->flashdata('message') && $this->session->flashdata('icon')) {
        unset($_SESSION['message']);
        unset($_SESSION['icon']);
    }
    ?>