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
				</div>
				<?php if ($this->session->userdata('buyer')) : ?>
					<div class="row">
						<div class="col-md-4">
							<a href="<?= base_url('Transaksi/RiwayatTransaksi/' . $this->session->userdata('id')) ?>" class="text-dark" style="text-decoration: none">
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
							<a href="<?= base_url('Transaksi/TransaksiTertunda') ?>" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px blue; ">
									<div class="container py-4">
										<i class="fas fa-chart-area" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Transaksi Tertunda <small class="text-danger" style="font-size: 17px">(<?= $transaksi_pending ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
						<?php if ($this->session->userdata('role') == 'Super Admin') : ?>
							<div class="col-md-4">
								<a href="<?= base_url() ?>Admin" class="text-dark" style="text-decoration: none">
									<div class="card shadow-md" style="border-bottom: solid 7px red; ">
										<div class="container py-4">
											<i class="fas fa-users-cog" style="font-size: 2.5rem"></i>
											<h6 class="my-2">Data Admin <small class="text-danger" style="font-size: 17px">(<?= $admin ?>)</small></h6>
										</div>
									</div>
								</a>
							</div>
						<?php endif; ?>
						<div class="col-md-4">
							<a href="<?= base_url() ?>Keranjang" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px green; ">
									<div class="container py-4">
										<i class="fas fa-box-open" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Data Barang <small class="text-danger" style="font-size: 17px">(<?= $barang ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?= base_url() ?>Transaksi/Penjualan" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px orange; ">
									<div class="container py-4">
										<i class="fas fa-cart-arrow-down" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Penjualan <small class="text-danger" style="font-size: 17px">(<?= $transaksi_sukses ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?= base_url() ?>Transaksi/Pembelian" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px black; ">
									<div class="container py-4">
										<i class="fas fa-cart-plus" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Pembelian <small class="text-danger" style="font-size: 17px">(<?= $pembelian ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="<?= base_url() ?>Welcome/Pelanggan" class="text-dark" style="text-decoration: none">
								<div class="card shadow-md" style="border-bottom: solid 7px brown; ">
									<div class="container py-4">
										<i class="fas fa-users" style="font-size: 2.5rem"></i>
										<h6 class="my-2">Data Pelanggan <small class="text-danger" style="font-size: 17px">(<?= $pelanggan ?>)</small></h6>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
