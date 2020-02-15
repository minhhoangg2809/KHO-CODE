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
		$data['all'] = $this->Nhapkho_Model->get();
		$data['nhacungcap']=$this->Supplier_Model->get();
		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('nhapkho_view',$data);
		$this->load->view('footer');
	}

	public function getDetail()
	{
		$postData=$this->input->post();
		$data=$this->Nhapkho_Model->getCt(['chitiet_nhap.id_nhap'=>$postData['id_nhap']]);
		echo json_encode($data);
	}

	// Add 
	public function add()
	{
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
		$postData=$this->input->post();
		$data=$this->Cat_Model->getDanhmuc_Nhacungcap($postData['id_nhacungcap']);
		//create response data
		$response=[];
		array_push($response, ['list' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function getMathang()
	{
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
		$postData=$this->input->post();
		$data=$this->Item_Model->get(['id_mathang'=>$postData['id_mathang']]);
		//create response data
		$response=[];
		array_push($response, ['data' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
