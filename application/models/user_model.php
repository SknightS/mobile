<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	

   function email_check($email)
   {
   	 $this->db->where('email', $email);
   	 $result=$this->db->get('users');
   	 if($result->num_rows()>0)
   	 {
   	 	 return false;
   	 }
   	 else
   	 {
   	 	 return true;
   	 }
   }

   function insert_data($data)
   { 

    $data_user=array(
      'email'=> $data['email'],
      'password'=> md5($data['password']),
      'status'=>'0'
      );   
     return $this->db->insert('users', $data_user); 

   }

   function user_login($email,$pass)
   {
      $login_data=array(
        'email'=> $email
        
        );
         
       $query=$this->db->get_where('users',$login_data);
       $row=$query->result();
      
       if($query->num_rows()>0)
          return true;
       else
          return false;


   }

}


/* End of file user_model.php */
/* Location: ./application/models/user_model.php */

?>