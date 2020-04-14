<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_business_session_token_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'business_user_id' => array(
                                 'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                        ),
                        'sessiontoken' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'device_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'device_type' => array(
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

                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (business_user_id) REFERENCES business_register(id) ON DELETE CASCADE ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('business_session_token');
        }

        public function down()
        {
                $this->dbforge->drop_table('business_session_token');
        }
}
?>