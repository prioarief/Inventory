/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
let url = $("input#url").val();

$("#modal-5").fireModal({
	title: "Tambah Barang",
	body: $("#modal-login-part"),
	footerClass: "bg-whitesmoke",
	autoFocus: true,
	onFormSubmit: function (modal, e, form) {
		
		// validate
		$("form[name='addBarang']").validate({
			rules: {
				barang:
			}
		})

		let barang = $("#barang").val();
		let harga = $("#harga").val();
		let stok = $("#stok").val();

		$(this).closest(".modal").modal("hide");

		// data.push(form_data)

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
				swal("Good Job", "You clicked the button!", "success");
				let fake_ajax = setTimeout(function () {
					document.location.href = url + "Barang";
					clearInterval(fake_ajax);
				}, 1500);
			},
			error: function (err) {
				console.log(err);
			},
		});

		e.preventDefault();
	},
	shown: function (modal, form) {
		console.log(form);
	},
	buttons: [
		{
			text: "Tambah Barang",
			submit: true,
			class: "btn btn-primary btn-shadow",
			handler: function (modal) {},
		},
	],
});
