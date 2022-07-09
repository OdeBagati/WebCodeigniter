<div class="container mt-3">

	<!-- Breadcrumb -->
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="#" class="text-decoration-none"><?= $dataProduk->nama_kategori; ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $dataProduk->nama_produk; ?></li>
		</ol>
	</nav>

	<div class="row mt-3">
		<div class="col-12">
			<h1 style="font-size: 2rem;" class="text-info"><?= $dataProduk->nama_produk; ?></h1>
		</div>

		<!-- Slider -->
		<div class="col-lg-5 col-md-6 col-12">
			<ul class="ul-light" id="lightSlider">
				<?php foreach($dataGaleri->getResult() as $itemGaleri) : ?>
				<li data-thumb="<?= base_url() ?>/assets/img/<?= $itemGaleri->foto; ?>">
		            <img src="<?= base_url() ?>/assets/img/<?= $itemGaleri->foto; ?>" class="rounded-3 d-block w-100" alt="<?= $itemGaleri->alt_foto; ?>" />
		            <h5 class="text-center mt-1"><?= $itemGaleri->alt_foto; ?></h5>
		        </li>
				<?php endforeach; ?>
		    </ul>
		</div>
		<!-- End Slider -->

		<div class="col-lg-4 col-md-6 col-12 mt-4">
			<table class="table">
				<thead>
		            <tr>
		                <th><i class="far fa-clock"></i>&nbsp;&nbsp;Duration</th>
		                <th><?= $dataProduk->durasi; ?></th>
		            </tr>
		            <tr>
		                <th><i class="fas fa-users"></i>&nbsp;&nbsp;Min. Capacity</th>
		                <th><?= $dataProduk->min_kapasitas; ?> pax</th>
		            </tr>
		        </thead>
			</table>
			<p>Price :</p>
        	<p class="harga-aktivitas-b"><b>$<?= $dataProduk->harga; ?></b></p>
		</div>

		<div class="col-lg-3 col-sm-12 mt-4">
			<form action="<?= base_url(); ?>/contcart/insertCart" method="post" enctype="multipart/form-data">
        	<div class="card-booking">
        		<?= csrf_field(); ?>
            	<div class="card-body">
            		<h2 style=" font-size:25px;">Book Now!</h2>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-4 mb-2">
                        	<p>Quantity</p>
                        </div>
                        <div class="col-8 text-start">
                        	<input type="number" name="qty" class="form-control"  />
                        </div>
                        <div class="col-4">
                        	<p>Book Date</p>
                        </div>
                        <div class="col-8 text-start">
                        	<input type="date" name="booking_date" class="form-control"  />
                        </div>
                        <div class="col-12 mt-3 text-center">
                            <input type="hidden" name="idproduk" value="<?= $dataProduk->idproduk; ?>">
                            <input type="submit" name="submit" class="btn btn-primary text-white" value="Book Now!">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-12 mt-3 text-justify">
        	<?= $dataProduk->deskripsi_produk; ?>
        	<?= $dataProduk->harga_termasuk; ?>
        	<?= $dataProduk->harga_diluar; ?>
        	<?= $dataProduk->info_tambahan; ?>
        </div>
        
        <div class="col-lg-4 col-12 text-center">
        	<div class="card">
        		<div class="card-body">
        			<h2 style=" font-size:20px;" class="mb-1">You May Also Like</h2>
                    <div class="dropdown-divider"></div>
                    <ul class="recommendation">
                    	<?php
                            foreach ($produkList->getResult() as $listProduk)
                            {
                                echo '<li>'.anchor($listProduk->url_produk,$listProduk->nama_produk,array('class'=>'text-decoration-none')).'</li>';
                            }
                        ?>
                    </ul>
        		</div>
        	</div>
        </div>

	</div>
	
</div>