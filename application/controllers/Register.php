<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		 $this->load->model('users_model');
		 $this->load->model('common_model');
		 $this->load->library('upload');
	}
		
	public function index()
	{
		// if user already logged in then redirect the user to dashboard page
		if(is_user_active('', FALSE))
		{
			redirect('dashboard');
		}
				
		$data['base_url'] = base_url();
		$data['view_file']  = "login";
		$this->template->load_admin_login_template($data);
	}

	public function users(){
        $this->load->library('upload');
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = lcfirst($first_name.' '.$last_name);
		$email_id = $_POST['email_id'];
		$user_type  = $_POST['user_type'];
		$mobile_no = $_POST['mobile_no'];
		$password = $_POST['password1'];
		$address = $_POST['address'];
		$confirm_password = $_POST['confirm_password1'];
        $file_name='';
		if(!empty($_FILES['Profile_image']['name']))
		{


         $file_name = rand();
		 $config['upload_path']   = 'uploads/images/profile_images/'; 
         $config['allowed_types'] = '*'; 
         $config['file_name'] = $file_name;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
	         if ( ! $this->upload->do_upload('Profile_image')) {
	             $error = array('error' => $this->upload->display_errors()); 
	           // echo '<pre>';print_r($error);echo'</pre>';
	         }
 	         else { }
 	         	 $file_name = $config['file_name'].$this->upload->data('file_ext');
 	         	$file_name = 'uploads/images/profile_images/'.$file_name;
          }
         //$file_name = $config['file_name'].$this->upload->data('file_ext');
		$success_status = 0;
		$subject = 'Registration mail';
		$content = 'You have registered successfully.you can login now';
		$check_user = getUseruniqueDetails(array('email' => $email_id));

         if($user_type=='customer')
         {
		    $mail_details = $this->db->query("SELECT * from welcome_mail where mail_type = 'customer'")->row();
			$mail_subject = $mail_details->mail_subject;
			$mail_content = $mail_details->mail_content;
 
			$mail_subject = str_replace("{{customer_name}}",$username,$mail_subject);
			$mail_content = str_replace("{{customer_name}}",$username,$mail_content);

			$mail_subject = str_replace("{{customer_email}}",$email_id,$mail_subject);
			$mail_content = str_replace("{{customer_email}}",$email_id,$mail_content);

			$mail_subject = str_replace("{{customer_password}}",$confirm_password,$mail_subject);
			$mail_content = str_replace("{{customer_password}}",$confirm_password,$mail_content);
        }
        elseif($user_type=='garage')
        {
            $mail_details = $this->db->query("SELECT * from welcome_mail where mail_type = 'garage'")->row();
			$mail_subject = $mail_details->mail_subject;
			$mail_content = $mail_details->mail_content;
 
		    $mail_subject = str_replace("{{garage_name}}",$username,$mail_subject);
			$mail_content = str_replace("{{garage_name}}",$username,$mail_content);

			$mail_subject = str_replace("{{garage_email}}",$email_id,$mail_subject);
			$mail_content = str_replace("{{garage_email}}",$email_id,$mail_content);

			$mail_subject = str_replace("{{garage_password}}",$confirm_password,$mail_subject);
			$mail_content = str_replace("{{garage_password}}",$confirm_password,$mail_content);
        }
		
		if($check_user=='true')
		{
			$insert_data = array('first_name' => $first_name, 'last_name' => $last_name,'username' => $username, 'email' => $email_id, 'phone' => $mobile_no, 'password' => sha1($confirm_password),'address'=>$address, 'user_type' =>$user_type,
				'profile_image'=>$file_name,'created_on' => date('Y-m-d H:i:s'),'status' => 1,'site_admin' => 0);

			$insert_user = $this->common_model->insert('user_master',$insert_data);
            $insert_id = $this->db->insert_id();
			if($insert_user)
			{
				$this->users_model->send_mail_to_loginuser_new($user_type ,$email_id,$mail_subject,$mail_content,$confirm_password);
				$message = "<div class='alert alert-success'>Registered Successfully.</div>";
				$success_status = 1;
			}
			else
			{
				$message = "<div class='alert alert-danger'>Error in customer registration. Please try again.</div>";
				$success_status = 0;
			}
		}
		else
		{
			$message = "<div class='alert alert-danger'>Email id already exits.</div>";
			$success_status = 0;
		}
		echo json_encode(array('message' =>$message,'success_status' => $success_status));
		exit;
	}

	public function usersgarage(){
        $this->load->library('upload');
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = lcfirst($first_name.' '.$last_name);
		$email_id = $_POST['email_id'];
		$user_type  = $_POST['user_type'];
		$mobile_no = $_POST['mobile_no'];
		$password = $_POST['password2'];
		$address = $_POST['address'];
		$confirm_password = $_POST['confirm_password1'];
         $file_name='';
		if(!empty($_FILES['Profile_image']['name']))
		{


         $file_name = rand();
		 $config['upload_path']   = 'uploads/images/profile_images/'; 
         $config['allowed_types'] = '*'; 
         $config['file_name'] = $file_name;
         $this->load->library('upload', $config);
         $this->upload->initialize($config);
	         if ( ! $this->upload->do_upload('Profile_image')) {
	             $error = array('error' => $this->upload->display_errors()); 
	           // echo '<pre>';print_r($error);echo'</pre>';
	         }
 	         else { }
 	         	
          }
        $file_name = $config['file_name'].$this->upload->data('file_ext');
        $file_name = 'uploads/images/profile_images/'.$file_name;
         //$file_name = $config['file_name'].$this->upload->data('file_ext');
		$success_status = 0;
		$subject = 'Registration mail';
		$content = 'You have registered successfully.you can login now';
		$check_user = getUseruniqueDetails(array('email' => $email_id));

         if($user_type=='customer')
         {
		    $mail_details = $this->db->query("SELECT * from welcome_mail where mail_type = 'customer'")->row();
			$mail_subject = $mail_details->mail_subject;
			$mail_content = $mail_details->mail_content;
 
			$mail_subject = str_replace("{{customer_name}}",$username,$mail_subject);
			$mail_content = str_replace("{{customer_name}}",$username,$mail_content);

			$mail_subject = str_replace("{{customer_email}}",$email_id,$mail_subject);
			$mail_content = str_replace("{{customer_email}}",$email_id,$mail_content);

			$mail_subject = str_replace("{{customer_password}}",$confirm_password,$mail_subject);
			$mail_content = str_replace("{{customer_password}}",$confirm_password,$mail_content);
        }
        elseif($user_type=='garage')
        {
            $mail_details = $this->db->query("SELECT * from welcome_mail where mail_type = 'garage'")->row();
			$mail_subject = $mail_details->mail_subject;
			$mail_content = $mail_details->mail_content;
 
			$mail_subject = str_replace("{{garage_name}}",$username,$mail_subject);
			$mail_content = str_replace("{{garage_name}}",$username,$mail_content);

			$mail_subject = str_replace("{{garage_email}}",$email_id,$mail_subject);
			$mail_content = str_replace("{{garage_email}}",$email_id,$mail_content);

			$mail_subject = str_replace("{{garage_password}}",$confirm_password,$mail_subject);
			$mail_content = str_replace("{{garage_password}}",$confirm_password,$mail_content);
        }
		
		if($check_user=='true')
		{
			$insert_data = array('first_name' => $first_name, 'last_name' => $last_name,'username' => $username, 'email' => $email_id, 'phone' => $mobile_no, 'password' => sha1($confirm_password),'address'=>$address, 'user_type' =>$user_type,
				'profile_image'=>$file_name,'created_on' => date('Y-m-d H:i:s'),'status' => 1,'site_admin' => 0);

			$insert_user = $this->common_model->insert('user_master',$insert_data);
            $insert_id = $this->db->insert_id();
			if($insert_user)
			{
				$this->users_model->send_mail_to_loginuser_new($user_type ,$email_id,$mail_subject,$mail_content,$confirm_password);
				$message = "<div class='alert alert-success'>Registered Successfully.</div>";
				$success_status = 1;
			}
			else
			{
				$message = "<div class='alert alert-danger'>Error in customer registration. Please try again.</div>";
				$success_status = 0;
			}
		}
		else
		{
			$message = "<div class='alert alert-danger'>Email id already exits.</div>";
			$success_status = 0;
		}
		echo json_encode(array('message' =>$message,'success_status' => $success_status));
		exit;
	}

}
