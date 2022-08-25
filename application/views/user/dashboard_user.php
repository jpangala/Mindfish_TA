<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user'); ?>

<body style="margin-top: 0;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Form START -->
                <div class="row gx-5">
                    <!-- Contact detail -->
                    <div class="col-6 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-3 rounded">
                            <div class="row g-3" style="padding-top: 1rem;">
                                <h4 class="mt-0">Profil</h4>
                                <?php foreach ($user as $usr) : ?>
                                    <form id="form1" action="<?php echo base_url() . 'user/data_user/update_profile'; ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6 pb-2">
                                            <!-- Nama -->
                                            <label class="form-label">Nama Lengkap *</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" value="<?= $usr->nama_user; ?>">
                                        </div>
                                        <!-- Update -->
                                        <div class="gap-3 mt-4 justify-content-md-end text-center">
                                            <button class="btn btn-primary btn-sm" style="float: right;">Update profile</button>
                                        </div>
                                    </form>
                                    <!-- Ubah Password Button -->
                                    <div class="col-4" style="position: relative; bottom: 47px;">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahpassword" style="float: left;">Change Password</button>
                                    </div>
                                <?php endforeach; ?>

                            </div> <!-- Row END -->
                        </div>
                    </div>
                    <!-- Pesanan yang sedang di proses -->
                    <div class="col-6 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-3 rounded">
                            <div class="row g-3" style="padding-top: 1rem;">
                                <h4 class="mt-0">Pesanan Berlangsung</h4>
                                <!-- Tabel Pesanan Berlangsung -->
                                <table id="tables" class="table table-bordered table-light table-hover">
                                    <thead class="thead-dark" style="font-size: smaller;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Pesanan</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($penjualan as $pjl) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $pjl->no_penjualan; ?></td>
                                            <td><?php echo $pjl->status; ?></td>
                                            <td>Rp <?php echo number_format($pjl->total_harga, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div> <!-- Row END -->
                        </div>
                    </div>
                </div> <!-- Row END -->
                </form> <!-- Form END -->
            </div>
        </div>
    </div>

    <!-- Modal Change Password -->
    <? foreach ($user as $usr) : ?>
        <div class="modal fade" id="ubahpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    </div>
                    <!-- change password -->
                    <form action="<?php echo base_url() . 'user/data_user/update_password'; ?>" method="post" enctype="multipart/form-data">
                    <div class="col-xxl-6">
                        <div class="bg-secondary-soft px-4 py-3 rounded">
                            <div class="row g-3">
                                <!-- Old password -->
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                    <input type="password" name="oldpass" class="form-control" id="exampleInputPassword1" required>
                                </div>
                                <!-- New password -->
                                <div class="col-md-6">
                                    <label for="exampleInputPassword2" class="form-label">New password *</label>
                                    <input type="password" name="newpass" class="form-control" id="exampleInputPassword2" required>
                                </div>
                                <!-- Confirm password -->
                                <div class="col-md-12">
                                    <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                                    <input type="password" name="confirmpass" class="form-control" id="exampleInputPassword3" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Ubah</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <? endforeach ?>
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #9b9ca1;
        }

        .bg-secondary-soft {
            background-color: rgba(209, 210, 219, 0.4) !important;
        }

        .rounded {
            border-radius: 5px !important;
        }

        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .file-upload .square {
            height: 250px;
            width: 250px;
            margin: auto;
            vertical-align: middle;
            border: 1px solid #e5dfe4;
            background-color: #fff;
            border-radius: 5px;
        }

        .text-secondary {
            --bs-text-opacity: 1;
            color: rgba(208, 212, 217, 0.5) !important;
        }

        .btn-success-soft {
            color: #28a745;
            background-color: rgba(40, 167, 69, 0.1);
        }

        .btn-danger-soft {
            color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 0.9375rem;
            font-weight: 400;
            line-height: 1.6;
            color: #29292e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #e5dfe4;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 5px;
            -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }
    </style>

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

        /*  sweet alert message */
        if (Boolean(message)) {
            Toast.fire({
                icon: icon,
                title: message
            })
        }
    </script>
    <script>
      document.querySelector('#form1').addEventListener('submit', function(e) {
      var form = this;

      e.preventDefault();

      Swal.fire({
        title: 'Apakah anda yakin ingin memperbarui profile anda?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Perbarui',
        cancelButtonText: 'Tidak'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          form.submit();
        }
      })
    })
    </script>
    <?php
    if ($this->session->flashdata('message') && $this->session->flashdata('icon')) {
        unset($_SESSION['message']);
        unset($_SESSION['icon']);
    }
    ?>
</body>

</html>