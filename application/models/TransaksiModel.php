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

	public function getCustomer($id)
	{
		$this->db->select('penjualan.*, pelanggan.nama');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'pelanggan.id = penjualan.pelanggan_id');
		$this->db->where('penjualan.id', $id);
		$query = $this->db->get()->row_array();
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
}
