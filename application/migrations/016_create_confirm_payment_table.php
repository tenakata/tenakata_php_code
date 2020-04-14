<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_confirm_payment_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'transaction_id' => array(
                                 'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                        ),
                        'amount_paid' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'payment_option' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '200'
                        ),
                        'naration' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                         ),
                         'sales_purchase' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '200'
                        ),
                        'message' => array(
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

                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (transaction_id) REFERENCES credit_sales_purchases(id) ON DELETE CASCADE ON UPDATE CASCADE');
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('confirm_payment');
        }

        public function down()
        {
                $this->dbforge->drop_table('confirm_payment');
        }
}
?>