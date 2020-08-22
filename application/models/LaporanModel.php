<?php

class LaporanModel extends CI_Model
{
	public function getBarangMasuk()
	{
		return $this->db->get('barang_masuk')->result_array();
	}
	
	public function getBarangKeluar()
	{
		return $this->db->get('barang_keluar')->result_array();
	}
	
	public function getPelanggan()
	{
		return $this->db->get('pelanggan')->result_array();
	}
	
	public function getStokBarang()
	{
		return $this->db->get('barang')->result_array();
	}
	
	public function getLaba()
	{
		return $this->db->get('laba')->result_array();
	}
}
