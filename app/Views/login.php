<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/bootstrap.4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/adminpage/vendor/fontawesome-free/css/all.min.css" />

	<script src="<?= base_url(); ?>/adminpage/vendor/jquery/jquery.min.js"></script>
	<title>Login to Joyfulbali.com</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">

					<div class="heading mb-3">
						<h4>Login into your account</h4>
					</div>

					<form action="<?= route_to('login') ?>" method="post">

						<?= view('Myth\Auth\Views\_message_block'); ?>

						<?= csrf_field() ?>

						<div class="form-input">
							<span><i class="fas fa-user"></i></span>
							<input type="text" name="login" class="<?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.emailOrUsername')?>" required>
						</div>

						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" class="<?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off" required autocomplete="off">
						</div>

						<div class="row mb-3">

							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" <?php if(old('remember')) : ?> checked <?php endif ?> id="cb1">
									<label class="custom-control-label text-white" for="cb1"><?=lang('Auth.rememberMe')?></label>
								</div>
							</div>

							<div class="col-6 text-right">
								<a href="<?= route_to('forgot') ?>" class="forget-link">Forget password</a>
							</div>

						</div>


						<div class="text-left mb-3">
							<button type="submit" class="btn">Login</button>
						</div>

						<!-- <div class="text-white mb-3">or login with</div>
						<div class="row mb-3">
							<div class="col-4">
								<a href="" class="btn btn-block btn-social btn-facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
							</div>
							<div class="col-4">
								<a href="" class="btn btn-block btn-social btn-google">
									<i class="fab fa-google"></i>
								</a>
							</div>
							<div class="col-4">
								<a href="" class="btn btn-block btn-social btn-twitter">
									<i class="fab fa-twitter"></i>
								</a>
							</div>
						</div> -->

							<div class="text-white">Don't have an account?
								<a href="<?= route_to('register') ?>" class="register-link">Register here</a>
							</div>

					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
			
		</div>
	</div>

	<script type="text/javascript">
		function PasswordReset() {
			$('form.reset-password-form').on('submit', function(e){
				e.preventDefault();
				$('.reset-form')
				.removeClass('d-block')
				.addClass('d-none');
				$('.reset-confirmation').addClass('d-block');
			});
		}

		window.addEventListener('load',function(){
			PasswordReset();
		});
	</script>
</body>
</html>