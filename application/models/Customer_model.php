<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function get_customer_details($userid ='')
	{


		$this->db->select('*');
		$this->db->from('user_master');
		$this->db->where('user_type','customer');
		if(!empty($userid))
		{
		  $this->db->where('id_user_master',$userid);
		}
		$query = $this->db->get();
		$results = $query->result();
		return  $results;
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