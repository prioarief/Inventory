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

	$('button.konfirmasi').on('click', () => {
		let id = $('button.konfirmasi').data('id')
		$.ajax({
			url : `${url}Transaksi/Konfirmasi/${id}`,
			success :function(data){
				swal("Sukses", "Konfrimasi Berhasil!", "success");
				let fake_ajax = setTimeout(function () {
					clearInterval(fake_ajax);
					document.location.href = `${url}Transaksi/Penjualan`;
				}, 2000);
			}
		});
	})
	
	
	$('button.batal').on('click', () => {
		let id = $('button.batal').data('id')
		$.ajax({
			url : `${url}Transaksi/TransaksiGagal/${id}`,
			success :function(data){
				swal("Sukses", "Transaksi Berhasil Di Batalkan!", "success");
				let fake_ajax = setTimeout(function () {
					clearInterval(fake_ajax);
					document.location.href = `${url}Transaksi/Penjualan`;
				}, 2000);
			}
		});
	})
});
