<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khachhang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Khachhang_Model');
		$this->load->model('Thongbao_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$total_rows = count($this->Khachhang_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Khachhang/index';;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;

		$config['num_tag_open'] = '<li class="page-item page-link">';
		$config['num_tag_close'] = '</li>';


		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li class="page-item page-link">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="page-item page-link">';
		$config['prev_tag_close'] = '</li>';


		$config['cur_tag_open'] = '<li class="page-item page-link" style="border-color:#17a2b8;">';
		$config['cur_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = $this->pagination->create_links();

		$uri_seg = $this->uri->segment(3);

		$data['all'] = $this->Khachhang_Model->getLimit($per_page,$uri_seg);
		$data['page'] = $page;

		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_khachhang',$data);
		$this->load->view('footer');
	}

	// Add a new item
	public function add()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$data = $this->input->post();
		$khachhang = [
			'ten_khachhang' => $data['ten_khachhang'],
			'diachi' => $data['diachi'],
			'gmail' => $data['gmail'],
			'sodienthoai' => $data['sodienthoai'],
			'solanmua' => 0
		];

		$res = $this->Khachhang_Model->insert($khachhang);

		if($res){

			$this->session->set_flashdata('ER_kh','');
			$this->session->set_flashdata('SU_kh','Success !!!');

			$this->addNotification($_SESSION['user'].' đã thêm 1 khách hàng',$_SESSION['user']);

		}
		else {
			
			$this->session->set_flashdata('ER_kh','Error !!!');
			$this->session->set_flashdata('SU_kh','');
		}

		redirect('Khachhang/','refresh');
	}

	//Update one item
	public function update( $id = NULL )
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$data = $this->input->post();

		$khachhang = [
			'ten_khachhang' => $data['ten_khachhang'],
			'diachi' => $data['diachi'],
			'gmail' => $data['gmail'],
			'sodienthoai' => $data['sodienthoai']
		];

		$res = $this->Khachhang_Model->update($khachhang,$data['id']);

		if($res){

			$this->session->set_flashdata('ER_kh','');
			$this->session->set_flashdata('SU_kh','Success !!!');

		}
		else {
			
			$this->session->set_flashdata('ER_kh','Error !!!');
			$this->session->set_flashdata('SU_kh','');
		}

		redirect('Khachhang/','refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$id=$this->input->post('id');

		$res = $this->Khachhang_Model->delete($id);
		if (!$res) {
			
			$this->session->set_flashdata('ER_kh','Error !!!');
			$this->session->set_flashdata('SU_kh','');

			$this->addNotification($_SESSION['user'].' đã xóa 1 khách hàng',$_SESSION['user']);
		}
		else {
			$this->session->set_flashdata('ER_kh','');
			$this->session->set_flashdata('SU_kh','Success !!!');
		}

		redirect('Khachhang/','refresh');
	}

	public function addNotification($content,$createdBy)
	{
		$data=['content'=>$content,'createdBy'=>$createdBy];
		$this->Thongbao_Model->insert($data);
	}

	public function checkSession()
	{
		if (!empty($_SESSION['username'])){
			return true;
		}
		else {
			return false;
		}
	}
}

/* End of file Khachhang.php */
/* Location: ./application/controllers/Khachhang.php */
