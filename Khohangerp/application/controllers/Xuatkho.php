<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xuatkho extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Nhapkho_Model');
		$this->load->model('Item_Model');
		$this->load->model('Supplier_Model');
		$this->load->model('Cat_Model');
		$this->load->model('Khachhang_Model');
		$this->load->model('Xuatkho_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$total_rows = count($this->Xuatkho_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Xuatkho/index';;
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

		$data['all'] = $this->Xuatkho_Model->getLimit($per_page,$uri_seg);
		$data['nhacungcap']=$this->Supplier_Model->get();
		$data['khachhang']=$this->Khachhang_Model->get();
		$data['page'] = $page;
		
		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('xuatkho_view',$data);
		$this->load->view('footer');
	}

	public function getDetail()
	{
		$postData=$this->input->post();
		$data=$this->Xuatkho_Model->getCt(['chitiet_xuat.id_xuat'=>$postData['id_xuat']]);
		echo json_encode($data);
	}

	// Add a new item
	public function add()
	{
		$postData=$this->input->post();
		$xuatObj=$this->Xuatkho_Model->get(['ngayxuat'=>date('Y-m-d'),'khachhang.id_khachhang'=>$postData['id_khachhang']]);
		if (count($xuatObj)==0) {
			$obj1=[
				'nhanvien'=>'Hoang',
				'ngayxuat'=>date('Y-m-d'),
				'id_khachhang'=>$postData['id_khachhang']
			];
			$id_xuat=$this->Xuatkho_Model->insert($obj1);
		}
		else {
			$id_xuat=$xuatObj['id_xuat'];
		}

		$mathang=$this->Item_Model->get(['id_mathang'=>$postData['id_mathang']]);

		$obj2=[
			'id_xuat'=>$id_xuat,
			'id_mathang'=>$postData['id_mathang'],
			'soluong'=>$postData['soluongxuat'],
			'dongiaxuat'=>$mathang['gia']
		];

		
		$this->Item_Model->update(['soluonght'=>($mathang['soluonght']-$postData['soluongxuat'])],$postData['id_mathang']);

		$result=$this->Xuatkho_Model->insertDetail($obj2);
		echo $result;
	}
}

/* End of file Xuatkho.php */
/* Location: ./application/controllers/Xuatkho.php */
