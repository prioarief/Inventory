<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data = [
			'action' => 'Admin/ActionAuth',
			'regis' => true,
		];

		$this->load->view('auth/login', $data);
	}
}
        
    /* End of file  Auth.php */
