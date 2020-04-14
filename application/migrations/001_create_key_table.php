<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_key_table extends CI_Migration {

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
                                'constraint' => '100',
                                'default' => '0'
                        ),
                        'key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => 'admin@123',
                        ),
                        'level' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => '0',
                        ),
                        'ignore_limits' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => '0',
                        ),
                        'is_private_key' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => '0',
                        ),
                        'ip_addresses' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'default' => NULL,
                        ),
                        'create_at' => array(
                                 'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('keys');
        }

        public function down()
        {
                $this->dbforge->drop_table('keys');
        }
}
?>
