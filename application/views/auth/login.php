<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
	<!-- Start GA -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> -->
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-94034622-3');
	</script>
	<!-- /END GA -->
</head>

<body class="bg-dark">
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<!-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
						</div>

						<div class="card card-primary">
							<div class="card-header">
								<!-- <h4>Login</h4> -->
								<img src="<?= base_url() ?>/assets/img/logo.jpeg" class="m-auto" style="width: 60%;" alt="logo">
							</div>
							<div class="container">
								<?php if ($this->session->flashdata('alert')) : ?>
									<div class="alert alert-danger"><?= $this->session->flashdata('alert') ?></div>
								<?php elseif ($this->session->flashdata('alertt')) : ?>
									<div class="alert alert-success"><?= $this->session->flashdata('alertt') ?></div>
								<?php endif; ?>
							</div>

							<div class="card-body">
								<form method="post" action="<?= base_url() . $action ?>" id="login">
									<div class="form-group">
										<div class="d-block">
											<label for="username">Username</label>
											<input type="text" class="form-control border-info" id="username" placeholder="Username" name="username" tabindex="1" autofocus>
										</div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
											<input type="password" class="form-control border-info" id="password" placeholder="Password" name="password" tabindex="2">
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>

							</div>
						</div>
						<?php if ($regis) : ?>
							<div class="text-white text-center">
								Belum Punya Akun? <a href="<?= base_url() ?>Auth/Register" class="text-warning" style="text-decoration: none">Register</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/node_modules/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/popper.js"></script>
	<script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
	<script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Page Specific JS File -->

	<!-- Template JS File -->
	<script src="<?= base_url() ?>assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>assets/js/custom.js"></script>
	<script src="<?= base_url() ?>assets/js/auth.js"></script>
</body>

</html>
