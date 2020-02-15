<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->toLogin_view();
	}

	public function toLogin_view()
	{
		$this->load->view('login_view');
	}

	public function toForgetPass_view()
	{
		$this->load->view('forget_pass');
	}

	public function Trangchu()
	{
		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('main_view');
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->toLogin_view();
	}
	public function login()
	{
		$data = $this->input->post();

		if ($data['username'] == 'Admin' && $data['password'] == 'Admin') {
			$_SESSION['user'] = 'Admin';
			redirect('/User/Trangchu','refresh');
		}else if ($data['username'] == 'Nhanvien' && $data['password'] == 'Nhanvien') {
			$_SESSION['user'] = 'Nhanvien';
			redirect('/User/Trangchu','refresh');
		}else if ($data['username'] == 'Nhanvienkho' && $data['password'] == 'Nhanvienkho') {
			$_SESSION['user'] = 'Nhanvienkho';
			redirect('/User/Trangchu','refresh');
		} else {
			$this->session->set_flashdata('ER','Wrong Username/Password !!!');
			$this->session->set_flashdata('SU','');
			$this->toLogin_view();
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
