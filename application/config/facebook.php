<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Facebook Settings
|--------------------------------------------------------------------------
|
| If set to TRUE, facebook login is diplayed and set the facebook App ID ,App Secret
|
*/
defined('FACEBOOKLOGIN')          OR define('FACEBOOKLOGIN',TRUE);
defined('FACEBOOKENV')            OR define('FACEBOOKENV','live');
$app_id = (FACEBOOKENV == 'local') ? '2659285397477861'  :'2659285397477861';
$app_secret = (FACEBOOKENV == 'local') ? 'd7c500fe7359fad1d08b453f17a4534b'  :'d7c500fe7359fad1d08b453f17a4534b';
$app_page_id = (FACEBOOKENV == 'local') ? '2659285397477861'  :'2659285397477861';
$config = array(
	'facebook' => array(
				  'app_id' =>$app_id,
				  'app_secret' =>$app_secret,
				  'app_page_id' =>$app_page_id
				 )
);
