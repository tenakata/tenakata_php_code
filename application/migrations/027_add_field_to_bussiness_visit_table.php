<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Add_field_to_bussiness_visit_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
   $fields = array(
    'status' => array(
        'type' => 'varchar',
         'constraint' => '200',
         'default' => 'false',
),
    
    );
     
    $this->dbforge->add_column('bussiness_visit', $fields); 
  }
 
  public function down()
  {
    
    $this->dbforge->drop_column('bussiness_visit', 'status');
  
    
    
  }
}
?>