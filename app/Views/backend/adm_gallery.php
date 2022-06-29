<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery List</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
        <li class="breadcrumb-item active">Gallery</li>
    </ol>

    <!-- Content Row -->
    <div class="row m-1">

        <div><p class="h5 text-justify">Halaman ini adalah halaman dimana admin dapat melihat galeri foto yang tersedia di website. Admin dapat menambahkan, mengubah, atau menghapus galeri foto di halaman ini</p></div>

    </div>

    <!-- Product List -->

    <div class="card mb-4">
        <div class="card-header">
            <?= anchor('admin/gallery-form','Add Data',array('class'=>'btn btn-info')); ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($dataGaleri->getResult() as $itemGaleri){ ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img class="card-img-top img-admin" src="<?= base_url() ?>/assets/img/<?= $itemGaleri->foto; ?>"></td>
                                <td><?= $itemGaleri->nama_produk; ?></td>
                                <td>
                                    <?php
                                        echo anchor('admin/gallery-form'.'/'.$itemGaleri->idgaleri,'<i class="far fa-edit"></i>&nbsp;&nbsp;Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "&nbsp"; 
                                        echo anchor('admin/delete-photo'.'/'.$itemGaleri->idgaleri,'<i class="fas fa-trash"></i>&nbsp;&nbsp;Delete',array('class'=>'btn btn-danger btn-sm'));
                                    ?>        
                                </td>
                            </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- End Product List -->

</div>

<!-- End of Main Content -->