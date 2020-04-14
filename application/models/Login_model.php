<?php
	class Login_model extends CI_Model
	{
		public function __construct()
		{
			parent ::__construct();
			
		}
		

	
	public function logindata($data)
	{
	  
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where("email = '".$data['email']."' && password = '".$data['password']."'");
		$result=$this->db->get();
		$single_row=$result->row_array();
		$rows=$result->num_rows();
		if($rows>0)
		{
			return $single_row;
		}
		else
		{
			return false;
		}

	}
	public function get_user($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('admin');
        return $query->row();
    }

    public function update_user($email, $userdata)
    {
        $this->db->where('email', $email);
        $this->db->update('admin', $userdata);
    }
    public function profiledata()
	{
		$this->db->select('*');
		$this->db->from('admin');
		return $this->db->get()->result_array();
	}
	public function supervisor($data)
	{
		return $this->db->insert('superwiser_register', $data);
		
	}
	public function supervisor_list()
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		return $this->db->get()->result_array();
	}
	
	public function supervisor_list_status()
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		$this->db->where('status','1');
		return $this->db->get()->result_array();
	}
	public function view_supervisor($id)
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
	public function update_with_image_supervisor($data)
	{
		$this->db->set('name',$data['name']);	
		$this->db->set('email',$data['email']);	
		$this->db->set('phone',$data['phone']);	
		$this->db->set('country_code',$data['country_code']);	
		$this->db->set('role',$data['role']);	
		$this->db->set('image',$data['image']);	
		$this->db->set('public_id',$data['public_id']);	
        $this->db->where('id',$data['id']);
        $update = $this->db->update('superwiser_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update_with_out_image_supervisor($data)
	{
		$this->db->set('name',$data['name']);	
		$this->db->set('email',$data['email']);	
		$this->db->set('phone',$data['phone']);	
		$this->db->set('country_code',$data['country_code']);	
		$this->db->set('role',$data['role']);	
		$this->db->where('id',$data['id']);
        $update = $this->db->update('superwiser_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function supervisor_password($id)
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
	public function supervisor_password_update($data)
	{
		$this->db->set('password',$data['password']);	
		$this->db->where('id',$data['id']);
        $update = $this->db->update('superwiser_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function sales_cash()
	{
		$this->db->select('daily_sales_purchases.date,daily_sales_purchases.amount,daily_sales_purchases.payment_type,daily_sales_purchases.sales_purchases,daily_sales_purchases.item_list,daily_sales_purchases.attach_recepit,daily_sales_purchases.name,daily_sales_purchases.created_at,daily_sales_purchases.updated_at,daily_sales_purchases.id,business_register.business_name as bussiness_name');
		$this->db->from('daily_sales_purchases');
		$this->db->join('business_register', 'business_register.id = daily_sales_purchases.business_user_id');
		$this->db->where('sales_purchases','sales');
		return $this->db->get()->result_array();
	}

	public function sales_credit()
	{
		$this->db->select('credit_sales_purchases.date,credit_sales_purchases.amount,credit_sales_purchases.payment_type,credit_sales_purchases.sales_purchases,credit_sales_purchases.item_list,credit_sales_purchases.attach_recepit,credit_sales_purchases.name,credit_sales_purchases.created_at,credit_sales_purchases.updated_at,credit_sales_purchases.id,credit_sales_purchases.phone,credit_sales_purchases.id_no,business_register.business_name as bussiness_name');
		$this->db->from('credit_sales_purchases');
		$this->db->join('business_register', 'business_register.id = credit_sales_purchases.business_user_id');
		$this->db->where('sales_purchases','sales');
		return $this->db->get()->result_array();
	}
	public function purchase_cash()
	{
		$this->db->select('daily_sales_purchases.date,daily_sales_purchases.amount,daily_sales_purchases.payment_type,daily_sales_purchases.sales_purchases,daily_sales_purchases.item_list,daily_sales_purchases.attach_recepit,daily_sales_purchases.name,daily_sales_purchases.created_at,daily_sales_purchases.updated_at,daily_sales_purchases.id,business_register.business_name as bussiness_name');
		$this->db->from('daily_sales_purchases');
		$this->db->join('business_register', 'business_register.id = daily_sales_purchases.business_user_id');
		$this->db->where('sales_purchases','purchase');
		return $this->db->get()->result_array();
	}
	public function purchase_credit()
	{
		$this->db->select('credit_sales_purchases.date,credit_sales_purchases.amount,credit_sales_purchases.payment_type,credit_sales_purchases.sales_purchases,credit_sales_purchases.item_list,credit_sales_purchases.attach_recepit,credit_sales_purchases.name,credit_sales_purchases.created_at,credit_sales_purchases.updated_at,credit_sales_purchases.id,credit_sales_purchases.phone,credit_sales_purchases.id_no,business_register.business_name as bussiness_name');
		$this->db->from('credit_sales_purchases');
		$this->db->join('business_register', 'business_register.id = credit_sales_purchases.business_user_id');
		$this->db->where('sales_purchases','purchase');
		return $this->db->get()->result_array();
	}

	public function add_user($data)
	{
		return $this->db->insert('business_register', $data);
		
	}
	public function supervisor_lists()
	{
		$this->db->select('id,name');
		$this->db->from('superwiser_register');
		return $this->db->get()->row_array();
	}
	public function user_list($key,$limit, $offset)
	{
		$this->db->select('business_register.id,business_register.latitude,business_register.longitude,business_register.business_name,business_register.name,business_register.phone,business_register.country_code,business_register.location,business_register.image,business_register.role,business_register.owner_name,business_register.business_registered,business_register.registation_no,business_register.gender,business_register.core_business,business_register.activities,business_register.business_date,business_register.no_of_employees,business_register.branches,business_register.financial_institution,business_register.any_loan,business_register.loan_amount,business_register.loan_purpose,business_register.receive_payments,business_register.make_payments,business_register.busniness_funding,business_register.email,business_register.supervisor_id,superwiser_register.name as superwiser_name,business_register.status');
		$this->db->from('business_register');
		$this->db->join('superwiser_register', 'superwiser_register.id = business_register.supervisor_id');
		if(!empty($key))
        {
         
          $this->db->where("business_register.business_name  LIKE '%$key%'");
        }
		$this->db->order_by("id", "desc");
		$this->db->limit($limit, $offset);
		return $this->db->get()->result_array();
	}

	public function num_rows()
	{
		$this->db->select('business_register.id,business_register.latitude,business_register.longitude,business_register.business_name,business_register.name,business_register.phone,business_register.country_code,business_register.location,business_register.image,business_register.role,business_register.owner_name,business_register.business_registered,business_register.registation_no,business_register.gender,business_register.core_business,business_register.activities,business_register.business_date,business_register.no_of_employees,business_register.branches,business_register.financial_institution,business_register.any_loan,business_register.loan_amount,business_register.loan_purpose,business_register.receive_payments,business_register.make_payments,business_register.busniness_funding,business_register.email,business_register.supervisor_id,superwiser_register.name as superwiser_name,business_register.status');
		$this->db->from('business_register');
		$this->db->join('superwiser_register', 'superwiser_register.id = business_register.supervisor_id');
		return $this->db->get()->num_rows();
	}

	public function business_id($id)
	{
		$this->db->select('*');
		$this->db->from('business_register');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
	public function find_user($user_id)
	{
		
		$this->db->select('*');
		$this->db->from('business_register');
		$this->db->where('id',$user_id);
		return $this->db->get()->result_array();
	}
	
	

	public function insert_alldata($data)
	{
		
		return $this->db->insert('assign_supervisor', $data);
		
	}

	public function update_assign_users_alldata($data) 
	{
		
		$this->db->set('supervisor_id',$data['present_supervisor_id']);
		$this->db->where('id',$data['user_id']);	
		$update = $this->db->update('business_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function insert_alldata_single($data)
	{
		
		return $this->db->insert('assign_supervisor', $data);
		
	}

	public function update_assign_users_single($data) 
	{
		
		$this->db->set('supervisor_id',$data['past_supervisor_id']);
		$this->db->where('id',$data['user_id']);	
		$update = $this->db->update('business_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

	public function update_assign_user($data) 
	{
		
		$this->db->set('supervisor_id',$data['supervisor_id']);	
		$this->db->where('id',$data['id']);
        $update = $this->db->update('business_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Delete_user($id,$status)
	{
		$this->db->set('status',$status);		
		$this->db->where('id',$id);
        $update = $this->db->update('business_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Delete_supervisor($id,$status)
	{
		$this->db->set('status',$status);		
		$this->db->where('id',$id);
        $update = $this->db->update('superwiser_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function user_lists()
	{
		$this->db->select('*');
		$this->db->from('business_register');
		return $this->db->get()->result_array();
	}

	public function add_training($data)
	{
		return $this->db->insert('training', $data);
		
	}

	public function training_list()
	{
		$this->db->select('*');
		$this->db->from('training');
		return $this->db->get()->result_array();
	}
	
	public function supervisor_user_list($id)
	{
		$this->db->select('business_register.id,business_register.latitude,business_register.longitude,business_register.business_name,business_register.name,business_register.phone,business_register.country_code,business_register.location,business_register.image,business_register.role,business_register.owner_name,business_register.business_registered,business_register.registation_no,business_register.gender,business_register.core_business,business_register.activities,business_register.business_date,business_register.no_of_employees,business_register.branches,business_register.financial_institution,business_register.any_loan,business_register.loan_amount,business_register.loan_purpose,business_register.receive_payments,business_register.make_payments,business_register.busniness_funding,business_register.email,business_register.supervisor_id,superwiser_register.name as superwiser_name,business_register.status,business_register.assign_supervisor_id');
		$this->db->from('business_register');
		$this->db->join('superwiser_register', 'superwiser_register.id = business_register.supervisor_id');
		$this->db->where('supervisor_id',$id);
		$result = $this->db->get()->result_array();
		return $result;
		
		
		// $result = $this->db->query("SELECT business_register.id,business_register.latitude,business_register.longitude,business_register.business_name,business_register.name,business_register.phone,business_register.country_code,business_register.location,business_register.image,business_register.role,business_register.owner_name,business_register.business_registered,business_register.registation_no,business_register.gender,business_register.core_business,business_register.activities,business_register.business_date,business_register.no_of_employees,business_register.branches,business_register.financial_institution,business_register.any_loan,business_register.loan_amount,business_register.loan_purpose,business_register.receive_payments,business_register.make_payments,business_register.busniness_funding,business_register.email,business_register.supervisor_id,superwiser_register.name as superwiser_name,business_register.status,business_register.assign_supervisor_id from business_register JOIN superwiser_register ON superwiser_register.id = business_register.supervisor_id WHERE business_register.supervisor_id = '".$id."' or business_register.assign_supervisor_id = '".$id."'")->result_array();
		// return $result;
		
		
	}
	
	public function view_training($id)
	{
		$this->db->select('*');
		$this->db->from('training');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}

	public function update_with_out_image_training($data)
	{
		$this->db->set('title',$data['title']);	
		$this->db->set('description',$data['description']);	
		$this->db->set('supervisor_id',$data['supervisor_id']);	
		$this->db->set('user_id',$data['user_id']);	
		$this->db->set('role',$data['role']);
        $this->db->where('id',$data['id']);
        $update = $this->db->update('training');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function update_with_image_training($data)
	{
		$this->db->set('title',$data['title']);	
		$this->db->set('description',$data['description']);	
		$this->db->set('supervisor_id',$data['supervisor_id']);	
		$this->db->set('user_id',$data['user_id']);	
		$this->db->set('role',$data['role']);
		$this->db->set('video',$data['video']);
        $this->db->where('id',$data['id']);
        $update = $this->db->update('training');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function Delete_training($id)
	{
	  $this->db->where('id',$id);
	  $this->db->delete('training');
	}

	public function bussiness_visit_list()
	{
		
		$this->db->select('business_register.business_name,bussiness_visit.id,bussiness_visit.longitude,bussiness_visit.latitude,bussiness_visit.current_date,bussiness_visit.comment,bussiness_visit.bussiness_location,bussiness_visit.stock,bussiness_visit.busy_shop,superwiser_register.name');
		$this->db->from('bussiness_visit');
		$this->db->join('business_register', 'business_register.id = bussiness_visit.business_register_id');
		$this->db->join('superwiser_register', 'superwiser_register.id = business_register.supervisor_id');
		return $this->db->get()->result_array();
	}

	public function count_cash_sales()
	{
		
			$this->db->select('*');
			$this->db->where('payment_type','cash');
			$this->db->where('sales_purchases','sales');
			$q=$this->db->get('daily_sales_purchases');
			$count=$q->result();
			return count($count);
		

	}
	public function count_credit_sales()
	{
		
			$this->db->select('*');
			$this->db->where('payment_type','credit');
			$this->db->where('sales_purchases','sales');
			$q=$this->db->get('credit_sales_purchases');
			$count=$q->result();
			return count($count);
		

	}

	public function count_cash_purchase()
	{
		
			$this->db->select('*');
			$this->db->where('payment_type','cash');
			$this->db->where('sales_purchases','purchase');
			$q=$this->db->get('daily_sales_purchases');
			$count=$q->result();
			return count($count);
		

	}
	public function count_credit_purchase()
	{
		
			$this->db->select('*');
			$this->db->where('payment_type','credit');
			$this->db->where('sales_purchases','purchase');
			$q=$this->db->get('credit_sales_purchases');
			$count=$q->result();
			return count($count);
		

	}
	public function count_user()
	{
		
			$this->db->select('*');
			$this->db->where('status','1');
			$q=$this->db->get('business_register');
			$count=$q->result();
			return count($count);
	}
	public function count_supervisor()
	{
		
			$this->db->select('*');
			$this->db->where('status','1');
			$q=$this->db->get('superwiser_register');
			$count=$q->result();
			return count($count);
	}
	public function count_bussiness_visit()
	{
		
			$this->db->select('status');
			$this->db->where('status','false');
			$q=$this->db->get('bussiness_visit');
			$count=$q->result();
			return count($count);
	}

	public function bussiness_visit_lists()
	{
		
		$this->db->select('business_register.business_name,bussiness_visit.id,bussiness_visit.current_date,bussiness_visit.comment,bussiness_visit.bussiness_location,bussiness_visit.stock,bussiness_visit.busy_shop,superwiser_register.name');
		$this->db->from('bussiness_visit');
		$this->db->join('business_register', 'business_register.id = bussiness_visit.business_register_id');
		$this->db->join('superwiser_register', 'superwiser_register.id = business_register.supervisor_id');
		$this->db->where('bussiness_visit.status','false');
		$this->db->order_by("bussiness_visit.id", "desc");
		$this->db->limit(5); 
		return $this->db->get()->result_array();
	}



	public function count_bussiness_register()
	{
		
			$this->db->select('status_notification');
			$this->db->where('status_notification','false');
			$q=$this->db->get('business_register');
			$count=$q->result();
			return count($count);
	}

	public function bussiness_registers_lists()
	{
		
		$this->db->select('*');
		$this->db->from('business_register');
		$this->db->where('status_notification','false');
		$this->db->order_by("id", "desc");
		$this->db->limit(5); 
		return $this->db->get()->result_array();
	}
	public function bussiness_visit_status($id,$status)
	{
		$this->db->set('status',$status);	
        $this->db->where('id',$id);
        $update = $this->db->update('bussiness_visit');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function bussiness_register_status($id,$status)
	{
		$this->db->set('status_notification',$status);	
        $this->db->where('id',$id);
        $update = $this->db->update('business_register');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function business_ids($id)
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
	public function supervisor_list_data()
	{
		$this->db->select('*');
		$this->db->from('superwiser_register');
		$this->db->where('status','1');
		return $this->db->get()->result_array();
	}

	public function update_assign_supervisor($data)
	{
		return $this->db->insert('assign_supervisor', $data);
		
	}
	public function record_count($id)
	{
	  $this->db->select('*');
	  $this->db->where('id',$id);
	  $q=$this->db->get('assign_supervisor');
	  $count=$q->result();
	  return count($count);

	}

	public function update_assign_supervisors($data)
	{
		
		$this->db->set('assign_id',$data['assign_id']);		
		$this->db->set('supervisor_id',$data['supervisor_id']);
		$this->db->set('updated_at',$data['updated_at']);
        $update = $this->db->update('assign_supervisor');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function supervisor_history($id)
	{
		$result = $this->db->query("SELECT * FROM superwiser_register JOIN assign_supervisor ON superwiser_register.id = assign_supervisor.present_supervisor_id WHERE assign_supervisor.user_id ='".$id."' ORDER BY assign_supervisor.id ASC")->result_array();
		return $result;
		
	}
    
    public function privacy_policy()
	{
		$this->db->select('*');
		$this->db->from('privacy_policy');
		return $this->db->get()->result_array();
	}
    
    public function add_privacy_policy($data)
	{
		
		$this->db->set('title',$data['title']);		
		$this->db->set('description',$data['description']);
		$this->db->set('id',$data['id']);
        $update = $this->db->update('privacy_policy');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    
     public function terms_conditions()
	{
		$this->db->select('*');
		$this->db->from('terms_conditions');
		return $this->db->get()->result_array();
	}
    
    public function add_terms_conditions($data)
	{
		
		$this->db->set('title',$data['title']);		
		$this->db->set('description',$data['description']);
		$this->db->set('id',$data['id']);
        $update = $this->db->update('terms_conditions');
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    
    

	
	

	
	
	
	
	


}
	
?>