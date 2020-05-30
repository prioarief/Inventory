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
							<?php if ($this->session->userdata('role')) : ?>
								<button class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#AddBarang">Tambah Barang!</button>
							<?php endif; ?>

							<?php if ($this->session->userdata('role')) : ?>
								<div class="table-responsive">
									<table class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th>Nama Barang</th>
												<th>Harga Beli</th>
												<th>Harga Jual</th>
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
													<td>Rp. <?= number_format($brg['harga_beli']) ?></td>
													<td>Rp. <?= number_format($brg['harga_jual']) ?></td>
													<td><?= $brg['stok'] ?></td>
													<td>
														<?php if ($this->session->userdata('role')) : ?>
															<a data-id="<?= $brg['id'] ?>" href="#" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#EditBarang"><i class="fas fa-pencil-alt"></i></a>
															<a data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#HapusBarang" href="<?= $brg['id'] ?>" id="btnDelete" class="btn btn-danger btn-sm btnDelete" title="Delete"><i class="fas fa-trash"></i></a>
															<a data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#Cart" href="<?= $brg['id'] ?>" id="" class="btn btn-success btn-sm " title="Tambah Stok"><i class="fas fa-cart-plus"></i></a>
														<?php endif; ?>
													</td>
												</tr>
												<?php $no++ ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							<?php endif; ?>

							<?php if ($this->session->userdata('buyer')) : ?>
								<div class="row">
									<div class="col-md">
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
															<td>Rp. <?= number_format($brg['harga_jual']) ?></td>
															<td><?= $brg['stok'] ?></td>
															<td>
																<?php if ($this->session->userdata('role')) : ?>
																	<a data-id="<?= $brg['id'] ?>" href="#" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#EditBarang"><i class="fas fa-pencil-alt"></i></a>
																	<a data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#HapusBarang" href="<?= $brg['id'] ?>" id="btnDelete" class="btn btn-danger btn-sm btnDelete" title="Delete"><i class="fas fa-trash"></i></a>
																<?php else : ?>
																	<?php if ($brg['stok'] > 0) : ?>
																		<a data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#Cart" href="<?= $brg['id'] ?>" id="" class="btn btn-success btn-sm " title="Beli"><i class="fas fa-shopping-cart"></i></a>
																	<?php else : ?>
																		<button disabled data-id="<?= $brg['id'] ?>" data-toggle="modal" data-target="#Cart" href="<?= $brg['id'] ?>" id="" class="btn btn-danger btn-sm" title="Habis"><i class="fas fa-shopping-cart"></i></button>
																	<?php endif; ?>

																<?php endif; ?>
															</td>
														</tr>
														<?php $no++ ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<?php endif; ?>
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
							<label>Harga Beli</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga beli" id="harga_beli" name="harga_beli">
							</div>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga jual" id="harga_jual" name="harga_jual">
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
							<label>Harga Beli</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga" id="edit-harga-beli" name="harga_beli">
							</div>
						</div>
						<div class="form-group">
							<label>Harga Jual</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										Rp
									</div>
								</div>
								<input type="number" min="1" class="form-control" placeholder="Harga" id="edit-harga-jual" name="harga_jual">
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

	<!-- Modal Beli -->
	<div class="modal fade Cart" id="Cart" tabindex="-1" role="dialog" aria-labelledby="Cart" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Beli Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php if ($this->session->userdata('buyer')) : ?>
						<form method="post" id="CartForm">
						<?php else : ?>
							<form method="post" id="StokForm">
							<?php endif; ?>
							<input type="hidden" name="id" id="barang-id">
							<div class="form-group">
								<label>Nama Barang</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-box-open"></i>
										</div>
									</div>
									<input type="text" class="form-control" placeholder="Barang" readonly id="cart-barang" name="barang">
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
									
									<?php if ($this->session->userdata('buyer')) : ?>
										<input type="number" min="1" class="form-control" placeholder="Harga" readonly id="cart-harga" name="harga">
									<?php else : ?>
										<input type="number" min="1" class="form-control" placeholder="Harga" readonly id="cart-harga-beli" name="harga_beli">
									<?php endif; ?>
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
									<input type="number" min="1" class="form-control" placeholder="Stok" readonly id="cart-stok" name="stok">
								</div>
							</div>

							<div class="form-group">
								<label>Jumlah Pembelian</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<i class="fas fa-shopping-bag"></i>
										</div>
									</div>
									<?php if ($this->session->userdata('buyer')) : ?>
										<input type="number" min="1" class="form-control" placeholder="Jumlah Pembelian" id="cart-jumlah" name="jumlah">
									<?php else : ?>
										<input type="number" min="1" class="form-control" placeholder="Jumlah Pembelian" id="cart-jumlahh" name="jumlahh">
									<?php endif; ?>
								</div>
							</div>

							<div class="form-group">
								<button class="btn btn-primary float-right">Tambah Ke Keranjang</button>
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
