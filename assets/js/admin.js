/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function () {
	let url = $("input#url").val();

	$("#AddAdminForm").validate({
		rules: {
			nama: "required",
			username: "required",
			password: "required",
			role: "required",
		},

		messages: {
			nama: "Masukkan Nama",
			username: "Masukkan username",
			password: "Masukkan password",
			role: "Pilih role!",
		},

		submitHandler: function (form) {
			let nama = $("#nama").val();
			let username = $("#username").val();
			let password = $("#password").val();
			let role = $('select[name=role] option').filter(':selected').val();

			// $(this).closest(".modal").modal("hide");

			// DO AJAX HERE
			$.ajax({
				url: url + "Admin/AddAdmin/",
				data: {
					nama: nama,
					username: username,
					password: password,
					role: role,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Tambahkan!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Admin";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					console.log(err)
				},
			});
		},
	});

	// Event Edit Admin
	$(".EditAdmin").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		$.ajax({
			url: url + "Admin/Detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("input#edit-nama").val(result.nama);
				$("input#edit-username").val(result.username);
				// $("input#edit-password").val(result.password);
				$("div#editRole select").val(result.role);
				$("input#edit-id").val(result.id);
			},
		});
	});

	$("#EditAdminForm").validate({
		rules: {
			nama: "required",
			username: "required",
			role: "required",
		},

		messages: {
			nama: "Masukkan Nama",
			username: "Masukkan username",
			role: "Pilih role!",
		},

		submitHandler: function (form) {
			let nama = $("#edit-nama").val();
			let username = $("#edit-username").val();
			let password = $("#edit-password").val();
			let role = $('select[id=edit-role] option').filter(':selected').val();
			let id = $("#edit-id").val();

			// DO AJAX HERE
			$.ajax({
				url: url + "Admin/EditAdmin/",
				data: {
					nama: nama,
					username: username,
					password: password,
					role: role,
					id: id,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Edit!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Admin";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Edit!", "error");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Admin";
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		},
	});

	$(".DeleteAdmin").on("show.bs.modal", (e) => {
		$(".DeleteAdmin").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.attr("href");
		console.log(id);
		$(".hapusAdmin").on("click", (e) => {
			$(".DeleteAdmin").modal("hide");
			e.preventDefault();

			$.ajax({
				url: url + "Admin/DeleteAdmin/" + id,
				data: {
					id: id,
				},
				method: "post",
				dataType: "JSON",
				success: function (data) {
					swal("Sukses", "Data Berhasil Di Hapus!", "success");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Admin";
						clearInterval(fake_ajax);
					}, 1500);
				},
				error: function (err) {
					swal("Gagal", "Data Gagal Di Hapus!", "error");
					let fake_ajax = setTimeout(function () {
						document.location.href = url + "Admin";
						clearInterval(fake_ajax);
					}, 1000);
				},
			});
		});
	});
});
