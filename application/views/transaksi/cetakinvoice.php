<!DOCTYPE html>
<html>

<head>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 20px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>

<body>
	<h2 style="text-align: center; margin-top: 30px;">Invoice Transaksi</h2>
	<div style="margin-left:100px; margin-top: 20px">
		<address>
			<strong>Pembeli :</strong>
			<?= $customer['nama'] ?><br>
			<strong>Tanggal Pembelian :</strong>
			<?= date('d-m-Y H:i:s', strtotime($customer['tanggal'])) ?><br>
			<strong>Status Pembelian :</strong>
			<?php if ($customer['status'] == 0) {
				echo '<mark>Pending (Menunggu konfirmasi Admin)</mark>' . '<br>';
			} elseif ($customer['status'] == 2) {
				echo 'Transaksi Di Batalkan' . '<br>';
			} else {
				echo 'Sukses' . '<br>';
			} ?>
		</address>
	</div>
	<h4 style="text-align: center; margin-top: 30px">Detail Transaksi</h4>
	<table style="margin-top: 10px; margin-left:140px">
		<tr>
			<th>NO</th>
			<th>Item</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Qty</th>
			<th class="text-right">Total</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($item as $brg) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $brg['nama_barang'] ?></td>
				<td class="text-center">Rp. <?= number_format($brg['harga_jual']) ?></td>
				<td class="text-center"><?= $brg['jumlah'] ?></td>
				<td class="text-right">Rp. <?= number_format($brg['harga_jual'] * $brg['jumlah']) ?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td colspan="3">Sub Total</td>
			<td>Rp. <?= number_format($customer['total_harga']) ?></td>
		</tr>
	</table>

</body>

</html>
