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

    <form action="<?= base_url(); ?>/contcategory/form" method="post" enctype="multipart/form-data">

        <div class="row">

            <?= csrf_field(); ?>

            <div class="offset-lg-1 col-lg-10 mt-3">

                <div class="card h-auto">
                    <div class="card-header bg-gradient-primary">
                        <p class="h4 text-white text-center">Detail Kategori</p>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Nama Kategori</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="nama_kategori" class="form-control" value="<?= isset($nama_kategori)?$nama_kategori:set_value('nama_kategori'); ?>">

                                <input type="hidden" name="idkategori" class="form-control" value="<?= isset($idkategori)?$idkategori:set_value('idkategori'); ?>">

                                <input type="hidden" name="idslug" class="form-control" value="<?= isset($idslug)?$idslug:set_value('idslug'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Parent</label>
                            <div class="col-xl-6 col-md-6">
                                <select name="parent" class="form-control">
                                    <option value="0">No Parent</option>
                                    <?php
                                        use App\Models\Mdlcategory;
                                        $this->objCategory=new Mdlcategory;
                                        $cat_option=$this->objCategory->getAllCatforAdm();
                                        
                                        foreach ($cat_option as $indexCat =>$itemcat)
                                        {
                                            echo '<option'.set_select('idkategori',$itemcat['idkategori'],true).' value="'.$itemcat['idkategori'].'">'.$itemcat['nama_kategori'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">URL Kategori</label>
                            <div class="col-xl-8 col-md-6">
                                <input type="text" name="url_kategori" class="form-control" value="<?= isset($url_kategori)?$url_kategori:set_value('url_kategori'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="offset-lg-1 col-xl-2 col-md-2 form-label">Deskripsi</label>
                            <div class="col-xl-8 col-md-6">
                                <textarea class="summernote" name="deskripsi" class="tinyMCE form-control" rows="3"></textarea>
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