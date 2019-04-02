<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( session_status() == PHP_SESSION_NONE ) {
  session_start();
}

// Autoload the required files
require_once( APPPATH . 'libraries/Facebook/autoload.php' );

class Facebook {
  var $ci;
  var $helper;
  var $session;
  var $permissions;

  public function __construct() {
    $this->ci =& get_instance();
    $this->ci->config->load('facebook');
    $fbsettings = $this->ci->config->item('facebook');
   
    $this->app_id = (is_array($fbsettings) && isset($fbsettings['app_id'])) ? $fbsettings['app_id'] : '';

    $this->app_secret = (is_array($fbsettings) && isset($fbsettings['app_secret'])) ? $fbsettings['app_secret'] : '';

    $this->app_page_id = (is_array($fbsettings) && isset($fbsettings['app_page_id'])) ? $fbsettings['app_page_id'] : '';

    $this->fb = new \Facebook\Facebook([
      'app_id' =>  $this->app_id,
      'app_secret' => $this->app_secret,
      'default_graph_version' => 'v2.8',
      //'default_access_token' => '{access-token}', // optional
    ]);

    $this->redirecturl = base_url().'login/fblogin';
    $this->helper =  $this->fb->getRedirectLoginHelper();

    if($this->ci->session->userdata('so_fb_access_token')){
      $this->accessToken = $this->ci->session->userdata('so_fb_access_token');
    }else{
      $this->accessToken = $this->helper->getAccessToken();
      $this->ci->session->set_userdata( 'so_fb_access_token', (string) $this->accessToken );
    }

}
public function login_url() {
  $permissions =array('email','publish_actions','public_profile','user_about_me','user_hometown','user_location','user_birthday','pages_messaging_phone_number','manage_pages','publish_pages'); 

  //$permissions = ['email', 'user_likes'];
  //$permissions = ['email']; // Optional permissions
  return $loginUrl = $this->helper->getLoginUrl($this->redirecturl, $permissions);
}
public function get_user() {
   
    try {
      $response = $this->fb->get('/me/?fields=email,id,name,birthday,picture,gender,location,first_name,last_name,hometown,about,cover',  $this->accessToken);
      $user = $response->getGraphUser();
    }catch(Facebook\Exceptions\FacebookResponseException $e) {
      // echo 'Graph returned an error: ' . $e->getMessage();
      // exit;
      $user = array();
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // echo 'Facebook SDK returned an error: ' . $e->getMessage();
      // exit;
      $user = array();
    }
  

   
      return $user;
   }
public function logoutfb(){ 

    $redirecturl = base_url().'login';
    $fb_logout_url =  $this->helper->getLogoutUrl($this->accessToken,$this->redirecturl); 
    // $this->ci->session->set_userdata('fb_token','');
    // header('Location: '.$fb_logout_url);
    // exit;
    $this->ci->session->set_userdata('so_fb_access_token','');
    $this->ci->session->set_userdata('fb_token','');
  }
public function pagePostWall($token = '',$post = array()){
   $aResponse['status']=FALSE;
   $aResponse['error'] = '';
   $aResponse['result'] = '';
   
   $newToken = $this->getPageLongLifeAccessToken($token);
        
    try {
      $response = $this->fb->post('/'.$this->app_page_id.'/feed', $post,$newToken );
      $graphNode = $response->getGraphNode();
      $aResponse['status']=TRUE;
      $aResponse['result'] =$graphNode;
      
    } catch(Facebook\Exceptions\FacebookResponseException $e) {  
      $aResponse['result'] ='';
      $aResponse['error'] = $e->getMessage();  
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      $aResponse['result'] ='';
      $aResponse['error'] = $e->getMessage();    
    }
   return $aResponse;
}

public function autoPagePost($post = array(),$token = ''){

  $this->ci->load->model('user_model');
  if(empty($token)){
    $fbInfo = $this->ci->user_model->getFBAutoSettingsInfo(array('page_id'=>$this->app_page_id,'status'=>1));
    $token = (isset($fbInfo->access_token)) ? $fbInfo->access_token : FALSE;
  }
 
   $aResponse['status']=FALSE;
   $aResponse['error'] = '';
   $aResponse['result'] = '';        
    try {
      $response = $this->fb->post('/'.$this->app_page_id.'/feed', $post,$token );
      $graphNode = $response->getGraphNode();
      $aResponse['status']=TRUE;
      $aResponse['result'] =$graphNode;
      
    } catch(Facebook\Exceptions\FacebookResponseException $e) {  
      $aResponse['result'] ='';
      $aResponse['error'] = $e->getMessage();  
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      $aResponse['result'] ='';
      $aResponse['error'] = $e->getMessage();    
    }
   return $aResponse;
}

function getLongLifeAccessToken($token  =''){
  $ch = curl_init();
  $url = "https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=".$this->app_id."&client_secret=".$this->app_secret."&fb_exchange_token=".$token."";
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
  curl_setopt($ch,CURLOPT_TIMEOUT, 20);
  $response = curl_exec($ch);
  curl_close ($ch);
  $newResponse = json_decode($response);
  return $accessToken = isset($newResponse->access_token) ? $newResponse->access_token : FALSE;
 
}

function getPageLongLifeAccessToken($token  =''){
 
  $ch = curl_init();
  $graph_url= "https://graph.facebook.com/".$this->app_page_id."?fields=access_token&access_token=".$token;

  curl_setopt($ch, CURLOPT_URL, $graph_url);
  curl_setopt($ch, CURLOPT_HEADER, 0);  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  $output = curl_exec($ch);
  curl_close($ch);
  $newResponse = json_decode($output);
  return $accessToken = isset($newResponse->access_token) ? $newResponse->access_token : $output;
 
}




}
