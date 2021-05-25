<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */

class Loginregister extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginregisterModel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim' );
		$this->form_validation->set_rules('password', 'Password', 'required|trim' );

		if ($this->form_validation->run() == false) {
            $data['title'] = "Cuci Sepatu";
			$this->load->view('loginregister/loginregister_header', $data);
			$this->load->view('loginregister/login');
			$this->load->view('loginregister/loginregister_footer');
		} 
		else {			
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->loginregisterModel->getUsername($username);

		if ($user){
			if ($user['status'] == 1){
				if (password_verify($password, $user['password'])){
					$data = [
						'access' => $user['user_id'],
						'username' => $user['username'],
						'role' => $user['role'],
					];
					$this->session->set_userdata($data);
					if ($user['role'] == 1){
						redirect('admin/dashboard');
					}elseif ($user['role'] == 2){
						redirect('cashier/dashboard');
					}elseif ($user['role'] == 3){
						redirect('worker/dashboard');
					}else{
						redirect('loginregister');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Try Again!! Wrong Password!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('loginregister');
				}
			}else{
				if (password_verify($password, $user['password'])){
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">Your Account is not activate! Maybe its blocked by Admin!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('loginregister');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Try Again!! Wrong Password!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('loginregister');
				}
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">Your Account is not registered!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('loginregister');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('role');
		redirect('loginregister');
	}

	//statement if you dont have an access
	public function donthaveaccess()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">You dont have an access!!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></div>');
		$data['title'] = "Cuci Sepatu";
		$this->load->view('loginregister/loginregister_header', $data);
		$this->load->view('loginregister/login');
		$this->load->view('loginregister/loginregister_footer');
	}

	//if you arent login
	public function errorlogin()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto alert-dismissible fade show" role="alert">You arent login! Please login first!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button></div>');
		$data['title'] = "Cuci Sepatu";
		$this->load->view('loginregister/loginregister_header', $data);
		$this->load->view('loginregister/login');
		$this->load->view('loginregister/loginregister_footer');
	}

}
