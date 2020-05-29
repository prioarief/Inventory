<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>

		<div class="section-body">
			<div class="col-12">
				<div class="container mb-5">
					<?php if ($this->session->flashdata('alert')) : ?>
						<div class="alert alert-success"><?= $this->session->flashdata('alert') ?></div>
					<?php endif; ?>
					<!-- <div class="hero bg-primary text-white">
						<div class="hero-inner">
							<h2>Welcome, <?= $this->session->userdata('nama') ?>!</h2>
							<p class="lead">Gunakan Dengan Bijak.</p>
							<div class="mt-4">
								<a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
							</div>
						</div>
					</div> -->
				</div>
				<?php if ($this->session->userdata('buyer')) : ?>
					<div class="row">
						<div class="col-md-4">
							<a href="<?= base_url('Transaksi/RiwayatTransaksi/'. $this->session->userdata('id')) ?>" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px blue; ">
									<div class="container py-4">
										<i class="fas fa-chart-area" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Riwayat Transaksi <small class="text-danger" style="font-size: 17px">(<?= $riwayat ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?= base_url() ?>Keranjang" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px red; ">
									<div class="container py-4">
										<i class="fas fa-shopping-cart" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Keranjang Belanja <small class="text-danger" style="font-size: 17px">(<?= count($this->cart->contents()) ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php else : ?>
					<div class="row">
						<div class="col-md-4">
							<div class="card bg-primary">
								<div class="container py-4">
									Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum harum suscipit error unde ducimus nam magnam asperiores iusto facilis. Distinctio qui facere quia quod! Hic totam qui eligendi vero rem.
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
