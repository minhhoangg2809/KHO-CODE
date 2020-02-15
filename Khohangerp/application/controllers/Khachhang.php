<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khachhang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Khachhang_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['all'] = $this->Khachhang_Model->get();
		$this->load->view('header');
		$this->load->view('header_desktop');
		$this->load->view('sidebar');
		$this->load->view('list_khachhang',$data);
		$this->load->view('footer');
	}

	// Add a new item
	public function add()
	{
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
		$id=$this->input->post('id');

		$res = $this->Khachhang_Model->delete($id);
		if (!$res) {
			
			$this->session->set_flashdata('ER_kh','Error !!!');
			$this->session->set_flashdata('SU_kh','');
		}
		else {
			$this->session->set_flashdata('ER_kh','');
			$this->session->set_flashdata('SU_kh','Success !!!');
		}

		redirect('Khachhang/','refresh');
	}
}

/* End of file Khachhang.php */
/* Location: ./application/controllers/Khachhang.php */
