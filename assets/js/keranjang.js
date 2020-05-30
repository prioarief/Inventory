$(document).ready(function () {
	let url = $("input#url").val();

	// tampilData()

	//Hapus Item Cart
	$(".hapus_cart").on("click", function () {
		let id = $(this).attr("id");
		$.ajax({
			url: `${url}Keranjang/HapusKeranjang/`,
			method: "POST",
			data: { id: id },
			success: function (data) {
				// tampilData();

				document.location.href = `${url}Keranjang`;
			},
		});
	});

	//Edit Item Cart
	$(".edit_cart").on("click", function () {
		let id = $(this).attr("id");
		let barang = $(this).data("id");
		let qty = $(`#qty${id}`).val();

		if (qty < 1) {
			return false;
		}

		$.ajax({
			url: `${url}Keranjang/EditKeranjang/`,
			method: "POST",
			data: {
				id: id,
				qty: qty,
				barang: barang,
			},
			success: function (data) {
				if (data != "gagal") {
					swal("Sukses", "Berhasil Di Update!", "success");

					let fake_ajax = setTimeout(function () {
						clearInterval(fake_ajax);
					}, 1500);
					$("#cart-jumlah").val("");
					// countData();
				} else {
					swal(
						"Gagal",
						"Gagal Di Update! \n Jumlah pemesanan melebihi stok \n Silakan periksa keranjang belanja anda!",
						"error"
					);

					let fake_ajax = setTimeout(function () {
						clearInterval(fake_ajax);
						document.location.href = url + "Keranjang";
					}, 1500);
					$("#cart-jumlah").val("");
					// countData();
				}
			},
			error: function (err) {
				// tampilData();
				swal("Gagal", "Gagal Di Update!", "error");
				let fake_ajax = setTimeout(function () {
					clearInterval(fake_ajax);
					document.location.href = `${url}Keranjang`;
				}, 2000);
			},
		});
	});

	$("button.checkout").on("click", () => {
		$.ajax({
			url: `${url}Keranjang/Checkout`,
			success: (response) => {
				swal("Sukses", "Transaksi Berhasil!", "success");
				let fake_ajax = setTimeout(function () {
					clearInterval(fake_ajax);
					document.location.href = `${url}Transaksi/Invoice/${response}`;
				}, 2000);
			},
			error: (err) => {
				swal("Gagal", "Jumlah Pembelian Melebihi Stok	!", "error");
			},
		});
	});
});
