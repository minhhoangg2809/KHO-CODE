<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thongbao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Thongbao_Model');
	}


	public function get()
	{
		$chk=$this->checkSession();
		if (!$chk) {
			redirect('User','refresh');
			die();
		}
		
		$data=$this->Thongbao_Model->getLimit(5,0);
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

	public function delete()
	{
		$id=$this->input->post('id');
		echo $this->Thongbao_Model->delete($id);
	}

}

/* End of file Thongbao.php */
/* Location: ./application/controllers/Thongbao.php */
