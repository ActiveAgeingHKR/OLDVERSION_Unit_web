<?php

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {



        $data1 = array('success' => FALSE, 'msg' => array(), 'server_msg' => FALSE, 'recap' => NULL);
        $data1['recap'] = $this->aauth->generate_recaptcha_field();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run('login') == FALSE) {

            foreach ($_POST as $key => $value) {
                $data1['msg'][$key] = form_error($key);
            }
        } else {


            // user data

            $email = $this->input->post('login_email');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');
            if ($remember == '1') {
                $remember = TRUE;
            } else {
                $remember = FALSE;
            }
            if ($this->aauth->login($email, $password, $remember, $this->aauth->generate_unique_totp_secret())) {
                $data1['success'] = TRUE;
            } else {
                $data1['success'] = FALSE;
                $data1['server_msg'] = $this->aauth->print_errors();
            }
        }
        echo json_encode($data1);
    }

    public function logout() {
        $this->aauth->logout();
        redirect(base_url());
    }

    public function register() {

        $data1 = array('success' => FALSE, 'msg' => array(), 'server_msg' => FALSE);


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run('register') == FALSE) {

            foreach ($_POST as $key => $value) {
                $data1['msg'][$key] = form_error($key);
            }
        } else {
                
                $this->load->model('employeeModel');
                $email = $this->input->post('remail');
                $password = $this->input->post('rpassword');
                $username = $this->input->post('username');



                $register = $this->aauth->create_user($email, $password, $username);
                if ($register != NULL) {
                            
                    $employee = new EmployeeModel();
                    
                    // user variable
                    $gender = $this->input->post('gender');
                    $firstname = $this->input->post('firstname');
                 $lastname = $this->input->post('lastname');

                    $address = $this->input->post('address');
                    $contact = $this->input->post('contact');
                    $dob = $this->input->post('dob');
                    
                    // insert into employees
                     $employee->emp_id = $register;
                    $employee->emp_firstname = $firstname;
                    $employee->emp_lastname = $lastname;
                    $employee->emp_email = $email;
                    $employee->emp_username = $username;
                    $employee->emp_password = $password;
                    $employee->emp_phone = $contact;
                    $employee->managers_man_id = 1;
                 
                    $employee->save(); // save
                     
                    // setting user variable.
                    $this->aauth->set_user_var('gender', $gender, $register);
                    $this->aauth->set_user_var('firstname', $firstname, $register);
                    $this->aauth->set_user_var('lastname', $lastname, $register);
                    $this->aauth->set_user_var('address', $address, $register);
                    $this->aauth->set_user_var('contact', $contact, $register);
                    $this->aauth->set_user_var('dob', $dob, $register);
                

                    $data1['success'] = TRUE;
                    $data1['server_msg'] = "<div class='alert alert-success'> Successfully registered but waiting for admin's approval </div>";
                } else {
                   
                    $data1['success'] = FALSE;
                    $data1['server_msg'] = $this->print_errors();
                    
                }
            
        }

        echo json_encode($data1);
    }

    public function remind() {
        
         if (!$this->input->is_ajax_request()) {  // http request matra acept gareko
            exit('No direct script access allowed');
        }
         $data1 = array('success' => FALSE, 'msg' => array(), 'server_msg' => FALSE);
           
        $this->load->library('form_validation');  // form validation check gareko
         $this->form_validation->set_rules("remail", "Email", "trim|required");
         $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
     
        if ($this->form_validation->run() == FALSE) {

            foreach ($_POST as $key => $value) {
                $data1['msg'][$key] = form_error($key);
            }
        } else {
               $email = $this->input->post('remail');
             if($this->aauth->user_exist_by_email($email)){
                 
                 if($this->aauth->remind_password($email)){
                     $data1['success']= true;
             }
                 
             }
            
                                        
        
        }
        echo json_encode($data1);
    }

    public function verification($id = NULL, $var = NULL) {
        echo $id . $var;
    }

    public function resetpassword($var = NULL) {
        if($var==NULL){
            show_404();
        }
        if($this->aauth->reset_password($var)){
            $data['isMain'] = FALSE;
            $data['message'] = 'Your new password has been sent to your email';
            $data['mainContent'] = 'frontend/page/resetPassword'; //view ko bhitra page>elployeeView bhanne html file cha typ load huncha
            $this->load->view('front_layout', $data); //admin ko lagi layout back_layout
   
            
        }
    }

        //suspend user lai active garne
    public function active() {
        $this->aauth->control(1); // only admin access
        if (!$this->input->is_ajax_request()) {  //http request ho bhane matra yo fuction le kam garcha natra page exit gardincha web browser bata direct kholeo bhane
            exit('No direct script access allowed');
        }
        $id = $this->input->post('id');
        $this->aauth->unban_user($id);
    }
    // user lai suspend garne. yo gare pachi login garna paudeina.
    public function suspend() {
        $this->aauth->control(1);
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $id = $this->input->post('id');
        $this->aauth->ban_user($id);
    }
    
    
    //naya user lai approve garne
       public function approve() {
        $this->aauth->control(1); // 1 - admin group ho. 2- employee 3- default
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        //user bata input leko.
        $id = $this->input->post('id');
        // aaba tyo user lai default group bata hatayera employe group ma haldiny. 
        
        $this->aauth->remove_member($id, 3); // user default bata delete bhayo. 
          $this->aauth->add_member($id, 2); // user employee member ma add bhayo. 
        
            $config = Array(
       'protocol' => 'smtp',
      'smtp_host' => $this->config->item('email_server'),
      'smtp_port' => $this->config->item('email_port'),
      'smtp_user' => $this->config->item('email'), 
      'smtp_pass' => $this->config->item('email_password'), 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from($this->config->item('email'));
          $this->email->to($this->aauth->get_user($id)->email);
          $this->email->subject("Account Verified");
          $this->email->message("Hello ".$this->aauth->get_user_var("firstname",$id)."! Your account has been verified!. \r\n.......................................... \r\n Thank You!\r\n Care Taking Team");
         
            if($this->email->send()){
                echo "Account Approved!";
            }
        
        }
        
        public function cancel(){
            $this->aauth->control(1); // 1 - admin group ho. 2- employee 3- default
        if (!$this->input->is_ajax_request()) {  // http request matra acept gareko
            exit('No direct script access allowed');
        }
        //admin bata user id input leko.
        $id = $this->input->post('id');
    
         $this->aauth->delete_user($id); // user lai clean bold gardeko :P. #delete. yesko namo nisan kehi raha deina.  
       
        
            $config = Array(
       'protocol' => 'smtp',
      'smtp_host' => $this->config->item('email_server'),
      'smtp_port' => $this->config->item('email_port'),
      'smtp_user' => $this->config->item('email'), 
      'smtp_pass' => $this->config->item('email_password'), 
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );


          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from($this->config->item('email'));
          $this->email->to($this->aauth->get_user($id)->email);
          $this->email->subject("Account Canceled!");
          $this->email->message("Hello ".$this->aauth->get_user_var("firstname",$id)."! Sorry.. We are unable to verify your account!. \r\n.......................................... \r\n Thank You!\r\n Care Taking Team");
         
            if($this->email->send()){
                 echo "Account Canceled";
            }
       
        
         }
         
         public function api_login(){
       
        
         if(isset($_POST['username']) AND isset($_POST['password']))
         {
         
         $query = $this->db->where('emp_username', $_POST['username']);
          $query = $this->db->where('emp_password', $_POST['password']);
		$query = $this->db->get('employees');
             $row = $query->row();
             
             
             if ( $query->num_rows() != 0 ) {

			$data = array(
				'id' => $row->emp_id,
				'username' => $row->emp_username,
				'email' => $row->emp_email,
				'loggedin' => TRUE
			);

			$this->session->set_userdata($data);
            echo "true";
         
         }else{
         echo "false";
         }
         
         }else{
         show_404();
         }
         
         }

}
