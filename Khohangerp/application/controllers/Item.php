<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Item_Model');
		$this->load->model('Supplier_Model');
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
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}
		
		$total_rows = count($this->Item_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Item/index';;
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

		$data['all'] = $this->Item_Model->getLimit($per_page,$uri_seg);
		$data['supplier'] = $this->Supplier_Model->get();
		$data['cats'] = $this->Cat_Model->get();
		$data['page'] = $page;

		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_items',$data);
		$this->load->view('footer');
	}

	public function filter_danhmuc()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$id_danhmuc = $this->input->post('id_danhmuc');

		$data = $this->Item_Model->getbyDanhmuc($id_danhmuc);

		echo($data);
	}

	public function filter_nhacungcap()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$id_nhacungcap = $this->input->post('id_nhacungcap');

		$data = $this->Item_Model->getbyNhacungcap($id_nhacungcap);
		
		echo($data);
	}

	public function filter_nhacungcapvsdanhmuc()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$id_nhacungcap = $this->input->post('id_nhacungcap');
		$id_danhmuc = $this->input->post('id_danhmuc');

		$data = $this->Item_Model->getbyNhacungcapvDanhmuc($id_nhacungcap,$id_danhmuc );
		
		echo($data);
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

		$mamathang = $this->Tao_Mamathang($data['nhacungcap'],$data['danhmuc']);

		$item = 
		[

			'ma_mathang' => $mamathang,
			'ten_mathang' => $data['ten'],
			'soluonght' => 0,
			'gia' => 0,
			'donvitinh' => $data['donvi'],
			'ngaynhapkhomoinhat' => null, 
			'id_danhmuc' => $data['danhmuc'],
			'id_nhacungcap' => $data['nhacungcap']
		];

		$res = $this->Item_Model->insert($item);

		if ($res) {

			$this->session->set_flashdata('SU_item','Success !!!');
			$this->session->set_flashdata('ER_item','');

			$this->addNotification($_SESSION['user'].' đã thêm 1 mặt hàng',$_SESSION['user']);
		}

		else {

			$this->session->set_flashdata('SU_item','');
			$this->session->set_flashdata('ER_item','Error !!!');
		}

		redirect('Item/','refresh');
	}


	//Update one item
	public function update()
	{
		$data = $this->input->post();

		$item = 
		[
			'ten_mathang' => $data['ten'],
			'soluonght' => 0,
			'gia' => $data['dongia'],
			'donvitinh' => $data['donvi'],
			'ngaynhapkhomoinhat' => null, 
			'id_danhmuc' => $data['danhmuc'],
			'id_nhacungcap' => $data['nhacungcap']
		];


		$res = $this->Item_Model->update($item,$data['id']);

		if ($res) {

			$this->session->set_flashdata('SU_item','Success !!!');
			$this->session->set_flashdata('ER_item','');
		}

		else {

			$this->session->set_flashdata('SU_item','');
			$this->session->set_flashdata('ER_item','Error !!!');
		}

		redirect('Item/','refresh');
	}

	//Delete one item
	public function delete()
	{
		$id = $this->input->post('id');

		$res = $this->Item_Model->delete($id);

		if ($res) {

			$this->session->set_flashdata('SU_item','Success !!!');
			$this->session->set_flashdata('ER_item','');

			$this->addNotification($_SESSION['user'].' đã xóa 1 mặt hàng',$_SESSION['user']);
		}

		else {

			$this->session->set_flashdata('SU_item','');
			$this->session->set_flashdata('ER_item','Error !!!');
		}

		redirect('Item/','refresh');
	}

	public function Tao_Mamathang($id_nhacungcap,$id_danhmuc)
	{
		$count = $this->rand_string(5);
		return $mamathang='MH-'.$count;
	}

	public function rand_string($length) {
		$str='';
		$chars = "0123456789";
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
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

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
