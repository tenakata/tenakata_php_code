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
      $this->dbforge->drop_column('business_register', 'current_date');
      $this->dbforge->drop_column('business_register', 'comment');
      $this->dbforge->drop_column('business_register', 'bussiness_location');
      $this->dbforge->drop_column('business_register', 'stock');
      $this->dbforge->drop_column('business_register', 'busy_shop');
     
  }
 
  public function down()
  {
    
  }
}
?>