<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{

	public function loginAdmin($user, $pass)
	{
		return $this->db->get_where('admin', ['username'=> $user, 'password' => $pass])->row_array();
	}
}
                        
/* End of file AuthModel.php */
