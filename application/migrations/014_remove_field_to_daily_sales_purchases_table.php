<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Migration_Remove_field_to_daily_sales_purchases_table extends CI_Migration {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->dbforge();
  }
 
  public function up()
  {
      //$this->dbforge->drop_column('daily_sales_purchases', 'narration');
      //$this->dbforge->drop_column('daily_sales_purchases', 'attach_book');
     
  }
 
  public function down()
  {
    
  }
}
?>