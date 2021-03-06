<div class="container">

	<?php if ($items) : ?>

	<div class="row mt-3">
		<div class="col-12">
			<h1 class="span-title" style="color:#00CCFF; text-transform:uppercase;"><span>Check Order<span></h1>
		</div>

		<div class="col-xl-8 col-sm-12">

		
			<?php
				$no=1;
                foreach($items as $index => $itemCart)
                {?>
                <div class="checkout-details mt-3">
					<div class="card-body">
						<div class="row">
							<div class="col-xl-4 col-md-6 col-sm-12 text-center mt-4">
								<img class="checkout-img" src="<?= base_url(); ?>/assets/img/<?= $itemCart['photo']; ?>">
							</div>
							<div class="col-xl-8 col-md-6 col-sm-12">
								<p class="book-date"><i class="fa-solid fa-calendar-check"></i>&nbsp;<?= $itemCart['booking_date']; ?></p>
								<h4><?= $itemCart['produk']; ?></h4>
								<h4 class="text-primary"><b>$<?= $itemCart['qty']*$itemCart['harga']; ?></b></h5><br />
								<form action="<?= base_url(); ?>/contcart/update_qty" method="post" enctype="multipart/form-data">
									<?= csrf_field(); ?>
                                    <input type="number" name="qty" value="<?= $itemCart['qty']; ?>">
                                    <input type="hidden" name="rowid" value="<?= $index; ?>">
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary">&nbsp;
                                    <?= anchor('contcart/del_item_cart/'.$index,'Delete',array('class'=>'btn btn-danger')); ?>
                                </form>
							</div>
						</div>
					</div>
				</div>
                <?php
                $no++;
            }?>
			
			<div class="dropdown-divider"></div>

			<div class="checkout-details">
				<form action="<?= base_url(); ?>/contcart/next" method="post" enctype="multipart/form-data">
					<div class="card-body">
						<h4>Travelers Detail</h4>
						<?= csrf_field(); ?>
						<div class="row">
							<div class="col-lg-6 col-12">
								<p>First Name</p>
								<input type="text" name="firstname" class="form-control">
							</div>
							<div class="col-lg-6 col-12">
								<p>Last Name</p>
								<input type="text" name="lastname" class="form-control">
							</div>
							<div class="col-12">
								<p>Pick Up Address</p>
								<input type="text" name="pickup" class="form-control">
							</div>
							<div class="col-12 mt-3 text-center">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary text-center">
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>

		<div class="col-xl-4 col-sm-12 mt-3">
			<div class="checkout-review ">
				<div class="card-body">
					<h3>Review Order</h3>
					<div class="dropdown-divider"></div>
					<p>Total Price</p>
					<h6>$<?= $subtotal; ?></h6>
				</div>
			</div>
		</div>
	</div>

	<?php else : ?>

	<div class="col-lg-10 offset-lg-1 mt-4">
		<div class="card">
			<div class="card-body text-center">
				<img src="<?= base_url('assets/img/cart-empty.png'); ?>">
				<h3 class="mt-4 text-primary">OOps!, No Item Found</h3>
				<p class="h5">We cant find your item here or you have not made order. Please kindly make order first before continue</p>
				<a href="<?= base_url(); ?>" class="btn btn-primary mt-4">Back to home</a>
			</div>
		</div>
	</div>

	<?php endif; ?>

</div>