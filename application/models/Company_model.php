<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model{
    
	public $table_company = "company";  
	public $table_company_address = "company_address";  
	public $table_customer_type = "customer_type";  
	public $table_customer_contact = "company_contact";  
	public $table_item_type = "item_type";  
	public $table_product_item = "product_item";  
	public $table_cust_sales_rep = "cust_sales_rep_map";  
	


    public function company_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
         $this->db->update($this->table_company, $data);
         return $this->db->affected_rows();
    }
	 public function company_insert($data)
    {
       $this->db->insert($this->table_company, $data);
        return $this->db->insert_id();
    }

	public function company_delete($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_company, $data);
	}

	public function user_sales_rep_map_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
         $this->db->update($this->table_cust_sales_rep, $data);
         return $this->db->affected_rows();
    }

	// Delete User Permanently
	
	public function company_delete_permanently($where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete($this->table_company);
	}

	 public function insert_cust_sales_rep_map($data,$where=array()){
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_cust_sales_rep);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['cust_map_updated_on'] = getCurrentDateTime();
		$this->db->update($this->table_cust_sales_rep, $data);
		 return $result->row()->id_cust_sales_rep_map;
		}else{
			$data['cust_map_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_cust_sales_rep, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}


	public function company_sales_rep_update($data, $where = array())
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
         $this->db->update($this->table_cust_sales_rep, $data);
         return $this->db->affected_rows();
    }

	// Delete 
	
	public function delete($table,$where = array())
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

		

        return $this->db->delete($table);        
	}

    
    Public function getSalesREPNotAssigned($company_id,$returnType=''){
    	$this->table = 'user_master';
    	 $fullName = " CONCAT(".$this->table.".first_name,' ',".$this->table.".last_name	)  as fullName ";
    	 
    	$result = $this->db->query("SELECT ".$fullName.",first_name,last_name,id_user_master,username,email,user_type FROM `user_master` WHERE `user_type` = 'sales_rep' AND status=1 AND id_user_master NOT IN(SELECT (id_sales_rep) FROM `cust_sales_rep_map` WHERE `company_id`=".$company_id." ) order by user_cust_code DESC");
    	if ($result != FALSE && $result->num_rows()>0){

    		$res =  $result->result();
    		if($returnType == 'format'){
    			$res = $this->formatSalesREP($res);
    		}
    		return $res;
    	}
    	return FALSE;
    }

    public function formatSalesREP($res){

    	if($res != FALSE){
    		$aSalesRep = array();
    		foreach ($res as $key => $sales_rep) {
					$fullName = isset($sales_rep->fullName) ? $sales_rep->fullName  :'';
					$id_user_master = isset($sales_rep->id_user_master) ? $sales_rep->id_user_master  :'';
					$aSalesRep[$id_user_master] = $fullName;
    			}
    		return $aSalesRep;	
    	}
    	return FALSE;
    }
	

    public function insert_company_address($data,$where=array()){
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_company_address);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['address_modified_on'] = getCurrentDateTime();
		$this->db->update($this->table_company_address, $data);
		 return $result->row()->id_company_address;
		}else{
			$data['address_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_company_address, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}


	public function insert_company_contact($data,$where=array()){
		if (count($where) > 0)
		$this->db->where($where);
		$result = $this->db->get($this->table_customer_contact);
		if ($result != false && $result->num_rows() > 0){
		if (count($where) > 0)
		$this->db->where($where);
	       $data['contact_modified_on'] = getCurrentDateTime();
		$this->db->update($this->table_customer_contact, $data);
		 return $result->row()->id_company_contact;
		}else{
			$data['contact_created_on'] = getCurrentDateTime();			
		$this->db->insert($this->table_customer_contact, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
	}

     public function company_address_insert($data)
    {
       $this->db->insert($this->table_company_address, $data);
        return $this->db->insert_id();
    }

     public function company_address_update($data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($this->table_company_address, $data);
    }
   public function getCompany($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_company);	
		$this->db->join($this->table_customer_type,$this->table_customer_type.'.customer_type_code = '.$this->table_company.'.customer_type','left');
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
		if((isset($option['orderby']) && $option['orderby'] !='') && (isset($option['disporder']) && $option['disporder']!=''))
			$this->db->order_by($option['orderby'],$option['disporder']);
		else
			$this->db->order_by('company_status',"ASC");

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
					$company_id = $result->row()->id_company;
					// $companyAddress = $result->row()->company_address;
					// $companyAddressInfo = explode(',',$companyAddress);
					$companyAddress = $this->getCompanyAddressDetail($company_id );
					$aResponse->company_address_Details =$companyAddress;

					// $companyContacts = $result->row()->company_contacts;
					// $companyContactInfo = explode(',',$companyContacts);
					$companyContact = $this->getCompanyContactDetail($company_id );
					$aResponse->company_contact_Details =$companyContact;

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

    public function getCompanyAddressDetail($companyAddress){
    	$companyAddress = $this->getCompanyAddress(array('company_id'=>$companyAddress),'',array(),'result');
    	// $companyAddress = $this->getCompanyAddress(array(),'',array('where_in'=>array('id_company_address'=>$companyAddress)),'result');
		$aCompanyInfo = array();
		if($companyAddress != FALSE){
			foreach ($companyAddress as $key => $companyAddressInfo) {
					$CompanyInfo = array();
					foreach ($companyAddressInfo as $ckey => $cvalue) {
						$CompanyInfo[$ckey] = $cvalue;
					} 
					$aCompanyInfo[] = $CompanyInfo;
			}
			
		}
    	return $aCompanyInfo;
    }

     public function getCompanyContactDetail($cmpContactIds){
     	$companyContact = $this->getCompanyContact(array('company_id'=>$cmpContactIds),'',array('orderby'=>'display_order','disporder'=>'ASC'),'result');
    	// $companyContact = $this->getCompanyContact(array(),'',array('where_in'=>array('id_company_contact'=>$cmpContactIds)),'result');
		$aCompanyInfo = array();
		if($companyContact != FALSE){
			foreach ($companyContact as $key => $companyContactInfo) {
					$CompanyInfo = array();
					foreach ($companyContactInfo as $ckey => $cvalue) {
						$CompanyInfo[$ckey] = $cvalue;
					} 
					$aCompanyInfo[] = $CompanyInfo;
			}
			
		}
		// echo '<pre>';
		// print_r($aCompanyInfo);
		// exit;
    	return $aCompanyInfo;
    }

     public function getCompanyContact($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_customer_contact);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('contact_status'=>1));
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

     public function getCompanyAddress($param=array(), $column='', $option=array(),$returntype='result')
	{		
		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->select('CONCAT_WS(",",street_address,city,state,zip_code,country)  as full_address');
		$this->db->from($this->table_company_address);	
		
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
		if(isset($option['or_where']) && is_array($option['or_where'])){
			foreach($option['or_where'] as $key => $val){
				$this->db->or_where($key,$val);
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

    public function getCustomerType($param=array(), $column='', $option=array(),$returntype='result'){

    	if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_customer_type);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			// $this->db->where(array('status'=>1));
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
			$this->db->order_by('status',"ASC");

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
    public function getCustTypeCode($custId='',$type=''){
    	if($type =='slug'){
    		$condition = array('customer_type_code'=>$custId);
    	}else{
    		$condition = array('id_customer_type'=>$custId);
    	}
    	return $this->getCustomerType($condition,'cust_start_number',array(),'row');
    	//echo $this->db->last_query();exit;
    }
    public function getCompanyCode($where=''){

		$this->db->select('customer_type,ifnull(MAX(`company_cust_code`) + 1,-1) as custcode');	
		if( isset($param) && $param !=''){
			$this->db->select($param);
		}
		if (isset($where) && is_array($where) && count($where)>0){
			$this->db->where($where);
		}

		$result = $this->db->get($this->table_company);
		if ($result != FALSE && $result->num_rows()>0){	
			$custcode = $result->row()->custcode;
			$customer_type = isset($where['customer_type']) ? $where['customer_type'] :  $result->row()->customer_type;
			if($custcode == -1){
				$custcode = $this->getCustTypeCode($customer_type,'slug');				
			}
			
			return $custcode;
		}
		return FALSE;
	}

	public function getCompanyAddressLabel($custcode,$company_id,$max_address_type){
		$label = 'address_'.$custcode;
		$address_types = explode('_',$max_address_type);
		$max_id = isset($address_types[1]) ? $address_types[1] : FALSE;
		$companyAddress = $this->getCompanyAddress(array('address_type'=>$label,'company_id'=>$company_id),'',array(),'row');
		if($companyAddress != FALSE){
			return $max_id +1;
		}else{
			return $custcode;
		}
	}

	public function getCompanyContactId($where=''){

		$this->db->select('count(`id_company_contact`) as custcode,max(contact_type) as max_contact_type,company_id');	
		if( isset($param) && $param !=''){
			$this->db->select($param);
		}
		if (isset($where) && is_array($where) && count($where)>0){
			$this->db->where($where);
		}

		$result = $this->db->get($this->table_customer_contact);
		if ($result != FALSE && $result->num_rows()>0){	
			$custcode = $result->row()->custcode;
			$company_id = $result->row()->company_id;
			$max_contact_type = $result->row()->max_contact_type;
			$code =$this->getCompanyContactLabel($custcode,$company_id,$max_contact_type);
			return $code;
		}
		return FALSE;
	}

	public function getCompanyContactLabel($custcode,$company_id,$max_address_type){
		$label = 'contact_'.$custcode;
		$address_types = explode('_',$max_address_type);
		$max_id = isset($address_types[1]) ? $address_types[1] : FALSE;
		$companyAddress = $this->getCompanyContact(array('contact_type'=>$label,'company_id'=>$company_id),'',array(),'row');
		if($companyAddress != FALSE){
			return $max_id +1;
		}else{
			return $custcode;
		}
	}

	public function getCompanyAddressId($where=''){

		$this->db->select('company_id,count(`id_company_address`) as custcode, max(address_type) as max_address_type');	
		if( isset($param) && $param !=''){
			$this->db->select($param);
		}
		if (isset($where) && is_array($where) && count($where)>0){
			$this->db->where($where);
		}

		$result = $this->db->get($this->table_company_address);
		if ($result != FALSE && $result->num_rows()>0){	
			$custcode = $result->row()->custcode;
			$company_id = $result->row()->company_id;
			$max_address_type = $result->row()->max_address_type;
			$code =$this->getCompanyAddressLabel($custcode,$company_id,$max_address_type);
			return $code;
		}
		return FALSE;
	}


   public function getItemType($param=array(), $column='', $option=array(),$returntype='result')
   {		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_item_type);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('type_status'=>1));
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
			$this->db->order_by('type_status',"ASC");

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


    public function getProductItem($param=array(), $column='', $option=array(),$returntype='result')
   {		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_product_item);	
		$this->db->join('item_type','item_type.id_item_type =product_item.id_item_type','left');
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('type_status'=>1));
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
			$this->db->order_by('prod_status',"ASC");

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

      public function getCustSalesRep($param=array(), $column='', $option=array(),$returntype='result',$extra = array())
	{		
		$table = $this->table_cust_sales_rep;
		$status = 'cust_map_status';
		if(is_array($extra) && isset($extra['join']) && $extra['join'] == TRUE){
			$this->db->select(''.$this->table_cust_sales_rep.'.*');	
			$fullName = " CONCAT(user_master.first_name,' ',user_master.last_name	)  as fullName ";
    	    $this->db->select(''.$fullName.',first_name,last_name,id_user_master,username,email,user_type');
		}else if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($table);	

		if(is_array($extra) && isset($extra['join']) && $extra['join'] == TRUE){
    	
			$this->db->join('user_master','user_master.id_user_master = cust_sales_rep_map.id_sales_rep AND user_master.status = 1 ','left');
		}
		if(is_array($extra) && isset($extra['join_cust']) && $extra['join_cust'] == TRUE){
    		$this->db->select($this->table_company.'.*');
			$this->db->join($this->table_company,$this->table_company.'.id_company = cust_sales_rep_map.company_id ','left');
		}
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}else{
			//$this->db->where(array('contact_status'=>1));
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
			$this->db->order_by($status,"ASC");

		if(isset($option['groupby']) && $option['groupby'] !='') {
			$this->db->group_by($option['groupby']);
		}
		
		if((isset($option['limit']) && $option['limit'] !='') && (isset($option['offset']) && $option['offset'] !=''))
			$this->db->limit($option['limit'],$option['offset']);	
		$result = $this->db->get();

		
		
		if ($result != FALSE && $result->num_rows()>0){
			if(is_array($extra) && isset($extra['format']) && $extra['format'] == TRUE){
				return $this->formatSalesREP($result->$returntype());
			}
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
	

}