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
			'js' => 'transaksi.js'
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
			'js' => 'transaksi.js'
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
				if ($request['id'] == $item['barang_id']) {
					$data = [
						'stok' => $request['stok'] - $item['jumlah']
					];

					$this->Barang->EditBarang($item['barang_id'], $data);
				}
			}
			// redirect('Transaksi/Penjualan');
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

	public function CetakInvoice($id = null)
	{
		if (is_null($id)) {
			redirect('Barang');
		}
		$data = [
			'title' => 'Invoice',
			'customer' => $this->Transaksi->getCustomer($id),
			'item' => $this->Transaksi->detailTransaction($id),
		];

		ob_start();

		$this->load->view('transaksi/cetakinvoice', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->pdf->SetTitle('Invoice Transaksi');
		$pdf->WriteHTML($html);
		$pdf->Output('Invoice Transaksi.pdf', 'I');
	}
	
	public function CetakInvoicePembelian($id = null)
	{
		if (is_null($id)) {
			redirect('Barang');
		}
		$data = [
			'title' => 'Invoice',
			'supplier' => $this->Transaksi->getPembelian($id),
			'item' => $this->Transaksi->detailPembelian($id),
		];

		ob_start();

		$this->load->view('transaksi/cetakinvoicePembelian', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->pdf->SetTitle('Invoice Pembelian');
		$pdf->WriteHTML($html);
		$pdf->Output('Invoice Pembelian.pdf', 'I');
	}
	
	public function CetakPenjualan($bulan = null)
	{
		$data = [
			'title' => 'Penjualan',
			'items' => $this->Transaksi->getPenjualanPerBulan($bulan),
		];

		ob_start();

		$this->load->view('transaksi/laporanpenjualan', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->pdf->SetTitle('Laporan Penjualan');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Penjualan.pdf', 'I');
	}
	
	public function CetakPembelian($bulan = null)
	{
		$data = [
			'title' => 'Pembelian',
			'items' => $this->Transaksi->getPembelianPerBulan($bulan),
		];

		ob_start();

		$this->load->view('transaksi/laporanpembelian', $data);
		$html = ob_get_contents();
		ob_end_clean();
		require './assets/pdf/vendor/autoload.php';
		$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
		$pdf->pdf->SetTitle('Laporan Pembelian');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Pembelian.pdf', 'I');
	}
}
