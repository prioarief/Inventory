<?php

class TransaksiModel extends CI_Model
{
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
}
