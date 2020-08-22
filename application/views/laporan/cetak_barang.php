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
	<table style="margin-top: 10px; margin-left:140px">
		<tr>
			<th>#</th>
			<th class="text-center">Barang</th>
			<th class="text-center">Tanggal</th>
			<th class="text-right">Jumlah</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($data as $brg) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $brg['nama_barang'] ?></td>
				<td class="text-center"><?= date('d-m-Y H:i:s', strtotime($brg['tanggal'])) ?></td>
				<td class="text-center"><?= $brg['jumlah'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body>

</html>
