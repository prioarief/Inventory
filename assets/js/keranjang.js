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
				console.log(response);
			},
			error: (err) => {
				swal("Gagal", "Jumlah Pembelian Melebihi Stok	!", "error");
			},
		});
	});

	// const tampilData = () => {
	// 	const dataKeranjang = [];
	// 	$.ajax({
	// 		url: url + "Keranjang/LihatKeranjang/",
	// 		method: "post",
	// 		success: function (response) {
	// 			const result = JSON.parse(response);

	// 			let data = Object.keys(result).map((val, index) => [result[val]]);
	// 			data.forEach((items) => {
	// 				items.forEach((item) => {
	// 					dataKeranjang.push(item.name);
	// 				});
	// 			});
	// 		},
	// 	});

	// 	return dataKeranjang;
	// };

	// const tampilStok = () => {
	// 	$.ajax({
	// 		url: url + "Keranjang/LihatKeranjang/",
	// 		method: "post",
	// 		success: function (response) {
	// 			const result = JSON.parse(response);

	// 			let data = Object.keys(result).map((val, index) => [result[val]]);
	// 			data.forEach((items) => {
	// 				items.forEach((item) => {
	// 					$.ajax({
	// 						url: `${url}Barang/Detail/${item.id}`,
	// 						success: (response) => {
	// 							const result = JSON.parse(response);
	// 							if ($("input.qty").attr("data-id") == result.id) {
	// 								$("small.stok").html(`max ${result.stok}`);
	// 							}
	// 						},
	// 						error: (err) => {
	// 							console.log(err);
	// 						},
	// 					});
	// 				});
	// 			});
	// 		},
	// 	});
	// };

	// tampilStok();
	// tampilData()
});
