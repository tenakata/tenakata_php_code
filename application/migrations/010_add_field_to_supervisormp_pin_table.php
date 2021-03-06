<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Add_field_to_supervisormp_pin_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
   $fields = array(
      'user_id' => array(
        'type' => 'INT',
         'constraint' => 5,
          'unsigned' => TRUE,
      )
    
    );
     $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES superwiser_register(id) ON DELETE CASCADE ON UPDATE CASCADE');
    $this->dbforge->add_column('supervisormp_pin', $fields); 
  }
 
  public function down()
  {
    
    $this->dbforge->drop_column('supervisormp_pin', 'user_id');
  
    
    
  }
}
?>