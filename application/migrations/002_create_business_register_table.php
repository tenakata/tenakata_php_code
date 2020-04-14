<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_business_register_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                       
                        'business_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                
                        ),
                        'name' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'phone' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'country_code' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'location' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200',
                        ),
                        'image' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'public_id' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                       
                        'document' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
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
                $this->dbforge->create_table('business_register');
        }

        public function down()
        {
                $this->dbforge->drop_table('business_register');
        }
}
?>
