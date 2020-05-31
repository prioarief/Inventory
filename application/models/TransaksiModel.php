<?php

class TransaksiModel extends CI_Model
{
	public function getPendingTransaksi()
	{
		return $this->db->get_where('penjualan', ['status' => 0])->result_array();
	}

	public function getSuccessTransaksi()
	{
		return $this->db->get_where('penjualan', ['status' => 1])->result_array();
	}

	// public function TransaksiGagal($id)
	// {
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('penjualan');
	// }


	public function InsertTransaction($data)
	{
		$this->db->insert('penjualan', $data);
	}

	public function InsertPembelian($data)
	{
		$this->db->insert('pembelian', $data);
	}

	public function getCustomer($id)
	{
		$this->db->select('penjualan.*, pelanggan.nama');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'pelanggan.id = penjualan.pelanggan_id');
		$this->db->where('penjualan.id', $id);
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function getAllPembelian()
	{
		return $this->db->get_where('pembelian')->result_array();
	}

	public function getPembelian($id)
	{
		return $this->db->get_where('pembelian', ['id' => $id])->row_array();
	}

	public function detailPembelian($id)
	{
		$this->db->select('detail_pembelian.*, barang.*');
		$this->db->from('detail_pembelian');
		$this->db->join('barang', 'barang.id = detail_pembelian.barang_id');
		$this->db->where('detail_pembelian.pembelian_id', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function detailTransaction($id)
	{
		$this->db->select('detail_penjualan.*, barang.*');
		$this->db->from('detail_penjualan');
		$this->db->join('barang', 'barang.id = detail_penjualan.barang_id');
		$this->db->where('detail_penjualan.penjualan_id', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function TransactionHistory($id)
	{
		return $this->db->get_where('penjualan', ['pelanggan_id' => $id])->result_array();
	}

	public function Konfirmasi($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('penjualan', $data);
	}

	public function getPenjualanPerBulan($bulan = null)
	{
		if (!empty($bulan)) {
			$this->db->select('penjualan.*');
			$this->db->from('penjualan');
			$this->db->where('MONTH(tanggal)', $bulan);
			$this->db->order_by('tanggal', 'ASC');

			return $this->db->get()->result_array();
		} else {
			$this->db->select('penjualan.*');
			$this->db->from('penjualan');
			$this->db->order_by('tanggal', 'ASC');
			return $this->db->get()->result_array();
		}
	}
	
	public function getPembelianPerBulan($bulan = null)
	{
		if (!empty($bulan)) {
			$this->db->select('pembelian.*');
			$this->db->from('pembelian');
			$this->db->where('MONTH(tanggal)', $bulan);
			$this->db->order_by('tanggal', 'ASC');

			return $this->db->get()->result_array();
		} else {
			$this->db->select('pembelian.*');
			$this->db->from('pembelian');
			$this->db->order_by('tanggal', 'ASC');
			return $this->db->get()->result_array();
		}
	}
}
