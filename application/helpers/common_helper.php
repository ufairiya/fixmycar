<?php
// check user is active or not
function is_user_active($url_after_login = '', $redirect = TRUE)
{
	$CI =& get_instance();
	
	/*
	| check request require redirect or not
	| if not then return respone or output
	*/
	if ( ! $redirect)
	{
		return ($CI->session->userdata('user_id') == FALSE) ? FALSE : TRUE;
	}
	
	// if the user is active, then return response or output
	if ($CI->session->userdata('user_id') !== FALSE)
	{
		return TRUE;
	}
	
	// set next page url to redirect after user login
	if ($url_after_login !== '')
	{
		$CI->session->set_userdata('next_url', $url_after_login);
	}
	
	$CI->session->set_flashdata('noti_msg', '<p>You must login to continue</p>');
	
	safe_redirect();
}

function getStatus($status){
	switch ($status) {
		case '1':
			$label = 'label-success';
			$name = 'Active';
			break;

		case '2':
			$label = 'label-danger';
			$name = 'Delete';
			break;
		case '3':
			$label = 'label-info';
			$name = 'Suspend';
			break;
		
		default:
			$label = 'label-warning';
			$name = 'Not Active';
			break;

		
	}
	return	'<span class="label label-sm '.$label.' ">'.$name.'</span>';
}
/*kalai*/
function get_mover_details($mover_id){
	$CI =& get_instance();
	
 $mover_details =	$CI->db->query('SELECT * FROM user_master where id_user_master = "'.$mover_id.'"')->row();
 return $mover_details;
}
/*kalai end*/

function flash( $name = '', $message = '', $class = 'alert alert-success alert-dismissable' )
{
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {
        //No message, create it
        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
        elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

function getCheckInStatus($status){
	switch ($status) {
		case '1':
			$label = 'label-success';
			$name = 'Active';
			break;

		case '2':
			$label = 'label-warning';
			$name = 'Problem';
			break;
		case '3':
			$label = 'label-info';
			$name = 'Idle';
			break;
		
		default:
			$label = 'label-danger';
			$name = 'Not Active';
			break;

		
	}
	return	'<span class="label label-sm '.$label.' ">'.$name.'</span>';
}

function CalculateDistance($lat1, $lon1, $lat2, $lon2,$radius) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  //$unit = strtoupper($unit);

  $distance = ($miles * 1.609344)*1000;
  if($distance <= $radius )
  {
  	return true;
  }
  else
  {
  	return false;
  }

  /*if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "M") {
      return (($miles * 1.609344)*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }*/
}


/**
 * Creates a string based on how long from the current time the date provided.
 * 
 * (e.g. 10 minutes ago)
 *
 * @access	public
 * @param	string
 * @param	booelan
 * @return	string
 */
if (!function_exists('pretty_date'))
{
	function pretty_date($timestamp, $use_gmt = FALSE)
	{
		if (is_string($timestamp))
		{
			$timestamp = strtotime($timestamp);
		}
		$now = ($use_gmt) ? mktime() : time();
		$diff = $now - $timestamp;
		$day_diff = floor($diff/86400);
		
		// don't go beyond '
		if ($day_diff < 0)
		{
			return;
		}
		
		if ($diff < 60)
		{
			return 'just now';
		}
		else if ($diff < 120)
		{
			return '1 minute ago';
		}
		else if ($diff < 3600)
		{
			return floor( $diff / 60 ).' minutes ago';
		}
		else if ($diff < 7200)
		{
			return '1 hour ago';
		}	
		else if ($diff < 86400)
		{
			return floor( $diff / 3600 ).' hours ago';
		}
		else if ($day_diff == 1)
		{
			return 'Yesterday';
		}
		else if ($day_diff < 7)
		{
			return $day_diff ." days ago";
		}
		else
		{
			return ceil($day_diff / 7 ).' weeks ago';
		}
	}
}

function validateDate($date){
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    {
    	return TRUE;
    }
    return FALSE;
}

function getFormatDropDown($result,$keyName,$valueName,$blank=array()){
		$aResponse = array();

		if($result != FALSE && $keyName != FALSE && $valueName != FALSE){
				foreach ($result as $key => $value) {
					$keyNme = isset($value->$keyName) ? $value->$keyName : FALSE;
					$ValueNme = isset($value->$valueName) ? $value->$valueName : FALSE;
					$aResponse[$keyNme] = $ValueNme;
				}
			}
		if(is_array($blank) && count($blank) > 0){
			foreach ($blank as $key => $value) {
				$aResponse[$key] =  $value;
		    }
		}
		return $aResponse;
	}

	function getFormatDropDown_circ($result,$keyName,$valueName,$additional_key = '',$additional_value = '',$blank=array()){
		$aResponse = array();
		$ci=& get_instance();
		if($result != FALSE && $keyName != FALSE && $valueName != FALSE){
				foreach ($result as $key => $value) {
					$keyNme = isset($value->$keyName) ? $value->$keyName : FALSE;
					$ValueNme = isset($value->$valueName) ? $value->$valueName : FALSE;
					$Additional_key = isset($value->$additional_key) ? $value->$additional_key : FALSE;
					//$ci->db->where(array('id_province' => $Additional_key));
					$additional_valuea = $ci->db->get_where('Province',array('id_province' => $Additional_key))->row();
					if($additional_valuea){
					//echo "<pre>";print_r($additional_valuea);echo "</pre>";
					//echo $additional_valuea;
					$reg_name = $additional_valuea->province_name;
					$opt_val = $ValueNme.'-'.$reg_name;
					$aResponse[$keyNme] = $opt_val;
					}
					else
					{
						$aResponse[$keyNme] = $ValueNme;
					}
				}
			}
		if(is_array($blank) && count($blank) > 0){
			foreach ($blank as $key => $value) {
				$aResponse[$key] =  $value;
		    }
		}
		return $aResponse;
	}

function check_date( $str_dt, $str_dateformat, $str_timezone=FALSE ) {
	if($str_timezone == FALSE){
		$str_timezone = date_default_timezone_get();
	}
 
$date = DateTime::createFromFormat( $str_dateformat, $str_dt, new DateTimeZone( $str_timezone ) );
return $date && DateTime::getLastErrors()['warning_count'] == 0 && DateTime::getLastErrors()['error_count'] == 0;
 
}

// safely redirect based on request type
function safe_redirect()
{
	$CI =& get_instance();
	
	if ($CI->input->is_ajax_request() === FALSE)
	{
		redirect('login');
	}
	
	$base_url = $CI->config->item('base_url');
	
	echo '<script>window.location = "' . $base_url . 'login";</script>';
}

function get_active_user_lang()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_lang');
}

function setPageTop($aPageTop,$btnName='New'){
	$pageTopFormat =  '<div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn btn-circle btn-outline red sblue dropdown-toggle" data-toggle="dropdown">';
                        if($btnName == 'New'){
                        	$icons =  'fa fa-plus';
                        }else{
                        	$icons =  'fa fa-eye';
                        }
                        $pageTopFormat .=  '<i class="'.$icons.'"></i>&nbsp;';
                        $pageTopFormat .=  '<span class="hidden-sm hidden-xs">'.$btnName.'&nbsp;</span>&nbsp;
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">';
                            if(count($aPageTop) > 0){
                                foreach ($aPageTop as $pagekey => $pagetopval) {
                                    $picon = $pagetopval['icon'];
                                    $phref = $pagetopval['href'];
                                  
                       $pageTopFormat .=' <li>
                                <a href="'.$phref.'">
                                    <i class="'.$picon.'"></i> '.$pagekey.'</a>
                            </li>';
                                   
                                }
                          }
                           
                        $pageTopFormat .='</ul>
                    </div>
                </div>';
                echo $pageTopFormat;
}

function getCurrentDateTime($time = FALSE)
{
  return ($time) ? date('Y-m-d') : date('Y-m-d H:i:s') ;
}

function getFlashMsg()
{
	$return = '';
	
	$CI =& get_instance();
	
	if (($flash_msg = $CI->session->flashdata('succ_msg')) != FALSE)
	{
		$return .= '<div class="succ_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';	
	}
	elseif (($flash_msg = $CI->session->flashdata('error_msg')) != FALSE)
	{
		$return .= '<div class="error_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';
	}
	elseif (($flash_msg = $CI->session->flashdata('noti_msg')) != FALSE)
	{
		$return .= '<div class="noti_msg al_m">'. $flash_msg .'<span class="al_m_c"></span></div>';
	}
		
	return $return;
}


// return only requested data
function getEndData($data="", $identifier=""){
	return ($data != "" && $identifier != "") ? @end(explode($identifier, $data)) : FALSE;
}

function getUserBasicDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_user_master'=>$param,'status'=>1));
	}
	
	$result = $CI->db->get('user_master');
	if ($result != FALSE && $result->num_rows()>0){
		
		$result = $result->row();
		if ($column == ''){
			
			return (object) array_merge((array) $result, getUserImage($result, $option));
		}else{
			
			if (strpos($column, ',') === FALSE)
			{
				$column = getEndData($column, '.');
				if ($column == 'profile_image'){
					$result = (object) array_merge((array) $result, getUserImage($result, $option));
				}
				return $result->$column;
			}
			else
			{
				return $result;
			}
		}
	}
	return FALSE;
}
function getUseruniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_user_master'=>$param,'status'=>1));
	}
	
	$result = $CI->db->get('user_master');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getDeviceuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}else{
		$CI->db->where(array('id_device'=>$param,'status'=>1));
	}
	
	$result = $CI->db->get('device');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}


function getPrivilegeuniqueDetails($param, $column='', $option=array()){
	
	$CI =& get_instance();
	($column == '') ? $CI->db->select('*') : $CI->db->select($column);
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	$result = $CI->db->get('access_privileges');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}


function getUseruniqueLevelDetails($param){
	
	$CI =& get_instance();
	$CI->db->select('*') ;
	
	if (is_array($param) && count($param)>0){
		$CI->db->where($param);
	}
	
	$result = $CI->db->get('user_levels');
	return ($result != FALSE && $result->num_rows()>0) ? 'false' : 'true';
}

function getUserLevelName($level_key,$column ='level_name'){
	
	$CI =& get_instance();
	$CI->db->select($column);
	$CI->db->where(array("level_key"=>$level_key));
	$result = $CI->db->get('user_levels');
	return ($result != FALSE && $result->num_rows()>0) ? $result = $result->row()->$column : FALSE;
}


function getUserImage($row, $option=array()){
	
	$base_url = (empty($option['base_url'])) ? base_url() : $option['base_url'];
	$default_image = (empty($option['default_image'])) ? 'assets/images/no_image.png' : $option['default_image'];
	if ($row->profile_image != ''){
			return array('profile_image'=>$row->profile_image);
	}
	return array('profile_image'=>$base_url.$default_image);
}

function getProfileImage(){
	
	$CI =& get_instance();
	$CI->db->select('*');	
	$CI->db->where(array('id_user_master'=>get_active_user_id(),'status'=>1));	
	$result = $CI->db->get('user_master');
	
	if ($result != FALSE && $result->num_rows()>0){
		return $result->row()->profile_image;
		// return $result->row()->id_proof;
	}
	// echo 'sdjfkjdf';exit();
	return FALSE;
}
function getProfileuserid(){
	
	$CI =& get_instance();
	$CI->db->select('*');	
	$CI->db->where(array('id_user_master'=>get_active_user_id(),'status'=>1));	
	$result = $CI->db->get('user_master');
	
	if ($result != FALSE && $result->num_rows()>0){
		// return $result->row()->profile_image;
		return $result->row()->id_proof;
	}
	// echo 'sdjfkjdf';exit();
	return FALSE;
}


function get_active_user_id()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_id');
}

function get_active_user_email()
{
	$CI =& get_instance();
	return $CI->session->userdata('user_email');
}


function is_admin()
{
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return ($result->row()->user_type == "superuser") ? TRUE : FALSE;
	}
	return FALSE;
}


function get_user_type()
{
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return $result->row()->user_type ;
	}
	return FALSE;
}


function get_user_name()
{
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');
	$CI->db->select('*');
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	$result = $CI->db->get('user_master');
	if($result != FALSE && $result->num_rows()>0) {
		return $result->row()->username ;
	}
	return FALSE;
}


function user_privilges_check($type,$id_privilges)
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('id_privileges'=>$id_privilges,'user_type_key'=>$type));
	$result = $CI->db->get('user_privileges');
	if($result != FALSE && $result->num_rows()>0) {
		return TRUE ;
	}
	return FALSE;
}


function user_access_permission($user_access_key = '')
{
	$CI =& get_instance();
	
	// Super User Access
	if(is_admin() == TRUE){
		
		return TRUE;
	}
	
	if($user_access_key == '')
	{
		return FALSE;
	}
	
	$user_type = $CI->session->userdata('user_type');
	
	if($user_type == NULL)
	{
		return FALSE;
	}	
		
	$CI->db->select('id_access_privileges');
	
	$CI->db->where(array('access_privileges_key'=>$user_access_key,'status'=>1));
	
	$result = $CI->db->get('access_privileges');
	
	if($result == FALSE)
	{
		return FALSE;		
	}
		
	if($result->num_rows()>0) {

		$user_id_privileges = $result->row()->id_access_privileges;
		
		$CI->db->select('*');
		
		$CI->db->where(array('user_type_key'=>$user_type,'id_privileges'=>$user_id_privileges));
		
		$result = $CI->db->get('user_privileges');
		
		if($result == FALSE)
		{
			return FALSE;		
		}	
		if($result->num_rows()>0) 
			return TRUE ;
		else
			return FALSE;
	}
	return FALSE;
}


function slugify($string, $replace = array(), $delimiter = '_') {
  if (!extension_loaded('iconv')) {
    throw new Exception('iconv module not loaded');
  }
  // Save the old locale and set the new locale to UTF-8
  $oldLocale = setlocale(LC_ALL, '0');
  setlocale(LC_ALL, 'en_US.UTF-8');
  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  if (!empty($replace)) {
    $clean = str_replace((array) $replace, ' ', $clean);
  }
  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
  $clean = strtolower($clean);
  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
  $clean = trim($clean, $delimiter);
  // Revert back to the old locale
  setlocale(LC_ALL, $oldLocale);
  return $clean;
}


function get_status_icon($customer_option_data = '')
{
	$CI =& get_instance();		
	
	$CI->db->select('*');		
	
	$CI->db->where(array('status_name'=>$customer_option_data));		
	
	$result = $CI->db->get('status');	
	
	if($result != FALSE && $result->num_rows()>0) {	
	
	$icon = '<i class="glyphicon '.$result->row()->status_icon.'" style="width:25px;color:'.$result->row()->status_color.'"><i></i></i>';
	return $icon;

	}else{
				
		return FALSE;
	}
}

function customform_dropdown($data = '', $options = array(), $selected = array(), $extra = '', $optionsExtra = array())
{
    $defaults = array();

    if (is_array($data))
    {
        if (isset($data['selected']))
        {
            $selected = $data['selected'];
            unset($data['selected']); // select tags don't have a selected attribute
        }

        if (isset($data['options']))
        {
            $options = $data['options'];
            unset($data['options']); // select tags don't use an options attribute
        }
    }
    else
    {
        $defaults = array('name' => $data);
    }

    is_array($selected) OR $selected = array($selected);
    is_array($options) OR $options = array($options);

    // If no selected state was submitted we will attempt to set it automatically
    if (empty($selected))
    {
        if (is_array($data))
        {
            if (isset($data['name'], $_POST[$data['name']]))
            {
                $selected = array($_POST[$data['name']]);
            }
        }
        elseif (isset($_POST[$data]))
        {
            $selected = array($_POST[$data]);
        }
    }

    $extra = _attributes_to_string($extra);

    $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

    $form = '<select '.rtrim(_parse_form_attributes($data, $defaults)).$extra.$multiple.">\n";

    foreach ($options as $key => $val)
    {
        $key = (string) $key;

        if (is_array($val))
        {
            if (empty($val))
            {
                continue;
            }

            $form .= '<optgroup label="'.$key."\">\n";

            foreach ($val as $optgroup_key => $optgroup_vals)
            {
               
                $data_value = (is_array($optgroup_vals) && isset($optgroup_vals['data-val'])) ? $optgroup_vals['data-val'] : FALSE;

                $optgroup_val =is_array($optgroup_vals) ? $optgroup_vals['label'] : $optgroup_vals;

                $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';

                $data_id = isset($optionsExtra[$key]) ? $optionsExtra[$key] : '';
                // Changed to include $optionsExtra
                $form .= '<option data-id ="'.$data_id .'" data-type="'.$key.'"  data-val ="'.$data_value.'" value="'.html_escape($optgroup_key).'"'.$sel
                    .(isset($optionsExtra[$key][$optgroup_key]) ? _parse_form_attributes($optionsExtra[$key][$optgroup_key]) : '')
                    .'>'.(string) $optgroup_val."</option>\n";
            }
            $form .= "</optgroup>\n";
        } 
        else 
        {
            // Changed to include $optionsExtra
            $flipSelected = array_flip($selected);
            $dataKey = (in_array($key, $selected)) ? $flipSelected[$key] : '-1';
            $form .= '<option data-id="'.$dataKey.'" value="'.html_escape($key).'"'
                .(in_array($key, $selected) ? ' selected="selected"' : '')
                .(isset($optionsExtra[$key]) ? _parse_form_attributes($optionsExtra[$key]) : '')
                .'>'.(string) $val."</option>\n";
        }
    }

    return $form."</select>\n";
}

function check_user_subscription($user_id = '')
{
	$CI =& get_instance();
	
	// Super User Access
	if(is_admin() == TRUE){
		return json_encode(array('status' => '1','message' => ''));
		
		//return TRUE;
	}
	if($user_id == '')
	{
		return json_encode(array('status' => '0','message' => 'please_login'));
		//return FALSE;
	}
	
	$user_type = $CI->session->userdata('user_type');

	
	if($user_type == NULL)
	{
		return json_encode(array('status' => '0','message' => 'invalid_user'));
		//return FALSE;
	}	
	$current_date = date('Y-m-d');	
	$CI->db->select('*');
	
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	
	//$st_where="id_user_master='".$user_id."' AND status ='1' AND (subscription_startdate >= '".$current_date."' OR subscription_enddate >= '".$current_date."')";
	//$CI->db->where($st_where);
	
	$result = $CI->db->get('user_subscription');
	
	
	//echo $CI->db->last_query();
	
	if($result == FALSE || $result == '' || empty($result))
	{
		//echo "ss";
		return FALSE;		
	}
		
	if($result->num_rows()>0) {
		
		//echo "ff";

		$subscription_enddate = $result->row()->subscription_enddate;
		//$subscription_row = $result->row();
		$subscription_id = $result->row()->subscription_id;
		$daily_limit = $result->row()->daily_limit;
		$weekly_limit = $result->row()->weekly_limit;
		$yearly_limit = $result->row()->yearly_limit;
		$daily_limit_reached = $result->row()->daily_limit_reached;
		$weekly_limit_reached = $result->row()->weekly_limit_reached;
		$yearly_limit_reached = $result->row()->yearly_limit_reached;
		//$daily_limit = $result->row()->daily_limit;

		$current_date = date('Y-m-d');
		
		$sub_array=array('subscription_id' => $subscription_id,'daily_limit' => $daily_limit, 'weekly_limit' => $weekly_limit, 'yearly_limit' => $yearly_limit, 'daily_limit_reached' => $daily_limit_reached, 'weekly_limit_reached' => $weekly_limit_reached, 'yearly_limit_reached' => $yearly_limit_reached);

		if(strtotime($subscription_enddate) >= strtotime($current_date))
		{
			
			/*if($daily_limit == 0 && $weekly_limit == 0 && $yearly_limit == 0)
			{
				return json_encode(array('status' => '0','message' => 'limit_notset'));
			}*/

			
			
			
			
			if($daily_limit == 0 && $weekly_limit == 0 && $yearly_limit == 0)
			{
				return json_encode(array('status' => '0','message' => 'limit_notset'));
				//return FALSE;
			}
			else if($daily_limit == 0 && $weekly_limit == 0 && $yearly_limit > 0 && $yearly_limit > $yearly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit == 0 && $weekly_limit > 0 && $yearly_limit == 0 && $weekly_limit > $weekly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit > 0 && $weekly_limit == 0 && $yearly_limit == 0 && $daily_limit > $daily_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit > 0 && $weekly_limit > 0 && $yearly_limit == 0 && $daily_limit > $daily_limit_reached && $weekly_limit > $weekly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit > 0 && $weekly_limit == 0 && $yearly_limit > 0 && $daily_limit > $daily_limit_reached && $yearly_limit > $yearly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit == 0 && $weekly_limit > 0 && $yearly_limit > 0 && $weekly_limit > $weekly_limit_reached && $yearly_limit > $yearly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else if($daily_limit > 0 && $weekly_limit > 0 && $yearly_limit > 0 && $daily_limit > $daily_limit_reached && $weekly_limit > $weekly_limit_reached && $yearly_limit > $yearly_limit_reached)
			{
				return json_encode(array('status' => '1','message' => 'success','sub_array' => $sub_array));
			}
			else
			{
				return json_encode(array('status' => '0','message' => 'limit_reached'));
				//eturn FALSE;
			}
			
			
			//return json_encode($sub_array);
			//return TRUE;
		}
		else
		{
			return json_encode(array('status' => '0','message' => 'subscription_end'));
			return FALSE;
		}
	}
	else
	{
		return json_encode(array('status' => '0','message' => 'not_subscripted_user'));
	}

	return json_encode(array('status' => '0','message' => 'some_error_occured'));
	//return FALSE;
}

function update_serach_history($subscription_id='', $user_id = '',$query_id = '',$privileges_id='')
{
	$CI =& get_instance();
	
	
	if($user_id == '')
		return FALSE;
	else if(is_admin() == TRUE){          // Super User Access
		$insert_date = array('user_id' => $user_id,'query_id' => $query_id, 'privileges_id' => $privileges_id,'daily' => '1','weekly' => '1', 'yearly' => '1', 'created_on' => getCurrentDateTime());
         $Insert_status = $CI->db->insert('serach_count_history', $insert_date);
         return TRUE;
	}
	else
	{
		
		$CI->db->select('*');
	 
		$CI->db->where(array('subscription_id'=>$subscription_id,'status'=>1));
		
		$result = $CI->db->get('user_subscription');
		
		if($result == FALSE || $result == '' || empty($result))
		{
			//echo "ss";
			return FALSE;		
		}
			
		if($result->num_rows()>0) {
			
			
		
			
			//echo "ff";
			
			$subscription_enddate = $result->row()->subscription_enddate;
			//$subscription_row = $result->row();
			$subscription_id = $result->row()->subscription_id;
			$daily_limit = $result->row()->daily_limit;
			$weekly_limit = $result->row()->weekly_limit;
			$yearly_limit = $result->row()->yearly_limit;
			$daily_limit_reached = $result->row()->daily_limit_reached;
			$weekly_limit_reached = $result->row()->weekly_limit_reached;
			$yearly_limit_reached = $result->row()->yearly_limit_reached;
			
			$user_email = get_active_user_email();
		
			$daily = $weekly = $yearly = $daily_re = $weekly_re = $yearly_re = 0;
			
			$daily_different = -1;
			$weekly_different = -1;
			$yearly_different = -1;
			
			if($daily_limit > 0)
			{
				$daily_re = $daily_limit_reached+1;
				$daily = 1;
				$daily_different = $daily_limit - $daily_re;
			}
			if($weekly_limit > 0)
			{
				$weekly_re = $weekly_limit_reached+1;
				$weekly = 1;
				$weekly_different = $weekly_limit - $weekly_re;
			}
			if($yearly_limit > 0)
			{
				$yearly_re = $yearly_limit_reached+1;
				$yearly = 1;
				$yearly_different = $yearly_limit - $yearly_re;
			}

			if( ($yearly_different > 0 && $yearly_different < 5) || $yearly_different == 0)
			{
				//echo "tt";
				mail("vijayasanthi@stallioni.com","Yearly Limit Reached","You are reached the yearly limit");
			}
			if(($weekly_different > 0 && $weekly_different < 5) || $weekly_different == 0)
			{
				//echo "ss";
				mail("vijayasanthi@stallioni.com","Weekly Limit Reached","You are reached the weekly limit");
			}
			if(($daily_different > 0 && $daily_different < 5) || $daily_different == 0)
			{
				//echo "aa";
				mail("vijayasanthi@stallioni.com","Daily Limit Reached","You are reached the daily limit");
			}

			$update_data = array('daily_limit_reached' => $daily_re,'weekly_limit_reached' => $weekly_re, 'yearly_limit_reached' => $yearly_re, 'modified_date' => getCurrentDateTime());
			$where_data = array('subscription_id' => $subscription_id);
			
			$CI->db->where($where_data);
            $CI->db->update('user_subscription', $update_data);
            
            $insert_date = array('user_id' => $user_id,'query_id' => $query_id, 'privileges_id' => $privileges_id,'daily' => $daily,'weekly' => $weekly, 'yearly' => $yearly,'daily_reached' => $daily_re, 'weekly_reached' => $weekly_re, 'yearly_reached' => $yearly_re, 'created_on' => getCurrentDateTime());
            
            $Insert_status = $CI->db->insert('serach_count_history', $insert_date);
            

			
            return TRUE;
			
			
			//$sub_details = $result->row();
			
			//echo "<pre>";print_r($sub_details);echo "</pre>";
			
			
			//$subscription_enddate = $result->row()->subscription_enddate;

			//$current_date = date('Y-m-d');

			//if(strtotime($subscription_enddate) >= strtotime($current_date))
				//return TRUE;
			//else
				//return FALSE;
		}
	}
}
	
function get_admin_mail_details(){
	$CI =& get_instance();
 $super_user =	$CI->db->query('SELECT * FROM user_master where user_type = "superuser"')->row();
 return $super_user;
}


function order_detailss($order){
	$CI =& get_instance();
	$orders_detail =$CI->db->query('SELECT * FROM order_details where id = "'.$order.'"')->row();
 return $orders_detail;
}
	
	/*
	 * // Super User Access
	if(is_admin() == TRUE){
		
		return TRUE;
	}
	if($user_id == '')
	{
		return FALSE;
	}
	
	$user_type = $CI->session->userdata('user_type');

	
	if($user_type == NULL)
	{
		return FALSE;
	}	
		
	$CI->db->select('subscription_enddate');
	
	$CI->db->where(array('id_user_master'=>$user_id,'status'=>1));
	
	$result = $CI->db->get('user_subscription');
	
	if($result == FALSE || $result == '' || empty($result))
	{
		//echo "ss";
		return FALSE;		
	}
		
	if($result->num_rows()>0) {
		
		//echo "ff";

		$subscription_enddate = $result->row()->subscription_enddate;

		$current_date = date('Y-m-d');

		if(strtotime($subscription_enddate) >= strtotime($current_date))
			return TRUE;
		else
			return FALSE;
	}

	return FALSE;*/


function userPrivilgesList($user_id)
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('id_user'=>$user_id));
	$result = $CI->db->get('user_privileges');
	//echo $CI->db->last_query();
	if($result != FALSE && $result->num_rows()>0) {
		return $result->result();
	}
	return FALSE;
}

/**************************** STAL added*************************/
function get_faqdatas($postparent='')
{
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->where(array('post_parent'=>$postparent,'post_status'=> 'publish'));
	$result = $CI->db->get('pages');
	 
	if($result != FALSE && $result->num_rows()>0) {
		return $result->result();
	}
	return FALSE;
}
function get_ratecount_garage($user_id)
{
  	$CI =& get_instance();
	$orders_detail =$CI->db->query('SELECT COUNT(*) as countrate FROM garage_reviews where garage_id = "'.$user_id.'"')->row();
    return $orders_detail->countrate;
 	 
}