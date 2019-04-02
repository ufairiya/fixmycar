<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model{
    
	public $table 				  = "user_master";
	public $table_user_level 	  = "user_levels";
	public $table_user_activity	  = "usertracking";
	public $table_user_access	  = "user_privileges";
	public $table_user_address	  = "user_address";
	public $table_user_contact	  = "user_contact";
	public $table_user_subscription	  = "user_subscription";
	public $table_user_privilege	  = "user_privilege";
	public $table_user_query_map = "user_query_map";


  
    /*User Access create*/
	 public function update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	
	// Create New User
	public function user_insert($data)
	{
		$where['email'] =isset($data['email']) ? $data['email']  :'';
		if($where['email'] !=''){
			$this->db->where($where);
			$result = $this->db->get($this->table);
			if ($result != FALSE && $result->num_rows() > 0){				
				return $result->row()->id_user_master;
			}else{
				$this->db->insert($this->table, $data);		
				return $this->db->insert_id();
			}
		}else{
			$this->db->insert($this->table, $data);		
			return $this->db->insert_id();
		}
		
		
	}
	 public function insertEmployee($data)
        {       
        $this->db->insert('user_master',$data); 
        $insert_id = $this->db->insert_id();

   return $insert_id;    
    }
    	// Create  User subscription
	public function user_subscription_insert($data)
	{
		
			$this->db->insert($this->table_user_subscription, $data);		
			return $this->db->insert_id();
		
		
		
	}
	public function user_subscription_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_user_subscription, $data);
    }

	public function user_privilege_insert($data)
	{
		$this->db->insert($this->table_user_privilege, $data);		
		return $this->db->insert_id();
	}
	public function user_privilege_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_user_privilege, $data);
    }

	public function user_address_insert($data)
	{
		$this->db->insert('user_address', $data);
        return $this->db->insert_id();
	}

	public function getSalesRepCode($where=''){

		$this->db->select('ifnull(MAX(`user_cust_code`) + 1,1) as sales_rep');	
		if( isset($param) && $param !=''){
			$this->db->select($param);
		}
		if (isset($where) && is_array($where) && count($where)>0){
			$this->db->where($where);
		}

		$result = $this->db->get($this->table);
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->row()->sales_rep;
		}
		return FALSE;
	}
	
	//Update User master
	 public function user_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
    //Update User Level
	 public function user_address_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update('user_address', $data);
    }
	
	// Delete User
	
	public function user_delete($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
	}


	// Delete User
	
	public function user_contact_delete($where = array())
	{
		if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table_user_contact);
	}
	
	// Delete User Permanently
	
	public function user_delete_permanently($where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table);
	}
	
	// Create New user Level
	
	public function user_level_insert($data)
	{
		$this->db->insert($this->table_user_level, $data);
        return $this->db->insert_id();
	}
	//Update User Level
	 public function user_level_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_user_level, $data);
    }
	
	// Delete User Level
	
	public function user_level_delete($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_user_level, $data);
	}
	
	// Delete User Level Permanently
	
	public function user_level_delete_permanently($where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table_user_level);
	}


	 public function insert_user_contact($data,$where=array()){
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_user_contact);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['contact_modified_on'] = getCurrentDateTime();
		$this->db->update($this->table_user_contact, $data);
		 return $result->row()->id_user_contact;
		}else{
			$data['contact_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_user_contact, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}


	 public function insert_user_address($data,$where=array()){
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_user_address);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['address_modified_on'] = getCurrentDateTime();
		$this->db->update($this->table_user_address, $data);
		 return $result->row()->id_user_address;
		}else{
			$data['address_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_user_address, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}
	
	// Get User
	
	public function getUsers($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

	    $fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";		
			
		if($column !=''){
			$this->db->select($column.','.$fullName.'');
		}else{
			$this->db->select('*,'.$fullName.'');
		}
		if (is_array($param) && count($param)>0){
			$this->db->where($param);		
		}

		if (is_array($where_or) && count($where_or)>0){
			$this->db->or_where($where_or);		
		}
		// if($site_admin== FALSE){
		// 	$this->db->where("site_admin !=","1");
		// }
		if(is_array($orderby) && count($orderby) > 0){
			
			 $order_by = isset($orderby['order_by']) ? $orderby['order_by'] : FALSE;
			 $disp_order = isset($orderby['disp_order']) ? $orderby['disp_order'] : FALSE;
			$this->db->order_by($order_by, $disp_order); 
		}
		// echo $this->db->last_query();
				
		$result = $this->db->get($this->table);
		
		if ($result != FALSE && $result->num_rows()>0){

			$result =  $result->$option();
			if($other == TRUE){
				$aResponse = $this->getUserAddressInfo($result,$option);
			}else{
				$aResponse = $result;
			}
			
			
			return $aResponse;
		}
		return FALSE;
		
	}
	// Get User Subscription
	public function getUserSubscription($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

	   // $fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";		
			
		if($column !=''){
			$this->db->select($column.','.$fullName.'');
		}else{
			$this->db->select('*');
		}
		if (is_array($param) && count($param)>0){
			$this->db->where($param);		
		}

		if (is_array($where_or) && count($where_or)>0){
			$this->db->or_where($where_or);		
		}
		if($site_admin== FALSE){
			//$this->db->where("site_admin !=","1");
		}
		if(is_array($orderby) && count($orderby) > 0){
			
			 $order_by = isset($orderby['order_by']) ? $orderby['order_by'] : FALSE;
			 $disp_order = isset($orderby['disp_order']) ? $orderby['disp_order'] : FALSE;
			$this->db->order_by($order_by, $disp_order); 
		}
				
		$result = $this->db->get($this->table_user_subscription);
		
		if ($result != FALSE && $result->num_rows()>0){

			$result =  $result->$option();
			if($other == TRUE){
				$aResponse = $this->getUserAddressInfo($result,$option);
			}else{
				$aResponse = $result;
			}
			
			
			return $aResponse;
		}
		return FALSE;
		
	}
	public function getUser($where = array())
			{
				
				$this->db->select('*');
				$this->db->from($this->table);
				$this->db->where($where);
				$result = $this->db->get();
				$results =$result->row();
				return $results;
			}
	// Get User privilege
	public function getUserPrivilege($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

	   // $fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";		
			
		if($column !=''){
			$this->db->select($column.','.$fullName.'');
		}else{
			$this->db->select('*');
		}
		if (is_array($param) && count($param)>0){
			$this->db->where($param);		
		}

		if (is_array($where_or) && count($where_or)>0){
			$this->db->or_where($where_or);		
		}
		if($site_admin== FALSE){
			//$this->db->where("site_admin !=","1");
		}
		if(is_array($orderby) && count($orderby) > 0){
			
			 $order_by = isset($orderby['order_by']) ? $orderby['order_by'] : FALSE;
			 $disp_order = isset($orderby['disp_order']) ? $orderby['disp_order'] : FALSE;
			$this->db->order_by($order_by, $disp_order); 
		}
				
		$result = $this->db->get($this->table_user_privilege);
		
		if ($result != FALSE && $result->num_rows()>0){

			$result =  $result->$option();
			if($other == TRUE){
				$aResponse = $this->getUserAddressInfo($result,$option);
			}else{
				$aResponse = $result;
			}
			
			
			return $aResponse;
		}
		return FALSE;
		
	}

	public function getUserAddressInfo($userid,$option){
		
		if($userid == FALSE){
			return FALSE;
		}
		if($option == 'result'){
			$aAddress = array();
			foreach ($userid as $key => $user_address) {
				$Address = $user_address;
				$user_id = $user_address->id_user_master;
				$Address->user_address = $this->getUserAddress(array('pk_id_user'=>$user_id),'',array(),$option);	
				$Address->user_contact = $this->getUserContact(array('pk_id_user'=>$user_id),'',array(),$option);	
				$aAddress[] = $Address;			
			}
		}else{
			$option = 'result';
			$Address = $userid;
			$user_id = $Address->id_user_master;
			$Address->user_address = $this->getUserAddress(array('pk_id_user'=>$user_id),'',array(),$option);
			$Address->user_contact = $this->getUserContact(array('pk_id_user'=>$user_id),'',array(),$option);
				$aAddress = $Address;	
		}
		
		return $aAddress;
		
	}

	public function getUserContact($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_user_contact);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('address_status'=>1));
		}
		if(isset($option['like']) && is_array($option['like'])){
			$i = 0;
			foreach($option['like'] as $key => $val){
				$i++;
				if($i == 1)
				$this->db->like($key, $val);
			    else
				$this->db->or_like($key, $val);
			}
		}
		if(isset($option['where_in']) && is_array($option['where_in'])){
			foreach($option['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('contact_status',"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();
		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$returntype();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$returntype();
				}
			}
		}
		return FALSE;
    }



	public function getUserAddress($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_user_address);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('address_status'=>1));
		}
		if(isset($option['like']) && is_array($option['like'])){
			$i = 0;
			foreach($option['like'] as $key => $val){
				$i++;
				if($i == 1)
				$this->db->like($key, $val);
			    else
				$this->db->or_like($key, $val);
			}
		}
		if(isset($option['where_in']) && is_array($option['where_in'])){
			foreach($option['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('address_status',"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();
		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$returntype();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$returntype();
				}
			}
		}
		return FALSE;
    }
    
    public function getUsertypeprivileges($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_user_access);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('address_status'=>1));
		}
		if(isset($option['like']) && is_array($option['like'])){
			$i = 0;
			foreach($option['like'] as $key => $val){
				$i++;
				if($i == 1)
				$this->db->like($key, $val);
			    else
				$this->db->or_like($key, $val);
			}
		}
		if(isset($option['where_in']) && is_array($option['where_in'])){
			foreach($option['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('id_user_privileges',"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();
		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
							
				if(isset($option['toArray']) && $option['toArray'] == TRUE){
					 return $result = $result->result_array();}
					 else {	
				return $result =$result->$returntype();}		
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result->$returntype();
				}
			}
		}
		return FALSE;
    }

	
	// User Level 
	public function getUserLevel($param=array(),$option="result"){
				
	$this->db->select('*');	
	if (is_array($param) && count($param)>0){
		$this->db->where($param);
	}
	
	$result = $this->db->get($this->table_user_level);
	if ($result != FALSE && $result->num_rows()>0){	
		return $result = $result->$option();
	}
	return FALSE;
		
	}
	
	// User Level 
	public function getUserActivity($param=array(),$option="result"){
		$this->db->select('*');	
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}
		
		$result = $this->db->get($this->table_user_activity);
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->$option();
		}
		return FALSE;
	}
	
	// insert user type permission

	public function user_access_privileges($data)
	{
		$this->db->insert($this->table_user_access, $data);
        return $this->db->insert_id();
	}
	
	public function truncate_user_access_privileges()
	{
	   return $this->db->truncate($this->table_user_access);
	}
	public function combine_userquerytb($query_id,$query_view){
		//$sql="SELECT * FROM `user_master` as um left join user_query_map as uqmap on uqmap.user_id = um.id_user_master";
		$this->db->select('*');
		$this->db->from('user_master as um' );
		$this->db->join('user_query_map as uqmap', 'uqmap.user_id = um.id_user_master and uqmap.query_id ="'.$query_id.'" and query_view="'.$query_view.'" and uqmap.status="1"', 'left');
		$this->db->where('um.site_admin', '0');
		$result = $this->db->get(); 
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->result();
		}
		return FALSE;
	}
	public function combine_queryusertb($table_name,$user_id,$query_view){
		//SELECT * FROM `user_query_map` as qm left join Dynamic_Query as dq on dq.query_id=qm.query_id and dq.status='1' where qm.user_id='5' and qm.status=1
		//$sql="SELECT * FROM `user_master` as um left join user_query_map as uqmap on uqmap.user_id = um.id_user_master";
		$this->db->select('dq.*,uqmap.query_id as map_queryid');
		$this->db->from($table_name.' as dq' );
		$this->db->join('user_query_map as uqmap', 'uqmap.query_id = dq.query_id and uqmap.user_id ="'.$user_id.'" and uqmap.status="1" and uqmap.query_view="'.$query_view.'"', 'left');
		//$this->db->where('um.site_admin', '0');
		$result = $this->db->get(); 
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->result();
		}
		return FALSE;
	}
	
	public function get_userQuery($table_name,$user_id,$query_view){
		//SELECT * FROM `user_query_map` as qm left join Dynamic_Query as dq on dq.query_id=qm.query_id and dq.status='1' where qm.user_id='5' and qm.status=1
		//$sql="SELECT * FROM `user_master` as um left join user_query_map as uqmap on uqmap.user_id = um.id_user_master";
		$this->db->select('dq.*');
		$this->db->from('user_query_map as uqmap' );
		$this->db->join($table_name.' as dq', 'uqmap.query_id = dq.query_id  and dq.status="1"', 'left');
		$this->db->where('uqmap.user_id', $user_id);
		$this->db->where('uqmap.query_view', $query_view);
		$this->db->where('uqmap.status', '1');
		$result = $this->db->get(); 
		if ($result != FALSE && $result->num_rows()>0){	
			return $result = $result->result();
		}
		return FALSE;
	}
	
	/*kalai*/
public function contact_hiremover_mail($mover_mail,$mover_name,$reason_for_contact,$description_for_contact,$username,$user_email,$mover_id,$order_id,$reason_value){
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers 
	$headers .= 'From:'.$username .'<'.$user_email.'>'. "\r\n";
	// $headers .= 'Cc:' .MAIL_FROM_NAME.'<'.MAIL_ID_FROM.'>'. "\r\n"; 
	  // $to = $mover_mail.',support@hiremovers.org';
	$to = MAIL_ID_FROM;
	

	$subject = $reason_for_contact;
	//echo mover_id: '.$mover_id.';
	$message = '<br> order id: '.$order_id.'<br> Reason: '.$reason_value.'<br> Description: '.$description_for_contact;
	mail($to,$subject,$message,$headers);

	 // if(mail($to,$subject,$message,$headers)){echo 'mail sended ok ok ok';}
	 // else{echo 'mail not send not ok ok ok';}

	}

public function insert_invoice_details_by_admin($order_id){
	if($order_id!=''){
		$query = $this->db->query("SELECT * from  order_details Where id='".$order_id."' " )->row();
	$customer_book_order = $query->price;
                                $order_status = $query->order_status;
                                 $company_name = $query->company_name;
                                 $direct_url = $query->direct_url;
                               
                                 $pricevalue = $query->final_price;
                                 $star_count =$query->star_count;
                               $mover_id =$query->mover_id;

                               
                               $movers_count = $query->movers_count;

                               $Additional_hour = $query->additional_hours;

                                $release_payment_amount = $query->release_pay_amount;
                                $release_pay = $query->release_pay;
                                $customer_paid_tip = $query->tip_amount;
                                $total_mile_fee =$query->per_mile_cost;
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                              	$m_per_mile_fee = $value['per_mile'];
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                          //       // echo 'kkkkk';
							if($customer_book_order=='')
							{
								$customer_book_order =0;
							}
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}
        

        $data_invoice = array(
        						'order_id'=>$order_id,
        						'booked_price'=>sprintf('%.2f',$customer_book_order),
        						'mile_fee'=>sprintf('%.2f',$total_mile_fee),
        						'tip_amount'=>sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip)),
        						'addtion_hoursadmin_fee'=>$addtion_hoursadmin_fee,
        						'admin_milefee_amount' =>$m_per_mile_fee,
        						'admin_fee'=> sprintf('%.2f',$total_admin_fee),
        						'customer_paid_famt'=>$pricevalue,
        						'additional_hours'=>sprintf('%.2f',$total_additional_hourfee),
        						'mover_fee'=>sprintf('%.2f',$Gross_mar),
        						'created_on' 	=>date("Y-m-d H:i:s"));


$check_valid = $this->db->query("SELECT * from invoice_details where order_id = '".$order_id."'")->row();
if(empty($check_valid))
{
        $this->db->insert('invoice_details',$data_invoice);
    
}else{
	$this->db->where('order_id',$order_id);
  $this->db->update('invoice_details',$data_invoice);
}
  return $data_invoice;
// print_r($data_invoice);

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$total_admin_fee,'additional_hours',$total_additional_hourfee;


}
}



public function get_movers_review($movers_id){

	$reviews123 = $this->db->query("SELECT * from order_details  where mover_id ='".$movers_id."' and star_count!='' order by id DESC limit 10")->result_array();
						// echo count($reviews123);
	$total_revies='';
						if(!empty($reviews123)){
							if(count($reviews123)==10){
								// echo $movers_id,'if part';
								foreach ($reviews123 as $key => $value) {
									$avg_reviess[] = $value['star_count'];

								}
								$total_revies = array_sum($avg_reviess)/10;

							}
							else{
								// echo $movers_id,'else part';
								foreach ($reviews123 as $key => $value) {
									$avg_reviess1[] = $value['star_count'];

								}
								// echo count($reviews123);
								$total_revies = array_sum($avg_reviess1)/10;
							}
						}
						return $total_revies;
}

public function check_valid_address($address,$lat,$lng){

// echo $address; echo $lat; echo $lng;

if($lat!='' && $lng!='')
	{
		
		$entered_address = str_replace(' ','%20',$address);
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
                		$return_result = 1;
                	}
                	else
                	{
		                 $mover_lat = $response_a->results[0]->geometry->location->lat;
		                $mover_lon  = $response_a->results[0]->geometry->location->lng;
// echo 'jfhjsh';
		                $check_lan = trim(round($lng,6));
		                $check_lat = trim(round($lat,6));

		               	if((trim(round($mover_lat,6)) == $check_lat) && (trim(round($mover_lon,6)) == $check_lan))
		               	{
		                		$return_result = 0;
		                }
		                else{
		                	// echo 'sssssss';
		                	$return_result = 1;
		                }

		              	
              
              		}
                }
    }else{
    	$return_result = 1;
    }
return $return_result;

}


public function get_admin_mail_details(){
 $super_user =	$this->db->query('SELECT * FROM user_master where user_type = "superuser"')->row();
 return $super_user;
}

public function get_mover_details($mover_id){
 $mover_details =	$this->db->query('SELECT * FROM user_master where id_user_master = "'.$mover_id.'"')->row();
 return $mover_details;
}
public function order_detailss($order){
	$orders_detail =$this->db->query('SELECT * FROM order_details where id = "'.$order.'"')->row();
 return $orders_detail;
}

public function change_hours_req_customer($order_id,$mover_mail_id,$b_email,$user_name,$mail_hours_req,$move_date,$super_email,$super_name,$movername){

	$mail_subject_c=' Order #:'.$order_id.' Additional Hours Add Request From Mover';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	
  <p style="font-size:15px;">Dear '.$user_name.',</p>
	<p style=" font-size: 15px;">Additional Hours Required For Order #'.$order_id.'.</p>

	<p style=" font-size: 15px;"><b>Additional Hours:</b>'.$mail_hours_req.'</p>
	

<p style=" font-size: 15px;">Thanks & Regards, </p>
<p style="font-size:15px;">Movers Support</p>

	</div>

</div>

<br><br>
</div>


</html>';

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From:'.$movername .'<'.$mover_mail_id.'>'. "\r\n";
	// $headers .= 'Cc:' .MAIL_FROM_NAME.'<'.MAIL_ID_FROM.'>'. "\r\n";
	// $headers .='Cc:'.MAIL_FROM_NAME.'<'.MAIL_ID_FROM.'>'."\r\n";
	$to = $b_email;

	// $to = 'kalaiponnusamy94@gmail.com';

	// $subject = 'Additional Hours Add Request From Customer ';
	// $message = ' order_id: '.$order_id.'<br> Move Date: '.$move_date.'<br> Additional Hour: '.$mail_hours_req;
	mail($to,$mail_subject_c,$mail_message_c,$headers);

}
public function get_permile_fee($movers_count,$movers_id)
{
	$mover_mile_fee = $this->db->query("SELECT * FROM movers_rate_new where userid = '".$movers_id."' and movers_count = '".$movers_count."' ")->row();
	return $mover_mile_fee;
}

public function request_release_pay($mover_id,$move_date,$order_id,$username,$user_email,$superuser_name,$superuser_mail){
		
		

		// More headers
		$headers = 'From:'.$username .'<'.$user_email.'>'. "\r\n";
		// $headers .= 'Cc:' .MAIL_FROM_NAME.'<'.MAIL_ID_FROM.'>'. "\r\n";
		$to = $superuser_mail.','.MAIL_ID_FROM;
		// $to = 'kalaiponnusamy94@gmail.com';

		$subject = 'Request to Release Pay';
		// $message = 'Job has been completed.admin can release funds to the mover.<br>';
		// $message .='order id: '.$order_id.'<br> move date : '.$move_date;



		
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #F7F5F2;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
	      	</div> <br>

			<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
			  
			<div style="padding-left: 18px;"> <br>
			
			<p style="font-size:15px;">Order id :'.$order_id.',</p>
			
			<p style=" font-size: 15px;">Job has been completed.admin can release funds to the mover.</p>
			


			<br>

			<p style=" font-size: 15px;">Thanks, </p>
			<p style=" font-size: 15px;">'.$username.'</p>


			</div>

			</div>

			<br><br>
			</div></html>';


mail($to,$subject,$mail_message,$headers);
		
		// if(mail($to,$subject,$mail_message,$headers))
		// {
		// 	echo 'mail as sent' ;
		// }
		// else 
		// {
		// 	echo 'mail does not sent' ;
		// }

	}
public function request_reschedule_order_details($customer_email,$order_id,$company_name,$customer_first_name,$move_date_dispay_format,$arrival_time,$alternate_date,$alternate_arr_time,$mover_email_id,$mover_fist_name,$notes_request){
	// $from_name_c ='kalai';
// $from_id_c ='kalaivani@stallioni.com';
$customer_email= $customer_email;
// $customer_email= "kalaiponnusamy94@gmail.com";
$mail_subject_c=' Order #:'.$order_id.' Time or Date Change Request  by '.$customer_first_name.' ';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	<p style="font-size: 15px;font-color:black;">Dear '.$mover_fist_name.', </p>

	<p style=" font-size: 15px;font-color:black;">For Order '.$order_id.' request for time or date reschedule .</p>

	<p style=" font-size: 15px;font-color:black;"><b>Original arrival time:</b>'.$move_date_dispay_format.' , '.$arrival_time.' </p>
	<p style=" font-size: 15px;font-color:black;" ><b>New arrival time:</b>'.$alternate_date.' ,  '.$alternate_arr_time.'</p><?php if($notes_request!=""){?>
	<p style=" font-size: 15px;font-color:black;" ><b>Note for Request:</b>'.$notes_request.'<?php }?>
<br>


	

<p style=" font-size: 15px;font-color:black;">Thanks, </p>
<p style=" font-size: 15px;font-color:black;">'.$customer_first_name.'</p>

	</div>

</div>

<br><br>
</div>


</html>';

$headers_c = "MIME-Version: 1.0" . "\r\n";
$headers_c .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers_c .= "From: " .$customer_first_name."<".$customer_email.">"."\r\n";
		  // $headers .= 'Bcc: '.$cc_mailid.'' . "\r\n";
// $headers_c .= "Bcc: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";

// $mover_email_id = 'kalaiponnusamy94@gmail.com';

			mail($mover_email_id,$mail_subject_c,$mail_message_c,$headers_c);
			
return 1;
}



/*kalai end*/

	public function QueryMap_insert($data)
	{
		$this->db->insert($this->table_user_query_map, $data);
        return $this->db->insert_id();
	}
	
	 public function QueryMap_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_user_query_map, $data);
    }
    
	public function getQueryMap($param=array(),$option="result"){
				
	$this->db->select('*');	
	if (is_array($param) && count($param)>0){
		$this->db->where($param);
	}
	
	$result = $this->db->get($this->table_user_query_map);
	if ($result != FALSE && $result->num_rows()>0){	
		return $result = $result->$option();
	}
	return FALSE;
		
	}
	
	public function delete($tables,$where = array())
	{
		$where_In = $where;
		if (count($where) > 0)
			if(isset($where['where_in'])){
				unset($where['where_in']);
			}
			if(isset($where['where_not_in'])){
				unset($where['where_not_in']);
			}
            $this->db->where($where);
        if(isset($where_In['where_in']) && is_array($where_In['where_in'])){
			foreach($where_In['where_in'] as $key => $val){
				$this->db->where_in($key,$val);
			}
		}
		if(isset($where_In['where_not_in']) && is_array($where_In['where_not_in'])){
			foreach($where_In['where_not_in'] as $key => $val){
				$this->db->where_not_in($key,$val);
			}
		}
		
        return $this->db->delete($tables);  
	
	}
	/* =============== STAL ARUL EDIT =========== */

  function password_reset_email($mailid = '',$user_id='',$mail_subject='',$mail_content='')
	{
		
 			$email_to	=	$mailid;
  			$headers = "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #fff;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/emiallogo.png" alt="LOGO"  >
	      	</div> <br>';

            $mail_message.=$mail_content;
			$mail_message.='</div></html>';

			mail($email_to,$mail_subject,$mail_message,$headers);

			return 1;
		
	}
		function send_password_updatemail($user_name='',$new_password='',$email_id='')
	{
		

			
			$email_sub	=	"Password update";
			// $email_id .=',kalaisnsce12@gmail.com,hema2295msk@gmail.com';
			
			$headers = "From: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
			$headers .= "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$mail_message='<html><div style="background-color: #F7F5F2;">

	        <div style=" text-align: center;" >
	      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
	      	</div> <br>

			<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
			  
			<div style="padding-left: 18px;"> <br>
			<p style=" font-size: 15px;">Dear '.$user_name.', </p>
			<p style=" font-size: 15px;">Your login ID is : '.$email_id.' </p>
			<p style=" font-size: 15px;">Your new password is : '.$new_password.'</p>
			<br>

			<p style=" font-size: 15px;">Thanks, </p>
			<p style=" font-size: 15px;">Movers Support</p>


			</div>

			</div>

			<br><br>
			</div></html>';

			mail($email_id,$email_sub,$mail_message,$headers);

			return 1;
		
	}


    function send_mail_to_loginuser_new($login_type = '' , $email_id = '', $subject='',$content='',$confirm_password='')
	{
       $mail_message='';
		
  		$email_to	=	$email_id;
 		$headers = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";

 		$mail_message='<html><div style="background-color: #fff;">

        <div style=" text-align: center;" >
      	<img src="'.BASE_URL.'/assets/front/images/emiallogo.png" alt="LOGO"  >
      	</div> <br>';
      	$mail_message.=$content;

		 
		$mail_message.='<br><br>
		</div></html>';

		mail($email_to,$subject,$mail_message,$headers);

		return 1;
		
	}

		function send_mail_to_loginuser($login_type = '' , $email_id = '', $subject='',$content='',$confirm_password='' )
	{
		

			
		$email_to	=	$email_id;
			
			
		$headers = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";

 		$mail_message='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      	<img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      	</div> <br>

		<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
		  
		<div style="padding-left: 18px;"> <br>

		<p style=" font-size: 15px;">Your login ID is : '.$email_id.'</p>
		<p style=" font-size: 15px;">Your password is : '.$confirm_password.' </p>
		<p style=" font-size: 15px;">Login type ID is : '.$login_type.' </p>
		<p style=" font-size: 15px;">Login type ID is : '.$content.' </p>


		<br>

		<p style=" font-size: 15px;">Thanks, </p>
		<p style=" font-size: 15px;">Movers Support</p>


		</div>

		</div>

		<br><br>
		</div></html>';

		mail($email_to,$subject,$mail_message,$headers);

		return 1;
		
	}

	function confirmation_mail($mail_id='',$customer_name = ''){
		$subject = "confirmation mail";
		

		$headers = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers .= "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";

 $mail_message='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>

<p style=" font-size: 15px;">Dear '.$customer_name.', </p>
<p style=" font-size: 15px;">Your account has been activated by admin.You can login now.</p>

<br>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">Movers Support</p>


</div>

</div>

<br><br>
</div></html>';
			if(mail($mail_id,$subject,$mail_message,$headers)){return 1;}else{return 0;}

			
		
	}
	
 
	/***** hemalatha ***/

	public  function  select_orders_users($user_id)
	{
		
		$query = $this->db->query("SELECT  * from  order_details Where customer_id='$user_id' and order_status != 'Payment Failed'" )->result_array();


			return $query;
			
	}

	public function update_reviews_comments($id,$data)
	{

		 $this->db->where('id',$id);
        return $this->db->update('order_details',$data);
	}

	public function highest_rating($movers_ids,$movers_count)
	{


		
		
foreach ($movers_ids as  $value) {

			

		
$query_details = $this->db->query("SELECT * from (select order_details.star_count , order_details.id  , order_details.mover_id from order_details where (order_details.star_count !='') AND mover_id = '".$value."'  order by order_details.id DESC limit 10 ) as subt")->result_array();

	
if(!empty($query_details) && count($query_details)==10){

  $arrlength = count($query_details);
 
 $query_results = $this->db->query("SELECT sum(star_count) as count,mover_id  from (select order_details.star_count , order_details.id  , order_details.mover_id from order_details where (order_details.star_count !='') AND mover_id = '".$value."'  order by order_details.id DESC limit 10) as subt")->result_array();
	foreach ($query_results as $key => $value123) {
		
		$count = $value123['count'];
		$m_count[$count] = $value123['mover_id'];
	}

}
 
// $valuess =arsort($m_count);

}
if(!empty($m_count)){

	array_unique($m_count);
	krsort($m_count);
	foreach ($m_count as $key => $value5) {
		# code...
		$mover_id_sort[] = $value5;
	}
	$kavaluess = array_merge($mover_id_sort,$movers_ids);
}
else{
	$kavaluess = $movers_ids;
}
/*hema start*/

// $m_id =array();
// 		$where_query ='';






// 		foreach ($movers_ids as  $value) {

// 			$where_query .="mover_id ='$value' OR ";

// 		}

// 		$where_query = rtrim($where_query," OR ");
			
// 		$query = $this->db->query("SELECT mover_id, count(mover_id) as count from order_details  where  ($where_query)  AND (star_count !='') group by mover_id order by count(mover_id) desc " ) ->result_array();
		// $query =$this->db->query("SELECT sum(star_count),mover_id  from (select order_details.star_count , order_details.id  , order_details.mover_id from order_details where (order_details.star_count !='') AND $where_query  order by order_details.id DESC limit 10) as subt")->result_array();
	
				// if(!empty($query)) {

				// 	foreach ($query as $key) {

				// 	array_push($m_id, $key['mover_id']);

				// 	}
				// } else {
				// 	  array_push($m_id,$value);
				// }

				// $result=array_diff($movers_ids,$m_id);

				// foreach ($result as $no_mover) {			
				// 	 array_push($m_id,$no_mover);
				// }
			// print_r($m_id);
// hema
			return array_unique($kavaluess);

	}
	

	public function display_movers_basedon_price($movers_ids,$movers_count)
	{
// change_hours_req_customer

	 $m_id =array();
		$where_query ='';

		foreach ($movers_ids as  $value) {

			$where_query .="userid ='$value' OR ";

		}

		$where_query = rtrim($where_query," OR ");
		// echo "SELECT  userid  FROM movers_rate_new WHERE  movers_count='$movers_count'  And  $where_query ORDER BY    CAST(price_value as DECIMAL(10,5)) ";
		$query = $this->db->query("SELECT  userid  FROM movers_rate_new WHERE  movers_count='$movers_count'  And  $where_query ORDER BY    CAST(price_value as DECIMAL(10,5)) ") ->result_array();


		//echo "SELECT  userid  FROM movers_rate_new WHERE  movers_count='$movers_count'  And  $where_query ORDER BY price_value DESC";

	

			if(!empty($query)) {

					foreach ($query as $key) {

					array_push($m_id, $key['userid']);

					}
				} else {
					// array_push($m_id,$value);
				}

				
				$array_deiff =array_diff($movers_ids, $m_id);


		return array_unique(array_merge($m_id,$array_deiff));

		}

		public function display_movers_basedon_starscount($movers_ids,$sort_by_reviews)
		{



				 $m_id =array();
		$where_query ='';

		// change_hours_req_customer

		foreach ($movers_ids as  $value) {

			$where_query .="mover_id ='$value' OR ";

		$query = $this->db->query("SELECT mover_id,star_count FROM `order_details` WHERE  $where_query AND star_count >= $sort_by_reviews ORDER BY star_count DESC") ->result_array();

				if(!empty($query)) {

					foreach ($query as $key) {

					array_push($m_id, $key['mover_id']);

					}
				} else {
					array_push($m_id,$value);
				}


		}

	

		return array_unique($m_id);



		}



		public function  update_request_time($order,$data)
		{


				 $this->db->where('id',$order);
        return $this->db->update(' order_details',$data);




		}
		

		public function get_admin_fee($user_id)
		{

$admin_fee =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$user_id'")->result_array();

	return $admin_fee;
		}

			public function most_completed_jobs($movers_ids)
	{

	 $m_id =array();
		$where_query ='';

		foreach ($movers_ids as  $value) {

			$where_query .="mover_id ='$value' OR ";
		}
		$where_query = rtrim($where_query," OR ");			

		$query = $this->db->query("SELECT mover_id, count(mover_id) as count from order_details  where  ($where_query) AND  order_status ='Completed'   group by mover_id order by count(mover_id) desc " ) ->result_array();

			if(!empty($query)) {

					foreach ($query as $key) {

					array_push($m_id, $key['mover_id']);

					}
				} 


					$result=array_diff($movers_ids,$m_id);

				foreach ($result as $no_mover) {			
					 array_push($m_id,$no_mover);
				}



		return array_unique($m_id);

		}

/*kalai*/
public function send_thanksmail_to_customer($order_id,$customer_fname,$mover_name,$mover_mail,$customer_email,$invoice_details){
	
	// print_r($invoice_details['mover_fee']);
	// exit();
	// foreach ($invoice_details as $key => $value) {
	// 	$booked_price= $value->booked_price;
	// 	$mile_fee= $value->mile_fee;
	// 	$tip_amount= $value->tip_amount;
	// 	$admin_fee= $value->admin_fee;
	// 	$additional_hours= $value->additional_hours;
	// 	$mover_fee=$value->mover_fee;

	// }
	// $customer_email = $query->b_email;
// $customer_email = 'kalaisnsce12@gmail.com';
// 	$subject = "Market Place";
		

// 		$headers = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
// 		$headers .= "MIME-Version: 1.0" . "\r\n";
// 		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// 		// $headers .= 'Bcc: kalaiponnusamy94@gmail.com' . "\r\n";
// 		// More headers
// 		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";

//  $mail_message='<html><div style="background-color: #F7F5F2;">

//         <div style=" text-align: center;" >
//       <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
//       </div> <br>

// <div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
// <div style="padding-left: 18px;"> <br>

// <p style=" font-size: 15px;">Dear '.$customer_fname.', </p>

// <p style=" font-size: 15px;">Thank you for using HireMovers to find movers to complete your move. You can write a review by logging into your account <a href ='.BASE_URL.'/home> here </a>.</p>

// <br>

// <p style=" font-size: 15px;">Thanks, </p>
// <p style=" font-size: 15px;">Movers Support</p>


// </div>

// </div>

// <br><br>
// </div></html>';
// 			mail($customer_email,$subject,$mail_message,$headers);

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
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;border-right: 1px solid #CBCBCB;">$'.sprintf('%.2f',$booking_price).'</td>
        <td style="font-size: 12px;text-align: center;">$'.sprintf('%.2f',$booking_price).'</td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">Per Mile Fee  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$distance.' Miles  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$admin_milefee_amount.'</td>
        <td style="font-size: 12px;text-align: center;">$'.sprintf('%.2f',$mile_fee).' </td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">Additional Hours  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">'.$additional_hours.'  </td>
        <td style="font-size: 12px;text-align: center;border-right: 1px solid #CBCBCB;">$'.$addtion_hoursadmin_fee.'</td>
        <td style="font-size: 12px;text-align: center;">$'.sprintf('%.2f',$additional_hours_fee).' </td>
      </tr>
      <tr style="border-bottom: 1px solid #CBCBCB;">
        <td style="font-size: 12px;text-align: center;font-weight: bold;border-right: 1px solid #CBCBCB;">Customer Total:</td>
        <td style="border-right: 1px solid #CBCBCB;"></td>
        <td style="font-size: 12px;text-align: center; font-weight: bold;border-right: 1px solid #CBCBCB;"> </td>
        <td style="font-size: 12px;text-align: center;">$'.sprintf('%.2f',$customer_paid_famt).'</td>
      </tr>
  </tbody>
</table>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">Movers Support</p>


</div>

</div>

<br><br>
</div></html>';
// $customer_email = 'kalaiponnusamy94@gmail.com';
// 			if(mail($customer_email,$subject,$mail_message,$headers)){echo 'ssssss';}else{echo 'noeeeeee';}

			mail($customer_email,$subject,$mail_message,$headers);
			


/*to mover mail*/


		$headers1 = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers1 .= "MIME-Version: 1.0" . "\r\n";
		$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// $headers1 .= "Bcc: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";

		// $headers1 .= 'Bcc: kalaiponnusamy94@gmail.com' . "\r\n";
		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";
		$subject1 = "You have been paid for completing HireMover Order #".$order_id;

 $mail_message1='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>

<p style=" font-size: 15px;">Dear '.$mover_name.', </p>
<p style=" font-size: 15px;">'.$customer_fname.' from order #'.$order_id.' on '.date("m/d/Y").' has sent you a payment. You should be receiving $'.$invoice_details->mover_fee.' in 2-3 business days.<br> 
Thanks, HireMovers.</p>

<br>

<p style=" font-size: 15px;">Thanks, </p>
<p style=" font-size: 15px;">Movers Support</p>


</div>

</div>

<br><br>
</div></html>';
// $mover_mail = 'kalaiponnusamy94@gmail.com';
			mail($mover_mail,$subject1,$mail_message1,$headers1);



}
public function send_order_cancelledstatus_mover_customer($order_id,$customer_fname,$mover_name,$mover_mail,$customer_email){
	$headers1 = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers1 .= "MIME-Version: 1.0" . "\r\n";
		$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// $headers1 .= "Bcc: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		// $headers1 .= 'Bcc: kalaiponnusamy94@gmail.com' . "\r\n";
		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";
		$subject1 = "Market Place Order #".$order_id;

 $mail_message1='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>

<p style=" font-size: 15px;">Dear '.$mover_name.', </p>
<p style=" font-size: 15px;">Order #'.$order_id.' for '.$customer_fname.' on '.date("m/d/Y").' has been cancelled.<br> 
Thanks,<br> 
HireMovers.</p>

<br>


</div>

</div>

<br><br>
</div></html>';
			mail($mover_mail,$subject1,$mail_message1,$headers1);

			$headers2 = "From: " .MAIL_FROM_NAME. "<".MAIL_ID_FROM.">"."\r\n";
		$headers2 .= "MIME-Version: 1.0" . "\r\n";
		$headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// $headers1 .= "Bcc: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
		// $headers1 .= 'Bcc: kalaiponnusamy94@gmail.com' . "\r\n";
		// More headers
		// $headers .= 'From: '.$from_name.'<'.$from_id.'>' . "\r\n";
		$subject2 = "Market Place Order #".$order_id;

 $mail_message2='<html><div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
<div style="padding-left: 18px;"> <br>

<p style=" font-size: 15px;">Dear '.$customer_fname.', </p>
<p style=" font-size: 15px;">Order #'.$order_id.' for '.$mover_name.' on '.date("m/d/Y").' has been cancelled.<br> 
Thanks, 
HireMovers.</p>

<br>


</div>

</div>

<br><br>
</div></html>';
			mail($customer_email,$subject2,$mail_message2,$headers2);
}
/*kalai end*/
public function select_orders_resutls($orderid)
	{
			$query = $this->db->query("SELECT * from  order_details Where id='$orderid'" )->result_array();

			return $query;
	}
	
/*****************************jamuna****************************/

public function url_shorten()
{ 

  $domain_data["fullName"] = "rebrand.ly";
  $post_data["destination"] = "http://stallioni.in/551/home/index/kalai229613";


  $post_data["domain"] = $domain_data;
  //$post_data["slashtag"] = "A_NEW_SLASHTAG";
  //$post_data["title"] = "Rebrandly YouTube channel";
  $ch = curl_init("https://api.rebrandly.com/v1/links");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "apikey: 0b2f453792bc45fdadbd20a70fd83cd3",
      "Content-Type: application/json",
      "workspace: 2432013bfbca49ec90eb69093bbd8bf8"
  ));
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
  $result = curl_exec($ch);
  curl_close($ch);
  $response = json_decode($result, true);
 // print_R(  $response );
  $result  =  "Short URL is: " . $response["shortUrl"];
  return $result;

}

public function request_review_mail($order_id,$b_email,$user_name,$super_email,$super_name,$get_reason){

 // echo $get_reason;
 // exit(); 
	$mail_subject_c=' Order #:'.$order_id.' Request to edit Review ';


$mail_message_c ='<html>

<div style="background-color: #F7F5F2;">

        <div style=" text-align: center;" >
      <img src="'.BASE_URL.'/assets/front/images/new-tripulacion.png" alt="LOGO" style="width: 25%;">
      </div> <br>

<div style="  border: 1px solid #CBCBCB; width: 55%;margin: auto;    background-color: white;">
  
  <div style="padding-left: 18px;"> <br>
	

	<p style=" font-size: 15px;">Waiting for Request to edit Review the Order Id is '.$order_id.'.</p>
	<p style=" font-size: 15px;">Reason for waiting to Edit a Review '.$get_reason.'.</p>
<p style=" font-size: 15px;">Thanks & Regards, </p>
<p style="font-size:15px;">'.$user_name.'</p>

	</div>

</div>

<br><br>
</div>


</html>';

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From:'.$user_name .'<'.$b_email.'>'. "\r\n";
	// $headers .='Cc:'.$super_name.'<'.$super_email.'>'."\r\n";
	$headers .= "Bcc: " .MAIL_FROM_NAME."<".MAIL_ID_FROM.">"."\r\n";
	$to = $super_email;
		mail($to,$mail_subject_c,$mail_message_c,$headers);
	// if(	mail($to,$mail_subject_c,$mail_message_c,$headers))
	// {
	// 	echo "Your Mail Request Send Successfully ";
	// }
	// else
	// {
	// 	echo "Your Mail Request Not Send Successfully ";
	// }

}
}
/******************************jamuna******************************************/
