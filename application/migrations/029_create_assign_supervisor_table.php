<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_assign_supervisor_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'supervisor_id' => array(
                                 'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                        ),
                        'assign_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                       
                        'created_at' => array(
                            'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
                        ),
                        'updated_at' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                        )
                        
                ));

                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (supervisor_id) REFERENCES superwiser_register(id) ON DELETE CASCADE ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('assign_supervisor');
        }

        public function down()
        {
                $this->dbforge->drop_table('assign_supervisor');
        }
}
?>