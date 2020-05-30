<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Pelanggan</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Data Pelanggan</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-pelanggan">
									<thead>
										<tr>
											<th>Nama</th>
											<th>Telp</th>
											<th>Alamat</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pelanggan as $pel) : ?>
											<tr>
												<td><?= $pel['nama'] ?></td>
												<td><?= $pel['telp'] ?></td>
												<td><?= $pel['alamat'] ?></td>
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
	</section>
</div>
