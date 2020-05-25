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
		// login();
		$data = [
			'action' => 'Auth/ActionAuth',
			'regis' => true,
		];

		$this->load->view('auth/login', $data);
	}

	public function Register()
	{
		// $data = [
		// 	'action' => 'Auth/ActionAuth',
		// 	'regis' => true,
		// ];

		$this->load->view('auth/register');
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
					'buyer' => true,
				];

				$this->session->set_userdata($data);
				$this->session->set_flashdata('alert', 'Login Berhasil');
				redirect('Welcome');
			} else {
				$this->session->set_flashdata('alert', 'Password Salah!');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('alert', 'Username Tidak Terdaftar, silakan registrasi!');
			redirect('Auth');
		}
	}

	public function ActRegister()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');

		$req = $this->Auth->getUserByUsername($username);
		if ($req) {
			$this->session->set_flashdata('alert', 'Username Sudah Ada!');
			redirect('Auth/Register');
		} else {
			$data = [
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'nama' => $nama,
				'telp' => $telp,
				'alamat' => $alamat,
			];

			$this->Auth->Registrasi($data);

			$this->session->set_flashdata('alertt', 'Registrasi Berhasil, silakan login!');
			redirect('Auth/Index');
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
        
    /* End of file  Auth.php */
