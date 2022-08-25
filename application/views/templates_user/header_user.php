<!DOCTYPE html>
<html lang="en">

<?php 
    if (is_null($_SESSION['id_user'])) {
        redirect('dashboard/masuk');
    }
    elseif ($_SESSION['tipe_user'] == 1) {
        redirect('admin/dashboard_admin/error');
    }
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mindfish</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> <!-- Font Awesome v5.15.4 -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css');?>">
    

    <style>
    th.dpass, td.dpass {display: none;}

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