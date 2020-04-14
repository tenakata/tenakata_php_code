<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Add_field_to_daily_sales_purchases_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
   $fields = array(
            'item_list' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'attach_recepit' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
           
    
    );
   
    $this->dbforge->add_column('daily_sales_purchases', $fields); 
  }
 
  public function down()
  {
    
        $this->dbforge->drop_column('daily_sales_purchases', 'item_list');
        $this->dbforge->drop_column('daily_sales_purchases', 'attach_recepit');
       
  }
}
?>