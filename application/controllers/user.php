<?php

class user extends MY_Controller {

	  

	function __construct()
	{
		parent::__construct();

	}
	
	function login()
	{
		if($this->session->userdata('email'))
		{
			redirect('user/myaccount', 'refresh');
		}
			$this->view_data['selected_page']="login";
			$this->view_data['title']="Login | Mera Mobile";
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			if($this->form_validation->run()==TRUE)
			{

				$email=$this->input->post("email");
				$pass=$this->input->post("password");
				
				$this->load->model("user_model");

				if($this->user_model->user_login($email,$pass))
				{
					
				    $userdata = array('email'=> $email);
					$this->session->set_userdata($userdata);
				    redirect('user/myaccount', 'refresh');
				}
				else
				{
					$this->view_data['err_msg']="Wrong Username/Password";
				}
				

			}

			
		
		
	}

	function register()
	{
			$this->view_data['selected_page']="register";
			$this->view_data['title']="Registration | Mera Mobile";
			$this->form_validation->set_rules('youremail', 'Email', 'trim|required|xss_clean|callback_email_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('reenteremail', 'renter-Email ', 'trim|required|xss_clean|matches[youremail]');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			if($this->form_validation->run()==TRUE)
			{
					$email1=$this->input->post('youremail');
					$ins_data['email']=$email1;
					$ins_data['fname']=$this->input->post('firstname');
					$ins_data['lname']=$this->input->post('lastname');
					$ins_data['pass']=$this->input->post('password');

					$this->load->model("user_model");
					if($this->user_model->insert_data($ins_data))
					{
						$userdata = array('email'=> $email1);
					$this->session->set_userdata($userdata);
				   //redirect('user/user_registered', 'refresh');
					}

					
				
			}
			
	}

	public function email_check($email)
	{

		$this->load->model("user_model");
		 return $this->user_model->email_check($email);
	}

	public function user_registered()
	{
			$this->view_data['selected_page']="register";
			$this->view_data['title']="Thanks for Registration | Mera Mobile";
			

	}

	function logout()
	{
			$this->session->unset_userdata('email');
			redirect('user/login', 'refresh');
	}

	function myaccount()
	{
		$this->view_data['selected_page']="myaccount";
	    $this->view_data['title']="My Account| Mera Mobile";
	    

	}
	
	


}