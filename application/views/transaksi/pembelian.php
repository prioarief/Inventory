<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Riwayat Pembelian </h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Riwayat Pembelian</h4>
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
													<th>Supplier</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="isi">
												<?php foreach ($transaksi as $tr) : ?>
													<tr>
														<td><?= date('d-m-Y H:i:s', strtotime($tr['tanggal'])) ?></td>
														<td>Rp. <?= number_format($tr['total_harga']) ?></td>
														<td><?= $tr['nama_supplier'] ?></td>
														<td>
															<a href="<?= base_url('Transaksi/InvoicePembelian/' . $tr['id']) ?>" class="badge badge-info badge-sm" title="Detail">Detail</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php if ($this->session->userdata('role') == 'Super Admin') : ?>
								<button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#PrintPembelian">Print <i class="fas fa-print"></i></button>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="modal fade PrintPembelian" id="PrintPembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Cetak Pembelian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6>Pilih Bulan</h6>
					<div class="row bulan">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>
