<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	  	$this->load->model('admin_model');
        $this->load->library('session');
        $this->load->helper('form');
		$this->load->library('form_validation');
        $method = $this->router->fetch_method();
	}

	public function index(){
		echo('arg1');
	}

	public function registerView(){
		if($this->session->userdata('logged_in') === true){
			return redirect('admin/dashboard');
		}
		$data['roles'] = $this->admin_model->getRoles();
		$data['title'] = ucfirst('Register');
		$this->load->view('templates/header', $data);
		$this->load->view('admin/register', $data);
		$this->load->view('templates/footer', $data);

	}

	public function register(){
		if($this->session->userdata('logged_in') === true){
			return redirect('admin/dashboard');
		}
		$formData =array(
			    'username' => $this->input->post('username'),
			    'email' => $this->input->post('email'),
			    'gender' => $this->input->post('gender'),
			    'gender' => $this->input->post('gender'),
			    'role' => $this->input->post('role'),
		);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

        $data['roles'] = $this->admin_model->getRoles();
		$data['title'] = ucfirst('Register');

        if($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('formData', $formData);
        	$data['title'] = 'Register';
        	$this->load->view('templates/header', $data);
			$this->load->view("admin/register.php");
			$this->load->view('templates/footer');
        }else{
			$register = $this->admin_model->register();
			if ($register) {
				$this->session->set_flashdata('success', 'SuucessFully Registered');
				redirect('admin/registerView');
			}
        }
	}

	public function loginView(){
		if($this->session->userdata('logged_in') === true){
			return redirect('admin/dashboard');
		}
		$data['title'] = ucfirst('Login');
		$this->load->view('templates/header', $data);
		$this->load->view('admin/login', $data);
		$this->load->view('templates/footer', $data);
	}

	public function login(){
		if($this->session->userdata('logged_in') === true){
			return redirect('admin/dashboard');
		}
		$formData =array(
			'email' => $this->input->post('email'),
		);

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE){
        	$data['title'] = 'Login';
        	$this->session->set_flashdata('formData', $formData);
			$this->load->view('templates/header', $data);
			$this->load->view('admin/login');
			$this->load->view('templates/footer');
        }else{
        	$email=$this->input->post('email');
	    	$password=md5($this->input->post('password'));

	    	$user=$this->admin_model->login($email,$password);
	    	if ($user) {
    	  	$user_data=array(
                 'user_id'=>$user->id,
                 'username'=>$user->username,
                 'email'=>$user->email,
                 'role_id'=>$user->role_id,
                 'logged_in'=>true
    	  	);
    	  	$this->session->set_userdata($user_data);
    	  	$this->session->set_flashdata('success','You Are Loged In');
    	  	redirect('admin/dashboard');
        }else{
        	$this->session->set_flashdata('formData',$formData);
        	$this->session->set_flashdata('error','Invalid Email Or Password');
    	    redirect('admin/loginView');
       	  }
      	}
	}

	public function dashboard(){
		if($this->session->userdata('logged_in') !== true){
			return redirect('admin/login');
		}

		$data['title'] = ucfirst($this->session->userdata('username'));
		$data['collegeUsers'] = $this->admin_model->viewAllColleges();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer', $data);
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
    	$this->session->unset_userdata('user_id');
    	$this->session->unset_userdata('username');
    	$this->session->unset_userdata('email');
    	$this->session->set_flashdata('success','You are now logged out');
        redirect('admin/loginView');
	}


	public function addCoAdmin(){
		if($this->session->userdata('logged_in') !== true){
			return redirect('admin/login');
		}
		$data['roles'] = $this->admin_model->getRoles();
		$data['colleges'] = $this->admin_model->getColleges();
		$data['title'] = ucfirst('Add Coadmin');
		$this->load->view('templates/header', $data);
		$this->load->view('admin/addCoadmin', $data);
		$this->load->view('templates/footer', $data);
	}

	public function createCoAdmin(){
		if($this->session->userdata('logged_in') !== true){
			return redirect('admin/login');
		}
		$formData =array(
			    'username' => $this->input->post('username'),
			    'email' => $this->input->post('email'),
			    'gender' => $this->input->post('gender'),
			    'role' => $this->input->post('role'),
			    'collegename' => $this->input->post('collegename'),
		);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('collegename', 'CollegeName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

        $data['roles'] = $this->admin_model->getRoles();
		$data['colleges'] = $this->admin_model->getColleges();
		$data['title'] = ucfirst('Add Coadmin');

        if($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('formData', $formData);
        	$this->load->view('templates/header', $data);
			$this->load->view("admin/addCoadmin.php");
			$this->load->view('templates/footer');
        }else{
        	$coAdmin = $this->admin_model->addCoAdmin();
			if ($coAdmin) {
				$this->session->set_flashdata('success', 'Co Admin Added SuccessFully');
				redirect('admin/addCoAdmin');
			}else{
				$this->session->set_flashdata('error', 'Co Admin Not Added');
				redirect('admin/addCoAdmin');
			}
        }
	}

}

/* End of file Admin */
/* Location: ./application/controllers/Admin */
