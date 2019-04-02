<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> <?php echo SITE_NAME;?> | Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content=" <?php echo SITE_NAME;?> " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
          <link href="<?php echo $base_url;?>assets/layouts/layout2/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo $base_url;?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $base_url;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo $base_url;?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <script type="application/javascript">
		var SITE_URL ="<?php echo $base_url?>";
        </script>
                 <script src="<?php echo $base_url;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
    <body class=" login" data-id="<?php echo $this->session->site_lang;?>">
	 <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo $base_url;?>">
            <!-- <img src="<?php echo $base_url;?>assets/front/images/Logo.svg" alt="LOGO"> -->
                <img src="<?php echo $base_url;?>assets/images/Logo.svg"  alt="logo" style="width:200px; " /> </a>
<!--
                 <div class="pull-right log lng_pt">
					<select onchange="javascript:window.location.href='<?php //echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;" class="form-control">
							<option value="english" <?php //if($this->session->userdata('site_lang') == 'english') //echo 'selected="selected"'; ?>>English</option>
							<option value="german" <?php //if($this->session->userdata('site_lang') == 'german') //echo 'selected="selected"'; ?>>German</option>   
						</select>
                  </div>
-->
        </div>
        <!-- END LOGO -->
