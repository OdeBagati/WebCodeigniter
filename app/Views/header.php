<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?= $deskripsi_seo; ?>"/>
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="<?= $keyword_seo; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no"/>

    <link rel="stylesheet" href="<?= base_url('assets/css/lightslider.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.theme.min.css'); ?>" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fontawesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.5.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles.css'); ?>" />

    <title><?= $judul_seo; ?></title>
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

                <?php if(logged_in()) : ?>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Hello, <?= user()->firstname; ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= route_to('admin'); ?>"><i class="fas fa-fw fa-tachometer-alt"></i>&nbsp;Admin Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?= route_to('logout'); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mt-1 ms-1 me-1">
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li class="nav-item ms-1 me-1 mt-1">
                        <a class="nav-link" aria-current="page" href="<?= route_to('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    </ul>
                </div>
                <?php else : ?>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Hello, Dear</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= route_to('login'); ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
                                <li><a class="dropdown-item" href="<?= route_to('register'); ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;Register</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mt-1 ms-1 me-1">
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </li>
                        <li class="nav-item ms-1 me-1 mt-1">
                        <a class="nav-link" aria-current="page" href="<?= route_to('cart'); ?>"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    </ul>
                </div>
                <?php endif; ?>
                
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