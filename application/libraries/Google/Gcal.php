<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( session_status() == PHP_SESSION_NONE ) {
  session_start();
}

// Autoload the required files
require_once( APPPATH . 'libraries/Google/vendor/autoload.php' );


class Gcal {
  var $ci;
  var $helper;
  var $session;
  var $permissions;
 
  

  public function __construct() {
    $this->ci =& get_instance();
    
    $this->redirect_uri = base_url().'sharedout/gccallback';   
    $this->config = array('client_id' => '',
    'client_secret' => '',
    'redirect_uri' => $this->redirect_uri,
    );
    
  
    $this->client = new Google_Client();
    $this->client->setAuthConfig($this->config);
    $this->client->setRedirectUri($this->redirect_uri);
    $this->client->addScope(Google_Service_Calendar::CALENDAR);
    
 }
 public function logingoogleurl()
 {     
    return $authUrl = $this->client->createAuthUrl();
 }
 public function getGcalToken($code)
 {
     $token = $this->client->fetchAccessTokenWithAuthCode($code);
     $this->ci->session->set_userdata( 'gplus_tokens',$token );
     $id_token = isset($token['id_token']) ? $token['id_token']  :$this->ci->session->userdata('gplus_token');
      $access_token = isset($token['access_token']) ? $token['access_token']  : $this->ci->session->userdata('gplus_access_token');
     $this->ci->session->set_userdata( 'gplus_token',$id_token );
     $this->ci->session->set_userdata( 'gplus_access_token',$access_token );       
     return  $token; 
 }

 public function getGplusUserInfo($token)
 {
  $this->client->setAccessToken($token);
  $service = new Google_Service_Calendar($this->client);
  $event = new Google_Service_Calendar_Event(array(
  'summary' => 'Google I/O 2017',
  'location' => '800 Howard St., San Francisco, CA 94103',
  'description' => 'Testing dates',
  'start' => array(
    'dateTime' => '2017-06-01T00:00:00-07:00',
    'timeZone' => 'Asia/Kolkata',
  ),
  'end' => array(
    'dateTime' => '2017-06-30T23:59:00-07:00',
    'timeZone' => 'Asia/Kolkata',
  ),
  'recurrence' => array(
    'RRULE:FREQ=DAILY;COUNT=3'
  ),
  'attendees' => array(
    array('email' => 'kesav@stallioni.com'),
    array('email' => 'stallionikesav@hotmail.com'),
  ),
  'visibility' =>'public',
  'reminders' => array(
    'useDefault' => FALSE,
    'overrides' => array(
      array('method' => 'email', 'minutes' => 24 * 60),
      array('method' => 'popup', 'minutes' => 10),
    ),
  ),
));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
// printf('Event created: %s', $event->htmlLink);
return $event->htmlLink;
 }
 public function logoutgplus(){   
    // $redirecturl = base_url().'login';    
    $this->ci->session->set_userdata('gplus_token','');
    $this->ci->session->set_userdata('gplus_access_token','');
   
  }

}