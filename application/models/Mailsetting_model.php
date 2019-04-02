<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class MAilsetting_model extends CI_Model {

	public $table_page = "pages_content";
	public $table_welcome= "welcome_mail";

	public function get_pages_details($userid ='')
	{


		$this->db->select('*');
		$this->db->from('pages_content');
		//$this->db->where('user_type','customer');
		// if(!empty($page_id))
		// {
		//   $this->db->where('id_user_master',$userid);
		// }
		$query = $this->db->get();
		$results = $query->result();
		return  $results;
   }
   public function get_mail_details($param=array(), $column='', $option=array(),$returntype='result')
	{		
		
		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		 
		$this->db->from($this->table_welcome);	
		
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

  public function createcustomer($data)
  {

	  $this->db->insert('user_master', $data);
        return $this->db->insert_id();
 
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
}