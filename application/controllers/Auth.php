<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel', 'Auth');
	}

	public function index()
	{
		$data = [
			'action' => 'Auth/ActionAuth',
			'regis' => true,
		];

		$this->load->view('auth/login', $data);
	}

	public function ActionAuth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$req = $this->Auth->getUserByUsername($username);
		if ($req) {
			if (password_verify($password, $req['password'])) {
				$data = [
					'nama' => $req['nama'],
					'username' => $req['username'],
				];

				$this->session->set_userdata($data);
				$this->session->set_flashdata('alert', 'Login Berhasil');
				redirect('Welcome');
			} else {
				$this->session->set_flashdata('alert', 'Password Salah!');
				redirect('Admin/Auth');
			}
		} else {
			$this->session->set_flashdata('alert', 'Username Tidak Terdaftar, silakan registrasi!');
			redirect('Admin/Auth');
		}
	}
}
        
    /* End of file  Auth.php */
