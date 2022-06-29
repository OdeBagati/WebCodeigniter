<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category List</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin') ?>">Dashboard</a>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>

    <!-- Content Row -->
    <div class="row m-1">

            <div><p class="h5 text-justify">Halaman ini adalah halaman dimana admin dapat melihat kategori yang tersedia di website. Admin dapat menambahkan, mengubah, atau menghapus kategori di halaman ini</p></div>

        </div>

    <!-- Category List -->

    <div class="card mb-4">
        <div class="card-header">
            <?= anchor('admin/category-form','Add Data',array('class'=>'btn btn-info')); ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Parent</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Parent</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($dataKategori as $itemKategori)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $itemKategori['nama_kategori']; ?></td>
                                <td><?= is_null($itemKategori['parent'])?"No Parent" : $itemKategori['parent']; ?></td>
                                <td><?= $itemKategori['deskripsi']; ?></td>
                                <td>
                                    <?= 
                                        anchor('admin/category-form'.'/'.$itemKategori['idkategori'],'<i class="far fa-edit"></i>&nbsp;&nbsp;Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "<br \>"; 
                                        echo anchor('admin/delete-category'.'/'.$itemKategori['idkategori'],'<i class="fas fa-trash"></i>&nbsp;&nbsp;Delete',array('class'=>'btn btn-danger btn-sm mt-1'));
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

    <!-- End Category List -->

</div>

<!-- End of Main Content -->