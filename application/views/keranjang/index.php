<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Keranjang Belanja</h1>
		</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="d-block">Update Keranjang</h4>
						</div>

						<?php if ($this->session->flashdata('alert')) : ?>
							<div class="container">
								<div class="alert alert-danger"><?= $this->session->flashdata('alert') ?></div>
							</div>
						<?php endif; ?>
						<div class="card-body">
							<?php if ($this->session->userdata('buyer')) : ?>
								<div class="row">
									<div class="col-md">
										<div class="table-responsive">
											<table class="table table-striped" id="content">
												<thead>
													<tr>
														<th class="text-center">#</th>
														<th>Nama Barang</th>
														<th>Harga</th>
														<th>Jumlah</th>
														<th>Sub Total</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody id="isi">
													<?php $no = 1; ?>
													<?php foreach ($barang as $brg) : ?>
														<tr>
															<td class="text-center"><?= $no ?></td>
															<td><?= $brg['name'] ?></td>
															<td>Rp. <?= number_format($brg['price']) ?></td>
															<td style="width: 140px">
																<input type="number" min="1" value="<?= $brg['qty'] ?>"  id="qty<?= $brg['rowid'] ?>" class="form-control qty <?= $brg['id'] ?>">
															</td>
															<td>Rp. <?= number_format($brg['subtotal']) ?></td>
															<td>
																<a id="<?= $brg['rowid'] ?>" data-id="<?= $brg['id'] ?>" href="#" class="btn btn-info btn-sm edit_cart" title="Update"><i class="fas fa-sync-alt"></i></a>
																<a id="<?= $brg['rowid'] ?>" href="#" class="btn btn-danger btn-sm hapus_cart" title="Delete"><i class="fas fa-trash"></i></a>
															</td>
														</tr>
														<?php $no++ ?>
													<?php endforeach; ?>
													<tr>
														<th colspan="3"></th>
														<th colspan="">Total</th>
														<th colspan="3">Rp. <?= number_format($this->cart->total()) ?></th>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="container">
								<button type="submit" class="btn btn-info float-right checkout">Checkout</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

</div>
