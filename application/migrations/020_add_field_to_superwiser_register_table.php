<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Add_field_to_superwiser_register_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
   $fields = array(
            'image' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'public_id' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
            ),
             
    
    );
   
    $this->dbforge->add_column('superwiser_register', $fields); 
  }
 
  public function down()
  {
    
        $this->dbforge->drop_column('superwiser_register', 'image');
        $this->dbforge->drop_column('superwiser_register', 'public_id');
       
 }
}
?>