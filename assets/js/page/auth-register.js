"use strict";

$(document).ready(function () {
	let url = $("input#url").val();

	$("#register").validate({
		rules: {
			nama: "required",
			username: "required",
			password: {
				minlength: 5,
				required: true
			},
			password2: {
				required: true,
				equalTo: "#password",
			},
			alamat: "required",
			agree: "required",
			telp: {
				required:true,
				number:true,
				minlength: 12,
				maxlength: 13
			},
		},

		messages: {
			username: "Masukkan usernam!",
			password: {
				required: "Masukkan password!",
				minlength: "Minimal 5 karakter"
			},
			password2: {
				required: "Masukkan konfirmasi password!",
				equalTo: "Password tidak sesuai!"
			},
			nama: "Masukkan nama!",
			alamat: "Masukkan alamat!",
			agree: "Ceklis!",
			telp: {
				required: "Masukkan telpon!",
				number: "Hanya input angka!",
				minlength: "Minimal 12 karakter",
				maxlength: "Maximal 13 karakter",
			},
		},

		submitHandler: function (form) {
			form.submit()
		},
	});
});
