<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_training_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'user_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                
                              ),
                        'supervisor_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200',
                                
                        ),     
                     
                        'title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'video' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                         ),
                         'role' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                        ),
                        'rating' => array(
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

                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('training');
        }

        public function down()
        {
                $this->dbforge->drop_table('training');
        }
}
?>