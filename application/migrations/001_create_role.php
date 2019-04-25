<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_role extends CI_Migration {

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
            'role' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '200',
            ),
        ));
	    $this->dbforge->add_key('id', TRUE);
	    $this->dbforge->create_table('roles');
	}

	public function down() {
		$this->dbforge->drop_table('roles');
	}

}

/* End of file Migration_Admin_role.php */
/* Location: ./application/migrations/Migration_Admin_role.php */
