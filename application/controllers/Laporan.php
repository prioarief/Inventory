<?php

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LaporanModel', 'Laporan');
	}

	public function BarangMasuk()
	{
		$data = [
			'title' => 'Laporan Barang Masuk',
			'data' => $this->Laporan->getBarangMasuk()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('laporan/barang_masuk', $data);
		$this->load->view('templates/footer');
	}

	public function BarangKeluar()
	{
		$data = [
			'title' => 'Laporan Barang Keluar',
			'data' => $this->Laporan->getBarangKeluar()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('laporan/barang_keluar', $data);
		$this->load->view('templates/footer');
	}

	public function DataPelanggan()
	{
		$data = [
			'title' => 'Laporan Barang Keluar',
			'data' => $this->Laporan->getPelanggan()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('laporan/data_pelanggan', $data);
		$this->load->view('templates/footer');
	}
	
	public function StokBarang()
	{
		$data = [
			'title' => 'Laporan Stok Barang',
			'data' => $this->Laporan->getStokBarang()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('laporan/stok', $data);
		$this->load->view('templates/footer');
	}
	
	public function Laba()
	{
		$data = [
			'title' => 'Laporan Laba',
			'data' => $this->Laporan->getLaba()
		];

		$this->load->view('templates/header', $data);
		$this->load->view('laporan/laba', $data);
		$this->load->view('templates/footer');
	}

	public function Cetak($id = null)
	{
		if ($id === 'barang_masuk') {
			$data = [
				'data' => $this->Laporan->getBarangMasuk(),
				'title' => 'Laporan Barang Masuk'
			];
			ob_start();
			$this->load->view('laporan/cetak_barang', $data);
			$html = ob_get_contents();
			ob_end_clean();
			require './assets/pdf/vendor/autoload.php';
			$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
			$pdf->pdf->SetTitle('Laporan Barang Masuk');
			$pdf->WriteHTML($html);
			$pdf->Output('Laporan Barang Masuk.pdf', 'I');
		} else if ($id === 'barang_keluar') {
			$data = [
				'data' => $this->Laporan->getBarangKeluar(),
				'title' => 'Laporan Barang Keluar'
			];
			ob_start();
			$this->load->view('laporan/cetak_barang', $data);
			$html = ob_get_contents();
			ob_end_clean();
			require './assets/pdf/vendor/autoload.php';
			$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
			$pdf->pdf->SetTitle('Laporan Barang Keluar');
			$pdf->WriteHTML($html);
			$pdf->Output('Laporan Barang Keluar.pdf', 'I');
		}else if ($id === 'pelanggan') {
			$data = [
				'data' => $this->Laporan->getPelanggan(),
				'title' => 'Laporan Data Pelanggan'
			];
			ob_start();
			$this->load->view('laporan/cetak_pelanggan', $data);
			$html = ob_get_contents();
			ob_end_clean();
			require './assets/pdf/vendor/autoload.php';
			$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
			$pdf->pdf->SetTitle('Laporan Data Pelanggan');
			$pdf->WriteHTML($html);
			$pdf->Output('Laporan Data Pelanggan.pdf', 'I');
		}else if ($id === 'stok') {
			$data = [
				'data' => $this->Laporan->getStokBarang(),
				'title' => 'Laporan Stok Barang'
			];
			ob_start();
			$this->load->view('laporan/cetak_stok', $data);
			$html = ob_get_contents();
			ob_end_clean();
			require './assets/pdf/vendor/autoload.php';
			$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
			$pdf->pdf->SetTitle('Laporan Stok Barang');
			$pdf->WriteHTML($html);
			$pdf->Output('Laporan Stok Barang.pdf', 'I');
		}else if ($id === 'laba') {
			$data = [
				'data' => $this->Laporan->getLaba(),
				'title' => 'Laporan Laba Penjualan'
			];
			ob_start();
			$this->load->view('laporan/cetak_laba', $data);
			$html = ob_get_contents();
			ob_end_clean();
			require './assets/pdf/vendor/autoload.php';
			$pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
			$pdf->pdf->SetTitle('Laporan Laba Penjualan');
			$pdf->WriteHTML($html);
			$pdf->Output('Laporan Laba Penjualan.pdf', 'I');
		}
	}
}
