<?php $this->load->view('templates_admin/header');?>
<?php $this->load->view('templates_admin/sidebar_dashboard');?>
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Perubahan Stok Hari ini</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stok ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Annual) Card Example -->
                                <div class="col-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Jumlah Ikan</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all('ikan') ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Grafik Penjualan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col-lg">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary text-center">Penjualan Yang Sedang Diproses</h6>
                                    </div>
                                    <div class="card-body">
                                        <table id="tables" class="table table-hover text-nowrap">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Penjualan</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>Total Harga</th>
                                                    <th>Tanggal Dibuat</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                           
                                            $no=1;
                                            foreach ($proses as $prs):
                                            ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?= $prs->no_penjualan?></td>
                                                    <td><?= $prs->nama_pembeli?></td>
                                                    <td>Rp <?= number_format($prs->total_harga,0,',','.')?></td>
                                                    <td><?= $prs->tanggal_dibuat?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            <!-- End of Main Content -->

<?php 
    $penjualan = "";
    $tanggal = "";
  foreach ($grafik1 as $row) :
    $pjl1 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik2 as $row) :
    $pjl2 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik3 as $row) :
    $pjl3 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik4 as $row) :
    $pjl4 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik5 as $row) :
    $pjl5 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik6 as $row) :
    $pjl6 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik7 as $row) :
    $pjl7 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik8 as $row) :
    $pjl8 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;
  foreach ($grafik9 as $row) :
    $pjl9 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik10 as $row) :
    $pjl10 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik11 as $row) :
    $pjl11 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;

  foreach ($grafik12 as $row) :
    $pjl12 = $row->jumlah;
    // $penjualan .= "'$pjl'" . ",";

    $tgl = substr($row->tanggal_dibuat,8,-9);
    $tanggal .= "'$tgl'" . ",";
  endforeach;
    $test = "'$pjl1',"."'$pjl2',"."'$pjl3',"."'$pjl4','$pjl5',"."'$pjl6',"."'$pjl7',"."'$pjl8','$pjl9',"."'$pjl10',"."'$pjl11',"."'$pjl12'";
?>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<?php $this->load->view('templates_admin/footer');?>
    <!-- Datatables.net -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

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
    // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Januari','Februari','Maret','April','Juni','Juli','Agustus','September','Oktober','November','Desember'],
    datasets: [{
      label: "Jumlah Penjualan Perbulan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?= $test ?>],

    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>
<script>
  $(document).ready(function() {
    $('#tables').DataTable();
} );
</script>

    <?php
    if ($this->session->flashdata('message') && $this->session->flashdata('icon')) {
        unset($_SESSION['message']);
        unset($_SESSION['icon']);
    }
    ?>
