<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_superwiser_register_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                       'name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'email' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'country_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                            ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'role' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                         ),   
                        'create_at' => array(
                                    'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
                        ),
                        'updated_at' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('superwiser_register');
        }

        public function down()
        {
                $this->dbforge->drop_table('superwiser_register');
        }
}
?>
