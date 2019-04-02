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
    <!-- BEGIN HEAD --><head>
        <meta charset="utf-8" />
        <title>WHO CAN FIX MY CAR </title>
         <?php //echo SITE_NAME.' '.$title.'  | Statistics';?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        
       <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo $base_url;?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo $base_url;?>assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo $base_url;?>assets/layouts/layout2/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
         <link href="<?php echo $base_url;?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url;?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        
         <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-3.2.0/css/docs.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-3.2.0/css/pygments-manni.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/elusive-icons-2.0.0/css/elusive-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/font-awesome-4.2.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/ionicons-1.5.2/css/ionicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/map-icons-2.1.0/css/map-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/material-design-1.1.1/css/material-design-iconic-font.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/octicons-2.1.2/css/octicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/typicons-2.0.6/css/typicons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/icon-fonts/weather-icons-1.2.0/css/weather-icons.min.css"/>
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
        <link rel="icon" href="<?php echo $base_url;?>/Favi.png ">
         <!-- Custom Css -->
        <link rel="stylesheet" href="<?php echo $base_url;?>assets/global/css/styles.css"/>
        
        
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
       <!-- END HEAD -->
       <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>


        <script type="application/javascript">
		var SITE_URL ="<?php echo $base_url?>";
        </script>
         <script src="<?php echo $base_url;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

      <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-fixed" data-id="<?php echo $this->session->site_lang;?>">
      <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                   <a href="<?php echo $base_url;?>" style=" width: 85%;">
                         <img src="<?php echo $base_url;?>assets/front/images/logo/logo_tranparent.png" alt="logo" class="logo-default" style="    width:100%; margin: 0px;">
                   </a> 
                   <div class="menu-toggler sidebar-toggler" style="    margin-top: 10px;"> 
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                   </div> 
          

                </div>
                <?php if($aCreatePOTop != FALSE){?> 
                <div class="page-actions">
                    <div class="btn-group">
                        <button type="button" class="btn btn-circle btn-outline red sblue dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-plus"></i>&nbsp;
                            <span class="hidden-sm hidden-xs">New Invoice&nbsp;</span>&nbsp;
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu ">
                        <div class="po-drop-menu dropdown-menu-list scroller" style="height: 250px;  overflow: hidden;width: auto;overflow-y: scroll;" data-handle-color="#637283">
                         <?php if(count($aCreatePOTop) > 0){
                           // for($i=0;$i<=50;$i++){
                             foreach ($aCreatePOTop as $pokey => $cname) {
                                $createPoLink = BASE_URL.'/purchase_order/create/'.$pokey;
                         ?>
                          <li>
                                <a href="<?php echo $createPoLink;?>">
                                     <?php echo $cname;?> </a>
                            </li>
                         <?php } 
                         //}
                         }?>                         
                            
                          </div> 
                        </ul>
                    </div>

                </div>

               <?php }?>
               <?php if($aCreateNewPOTop != FALSE){?> 
                <div class="page-actions">
                    <div class="btn-group">
                        <a href="<?php echo BASE_URL.'/invoice/create';?>" class="btn btn-circle btn-outline red sblue " >
                            <i class="fa fa-plus"></i>&nbsp;
                            <span class="hidden-sm hidden-xs">New Invoice&nbsp;</span>&nbsp;
                           
                        </a>
                      
                    </div>

                </div>

               <?php }?>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
            
                <div class="page-top">
					<?php if($aPageTop != FALSE){
                        setPageTop($aPageTop,$btnName);
                     }?>
                     <?php if($aBack != FALSE){
                        $backName = isset($aBack['label']) ? $aBack['label']  :'Back';
                        $backLink = isset($aBack['link']) ? $aBack['link']  :'#';
                        ?>
                        <div class="page-actions">
                            <div class="btn-group">
                                <a href="<?php echo $backLink;?>" class="btn btn-circle btn-outline red sblue " >
                                   
                                    <span class="hidden-sm hidden-xs"><?php echo $backName;?>&nbsp;</span>&nbsp;
                                   
                                </a>
                              
                            </div>

                </div>
                        <?php
                     }?>
                    <div class="top-menu">
						
						 <div class="pull-left lng_pt">
					<!-- <select onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;" class="form-control">
							
							<option value="german" <?php if($this->session->userdata('site_lang') == 'german') echo 'selected="selected"'; ?>>German</option>   
							<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
						</select> -->
                  </div>
						
                        <ul class="nav navbar-nav pull-right">
                             <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            	<?php 
												$profile_image = getProfileImage();
												if( $profile_image != FALSE){?>
                                                 <img alt="" class="img-circle" src="<?php echo $base_url.$profile_image;?>">
                                                <?php }else{ ?>
                                                <img alt="" class="img-circle" src="<?php echo $base_url;?>assets/images/profile_image.jpg">
                                                <?php }?>
                                                <span class="username username-hide-mobile"><?php echo $this->session->userdata('user_name');?> </span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="<?php echo $base_url;?>login/admin_profile_password">
                                                        <i class="icon-user"></i> <?php echo $this->lang->line('my_profile'); ?>  </a>
                                                </li>                                              
                                                <li class="divider"> </li>                                               
                                                <li>
                                                    <a href="<?php echo $base_url;?>login/logout">
                                                        <i class="icon-key"></i> <?php echo $this->lang->line('logout'); ?>  </a>
                                                </li>
                                            </ul>
                                        </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        </ul>
                        
                      
                        
                  



                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <div class="clearfix"> </div>
        <?php if($aQuickNav !=FALSE){?> 
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
              <?php foreach ($aQuickNav as $key => $value) {
                $link = $value['href'];
                $icons = $value['icon'];
               ?>
               <li>
                    <a href="<?php echo $link;?>" target="" class="active">
                        <span><?php echo $key;?></span>
                        <i class="<?php echo $icons;?>"></i>
                    </a>
                </li>
               <?php
              } 
              ?>
               
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
        <?php } ?>
       <div class="page-container">
