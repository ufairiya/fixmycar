<?php defined('BASEPATH') OR exit('No direct script access allowed');
global $aQuickNav;
$title = (isset($title) && $title !='') ? ' | '.$title  :FALSE;
$aQuickNav = (isset($quickView)) ? $quickView :  $aQuickNav;
$aQuickNav = FALSE;
$aPageTop = (isset($pageTop)) ? $pageTop : FALSE;
$btnName = (isset($pageTopName)) ? $pageTopName : 'New';
$aCreatePOTop = (isset($poTop)) ? $poTop : FALSE;
$aCreateNewPOTop = (isset($NewpoTop)) ? $NewpoTop : FALSE;
$aBack = (isset($pageBack)) ? $pageBack : FALSE;
?>

<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
 


      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title> WHO CAN FIX MY CAR</title>

      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="" name="description" />
      <meta content="" name="author" />

      <!-- bootstrap 4.0.0 bete2 css -->
      <!-- <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/css/bootstrap.min.css"> -->

       <link href="<?php echo BASE_URL; ?>/assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/font-awesome/css/font-awesome.css">
      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/flaticon/flaticon.css">
      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/css/lightcase.css">
      <!-- jquery ui css -->
      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/css/jquery-ui.min.css">
      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/css/reset.css">
      <link rel="icon" href="<?php echo $base_url;?>/Favi.png">


      <link href="<?php echo $base_url;?>assets/front/css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo $base_url;?>assets/front/css/responsive.css"> </head>

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0XVEtIQgXs8TX5rj0XCWloc1wqJGvDws&libraries=places&callback=initAutocomplete"></script> -->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

   
   <script type="application/javascript">
		var SITE_URL ="<?php echo $base_url?>";
        </script>
         <script src="<?php echo $base_url;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

          <link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
 
 <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-timepicker/jquery.timepicker.css" /> -->
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/apps/css/jquery.datetimepicker.min.css">

<!-- Bootstrap Date-Picker Plugin kalai-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>




    <style type="text/css">
      .po-drop-menu>li>a{
        padding: 8px 16px;
        color: #6f6f6f;
        text-decoration: none;
        display: block; 
        clear: both;
        font-weight: 300;
        line-height: 18px;
        white-space: nowrap;
      }
    .po-drop-menu>li>a:focus, .po-drop-menu>li>a:hover {
        text-decoration: none;
        color: #262626;
        background-color: #e1e5ec;
    }
    #top-header{
            background-color: #002e5b;
            padding: 10px 0;
            min-height: 55px;
    }
    label {    
         color: white;
     }
     .top-drop{
        padding-right: 10px;
        padding-left: 10px;
     }
     .row, .row-fluid {
       margin-bottom: 0px; 
     }
     .logo{
          width: 131px;
    margin-top: -7px;
     }

    </style>   
</head>
<body>
  