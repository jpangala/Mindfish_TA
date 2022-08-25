<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_landing/css2/styles.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_landing/css2/reset.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_landing/css2/style_detail.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets_product/css/gallery.css">

    <!-- scripts -->
    <script src="<?php echo base_url() ?>assets_landing/js/modernizr.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> <!-- Resource style -->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>


    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets_product/assets/favicon.ico" /> -->

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <title>Detail Produk</title>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav" style="background-color: #212529; padding-top:0.75rem; padding-bottom:0.75rem;">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url() . 'Landing_page/'; ?>"><img src="<?php echo base_url() ?>assets_landing/img/Logo-Vektor.png" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url() . 'Landing_page'; ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url() . 'Landing_page/product'; ?>">Produk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Product section-->
    <?php
    foreach ($product as $prdt) :
    ?>
        <div class="container-fluid tm-container-content tm-mt-60" style="margin-left: 6.5rem;">
            <div class="row mb-4">
                <h2 class="col-12 tm-text-primary"><?php echo $prdt->nama_ikan ?></h2>
            </div>
            <div class="row tm-mb-90">
                <div class="col-md-6 col-sm-12">
                    <img src="<?php echo base_url('assets_landing/img/ikan/'.$prdt->gambar) ?>" alt="Image" class="rounded">
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12" style="width: 28rem;">
                    <div class="tm-bg-gray tm-video-details" style="padding-top: 2rem; padding-bottom: 0rem;">
                        <h5 class="tm-text-gray-dark mb-3">Deskripsi</h5>
                        <p class="mb-4 text-justify">
                        <?php echo $prdt->deskripsi ?>
                        </p>
                        <div class="mb-4 d-flex flex-wrap">
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Harga: </span><span class="tm-text-primary">Rp <?php echo number_format($prdt->harga, 0, ',', '.') ?></span>
                            </div>
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Stok: </span><span class="tm-text-primary"><?php echo $prdt->stok ?> Ekor</span>
                            </div>
                            <a class="btn btn-success btn-md text-uppercase" style="margin:auto; margin-top:1rem;" href="https://api.whatsapp.com/send?phone=6282221834578" type="submit"><i class="fab fa-whatsapp fa-lg"></i> Tanyakan Lebih Lanjut!</a>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid, tm-container-content -->
    <?php endforeach; ?>
    
    <!-- Footer-->
    <footer class="py-4 bg-dark" style="bottom:0px; width:-webkit-fill-available;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Mindfish 2022</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets_product/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets_product/js/plugins.js"></script>
</body>

</html>