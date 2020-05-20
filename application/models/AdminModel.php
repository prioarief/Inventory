<?php

class AdminModel extends CI_Model
{
	public function get()
	{
		return $this->db->get('admin')->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where('admin', ['id' => $id])->row_array();
	}
	
	public function getByUsername($username)
	{
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}

	public function AddAdmin($data)
	{
		$this->db->insert('admin', $data);
	}

	public function DeleteAdmin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin');
	}

	public function EditAdmin($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
	}
}
