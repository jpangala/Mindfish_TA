  <title>Invoice</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/additional.css">
  <?php $this->load->view('templates_admin/header_dashboard'); ?>
  <?php $this->load->view('templates_admin/sidebar_akun'); ?>

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
                    <?php foreach ($penjualan as $pjl) : ?>
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                          <strong><?= $pjl->nama_pembeli ?></strong><br>
                          <?= $pjl->alamat_pengiriman ?><br>
                          *catatan*<br>
                          Phone: (555) 539-1037<br>
                          <!-- <?= $pjl->nama_pembeli ?> -->
                        </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <br>
                        <b>Invoice #<?= $pjl->no_penjualan ?></b><br>
                        <b>Order ID:</b> <?= $pjl->id ?><br>
                        <b>Payment Due: </b>*tanggal_selesai*<br>
                        <b>Account:</b> <?= $pjl->id_pembeli ?>
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
                          <th>Qty</th>
                          <th>Product</th>
                          <th>Serial #</th>
                          <th>Harga</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $total=0;
                        foreach ($detail as $item) : 
                        $total += $item->subtotal_harga;
                        ?>
                          <tr>
                            <td><?= $item->jumlah ?></td>
                            <td><?= $item->nama_ikan ?></td>
                            <td ><?= $item->id_ikan ?></td>
                            <td><?= number_format($item->harga, 0, ', ', '.') ?></td>
                            <td><?= number_format($item->subtotal_harga, 0, ', ', '.') ?></td>
                          </tr>
                        <?php endforeach ?>
                        <?php  if(!empty($detail)) { ?>
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

                <?php foreach ($penjualan as $pjl) : ?>
                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                      <p class="lead" style="margin: 0px;">Payment Methods:</p>
                      <p class="text-muted well well-sm shadow-none" style="margin-top: 2px;"><?= $pjl->nama_bank . ' - ' . $pjl->no_rek . ' a/n ' . $pjl->nama_penerima ?></p>
                      <br>
                      <a href="<?php echo base_url() . 'admin/data_penjualan'; ?>" class="btn btn-outline-primary" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
                    </div>
                  </div>
                <?php endforeach ?>
                <!-- /.row -->
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