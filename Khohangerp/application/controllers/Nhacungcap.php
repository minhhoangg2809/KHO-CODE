<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nhacungcap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Supplier_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['all'] = $this->Supplier_Model->get();
		unset($_SESSION['action']);
		$_SESSION['action'] = 'nhacungcap';
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
		}
		else {
			$this->session->set_flashdata('ER_ncc','');
			$this->session->set_flashdata('SU_ncc','Success !!!');
		}

		redirect('Nhacungcap/','refresh');
	}
}

/* End of file Nhacungcap.php */
/* Location: ./application/controllers/Nhacungcap.php */
