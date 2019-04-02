<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

	public $table_page = "pages_content";
	public $table_pages = "pages";
	public $table_pagesmeta = "pages_meta";
	public $table_pagesterm = "pages_terms";
 	
   public function get_pages_fulldetails($param=array(), $column='', $option=array(),$returntype='result')
	{		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($this->table_pages);	
		
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
 	    $this->db->order_by('ID',"ASC");
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
  public function update_page_meta($data,$where = array()){
      $this->db->where($where);
	  $this->db->update('pages_meta', $data); 
        return 1;
  
  }
    public function company_delete($data,$where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update('user_master', $data);
	}

 
	// Delete User Permanently
	
	public function company_delete_permanently($where = array())
	{
		 if (count($where) > 0)
            $this->db->where($where);
        return $this->db->delete('user_master');
	}
/****************************** FAQ********************************************/
public function delete_pages($table='',$where='')
{
	 $data=array('post_status'=>'draft');  $this->db->where($where);
   $this->db->update('pages',$data);
   return 1;
}
public function delete_pagestrems($table='',$where='')
{
  $this->db->where($where);
   $this->db->delete('pages_terms');
   return 1;
}
	public function get_terms_faqs(){
        $this->db->select('*');
		$this->db->from('pages_terms');
 		$query = $this->db->get();
		$results = $query->result();
		return  $results;
 	}

 	public function get_pages_details_faq($where = array())
 	{
 		$this->db->select('*');$this->db->where($where);
		$this->db->from('pages'); 
 		$query = $this->db->get();
		$results = $query->result();
		return  $results;
 	}
 	public function get_pages_details($where = array())
	{
 		$this->db->select('*');$this->db->where($where);
		$this->db->from('pages');
 		$query = $this->db->get();
		$results = $query->result();
		return  $results;
   }

}