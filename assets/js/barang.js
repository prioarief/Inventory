/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function () {
	let url = $("input#url").val();

	$("#AddBarangForm").validate({
		rules: {
			barang: "required",
			harga_beli: {
				required: true,
				number: true,
			},
			harga_jual: {
				required: true,
				number: true,
			},
			stok: {
				required: true,
				number: true,
			},
		},

		messages: {
			barang: "Masukkan Nama Barang",
			harga_beli: {
				required: "Masukkan Harga Beli Barang",
				number: "Masukkan Angka!!",
			},
			harga_jual: {
				required: "Masukkan Harga Jual Barang",
				number: "Masukkan Angka!!",
			},
			stok: {
				required: "Masukkan Stok Barang",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let harga_beli = $("#harga_beli").val();
			let harga_jual = $("#harga_jual").val();
			let barang = $("#barang").val();
			let stok = $("#stok").val();

			// $(this).closest(".modal").modal("hide");

			// DO AJAX HERE
			$.ajax({
				url: url + "Barang/AddBarang/",
				data: {
					barang: barang,
					harga_beli: harga_beli,
					harga_jual: harga_jual,
					stok: stok,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Tambahkan!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Tambahkan!", "error");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		},
	});

	// Event Edit Barang
	$(".EditBarang").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		$.ajax({
			url: url + "Barang/Detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("input#edit-barang").val(result.nama_barang);
				$("input#edit-harga-beli").val(result.harga_beli);
				$("input#edit-harga-jual").val(result.harga_jual);
				$("input#edit-stok").val(result.stok);
				$("input#edit-id").val(result.id);
			},
		});
	});

	$("#EditBarangForm").validate({
		rules: {
			barang: "required",
			harga_beli: {
				required: true,
				number: true,
			},
			harga_jual: {
				required: true,
				number: true,
			},
			stok: {
				required: true,
				number: true,
			},
		},

		messages: {
			barang: "Masukkan Nama Barang",
			harga_beli: {
				required: "Masukkan Harga Beli Barang",
				number: "Masukkan Angka!!",
			},
			harga_jual: {
				required: "Masukkan Harga Jual Barang",
				number: "Masukkan Angka!!",
			},
			stok: {
				required: "Masukkan Stok Barang",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let barang = $("#edit-barang").val();
			let harga_beli = $("#edit-harga-beli").val();
			let harga_jual = $("#edit-harga-jual").val();
			let stok = $("#edit-stok").val();
			let id = $("#edit-id").val();

			// DO AJAX HERE
			$.ajax({
				url: url + "Barang/EditBarang/",
				data: {
					barang: barang,
					harga_beli: harga_beli,
					harga_jual: harga_jual,
					stok: stok,
					id: id,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Edit!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Edit!", "error");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		},
	});

	$(".DeleteBarang").on("show.bs.modal", (e) => {
		$(".DeleteBarang").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.attr("href");
		console.log(id);
		$(".hapusBarang").on("click", (e) => {
			$(".DeleteBarang").modal("hide");
			e.preventDefault();

			$.ajax({
				url: url + "Barang/DeleteBarang/" + id,
				data: {
					id: id,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Hapus!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Hapus!", "error");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Barang";
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		});
	});

	// Event Cart
	$(".Cart").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		$.ajax({
			url: url + "Barang/Detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("input#cart-barang").val(result.nama_barang);
				$("input#cart-harga").val(result.harga_jual);
				$("input#cart-harga-beli").val(result.harga_beli);
				$("input#cart-stok").val(result.stok);
				$("input#cart-jumlah").attr({
					max: result.stok,
					placeholder: `Maksimal ${result.stok}`,
				});
				$("input#barang-id").val(result.id);
			},
		});
	});

	const countData = () => {
		$.ajax({
			url: `${url}Keranjang/CountItems/`,
			success: function (data) {
				$("small.total").html(`(${data})`);
			},
		});
	};

	$("#CartForm").validate({
		rules: {
			jumlah: {
				required: true,
				number: true,
			},
		},

		messages: {
			jumlah: {
				required: "Masukkan jumlah pembelian",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let barang = $("#cart-barang").val();
			let harga = $("#cart-harga").val();
			let jumlah = $("#cart-jumlah").val();
			let id = $("#barang-id").val();
			$("#Cart").modal("toggle");

			// DO AJAX HERE
			$.ajax({
				url: url + "Keranjang/TambahKeranjang/",
				data: {
					id: id,
					barang: barang,
					harga: harga,
					jumlah: jumlah,
				},
				method: "post",
				success: function (data) {
					if (data != 'gagal') {
						swal("Sukses", "Berhasil Masuk Keranjang!", "success");

						let fake_ajax = setTimeout(function () {
							clearInterval(fake_ajax);
						}, 1500);
						$("#cart-jumlah").val("");
						countData();
					} else {
						swal("Gagal", "Gagal Masuk Keranjang! \n Jumlah pemesanan melebihi stok \n Silakan periksa keranjang belanja anda!", "error");

						let fake_ajax = setTimeout(function () {
							clearInterval(fake_ajax);
						}, 1500);
						$("#cart-jumlah").val("");
						countData();
					}
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Masukkan!", "error");
					let fake_ajax = setTimeout(function () {
						// $(this).closest(".modal").modal("hide");
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		},
	});


	$("#StokForm").validate({
		rules: {
			jumlahh: {
				required: true,
				number: true,
			},
		},

		messages: {
			jumlahh: {
				required: "Masukkan jumlah pembelian",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let barang = $("#cart-barang").val();
			let harga = $("#cart-harga-beli").val();
			let jumlah = $("#cart-jumlahh").val();
			let id = $("#barang-id").val();
			$("#Cart").modal("toggle");

			// DO AJAX HERE
			$.ajax({
				url: url + "Keranjang/TambahStok/",
				data: {
					id: id,
					barang: barang,
					harga: harga,
					jumlah: jumlah,
				},
				method: "post",
				success: function (data) {
					if (data != 'gagal') {
						swal("Sukses", "Berhasil Masuk Keranjang!", "success");

						let fake_ajax = setTimeout(function () {
							clearInterval(fake_ajax);
						}, 1500);
						$("#cart-jumlahh").val("");
						countData();
					} else {
						swal("Gagal", "Gagal Masuk Keranjang! \n Jumlah pemesanan melebihi stok \n Silakan periksa keranjang belanja anda!", "error");

						let fake_ajax = setTimeout(function () {
							clearInterval(fake_ajax);
						}, 1500);
						$("#cart-jumlah").val("");
						countData();
					}
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Masukkan!", "error");
					let fake_ajax = setTimeout(function () {
						// $(this).closest(".modal").modal("hide");
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		},
	});
});
