    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Produk</h1>
        </div>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
            <li class="breadcrumb-item active">Produk</li>
        </ol>

        <!-- Content Row -->
        <div class="row m-1">

            <div><p class="h5 text-justify">Halaman ini adalah halaman dimana admin dapat melihat produk yang tersedia di website. Admin dapat menambahkan, mengubah, atau menghapus produk di halaman ini</p></div>

        </div>

        <!-- Product List -->

        <div class="card mb-4">
            <div class="card-header">
                <?= anchor('admin/product-form','Add Data',array('class'=>'btn btn-info')); ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambaar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Gambaar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no=1;
                            foreach($dataProduk->getResult() as $itemProduk)
                            { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><img class="card-img-top img-admin" src="<?= base_url() ?>/assets/img/<?= $itemProduk->foto_produk; ?>"></td>
                                    <td><?= $itemProduk->nama_produk; ?></td>
                                    <td><?= $itemProduk->nama_kategori; ?></td>
                                    <td><?= $itemProduk->harga; ?></td>
                                    <td>
                                        <?= 
                                            anchor('admin/product-form'.'/'.$itemProduk->idproduk,'<i class="far fa-edit"></i>&nbsp;&nbsp;Update',array('class'=>'btn btn-success btn-sm'));
                                            echo "<br \>"; 
                                            echo anchor('admin/delete-product/'.$itemProduk->idproduk,'<i class="fas fa-trash"></i>&nbsp;&nbsp;Delete',array('class'=>'btn btn-danger btn-sm mt-1'));
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