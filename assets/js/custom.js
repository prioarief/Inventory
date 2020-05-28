/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
	let url = $("input#url").val();

	$("#mytable").DataTable();


	const countData = () => {
		$.ajax({
			url : `${url}Keranjang/CountItems/`,
			success :function(data){
				$('small.total').html(`(${data})`)
			}
		});
	}

	countData()
});
