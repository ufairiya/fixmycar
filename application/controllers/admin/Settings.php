<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Settings extends CI_Controller {

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
		$data['view_file']  = "site_setting";
		$data['current_menu']  = "settings";
		$data['system_name'] =$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;  
		$data['system_title'] =$this->db->get_where('settings' , array('type' => 'system_title'))->row()->description;  
		$data['address'] =$this->db->get_where('settings' , array('type' => 'address'))->row()->description;  
		$data['phone'] =$this->db->get_where('settings' , array('type' => 'phone'))->row()->description;  
		$data['system_email'] =$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;

		$data['mail_content'] =$this->db->get_where('settings' , array('type' => 'register_customer'))->row()->description;  
		$data['mail_contentg'] =$this->db->get_where('settings' , array('type' => 'register_garage'))->row()->description;  
		$data['system_logo'] =$this->db->get_where('settings' , array('type' => 'system_logo'))->row()->description;  
		$data['system_maillogo'] =$this->db->get_where('settings' , array('type' => 'system_maillogo'))->row()->description;
		$this->template->load_backend_template($data);
    }
    public function do_update()
    {

    	   $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);
 
            redirect(BASE_URL . '/admin/settings/', 'refresh');

     }
     public function upload_logo()
     {
     	     move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/images/logo.png');
     	      $data['description'] = 'uploads/images/logo.png';
     	     $this->db->where('type' , 'system_logo');
             $this->db->update('settings' , $data);
            
             move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/images/emailogo.png');
              $data['description'] = 'uploads/images/emailogo.png';
             $this->db->where('type' , 'system_maillogo');
            $this->db->update('settings' , $data);
             
            redirect(BASE_URL . '/admin/settings/', 'refresh');
      
     }
     public function save_registercontent()
     {
     	 $data['description'] = $this->input->post('mail_content');
            $this->db->where('type' , 'register_customer');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('mail_contentg');
            $this->db->where('type' , 'register_garage');
            $this->db->update('settings' , $data);
             redirect(BASE_URL . '/admin/settings/', 'refresh');
     }
}