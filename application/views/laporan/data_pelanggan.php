<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Data Pelanggan</h1>
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
											<th>Nama</th>
											<th>No Telp</th>
											<th>Alamat</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($data as $pelanggan) : ?>
											<tr>
												<td class="text-center"><?= $no ?></td>
												<td><?= $pelanggan['nama'] ?></td>
												<td><?= $pelanggan['telp'] ?></td>
												<td><?= $pelanggan['alamat'] ?></td>
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
			<a href="<?= base_url('Laporan/Cetak/pelanggan') ?>" target="blank" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
		</div>
	</section>
</div>
