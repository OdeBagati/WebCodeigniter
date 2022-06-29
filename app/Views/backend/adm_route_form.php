<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">URL Form</h1>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= route_to('admin'); ?>">Dashboard</a>
        <li class="breadcrumb-item"><a href="<?= route_to('admin/route-list'); ?>">URL</a></li>
        <li class="breadcrumb-item active">URL Form</li>
    </ol>

    <!-- Show Error List -->
    <?= isset($validation)?$validation->listErrors():''; ?>

    <!-- Product Form -->
    <form action="<?= base_url(); ?>/controute/form" method="post" enctype="multipart/form-data">

        <?= csrf_field(); ?>

        <div class="form-group row">
            <input type="text" name="idslug" class="form-control" value="<?= isset($idslug)?$idslug:set_value('idslug'); ?>" hidden>
        </div>

        <div class="form-group row">
            <label class="col-xl-2 col-md-2 form-label">URL Slug</label>
            <div class="col-xl-8 col-md-6">
                <input type="text" name="slug" class="form-control" value="<?= isset($slug)?$slug:set_value('slug'); ?>">   
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-2 col-md-2 form-label">URL Target</label>
            <div class="col-xl-8 col-md-6">
                <input type="text" name="target" class="form-control" value="<?= isset($target)?$target:set_value('target'); ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-2 col-md-2 form-label">Filter</label>
            <div class="col-xl-8 col-md-6">
                <input type="text" name="filters" class="form-control" value="<?= isset($filters)?$filters:set_value('filters'); ?>">
            </div>
        </div>

        <div class="row form-group">
            <label class="col-xl-2 col-form-label"></label>
            <div class="col-xl-10 text-center">
                <input type="submit" name="submit" class="btn btn-info" value="Save Data">
            </div>
        </div>

    </form>

    <!-- End Route Form -->

</div>