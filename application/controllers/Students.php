<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url_helper');
	  	$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('admin_model');
        $this->load->model('student_model');
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in') !== true){
			return redirect('admin/login');
		}
    }


	public function addStudent(){
		$data['title'] = ucfirst('Add Student');
		$data['colleges'] = $this->admin_model->getColleges();
		$this->load->view('templates/header', $data);
		$this->load->view('student/addStudent', $data);
		$this->load->view('templates/footer', $data);

	}

	public function createStudent(){
		$formData =array(
			    'studentname' => $this->input->post('studentname'),
			    'email' => $this->input->post('email'),
			    'gender' => $this->input->post('gender'),
			    'collegename' => $this->input->post('collegename'),
			    'course' => $this->input->post('course'),
			);

		$this->form_validation->set_rules('studentname', 'studentname', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('course', 'course', 'required');
		$this->form_validation->set_rules('collegename', 'CollegeName', 'required');
		$this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[students.email]');


        $data['colleges'] = $this->admin_model->getColleges();
		$data['title'] = ucfirst('Add Student');
		if($this->form_validation->run() == FALSE)
        {
			$this->session->set_flashdata('formData', $formData);
        	$this->load->view('templates/header', $data);
			$this->load->view('student/addStudent', $data);
			$this->load->view('templates/footer', $data);
        }else{
			$addStudent = $this->student_model->addStudent();
			if ($addStudent) {
				$this->session->set_flashdata('success', 'Student Added SuccessFully');
				redirect('students/addStudent');
			}else{
				$this->session->set_flashdata('error', 'Student Not Added');
				redirect('students/addStudent');
			}
        }
	}

	public function viewStudents($collegeId){
		$data['title'] = ucfirst('View Students');
		$data['students'] = $this->student_model->getStudents($collegeId);
		$this->load->view('templates/header', $data);
		$this->load->view('student/viewStudents', $data);
		$this->load->view('templates/footer', $data);
	}

	public function editStudent($studentId){
		$data['title'] = ucfirst('Edit Student');
		$data['colleges'] = $this->admin_model->getColleges();
		$data['student'] = $this->student_model->getStudent($studentId);
		$this->load->view('templates/header', $data);
		$this->load->view('student/editStudent', $data);
		$this->load->view('templates/footer', $data);
	}

	public function updateStudent($studentId){
		$this->form_validation->set_rules('studentname', 'studentname', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('course', 'course', 'required');
		$this->form_validation->set_rules('collegename', 'CollegeName', 'required');
		$this->form_validation->set_rules('course', 'Course', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');


        $data['title'] = ucfirst('Edit Student');
		$data['colleges'] = $this->admin_model->getColleges();
		$data['student'] = $this->student_model->getStudent($studentId);

		if($this->form_validation->run() == FALSE)
        {
			$this->load->view('templates/header', $data);
			$this->load->view('student/editStudent', $data);
			$this->load->view('templates/footer', $data);
        }else{
			$updateStudent = $this->student_model->updateStudent($studentId);
			if ($updateStudent) {
				$this->session->set_flashdata('success', 'Student Updated SuccessFully');
				redirect('students/editStudent/'.$studentId);
			}else{
				$this->session->set_flashdata('error', 'Student Not Updated');
				redirect('students/editStudent/'.$studentId);
			}
        }

	}

	public function removeStudent($studentId){
		$result=$this->student_model->deleteStudent($studentId);
        if ($result==true) {
            $this->session->set_flashdata('success', 'Student Deleted SuccessFully');
            redirect('admin/dashboard');
        }
	}

}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */
