<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		

		  $this->load->library('session');
    	$_SESSION['__ci_last_regenerate'] = time();
    	// $_SESSION['user_type'] ='';
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->load->library('email');
		$this->load->library('upload');
		$this->load->model('users_model');
		$this->load->model('movers_model');

		//$this->load->model('movers_model');
		// $this->load->helper("URL", "DATE", "URI", "FORM");
		// $this->load->model('home_model');

	}
		
	public function index()
	{	

		$data['base_url'] = base_url();
		$data['view_file']  = "customer/dashboard";

		$this->template->load_frontend_template($data);
	}
	public function profile()
	{
		//echo "<pre>";print_r($this->session->userdata);echo "</pre>";
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
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
		$data['pagename'] =  $this->load->view('frontend/customer/basic_details',$basic_datas,TRUE);
		$data['view_file']  = "customer/profile";

		$this->template->load_frontend_template($data);
	}
	

	public function edit_basic($user_id = 0)
	{
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
		// if( $this->session->userdata['user_type'] =='customer' || $this->session->userdata['user_type'] =='superuser'  )
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
	public function update_customer_details(){
		// if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
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
			//$company_name = $_POST['company_name'];
			//$year_found = $_POST['year_found'];
			$address = $_POST['address'];
			// $country = $_POST['country'];
			// $state = $_POST['state'];
			$profile_image_old = $_POST['profile_image_old'];
			//$profile_image = $_POST['profile_image'];
			//$id_proof_old = $_POST['id_proof_old'];
			//$id_proof = $_POST['id_proof'];

			$target_dir = "uploads/images/profile_images";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}

			// if($_FILES["id_proof"]["name"] !='')
			// {
			// 	$proof_unqids = uniqid();

			// 	$id_proof_file = $target_dir . basename($_FILES["id_proof"]["name"]);
			// 	$proof_ext = strtolower(pathinfo($id_proof_file,PATHINFO_EXTENSION));
			// 	move_uploaded_file($_FILES["id_proof"]["tmp_name"], 'uploads/images/'.$proof_unqids.'.'.$proof_ext);

			// 	$id_proof = 'uploads/images/'.$proof_unqids.'.'.$proof_ext;
			// }
			// else
			// {
			// 	$id_proof = $id_proof_old;
			// }

			$update_array = array('first_name' => $first_name,'last_name' => $last_name, 'phone' => $phone, 'address' => $address, 'profile_image' => $profile_image,   );
			$update_result = $this->users_model->user_update($update_array,array('id_user_master' => $user_id));

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
 public function customer_update_stlpswd($user_id){
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

	/***** hemalatha ****/

	public function orders()
	{
		
		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
		{
			redirect(BASE_URL);
		}

     else  { $data['curent_login_id'] = $this->session->userdata['user_id'];

		$user_id = $this->session->userdata['user_id']; } 

		$data['view_file']  = "customer/order_details";
		$data['base_url'] = base_url();

		$result = $this->users_model->select_orders_users($user_id);
		$data['order_results'] =$result;

		$admin_fee = $this->users_model->get_admin_fee($user_id);

		if(!empty($admin_fee))
		{


			 $data['admin_fee'] =$admin_fee[0]['admin_fee'];
		}



		$this->template->load_frontend_template($data);	


	}
public function order_popup($orderid){
	$data['base_url']=base_url();
	$data['orderid']=$orderid;
	$retrive_details=$this->db->query("SELECT * FROM order_details where id='$orderid'")->result_array();
	
		//print_r($retrive_details);
		$data['retrive_details']=$retrive_details;

		$moverid =$retrive_details[0]['mover_id'];	 
		 	$mover_details=$this->db->query("SELECT  company_name,phone,email FROM user_master where id_user_master='$moverid'")->row();

		 	$data['mover_email']  =$mover_details->email;
		 	$data['mover_phone']  =$mover_details->phone;
		 	//print_r($mover_details);



	$this->load->view('frontend/customer/order_popup',$data);
}
	public function reviews_update($orderid)
	{

		$data['base_url'] = base_url();
		$data['orderid'] =$orderid;

$this->load->view('frontend/customer/reviews_update',$data);


	}
	
	public function send_review_comments()
	{
		 $usertype =  $this->session->userdata('user_type');
      
        
			$order =$_POST['order'];
			$star_count =$_POST['star_count'];
			// $order_status =$_POST['order_status'];

			$review_comments_box =$_POST['review_comments_box'];

			$id =$_POST['order'];

        
			// if($order_status =='')
			// {
			// 	echo  1;
			// }
		if ($star_count =='') {
				echo  2;
				exit;
				
			}

			else if ($review_comments_box =='') {

				echo  3;
				exit;
				# code...
			}

			else { 
				echo  0;}
			
			
			$data =array('star_count' =>$star_count,
				// 'order_status' =>$order_status,
				'review_comments' =>$review_comments_box,
				'review_date' =>date("Y-m-d"),
				);
 



			/*** send review  to movers ***/


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

 $from_name_m =$customer_first_name;
 $from_id_m =$customer_email;
 $mover_email= $mover_email_id;
// $mover_email= "hema2295msk@gmail.com";
$mail_subject_m='Customer left review on Order # '.$order_id .' ';

$mail_message_m ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
        
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;">'.$mover_fist_name.', </p>

	<p style=" font-size: 15px;">'.$customer_first_name.' from order #'.$order_id.' on  '.$current_date.' has left you a review. You can <a href="'.BASE_URL.'">click here </a> to see the review and leave your response. </p>

	 <p style="font-size: 15px;">If you do not get a good review you should contact the customer and see what there is you can do to have a second chance for a better review. If the customer decides they want to change the review they can email customer support.
	 </p>

	<p style=" font-size: 15px;">Thanks, </p>
	<p style=" font-size: 15px;">Movers Support</p> 

	</div>

</div>

<br><br>
</div>


</html>';

$headers_m = "MIME-Version: 1.0" . "\r\n";
$headers_m .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_m .= 'From: '.$from_name_m.'<'.$from_id_m.'>' . "\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";



if($usertype!='superuser'){
			mail($mover_email,$mail_subject_m,$mail_message_m,$headers_m);
}
		

		$result = $this->users_model->update_reviews_comments($id,$data);

	}

	public function Approve_reschedule_time($orderid)
	{


			   $data['orderid'] = $orderid;

	   $result = $this->db->query("SELECT * FROM  order_details  where  id ='$orderid'")->result_array();

		$data['order_results'] =$result;


		$this->load->view('frontend/customer/requested_reschedule_page',$data);
	}


	public function approve_request_time()
	{



		if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $re_request_move_date = $this->input->post('re_request_move_date'); 
			    $re_request_arraival_time = $this->input->post('re_request_arraival_time');

			     $data = array( 
					're_request_move_date' => $re_request_move_date, 
					're_request_arraival_time' => $re_request_arraival_time,
					'move_date' => $re_request_move_date, 
					'arrival_time' => $re_request_arraival_time,
					'order_status' =>"Accepted",
					're_request_status'	=>''		

					// 're_request_status'	=>'Date and time approved by customer'		
					);


		

		/******** sending reschedule accept notification to movers ***/

		

					$get_order_details =$this->db->query("SELECT * FROM  order_details  where  id ='$order'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id = $get_order_details[0]['mover_id'];
	$order_id = $get_order_details[0]['id'];
	$customer_first_name = 	$get_order_details[0]['b_First_name'];
	$customer_email = $get_order_details[0]['b_email']; 
	$move_date  = $get_order_details[0]['move_date']; 
	$arrival_time  = $get_order_details[0]['arrival_time'];  	
	$re_request_move_date  = $get_order_details[0]['re_request_move_date'];
	$re_request_arraival_time  = $get_order_details[0]['re_request_arraival_time'];
	$move_date_dispay_format =date('l, F jS Y',strtotime($move_date));
	$re_move_date_dispay_format =date('l, F jS Y',strtotime($re_request_move_date));
		
	$get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id'")->result_array();

	if(!empty($get_mover_details))
	{
		$mover_fist_name = $get_mover_details[0]['first_name'];
		$mover_email_id = $get_mover_details[0]['email'];
		$company_name =ucfirst($get_mover_details[0]['company_name']) ;
		$phone = $get_mover_details[0]['phone'];

   }

}



$from_name_m =$customer_first_name;
$from_id_m =$customer_email;
 $mover_email= $mover_email_id;
// $mover_email= "hema2295msk@gmail.com";
$mail_subject_m=' Order #:'.$order_id.' Time or Date Change Request Has Been Approved ';


$mail_message_m ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
   
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;">Hello '.$mover_fist_name.', </p>

	<p style=" font-size: 15px;">For Order '.$order_id.' your requested time change has been approved by the customer.</p>

	<p style=" font-size: 15px;"><b>Original arrival time:</b>'.$move_date_dispay_format.' , '.$arrival_time.' </p>
	<p style=" font-size: 15px;" ><b>New arrival time:</b>'.$re_move_date_dispay_format.' ,  '.$re_request_arraival_time.'</p>

	<p style=" font-size: 15px;" >If you have any questions about this, please call the customer before reaching out to Marketplace</p>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">'.$from_name_m.'</p>

	</div>

</div>

<br><br>
</div>


</html>';

$headers_m = "MIME-Version: 1.0" . "\r\n";
$headers_m .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_m .= 'From: '.$from_name_m.'<'.$from_id_m.'>' . "\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";


			mail($mover_email,$mail_subject_m,$mail_message_m,$headers_m);
		
$order_update = $this->users_model->update_request_time($order,$data);

	    }


	}




	public function reject_request_time()
	{



		if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $re_request_move_date = $this->input->post('re_request_move_date'); 
			    $re_request_arraival_time = $this->input->post('re_request_arraival_time');

			     $data = array( 
					're_request_move_date' => $re_request_move_date, 
					're_request_arraival_time' => $re_request_arraival_time,
					// 'move_date' => $re_request_move_date, 
					// 'arrival_time' => $re_request_arraival_time,
					'order_status' =>"Accepted",
					're_request_status'	=>'Date and time rejected by customer'		
					);


		

		/******** sending reschedule accept notification to movers ***/

		

					$get_order_details =$this->db->query("SELECT * FROM  order_details  where  id ='$order'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id = $get_order_details[0]['mover_id'];
	$order_id = $get_order_details[0]['id'];
	$customer_first_name = 	$get_order_details[0]['b_First_name'];
	$customer_email = $get_order_details[0]['b_email']; 
	$move_date  = $get_order_details[0]['move_date']; 
	$arrival_time  = $get_order_details[0]['arrival_time'];  	
	$re_request_move_date  = $get_order_details[0]['re_request_move_date'];
	$re_request_arraival_time  = $get_order_details[0]['re_request_arraival_time'];
	$move_date_dispay_format =date('l, F jS Y',strtotime($move_date));
	$re_move_date_dispay_format =date('l, F jS Y',strtotime($re_request_move_date));
		
	$get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id'")->result_array();

	if(!empty($get_mover_details))
	{
		$mover_fist_name = $get_mover_details[0]['first_name'];
		$mover_email_id = $get_mover_details[0]['email'];
		$company_name =ucfirst($get_mover_details[0]['company_name']) ;
		$phone = $get_mover_details[0]['phone'];

   }

}



$from_name_m = $customer_first_name;
$from_id_m = $customer_email;
$mover_email= $mover_email_id;
// $mover_email= "hema2295msk@gmail.com";
$mail_subject_m=' Order #:'.$order_id.' Time or Date Change Request Has Been rejected ';


$mail_message_m ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;">Hello '.$mover_fist_name.', </p>

	<p style=" font-size: 15px;">For Order '.$order_id.' your requested time change has been rejected by the customer.</p>

	<p style=" font-size: 15px;"><b>Original arrival time:</b>'.$move_date_dispay_format.' , '.$arrival_time.' </p>
	<p style=" font-size: 15px;" ><b>New arrival time:</b>'.$re_move_date_dispay_format.' ,  '.$re_request_arraival_time.'</p>

	<p style=" font-size: 15px;" >If you have any questions about this, please call the customer before reaching out to Marketplace</p>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">'.$from_name_m.'</p>

	</div>

</div>

<br><br>
</div>


</html>';

$headers_m = "MIME-Version: 1.0" . "\r\n";
$headers_m .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_m .= 'From: '.$from_name_m.'<'.$from_id_m.'>' . "\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";




			mail($mover_email,$mail_subject_m,$mail_message_m,$headers_m);
		

$order_update = $this->users_model->update_request_time($order,$data);
	    }


	}

	public function review()
	{

		if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='customer')
		{
			redirect(BASE_URL);
		}

     else  { $data['curent_login_id'] = $this->session->userdata['user_id'];

		$user_id = $this->session->userdata['user_id']; } 

		$data['view_file']  = "customer/review";
		$data['base_url'] = base_url();

		$result = $this->users_model->select_orders_users($user_id);
		$data['reviews'] =$result;



		$this->template->load_frontend_template($data);	


	}


	public function reschedule($orderid)
	{


	   $data['orderid'] = $orderid;

	   $result = $this->users_model->select_orders_resutls($orderid);

		$data['order_results'] =$result;


		$this->load->view('frontend/customer/reschedule',$data);


	}

	public function cancelorder($orderid)
	{

	   $data['orderid'] = $orderid;

	   $result = $this->users_model->select_orders_resutls($orderid);

		$data['order_results'] =$result;


		$this->load->view('frontend/customer/cancelorder',$data);

	}

	public function release_payment($orderid)
	{


		  $data['orderid'] = $orderid;

	   $result = $this->users_model->select_orders_resutls($orderid);

		$data['order_results'] =$result;


		$additional_hour_amounts='0.00';

		$order_details = $this->db->query("SELECT * from order_details where id = '".$orderid."' ")->row();

  
  // echo '<pre>';print_r($value);echo '</pre>';

  $order_id =$order_details->id;
 
  $booked_mover_id  = $order_details->mover_id;
  $movers_count =$order_details->movers_count;
  
$release_pay = $order_details->release_pay;
  $additional_hours =$order_details->additional_hours;
  $request_hours = $order_details->request_hours;
$additional_hour_amount='';
if($additional_hours!=''  && $request_hours==1)
{
	
	$get_addtional = $this->db->query("SELECT * FROM movers_rate_new where movers_count = '".$movers_count."' and userid = '".$booked_mover_id."' ")->row();
	  // print_r($get_addtional);
	if($get_addtional!='')
	{
	$per_hour_amount = $get_addtional->addtional_hours;

	$hours_add = explode(':', $additional_hours);

                $add_hour = $hours_add[0];
                $add_mins = $hours_add[1];

                $add_hour_amout= $add_hour * $per_hour_amount;

                if($add_mins==15)
                {
                  $add_min_amount = $per_hour_amount/4;
               	}
               	else if($add_mins==30)
               	{
                	$add_min_amount = $per_hour_amount/2;
               	}
               	else if($add_mins == 45)
               	{
                	$add_min_amount = ($per_hour_amount*3)/4;
               	}
               	else
               	{
                	$add_min_amount = 0;
               	}
                $additional_hour_amount = $add_hour_amout+$add_min_amount;

	}
}
if($additional_hour_amount!=''){

$adnal_houramount =  $additional_hour_amount;
}
else{
	$adnal_houramount = 0;
}
$data['adnal_houramount']= $adnal_houramount;

$this->load->view('frontend/customer/release_payment',$data);




			
	}

public function release_payment_mover()
	{
// print_r($_POST);
// 		exit();
		 $token  = $this->input->post('stripeToken');
		  $price  = $this->input->post('price');
		  
		 
		 if(!empty($token)) {

		 require_once(APPPATH.'libraries/stripe/init.php');

			$total =$_POST['price'];
			$price =round($total * 100);
				
					    $secret = STRIPE_SECRET_API_KEY;  // you can get it in Stripe account settings
			\Stripe\Stripe::setApiKey( $secret );
			 
			try {
				if (!isset($token))
					throw new Exception('The Stripe Token was not generated correctly');
				\Stripe\Charge::create( array( 'amount' => $price , 'currency' => 'usd', 'source' => $token, 'description' => ' Marketplace'  ) );
			 
				 $success = 'Your payment was successful.';

				 $Payment_status ='Payment Success';
				/* 
				 * do some stuff here - you can send the plugin by email or force download it
				 */
			} catch (Exception $e) {
				/*
				 * if something went wrong
				 */ 
				//echo $e->getMessage();

				$Payment_status ='Payment pending';
			}

			
	}
	 $stripe_token = $token;

		
		 
		$orderid = $this->input->post('orderid');
 

		$data['orderid'] = $orderid;

	   	$result = $this->users_model->select_orders_resutls($orderid);

		$mover_id = $this->input->post('mover_id');
		$move_date = $this->input->post('move_date');
		$tip_amount = $this->input->post('tip_amount');
		$payment_amount = $this->input->post('price');
		$location_change_amt = $this->input->post('location_change_amt');
		$order_status = 'Pending HireMovers Confirmation';
		$username = $result[0]['b_First_name'];
		$user_email = $result[0]['b_email'];
		$customer_paid_amount = $result[0]['final_price'];
		 $admin_order_details_edit = $result[0]['admin_order_details_edit'];
		// exit();


		
// exit();
			 
		if($Payment_status=='Payment Success'){

			if($admin_order_details_edit ==1)
		{
			$admin_edit_distance = $result[0]['admin_edit_distance'];
			$admin_edit_mile_cost = $result[0]['admin_edit_mile_cost'];
			$admin_edit_tot_amt = $result[0]['admin_edit_tot_amt'];
			// $check_amount = $location_change_amt + $customer_paid_amount;

			$data1['distance']= $admin_edit_distance;
			$data1['per_mile_cost']= $admin_edit_mile_cost;
			$data1['final_price']= $admin_edit_tot_amt;
			

		}
		$superuser = $this->db->query("SELECT email,username,id_user_master from user_master where user_type = 'superuser'")->row();
	
		$superuser_mail=$superuser->email;
		$superuser_name=$superuser->username;
		$superuser_id = $superuser->id_user_master;

		$this->users_model->request_release_pay($mover_id,$move_date,$orderid,$username,$user_email,$superuser_mail,$superuser_name);
		$data1['release_pay'] =1;
		$data1['release_pay_amount']  =$payment_amount;
		$data1['order_status'] =$order_status;
		$data1['tip_amount']=$tip_amount;
		$data1['release_stripetoken']=$stripe_token;

		$this->db->where('id',$orderid);

		$this->db->update('order_details',$data1);

			echo 0;
}else{
	echo 1;
}

	}

public function release_payment_without_tip(){
	// exit();

	$orderid = $this->input->post('orderid');
 

		$data['orderid'] = $orderid;

	   	$result = $this->users_model->select_orders_resutls($orderid);

		$mover_id = $this->input->post('mover_id');
		$move_date = $this->input->post('move_date');
		
		$order_status = 'Pending HireMovers Confirmation';
		$username = $result[0]['b_First_name'];
		$user_email = $result[0]['b_email'];

			 
		
		$superuser = $this->db->query("SELECT email,username,id_user_master from user_master where user_type = 'superuser'")->row();
	
		$superuser_mail=$superuser->email;
		$superuser_name=$superuser->username;
		$superuser_id = $superuser->id_user_master;

		$this->users_model->request_release_pay($mover_id,$move_date,$orderid,$username,$user_email,$superuser_mail,$superuser_name);

		$this->db->where('id',$orderid);

		$this->db->update('order_details',array('release_pay'=>1,'tip_amount'=>0,'order_status'=>$order_status));

			echo 0;
}

/*kalai*/

public function contact_hiremover()
	{
 
	// print_r($_POST);
	// exit();
	$mover_id = $this->input->post('mover_id');
	$order_id = $this->input->post('order_id');
	$username = $this->input->post('user_name');
	$user_email = $this->input->post('user_email');
	$reason_for_contact = $this->input->post('reason_for_contact');
	$reason_value='';
	$description_for_contact = $this->input->post('description_for_contact');
	
	if($reason_for_contact=='Moving company cancelled'){
		 $reason_value = $this->input->post('moving_company_cancelled1');
		if($reason_value ==''){
			echo 1;
			exit();
		}
  }
  // $reason_value = $this->input->post('reason');
  

	$mover_mail1 = $this->db->query("SELECT email,username from user_master where id_user_master = '".$mover_id."' ")->row();
	$mover_mail = $mover_mail1->email;
	$mover_name= $mover_mail1->username;
	$created_on = date('Y-m-d h:i:s');
	//$to_admin_mail = 'support@hiremovers.org';

	$datavalues = array('mover_id'=> $mover_id,'order_id' => $order_id, 'reason_for_contact' => $reason_for_contact,'description'=>$description_for_contact,'reason'=>$reason_value,'created_on'=>$created_on); 
	
	// $superuser = $this->db->query("SELECT email,id_user_master from user_master where user_type = 'superuser'")->row();
	
	// $superuser_mail=$superuser->email;
	// $superuser_id = $superuser->id_user_master; 
	$send_mail = $this->users_model->contact_hiremover_mail($mover_mail,$mover_name,$reason_for_contact,$description_for_contact,$username,$user_email,$mover_id,$order_id,$reason_value);


	$this->db->insert('contact_hiremover',$datavalues);
   $insert_id = $this->db->insert_id();
if($insert_id){
	echo 0;
}

}


public function admin_order_details_edit_approvecustomer($order_id)
{
		$data['orderid'] = $order_id;

	   	$result = $this->db->query("SELECT * FROM  order_details  where  id ='$order_id'")->result_array();

		$data['order_results'] =$result;


		$this->load->view('frontend/customer/admin_edit_details_accept',$data);
}

public function change_added_hours(){
	// print_r($_POST);
	

	$hours = $this->input->post('changed_hours');
	$additional_hours_mins = $this->input->post('additional_hours');
	$order_id = $this->input->post('order_id');
	
	
	$mail_hours_req = $hours.' Hours and '.$additional_hours_mins.'mins Additional Hours';
	$order_details = $this->db->query("SELECT * FROM order_details where id='".$order_id."'")->row();

	
	$mover_id = $order_details->mover_id;
	$move_date = $order_details->move_date;
	$additional_hours_alrtkn = $order_details->additional_hours; 

	$mover_mail = $this->db->query('SELECT * from user_master where id_user_master ="'.$mover_id.'"')->row();

	$mover_mail_id = $mover_mail->email;
	$movername = $mover_mail->username;
	$b_email = $order_details->b_email;
	$b_First_name = $order_details->b_First_name;
	$b_Last_name = $order_details->b_Last_name;
	$user_name = $b_First_name.' '.$b_Last_name;
	/*super user dtails get*/
	$super_user = $this->users_model->get_admin_mail_details();
	$super_email = $super_user->email;
	$super_name = $super_user->username;
/*mail  send function*/
	$mail_hours = $this->users_model->change_hours_req_customer($order_id,$mover_mail_id,$b_email,$user_name,$mail_hours_req,$move_date,$super_email,$super_name,$movername);
// exit();


	if($order_id!=''){
		
		$add_hours = sprintf("%02d",$hours).':'.sprintf("%02d",$additional_hours_mins);
		$this->db->where('id',$order_id);
		 $this->db->update('order_details',array('mover_request_hours'=>$add_hours,'	mover_adtin_hr_status'=>0));

		echo 0;
	}
	else{
		echo 1;
	}
}

public function reschedule_request_customer()
 	{

  // print_r($_POST);

 					if ($this->input->is_ajax_request())
		{
			    $order = $this->input->post('order');
			    $alternate_date = $this->input->post('alternate_date'); 
			    $alternate_arr_time = $this->input->post('alternate_arr_time');
			    $notes_request = $this->input->post('notes_request');


				


		/**** sending reschedule request to customer to approve the change time ***/

			$get_order_details =$this->db->query("SELECT * FROM  order_details  where  id ='$order'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id = $get_order_details[0]['mover_id'];
	$order_id = $get_order_details[0]['id'];
	$customer_first_name = 	$get_order_details[0]['b_First_name'];
	$customer_email = $get_order_details[0]['b_email']; 
	$move_date  = $get_order_details[0]['move_date']; 
	$arrival_time  = $get_order_details[0]['arrival_time'];  	
	$re_request_move_date  = $get_order_details[0]['re_request_move_date'];
	$re_request_arraival_time  = $get_order_details[0]['re_request_arraival_time'];
	$move_date_dispay_format =date('l, F jS Y',strtotime($move_date));
	$re_move_date_dispay_format =date('l, F jS Y',strtotime($re_request_move_date));
		
	$get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id'")->result_array();

	if(!empty($get_mover_details))
	{
		$mover_fist_name = $get_mover_details[0]['first_name'];
		$mover_email_id = $get_mover_details[0]['email'];
		$company_name =ucfirst($get_mover_details[0]['company_name']) ;
		$phone = $get_mover_details[0]['phone'];


   }

}

// if(($alternate_arr_time != $re_request_arraival_time) ||  ){echo 'same';}
// if(($alternate_arr_time != $re_request_arraival_time) || ($alternate_date != $re_request_move_date)  ){
// print_r($_POST);
// exit();
$order_table =array(
	   	             're_request_move_date' =>$alternate_date,
					're_request_arraival_time' =>$alternate_arr_time,
					're_request_status' =>'Waiting for mover time Approval',
					'notes_request_reschedule'=>$notes_request,
					'modified_on' =>date('Y-m-d H:i:s')
					
				);

		$send_mail = $this->users_model->request_reschedule_order_details($customer_email,$order_id,$company_name,$customer_first_name,$move_date_dispay_format,$arrival_time,$alternate_date,$alternate_arr_time,$mover_email_id,$mover_fist_name,$notes_request);

// exit();
		 $this->db->where('id',$order);
		 $this->db->update('order_details',$order_table);
		echo 0;
	    
	}


 	}


/*******************************jamuna************************************/
public function review_request_mail()
{
   
   // print_r($_POST);
   // exit();

  $order_id = $this->input->post('order');
  $get_reason = $this->input->post('get_reason');

  //print_r($order_id);
  $order_info = $this->db->query("SELECT * FROM order_details where id='".$order_id."'")->row();
  //print_r($order_info);
  // exit;
    $b_email = $order_info->b_email;

	$b_First_name = $order_info->b_First_name;
	//print_r($b_First_name);
	$b_Last_name = $order_info->b_Last_name;
	$user_name = $b_First_name.' '.$b_Last_name;
	/*super user dtails get*/
	$super_user = $this->users_model->get_admin_mail_details();
	$super_email = $super_user->email;
	$super_name = $super_user->username;

	$send_review_mail = $this->users_model->request_review_mail($order_id,$b_email,$user_name,$super_email,$super_name,$get_reason);

}

public function reviews_popup($orderid)
	{
        
		$data['base_url'] = base_url();
		$data['orderid'] =$orderid;

$this->load->view('frontend/customer/req_review_pop',$data);

}

public function update_status()
{
  
  // print_r($_POST);
  $order = $this->input->post('order');
  // $order_confrom = $this->input->post('order_confrom'); 

   // if($order_confrom !='')

			// { 
				// $data =array('order_status' =>'Conf');
				$data =array('order_status' =>'Accepted','re_request_move_date'=>'','re_request_status'=>'','re_request_arraival_time'=>'');

				$order_update = $this->movers_model->update_confrom_order($order,$data);
				echo 1;

 // }
}

/******************************jamuna*****************************************/


/*********** test stripe start ****/
public function stripe_transfer(){
	require_once(APPPATH.'libraries/stripe/init.php');


	// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
// \Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");


\Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");

$redata =  \Stripe\Account::retrieve("acct_1A5MgrGkpsouO6Dp");


\Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");

$account = \Stripe\Account::retrieve("acct_1A5MgrGkpsouO6Dp");
$account->login_links->create();


// $redata = \Stripe\Account::create([
//   "type" => "standard",
//   "country" => "US",
//   "email" => "kalaivani@stallioni.com"
// ]);

echo "<pre>";print_r($redata);echo "</pre>";



// \Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");
// $charge = \Stripe\Transfer::create([
//   "amount" => 5000,
//   "currency" => "usd",
//   "destination" => "acct_1DqHtAAIzipqwjFH",
//   "transfer_group" => "ORDER_95"
// ]);


// echo "<pre>";print_r($charge);echo "</pre>";










//acct_1DqDlRH7luxgSE2Z

// \Stripe\Transfer::create([
//   "amount" => 60,
//   "currency" => "usd",
//   "destination" => "acct_1Dpuf3ARio9FZuEI",
//   "transfer_group" => "ORDER_95"
// ]);
// $charge = \Stripe\Charge::create([
//   "amount" => 70,
//   "currency" => "usd",
//   "source" => "tok_visa",
//   // "application_fee" => 3,
// ], ["stripe_account" => "acct_1Dpuf3ARio9FZuEI"]);

// $charge = \Stripe\Charge::create([
//   "amount" => 65,
//   "currency" => "usd",
//   "source" => "tok_visa",
//   "destination" => [
//     "account" => "acct_1Dpuf3ARio9FZuEI",
//   ],
// ]);

// $charge = \Stripe\Transfer::create(array(
//   'amount' => 55,
//   'currency' => "usd",
//   'destination' => 'acct_1Dpuf3ARio9FZuEI'
// ));

// $charge = \Stripe\Charge::create([
//   "amount" => 56,
//   "currency" => "usd",
//   "source" => "tok_visa",
//   "destination" => [
//     "account" => 'acct_1Dpuf3ARio9FZuEI',
//   ],
// ]);

// $charge = \Stripe\Payout::create([
//     "amount" => 57,
//     "currency" => "usd",
// ], ["stripe_account" => 'ca_AVTEqNcoBMjPHgyNPjkBSpC7LmyvU0yo']);

// $stripeAccountId = 'acct_1DqDmXJjZPshqNMu';

// $charge = \Stripe\Charge::create(array(
//   "amount" => 1000,
//   "currency" => "usd",
//   "source" => "tok_visa",
// ), array("stripe_account" => $stripeAccountId));


// \Stripe\Transfer::create(array(
//   'amount' => 59,
//   'currency' => "hkd",
//   'destination' => 'cus_EIR8mnb35zwvuw'
// ));

// echo "<pre>";print_r($charge);echo "</pre>";


// \Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");

// $account = \Stripe\Account::retrieve("acct_197dXpBKorklj30O");

// $account = \Stripe\Transfer::create(
//   [
//     "amount" => 58,
//     "currency" => "usd",
//     "destination" => "default_for_currency"
//   ],
//   ["stripe_account" => 'acct_1Dpuf3ARio9FZuEI']
// );

// $charge = $account->external_accounts->create(["external_account" => "btok_1DqE0oBKorklj30Obo6XUIxX"]);

// echo "<pre>";print_r($account);echo "</pre>";

// $charge = \Stripe\Charge::create([
//   "amount" => 50,
//   "currency" => "usd",
//   "source" => "tok_visa",
// ], ["stripe_account" => "acct_1A5MgrGkpsouO6Dp"]);

// // Create a second Transfer to another connected account (later):
// $transfer = \Stripe\Transfer::create([
//   "amount" => 2000,
//   "currency" => "usd",
//   "destination" => "{OTHER_CONNECTED_STRIPE_ACCOUNT_ID}",
//   "transfer_group" => "{ORDER10}",
// ]);


// \Stripe\Stripe::setApiKey("sk_test_ArGzjn9I6ZTNNTgeLpADldcF");

// $charge = \Stripe\Charge::create([
//   "amount" => 1000,
//   "currency" => "usd",
//   "customer" => 'cus_EIpYA7o9Z5X2IE' // Previously stored, then retrieved
// ]);

// echo "<pre>";print_r($charge);echo "</pre>";




// \Stripe\Payout::create([
//     "amount" => 1000,
//     "currency" => "usd",
// ], ["stripe_account" => 'acct_1DprOdIvb3ZJoPNY']);

/*\Stripe\Stripe::setApiKey("sk_test_oreX4gPVvkYgx26g0KsjMCiE");



$customer = \Stripe\Customer::create(array(
  "description" => "Hema viji Stallioni",
  // "currency" => "usd",
));

$customer_id =  $customer->id;

$customer = \Stripe\Customer::retrieve($customer_id);


$bank_data = \Stripe\Token::create(array(
  "bank_account" => array(
    "country" => "US",
    "currency" => "usd",
    "account_holder_name" => "Hema viji Stallioni",
    "account_holder_type" => "individual",
    "routing_number" => "110000000",
    "account_number" => "000123456789",
    "default_for_currency"=> true,
  )
));
echo "<pre>";print_r($bank_data);echo "</pre>";
$bank_token = $bank_data->id;

$bank_account = $customer->sources->create(array("source" => $bank_token));
echo "<pre>";print_r($bank_account);echo "</pre>";

$payout_data = \Stripe\Payout::create(array(
  "amount" => 1000,
  "currency" => "usd",
));

echo "<pre>";
print_r($payout_data);
die;*/

}

public function stripe_connect(){

	echo "<a href='https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_EIRQEJ7PJ87frv8PUyyc2ylpi5HN0dGc&scope=read_write'>Connect</a>";
}

public function stripe_redirect(){
	// echo "<pre>";print_r($_POST);echo "</pre>";
	// echo "<pre>";print_r($_GET);echo "</pre>";

// 	curl -X POST https://connect.stripe.com/oauth/token \
// -d client_secret=YOUR_SECRET_KEY \
// -d code=ac_EIsEUd5qcT54OrxZmvJYWJTsma87libk \
// -d grant_type=authorization_code

$code = $_GET['code'];

 define('CLIENT_ID', 'ca_EIRQEJ7PJ87frv8PUyyc2ylpi5HN0dGc');
  define('API_KEY', 'sk_test_oreX4gPVvkYgx26g0KsjMCiE');
  define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
  define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');
  if (isset($code)) { // Redirect w/ code
    $code = $code;
    $token_request_body = array(
      'client_secret' => API_KEY,
      'grant_type' => 'authorization_code',
      'client_id' => CLIENT_ID,
      'code' => $code,
    );
    $req = curl_init(TOKEN_URI);
    curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($req, CURLOPT_POST, true );
    curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));
    // TODO: Additional error handling
    $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
    $resp = json_decode(curl_exec($req), true);
    echo "<pre>";print_r($resp);echo "</pre>";
echo "access_token = ".$resp['access_token'];



// redirect(BASE_URL);


// $ddd = file_get_contents('https://stripe.com/connect/default/oauth/test?scope=read_write&code='.$code);
// echo $ddd;

    curl_close($req);











    
  } else if (isset($_GET['error'])) { // Error

  	echo "eeeeeeeeeee";
    echo $_GET['error_description'];
  } else { // Show OAuth link

  	echo "elssssddddddddddd";
    $authorize_request_body = array(
      'response_type' => 'code',
      'scope' => 'read_write',
      'client_id' => CLIENT_ID
    );
    $url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
    echo "<a href='$url'>Connect with Stripe</a>";
  }
}
/*********** test stripe end ***/
}
