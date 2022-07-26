<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/bootstrap.4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/adminpage/vendor/fontawesome-free/css/all.min.css" />

	<script src="<?= base_url(); ?>/adminpage/vendor/jquery/jquery.min.js"></script>
	<title>Register to Joyfulbali.com</title>
	<style type="text/css">
		input[type='date']:in-range::-webkit-datetime-edit-year-field,input[type='date']:in-range::-webkit-datetime-edit-month-field,input[type='date']:in-range::-webkit-datetime-edit-day-field,input[type='date']:in-range::-webkit-datetime-edit-text{  color: transparent;}

	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<!-- <div class="logo mt-5 mb-3">
						<img src="assets/img/bali-indah.png" width="125px">
					</div> -->
					<div class="heading mb-3">
						<h4>Create an account</h4>
					</div>
					<form action="<?= route_to('register') ?>" method="post">
						<?= view('Myth\Auth\Views\_message_block'); ?>
                        <?= csrf_field(); ?>
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<div class="form-input">
									<span><i class="fas fa-user"></i></span>
									<input type="text" name="firstname" placeholder="Enter Your Firstname" class="<?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>" value="<?= old('lastname') ?>" required>
								</div>
							</div>
							<div class="col-lg-6 col-sm-12">
								<div class="form-input">
									<span><i class="fas fa-user"></i></span>
									<input type="text" name="lastname" placeholder="Enter Your Lastname" class="<?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>" value="<?= old('lastname') ?>" required>
								</div>
							</div>
						</div>
						<div class="form-input">
							<span><i class="fas fa-at"></i></span>
							<input type="text" name="username" placeholder="Enter Your Username" class="<?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" value="<?= old('username') ?>" required>
						</div>
						<!-- <div class="mb-3">
							<select name="gender" class="form-control">
								<option selected>Select your gender</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div> -->
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="text" name="email" placeholder="Enter Your Email Address" class="<?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" value="<?= old('email') ?>" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Enter Your Password" class="<?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" autocomplete="off" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="pass_confirm" placeholder="Confirm Password" class="<?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" required>
						</div>
						<!-- <div class="row mb-3">
							<div class="col-12 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">I agree all terms & conditions</label>
								</div>
							</div>
						</div> -->
						<div class="text-left mb-3">
							<button type="submit" class="btn">Register</button>
						</div>
						<!-- <div class="text-white mb-3">or register with</div>
						<div class="row mb-3">
							<div class="col-4">
								<a href="#" class="btn btn-block btn-social btn-facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="btn btn-block btn-social btn-google">
									<i class="fab fa-google"></i>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="btn btn-block btn-social btn-twitter">
									<i class="fab fa-twitter"></i>
								</a>
							</div>
						</div> -->
						<div class="text-white">Already have an account?
							<a href="<?= route_to('login') ?>" class="login-link">Login here</a>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container img-fluid"></div>
			
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