<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( session_status() == PHP_SESSION_NONE ) {
  session_start();
}

// Autoload the required files
require_once( APPPATH . 'libraries/Google/vendor/autoload.php' );


class Google {
  var $ci;
  var $helper;
  var $session;
  var $permissions;
 
  

  public function __construct() {
    $this->ci =& get_instance();
    
    $this->redirect_uri = base_url().'Login/gplogin';   
    $this->config = array('client_id' => '71865290789-4jv2papo847d3b0capdp8ahfrs290etd.apps.googleusercontent.com',
    'client_secret' => 'IBKFMX56mZyic3ZybUwi8BM_',
    'redirect_uri' => $this->redirect_uri,
    );
    
  
    $this->client = new Google_Client();
    $this->client->setAuthConfig($this->config);
    $this->client->setRedirectUri($this->redirect_uri);
    $this->client->setScopes('email');
    
}
 public function logingoogleurl()
 {     
    return $authUrl = $this->client->createAuthUrl();
 }
 public function getGplusToken($code)
 {
     $token = $this->client->fetchAccessTokenWithAuthCode($code);
     $this->ci->session->set_userdata( 'gplus_tokens',$token );
     $id_token = isset($token['id_token']) ? $token['id_token']  :$this->ci->session->userdata('gplus_token');
      $access_token = isset($token['access_token']) ? $token['access_token']  : $this->ci->session->userdata('gplus_access_token');
     $this->ci->session->set_userdata( 'gplus_token',$id_token );
     $this->ci->session->set_userdata( 'gplus_access_token',$access_token );       
     return  $token; 
 }

 public function getGplusUserInfo()
 {
   $userData = array();
   $objOAuthService = new Google_Service_Oauth2($this->client);
   if ($this->client->getAccessToken()) {
       $userData = $objOAuthService->userinfo->get();
       $this->ci->session->set_userdata( 'gplus_userdata',$userData );
   }
   return $userData;
 }
 public function logoutgplus(){   
    // $redirecturl = base_url().'login';    
    $this->ci->session->set_userdata('gplus_token','');
    $this->ci->session->set_userdata('gplus_access_token','');
   
  }

}
