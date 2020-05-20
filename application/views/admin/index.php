<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Admin</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Data data Admin</h4>
						</div>
						<div class="card-body">
							<button class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#AddAdmin">Tambah Admin!</button>
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Username</th>
											<th>Nama</th>
											<th>Role</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; ?>
										<?php foreach ($admin as $adm) : ?>
											<tr>
												<td class="text-center"><?= $no ?></td>
												<td><?= $adm['username'] ?></td>
												<td><?= $adm['nama'] ?></td>
												<td><?= $adm['role'] ?></td>
												<td>
													<a data-id="<?= $adm['id'] ?>" href="#" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#EditAdmin"><i class="fas fa-pencil-alt"></i></a>
													<a data-id="<?= $adm['id'] ?>" data-toggle="modal" data-target="#HapusAdmin" href="<?= $adm['id'] ?>" id="btnDelete" class="btn btn-danger btn-sm btnDelete" title="Delete"><i class="fas fa-trash"></i></a>
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
	<div class="modal fade" id="AddAdmin" tabindex="-1" role="dialog" aria-labelledby="AddAdmin" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tambah Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="AddAdminForm">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-user"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Nama" id="nama" name="nama">

							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-user-circle"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Username" id="username" name="username">

							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group role">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-lock"></i>
									</div>
								</div>
								<input type="password" class="form-control" placeholder="Password" id="password" name="password">
							</div>
						</div>

						<div class="form-group">
							<label>Role</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-users"></i>
									</div>
								</div>
								<select class="form-control mb-4" name="role">
									<option selected disabled>Pilih role</option>
									<option value="Admin">Admin</option>
									<option value="Super Admin">Super Admin</option>
								</select>
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
	<div class="modal fade EditAdmin" id="EditAdmin" tabindex="-1" role="dialog" aria-labelledby="EditAdmin" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Edit Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="EditAdminForm">
						<input type="hidden" name="id" id="edit-id">
						<div class="form-group">
							<label>Nama</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-user"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Nama" id="edit-nama" name="nama">

							</div>
						</div>
						<div class="form-group">
							<label>Username</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-user-circle"></i>
									</div>
								</div>
								<input type="text" class="form-control" placeholder="Username" id="edit-username" name="username">

							</div>
						</div>
						<div class="form-group">
							<label>Password</label>
							<div class="input-group role">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-lock"></i>
									</div>
								</div>
								<input type="password" class="form-control" placeholder="Diisi jika ingin mengganti password" id="edit-password" name="password">
							</div>
						</div>

						<div class="form-group" id="editRole">
							<label>Role</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-users"></i>
									</div>
								</div>
								<select class="form-control mb-4" name="role" id="edit-role">
									<option selected disabled>Pilih role</option>
									<option value="Admin">Admin</option>
									<option value="Super Admin">Super Admin</option>
								</select>
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
	<div class="modal fade DeleteAdmin" id="HapusAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
					<a href="#" data-id="<?= $adm['id'] ?>" class="btn btn-danger hapusAdmin" id="hapusAdmin" title="Hapus">Delete!</a>
				</div>
			</div>
		</div>
	</div>
</div>
