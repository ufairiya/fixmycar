<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model{
    
	public $table_tmpcart 		  = "temp_cart";


  
    /*Update movers about create*/
	 public function update($table_name,$data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($table_name, $data);
    }
	
	// Create movers about
	public function insert($table_name,$data)
	{

		$this->db->insert($table_name, $data);		
		return $this->db->insert_id();
		
		
	}
	
	// Get User
	
	public function getDetails($table_name, $param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

	    //$fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";		
			
		if($column !=''){
			$this->db->select($column);
		}else{
			$this->db->select('*');
		}
		if (is_array($param) && count($param)>0){
			$this->db->where($param);		
		}

		if (is_array($where_or) && count($where_or)>0){
			$this->db->or_where($where_or);		
		}
		//if($site_admin== FALSE){
		//	$this->db->where("site_admin !=","1");
		//}
		if(is_array($orderby) && count($orderby) > 0){
			
			 $order_by = isset($orderby['order_by']) ? $orderby['order_by'] : FALSE;
			 $disp_order = isset($orderby['disp_order']) ? $orderby['disp_order'] : FALSE;
			$this->db->order_by($order_by, $disp_order); 
		}
				
		$result = $this->db->get($table_name);
		
		if ($result != FALSE && $result->num_rows()>0){

			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$option();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$option();
				}
			}
			
			
			//return $aResponse;
		}
		return FALSE;
		
	}
	

	/*** hemalatha ***/


		public function get_move_date($random_number)
	{

		$query = $this->db->query("SELECT  *  from temp_cart Where random_number='".$random_number."'" )->result_array();
		

			return $query;
	}


/*kalai*/

public function get_failiure_details($random_number,$mover_id){
	$query = $this->db->query("SELECT  *  from order_details Where random_number='".$random_number."' and mover_id ='$mover_id'" )->result_array();
		

			return $query;
}

public function check_avail_mail($check_mail){
	$query = $this->db->query("SELECT  *  from user_master Where email='".$check_mail."'" )->result_array();
		

			return $query;
}

public function add_customer($insert_datas,$check_mail,$usernames){
	// print_r($insert_datas);

	$this->db->insert('user_master',$insert_datas);
	$user_id =$this->db->insert_id();

// $user_id = 393;
// $check_mail='kalaiponnusamy94@gmail.com';
$mail_subject_c= 'Account Registered Successfully';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	
  <p style="font-size:15px;">Dear '.$usernames.',</p>
	<p style=" font-size: 15px;">Your account have been registered Successfully.</p>
	<p style=" font-size: 15px;">Your login ID is : '.$check_mail.' </p>
	



			<p style=" font-size: 15px;"><a href ='.BASE_URL.'/login/customer_password_update/'.$user_id.'>Click this Link</a> </p>

	

<p style=" font-size: 15px;">Thanks,</p>
<p style="font-size:15px;">HireMovers Support </p>

	</div>

</div>

<br><br>
</div>


</html>';

	$headers = "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$to = $check_mail; 

	// $to = 'kalaiponnusamy94@gmail.com';

	// $subject = 'Additional Hours Add Request From Customer ';
	// $message = ' order_id: '.$order_id.'<br> Move Date: '.$move_date.'<br> Additional Hour: '.$mail_hours_req;

	// echo $check_mail;
	// if(mail($to,$mail_subject_c,$mail_message_c,$headers)){echo 'mail send';}else{echo 'mail not send';}
mail($to,$mail_subject_c,$mail_message_c,$headers);

}

public function password_send_customer_mail($username,$mailid,$confirmpassword){
	$mail_subject_c= 'HireMovers Account Password Created Successfully';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	
  <p style="font-size:15px;">Dear '.$username.',</p>
	
	<p style=" font-size: 15px;">Your login ID is : '.$mailid.' </p>
	<p style=" font-size: 15px;">Your password is : '.$confirmpassword.'</p>
	<p style=" font-size: 15px;">You have registered successfully. </p>

	

<p style=" font-size: 15px;">Thanks,</p>
<p style="font-size:15px;">HireMovers Support </p>

	</div>

</div>

<br><br>
</div>


</html>';

	$headers = "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$to = $mailid;

	// $to = 'kalaiponnusamy94@gmail.com';

	// $subject = 'Additional Hours Add Request From Customer ';
	// $message = ' order_id: '.$order_id.'<br> Move Date: '.$move_date.'<br> Additional Hour: '.$mail_hours_req;

	// echo $check_mail;
	// if(mail($to,$mail_subject_c,$mail_message_c,$headers)){echo 'mail send';}else{echo 'mail not send';}
mail($to,$mail_subject_c,$mail_message_c,$headers);

}



/*kalai*/
	public function update_temp_cart($random_number,$update_array_new)
	{
		  //  $this->db->where($where);
    // $this->db->update($table, $data);

// 		$data = array(  
// 'title' => $title,  
// 'name' => $name,  
// 'date' => $date  
// );  
$this->db->where('random_number', $random_number);  
$this->db->update('temp_cart', $update_array_new); 

 // $this->db->where('id', $mover_id);

	//  $this->db->update('movers_rate_new', $data);
	}



	/***** hemalatha ***/

	public function show_all_orders()
	{

		$query = $this->db->query("SELECT  * from  order_details" )->result_array();

			return $query;

	}
	/****kiruthika***/ 

public function booking_hrs()

{

$this->db->select('*');
       $this->db->from('movers_days');
   $query = $this->db->get();
return $result = $query->result();
  }	


}
