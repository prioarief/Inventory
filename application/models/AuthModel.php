<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

	// public function loginAdmin($user, $pass)
	// {
	// 	return $this->db->get_where('admin', ['username'=> $user, 'password' => $pass])->row_array();
	// }

	public function Registrasi($data)
	{
		$this->db->insert('pelanggan', $data);
	}

	public function getUserByUsername($user)
	{
		return $this->db->get_where('pelanggan', ['username' => $user ])->row_array();
	}
}
                        
/* End of file AuthModel.php */
