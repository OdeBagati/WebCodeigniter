<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Form</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
        <li class="breadcrumb-item"><a href="<?= route_to('admin/product-list'); ?>">List Produk</a></li>
        <li class="breadcrumb-item active">Edit Produk</li>
    </ol>

    <!-- Show Error List -->
    <?= isset($validation)?$validation->listErrors():''; ?>

    <!-- Product Form -->

    <form action="<?= base_url(); ?>/contproduct/form" method="post" enctype="multipart/form-data">

        <div class="row">

            <?= csrf_field(); ?>

            <div class="offset-lg-1 col-lg-4 text-right mt-2">
                <div class="card h-auto text-center">
                    <div class="card-header bg-gradient-primary">
                        <p class="h4 text-white">Foto Produk</p>
                    </div>
                    <div class="card-body">
                        <p class="p-admin">Foto Produk</p>
                        <?php
                            if(isset($foto_produk))
                            { ?>
                                <img class="card-img mb-3 w-75" src="<?= base_url(); ?>/assets/img/<?= $foto_produk; ?>">
                                <?php
                            }
                        ?>
                        <input type="file" name="upload_photo" class="form-control">
                        <p class="p-admin">Alt. Foto</p>
                        <input type="text" name="alt_thumb" class="form-control" value="<?= isset($alt_foto)?$alt_foto:set_value('alt_foto'); ?>">
                    </div>
                </div>   
            </div>

            <div class="col-lg-6 text-left mt-2">
                <div class="card h-auto text-center">
                    <div class="card-header bg-gradient-primary">
                        <p class="h4 text-white">Info Produk</p>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="idproduk" class="form-control" value="<?= isset($idproduk)?$idproduk:set_value('idproduk'); ?>">
                        <p class="p-admin">Nama Produk</p>
                        <input type="text" name="nama_produk" class="form-control" value="<?= isset($nama_produk)?$nama_produk:set_value('nama_produk'); ?>">
                        <p class="p-admin">Kategori</p>
                        <select name="idkategori" class="form-control">
                        <?php
                            use App\Models\Mdlcategory;
                            $this->objCategory=new Mdlcategory;
                            $cat_option=$this->objCategory->getAllCatforAdm();
                            
                            foreach ($cat_option as $indexCat =>$itemcat)
                            {
                                echo '<option value="'.$itemcat['idkategori'].'">'.$itemcat['nama_kategori'].'</option>';
                            }
                        ?>
                        </select>
                        <p class="p-admin">Harga</p>
                        <input type="number" name="harga" class="form-control" value="<?= isset($harga)?$harga:set_value('harga'); ?>">
                        <p class="p-admin">Min. Kapasitas</p>
                        <input type="number" name="min_kapasitas" class="form-control" value="<?= isset($min_kapasitas)?$min_kapasitas:set_value('min_kapasitas'); ?>">
                        <p class="p-admin">Durasi</p>
                        <input type="text" name="durasi" class="form-control" value="<?= isset($durasi)?$durasi:set_value('durasi'); ?>">
                        <p class="p-admin">URL Produk</p>
                        <input type="text" name="url_produk" class="form-control" value="<?= isset($url_produk)?$url_produk:set_value('url_produk'); ?>">
                        <input type="hidden" name="idslug" class="form-control" value="<?= isset($idslug)?$idslug:set_value('idslug'); ?>">
                    </div>
                </div>
            </div>

            <div class="offset-lg-1 col-lg-10 mt-3">

                <div class="card h-auto">
                    <div class="card-header bg-gradient-primary">
                        <p class="h4 text-white text-center">Detail Produk</p>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Penjelasan Singkat</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="penjelasan_singkat" class="form-control" value="<?= isset($penjelasan_singkat)?$penjelasan_singkat:set_value('penjelasan_singkat'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Deskripsi</label>
                            <div class="col-xl-8 col-md-6">
                                <textarea name="deskripsi" class="summernote form-control" rows="3"></textarea>
                                <div class="button_set mt-1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Harga Termasuk</label>
                            <div class="col-xl-8 col-md-6">
                                <textarea name="harga_termasuk" class="summernote form-control" rows="3"></textarea>
                                <div class="button_set mt-1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Harga Tidak Termasuk</label>
                            <div class="col-xl-8 col-md-6">
                                <textarea name="harga_diluar" class="summernote form-control" rows="3"></textarea>
                                <div class="button_set mt-1">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Info Tambahan</label>
                            <div class="col-xl-8 col-md-6">
                                <textarea name="info_tambahan" class="summernote form-control" rows="3"></textarea>
                                <div class="button_set mt-1">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="offset-lg-1 col-lg-10 mt-3 text-center mb-4">

                <div class="card h-auto">
                    <div class="card-header bg-gradient-primary text-center">
                        <p class="h4 text-white">Keperluan SEO</p>
                    </div>

                    <div class="card-body">
                    
                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Judul SEO</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="judul_seo" class="form-control" value="<?= isset($judul_seo)?$judul_seo:set_value('judul_seo'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Deskripsi SEO</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="deskripsi_seo" class="form-control" value="<?= isset($deskripsi_seo)?$deskripsi_seo:set_value('deskripsi_seo'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Keyowrd SEO</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="keyword_seo" class="form-control" value="<?= isset($keyword_seo)?$keyword_seo:set_value('keyword_seo'); ?>">
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