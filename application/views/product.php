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

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />


    <style>
        /* @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .height {
            height: 100vh
        } */

        .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1)
        }

        .search input {
            height: 60px;
            text-indent: 25px;
            border: 1px solid #d6d4d4
        }

        .search input:focus {
            box-shadow: none;
            border: 1px solid #d6d4d4
        }

        .search .fa-search {
            position: absolute;
            top: 24px;
            left: 16px
        }

        .search button {
            position: absolute;
            top: 5px;
            right: 5px;
            height: 50px;
            width: 110px;
            background: #17a2b8;
        }
    </style>

    <title>Product Mindfish</title>
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

    <!-- Search bar -->
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 mt-5">
            <div class="search">
                <form action="<?php echo base_url() . 'Landing_page/search'; ?>" method="get">
                    <i class="fa fa-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Have a question? Ask Now">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Content Image -->
    <div class="row row-cols-1 row-cols-sm-4 g-4" style="margin: auto; padding: 50px 50px 50px 75px;">

        <?php
        foreach ($product as $prdt) :
        ?>
            <div class="col">
                <div class="card h-100" style="text-align: center;">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?php echo base_url('assets_landing/img/ikan/'.$prdt->gambar) ?>" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Detail</h2>
                            <?php echo anchor('Landing_page/detail/' . $prdt->id, '<div class="btn btn-primary btn-sm">Detail</div>') ?>
                        </figcaption>
                    </figure>
                    
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $prdt->nama_ikan ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer-->
    <footer class="py-4 bg-dark" style="position:fixed; bottom:0px; width:-webkit-fill-available;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Mindfish 2022</p>
        </div>
    </footer>

    <!-- Core theme JS-->
    <script src="<?php echo base_url() ?>assets_product/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets_product/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets_landing/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>assets_landing/js/velocity.min.js"></script>
    <script src="<?php echo base_url() ?>assets_landing/js/main.js"></script> <!-- Resource jQuery -->
</body>

</html>