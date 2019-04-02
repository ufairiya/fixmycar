<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		 $this->load->library('session');
		$this->load->library('upload');
		$this->load->model('customer_model');
		$this->load->model('garage_model');
	    $this->load->model('users_model');
	    $this->load->model('pages_model');
		$this->session->keep_flashdata('message');
	    $this->load->library('google');
        $this->load->library('facebook');
	      $data['gplusloginurl'] = $this->google->logingoogleurl();
          $data['fbloginurl']    = $this->facebook->login_url();
          $data['system_name'] =$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;  
		$data['system_title'] =$this->db->get_where('settings' , array('type' => 'system_title'))->row()->description;  
		$data['address'] =$this->db->get_where('settings' , array('type' => 'address'))->row()->description;  
		$data['phone'] =$this->db->get_where('settings' , array('type' => 'phone'))->row()->description;  
		$data['system_email'] =$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
 
		$data['register_customer'] =$this->db->get_where('settings' , array('type' => 'register_customer'))->row()->description;  
		$data['register_garage'] =$this->db->get_where('settings' , array('type' => 'register_garage'))->row()->description;

	}
 	public function index($param=FALSE){
 
 		$data['register_customer'] =$this->db->get_where('settings' , array('type' => 'register_customer'))->row()->description;  
		$data['register_garage'] =$this->db->get_where('settings' , array('type' => 'register_garage'))->row()->description;
       if($param == FALSE) {
      //Show search box
         $this->load->library('google');
        $this->load->library('facebook');
	      $data['gplusloginurl'] = $this->google->logingoogleurl();
          $data['fbloginurl']    = $this->facebook->login_url();
    	$data['email'] ='';
		$data['base_url'] = base_url();
		 $curent_login_id =  !empty($this->session->userdata('user_id'))?$this->session->userdata('user_id'):'';
 		//$curent_login_id = $this->session->userdata['user_id'];
 		if($curent_login_id =='')
 		{
 			$data['view_file']  = "pages/home1";
 		}else{
		$data['view_file']  = "pages/home"; }
         $area_idsss = $this->db->query("SELECT * from garage_details")->result_array();
        
        $data['garage_detailsdata']= $area_idsss ;
       
		$this->template->load_frontend_template($data);

    } else {

//     	echo "sss = ".$param;
// exit;

      //Show search results

    		$data['email'] =trim($param);
    		$param = trim($param);
		$data['base_url'] = base_url();

		$data['d_rul'] = base_url().'home/index/'.$param;
		// echo $dir_url1 = base_url().'home/index/'.$param.'ffffffffffff';
		$dir_url = base_url().'home/index/'.$param;

		// $this->load->library('encrypt');
  //        $config['encryption_key'] = $param; 
  //        $encrypt =  $this->encrypt->encode($param);
  //         $url_en = $encrypt;
  //       // $url_en =  $this->encrypt->decode($encrypt);

              // $param = 'kalai229613';


   $this->load->library('encryption');
   $to_encrypt= $param ;
   $this->encryption->initialize(
        array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $this->config->config['encryption_key']
        )
 );
$url_en = $this->encryption->encrypt($to_encrypt);

$url_en = strtr($url_en, array('+' => '.', '=' => '-', '/' => '~'));

 

		  
		$get_mover_id = $this->db->query("SELECT id_user_master,company_name FROM user_master where direct_url = '".$dir_url."' ")->row();

		  $moverid =$get_mover_id->id_user_master;

		  $data['mover_name'] =$get_mover_id->company_name;

		  $movers_about = $this->db->query("SELECT content FROM movers_about where 	user_id = '".$moverid."' ")->row();
	
		 // $data['about_content'] =htmlspecialchars_decode($movers_about->content); 
		  $data['about_content'] =htmlspecialchars_decode($movers_about->content);

		  	$data['mover_id'] =$moverid;
	$UserAbtDetails = $this->movers_model->getAboutDetails(array('user_id' => $moverid),'row');
	$UserdaysDetails = $this->movers_model->getDaysDetails(array('user_id' => $moverid));
	$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $moverid));
	$UserCompanyname = $this->movers_model->getCompanyname($moverid);
	$UserReviews = $this->movers_model->getReviewDetails( $moverid);


	$data['Userdaysdetails'] = $UserdaysDetails;
	$data['serviceareas'] = $UserareaDetails;
	$data['UserReviews'] = $UserReviews;


		$data['view_file']  = "pages/home_direct_url";

		redirect(base_url().'home/Movers_booking_page/'.$url_en);
    }

}



public function profile(){
	if($this->session->userdata('user_type')!='customer')
		redirect(BASE_URL);

		$data['base_url'] = base_url();
		$data['view_file']  = "pages/profile";
		$user_id = $this->session->userdata('user_id');

		$curent_login_id = $this->session->userdata['user_id'];
		$UserDetails = $this->users_model->getUsers(array('id_user_master' => $curent_login_id),'row');
		$data['base_url'] = base_url();
		$data['UserDetails'] = $UserDetails;
		$data['user_id'] = $curent_login_id;
		$data['pagename'] = 'basic_details';
		$basic_datas['UserDetails'] = $UserDetails;
		$basic_datas['user_id'] = $curent_login_id;
		$basic_datas['current_submenu'] = 'basic_profile'; 
 		$data['pagename'] =  $this->load->view('frontend/customer/basic_details',$basic_datas,TRUE);
 		$data['view_file']  = "pages/profile";
 		$this->template->load_frontend_template($data);

}

public function edit_basic_customer($user_id = 0)
	{
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
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
			$this->load->view('frontend/customer/customer_edit_template',$data);		
		}
	}

/********* end codeeeeeeeeee by hemalatha ********/


	public function movers_approval(){
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$data['base_url'] = base_url();
		$data['view_file']  = "backend_pages/movers_details";
		$data['current_menu']  = "movers";
		
		
		$this->template->load_backend_template($data);
		
	}


public function customer_support(){
	$data['base_url'] = base_url();
  	$basic_datas['current_submenu'] = 'faq_details'; 
  		$data['view_file']  = "pages/customer_support";
	$basic_datas['terms_details'] = $this->pages_model->get_terms_faqs();
	$where = array('post_type'=>'faq','post_status'=>'publish');
	
	 $basic_datas['faq_details'] =$this->pages_model->get_pages_details_faq($where);
	 
	// print_r($_SESSION);
    if(isset($this->session->userdata['user_type'])  ){
          if($this->session->userdata['user_type']=='movers'){
            $data['pagename'] =  $this->load->view('frontend/pages/faq_withoutlogin_details',$basic_datas,TRUE);
          }if($this->session->userdata['user_type']=='customer'){
              $data['pagename'] =  $this->load->view('frontend/pages/faq_details',$basic_datas,TRUE);

          } if($this->session->userdata['user_type']=='superuser'){
               $data['pagename'] =  $this->load->view('frontend/pages/faq_details',$basic_datas,TRUE);
          }  
     }else{
            $data['pagename'] =  $this->load->view('frontend/pages/faq_details',$basic_datas,TRUE);
     }
	

   	$this->template->load_frontend_template($data);
		
}

public function contact_us(){
	$data['base_url'] = base_url();
		
		
	$basic_datas['current_submenu'] = 'contact_us'; 
	
	$data['pagename'] =  $this->load->view('frontend/pages/contact_login',$basic_datas,TRUE);
	$data['view_file']  = "pages/customer_support";
		
      
	$this->template->load_frontend_template($data);
		
}
/*privacy policy page*/

// public function privacy_policy(){
// 	$data['base_url'] = base_url();
// 	$basic_datas['base_url'] = base_url();
// 	$basic_datas['current_submenu'] = 'privacy_notice';
// 	$data['pagename'] =  $this->load->view('frontend/pages/privacy_policy',$basic_datas,TRUE);
// 	$data['view_file']  = "pages/customer_support";
//     $this->template->load_frontend_template($data);
// }
public function privacy_policy(){
	$data['base_url'] = base_url();
	$basic_datas['base_url'] = base_url();
	$basic_datas['current_submenu'] = 'privacy_notice';
		 $param =array('ID'=>2);
		$basic_datas['page_data'] = $this->pages_model->get_pages_fulldetails($param,'','','row');
        $basic_datas['banner_image']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_image','post_id'=>2))->row()->meta_value;  
		$basic_datas['banner_Content']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_content','post_id'=>2))->row()->meta_value; 
	$data['pagename'] =  $this->load->view('frontend/pages/privacy_policy',$basic_datas,TRUE);
	$data['view_file']  = "pages/customer_support";
    $this->template->load_frontend_template($data);
}
public function term_and_condition()
	{
        $data['base_url'] = base_url();
        $basic_datas['base_url'] = base_url();
		$basic_datas['current_submenu'] = 'terms_conditions';
		 $param =array('ID'=>1);
		$basic_datas['page_data'] = $this->pages_model->get_pages_fulldetails($param,'','','row');
        $basic_datas['banner_image']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_image','post_id'=>1))->row()->meta_value;  
		$basic_datas['banner_Content']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_content','post_id'=>1))->row()->meta_value; 
 		$data['pagename'] =  $this->load->view('frontend/pages/term_and_condition',$basic_datas,TRUE);
		$data['view_file']  = "pages/customer_support";
 		$this->template->load_frontend_template($data);
   }

/*kalai*/
public function email_edit_template(){
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$data['base_url'] = base_url();
		$data['view_file']  = "backend_pages/email_template";
		$data['current_menu']  = "Email Edit Template";
		
		
		$this->template->load_backend_template($data);
		
}
public function validate_addressfill()
{
	$entered_address = $this->input->post('entered_address');

	$lat123 = $this->input->post('lat');
	$lang = $this->input->post('lang');
	if($lat123!='' && $lang!='')
	{
		
		$entered_address = str_replace(' ','%20',$entered_address);
		$mapApiKey='AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU' ;
	    $url = "https://maps.google.com/maps/api/geocode/json?&address=".$entered_address ."&key=".$mapApiKey." " ;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                // echo '<pre>';
                // print_r($response_a);
                // echo '</pre';
                if($response_a!='')
                {
                	if($response_a->status == 'ZERO_RESULTS')
                	{
                		echo 1;
                	}
                	else
                	{
		                 $mover_lat = $response_a->results[0]->geometry->location->lat;
		                $mover_lon  = $response_a->results[0]->geometry->location->lng;
// echo 'jfhjsh';
		                $check_lan = trim(round($lang,6));
		                $check_lat = trim(round($lat123,6));

		               	if((trim(round($mover_lat,6)) == $check_lat) && (trim(round($mover_lon,6)) == $check_lan))
		               	{
		                		echo 0;
		                }
		                else{
		                	// echo 'sssssss';
		                	echo 1;
		                }

		              	
              
              		}
                }
    }else{
    	echo 1;
    }
}
public function testfunction(){
$data['base_url'] = base_url();
		$data['view_file']  = "pages/testpage";
		
		
		
		$this->template->load_frontend_template($data);
}

public function check_user_address_valid(){
	// print_r($_POST);
	// exit();
	
	$loading_address_check = $this->input->post('loading_address_check');
	$loading_address_lat = $this->input->post('loading_address_lat');
	$loading_address_lng = $this->input->post('loading_address_lng');
	$unloading_address = $this->input->post('unloading_address');
	$unloading_address_lat = $this->input->post('unloading_address_lat');
	$unloading_address_lng = $this->input->post('unloading_address_lng');
	$move_on_site_only = $this->input->post('move_on_site_only');
	$move_on_site_only_lat = $this->input->post('move_on_site_only_lat');
	$move_on_site_only_lng = $this->input->post('move_on_site_only_lng');
	$loading_result = 0;
	$unloading_result =0;
	$move_on_site_only_result =0;
	if($loading_address_check!='')
	{
		$loading_result = $this->users_model->check_valid_address($loading_address_check,$loading_address_lat,$loading_address_lng);
	}
	if($unloading_address!='')
	{
		$unloading_result = $this->users_model->check_valid_address($unloading_address,$unloading_address_lat,$unloading_address_lng);
	}
	if($move_on_site_only!='')
	{
		$move_on_site_only_result = $this->users_model->check_valid_address($move_on_site_only,$move_on_site_only_lat,$move_on_site_only_lng);
	}


echo json_encode(array('loading_result' => $loading_result,'unloading_result' => $unloading_result,'move_on_site_only_result'=>$move_on_site_only_result));
// exit();
}
	public function movers_account_details(){
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$user_id = $this->input->post('confirm_id');
		$activate = $this->input->post('activate');
 		if($activate == 'deactivate')
		{

			$check_valid = $this->db->query("SELECT site_admin,status FROM user_master where id_user_master = '".$user_id."' ")->row();
			$status = $check_valid->status;
			$site_admin = $check_valid->site_admin;
			$update_details = array('site_admin'=>2,'status'=>0);
			if($status=='1' && $site_admin=='1'){
				$this->db->where('id_user_master',$user_id);
				$this->db->update('user_master',$update_details);
				echo 1;
			}
			else{
				echo 0;
			}
		}
		else
		{
			if($activate == 'activate')
			{

				$update_details = array('site_admin'=>1,'status'=>1);
				$this->db->where('id_user_master',$user_id);
				$this->db->update('user_master',$update_details);
			}
		}
		
	}

	public function customer_deactive(){
	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$userid = $this->input->post('confirm_id');

		$this->db->where('id_user_master',$userid);
		$this->db->update('user_master',array('site_admin'=>3,'status'=>0));
		
	}
public function FAQ(){
	
		
		$data['base_url'] = base_url();
		$data['view_file']  = "pages/faq_details";
		
	
      
		$this->template->load_frontend_template($data);
		
	}
public function confirm_user_id($confirm_id=''){
	// print_r($_POST);
	$confirm_id = $this->input->post('confirm_id');
	// echo $confirm_id;
	
				$confirmation_id = $this->db->query("select site_admin,user_type from user_master where id_user_master = '".$confirm_id."' ")->row();
				$valuesss= $confirmation_id->site_admin;
				$user_type = $confirmation_id->user_type;
				// echo $valuesss;
				if($valuesss == 0){
				$data['site_admin'] = 1;
				$data['status'] = 1;
				if($user_type== 'movers'){
					$data['admin_fee'] = 50;
				}

				$this->db->where('id_user_master', $confirm_id);
				$this->db->update('user_master',$data);
				
				$customer_mail_id = $this->db->query("SELECT email,username from user_master where id_user_master = '".$confirm_id."'")->row();
				 $mail_id=$customer_mail_id->email;
				 $customer_name = $customer_mail_id->username;
				$result = $this->users_model->confirmation_mail($mail_id,$customer_name);
				

				echo 'true';
				}
				else{

					if($valuesss == 3){
						$datas = array('status'=>1,'site_admin'=>1);
						$this->db->where('id_user_master', $confirm_id);
						$this->db->update('user_master',$datas);
						echo 'true';

					}else
					{
					echo 'false';
					}
				}
	
	
		
}
public function admin_edit_basic($userid='' ){
	// echo $userid;exit();

	$data['movers_dettails'] = $this->db->query("SELECT * FROM user_master where id_user_master = '".$userid."'")->row();
	
	$this->load->view('backend/backend_pages/movers_profile_admin_edit_modal',$data);

 }
 /*************************aruljothi added code************************/
 public function admin_mover_edit_payment($edit_id= '' ){
 	$data['base_url'] = base_url();
 	 
 	$data['invoice_details'] = $this->db->query("SELECT * FROM invoice_details where order_id = '".$edit_id."'")->row();
 
	
	$this->load->view('backend/backend_pages/admin_mover_edit_payment',$data);
 }
 
 public function reverse_amount_details()
 {
 	$success =1;
  	// echo 'sddfsdfsfgsfsdfsdfdsfsf'; 

  if(isset($_POST))
		{
     //       
			   $amount = $_POST['amount'];
			  // $id = $_POST['id'];
			  $order_id = $_POST['order_id'];
			  $quantity = $_POST['quantity'];
		      $reason = $_POST['reason'];

		     $id='tr_1DwjhaGkpsouO6DpGdWGNQiI';
		    // $order_id ='1164';
		    // // $quantity ='1';
		    // // $reason ='test test';
      //        $amount=1000;




		       require_once(APPPATH.'libraries/stripe/init.php');
		        $secret = STRIPE_SECRET_API_KEY;  // you can get it in Stripe account settings


			 	    // $secret = 'sk_live_U6wd7u76sNotSrMW4lLMkwgz'; hiremover live account
			   \Stripe\Stripe::setApiKey($secret);
			
	//[id] => trr_1E2zoTGkpsouO6DpuWEPdAyq
    // [object] => transfer_reversal
    // [amount] => 50
    // [balance_transaction] => txn_1E2zoTGkpsouO6Dpk3ZnKkhk
    // [created] => 1549972353
    // [currency] => usd
    // [destination_payment_refund] => pyr_1E2zoTCTnHAQAYMQTQ4LrxfO
    // [metadata] => Stripe\StripeObject Object
    //     (
    //     )

    // [source_refund] => 
    // [transfer] => tr_1DwjhaGkpsouO6DpGdWGNQiI

			  

			 try {

                      $transfer = \Stripe\Transfer::retrieve($id);
						$re = $transfer->reversals->create([
						  'amount' => $amount 
						]);
                           // echo '---------------------'; echo '<pre>';     print_R($re); echo '</pre>';
                            $returnlog=array();
                         $returnlog = $re->jsonSerialize();
                         $dataentry = Serialize($returnlog);

                          $striparray['stripe_id'] = $returnlog['id'];
						  $striparray['object'] = $returnlog['object'];
						  $striparray['amount_revers'] = $returnlog['amount'];
						  $striparray['balance_transaction'] =  $returnlog['balance_transaction'];
						  $striparray['created'] = $returnlog['created'];
						  $striparray['currency'] = $returnlog['currency'];
						  $striparray['destination_payment_refund'] =  $returnlog['destination_payment_refund'];
						  $striparray['source_refund'] =  $returnlog['source_refund'];
						  $striparray['transfer']= $returnlog['transfer'];
						  $striparray['reason'] =$reason;
						  $striparray['order_id'] = $order_id;
						  $striparray['quantity'] = $quantity;
						  $striparray['created_on'] = date('Y-m-d H:s:i');


						  $this->db->insert('refund_reverse_details', $striparray);	

						  $result = $this->db->query("SELECT admin_reverse_amt from order_details where id= '".$order_id."' ")->row();

						  if(!empty($result))
						  {
						  	$reset = $result->admin_reverse_amt;

						  	$insert_amt_orders = $reset + $striparray['amount_revers'];
						  }
						  else{
						  	$insert_amt_orders =  $striparray['amount_revers'];
						  }

						  if($insert_amt_orders!='')
						  {
						  	$this->db->where('id',$order_id);
						  	$this->db->update('order_details',array('admin_reverse_amt' => $insert_amt_orders));
						  }

						 

						 // $result = $this->movers_model->reverse_details($striparray,$order_id,$amount);
                         
                          $Payment_status ='Payment Success';
                          $pay_status = 1;
			  }
			  catch (Exception $e) {
			// 	/*
			// 	 * if something went wrong
			// 	 */ 
			// 	//echo $e->getMessage();

			 	$Payment_status ='Payment Failed';
			 	$pay_status = 0;
			  }
		 
		 
		}
		echo  $pay_status;
		exit;
 }
 /********************* end aruljothi*************/
 /********************** get Garages **************************/
 public function user_profile(){
	if($this->session->userdata('user_type')!='customer')
		redirect(BASE_URL);
 		$data['base_url'] = base_url();
		$data['view_file']  = "pages/manage_login_user_profile";
 		$this->template->load_frontend_template($data);

}

  public function getnearst_garages_miles()
    {
    	$postcode =$_GET['postcode'];
    	$latitude = $_GET['latitude'];
    	$longitude = $_GET['longitude'];
    	$miles = isset($_GET['miles'])?$_GET['miles']:2;
    	$displayret='';$miles1=10;
         $area_idsss = $this->db->query("SELECT * from garage_details ")->result_array();
         $countarray = count($area_idsss);
         $i=1;
         foreach($area_idsss as $data)
         {
            $lat = $data['latitude'];
         	$long = $data['longitude'];
         	$garage_details = $data['garage_id'] ;
         	$garage_id =$data['garage_id'];
         	$currecntunits = $this->distance_calculator($latitude,$longitude,$lat,$long,'MI');
         	if($currecntunits<= $miles)
         	{
	         	if($i == $countarray){ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
	         	else{ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
          	}
          	if($currecntunits>=$miles && $currecntunits<=$miles1)
         	{
	         	if($i == $countarray){ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
	         	else{ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
          	}

         	$i++;
         }
         if($displayret=='')
         {
         	 $displayret .= '['.$latitude.','.$longitude.','.'"nogarage",'.'$garage_id"],';
         }
         $displayret=substr($displayret, 0, -1); 
       
         echo $displayret;
    }
     public function getnearst_garages_miles_data($postcode='',$latitude='',$longitude='')
    {
    	 
    	$miles = isset($_GET['miles'])?$_GET['miles']:2;
    	$miles1=  6;
    	$miles2= 10;
    	$displayret='';
    	 $resultarray = array();

         $area_idsss = $this->db->query("SELECT * from garage_details ")->result_array();
         $countarray = count($area_idsss);
         $i=1;
        
         foreach($area_idsss as $data)
         {
            $lat = $data['latitude'];
         	$long = $data['longitude'];
         	$garage_details = $data['garage_id'] ;
         	$garage_id =$data['garage_id'];
         	$garage_name = $data['garage_name'];
         	$average_rating = $data['average_rating'];
         	$garage_photos = $data['garage_photos'];
         	$photos = explode(',',$garage_photos );
         	$photo = $photos[0];
         	$currecntunits = $this->distance_calculator($latitude,$longitude,$lat,$long,'MI');
         	if($currecntunits<= $miles)
         	{
         		 $data['miles'] =$currecntunits;
                $resultarray[] = $data;
 	          
          	}
          	if($currecntunits>=$miles && $currecntunits<=$miles1)
         	{
         		$data['miles'] =$currecntunits;
                $resultarray[] = $data;
            }
            if($currecntunits>=$miles1 && $currecntunits<=$miles2)
         	{
         		$data['miles'] =$currecntunits;
                $resultarray[] = $data;
            }
         	$i++;
         }
       //echo '<pre>';print_r($resultarray) ; echo '</pre>';
         return $resultarray;
    }
 function distance_calculator($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
 	  if ($unit == "K") {
	      return ($miles * 1.609344);
	  } else if ($unit == "MI") {
	      return (($miles * 1.609344)*0.621371);
	  } else if ($unit == "M") {
	      return (($miles * 1.609344)*1000);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	  } else {
	      return $miles;
	  }
}
public function getnearst_garages_display()
{
	    $postcode =$_GET['postcode'];  
    	$latitude = $_GET['latitude'];
    	$longitude = $_GET['longitude'];
    	// $postcode='641047';
         $resuldata1= $resuldata = array();
$valueret='';
    	 $data['base_url'] = base_url().'/';
    	$displayret='';
    	$area_idsss = $this->db->query("SELECT * from garage_details where eir_code = '".$postcode."'")->result_array();
    	//print_r($area_idsss );
    	$countarray = count($area_idsss);
        $resuldata = $this->getnearst_garages_miles_data($postcode,$latitude,$longitude);
        //print_R($resuldata );

        usort($resuldata, function($a, $b) {
          return $a['miles'] <=> $b['miles'];
        });
        //echo '<pre>';print_R($resuldata ); echo '</pre>';
         $i=1;$photo1='assets/front/images/Garage-512.png';
         $valueret  = '  

<div id="sortlist">';
        foreach($resuldata as $data)
        {
             $garage_name = $data['garage_name'];
         	 $average_rating = $data['average_rating'];
         	 $garage_details = $data['garage_id'] ;
         	 $garage_id =$data['garage_id'];
         	 $garage_photos = $data['garage_photos'];
         	 $photos = explode(',',$garage_photos );
         	 $photo = $photos[0];
         	 $miles= $data['miles'];
         	 $valueret .= '<div class="lists" data-miles='.$i.' data-rating='.$average_rating.'>
         	 <div class="row">
            <div class="col-xs-3">';
            $i++;
            if($photo!='') {
                $valueret .= '<img style="width:75%;"  src="'.base_url().'/'.$photo.'"/>';
            }else{  $valueret .= '<img style="width:75%;"  src="'.base_url().'/'.$photo1.'"/>';};

           $valueret .= '</div>
            <div class="col-xs-6">
                <h4>'.$garage_name.'</h4>';

                            $star_count_tol=$average_rating; 
                           $movers_div='';
                           for( $i=1 ; $i<= 5; $i++ )
                           
                            { 
                                if($i <=  $star_count_tol)
                                {  

                                  $valueret .='<input type="hidden" class="stars_count reviews_details" data-value ="'.$star_count_tol.' "> 
                                     <li class="star  stars_count" data-value=" '.$i.' " selected style="list-style: none;float:left;">
                                      <i class="fa fa-star fa-fw" style="color: #579c3a;"></i>
                                       </li>';

                                }
                                else
                                { 

                                   $valueret .='<li style="list-style: none;float:left;color:#c3d9ba;" class="star" data-value="'.$i.' " >
                                     <i class="fa fa-star fa-fw"></i>
                                     </li>';

                                }
                            } 
                           // $valueret .='<span class="reviewcount">'.get_ratecount_garage($garage_id).' '.'Reviews</span>';
                             $valueret .='<br/> <div class="readreviews">
              <a href="'.base_url().'home/garagedetail/'.$garage_id.'/#review"><i class="fa fa-comment" style="padding-right: 3px;"></i> Read review</a>
            </div>';

 
            $valueret .= '</div>
            <div class="col-xs-3">
                <a href="#">Get Quota</a>
            </div>
        </div> </div>';
               
        }
    //    $valueret .= '</ul>';
        //$i=1;
        // $valueret ='<table id="customer_details" class="table table-bordered datatable table-responsive" > 
        //                     <thead  class="thead_styles">
        //                           <tr>
        //                               <th></th>
        //                               <th>Distance</th>
        //                               <th>Rating</th>
        //                               <th></th>
        //                         </tr>
        //                     </thead>
        //                     <tbody>';
         //                    $i=1;$j=5;
         // foreach($area_idsss as $data)
         // {
         // 	$garage_name = $data['garage_name'];
         // 	$average_rating = $data['average_rating'];
         // 	$garage_details = $data['garage_id'] ;
         // 	$garage_id =$data['garage_id'];
         // 	$garage_photos = $data['garage_photos'];
         // 	$photos = explode(',',$garage_photos );
         // 	$photo = $photos[0];
         // 	$valueret .='<tr><td><img src="'.$photo.'"></td>'.'<td>'.$i.'</td>'.'<td>'.$j.'</td></tr>';
         // 	$i++;$j--;
         // }
         // $valueret .='</tbody></table>';
  echo  $valueret;
}
public function getnearst_garages_display_default()
{
	    // $postcode =$_GET['postcode'];  
    	// $latitude = $_GET['latitude'];
    	// $longitude = $_GET['longitude'];
    	 $postcode='641047';
         $resuldata1= $resuldata = array();
$valueret='';
    	 $data['base_url'] = base_url().'/';
    	$displayret='';
    	$area_idsss = $this->db->query("SELECT * from garage_details where eir_code = '".$postcode."'")->result_array();
    	//print_r($area_idsss );
    	$countarray = count($area_idsss);
        $resuldata = $this->getnearst_garages_miles_data($postcode,'11.15937','76.94255');
        //print_R($resuldata );

        usort($resuldata, function($a, $b) {
          return $a['miles'] <=> $b['miles'];
        });
        //echo '<pre>';print_R($resuldata ); echo '</pre>';
         $i=1;$photo1='assets/front/images/Garage-512.png';
         $valueret  = '  

<div id="sortlist">';
        foreach($resuldata as $data)
        {
             $garage_name = $data['garage_name'];
         	 $average_rating = $data['average_rating'];
         	 $garage_details = $data['garage_id'] ;
         	 $garage_id =$data['garage_id'];
         	 $garage_photos = $data['garage_photos'];
         	 $photos = explode(',',$garage_photos );
         	 $photo = $photos[0];
         	 $miles= $data['miles'];
         	 $valueret .= '<div class="lists" data-miles='.$i.' data-rating='.$average_rating.'>
         	 <div class="row">
            <div class="col-xs-3">';
            $i++;
            if($photo!='') {
                $valueret .= '<img style="width:75%;"  src="'.base_url().'/'.$photo.'"/>';
            }else{  $valueret .= '<img style="width:75%;"  src="'.base_url().'/'.$photo1.'"/>';};

           $valueret .= '</div>
            <div class="col-xs-6">
                <h4>'.$garage_name.'</h4>';

                            $star_count_tol=$average_rating; 
                           $movers_div='';
                           for( $i=1 ; $i<= 5; $i++ )
                           
                            { 
                                if($i <=  $star_count_tol)
                                {  

                                  $valueret .='<input type="hidden" class="stars_count reviews_details" data-value ="'.$star_count_tol.' "> 
                                     <li class="star  stars_count" data-value=" '.$i.' " selected style="list-style: none;float:left;">
                                      <i class="fa fa-star fa-fw" style="color: #579c3a;"></i>
                                       </li>';

                                }
                                else
                                { 

                                   $valueret .='<li style="list-style: none;float:left;color:#c3d9ba;" class="star" data-value="'.$i.' " >
                                     <i class="fa fa-star fa-fw"></i>
                                     </li>';

                                }
                            } 
                           // $valueret .='<span class="reviewcount">'.get_ratecount_garage($garage_id).' '.'Reviews</span>';
                             $valueret .='<br/> <div class="readreviews">
              <a href="'.base_url().'home/garagedetail/'.$garage_id.'/#review"><i class="fa fa-comment" style="padding-right: 3px;"></i> Read review</a>
            </div>';

 
            $valueret .= '</div>
            <div class="col-xs-3">
                <a href="#">Get Quota</a>
            </div>
        </div> </div>';
               
        }
    //    $valueret .= '</ul>';
        //$i=1;
        // $valueret ='<table id="customer_details" class="table table-bordered datatable table-responsive" > 
        //                     <thead  class="thead_styles">
        //                           <tr>
        //                               <th></th>
        //                               <th>Distance</th>
        //                               <th>Rating</th>
        //                               <th></th>
        //                         </tr>
        //                     </thead>
        //                     <tbody>';
         //                    $i=1;$j=5;
         // foreach($area_idsss as $data)
         // {
         // 	$garage_name = $data['garage_name'];
         // 	$average_rating = $data['average_rating'];
         // 	$garage_details = $data['garage_id'] ;
         // 	$garage_id =$data['garage_id'];
         // 	$garage_photos = $data['garage_photos'];
         // 	$photos = explode(',',$garage_photos );
         // 	$photo = $photos[0];
         // 	$valueret .='<tr><td><img src="'.$photo.'"></td>'.'<td>'.$i.'</td>'.'<td>'.$j.'</td></tr>';
         // 	$i++;$j--;
         // }
         // $valueret .='</tbody></table>';
  echo  $valueret;
}
 public function getnearst_garages()
    {
    	$postcode =$_GET['postcode'];
    	$latitude = $_GET['latitude'];
    	$longitude = $_GET['longitude'];
    	$displayret='';
        $area_idsss = $this->db->query("SELECT * from garage_details where eir_code = '".$postcode."'")->result_array();
        // print_r($area_idsss);
        $countarray = count($area_idsss);
        $i=1;
          foreach($area_idsss as $data)
         {
         	$lat = $data['latitude'];
         	$longtitue = $data['longitude'];
         	$garage_details = $data['garage_id'] ;
         	$garage_id =$data['garage_id'];
         	
         	if($i == $countarray){ $displayret .= '['.$lat.','.$longtitue.','.'"'.$garage_details.'",'.'"'.$garage_id.'"]';}
         	else{ $displayret .= '['.$lat.','.$longtitue.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
         	$i++;
           }
          if($displayret=='') 
          {
          	    $displayret='';$miles1=10;$miles=5;
		         $area_idsss = $this->db->query("SELECT * from garage_details ")->result_array();
		         $countarray = count($area_idsss);
		         $i=1;
		         foreach($area_idsss as $data)
		         {
		            $lat = $data['latitude'];
		         	$long = $data['longitude'];
		         	$garage_details = $data['garage_id'] ;
		         	$garage_id =$data['garage_id'];
		         	$currecntunits = $this->distance_calculator($latitude,$longitude,$lat,$long,'MI');
		         	if($currecntunits<= $miles)
		         	{
			         	//if($i == $countarray){ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"]';}
			         	//else{ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
 			         	$displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';
		          	}
		          	if($currecntunits>=$miles && $currecntunits<=$miles1)
		         	{
			         	//if($i == $countarray){ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"]';}
			         	//else{ $displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';}
			         	$displayret .= '['.$lat.','.$long.','.'"'.$garage_details.'",'.'"'.$garage_id.'"],';
		          	}

		         	$i++;
		         }
		         if($displayret=='')
		         {
		         	 $displayret .= '['.$latitude.','.$longitude.','.'"nogarage",'.'$garage_id"],';
		         }
		        
          }
          $displayret=substr($displayret, 0, -1); 
      echo $displayret;
    }

 public function requestquota($garage_id)
 {
 	$data['garage_id'] = $garage_id;
 	 $user_id = $this->garage_model->get_userofgarage($garage_id);
 	 $data['user_id']= $this->garage_model->get_userofgarage($garage_id);
 	 $param=array('id_user_master'=>$user_id);
 	 $paramq = array('user_id'=>$user_id,'garage_id'=>$garage_id);
 	 $data['garage_userdetail']=$this->garage_model->getuserdatils($param);
 	 $data['garage_companydetail']=$this->garage_model->getcompanydatils($paramq);
 	  $data['base_url'] = base_url();
	 $data['view_file']  = "garage/quota_request";
	 $this->template->load_frontend_template($data);
 }
 public function garagedetail($garage_id)
 {
 	 $data['garage_id'] = $garage_id;
 	 $user_id = $this->garage_model->get_userofgarage($garage_id);
 	 $data['user_id']= $this->garage_model->get_userofgarage($garage_id);
 	 $param=array('id_user_master'=>$user_id);
 	 $paramq = array('user_id'=>$user_id,'garage_id'=>$garage_id);
 	 $data['garage_userdetail']=$this->garage_model->getuserdatils($param);
 	 $data['garage_companydetail']=$this->garage_model->getcompanydatils($paramq);
 	 $data['about_garage']=$this->garage_model->getAboutDetails(array('user_id' => $user_id ),'row');
 	 $data['reviewsdata'] = $this->garage_model->get_reviews_garage($garage_id);
 	 $data['openingtiming'] = $this->garage_model->get_opening_hours($garage_id);

  	// print_r($data['garage_companydetail']);
  	 $data['base_url'] = base_url();
	 $data['view_file']  = "garage/frontview_details";
	 $this->template->load_frontend_template($data);
  }
 public function check_selected_radius($temp_cart_id){
 	// echo $mover_id;
// print_r($_POST);
 $from_lat = $this->input->post('from_lat');
  $from_lng = $this->input->post('from_lng');
// echo 'result';
if($temp_cart_id!=''){
	$area_idsss = $this->db->query("SELECT service_id from temp_cart where temp_cart_id = '".$temp_cart_id."'")->row();
	 $area_id = $area_idsss->service_id;

$UserareaDetails = $this->db->query("SELECT * from movers_servicearea where area_id = '".$area_id."'")->row();
	// $UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => '116'));
					if($UserareaDetails)
					{

						    // echo"<pre>";		print_r($UserareaDetails); echo"</pre>";
						// foreach ($UserareaDetails as $UserareaDetails) {
							# code...
						
							 $latitude = $UserareaDetails->latitude;
							 $longitude = $UserareaDetails->longitude;
							 $radius = $UserareaDetails->radius;
							 $area_id = $UserareaDetails->area_id;
						// $latitude = 11.3387383;
						// $longitude = 77.16577159999997;
						// $radius = 1000;

							

							if($from_lat !='' && $from_lng != ''){



// $distance=$this->getDistance123( $latitude, $longitude, $from_lat, $from_lng, $radius);
// // print_r($distance);

// if( $distance<= $radius) { 
//     echo 1;
// } else {
//     echo 0;
// }

								 $CalculateDistance =$this->CalculateDistance1($latitude, $longitude, $from_lat, $from_lng,$radius);
								// print_r($CalculateDistance);
								if($CalculateDistance == 1)
								{
								// 	//echo $radius;
								// 	// echo "movers accepted";
								echo 1;	

								// 	/* echo $user_id;*/

						
							
									   
								}
								else{echo 0;}
							}
						// }
					}
				}
 }

public function check_selected_radius_admin($service_id){

$from_lat = $this->input->post('from_lat');
  $from_lng = $this->input->post('from_lng');
// echo 'result';
if($service_id!=''){
	

$UserareaDetails = $this->db->query("SELECT * from movers_servicearea where area_id = '".$service_id."'")->row();
	// $UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => '116'));
					if($UserareaDetails)
					{

						    // echo"<pre>";		print_r($UserareaDetails); echo"</pre>";
						// foreach ($UserareaDetails as $UserareaDetails) {
							# code...
						
							 $latitude = $UserareaDetails->latitude;
							 $longitude = $UserareaDetails->longitude;
							 $radius = $UserareaDetails->radius;
							 $area_id = $UserareaDetails->area_id;
						// $latitude = 11.3387383;
						// $longitude = 77.16577159999997;
						// $radius = 1000;

							

							if($from_lat !='' && $from_lng != ''){



// $distance=$this->getDistance123( $latitude, $longitude, $from_lat, $from_lng, $radius);
// // print_r($distance);

// if( $distance<= $radius) {
//     echo 1;
// } else {
//     echo 0;
// }

								 $CalculateDistance =$this->CalculateDistance1($latitude, $longitude, $from_lat, $from_lng,$radius);
								// print_r($CalculateDistance);
								if($CalculateDistance == 1)
								{
								// 	//echo $radius;
								// 	// echo "movers accepted";
								echo 1;	

								// 	/* echo $user_id;*/

						
							
									   
								}
								else{echo 0;}
							}
						// }
					}
				}
 

}


function CalculateDistance1($lat1, $lon1, $lat2, $lon2,$radius) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  //$unit = strtoupper($unit);

  $distance = ($miles * 1.609344)*1000;
  if($distance <= $radius )
  {
  	// echo 'hiiiiiii';
  	return 1;
  }
  else
  {
  	// echo '0000000000';
  	return 0;
  }

  /*if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "M") {
      return (($miles * 1.609344)*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }*/
}

//  function getDistance123( $latitude, $longitude, $from_lat, $from_lng,$radius ) {  


//   return Math.acos(Math.sin($latitude)*Math.sin($from_lat) + 
//                   Math.cos($latitude)*Math.cos($from_lat) *
//                   Math.cos($from_lng-$longitude)) * $radius;  
// }

	public function compare_movers($random_number = '')
	{
		// echo "<pre>";
		// // print_r($this->session->userdata);
		// print_r($_POST);
		// echo "</pre>";exit;
		if(isset($this->session->userdata['user_id']))
		{

			$user_id = $this->session->userdata['user_id'];
			// $where_array = array('user_id' => $user_id);
			$where_array = array('random_number' => $random_number);
			$getlistresult = $this->booking_model->getDetails('temp_cart',$where_array,'row');

			// echo "sssssssss";
			// print_r($getlistresult);
		}	
		else
		{
			$user_id = '';
			//$getlistresult = '';
			$where_array = array('random_number' => $random_number);
			$getlistresult = $this->booking_model->getDetails('temp_cart',$where_array,'row');

		}

// print_r($user_id);
		//echo "222222222222222222222";

		if(isset($_POST) && !empty($_POST))
		{
			$service_id ='';

			//echo "user_id = ".$user_id;
			   // echo "<pre>";print_r($_POST);echo "</pre>";
			$from_address = $_POST['from_address'];
			// $to_address = $_POST['to_address'];
			$to_address ='';
			$move_date = $_POST['move_date'];
			$from_street_number = $_POST['from_street_number'];
			$from_route = $_POST['from_route'];
			$from_locality = $_POST['from_locality'];
			$from_area1 = $_POST['from_administrative_area_level_1'];
			$from_postal_code = $_POST['from_postal_code'];
			$from_country = $_POST['from_country'];
			$from_lat = $_POST['from_lat'];
			$from_lng = $_POST['from_lng'];
			$to_street_number = $_POST['to_street_number'];
			$to_route = $_POST['to_route'];
			$to_locality = $_POST['to_locality'];
			$to_area1 = $_POST['to_administrative_area_level_1'];
			$to_postal_code = $_POST['to_postal_code'];
			$to_country = $_POST['to_country'];
			$to_lat = $_POST['to_lat'];
			$to_lng = $_POST['to_lng'];
			$direct_url ='';
			$di_user_id ='';

	
// exit();


			if( !empty($_POST['direct_url']) )  {
		 	$direct_url =BASE_URL.'/home/index/'.$_POST['direct_url']; 
		
			$di_user_id1 = $this->db->query("SELECT id_user_master from  user_master  Where  direct_url  ='$direct_url'  and site_admin = '1' and stripe_accountid !='' ")->result_array();
			/*kalai siteadmin added in query*/

			if(!empty($di_user_id1))
			{
				$di_user_id =$di_user_id1[0]['id_user_master'];
				
			}
			
			 // $di_user_id =$di_user_id1->id_user_master;
		}
		

					    $move_date_new = date('D', strtotime($_POST['move_date']) ) ;
			    	
	    // print_r($_POST);

			$time_24_format = explode(' ', $move_date);


			if(!empty($time_24_format))
			{


				 $move_date_check = $time_24_format[0];
				// $time_12hours = $time_24_format[1];
				// $time_12ampm = $time_24_format[2];

			 //    $time_24_format = $time_12hours . $time_12ampm; 



			}
			

			  // $time  = date("H:i", strtotime($time_24_format));


					if($move_date_new  =="Sun") { $get_day_value =0;}
					if($move_date_new  =="Mon") { $get_day_value =1;}
					if($move_date_new  =="Tue") { $get_day_value =2;}
					if($move_date_new  =="Wed") { $get_day_value =3;}
					if($move_date_new  =="Thu") { $get_day_value =4;}
					if($move_date_new  =="Fri") { $get_day_value =5;}
					if($move_date_new  =="Sat") { $get_day_value =6;}


			$insert_array = array('from_address' => $from_address, 'to_address' => $to_address,'move_date' => $move_date, 'from_street_no' => $from_street_number, 'from_route' => $from_route, 'from_locality' => $from_locality, 'from_area1' => $from_area1, 'from_postal_code' => $from_postal_code, 'from_country' => $from_country, 'from_lat' => $from_lat, 'from_lng' => $from_lng, 'to_street_no' => $to_street_number, 'to_route' => $to_route, 'to_locality' => $to_locality, 'to_area1' => $to_area1, 'to_postal_code' => $to_postal_code, 'to_country' => $to_country, 'to_lat' => $to_lat, 'to_lng' => $to_lng,'random_number' => $random_number,'direct_url'=>$direct_url);

			// print_r($insert_array);exit();
			if(!empty($getlistresult) && $user_id !='')
			{
				$temp_cart_id = $getlistresult->temp_cart_id;
				$insert_array['modified_on'] = date('Y-m-d H:i:s');
				$getupdateresult = $this->booking_model->update('temp_cart',$insert_array,$where_array);
			}
			else
			{
				$insert_array['created_on'] = date('Y-m-d H:i:s');
				$insert_array['user_id'] = $user_id;
				$temp_cart_id = $update_result = $this->booking_model->insert('temp_cart',$insert_array);
			}

			$where_array1 = array('temp_cart_id' => $temp_cart_id);

			$movers_ids = array();

		
			 $UserDetails = $this->users_model->getUsers(array('status' => 1,'user_type' => 'movers')); 
			 // echo $this->db->last_query();
			 // exit();


if( !empty($_POST['direct_url']) && ($di_user_id =='') )  {

}

else if($di_user_id =='') {

			if($UserDetails)
			{


				$user_id ='';

	  
				foreach ($UserDetails as $UserDetail) {

					$check_stripe_id = $UserDetail->stripe_accountid;
					// $user_id = $UserDetail->id_user_master;
					if($check_stripe_id!=''){
					 $user_id_new= $UserDetail->id_user_master;
					 /*remove time*/
		// $new_result  = $this->db->query("SELECT  user_id from   movers_days  Where  user_id ='$user_id_new'  AND  day_value ='$get_day_value'  AND ('$time' BETWEEN start_time AND end_time )  AND  status='1' ")->result_array();
/*remove time*/
$new_result  = $this->db->query("SELECT user_id from   movers_days  Where  user_id ='$user_id_new'  AND  day_value ='$get_day_value'  ")->result_array();
}


		if(!empty($new_result))
		{

			$user_id =$new_result[0]['user_id'];
		}


		


		// print_r($user_id);echo 'ksjfh';

					$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $user_id));
					if($UserareaDetails)
					{

						    // echo"<pre>";		print_r($UserareaDetails); echo"</pre>testkalai";
						foreach($UserareaDetails as $UserareaDetail)
						{
							$latitude = $UserareaDetail->latitude;
							$longitude = $UserareaDetail->longitude;
							$radius = $UserareaDetail->radius;
							$area_id = $UserareaDetail->area_id;

							

							if($from_lat !='' && $from_lng != ''){
								$CalculateDistance = CalculateDistance($latitude, $longitude, $from_lat, $from_lng,$radius);

								// print_r($CalculateDistance);

								if($CalculateDistance)
								{
									
									 $service_id =$area_id;

									
								   $movers_ids[] = $user_id;
							
									   
								}
								else
								{
									//echo "movers rejected";
								}
							}
							
						}
					}
				}
			}


		} //check dir url

		else {

$user_id ='';

				 $user_id_new = $di_user_id;
/*remove time*/
		// $new_result  = $this->db->query("SELECT  user_id from   movers_days  Where  user_id ='$user_id_new'  AND  day_value ='$get_day_value'  AND ('$time' BETWEEN start_time AND end_time )  AND  status='1' ")->result_array();
/*remove time*/
$new_result  = $this->db->query("SELECT  user_id from   movers_days  Where  user_id ='$user_id_new'  AND  day_value ='$get_day_value' ")->result_array();
	

		if(!empty($new_result))
		{

			 $user_id =$new_result[0]['user_id'];

		}



					$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $user_id));

					if($UserareaDetails)
					{

						    // echo"<pre>";		print_r($UserareaDetails); echo"</pre>";
						foreach($UserareaDetails as $UserareaDetail)
						{
							$latitude = $UserareaDetail->latitude;
							$longitude = $UserareaDetail->longitude;
							$radius = $UserareaDetail->radius;
							$area_id = $UserareaDetail->area_id;

							

							if($from_lat !='' && $from_lng != ''){
								$CalculateDistance = CalculateDistance($latitude, $longitude, $from_lat, $from_lng,$radius);

								if($CalculateDistance)
								{
									//echo $radius;
									// echo "movers accepted";
									 $service_id =$area_id;

									/* echo $user_id;*/

								   $movers_ids[] = $user_id;
							
									   
								}
								else
								{
									//echo "movers rejected";
								}
							}
							//echo "<br>";
						}
					}

		}


 //exit();


            $movers_ids = array_unique($movers_ids);


            $update_array['movers_ids'] = implode(',',$movers_ids);

			
			$getupdateresult = $this->booking_model->update('temp_cart',$update_array,$where_array1);
           

		

			$update_array['service_id'] = $service_id;
			$getupdateresult = $this->booking_model->update('temp_cart',$update_array,$where_array1);


			
		}
		else if(!empty($getlistresult))
		{
			//echo "ffffffffffffffFFF";
			


			// echo "else ifffff";
			$temp_cart_id = $getlistresult->temp_cart_id;
			$movers_ids = $getlistresult->movers_ids;
			 $movers_ids = explode(',',$movers_ids);
			 //print_r($movers_ids);
			$from_address = $getlistresult->from_address;

	

			    $move_date_new = date('D', strtotime($getlistresult->move_date) ) ;


			    $time_24_format = explode(' ',$getlistresult->move_date);


			if(!empty($time_24_format))
			{


				$move_date_check = $time_24_format[0];
				// $time_12hours = $time_24_format[1];
				// $time_12ampm = $time_24_format[2];

				//  $time_24_format = $time_12hours . $time_12ampm; 



			}


			 // $time  = date("H:i", strtotime($time_24_format));

					if($move_date_new  =="Sun") { $get_day_value =0;}
					if($move_date_new  =="Mon") { $get_day_value =1;}
					if($move_date_new  =="Tue") { $get_day_value =2;}
					if($move_date_new  =="Wed") { $get_day_value =3;}
					if($move_date_new  =="Thu") { $get_day_value =4;}
					if($move_date_new  =="Fri") { $get_day_value =5;}
					if($move_date_new  =="Sat") { $get_day_value =6;}
		}
		else
		{
			redirect(BASE_URL);
		}
		//echo "<pre>";print_r($movers_ids);echo "</pre>";



// exit();


 	$query12 = $this->db->query("SELECT  * from temp_cart Where random_number='".$random_number."'" )->result_array();

 	  // echo "<pre>";print_r($query12); echo "</pre>";

 	if(!empty($query12))
 	{
 		 $data['movers_count_stl'] = $query12[0]['movers_count'];
 		 $data['hours'] = $query12[0]['hours'];
 		 $data['price'] = $query12[0]['price'];
 		 $data['filter_sort'] =$query12[0]['filter_sort'];
 		 $data['sort_by_reviews'] =$query12[0]['sort_by_reviews'];
 		 $data['move_date'] = $query12[0]['move_date'];

 	}
 		// $data['selected_time'] = $time;
		$data['base_url'] = base_url();
		$data['movers_ids'] = $movers_ids;
		$data['temp_cart_id'] = $temp_cart_id;
		$data['random_number'] = $random_number;
		$data['from_address'] = $from_address;

		$filter_helper = 2;
		$filter_hours = 'hour2';
		$filter_sort = '';
		$sort_by_reviews = '';
		



		if(!empty($direct_url )){
			 $direct_url = $direct_url;
		}
		else{
			$direct_url ='';
		}


		// echo $direct_url;
		$data['movers_div'] = $this->movers_compate_template($random_number,$temp_cart_id, $movers_ids,$move_date_new,$filter_helper,$filter_hours ,$filter_sort ,$sort_by_reviews ,$move_date_check,$direct_url);
// echo $move_date_check;

		// $this->movers_compate_template($random_number,$temp_cart_id,$movers_ids,$move_date_new,1,'hour2','','',$move_date_check,$time);
		$data['view_file']  = "movers/compare_movers";

		$this->template->load_frontend_template($data);
	}
	public function pagination(){
		$data['base_url'] = base_url();

		$data['view_file']  = "pages/pagination";
$this->load->view('frontend/pages/pagination',$data);
	}



	public function filter_movers(){
	

		 // echo "<pre>";print_r($this->input->post());echo "</pre>";
		 // exit();
		
		if ($this->input->is_ajax_request())
		{
			$movers_ids = $this->input->post('movers_ids');
			if($movers_ids !='')
			{
			$movers_ids = explode(',', $movers_ids);
			$temp_cart_id = $this->input->post('temp_cart_id');
			$filter_sort = $this->input->post('filter_sort');
			$filter_helper = $this->input->post('filter_helper');
			$filter_hours = $this->input->post('filter_hours');
			$random_number = $this->input->post('random_number');
			$move_date_new = $this->input->post('booking_day_name');
			$sort_by_reviews = $this->input->post('sort_by_reviews');
			$move_date_check = $this->input->post('move_date_stl');
			// $time = $this->input->post('time');
			$direct_url = $this->input->post('direct_url');

			

			$movers_div = $this->movers_compate_template($random_number,$temp_cart_id, $movers_ids,$move_date_new,$filter_helper,$filter_hours , $filter_sort ,$sort_by_reviews ,$move_date_check,$direct_url);
			echo json_encode(array('movers_content' => $movers_div,'status' => 1));
			// exit();
			}
			else
			{
				echo json_encode(array('status' => 2));
			}
		}
		else
		{
			echo json_encode(array('status' => '0'));
		}
		exit;
	}

	public function movers_compate_template($random_number,$temp_cart_id = '',$movers_ids=array(),$booking_day = '',$movers_count = 1,$hour_txt = 'hour2' ,$filter_sort ,$sort_by_reviews,$move_date_check,$direct_url)
	{



		// print_r($movers_ids);
		// echo $filter_sort;
		// exit();

		if($filter_sort == ''){
			$filter_sort = 'highest_rating';
		}
		$movers_div = '';
		$price = '22';
		$booking_day_name  ='';
// echo $booking_day;echo 'test';
$booking_day1 = $booking_day;
		// print_r($movers_ids);
		// echo $direct_url;
		if($direct_url!='')
		{
			// $direct_url123 = explode('/', $direct_url);
			// // print_r($direct_url123[6]);
			//  $direct_url_stl = $direct_url123[6];
		}
		// print_r($movers_ids);
		// echo $move_date_check;


		if($filter_sort  =='highest_rating'){
				$movers_ids = $this->users_model->highest_rating($movers_ids,$movers_count);
				
              }

              if($filter_sort  =='lowest_prcie')
              {

					 $movers_ids = $this->users_model->display_movers_basedon_price($movers_ids,$movers_count);
					  
              }

              if($filter_sort  =='most_completed_jobs'){


					 $movers_ids = $this->users_model->most_completed_jobs($movers_ids);
					 // print_r( $movers_ids);

              }
                  
		 $count_movers =0;
		if(!empty($movers_ids))
		{
			// print_r($movers_ids);
			foreach($movers_ids as $movers_id)
			{

					$count_movers++;


						$reviews123 = $this->db->query("SELECT * from order_details  where mover_id ='".$movers_id."' and star_count!='' order by id DESC limit 10")->result_array();
						
	// print_r($reviews123);
	// foreach ($variable as $key => $value) {
		
	// }


					  $average_reviews = $this->users_model->get_movers_review($movers_id);
					  // print_r($average_reviews);
					  // $star_count = $average_reviews->star_count;
					  if($average_reviews !='')
					  {  

					  	$star = round($average_reviews);
					  	$star_count_tol = $star;

					  }
					  else
					  {
					  	$star_count_tol=0;
					  }

					 

					 // kalai
					  $per_milefee = $this->users_model->get_permile_fee($movers_count,$movers_id);
					  // print_r($per_milefee);
					  if(!empty($per_milefee)){
					  	$mover_permile_fee = $per_milefee->per_mile;
					  	$mover_add_hour = $per_milefee->addtional_hours;
					  }else{
					  	$mover_permile_fee = '';
					  	$mover_add_hour = '';
					  }
								
				$moves_details = $this->users_model->getUsers(array('id_user_master' => $movers_id),'row');
			// print_r($moves_details);
				if($moves_details)
				{

				    $company_name = $moves_details->company_name;

					$abt_content ='';
					$start_time = '0.00';
					$end_time = '0.00';
					$price = 0;


					$moves_abtdetails = $this->movers_model->getAboutDetails(array('user_id' => $movers_id),'row');

					if($moves_abtdetails)
					{
          
						$new_content_stl = $moves_abtdetails->content;

						$abt_content = htmlspecialchars_decode($moves_abtdetails->content);
					}
					

					 if(strlen($abt_content) >=300  ) {
						$abt_content = substr($abt_content, 0, 300) . ' <a href="'.BASE_URL.'/home/movers_profile_details/'.$movers_id.'/profile"  data-toggle="modal" data-target="#movers_profile" style="color: #3ACBCC;">...Read more</a>' ;
                            }



					if($booking_day1  =="Sun") { $booking_day =0; $booking_day_name ="Sun";}
					if($booking_day1  =="Mon") { $booking_day =1; $booking_day_name ="Mon";}
					if($booking_day1  =="Tue") { $booking_day =2; $booking_day_name ="Tue";}
					if($booking_day1  =="Wed") { $booking_day =3; $booking_day_name ="Wed";}
					if($booking_day1  =="Thu") { $booking_day =4; $booking_day_name ="Thu";}
					if($booking_day1  =="Fri") { $booking_day =5; $booking_day_name ="Fri";}
					if($booking_day1  =="Sat") { $booking_day =6; $booking_day_name ="Sat";}





					// $movers_avail_time = $this->movers_model->check_availtime_movers($move_date_check,$movers_id,$time,$booking_day);
						
					// if($movers_avail_time){
						
					// 	$start_time = $movers_avail_time['start_time'];
					// 	$end_time = $movers_avail_time['end_time'];
					// }

					 $movers_avail_time = $this->movers_model->get_availabiltytime($move_date_check,$movers_id,$booking_day);


						
					if($movers_avail_time){
						
						// $start_time = $movers_avail_time['start_time'];
						// $end_time = $movers_avail_time['end_time'];

						$start_end_time = $movers_avail_time['start_end_times'];
						if($start_end_time==''){
							$start_end_time = 'Mover not provide working hours for this day';
						}
					}


					// $moves_daydetails = $this->movers_model->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
					// 	// print_r($movers_id);
					// 	if($moves_daydetails)
					// 	{
							

							

					// 		  $start_time  = date("g A", strtotime("$moves_daydetails->start_time"));
					// 		  $end_time  = date("g A", strtotime("$moves_daydetails->end_time"));
					// 	}

						// $moves_ratedetails = $this->movers_model->getRateDetails(array('user_id' => $movers_id,'movers_count' => $movers_count),'row');
						// if($moves_ratedetails)
						// {
						//  $price12 = $moves_ratedetails->$hour_txt;
						// }comment by kalai for filter hours not wroking


						$get_blocked_days = $this->movers_model->check_move_is_blocked($movers_id,$move_date_check);
						// echo 'blocked days';
						//  print_r($get_blocked_days);
						$get_blocked_days1 =1;
						  if($get_blocked_days)
							{

							  $days_b = $get_blocked_days[0]['mover_id'];

							  if($days_b !='')
							  {
							  	$get_blocked_days1 =0;
							  	// $blockd_mover_idss_day[] = $get_blocked_days[0]['mover_id'];
							  } else { $get_blocked_days1 =1;}

							} 

					// $get_movers_blocked_time = $this->movers_model->check_move_time_is_blocked($movers_id,$time,$move_date_check);

					$movers_blocked_time =0;

					// if($get_movers_blocked_time)
					// {


					// 	 $block_time =$get_movers_blocked_time[0]['block_mover_id'];

					// 	if($block_time !='')
					// 	{
					// 		// echo 'blocked';

					// 		$movers_blocked_time =1;


					// 	}
					// }


					$check_mover_dayis_blocked = $this->movers_model->check_move_date_is_blocked($movers_id,$move_date_check);




							$price_details = $this->movers_model->getMoversratedetails($movers_id,$movers_count);
   						$display =1; 

						if( !empty( $price_details )) {



							$price_value = $price_details[0]['price_value'];
							$movers_min_time = $price_details[0]['movers_min_time'];
							$addtional_hours_money =  $price_details[0]['addtional_hours'];

							$amount = str_replace('$', '', $price_value);

							 $amount = round($amount);

							 $addtional_hours_money = str_replace('$', '', $addtional_hours_money);

							 $addtional_hours_money = round($addtional_hours_money);
 
							  // $hour_txt;
							 // echo $movers_min_time;
							if($hour_txt ==$movers_min_time)

									{ $price =   $amount;}


							else { 

									$min_hour = str_replace('hour', '', $movers_min_time);

									$add_hour = str_replace('hour', '', $hour_txt);
									if($min_hour<$add_hour) 
									{

									$hours =    $add_hour - $min_hour; 
									$price = $amount + $hours * $addtional_hours_money;
			                        
									 // $display =2; 
									 // $lowest_avail_mid[] = $movers_id;

								} else {  
									$display =0; 
									$not_avail_mid[] = $movers_id;  }



							}

						}

						else {$display =0; $not_avail_mid[] = $movers_id;}

						$mover_working_day_availability = $this->db->query("SELECT * from movers_days where user_id = '".$movers_id."' and  day_value ='".$booking_day."' ")->row();
					 $unavailble_mover = '';
					 // $movers_unavailid = '';
					 if(!empty($mover_working_day_availability)){
					 	$mover_day_avail = $mover_working_day_availability->available;
					 	if($mover_day_avail=='no')
					 	{
					 		$display = 5;
					 		
					 		$movers_unavailid[]= $movers_id;

					 	}
					 	
					 	
					 }
						

						
					 // if(!empty($movers_unavailid)){
					 		 
					 // 		 $movers_unavailid_details1 = $movers_unavailid;
					 // 		print_r(array_unique($movers_unavailid_details1));
					 // 	}
						// echo 'test';
// echo $movers_blocked_time;

// $slot_per_style ='';	
		// $mover_info = $this->db->query("SELECT * FROM order_details WHERE mover_id ='".$movers_id."' and star_count !='' ")->result_array();
		// print_r($mover_info) ;

	// echo $star_count = $mover_info->star_count; 
	
// print_r($not_avail_mid);

 if($display ==1 ) {


			 if ($get_blocked_days1 == 0)

    {
    	// echo 'ssss';
			$make_new=""; 
			$clear = '';

	if($count_movers >2) {

			if($count_movers % 2  ==0)
			{

				$make_new="<br>"; 
			} else {$make_new="<br>"; 
			$clear = "<div style='clear:both;'> </div>";

		}
      }

 $movers_div .= ' '.$clear.'<div class="col-md-6 movers_singlediv '.$get_blocked_days1.' ">	
   '.	$make_new.'

   <div  class="solu_title_div">
    <input type="hidden" name="booking_day_name" class="booking_day_name "  value="'.$booking_day_name.'" > 
    <input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url.'">
    
                    		<span class="solu_title">'.$company_name.'</span>
                    		<span class="price"><?php echo $price;?></span>
                		</div>

                		<div  class="available_time" style="  color: #D8000C;
    background-color: #FFD2D2;">
                			<strong>Movers are blocked for that day</strong>
                		</div> </div>';



}	

else if($movers_blocked_time == 1)
{
// echo 'ssssss else part';
		$make_new=""; 
			$clear = '';

	if($count_movers >2) {

			if($count_movers%2 == 0)
			{

				$make_new="<br>"; 
			} else {$make_new="<br>"; 
			$clear = "<div style='clear:both;'> </div>";

		}
      }

 $movers_div .= ' '.$clear.'<div class="col-md-6 movers_singlediv">	
   '.	$make_new.'

   <div  class="solu_title_div">
    <input type="hidden" name="booking_day_name" class="booking_day_name" value="'.$booking_day_name.'" > 
   <input type="hidden" class="move_date_stl" value='.$move_date_check.' >
    <input type="hidden" class = "direct_url" value='.$direct_url.'>
                    		<span class="solu_title">'.$company_name.'</span>
                    		<span class="price"><?php echo $price;?></span>
                		</div>

                		<div  class="available_time" style="  color: #D8000C;
    background-color: #FFD2D2;">
                			<strong>Movers are blocked</strong>
                		</div> </div>';
}


  else {
  	// echo 'hiakjfkdjsjfs';
  	if($get_blocked_days1 !=0){
		$make_new=""; 
		$clear ='';
	if($count_movers >2) {
			if($count_movers % 2  ==0)
			{$make_new="<br>"; 
			} else {$make_new="<br>"; $clear = "<div style='clear:both;'> </div>";} 
			 } 

			 if($sort_by_reviews!=''){
			 	$sort_by_reviews = $sort_by_reviews;
			 }else{
			 	$sort_by_reviews = '';
			 }

							$movers_div .= ' '.$clear.'
					
					<div class="col-md-6 movers_singlediv  '.$movers_id.' '.$move_date_check.'">'.$make_new.'
					<form method="post" class="book_mover" name="book_mover" action="'.BASE_URL.'/home/bookdetails/'.$random_number.'"> 
                               
						<input type="hidden" name="mover_id" class="mover_id" value="'.$movers_id.'">
						 <input type="hidden" class="move_date_stl" value='.$move_date_check.' >
							<input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url.'">
						<input type="hidden" name="movers_count" class="movers_count" value="'.$movers_count.'">
						<input type="hidden" name="hours_txt" class="hour_txt" value="'.$hour_txt.'">
						<input type="hidden" name="price" class="price" value="'.$price.'"> 
						<input type="hidden" name="temp_cart_id" class="temp_cart_id" value="'.$temp_cart_id.'">
						<input type="hidden" name="company_name" value="'.$company_name.'" >
						 <input type="hidden" name="booking_day_name" class="booking_day_name" value="'.$booking_day_name.'" > 
						  <input type="hidden" name="filter_sort" class="filter_sort" value="'.$filter_sort.'" > 
						    <input type="hidden" name="sort_by_reviews" class="sort_by_reviews" value="'.$sort_by_reviews.'" > 
						
                		<div  class="solu_title_div">

                    		<span class="solu_title">'.$company_name.'</span>
                    		<span class="price price_sort" data-price='.$price.'>$'.$price.'</span>
                    		
                    		<?php echo $price;?>



                		</div>

                		
                		                		
                		
                		

                		<div  class="available_time col-md-12" > 
                		<div class="row_start col-sm-4" >';
/*jamuna****************/
         
                        
  /********jamuna**********/                     
                      
                         for( $i=1 ; $i<= 5; $i++ )
                           
                            { 
                                if($i <=  $star_count_tol)
                                {  

                                	$movers_div .='<input type="hidden" class="stars_count reviews_details" data-value ="'.$star_count_tol.' "> 
                                     <li class="star  stars_count" data-value=" '.$i.' " selected style="list-style: none;float:left;">
                                      <i class="fa fa-star fa-fw" style="color: gold;"></i>
                                       </li>';

                                }
                                else
                                { 

                                   $movers_div .='<li style="list-style: none;float:left;color:black" class="star" data-value="'.$i.' " >
                                     <i class="fa fa-star fa-fw"></i>
                                     </li>';

                             }


                            } 

            

	  
                           
                	     
                		      
                		$movers_div .='</div>

                		<input type="hidden" name="temcart_availtime" value="'.$start_end_time.' ">
                			<strong class="col-sm-8" style="text-align:right;">Available to work: '.$start_end_time.'</strong>

                		

                		</div>
                		<div class="col-md-12" style="  border-left: 1px solid #ffd8d8;
border-right: 1px solid #ffd8d8;background-color: #ffd8d8;height: 50px;padding: 10px;text-align: center;color:#8E1541;line-height: 29px;
    font-size: 13px;">
                		
<span class="col-sm-5" style="text-align: left;
    font-weight: bold;" >Per Mile Fee: '.$mover_permile_fee.'</span><span class="col-sm-7" style="text-align: right;
    font-weight: bold;" >Additional Hours Rate: $'.$mover_add_hour.'</span>
                		</div>
                		

                    <div class="col-md-12" style="   border: 1px solid #e5e5e5;background-color: white;">

                           
                            <div class="col-md-12"  style=" font-size: 12px; display: inline-block;margin-top: 15px;">
                            
                            <div class="abt_us_stl" style=" height: 80px;">

                            <span >
                                   '.$abt_content.'

                             </span>
                             </div>
                                <div class="col-md-12 review_cont_atag" style="margin-bottom: 10px;" >
                                <div class="row">
                        <div class="col-md-6 mover_read_review">
                        <a href="'.BASE_URL.'/home/movers_profile_details/'.$movers_id.'/review/'.$random_number.'" data-toggle="modal" data-target="#movers_profile"><i class="fa fa-comment" style="padding-right: 3px;"></i>Read Reviews</a>
                        </div>
                        <div class="col-md-6 mover_view_full_profile">
                       

                        <a href="'.BASE_URL.'/home/movers_profile_details/'.$movers_id.'/profile/'.$random_number.'"  data-toggle="modal" data-target="#movers_profile"><i class="fa fa-user" style="padding-right: 3px;"></i>View Full profile</a>
                        </div>
                        </div>
                        
                                
</div>

                            </div>    

                       
                    </div>
                <div class="col-md-12" style="border: 1px solid #e5e5e5; text-align: center;">
            
                     <button type="submit" class="book_this_btn" >BOOK THIS Mover</button>

                 </div>
                

</form>
       
       </div>'; 
}

          
   }




   }

   

    	// }
    	// kalai
				}


				else {
					$direct_url_stl123='';
		if(empty($movers_ids)){
				if($direct_url!=''){
				$direct_url123 = explode('/', $direct_url);
				// print_r($direct_url123[6]);
				 $direct_url_stl = $direct_url123[6];
				 if($direct_url_stl!=''){
				 	$direct_url_stl123 = $direct_url_stl; 
				 }else{
				 	$direct_url_stl123='';
				 }
			}
		}
		

						$movers_div .= '<br><div class="col-md-6 movers_singlediv" style="background-color: #FFD2D2;    background: #ddd url('.BASE_URL.'/assets/front/images/no_movers.png) center 30px no-repeat;
    padding: 180px 0 300px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
    width: 100%;
    box-shadow: 0 1px 4px rgba(0,0,0,.3), 0 0 40px rgba(0,0,0,.1) inset;">	
           
    			<input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url_stl123.'">
				<h4 style="color:black;  font-weight: bold; padding-top: 12%;">Alas, we could not find any service providers in this area. Inconceivable! Perhaps try a different zip code?.</h4>	
				</div>';

				}
			}



		}


		else {
			$direct_url_stl123='';
			if(empty($movers_ids)){
				if($direct_url!=''){
			// print_r($direct_url);
						$direct_url123 = explode('/', $direct_url);
						// print_r($direct_url123[6]);
						 $direct_url_stl = $direct_url123[6];
						 if($direct_url_stl!=''){
						 	$direct_url_stl123 = $direct_url_stl; 
						 }else{
						 	$direct_url_stl123='';
						 }
			  }
			}
		
			
			$movers_div .= '<br><div class="col-md-6 movers_singlediv" style="background-color: #FFD2D2;    background: #ddd url('.BASE_URL.'/assets/front/images/no_movers.png) center 30px no-repeat;
    padding: 180px 0 300px;
    margin-bottom: 20px;
    font-weight: bold;
    text-align: center;
    width: 100%;
    box-shadow: 0 1px 4px rgba(0,0,0,.3), 0 0 40px rgba(0,0,0,.1) inset;">	
            
    			<input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url_stl123.'">
				<h4 style="color:black;  font-weight: bold; padding-top: 12%;">Alas, we could not find any service providers in this area. Inconceivable! Perhaps try a different zip code?.</h4>	
				</div>';
		}




if(!empty($movers_unavailid)){
			
			foreach (array_unique($movers_unavailid) as $key => $value) {
				// echo 'sss';
			$make_new=""; 
    			$clear = '';

	if($count_movers >2) {

			if($count_movers % 2  ==0)
			{

				$make_new="<br>"; 
			} else {$make_new="<br>"; 
			$clear = "<div style='clear:both;'> </div>";

		}
      }


$moves_details = $this->users_model->getUsers(array('id_user_master' => $value),'row');
			// print_r($moves_details);
				

				    $company_name = $moves_details->company_name;

   $movers_div .= ' '.$clear.'<div class="col-md-6 movers_singlediv ">	
   '.	$make_new.'

   <div  class="solu_title_div">
    <input type="hidden" name="booking_day_name" class="booking_day_name" value="'.$booking_day_name.'" > 
        <input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url.'">

                    		<span class="solu_title">'.$company_name.'</span>
                    		
                		</div>

                		<div  class="available_time" style="  color: #D8000C;
    background-color: #FFD2D2;">
                			<strong>Movers unavailable on that day.</strong>
                		</div> </div>';

		}

	}


		if(!empty($not_avail_mid)){

			if(!empty($movers_unavailid))
			{
				foreach ($not_avail_mid as $key => $value1) 
				{
					if(!in_array($value1, $movers_unavailid))
					{
						$not_avail_mid_corrected[] = $value1;
					}
				}
			}else{
				$not_avail_mid_corrected = $not_avail_mid;
			}
		if(!empty($not_avail_mid_corrected)){
			foreach (array_unique($not_avail_mid_corrected) as $key => $value) {
				
			$make_new=""; 
    			$clear = '';

	if($count_movers >2) {

			if($count_movers % 2  ==0)
			{

				$make_new="<br>"; 
			} else {$make_new="<br>"; 
			$clear = "<div style='clear:both;'> </div>";

		}
      }


$moves_details = $this->users_model->getUsers(array('id_user_master' => $value),'row');
			// print_r($moves_details);
				

				    $company_name = $moves_details->company_name;

   $movers_div .= ' '.$clear.'<div class="col-md-6 movers_singlediv ">	
   '.	$make_new.'

   <div  class="solu_title_div">
    <input type="hidden" name="booking_day_name" class="booking_day_name" value="'.$booking_day_name.'" > 
        <input type="hidden" name="direct_url" class="direct_url" value="'.$direct_url.'">

                    		<span class="solu_title">'.$company_name.'</span>
                    		
                		</div>

                		<div  class="available_time" style="  color: #D8000C;
    background-color: #FFD2D2;">
                			<strong>Does not offer that number of movers</strong>
                		</div> </div>';

		}
	}

	}  
	

	
			// print_r($not_avail_mid);

	 return $movers_div;
      
       
 		
	} 



	public function bookdetails($random_number = '',$param=''){



		if(isset($_POST) && !empty($_POST))
		{

	// exit();
			$mover_id = $_POST['mover_id'];
			$movers_count = $_POST['movers_count'];
			$hours_txt = $_POST['hours_txt'];
			$price = $_POST['price'];
			$temp_cart_id = $_POST['temp_cart_id'];
			$filter_sort =$_POST['filter_sort'];
			$sort_by_reviews =$_POST['sort_by_reviews'];
			$check_availtime_showed = $_POST['temcart_availtime'];

			$update_array['selected_moversid'] = $mover_id;
			$update_array['movers_count'] = $movers_count;
			$update_array['hours'] = $hours_txt;

			$update_array['price'] = $price;
			$update_array['filter_sort'] = $filter_sort;
			$update_array['sort_by_reviews'] = $sort_by_reviews;
			$update_array['showed_avail_time'] = $check_availtime_showed;
			$update_array_new =array( 
					'selected_moversid' =>$_POST['mover_id'],
					'movers_count'      => $_POST['movers_count'] , 
					'hours' => $_POST['hours_txt'], 
					'price'       => $_POST['price'],
					'company_name' => $_POST['company_name'],
					'filter_sort' => $_POST['filter_sort'],
					'sort_by_reviews' => $_POST['sort_by_reviews'],
					'showed_avail_time'  => $_POST['temcart_availtime']
					);
			//$getupdateresult = $this->booking_model->update('temp_cart',$update_array,array('random_number' => $random_number));

			$this->booking_model->update_temp_cart($random_number,$update_array_new);






		}
		if($param!=''){
			$data['backoption']=1;
		}
		//echo "<pre>";print_r($movers_ids);echo "</pre>";
		$data['base_url'] = base_url();
		//$data['movers_ids'] = $movers_ids;
		$data['random_number'] = $random_number;

		$get_move_date  = $this->booking_model->get_move_date($random_number);
		

		if(!empty( $get_move_date)) {
			// echo $get_move_date[0]['showed_avail_time'];
			$data['back_to_booking'] = $this->booking_model->get_failiure_details($random_number,$get_move_date[0]['selected_moversid']);

				$data['selected_moversid'] =$get_move_date[0]['selected_moversid'];
				$data['movers_ids'] = $get_move_date[0]['movers_ids'];
				$data['movers_count'] = $get_move_date[0]['movers_count'];
				$data['hours'] = $get_move_date[0]['hours'];
				$data['hours_change'] = $get_move_date[0]['hours'];
				$data['price'] = $get_move_date[0]['price'];
				$data['company_name'] = $get_move_date[0]['company_name']; 
				$data['move_date'] = $get_move_date[0]['move_date'];
				$data['temp_cart_id'] = $get_move_date[0]['temp_cart_id'];
				$data['filter_sort'] = $get_move_date[0]['filter_sort'];
				$data['showed_avail_time'] = $get_move_date[0]['showed_avail_time'];
				$arr_user_id =$get_move_date[0]['selected_moversid'];

		

		 	 $arraival_time =date("D",strtotime($get_move_date[0]['move_date']));

		 	if($arraival_time  =="Sun") { $get_day_value =0;}
					if($arraival_time  =="Mon") { $get_day_value =1;}
					if($arraival_time  =="Tue") { $get_day_value =2;}
					if($arraival_time  =="Wed") { $get_day_value =3;}
					if($arraival_time  =="Thu") { $get_day_value =4;}
					if($arraival_time  =="Fri") { $get_day_value =5;}
					if($arraival_time  =="Sat") { $get_day_value =6;}

				

					$result_arrival = $this->db->query("SELECT start_time,end_time FROM movers_days WHERE user_id='$arr_user_id' AND 	day_value ='$get_day_value' AND status='1' ")->row();

				 	$data['hour12_format_start_time_fixed'] =$result_arrival->start_time;

					     $data['hour12_format_start_time']  = date("g A", strtotime("$result_arrival->start_time"));
					     $data['hour12_format_end_time']  = date("g A", strtotime("$result_arrival->end_time"));

				$data['times_stl'] =array('12 AM' ,'1 AM','2 AM','3 AM','4 AM','5 AM','6 AM','7 AM' ,'8 AM' ,'9 AM','10 AM','11 AM',
					  					'12 PM','1 PM','2 PM','3 PM','4 PM','5 PM','6 PM','7 PM','8 PM','9 PM','10 PM','11 PM');

		} 

		//$data['from_address'] = $from_address;
		//$data['movers_div'] = $this->movers_compate_template($temp_cart_id,$movers_ids,4,1,'hour1');
		$data['base_url'] = base_url();
		$data['view_file']  = "movers/bookdetails";

		$this->template->load_frontend_template($data);
		//echo "<pre>";print_r($_POST);echo "</pre>";
	}
	public function about()
	{	

		$data['base_url'] = base_url();
		$data['view_file']  = "pages/about";

		$this->template->load_frontend_template($data);
	}
	// public function contact()
	// {	

	// 	$data['base_url'] = base_url();
	// 	$data['view_file']  = "pages/contact";

	// 	$this->template->load_frontend_template($data);
	// }
	public function contact_details()
	{	

		$data['base_url'] = base_url();
		$data['view_file']  = "pages/contact_login";

		$this->template->load_frontend_template($data);
	}
		public function movers_register()
	{	

		$data['base_url'] = base_url();
		$data['view_file']  = "pages/movers_register";

		$this->template->load_frontend_template($data);
	}
public function custm_contact_details()	{


	// print_r($_FILES); echo 'filesssssss';
	// print_r($_POST);exit();
// 	$target_dir = "./uploads/contactus/";
// $target_file = $target_dir . basename($_FILES["attached_file"]["name"]);
// $uploadOk = 1;
// if (move_uploaded_file($_FILES["attached_file"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["attached_file"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
	$contact_message='';
$filename='';
if(isset($_FILES["attached_file"]["name"])){
	$milliseconds = round(microtime(true) * 1000);
		$milliseconds = number_format($milliseconds, 0, '.', '');	
		$target_dir = "uploads/contactus/";
		$target_file = $target_dir . basename($_FILES["attached_file"]["name"]);
		
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["attached_file"]["tmp_name"], 'uploads/contactus/'.$milliseconds.'.'.$imageFileType);
		$filename = 'uploads/contactus/'.$milliseconds.'.'.$imageFileType;
	}
	else{
		$filename = '';
	}
	// exit();
	 $contact_email=$this->input->post('contact_email');
	 $contact_subject=$this->input->post('contact_subject');
	 $contact_name=$this->input->post('contact_name');
	 $contact_message=$this->input->post('contact_message');
		$data = array(
        'contact_name'=>$contact_name,
        'contact_email'=>$contact_email,
        'contact_subject'=>$contact_subject,
        'contact_message'=>$contact_message,
        'attached_file'=>$filename
    );
	$contact_det=$this->db->insert('contact_details',$data);

$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$to = MAIL_ID_FROM;
		// More headers
		$headers .= 'From: '.$contact_name.'<'.$contact_email.'>' . "\r\n";
		 // $headers .= 'Bcc: kalaivani@stallioni.com' . "\r\n";
		$headers .= 'Bcc: support@hiremovers.org' . "\r\n";
		// $headers .= 'Cc: kalaiponnusamy94@gmail.com' . "\r\n";
		// $headers .= 'Cc: support@hiremovers.org' . "\r\n";
if(isset($_FILES["attached_file"]["name"])){

	if($_FILES["attached_file"]["name"]!=''){

		$contact_message = $contact_message .'<br><br>
	
<img src=" '.BASE_URL.'/'.$filename.'" style="width:100px; height:80px;">';

	}	
	}
	else{
		$contact_message = $contact_message;
	}
mail($to,$contact_subject,$contact_message,$headers);
echo 1;
// if(mail($from_id,$contact_subject,$contact_message,$headers)){echo 'mail send' ;}else{echo 'mail not send';}

}
	



function send_contact_mail($contact_id='',$from_name='',$from_id=''){
	// $ci=& get_instance();
	// echo $contact_id;
	// echo $from_id;echo $from_name;
	$mail_content=$this->db->query("SELECT * from contact_details where contact_id='".$contact_id."'");
	$mail_detais=$mail_content->row();
	// echo$contact_name=$mail_detais->contact_name;
	// print_r($mail_detais);
	// exit();
  $contact_name=$mail_detais->contact_name;
 $cutomer_email=$mail_detais->contact_email;
 $mail_subject=$mail_detais->contact_subject;
 $mail_message=$mail_detais->contact_message;
// exit();
$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: '.$cutomer_email.'<'.$contact_name.'>' . "\r\n";
		// $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		// $headers .= 'Cc: kalaiponnusamy94@gmail.com' . "\r\n";
		$headers .= 'Cc: support@hiremovers.org' . "\r\n";

		if(mail($from_id,$mail_subject,$mail_message,$headers)){echo 'mail send' ;}else{echo 'mail not send';}
	
	
 return true;
 // redirect('home/contactus_details');

}
public function get_country(){

	// print_r($_POST);

if(isset($_POST["country"])){
    // Capture selected countr
    $country = $_POST["country"];
    $state = (isset($_POST["state"]))?$_POST["state"]:'';
     
    // Define country and city array
    $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California"),
                    "india" => array("Mumbai", "New Delhi", "Bangalore"),
                    "uk" => array("London", "Manchester", "Liverpool")
                );
     
    // Display city dropdown based on country name
    if($country !== ''){
        
        foreach($countryArr[$country] as $value){
        	($state ==$value )?$selected='selected':'';
            echo "<option value='".$value."' ".$selected.">". $value . "</option>";
        }
        
    } 
    else{
    	echo "<option>select country first</option>";
    }
}	
}
public function mover_details(){

	
		$milliseconds = round(microtime(true) * 1000);
		$milliseconds = number_format($milliseconds, 0, '.', '');	
		$target_dir = "uploads/images/";
		$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
		$id_proof_file = $target_dir . basename($_FILES["variousfiles"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$id_proof_filetype = strtolower(pathinfo($id_proof_file,PATHINFO_EXTENSION));
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = lcfirst($first_name.' '.$last_name);
		// $country=$_POST['country'];
	    $user_type='movers';
		$email = $_POST['email_mover'];
		$phone = $_POST['phone'];
		$password = sha1($_POST['password']);
		$confirm_pass = $_POST['confirm_pass'];
		$company_name=$_POST['company_name'];
		// $state=$_POST['state'];
		$address=$_POST['address_mover'];
		$year_found=$_POST['year_found'];
		


		$check="SELECT * FROM user_master WHERE email = '".$email."' ";
		$validation = $this->db->query($check)->result_array();

// print_r($validation);
if(!empty($validation)) {
	  
	    $message = "<div class='alert alert-danger'>Email id already exits.</div>";
		$success_status = 0;
	    
	    
				}

else{
	
	$proof_ids = uniqid();

	$val1 =explode('@' , $email);

$direct_url =$val1 [0];
$direct_url =BASE_URL.'/home/index/' .$direct_url;
	
		$this->db->insert('user_master',array('first_name' =>$first_name,'last_name' =>$last_name,'username'=>$username,'user_type' =>$user_type,'email' =>$email,'password' =>$password,'phone' =>$phone,'company_name'=>$company_name,'address'=> $address,'year_found'=>$year_found, 'profile_image' =>'uploads/images/'.$milliseconds.'.'.$imageFileType,'id_proof'=>'uploads/images/'.$proof_ids.'.'.$id_proof_filetype,'created_on'=>date('Y-m-d H:i:s' ) , 'direct_url' => $direct_url));

		
		move_uploaded_file($_FILES["userfile"]["tmp_name"], 'uploads/images/'.$milliseconds.'.'.$imageFileType);
		move_uploaded_file($_FILES["variousfiles"]["tmp_name"], 'uploads/images/'.$proof_ids.'.'.$id_proof_filetype);
		$insert_id = $this->db->insert_id();
		$login_type = 'Movers';
		$email_id = $email;
		$subject = 'Registration mail';
		$content = 'You have registered successfully.you can login after admin approval.';
		$confirm_password = $confirm_pass;


		// $this->db->insert('user_meta',array('id_user_master' =>$insert_id,'meta_key' =>'gender','meta_value' =>$gender ));

		// $this->db->insert('user_meta',array('id_user_master' =>$insert_id,'meta_key' =>'company_name','meta_value' =>$company_name ));


		// $this->db->insert('user_meta',array('id_user_master' =>$insert_id,'meta_key' =>'web_address','meta_value' =>$web_address ));
		// $this->db->insert('user_meta',array('id_user_master' =>$insert_id,'meta_key' =>'year_found','meta_value' =>$year_found ));

	// exit();year_found
		$this->users_model->send_mail_to_loginuser($login_type ,$email_id,$subject,$content,$confirm_password,$insert_id);
		$message = "<div class='alert alert-success'>Registered Successfully.You can login after admin approval.</div>";
		$success_status = 1;

	}

	echo json_encode(array('message' =>$message,'success_status' => $success_status));
		exit;
}

public function dashboard(){
	// print_r($_POST);exit();
		$data['base_url'] = base_url();
		$data['view_file']  = "pages/user_dashboard";

		$this->template->load_frontend_template($data);
}


public function manage_profile(){
	if($this->session->userdata('user_type')!='customer')
		redirect(BASE_URL);
	$param1 = $_POST['curent_login_id'];
	$param2 = $_POST['update_profile_info'];
	
	// print_r($_POST);exit();
		if($param2=='update_profile_info'){
			
				// if ($_FILES['userfile']['size'] != '')
				// {
				// 	   		$milliseconds = round(microtime(true) * 1000);
				// 			$milliseconds = number_format($milliseconds, 0, '.', '');


				// 	$target_dir = "uploads/images/";
				// 	$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
				// 	$uploadOk = 1;
				// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					
		

				// 	move_uploaded_file($_FILES["userfile"]["tmp_name"], 'uploads/images/'.$milliseconds.'.'.$imageFileType);

				// 	$data['profile_image']='uploads/images/'.$milliseconds.'.'.$imageFileType;
					    
				// }
				// else{
				// 	$data['profile_image']=$this->input->post('old_profile_image');
				// }

				// if ($_FILES['variousfiles']['size'] != '')
				// {
					   		
				// 	$milliseconds1 = uniqid();
				// 	$milliseconds =md5($milliseconds1);

				// 	$target_dir = "uploads/images/";
				// 	$target_file = $target_dir . basename($_FILES["variousfiles"]["name"]);
				// 	$uploadOk = 1;
				// 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// 	move_uploaded_file($_FILES["variousfiles"]["tmp_name"], 'uploads/images/'.$milliseconds.'.'.$imageFileType);

				// 	$data['id_proof']='uploads/images/'.$milliseconds.'.'.$imageFileType;
					    
				// }
				// else{
				// 	$data['id_proof'] = $this->input->post('old_id_proof');
				// }
				



					
					$data['phone'] = $this->input->post('phone');
					$data['address'] = $this->input->post('address');
					// $data['country'] = $this->input->post('selectcountry');
					// $data['state'] = $this->input->post('select_city_value');
					

					$this->db->where('id_user_master', $param1);
					$value = $this->db->update('user_master',$data);
					
					// echo $value;
					
					if($value==1){
					echo 1;
					
					}
					else{
					echo 0;
					
					}

					
// redirect(BASE_URL.'/home/user_profile/' );	

					// redirect(BASE_URL.'/home/user_profile/'.$message, 'refresh' );	
				}
					
	if($param2=='change_password'){
				$data['password']             = sha1($this->input->post('password'));
				$data['new_password']         = sha1($this->input->post('new_password'));
				$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

				$current_password = $this->db->get_where('user_master', array(
					'id_user_master' => $param1
				))->row()->password;
				if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
					$this->db->where('id_user_master', $param1);
					$this->db->update('user_master', array(
						'password' => $data['confirm_new_password']
					));
					echo 1;
				} else {
					echo 0;
				}
				
	}	


}

/**** hemalatha ****/


public function checkout($random_number)
{
//   print_r($_POST);

// exit();
if(!empty($_POST)){
  $token  = $this->input->post('stripeToken');

  //print_r($_POST);
   $loading_type =  implode(",",$_POST['loading_type'] );
  
if (array_key_exists('loading_by', $_POST) == FALSE ) 
{ $loading_by  =''; } 
if ( array_key_exists('loading_by', $_POST) == TRUE ) 
{  $loading_by =  implode(",",$_POST['loading_by'] ); }

if ( array_key_exists('location_loading', $_POST) == FALSE )
 {$location_loading  =''; } 

if ( array_key_exists('location_loading', $_POST) == TRUE ) {
$location_loading  =$_POST['location_loading']; } 


if ( array_key_exists('loading_location', $_POST) == FALSE )
 {$loading_location  =''; } 

if ( array_key_exists('loading_location', $_POST) == TRUE ) {
$loading_location  =$_POST['loading_location']; } 


if ( array_key_exists('unloading_location', $_POST) == FALSE )
 {$unloading_location  =''; } 

if ( array_key_exists('unloading_location', $_POST) == TRUE ) {
$unloading_location  =$_POST['unloading_location']; } 


// echo $total =$_POST['total_cost']; echo 'kjkkkkkkkkkkkk';
 $striparray= array();

	if(!empty($token)) {

		 require_once(APPPATH.'libraries/stripe/init.php');

			$total =$_POST['total_cost'];
			$price =round($total * 100);
				
					    $secret = STRIPE_SECRET_API_KEY;  // you can get it in Stripe account settings

					    // $secret = 'sk_live_U6wd7u76sNotSrMW4lLMkwgz'; hiremover live account
			\Stripe\Stripe::setApiKey( $secret );
			 
			try {
				if (!isset($token))
					throw new Exception('The Stripe Token was not generated correctly');
				$charge = \Stripe\Charge::create( array( 'amount' => $price , 'currency' => 'usd', 'source' => $token, 'description' => ' Marketplace'  ) );
		             	 $returnlog1=array();
                         $returnlog = $charge->jsonSerialize();
                         $dataentry = Serialize( $returnlog);
                        // echo '<pre>';print_r($returnlog);echo '</pre>'; 
                 
				 $success = 'Your payment was successful.';

				 $Payment_status ='Payment Success';

				  $striparray['stripeid'] = $returnlog['id'];
				  $striparray['object'] = $returnlog['object'];
				  $striparray['amount_refunded'] = $returnlog['amount_refunded'];
				  $striparray['balance_transaction'] =  $returnlog['balance_transaction'];
				  $striparray['outcome'] = $returnlog['outcome']['seller_message'];
				  $striparray['refunds'] = $returnlog['refunds']['url'];
				  $striparray['source'] = $returnlog['source']['id'];
				  $striparray['status'] =  $returnlog['status'];

                /**************** refund**************/
			    // $refund = \Stripe\Refund::create([
				   //  'charge' => $stripeid,
				   //  'amount' => 2000,
			    // ]);

              // print_r($refund);
              // exit;
				/* 
				 * do some stuff here - you can send the plugin by email or force download it
				 */
			} catch (Exception $e) {
				/*
				 * if something went wrong
				 */ 
				//echo $e->getMessage();

				$Payment_status ='Payment Failed';
			}

			
	}


	$stripe_token = $token;




	// print_r($Payment_status);echo 'jjjjjjjjj';
	// exit();

 $latitude =$this->db->query("SELECT from_lat,from_lng,service_id,direct_url FROM   temp_cart  where random_number ='$random_number'")->result_array();

 // print_r($latitude);
 // exit();

 if(!empty($latitude))
 {
 	 $from_lat =$latitude[0]['from_lat'];
 	 $from_lng =$latitude[0]['from_lng'];
 	 $service_id =$latitude[0]['service_id'];
 	 $direct_url =$latitude[0]['direct_url'];

 }
$check_mail = $_POST['b_email'];
$usernames = $_POST['b_First_name'].' '. $_POST['b_Last_name'];
$check_availability = $this->booking_model->check_avail_mail($check_mail);
if(empty($check_availability)){
	$insert_datas = array(
		'first_name'=>$_POST['b_First_name'],
		'last_name' => $_POST['b_Last_name'],
		'username'=> $_POST['b_First_name'].' '. $_POST['b_Last_name'],
		'email' => $check_mail,
		'phone'=>$_POST['b_Phone_no'],
		'user_type'=>'customer',
		'address'=>$_POST['billing_address'],
		'created_on' =>date('Y-m-d H:i:s'),
		'site_admin' =>1 
		);
	$insert_customer = $this->booking_model->add_customer($insert_datas,$check_mail,$usernames);


	// exit();
}
// $insert_datas ='';
// $check_mail ='kalaiponnusamy94@gmail.com';
// $usernames = 'kalaivani';
// $insert_customer = $this->booking_model->add_customer($insert_datas,$check_mail,$usernames);
// exit();

 $get_customer_id = $this->db->query("SELECT id_user_master from user_master where email ='".$_POST['b_email']."' and user_type='customer'")->row();
 if($get_customer_id!=''){
 	$customer_id = $get_customer_id->id_user_master;
 }
 // else{
 // 	$customer_id=$_POST['customid'];
 // }
 				// echo $direct_url;echo 'kkkkkkkkk'	;
 					// print_r($customer_id);exit();
 					$data_insert = array(
					'random_number'=>$_POST['random_number'],
					'direct_url' => $direct_url,
					'move_date'=>$_POST['move_date'],
					'movers_count'=>$_POST['movers_count'],
					'hours'=>$_POST['hours'],
					'arrival_time'=>$_POST['arrival_time'],
					'loading_type'=>$loading_type,
					'loading_by'=>$loading_by,
					'customer_id'=>$customer_id,
					 'additional_details' =>$_POST['additional_details'],
				
					'company_name' =>$_POST['company_name'],
					'stripeToken' =>$token,
					'Payment_status' =>$Payment_status,
					'price' =>$_POST['price'],
					'distance'=>$_POST['mile_distance'],
					'per_mile_cost'=>$_POST['per_mile_fee'],
					'final_price'=>$_POST['total_cost'],




					'mover_id' =>$_POST['selected_moversid'],

					'location_loading'=>$location_loading,
					'loading_location'=>$loading_location,
					'unloading_location'=>$unloading_location,

					'location_loading_address' =>$_POST['location_loading_address'],
					'location_loading_apt'=>$_POST['apt_suite_unit'],
					// 'location_loading_city'=>$_POST['location_loading_city'],
					// 'location_loading_state'=>$_POST['location_loading_state'],

					'loading_address' =>$_POST['loading_address'],
					'loading_apt'=>$_POST['loading_apt'],
					// 'loading_city'=>$_POST['loading_city'],
					// 'loading_state'=>$_POST['loading_state'],


					'unloading_address' =>$_POST['unloading_address'],
					'unloading_apt'=>$_POST['unloading_apt'],
					// 'unloading_city'=>$_POST['unloading_city'],
					// 'unloading_state'=>$_POST['unloading_state'],

					'b_First_name' =>$_POST['b_First_name'],
					'b_Last_name'=>$_POST['b_Last_name'],
					'b_email'=>$_POST['b_email'],
					'b_Phone_no'=>$_POST['b_Phone_no'],
					'b_street' =>$_POST['billing_address'],
					// 'b_city'=>$_POST['b_city'],
					// 'b_state'=>$_POST['b_state'],
					// 'b_zip'=>$_POST['b_zip'],
					// 'customer_id' =>$_POST['customid'],
					'from_lat' =>$from_lat,
					'from_lng' =>$from_lng,
					'service_id'=>$service_id,
					'created_on' =>date('Y-m-d H:i:s'),
					// 'order_status' =>'Request', $Payment_status
					'order_status' =>$Payment_status,
					'modified_on' =>''

                       );
 
					$current_date =date('d-m-Y');
                
    //             print_r($data_insert);
				// exit();	

	 $check_random_numer =$this->db->query("SELECT * FROM order_details  where  random_number ='$random_number'")->result_array();
    

			 	if(!empty($check_random_numer))
			 	{
			 		
			 		$this ->db->where('random_number', $random_number);
		      $this ->db->update('order_details',$data_insert);
			 	}
			 	else { 
			 	$this->db->insert('order_details',$data_insert);
			 	if($Payment_status!='Payment Failed'){
			 		
			 	$this ->db-> where('random_number', $random_number);
               $this ->db-> delete('temp_cart');
           }

		     }


						$data['Payment_status'] =$Payment_status;
						$data['stripe_token'] =$stripe_token;
						$data['random_number'] =$random_number;
						$data['base_url'] = base_url();



/** email  **/


	 $get_order_details =$this->db->query("SELECT * FROM  order_details  where  random_number ='$random_number'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id_email = $get_order_details[0]['mover_id'];
	$id_email = $get_order_details[0]['id']; 
	$order_id = $id_email ;

	 $strid = $striparray['stripeid'];
	 $object	= $striparray['object'];
	 $amount_refunded =			  $striparray['amount_refunded'] ;
	 $balance_transaction = $striparray['balance_transaction'] ;
	 $outcome= $striparray['outcome'];
	 $refunds=			  $striparray['refunds'];
	 $source= $striparray['source'];
	 $sstatus =			  $striparray['status']  ;

	  $this->db->query("INSERT INTO stripe_returnlog (order_id,stripe_data,status) VALUES ($order_id,'$dataentry','1')");
  $insertstripe = $this->db->query("INSERT INTO stripe_orderdata (order_id,stripe_id,object,amount_refunded,balance_transaction,outcome,refunds,source,sstatus) VALUES ( $order_id ,'$strid','$object','$amount_refunded','$balance_transaction','$outcome','$refunds','$source','$sstatus')");
  
 $get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id_email'")->result_array();

	 if(!empty($get_mover_details))
	 {
	 	$mover_fist_name = $get_mover_details[0]['first_name'].' '.$get_mover_details[0]['last_name'];
	 	$contact_num = $get_mover_details[0]['phone'];
	 	$mover_email_id = $get_mover_details[0]['email'];
	 	
	 }

}


$move_date_email =explode(' ', $_POST['move_date']) ;
 $move_date_email  =date("m/d/Y" ,strtotime($move_date_email[0]));


						/******* sending email to customer ***/

// $admin_email ="kalaiponnusamy94@gmail.com";
// $movers_email ="hema2295msk@gmail.com";
// $cc_mailid =$admin_email .','. $movers_email;

// $from_name ='kalai';
// $from_id ='kalaivani@stallioni.com';;
$customer_to_email= $_POST['b_email'];
 $mail_subject='Marketplace';

$float_right ='';;

if($loading_location !=='' && $unloading_location !=='' )
{ 

$float_right  ='float:right';
}

$loading_display ='';
$unloading_display ='';
$location_display ='';
if($loading_location !=='')
{


	$loading_display =' <div style=" display: inline-block;">   
             <strong class="sub-heading">Loading Details</strong>
             <p><span style="color:black;font-size: 13px;">Moving From:'.ucfirst(str_replace('_', ' ',$loading_location)).'</span> <br>
             <p><span style="color:black;font-size: 13px;">Loading:'.ucfirst(str_replace('_', ' ',$loading_by)).'</span><br>
              <p><span style="color:black;font-size: 13px;">Address:</span> <br>
              '.$_POST['loading_address'].' <br>
             
              </p>
        
        </div> ';

}
// '.$_POST['loading_state'].'
 // '.$_POST['loading_city'].' <br> 
if($unloading_location !=='')
{


	$unloading_display =' <div style=" display: inline-block;'.$float_right.'">   
             <strong class="sub-heading">Unloading Details</strong> 
             <p><span style="color:black;font-size: 13px;">Moving To:'.ucfirst(str_replace('_', ' ',$unloading_location)).'</span> <br>
             <span style="color:black;font-size: 13px;">Address:</span> 
              '.$_POST['unloading_address'].' <br>
              </p>
        
        </div> ';
}
// '.$_POST['unloading_city'].' <br> 
//               '.$_POST['unloading_state'].'
if($location_loading !='')
{

	$location_display =' <div style=" display: inline-block;'.$float_right.'">   
             <strong class="sub-heading">Loading  Location Details</strong> 
             <p><span style="color:black;font-size: 13px;" >Moving From:'.ucfirst(str_replace('_', ' ',$loading_location)).'</span> <br>
             <span style="color:black;font-size: 13px;">Loading:'.ucfirst(str_replace('_', ' ',$location_loading)).'</span><br>
              <span style="color:black;font-size: 13px;">Address:</span> 
              '.$_POST['location_loading_address'].' <br>
              </p>
        
        </div> ';

}

// '.$_POST['location_loading_city'].' <br> 
//               '.$_POST['location_loading_state'].'	

 $mail_message='<html>
 		
 <div style=" border: 1px solid #E6EBF1;width: 60%;">

  <div style="height: 60px;background-color: #7F7F7F;    margin-top: 0;margin-bottom: 0;">
    <h2 style="color: white;text-align: center; margin-top: 0;margin-bottom: 0;padding-top: 18px;">Thank You for your order</h2>
  </div>

    <div style="  width: 90%;margin: auto; margin-top: 12px;">

          <p style="color:black;font-size: 13px;">The order has been received  and is now being processed.Your order details are shown below for your reference.
          </p>

           <div style=" display: inline-block;">   
                     <strong class="sub-heading">Reservation Details</strong>  <br>
                      <p><span style="color:#693238;">Name:</span> '.$_POST['company_name'].'</p>
                      <p><span style="color:#693238;">Date of Move:</span> '.$_POST['move_date'].'</p>
                      <p><span style="color:#693238;">Arrival Time:</span>'.$_POST['arrival_time'].'</p>
                      <p><span style="color:#693238;">Movers:</span>'.$_POST['movers_count'].' Movers, '.$_POST['hours'].'  </p>  
                       <p><span style="color:#693238;">Price :</span>$'.$_POST['total_cost'].'</p>

            </div> 

           

           
           <div style=" float: right;display: inline-block;">   
              <strong class="sub-heading">Mover Details</strong>
              <p class="tex_transform_stl" style="color:black;font-size: 13px;">'.$mover_fist_name.'</p>
              <p class="con_style" style="color:black;font-size: 13px;">'.$contact_num.'</p>
              <p  style="color:black;font-size: 13px;"><u>'.$mover_email_id.'</u></p>
           </div>

           <div style="clear:both;"></div>

           '.$loading_display.'  '.$unloading_display.'  '.$location_display.'

            <div style="clear:both;"></div>
             <div style="">   
             <strong class="sub-heading">Move Description:</strong> 
              <p style="color:black;font-size: 13px;">'.$_POST['additional_details'].'</p>
        
            </div>


   </div>

</div>
 </html>';
$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";

if($Payment_status == 'Payment Success'){
		mail($customer_to_email,$mail_subject,$mail_message,$headers);
}
/***** sending email to movers ********/


// $from_name_m ='kalai';
// $from_id_m ='kalaivani@stallioni.com';


$mover_email =$mover_email_id ;
//$mover_email= "hema2295msk@gmail.com";
$mail_subject_m='New Job - '.$move_date_email.' - Order # '.$id_email.' ';


$mail_message_m ='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>
<p style="font-size: 15px;">'.$mover_fist_name.', </p>

<p style="color:black;font-size: 15px;">You have received a new job,</p>
<div >

<p style="font-size: 15px;color:black;">Please contact the customer ASAP to confirm.</p>

 <p style="font-size: 15px;margin-top: 14px;color:black;"> <b>Order </b># '.$id_email.' </p>

 <p><b style=" font-size: 15px;">Customer Contact Info: </b></p>

 <p style=" font-size: 15px;">'.$_POST['b_First_name'].'</p>
 
 <p style=" font-size: 15px;">'.$_POST['b_Phone_no'].'</p>

<p style=" font-size: 15px;"> <b>Reservation: </b> </p>
<p style=" font-size: 15px;color:black;"> <b>Date of Move: </b> '.$move_date_email.'</p>

<p style=" font-size: 15px;color:black;"> <b>Preferred Arrival Window: </b>'.$_POST['arrival_time'].' </p>
<p style=" font-size: 15px;color:black;"> '.$_POST['movers_count'].' Movers, '.$_POST['hours'].' Hours </p>
</div>
<div style="clear:both;"></div>

           '.$loading_display.'  '.$unloading_display.'  '.$location_display.'

<div style="clear:both;"></div>

<table style="border: 1px solid #CBCBCB;width: 98%;border-collapse: collapse; display:none;">
  
  <thead style="border-bottom: 1px solid #CBCBCB;    line-height: 23px;">
        <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Item</th>
        <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Quantity </th>
         <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Rate</th>
        <th style="font-size: 17px;text-align: center;">Subtotal</th>
  </thead>
  <tbody style="    line-height: 23px;">
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$_POST['movers_count'].' Movers, '.$_POST['hours'].' hour min.</td>
        <td style="border-right: 1px solid #CBCBCB;"></td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;border-right: 1px solid #CBCBCB;">$'.$_POST['total_cost'].'</td>
        <td style="font-size: 12px;text-align: center;">$'.$_POST['total_cost'].'</td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$_POST['movers_count'].' movers, per mile travel  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">47 miles  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">$0.50/mi.</td>
        <td style="font-size: 12px;text-align: center;">$23.50 </td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;"></td>
        <td style="border-right: 1px solid #CBCBCB;"></td>
        <td style="font-size: 12px;text-align: center; font-weight: bold;border-right: 1px solid #CBCBCB;">Customer Total: </td>
        <td style="font-size: 12px;text-align: center;">$248.50</td>
      </tr>
  </tbody>
</table>

<p style=" font-size: 15px;"><b>Job Description:</b></p>
<p style=" font-size: 15px;color:black;">'.$_POST['additional_details'].'</p>



<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">Movers Support</p>


</div>

</div>

<br><br>
</div></html>';

$headers_m = "MIME-Version: 1.0" . "\r\n";
$headers_m .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_m .= "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";


if($Payment_status == 'Payment Success'){

			mail($mover_email,$mail_subject_m,$mail_message_m,$headers_m);
}

					}
		if($Payment_status == 'Payment Success')
		{
				$data['random_number'] = $random_number;
				$data['view_file']  = "movers/thankyou";
				// $this->template->load_frontend_user_template($data);
					$this->template->load_frontend_template($data);
		}
		if($Payment_status == 'Payment Failed')
		{
			redirect(BASE_URL.'/home/bookdetails/'.$random_number.'/1');
		}
}
// public function thankyoupage(){
// 	$data['base_url'] = base_url();
// 	$data['view_file']  = "movers/thankyou";
// 		// $this->template->load_frontend_user_template($data);
// 			$this->template->load_frontend_template($data);
// }




public function order_details()
{
	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$show_all_orders = $this->booking_model->show_all_orders();
      $data['base_url'] = base_url();
		$data['view_file']  = "backend_pages/orders";
		$data['current_menu']  = "orders";
		$data['show_all_orders'] =$show_all_orders;
	
      $data['order_details_approve']=$this->db->query("SELECT * FROM order_details where  order_status!='Completed' and order_status!='Cancelled' and order_status!='Accepted' and order_status!='Rejected' and order_status !='Payment Success' and order_status!='Payment Failed' ")->result_array();
		$this->template->load_backend_template($data);


}

public function movers_profile_details ($mover_id ,$option,$random_number='')
{
// print_r($random_number);
	$data['mover_id'] =$mover_id;
	$UserAbtDetails = $this->movers_model->getAboutDetails(array('user_id' => $mover_id),'row');
	$UserdaysDetails = $this->movers_model->getDaysDetails(array('user_id' => $mover_id));
	$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $mover_id));
	$UserCompanyname = $this->movers_model->getCompanyname($mover_id);
	$UserReviews = $this->movers_model->getReviewDetails( $mover_id);

	if($random_number!='')
	{
		$mover_service_places = $this->db->query("SELECT service_id from temp_cart where random_number = '".$random_number."'")->row()->service_id;
		if($mover_service_places!='')
		{

			$data['service_areas_map'] = $this->db->query("SELECT * FROM movers_servicearea where area_id = '".$mover_service_places."'")->row();
		}
	}

	if(!empty($UserCompanyname))
	{
		$data['title'] =$UserCompanyname[0]['company_name'];
	}

	$data['userabtdetails'] = '';
if( !empty($UserAbtDetails)) {
	$data['userabtdetails'] = $UserAbtDetails; }

	$data['Userdaysdetails'] = $UserdaysDetails;
	$data['serviceareas'] = $UserareaDetails;
	$data['UserReviews'] = $UserReviews;
	$data['option'] = $option;

	// print_r($UserReviews);


	$this->load->view('frontend/movers/movers_profile_details',$data);
}


public function order_details_change($orderid)

{


	$data['orderid'] =$orderid;
	$result = $this->movers_model->select_orders_resutls($orderid);



	if(!empty($result))
	{
		$service_id=$result[0]['service_id'];
	}

	$crew_members =$this->db->query("SELECT id,first_name  FROM new1_crewmember   where location='$service_id'")->result_array(); 
	$data['crew_members'] =$crew_members;

	//print_r($crew_members);

		$data['order_results'] =$result;
	

	$this->load->view('backend/backend_pages/order_details_change',$data);

}
/*kalai*/
public function edit_order_details($orderid){
	$data['orderid'] =$orderid;
	$result = $this->movers_model->select_orders_resutls($orderid);
	$data['order_results'] =$result;
	
	$data['mover_details'] = $this->db->query("SELECT * from user_master where user_type='movers' and status = 1 and site_admin=1")->result_array();
	$this->load->view('backend/backend_pages/edit_order_details_admin',$data);


}
public function get_movers_availablity(){
	// print_r($_POST);
	$date = $this->input->post('date');
	$booked_mover_id = $this->input->post('booked_mover_id');
	$mover_details = $this->db->query("SELECT id_user_master from user_master where user_type = 'movers'")->result_array();
	// print_r($mover_details);

	foreach ($mover_details as $key => $value) {
		$mover_id = $value['id_user_master'];

$blocked_ids =  $this->db->query("SELECT * from movers_blocked_dates where Block_date = '".$date."' and mover_id = '".$mover_id."'")->result_array();
if(empty($blocked_ids)){
	$avail_mover_id[] = $mover_id;
}
else{

}
	}
// print_r($avail_mover_id);
	// echo '<option> select </option>';
	foreach ($avail_mover_id as $key => $value) {
		

	$mover_details123 = $this->db->query("SELECT username from user_master where user_type = 'movers' and id_user_master = '$value' ")->row();
	$mover_name=$mover_details123->username;

// $test ='eeeeeeeeee';

	($booked_mover_id ==$value )?$selected='selected':$selected='';
		echo'<option value="'.$value.'" '.$selected.'>'.$mover_name.' </option>';
	
}
 

}

public function get_movers_availtime_admin(){
	// print_r($_POST);
	$date = $this->input->post('date');
	$booked_mover_id = $this->input->post('booked_mover_id');
	$arraival_time = date('D',strtotime($date));
	
					if($arraival_time  =="Sun") { $get_day_value =0;}
					if($arraival_time  =="Mon") { $get_day_value =1;}
					if($arraival_time  =="Tue") { $get_day_value =2;}
					if($arraival_time  =="Wed") { $get_day_value =3;}
					if($arraival_time  =="Thu") { $get_day_value =4;}
					if($arraival_time  =="Fri") { $get_day_value =5;}
					if($arraival_time  =="Sat") { $get_day_value =6;}

	$moves_daydetails = $this->movers_model->getDaysDetails(array('user_id' => $booked_mover_id,'day_value' => $get_day_value),'row');
	$times_stl =array('12 AM' ,'1 AM','2 AM','3 AM','4 AM','5 AM','6 AM','7 AM' ,'8 AM' ,'9 AM','10 AM','11 AM','12 PM','1 PM','2 PM','3 PM','4 PM','5 PM','6 PM','7 PM','8 PM','9 PM','10 PM','11 PM');

// print_r($moves_daydetails);
	$move_date_check = $date;
	$movers_id = $booked_mover_id;
	$booking_day = $get_day_value;
	$movers_avail_time = $this->movers_model->get_availabiltytime($move_date_check,$movers_id,$booking_day);
						
					
						
						

	$start_end_time = $movers_avail_time['start_end_times'];
					
					// echo $start_end_time;
if($start_end_time!='')
{
	if(strpos($start_end_time, ' and ') == true) 
	{

			$start_endtime123 = explode('and',$start_end_time);



			for($i=0; $i<count($start_endtime123);$i++){
			  // echo $i;

			 $start_end_time123[] = explode('-',$start_endtime123[$i]);
			}
			// print_r($start_end_time123);
			// exit();
			$start_time='';
			$end_time ='';
			for($i=0; $i<count($start_endtime123);$i++){
			 
			   $start_time = $start_end_time123[$i][0];
			   $end_time = $start_end_time123[$i][1];

			 

			$start_time1 = date("g A", strtotime("$start_time"));
			 $end_time1 = date("g A", strtotime("$end_time"));

			foreach ($times_stl as $key => $value) {
			  $current_time = $value;
			              $sunrise = $start_time1;
			              $sunset = $end_time1 ;
			              $date1 = DateTime::createFromFormat('g A', $current_time);
			              $date2 = DateTime::createFromFormat('g A', $sunrise);
			              $date3 = DateTime::createFromFormat('g A', $sunset);

			              // print_r($date1);echo 'dddddddddd'; print_r($date2);echo 'jjjjjjjjjj';print_r($date3);
			              if ($date1 >= $date2 && $date1 < $date3)
			              {

			                $chan_24_format =date("H:i:s", strtotime($current_time));


			                $next_hour =date('g A', strtotime($chan_24_format . '+1 hour') );

			                $show_avail_times[] =  $current_time  .' - '.  $next_hour;

			              }
			          }


			} 


    }
  else
  {
// print_r($start_end_time);
		$start_endtime = explode('-',$start_end_time);
		 $start_time = $start_endtime[0]; 
		 $end_time = $start_endtime[1];

		  $start_time1 = date("g A", strtotime("$start_time"));
		  $end_time1 = date("g A", strtotime("$end_time"));

		foreach ($times_stl as $key => $value) {
		   $current_time = $value;
		              $sunrise = $start_time1;
		              $sunset = $end_time1 ;
		               $date1 = DateTime::createFromFormat('g A', $current_time);
		               $date2 = DateTime::createFromFormat('g A', $sunrise);
		              $date3 = DateTime::createFromFormat('g A', $sunset);
		              // 
		              if ($date1 >= $date2 && $date1 < $date3)
		              {
		              	// echo 'kkkkkkkk';
		                $chan_24_format =date("H:i:s", strtotime($current_time));


		                $next_hour =date('g A', strtotime($chan_24_format . '+1 hour') );
		                $show_avail_times[] =  $current_time  .' - '.  $next_hour;

		              }
		          }
	}

	if($show_avail_times!='')
	{
		for ($i=0; $i < count($show_avail_times) ; $i++) { 
		$selected ='';
			if(isset($_POST['selected_arrival_time'])){
		$arrival_time1 = $_POST['selected_arrival_time'];
		$arrival_time23 = explode('Between', $arrival_time1);
		$arrival_time = trim($arrival_time23[1]);
		if($arrival_time == $show_avail_times[$i]){
			$selected = 'selected';
		}else{
			$selected ='';
		}
		}
                  echo '<option value="Arrival Time Between '.$show_avail_times[$i].' " '.$selected.'>Arrival Time '.$show_avail_times[$i].' </option>';
                }
	}
	else
	{
		echo '<option value="">Working Hours is not valid.Please provide correct time</option>';
	}

}
	else
	{
		echo '<option value="">Mover Working Hours is not Provided</option>';
	}


}

public function check_mover_avail_date(){
	$date = $this->input->post('date');
	$booked_mover_id = $this->input->post('booked_mover_id');

	$avail_date = $this->db->query("SELECT * FROM movers_blocked_dates where mover_id ='".$booked_mover_id."' and Block_date ='".date('m/d/Y',strtotime($date))."'")->row();
	if(empty($avail_date)){
		echo 1;
	}
	else{
		echo 0;
	}
}

public function movers_order_details_update(){

	// print_r($_POST);
	// exit();
	
	   $loading_type =  implode(",",$_POST['loading_type'] );
  
if (array_key_exists('loading_by', $_POST) == FALSE ) 
{ $loading_by  =''; } 
if ( array_key_exists('loading_by', $_POST) == TRUE ) 
{  $loading_by =  implode(",",$_POST['loading_by'] ); }

if ( array_key_exists('location_loading', $_POST) == FALSE )
 {$location_loading  =''; } 

if ( array_key_exists('location_loading', $_POST) == TRUE ) {
$location_loading  =$_POST['location_loading']; } 


if ( array_key_exists('loading_location', $_POST) == FALSE )
 {$loading_location  =''; } 

if ( array_key_exists('loading_location', $_POST) == TRUE ) {
$loading_location  =$_POST['loading_location']; } 


if ( array_key_exists('unloading_location', $_POST) == FALSE )
 {$unloading_location  =''; } 

if ( array_key_exists('unloading_location', $_POST) == TRUE ) {
$unloading_location  =$_POST['unloading_location']; } 



$start_time_explode = explode('Between', $_POST['arrival_time']);
$start_time1 = explode('-', $start_time_explode[1]);

    $start_time= date("H:i", strtotime($start_time1[0]));
	$date = $this->input->post('date');
	$order_id = $this->input->post('order_id');



$edit_bfre_detsails = $this->db->query("SELECT * From order_details where id = '".$order_id."'")->row();

$company_name = $edit_bfre_detsails->company_name;
$movers_count = $edit_bfre_detsails->movers_count;
$movers_hours = $edit_bfre_detsails->hours;
$already_paid_amount = $edit_bfre_detsails->final_price;
$customer_name = $edit_bfre_detsails->b_First_name.' '.$edit_bfre_detsails->b_Last_name;
$customer_email = $edit_bfre_detsails->b_email;
$customer_contact = $edit_bfre_detsails->b_Phone_no;

$mover_id = $edit_bfre_detsails->mover_id;

$mover_detailsss = $this->db->query("SELECT * FROM user_master where id_user_master = '".$mover_id."'")->row();
$mover_name = $mover_detailsss->username;
$mover_email = $mover_detailsss->email;
$mover_contact_no = $mover_detailsss->phone;
$mail_send = '';
$customer_need_to_pay='';
$admin_refund_to_customer ='';
$mail_content_tocustomer = '';
if($_POST['total_cost']!=''){
	if($already_paid_amount < $_POST['total_cost'])
	{
		$customer_need_to_pay = $_POST['total_cost'] - $already_paid_amount;
		$mail_content_tocustomer = 'Charge for changed location: $'.$customer_need_to_pay;
		$mail_send = '1';
	}
	else if($_POST['total_cost'] == $already_paid_amount)
	{
		$mail_send = '0';
	}
	else{
		$admin_refund_to_customer = $already_paid_amount - $_POST['total_cost'];
		$mail_content_tocustomer = 'Refund amount : $'.$admin_refund_to_customer;
		$mail_send = '1';
	}
}

	
	$data = array(	
					// 'mover_id'=>$_POST['movers_name'],
					// 'hours'=> $this->input->post('hours'),
					'move_date' => date('Y/m/d',strtotime($date)),
					// 'movers_count'=> $this->input->post('movers_count'),
					'arrival_time'=>$_POST['arrival_time'],
					'loading_type'=>$loading_type,
					'loading_by'=>$loading_by,
					'location_loading'=>$location_loading,
					'loading_location'=>$loading_location,
					'unloading_location'=>$unloading_location,
					// 'additional_hours'=>$additional_hour,
					'location_loading_address' =>$_POST['location_loading_address'],
					'location_loading_apt'=>$_POST['location_loading_apt'],
					// 'location_loading_city'=>$_POST['location_loading_city'],
					// 'location_loading_state'=>$_POST['location_loading_state'],

					'loading_address' =>$_POST['loading_address'],
					'loading_apt'=>$_POST['loading_apt'],
					// 'loading_city'=>$_POST['loading_city'],
					// 'loading_state'=>$_POST['loading_state'],
					'admin_edit_distance' =>$_POST['mile_distance'],
					'admin_edit_mile_cost'=>$_POST['per_mile_fee'],
					'admin_edit_tot_amt'=>$_POST['total_cost'],

					'unloading_address' =>$_POST['unloading_address'],
					'unloading_apt'=>$_POST['unloading_apt'],
					'customer_needtopay'=>$customer_need_to_pay,
					'admin_refund_amt' => $admin_refund_to_customer,
					'admin_order_details_edit'=>1


						// $data['price']= $this->input->post('price');
	// $data['mover_id']= $this->input->post('mover_id');
);
	// print_r($data);
	$check_time = $this->db->query("SELECT * from movers_blockdate where block_mover_id = '".$this->input->post('movers_name')."' and block_date = '".date('Y-m-d',strtotime($date))."' and '".$start_time."' Between bstart_time and bend_time")->result_array();
// 	echo '<br>';
// 	print_r($check_time);
// 	print_r($_POST);
// exit();
	$check_avail_time= $this->db->query("SELECT * FROM movers_blocked_dates where Block_date = '".date('m/d/Y',strtotime($date))."' and mover_id = '".$this->input->post('movers_name')."'")->result_array();

	if(empty($check_avail_time) && empty($check_time)){


$mail_subject='Marketplace - Admin Edit Order Details';

$float_right ='';

if($loading_location !=='' && $unloading_location !=='' )
{ 

$float_right  ='float:right';
}

$loading_display ='';
$unloading_display ='';
$location_display ='';
if($loading_location !=='')
{


	$loading_display =' <div style=" display: inline-block;">   
             <strong class="sub-heading" style="color:black">Loading Details</strong>
             <p><span style="color:black;font-size: 13px;">Moving From:'.ucfirst(str_replace('_', ' ',$loading_location)).'</span> <br>
             <p><span style="color:black;font-size: 13px;">Loading:'.ucfirst(str_replace('_', ' ',$loading_by)).'</span><br>
              <p><span style="color:black;font-size: 13px;">Address:</span> <br>
              '.$_POST['loading_address'].' <br>
             
              </p>
        
        </div> ';

}
// '.$_POST['loading_state'].'
 // '.$_POST['loading_city'].' <br> 
if($unloading_location !=='')
{


	$unloading_display =' <div style=" display: inline-block;'.$float_right.'">   
             <strong class="sub-heading" style="color:black;">Unloading Details</strong> 
             <p><span style="color:black;font-size: 13px;">Moving To:'.ucfirst(str_replace('_', ' ',$unloading_location)).'</span> <br>';  
             if($loading_location=='' && $unloading_location!=''){
              '<span style="color:black;font-size: 13px;">Loading:'.ucfirst(str_replace('_', ' ',$loading_by)).'</span><br> ';
              }         
              '<span style="color:black;font-size: 13px;">Address:</span> 
              '.$_POST['unloading_address'].' <br>
              </p>
        
        </div> ';
}
// '.$_POST['unloading_city'].' <br> 
//               '.$_POST['unloading_state'].'
if($location_loading !='')
{

	$location_display =' <div style=" display: inline-block;'.$float_right.'">   
             <strong class="sub-heading" style="color:black">Loading  Location Details</strong> 
             <p><span style="color: black;font-size: 13px;" >Moving From:'.ucfirst(str_replace('_', ' ',$loading_location)).'</span> <br>
             <span style="color: black;font-size: 13px;">Loading:'.ucfirst(str_replace('_', ' ',$location_loading)).'</span><br>
              <span style="color: black;font-size: 13px;">Address:</span> 
              '.$_POST['location_loading_address'].' <br>
              </p>
        
        </div> ';

}

// '.$_POST['location_loading_city'].' <br> 
//               '.$_POST['location_loading_state'].'	

 $mail_message='<html>
 		
 <div style=" border: 1px solid #E6EBF1;">

  <div style="height: 60px;background-color: #7F7F7F;    margin-top: 0;margin-bottom: 0;">
    <h2 style="color: white;text-align: center; margin-top: 0;margin-bottom: 0;padding-top: 18px;">Order Details Changed</h2>
  </div>

    <div style="  width: 90%;margin: auto; margin-top: 12px;">

          <p style="color:black;font-size: 13px;">Order details edited by admin.Your order details are shown below for your reference.Please contact the mover ASAP to confirm.
          </p>

           <div style=" display: inline-block;">   
                     <strong class="sub-heading" style="color:black;">Reservation Details</strong>  <br>
                      <p><span style="color:black;">Name:</span> '.$company_name.'</p>
                      <p><span style="color:black;">Date of Move:</span> '.$_POST['date'].'</p>
                      <p><span style="color:black;">Arrival Time:</span>'.$_POST['arrival_time'].'</p>
                      <p><span style="color:black;">Movers:</span>'.$movers_count.' Movers, '.$movers_hours.'  </p>
                      <p><b style="color:black; font-size: 15px;">Mover Contact Info: </b></p>

 					  <p style="color:black; font-size: 15px;">Mover Name '.$mover_name.'</p>
 
 					  <p style="color:black; font-size: 15px;">Mover Contact '.$mover_contact_no.'</p>
                      <p><span style="color:black;">Already Paid Amount:</span>$'.$already_paid_amount.'</p>
                      <p><span style="color:black;">'.$mail_content_tocustomer.'</span>
                      </div>   
		<div style="clear:both;"></div>

           '.$loading_display.'  '.$unloading_display.'  '.$location_display.'
           <div style="clear:both;"></div>



<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">HireMovers Support</p>


    </div>



</div>
 </html>';
$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";
// $customer_email = 'kalaisnsce12@gmail.com';
if($mail_send == '1'){
		mail($customer_email,$mail_subject,$mail_message,$headers);
}
/***** sending email to movers ********/


// $from_name_m ='kalai';
// $from_id_m ='kalaivani@stallioni.com';




$mail_message_m ='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>
<p style="font-size: 15px; color:black;">'.$mover_name.', </p>

<p style="font-size: 15px;color:black;">Please contact the customer ASAP to confirm.</p>

 <p style="font-size: 15px;margin-top: 14px;color:black;"> <b>Order </b># '.$order_id.' </p>

 <p><b style=" font-size: 15px;color:black;">Customer Contact Info: </b></p>

 <p style=" font-size: 15px;color:black;">'.$customer_name.'</p>
 
 <p style=" font-size: 15px;color:black;">'.$customer_contact.'</p>

<p style=" font-size: 15px;color:black;"> <b>Reservation: </b> </p>
<p style=" font-size: 15px;color:black;"> <b>Date of Move: </b> '.$date.'</p>

<p style=" font-size: 15px;color:black;"> <b>Preferred Arrival Window: </b>'.$_POST['arrival_time'].' </p>
<p style=" font-size: 15px;color:black;"> '.$movers_count.' Movers, '.$movers_hours .' Hours </p>

<div style="clear:both;"></div>

           '.$loading_display.'  '.$unloading_display.'  '.$location_display.'

<div style="clear:both;"></div>



<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">HireMovers Support</p>
</div>

</div>

</div>

<br><br>
</div></html>';

$headers_m = "MIME-Version: 1.0" . "\r\n";
$headers_m .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_m .= "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";

// $mover_email = 'kalaiponnusamy94@gmail.com';
if($mail_send == '1'){

			mail($mover_email,$mail_subject,$mail_message_m,$headers_m);
}


		
		$this->db->where('id',$order_id);
		$this->db->update('order_details',$data);
		echo 1;

	}else{
		echo 0;
	}


}

public function approve_order_status(){
	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$data['base_url'] = base_url();

		$data['order_details']=$this->db->query("SELECT * FROM order_details where release_pay = 1")->result_array();
		$data['view_file']  = "backend_pages/approve_order_status";
		$data['current_menu']  = "Order Status Approve";
		
		
		$this->template->load_backend_template($data);
}

public function order_status_change($order_id){
	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		
		$data['base_url'] = base_url();
		$data['order_id'] = $order_id;
		$data['order_details']=$this->db->query("SELECT * FROM order_details where id = '".$order_id."'")->row();
		// $data['view_file']  = "backend_pages/order_status_change";

		
		
		
		$this->load->view('backend/backend_pages/order_status_change',$data);
}

public function update_order_status(){
	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		 
	$message = '';

		$order_id = $this->input->post('order_id');
		// $order_id = '1118';

		$invoice_details = $this->users_model->insert_invoice_details_by_admin($order_id);
		$order_status = $this->input->post('order_status');
		// print_r($_POST);exit();
		$query = $this->db->query("SELECT * from  order_details Where id='".$order_id."' " )->row();

// print_r($query);exit();

		$customer_fname = $query->b_First_name;
		$customer_email = $query->b_email;
		$mover_id = $query->mover_id;
		$mover_mailid = $this->db->query("SELECT * FROM user_master where id_user_master = '".$mover_id."'")->row();
		$mover_name = $mover_mailid->username;
		$mover_mail = $mover_mailid->email;
		$stripe_accountid = $mover_mailid->stripe_accountid;

		$data['order_status']  =$order_status;

		if($order_status=='Completed')
		{
			$data['completed_date'] = date('Y-m-d');
			$this->users_model->send_thanksmail_to_customer($order_id,$customer_fname,$mover_name,$mover_mail,$customer_email,$invoice_details);
			$pay_invoicedetails = $this->db->query("SELECT * FROM invoice_details where order_id = '".$order_id."'")->row();
			if($pay_invoicedetails)
			{
				$paid_status = $pay_invoicedetails->paid_status;
				$mover_fee = $pay_invoicedetails->mover_fee;
				if($paid_status == 0 || $paid_status == '')
				{
					if($stripe_accountid !='')
					{
						$mover_fee = (float)$mover_fee*100;
						require_once(APPPATH.'libraries/stripe/init.php');
						\Stripe\Stripe::setApiKey(STRIPE_SECRET_API_KEY);
						// $charge = \Stripe\Transfer::create([
						//   "amount" => $mover_fee,
						//   "currency" => "usd",
						//   "destination" => $stripe_accountid,
						//   "transfer_group" => "ORDER_".$order_id
						// ]);
						// echo "<pre>";print_r($charge);echo "</pre>";exit;


						try {
						    $charge = \Stripe\Transfer::create([
							  "amount" => $mover_fee,
							  "currency" => "usd",
							  "destination" => $stripe_accountid,
							  "transfer_group" => "ORDER_".$order_id
							]);

							///print_r( $charge);
							$payment_id = $charge['id'];
							$destination_payment = $charge['destination_payment'];
							$updata = array('paid_status' => 1,'stripe_paymentid' => $payment_id,'destination_stripepayment'=>$destination_payment);
							$this->db->where('order_id',$order_id);
							$this->db->update('invoice_details',$updata);
							// $paid_status = 1;
							$this->db->where('id',$order_id);
							$this->db->update('order_details',array('paid_status' => 1));

						} catch (\Stripe\Error\Base $e) {
						  // Code to do something with the $e exception object when an error occurs
						  // echo($e->getMessage());
						  $message = 3;
						  $msg_txt = $e->getMessage();
						} catch (Exception $e) {
						  // Catch any other non-Stripe exceptions
							 $message = 3;
						  	$msg_txt = $e->getMessage();
						}

						
					}
					else
					{
						$message = 1;
						
					}
					
				}
				else
				{
					$message = 2;
					
				}
			}
			


			// exit();
		
		}
		if($order_status=='Cancelled')
		{
			$data['cancel_date'] = date('Y-m-d');
			$this->users_model->send_order_cancelledstatus_mover_customer($order_id,$customer_fname,$mover_name,$mover_mail,$customer_email);
			// $this->user
		}
		if($order_status=='Accepted')
		{
			$data['confirmed_date'] = date('Y-m-d');
			$this->movers_model->send_order_confirmation_mail($order_id);
			// $this->user
		}
		
		if($order_id!=''){
			$this->db->where('id',$order_id);
			$this->db->update('order_details',$data);

			if($message == 1)
			{
				echo json_encode(array('status' =>0, 'message' =>"Movers not connect their stripe account to admin account"));
			}
			else if($message == 2)
			{
				echo json_encode(array('status' =>0, 'message' =>"Already paid for this order. Can't pay multiple times for same order"));
			}
			else if($message == 3)
			{
				echo json_encode(array('status' =>0, 'message' =>$msg_txt));
			}
			else
			{
				echo json_encode(array('status' =>1, 'message' => "Order status updated successfully"));
			}
			// echo $this->db->last_query();
		}
		else
		{
			echo json_encode(array('status' =>0, 'message' =>"Order id not valid. Please try again later"));
		}
		exit;
}
public function testmalifunction(){
	$order_id = 1137;
	$order_details =$this->db->query("SELECT * from order_details where id ='$order_id'")->row();
	$customer_fname = $order_details->b_First_name;
		$customer_email = $order_details->b_email;
		$movers_count = $order_details->movers_count;
		$hourss = $order_details->hours;
		$distance = $order_details->distance;
		$booking_price = $order_details->price;
		$additional_hours = $order_details->additional_hours;
		if($additional_hours!=''){
			$additional_hours = $additional_hours.' Hours';
		}else{
			$additional_hours = '';
		}

		$mover_id = $order_details->mover_id;
		$mover_mailid = $this->db->query("SELECT * FROM user_master where id_user_master = '".$mover_id."'")->row();
		$mover_name = $mover_mailid->username;
		$mover_mail = $mover_mailid->email;
	$invoice_details = $this->db->query("SELECT * from invoice_details where order_id ='$order_id'")->row();
	if($invoice_details!='')
	{
		$mile_fee = $invoice_details->mile_fee;
		$additional_hours_fee = $invoice_details->additional_hours; 
		$addtion_hoursadmin_fee = $invoice_details->addtion_hoursadmin_fee;
		$admin_milefee_amount = $invoice_details->admin_milefee_amount;
		$customer_paid_famt = $invoice_details->customer_paid_famt;
	}else{
		$mile_fee = 0.00;
		$additional_hours_fee = 0.00; 
		$addtion_hoursadmin_fee =0.00;
		$admin_milefee_amount ='$0.00';
		$customer_paid_famt = 0.00;
	}
		$subject = "Market Place";
		

		$headers = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// $headers .= 'Bcc: kalaiponnusamy94@gmail.com' . "\r\n";
		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";

 $mail_message='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>

<p style=" font-size: 15px;">Dear '.$customer_fname.', </p>

<p style=" font-size: 15px;">Thank you for using HireMovers to find movers to complete your move. You can write a review by logging into your account <a href ='.BASE_URL.'/home> here </a>.</p>

<br>
<table style="border: 1px solid #CBCBCB;width: 98%;border-collapse: collapse; ">
  
  <thead style="border-bottom: 1px solid #CBCBCB;    line-height: 23px;">
        <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Item</th>
        <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Quantity </th>
         <th style="font-size: 17px;text-align: center;border-right: 1px solid #CBCBCB;">Rate</th>
        <th style="font-size: 17px;text-align: center;">Subtotal</th>
  </thead>
  <tbody style="    line-height: 23px;">
      <tr style="border-bottom: 1px solid #CBCBCB;">
      <td style="border-right: 1px solid #CBCBCB;">'.$movers_count.' Movers,'.$hourss.' hour min.</td>
        <td style="border-right: 1px solid #CBCBCB;"></td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;border-right: 1px solid #CBCBCB;">$'.$booking_price.'</td>
        <td style="font-size: 12px;text-align: center;">$'.$booking_price.'</td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">Per Mile Fee  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$distance.' Miles  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$admin_milefee_amount.'</td>
        <td style="font-size: 12px;text-align: center;">$'.$mile_fee.' </td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">Additional Hours  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$additional_hours.'  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">$'.$addtion_hoursadmin_fee.'</td>
        <td style="font-size: 12px;text-align: center;">$'.$additional_hours_fee.' </td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;font-weight: bold;border-right: 1px solid #CBCBCB;">Customer Total:</td>
        <td style="border-right: 1px solid #CBCBCB;"></td>
        <td style="font-size: 12px;text-align: center; font-weight: bold;border-right: 1px solid #CBCBCB;"> </td>
        <td style="font-size: 12px;text-align: center;">$'.$customer_paid_famt.'</td>
      </tr>
  </tbody>
</table>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">Movers Support</p>


</div>

</div>

<br><br>
</div></html>';
$customer_email = 'kalaiponnusamy94@gmail.com';
			if(mail($customer_email,$subject,$mail_message,$headers)){echo 'ssssss';}else{echo 'noeeeeee';}
}
//kalai 

public function reschedule($orderid)
	{


	   $data['orderid'] = $orderid;

	   $result = $this->movers_model->select_orders_resutls($orderid);

		$data['order_results'] =$result;


		$this->load->view('backend/backend_pages/reschedule',$data);


	}

		public function cancelorder($orderid)
	{

	   $data['orderid'] = $orderid;

	   $result = $this->movers_model->select_orders_resutls($orderid);

		$data['order_results'] =$result;


		$this->load->view('backend/backend_pages/cancelorder',$data);

	}



		public function reschedule_by_admin()
 	{

 					if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $alternate_date = $this->input->post('alternate_date'); 
			    $alternate_arr_time = $this->input->post('alternate_arr_time');


			       $order_table =array(
	   	             'move_date' =>$alternate_date,
					'arrival_time' =>$alternate_date,
					'modified_on' =>date('Y-m-d H:i:s')
				);


			    $order_update = $this->movers_model->update_cancel_order($order,$order_table);


	    }

 	}  


 	public function cancel_order_request()
	{
		 

		if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $cancel_reason = $this->input->post('cancel_reason'); 
			    $notes_request = $this->input->post('notes_request');


	    }
$this->movers_model->send_cancellation_mail_to_customer($order,$cancel_reason,$notes_request);
// exit();
	   $data = array( 
					'order_id' =>$order,
					'cancel_reason' => $cancel_reason, 
					'notes_request' => $notes_request				
					);

	   $order_table =array(
	   	             'order_status' =>'Pending Cancellation',
					'modified_on' =>date('Y-m-d H:i:s'),
				);

		$order_update = $this->movers_model->update_cancel_order($order,$order_table);


	   $select_result = $this->movers_model->select_cancel_order($order);




	   if(!empty($select_result)) 
	   	{
	   		$result = $this->movers_model->cancel_order_request_update($order,$data);
	   	} else { 
	   		$result = $this->movers_model->cancel_order_request_insert($data);
	   	}


	   echo 1;

 }

 public function review_response_by_mover()
 {



		if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $mover_response_text = $this->input->post('mover_response_text'); 

			       $data =array(
	   	       
					'movers_review_replay' =>$mover_response_text
				);

			       $result = $this->movers_model->insert_movers_review_content($order,$data);


			       $get_order_details =$this->db->query("SELECT * FROM  order_details  where  id ='$order'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id = $get_order_details[0]['mover_id'];
	$order_id = $get_order_details[0]['id'];
	$customer_first_name = 	$get_order_details[0]['b_First_name'];
	$customer_email = $get_order_details[0]['b_email']; 
	$move_date = explode(' ', $get_order_details[0]['move_date']); 
	$current_date =date("m-d-Y");

	$get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id'")->result_array();

	if(!empty($get_mover_details))
	{
		$mover_fist_name = $get_mover_details[0]['first_name'];
		$mover_email_id = $get_mover_details[0]['email'];
		$company_name =ucfirst($get_mover_details[0]['company_name']) ;
		$phone = $get_mover_details[0]['phone'];

   }

}

// $from_name_c ='kalai';
// $from_id_c ='kalaivani@stallioni.com';
 $customer_email= $customer_email;
// $customer_email= "hema2295msk@gmail.com";


$mail_subject_c ='Movers left response for review on Order # '.$order_id .' ';

$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
        
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;">'.$customer_first_name.', </p>

	<p style=" font-size: 15px;">'.$mover_fist_name.' from order #'.$order_id.' on  '.$current_date.' has left a response. You can <a href="'.BASE_URL.'">click here </a> to see the response. </p>

	<p style=" font-size: 15px;">Thanks, </p>
	<p style=" font-size: 15px;">Movers Support</p> 

	</div>

</div> 

<br><br>
</div>


</html>';


$headers_c = "MIME-Version: 1.0" . "\r\n";
$headers_c .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_c .= "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";




			mail($customer_email,$mail_subject_c,$mail_message_c,$headers_c);


			  


	    }
 }


 public function block_dates()
 {


 			if ($this->input->is_ajax_request())
		{
			   $current_user = $this->input->post('current_user');
			   $block_date = $this->input->post('block_date');
			  


			   $insert_block_date =$this->movers_model->block_dates($current_user,$block_date);


			}
 }



public function update_hoursvalues()
{

		if ($this->input->is_ajax_request())
		{
			   $movers_id = $this->input->post('selected_moversid');
			   $movers_count = $this->input->post('movers_count');
			    $hour_txt = $this->input->post('changed_hours');

	    $price_details = $this->movers_model->getMoversratedetails($movers_id,$movers_count);


						if( !empty( $price_details )) {
							$price_value = $price_details[0]['price_value'];
							$movers_min_time = $price_details[0]['movers_min_time'];
							$addtional_hours_money =  $price_details[0]['addtional_hours'];

							$amount = str_replace('$', '', $price_value);

							 $amount = round($amount);

							 $addtional_hours_money = str_replace('$', '', $addtional_hours_money);

							 $addtional_hours_money = round($addtional_hours_money);
 

							if($hour_txt ==$movers_min_time)

									{ $price =   $amount;}


							else { 

									$min_hour = str_replace('hour', '', $movers_min_time);

									$add_hour = str_replace('hour', '', $hour_txt);
									if($min_hour<$add_hour) 
									{

									$hours =    $add_hour - $min_hour; 
									$price = $amount + $hours * $addtional_hours_money;
			
									
	
								} 



							}


						}




			}
// return (array("status_result" => $price));
		 echo json_encode(array("status_result" => $price));
}


/*kalai*/
public function update_hoursvalues_direct($movers_id,$movers_count,$hour_txt)
{

		
			   // $movers_id = $this->input->post('selected_moversid');
			   // $movers_count = $this->input->post('movers_count');
			   //  $hour_txt = $this->input->post('changed_hours');

	    $price_details = $this->movers_model->getMoversratedetails($movers_id,$movers_count);


						if( !empty( $price_details )) {
							$price_value = $price_details[0]['price_value'];
							$movers_min_time = $price_details[0]['movers_min_time'];
							$addtional_hours_money =  $price_details[0]['addtional_hours'];

							$amount = str_replace('$', '', $price_value);

							 $amount = round($amount);

							 $addtional_hours_money = str_replace('$', '', $addtional_hours_money);

							 $addtional_hours_money = round($addtional_hours_money);
 

							if($hour_txt ==$movers_min_time)

									{ $price =   $amount;}


							else { 

									$min_hour = str_replace('hour', '', $movers_min_time);

									$add_hour = str_replace('hour', '', $hour_txt);
									if($min_hour<$add_hour) 
									{

									$hours =    $add_hour - $min_hour; 
									$price = $amount + $hours * $addtional_hours_money;
			
									
	
								} 



							}


						}




			
return $price;
		 // echo json_encode(array("status_result" => $price));
}
/*end kalai*/
public function update_changed_price_and_hours()
{

		// 	if ($this->input->is_ajax_request())
		// {
	// print_r($_POST);exit();
			     $changed_hours = $this->input->post('changed_hours') ;
			     // $changed_price =$this->input->post('changed_price') ;
			      $temp_cart_id = $this->input->post('temp_cart_id');
			      $selected_moversid = $this->input->post('selected_moversid');
			      $movers_count = $this->input->post('movers_count');

			      $changed_price = $this->update_hoursvalues_direct($selected_moversid,$movers_count,$changed_hours);

			      // echo $changed_price;
			      // exit();
			      if($changed_price!=''){
			    $data =array('hours' => $changed_hours,
			    	'price' => $changed_price
			    	) ;

			  

			   // $update_details =  $this->movers_model->update_changed_price_and_hours1($data,$temp_cart_id);


			   //    echo json_encode(array("result" => $update_details));


			//  $temp_result_new =   $this->db->query("SELECT * FROM  temp_cart where temp_cart_id ='$temp_cart_id'")->result_array;

			$temp_result_new =  $this->db->query("SELECT  * from temp_cart where temp_cart_id='$temp_cart_id' " )->result_array();

			  if(!empty($temp_result_new[0]['temp_cart_id']))
			  {

			  	$data = array(
			        'hours' => $changed_hours,
			        'price' => $changed_price,
			        );

$this->db->where('temp_cart_id', $temp_cart_id);
$this->db->update('temp_cart', $data);



// $this->db->query("UPDATE temp_cart set hours = '".$changed_hours."', price = '".$changed_price."' WHERE temp_cart_id='".$temp_cart_id."'") ;

// echo $this->db->last_query();

echo 1;
			  }
}
			   else {

			  	echo 0;

			  }
		
			// }
			
}


/********* Rajeswari **************/
public function your_crew(){
		

		$data['base_url'] = base_url();

		$data['view_file']  = "pages/crew_details";
		$users_id =$this->session->userdata['user_id'];
		$check_stripe = get_mover_details($users_id);

			if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='movers')
		{
			redirect(BASE_URL);exit();
		}
		else if($this->session->userdata['user_type'] == 'movers' && $check_stripe->stripe_accountid =='')
		{
			redirect('movers/profile');exit();
		}
		else{	
			$curent_login_id = $this->session->userdata['user_id'];
			$data['h']=$this->movers_model->crew_member1($curent_login_id);
			$this->template->load_frontend_template($data);	
		}	
	}
		
	public function add_new(){
		// print_r($_POST);



		// exit();


	 $email= $_POST['email'];
		$data=array(
		'location'=>$_POST['location'],
		'first_name'=>$_POST['fname'],
		'last_name'=>$_POST['lname'],
		'email'=>$_POST['email'],
		'phone'=>$_POST['phone'],
		'address'=>$_POST['address'],
		// 'city'=>$_POST['city'],
		// 'state'=>$_POST['state'],
		// 'zip'=>$_POST['zip'],
		'user_id' =>$_POST['current_user']
		);
		

  $email_exist=$this->db->query("SELECT * from new1_crewmember where email='".$email."' " )->result_array();
  // $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
if(empty($email_exist)){
	$query=$this->movers_model->form_insert_model($data);

	echo 1;
}
else
{
	echo 0;
}
exit();

}
		
		
	

	public function update_crew($id)
	{
	

	

    	$data=array(

		'first_name' => $_POST['fname'],
		'last_name' =>$_POST['lname'],
		'email' => $_POST['email'],
		 'phone' => $_POST['phone'],
		 'address' => $_POST['address'],
		'location' =>$_POST['location']
			);
	

$query=$this->movers_model->update_crew_model($id,$data);

// print_r($query);
		
	// $query=$this->movers_model->edit_crew_model($id);
	// 	$data['result_array'] =$query;



	// 	$this->load->view('frontend/pages/update_crew',$data);

echo 1;

	}

public function delete_crew($id){


$this->movers_model->delete_crew_model($id);

 }
	public function edit_crew($id)
	{

 

     	$query=$this->movers_model->edit_crew_model($id);
		$data['result_array'] =$query;
		
    	$this->load->view('frontend/pages/update_crew',$data);

   }
	public function edit_crew1(){

	
		$data['base_url'] = base_url();

		$data['view_file']  = "pages/edit_page";
		
	
      
		$this->load->view('frontend/pages/update_crew',$data);


	}	


	
	public function add_crew1(){
		
		$data['base_url'] = base_url();

		$data['view_file']  = "pages/add_crew";

		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='movers')
		{
			redirect(BASE_URL);
		}	
		$curent_login_id = $this->session->userdata['user_id'];

		$data['current_user'] =  $curent_login_id;

		$data['location_results'] = $this->movers_model->location_display($curent_login_id);
		
	
      
		$this->load->view('frontend/pages/add_crew',$data);

		
	}

/*home.php*/
	
  public function Movers_booking_page($url_en)
  {


  	   $this->load->library('encryption');
   // $to_encrypt= $param ;
   $this->encryption->initialize(array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $this->config->config['encryption_key']
        ));

     $url_den = strtr($url_en, array('.' => '+', '-' => '=', '~' => '/'));

     $to_encrypt = $this->encryption->decrypt($url_den);

     $to_encrypt;
      


         $data['email'] = $to_encrypt;

        
		$data['base_url'] = base_url();

		$data['d_rul'] = base_url().'home/index/'.$to_encrypt;
		// echo $dir_url1 = base_url().'home/index/'.$param.'ffffffffffff';
		$dir_url = base_url().'home/index/'.$to_encrypt;
       
		 $get_mover_id = $this->db->query("SELECT id_user_master,company_name FROM user_master where direct_url = '".$dir_url."' ")->row();
		 if(!empty($get_mover_id))
		 {

		 $moverid =$get_mover_id->id_user_master;

		  $data['mover_name'] =$get_mover_id->company_name;

		  $movers_about = $this->db->query("SELECT content FROM movers_about where 	user_id = '".$moverid."' ")->row();
		  // print_r($movers_about);
		  if(!empty($movers_about)){
		if($movers_about->content!='')
		{
		 // $data['about_content'] =htmlspecialchars_decode($movers_about->content); 
		  $data['about_content'] = htmlspecialchars_decode($movers_about->content);
		}}
		else
		{
			$data['about_content'] = '';		  	
		}
		$data['mover_id'] =$moverid;
	$UserAbtDetails = $this->movers_model->getAboutDetails(array('user_id' => $moverid),'row');
	$UserdaysDetails = $this->movers_model->getDaysDetails(array('user_id' => $moverid));
	$UserareaDetails = $this->movers_model->getAreaDetails(array('user_id' => $moverid));
	$UserCompanyname = $this->movers_model->getCompanyname($moverid);
	$UserReviews = $this->movers_model->getReviewDetails( $moverid);


	$data['Userdaysdetails'] = $UserdaysDetails;
	$data['serviceareas'] = $UserareaDetails;
	$data['UserReviews'] = $UserReviews;

    $data['view_file']  = "pages/home_direct_url";
    $this->template->load_frontend_template($data);
	}
	else{
		redirect(BASE_URL);
	}
  }




public function encode_and_decode()
{
	    
       $param = 'kalai229613';

  // $this->load->library('encrypt');
  // $enc_username=$this->encrypt->encode($param);
   //print_r($enc_username);


 
// $this->load->library('encrypt');

// $dec_username = $this->encrypt->decode($enc_username);

//print_r($dec_username);


$this->load->library('encryption');
$to_encrypt= $param ;
$this->encryption->initialize(
        array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $this->config->config['encryption_key']
        )
);
 echo $en = $this->encryption->encrypt($to_encrypt);
 echo '1111111111111' ; 
 echo  $this->encryption->decrypt($en);

}

/********************* aruljothi coding*************************************/
public function get_gargage_users()
{
    $UserDetails = $this->garage_model->get_garage_details();
     echo '<pre>'; print_R($UserDetails); echo '</pre>';

}


 
}





