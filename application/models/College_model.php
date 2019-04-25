<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class College_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

	public function addCollege(){
		$data = array(
			'user_id' => $this->session->userdata('user_id'),
	        'collegename' => $this->input->post('collegename'),
	        'branch' => $this->input->post('branch'),
	    );
	    return $this->db->insert('colleges', $data);
	}

}

/* End of file College_model.php */
/* Location: ./application/models/College_model.php */
