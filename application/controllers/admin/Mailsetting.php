<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Mailsetting extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		 $this->load->model('common_model');
		 $this->load->model('customer_model');
		 $this->load->model('mailsetting_model');
		 $this->load->model('pages_model');

	}

    public function index() {

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "mailsetting";
		$data['current_menu']  = "mailsetting";
		$data['customer_details'] =$this->pages_model->get_pages_details();
		$this->template->load_backend_template($data);
    }
    public function welcomeview()
    {
    	 
    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "emailtemplate/welcomemailview";
		$data['current_menu']  = "mailsetting";
		$param = array('mail_type'=>'customer');
		$paramg = array('mail_type'=>'garage');
 		 $data['customermail'] =$this->mailsetting_model->get_mail_details($param);
 		 $data['garagemail'] =$this->mailsetting_model->get_mail_details($paramg);
 		// print_R($data['customermail']);exit;
		 $this->template->load_backend_template($data);
		
     }
     public function passwordview()
    {
    	 
    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "emailtemplate/passwordmailview";
		$data['current_menu']  = "mailsetting";
		$param = array('mail_type'=>'password');
		//$paramg = array('mail_type'=>'password');
 		 $data['customermail'] =$this->mailsetting_model->get_mail_details($param);
 		// $data['garagemail'] =$this->mailsetting_model->get_mail_details($paramg);
 		// print_R($data['customermail']);exit;
		 $this->template->load_backend_template($data);
		
     }
      
     public function insert_stud_details()
     {
     	$query = $this->db->get_where('welcome_mail', array('mail_type' => 'customer'));
	    foreach ($query->result() as $row)
	    {
			$mail_typess=$row->mail_type;
		}
		 if($mail_typess=='customer') 
				   {
 				   	// alert('haiiiiiii');
				   	$data['mail_subject']       = $this->input->post('mail_subject');
        			$data['mail_type']       = $this->input->post('mail_type');     
        			$data['mail_content']       = $this->input->post('mail_content');
        			$this->db->where('mail_type','customer');
        			$this->db->update('welcome_mail',$data);
        			redirect(BASE_URL . '/admin/mailsetting/welcomeview/','refresh');
				   } 
				   else {
				   	// alert('dddddddddddd');
				      $data['mail_subject']       = $this->input->post('mail_subject');
		        	$data['mail_type']       = $this->input->post('mail_type');
		        	 
		        	$data['mail_content']       = $this->input->post('mail_content');
		        	$this->db->insert('welcome_mail',$data);
		        	redirect(BASE_URL . '/admin/mailsetting/welcomeview/', 'refresh');
				   }

     }
     public function insert_garage_details()
     {
     	$query = $this->db->get_where('welcome_mail', array('mail_type' => 'garage'));
	    foreach ($query->result() as $row)
	    {
			$mail_typess=$row->mail_type;
		}
		 if($mail_typess=='garage') 
				   {
 				   	// alert('haiiiiiii');
				   	$data['mail_subject']       = $this->input->post('mail_subjectg');
        			$data['mail_type']       = $this->input->post('mail_typeg');     
        			$data['mail_content']       = $this->input->post('mail_contentg');
        			$this->db->where('mail_type','garage');
        			$this->db->update('welcome_mail',$data);
        			redirect(BASE_URL . '/admin/mailsetting/welcomeview/','refresh');
				   } 
				   else {
				   	// alert('dddddddddddd');
				      $data['mail_subject']       = $this->input->post('mail_subjectg');
		        	$data['mail_type']       = $this->input->post('mail_typeg');
		        	 
		        	$data['mail_content']       = $this->input->post('mail_contentg');
		        	$this->db->insert('welcome_mail',$data);
		        	redirect(BASE_URL . '/admin/mailsetting/welcomeview/', 'refresh');
				   }

     }
      public function insert_passwordrest_details()
     {
     	$query = $this->db->get_where('welcome_mail', array('mail_type' => 'password'));
	    foreach ($query->result() as $row)
	    {
			$mail_typess=$row->mail_type;
		}
		 if($mail_typess=='password') 
				   {
 				   	// alert('haiiiiiii');
				   	$data['mail_subject']       = $this->input->post('mail_subject');
        			$data['mail_type']       = $this->input->post('mail_type');     
        			$data['mail_content']       = $this->input->post('mail_content');
        			$this->db->where('mail_type','password');
        			$this->db->update('welcome_mail',$data);
        			redirect(BASE_URL . '/admin/mailsetting/passwordview/','refresh');
				   } 
				   else {
				   	// alert('dddddddddddd');
				      $data['mail_subject']       = $this->input->post('mail_subject');
		        	$data['mail_type']       = $this->input->post('mail_type');
 		        	$data['mail_content']       = $this->input->post('mail_content');
		        	$this->db->insert('welcome_mail',$data);
		        	redirect(BASE_URL . '/admin/mailsetting/passwordview/', 'refresh');
				   }

     }
    //insert_passwordrest_details
 }