<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('insert')) 
{
    function insert($table_name, $insert_data)
    {
        $CI =& get_instance();
        return $CI->db->insert($table_name, $insert_data);
    }
	function sendEmail($to,$from,$subject,$message,$cc=array(),$bcc=array(),$attachments=array()) {
      	// echo "string"; exit();
  if(isset($to) && !empty($subject) && !empty($message)){
    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'wsiankit1625@gmail.com',
      'smtp_pass' => 'Ankit@123',
      'mailtype'  => 'html', 
      'charset'   => 'UTF-8',
    );
    $CI =& get_instance();
    $CI->load->library('email',$config);
    $CI->email->set_newline("\r\n");
    if(isset($from)){
      $from=array(
      'name'=>'Name',
      'email'=>'email'
      );
    }
    $CI->email->from($from['email'], $from['name']); 
    $CI->email->to($to);
    if(isset($cc)){
      $CI->email->cc($cc);
    }
    
    if(isset($bcc)){
      $CI->email->bcc($cc);
    }
    if(count($attachments)>0){
      foreach($attachments as $attachment){
        $CI->email->attach($attachment);
      }
    }
    $CI->email->subject($subject); 
    $CI->email->message($message); 
    $sent=$CI->email->send();
      if(!$sent){
      return $CI->email->print_debugger();
    }else{
      return $sent;
    }
  }
  return false;
}
}