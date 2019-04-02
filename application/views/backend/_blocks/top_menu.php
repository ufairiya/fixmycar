 <?php   $submenu = isset($submenu)  ? $submenu : FALSE;
  ?>
 <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item  <?php echo ($current_menu == "dashboard") ? "active open" : ""; ?>">
                            <a href="<?php echo $base_url?>dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title"><?php echo $this->lang->line('dashboard'); ?>  </span>
                                <span class="selected"></span>                               
                            </a>                    
                        </li>

                        <?php 

                        $user_type = $this->session->userdata['user_type'];
                        ?>

                        <?php 

                             if($user_type =='superuser') { ?>
                                  <li class="nav-item  <?php echo ($current_menu == "pages") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>admin/pages" class="nav-link nav-toggle">
                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Pages'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>
                             <li class="nav-item  <?php echo ($current_menu == "faqs") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>admin/pages/faqs" class="nav-link nav-toggle">
                                    <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'FAQs'; ?>  </span><span class="arrow"></span>
                                    <span class="selected"></span>                               
                                </a>    
                                <ul class="add_level sub-menu">

                                    <li aria-haspopup="true" class="nav-item start <?php echo ($current_menu == "faqs" && $submenu == "faqscategory" ) ? "active open" : ""; ?>">
                                       <a href="<?php echo $base_url?>admin/pages/faqscategory" class="nav-link  ">
                                           <i class="fa fa-tags"></i> FAQ Type
                                      </a>
                                    </li>
                                    <li aria-haspopup="true" class="nav-item start <?php echo ($current_menu == "faqs" && $submenu == "faqs" ) ? "active open" : ""; ?>">
                                       <a href="<?php echo $base_url?>admin/pages/faqs" class="nav-link  ">
                                           <i class="fa fa-tasks"></i> FAQ Pages
                                      </a>
                                    </li>
                                </ul>                
                            </li>
     
                            <li class="nav-item  <?php echo ($current_menu == "garage") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>admin/garage/" class="nav-link nav-toggle">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Garages'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>
                            <li class="nav-item  <?php echo ($current_menu == "customer") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>admin/customer" class="nav-link nav-toggle">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Customer'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>
                             <li class="nav-item start<?php echo ($current_menu == "settings") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>admin/settings" class="nav-link nav-toggle">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Settings'; ?>  </span>
                                  <span class="selected"></span>   <span class="arrow"></span>                             
                                </a>    

                                <ul class="add_level sub-menu">
                                                        
                                                        <li aria-haspopup="true" class="nav-item start <?php echo ($current_menu == "settings" && $submenu == "settings" ) ? "active open" : ""; ?>">
                                                            <a href="<?php echo $base_url?>admin/settings" class="nav-link  ">
                                                                <i class="fa fa-cog"></i>  System Settings
                                                            </a>
                                                        </li>
                                                      <!--   <li aria-haspopup="true" class="nav-item start <?php echo ($current_menu == "user" && $submenu == "list_user_level" ) ? "active open" : ""; ?>">
                                                            <a href="<?php echo $base_url?>user/user_level" class="nav-link  ">
                                                                <i class="icon-settings"></i> <?php echo $this->lang->line('list user level'); ?>
                                                            </a>
                                                        </li> -->
                                                    </ul>                                        
                            </li>
                           <li class="nav-item  <?php echo ($current_menu == "mailsetting") ? "active open" : ""; ?>">
                                        <a href="<?php echo $base_url?>admin/mailsetting" class="nav-link nav-toggle">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span class="title"><?php echo 'Mail Setting'; ?>  </span>
                                            <span class="selected"></span>                               
                                        </a> 
                              </li>
                               
 
                            <li  style="display: none;" class="nav-item  <?php echo ($current_menu == "orders") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>home/order_details" class="nav-link nav-toggle">
                                    <i class=""></i>
                                    <span class="title"><?php echo 'Orders'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>

                        <?php   }  ?>

                        <?php 

                        if($user_type =='garage')
                        {
                            ?>

                            <li class="nav-item  <?php echo ($current_menu == "garage_profile") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>garage/garage_details" class="nav-link nav-toggle">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Profile'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>

                            <li class="nav-item  <?php echo ($current_menu == "garage_quotes") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>garage/garage_details" class="nav-link nav-toggle">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Quotes'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>
                               <li class="nav-item  <?php echo ($current_menu == "garage_quotes") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>garage/garage_details" class="nav-link nav-toggle">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Bookings/Appointments'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>    
                              <li class="nav-item  <?php echo ($current_menu == "garage_quotes") ? "active open" : ""; ?>">
                                <a href="<?php echo $base_url?>garage/garage_details" class="nav-link nav-toggle">
                                    <i class="fa fa-commenting" aria-hidden="true"></i>
                                    <span class="title"><?php echo 'Feedbacks'; ?>  </span>
                                    <span class="selected"></span>                               
                                </a>                    
                            </li>      
                            <?php 

                        }
                        ?>
                        
                                                
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
