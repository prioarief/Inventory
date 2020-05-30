<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Invoice</h1>
		</div>

		<div class="section-body">
			<div class="invoice">
				<div class="invoice-print">
					<div class="row">
						<div class="col-lg-12">
							<?php if ($this->session->flashdata('alert')) : ?>
								<div class="alert alert-success alert-sm">Checkout Berhasil!</div>
							<?php endif; ?>
							<h3>Invoice Transaksi</h3>
							<div class="row">
								<div class="col-md">
									<address>
										<strong>Pembeli :</strong>
										<?= $customer['nama'] ?><br>
										<strong>Tanggal Pembelian :</strong>
										<?= date('d-m-Y H:i:s', strtotime($customer['tanggal'])) ?><br>
										<strong>Status Pembelian :</strong>
										<?php if ($customer['status'] == 0) {
											echo '<mark>Pending (Menunggu konfirmasi Admin)</mark>' . '<br>';
										} elseif ($customer['status'] == 2) {
											echo 'Transaksi Di Batalkan' . '<br>';
										} else {
											echo 'Sukses' . '<br>';
										} ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-12">
							<div class="section-title">Detail Pembelian</div>
							<div class="table-responsive">
								<table class="table table-striped table-hover table-md">
									<tr>
										<th data-width="40">#</th>
										<th>Item</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Qty</th>
										<th class="text-right">Total</th>
									</tr>
									<?php $no = 1; ?>
									<?php foreach ($item as $brg) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $brg['nama_barang'] ?></td>
											<td class="text-center">Rp. <?= number_format($brg['harga']) ?></td>
											<td class="text-center"><?= $brg['jumlah'] ?></td>
											<td class="text-right">Rp. <?= number_format($brg['harga'] * $brg['jumlah']) ?></td>
										</tr>
									<?php endforeach; ?>
								</table>
							</div>
							<div class="row mt-2">
								<div class="col-lg text-right">
									<div class="invoice-detail-item">
										<div class="invoice-detail-name">Subtotal</div>
										<div class="invoice-detail-value">Rp. <?= number_format($customer['total_harga']) ?></div>
									</div>
									<hr class="mt-2 mb-1">
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="text-md-right">
					<?php if ($this->session->userdata('role')) : ?>
						<?php if ($customer['status'] == 0) : ?>
							<button class="btn btn-success konfirmasi" data-id="<?= $customer['id'] ?>">Konfirmasi <i class="fas fa-check-circle"></i></button>
							<button class="btn btn-danger batal" data-id="<?= $customer['id'] ?>">Batal <i class="fas fa-times-circle"></i></button>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ($customer['status'] = !2) : ?>
						<button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
