  <title>Invoice</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/additional.css">
  <?php $this->load->view('templates_user/header_user'); ?>
  <?php $this->load->view('templates_user/sidebar_user'); ?>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3>Invoice</h3>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div> -->

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                    <div class="col-12">
                      <h4>
                        <img src="<?php echo base_url() ?>assets_landing/img/Logo-Vektor.png" style="height: 2rem;" alt="" />
                        <small class="float-right"><?php echo date('d-m-Y'); ?></small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Mindfish</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: Mindfish@gmail.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <?php foreach ($info as $pjl) : ?>
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                          <strong><?= $pjl->nama_customer ?></strong><br>
                          <?= $pjl->alamat_customer ?><br>
                          <br>
                          Phone: <?= $pjl->nomor_telp ?><br>
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <br>
                        <b>Invoice #<?= $pjl->no_transaksi ?></b><br>
                        <b>Order ID:</b> <?= $pjl->id ?><br>
                        <b>Payment Due: </b>*tanggal_selesai*<br>
                        <b>Account:</b> <?= $pjl->id_customer ?>
                      </div>
                      <!-- /.col -->
                  </div>
                <?php endforeach ?>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Jumlah</th>
                          <th>Nama Ikan</th>
                          <th>Serial #</th>
                          <th>Harga</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $total=0;
                        foreach ($penjualan as $pjl) : 
                        $total += $pjl->subtotal_harga;
                        ?>
                          <tr>
                            <td><?= $pjl->jumlah ?></td>
                            <td><?= $pjl->nama_ikan ?></td>
                            <td><?= $pjl->id_ikan ?></td>
                            <td><?= number_format($pjl->harga, 0, ', ', '.') ?></td>
                            <td><?= number_format($pjl->subtotal_harga, 0, ', ', '.') ?></td>
                          </tr>
                        <?php endforeach ?>
                        <?php  if(!empty($penjualan)) { ?>
                          <tr>
                            <td colspan="4" align="right">Total :</td>
                            <td align="left">Rp <?php echo number_format($total,0,',','.') ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <?php foreach ($info as $pjl) : ?>
                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      <p class="lead" style="margin: 0px;">Payment Methods:</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 2px;"><?= $pjl->nama_bank . ' - ' . $pjl->no_rekening . ' a/n ' . $pjl->nama_penerima ?></p>
                      <br>
                      <form action="<?php echo base_url('user/data_user/submit_pembayaran/' . $pjl->no_transaksi) ?>" method="post" enctype="multipart/form-data">
                        <label for="exampleFormControlFile1">Input Bukti Pembayaran Disini</label>
                        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1" required>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                    </div>
                    <!-- /.col -->
                  </div>
                <?php endforeach ?>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                      Payment
                    </button>
                  </div>
                </div>
                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <?php $this->load->view('templates_admin/footer'); ?>
  </body>

  </html>