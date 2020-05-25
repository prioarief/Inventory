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
		// $data = [
		// 	'rowid' => 'c81e728d9d4c2f636f067f89cc14862c',
		// 	'qty' => 0
		// ];

		$id = $this->input->post('id');

		$this->cart->remove($id);
		redirect('Keranjang');
	}
	
	public function EditKeranjang()
	{
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$data = [
			'rowid' => $id,
			'qty' => $qty
		];


		$this->cart->update($data);
		redirect('Keranjang');
	}

	public function CountItems()
	{
		echo (count($this->cart->contents()));
	}
}
