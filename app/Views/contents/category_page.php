<?php
	use App\Models\Mdlcategory;
    $this->objCategory=new Mdlcategory;
    $paramParent=array('parent'=>$dataKategori->idkategori);

    $item=$this->objCategory->getDataBy($paramParent);
?>
<div class="container mt-3">

	<!-- Breadcrumb -->
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $dataKategori->nama_kategori; ?></li>
		</ol>
	</nav>

	<div class="row text-center">
		<div class="col-12">
			<h1 style="color:#00CCFF; text-transform:uppercase;"><?= $dataKategori->nama_kategori; ?></h1>
		</div>

		<div class="col-12 mt-3">
			<?= $dataKategori->deskripsi; ?>
		</div>

		<div class="dropdown-divider"></div>

	</div>

	<div class="row text-center">
		<?php if($dataKategori->parent=="0") : ?>
			<?php foreach($item->getResult() as $itemKategori) : ?>
				<div class="col-lg-3 col-md-4 col-12 mt-3 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top position-relative" src="<?= base_url(); ?>/assets/img/<?= $itemKategori->thumbnail; ?>" alt="<?= $itemKategori->alt_thumb; ?>"  />
                        <div class="card-body">
                            <h3 class="card-title text-primary"><?= $itemKategori->nama_kategori; ?></h3>
                            <p class="card-text"><?= $itemKategori->deskripsi_seo; ?></p>
                        </div>
                        <div class="card-footer">
                            <a><?= anchor("#",'More Info',array('class'=>'btn btn-info')); ?></a>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php else : ?>
			<?php foreach($dataProduk->getResult() as $itemProduk) : ?>
				<div class="col-lg-3 col-md-4 col-12 mt-3 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top position-relative" src="<?= base_url(); ?>/assets/img/<?= $itemProduk->thumbnail; ?>" alt="<?= $itemProduk->alt_thumb;; ?>"  />
                        <div class="card-body">
                            <h3 class="card-title text-primary"><?= $itemProduk->nama_produk; ?></h3>
                            <p class="card-text"><?= $itemProduk->penjelasan_singkat; ?></p>
                            <h5><strong>Price :</strong></h5>
                            <p class="price-after"><strong>$<?= $itemProduk->harga; ?></strong></p>
                        </div>
                        <div class="card-footer">
                            <a><?= anchor("#",'More Info',array('class'=>'btn btn-info')); ?></a>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>			
	</div>

</div>