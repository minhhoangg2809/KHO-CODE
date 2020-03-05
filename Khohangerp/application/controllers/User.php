<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library('form_validation');
		$this->load->model('User_Model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		if (!empty($_SESSION['username'])) {
			$this->toMain();
		}
		else{
			$this->toLogin_view();
		}
	}

	public function toLogin_view()
	{
		$this->load->view('login_view');
	}

	public function toForget_pass_view()
	{
		$this->load->view('forget_pass');
	}
	
	public function toMain()
	{
		if (!empty($_SESSION['username'])) {
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('header_desktop');
			$this->load->view('main_view');
			$this->load->view('footer');
		}
		else{
			$this->toLogin_view();
		}
		
	}

	public function toList_userview()
	{
		if (!empty($_SESSION['username'])) {

			$total_rows = count($this->User_Model->get());
			$per_page = 5;


			$this->load->library('pagination');

			$config['base_url'] = base_url().'User/index';;
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

			$data['all'] = $this->User_Model->getLimit($per_page,$uri_seg);
			$data['page'] = $page;
			
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('header_desktop');
			$this->load->view('list_user_view',$data);
			$this->load->view('footer');
		}
		else {
			$this->toLogin_view();
		}
		
	} 


	// Add a new item
	public function add()
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('confpassword','Confirm Password'
			, 'trim|required|min_length[5]|matches[password]');


		$data=$this->input->post();
		

		$username=$data['username'];
		$password=md5($data['password']);
		$name=$data['name'];
		$email=$data['email'];
		$phone=$data['phone'];
		

		$new_user = [
			'username' => $username,
			'password' => $password,
			'hoten' => $name,
			'email' => $email,
			'sdt' => $phone,
		];

		if ($this->form_validation->run() == TRUE) {

			$chk_username=$this->User_Model->check_username($username);
			$chk_email=$this->User_Model->check_mail($email);

			if ($chk_username==true&&$chk_email==true) {
				$this->session->set_flashdata('Mail','This email already exists');
				$this->session->set_flashdata('UserWel','');
				$this->session->set_flashdata('UserEx','This user already exists');

				$this->toList_userview();
			}
			else if ($chk_username==true&&$chk_email==false) {

				$this->session->set_flashdata('UserWel','');
				$this->session->set_flashdata('Mail','');
				$this->session->set_flashdata('UserEx','This user already exists');
				
				$this->toList_userview();
			}
			else if ($chk_username==false&&$chk_email==true) {

				$this->session->set_flashdata('UserWel','');
				$this->session->set_flashdata('Mail','This email already exists');
				$this->session->set_flashdata('UserEx','');
				
				$this->toList_userview();
			}
			else {
				$this->User_Model->insert($new_user);

				$this->session->set_flashdata('UserEx','');
				$this->session->set_flashdata('Mail','');
				$this->session->set_flashdata('UserWel','Success !!! '.$username.' is new member');

				$this->addNotification($_SESSION['user'].' đã thêm 1 tài khoản',$_SESSION['username']);

				$this->toList_userview();
			}

		} else {
			$this->toList_userview();
		}

	}

	//Update one item
	public function update($id)
	{
		if (!empty($_SESSION['username'])) {

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('newpassword', 'Password', 'trim|min_length[5]');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('confpassword','Confirm Password'
				, 'trim|min_length[5]|matches[newpassword]');


			$data=$this->input->post();
			$users=$this->User_Model->getbyId($id);

			$username=$data['username'];
			$password=md5($data['newpassword']);
			$name=$data['name'];
			$email=$data['email'];
			$phone=$data['phone'];
			

			$user = [
				'username' => $username,
				'hoten' => $name,
				'email' => $email,
				'sdt' => $phone,
				'password' => $oldpass
			];

			$pass=['password'=>$password];

			if ($this->form_validation->run() == TRUE) {

				$chk_username=$this->User_Model->check_username($username);
				$chk_email=$this->User_Model->check_mail($email);


				$this->User_Model->update($user,$id);

				if(!is_null($password)) {
					$this->User_Model->update($pass,$id);
				}

				$this->session->set_flashdata('UserEx','');
				$this->session->set_flashdata('Mail','');
				$this->session->set_flashdata('UserWel','Success !!! '.$username.' is updated');

				redirect('User/toList_userview','refresh');

			} else {
				redirect('User/toList_userview','refresh');
			}
		}
		
	}

	//Delete one item
	public function delete($id)
	{
		if (!empty($_SESSION['username'])) {

			$delete = $this->User_Model->delete($id);

			if ($delete) {
				$this->session->set_flashdata('UserEx','');
				$this->session->set_flashdata('Mail','');
				$this->session->set_flashdata('UserWel','Success !!!');

				$this->addNotification($_SESSION['user'].' đã xóa 1 tài khoản',$_SESSION['username']);

				redirect('User/toList_userview','refresh');
			}
			else {
				$this->session->set_flashdata('UserEx','Error !!!');
				$this->session->set_flashdata('Mail','');
				$this->session->set_flashdata('UserWel','Success !!!');

				redirect('User/toList_userview','refresh');
			}
		}
		
	}

	public function login()
	{
		$data=$this->input->post();

		$pass = md5($data['password']);

		$chk_user = $this->User_Model->userlogin($data['username'],$pass);

		if ($chk_user==true) {
			
			$_SESSION['username'] = $chk_user;
			
			$user=$this->User_Model->getcurrent_user($data['username']);

			$currentuser=$user[0]['username'];
			$currentmail=$user[0]['email'];

			$_SESSION['user']=$currentuser;
			$_SESSION['mail']=$currentmail;
		}
		else {
			
			$this->session->set_flashdata('ER','Wrong Username/Password !!!');
			$this->session->set_flashdata('SU','');
			
		}
		redirect('User/','refresh');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('mail');
		$this->session->unset_userdata('chucvu');

		$this->toLogin_view();
	}

	
	public function send_mail($mess,$to)
	{
		$this->load->library('email');
		//0

		$mail_config['smtp_host'] = 'smtp.gmail.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'myserverhoanggiap@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'yxwubgkgdxzstpkd';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;

		$this->email->initialize($mail_config);

		$this->email->set_newline("\r\n");

		$this->email->from($mail_config['smtp_user'], 'QTHT');
		$this->email->to($to);

        // $this->email->cc('another@example.com');
        // $this->email->bcc('and@another.com');

		$this->email->subject('Xin chào');
		$this->email->message('Mật khẩu mới của bạn là '.$mess);

		$this->email->send();
	}

	public function forgetpass()
	{
		$code=$this->rand_string(5);

		$data=$this->input->post();

		if ($this->User_Model->check_mail($data['email'])==TRUE) {

			if ( $this->User_Model->updatePass($data['email'],$code)) {

				$this->send_mail($code,$data['email']);


				$this->session->set_flashdata('ER','');
				$this->session->set_flashdata('SU','Success !!! Pls check your email ');

				$this->toLogin_view();
			}
			else {

				$this->session->set_flashdata('ER','Error !!!');
				$this->session->set_flashdata('SU','');
				$this->toForget_pass_view();
			}

		}
		else {

			$this->session->set_flashdata('ER','Your email doesnt exists !!!');
			$this->session->set_flashdata('SU','');
			$this->toForget_pass_view();
		}
	}

	public function rand_string( $length ) {
		$str='';
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */