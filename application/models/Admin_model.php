<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

    public function getRoles(){
		$roles = $this->db->get('roles');
		if($roles->num_rows() > 0){
			return $roles->result();
		}
    }

    public function getColleges(){
    	$colleges = $this->db->get('colleges');
		if($colleges->num_rows() > 0){
			return $colleges->result();
		}
    }

    public function register(){
    	$password = $this->input->post('password');
		$data = array(
	        'username' => $this->input->post('username'),
	        'email' => $this->input->post('email'),
	        'gender' => $this->input->post('gender'),
	        'role_id' => $this->input->post('role'),
	        'password' => md5($password),
	    );

	    return $this->db->insert('users', $data);
    }


    public function login($email,$password)
	{
		$query = $this->db->get_where('users', array('email' => $email,'password'=>$password));
	    if($query->num_rows()==1)
	    {
	       return $query->row(0);
	    }
	    else
	    {
	    	return false;
	    }
	}

	public function addCoAdmin(){
		$password = $this->input->post('password');
		$data = array(
	        'username' => $this->input->post('username'),
	        'email' => $this->input->post('email'),
	        'gender' => $this->input->post('gender'),
	        'role_id' => $this->input->post('role'),
	        'college_id' => $this->input->post('collegename'),
	        'password' => md5($password),
	    );

	    return $this->db->insert('users', $data);
	}

	public function viewAllColleges(){
		$this->db->select (['users.id as "uid"','users.username','users.email','users.gender','roles.role','colleges.id as "cid"','colleges.collegename','colleges.branch']);
		$this->db->from('colleges');
		$this->db->join('users','users.id = colleges.user_id');
		$this->db->join('roles','roles.id = users.role_id');
	    $query = $this->db->get ();
	    return $query->result ();
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
