<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 require APPPATH . '/libraries/REST_Controller.php';

 use Restserver\Libraries\REST_Controller;
class Book extends REST_Controller {

	
	 public function __construct(){
		parent::__construct();
		// header('Access-Control-Allow-Origin: *');
		  header('Content-Type: application/json');
		if($this->migration->current() === FALSE){
			show_error($this->migration->error_string());
		}
		$this->load->library('cloudinarylib');
		$this->load->model('Book_model');
		$this->load->helper('string');
     	
	}

//============================================ USER =================================================================

//============================================ Login Api =================================================================
public function login_post()
{
	   $request = json_decode(file_get_contents('php://input'),true);
	
	   $this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('phone','Phone', 'trim|required');
	   $this->form_validation->set_rules('country_code','Country Code', 'trim|required');
	   $this->form_validation->set_rules('role','Role', 'trim|required');
	   $this->form_validation->set_rules('password','Password', 'trim|required|min_length[6]|min_length[6]');

	  if($this->form_validation->run()==false)
	  {  
		$datass = $this->form_validation->error_array();
		foreach($datass as $valid)
		{	
			$data['status'] = '400';
			$data['message'] = $valid;
		}
		echo json_encode($data); 
	  }
	  else
	  {
		 $phone = json_encode($request["phone"]);
      
      	 $phone = trim($phone,'"');
		 $country_code = json_encode($request["country_code"],JSON_NUMERIC_CHECK);
		 $password = json_encode($request["password"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role,'"');
		 $password = trim($password,'"');
		 $random_number = random_string('alnum',20);
	
		
		  $login_data =[
			  'phone' =>$phone,
			  'country_code' =>$country_code,
			  'password' =>$password,
			  'role' =>$role,
			  'sessiontoken' =>$random_number
			];
      // print_r($login_data);die;
			$login = $this->Book_model->logindata($login_data);
      		
			if(count($login) > 0 )
			{
				  $data['status'] = '200';
				   $data['message'] = 'Login Successfully !!';
				   $data['result'] = $login;
				   echo json_encode($data); 
			}
			else
			{
			    $data['status'] = '400';
			   	$data['message'] = "phone number & password & Country Code does't match !!";
			 	 echo json_encode($data); 
			   
			}
		}
   }

   
  


//============================================ End Login Api =============================================================

//============================================ MP PIN Api =================================================================

public function mp_pin_post()
{
	
	   $request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('role','Role', 'trim|required');
	   $this->form_validation->set_rules('pin','Pin', 'required|min_length[4]|max_length[4]');

	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $pin = json_encode($request["pin"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role ,'"');
		  
			$pin_data =[
				'pin' =>$pin,
				'role'=>$role,
				'updated_at' => date('Y-m-d H:m:i')
				];
				$pin = $this->Book_model->pindata($pin_data);
			
				if($pin == true)
				{
					$data['status'] = '200';
					$data['message'] = 'Login  Successfully !!';
					$data['result'] = $pin;
					echo json_encode($data); 
				}
				
				else
				{
					$data['status'] = '400';
					$data['message'] = 'Some Error !!';
					echo json_encode($data); 
					
				}
			
		}

   }

//============================================ End MP PIN Api =============================================================


//============================================ Set MP PIN Api =================================================================

public function set_mp_pin_post()
{
	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
	$role = trim($role ,'"');
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token($token,$role);
	if($check_token > 0 )
	{
	   $request = json_decode(file_get_contents('php://input'),true);
	   $this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('user_id','User Id', 'trim|required');
	   $this->form_validation->set_rules('role','Role', 'trim|required');
	   $this->form_validation->set_rules('pin','Pin', 'required|min_length[4]|max_length[4]');

	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
		 $pin = json_encode($request["pin"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role ,'"');
		 $pin_data =[
				'pin' =>$pin,
				'user_id' =>$user_id,
				'role'=>$role,
				'updated_at' => date('Y-m-d H:m:i')
				];
				$check_user = $this->Book_model->check_user_exist($role,$user_id);
				if(count($check_user) > 0) 
				{
					$pin = $this->Book_model->pin_update($pin_data);
					$data['status'] = '200';
					$data['message'] = 'Pin Set Successfully !!';
					$data['result'] = $pin_data;
					echo json_encode($data); 
				}
				
				else
				{
					
					$pin = $this->Book_model->pin_insert($pin_data);
					$data['status'] = '200';
					$data['message'] = 'Pin Set Successfully !!';
					$data['result'] = $pin_data;
					echo json_encode($data); 
					
				}
			 
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
   }

//============================================ End MP PIN Api =============================================================

//============================================ User Exit Api =================================================================

public function check_user_post()
{
	   $request = json_decode(file_get_contents('php://input'),true);
	
	   $this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('phone','Phone', 'required|regex_match[/^[0-9]{10}$/]');

	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 	$phone = json_encode($request["phone"],JSON_NUMERIC_CHECK);
			 if($this->Book_model->user_exist($phone))
			{
				  
				   $data['status'] = '200';
				   $data['message'] = 'Phone Number exist !!';
				   echo json_encode($data); 
			}
			else
			{
			   
			   $data['status'] = '400';
			   $data['message'] = "Phone Number doesn't exist !!";
			  echo json_encode($data); 
			   
			}
		}
		
   }

//============================================ End User exit Api =============================================================
	
//============================================ Forget Password Api =================================================================

public function forget_password_post()
{
	
	   $request = json_decode(file_get_contents('php://input'),true);
	
	   $this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('phone','Phone', 'required|regex_match[/^[0-9]{10}$/]');
	   $this->form_validation->set_rules('country_code','Country Code', 'trim|required');
	   $this->form_validation->set_rules('new_password','Password', 'trim|required|min_length[6]|min_length[6]');
	   $this->form_validation->set_rules('role','Role', 'trim|required');

	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $phone = json_encode($request["phone"],JSON_NUMERIC_CHECK);
		 $country_code = json_encode($request["country_code"],JSON_NUMERIC_CHECK);
		 $new_password = json_encode($request["new_password"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role,'"');
		 $new_password = trim($new_password,'"');

		  $forget_password =[
			  'phone' =>$phone,
			  'country_code' =>$country_code,
			  'password' =>$new_password,
			  'role' =>$role
			];
			
		  	if($this->Book_model->check_phone_exist($forget_password['phone'],$forget_password['country_code']))
			{
				   $forget_passwords = $this->Book_model->password_update($forget_password);
				   $data['status'] = '200';
				   $data['message'] = 'Update Successfully !!';
				   $data['result'] = $forget_password;
				   echo json_encode($data); 
			}
			else
			{
			   
			   $data['status'] = '400';
			   $data['message'] = "Phone Number && Country Code doesn't exist !!";
			   echo json_encode($data); 
			   
			}
		}

   }

//============================================ End Forget Password Api =============================================================


//============================================ Supervisor =================================================================

//============================================ Sign Up Api =================================================================

	public function sign_up_post()
	{
		
		$this->form_validation->set_rules('business_name','Business Name', 'trim|required');
		$this->form_validation->set_rules('supervisor_id','Supervisor Id', 'trim|required');
		$this->form_validation->set_rules('phone','Phone', 'trim|required');
		$this->form_validation->set_rules('country_code','Country Code', 'trim|required');
		$this->form_validation->set_rules('location','location', 'trim|required');
		$this->form_validation->set_rules('role','Role', 'trim|required');
		$this->form_validation->set_rules('owner_name','Owner Name', 'trim|required');
		$this->form_validation->set_rules('business_registered','Business Registered', 'trim|required');
		$this->form_validation->set_rules('gender','Gender', 'trim|required');
		$this->form_validation->set_rules('core_business','Core Business', 'trim|required');
		$this->form_validation->set_rules('activities','Activities', 'trim|required');
		$this->form_validation->set_rules('business_date','Business Date', 'trim|required');
		$this->form_validation->set_rules('no_of_employees','Number Of Employees', 'trim|required');
		$this->form_validation->set_rules('branches','Branches', 'trim|required');
		$this->form_validation->set_rules('any_loan','Any Loan', 'trim|required');
		$this->form_validation->set_rules('receive_payments','Receive Payments', 'trim|required');
		$this->form_validation->set_rules('make_payments','Make Payments', 'trim|required');
		$this->form_validation->set_rules('busniness_funding','Busniness Funding', 'trim|required');
		$this->form_validation->set_rules('latitude','latitude', 'trim|required');
		$this->form_validation->set_rules('longitude','longitude', 'trim|required');
		$business_registered = $this->input->post('business_registered');
		if($business_registered == 'yes')
		{
			$this->form_validation->set_rules('registation_no','Registation No', 'trim|required');
		}
		else
		{
			
		}
		

	  if($this->form_validation->run()==false)
	   {  
		
		$datass = $this->form_validation->error_array();
		foreach($datass as $valid)
		{	
			$data['status'] = '400';
			$data['message'] = $valid;
		
			
		}
		echo json_encode($data); 
	
		
		
	   }
	   else
	   {
			$image_name =  isset($_FILES['image']['name'])?$_FILES['image']['name']:'';
			$image_object	= isset($_FILES['image']['tmp_name'])?$_FILES['image']['tmp_name']:'';
			$business_name = $this->input->post('business_name');
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$password = random_string('alnum',7);
			$location = $this->input->post('location');
			$role = $this->input->post('role');
			$country_code = $this->input->post('country_code');
			$supervisor_id = $this->input->post('supervisor_id');
			$owner_name = $this->input->post('owner_name');
			$business_registered = $this->input->post('business_registered');
			$registation_no = $this->input->post('registation_no');
			$gender = $this->input->post('gender');
			$core_business = $this->input->post('core_business');
			$activities = $this->input->post('activities');
			$business_date = $this->input->post('business_date');
			$no_of_employees = $this->input->post('no_of_employees');
			$branches = $this->input->post('branches');
			$financial_institution = $this->input->post('financial_institution');
			$any_loan = $this->input->post('any_loan');
			$loan_amount = $this->input->post('loan_amount');
			$loan_purpose = $this->input->post('loan_purpose');
			$receive_payments = $this->input->post('receive_payments');
			$make_payments = $this->input->post('make_payments');
			$busniness_funding = $this->input->post('busniness_funding');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');

			$config['upload_path']   = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 1000;
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                $imagedetails = $this->upload->data();
                $imagepath    = $imagedetails['file_name'];
			
			$signup= array(
				'supervisor_id' => $_POST['supervisor_id'],
				'business_name' => $_POST['business_name'],
				'name' => $_POST['name'],
				'phone' => $_POST['phone'],
				'password' => $password,
				'country_code' => $_POST['country_code'],
				'location' => $_POST['location'],
				'role' => $_POST['role'],
				'owner_name' => $_POST['owner_name'],
				'business_registered' => $_POST['business_registered'],
				'registation_no' => $_POST['registation_no'],
				'gender' => $_POST['gender'],
				'core_business' => $_POST['core_business'],
				'activities' => $_POST['activities'],
				'business_date' => $_POST['business_date'],
				'no_of_employees' => $_POST['no_of_employees'],
				'branches' => $_POST['branches'],
				'financial_institution' => $_POST['financial_institution'],
				'any_loan' => $_POST['any_loan'],
				'loan_amount' => $_POST['loan_amount'],
				'loan_purpose' => $_POST['loan_purpose'],
				'receive_payments' => $_POST['receive_payments'],
				'make_payments' => $_POST['make_payments'],
				'latitude' => $_POST['latitude'],
				'longitude' => $_POST['longitude'],
				'busniness_funding' => $_POST['busniness_funding'],
				'updated_at' => date('Y-m-d H:m:i')
				
			);
       	     $signup['image']  = $imagepath;
       		$mm = ucfirst($owner_name).' '."Karibu Tenakata.";
       		$username = $name;
            $password = $password;
            $to = $phone;
       		$phone = $country_code.''.$phone;
            $from = 'Tenakata';
       		$username = 'Tenakata';
            $link = 'Click on the below link to Download and Install the application. \n https://play.google.com/store/apps/details?id=com.tenakata \n Ahsante! \n For Help Call 0728888863!';

            $message = ''.$mm.'\nUsername : '.$to.'\nPassword : '.$password.'\n '.$link;
            $transactionID = "00007";
            $clientid= "1062";
            $curl = curl_init();
            $password ="278b4fc4e6cc438b4fcf03f78c6f0909534dc4c270a762126c7bd45b09dde83a9ee74e92559a58d25793ac5a979ab7492e324d14acc0343e759abdce05c1ecf7";
            curl_setopt_array($curl, array(
              CURLOPT_PORT => "8095",
              CURLOPT_URL => "https://eclecticsgateway.ekenya.co.ke:8095/ServiceLayer/pgsms/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\t\"to\":\"$phone\",\n\t\"message\":\"$message\",\n\t\"from\":\"$from\",\n\t\"transactionID\":\"$transactionID\",\n\t\"username\":\"$username\",\n\t\"password\":\"$password\",\n\t\"clientid\":\"$clientid\"\n}",
              CURLOPT_HTTPHEADER => array(
               "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 3a34b9f9-e3ec-75ed-07ad-bc1eab9c486f",
                "token: LVwlhYsOteZ8c9TDRjBf",
                "x-api-key: admin@123"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            
            if ($err) {
              // echo "cURL Error #:" . $err;
            } else {
            // echo $response;
            }
			// print_r($signup);die;
			$path = "http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/";
			$signup['image'] = $path.''.$signup['image'];
			$sign_up = $this->Book_model->sign_up($signup);
			if($sign_up == true )
			{
				 $merge = array_merge($signup,array("id"=>$sign_up));
				   $data['status'] = '200';
				   $data['message'] = 'Sign Up Successfully !!';
				   $data['result'] = $merge;
				   echo json_encode($data); 
			}
			else
			{
			   
			   $data['status'] = '400';
			   $data['message'] = "Some Erorr !!";
			   echo json_encode($data); 
			   
			}
            }
		
	   }
	}
	
//==========================================End Sign Up Api =================================================================	 

//========================================== Daily sale & purchases Api =================================================================	 

public function dailysale_purchases_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$this->form_validation->set_rules('user_id','User Id', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('amount','Amount', 'trim|required');
		$this->form_validation->set_rules('item_list','Item List', 'trim|required');
		$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
		$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
    	
    	
	
	
		if($this->form_validation->run()==false)
		{  
				$datass = $this->form_validation->error_array();
				foreach($datass as $valid)
				{	
					$data['status'] = '400';
					$data['message'] = $valid;
				}
				echo json_encode($data);
		}
		else
		{
				$user_id = $this->input->post('user_id');
        		$phone = $this->input->post('phone');
       			$country_code = $this->input->post('country_code');
				$name = $this->input->post('name');
				$date = $this->input->post('date');
				$amount = $this->input->post('amount');
				$item_list = $this->input->post('item_list');
				$payment_type = $this->input->post('payment_type');
        		$id_no = $this->input->post('id_no');
				$sales_purchases = $this->input->post('sales_purchases');
				
			
        		$config['upload_path']   = './upload/';
           		$config['allowed_types'] = 'gif|jpg|png';
            	$config['max_size']      = 1000;
            	$this->load->library('upload', $config);
            
            	if ($this->upload->do_upload('attach_recepit')) {
                $imagedetails = $this->upload->data();
                $imagepath    = $imagedetails['file_name'];
			
				$sales_purchasess= array(
					'business_user_id' => $_POST['user_id'],
					'name' => $_POST['name'],
					'amount' => $_POST['amount'],
					'date' => $_POST['date'],
                	'phone' => $_POST['phone'],
              	    'country_code' => $_POST['country_code'],
					'item_list' => $_POST['item_list'],
					'payment_type' => $_POST['payment_type'],
                	'id_no' => $_POST['id_no'],
					'sales_purchases' => $_POST['sales_purchases'],
					'updated_at' => date('Y-m-d H:m:i'),
					'created_at' => date('Y-m-d')
					
				);
                $sales_purchasess['attach_recepit']  = $imagepath;
                $path = "http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/";
				$sales_purchasess['attach_recepit'] = $path.''. $sales_purchasess['attach_recepit'];
				$sale_purchases = $this->Book_model->sale_purchases($sales_purchasess);
                }
				if($sale_purchases == true )
				{
					
					$data['status'] = '200';
					$data['message'] = 'Cash '.ucfirst($sales_purchases).' Added Successful ||';
					$data['result'] = $sales_purchasess;
					echo json_encode($data); 
				}
			
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
    
}



//==========================================End Daily sale & purchases Api =================================================================


//========================================== Daily sale & purchases list Api =================================================================	 

public function sale_purchases_list_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('page','Page', 'trim|required');
			$this->form_validation->set_rules('Perpage','Perpage', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);	
			$sales_purchases = trim($sales_purchases,'"');
			$page = json_encode($request["page"],JSON_NUMERIC_CHECK);
			$page = trim($page,'"');	
			$Perpage = json_encode($request["Perpage"],JSON_NUMERIC_CHECK);	
			$Perpage = trim($Perpage,'"');

			
			$sales_purchases_list= array(
				'business_user_id' => $user_id,
				'payment_type' =>$payment_type,
				'sales_purchases' => $sales_purchases
				
			);
			$sales_purchases_lists = $this->Book_model->sales_purchases_list($sales_purchases_list,$page,$Perpage);
			
				$data['status'] = '200';
				$data['message'] = 'Show All list !!';
				$data['result'] = $sales_purchases_lists['query'];
				$data['total_amount'] = $sales_purchases_lists['amount'];
				echo json_encode($data); 
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End Daily sale & purchases list Api =================================================================	 


//========================================== Credit sale & purchases Api =================================================================	 

public function credit_sale_purchases_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$this->form_validation->set_rules('user_id','User Id', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
 		$this->form_validation->set_rules('amount','Amount', 'trim|required');
		$this->form_validation->set_rules('phone','Phone', 'required');
    	$this->form_validation->set_rules('country_code','Country Code', 'required');
		$this->form_validation->set_rules('id_no','ID NO', 'trim|required');
		$this->form_validation->set_rules('item_list','Item List', 'trim|required');
		$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
		$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
	
		
		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$date = $this->input->post('date');
			$amount = $this->input->post('amount');
			$name = $this->input->post('name');
			$id_no = $this->input->post('id_no');
			$phone = $this->input->post('phone');
        	$country_code = $this->input->post('country_code');
			$item_list = $this->input->post('item_list');
			$payment_type = $this->input->post('payment_type');
			$sales_purchases = $this->input->post('sales_purchases');
			$config['upload_path']   = './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 1000;
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('attach_recepit')) {
                $imagedetails = $this->upload->data();
                $imagepath    = $imagedetails['file_name'];

			
				$credit_sale_purchases= array(
					'business_user_id' => $_POST['user_id'],
					'amount' => $_POST['amount'],
					'date' => $_POST['date'],
					'name' => $_POST['name'],
					'id_no' => $_POST['id_no'],
					'phone' => $_POST['phone'],
                	'country_code' => $_POST['country_code'],
					'item_list' => $_POST['item_list'],
					'payment_type' => $_POST['payment_type'],
					'sales_purchases' => $_POST['sales_purchases'],
					'updated_at' => date('Y-m-d H:m:i'),
					'created_at' => date('Y-m-d')
					
				);
             
            $credit_sale_purchases['attach_recepit']  = $imagepath;
            $path = "http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/";
			$credit_sale_purchases['attach_recepit'] = $path.''.$credit_sale_purchases['attach_recepit'];
			$credits_sale_purchases = $this->Book_model->credit_sale_purchases($credit_sale_purchases);
            }
			if($credits_sale_purchases == true )
			{
				$merge = array_merge($credit_sale_purchases,array("id"=>$credits_sale_purchases));
				$data['status'] = '200';
				$data['message'] = 'Credit '.ucfirst($sales_purchases).' Added  Successfully !!';
				$data['result'] = $merge;
				echo json_encode($data); 
			}
			
			
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
}

//  public function date_valid($date)
//   {
//     $parts = explode("-", $date);
//     if (count($parts) == 3) {      
//       if (checkdate($parts[1], $parts[0], $parts[2]))
//       {
//         return TRUE;
//       }
//     }
//     $this->form_validation->set_message('date_valid', 'The Date field must be yyyy-mm-dd');
//     return false;
//   }

//==========================================End Credit sale & purchases Api =================================================================


//========================================== Credit sale & purchases list Api =================================================================	 

public function credit_sale_purchases_list_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('page','Page', 'trim|required');
			$this->form_validation->set_rules('Perpage','Perpage', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);	
			$sales_purchases = trim($sales_purchases,'"');
			$page = json_encode($request["page"],JSON_NUMERIC_CHECK);
			$page = trim($page,'"');
			$Perpage = json_encode($request["Perpage"],JSON_NUMERIC_CHECK);	
			$Perpage = trim($Perpage,'"');

			$credit_sale_purchases= array(
				'business_user_id' => $user_id,
				'payment_type' =>$payment_type,
				'sales_purchases' => $sales_purchases
				
			);
			
			$credit_sale_purchases = $this->Book_model->credit_sale_purchases_list($credit_sale_purchases,$page,$Perpage);
			
			if($credit_sale_purchases == true)
			{

				$data['status'] = '200';
				$data['message'] = 'Show All list !!';
				$data['result'] = $credit_sale_purchases['query'];
				$data['total_amount'] = $credit_sale_purchases['amount'];
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some Mismatch data !!";
				echo json_encode($data); 
			}
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End Credit sale & purchases list Api =================================================================

//==========================================Logout Api =================================================================	 

public function logout_post()
{
	   $request = json_decode(file_get_contents('php://input'),true);
	   $this->form_validation->set_data($request); 
	   $this->form_validation->set_rules('sessiontoken','Session Token', 'trim|required');
	   $this->form_validation->set_rules('role','Role', 'trim|required');
	   
	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $sessiontoken = json_encode($request["sessiontoken"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $session_token = trim($sessiontoken, '"');
		 $role = trim($role, '"');
		 $logout = $this->Book_model->logout($session_token,$role);
		 if($logout == true)
		 {
			$data['status'] = '200';
			$data['message'] = 'Logout Successfully';
			echo json_encode($data); 
		 }
		 else
		 {
			$data['status'] = '400';
			$data['message'] = "Some Erorr !!";
			echo json_encode($data); 
		
		 }
			 
		
		
	  }
   }

//==========================================End Logout Api =================================================================	 

//========================================== Home Api =================================================================	 

public function home_post()
{
  error_reporting(E_ALL & ~E_NOTICE);
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('filter','Filter', 'trim|required');
			
		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$filter = json_encode($request["filter"],JSON_NUMERIC_CHECK);	
			$filter = trim($filter,'"');
			$home_data= array(
				'business_user_id' => $user_id,
				'sales_purchases' =>$sales_purchases,
				'filter' => $filter
				
			);
			
			$home = $this->Book_model->home_list($home_data);
        	
        	$arrow_all = $home['prev_all'];
			$arrow = $home['home']['cash_amount'] + $home['home']['credit_amount'];
        
        	
       		if($arrow_all[0]['amount'] != '0' && $arrow_all[1]['amount'] != '0')
             {
                   $prev1 = $arrow_all[0]['amount'];
        		   $prev2 = $arrow_all[1]['amount'];
             }
           	else
              {
                   $prev1 = '0';
            	   $prev2 = '0';
                    	
              }
			
				$p_cash_amount = ($home['home']['cash_amount'] + $home['home']['credit_amount'])/2;
        		
				$c= count($home)-2;
				$amount = $home['home']['cash_amount'];
        		
				$credit_amount = $home['home']['credit_amount'];
        	
				$total = $amount+$credit_amount;
				$average = $total / $c;
				$av = strval($average);
				
			   if($prev1 >= $prev2)
                    {
                         $arraow ="true";
               			 if($filter == 'year')
       					 {
        					$total_num = ($prev1*100);
       					 }
        				else
       					 {
							if($prev1 !='0' && $prev1 !='' && $prev2 != '0' && $prev2 != '')
    						{
      							$total_num = ($prev1*100)/$prev2;
    						}
    						else
    						{
    							$total_num = '0';
   							 }
        				}
     		 				if($total_num != '0')
      					{
       							 $per = $total_num-100;
        						$pp = number_format($per , 2); 
      					}
      					else
      					 {
         		 			$pp = '0';
      		 		}	
                    }
                    else
                    {
                        $arraow ="false";
                    	 if($filter == 'year')
        				{
        					$total_num = ($prev1*100);
        				}
        				else
        				{
							if($prev1 !='0' && $prev1 !='' && $prev2 != '0' && $prev2 != '')
    						{
      							$total_num = ($prev2*100)/$prev1;
    						}
    						else
    						{
    							$total_num = '0';
   							 }
        					}
     						 if($total_num != '0')
      						{
       							 $per = $total_num-100;
        						 $pp = number_format($per , 2); 
      						}
      						else
      						 {
         						 $pp = '0';
      		 				}	
                    }
        
//         	$total_num = $prev1+$prev2;
        	
//         	if($total_num != '0')
//         	{
//         	$per = ($prev1/$total_num)*100;
//         	// echo $per;die;
//         		$pp = number_format($per , 2); 
//         	}
//         	else
//         	{
//         	$pp = '0';
//  
//         	       	}
	
//         if($filter == 'year')
//         {
//         	$total_num = ($prev1*100);
//         }
//         else
//         {
// 			if($prev1 !='0' && $prev1 !='' && $prev2 != '0' && $prev2 != '')
//     		{
//       			$total_num = ($prev2*100)/$prev1;
//     		}
//     		else
//     		{
//     			$total_num = '0';
//    			 }
//         }
//      		 if($total_num != '0')
//       		{
//        			 $per = $total_num-100;
//         		$pp = number_format($per , 2); 
//       		}
//       		else
//       		 {
//          		 $pp = '0';
//       		 }	
        
        	
			if($home == true)
			{
				$data['status'] = '200';
				$data['message'] = 'Show  list !!';
				$data['result'] = $home['home'];
				$data['total_average'] = $p_cash_amount;
				$data['percentage'] = $pp;
				$data['arraow'] = $arraow;
				$data['total'] = $total;
				$data['name'] = $home['name'];
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some Mismatch data !!";
				echo json_encode($data); 
			}
			
				
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End Home Api =================================================================

//========================================== Credit sale & By Id list Api =================================================================	 

public function credit_view_details_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('id','Id', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$id = json_encode($request["id"],JSON_NUMERIC_CHECK);	
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');		
			$credit_sale_by_id = $this->Book_model->credit_sale_by_id_list($id,$sales_purchases,$payment_type);
			
				$data['status'] = '200';
				$data['message'] = 'Show All list !!';
				$data['result'] = $credit_sale_by_id['query'];
				echo json_encode($data); 
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End Credit sale & By Id list Api  =================================================================



//==========================================  confirm payment Api =================================================================	 

public function confirm_payment_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('transaction_id','transaction Id', 'trim|required');
			$this->form_validation->set_rules('amount_paid','Amount Paid', 'trim|required');
			$this->form_validation->set_rules('payment_option','Payment Option', 'trim|required');
			$this->form_validation->set_rules('naration','Naration', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$transaction_id = json_encode($request["transaction_id"],JSON_NUMERIC_CHECK);	
			$amount_paid = json_encode($request["amount_paid"],JSON_NUMERIC_CHECK);	
			$payment_option = json_encode($request["payment_option"],JSON_NUMERIC_CHECK);
			$payment_option = trim($payment_option,'"');	
			$naration = json_encode($request["naration"],JSON_NUMERIC_CHECK);
			$naration = trim($naration,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');

			$confirm_payment= array(
				'transaction_id' => $transaction_id,
				'amount_paid' =>$amount_paid,
				'payment_option' =>$payment_option,
				'sales_purchase' =>$sales_purchases,
				'naration' => $naration,
				'updated_at' => date('Y-m-d H:m:i')
				
			);
			$confirm_payments = $this->Book_model->confirm_payment($confirm_payment);
			if($confirm_payments == true)
			{
			    $data['status'] = '200';
				$data['message'] = 'Payment Successfully!!';
				$data['result'] = $confirm_payment;
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some error !!";
				echo json_encode($data);
			}
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End confirm payment Api  =================================================================



//==========================================  Remind Api =================================================================	 

public function remind_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('transaction_id','transaction Id', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$transaction_id = json_encode($request["transaction_id"],JSON_NUMERIC_CHECK);	
			$message = json_encode($request["message"],JSON_NUMERIC_CHECK);
			$message = trim($message,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');

			$remind= array(
				'transaction_id' => $transaction_id,
				'sales_purchase' =>$sales_purchases,
				'message' => $message,
				'updated_at' => date('Y-m-d H:m:i')
				
			);
        	
       		$check_id = $this->Book_model->check_id($transaction_id);
        	
        	if($check_id > 0 )
            {
            	$sms= $this->Book_model->check_sms($transaction_id);
            }
        	else
            {
            	$sms= $this->Book_model->sms($transaction_id);
            }
        
        	// print_r($sms);die;
        	
        	if($sms['query'][0]['message'] == '')
            {
            	$message = '';
            }
        	else
            {
            	$message = $sms['query'][0]['message'];
            }
        	$phone = $sms['query2'][0]['phone'];
        	$country_code = $sms['query2'][0]['country_code'];
        	
        	// echo $country_code;die;
            $mm = $message;
            $to = $phone;
       		$phone  = $country_code.''.$phone;
             $from = 'Tenakata';
       		$username = 'Tenakata';
            // $link = ' This is to remind you that you owe'." ".$bissiness_name." , ".$bussiness_phone." , ".$amount ." ".'for purchases done on'. " ".$date." ".'Please pay up. Thank you.Powered by Tenakata!For Help Call 0728888863!' ;

            $message = $mm;
            $transactionID = "00007";
            $clientid= "1062";
            $curl = curl_init();
            $password ="278b4fc4e6cc438b4fcf03f78c6f0909534dc4c270a762126c7bd45b09dde83a9ee74e92559a58d25793ac5a979ab7492e324d14acc0343e759abdce05c1ecf7";
            curl_setopt_array($curl, array(
              CURLOPT_PORT => "8095",
              CURLOPT_URL => "https://eclecticsgateway.ekenya.co.ke:8095/ServiceLayer/pgsms/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\t\"to\":\"$phone\",\n\t\"message\":\"$message\",\n\t\"from\":\"$from\",\n\t\"transactionID\":\"$transactionID\",\n\t\"username\":\"$username\",\n\t\"password\":\"$password\",\n\t\"clientid\":\"$clientid\"\n}",
              CURLOPT_HTTPHEADER => array(
               "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 3a34b9f9-e3ec-75ed-07ad-bc1eab9c486f",
                "token: LVwlhYsOteZ8c9TDRjBf",
                "x-api-key: admin@123"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              // echo "cURL Error #:" . $err;
            } else {
             // echo $response;
            }
       
			$reminds = $this->Book_model->remind($remind);
			if($reminds == true)
			{
			    $data['status'] = '200';
				$data['message'] = 'Remind Add Successfully!!';
				$data['result'] = $remind;
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some error !!";
				echo json_encode($data);
			}
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End confirm payment Api  =================================================================


//==========================================  supervisor Home Api =================================================================	 

public function supervisor_home_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token2($token);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('supervisor_id','Supervisor Id', 'trim|required');

		if($this->form_validation->run()==false)
		{  
				$datass = $this->form_validation->error_array();
				foreach($datass as $valid)
				{	
					$data['status'] = '400';
					$data['message'] = $valid;
				}
				echo json_encode($data);
		}
		else
		{
			$supervisor_id = json_encode($request["supervisor_id"],JSON_NUMERIC_CHECK);	
			$supervisor_home = $this->Book_model->supervisor_home($supervisor_id);
			$data['status'] = '200';
			$data['message'] = 'supervisor list!!';
			$data['result'] = $supervisor_home;
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End supervisor Home  Api  =================================================================


//========================================== purchase sale & By Id list Api =================================================================	 

public function purchase_view_details_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('id','Id', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$id = json_encode($request["id"],JSON_NUMERIC_CHECK);	
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');		
			$purchase_sale_by_id = $this->Book_model->purchase_sale_by_id_list($id,$sales_purchases,$payment_type);
			
				$data['status'] = '200';
				$data['message'] = 'Show All list !!';
				$data['result'] = $purchase_sale_by_id['query'];
				echo json_encode($data); 
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End purchase sale & By Id list Api  =================================================================


//========================================== business details Api =================================================================	 

public function business_details_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token2($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('shop_id','Shop Id', 'trim|required');
		

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$shop_id = json_encode($request["shop_id"],JSON_NUMERIC_CHECK);	
			$business_details = $this->Book_model->business_details_list($shop_id);
			
// 			print_r($business_details);die;
				if(is_array($business_details['cash_sale']) == 0)
                {
                	$amount = $business_details['cash_sale'];
                	$c = 0;
                }
        		else
                {
					$amount = $business_details['cash_sale'];
                	
        			$c= count($amount);
                	
                	
                }
        		if(is_array($business_details['cash_purchase']) == 0)
                {
                	$cash_amount = $business_details['cash_purchase'];
                	$c1 = 0;
                }
        		else
                {
                	$cash_amount = $business_details['cash_purchase'];
					$c1= count($cash_amount);
                }
				
				$a = $c + $c1;
				
				
				if(is_array($business_details['credit_sale']) == 0)
                {
                	$amount1 = $business_details['credit_sale'];
                	$c2 = 0;
                }
        		else
                {
                	$amount1 = $business_details['credit_sale'];
					$c2= count($amount1);
                }
        
        		if(is_array($business_details['credit_purchase']) == 0)
                {
                	$credit_amount = $business_details['credit_purchase'];
                	$c3 = 0;
                }
				else
                {
                	$credit_amount = $business_details['credit_purchase'];
					$c3= count($credit_amount);
                }
				
				$credit = $amount+$credit_amount;
				$add = $c2 + $c3;
				$cash = $amount+$amount1;
				
//         		if($a == 0)
//                 {
//                 	$av = 0;
//                 }
//         		else
//                 {
//                 	$average = $cash / 2;
// 					$av = $average;
//                 }
				$average = $cash / 2;
					$av = $average;
			
				$credit = $cash_amount+$credit_amount;
				// if($add == 0)
				// {
				// $av1 = 0;
				// }
				// else
				// {
				// $average = $credit / 2;
				// 	$av1 = $average;	
				// }
				$average = $credit / 2;
					$av1 = $average;	
				
				
				
			
		
				$data['status'] = '200';
				$data['message'] = 'Show Business Details !!';
				$data['result'] = $business_details;
				$data['total_cash'] = $cash;
				$data['total_credit'] = $credit;
				$data['total_avrage_sales'] = $av;
				$data['total_avrage_purchase'] = $av1;
				echo json_encode($data); 
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End business details Api  =================================================================
//==========================================  Remind Api =================================================================	 

public function bussiness_visit_post()
{
	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token2($token);
	if($check_token > 0 )
	{
			
			$this->form_validation->set_rules('shop_id','Shop Id', 'trim|required');
			$this->form_validation->set_rules('current_date', 'Current Date', 'trim|required');
			$this->form_validation->set_rules('comment','Comment', 'trim|required');
			$this->form_validation->set_rules('bussiness_location','Bussiness Location', 'trim|required');
			$this->form_validation->set_rules('stock','Stock', 'trim|required');
			$this->form_validation->set_rules('busy_shop','Busy Shop', 'trim|required');
			$this->form_validation->set_rules('latitude','Latitude', 'trim|required');
			$this->form_validation->set_rules('longitude','Longitude', 'trim|required');

		if($this->form_validation->run()==false) 
		{  
			$data['status'] = '400';
             $data['result'] = $this->form_validation->error_array();
             echo json_encode($data);
		}
		else
		{
			
			$shop_id = json_encode($request["shop_id"],JSON_NUMERIC_CHECK);	
			$current_date = json_encode($request["current_date"],JSON_NUMERIC_CHECK);
			$current_date = trim($current_date,'"');
			$comment = json_encode($request["comment"],JSON_NUMERIC_CHECK);
			$comment = trim($comment,'"');
			$bussiness_location = json_encode($request["bussiness_location"],JSON_NUMERIC_CHECK);
			$bussiness_location = trim($bussiness_location,'"');
			$stock = json_encode($request["stock"],JSON_NUMERIC_CHECK);
			$busy_shop = json_encode($request["busy_shop"],JSON_NUMERIC_CHECK);
			$latitude = json_encode($request["latitude"],JSON_NUMERIC_CHECK);
			$longitude = json_encode($request["longitude"],JSON_NUMERIC_CHECK);
			
			$bussiness_visit= array(
				'business_register_id' => $shop_id,
				'current_date' =>$current_date,
				'comment' => $comment,
				'bussiness_location' => $bussiness_location,
				'stock' => $stock,
				'busy_shop' => $busy_shop,
				'latitude' => $latitude,
				'longitude' => $longitude
			);
		
			$bussiness_visits = $this->Book_model->bussiness_visit($bussiness_visit);
			if($bussiness_visits == true)
			{
			    $data['status'] = '200';
				$data['message'] = 'Bussiness Visit Successfully!!';
				$data['result'] = $bussiness_visit;
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some error !!";
				echo json_encode($data);
			}
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}


public function date_valid1($date)
{
  $parts = explode("-", $date);
  if (count($parts) == 3) {      
	if (checkdate($parts[1], $parts[0], $parts[2]))
	{
	  return TRUE;
	}
  }
  $this->form_validation->set_message('date_valid', 'The Date field must be yyyy-mm-dd');
  return false;
}

//==========================================End confirm payment Api  =================================================================
//========================================== Home Api =================================================================	 

public function graph_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
		$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('filter','Filter', 'trim|required');
			
		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$filter = json_encode($request["filter"],JSON_NUMERIC_CHECK);	
			$filter = trim($filter,'"');
			$home_data= array(
				'business_user_id' => $user_id,
				'sales_purchases' =>$sales_purchases,
				'filter' => $filter
				
			);
			$graph = $this->Book_model->graph($home_data);
			$data['status'] = '200';
			$data['message'] = 'Graph  list !!';
			$data['filter'] = $filter;
			$data['result'] = $graph;
			echo json_encode($data); 
			
			
				 
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End Home Api =================================================================



//==========================================  sorting Api =================================================================	 

public function sorting_post()
{
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
			$this->form_validation->set_rules('sorting_type','Sorting Type', 'trim|required');
			$this->form_validation->set_rules('page','Page', 'trim|required');
			$this->form_validation->set_rules('Perpage','Perpage', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$sorting_type = json_encode($request["sorting_type"],JSON_NUMERIC_CHECK);
			$sorting_type = trim($sorting_type,'"');
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$page = json_encode($request["page"],JSON_NUMERIC_CHECK);
			$page = trim($page,'"');	
			$Perpage = json_encode($request["Perpage"],JSON_NUMERIC_CHECK);	
			$Perpage = trim($Perpage,'"');

			$sort= array(
				'business_user_id' => $user_id,
				'sales_purchases' =>$sales_purchases,
				'payment_type' => $payment_type,
				'sorting_type' => $sorting_type
				
			);
			$sorting = $this->Book_model->sort($sort,$page,$Perpage);
			$data['status'] = '200';
			$data['message'] = 'Sorting list!!';
			$data['result'] = $sorting['query'];
			$data['total_amount'] = $sorting['amount'];
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End sorting  Api  =================================================================

//==========================================  profile Api =================================================================	 

public function profile_post()
{
 
	$role = $this->input->post('role');
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token($token,$role);
	if($check_token > 0 )
	{
			
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('name','Name', 'trim|required');
			$this->form_validation->set_rules('role','Role', 'trim|required');
			

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$role = $this->input->post('role');
			if(empty($_FILES))
			{
				$profile= array(
					'id' => $_POST['user_id'],
					'owner_name' => $_POST['name'],
					'email' => $_POST['email'],
					'role' => $_POST['role'],
					'updated_at' => date('Y-m-d H:m:i')
					
				);
			}
			else
			{
				$config['upload_path']   = './upload/';
            	$config['allowed_types'] = 'gif|jpg|png';
            	$config['max_size']      = 1000;
            	$this->load->library('upload', $config);
            
           		 if ($this->upload->do_upload('image')) {
                $imagedetails = $this->upload->data();
                $imagepath    = $imagedetails['file_name'];
				$profile= array(
					'id' => $_POST['user_id'],
					'owner_name' => $_POST['name'],
					'email' => $_POST['email'],
					'role' => $_POST['role'],
					'updated_at' => date('Y-m-d H:m:i')
					
				);
			}
            }
         	$profile['image']  = $imagepath;

			$path = "http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/";
			$profile['image'] = $path.''.$profile['image'];
				
			$profiles = $this->Book_model->profile($profile);
			$data['status'] = '200';
			$data['message'] = 'Profile list!!';
			$data['result'] = $profile;
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}

//==========================================  training list Api =================================================================	 

public function training_post()
{
	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
	$role = trim($role ,'"');
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token($token,$role);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('role','role', 'trim|required');
			$this->form_validation->set_rules('page','Page', 'trim|required');
			$this->form_validation->set_rules('Perpage','Perpage', 'trim|required');
			

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
			$role = trim($role,'"');
			$page = json_encode($request["page"],JSON_NUMERIC_CHECK);
			$page = trim($page,'"');	
			$Perpage = json_encode($request["Perpage"],JSON_NUMERIC_CHECK);	
			$Perpage = trim($Perpage,'"');

			$training = $this->Book_model->training($user_id,$role,$page,$Perpage);
			$data['status'] = '200';
			$data['message'] = 'Training list!!';
			$data['result'] = $training;
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End training list  Api  =================================================================

//==========================================  training_viewDetails  Api =================================================================	 

public function training_viewDetails_post()
{
	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
	$role = trim($role ,'"');
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token($token,$role);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('id','User Id', 'trim|required');
			$this->form_validation->set_rules('role','role', 'trim|required');

			

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$id = json_encode($request["id"],JSON_NUMERIC_CHECK);
			$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
			$role = trim($role,'"');
		

			$training_viewDetails = $this->Book_model->training_viewDetails($id,$role);
			$data['status'] = '200';
			$data['message'] = 'Training View Details list!!';
			$data['result'] = $training_viewDetails;
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End training_viewDetails   Api  =================================================================

//==========================================  training_add rating Api =================================================================	 

public function training_rating_post()
{
	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
	$role = trim($role ,'"');
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token($token,$role);
	if($check_token > 0 )
	{
			$request = json_decode(file_get_contents('php://input'),true);
			$this->form_validation->set_data($request); 
			$this->form_validation->set_rules('id',' Id', 'trim|required');
			$this->form_validation->set_rules('role','role', 'trim|required');
			$this->form_validation->set_rules('rating','Rating', 'trim|required');

			

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$id = json_encode($request["id"],JSON_NUMERIC_CHECK);
			$rating = json_encode($request["rating"],JSON_NUMERIC_CHECK);
			$role = json_encode($request["role"],JSON_NUMERIC_CHECK);
			$role = trim($role,'"');
		

			$training_rating = $this->Book_model->training_rating($id,$role,$rating);
			$data['status'] = '200';
			$data['message'] = 'Training Add Rating!!';
			$data['result'] = $training_rating;
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End training Add Rating list  Api  =================================================================

//==========================================  training_add rating Api =================================================================	 

public function filter_post()
{	$request = json_decode(file_get_contents('php://input'),true);
	$this->form_validation->set_data($request); 
	$token = $this->input->get_request_header('token');
	$check_token = $this->Book_model->business_check_token1($token);
	if($check_token > 0 )
	{
			
			$this->form_validation->set_rules('user_id','User Id', 'trim|required');
			$this->form_validation->set_rules('payment_type','Payment Type', 'trim|required');
			$this->form_validation->set_rules('sales_purchases','Sales Purchases', 'trim|required');
			$this->form_validation->set_rules('sorting_type','Sorting Type', 'trim|required');

			

		if($this->form_validation->run()==false)
		{  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
		}
		else
		{
			$user_id = json_encode($request["user_id"],JSON_NUMERIC_CHECK);
			$payment_type = json_encode($request["payment_type"],JSON_NUMERIC_CHECK);
			$payment_type = trim($payment_type,'"');
			$sales_purchases = json_encode($request["sales_purchases"],JSON_NUMERIC_CHECK);
			$sales_purchases = trim($sales_purchases,'"');
			$sorting_type = json_encode($request["sorting_type"],JSON_NUMERIC_CHECK);
			$sorting_type = trim($sorting_type,'"');
		
			$filter= array(
				'business_user_id' => $user_id,
				'sales_purchases' =>$sales_purchases,
				'payment_type' => $payment_type,
				'sorting_type' => $sorting_type
				
			);

			$filtes = $this->Book_model->filter($filter);
			$data['status'] = '200';
			$data['message'] = 'Filter List!!';
			$data['result'] = $filtes['query'];
			$data['total_amount'] = $filtes['amount'];
			echo json_encode($data); 
		
			
		}
	}
	else
	{
	   $data['status'] = '400';
	   $data['message'] = 'Unauthorised Access';
	   echo json_encode($data); 
	}
	
}



//==========================================End training_viewDetails list  Api  =================================================================



public function check_validation_post()
{
	$business_registered = $this->input->post('business_registered');
	$this->form_validation->set_rules('business_name','Business Name', 'trim|required|is_unique[business_register.business_name.business_register]');
	$this->form_validation->set_rules('phone','Phone', 'required|is_unique[business_register.phone.business_register]');
	$this->form_validation->set_rules('business_registered','Business Registered', 'trim|required');
    if($business_registered == 'yes')
        {
            $this->form_validation->set_rules('registation_no','Registation No', 'required|is_unique[business_register.registation_no.business_register]');
        }
        else
        {

        }
	//$this->form_validation->set_rules('registation_no','Registation No', 'required|is_unique[business_register.registation_no.business_register]');

	if($this->form_validation->run()==false)
	{  
		
		$datass = $this->form_validation->error_array();
		foreach($datass as $valid)
		{	
			$data['status'] = '400';
			$data['message'] = $valid;
		
			
		}
		echo json_encode($data); 
	}
	else
	{
		$data['status'] = '200';
		$data['message'] = 'ok';
		echo json_encode($data); 
	}
}


	public function otp_post()
    {
    	$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
	   	$this->form_validation->set_rules('phone','Phone', 'trim|required');
	   	$this->form_validation->set_rules('country_code','Country Code', 'trim|required');
	    $this->form_validation->set_rules('role','Role', 'trim|required');
		
	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $phone = json_encode($request["phone"],JSON_NUMERIC_CHECK);
		 $country_code = json_encode($request["country_code"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role,'"');
		
		  $check_phone = $this->Book_model->check_phone_no($phone,$role,$country_code);
      	  if($check_phone > 0 )
		  {
          	 $fourdigitrandom = rand(1000,9999); 

            $to = $phone;
       		$phone1  = $country_code.''.$phone;
            $from = 'Tenakata';
       		$username = 'Tenakata';
           
			
            $message =  $fourdigitrandom;
            $transactionID = "00007";
            $clientid= "1062";
            $curl = curl_init();
            $password ="278b4fc4e6cc438b4fcf03f78c6f0909534dc4c270a762126c7bd45b09dde83a9ee74e92559a58d25793ac5a979ab7492e324d14acc0343e759abdce05c1ecf7";
            curl_setopt_array($curl, array(
              CURLOPT_PORT => "8095",
              CURLOPT_URL => "https://eclecticsgateway.ekenya.co.ke:8095/ServiceLayer/pgsms/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\t\"to\":\"$phone1\",\n\t\"message\":\"$message\",\n\t\"from\":\"$from\",\n\t\"transactionID\":\"$transactionID\",\n\t\"username\":\"$username\",\n\t\"password\":\"$password\",\n\t\"clientid\":\"$clientid\"\n}",
              CURLOPT_HTTPHEADER => array(
               "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: 3a34b9f9-e3ec-75ed-07ad-bc1eab9c486f",
                "token: LVwlhYsOteZ8c9TDRjBf",
                "x-api-key: admin@123"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              // echo "cURL Error #:" . $err;
            } else {
             // echo $response;
            }
          
      	$update_otp = $this->Book_model->update_otp($phone,$role,$country_code,$fourdigitrandom);
      	if($update_otp == true)
		{

				$data['status'] = '200';
				$data['message'] = 'Show Otp!!';
				$data['otp'] = $fourdigitrandom;
				echo json_encode($data); 
			}
			else
			{
				$data['status'] = '400';
				$data['message'] = "Some Error !!";
				echo json_encode($data); 
			}
          
      }
      	else
        {
        	$data['status'] = '400';
	   		$data['message'] = 'Phone Number not register';
	   		echo json_encode($data); 
        }
      }
			
    }



public function check_otp_post()
 {
    	$request = json_decode(file_get_contents('php://input'),true);
		$this->form_validation->set_data($request); 
	   	$this->form_validation->set_rules('otp','OTP', 'trim|required');
	    $this->form_validation->set_rules('role','Role', 'trim|required');
		
	  if($this->form_validation->run()==false)
	  {  
			$datass = $this->form_validation->error_array();
			foreach($datass as $valid)
			{	
				$data['status'] = '400';
				$data['message'] = $valid;
			}
			echo json_encode($data);
	  }
	  else
	  {
		 $otp = json_encode($request["otp"],JSON_NUMERIC_CHECK);
		 $role = json_encode($request["role"],JSON_NUMERIC_CHECK);
		 $role = trim($role,'"');
		
		  $check_otp = $this->Book_model->check_otp($otp,$role);
      	  if($check_otp > 0 )
		  {
          	 
      		$data['status'] = '200';
	   		$data['message'] = 'Valid Otp';
	   		echo json_encode($data); 
          
      	  }
      	else
        {
        	$data['status'] = '400';
	   		$data['message'] = 'Invalid Otp';
	   		echo json_encode($data); 
        }
      }
			
    }
	 
}
