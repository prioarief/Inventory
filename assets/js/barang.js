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
			harga: {
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
			harga: {
				required: "Masukkan Harga Barang",
				number: "Masukkan Angka!!",
			},
			stok: {
				required: "Masukkan Stok Barang",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let barang = $("#barang").val();
			let harga = $("#harga").val();
			let stok = $("#stok").val();

			// $(this).closest(".modal").modal("hide");

			// DO AJAX HERE
			$.ajax({
				url: url + "Barang/AddBarang/",
				data: {
					barang: barang,
					harga: harga,
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
				$("input#edit-harga").val(result.harga);
				$("input#edit-stok").val(result.stok);
				$("input#edit-id").val(result.id);
			},
		});
	});

	$("#EditBarangForm").validate({
		rules: {
			barang: "required",
			harga: {
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
			harga: {
				required: "Masukkan Harga Barang",
				number: "Masukkan Angka!!",
			},
			stok: {
				required: "Masukkan Stok Barang",
				number: "Masukkan Angka!!",
			},
		},

		submitHandler: function (form) {
			let barang = $("#edit-barang").val();
			let harga = $("#edit-harga").val();
			let stok = $("#edit-stok").val();
			let id = $("#edit-id").val();

			// DO AJAX HERE
			$.ajax({
				url: url + "Barang/EditBarang/",
				data: {
					barang: barang,
					harga: harga,
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
});
