<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		 $this->load->model('users_model');
		 $this->load->model('booking_model');
		 $this->load->model('common_model');

		
	}
		
	public function index()
	{
		//$this->load->library('sociallogin');
        //$this->sociallogin->load('sociallogin/src/Social.php');
		// if user already logged in then redirect the user to dashboard page
		
		if(is_user_active('', FALSE))
		{
			redirect('dashboard');
		}
				
		$data['base_url'] = base_url();
		$data['view_file']  = "login";

		$this->template->load_admin_login_template($data);
	}
	public function forgotpassword_details(){
 		$data['base_url'] = base_url();
		$this->load->view('/frontend/pages/modal_reset_password',$data);
 	}
	
	// perform login process
    public function processlogin()
    {	


		$email_id = $this->input->post('email_id');
		$ad_pwd = $this->input->post('confirm_password1');

	    // authenticate user
 	    $result = getUserBasicDetails(array('email'=>$email_id,'password'=>sha1($ad_pwd)),'',array('image'=>FALSE));

     if($result != FALSE){

						if($result->status == '1'){	

							if($result->site_admin == '1') {

								$login_date = $result->login_date;
					$login_date = date('Y-m-d',strtotime($login_date));
					$user_id = $result->id_user_master;
					$update_data = array('last_login_time'=>getCurrentDateTime(),'otp'=>"");
					$current_date = date('Y-m-d');
					$time_stamp = time();					
						$ad_data = array(
							'session_id'=>session_id(),
							'user_id'=>$result->id_user_master,
							'user_type'=>$result->user_type,
							'user_image'=>$result->profile_image,
							'user_phone'=>$result->phone,
							'user_name'=>$result->first_name.' '.$result->last_name,
							'user_email'=>strtolower($result->email),
							'user_created'=>$result->created_on,
							// 'stripe_connect'=>$result->stripe_accountid,
							'is_site_admin'=>$result->site_admin
						);
					
					// save user data in session
					$this->session->set_userdata($ad_data);
					$this->usertracking->track_this("Login");
					// update last login time
					$this->common_model->update('user_master',$update_data, array('id_user_master'=>$user_id));
					
					if($result->user_type == 'garage')
					{
						//redirect('dashboard');
						//echo "fffffffff";
						// redirect(BASE_URL.'/movers');

						echo 2;
					}

					else if($result->user_type == 'customer')
					{
						//redirect('dashboard');
						//echo "fffffffff";
						// redirect(BASE_URL.'/movers');

						echo 3;
					}
					else
					{
						// redirect('dashboard');

						echo 4;
					}

							}
							
							 else {

									echo 0;


							}

						}
						/*kalai*/
						if($result->site_admin == '2' && $result->status == '0')
						{
								echo 5;
						}
						if($result->site_admin=='3' && $result->status == '0'){
							echo 6;
						}
						/*kalai*/

	 		} else {


	 			echo 1;
	 		}

	}
	
	public function admin_profile_password()
	{
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$data['base_url'] = base_url();
		$data['view_file']  = "backend_pages/admin_profile_password";
		$data['current_menu']  = "profile password edit";
		// $data['user_id'] = $user_id;
      
		$this->template->load_backend_template($data);
	}

	public function admin_reset_password()
	{ 
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		

		$data['current_password'] = sha1($this->input->post('current_password'));
		$data['new_password'] = sha1($this->input->post('new_password'));
		$data['confirm_password'] = sha1($this->input->post('confirm_password'));
		$user_id = $this->input->post('user_id');
		$user_type = $this->input->post('user_type');


		$current_password1 = $this->db->query("SELECT password,username,email FROM user_master where id_user_master = '".$user_id."' and user_type = '".$user_type."'")->row();
		 $current_password =$current_password1->password; 
		 $user_name = $current_password1->username;
		 $email_id = $current_password1->email;
		 $new_password = $this->input->post('confirm_password');
		if(($current_password == $data['current_password']) && ($data['new_password'] == $data['confirm_password'])){
			$this->db->where('id_user_master',$user_id);
			$this->db->update('user_master',array('password' => $data['confirm_password']));
			$this->users_model->send_password_updatemail($user_name,$new_password,$email_id);
			echo 1;
		}
		else{
			echo 0;
		}
		
		
	}

	public function passwordreset_request($userid=''){
		$mailid = $this->db->query("SELECT email FROM user_master where id_user_master = '".$userid."'")->row();
		$data['mailid']	= $mailid->email;
		$data['base_url'] = base_url();
		$data['view_file']  = "pages/passwordreset_request";
		$data['current_menu']  = "profile password update";
		// $data['user_id'] = $user_id;
      
		$this->template->load_frontend_template($data);
	}
	// kalai
	public function customer_password_update($userid=''){
		$mailid = $this->db->query("SELECT email FROM user_master where id_user_master = '".$userid."'")->row();
		$data['customer_id'] = $userid;

		$data['mailid']	= $mailid->email;
		$data['base_url'] = base_url();
		$data['view_file']  = "pages/customer_password_update";
		// $data['current_menu']  = "profile password update";
		// $data['user_id'] = $user_id;
      
		$this->template->load_frontend_template($data);
	}

	public function password_update_customer(){
		

		$customer_id = $this->input->post('customer_id');
		$mailid = $this->input->post('email_id');
		$newpassword = $this->input->post('newpassword');
		$confirmpassword = $this->input->post('confirm_password1');
		$query = $this->db->get_where('user_master' , array('email' => $mailid));
		$customer_name = $this->db->query("SELECT username FROM user_master where id_user_master = '".$customer_id."'")->row();
		$username = $customer_name->username;

		 if (($query->num_rows() > 0 ) && ($newpassword == $confirmpassword))
        {  

        	$this->db->where('email' , $mailid);
            $this->db->update('user_master' , array('password' => sha1($confirmpassword)));
            $this->booking_model->password_send_customer_mail($username,$mailid,$confirmpassword);
            echo 1;
        }
        else{
        	echo 0;
        }
	}
	public function users_reset_password(){
		// print_r($_POST);
		$mailid = $this->input->post('mail_id');
		$newpassword = $this->input->post('newpassword');
		$confirmpassword = $this->input->post('confirmpassword');
		$query = $this->db->get_where('user_master' , array('email' => $mailid));
		 
		 if (($query->num_rows() > 0 ) && ($newpassword == $confirmpassword))
        {  

        	$this->db->where('email' , $mailid);
            $this->db->update('user_master' , array('password' => sha1($confirmpassword)));
            echo 1;
        }
        else{
        	echo 0;
        }

	}
	
	public function forgotpassword(){
 
		 $mailid = $this->input->post('mailid');
		 $query = $this->db->get_where('user_master' , array('email' => $mailid));
		 // print_r($query->num_rows());
 		 if ($query->num_rows() > 0)
        {

        	$mail_details = $this->db->query("SELECT * from welcome_mail where mail_type = 'password'")->row();
			$mail_subject = $mail_details->mail_subject;
			$mail_content = $mail_details->mail_content;

			$user_idss = $this->db->query("SELECT * from user_master where email= '".$mailid."'")->row();
            $user_id = $user_idss->id_user_master;
            $first_name = $user_idss->first_name;
            $last_name =$user_idss->last_name;
            $username = lcfirst($first_name.' '.$last_name);
            $links = '<a href="'.BASE_URL.'/login/passwordreset_request/'.$user_id.'">Update Here</a>';

 
			$mail_subject = str_replace("{{name}}",$username,$mail_subject);
			$mail_content = str_replace("{{name}}",$username,$mail_content);

			$mail_subject = str_replace("{{email}}",$mailid,$mail_subject);
			$mail_content = str_replace("{{email}}",$mailid,$mail_content);

			$mail_subject = str_replace("{{resetpasswordlink}}",$links,$mail_subject);
			$mail_content = str_replace("{{resetpasswordlink}}",$links,$mail_content);
            
            
             $result = $this->users_model->password_reset_email($mailid,$user_id,$mail_subject,$mail_content);
            if($result==1){
            	echo 0;
            }
            else{
            	echo 1;
            }
           
      
        }
        else{
        	echo 2;
        }
    
                    

	}
	public function second_step_verification(){
		
		if ($this->input->is_ajax_request()){
			
				$secret = $this->input->post('secert_key');
				//$this->load->library('GoogleAuthenticator');
				
				//$oneCode = $this->input->post('coded_key');
				$result = getUserBasicDetails(array("id_user_master"=>$this->input->post('code')),'',array('image'=>FALSE));
				//$checkResult = $this->googleauthenticator->verifyCode($secret, $oneCode, 10); // 2 = 2*30sec clock tolerance
				$code_verify = $result->otp;
				
				
				if ($code_verify == $secret) {
						$time_stamp = time();					
						$ad_data = array(
							'session_id'=>session_id(),
							'user_id'=>$result->id_user_master,
							'user_type'=>$result->user_type,
							'user_name'=>$result->first_name.' '.$result->last_name,
							'user_email'=>strtolower($result->email),
							'user_created'=>$result->created_on
						);
					
					// save user data in session
					$this->session->set_userdata($ad_data);
					$this->usertracking->track_this("Login");
					
					// update last login time
					$this->users_model->update(array('last_login_time'=>getCurrentDateTime(),'otp'=>""), array('id_user_master'=>$result->id_user_master));
					
					// set login status as success
					echo 'success';					
				} else {
					echo "fail";					
				
				}
		}
	}
	
	// perform logout process
	public function logout()
	{
		// Update logout time
		$this->usertracking->track_this("Logout");
		$this->users_model->update(
			array(
				'last_logout_time'=>getCurrentDateTime()
			),
			array(
				'id_user_master'=>get_active_user_id()
			)
		);		
		$this->destroy_user();
		 redirect('home');
	}
	
	// Destroy all user activity
	private function destroy_user()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('succ_msg', '<p>Logout successfully</p>');
		// redirect($base_url);
	}
	public function check_emailid(){
		if ($this->input->is_ajax_request()){
			
			$type = $this->input->post('type');		
				
			if($type == 'email'){
				$useremail = $this->input->post('rf_emailid');			
				$validate= $this->users_model->getUsers(array('email'=>$useremail));
				//echo $this->db->last_query();
				if($validate){
					echo  'false';
				}else
				{
					echo 'true';
				}
				exit;
			}
		}

	}
	public function check_username(){
		if ($this->input->is_ajax_request()){
			
			$type = $this->input->post('type');		
				
			if($type == 'username'){
				$rf_username = $this->input->post('rf_username');			
				$validate= $this->users_model->getUsers(array('username'=>$rf_username));
				//echo $this->db->last_query();
				if($validate){
					echo  'false';
				}else
				{
					echo 'true';
				}
				exit;
			}
		}

	}
	public function register(){
		$rf_fstname = $this->input->post('rf_fstname');
		$rf_lstname = $this->input->post('rf_lstname');
		$rf_username = $this->input->post('rf_username');
		$rf_emailid = $this->input->post('rf_emailid');
		$rf_password = $this->input->post('rf_password');
		$insert_data = array('username' => $rf_username, 'first_name' => $rf_fstname, 'last_name' => $rf_lstname, 'email' => $rf_emailid, 'password' => sha1($rf_password), 'user_type' =>'user');
		$insert_user = $this->users_model->user_insert($insert_data);
	}
/********************************************/
public function fblogin()
    {
		 

 		$this->load->library('facebook');
		$code = $this->input->get('code');
		
		if (!empty ($code)) {
	 		$fbuser = $this->facebook->get_user();
		if(!empty($fbuser['email']))
			{	
			
			$userdata = $this->users_model->getUser(array('email'=>$fbuser['email']));
			if($userdata) {			
				$data = array('fbtoken'=>$fbuser['id']);
				
				
				$this->session->set_userdata(array(
								'user_id' 	=> $userdata->id_user_master,
								'user_name'=>$userdata->first_name.' '.$userdata->last_name,
								'status'=>$userdata->status,
								'user_email' => $userdata->email
						));
						
				redirect('profile');
			}else{
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
				$password = substr( str_shuffle( $chars ), 0, 8 );
			
				$data = array(
					'first_name'=>$fbuser['name'],
					'email'=> $fbuser['email'], 
					'password'=> MD5($password),
					'status' => 1,
					'created_on'=>date('Y-m-d H:i:s'),
					'fbtoken'=>$fbuser['id']
				);     
				
				$userid = $this->users_model->insertEmployee($data);
				$userdata = $this->users_model->getUser(array('id_user_master'=>$userid));
				$this->session->set_userdata(array(
								'user_id' 	=> $userdata->id_user_master,
								'user_name'=>$userdata->first_name.' '.$userdata->last_name,
								'status'=>$userdata->status,
								'user_email' => $userdata->email
						));
						
						$b_url = base_url();
		 $base_url_logo  = $b_url .'assets/images/logo_mail.jpg';
		 
		 $data_mail = array(
			
			'user_email' => $fbuser['email'],
			'base_url_logo' => $base_url_logo,
			'user_name' => $fbuser['name'],
			'password' => $password
		);
		$this->Employee_Model->sendEmail_log($data_mail);
				redirect('profile');
			}
		}
		
		else{
			$this->session->set_flashdata('login', '<div> <span class="alert-danger">Authentication is wrong. Please verify!</span> </div>');
			redirect('');
			}
	}
		else{
			$this->session->set_flashdata('login', '<div> <span class="alert-danger">Authentication is wrong. Please verify!</span> </div>');
			redirect('');
			}
	}
    
    public function linlogin()
    {
        
        function post_curl($url, $param = "")
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if ($param != "")
                curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($ch);
            curl_close($ch);
            
            return $result;
        }
        
        $config['Client_ID']       = '81ocqy5kg5rxdi';
        $config['Client_Secret']    = '6OGFWdzNR9tiiLFr';
        $config['callback_url']  = 'http://stallioni.in/fixmycar/login/linlogin' ; //'http://stallioni.net/B274/login/linlogin/';
    if(isset($_GET['code'])) // get code after authorization
    {
	    $url = 'https://www.linkedin.com/uas/oauth2/accessToken'; 
	    $param = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];

	    $return = (json_decode(post_curl($url,$param),true)); // Request for access token
	   
	      if(isset($return['error'])) // if invalid output error
	    {
	       echo $content = 'Some error occured<br><br>'.$return['error_description'].'<br><br>Please Try again.';
	    }
    else // token received successfully
    {
       $url = 'https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token='.$return['access_token'];
       $user = json_decode(post_curl($url)); // Request user information on received token
       echo '<pre>';print_r($user );exit;
       
       $userdata = $this->Employee_Model->getUser(array('email'=>$user->emailAddress));
			if($userdata) {			
								
				
				$this->session->set_userdata(array(
								'user_id' 	=> $userdata->id_user_master,
								'user_name'=>$userdata->first_name.' '.$userdata->last_name,
								'status'=>$userdata->status,
								'user_email' => $userdata->email
						));
				redirect('profile');
			}else{
   
   
   
     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
				$password = substr( str_shuffle( $chars ), 0, 8 );
     $data = array(
					'first_name'=>$user->firstName,
					'email'=> $user->emailAddress, 
					'password'=> MD5($password),
					'status' => 1,
					'created_on'=>date('Y-m-d H:i:s'),
					 'litoken'=>$user->id
				);     
			 
				$userid = $this->users_model->insertEmployee($data);
				
				$userdata = $this->users_model->getUser(array('id_user_master'=>$userid));
				$this->session->set_userdata(array(
								'user_id' 	=> $userdata->id_user_master,
								'user_name'=>$userdata->first_name.' '.$userdata->last_name,
								'status'=>$userdata->status,
								'user_email' => $userdata->email
						));
						
						$b_url = base_url();
		 $base_url_logo  = $b_url .'assets/images/logo_mail.jpg';
		 
		 $data_mail = array(
			
			'user_email' => $user->emailAddress,
			'base_url_logo' => $base_url_logo,
			'user_name' => $user->firstName,
			'password' => $password
		);
		//$this->Employee_Model->sendEmail_log($data_mail);
				redirect('profile');
				
			}
    }
    
    
}


	
}


}
