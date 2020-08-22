<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Laba Penjualan</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">

							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Tanggal Transaksi</th>
											<th>Laba</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($data as $brg) : ?>
											<tr>
												<td class="text-center"><?= $no ?></td>
												<td><?= date('d-m-Y H:i:s', strtotime($brg['tanggal'])) ?></td>
												<td>Rp. <?= number_format($brg['laba']) ?></td>
											</tr>
											<?php $no++ ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="<?= base_url('Laporan/Cetak/laba') ?>" target="blank" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
		</div>
	</section>
</div>
