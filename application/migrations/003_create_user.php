<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_user extends CI_Migration {

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
            'username' => array(
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
            'role_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
            ),
            'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 200,
            ),
        ));

		$this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES roles(id)');
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (college_id) REFERENCES colleges(id)');

		// $this->dbforge->add_column('users',[
		//     'CONSTRAINT fk_id FOREIGN KEY(role_id) REFERENCES roles(id)',
		// ]);

	    $this->dbforge->add_key('id', TRUE);
	    $this->dbforge->create_table('users');
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}

/* End of file Migration_Admin_role.php */
/* Location: ./application/migrations/Migration_Admin_role.php */
