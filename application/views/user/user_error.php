<?php $this->load->view('templates_user/header_user'); ?>
<?php $this->load->view('templates_user/sidebar_user'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">*Halaman Tidak Dapat Diakses*</p>
                        <a href="javascript:history.back()">&larr; Kembali</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">test
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view('templates_admin/footer'); ?>
