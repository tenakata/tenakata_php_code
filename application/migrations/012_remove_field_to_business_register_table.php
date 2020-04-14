<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Remove_field_to_business_register_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
      $this->dbforge->drop_column('business_register', 'document');
     
  }
 
  public function down()
  {
    
  }
}
?>