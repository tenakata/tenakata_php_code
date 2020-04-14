<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_supervisormp_pin_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'pin' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'role' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
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
                $this->dbforge->create_table('supervisormp_pin');
        }

        public function down()
        {
                $this->dbforge->drop_table('supervisormp_pin');
        }
}
?>