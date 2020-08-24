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
										<strong>Supplier :</strong>
										<?= $supplier['nama_supplier'] ?><br>
										<strong>Tanggal Pembelian :</strong>
										<?= date('d-m-Y H:i:s', strtotime($supplier['tanggal'])) ?><br>
									</address>
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
											<td class="text-center">Rp. <?= number_format($brg['harga_beli']) ?></td>
											<td class="text-center"><?= $brg['jumlah'] ?></td>
											<td class="text-right">Rp. <?= number_format($brg['harga_beli'] * $brg['jumlah']) ?></td>
										</tr>
									<?php endforeach; ?>
								</table>
							</div>
							<div class="row mt-2">
								<div class="col-lg text-right">
									<div class="invoice-detail-item">
										<div class="invoice-detail-name">Subtotal</div>
										<div class="invoice-detail-value">Rp. <?= number_format($supplier['total_harga']) ?></div>
									</div>
									<hr class="mt-2 mb-1">
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="text-md-right">
					<a href="<?= base_url('Transaksi/CetakInvoicePembelian/' . $supplier['id']) ?>" target="blank" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
				</div>
			</div>
		</div>
	</section>
</div>
