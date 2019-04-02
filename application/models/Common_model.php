<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model{


	public function insert($table_name,$data)
	{

		$this->db->insert($table_name, $data);		
		return $this->db->insert_id();
		
	}

	 public function update($table_name,$data, $where = array())
    {
        if (count($where) > 0)
            $this->db->where($where);
        return $this->db->update($table_name, $data);
    }

    	public function delete($table_name,$where = array())
	{
		 $this->db->where($where);
        return $this->db->delete($table_name);
	}



}