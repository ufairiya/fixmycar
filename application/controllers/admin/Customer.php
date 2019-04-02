<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Customer extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		 $this->load->model('common_model');
		 $this->load->model('customer_model');
		 $this->load->model('garage_model');

	}

    public function index() {

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "customer_details";
		$data['current_menu']  = "customer";
		$data['customer_details'] =$this->customer_model->get_customer_details();
		$this->template->load_backend_template($data);
    }


    public function approve($user_id ='')
    {

    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$user_id = $_POST['user_id'];
    	$update_array = array('site_admin' => 1);
    	$update_result = $this->common_model->update('user_master',$update_array,array('id_user_master' => $user_id));
   
    }


     public function edit_details($userid = '' ){

	   if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "customer_edit";
		$data['customer_details'] =$this->customer_model->get_customer_details($userid);
		$this->load->view('backend/backend_pages/customer_edit',$data);

     }


     public function update_details(){
		if( $this->session->userdata['user_type'] =='customer' || $this->session->userdata['user_type'] =='superuser'  )
		{
			
		if(isset($_POST))
		{
			$user_id = $_POST['user_id'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $first_name.' '.$last_name;
			$address = $_POST['address'];
			$profile_image_old = $_POST['profile_image_old'];
			$target_dir = "uploads/images/profile_images/";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = $profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}
			$update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' => $username,'email' => $email, 'phone' => $phone, 'address' => $address, 'profile_image' => $profile_image );
			$update_result = $this->common_model->update('user_master',$update_array,array('id_user_master' => $user_id));

			echo 1;


		}
		else
		{
			echo 0;
		}
		exit;
	}
	else{redirect(BASE_URL);
		}
	}




	public function delete_customer()
	{


		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$user_id = $_POST['user_id'];
    	$update_result = $this->common_model->delete('user_master',array('id_user_master' => $user_id));

	}
/********************** STA ARUL******************************/
 public function create()
 {
 	  if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$data['base_url'] = base_url();
		$data['view_file']  = "customer_add";
		//$data['customer_details'] =$this->customer_model->get_customer_details($userid);
		$this->load->view('backend/backend_pages/customer_add',$data);

 }
 public function add_details()
 {
 	//if( $this->session->userdata['user_type'] =='customer' || $this->session->userdata['user_type'] =='superuser'  )
	//	{
			
		if(isset($_POST))
		{
			$action = $_POST['action'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $first_name.' '.$last_name;
			$address = $_POST['address'];
			$password = $_POST['password'];
			$profile_image_old = $_POST['profile_image_old'];
			$target_dir = "uploads/images/profile_images/";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = $profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}
			 $update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' => $username,'email' => $email, 'phone' => $phone, 'address' => $address, 'profile_image' => $profile_image,'user_type' =>'customer','password'=>sha1($password));
		     $update_result = $this->customer_model->createcustomer($update_array);

			echo 1;


		}
		else
		{
			echo 0;
		}
		exit;
	//}
	//else{redirect(BASE_URL);
		//}
 }


	public function delete_company()
	{
		if ($this->input->is_ajax_request()){
			$company_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				//$this->usertracking->track_this("Deleting Company");
				$this->customer_model->company_delete(array("status"=>"2"),array("id_user_master"=>$company_id));
			}
			if($task  == 'p'){
					//$this->usertracking->track_this("Deleting Company permanently");
					$this->customer_model->company_delete_permanently(array("id_user_master"=>$company_id));
			}
			echo TRUE;
			exit;
		}
	}

public function updateCustomer_staus()
{
		$aResponse['status']=FALSE;
		$aResponse['message']='Can\'t Update';
		if($this->input->is_ajax_request())
			{
				
				$cid = $this->input->post('customer_id');
				//echo "dhjfhjgh";
				 $status_val = $this->input->post('status');
				$data=array('status'=>$status_val);
				$this->db->where('id_user_master',$cid);
                $this->db->update('user_master',$data);
                //echo $this->db->last_query();exit;
                $aResponse['status']=TRUE;
		        $aResponse['message']='Customer Status Update Successfully';
		        $aResponse['status_val']=$status_val;
			}
			echo json_encode($aResponse);
}
   public function customerview($userid='' ){

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['user_type'] = 'superuser';
 		$data['title']  = "Customer Information";
 		$data['view_file']  = "customer_admin_edit";
		$data['current_menu']  = "customer";

		$companyInfoData['base_url']  = base_url();
		$companyInfoData['user_type']  = 'superuser';
 		$companyInfoData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$userid),'',array(),"row");	
 		$data['companyUserView'] = $this->load->view('frontend/garage/garage_personal_info',$companyInfoData,TRUE);

 	// 	$invoiceData['user_id'] = $userid;$invoiceData['user_type']  = 'superuser';
		// $invoiceData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$userid),'',array(),"row");	
		// $invoiceData['get_companydet'] = $this->garage_model->getcompanydatils(array('user_id'=>$userid),'',array(),"row");	
  //       $data['customerInvoices'] = $this->load->view('frontend/garage/garage_company',$invoiceData,TRUE);


		$data['garage_details'] =$this->customer_model->get_customer_details();
		$this->template->load_backend_template($data);
    }


  
}
	