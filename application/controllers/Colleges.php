<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colleges extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	  	$this->load->model('college_model');
        $this->load->library('session');
        $this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== true){
			return redirect('admin/login');
		}
	}

	public function addCollege(){
		$data['title'] = ucfirst('Add College');
		$this->load->view('templates/header', $data);
		$this->load->view('college/addCollege', $data);
		$this->load->view('templates/footer', $data);
	}

	public function createCollege(){
		$formData =array(
			'collegename' => $this->input->post('collegename'),
			'branch' => $this->input->post('branch'),
		);

		$this->form_validation->set_rules('collegename', 'College Name', 'trim|required');
		$this->form_validation->set_rules('branch', 'Branch', 'required');

		if($this->form_validation->run() == FALSE){
        	$data['title'] = ucfirst('Add College');
        	$this->session->set_flashdata('formData', $formData);
			$this->load->view('templates/header', $data);
			$this->load->view('college/addCollege', $data);
			$this->load->view('templates/footer', $data);
        }else{
			$addCollege = $this->college_model->addCollege();
			if ($addCollege) {
				$this->session->set_flashdata('success', 'College Added SuccessFully');
				redirect('colleges/addCollege');
			}else{
				$this->session->set_flashdata('error', 'College Added Failed');
				redirect('colleges/addCollege');
			}
        }
	}

}

/* End of file Colleges.php */
/* Location: ./application/controllers/Colleges.php */
