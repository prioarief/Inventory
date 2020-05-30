<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Riwayat Penjualan </h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Riwayat Penjualan</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th>Tanggal Transaksi</th>
													<th>Total Harga</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="isi">
												<?php foreach ($transaksi as $tr) : ?>
													<tr>
														<td><?= date('d-m-Y H:i:s', strtotime($tr['tanggal'])) ?></td>
														<td>Rp. <?= number_format($tr['total_harga']) ?></td>
														<td>Sukses </td>
														<td>
															<a href="<?= base_url('Transaksi/Invoice/' . $tr['id']) ?>" class="badge badge-info badge-sm" title="Detail">Detail</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

</div>
