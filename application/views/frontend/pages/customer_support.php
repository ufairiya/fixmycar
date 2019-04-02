<style type="text/css">
.nav_color{
  background-color: white !important;
  color:black !important;
  border:none;
} 
.navbar-default .navbar-nav > li > a{color: black !important;
text-transform: uppercase;
font-size: 15px !important;}
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

}
</style>

<div class="row"> 
                <div class="col-md-12">
                    <!-- <div class="col-md-3"></div> -->
                    <div class="col-md-2">
                    </div>
                    
                    <!-- <div class="col-md-2">
                        <div class="movers_menu <?php echo ($current_submenu == 'issue_resolution')?'active':'' ?>">
                            <a href="<?php echo $base_url; ?>home/issue_resolution">Issue Resolution</a>
                        </div>
                    </div> -->
                    <div class="col-md-2">
                        <div class="movers_menu <?php echo ($current_submenu == 'faq_details')?'active':'' ?>">
                        <?php if(isset($this->session->userdata['user_type'])  ){
                    if($this->session->userdata['user_type']=='movers'){
                      ?>

                      <a href="<?php echo $base_url; ?>movers/FAQ_without_login">FAQ</a>
                    <?php } else{ ?>
                    <a href="<?php echo $base_url; ?>home/customer_support">FAQ</a>
                    <?php 

                    }}else{
                    ?>
                    <a href="<?php echo $base_url; ?>home/customer_support">FAQ</a>
                    <?php }?>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="movers_menu <?php echo ($current_submenu == 'terms_conditions')?'active':'' ?>">
                        <!-- <?php echo $base_url; ?>home/terms_conditions -->
                            <a href="<?php echo $base_url;?>home/term_and_condition"> Terms & Condition</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="movers_menu <?php echo ($current_submenu == 'privacy_notice')?'active':'' ?>">
                        <!-- <?php echo $base_url; ?>home/privacy_notice -->
                            <a href="<?php echo $base_url;?>home/privacy_policy"> Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="movers_menu <?php echo ($current_submenu == 'contact_us')?'active':'' ?>">
                            <a href="<?php echo $base_url; ?>home/contact_us"> Contact us</a>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                    </div>

                    <!-- <div class="col-md-3"></div> -->
                </div>
                <div style="clear:both;"></div><br>
        <!--        <hr> -->
                <div class="col-md-12" style="padding: 0px;">
                    <?php echo $pagename; ?>
                </div>
            </div>