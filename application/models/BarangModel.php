<?php

class BarangModel extends CI_Model
{
	public function get()
	{
		return $this->db->get('barang')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('barang', ['id' => $id])->row_array();
	}

	public function AddBarang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function DeleteBarang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('barang');
	}

	public function EditBarang($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('barang', $data);
	}
}
