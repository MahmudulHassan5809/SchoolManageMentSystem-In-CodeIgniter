<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_student extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'studentname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
            ),
            'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
            ),
            'gender' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
            ),
            'college_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'default' => 0
            ),
           'course' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
            ),
        ));

		$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (college_id) REFERENCES colleges(id)');

		$this->dbforge->add_key('id', TRUE);
	    $this->dbforge->create_table('students');
	}

	public function down() {
		$this->dbforge->drop_table('students');
	}

}

/* End of file 004_create_student.php */
/* Location: ./application/migrations/004_create_student.php */
