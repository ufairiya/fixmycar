<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Map_model extends CI_Model{

	public $table = '';

	public function _get_($table="",$param=array(), $column='', $option=array(),$where_in_key= '',$where_in_value= '')
	{	

		if ($column == ''){
			$this->db->select('*');		
		}else{
			
			$this->db->select($column);
		}
		$this->db->from($table);	
		
		if (is_array($param) && count($param)>0){
			$this->db->where($param);
		}
		if ($where_in_key != ''&& $where_in_value != ''){
			$this->db->where_in($where_in_key, $where_in_value, FALSE);	
			
		}
		$result = $this->db->get();
		if ($result != FALSE && $result->num_rows()>0){
			if ($column == ''){
				return $result = $result->result();			
			}else{
				if (strpos($column, ',') === FALSE)
				{
					$column = $this->getEndData($column, ".");
					return $result->row()->$column;
				}
				else
				{
					return $result;
				}
			}
		}
		return FALSE;
    }
    public function get_allcountry($country_where,$region_where,$province_where,$municipality_where){
		$sql="SELECT DISTINCT country_name,id_country FROM `Country` as cuty left join Region as reg on reg.fk_id_country=cuty.id_country and reg.region_status='1' ".$region_where." left join Province as prov on prov.fk_id_region=reg.id_region and prov.province_status='1' ".$province_where." left join Municipality as mun on mun.fk_id_province=prov.id_province and mun.municipality_status='1' ".$municipality_where." where country_status='1' ".$country_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_allregion($country_where,$region_where,$province_where,$circ_where,$municipality_where){
		$sql="SELECT DISTINCT region_name,id_region FROM `Country` as conty left join Region as reg on reg.fk_id_country=conty.id_country and reg.region_status='1' ".$region_where." left join Province as prov on prov.fk_id_region=reg.id_region and prov.province_status='1' ".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province and prov.province_status='1' ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ and mun.municipality_status='1' ".$municipality_where." where country_status='1'".$country_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_allprovine($country_where,$region_where,$province_where,$circ_where,$municipality_where){
		$sql="SELECT DISTINCT province_name,id_province FROM `Country` as conty left join Region as reg on reg.fk_id_country=conty.id_country and reg.region_status='1' ".$region_where." left join Province as prov on prov.fk_id_region=reg.id_region and prov.province_status='1' ".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province and prov.province_status='1' ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ and mun.municipality_status='1' ".$municipality_where." where country_status='1'".$country_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_allcirc($country_where,$region_where,$province_where,$circ_where,$municipality_where){
		$sql="SELECT DISTINCT circ_name,id_circ,fk_id_province FROM `Country` as conty left join Region as reg on reg.fk_id_country=conty.id_country and reg.region_status='1' ".$region_where." left join Province as prov on prov.fk_id_region=reg.id_region and prov.province_status='1' ".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province and prov.province_status='1' ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ and mun.municipality_status='1' ".$municipality_where." where country_status='1'".$country_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_allmunicipality($country_where,$region_where,$province_where,$circ_where,$municipality_where){
		 $sql="SELECT DISTINCT municipality_name,id_municipality FROM `Country` as conty left join Region as reg on reg.fk_id_country=conty.id_country and reg.region_status='1' ".$region_where." left join Province as prov on prov.fk_id_region=reg.id_region and prov.province_status='1' ".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province and circ.circ_status='1' ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ and mun.municipality_status='1' ".$municipality_where." where country_status='1'".$country_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
    public function get_province_bycountry($country_id,$region_where,$province_where){
		$sql = "SELECT id_province,province_name FROM Province,Region where province_status='1' and fk_id_region=id_region and fk_id_country='".$country_id."' and region_status='1' ".$region_where." ".$province_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_municipality_bycountry($country_id,$region_where,$province_where,$municipality_where){
		 $sql = "SELECT id_municipality,municipality_name FROM Municipality,Province,Region where province_status='1' and fk_id_region=id_region and fk_id_country='".$country_id."' and region_status='1' and fk_id_province=id_province and municipality_status='1' ".$region_where." ".$province_where." ".$municipality_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_municipality_byregion($region_id,$province_where,$municipality_where){
		$sql = "SELECT id_municipality,municipality_name FROM Municipality,Province where province_status='1' and fk_id_region='".$region_id."' and fk_id_province=id_province and municipality_status='1' ".$province_where." ".$municipality_where;
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	public function get_latlog_bycountry($country_where='',$region_where='',$province_where='',$circ_where='',$municipality_where=''){
		//$sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_latitude_value,log.neighborhood_longitude_value,povt.neighborhood_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value  FROM `Country` as conty left join Region as reg1 on reg1.fk_id_country=conty.id_country left join Province as prov on prov.fk_id_region=reg1.id_region left join Municipality as mun on mun.fk_id_province=prov.id_province left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Latitude as lat on lat.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_Longitude as log on log.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$where_query;
		// $sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,povt.neighborhood_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value  FROM `Country` as conty left join Region as reg1 on reg1.fk_id_country=conty.id_country ".$region_where." left join Province as prov on prov.fk_id_region=reg1.id_region ".$province_where." left join Municipality as mun on mun.fk_id_province=prov.id_province ".$municipality_where." left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_Long as log on log.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$country_where;

		 $sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,povt.neighborhood_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value  FROM `Country` as conty left join Region as reg1 on reg1.fk_id_country=conty.id_country ".$region_where." left join Province as prov on prov.fk_id_region=reg1.id_region ".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ ".$municipality_where." left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_Long as log on log.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$country_where;
		$query = $this->db->query($sql);
		//echo $this->db->last_query();exit;
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
		
	}
	public function get_latlog_byregion($where_query,$region_where='',$province_where='',$circ_where='',$municipality_where=''){
		$sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,regpovt.region_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value from Region_PovertyIndex as regpovt left join Province as prov on prov.fk_id_region=regpovt.fk_id_region".$province_where." left join Circ as circ on circ.fk_id_province=prov.id_province ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ ".$municipality_where." left join Neighborhood neb on neb.fk_id_municipality = mun.id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_Long as log on log.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$where_query;
		$query = $this->db->query($sql);
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
		
	}
	public function get_latlog_byprovince($where_query,$province_where='',$circ_where='',$municipality_where=''){
		$sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,ppindex.province_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value FROM Province as pn left join Province_PovertyIndex as ppindex on ppindex.fk_id_province = pn.id_province left join Circ as circ on circ.fk_id_province=ppindex.fk_id_province ".$circ_where." left join Municipality as mun on mun.fk_id_circ=circ.id_circ ".$municipality_where." left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood = neb.id_neighborhood left join Neighborhood_Long as log on log.fk_id_neighborhood= neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$where_query .$province_where;
		$query = $this->db->query($sql);
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
		
	}
	public function get_latlog_bycirc($where_query,$province_where='',$circ_where='',$municipality_where=''){
		 $sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,cindex.circ_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value FROM Circ as circ left join Circ_PovertyIndex as cindex on cindex.fk_id_circ = circ.id_circ left join Municipality as mun on mun.fk_id_circ=cindex.fk_id_circ ".$municipality_where." left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood = neb.id_neighborhood left join Neighborhood_Long as log on log.fk_id_neighborhood= neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$where_query .$province_where;
		$query = $this->db->query($sql);
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
		
	}
	public function get_latlog_bymunicipality($where_query){
		$sql="SELECT neb.neighborhood_name as poverty_name,lat.neighborhood_lat_value,log.neighborhood_long_value,mindex.municipality_povertyindex_value as povertyindex_value,povt.neighborhood_povertyindex_value as neb_povertyindex_value FROM `Municipality_PovertyIndex` as mindex left join Neighborhood as neb on neb.fk_id_municipality=mindex.fk_id_municipality left join Neighborhood_Lat as lat on lat.fk_id_neighborhood=neb.id_neighborhood  left join Neighborhood_Long as log on log.fk_id_neighborhood=neb.id_neighborhood left join Neighborhood_PovertyIndex as povt on povt.fk_id_neighborhood=neb.id_neighborhood ".$where_query;
		$query = $this->db->query($sql);
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
		
	}
	
	
	/****** hema ****/


	public function get_municipality_byprovince($province_ids){
		 $sql = "SELECT id_municipality,municipality_name FROM Municipality,Circ where circ_status='1' and fk_id_province in('".$province_ids."') and fk_id_circ=id_circ and municipality_status='1'";
		$query = $this->db->query($sql);
	
		if ($query != FALSE && $query->num_rows()>0){
		$result = $query->result();
		return $result;
		}
		else
		{
			return false;
		}
	}
	
	
	//SELECT * FROM `Province_PovertyIndex` as ppindex left join Municipality as mun on mun.fk_id_province = ppindex.fk_id_province left join Neighborhood as neb on neb.fk_id_municipality=mun.id_municipality left join Neighborhood_Latitude as lat on lat.fk_id_neighborhood = neb.id_neighborhood left join Neighborhood_Longitude as log on log.fk_id_neighborhood= neb.id_neighborhood
	
}
