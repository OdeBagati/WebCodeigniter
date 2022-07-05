<!-- Cover -->
<div class="pt-5 pb-5 mt-0 align-items-center d-flex bg-dark cover-homepage"
style="background-image: url(<?= base_url(); ?>/assets/img/ulun-danu-temple.jpg);">
    <div class="container">
        <div class="row align-items-center d-flex justify-content-between">
            <div class="col-12 col-md-6 pb-5 order-2 order-sm-2 text-cover">
                <h1 class="text-white fw-bold mb-3 mt-5 display-4"><?= $judul_halaman; ?></h1>
                <p class="lead text-white"><?= $deskripsi; ?></p>
                <div class="d-flex mt-3 mb-1">
                <!-- <a class="btn btn-primary btn-raised text-uppercase btn-lg  mt-md-3 "
                href="#" role="button">Download Now</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cover -->

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