<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KGA | Kelola Akun</title>
<style>
th.dpass, td.dpass {display: none;}

.colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
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
  <!-- Select 2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-all.min.css');?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.bootstrap4.min.css');?>">
  <!-- Sweet Alert  -->
  <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/sweetalert2.min.css');?>">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <?= $this->include('Backdoor/Admin/Sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelola Akun</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Backdoor/welcome');?>">Home</a></li>
              <li class="breadcrumb-item active">Kelola Akun</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="card">

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th style="text-align: center;">No.</th>
              <th class="noExport" style="text-align: center;" hidden>id_admin</th>
              <th style="text-align: center;">Username</th>
              <th style="text-align: center;">Tipe User</th>
              <th style="text-align: center;" hidden>id_tipe</th>
              <th class="noExport" style="text-align: center;">Aksi</th>

            </tr>
            </thead>
            <tbody>
          <?php

          $num = 1;
          foreach ($admin as $row) { ?>
            <tr>
              <td class="num" style="text-align: center;"><?php echo $num;?></td>
              <td class="id_admin" style="text-align: center;"><?php echo $row['id_admin'];?></td>
              <td class="username" style="text-align: center;"><?php echo $row['username'];?></td>
              <td class="tipe_user" style="text-align: center;"><?php if($row['tipe_user'] === '1') echo 'Super Admin';elseif($row['tipe_user'] === '2') echo "Admin"; ?></td>
              <td class="id_tipe" style="text-align: center;"><?php echo $row['tipe_user'];?></td>
              <td style="text-align: center;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" <?php if($row['tipe_user'] == '1') echo "disabled";?>><i class="fas fa-trash"></i> Hapus</button>
              </td>
            </tr>
          <?php $num++;} ?>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="editModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="editManage" action="<?php echo base_url('Backdoor/Edit_Manage'); ?> ">
        <input type="text" name="id_admin"  class="form-control id_admin" hidden>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control username" required>
        </div>
        <div class="form-group">
          <label for="password">Password Baru</label>
          <input type="password" name="password" class="form-control" placeholder="Dapat dikosongkan">
        </div>
        <div class="form-group">
          <label for="tipeUser">Tipe User</label>
          <select id="select2EditUser" class="form-control select2 tipe_user" style="width:100%" name="tipe_user" >
              <option value="1">Super Admin</option>
              <option value="2">Admin</option>
          </select>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('Backdoor/Delete_Manage'); ?>">
      <div class="form-group">
      <input type="text" name="id_admin"  class="form-control id_admin_delete" hidden>
      <p> Apakah Anda yakin ingin menghapus akun ini? </p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
      <button type="submit" class="btn btn-danger">Ya</button>
    </form>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" id="addManage" action="<?php echo base_url('Backdoor/Add_Manage'); ?>" >
      <div class="form-group">
        <label for="username">Username Admin</label>
        <input type="text" name="username" id="username_admin" class="form-control" required placeholder="Silahkan mengisi username admin">
      </div>
      <div class="form-group">              
        <label for="harga">Password Admin</label>
        <input type="text" name="password" id="password_admin" class="form-control" required placeholder="Password menjadi username + 123" readonly>
      </div>
      <div class="form-group">
        <label for="merek">Tipe User</label>
        <select id="select2AddUser" class="form-control select2 tipe_user" style="width:100%" name="tipe_user" required>
            <option></option>
            <option value="2">Super Admin</option>
            <option value="2">Admin</option>
        </select>
    </div>
  </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
  </div>
</div>
</div>









  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
<!-- Select 2  -->
<script src="<?php echo base_url('assets/select2/js/select2.full.min.js');?>"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/js/jquery-validation/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-validation/additional-methods.min.js');?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/responsive.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jszip.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/pdfmake.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/buttons.colVis.min.js');?>"></script>
<!-- Sweet Alert  -->
<script src="<?php echo base_url('assets/sweetalert/sweetalert2.min.js');?>"></script>




<script>

/* Autofill password textbox */
$(function(){
  $("#username_admin").keyup(function(){
    $("#password_admin").val($(this).val()+"123");
  });
});

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
var message = <?php echo json_encode(session()->getFlashdata('message')) ?>;
var icon = <?php echo json_encode(session()->getFlashdata('icon')) ?>;

/*  sweet alert message */
if(Boolean(message)){  
  Toast.fire({
  icon: icon,
  title: message
  })
      }

  



$(function () {
    $("#example1").DataTable({
                        "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
                        "buttons": [
                        {text: 'Tambah Admin',action: function (e, node, config){$('#addModal').modal('show')}}
                                  ],
                        "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [ 1,4 ]} ]

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



  });


  $('.select2').select2()

  $('#select2EditUser').select2({
          dropdownParent: $('#editModal'),
          
      });

  $('#select2AddUser').select2({
          dropdownParent: $('#addModal'),
          placeholder: "Silahkan memilih tipe admin"
      });


 






  $('#editModal').on('show.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _username = _row.find(".username").text();
    var _id_admin = _row.find(".id_admin").text();
    var _id_tipe = _row.find(".id_tipe").text();
   
    $(this).find(".username").val(_username);
    $(this).find(".id_admin").val(_id_admin);
    $('#select2EditUser').val(_id_tipe);
    $('#select2EditUser').trigger('change');

    });



$('#deleteModal').on('show.bs.modal', function (e) {
  var _button = $(e.relatedTarget);
  // console.log(_button, _button.parents("tr"));
  var _row = _button.parents("tr");
  var _id_admin = _row.find(".id_admin").text();
  $(this).find(".id_admin_delete").val(_id_admin);

});



$(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#addManage').validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,

      },
      tipe_user: {
        required: true
      },

    },
 
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

$(function () {
  $.validator.setDefaults({
    submitHandler: function (form) {
      form.submit();
    }
  });
  $('#editManage').validate({
    rules: {
      username: {
        required: true,
      },
      tipe_user: {
        required: true,

      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

</script>




</body>
</html>
