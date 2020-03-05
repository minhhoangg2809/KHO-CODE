<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Cat_Model');
		$this->load->model('Thongbao_Model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->toList();
	}

	public function toList()
	{
		$total_rows = count($this->Cat_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Cat/index';;
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

		$data['all'] = $this->Cat_Model->getLimit($per_page,$uri_seg);
		$data['page'] = $page;

		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_cat',$data);
		$this->load->view('footer');
	}

	// Add a new item
	public function add()
	{
		$data = $this->input->post();

		$item =
		[
			'ten_danhmuc' => $data['ten'],
			'loai' => $data['loai'],
		];

		$res = $this->Cat_Model->insert($item);
		if ($res) {

			$this->session->set_flashdata('ER_cat','');
			$this->session->set_flashdata('SU_cat','Success !!!');

			$this->addNotification($_SESSION['user'].' đã thêm 1 danh mục',$_SESSION['user']);
		}
		else {

			$this->session->set_flashdata('ER_cat','Error !!!');
			$this->session->set_flashdata('SU_cat','');
		}

		redirect('Cat','refresh');
	}

	//Update one item
	public function update()
	{
		$data = $this->input->post();

		$item =
		[
			'ten_danhmuc' => $data['ten'],
			'loai' => $data['loai'],
		];

		$res = $this->Cat_Model->update($item,$data['id']);
		if ($res) {

			$this->session->set_flashdata('ER_cat','');
			$this->session->set_flashdata('SU_cat','Success !!!');
		}
		else {

			$this->session->set_flashdata('ER_cat','Error !!!');
			$this->session->set_flashdata('SU_cat','');
		}

		redirect('Cat','refresh');
	}

	//Delete one item
	public function delete()
	{
		$id = $this->input->post('id');

		$res = $this->Cat_Model->delete($id);
		if ($res) {

			$this->session->set_flashdata('ER_cat','');
			$this->session->set_flashdata('SU_cat','Success !!!');

			$this->addNotification($_SESSION['user'].' đã xóa 1 danh mục',$_SESSION['user']);
		}
		else {

			$this->session->set_flashdata('ER_cat','Error !!!');
			$this->session->set_flashdata('SU_cat','');
		}

		redirect('Cat','refresh');
	}

	public function find()
	{
		$text = $this->input->post('search');

		if ( !is_null($text) ) {
			
			$data['all'] = $this->Cat_Model->find($text);

			$this->load->view('header');
			$this->load->view('header_desktop');
			$this->load->view('sidebar');
			$this->load->view('list_cat',$data);
			$this->load->view('footer');
		}

		else {
			
			redirect('Cat','refresh');
		}
	}

	public function addNotification($content,$createdBy)
	{
		$data=['content'=>$content,'createdBy'=>$createdBy];
		$this->Thongbao_Model->insert($data);
	}
}

/* End of file Cat.php */
/* Location: ./application/controllers/Cat.php */
