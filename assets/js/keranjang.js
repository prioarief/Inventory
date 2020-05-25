$(document).ready(function () {
	let url = $("input#url").val();

	
	const tampilData = () => {
		$.ajax({
			url: url + "Keranjang/LihatKeranjang/",
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);

				let no = 1;
				let total = 0;
				let data = Object.keys(result).map((val, index) => [result[val]]);
				let html = `<tr>`;
				data.forEach((items) => {
					items.forEach((item) => {
						html += `
						<td>${no++}</td>
						<td>${item.name}</td>
						<td>Rp. ${item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
						<td style="width: 110px">
							<input type="number" value="${item.qty}" id="" class="form-control">
						</td>
						<td>Rp. ${item.subtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
						<td>
						<a id="${item.rowid}" href="#" class="btn btn-info btn-sm edit_cart" title="Edit">
							<i class="fas fa-sync-alt"></i>
						</a>
						<a id="${item.rowid}" href="#" class="btn btn-danger btn-sm hapus_cart" title="Delete">
							<i class="fas fa-trash"></i>
						</a>
						</td>`;
						total += item.subtotal;
						const jml = item.length 
					});
					html += `</tr>`;
				});
				html += `
							<tr>
								<th colspan="3"></th>
								<th colspan="">Total</th>
								<th colspan="3">Rp. ${total
									.toString()
									.replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</th>
							</tr>
						`;

				$("#isi").html(html);

			},
		});
	};

	// tampilData()
	

	//Hapus Item Cart
	$('.hapus_cart').on('click',function(){
		let id=$(this).attr("id"); 
		$.ajax({
			url : `${url}Keranjang/HapusKeranjang/`,
			method : "POST",
			data : {id : id},
			success :function(data){
				// tampilData();

				document.location.href = `${url}Keranjang`
			}
		});
	});
	
	//Edit Item Cart
	$('.edit_cart').on('click',function(){
		let id=$(this).attr("id"); 
		let qty = $(`#qty${id}`).val()

		$.ajax({
			url : `${url}Keranjang/EditKeranjang/`,
			method : "POST",
			data : {
				id : id,
				qty : qty,
			},
			success :function(data){
				// tampilData();
				swal("Sukses", "Berhasil Di Update!", "success");
				let fake_ajax = setTimeout(function () {
					clearInterval(fake_ajax);
					document.location.href = `${url}Keranjang`
				}, 2000);
			}
		});
	});
});
