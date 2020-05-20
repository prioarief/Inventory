/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
$(document).ready(function () {
	let url = $("input#url").val();

	$("#login").validate({
		rules: {
			username: "required",
			password: "required",
		},

		messages: {
			username: "Masukkan username",
			password: "Masukkan password",
		},

		submitHandler: function (form) {
			form.submit()
		},
	});
});
