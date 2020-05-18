<?php

class BarangModel extends CI_Model
{
	public function get()
	{
		return $this->db->get('barang')->result_array();
	}

	public function AddBarang($data)
	{
		$this->db->insert('barang', $data);
	}
}
