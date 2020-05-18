<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Barang</h1>
		</div>

		<div class="section-body">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<button class="btn btn-primary btn-sm" id="modal-5">Tambah Barang</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-md">
								<tr>
									<th>#</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th>Stok</th>
									<th>Action</th>
								</tr>
								<?php $no = 1; ?>
								<?php foreach ($barang as $brg) : ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $brg['nama_barang'] ?></td>
										<td>Rp. <?= number_format($brg['harga']) ?></td>
										<td><?= $brg['stok'] ?></td>
										<td><a href="#" class="btn btn-info btn-sm">Detail</a></td>
									</tr>
									<?php $no++ ?>
								<?php endforeach; ?>

							</table>
						</div>
					</div>
					<div class="card-footer text-right">
						<nav class="d-inline-block">
							<ul class="pagination mb-0">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
								<li class="page-item">
									<a class="page-link" href="#">2</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<form class="modal-part" id="modal-login-part" method="post" name="addBarang">
				<div class="form-group">
					<label>Nama Barang</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-box-open"></i>
							</div>
						</div>
						<input type="text" class="form-control" placeholder="Barang" id="barang" required name="barang">
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
						<input type="number" min="1" class="form-control" placeholder="Harga" id="harga" required name="harga">
					</div>
				</div>
				<div class="form-group">
					<label>Stok</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								Stok
							</div>
						</div>
						<input type="number" min="1" class="form-control" placeholder="Stok" id="stok" required name="stok">
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
