<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_bussiness_visit_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'business_register_id' => array(
                            'type' => 'INT',
                           'constraint' => 5,
                           'unsigned' => TRUE,
                        ),
                        'current_date' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'comment' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'bussiness_location' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'stock' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                        'busy_shop' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                        ),
                      
                        'created_at' => array(
                                'type' => 'VARCHAR',
                                 'constraint' => '200',
                                 'default' => 'CURRENT_TIMESTAMP',
                        ),
                       

                       
                        
                ));
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (business_register_id) REFERENCES business_register(id) ON DELETE CASCADE ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('bussiness_visit');
        }

        public function down()
        {
                $this->dbforge->drop_table('bussiness_visit');
        }
}