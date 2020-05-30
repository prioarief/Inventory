<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel', 'Transaksi');
		$this->load->model('BarangModel', 'Barang');

		if (!$this->session->userdata('nama')) {
			redirect('Auth');
		}
	}

	public function index()
	{
		redirect('Welcome');
	}

	public function Penjualan()
	{
		$data = [
			'title' => 'Transaksi',
			'transaksi' => $this->Transaksi->getSuccessTransaksi(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/transaksi', $data);
		$this->load->view('templates/footer');
	}
	
	public function Pembelian()
	{
		$data = [
			'title' => 'Transaksi',
			'transaksi' => $this->Transaksi->getAllPembelian(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/pembelian', $data);
		$this->load->view('templates/footer');
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
		$this->load->view('transaksi/invoice', $data);
		$this->load->view('templates/footer');
	}
	
	public function InvoicePembelian($id = null)
	{
		if (is_null($id)) {
			redirect('Barang');
		}
		$data = [
			'title' => 'Invoice',
			'supplier' => $this->Transaksi->getPembelian($id),
			'item' => $this->Transaksi->detailPembelian($id),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/invoicePembelian', $data);
		$this->load->view('templates/footer');
	}

	public function RiwayatTransaksi($id = null)
	{
		if (is_null($id) || $id != $this->session->userdata('id')) {
			redirect('Barang');
		}
		$data = [
			'title' => 'Riwayat Transaksi',
			'transaksi' => $this->Transaksi->TransactionHistory($id),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/riwayat', $data);
		$this->load->view('templates/footer');
	}

	public function TransaksiTertunda()
	{
		$data = [
			'title' => 'Riwayat Transaksi',
			'transaksi' => $this->Transaksi->getPendingTransaksi(),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('transaksi/pending', $data);
		$this->load->view('templates/footer');
	}

	public function Konfirmasi($id = null)
	{
		if (is_null($id)) {
			die;
			redirect('Welcome');
		}

		$req = $this->Transaksi->getCustomer($id);
		if ($req) {
			$data = [
				'status' => 1
			];

			$this->Transaksi->Konfirmasi($id, $data);

			$barang = $this->Transaksi->detailTransaction($id);
			foreach ($barang as $item) {
				$request = $this->Barang->getById($item['barang_id']);
				if($request['id'] == $item['barang_id']){
					$data = [
						'stok' => $request['stok'] - $item['jumlah']
					];

					$this->Barang->EditBarang($item['barang_id'], $data);
				}
			}
			redirect('Transaksi/Penjualan');
		} else {
			die;
			redirect('Welcome');
		}
	}
	
	public function TransaksiGagal($id = null)
	{
		if (is_null($id)) {
			die;
			redirect('Welcome');
		}

		$req = $this->Transaksi->getCustomer($id);
		if ($req) {
			$data = [
				'status' => 2
			];

			$this->Transaksi->Konfirmasi($id, $data);
		} else {
			die;
			redirect('Welcome');
		}
	}
}
