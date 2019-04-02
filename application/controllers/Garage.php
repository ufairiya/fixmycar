<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garage extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('garage_model');
		$this->load->model('common_model');
		$this->load->model('users_model');


		
	}
		
	public function index()
	{	

		if($this->session->userdata('user_type')!='garage')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "garage_personal_info";
		$data['current_menu']  = "garage_profile";
		$data['user_id'] = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');;
		$data['garage_details'] =$this->garage_model->get_garage_details($user_id);
		$this->template->load_backend_template($data);

    }  
   public function profile()
	{
		//echo "<pre>";print_r($this->session->userdata);echo "</pre>";
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}	
		$curent_login_id = $this->session->userdata['user_id'];
		$UserDetails = $this->users_model->getUsers(array('id_user_master' => $curent_login_id),'row');
		$data['base_url'] = base_url();
		$data['UserDetails'] = $UserDetails;
		$data['user_id'] = $curent_login_id;
		$data['pagename'] = 'basic_details';
		$basic_datas['UserDetails'] = $UserDetails;
		$basic_datas['user_id'] = $curent_login_id;
		$basic_datas['current_submenu'] = 'basic_profile'; 

		$data['pagename'] =  $this->load->view('frontend/garage/basic_details',$basic_datas,TRUE);

		$data['view_file']  = "garage/profile";

		$this->template->load_frontend_template($data);
	}
	public function company()
	{
		$users_id =$this->session->userdata['user_id'];
		  $check_stripe = get_mover_details($users_id);
 
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);exit();
		}	
		//if($this->session->userdata['user_type'] == 'garage' && $check_stripe->stripe_accountid =='')
		 
		$curent_login_id = $this->session->userdata['user_id'];
		$UserAbtDetails = $this->garage_model->getAboutDetails(array('user_id' => $curent_login_id),'row');
        $UserDetails = $this->users_model->getUsers(array('id_user_master' => $curent_login_id),'row');
		$UserdaysDetails = $this->garage_model->getDaysDetails(array('user_id' => $curent_login_id));
		$UsercompanyDetails = $this->garage_model->getcompanydatils1(array('user_id' => $curent_login_id),'row');
		$UsergarageimageDetails = $this->garage_model->getgarageimages(array('user_id' => $curent_login_id),'result');


		//$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $curent_login_id));
		//$UserRateDetails = $this->movers_model->getRateDetails(array('user_id' => $curent_login_id));
		$data['base_url'] = base_url();

		//$data['UserAbtDetails'] = $UserAbtDetails;
		$data['user_id'] = $curent_login_id;
		$data['pagename'] = 'company_details';
		$basic_datas['UserAbtDetails'] = $UserAbtDetails;
		$basic_datas['UserdaysDetails'] = $UserdaysDetails;
		 $basic_datas['UsercompanyDetails'] =$UsercompanyDetails;
		 $basic_datas['UserDetails'] = $UserDetails;
		 $basic_datas['UsergarageimageDetails']= $UsergarageimageDetails;
		//$basic_datas['UserareaDetails'] = $UserareaDetails;
		//$basic_datas['UserRateDetails'] = $UserRateDetails;
		$basic_datas['user_id'] = $curent_login_id;

			//$query = $this->db->query("SELECT  * from movers_rate_new Where userid ='$curent_login_id' ")->result_array() ;
		// $basic_datas['movers_rate_list']=$query;

		$mover_working_day = $this->db->query("SELECT * from movers_days where user_id = '".$curent_login_id."'")->result_array();
		if(empty($mover_working_day)){
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>0,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>1,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>2,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>3,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>4,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>5,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
			$this->db->insert('movers_days',array('user_id'=>$curent_login_id,'day_value'=>6,'status'=>0,'created_on'=>date('Y-m-d H:s:i')));
		//	$this->db->insert('movers_blockdate',$data);
		}

		$basic_datas['current_submenu'] = 'company_details';

		$data['pagename'] =  $this->load->view('frontend/garage/company_details',$basic_datas,TRUE);
		$data['view_file']  = "garage/profile";

		$this->template->load_frontend_template($data);
	}
public function delete_garage_images()
{
	if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();	
			$imageid=$_GET['id'];
			$basic_datas['reviews'] = $this->garage_model->deleteimage_garage($imageid);
			echo '1';

		}
}
 	public function review()
 	{
 		$users_id =$this->session->userdata['user_id'];
		$check_stripe = get_mover_details($users_id);

		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
				redirect(BASE_URL);exit();
		}
		//  if($this->session->userdata['user_type'] == 'movers' && $check_stripe->stripe_accountid =='' )
		// {
		// 	redirect('movers/profile');exit();
		// }
		$curent_login_id = $this->session->userdata['user_id'];

		if($this->session->userdata['user_type'] =='garage' ) {
		$UserDetails = $this->users_model->getUsers(array('id_user_master' => $curent_login_id),'row');
		$data['base_url'] = base_url();
		$data['UserDetails'] = $UserDetails;
		$data['user_id'] = $curent_login_id;
		$data['pagename'] = 'basic_details';
		$basic_datas['UserDetails'] = $UserDetails;
		$basic_datas['user_id'] = $curent_login_id;
		$basic_datas['current_submenu'] = 'reviews_rates'; 
		  $basic_datas['reviews'] = $this->garage_model->get_reviews($curent_login_id);
		//  $data['reviews'] =$review_result;
		$data['pagename'] =  $this->load->view('frontend/garage/review',$basic_datas,TRUE);
		$data['view_file']  = "garage/profile";

		$this->template->load_frontend_template($data);

	}


	else {

	 $data['currentuser'] = $curent_login_id;
		 $review_result  = $this->movers_model->get_reviews($currentuser);
		 $data['reviews'] =$review_result;

		$data['view_file']  = "movers/review";
		$data['base_url'] = base_url();
		$this->template->load_frontend_template($data);
	}

 	}
    public function edit_companydetails($user_id = 0)
	{
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();			
			

		$company_details = $this->garage_model->getcompanydatils1(array('user_id' => $user_id) ,'row' );
		$data['UserDetails']  = $company_details;
		$data['user_id']=$this->session->userdata['user_id'];
				//$data['assignedSalesREP']  = $aSalesREFDetail;
		//$data['aSelectData']  = json_encode($aSelectdata);
		//$data['customer_type']  = $cust_type;
			$this->load->view('frontend/garage/company_edit_template',$data);		
		}
	}

   public function edit_companyabt($user_id = 0)
	{
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}

		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();			
			

		$UserAbtDetails = $this->garage_model->getAboutDetails(array('user_id' => $user_id),'row');
		$data['UserAbtDetails']  = $UserAbtDetails;
		$data['user_id']  = $user_id;
 			$this->load->view('frontend/garage/movers_abtedit_template',$data);		
		}
	}
	public function update_movers_abtdetails(){
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}
		if(isset($_POST))
		{
			$user_id = $_POST['user_id'];
			$content = htmlentities($_POST['content']);
			
			$UserAbtDetails = $this->garage_model->getAboutDetails(array('user_id' => $user_id));
			if($UserAbtDetails && !empty($UserAbtDetails)){

				$update_array = array('content' => $content );
				$update_result = $this->garage_model->update_abt($update_array,array('user_id' => $user_id));
			}
			else
			{
				$insert_array = array('content' => $content,'user_id' => $user_id );
				$update_result = $this->garage_model->insert_abt($insert_array);
			}

			echo 1;


		}
		else
		{
			echo 0;
		}
		exit;
	}
function update_movers_days(){
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}
		if(isset($_POST))
		{
			// print_r($_POST);
			// exit();
			$user_id = $_POST['user_id'];
			$dayvalues = $_POST['dayvalues'];
			$update_day = $this->garage_model->update_day(array('status'=>0,'available'=>'no','start_time'=>'','end_time'=>''),array('user_id' => $user_id));
			// print_r($dayvalues);
			if($dayvalues)
			{
				foreach($dayvalues as $dayvalue)
				{
					// print_r($dayvalue);
					// exit();
					$dayval = (isset($dayvalue['dayval']))?$dayvalue['dayval']:'';
					$start_time = (isset($dayvalue['start_time']))?$dayvalue['start_time']:'';
					$end_time = (isset($dayvalue['end_time']))?$dayvalue['end_time']:'';
					if($dayval !='' && $start_time !='' && $end_time !='')
					{
						$checkdayval = $this->garage_model->getDaysDetails(array('user_id' => $user_id,'day_value' => $dayval),'row');
						if($checkdayval)
						{
							$day_id = $checkdayval->id;
							$this->garage_model->update_day(array('start_time' => $start_time, 'end_time' => $end_time,'status' => 1,'available'=>'yes','modified_on' => date('Y-m-d H:i:s')),array('id' => $day_id));
						}
						else
						{
							$this->garage_model->insert_day(array('start_time' => $start_time, 'end_time' => $end_time,'status' => 1,'available'=>'yes','created_on' => date('Y-m-d H:i:s'),'user_id' => $user_id,'day_value' => $dayval));
						}
						//echo "1";
					}

				}

			}
			echo "1";
		}
		else
		{
			echo 0;
		}
		exit;
		//echo "<pre>";print_r($_POST);echo "</pre>";
	}
    public function garage_update_stlpswd($user_id){
		// print_r($_POST);
		if($user_id!=''){
			 $current_password_movers = $_POST['current_password_movers'];
			 $new_password_movers     = $_POST['new_password_movers'];
			 $conform_password_movers = $_POST['conform_password_movers'];
			$current_password1 = $this->db->query("SELECT password FROM user_master where id_user_master = '".$user_id."'")->row();
			// echo 'db password';
			 $current_password  = $current_password1->password;
			if(($current_password == sha1($current_password_movers)) && ($new_password_movers == $conform_password_movers)){
				$this->db->where("id_user_master",$user_id);
				$this->db->update('user_master',array('password' => sha1($conform_password_movers)));
				echo 1;
			}
			else{
				echo 0;
			}
		}

	}

    public function upload_cust_profile($company_id,$param='')
	{	
	 
		$data['param'] = $param;
		$data['base_url'] = base_url();
 		$data['company_id']		 =$company_id;
 		$this->load->view('frontend/garage/upload_cust_profile',$data);
		 
	} 
    public function upload_cust_po($company_id,$param='')
	{	
	 
		$data['param'] = $param;
		$data['base_url'] = base_url();
 		$data['company_id']		 =$company_id;
 		$this->load->view('frontend/garage/upload_cust_po',$data);
		 
	} 
	 
	public function save_customer_profile($company_id)
	{
		// print_r($_POST);
		// print_r($_FILES);exit();
		  $redirect_url = $_POST['redirect_url'];
		$j = 0;  

		for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
			$target_path ='';
			$target_path = "uploads/images/profile_images/";
		// Loop to get individual element from the array
		// $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['files']['name'][$i]));   // Explode file name from dot(.)
		// print_r($ext);
		// exit();
		$file_extension = end($ext); // Store extensions in the variable.
		$file_name = $ext[0];
		// $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		 $target_path = $target_path .$file_name.'_'.date("ymdHis"). "." . $ext[count($ext) - 1];

		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		// exit();
		// if (($_FILES["file"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
		// && in_array($file_extension, $validextensions)) {
		if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_path)) {
						
			$target_file_path[]=$target_path;
			$target =1;
		}
		else
		{
			$target=0;
		}
		
		
	}

	if(!empty($target_file_path))
	{
		$file_path ='';
		foreach ($target_file_path as $key => $value) 
		{
			$file_path .=$value.',';
		}
		$file_path = rtrim($file_path,',');
		
		// $customer_podetails['invoice_id'] = $company_id;
		// $customer_podetails['created_on']=date("Y-m-d H:i:s");
		// $customer_podetails['status'] = 1;
	}

		if($file_path!='' && $target ==1)
		{

			// $avail = $this->db->query("SELECT * FROM garage_details where user_id ='".$company_id."' ")->row();
			// if(empty($avail))
			// {
			// 	$customer_podetails['garage_photos'] = $file_path;
			// 	$this->db->insert('garage_details',$customer_podetails);
			// 	// $this->company_model->insert_customer_podetails($customer_podetails);
			// 	echo 1;
			// }
			// else
			// {
				$garage_id = $avail->garage_id;
				$already_added_link = $avail->profile_image;
				//if($already_added_link!=''){
				//$customer_polink = $already_added_link.','.$file_path; }
				//else{ $customer_polink =  $file_path; }
				//$customer_podetails['garage_photos'] = $customer_polink;
	        $update_array = array('profile_image' => $file_path);
	        	$companyData = array(
			'profile_image'=>$file_path,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$company_id
		);
		 
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);

		//	$update_result = $this->garage_model->update('user_master',$update_array,array('id_user_master' => $user_id));
             
			//	$this->company_model->update_customer_po_details($customer_podetails,$custpo_id);
				
				echo 1;redirect('/garage/garage_details/');	

			
			//}
			
			
		}
		else{
			echo 2;redirect('/garage/garage_details/');	
		}
	}
	public function save_customer_po($company_id='')
	{
		// print_r($_POST);
		// print_r($_FILES);exit();
		//  $company_id = $_POST['company_id'];
		 $user_id = $this->session->userdata['user_id'];
		$j = 0;  

		for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
			$target_path ='';
			$target_path = "uploads/images/";
		// Loop to get individual element from the array
		// $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
		$ext = explode('.', basename($_FILES['files']['name'][$i]));   // Explode file name from dot(.)
		// print_r($ext);
		// exit();
		$file_extension = end($ext); // Store extensions in the variable.
		$file_name = $ext[0];
		// $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
		 $target_path = $target_path .$file_name.'_'.date("ymdHis"). "." . $ext[count($ext) - 1];

		$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
		// exit();
		// if (($_FILES["file"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
		// && in_array($file_extension, $validextensions)) {
		if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_path)) {
						
			$target_file_path[]=$target_path;
			$target =1;
		}
		else
		{
			$target=0;
		}
		
		
	}

	if(!empty($target_file_path))
	{
		$file_path ='';
		foreach ($target_file_path as $key => $value) 
		{
			$file_path .=$value.',';
				$companyData = array(
			'cutomer_polink'=>$value,
			 'status'=>1,'user_id'=>$user_id);
				$companyId = $this->garage_model->garage_insert_images($companyData,$cmpnayDataCondition);
 
		}
		$file_path = rtrim($file_path,',');
		
		// $customer_podetails['invoice_id'] = $company_id;
		// $customer_podetails['created_on']=date("Y-m-d H:i:s");
		// $customer_podetails['status'] = 1;
	}
     echo 1;redirect('/garage/company/');	
		 
	}

public function update_details_profile(){
	if(isset($_POST))
			{
			  $profile_image_old = $_POST['profile_image_old'];
				  $user_id= $_POST['user_id'];
      
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

			
			$update_array = array('profile_image' => $profile_image);
			$update_result = $this->common_model->update('user_master',$update_array,array('id_user_master' => $user_id));
             
			echo 1;
			}
	}

      public function update_details(){
	
		if($this->session->userdata['user_type'] =='garage')
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

	public function changepassword()
	{


			if($this->session->userdata['user_type'] =='garage')
		{

			$current_password = $_POST['current_password'];
			$new_password = $_POST['new_password'];
			$conform_password = $_POST['conform_password'];
			$user_id = $_POST['user_id_garage'];

			$check_password =   $this->garage_model->get_password($current_password ,  $new_password, $conform_password ,$user_id);

			echo $check_password;
			exit();


		}

		else { redirect(BASE_URL);}
	}
/************************ sta arul**********************/
   public function garage_details()
   {
        
       if($this->session->userdata('user_type')!='garage')
			redirect(BASE_URL);
		 $data['user_id'] = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');;
         $data['user_type'] = 'garage';
 
		$companyInfoData['base_url']  = base_url();
		$companyInfoData['user_type']  = 'garage';
 		$companyInfoData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$user_id),'',array(),"row");	
		// print_r($companyInfoData['garage_details']);exit;
         
		//$data['customerName'] = isset($companyInfoData['get_company']->company_name) ? $companyInfoData['get_company']->company_name : '';
		//$data['customerID'] = isset($companyInfoData['get_company']->id_company) ? $companyInfoData['get_company']->id_company : '';
		//$data['customerStatus'] = isset($companyInfoData['get_company']->company_status) ? $companyInfoData['get_company']->company_status : '';
		$data['companyUserView'] = $this->load->view('frontend/garage/garage_personal_info',$companyInfoData,TRUE);
		/*********  company details**********/
		 
		$invoiceData['user_id'] = $user_id;
		$invoiceData['get_company'] = $this->garage_model->getuserdatils(array('id_user_master'=>$user_id),'',array(),"row");	
		$invoiceData['get_companydet'] = $this->garage_model->getcompanydatils(array('user_id'=>$user_id),'',array(),"row");	
		 //$invoiceData['custInvoiceList'] = $this->invoice->getCompanydatils($param=array('id_user_master'=>$user_id), $column='',$option);
         $data['customerInvoices'] = $this->load->view('frontend/garage/garage_company',$invoiceData,TRUE);

		/*Invoice Details*/
		// $invoiceData['company_id'] = $company_id;
		//  $invoiceData['custInvoiceList'] = $this->invoice->getPurchaseOrder($param=array('company_id'=>$company_id,'po_status'=>1), $column='',$option);
		//  //echo "<pre>";print_r( $invoiceData['custInvoiceList']);echo "</pre>";
		// //$invoiceData['custInvoiceList'] = FALSE;
		// $invoiceData = array_merge($invoiceData,$access_data);
		// $data['customerInvoices'] = $this->load->view('frontend/company/company_invoices',$invoiceData,TRUE);

		// /*commission Details*/
		// $commissionData['company_id'] = $company_id;
		// $commissionData['userType'] = $this->userType;
		//  $commissionData['custCommissionList'] = $this->invoice->getInvoiceCommission(array('company_ids'=>$company_id,'comm_status'=>1),'',array('orderby'=>'id_inv_com','disporder'=>'DESC')); 
		// //$commissionData['custCommissionList'] = FALSE;
		// $commissionData = array_merge($commissionData,$access_data);
		// $data['customerCommission'] = $this->load->view('frontend/company/company_commission',$commissionData,TRUE);

		// /*Customer History*/
		// $historyInfo = $this->invoice->getCustomerHistoryFormat($company_id);
		// $historyData['company_id'] = $company_id;
		// $historyData['userType'] = $this->userType;
		// $historyData['custHistoryList'] = $historyInfo;
		// //echo "<pre>";print_r( $historyData['custHistoryList']);echo "</pre>";
		// $historyData = array_merge($historyData,$access_data);
		// $data['customerHistory'] = $this->load->view('frontend/company/company_history',$historyData,TRUE);
		// echo '<pre>';
		// print_R($historyInfo);
		// exit;
		
		// $data['base_url'] = base_url();
		// $data['title']  = "View Customer";
		 
		// $data['view_file']  = "company/company_view";
		// $data['current_menu']  = "company";	
		// $data['userType'] = $this->userType;
		
		// $data['quickView']  = ($this->createCustAction) ? $this->quickViewCompany : FALSE;
		// $data['pageTop']  = ($this->createCustAction) ? $this->quickPageTop  : FALSE;

		

		// $this->template->load_frontend_template($data);
		$data['title'] ='Garage Information';
		$data['base_url'] = base_url();
		$data['view_file']  = "garage_company_info";
		$data['current_menu']  = "garage_profile";
		$data['user_id'] = $this->session->userdata('user_id');
		$user_id = $this->session->userdata('user_id');;
 		$data['garage_details'] =$this->garage_model->get_garage_details($user_id);
		$this->template->load_backend_template($data);
     
   }
public function update_company_details()
{
	if($this->session->userdata['user_type'] =='garage' || $this->session->userdata['user_type'] =='superuser')
		{
					
		if(isset($_POST))
			{
				 $user_id = $_POST['user_id'];
				$garage_name = $_POST['garage_name'];
				$garage_website = $_POST['garage_website'];
				$garage_email = $_POST['email'];
				$garage_phone = $_POST['garage_phone'];
				$address_line_1 = $_POST['address_line_1'];
				$address_line_2 = $_POST['address_line_2'];
				$posttown = $_POST['posttown'];
				$country = $_POST['country'];
				$eir_code = $_POST['eir_code'];
				$update_array = array('garage_name' => $garage_name,'garage_website' => $garage_website,'garage_email' =>$garage_email, 'garage_phone' => $garage_phone, 'address_line_1' => $address_line_1, 'address_line_2' => $address_line_2, 'posttown' => $posttown, 'country' => $country,'eir_code' => $eir_code);
			$update_result = $this->garage_model->update_company_details($update_array,array('user_id' => $user_id));

			echo 1;
			}
		}
}

   public function update_garage_details(){
 
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
			$company_name = $_POST['company_name'];
			$year_found = $_POST['year_found'];
			$address = $_POST['address'];
			// $country = $_POST['country'];
			// $state = $_POST['state'];
			$profile_image_old = $_POST['profile_image_old'];
			//$profile_image = $_POST['profile_image'];
			$id_proof_old = $_POST['id_proof_old'];
			//$id_proof = $_POST['id_proof'];

			//$admin_fee ='';
			//$direct_url ='';
			// $slot_per_day ='';

			// if($this->session->userdata['user_type'] =='superuser')
			// {

			// 	$admin_fee =$_POST['admin_fee'];
			// 	$direct_url =$_POST['direct_url'];
			// 	// $slot_per_day = $_POST['slots_per_day'];
				
			// $direct_url =BASE_URL."/home/index/".$direct_url;
			// }

			// if($this->session->userdata['user_type'] =='movers')
			// {

			// 	$direct_url =$_POST['direct_url'];
			// 	$admin_fee =$_POST['admin_fee'];

			// $direct_url =BASE_URL."/home/index/".$direct_url;
			// // $slot_per_day = $_POST['slots_per_day'];

			// }


		// echo "SELECT * FROM user_master where direct_url = '".$direct_url1."' and id_user_master not in ('".$mover_id."')";
			$check_avail='';
		//$check_avail = $this->db->query("SELECT * FROM user_master where direct_url = '".$direct_url."' and id_user_master not in ('".$user_id."')")->result_array();
		if(empty($check_avail))
		{
			$target_dir = "uploads/images/";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = 'uploads/images/'.$profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}

			if($_FILES["id_proof"]["name"] !='')
			{
				$proof_unqids = uniqid();

				$id_proof_file = $target_dir . basename($_FILES["id_proof"]["name"]);
				$proof_ext = strtolower(pathinfo($id_proof_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["id_proof"]["tmp_name"], 'uploads/images/'.$proof_unqids.'.'.$proof_ext);

				$id_proof = 'uploads/images/'.$proof_unqids.'.'.$proof_ext;
			}
			else
			{
				$id_proof = $id_proof_old;
			}

		
			$update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' =>$username, 'email' => $email, 'phone' => $phone, 'company_name' => $company_name, 'year_found' => $year_found, 'address' => $address,'profile_image' => $profile_image, 'id_proof' => $id_proof  );
			$update_result = $this->users_model->user_update($update_array,array('id_user_master' => $user_id));

			echo 1;
		}
		else
		{
			echo 2;
		}	

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

public function edit_basic($user_id = 0)
	{
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='garage')
		{
			redirect(BASE_URL);
		}
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();			
			

		$UserDetails = $this->users_model->getUsers(array('id_user_master' => $user_id),'row');
		$data['UserDetails']  = $UserDetails;
		//$data['assignedSalesREP']  = $aSalesREFDetail;
		//$data['aSelectData']  = json_encode($aSelectdata);
		//$data['customer_type']  = $cust_type;
			$this->load->view('frontend/garage/movers_edit_template',$data);		
		}
	}
   public function company_save_last(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'last_name'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the customer name correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the customer name';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}
	public function company_save_profile($image){
		$name = $this->input->post('name');
		$value = $this->input->post('value');

            $profile_image_old = $value;

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
			$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'profile_image'=>$profile_image,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the Phone no correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the Phone No';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
		}
	public function company_save_email(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'email'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the Phone no correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the Phone No';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}
public function garage_save_company()
{
	$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');

		$companyData = array(
			$name=>$value,
			
		);
		$cmpnayDataCondition = array(
			'user_id'=>$pk
		);
		$valiesin = $this->garage_model->get_garage_company_details($pk);
		if(!empty($valiesin))
		{
			
			$message = 'Please enter the value correctly';
			if($value != ''){
				$companyId = $this->garage_model->garage_update_company($companyData,$cmpnayDataCondition);
				if($companyId == FALSE){
					$error = TRUE;
				}
			}else{
				$error = TRUE;
				$message = 'Please enter the value';
			}
		}else
		{
			$companyData = array(
					$name=>$value,
					'user_id'=>$pk,
 					'status'=>1
				);

			$message = 'Please enter the value correctly';
			if($value != ''){
				$companyId = $this->garage_model->garage_insert_company($companyData);
				if($companyId == FALSE){
					$error = TRUE;
				}
			}else{
				$error = TRUE;
				$message = 'Please enter the value';
			}

		}
		 
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
}
	public function customer_terms_save(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'address'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the Phone no correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the Phone No';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}
	public function company_save_phone(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'phone'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the Phone no correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the Phone No';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}
 

 
public function company_save(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'first_name'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_user_master'=>$pk
		);
		$message = 'Please enter the customer name correctly';
		if($value != ''){
			$companyId = $this->garage_model->garage_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the customer name';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}
}
		