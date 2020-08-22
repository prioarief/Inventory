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
			padding: 30px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>

<body>
	<h2 style="text-align: center; margin-top: 30px;"><?= $title ?></h2>
	<table style="margin-top: 10px; margin-left:70px">
		<tr>
			<th>#</th>
			<th class="text-center">Barang</th>
			<th class="text-center">Harga Beli</th>
			<th class="text-center">Harga Jual</th>
			<th class="text-right">Stok</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($data as $brg) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $brg['nama_barang'] ?></td>
				<td><?= $brg['harga_beli'] ?></td>
				<td><?= $brg['harga_jual'] ?></td>
				<td class="text-center"><?= $brg['stok'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body>

</html>
