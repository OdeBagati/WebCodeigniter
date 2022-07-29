<div class="container">

	<div class="row mt-3">
		<div class="col-12">
			<h1 class="span-title" style="color:#00CCFF; text-transform:uppercase;"><span>Checkout<span></h1>
		</div>

		<div class="col-xl-8 col-sm-12">

			<?php if ($items) : ?>
				<?php
					$no=1;
                    foreach($items as $index => $itemCart)
                    {?>
                    <div class="checkout-details mt-3">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4 col-md-6 col-sm-12 text-center mt-2">
									<img class="checkout-img" src="<?= base_url(); ?>/assets/img/<?= $itemCart['photo']; ?>">
								</div>
								<div class="col-xl-8 col-md-6 col-sm-12">
									<p class="book-date"><i class="fa-solid fa-calendar-check"></i>&nbsp;<?= $itemCart['booking_date']; ?></p>
									<h4><?= $itemCart['produk']; ?>(x<?= $itemCart['qty']; ?>)</h4>
									<h4 class="text-primary"><b>$<?= $itemCart['qty']*$itemCart['harga']; ?></b></h5><br />
								</div>
							</div>
						</div>
					</div>
                    <?php
                    $no++;
                }?>
			<?php endif; ?>

			<div class="dropdown-divider"></div>

			<div class="checkout-details">
				<div class="card-body">
					<h4>Travelers Detail</h4>
					<?= csrf_field(); ?>
					<div class="row">
						<div class="col-lg-4 col-12">
							<p>First Name</p>
							<p class="namespace h5"><?= $arrOrder['firstname']; ?></p>
						</div>
						<div class="col-lg-4 col-12">
							<p>Last Name</p>
							<p class="namespace h5"><?= $arrOrder['lastname']; ?></p>
						</div>
						<div class="col-lg-4 col-12">
							<p>Pick Up Address</p>
							<p class="namespace h5"><?= $arrOrder['pickup']; ?></p>
						</div>
						<div class="col-12 mt-3 text-center">
							<button data-bs-toggle="modal" data-bs-target="#continueModal" class="btn btn-primary">Order Now!</button>
						</div>
					</div>
				</div>
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

	<div class="modal fade" id="continueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body text-center">
					<h3><strong>Thank you for your order</strong></h3>
					<p class="mt-4 h5">your total payment is <strong class="text-primary h4">$<?= $subtotal; ?></strong>, please kindly pay via transfer to</p><br>
					<p class="h4">(account number)</p>
					<p class="h5">(account owner)<br><br>Minimum payment is 25% of total payment</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url(); ?>" type="button" class="btn btn-primary">Save changes</a>
				</div>
			</div>
		</div>
	</div>

</div>