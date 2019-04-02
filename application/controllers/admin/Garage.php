<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Garage extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model');
		$this->load->model('garage_model');
		$this->load->model('customer_model');
 
		 $this->load->library('session');
		$this->session->keep_flashdata('message');

	}



    public function index() {

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "garage_details";
		$data['current_menu']  = "garage";
		$data['garage_details'] =$this->db->get_where('user_master', array('user_type'=>'garage','status !=' => 2 ))->result();
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


   public function edit_details($userid='' ){

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "garage_edit";
		$data['garage_details'] =$this->garage_model->get_garage_details($userid);
		$this->load->view('backend/backend_pages/garage_edit',$data);
    }


    public function update_details(){
	
		if($this->session->userdata['user_type'] =='garage' || $this->session->userdata['user_type'] =='superuser')
		{
					
		if(isset($_POST))
			{
			$user_id = $_POST['user_id'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$username = $first_name.' '.$last_name;
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$profile_image_old = $_POST['profile_image_old'];

			$target_dir = "uploads/images/";

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

			
			$update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' =>$username, 'email' => $email, 'phone' => $phone, 'address' => $address,'profile_image' => $profile_image);
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

	public function delete_garage()
	{


		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$user_id = $_POST['user_id'];
    	$update_result = $this->common_model->delete('user_master',array('id_user_master' => $user_id));

	}
/******************************************************************/
 
public function delete_garages()
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
                //echo $this->db->last_query(); 
                $aResponse['status']=$this->db->last_query();
		        $aResponse['message']='Customer Status Update Successfully';
		        $aResponse['status_val']=$status_val;
			}
			echo json_encode($aResponse);
}
   public function garageview($userid='' ){

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['user_type'] = 'superuser';
 		$data['title']  = "Garage Information";
 		$data['view_file']  = "garage_admin_edit";
 		$data['user_id'] = $userid;
  		$data['userstatus'] = $this->db->get_where('user_master',array('id_user_master'=>$userid))->row()->status;	
		$data['current_menu']  = "garage";

		$companyInfoData['base_url']  = base_url();
		$companyInfoData['user_type']  = 'superuser';
 		$companyInfoData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$userid),'',array(),"row");	
 		$data['companyUserView'] = $this->load->view('frontend/garage/garage_personal_info',$companyInfoData,TRUE);

 		$invoiceData['user_id'] = $userid;
		$invoiceData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$userid),'',array(),"row");	
		$invoiceData['get_companydet'] = $this->garage_model->getcompanydatils(array('user_id'=>$userid),'',array(),"row");	
        $data['customerInvoices'] = $this->load->view('frontend/garage/garage_company',$invoiceData,TRUE);


		$data['garage_details'] =$this->garage_model->get_garage_details();
		$this->template->load_backend_template($data);
    }

}
	