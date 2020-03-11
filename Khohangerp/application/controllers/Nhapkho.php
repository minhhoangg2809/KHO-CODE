<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhapkho extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Nhapkho_Model');
		$this->load->model('Item_Model');
		$this->load->model('Supplier_Model');
		$this->load->model('Cat_Model');
	}

	// List all your items
	public function index()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$total_rows = count($this->Nhapkho_Model->get());
		$per_page = 5;


		$this->load->library('pagination');

		$config['base_url'] = base_url().'Nhapkho/index';;
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

		$data['all'] = $this->Nhapkho_Model->getLimit($per_page,$uri_seg);
		$data['nhacungcap']=$this->Supplier_Model->get();
		$data['page']=$page;
		
		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('nhapkho_view',$data);
		$this->load->view('footer');
	}

	public function getDetail()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$postData=$this->input->post();
		$data=$this->Nhapkho_Model->getCt(['chitiet_nhap.id_nhap'=>$postData['id_nhap']]);
		echo json_encode($data);
	}

	// Add 
	public function add()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$postData=$this->input->post();
		$nhapObj=$this->Nhapkho_Model->get(['ngaynhap'=>date('Y-m-d'),'nhacungcap.id_nhacungcap'=>$postData['id_nhacungcap']]);
		if (count($nhapObj)==0) {
			$obj1=[
				'nhanvien'=>'Hoang',
				'ngaynhap'=>date('Y-m-d'),
				'id_nhacungcap'=>$postData['id_nhacungcap']
			];
			$id_nhap=$this->Nhapkho_Model->insert($obj1);
		}
		else {
			$id_nhap=$nhapObj['id_nhap'];
		}

		$obj2=[
			'id_nhap'=>$id_nhap,
			'id_mathang'=>$postData['id_mathang'],
			'soluong'=>$postData['soluongnhap'],
			'dongianhap'=>$postData['dongianhap']
		];

		$this->Item_Model->update(['ngaynhapkhomoinhat'=>date('Y-m-d')],$postData['id_mathang']);
		$mathang=$this->Item_Model->get(['id_mathang'=>$postData['id_mathang']]);
		$this->Item_Model->update(['soluonght'=>($mathang['soluonght']+$postData['soluongnhap'])],$postData['id_mathang']);

		$result=$this->Nhapkho_Model->insertDetail($obj2);
		echo $result;
	}

	public function getDanhmuc()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$postData=$this->input->post();
		$data=$this->Cat_Model->getDanhmuc_Nhacungcap($postData['id_nhacungcap']);
		//create response data
		$response=[];
		array_push($response, ['list' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function getMathang()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$postData=$this->input->post();
		$searchItem=[
			'id_nhacungcap'=>$postData['id_nhacungcap'],
			'id_danhmuc'=>$postData['id_danhmuc']
		];
		
		$data=$this->Item_Model->getBySearchInfo($searchItem);

		//create response data
		$response=[];
		array_push($response, ['data' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
		
	}

	public function getMathangById()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$postData=$this->input->post();
		$data=$this->Item_Model->getByInfo(['id_mathang'=>$postData['id_mathang']]);
		//create response data
		$response=[];
		array_push($response, ['data' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function getDataChart()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}

		$data=$this->Nhapkho_Model->getDataChart();
		
		//create response data
		$response=[];
		array_push($response, ['data' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
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
