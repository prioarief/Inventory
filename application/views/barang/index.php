<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Barang</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Update Data dan Stok Barang</h4>
						</div>
						<div class="card-body">
							<button class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#AddBarang">Tambah Barang!</button>
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($barang as $brg) : ?>
											<tr>
												<td class="text-center"><?= $no ?></td>
												<td><?= $brg['nama_barang'] ?></td>
												<td>Rp. <?= number_format($brg['harga']) ?></td>
												<td><?= $brg['stok'] ?></td>
												<td>
													<a data-id="<?= $brg['id'] ?>" href="#" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#EditBarang"><i class="fas fa-pencil-alt"></i></a>
													<a data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#HapusBarang" href="<?= $brg['id'] ?>" id="btnDelete" class="btn btn-danger btn-sm btnDelete" title="Delete"><i class="fas fa-trash"></i></a>
												</td>
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

		</div>
	</section>
	<!-- Modal Add -->
	<div class="modal fade" id="AddBarang" tabindex="-1" role="dialog" aria-labelledby="AddBarang" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="AddBarangForm">
						<div class="form-group">
							<label>Nama Barang</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-box-open"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Barang" id="barang" name="barang">

							</div>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga" id="harga" name="harga">
							</div>
						</div>
						<div class="form-group">
							<label>Stok</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-recycle"></i>
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Stok" id="stok" name="stok">
							</div>
						</div>

						<div class="form-group">
							<button class="btn btn-primary float-right">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Modal Edit -->
	<div class="modal fade EditBarang" id="EditBarang" tabindex="-1" role="dialog" aria-labelledby="EditBarang" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Edit Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="EditBarangForm">
						<input type="hidden" name="id" id="edit-id">
						<div class="form-group">
							<label>Nama Barang</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-box-open"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Barang" id="edit-barang" name="barang">

							</div>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga" id="edit-harga" name="harga">
							</div>
						</div>
						<div class="form-group">
							<label>Stok</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-recycle"></i>
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Stok" id="edit-stok" name="stok">
							</div>
						</div>

						<div class="form-group">
							<button class="btn btn-primary float-right">Edit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Modal Delete -->
	<div class="modal fade DeleteBarang" id="HapusBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6>Apakah Anda Yakin Ingin Menghapus?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="#" data-id="<?= $brg['id'] ?>" class="btn btn-danger hapusBarang" id="hapusKelas" title="Hapus">Delete!</a>
				</div>
			</div>
		</div>
	</div>
</div>
