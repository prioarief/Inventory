<?php

class Keranjang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function index()
	{
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .= '
				<tr>
					<td>' . $items['name'] . '</td>
					<td>' . number_format($items['price']) . '</td>
					<td>' . $items['qty'] . '</td>
					<td>' . number_format($items['subtotal']) . '</td>
					<td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
			</tr>
		';
		return $output;
	}

	public function LihatKeranjang()
	{
		echo $this->index();
	}

	public function TambahKeranjang()
	{
		$id = $this->input->post('id');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		$data = [
			'id' => $id,
			'name' => $barang,
			'price' => $harga,
			'qty' => $jumlah,
		];

		$this->cart->insert($data);
		echo $this->index();
	}

	public function HapusKeranjang()
	{
		$data = [
			'rowid' => 'c81e728d9d4c2f636f067f89cc14862c',
			'qty' => 0
		];

		$this->cart->update($data);
		redirect('Keranjang');
	}
}
