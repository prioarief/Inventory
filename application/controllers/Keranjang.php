<?php

class Keranjang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('BarangModel', 'Barang');
	}

	public function index()
	{
		$data = [
			'title' => 'Keranjang Belanja',
			'barang' => $this->cart->contents(),
			'js' => 'keranjang.js'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('keranjang/index');
		$this->load->view('templates/footer', $data);
	}

	public function LihatKeranjang()
	{
		echo json_encode($this->cart->contents());
	}

	public function TambahKeranjang()
	{
		$id = $this->input->post('id');
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		foreach ($this->cart->contents() as $data) {
			$req = $this->Barang->getById($id);

			if ($data['id'] == $id) {
				// echo 'barang sudah ada di keranjang';
				if ($jumlah + $data['qty'] > $req['stok']) {
					echo 'gagal';
					die;
				} else {
					break;
				}
			}
			$data = [
				'id' => $id,
				'name' => $barang,
				'price' => $harga,
				'qty' => $jumlah,
			];

			$this->cart->insert($data);
		}
	}

	public function HapusKeranjang()
	{

		$id = $this->input->post('id');

		$this->cart->remove($id);
		redirect('Keranjang');
	}

	public function EditKeranjang()
	{
		$barang = $this->input->post('barang');
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');


		foreach ($this->cart->contents() as $data) {
			$req = $this->Barang->getById($barang);

			if ($data['id'] == $barang) {

				// echo $data['name'];

				if ($qty <= $req['stok']) {
					$data = [
						'rowid' => $id,
						'qty' => $qty
					];

					$this->cart->update($data);
					redirect('Keranjang');
				} else {
					echo 'gagal';
				}
			}
		}
	}

	public function CountItems()
	{
		echo count($this->cart->contents());
	}

	public function Checkout()
	{
		$total = $this->cart->total();
		$data = array();
	}
}
