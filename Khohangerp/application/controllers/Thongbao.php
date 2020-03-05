<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thongbao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Thongbao_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{

	}

	public function get()
	{
		$data=$this->Thongbao_Model->getLimit(5,0);
		//create response data
		$response=[];
		array_push($response, ['data' => $data]);

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Thongbao.php */
/* Location: ./application/controllers/Thongbao.php */
