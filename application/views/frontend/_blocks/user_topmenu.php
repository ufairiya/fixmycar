    <!--   Header aea-->
 
<!-- <?php echo '<pre>'; print_r($_SESSION); echo '</pre>';?> -->
   
    <div class="header-area">
        <div class="header-area-inner">
            <div class="content nav">
                <div class="nav-left">
                    <li><a href="<?php echo $base_url; ?>home/about">about us</a></li>
                    <li><a href="#">booking page</a></li>
                    <li><a href="#">blog</a></li>
                </div>
                <div class="logo">
                    <a href="<?php echo $base_url; ?>"> <img src="<?php echo $base_url;?>assets/front/images/Logo.svg" alt="LOGO"> </a>
                </div>
            
                <div class="nav-right">
                    <li><a href="#">giftcard</a></li>
                    
                    <li><a href="<?php echo $base_url; ?>home/contact">contact</a></li>
            
                    <li> <ul class="nav navbar-nav pull-right">
                             <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <?php 
                                                $profile_image = getProfileImage();

                                                if( $profile_image != FALSE){?>
                                                 <img alt="" style="" class="user_profile_stl" src="<?php echo $base_url.$profile_image; ?>">
                                                <?php }else{ ?>
                                                <img alt="" class="user_profile_stl" src="<?php echo $base_url;?>assets/images/profile_image.jpg">
                                                <?php }?>
                                                <span class="username username-hide-mobile"><?php echo $this->session->userdata('user_name');?> </span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="<?php echo $base_url;?>home/user_profile">
                                                        <i class="icon-user"></i> <?php echo $this->lang->line('my_profile'); ?>  </a>
                                                </li>                                              
                                                <li class="divider"> </li>                                               
                                                <li>
                                                    <a href="<?php echo $base_url?>login/logout">
                                                        <i class="icon-key"></i> <?php echo $this->lang->line('logout'); ?>  </a>
                                                </li>
                                            </ul>
                                        </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        </ul></li>

                </div>
<!--  <?php 

if($this->session->userdata['user_type']=='movers'){

 $user_type = $this->session->userdata['user_type'];
 $username = $this->session->userdata['user_name'];

echo '<h3 style="text-align: center;font-weight: bold;">Welcome 123654 '.$user_type.' :'.$username.'</h3>';
  
}

if($this->session->userdata['user_type']=='user'){
 $user_type = $this->session->userdata['user_type'];
 $username = $this->session->userdata['user_name'];

echo '<h3 style="text-align: center;font-weight: bold;">Welcome123654  '.$user_type.' :'.$username.'</h3>';
  

}



 ?> -->

                <!-- 
                <?php if(($this->session->userdata['user_type']=='user') || ($this->session->userdata['user_type']=='movers')) {?>
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
                                                    <a href="<?php echo $base_url;?>profile">
                                                        <i class="icon-user"></i> <?php echo $this->lang->line('my_profile'); ?>  </a>
                                                </li>                                              
                                                <li class="divider"> </li>                                               
                                                <li>
                                                    <a href="<?php echo $base_url?>login/logout">
                                                        <i class="icon-key"></i> <?php echo $this->lang->line('logout'); ?>  </a>
                                                </li>
                                            </ul>
                                        </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- </ul>
                        
                      <?php }?>  -->
                        
    
                 
            </div>
        </div>
    </div>
