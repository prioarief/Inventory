<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel', 'Barang');
	}

	public function index()
	{
		if(!$this->session->userdata('nama')){
			redirect('Auth');
		}
		$data = [
			'title' => 'Data Barang',
			'barang' => $this->Barang->get(),
			'js' => 'barang.js'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer',);
	}

	public function AddBarang()
	{
		$this->access();
		$barang = $this->input->post('barang');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$stok = $this->input->post('stok');

		$data = [
			'nama_barang' => $barang,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'stok' => $stok,
		];

		echo json_encode($this->Barang->AddBarang($data));
	}
	
	public function EditBarang()
	{
		$this->access();
		$barang = $this->input->post('barang');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$stok = $this->input->post('stok');
		$id = $this->input->post('id');

		$data = [
			'nama_barang' => $barang,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'stok' => $stok,
		];

		echo json_encode($this->Barang->EditBarang($id, $data));
	}

	public function DeleteBarang($id = null)
	{
		$this->access();
		if (is_null($id)) {
			redirect('Barang');
		}

		$req = $this->Barang->getById($id);
		if ($req) {
			echo json_encode($this->Barang->DeleteBarang($id));
		} else {
			redirect('Barang');
		}
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Barang');
		}

		$req = $this->Barang->getById($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Barang');
		}
	}

	public function Stok()
	{
		foreach($this->cart->contents() as $data){
			$req = $this->Barang->getById($data['id']);
			echo json_encode($req);
		}
	}

	private function access()
	{
		if(!$this->session->userdata('nama')){
			redirect('Auth');
		}else{
			if($this->session->userdata('buyer')){
				redirect('Welcome');
			}
		}
	}
}
