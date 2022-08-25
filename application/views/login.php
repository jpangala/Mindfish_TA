
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Mindfish</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css');?>">

    <style>
        .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
        color: white;
        }

        .colored-toast .swal2-close {
        color: white;
        }

        .colored-toast .swal2-html-container {
        color: white;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="">
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                       
                                    </div>

                           <form action="<?php echo base_url().'Dashboard/login';?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username"  class="form-control" required>
                                  </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password"  class="form-control" required>
                                </div>
                      </div>
                      <div class="modal-footer mb-2">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                      </div>
                      </form>
                      <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url().'Dashboard/daftar';?>">Belum memiliki Akun? Buat sekarang</a>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js');?>"></script>

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
        if(Boolean(message)){  
        Toast.fire({
        icon: icon,
        title: message
        })
            }
    </script>
    <?php 
              if($this->session->flashdata('message') && $this->session->flashdata('icon') ){
                unset($_SESSION['message']);
                unset($_SESSION['icon']);
              }
    ?>
</body>

</html>