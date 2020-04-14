<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_admin_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'fname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'lname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'image' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'publicid_img' => array(
                                'type' => 'VARCHAR',
                                 'constraint' => '200',
                        ),
                        'created_at' => array(
                                'type' => 'VARCHAR',
                                 'constraint' => '200',
                                 'default' => 'CURRENT_TIMESTAMP',
                        ),
                       

                       
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('admin');
        }

        public function down()
        {
                $this->dbforge->drop_table('admin');
        }
}