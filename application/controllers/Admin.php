<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel', 'Admin');
		$this->load->model('AuthModel', 'Auth');
	}

	public function is_logged()
	{
		if (!$this->session->userdata('role')) {
			redirect('Admin/Auth');
		} else {
			if ($this->session->userdata('role') == 'Admin') {
				redirect('Admin/Auth');
			}
		}
	}

	public function index()
	{
		$this->is_logged();
		$data = [
			'title' => 'Data Admin',
			'admin' => $this->Admin->get(),
			'js' => 'admin.js'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer',);
	}

	public function Auth()
	{
		$data = [
			'action' => 'Admin/ActionAuth',
			'regis' => false,
		];

		$this->load->view('auth/login', $data);
	}

	public function ActionAuth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$req = $this->Admin->getByUsername($username);
		if ($req) {
			if (password_verify($password, $req['password'])) {
				$data = [
					'nama' => $req['nama'],
					'username' => $req['username'],
					'role' => $req['role'],
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



	public function AddAdmin()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$role = $this->input->post('role');

		$data = [
			'username' => $username,
			'password' => $password,
			'nama' => $nama,
			'role' => $role,
		];

		echo json_encode($this->Admin->AddAdmin($data));
	}

	public function EditAdmin()
	{
		if (empty($this->input->post('password'))) {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$role = $this->input->post('role');
			$id = $this->input->post('id');

			$data = [
				'username' => $username,
				'nama' => $nama,
				'role' => $role,
			];
		} else {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$role = $this->input->post('role');
			$id = $this->input->post('id');

			$data = [
				'username' => $username,
				'password' => $password,
				'nama' => $nama,
				'role' => $role,
			];
		}

		echo json_encode($this->Admin->EditAdmin($id, $data));
	}

	public function DeleteAdmin($id = null)
	{
		if (is_null($id)) {
			redirect('Admin');
		}

		$req = $this->Admin->getById($id);
		if ($req) {
			echo json_encode($this->Admin->DeleteAdmin($id));
		} else {
			redirect('Admin');
		}
	}

	public function Detail($id = null)
	{
		if (is_null($id)) {
			redirect('Admin');
		}

		$req = $this->Admin->getById($id);
		if ($req) {
			echo json_encode($req);
		} else {
			redirect('Admin');
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Admin/Auth');
	}
}
