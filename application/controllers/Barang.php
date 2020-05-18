<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		$data = [
			'title' => 'Data Barang',
			'barang' => $this->Barang->get()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer');
	}

	public function AddBarang()
	{
		$barang = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = [
			'nama_barang' => $barang,
			'harga' => $harga,
			'stok' => $stok,
		];

		echo json_encode($this->Barang->AddBarang($data));
	}
}
