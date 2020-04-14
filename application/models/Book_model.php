<?php
	class Book_model extends CI_Model
	{
       
        public function logindata($data)
	    {
           if($data['role'] == "user")
            {
                $this->db->select('id,name,phone,country_code,role');
                $this->db->from('business_register');
                $this->db->where('phone',$data['phone']);
                $this->db->where('password',$data['password']);
                $this->db->where('country_code',$data['country_code']);
                $this->db->where('role',$data['role']);
                $this->db->where('status','1');
                $query =$this->db->get()->result_array();
                 if(count($query)> 0)
                {
                    $token = array(
                        'business_user_id' => $query[0]['id'],
                        'sessiontoken' =>$data['sessiontoken'],
                        'updated_at' => date('Y-m-d H:m:i'));
    
                $this->db->insert('business_session_token', $token);
                $this->db->select('sessiontoken');
                $this->db->from('business_session_token');
                $this->db->where('business_user_id',$query[0]['id']);
                $this->db->limit(1);
                $this->db->order_by('id','desc');        
                $query1 =$this->db->get()->result_array();
                $merge = array_merge($query[0],array("token"=>$query1[0]['sessiontoken']));
                return $merge;
                } 
            }
            else
            {
                $this->db->select('id,name,email,phone,country_code,role');
                $this->db->from('superwiser_register');
                $this->db->where('phone',$data['phone']);
                $this->db->where('password',$data['password']);
                $this->db->where('country_code',$data['country_code']);
                $this->db->where('role',$data['role']);
                $this->db->where('status','1');
                $query =$this->db->get()->result_array();
                if(count($query)> 0)
                {
                    $token = array(
                        'supervisor_user_id' => $query[0]['id'],
                        'sessiontoken' =>$data['sessiontoken'],
                        'updated_at' => date('Y-m-d H:m:i'));
    
                $this->db->insert('supervisor_session_token', $token);
                $this->db->select('sessiontoken');
                $this->db->from('supervisor_session_token');
                $this->db->where('supervisor_user_id',$query[0]['id']);
                $this->db->limit(1);
                $this->db->order_by('id','desc');        
                $query1 =$this->db->get()->result_array();
                $merge = array_merge($query[0],array("token"=>$query1[0]['sessiontoken']));
                return $merge;
                }
               
            }
         }
       
        public function business_check_token($token,$role)
    	{
            if($role == "user")
            {
                $this->db->select('*');
                $this->db->where('sessiontoken',$token);
                $q=$this->db->get('business_session_token');
                $count=$q->result();
                return count($count);
            }   
            else
            {
                $this->db->select('*');
                $this->db->where('sessiontoken',$token);
                $q=$this->db->get('supervisor_session_token');
                $count=$q->result();
                return count($count);
            } 

        }
        public function business_check_token1($token)
    	{
            
                $this->db->select('*');
                $this->db->where('sessiontoken',$token);
                $q=$this->db->get('business_session_token');
                $count=$q->result();
                return count($count);
            

        }
        public function business_check_token2($token)
    	{
            
                $this->db->select('*');
                $this->db->where('sessiontoken',$token);
                $q=$this->db->get('supervisor_session_token');
                $count=$q->result();
                return count($count);
            

        }
       public function check_user_exist($role,$user_id)
    	{
            if($role == "user")
            {
                $this->db->select('*');
                $this->db->where('role',$role);
                $this->db->where('user_id',$user_id);
                $q=$this->db->get('mp_pin');
                return  $count=$q->result();
             
            }
            else
            {
                $this->db->select('*');
                $this->db->where('role',$role);
                $this->db->where('user_id',$user_id);
                $q=$this->db->get('supervisormp_pin');
                return $count=$q->result();
            }   

    	}
        public function pin_insert($data)
        {
           
           if($data['role'] == 'user')
            {
                return $this->db->insert('mp_pin', $data);
            }
            else
            {
                return $this->db->insert('supervisormp_pin', $data);
            }
            
		
        }
        public function pin_update($pin_data)
	    {
          
            if($pin_data['role'] == 'user')
            {
               
                $this->db->set('pin',$pin_data['pin']);
                $this->db->where('user_id',$pin_data['user_id']);
                $update = $this->db->update('mp_pin');
                return $update;
            }
            else
            {
               
                $this->db->set('pin',$pin_data['pin']);
                $this->db->where('user_id',$pin_data['user_id']);
                $update = $this->db->update('supervisormp_pin');
                return $update;
            }
        }

        public function pindata($data)
	    {
           if($data['role'] == "user")
            {
              
                $this->db->select('mp_pin.user_id as id,business_register.name,business_register.phone,business_register.country_code,mp_pin.role,mp_pin.pin');
                $this->db->from('mp_pin');
                $this->db->join('business_register', 'business_register.id = mp_pin.user_id');
                $this->db->where('mp_pin.pin',$data['pin']);
                $this->db->where('mp_pin.role',$data['role']);     
                $query =$this->db->get()->result_array();
                $this->db->select('sessiontoken');
                $this->db->from('business_session_token');
                $this->db->where('business_user_id',$query[0]['id']);
                $this->db->limit(1);
                $this->db->order_by('id','desc');        
                $query1 =$this->db->get()->result_array();
                $merge = array_merge($query[0],array("token"=>$query1[0]['sessiontoken']));
                return $merge;
            }
            else
            {
                $this->db->select('supervisormp_pin.user_id as id,superwiser_register.name,superwiser_register.phone,superwiser_register.country_code,supervisormp_pin.role,supervisormp_pin.pin');
                $this->db->from('supervisormp_pin');
                $this->db->join('superwiser_register', 'superwiser_register.id = supervisormp_pin.user_id');
                $this->db->where('supervisormp_pin.pin',$data['pin']);
                $this->db->where('supervisormp_pin.role',$data['role']);      
                $query =$this->db->get()->result_array();
                $this->db->select('sessiontoken');
                $this->db->from('supervisor_session_token');
                $this->db->where('supervisor_user_id',$query[0]['id']);
                $this->db->limit(1);
                $this->db->order_by('id','desc');        
                $query1 =$this->db->get()->result_array();
                $merge = array_merge($query[0],array("token"=>$query1[0]['sessiontoken']));
                return $merge;
                
                
               
            }
         }
       
        
        public function user_exist($phone)
    	{
            $this->db->select('*');
            $this->db->where('phone',$phone);
            $q=$this->db->get('business_register');
            $count=$q->result();
            return count($count);

        }
        public function check_phone_exist($phone,$country_code)
    	{
            $this->db->select('*');
            $this->db->where('phone',$phone);
            $this->db->where('country_code',$country_code);
            $q=$this->db->get('business_register');
            $count=$q->result();
            return count($count);

    	}
        public function password_update($forget_password)
	    {
            if($forget_password['role'] == "user")
            {
                
                $this->db->set('password',$forget_password['password']);
                $this->db->where('phone',$forget_password['phone']);
                $this->db->where('country_code',$forget_password['country_code']);
                $update = $this->db->update('business_register');
                return $update;
            }
            else
            {
               
                $this->db->set('password',$forget_password['password']);
                $this->db->where('phone',$forget_password['phone']);
                $this->db->where('country_code',$forget_password['country_code']);
                $update = $this->db->update('superwiser_register');
                return $update;
            }
            
        }

     
        
        public function sign_up($data)
        {
            $this->db->insert('business_register', $data);
            return $id =$this->db->insert_id();
		
        }
       
        public function sale_purchases($data)
        {
            return $this->db->insert('daily_sales_purchases', $data);
		
        }

        public function sales_purchases_list($data,$page = 1,$Perpage)
        {
           if($data['payment_type'] == "cash")
           {
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('daily_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                // $this->db->order_by('date','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$data['business_user_id']);
                $this->db->where('payment_type',"cash");
                $this->db->where('sales_purchases',$data['sales_purchases']);
          		$this->db->order_by("id", "desc");
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
           else 
           {
              
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('credit_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                // $this->db->order_by('date','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$data['business_user_id']);
                $this->db->where('payment_type',"credit");
                $this->db->where('sales_purchases',$data['sales_purchases']);
           		$this->db->order_by("id", "desc");
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
           
            
        }

        
        public function credit_sale_purchases($data)
        {
            $this->db->insert('credit_sales_purchases', $data);
            return $id =$this->db->insert_id();
        }

        public function credit_sale_purchases_list($data,$page = 1,$Perpage)
        {
           
          if($data['payment_type'] == "cash")
           {
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('daily_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                // $this->db->order_by('date','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$data['business_user_id']);
                $this->db->where('payment_type',"cash");
                $this->db->where('sales_purchases',$data['sales_purchases']);
          		$this->db->order_by("id", "desc");
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
           else 
           {
            
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('credit_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                // $this->db->order_by('date','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$data['business_user_id']);
                $this->db->where('payment_type',"credit");
                $this->db->where('sales_purchases',$data['sales_purchases']);
           		$this->db->order_by("id", "desc");
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
        }

        public function logout($session_token,$role)
        {
           if($role == 'user')
           {
                $this->db->where('sessiontoken',$session_token);
                $query = $this->db->delete('business_session_token');
                return $query;
           } 
           else
           {
                $this->db->where('sessiontoken',$session_token);
                $query = $this->db->delete('supervisor_session_token');
                return $query;
           }
            
           
        }
        public function home_list($data)
        {
            $id= $data['business_user_id'];
           
           if($data['sales_purchases'] == "sales")
           {
              
                if($data['filter'] == 'year')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND sales_purchases='sales' AND business_user_id= '".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND sales_purchases='sales' AND business_user_id='".$id."'";

                    $prevSQL = "YEAR(created_at) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND sales_purchases='sales' AND business_user_id= '".$id."'";
                    $prevSQL1 = "YEAR(created_at) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND sales_purchases='sales' AND business_user_id='".$id."'";
                }
                if($data['filter'] == 'month')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND sales_purchases='sales' AND business_user_id='".$id."'";

                    $prevSQL = "created_at BETWEEN date_format(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL 1 MONTH) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $prevSQL1 = "created_at BETWEEN date_format(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL 1 MONTH) AND sales_purchases='sales' AND business_user_id='".$id."'";
                }  
                if($data['filter'] == 'week')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND sales_purchases='sales' AND business_user_id='".$id."'";

                    $prevSQL = "YEARWEEK(created_at) = YEARWEEK(NOW() - INTERVAL 1 WEEK) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $prevSQL1 = "YEARWEEK(created_at) = YEARWEEK(NOW() - INTERVAL 1 WEEK) AND sales_purchases='sales' AND business_user_id='".$id."'";
                }
                if($data['filter'] == 'day')
                {
                    $timeSQL = "DAY(created_at) = DAY(NOW()) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $timeSQL1 = "DAY(created_at) = DAY(NOW()) AND sales_purchases='sales' AND business_user_id='".$id."'";

                    $prevSQL = "DAY(created_at) = DAY(CURRENT_DATE - INTERVAL 1 DAY) AND sales_purchases='sales' AND business_user_id='".$id."'";
                    $prevSQL1 = "DAY(created_at) = DAY(CURRENT_DATE - INTERVAL 1 DAY) AND sales_purchases='sales' AND business_user_id='".$id."'";
                }  

                    $prevSql = "SELECT sum(amount) as cash_amount FROM daily_sales_purchases WHERE ".$prevSQL;
                    $Result_prev = $this->db->query($prevSql)->result_array();
                   

                    $prevSql = "SELECT sum(amount) as amount FROM credit_sales_purchases WHERE ".$prevSQL1;
                    $Result_prev1 = $this->db->query($prevSql)->result_array();

                    $Sql = "SELECT sum(amount) as cash_amount FROM daily_sales_purchases WHERE ".$timeSQL;
                    $Result = $this->db->query($Sql)->result_array();
                    $Sql1 = "SELECT sum(amount) as amount FROM credit_sales_purchases WHERE ".$timeSQL1;
                    $Result1 = $this->db->query($Sql1)->result_array();
                    $this->db->select('name');
                    $this->db->from('business_register');
                    $this->db->where('id',$id);
                    $query =$this->db->get()->result_array();
           			
                    $merge = array_merge($Result[0],array("credit_amount"=>$Result1[0]['amount']));
                    $merge1 = array_merge($Result_prev[0],array("credit_amount"=>$Result_prev1[0]['amount']));

                    $amount = $merge['cash_amount'];
                    $credit_amount = $merge['credit_amount'];
                    $total = $amount+$credit_amount;
                    $amount1 = $merge1['cash_amount'];
                    $credit_amount1 = $merge1['credit_amount'];
                    $total1 = $amount1+$credit_amount1;
                    if($total != 0 || $total !=0)
                    {
                        $percentage = ($total1*100)/$total;
                    }
                    else
                    {
                        $percentage = "0";
                    }
                    // $percentage = ($total1*100)/$total;
                    
                    if($total >= $total1)
                    {
                        $arraow= "true";
                    }
                    else
                    {
                        $arraow ="false";
                    };
                    $return['home'] = $merge;
                    $return['percentage'] = $percentage;
                    $return['arraow'] = $arraow;
                    $return['name'] = $query[0]['name'];
                    return $return;
           } 
           else if($data['sales_purchases'] == "purchase")
           {
              
                if($data['filter'] == 'year')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND sales_purchases='purchase' AND business_user_id= '".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) AND sales_purchases='purchase' AND business_user_id='".$id."'";

                    $prevSQL = "YEAR(created_at) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND sales_purchases='purchase' AND business_user_id= '".$id."'";
                    $prevSQL1 = "YEAR(created_at) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR)) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                }
                if($data['filter'] == 'month')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND sales_purchases='purchase' AND business_user_id='".$id."'";

                    $prevSQL = "created_at BETWEEN date_format(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL 1 MONTH) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $prevSQL1 = "created_at BETWEEN date_format(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND last_day(NOW() - INTERVAL 1 MONTH) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                }  
                if($data['filter'] == 'week')
                {
                    $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND sales_purchases='purchase' AND business_user_id='".$id."'";

                    $prevSQL = "YEARWEEK(created_at) = YEARWEEK(NOW() - INTERVAL 1 WEEK) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $prevSQL1 = "YEARWEEK(created_at) = YEARWEEK(NOW() - INTERVAL 1 WEEK) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                }
                if($data['filter'] == 'day')
                {
                    $timeSQL = "DAY(created_at) = DAY(NOW()) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $timeSQL1 = "DAY(created_at) = DAY(NOW()) AND sales_purchases='purchase' AND business_user_id='".$id."'";

                    $prevSQL = "DAY(created_at) = DAY(CURRENT_DATE - INTERVAL 1 DAY) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                    $prevSQL1 = "DAY(created_at) = DAY(CURRENT_DATE - INTERVAL 1 DAY) AND sales_purchases='purchase' AND business_user_id='".$id."'";
                }  

                $prevSql = "SELECT sum(amount) as cash_amount FROM daily_sales_purchases WHERE ".$prevSQL;
                $Result_prev = $this->db->query($prevSql)->result_array();
               

                $prevSql = "SELECT sum(amount) as amount FROM credit_sales_purchases WHERE ".$prevSQL1;
                $Result_prev1 = $this->db->query($prevSql)->result_array();

                    $Sql = "SELECT sum(amount) as cash_amount FROM daily_sales_purchases WHERE ".$timeSQL;
                    $Result = $this->db->query($Sql)->result_array();
                    $Sql1 = "SELECT sum(amount) as amount FROM credit_sales_purchases WHERE ".$timeSQL1; 
                    $Result1 = $this->db->query($Sql1)->result_array();
                    $this->db->select('name');
                    $this->db->from('business_register');
                    $this->db->where('id',$id);
                    $query =$this->db->get()->result_array();
                    $merge = array_merge($Result[0],array("credit_amount"=>$Result1[0]['amount']));
                    $merge1 = array_merge($Result_prev[0],array("credit_amount"=>$Result_prev1[0]['amount']));

                    $amount = $merge['cash_amount'];
                    $credit_amount = $merge['credit_amount'];
                    $total = $amount+$credit_amount;
                    $amount1 = $merge1['cash_amount'];
                    $credit_amount1 = $merge1['credit_amount'];
                    $total1 = $amount1+$credit_amount1;

                    if($total != 0 || $total !=0)
                    {
                        $percentage = ($total1*100)/$total;
                    }
                    else
                    {
                        $percentage = "0";
                    }
                    if($total >= $total1)
                    {
                        $arraow= "true";
                    }
                    else
                    {
                        $arraow ="false";
                    };

                 
                    $return['home'] = $merge;
                    $return['percentage'] = $percentage;
                    $return['arraow'] = $arraow;
                    $return['name'] = $query[0]['name'];
                    return $return;
            }
        }

        public function credit_sale_by_id_list($id,$sales_purchases,$payment_type)
        {
            if($payment_type == 'cash')
            {
                $this->db->select('id,attach_recepit,item_list,amount,sales_purchases');
                $this->db->where('id', $id);
                $this->db->where('payment_type', $payment_type);
                $this->db->where('sales_purchases', "sales");
                $this->db->from('daily_sales_purchases');
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                   
                }
                
                $return['query'] = $query;
                // $return['amount'] = $amount;
                return $return;
            }
            else 
            {
                $this->db->select('id,name,phone,attach_recepit,item_list,amount,sales_purchases');
                $this->db->where('id', $id);
                $this->db->where('payment_type', $payment_type);
                $this->db->where('sales_purchases', "sales");
                $this->db->from('credit_sales_purchases');
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                   
                }
                
                $return['query'] = $query;
                // $return['amount'] = $amount;
                return $return;
            }
            
        }

        public function purchase_sale_by_id_list($id,$sales_purchases,$payment_type)
        {
            if($payment_type == 'cash')
            {
                $this->db->select('id,attach_recepit,item_list,amount,sales_purchases');
                $this->db->where('id', $id);
                $this->db->where('payment_type', $payment_type);
                $this->db->where('sales_purchases', $sales_purchases);
                $this->db->from('daily_sales_purchases');
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                   
                }
                
                $return['query'] = $query;
                // $return['amount'] = $amount;
                return $return;
            }
            else 
            {
                $this->db->select('id,name,phone,attach_recepit,item_list,amount,sales_purchases');
                $this->db->where('id', $id);
                $this->db->where('payment_type', $payment_type);
                $this->db->where('sales_purchases', $sales_purchases);
                $this->db->from('credit_sales_purchases');
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                   
                }
                
                $return['query'] = $query;
                // $return['amount'] = $amount;
                return $return;
            }
            
        }
        
        public function confirm_payment($data)
        {
            return $this->db->insert('confirm_payment', $data);
		
        }
                    
        public function remind($remind)
	    {
            $this->db->set('message',$remind['message']);
            $this->db->where('sales_purchase',$remind['sales_purchase']);
            $this->db->where('transaction_id',$remind['transaction_id']);
            $update = $this->db->update('confirm_payment');
            return $update;
        
        }
        
        public function supervisor_home($supervisor_id)
        {
            
            $this->db->select('id,business_name,owner_name,phone,supervisor_id,create_at');
            $this->db->where('supervisor_id', $supervisor_id);
            $this->db->from('business_register');
            $this->db->order_by("create_at", "desc");
            $query =$this->db->get()->result_array();
            return $query;
            
            
        }

        public function business_details_list($id)
        {
            $timeSQL = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH)  AND business_user_id='".$id."'";
            $timeSQL1 = "created_at > DATE_SUB(NOW(), INTERVAL 1 MONTH)  AND business_user_id='".$id."'";
            $Sql = "SELECT sales_purchases,payment_type,amount FROM daily_sales_purchases WHERE ".$timeSQL;
            $Result = $this->db->query($Sql)->result_array();
            $amount = 0;
            $amount1 = 0;

            for($i=0;$i<count($Result); $i++)
            {
                if($Result[$i]['sales_purchases'] == 'sales')
                {
                    $amount = $amount + $Result[$i]['amount'];
                }
                else
                {
                    $amount1 = $amount1 + $Result[$i]['amount'];
                }
                
            }
             $return['cash_sale'] = $amount;
             $return['cash_purchase'] = $amount1;
           
            $Sql1 = "SELECT sales_purchases,payment_type,amount FROM credit_sales_purchases WHERE ".$timeSQL1;
            $Result1 = $this->db->query($Sql1)->result_array();
            $amount2 = 0;
            $amount3 = 0;

            for($i=0;$i<count($Result1); $i++)
            {
                if($Result1[$i]['sales_purchases'] == 'sales')
                {
                    $amount2 = $amount2 + $Result1[$i]['amount'];
                }
                else
                {
                    $amount3 = $amount3 + $Result1[$i]['amount'];
                }
                
            }
          
             $return['credit_sale'] = $amount2;
             $return['credit_purchase'] = $amount3;
       
            return $return;
         } 
          
        
         public function bussiness_visit($bussiness_visit)
         {
             return $this->db->insert('bussiness_visit', $bussiness_visit);
		
         
         }
       
         public function sort($sort,$page = 1,$Perpage)
        {
          
           if($sort['payment_type'] == "cash")
           {
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('daily_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                if($sort['sorting_type'] == "amount")
                {
                   
                    $this->db->order_by('amount','desc');
                }
                else
                {
                  
                    $this->db->order_by('date','desc');
                }
                
                
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$sort['business_user_id']);
                $this->db->where('payment_type',"cash");
                $this->db->where('sales_purchases',$sort['sales_purchases']);
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
           else 
           {
              
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('credit_sales_purchases');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
              
                if($sort['sorting_type'] == "amount")
                {
                    $this->db->order_by('amount','desc');
                }
                else
                {
                    $this->db->order_by('date','desc');
                }
                $this->db->limit($record_limit, $start);
                $this->db->where('business_user_id',$sort['business_user_id']);
                $this->db->where('payment_type',"credit");
                $this->db->where('sales_purchases',$sort['sales_purchases']);
                $query =$this->db->get()->result_array();
                $amount = 0;
                for($i=0;$i<count($query); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$query[$i]['id']."'")->result_array();
                   
                   $query[$i]['amount'] = $query[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $query[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                $return['query'] = $query;
                $return['amount'] = $amount;
                return $return;
           }
           
            
        }
          
        
        public function profile($profile)
	    {

         if($profile['role'] == "user")
           {
                if(empty($_FILES))
                {
                        $this->db->set('name',$profile['name']);
                        $this->db->set('email',$profile['email']);
                        $this->db->where('id',$profile['id']);
                        $this->db->where('role',$profile['role']);
                        $update = $this->db->update('business_register');
                        return $update;
                }
                else
                {
                    $this->db->set('name',$profile['name']);
                    $this->db->set('email',$profile['email']);
                    $this->db->set('image',$profile['image']);
                    $this->db->set('public_id',$profile['public_id']);
                    $this->db->where('id',$profile['id']);
                    $this->db->where('role',$profile['role']);
                    $update = $this->db->update('business_register');
                    return $update; 
                }
            }
            else
            {
            
                if(empty($_FILES))
                {
                        $this->db->set('name',$profile['name']);
                        $this->db->set('email',$profile['email']);
                        $this->db->where('id',$profile['id']);
                        $this->db->where('role',$profile['role']);
                        $update = $this->db->update('superwiser_register');
                        return $update;
                }
                else
                {
                    $this->db->set('name',$profile['name']);
                    $this->db->set('email',$profile['email']);
                    $this->db->set('image',$profile['image']);
                    $this->db->set('public_id',$profile['public_id']);
                    $this->db->where('id',$profile['id']);
                    $this->db->where('role',$profile['role']);
                    $update = $this->db->update('superwiser_register');
                    return $update; 
                }
            }
                
            
        }

        public function training($user_id,$role,$page = 1,$Perpage)
        {
          if($role == "user")
           {
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('training');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                $this->db->order_by('created_at','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('user_id',$user_id);
                $this->db->where('role',"user");
                $query =$this->db->get()->result_array();
               
                return $query;
           }
           else 
           {
            
                $this->db->start_cache();
                $this->db->select('*');
                $this->db->from('training');
                $this->db->stop_cache();
                $total_records = $this->db->count_all_results();
                $start = 0;
                $record_limit = $Perpage;
                $number_of_page = ceil($total_records/$record_limit);
        
                if($page != 1)
                {
                    $start = ($page - 1)*$record_limit;
                
                } 
                $this->db->order_by('created_at','desc');
                $this->db->limit($record_limit, $start);
                $this->db->where('supervisor_id',$user_id);
                $this->db->where('role',"supervisor");
                $query =$this->db->get()->result_array();
            
                return $query;
           }
        }



        public function training_viewDetails($id,$role)
        {
          if($role == "user")
           {
               
                $this->db->select('*');
                $this->db->from('training');
                $this->db->where('id',$id);
                $this->db->where('role',"user");
                $query =$this->db->get()->result_array();
                return $query;
           }
           else 
           {
            
                $this->db->select('*');
                $this->db->from('training');
                $this->db->where('id',$id);
                $this->db->where('role',"supervisor");
                $query =$this->db->get()->result_array();
                return $query;
           }
        }

        public function training_rating($id,$role,$rating)
        {
          if($role == "user")
           {
                $this->db->set('rating',$rating);
                $this->db->where('id',$id);
                $this->db->where('role',"user");
                $update = $this->db->update('training');
                 return $update;
               
           }
           else 
           {
            
                $this->db->set('rating',$rating);
                $this->db->where('id',$id);
                $this->db->where('role',"supervisor");
                $update = $this->db->update('training');
                return $update;
           }
        }
        

        public function filter($filter)
        {
            
           $business_user_id = $filter['business_user_id'];
           $sales_purchases = $filter['sales_purchases'];
           $filterdata = $filter['sorting_type'];
       
            
           if($filter['payment_type'] == "cash")
           {

           
                if($filter['sorting_type'] == '15')
                {
                    
                    $Sql = "SELECT * FROM daily_sales_purchases WHERE date >= (CURDATE() - INTERVAL  $filterdata DAY) AND business_user_id='$business_user_id' AND payment_type='cash' AND sales_purchases ='$sales_purchases'";
                    $Result = $this->db->query($Sql)->result_array();

                }
                elseif($filter['sorting_type'] == '30')
                {
                    
                    $Sql = "SELECT * FROM daily_sales_purchases WHERE date >= (CURDATE() - INTERVAL $filterdata DAY) AND business_user_id='$business_user_id' AND payment_type='cash' AND sales_purchases ='$sales_purchases'";
                    $Result = $this->db->query($Sql)->result_array();
                }
                else
                {
                    
                    $Sql = "SELECT * FROM daily_sales_purchases WHERE date between $filterdata AND sales_purchases='$sales_purchases' AND business_user_id= '".$business_user_id."' ";
                    $Result = $this->db->query($Sql)->result_array();

                }
                $amount = 0;
                for($i=0;$i<count($Result); $i++)
                {
                   $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$Result[$i]['id']."'")->result_array();
                   
                   $Result[$i]['amount'] = $Result[$i]['amount'] - $data[0]['total'];
                    $amount = $amount + $Result[$i]['amount'];
                    // $id = $query[$i]['id'];
                }
                $return['query'] = $Result;
                $return['amount'] = $amount;
                return $return;
            
               
           }
        
           else
           {
                if($filter['sorting_type'] == '15')
                {
                    
                    $Sql = "SELECT * FROM credit_sales_purchases WHERE date >= (CURDATE() - INTERVAL  $filterdata DAY) AND business_user_id='$business_user_id' AND payment_type='credit' AND sales_purchases ='$sales_purchases'";
                    $Result = $this->db->query($Sql)->result_array();

                }
                elseif($filter['sorting_type'] == '30')
                {
                    
                    $Sql = "SELECT * FROM credit_sales_purchases WHERE date >= (CURDATE() - INTERVAL  $filterdata DAY) AND business_user_id='$business_user_id' AND payment_type='credit' AND sales_purchases ='$sales_purchases'";
                    $Result = $this->db->query($Sql)->result_array();
                }
                else
                {
                    
                    $Sql = "SELECT * FROM daily_sales_purchases WHERE date between $filterdata  AND sales_purchases='$sales_purchases' AND business_user_id= '".$business_user_id."' ";
                    $Result = $this->db->query($Sql)->result_array();
                }
              
            }
            $amount = 0;
            for($i=0;$i<count($Result); $i++)
            {
               $data = $this->db->query("SELECT SUM(amount_paid) total FROM confirm_payment WHERE confirm_payment.transaction_id='".$Result[$i]['id']."'")->result_array();
               
               $Result[$i]['amount'] = $Result[$i]['amount'] - $data[0]['total'];
                $amount = $amount + $Result[$i]['amount'];
                // $id = $query[$i]['id'];
            }
            $return['query'] = $Result;
            $return['amount'] = $amount;
            return $return;


            
        }

        public function graph($data)
        {
            $id= $data['business_user_id'];
            $sales_purchases= $data['sales_purchases'];

            if($data['filter'] == 'day')
            {
               
                 $date = date('Y-m-d'); //today date
                $weekOfdays = array();
                for($i =0; $i <= 6; $i++){
                    $date = date("Y-m-d", strtotime('-'. $i .' days'));
                    $weekOfdays[] = date('Y-m-d', strtotime($date));
                }
            
                // print_r($weekOfdays);die; 
                
                $result = array();
                foreach($weekOfdays as $day)
                {
                
                    $data1= array('created_at ' => $day , 'amount' => '0');
                   // $data = $this->db->query("select DATE_FORMAT(created_at,'%Y-%m-%d') as created_at,sum(amount) amount from ( select created_at,amount from daily_sales_purchases WHERE created_at LIKE '%$day%'  AND business_user_id = '32' AND sales_purchases = 'sales' union all select created_at,amount from credit_sales_purchases WHERE created_at LIKE '%2020-04-04%' AND business_user_id = '".$id."'  AND sales_purchases = '".$sales_purchases."' ) t group by created_at")->row_array();
                $data = $this->db->query("select DATE_FORMAT(created_at,'%Y-%m-%d') as created_at,sum(amount) amount from ( select created_at,amount from daily_sales_purchases WHERE created_at LIKE '%$day%'  AND business_user_id = '".$id."'  AND sales_purchases = '".$sales_purchases."' union all select created_at,amount from credit_sales_purchases WHERE created_at LIKE '%$day%' AND business_user_id = '".$id."'  AND sales_purchases = '".$sales_purchases."' ) t group by created_at")->row_array();
                   
                  

                    if(count($data)>0)
                    {
                        $result[] = $data;
                    }
                    else
                    {
                        $result[] = $data1;
                    }
                    
                }
                // print_r($result);die;
                 return $result;
            }
            if($data['filter'] == 'week')
            {
                $arr = array("0", "7", "14","21");
                $date = date('Y-m-d');
                $data1= array('created_at ' => '0' , 'amount' => '0');
               $result = array();
                for($i=0;$i<count($arr); $i++)
                {
                    $sDate = date("Y-m-d", strtotime('-'. $arr[$i] .' days'));
                    $eDate = date('Y-m-d', strtotime('-6 days', strtotime($sDate)));
                    $s_date = date('j F', strtotime($sDate));
                    $e_date = date('j F', strtotime($eDate));
                    $alldate = $e_date.' to '.$s_date;
                    // echo "SELECT DATE_FORMAT(created_at,'%Y-%m-%d') as created_at,amount from  daily_sales_purchases WHERE created_at >= '$eDate' AND created_at <= '$sDate' AND business_user_id='".$id."' AND  sales_purchases='".$sales_purchases."'";die;
                   // $data_result = $this->db->query("SELECT sum(amount) as amount from  daily_sales_purchases WHERE created_at >= '$eDate' AND created_at <= '$sDate' AND business_user_id='".$id."' AND  sales_purchases='".$sales_purchases."'")->result_array();
                 $data_result = $this->db->query("SELECT sum(amount) amount from ( select amount from daily_sales_purchases WHERE created_at >= '$eDate' AND created_at <= '$sDate' AND business_user_id='".$id."' AND  sales_purchases='".$sales_purchases."' union all select amount from credit_sales_purchases WHERE created_at >= '$eDate' AND created_at <= '$sDate' AND business_user_id='".$id."' AND  sales_purchases='".$sales_purchases."')t")->result_array();
                    $gg = array_merge(array('created_at'=>$alldate),$data_result[0]);
                   
                    array_push($result,$gg);
                  
                }
               
                return $result;
                // print_r($empty);exit();
              
            }
            if($data['filter'] == 'month')
            {

                date_default_timezone_set("America/Chicago");
                $count = 0;
                $endtMonth = date('m');
                $data_array = array();
                $year_month = date("Y-m");
                $result = array();
                $first_day = strtotime("$year_month-01 00:00:00");
                while ($count < $endtMonth) {
                    $query_year1 = date("F", strtotime("-".$count." months", $first_day));
                    $query_year = date("m", strtotime("-".$count." months", $first_day));
                    
                    $date_array[] = array(
                        "created_at" => $query_year
                    );
                    $count++;
                  
                }
                foreach($date_array as $month_date)
                {
                    $all_month = $month_date['created_at'];
                    $data_month = $this->db->query("SELECT sum(amount) amount from ( select amount FROM  daily_sales_purchases WHERE MONTH(created_at) = '$all_month'  && business_user_id = '".$id."' && sales_purchases = '".$sales_purchases."' union all select amount from credit_sales_purchases WHERE MONTH(created_at) = '$all_month' && business_user_id = '".$id."' && sales_purchases = '".$sales_purchases."') t")->result_array();
                    //$data_month = $this->db->query("SELECT sum(amount) as amount FROM  daily_sales_purchases WHERE MONTH(created_at) = '$all_month'")->result_array();
                    $gg = array_merge(array('created_at'=>$all_month),$data_month[0]);
                   
                    array_push($result,$gg);
                }
                return $result;
               
            }  
            $amount = 0;
            $array = array();
            if($data['filter'] == 'year')
           {
               
              // $year = $this->db->query("SELECT created_at ,sum(amount) as amount FROM daily_sales_purchases WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) && business_user_id = '".$id."' && sales_purchases = '".$sales_purchases."' group by created_at" )->result_array(); 
              $year = $this->db->query("SELECT DATE_FORMAT(created_at,'%Y-%m-%d') as created_at,sum(amount) amount from ( select created_at,amount from  daily_sales_purchases WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) && business_user_id ='".$id."' && sales_purchases ='".$sales_purchases."'  union all select created_at,amount from credit_sales_purchases  WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 YEAR) && business_user_id = '".$id."' && sales_purchases ='".$sales_purchases."')t group by created_at")->result_array();
               for($i=0;$i<count($year); $i++)
               {
                   $amount = $amount + $year[$i]['amount'];
               
               }
               $date = date('Y'); //today date
               array_push($array,array('created_at'=>$date,'amount'=>$amount));
               return $array; 
           }
       }
        public function check_signup($business_name,$supervisor_id)
    	{
            
                $this->db->select('business_name,supervisor_id');
                $this->db->where('supervisor_id',$supervisor_id);
                $q=$this->db->get('business_register');
                $count=$q->result();
                return count($count);
            

        }
    }  
    
    
			
	
?>