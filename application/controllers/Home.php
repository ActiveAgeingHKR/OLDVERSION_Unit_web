<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
              
            
                $data['isMain'] = TRUE;
                $data['mainContent'] = 'frontend/page/main';
		$this->load->view('front_layout',$data);
               
	}
        
        public function mail(){
                ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $to = "ronashmail@gmail.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
    $headers = "From:Lokesh";
    
    var_dump(mail($to,$subject,$message, $headers));
   
        }
}
