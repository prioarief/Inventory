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
	<h2 style="text-align: center; margin-top: 30px;">Laporan Pembelian</h2>
	<table style="margin-top: 10px; margin-left:100px">
		<tr>
			<th>NO</th>
			<th>Tanggal Transaksi</th>
			<th>Supplier</th>
			<th>Total Harga</th>
		</tr>
		<?php $no = 1; ?>
		<?php $total = 0; ?>
		<?php foreach ($items as $tr) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= date('d M Y H:i:s', strtotime($tr['tanggal'])) ?></td>
				<td><?= $tr['nama_supplier'] ?> </td>
				<td>Rp. <?= number_format($tr['total_harga']) ?></td>
			</tr>
		<?php $total += $tr['total_harga']; ?>
		<?php endforeach; ?>
		<tr>
			<td></td>
			<td colspan="2"><b>Total Pengeluaran</b></td>
			<td><b>Rp. <?= number_format($total) ?></b></td>
		</tr>
	</table>

</body>

</html>
