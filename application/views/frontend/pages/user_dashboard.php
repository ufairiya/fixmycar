<!-- <?php echo "<pre>";print_r($_SESSION);echo "</pre>"; ?> 
 -->

 <?php 

  // echo '<pre>'; print_r($_SESSION); echo '</pre>';

if($this->session->userdata['user_type']=='movers'){

 $user_type = $this->session->userdata['user_type'];
 $username = $this->session->userdata['user_name'];

echo '<h3 style="text-align: center;font-weight: bold;">Welcome  '.$user_type.' :'.$username.'</h3>';
  
}

if($this->session->userdata['user_type']=='user'){
 $user_type = $this->session->userdata['user_type'];
 $username = $this->session->userdata['user_name'];

echo '<h3 style="text-align: center;font-weight: bold;">Welcome  '.$user_type.' :'.$username.'</h3>';
  

}
if($this->session->userdata['user_type']=='customer'){
 $user_type = $this->session->userdata['user_type'];
 $username = $this->session->userdata['user_name'];

echo '<h3 style="text-align: center;font-weight: bold;">Welcome  '.$user_type.' :'.$username.'</h3>';
  

}



 ?>