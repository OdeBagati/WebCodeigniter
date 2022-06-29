<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List URL</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
        <li class="breadcrumb-item active">Route</li>
    </ol>

    <!-- Content Row -->
    <div class="row m-1">

        <div><p class="h5 text-justify">Halaman ini adalah halaman dimana admin dapat melihat URL yang tersedia di website. Admin dapat menambahkan, mengubah, atau menghapus URL di halaman ini</p></div>

    </div>

    <!-- Product List -->

    <div class="card mb-4">
        <div class="card-header">
            <?= anchor('admin/route-form','Add Data',array('class'=>'btn btn-info')); ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>URL Slug</th>
                            <th>Route Target</th>
                            <th>Filter</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>URL Slug</th>
                            <th>Route Target</th>
                            <th>Filter</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($dataRoute->getResult() as $itemRoute)
                        { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $itemRoute->slug; ?></td>
                                <td><?= $itemRoute->target; ?></td>
                                <th><?= $itemRoute->filters; ?></th>
                                <td>
                                    <?= 
                                        anchor('admin/route-form'.'/'.$itemRoute->idslug,'<i class="far fa-edit"></i>&nbsp;&nbsp;Update',array('class'=>'btn btn-success btn-sm'));
                                        echo "<br \>"; 
                                        echo anchor('admin/delete-route'.'/'.$itemRoute->idslug,'<i class="fas fa-trash"></i>&nbsp;&nbsp;Delete',array('class'=>'btn btn-danger btn-sm mt-1'));
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

    <!-- End Route List -->

</div>

<!-- End of Main Content -->