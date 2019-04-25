<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

    public function addStudent(){
		$data = array(
	        'studentname' => $this->input->post('studentname'),
	        'email' => $this->input->post('email'),
	        'gender' => $this->input->post('gender'),
	        'college_id' => $this->input->post('collegename'),
	        'course' => $this->input->post('course'),
	    );

	    return $this->db->insert('students', $data);
    }

    public function getStudents($collegeId){
    	$this->db->select(['colleges.id as "cid"','colleges.collegename','students.id as "sid"','students.email','students.gender','students.course','students.studentname']);
    	$this->db->from('students');
    	$this->db->join('colleges','colleges.id = students.college_id');
    	$this->db->where(['students.college_id' => $collegeId]);
    	$query = $this->db->get();
    	return $query->result();
    }

    public function getStudent($studentId){
        $query = $this->db->select('*')->from('students')->where('id',$studentId)->get();
        return $query->result()[0];
    }

    public function updateStudent($studentId){
       $data = array(
            'studentname' => $this->input->post('studentname'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender'),
            'college_id' => $this->input->post('collegename'),
            'course' => $this->input->post('course'),
        );
       $this->db->where('id',$studentId);
       return $this->db->update('students',$data);
    }

    public function deleteStudent($studentId){
        $this->db->where('id', $studentId);
        $this->db->delete('students');
        return true;
    }


}

/* End of file Student_model.php */
/* Location: ./application/models/Student_model.php */
