<?php $this->load->view('templates_admin/header');?>
<?php $this->load->view('templates_admin/sidebar_stok');?>
<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_stok"><i class="fas fa-plus fa-sm"></i> Update Stok</button>
    <table id="tables" class="table table-bordered">
    <thead class="thead-dark">
        <tr>
        <th>No</th>
        <th>No1</th>
        <th>Noo</th>
        <th>Nama Ikan</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Timestamp</th>
        <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($stok as $katalog) : ?>
            <tr>
                <td class="no"><?php echo $no++ ?></td>
                <td style="display:none;" class="id_stok"><?php echo $katalog->id ?></td>
                <td style="display:none;" class="id_ikan"><?php echo $katalog->id_ikan ?></td>
                <td class="nama_ikan"><?php echo $katalog->nama_ikan ?></td>
                <td class="stok"><?php echo $katalog->status ?></td>
                <td class="keterangan"><?php echo $katalog->keterangan ?></td>
                <td class="tanggal"><?php echo $katalog->tanggal ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_stok"><i class="fas fa-edit"></i></button>
                <a href="<?php echo base_url('admin/data_katalog/hapus_stok/'.$katalog->id); ?>" class="btn btn-danger btn-sm tombol_hapus"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/tambah_stok';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <select name="nama_ikan" class="form-control">
                    <?php foreach($ikan as $katalog) : ?>
                    <option value="<?php echo $katalog->id ?>"><?php echo $katalog->nama_ikan ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required>
                </div>             
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="datetime-local" name="tanggal" class="form-control" required>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?php echo base_url().'admin/data_katalog/edit_stok';?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="text" name="id_ikan" class="form-control id_ikan" hidden>
            </div>
            <div class="form-group">
                    <input type="text" name="id_stok" class="form-control id_stok" hidden>
            </div>
            <div class="form-group">
                    <input type="text" name="nama_ikan" class="form-control nama_ikan" hidden>
            </div>
            <div class="form-group">
                    <label>Nama Ikan</label>
                    <select name="id_ikan" class="form-control">
                    <?php foreach($ikan as $katalog) : ?>
                    <option value="<?php echo $katalog->id ?>"><?php echo $katalog->nama_ikan ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control stok" required>
            </div>
            <div class="form-group">
                    <label>keterangan</label>
                    <input type="text" name="keterangan" class="form-control keterangan" required>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus_stok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="POST" action="<?php echo base_url('admin/data_katalog/hapus_stok'); ?>">
        <div class="form-group">
          <input type="text" name="id_stok"  class="form-control id_stok_hapus" hidden>
            <p> Apakah Anda yakin ingin menghapus Data Stok berikut? </p>
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
  $(document).ready(function() {
    $('#tables').DataTable({
      "retrieve":true,"responsive": true, "lengthChange": false, "autoWidth": false,"ordering": false,
      "aoColumnDefs": [ { "sClass": "dpass", "aTargets": [1,2]} ]
    });
} );
</script>


<script>
    $('#edit_stok').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _nama_ikan = _row.find(".nama_ikan").text();
    var _stok = _row.find(".stok").text();
    var _keterangan = _row.find(".keterangan").text();
    var _nama_pembudidaya = _row.find(".nama_pembudidaya").text();
    var _id_ikan = _row.find(".id_ikan").text();
    var _id_stok = _row.find(".id_stok").text();

    
    $(this).find(".nama_ikan").val(_nama_ikan);
    $(this).find(".nama_pembudidaya").val(_nama_pembudidaya);
    $(this).find(".id_ikan").val(_id_ikan);
    $(this).find(".id_stok").val(_id_stok);
    $(this).find(".keterangan").val(_keterangan);
    $(this).find(".stok").val(_stok);
    });

    $('#hapus_stok').on('shown.bs.modal', function (e) {
    var _button = $(e.relatedTarget);
    // console.log(_button, _button.parents("tr"));
    var _row = _button.parents("tr");
    var _id_stok_hapus = _row.find(".id_stok").text();

    
    $(this).find(".id_stok_hapus").val(_id_stok_hapus);

    });

</script>
</script>
<?php $this->load->view('templates_admin/footer');?>
<script>
      $('.tombol_hapus').on('click', function(e) {

      e.preventDefault();
      const href = $(this).attr('href');

      Swal.fire({
        title: 'Apakah anda yakin ingin menghapus data stok berikut?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
    })
    </script>
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
  <?php
    if ($this->session->flashdata('message') && $this->session->flashdata('icon')) {
        unset($_SESSION['message']);
        unset($_SESSION['icon']);
    }
    ?>


