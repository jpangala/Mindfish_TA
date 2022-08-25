<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Mindfish</title>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url() ?>assets_landing/css2/styles.css" rel="stylesheet" />

    <style>
        header.masthead1 {
            padding-top: 10.5rem;
            padding-bottom: 6rem;
            text-align: center;
            color: #fff;
            background-image: url("https://www.pcc.edu/web-services/wp-content/uploads/sites/6/2017/05/default-header-overlay.png");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }

        header.masthead1 .masthead1-subheading {
            font-size: 1.5rem;
            font-style: italic;
            line-height: 1.5rem;
            margin-bottom: 25px;
            font-family: "Droid Serif", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        header.masthead1 .masthead1-heading {
            font-size: 3.25rem;
            font-weight: 700;
            line-height: 3.25rem;
            margin-bottom: 2rem;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .portfolio-item1 {
            max-width: 25rem;
            margin-left: auto;
            margin-right: auto;
        }

        .portfolio-item1 .portfolio-link1 {
            position: relative;
            display: block;
            margin: 0 auto;
        }

        .portfolio-item1 .portfolio-link1 .portfolio-hover1 {
            display: flex;
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(54, 164, 254, 0.9);
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity ease-in-out 0.25s;
        }

        .portfolio-item1 .portfolio-link1 .portfolio-hover1 .portfolio-hover-content1 {
            font-size: 1.25rem;
            color: white;
        }

        .portfolio-item1 .portfolio-link:hover .portfolio-hover1 {
            opacity: 1;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url() ?>assets_landing/img/Logo-Vektor.png" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url() . 'Dashboard/masuk' ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url() . 'landing_page/product' ?>">Product</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                    <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li> -->
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>