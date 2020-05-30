<?php

class Keranjang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('BarangModel', 'Barang');
		$this->load->model('TransaksiModel', 'Transaksi');

		if (!$this->session->userdata('nama')) {
			redirect('Auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Keranjang Belanja',
			'barang' => $this->cart->contents(),
			'data_barang' => $this->Barang->get(),
			'js' => 'keranjang.js'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('keranjang/index');
		$this->load->view('templates/footer', $data);
	}

	public function Pembelian()
	{
		$data = [
			'title' => 'Keranjang Belanja',
			'barang' => $this->cart->contents(),
			'data_barang' => $this->Barang->get(),
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
					// $data = [
					// 	'id' => $id,
					// 	'name' => $barang,
					// 	'price' => $harga,
					// 	'qty' => $jumlah,
					// ];

					// $this->cart->insert($data);
					break;
				}
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

	public function TambahStok()
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


		if ($this->session->userdata('role')) {
			$data = [
				'rowid' => $id,
				'qty' => $qty
			];

			$this->cart->update($data);
		} else {
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
	}

	public function CountItems()
	{
		echo count($this->cart->contents());
	}

	public function Checkout()
	{
		date_default_timezone_set('Asia/Jakarta');
		$total = $this->cart->total();
		$data = [
			'pelanggan_id' => $this->session->userdata('id'),
			'total_harga' => $total,
			'tanggal' => date('Y-m-d H:i:s'),
			'status' => 0
		];


		$this->db->trans_start();
		$this->Transaksi->InsertTransaction($data);

		$TransID = $this->db->insert_id();

		$detail = array();
		foreach ($this->cart->contents() as $items) {
			$detail = [
				'penjualan_id' => $TransID,
				'barang_id' => $items['id'],
				'jumlah' => $items['qty']
			];

			$this->db->insert('detail_penjualan', $detail);
		}

		$this->db->trans_complete();

		$this->cart->destroy();
		$this->session->set_flashdata('alert', 'Checkout Berhasil');
		echo $TransID;
	}
	
	public function InsertPembelian()
	{
		date_default_timezone_set('Asia/Jakarta');
		$total = $this->cart->total();
		$suuplier = $this->input->post('supplier');
		$data = [
			'nama_supplier' => $suuplier,
			'total_harga' => $total,
			'tanggal' => date('Y-m-d H:i:s')
		];


		$this->db->trans_start();
		$this->Transaksi->InsertPembelian($data);

		$TransID = $this->db->insert_id();

		$detail = array();
		foreach ($this->cart->contents() as $items) {
			$detail = [
				'pembelian_id' => $TransID,
				'barang_id' => $items['id'],
				'jumlah' => $items['qty']
			];

			$this->db->insert('detail_pembelian', $detail);
		}

		$this->db->trans_complete();

		$this->cart->destroy();
		$this->session->set_flashdata('alert', 'Checkout Berhasil');
		redirect('Transaksi/InvoicePembelian/'. $TransID);
	}
}
