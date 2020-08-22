<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Stok Barang</h1>
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
											<th>Nama Barang</th>
											<th>Harga Beli</th>
											<th>Harga Jual</th>
											<th>Stok</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($data as $brg) : ?>
											<tr>
												<td class="text-center"><?= $no ?></td>
												<td><?= $brg['nama_barang'] ?></td>
												<td><?= $brg['harga_beli'] ?></td>
												<td><?= $brg['harga_jual'] ?></td>
												<td><?= $brg['stok'] ?></td>
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
			<a href="<?= base_url('Laporan/Cetak/stok') ?>" target="blank" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
		</div>
	</section>
</div>
