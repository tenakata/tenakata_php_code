<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
        parent:: __construct();
        if($this->migration->current() === FALSE){
            show_error($this->migration->error_string());
            $this->load->library('form_validation');
            $this->load->helper(array('form','url'));
            $this->load->model('Login_model');
            $this->load->library('cloudinarylib');
		}
    }
    
    public function index()
    {
        $this->load->model('Login_model');
        $data['count_cash_sales'] = $this->Login_model->count_cash_sales();
        $data['count_credit_sales'] = $this->Login_model->count_credit_sales();
        $data['count_cash_purchase'] = $this->Login_model->count_cash_purchase();
        $data['count_credit_purchase'] = $this->Login_model->count_credit_purchase();
        $data['count_user'] = $this->Login_model->count_user();
        $data['count_supervisor'] = $this->Login_model->count_supervisor();
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $this->load->view('admin/index',$data);
    }  
    public function login_admin()
	{

		$this->load->view('admin/login');
	}
	public function admin_login()
   	{

       $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
       $this->form_validation->set_rules('email', ' Email', 'trim|required');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|min_length[5]');
       if ($this->form_validation->run() == True) 
       {
        $this->load->library('form_validation');
            $email    = html_escape(trim($this->input->post('email', TRUE)));
            $password = html_escape(trim(md5($this->input->post('password', TRUE))));
            $data     = array(
                'email' => $email,
                'password' => $password
            );
            // var_dump($data);die;
            $this->load->model('Login_model');
            $result   = $this->Login_model->logindata($data);

        if (!empty($result)) 
        {
            $this->session->set_userdata("email", $result['email']);
            $this->session->set_flashdata('message', 'Login Successfully');
            redirect('/dashboard');
        } 
        else 
        {
            $this->session->set_flashdata('message', 'Invalid UserName And Password');
            $this->load->view('admin/login');
        }
        } 
        else 
        {
            
            $this->load->view('admin/login');
        }
   }
        public function change_password()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldpass', 'Old Password', 'callback_password_check');
            $this->form_validation->set_rules('newpass', 'New Password', 'trim|required|min_length[5]|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required|min_length[5]|min_length[5]|matches[newpass]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if ($this->form_validation->run() == false) 
            {
                
                $this->load->model('Login_model');
                $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
                $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
                $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
                $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
                $this->load->view('admin/change_password',$data);
                
            } 
            else 
            {
                
                $email = $this->session->userdata('email');
                $newpass = $this->input->post('newpass');
                $this->load->model('Login_model');
                $this->Login_model->update_user($email, array(
                    'password' => md5($newpass)
                ));
                $this->session->set_flashdata('message', 'Password Update Successfully ');
                $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
                $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
                $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
                $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
                $this->load->view('admin/change_password',$data);
                // redirect('admin/change_password');
                
            }
        }

        public function password_check($oldpass)
        {
            $email = $this->session->userdata('email');
            $this->load->model('Login_model');
            $user  = $this->Login_model->get_user($email);
            //var_dump($user->password);die;
            if ($user->password !== md5($oldpass)) {
                $this->form_validation->set_message('password_check', 'The {field} does not match');
                return false;
            }
            
            return true;
        }
        
        public function logout()
        {
            
            $this->session->unset_userdata('email');
            $this->session->sess_destroy();

            redirect('admin/login_admin','refresh');die;
            
        }

        public function supervisor()
        {
            $this->load->model('Login_model');
            $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
            $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
            $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
            $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
            $this->load->view('admin/supervisor',$data);
        }
    public function add_supervisor()
    {

       $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
       $this->form_validation->set_rules('name', 'Name', 'trim|required');
       $this->form_validation->set_rules('email', 'email', 'trim|required');
       $this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_unique[business_register.phone]');
       $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
       $this->form_validation->set_rules('password', 'Password', 'trim|required');
       $this->form_validation->set_rules('image', 'Image', 'callback_file_selected_image');

     
       if ($this->form_validation->run() == True) 
       {
            $this->load->model('Login_model');
            $this->load->library('cloudinarylib');
            $name     = html_escape(trim($this->input->post('name', TRUE)));
            $email     = html_escape(trim($this->input->post('email', TRUE)));
            $phone     = html_escape(trim($this->input->post('phone', TRUE)));
            $country_code     = html_escape(trim($this->input->post('country_code', TRUE)));
            $role     = html_escape(trim($this->input->post('role', TRUE)));
            $password     = html_escape(trim($this->input->post('password', TRUE)));
            $filename = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
            $result['upload_image'] = \Cloudinary\Uploader::upload($tmp_name);
                
            $data = array( 
                
                'name' =>$name,
                'email' => $email,
                'phone' => $phone,
                'country_code' => $country_code,
                'role' => $role,
                'password' => $password,
                'image' => $result['upload_image']['url'],
                'public_id' => $result['upload_image']['public_id'],
                'updated_at' => date('Y-m-d H:m:i')
                
            );
           
            
           	$mm = "Welcome to Tenakata Supervisor Application It’s great to have you with us. Please click on the below link to Download and Install the application.";
            $username = $name;
            $password = $password;
            $to = $phone;
            $from = 'ECLECTICS';
            $link = 'https://play.google.com/store/apps/details?id=com.tenakatasupervisor';

            $message = 'Message : '.$mm.'\nUsername : '.$username.'\nOTP : '.$password.'\nRespective Application Link : '.$link;
            $transactionID = "SMS_00007";
            $clientid= "5094";
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_PORT => "8443",
              CURLOPT_URL => "https://testgateway.ekenya.co.ke:8443/ServiceLayer/pgsms/send",
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
                "postman-token: 109c0984-ae62-dd5e-58c9-605fa3f84124",
                "token: iYq6BtuXGhOk9ECdaRmv",
                "x-api-key: admin@123"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
            $result   = $this->Login_model->supervisor($data);
            if (!empty($result)) 
            {
                $this->session->set_flashdata('message', 'Supervisor Add Successfully');
                redirect('supervisor');
            } 
            else 
            {
                $this->session->set_flashdata('message', 'Some Error');
                $this->load->view('supervisor');
            }
        } 
        else 
        {
            $this->load->model('Login_model');
            $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
            $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
            $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
            $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
            $this->load->view('admin/supervisor',$data);
        }
    }
    function file_selected_image(){

        $this->form_validation->set_message('file_selected_image', 'Please select file.');
        if (empty($_FILES['image']['name'])) {
                return false;
            }else{
                return true;
            }
    }

    public function supervisor_list()
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['supervisor_list'] = $this->Login_model->supervisor_list();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $this->load->view('admin/supervisor_list',$data);
    }
    public function view_supervisor($id)
    {
         $this->load->model('Login_model');
         $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
         $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
         $data['view_supervisor'] = $this->Login_model->view_supervisor($id);
         $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
         $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
         $this->load->view('admin/view_supervisor',$data);
    }
    public function update_supervisor()
    {
        // print_r($_POST['id']);die;
       
            if ($_FILES['image']['tmp_name'] == "") {
                
                $data = array(
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'country_code' => $_POST['country_code'],
                    'role' => $_POST['role'],
                    'updated_at' => date('Y-m-d H:m:i')

                    
                );
                // var_dump($data);die;
                $this->load->model('Login_model');
                $this->Login_model->update_with_out_image_supervisor($data);
                $this->session->set_flashdata('message', 'Supervisor Update Successfully');
                redirect('supervisor_list');
                
            } else {

                $this->load->library('cloudinarylib');
                $filename = $_FILES['image']['name'];
			    $tmp_name = $_FILES['image']['tmp_name'];
                $result['upload_image'] = \Cloudinary\Uploader::upload($tmp_name);
                
                $data = array(
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'country_code' => $_POST['country_code'],
                    'image' => $result['upload_image']['url'],
                    'public_id' => $result['upload_image']['public_id'],
                    'updated_at' => date('Y-m-d H:m:i')
                );
                // print_r($data);die;
                $this->load->model('Login_model');
                $res = $this->Login_model->update_with_image_supervisor($data);
                if ($res == true) {
                    $this->session->set_flashdata('message', 'Supervisor Update Successfully');
                    redirect('supervisor_list');
                }
                else 
                {
                    $this->session->set_flashdata('message', 'Some Error');
                    redirect('supervisor_list');
                }
            }
       
    }

    public function supervisor_password($id)
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
         $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['supervisor_password'] = $this->Login_model->supervisor_password($id);
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $this->load->view('admin/supervisor_password',$data);
        
    }
    public function supervisor_update()
    {
        $id     = $this->input->post('id', TRUE);
        $password     = md5($this->input->post('password', TRUE));
            
        $data = array(
            'password' =>$password,
            'id' =>$id
            
        );
        $this->load->model('Login_model');
        $result   = $this->Login_model->supervisor_password_update($data);

        if (!empty($result)) 
        {
            $this->session->set_flashdata('message', 'Supervisor Password Update Successfully');
            redirect(base_url()."supervisor_password/".$id);
        } 
        else 
        {
            $this->session->set_flashdata('message', 'Some Error');
            redirect(base_url()."supervisor_password/".$id);
        }
       
    }

    public function action()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Name", "Email", "Phone","Country_code","Role","Created at","Update at");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $supervisor_data = $this->Login_model->supervisor_list();
          $excel_row = 2;

          foreach($supervisor_data as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['email']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['phone']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['country_code']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['role']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['create_at']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['updated_at']);

     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="supervisor_list.xls"');
          $object_writer->save('php://output');
    }

    public function sales_cash()
    {
       $this->load->model('Login_model');
       $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
       $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
       $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
       $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
       $data['sales_cash'] = $this->Login_model->sales_cash();
       $this->load->view('admin/sales_cash',$data);
    }

    public function sales_cash_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness User Name", "Date", "Amount","Payment Type","Sales Purchases","Name","Item List","Created at","Update at");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $sales_cash_export = $this->Login_model->sales_cash();
          $excel_row = 2;

          foreach($sales_cash_export as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['bussiness_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['amount']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['payment_type']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['sales_purchases']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['item_list']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['created_at']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['updated_at']);

     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="sales_cash.xls"');
          $object_writer->save('php://output');
    }

    public function sales_credit()
    {
       $this->load->model('Login_model');
       $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
       $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
       $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
       $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
       $data['sales_credit'] = $this->Login_model->sales_credit();
       $this->load->view('admin/sales_credit',$data);
    }
    public function sales_credit_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness User Name", "Date", "Amount","Payment Type","Sales Purchases","Name","Phone","Id No","Item List","Created at","Update at");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $sales_credit = $this->Login_model->sales_credit();
          $excel_row = 2;

          foreach($sales_credit as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['bussiness_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['amount']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['payment_type']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['sales_purchases']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['phone']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['id_no']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['item_list']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['created_at']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['updated_at']);

     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="sales_credit.xls"');
          $object_writer->save('php://output');
    }

    public function purchase_cash()
    {
       $this->load->model('Login_model');
       $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
       $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
       $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
       $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
       $data['purchase_cash'] = $this->Login_model->purchase_cash();
       $this->load->view('admin/purchase_cash',$data);
    }
    public function purchase_cash_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness User Name", "Date", "Amount","Payment Type","Sales Purchases","Name","Item List","Created at","Update at");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $purchase_cash = $this->Login_model->purchase_cash();
          $excel_row = 2;

          foreach($purchase_cash as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['bussiness_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['amount']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['payment_type']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['sales_purchases']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['item_list']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['created_at']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['updated_at']);

     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="purchase_cash.xls"');
          $object_writer->save('php://output');
    }

    public function purchase_credit()
    {
       $this->load->model('Login_model');
       $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
       $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
       $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
       $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
       $data['purchase_credit'] = $this->Login_model->purchase_credit();
       $this->load->view('admin/purchase_credit',$data);
    }
    public function purchase_credit_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness User Name", "Date", "Amount","Payment Type","Sales Purchases","Name","Phone","Id No","Item List","Created at","Update at");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $purchase_credit = $this->Login_model->purchase_credit();
          $excel_row = 2;

          foreach($purchase_credit as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['bussiness_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['amount']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['payment_type']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['sales_purchases']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['phone']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['id_no']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['item_list']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['created_at']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['updated_at']);

     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="purchase_credit.xls"');
          $object_writer->save('php://output');
    }

    public function user()
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $this->load->view('admin/user',$data);
    }
    public function add_user()
    {
       
       $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
       $this->form_validation->set_rules('bussiness_name', 'Bussiness Name', 'trim|required');
       $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');
       $this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_unique[business_register.phone]');
       $this->form_validation->set_rules('location', 'Shop Location', 'trim|required');
       $this->form_validation->set_rules('no_of_employees', 'Number of Employees', 'trim|required');
       $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
       $this->form_validation->set_rules('image', 'Image', 'callback_file_selected_image');

      if ($this->form_validation->run() == True) 
       {
            $this->load->helper('string');
            $this->load->model('Login_model');
            $this->load->library('cloudinarylib');
            $bussiness_name     = html_escape(trim($this->input->post('bussiness_name', TRUE)));
            $owner_name     = html_escape(trim($this->input->post('owner_name', TRUE)));
            $phone     = html_escape(trim($this->input->post('phone', TRUE)));
            $country_code     = html_escape(trim($this->input->post('country_code', TRUE)));
            $business_registered     = html_escape(trim($this->input->post('business_registered', TRUE)));
            $registation_no     = html_escape(trim($this->input->post('registation_no', TRUE)));
            $gender     = html_escape(trim($this->input->post('gender', TRUE)));
            $location     = html_escape(trim($this->input->post('location', TRUE)));
            $activities     = html_escape(trim($this->input->post('activities', TRUE)));
            $date     = html_escape(trim($this->input->post('date', TRUE)));
            $no_of_employees     = html_escape(trim($this->input->post('no_of_employees', TRUE)));
            $branches     = html_escape(trim($this->input->post('branches', TRUE)));
            $name     = html_escape(trim($this->input->post('name', TRUE)));
            $financial_institution     = html_escape(trim($this->input->post('financial_institution', TRUE)));
            $any_loans     = html_escape(trim($this->input->post('any_loans', TRUE)));
            $loan_amount     = html_escape(trim($this->input->post('loan_amount', TRUE)));
            $loan_purpose     = html_escape(trim($this->input->post('loan_purpose', TRUE)));
            $role     = html_escape(trim($this->input->post('role', TRUE)));
            $receive_payments     = $this->input->post('receive_payments', TRUE);
            $make_payments     = $this->input->post('make_payments', TRUE);
            $busniness_funding     = $this->input->post('busniness_funding', TRUE);
            $supervisor_id     = $this->input->post('supervisor_id', TRUE);
            $core_business     = $this->input->post('core_business', TRUE);
            $password = random_string('alnum',7);
            $filename = $_FILES['image']['name'];
			$tmp_name = $_FILES['image']['tmp_name'];
            $result['upload_image'] = \Cloudinary\Uploader::upload($tmp_name);

            $str ="";
            for($i=0;$i<count($receive_payments);$i++){
            $str.= $receive_payments[$i].',';
            }
            $receive_payments = rtrim($str,',');

            $str1 ="";
            for($j=0;$j<count($make_payments);$j++){
            $str1.= $make_payments[$j].',';
            }
            $make_payments = rtrim($str1,',');

            $str2 ="";
            for($k=0;$k<count($busniness_funding);$k++){
            $str2.= $busniness_funding[$k].',';
            }
            $busniness_funding = rtrim($str2,',');

            
            
                
            $data = array(
                
                'business_name' =>$bussiness_name,
                'owner_name' => $owner_name,
                'phone' => $phone,
                'country_code' => $country_code,
                'business_registered' => $business_registered,
                'registation_no' => $registation_no,
                'gender' => $gender,
                'location' => $location,
                'activities' => $activities,
                'business_date' => $date,
                'no_of_employees' => $no_of_employees,
                'branches' => $branches,
                'name' => $name,
                'financial_institution' => $financial_institution,
                'any_loan' => $any_loans,
                'loan_amount' => $loan_amount,
                'loan_purpose' => $loan_purpose,
                'role' => $role,
                'password' => $password,
                'receive_payments' => $receive_payments,
                'make_payments' => $make_payments,
                'busniness_funding' => $busniness_funding,
                'supervisor_id' => $supervisor_id,
                'core_business' => $core_business,
                'image' => $result['upload_image']['url'],
                'public_id' => $result['upload_image']['public_id'],
                'updated_at' => date('Y-m-d H:m:i')
                
            );
        //   print_r($data);die;
            $result   = $this->Login_model->add_user($data);

            if (!empty($result)) 
            {
                $this->session->set_flashdata('message', 'Bussiness Add Successfully');
                redirect('user');
            } 
            else 
            {
                $this->session->set_flashdata('message', 'Some Error');
                $this->load->view('user');
            }
        } 
        else 
        {
            $this->load->model('Login_model');
            $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
            $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
            $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
            $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
            $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
            $this->load->view('admin/user',$data);
        }

        
    }
    public function user_list()
    {
        $this->load->library('pagination');
        $this->load->model('Login_model');
        $config['base_url'] = base_url('user_list');
        $config['total_rows'] = $this->Login_model->num_rows();
        $config['per_page'] = 10;
        $config['use_page_numbers'] = FALSE;
        $this->pagination->initialize($config);
        $key = $this->input->get('keyword');
		
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['user_list'] = $this->Login_model->user_list($key,$config['per_page'], $this->uri->segment(2));
        $this->load->view('admin/user_list',$data);
    }

    public function assign_user($id)
    {
    //    echo $id;die;
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['business_id'] = $this->Login_model->business_id($id);
       
        $this->load->view('admin/assign_user',$data);
    }
    public function update_assign_user()
    {
       
        $id     = $this->input->post('id', TRUE);
        $present_supervisor_id    = $this->input->post('present_supervisor_id', TRUE);
       
        $data = array(
            'user_id' => $_POST['id'],
            'present_supervisor_id' => $_POST['present_supervisor_id'],
            'past_supervisor_id' => $_POST['supervisor_id']
        );
        $this->load->model('Login_model');
        $find_user = $this->Login_model->find_user($user_id);
        $res = $this->Login_model->update_assign_users_single($data);
       $res = $this->Login_model->insert_alldata_single($data);
        if ($res == true) {
            $this->session->set_flashdata('message', 'Assign Bussiness Update Successfully');
            redirect(base_url()."assign_user/".$id);
        }
        else 
        {
            $this->session->set_flashdata('message', 'Some Error');
            redirect(base_url()."assign_user/".$id);
        }
    }

    public function user_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness Name", "Name", "Phone","Country Code","Email","Location","Owner Name","Business Registered","Registation No","Gender","Core Business","Activities","Business Date","Branches","Financial Institution","Any Loan","Loan Amount","Loan Purpose","Receive Payments","Make Payments","Busniness Funding","Supervisor Name","Role");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $user_list = $this->Login_model->user_list();
          $excel_row = 2;

          foreach($user_list as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['business_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['phone']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['country_code']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['email']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['location']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['owner_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['business_registered']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['registation_no']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['gender']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['core_business']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['activities']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['business_date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['branches']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['financial_institution']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['any_loan']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['loan_amount']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['loan_purpose']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['receive_payments']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row['make_payments']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row['busniness_funding']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row['superwiser_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row['role']);
         
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="user.xls"');
          $object_writer->save('php://output');
    }

    public function Delete_user($id)
    {
        
        $status = "0";
        $this->load->model('Login_model');
        $id = $this->uri->segment(3);
        $this->Login_model->Delete_user($id,$status);
        redirect('user_list');
    }

    public function Delete_supervisor($id)
    {
        
        $status = "0";
        $this->load->model('Login_model');
        $id = $this->uri->segment(3);
        $this->Login_model->Delete_supervisor($id,$status);
        redirect('supervisor_list');
    }

    public function trainings()
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['user_lists'] = $this->Login_model->user_lists();
        $this->load->view('admin/add_training',$data);
    }
    public function add_training()
    {
        $this->form_validation->set_error_delimiters('<div class="err">', '</div>');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('video', 'video', 'callback_file_selected_video');

        if ($this->form_validation->run() == True) 
        {
            $video=$_FILES['video']['name'];
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $role=$this->input->post('role');
            $supervisor_id = $this->input->post('supervisor_id');
            $user_id = $this->input->post('user_id');
            $filename=$this->input->post('video');
            if(is_uploaded_file($_FILES['video']['tmp_name'])) 
            {
                $filename = $_FILES['video']['name'];
                $config['upload_path'] = './upload/';
                $config['allowed_types'] = 'mp4|3gp';
                $config['max_size']='';
                $config['max_width']='200000000';
                $config['max_height']='1000000000000';

                $this->load->library('upload', $config);
                $img = $this->upload->do_upload('video');

                if($user_id == '')
                {
                    $user_id ='NULL';
                  
                }
                if($supervisor_id == '')
                {
                    $supervisor_id ='NULL';
                   
                }
                $data = array(
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'role' => $_POST['role'],
                    'supervisor_id' => $supervisor_id,
                    'user_id' => $user_id,
                    'video' => $filename,
                    'updated_at' => date('Y-m-d H:m:i')
                );
             
                $this->load->model('Login_model');
                $result   = $this->Login_model->add_training($data);
                if (!empty($result)) 
                {
                    $this->session->set_flashdata('message', 'Add Training Successfully');
                    redirect('add_training');
                } 
                else 
                {
                    $this->session->set_flashdata('message', 'Some Error');
                    $this->load->view('add_training');
                }
             }
        }
        else
        {
            $this->load->model('Login_model');
            $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
            $data['user_lists'] = $this->Login_model->user_lists();
            $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
            $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
            $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
            $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
            $this->load->view('admin/add_training',$data); 
        }
    }
    

    function file_selected_video(){

        $this->form_validation->set_message('file_selected_video', 'Please select video file.');
        if (empty($_FILES['video']['name'])) {
                return false;
            }else{
                return true;
            }
    }   
    public function training_list()
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['training_list'] = $this->Login_model->training_list();
        $this->load->view('admin/training_list',$data);
    }
    public function supervisor_user_list($id)
    {
       
        $this->load->model('Login_model');
        $data['id'] = $id;
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_user_list'] = $this->Login_model->supervisor_user_list($id);
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['business_id'] = $this->Login_model->business_id($id);
        $this->load->view('admin/supervisor_user_list',$data);
    }
    public function assign_users($id)
    {
       
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['business_id'] = $this->Login_model->business_id($id);
        $this->load->view('admin/assign_users',$data);
    }
    public function assign_users_alldata()
    {
       
        echo "1";
    }
    public function update_assign_users()
    {
        // print_r($_POST);die;
        $user_id = $_POST['user_id'];
        $array2 = explode(',', $user_id);
        $id     = $_POST['supervisor'];
        for($i=0;$i<count($array2);$i++)
        {
            $user_id = $array2[$i];
           $data = array(
                'present_supervisor_id' => $_POST['supervisor_id'],
                'past_supervisor_id' => $_POST['supervisor'],
                'user_id'=>$array2[$i]
            );
             
        
            $this->load->model('Login_model');
            $find_user = $this->Login_model->find_user($user_id);
             $res = $this->Login_model->update_assign_users_alldata($data);
            $res = $this->Login_model->insert_alldata($data);
        
          }
       
           if ($res == true) {
            $this->session->set_flashdata('message', 'Assign Bussiness Update Successfully');
            redirect(base_url()."user_list");
            }
            else 
            {
                $this->session->set_flashdata('message', 'Some Error');
                redirect(base_url()."user_list");
            }
     

        // $user_id = $_POST['user_id'];
        // $array2 = explode(',', $user_id);
        // $id     = $_POST['supervisor'];
        // for($i=0;$i<count($array2);$i++)
        // {
          
        //     $data = array(
        //         'assign_supervisor_id' => $_POST['supervisor_id'],
        //         'supervisor_id'=>$array2[$i]
        //     ); 
        //     $this->load->model('Login_model');
        //     $res = $this->Login_model->update_assign_users_alldata($data);
            
        // }
        // if ($res == true) {
        //     $this->session->set_flashdata('message', 'Assign User Update Successfully');
        //     redirect(base_url()."supervisor_user_list/".$id);
        // }
        // else 
        // {
        //     $this->session->set_flashdata('message', 'Some Error');
        //     redirect(base_url()."supervisor_user_list/".$id);
        // }


      


        // $id     = $this->input->post('id', TRUE);
        // $data = array(
        //     'id' => $_POST['id'],
        //     'supervisor_id' => $_POST['supervisor_id']
        // );
        // // print_r($data);die;
        // $this->load->model('Login_model');
        // $res = $this->Login_model->update_assign_user($data);
        // if ($res == true) {
        //     $this->session->set_flashdata('message', 'Assign User Update Successfully');
        //     redirect(base_url()."assign_users/".$id);
        // }
        // else 
        // {
        //     $this->session->set_flashdata('message', 'Some Error');
        //     redirect(base_url()."assign_users/".$id);
        // }
    }
    public function view_training($id)
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
        $data['user_lists'] = $this->Login_model->user_lists();
        $data['view_training'] = $this->Login_model->view_training($id);
        $this->load->view('admin/view_training',$data);
        
    }

    public function update_training()
    {

           
            if ($_FILES['video']['tmp_name'] == "") {
                
                $data = array(
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'role' => $_POST['role'],
                    'supervisor_id' => $_POST['supervisor_id'],
                    'user_id' => $_POST['user_id'],
                    'updated_at' => date('Y-m-d H:m:i')

                    
                );
                // var_dump($data);die;
                $this->load->model('Login_model');
                $this->Login_model->update_with_out_image_training($data);
                $this->session->set_flashdata('message', 'Training Update Successfully');
                redirect('training_list');
                
            } else {

                $video=$_FILES['video']['name'];
              
                if(is_uploaded_file($_FILES['video']['tmp_name'])) 
                {
                    $filename = $_FILES['video']['name'];
                    $config['upload_path'] = './upload/';
                    $config['allowed_types'] = 'mp4|3gp';
                    $config['max_size']='';
                    $config['max_width']='200000000';
                    $config['max_height']='1000000000000';
    
                    $this->load->library('upload', $config);
                    $img = $this->upload->do_upload('video');
                
                $data = array(
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'role' => $_POST['role'],
                    'supervisor_id' => $_POST['supervisor_id'],
                    'user_id' => $_POST['user_id'],
                    'video' => $filename,
                    'updated_at' => date('Y-m-d H:m:i')
                );
                // print_r($data);die;
                $this->load->model('Login_model');
                $res = $this->Login_model->update_with_image_training($data);
                if ($res == true) {
                    $this->session->set_flashdata('message', 'Training Update Successfully');
                    redirect('training_list');
                }
                else 
                {
                    $this->session->set_flashdata('message', 'Some Error');
                    redirect('training_list');
                }
            }
        }
       
    }

    public function Delete_training($id)
    {
        $this->load->model('Login_model');
        $id = $this->uri->segment(3);
        $this->Login_model->Delete_training($id);
        redirect('training_list');
    }

    public function bussiness_visit_list()
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['bussiness_visit_list'] = $this->Login_model->bussiness_visit_list();
        $this->load->view('admin/bussiness_visit_list',$data);
    }

    public function bussiness_visit_export()
    {
     
        $this->load->library("excel");
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("Id", "Bussiness Name", "Current Date", "comment","Bussiness Location","Latitude","Longitude","Stock","Busy Shop","Supervisor Name");
        $column = 0;

          foreach($table_columns as $field)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
           $column++;
          }
          $this->load->model('Login_model');
          $bussiness_visit_list = $this->Login_model->bussiness_visit_list();
          $excel_row = 2;

          foreach($bussiness_visit_list as $row)
          {
           $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['id']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['business_name']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['current_date']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['comment']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['bussiness_location']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['latitude']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['longitude']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['stock']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['busy_shop']);
           $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['name']);


     
           $excel_row++;
          }

          $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="bussiness_visit.xls"');
          $object_writer->save('php://output');
    }
    public function bussiness_status($id)
    {
       $status = 'true';
       $this->load->model('Login_model');
       $data['bussiness_visit_status'] = $this->Login_model->bussiness_visit_status($id,$status);
       $this->load->view('admin/bussiness_visit_list',$data);
       redirect('bussiness_visit_list');

    }

    public function bussiness_register_status($id)
    {
       $status = 'true';
      
       $this->load->library('pagination');
       $this->load->model('Login_model');
       $config['base_url'] = base_url('user_list');
       $config['total_rows'] = $this->Login_model->num_rows();
       $config['per_page'] = 10;
       $config['use_page_numbers'] = FALSE;
       $this->pagination->initialize($config);
       $key = $this->input->get('keyword');

       $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
       $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
       $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
       $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
       $data['supervisor_lists'] = $this->Login_model->supervisor_list_status();
       $data['user_list'] = $this->Login_model->user_list($key,$config['per_page'], $this->uri->segment(2));
       $data['bussiness_register_status'] = $this->Login_model->bussiness_register_status($id,$status);
       $this->load->view('admin/user_list',$data);
       redirect('user_list');

    }

    public function assign_supervisor($id)
    {
       
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_list_data'] = $this->Login_model->supervisor_list_data();
        $data['business_ids'] = $this->Login_model->business_ids($id);
        $this->load->view('admin/assign_supervisor',$data);
    }

    public function update_assign_supervisor()
    {
        $id     = $this->input->post('id', TRUE);
        $data = array(
            'assign_id' => $_POST['id'],
            'supervisor_id' => $_POST['supervisor_id'],
            'updated_at' => date('Y-m-d H:m:i')
        );
        $this->load->model('Login_model');
        $record_count = $this->Login_model->record_count($id);
        // echo $record_count;die;
        if($record_count > 0 )
        {
            $this->load->model('Login_model');
            $this->Login_model->update_assign_supervisor($data);
            $this->session->set_flashdata('message', 'Assign Supervisor Add Successfully');
            redirect(base_url()."assign_supervisor/".$id);
        }
        else 
        {
            
            $this->load->model('Login_model');
            $this->Login_model->update_assign_supervisors($data);
            $this->session->set_flashdata('message', 'Assign Supervisor update Successfully');
            redirect(base_url()."assign_supervisor/".$id);
        }
    }

    public function supervisor_history($id)
    {
        $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_list_data'] = $this->Login_model->supervisor_list_data();
        $data['supervisor_history'] = $this->Login_model->supervisor_history($id);
        $this->load->view('admin/supervisor_history',$data);
    }

	public function privacy_policy()
    {
    	 $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_list_data'] = $this->Login_model->supervisor_list_data();
    	$data['privacy_policy'] = $this->Login_model->privacy_policy();
    	$this->load->view('admin/privacy_policy',$data);
    }
	public function add_privacy_policy()
    {
    	$id     = $this->input->post('id', TRUE);
        $title     = $this->input->post('title', TRUE);
    	$description     = $this->input->post('description', TRUE);
            
        $data = array(
            'title' =>$title,
            'id' =>$id,
        	'description'=>$description
            
        );
    	
        $this->load->model('Login_model');
        $result   = $this->Login_model->add_privacy_policy($data);

        if (!empty($result)) 
        {
            $this->session->set_flashdata('message', 'Privacy Policy  Add Successfully');
            redirect('privacy_policy');
        } 
        else 
        {
            $this->session->set_flashdata('message', 'Some Error');
            redirect('privacy_policy');
        }
    }
    
	public function terms_conditions()
    {
    	 $this->load->model('Login_model');
        $data['count_bussiness_visit'] = $this->Login_model->count_bussiness_visit();
        $data['bussiness_visit_lists'] = $this->Login_model->bussiness_visit_lists();
        $data['count_bussiness_register'] = $this->Login_model->count_bussiness_register();
        $data['bussiness_registers_lists'] = $this->Login_model->bussiness_registers_lists();
        $data['supervisor_list_data'] = $this->Login_model->supervisor_list_data();
    	$data['terms_conditions'] = $this->Login_model->terms_conditions();
    	$this->load->view('admin/terms_conditions',$data);
    }
	public function add_terms_conditions()
    {
    	$id     = $this->input->post('id', TRUE);
        $title     = $this->input->post('title', TRUE);
    	$description     = $this->input->post('description', TRUE);
            
        $data = array(
            'title' =>$title,
            'id' =>$id,
        	'description'=>$description
            
        );
    	
        $this->load->model('Login_model');
        $result   = $this->Login_model->add_terms_conditions($data);

        if (!empty($result)) 
        {
            $this->session->set_flashdata('message', 'Terms Conditions  Add Successfully');
            redirect('terms_conditions');
        } 
        else 
        {
            $this->session->set_flashdata('message', 'Some Error');
            redirect('terms_conditions');
        }
    }

	public function Privacy_Policys()
    {
    	$this->load->model('Login_model');
    	$data['privacy_policy'] = $this->Login_model->privacy_policy();
    	$this->load->view('admin/Privacy_Policy',$data);
    }
	public function Terms_Conditionss()
    {
    	$this->load->model('Login_model');
    	$data['terms_conditions'] = $this->Login_model->terms_conditions();
    	$this->load->view('admin/Terms_Conditions',$data);
    }

   



    
 

}
