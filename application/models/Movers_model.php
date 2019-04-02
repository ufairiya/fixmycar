<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Movers_model extends CI_Model{
    
	public $table 				  = "movers_about";
	public $table_days 			  = "movers_days";
	public $table_area 			  = "movers_servicearea";
	public $table_rate            = "movers_rate";
	

   
    /*Update movers about create*/
	 public function update_abt($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	
	// Create movers about
	public function insert_abt($data)
	{

		$this->db->insert($this->table, $data);		
		return $this->db->insert_id();
		
		
	}
	
	// Get User
	
	public function getAboutDetails($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->table);
		
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

	 /*Update movers working days */
	 public function update_day($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_days, $data);
    }
	
	// Create movers working days
	public function insert_day($data)
	{

		$this->db->insert($this->table_days, $data);		
		return $this->db->insert_id();
		
		
	}
	
	// Get working days
	
	public function getDaysDetails($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->table_days);
		
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

	 /*Update movers service area */
	 public function update_area($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_area, $data);
    }
	
	// Create movers service area 
	public function insert_area($data)
	{

		$this->db->insert($this->table_area, $data);		
		return $this->db->insert_id();
		
		
	}
	
	// Get service area 
	
	public function getAreaDetails($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->table_area);
		
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

	 /*Update movers rate create*/
	 public function update_rate($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_rate, $data);
    }
	
	// Create movers rate
	public function insert_rate($data)
	{

		$this->db->insert($this->table_rate, $data);		
		return $this->db->insert_id();
		
		
	}
	
	// Get rate
	
	public function getRateDetails($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->table_rate);
		
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



/******** hemalatha **********/

public function getMoversratedetails($movers_id,$movers_count)
{



	$gervalues = $this->db->query("SELECT  price_value,movers_min_time,addtional_hours from movers_rate_new Where userid='$movers_id'  AND  movers_count ='$movers_count' " )->result_array();

	return $gervalues;
}
/*kalai*/

public function getMoversavail_details($booking_day){ 
	$values = $this->db->query("SELECT user_id from movers_days where day_value ='".$booking_day."' and available='no' ")->result_array();
	foreach ($values as $key => $value) {
		$movers_iddd[] = $value['user_id'];
	}
	return $movers_iddd;
}

public function send_order_confirmation_mail($order)
{

$get_order_details =$this->db->query("SELECT * FROM  order_details  where  id ='$order'")->result_array();


if(!empty($get_order_details))
{
	$_mover_id = $get_order_details[0]['mover_id'];
	$order_id = $get_order_details[0]['id'];
	$customer_first_name = 	$get_order_details[0]['b_First_name'];
	$customer_email = $get_order_details[0]['b_email']; 

	$get_mover_details =$this->db->query("SELECT * FROM  user_master  where  id_user_master ='$_mover_id'")->result_array();

	if(!empty($get_mover_details))
	{
		$mover_fist_name = $get_mover_details[0]['first_name'];
		$mover_email_id = $get_mover_details[0]['email'];
		$company_name =ucfirst($get_mover_details[0]['company_name']) ;
		$phone = $get_mover_details[0]['phone'];

   }

}

$customer_email= $customer_email;

$mail_subject_c='Your  Order # '.$order_id.' Has Been Confirmed by '.$company_name.' ';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
         <small style="color: #A7A6A5;">Good news! '.$company_name.' has confirmed your job!</small>  <br>
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;">'.$customer_first_name.', </p>

	<p style=" font-size: 15px;">'.$company_name.' has confirmed your job request. If you have not made contact with the Movers, please call them at your earliest convenience to confirm the order details. </p>

	

	<p style="font-size: 15px;margin-top: 14px;"> <b>Contact Information: </b> </p>

	<p style="font-size: 15px;>'.$company_name.'</p>

	<p style=" font-size: 15px;"><b>Contact:</b>'.$mover_fist_name.'</p>
	 
	<p style=" font-size: 15px;"><b>Phone:</b>'.$phone.'</p>


	<p>Thanks for choosing HireMovers  and '.$company_name.'. </p>

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



/*kalai*/

public function movers_rate_list_details($current_user)
{

			$query = $this->db->query("SELECT  * from movers_rate_new where userid='$current_user'")->result_array();

			return $query;
 		
}

public function insert_movers_rate_details($data)
{
	$result =$this->db->insert(' movers_rate_new',$data);

	return  $result;
					
}

public function update_movers_rate_stl_details($id)
{


		$query = $this->db->query("SELECT  * from movers_rate_new Where id='$id'" )->result_array();

		return $query;
}

public function update_movers_rate_valuess($mover_id,$data)
{
	 $this->db->where('id', $mover_id);

	 $this->db->update('movers_rate_new', $data);
}

public function delete_movers_rate_stl1($id)
{
	$this ->db-> where('id', $id);
	$this ->db-> delete('movers_rate_new');
}
public function delete_movers_serviceplaces($area_id)
{
	$this ->db-> where('area_id', $area_id);
	$this ->db-> delete('movers_servicearea');
}

public  function  select_orders($user_id)
{
	
	$query = $this->db->query("SELECT  * from  order_details Where mover_id='$user_id'" )->result_array();

		return $query;
		
}

public  function  select_orders_moversss($user_id)
{

	$query = $this->db->query("SELECT  * from  order_details Where mover_id='$user_id' and         (order_status != 'Cancelled' and order_status !='Pending HireMovers Confirmation' and order_status !='Payment pending' and order_status!='Rejected' and order_status !='Payment Failed' and order_status!='Payment incomplete' ) ")->result_array();

		return $query;
		
}
/*kalai*/
public  function  select_movers_order($user_id)
{

	// $query = $this->db->query("SELECT  * from  order_details Where mover_id='$user_id' and order_status!='Rejected' and order_status != 'Payment Failed' order by id DESC ")->result_array();
	$query ="SELECT * FROM `order_details` WHERE mover_id ='$user_id' and order_status!='Rejected' and order_status != 'Payment Failed' ";
	$details = $this->db->query($query);
	$dateass = $details->result_array();
	 return $dateass;
	

}                     

 public function check_availtime_movers($move_date_check,$movers_id,$time,$booking_day)
{
// echo $time;	
$time1 = date("H",strtotime($time));

$bdates = Date('Y-m-d',strtotime($move_date_check)); 
// echo $bdates;
$start_time = '' ;
$end_time = '';
$get_bdate_idss = $this->db->query("SELECT block_mover_id from movers_blockdate where block_date = '".$bdates."' and all_day ='no'   ")->result_array(); 
					
					if(!empty($get_bdate_idss)){
		foreach ($get_bdate_idss as $value) {
			
			$get_bdate_idssk[]=$value['block_mover_id'];
		}
	}
					if((!empty($get_bdate_idss)) && in_array($movers_id, $get_bdate_idssk))
					{

						$count_valuess =$this->db->query("SELECT count(*) as block_id_count from movers_blockdate where  all_day ='no' and block_mover_id ='".$movers_id."' and  block_date = '".$bdates."'  ")->row();
						
						if($count_valuess->block_id_count>1){
// echo 'first';
				
				$get_bend_time = $this->db->query("SELECT * FROM `movers_blockdate` where start_end <'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' order by start_end desc limit 1")->row(); 
				
				$get_bstart_time = $this->db->query("SELECT * FROM `movers_blockdate` where start_end >'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' order by start_end desc limit 1")->row();
				// print_r($get_bstart_time);

				if($get_bend_time!='' && $get_bstart_time!=''){
// echo 'if parlt';

				   $start_time  = date("g A", strtotime($get_bend_time->bend_time));
				   $end_time  = date("g A", strtotime($get_bstart_time->bstart_time));
				}
				else{
					

					$get_bend_time123 = $this->db->query("SELECT * FROM `movers_blockdate` where bstart_time >'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' order by bstart_time asc limit 1")->row(); 
					$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
						
						if($moves_daydetails!='' && $get_bend_time123!='' )
						{
							
							  $start_time  = date("g A", strtotime("$moves_daydetails->start_time"));
							 $end_time = date("g A", strtotime("$get_bend_time123->bstart_time"));
						}
						else
						{
							$get_bend_time123 = $this->db->query("SELECT * FROM `movers_blockdate` where bend_time <'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' order by bend_time desc limit 1")->row(); 
							$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
								if($get_bend_time123!='' && $moves_daydetails!='')
								{

								 		$start_time  = date("g A", strtotime("$get_bend_time123->bend_time"));
										 $end_time = date("g A", strtotime("$moves_daydetails->end_time"));

								}
						}

				}
			}
				else{

					

					$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
						
						if($moves_daydetails)
						{
							
							  $start_time123  = date("g A", strtotime("$moves_daydetails->start_time"));
							 $end_time123 = date("g A", strtotime("$moves_daydetails->end_time"));
						}

				$bstart_times =	$this->db->query("SELECT * FROM `movers_blockdate` where start_end <'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' ")->row(); 
				
				
				if(!empty($bstart_times)){
					$start_time_block = date("g A", strtotime("$bstart_times->bend_time"));
					$start_time = $start_time_block;
					$end_time = $end_time123;
				}


				$bend_times =	$this->db->query("SELECT * FROM `movers_blockdate` where start_end >'".$time."' and block_date = '".$bdates."' and block_mover_id = '".$movers_id."' ")->row(); 
				
				if($bend_times!=''){
				$end_time_block = date("g A", strtotime("$bend_times->bstart_time"));
				$end_time = $end_time_block;
				$start_time = $start_time123;
				}	
					
				}	
			
				
			}
			else{
				$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
						// print_r($movers_id);
						if($moves_daydetails)
						{
							

							

							  $start_time  = date("g A", strtotime("$moves_daydetails->start_time"));
							  $end_time  = date("g A", strtotime("$moves_daydetails->end_time"));
						}
			}
			
return array('start_time' => $start_time,'end_time' => $end_time);

}


public function get_availabiltytime($move_date_check,$movers_id,$booking_day){

		$bdates = Date('Y-m-d',strtotime($move_date_check)); 
		// $moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
		// print_r($moves_daydetails);
		// echo $booking_day,'sssss';
		$start_time = '' ;
		$end_time = '';
		$end_start_times='';
		$get_bdate_idss = $this->db->query("SELECT block_mover_id from movers_blockdate where block_date = '".$bdates."' and all_day ='no'   ")->result_array(); 
					
		if(!empty($get_bdate_idss))
		{
			foreach ($get_bdate_idss as $value) 
			{
				
				$get_bdate_idssk[]=$value['block_mover_id'];
			}
		}
		if((!empty($get_bdate_idss)) && in_array($movers_id, $get_bdate_idssk))
		{
			$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
						// print_r($movers_id);
						if($moves_daydetails)
						{
							$start_time = '' ;
							$end_time = '';
						  $start_time =	 $moves_daydetails->start_time; 
							 // echo 'end time';
							 
						 $end_time  = $moves_daydetails->end_time;
						
						 }
						 if($start_time!='' && $end_time!='')
						 {
						$blocked_times = $this->db->query("SELECT * FROM movers_blockdate where block_date ='".$bdates."' and block_mover_id='".$movers_id."' and   (bstart_time BETWEEN '".$start_time."' and '".$end_time."' or bend_time BETWEEN '".$start_time."' and '".$end_time."') order by start_end")->result_array();
						
					if(empty($blocked_times)){
						$blocked_times = $this->db->query("SELECT * FROM movers_blockdate where block_date ='".$bdates."' and block_mover_id='".$movers_id."'  order by start_end")->result_array();
					}
				}
$avail='';
$curredted_time='';
$curreted_times='';
// print_r($blocked_times);exit();
						
					if($blocked_times){

						foreach ($blocked_times as $key => $value) {
							# code...

							$start_times[] =$value['bstart_time'] ;
							$end_times[] = $value['bend_time'];
							$start_endtime[] = $value['start_end'];
						}


						// echo 'count';
						$blk_time_count = count($start_endtime);
						// print_r($blk_time_count);

						for ($i=0; $i < $blk_time_count ; $i++) { 
							
							// echo $i;
							$start_end_time[] = explode('-',$start_endtime[$i]);
							

						}


// print_r($start_end_time);

						for ($i=0; $i <= $blk_time_count ; $i++) { 
							
							// echo $i;
							if($i==0){
								if(floor($start_time) < floor($start_end_time[0][0])){

									// echo floor($start_time);
									// if($start_time!='')
									// echo $start_time,'starttime';echo $start_end_time[$i][0],'endtime'; 
									if($start_time.':00'!=$start_end_time[$i][0])
									{


								   		$avail = date("g A", strtotime($start_time.':00')).'-'.date("g A", strtotime($start_end_time[$i][0])). ' and ';
									}
									
								}
							}

							// if($i>0 && $i<$blk_time_count)
							// 	{echo 'hi';print_r($start_end_time[$i]);}
							
							if($i>0 && $i<$blk_time_count){
								
								$j = $i-1;
								
								// echo $start_end_time[$j][1],'starttime';echo $start_end_time[$j+1][0],'endtime'; 
								if($start_end_time[$j][1]!=$start_end_time[$j+1][0]){
								 $curredted_time .= date("g A", strtotime($start_end_time[$j][1])).' - '.date("g A", strtotime($start_end_time[$j+1][0])). ' and ';
								}
								
							}


							if($i==$blk_time_count )
							{

								$j = $i-1;
								if($start_end_time[$j][1]!='00:00' || $start_end_time[$j][1]!='23:59')
								{
									if(floor($end_time) > floor($start_end_time[$j][1]))
									{

									 
									// echo $start_end_time[$j][1],'starttime'; echo$end_time.':00'; 
										if($start_end_time[$j][1]!=$end_time.':00'){
									$curreted_times =  date("g A", strtotime($start_end_time[$j][1])).' - '.date("g A", strtotime($end_time.':00'));
									}
									}
								}
							}
							

							
// echo $i; 
						}
 $end_start_times123 = $avail .''.$curredted_time.''.$curreted_times;	
$end_start_times = rtrim($end_start_times123,' and ');

}
						
					 

						
		}
		else{
			$moves_daydetails = $this->getDaysDetails(array('user_id' => $movers_id,'day_value' => $booking_day),'row');
						// print_r($movers_id);
						if($moves_daydetails)
						{
							$start_time  = date("g A", strtotime("$moves_daydetails->start_time"));
							$end_time  = date("g A", strtotime("$moves_daydetails->end_time"));
							$end_start_times = $start_time .'-'.$end_time;

						}
		}

// if($end_start_times==''){
// 	// $end_start_times = 'Mover not provide working hours for this day';
// }
return array('start_end_times' => $end_start_times);

}

/*kalai end*/

public function select_orders_resutls($orderid)
{
		$query = $this->db->query("SELECT * from  order_details Where id='$orderid'" )->result_array();

		return $query;
}

public function accepted_user_additional_hour($orderid,$additional_hours,$customer_email,$mover_name,$mover_mail,$customer_name){

			$email_sub = 'Additional Hours Add Request Accepted';
			$headers = "From: " .$customer_name."<".$customer_email.">"."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #F7F5F2;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
	      	</div> <br>

			<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
			  
			<div style="padding-left: 18px;"> <br>
			<p style=" font-size: 15px;"> Dear '.$mover_name.',</p>
			<p style="font-size:15px;">Order id :'.$orderid.',</p>
			<p style=" font-size: 15px;">Your Additional Hours Request has been Accepted. </p>
			


			<br>

			<p style=" font-size: 15px;">Thanks, </p>
			<p style=" font-size: 15px;">'.$customer_name.'</p>


			</div>

			</div>

			<br><br>
			</div></html>';
			// $customer_email = 'kalaiponnusamy94@gmail.com';
			mail($mover_mail,$email_sub,$mail_message,$headers)
;}

public function decline_user_additional_hour($orderid,$additional_hours,$customer_email,$mover_name,$mover_mail,$customer_name){
	$email_sub = 'Additional Hours Add Request Declined';
			$headers = "From: " .$customer_name."<".$customer_email.">"."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #F7F5F2;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
	      	</div> <br>

			<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
			  
			<div style="padding-left: 18px;"> <br>
			<p style=" font-size: 15px;"> Dear '.$mover_name.',</p>
			<p style="font-size:15px;">Order id :'.$orderid.',</p>
			<p style=" font-size: 15px;">Your Additional Hours Request has been Declined.</p>
			


			<br>

			<p style=" font-size: 15px;">Thanks, </p>
			<p style=" font-size: 15px;">'.$customer_name.'</p>


			</div>

			</div>

			<br><br>
			</div></html>';
			// $customer_email = 'kalaiponnusamy94@gmail.com';
			mail($mover_mail,$email_sub,$mail_message,$headers);
			// if(mail($customer_email,$email_sub,$mail_message,$headers)){echo 'mail send scucf';}else{echo 'not oj';}
}
/*kalai start*/
public function get_perticular_mover($mover_id)
{
		$query = $this->db->query("SELECT * from  user_master Where id_user_master='$mover_id'" )->row();

		return $query;
}
public function get_block_details($block_id)
{
		$query = $this->db->query("SELECT  * from  movers_blockdate Where block_id='$block_id'" )->row();

		return $query;
}
public function delete_blockdate($block_id)
{
		$this->db->where('block_id', $block_id);
		$query=$this->db->delete('movers_blockdate');
		
		return $query;
}
public function delete_block_date($block_id)
{
		$this->db->where('block_id', $block_id);
		$query=$this->db->delete('movers_blocked_dates');

		return $query;
}
/*kalai*/
public function insert_crew_members($data)
{
	$result =$this->db->insert(' allocated_crew_members',$data);

	return  $result;

}

public function select_crew_members($order)
{


		$query = $this->db->query("SELECT  order_id from allocated_crew_members Where order_id='$order'" )->result_array();
		return $query;
}


public function update_crew_members($data,$order)

{


	 $this->db->where('order_id', $order);

	 $this->db->update('allocated_crew_members', $data);

}


public function cancel_order_request_insert($data)
{
		$result=$this->db->insert('canceled_orders',$data);
		return $result;
}

public function cancel_order_request_update($order,$data)
{

	$this->db->where('order_id', $order);

	 $this->db->update('canceled_orders', $data);

}

public function select_cancel_order($order)
{


		$query = $this->db->query("SELECT  order_id from canceled_orders Where order_id='$order'" )->result_array();
		return $query;

}


public function update_cancel_order($order,$order_table)
{

		$this->db->where('id', $order);

	 $this->db->update('order_details', $order_table);

}

public function get_reviews($currentuser)
{
 
	$reviews =$this->db->query("SELECT * FROM  order_details where mover_id='$currentuser' and star_count!='' order by id DESC limit 10")->result_array();

	return $reviews;

}

public function get_admin_fee($user_id)
{


	$admin_fee =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$user_id'")->result_array();

	return $admin_fee;

}

public function getReviewDetails($mover_id)
{

// $review_details_new =$this->db->query("SELECT  *  FROM  order_details where mover_id='$mover_id' AND   star_count  IS NOT NULL AND review_comments  IS NOT NULL " )->result_array();

$review_details_new = $this->db->query("SELECT * FROM order_details where mover_id='".$mover_id."' AND (star_count!='' AND review_comments!='' ) order by id DESC limit 10 ")->result_array();

	return $review_details_new;
}

public function getCompanyname($mover_id)
{
	$title =$this->db->query("SELECT company_name FROM  user_master where id_user_master='$mover_id'")->result_array();

	return $title;

}

public function insert_movers_review_content($order,$data)
{


		$this->db->where('id', $order);

	 $this->db->update('order_details', $data);
}

public function get_slot_per_day_count($movers_id,$random_number)
{



$select_move_date =$this->db->query(" SELECT 	move_date  FROM `temp_cart` WHERE random_number ='$random_number' " )->result_array();

if(!empty($select_move_date))
{

	$date =$select_move_date[0]['move_date'];
}

$date =explode(' ', $date);
 $date = date("Y/m/d" ,strtotime($date[0]) ) ;

$slot_per_day =$this->db->query(" SELECT COUNT(mover_id) as mover_id FROM `order_details` WHERE `move_date` LIKE '%$date %' AND mover_id ='$movers_id' " )->result_array();
	return $slot_per_day;

}

public function get_slot_per_day_countof_movers($movers_id)
{


$slot_per_day =$this->db->query(" SELECT  	slot_per_day  FROM `user_master` WHERE  id_user_master ='$movers_id' ")->result_array();

	return $slot_per_day;	
}

public function update_confrom_order($order,$data)
{

		$this->db->where('id', $order);

	 $this->db->update('order_details', $data);
	 

}

public function block_dates($current_user,$block_date,$block_id)
{

	$block_dates =$this->db->query(" SELECT  mover_id,Block_date  FROM `movers_blocked_dates` WHERE  mover_id ='$current_user'  AND 
	Block_date ='$block_date' ")->result_array();

	if(empty($block_dates))
	{


		$block_dates =$this->db->query(" INSERT INTO  `movers_blocked_dates` (mover_id,Block_date,block_id)  values  ('$current_user' , '$block_date' ,'$block_id')  " );


	}

	else {

		$block_dates =$this->db->query(" UPDATE  `movers_blocked_dates`  SET  mover_id ='$current_user',Block_date ='$block_date'  WHERE  mover_id ='$current_user'  AND Block_date ='$block_date' ");

	}


}



public function check_move_is_blocked($movers_id,$move_date_check)
{


$move_date_check =date("m/d/Y" ,strtotime($move_date_check) ) ;

	$block_dates =$this->db->query(" SELECT  mover_id  FROM `movers_blocked_dates` WHERE  mover_id ='$movers_id'  AND 
	Block_date ='$move_date_check' ")->result_array();
	return $block_dates;

}

public function check_move_time_is_blocked($movers_id,$time,$move_date_check)
{


	$move_date_check =date("Y-m-d" ,strtotime($move_date_check) ) ;


$block_time =$this->db->query(" SELECT block_id,block_mover_id FROM `movers_blockdate` WHERE block_date ='$move_date_check' and '$time' BETWEEN bstart_time and bend_time and  block_mover_id='$movers_id' ")->result_array();


	return $block_time;

}




public function check_move_date_is_blocked($movers_id,$move_date_check)
{


	$date=date("Y-m-d" ,strtotime($move_date_check) ) ;


$block_time =$this->db->query(" SELECT * FROM `movers_blockdate` WHERE block_date ='$date' and  block_mover_id='$movers_id' ")->result_array();


	return $block_time;

}





public function update_changed_price_and_hours1($data,$temp_cart_id)
{


 $this->db->where('temp_cart_id',$temp_cart_id);
   $result =$this->db->update('temp_cart',$data);

   return $result;

}



/**********Rajeswari************/
public function form_insert_model($data){
	
		$result=$this->db->insert('new1_crewmember',$data);
		return $result;

	}
	public function crew_member1($curent_login_id)

{
	 $query = $this->db->query("SELECT  * from new1_crewmember where user_id='$curent_login_id' " )->result_array();

			return $query;
	
}
/*kalai*/
public function send_cancellation_mail_to_customer($order,$cancel_reason,$notes_request){
	$order_details = $this->db->query("SELECT * FROM order_details where id = '".$order."'")->row();
	if($order_details!=''){
		$customer_email = $order_details->b_email;
		$customer_id = $order_details->customer_id;
		$mover_id = $order_details->mover_id;
		$mover_details =$this->db->query("SELECT * FROM user_master where id_user_master = '".$mover_id."'")->row();
		$customer_details =$this->db->query("SELECT * FROM user_master where id_user_master = '".$customer_id."'")->row();
		$admin_details = $this->users_model->get_admin_mail_details();
		$admin_name = $admin_details->username;
		$admin_mail = $admin_details->email;
$mover_name = $mover_details->username;
$mover_mail = $mover_details->email;

		$email_sub = 'Order Cancellation Request From Mover';
			$headers = "From: " .$mover_name."<".$mover_mail.">"."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #F7F5F2;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
	      	</div> <br>

			<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
			  
			<div style="padding-left: 18px;">
			<p style=" font-size: 15px;"> Dear '.MAIL_FROM_NAME.',</p>
			<p style="font-size:15px;">Order id :'.$order.',</p>
			<p style=" font-size: 15px;">Reason: '.$cancel_reason.'</p>
			<p style=" font-size: 15px;">Notes for cancel: '.$notes_request.'</p>		


			<br>

			<p style=" font-size: 15px;">Thanks, </p>
			<p style=" font-size: 15px;">Mover Support</p>


			</div>

			</div>

			<br><br>
			</div></html>';
			$admin_mail = MAIL_ID_FROM;
			mail($admin_mail,$email_sub,$mail_message,$headers);
			// if(mail($customer_email,$email_sub,$mail_message,$headers)){echo 'mail send scucf';}else{echo 'not oj';}
	}
}
/*kalai end*/
public function edit_crew_model($id)
{
		 $query = $this->db->query("SELECT  * from new1_crewmember where id='$id' " )->result_array();

			return $query;

}

public function update_crew_model($id,$data)
{

	 $this->db->where('id',$id);
        return $this->db->update('new1_crewmember',$data);
}

public function delete_crew_model($id){
	$this->db->where('id', $id);
$this->db->delete('new1_crewmember');
}

public function location_display($curent_login_id)

{
	 $user_details=$this->db->query("SELECT * FROM movers_servicearea where user_id ='$curent_login_id'")->result_array(); 
	 return   $user_details;

}


public function get_permil_details()
{


		$query = $this->db->query("SELECT  * from movers_rate_new " )->result_array();

		return $query;
}

	
}
