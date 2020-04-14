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
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
              ),
             
    
    );
   
    $this->dbforge->add_column('business_register', $fields); 
  }
 
  public function down()
  {
    
        $this->dbforge->drop_column('business_register', 'email');
       


       
  }
}
?>