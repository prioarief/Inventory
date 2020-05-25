<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel', 'Barang');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		// if(empty($barang) || empty(int($barang) || empty(int($stok)))){
		// 	return false;
		// }

		$data = [
			'nama_barang' => $barang,
			'harga' => $harga,
			'stok' => $stok,
		];

		echo json_encode($this->Barang->AddBarang($data));
	}
	
	public function EditBarang()
	{
		$this->access();
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$id = $this->input->post('id');

		$data = [
			'nama_barang' => $barang,
			'harga' => $harga,
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
