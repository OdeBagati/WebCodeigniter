<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Form</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
        <li class="breadcrumb-item"><a href="<?= route_to('admin/gallery-list'); ?>">Galeri Foto</a></li>
        <li class="breadcrumb-item active">Form Galeri</li>
    </ol>

    <!-- Show Error List -->
    <?= isset($validation)?$validation->listErrors():''; ?>

    <!-- Product Form -->

    <form action="<?= base_url(); ?>/contgallery/form" method="post" enctype="multipart/form-data">

        <div class="row">

            <?= csrf_field(); ?>

            <div class="offset-lg-2 col-lg-8 mt-3 text-center mb-4">

                <div class="card h-auto">

                    <div class="card-body">
                    
                        <div class="form-group row">
                            <?php
                                if(isset($foto))
                                { ?>
                                    <div class="col-xl-4 col-md-6 text-center">
                                        <img class="card-img mb-3 w-75" src="<?= base_url(); ?>/assets/img/<?= $foto; ?>">
                                    </div>
                                    <?php
                                }
                            ?>
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Foto</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="file" name="upload_photo" class="form-control">
                                <input type="hidden" name="idgaleri" class="form-control" value="<?= isset($idgaleri)?$idgaleri:set_value('idgaleri'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Alt. Foto</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="alt_foto" class="form-control" value="<?= isset($alt_foto)?$alt_foto:set_value('alt_foto'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Produk</label>
                            <div class="col-xl-6 col-md-6">
                                <input type="text" name="idproduk" class="form-control" value="<?= isset($idproduk)?$idproduk:set_value('idproduk'); ?>">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row form-group mt-3">
                    <label class="col-xl-2 col-form-label"></label>
                    <div class="col-xl-10 text-center">
                        <input type="submit" name="submit" class="btn btn-info" value="Save Data">
                    </div>
                </div>

            </div>

        </div>

    </form>

    <!-- End Product Form -->

</div>