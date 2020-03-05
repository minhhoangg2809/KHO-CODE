<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhacungcap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Supplier_Model');
		$this->load->model('Thongbao_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$total_rows = count($this->Supplier_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Nhacungcap/index';;
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

		$data['all'] = $this->Supplier_Model->getLimit($per_page,$uri_seg);
		$data['page'] = $page;

		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_nhacungcap',$data);
		$this->load->view('footer');
	}

	// Add a new item
	public function add()
	{
		$data = $this->input->post();
		$nhacungcap = [
			'ten_nhacungcap' => $data['ten_nhacungcap'],
			'diachi' => $data['diachi'],
			'gmail' => $data['gmail'],
			'sodienthoai' => $data['sodienthoai'],
			'ngayhoptac' => $data['ngayhoptac'],
			'loaisanpham' => $data['loaisanpham'],
			'nguoidaidien' => $data['nguoidaidien']
		];

		$res = $this->Supplier_Model->insert($nhacungcap);

		if($res){

			$this->session->set_flashdata('ER_ncc','');
			$this->session->set_flashdata('SU_ncc','Success !!!');

			$this->addNotification($_SESSION['user'].' đã thêm 1 nhà cung cấp',$_SESSION['user']);

		}
		else {
			
			$this->session->set_flashdata('ER_ncc','Error !!!');
			$this->session->set_flashdata('SU_ncc','');
		}

		redirect('Nhacungcap/','refresh');
	}

	//Update one item
	public function update( $id = NULL )
	{
		$data = $this->input->post();

		$nhacungcap = [
			'ten_nhacungcap' => $data['ten_nhacungcap'],
			'diachi' => $data['diachi'],
			'gmail' => $data['gmail'],
			'sodienthoai' => $data['sodienthoai'],
			'loaisanpham' => $data['loaisanpham'],
			'nguoidaidien' => $data['nguoidaidien']
		];

		$res = $this->Supplier_Model->update($nhacungcap,$data['id']);

		if($res){

			$this->session->set_flashdata('ER_ncc','');
			$this->session->set_flashdata('SU_ncc','Success !!!');

		}
		else {
			
			$this->session->set_flashdata('ER_ncc','Error !!!');
			$this->session->set_flashdata('SU_ncc','');
		}

		redirect('Nhacungcap/','refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$id=$this->input->post('id');

		$res = $this->Supplier_Model->delete($id);
		if (!$res) {
			
			$this->session->set_flashdata('ER_ncc','Error !!!');
			$this->session->set_flashdata('SU_ncc','');

			$this->addNotification($_SESSION['user'].' đã xóa 1 nhà cung cấp',$_SESSION['user']);
		}
		else {
			$this->session->set_flashdata('ER_ncc','');
			$this->session->set_flashdata('SU_ncc','Success !!!');
		}

		redirect('Nhacungcap/','refresh');
	}

	public function addNotification($content,$createdBy)
	{
		$data=['content'=>$content,'createdBy'=>$createdBy];
		$this->Thongbao_Model->insert($data);
	}
}

/* End of file Nhacungcap.php */
/* Location: ./application/controllers/Nhacungcap.php */
