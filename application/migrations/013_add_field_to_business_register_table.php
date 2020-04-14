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
            'owner_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'business_registered' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'registation_no' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'gender' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'core_business' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                
            ),
            'activities' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'business_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'no_of_employees' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'branches' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'financial_institution' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'any_loan' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'loan_amount' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'loan_purpose' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'receive_payments' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'make_payments' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'busniness_funding' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
      
    
    );
   
    $this->dbforge->add_column('business_register', $fields); 
  }
 
  public function down()
  {
    
        $this->dbforge->drop_column('business_register', 'owner_name');
        $this->dbforge->drop_column('business_register', 'business_registered');
        $this->dbforge->drop_column('business_register', 'registation_no');
        $this->dbforge->drop_column('business_register', 'gender');
        $this->dbforge->drop_column('business_register', 'core_business');
        $this->dbforge->drop_column('business_register', 'activities');
        $this->dbforge->drop_column('business_register', 'business_date');
        $this->dbforge->drop_column('business_register', 'no_of_employees');
        $this->dbforge->drop_column('business_register', 'branches');
        $this->dbforge->drop_column('business_register', 'financial_institution');
        $this->dbforge->drop_column('business_register', 'any_loan');
        $this->dbforge->drop_column('business_register', 'loan_amount');
        $this->dbforge->drop_column('business_register', 'loan_purpose');
        $this->dbforge->drop_column('business_register', 'receive_payments');
        $this->dbforge->drop_column('business_register', 'make_payments');
        $this->dbforge->drop_column('business_register', 'busniness_funding');
  }
}
?>