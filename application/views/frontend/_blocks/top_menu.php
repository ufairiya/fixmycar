<style type="text/css">
.nav_color{
  background-color: white !important;
  color:black !important;
  border:none;
}
.navbar-default .navbar-nav > li > a{color: black !important;
text-transform: uppercase;
font-size: 16px !important;}
.navbar-right{margin-top: 10px !important;}
.navbar-default .navbar-nav > .open > a{
  background-color: white !important;
}
.dropdown-menu {

       min-width: 100% !important;
    text-align: center;}
    .dropdown-menu > li > a:hover{
      background-color: white !important;
    }

.navbar-toggle{margin-top: 20px !important;}

    /*.system_logo {float: left;}
    .header_menus {float: right;}
    .header_menu_list{width: 94%;margin: auto;}*/
</style>


<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/assets/front/css/ie-only.css">

<!-- <?php echo 'skjfljd'; print_r($_GET); ?> 
 <?php  echo '<pre>'; print_r($_SESSION); echo '</pre>';?>   Header aea--> 
 <!-- <?php session_start();?> -->
 <?php  
 $this->load->helper('common_helper');
 // echo '<pre>'; print_r($_SESSION); echo '</pre>';?>  
<style type="text/css">
    .full_width_menu_list{width: 100%;}
</style>
    <?php   
//$get_review = get_review_status_for_header();

// echo '<pre>';
// print_r($get_review);
// echo "</pre>";
    $orderurl ="#";
    $reviewurl ="#";
    $schedulingurl ="#";
     $yourcrewurl = "#";
     $style = 'display:block';
    if(isset($this->session->userdata['user_type'])){ 

                        if($this->session->userdata['user_type'] == 'garage'){
                            $user_id = $this->session->userdata['user_id'];
                          // $user_details =get_mover_details($user_id);

                            $stripe_accountid = get_mover_details($user_id)->stripe_accountid;
                            // $this->db->query("SELECT stripe_accountid from user_master where id_user_master ='".$user_id."'")->row()->stripe_accountid;
                          // print_r($stripe_accountid);
                            if($stripe_accountid=='')
                            {
                              $style = 'display:none';
                            }
                            else
                            {
                              $style = 'display:block';
                            }
                            
                            $orderurl = $base_url.'garage/orders';
                            $reviewurl = $base_url.'garage/review';
                            $schedulingurl = $base_url.'garage/scheduling';
                            $yourcrewurl =  $base_url.'home/your_crew';
                            if(!empty($get_review))
                          {
                            $reviews = 'reviews '.'<i class="fa fa-exclamation" style="color:red;"></i>';
                          }else{
                            $reviews = 'reviews';
                          }
                        }
                        
                        else if($this->session->userdata['user_type'] == 'customer'){
                            $orderurl = $base_url.'customer/orders';
                          //  $reviewurl = $base_url.'customer/reviewurl';
                            $reviewurl =$base_url.'customer/review';
                            $schedulingurl ="#";
                             $yourcrewurl = "#";
                             $reviews = 'reviews';
                        }
                        else if($this->session->userdata['user_type'] == 'superuser'){
                            $orderurl = $base_url.'home/order_details';
                            $reviews = 'reviews';
                          
                        }

                    }

                    else {  $orderurl ="#"; $reviewurl ="#";  $schedulingurl ="#";  $yourcrewurl = "#";} 

                        ?> 


   <!--  <div class="header-area">
        <div class="header-area-inner">
        <ul class="topnav">
            <div class="content nav ">
             
                <div class="nav-left header_menu_list"> -->
<nav class="navbar navbar-default nav_color">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
           </button>
                   <!-- <div class="logo system_logo"> -->

               <a href="<?php echo $base_url; ?>"> <img style="width: 57%;" src="<?php echo $base_url;?>assets/front/images/logo/logo.jpg" alt="LOGO"> </a>
             <!--       </div> -->
       </div>
                   <!-- <div class="header_menus"> -->
        <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">
               <li>
                   <?php if(isset($this->session->userdata['user_type'])  ){
                    if($this->session->userdata['user_type']!='garage'){
                      ?>
                      <a href="<?php echo $base_url; ?>" >Home</a>
                    <?php } }else{
                    ?>
                    <a href="<?php echo $base_url; ?>">Home</a>
                    <?php }?>
                 </li>

<!-- <li><a href="<?php echo $base_url; ?>home/FAQ">FAQ</li>  -->

                <?php if(isset($this->session->userdata['user_type'])){if($this->session->userdata['user_type']=='garage') { ?>

                    <!--   <li ><a href="<?php echo $base_url; ?>home/customer_support">Mover Support</a></li> -->
                   
                   <?php } 
                   else if($this->session->userdata['user_type']=='customer'){?>
                <!--  <li><a href="<?php echo $base_url; ?>home/customer_support">Customer Support</a>
                 </li> -->
                   <?php } } else{?>
                  <!--  <li><a href="<?php echo $base_url; ?>home/customer_support">Customer Support</a>
                 </li> -->
                 
                    
                      <?php  }if(isset($this->session->userdata['user_type'])) {
                      if($this->session->userdata['user_type']=='garage'){
                      echo '<li >
                        <a href="'.$schedulingurl.'" style="'.$style.'">Scheduling</a>
                      
                      </li> ';
                       } } ?>
                    
                     <?php if(isset($this->session->userdata['user_type'])){ echo '<li><a href="'.$orderurl.'">orders</a> </li>'; } ?>
                  
                    
                     <?php if(isset($this->session->userdata['user_type'])){
                        if($this->session->userdata['user_type']=='garage'){
                            echo '<li>
                     <a href="'.$yourcrewurl.'"  style="'.$style.'">My crew</a>
                     
                     </li>'; }} ?>
            
                         <?php if(isset($this->session->userdata['user_type'])){
                            if($this->session->userdata['user_type']=='garage'){
                                echo '<li>
                    <a href="'.$reviewurl.'"  style="'.$style.'">'.$reviews.'</a>
                   
                    </li>'; }} ?>

               <!--  </div> -->
               
               
              <!--   <div class="nav-right"> -->
                    <!-- <li><a href="#">giftcard</a></li> -->
                    
                   
                         <?php
                    //       if(isset($this->session->userdata['user_type'])){
                    //         if($this->session->userdata['user_type']!='garage'){
                    //             echo '<li>
                    // <a href='.$base_url.'home/contact_details>Contact Us</a> </li>';
                    //    }}

                       // else{ echo '<li><a href='. $base_url.'home/contact_details>Contact Us</a></li>';
                       //  }

                        ?>
                    
                   
                    
                <li>
                    

                    <?php  
                   
                    if(isset($this->session->userdata['user_type'])){ 

                        if($this->session->userdata['user_type'] == 'garage'){
                            $profile_url = $base_url.'garage/profile';
                        }


                         else if($this->session->userdata['user_type'] == 'customer'){
                            $profile_url = $base_url.'home/profile';
                        }
                        else{
                            // $profile_url = $base_url.'customer/profile';

                            $profile_url = '#';
                        }?> 
                         <li>
                      <?php if(isset($this->session->userdata['user_type'])){
                            if($this->session->userdata['user_type']=='garage' || $this->session->userdata['user_type']=='customer'){ ?>
                              <a href="<?php echo $profile_url; ?>"  style="">
                                  <!-- <i class="icon-user"></i> <?php echo $this->lang->line('my_account'); ?>   -->
                                  MY ACCOUNT </a>
                              <?php } if($this->session->userdata['user_type']=='superuser') { ?>
                              <a href="<?php echo $base_url; ?>dashboard">
                                  Dashboard  </a>


                               <?php } }?>
                    </li>  
                     <li>
                        <a href="<?php echo $base_url;?>login/logout">
                          <i class="icon-key"></i> <?php echo $this->lang->line('logout'); ?>  </a>
                      </li>
                        

                        
                             <li class="dropdown" style="display: none">
                             <?php 
                            
                             ?>
                                             <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <?php 

                                                $profile_image = getProfileImage();
                                                if( $profile_image != FALSE){?>
                                                 <img alt="" width="100" height="150" class="user_profile_stl img-circle" src="<?php echo $base_url.$profile_image;?>">
                                                <?php }else{ if(isset($this->session->userdata['user_type'])!='customer'){?>
                                                <img alt="" class="user_profile_stl img-circle" width="100" height="150" src="<?php echo $base_url;?>assets/images/profile_image.jpg">
                                                <?php }
                                                else{ ?>
                                                    <img alt="" class="user_profile_stl img-circle" width="100" height="150" src="<?php echo $base_url;?>assets/images/images.png">
                                                <?php }
 
                                                 }?>
                                                <span class="username username-hide-mobile"><?php echo $this->session->userdata('user_name');?> </span>
                                            </a> 
                                            
                                              <ul class="dropdown-menu" style="display: none">
                                                <li>
                                                 <?php if(isset($this->session->userdata['user_type'])){
                            if($this->session->userdata['user_type']=='garage' || $this->session->userdata['user_type']=='customer'){ ?>
                                                    <a href="<?php echo $profile_url; ?>"  style="">
                                                        <i class="icon-user"></i> <?php echo $this->lang->line('my_profile'); ?>  </a>
                                                    <?php } if($this->session->userdata['user_type']=='superuser') { ?>
                                                    <a href="<?php echo $base_url; ?>dashboard">
                                                        Dashboard  </a>


                                                     <?php } }?>
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
                        <?php }  else { ?>
                        <a href="#"  data-toggle="modal" data-target="#loginmodal" class="login_or_signup">login/signup</a>
                         <?php } ?>
                
                    </li>

                   

                        
                        

                     </ul>
                     </div>
                     </div>
                     </nav>
                   
                
                <!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.login_or_signup').click(function(){
            window.location.replace("<?php echo $base_url;?>");
            show('data-toggle');


        })
    })
</script> -->
<style>
/*
@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
    body {margin: 0;}

ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
   /* background-color: #333;*/
/* <script type="text/javascript">
       
     $(".change_font").on('click'. function() { 
      alert('good');

        // $('.change_font').css("font-size", "15px");

    });

   </script>}*/

/*ul.topnav li {float: left;}

ul.topnav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: #4CAF50;}

ul.topnav li.right {float: right;}
.content.nav li a {
    padding: 0px 16px;
    display: inline-block;
    font-size: 13px;
    vertical-align: top;
    color: black;
}
.user_profile_stl {
    margin-top: -13px;
}
.logo {
    margin-top: 10px;
}
}
*/
</style>



<!-- ====================================== -->



<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a   class="navbar-brand" href="<?php echo $base_url; ?>"> <img src="<?php echo $base_url;?>assets/front/images/Hiregarage-2.png" alt="LOGO"> </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
   -->

  