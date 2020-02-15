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
	}

	// List all your items
	public function index( $offset = 0 )
	{
		unset($_SESSION['action']);
		$_SESSION['action'] = 'item';
		$this->toList();
	}

	public function toList()
	{
		$data['all'] = $this->Item_Model->get();
		$data['supplier'] = $this->Supplier_Model->get();
		$data['cats'] = $this->Cat_Model->get();

		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_items',$data);
		$this->load->view('footer');
	}

	public function filter_danhmuc()
	{
		$id_danhmuc = $this->input->post('id_danhmuc');

		$data = $this->Item_Model->getbyDanhmuc($id_danhmuc);

		echo($data);
	}

	public function filter_nhacungcap()
	{
		$id_nhacungcap = $this->input->post('id_nhacungcap');

		$data = $this->Item_Model->getbyNhacungcap($id_nhacungcap);
		
		echo($data);
	}

	public function filter_nhacungcapvsdanhmuc()
	{
		$id_nhacungcap = $this->input->post('id_nhacungcap');
		$id_danhmuc = $this->input->post('id_danhmuc');

		$data = $this->Item_Model->getbyNhacungcapvDanhmuc($id_nhacungcap,$id_danhmuc );
		
		echo($data);
	}

	// Add a new item
	public function add()
	{
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
}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
