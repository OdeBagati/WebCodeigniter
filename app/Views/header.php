<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <title>New Body</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="New Body"/>
    <meta name="keywords" content="New Body" />
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no"/>

    
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.theme.min.css'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.5.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css'); ?>" />

    <script async src="https://cse.google.com/cse.js?cx=004566218386616212635:ht7uqmd5ezx"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/slick.min.js">"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/main.js"></script>
    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-1 me-1">
                        <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <?= $main_menu; ?>
                    <li class="nav-item ms-1 me-1">
                        <a class="nav-link" aria-current="page" href="<?= base_url('cotact-us'); ?>">Contact Us</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Hello, Dear</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mt-1">
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search activity here</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="gcse-search"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal-->

    <!-- Cover -->
    <div class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark cover-homepage"
    style="background-image: url(<?= base_url(); ?>/assets/img/ulun-danu-temple.jpg);">
        <div class="container">
            <div class="row align-items-center d-flex justify-content-between">
                <div class="col-12 col-md-6 pb-5 order-2 order-sm-2 text-cover">
                    <h1 class="text-white fw-bold mb-3 mt-5 display-4">Bali Tour and Travel</h1>
                    <p class="lead text-white">A collection of coded HTML and CSS elements to help your build your new website. Clean design, fully responsive and based on Bootstrap 5.</p>
                    <div class="d-flex mt-3 mb-1">
                    <!-- <a class="btn btn-primary btn-raised text-uppercase btn-lg  mt-md-3 "
                    href="#" role="button">Download Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    
    <div class="container">

        <!-- List Kategori -->
        <div class="row mb-3 mt-3">
            <div class="col-12">
                <h3 class="span-title text-center"><span>find activity here</span></h3>
            </div>
        </div>

        
        <!-- End List Kategori -->
        <div class="row mt-3 slider">
            <?php foreach($dataKategori as $key => $itemKategori) : ?>
            <div class="col-12 p-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <a href="#" class="text-decoration-none link-dark">
                            <img class="cat-img" src="<?= base_url(); ?>/assets/img/<?= $itemKategori->thumbnail; ?>">
                            <h3 class="cat-title mt-2"><b><?= $itemKategori->nama_kategori; ?></b></h3>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- End List Kategori -->

        <div class="row text-center mt-3">
            <div class="col-12">
                <h3 class="span-title"><span>Why Choose Us?</span></h3>
            </div>
        </div>

        <div class="row text-center mt-3">
            
            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="card shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-dollar-sign text-info icon"></i>
                        <h3 class="cat-title mt-2"><b>Cheap Price</b></h3>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="card shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-map-location-dot text-info icon"></i>
                        <h3 class="cat-title mt-2"><b>Many Option</b></h3>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 p-3">
                <div class="card shadow">
                    <div class="card-body">
                        <i class="fa-solid fa-user-tie text-info icon"></i>
                        <h3 class="cat-title mt-2"><b>Professional</b></h3>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    
    <footer class="container pt-4 my-md-5 pt-md-5 border-top mb-0 mt-3">
        <div class="row">
            <div class="col-12 col-md">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url(); ?>/assets/img/bali-indah.png" style="width: 100px; height: 100px;" />
                </a>
                <small class="d-block mb-3 mt-3 text-muted">© 2021-<script>document.write(new Date().getFullYear());</script></small>
            </div>
            <div class="col-6 col-md">
                <h5>Watersport Package</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-single-activity'); ?>">Single Activity</a>
                    </li>
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-packages'); ?>">Watersport Packages</a>
                    </li>
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-seawalker-packages'); ?>">Seawalker</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Adventure</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="#">Rafting</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">Trekking</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">ATV Ride</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Tour</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="#">Full Day Tour</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">Half Day Tour</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    
    <div class="text-center py-3 copyright bg-primary text-white">Copyright &copy;
        <a href="<?= base_url(); ?>" class="a-footer text-white">Joyfulbali.com <script>document.write(new Date().getFullYear());</script> </a>
    </div>
    
</body>