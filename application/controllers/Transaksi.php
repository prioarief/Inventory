<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel', 'Transaksi');

		if (!$this->session->userdata('nama')) {
			redirect('Auth');
		}
	}

	public function index()
	{
		redirect('Transaksi/Invoice');
	}

	public function Invoice($id = null)
	{
		if (is_null($id)) {
			redirect('Barang');
		}
		$data = [
			'title' => 'Invoice',
			'customer' => $this->Transaksi->getCustomer($id),
			'item' => $this->Transaksi->detailTransaction($id),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('invoice/index', $data);
		$this->load->view('templates/footer');
	}
}