<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_daily_sales_purchases_table extends CI_Migration {

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
                        'date' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'amount' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'narration' => array(
                                 'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'attach_book' => array(
                            'type' => 'TEXT',
                            'null' => TRUE,
                        ),
                        'public_id' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'payment_type' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                         ),
                        'sales_purchases' => array(
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
                $this->dbforge->create_table('daily_sales_purchases');
        }

        public function down()
        {
                $this->dbforge->drop_table('daily_sales_purchases');
        }
}
?>