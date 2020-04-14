<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Add_field_to_business_register_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
   $fields = array(
            'superviser_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
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
           
           
    
    );
   
    $this->dbforge->add_column('business_register', $fields); 
  }
 
  public function down()
  {
    
        $this->dbforge->drop_column('business_register', 'superviser_id');
        $this->dbforge->drop_column('business_register', 'current_date');
        $this->dbforge->drop_column('business_register', 'comment');
        $this->dbforge->drop_column('business_register', 'bussiness_location');
        $this->dbforge->drop_column('business_register', 'stock');
        $this->dbforge->drop_column('business_register', 'busy_shop');


       
  }
}
?>