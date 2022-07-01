<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <title>New Body</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="New Body"/>
    <meta name="keywords" content="New Body" />
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no"/>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome.min.css'); ?>" />
    <link href="<?= base_url('assets/css/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.5.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css'); ?>" />

    <script async src="https://cse.google.com/cse.js?cx=004566218386616212635:ht7uqmd5ezx"></script>

    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/fontawesome.min.js"></script>
    
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

    <!-- Cover -->
    
    <div class="container">

        <!-- Kategori -->
        <div class="row mt-3">
            <?php foreach($dataKategori as $key => $itemKategori) : ?>
            <div class="col col-xl-2 col-md-4 col-sm-6">
                <a href="#" class="text-decoration-none link-dark">
                <img class="cat-img" src="<?= base_url(); ?>/assets/img/<?= $itemKategori->thumbnail; ?>">
                <h5 class="cat-title mt-1"><b><?= $itemKategori->nama_kategori; ?></b></h5>
                <p class="text-secondary">69 product</p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    
</body>