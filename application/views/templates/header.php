<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Management Barang &mdash; <?= $title ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/datatables.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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

<body>
	<input type="hidden" id="url" value="<?= base_url() ?>">
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg bg-primary"></div>
			<nav class="navbar navbar-expand-lg main-navbar float-left">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
					</ul>

				</form>
				<ul class="navbar-nav navbar-right">

					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Admin</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="index.html">Management Barang</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">MB</a>
					</div>
					<ul class="sidebar-menu">
						<!-- <li class="menu-header">Dashboard</li>
						<li class="dropdown">
							<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
								<li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
							</ul>
						</li> -->

						<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
						<li><a class="nav-link" href="<?= base_url() ?>Barang"><i class="fas fa-box-open"></i> <span>Data Barang</span></a></li>
						<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-cart-arrow-down"></i> <span>Data Penjualan</span></a></li>
						<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-cart-plus"></i> <span>Data Pembelian</span></a></li>
						<li><a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-users"></i> <span>Data Pelanggan</span></a></li>
						<li><a class="nav-link" href="<?= base_url() ?>Admin"><i class="fas fa-users-cog"></i> <span>Data Admin</span></a></li>

					</ul>


				</aside>
			</div>
