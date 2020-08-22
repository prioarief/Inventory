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
	<table style="margin-top: 10px; margin-left:110px">
		<tr>
			<th>#</th>
			<th class="text-center">Nama</th>
			<th class="text-center">No Telp</th>
			<th class="text-right">Alamat</th>
		</tr>
		<?php $no = 1; ?>
		<?php foreach ($data as $pelanggan) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $pelanggan['nama'] ?></td>
				<td class="text-center"><?= $pelanggan['telp'] ?></td>
				<td class="text-center"><?= $pelanggan['alamat'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

</body>

</html>
