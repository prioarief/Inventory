$(document).ready(function () {
	let url = $("input#url").val();

	$(".PrintPenjualan").on("show.bs.modal", () => {
		const bulan = [
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];

		let html = ``;
		for (let index = 0; index < bulan.length; index++) {
			const element = bulan[index];
			html += `
						<div class="col-sm-3">
							<div class="form-check">
								<a href="${url}Transaksi/CetakPenjualan/${index + 1}" target="blank" class="text-decoration-none" style="text-decoration : none">${element}</a>
							</div>
						</div>`;
		}
		html += `<a href="${url}Transaksi/CetakPenjualan" target="blank" class="text-decoration-none ml-5 mt-3" style="text-decoration : none">Semua Penjualan</a>`;
		$(".bulan").html(html);
	});
	
	$(".PrintPembelian").on("show.bs.modal", () => {
		const bulan = [
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];

		let html = ``;
		for (let index = 0; index < bulan.length; index++) {
			const element = bulan[index];
			html += `
						<div class="col-sm-3">
							<div class="form-check">
								<a href="${url}Transaksi/CetakPembelian/${index + 1}" target="blank" class="text-decoration-none" style="text-decoration : none">${element}</a>
							</div>
						</div>`;
		}
		html += `<a href="${url}Transaksi/CetakPembelian" target="blank" class="text-decoration-none ml-5 mt-3" style="text-decoration : none">Semua Penjualan</a>`;
		$(".bulan").html(html);
	});
});
