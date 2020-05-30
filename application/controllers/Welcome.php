<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel', 'Transaksi');
		$this->load->model('AdminModel', 'Admin');
		$this->load->model('AuthModel', 'Auth');
		$this->load->model('BarangModel', 'Barang');

		if (!$this->session->userdata('nama')) {
			redirect('Auth');
		}
	}

	public function index()
	{
		if($this->session->userdata('role')){
			$data = [
				'title' => 'Dashboard',
				'transaksi_pending' => count($this->Transaksi->getPendingTransaksi()),
				'transaksi_sukses' => count($this->Transaksi->getSuccessTransaksi()),
				'pembelian' => count($this->Transaksi->getAllPembelian()),
				'barang' => count($this->Barang->get()),
				'admin' => count($this->Admin->get()),
				'pelanggan' => count($this->Auth->get()),
			];
		}else{
			$data = [
				'title' => 'Dashboard',
				'riwayat' => count($this->Transaksi->TransactionHistory($this->session->userdata('id')))
			];
		}
		$this->load->view('templates/header', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}

	public function Pelanggan()
	{
		$data = [
			'title' => 'Data Pelanggan',
			'pelanggan' => $this->Auth->get(),
		];

		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/index', $data);
		$this->load->view('templates/footer');
	}
}
