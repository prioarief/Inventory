<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel', 'Admin');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = [
			'title' => 'Data Admin',
			'admin' => $this->Admin->get(),
			'js' => 'admin.js'
		];

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer',);
	}

	public function AddAdmin()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
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
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$id = $this->input->post('id');

		$data = [
			'username' => $username,
			'password' => $password,
			'nama' => $nama,
			'role' => $role,
		];

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
}
