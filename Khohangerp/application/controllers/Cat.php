<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Cat_Model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->toList();
	}

	public function toList()
	{
		$data['all'] = $this->Cat_Model->get();

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
		}
		else {

			$this->session->set_flashdata('ER_cat','Error !!!');
			$this->session->set_flashdata('SU_cat','');
		}

		$this->toList();
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

		$this->toList();
	}

	//Delete one item
	public function delete()
	{
		$id = $this->input->post('id');

		$res = $this->Cat_Model->delete($id);
		if ($res) {

			$this->session->set_flashdata('ER_cat','');
			$this->session->set_flashdata('SU_cat','Success !!!');
		}
		else {

			$this->session->set_flashdata('ER_cat','Error !!!');
			$this->session->set_flashdata('SU_cat','');
		}

		$this->toList();
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
			
			$this->toList();
		}
	}
}

/* End of file Cat.php */
/* Location: ./application/controllers/Cat.php */
