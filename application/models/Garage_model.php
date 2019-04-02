<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Garage_model extends CI_Model {
    
    public $user_master = "user_master"; 
    public $table  = "movers_about";
    public $garage_details = "garage_details" ;
    public $table_days  = "movers_days";
     public $garage_images  = "garage_images";
     public $garage_reviews  = "garage_reviews";
	//public $table_company_address = "company_address";  
	public function get_garage_details($userid ='')
	{
 		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('user_type','garage');
		if(!empty($userid))
		{
		  $this->db->where('id_user_master',$userid);
		}
		$query = $this->db->get();
		$results = $query->result();
		return  $results;
   }
    /*Update movers about create*/
	 public function update_abt($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table, $data);
    }
	public function update_company_details($data, $where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->garage_details, $data);
	}
	// Create movers about
	public function insert_abt($data)
	{

		$this->db->insert($this->table, $data);		
		return $this->db->insert_id();
		
		
	}
	public function get_garage_company_details($userid ='')
		{
 
			$this->db->select('*');
			$this->db->from('garage_details');
 			if(!empty($userid))
			{
			  $this->db->where('user_id',$userid);
			}
			$query = $this->db->get();
			$results = $query->result();
			return  $results;
	   }
   public function get_password($current_password = '' ,  $new_password = '', $conform_password = '' , $user_id = '')
   {


	   	if($new_password!=$conform_password){
	        return "false";
	    }else{
	        $this->db->select('*');
	        $this->db->from('user_master');
	        $this->db->where('id_user_master',$user_id);
	        $this->db->where('password',sha1($current_password));
	        $query = $this->db->get();
	        if($query->num_rows()==1){
	            $data = array(
	                           'password' => sha1($new_password)
	                        );
	            $this->db->where('id_user_master', $user_id);
	            $this->db->update('user_master', $data); 
	            echo  1;
	        }else{
	            echo  2;
	        }
	    }


   }
/************************** aruljothi********************************/
/************************ home display *********************************/
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
	public function getgarageimages($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->garage_images);
		
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
	public function getcompanydatils1($param=array(),$option="result",$site_admin=FALSE,$where_or =array(),$orderby = array(),$other =TRUE,$column=''){	

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
				
		$result = $this->db->get($this->garage_details);
		
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

public function get_userofgarage($garage_id)
{
	$this->db->select('user_id');
	$this->db->from($this->garage_details);	
	$this->db->where('garage_id',$garage_id);	
	$result = $this->db->get();
    if ($result != FALSE && $result->num_rows()>0){
    	  $aResponse = $result->row()->user_id;
    }
    return $aResponse;
}
/*****************************************************************/
public function garage_insert_images($data,$where=array())
{
           $this->db->insert($this->garage_images, $data);
        return $this->db->insert_id();
}
public function garage_insert_company($data, $where = array())
{
	  $this->db->insert($this->garage_details, $data);
        return $this->db->insert_id();
}
 public function garage_update_company($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
         $this->db->update($this->garage_details, $data);
         return $this->db->affected_rows();
    }

public function garage_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
         $this->db->update($this->user_master, $data);
         return $this->db->affected_rows();
    }

 public function getcompanydatils($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->garage_details);	
	 
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('company_status'=>1));
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
	 

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();

		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
				if($returntype == 'row'){
					$aResponse = $result->$returntype();
					//$user_id = $result->row()->id_company;
					// $companyAddress = $result->row()->company_address;
					// $companyAddressInfo = explode(',',$companyAddress);
					////$companyAddress = $this->getCompanyAddressDetail($company_id );
					////$aResponse->company_address_Details =$companyAddress;

					// $companyContacts = $result->row()->company_contacts;
					// $companyContactInfo = explode(',',$companyContacts);
					////$companyContact = $this->getCompanyContactDetail($company_id );
					////$aResponse->company_contact_Details =$companyContact;

					return $aResponse;
				}				
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

public function getuserdatils($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->user_master);	
	 
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('company_status'=>1));
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
	 

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();

		
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
				if($returntype == 'row'){
					$aResponse = $result->$returntype();
					//$user_id = $result->row()->id_company;
					// $companyAddress = $result->row()->company_address;
					// $companyAddressInfo = explode(',',$companyAddress);
					////$companyAddress = $this->getCompanyAddressDetail($company_id );
					////$aResponse->company_address_Details =$companyAddress;

					// $companyContacts = $result->row()->company_contacts;
					// $companyContactInfo = explode(',',$companyContacts);
					////$companyContact = $this->getCompanyContactDetail($company_id );
					////$aResponse->company_contact_Details =$companyContact;

					return $aResponse;
				}				
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
	public function deleteimage_garage($id)
	{
		$reviews =$this->db->query("DELETE FROM garage_images WHERE image_id='$id'");
		
	}
/***************************************************************/
	public function get_reviews($currentuser)
	{
	 
		$reviews =$this->db->query("SELECT * FROM  order_details where mover_id='$currentuser' and star_count!='' order by id DESC limit 10")->result_array();

		return $reviews;

	}

	public function get_reviews_garage($garage_id)
	{
         
		$reviews =$this->db->query("SELECT * FROM garage_reviews WHERE garage_id=".$garage_id."  and star_count!='' order by review_id DESC limit 10")->result_array();
		return $reviews;
	}
	public function get_opening_hours($garage_id) 
	{
		$reviews =$this->db->query("SELECT * FROM movers_days WHERE user_id=".$garage_id." order by day_value ASC")->result_array();
		return $reviews;
	}

}
