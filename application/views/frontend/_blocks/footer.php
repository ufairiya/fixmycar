<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<?php 

$config['Client_ID']       = '81ocqy5kg5rxdi';
$config['Client_Secret']    = '6OGFWdzNR9tiiLFr';
$config['callback_url']  = 'http://stallioni.in/fixmycar/login/linlogin/';

?>
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
         
            <div class="modal-body">
                <div class="row">
                        <div  class="login_forms">
                            <div class="logo_display">
                               <img src="<?php echo $base_url; ?>assets/front/images/logo/logo.jpg" class="">
                           </div>
                        <br>
                        <form role="form"  name ="login_now_form"  id ="login_now_form" class="form-horizontal" method="POST">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email_id" class="form-control" id="email1" placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirm_password1" class="form-control" id="exampleInputPassword1" placeholder="Password" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                        
                                            <button type="submit"  name="login_now" class="btn btn_login btn-sm" value='1'>
                                               <i class="fa fa-address-card" aria-hidden="true"></i>  Login</button>
                                               <br/><br/>
                                            <a href="JavaScript:Void(0)" class="createaccount1" data-toggle="modal" data-target="#createaccount1"> Register</a> or 
                                             <a href="<?php echo BASE_URL?>/login/forgotpassword_details" class="forgot_id" data-toggle="modal" data-target="#forgot_password">Forgot password?</span></a>
                                              <br/><br/>
                                            <button class="btn btn-block btn-social btn-facebook" type="button"  onclick="javascript:location.href='<?php echo $fbloginurl;?>'"><!-- <i class="fa fa-facebook" aria-hidden="true"></i> --> Sign in with Facebook  </button>
                                         <button class="btn btn-block btn-social btn-google" type="button" onclick="javascript:location.href='<?php echo $gplusloginurl;?>'"><span> Sign in with Google</span>
                                        </button>  
                                              <!-- <button class="btn btn-block btn-insta login-insta" type="button"> 
                                    <?php echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress"><i class="fa fa-linkedin btn-icon"></i><span> Login Linkedin</span></a>'; ?>
                                    </button>  -->
                                            
                                        </div>
                                  
                                </div>
                                </form>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
  <div class="modal fade" id="createaccount1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
          
            <div class="modal-body">
                <div class="row">
                    <div class="logo_display">
                                <img src="<?php echo $base_url; ?>assets/front/images/logo/logo.jpg" class="">
                            </div>
                        <br>
 
                    <div class="col-md-6"> 
                    	<a href="JavaScript:Void(0)" class="createaccount" data-toggle="modal" data-target="#createaccountcustomer"><div class="common-Link card-customers">
                         <div class="modal-header"><h4>Customer <i class='fas fa-arrow-right' style='font-size:14px'></i></h4></div>
                         <div class="content1" style="margin:10px">
                            <?php echo htmlspecialchars_decode($register_customer); 
                             ?> </div>
                         <div class="button"> <a href="JavaScript:Void(0)"  class="createaccount" data-toggle="modal" data-target="#createaccountcustomer"> Register as Customer <i class='fas fa-arrow-right' style='font-size:14px'></i></a>
                         </div>
                     </div></a>

                    </div>
                      <div class="col-md-6"> 
                      	 <a href="JavaScript:Void(0)" class="createaccount" data-toggle="modal" data-target="#createaccountgarage"><div class="common-Link card-customers">
                         <div class="modal-header"><h4>Garages <i class='fas fa-arrow-right' style='font-size:14px'></i></h4></div>
                         <div class="content1" style="margin:10px">
                            <?php echo htmlspecialchars_decode($register_garage); 
                             ?> </div>
                         <div class="button"><a href="JavaScript:Void(0)" class="createaccount" data-toggle="modal" data-target="#createaccountgarage"> Register as Garages <i class='fas fa-arrow-right' style='font-size:14px'></i></a>
                         </div>
                         </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  <div class="modal fade" id="createaccountcustomer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
         
            <div class="modal-body">
                <div class="row">

                        <div  class="registartion_forms">

                            <div class="logo_display">

                               <img src="<?php echo $base_url; ?>assets/front/images/logo/logo.jpg" class="">

                           </div>
                        <br>
                         <form role="form"   autocomplete="off" method="post" enctype="multipart/form-data" name="registeration" id="registeration" action="#" class="form-horizontal">
                                <div id="signup_customer_message"></div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Name &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6 name_stl_filter">
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                                            </div>
                                            <div class="col-md-6 lastname_stl_filter">
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                                                <input type="hidden" name="user_type" value="customer" class="form-control" placeholder="Last Name" />
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="textarea" class="col-sm-4 control-label">
                                        Address &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="address" class="address" id="address" placeholder="Enter your address"  autocomplete="off" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Email &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email_id" class="form-control" id="email" placeholder="Email" />
                                    </div>
                                </div>

                              <!--   <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        User Type &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="user_type">
                                            <option value="">Select user type</option>
                                            <option value="customer">Customer</option>
                                            <option value="garage">Garage</option>
                                        </select>
                                      
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="mobile" class="col-sm-4 control-label">
                                        Mobile &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile_no" class="form-control" id="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Password &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Confirm Password &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="confirm_password1" class="form-control" id="confirm_password1" placeholder="Confirm Password" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Profile image &nbsp;<!-- <span class="required_star">*</span> --></label>
                                    <div class="col-sm-8">
                                        <input type="file" name="Profile_image" class="profile_image" >
                                        <img id="profile_preview"  style="display: none;" src="#" alt="your image" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn_signup btn-sm">
                                             Sign up</button>
                                        <a style="display: none;" href="<?php echo $base_url;?>home/movers_register">click here to <span style="color: #3acbcc;text-decoration:underline;">movers</span> signup</a>
                                    </div>
                               </div>
                    
                         </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <div class="modal fade" id="createaccountgarage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
         
            <div class="modal-body">
                <div class="row">

                        <div  class="registartion_forms">

                            <div class="logo_display">

                               <img src="<?php echo $base_url; ?>assets/front/images/logo/logo.jpg" class="">

                           </div>
                        <br>
                         <form role="form"   autocomplete="off" method="post" enctype="multipart/form-data" name="registerationgarage" id="registerationgarage" action="#" class="form-horizontal">
                                <div id="signup_customer_message"></div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Name &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-6 name_stl_filter">
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                                            </div>
                                            <div class="col-md-6 lastname_stl_filter">
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                                                <input type="hidden" name="user_type" value="garage" class="form-control"/>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="textarea" class="col-sm-4 control-label">
                                        Address &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="address" class="address" id="address" placeholder="Enter your address"  autocomplete="off" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">
                                        Email &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email_id" class="form-control" id="email" placeholder="Email" />
                                    </div>
                                </div>

                              <!--   <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        User Type &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-9">

                                        <select class="form-control" name="user_type">
                                            <option value="">Select user type</option>
                                            <option value="customer">Customer</option>
                                            <option value="garage">Garage</option>
                                        </select>
                                      
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="mobile" class="col-sm-4 control-label">
                                        Mobile &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobile_no" class="form-control" id="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Password &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Confirm Password &nbsp;<span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="confirm_password1" class="form-control" id="confirm_password1" placeholder="Confirm Password" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">
                                        Profile image &nbsp; <span class="required_star">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="file" required name="Profile_image" class="profile_image" >
                                        <img id="profile_preview"  style="display: none;" src="#" alt="your image" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn_signup btn-sm">
                                             Sign up</button>
                                        <a style="display: none;" href="<?php echo $base_url;?>home/movers_register">click here to <span style="color: #3acbcc;text-decoration:underline;">movers</span> signup</a>
                                    </div>
                               </div>
                    
                         </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="forgot_password" 
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
           

        </div>
    </div>
</div>

    <!-- Modal -->
<div id="blocked_user_content" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><strong>Login Deactivated</strong></h5>
      </div>
      <div class="modal-body">
        <p>Your account has been deactivated and is NOT visible to customers until further notice. Please contact us immediately to resolve this issue if you have not already.</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo $base_url;?>"><button type="button" class="btn btn-default understand_btn" >I Understand</button></a>
      </div>
    </div>

  </div>
</div>

<div id="blocked_customer_content" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title"><strong>Login Deactivated</strong></h5>
      </div>
      <div class="modal-body">
        <p>Your account has been deactivated by the Admin, if you do not know why and would like to address your concerns please use our Contact Us form.</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo $base_url;?>home/contact_us"><button type="button" class="btn btn-default understand_btn" >I Understand</button></a>
      </div>
    </div>

  </div>
</div>

    <!-- footer area -->
    <footer class="footer-area section-padding footer_stl_option">
        <div class="footer-top footer_top_stl">
            <div class="content">
                <div class="row">
                    
                    <div class="col-md-1 col-xs-1 text-sm-left text-center">
                        <!-- <div class="footer-logo pb-2">
                            <a href=""><img src="<?php echo $base_url;?>assets/front/images/HireMovers-2.jpg" alt=""> </a>
                        </div> -->
                    </div>

                    <div class="col-md-8 col-xs-7 footer_menus">
                    <ul>
                        <li class="desktop_view"><a href="<?php echo $base_url;?>home/movers_register">Movers Sign Up</a></li>
                        <li> <a href="<?php echo $base_url;?>home/term_and_condition">Terms & Condition</a></li>
                        <li> <a href="<?php echo $base_url;?>home/privacy_policy">Privacy Policy</a></li>
                        <li> <a href="<?php echo $base_url;?>home/customer_support">FAQ</a></li>
                        <li> <a href="<?php echo $base_url; ?>home/contact_us">Contact Us</a></li>
                        
                       
                    </ul>
                    </div>
                    <div class="col-md-3 col-xs-3 social_icon_menu">
                        <div class="social-icon text-sm-right text-center pb-2">
                            <a href="https://www.facebook.com/"><img src="<?php echo $base_url;?>assets/front/images/fb.png" alt="Facebook"></a>
                            <a href="https://twitter.com"><img src="<?php echo $base_url;?>assets/front/images/twitter.png" alt="Twitter"></a>
                            <a href="https://www.instagram.com"><img src="<?php echo $base_url;?>assets/front/images/instagram.png" alt="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <div class="footer-bottom">
            <div class="content">
                <div class="row align-items-end">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="copyright">© All rights reserved WhoCanFixMyCar</p>
                    </div>
                    <!-- <div class="col-xl-3 col-lg-3 col-md-5 col-sm-4">
                        <p class="ftr-btns"> <a href="#" class="btn">SIGN IN</a> <a href="#" class="btn">BOOK Movers</a> </p>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>



<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/moment.min.js" type="text/javascript"></script>



        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo BASE_URL; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>

        <script src="<?php echo BASE_URL; ?>/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>

        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-timepicker/jquery.timepicker.js"></script>
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/Datepair/dist/datepair.js"></script>

      
        <script src="<?php echo BASE_URL; ?>/assets/global/plugins/jquery-locationpicker/dist/locationpicker.jquery.min.js"></script>



    <script>
        $(function () {
            // bedrooms slide range
            $("#berooms-range").slider({
                value: 3
                , min: 1
                , max: 10
                , slide: function (event, ui) {
                    var bedroom = $("#bed-no").val(ui.value);
                }
            });
            $("#bed-no").val($("#berooms-range").slider("value"));
            // bathromm slide range
            $("#bathrooms-range").slider({
                value: 1
                , min: 1
                , max: 10
                , slide: function (event, ui) {
                    $("#bath-no").val(ui.value);
                }
            });
            $("#bath-no").val($("#bathrooms-range").slider("value"));
        });


jQuery(document).ready(function(){
    $("#registerationgarage").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email_id: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
            },
            user_type:{
                required: true
            },
            password2: {
                required: true,
                minlength: 5,
            },
            confirm_password1: {
                required: true,
                minlength: 5,
                equalTo : "#password2"
            },
            Profile_image: {
                required:true
            }
        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email_id: "Please enter your Email ID",
          mobile_no: "Please enter your Mobile Number",
          address:"Please enter your address",
          user_type:"Please select user type",
          state:"select state",
          country:"select country",
          password2: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
          },
          confirm_password1: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to password"
          },
           Profile_image: { required:"Please upload profile image"}
        },
        highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('registerationgarage')[0]);

             var formData = new FormData($('#registerationgarage')[0]);
           //  alert(formData);
            $.ajax({
                url: "<?php echo $base_url; ?>register/usersgarage", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    console.log(data);
                    if(data['success_status'] =='1')
                    {
                        toastr.warning("Registered Successfully.You can login now.", "Notifications");
                        $.ajax({
                            url: "<?php echo BASE_URL; ?>/login/processlogin", 
                            type: "POST",             
                            data: formData,
                            contentType : false,
                            cache: false,
                            processData : false,
                            dataType:'json',    
                            success: function(data) {   
                                if(data ==0)
                                {
                                   
                                    toastr.warning("Admin has not approved your account to login yet", "Notifications");
                                    setTimeout(function(){ location.reload(); }, 3000); 
                                }

                                  if(data ==1)
                                {
                                   
                                    toastr.warning("Invalid email address or password", "Notifications");
                                    // setTimeout(function(){ location.reload(); }, 500); 
                                }

                                if(data ==2) 
                                    {
                                    location.href = "<?php echo $base_url;?>garage/profile";
                                 }

                                  if(data ==3) 
                                    {
                                    location.href = "<?php echo $base_url;?>home/profile";
                                 }

                                 
                                  if(data ==4) 
                                    {
                                    location.href = "<?php echo $base_url;?>/home/order_details";
                                 }


                            }
                        });
                        
                     // window.location.href = "<?php echo $base_url;?>";
                     //  },2500)
                    }
                    else{
                        toastr.warning("Email address already exists", "Notifications");
                    }
                }
            });
            return false;
        }
     });

     $("#registeration").validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email_id: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
            },
            user_type:{
                required: true
            },
            password1: {
                required: true,
                minlength: 5,
            },
            confirm_password1: {
                required: true,
                minlength: 5,
                equalTo : "#password1"
            },
            // Profile_image: {
            //     required:true
            // }
        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email_id: "Please enter your Email ID",
          mobile_no: "Please enter your Mobile Number",
          address:"Please enter your address",
          user_type:"Please select user type",
          state:"select state",
          country:"select country",
          password1: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
          },
          confirm_password1: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to password"
          },
         // Profile_image: { required:"Please upload profile image"}
        },
        highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('registeration')[0]);

             var formData = new FormData($('#registeration')[0]);
             //alert(formData);
            $.ajax({
                url: "<?php echo $base_url; ?>register/users", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    //alert(data);
                    
                    if(data['success_status'] =='1')
                    {
                        toastr.warning("Registered Successfully.You can login now.", "Notifications");
                        $.ajax({
                            url: "<?php echo BASE_URL; ?>/login/processlogin", 
                            type: "POST",             
                            data: formData,
                            contentType : false,
                            cache: false,
                            processData : false,
                            dataType:'json',    
                            success: function(data) {   
                                if(data ==0)
                                {
                                   
                                    toastr.warning("Admin has not approved your account to login yet", "Notifications");
                                    setTimeout(function(){ location.reload(); }, 3000); 
                                }

                                  if(data ==1)
                                {
                                   
                                    toastr.warning("Invalid email address or password", "Notifications");
                                    // setTimeout(function(){ location.reload(); }, 500); 
                                }

                                if(data ==2) 
                                    {
                                    location.href = "<?php echo $base_url;?>garage/profile";
                                 }

                                  if(data ==3) 
                                    {
                                    location.href = "<?php echo $base_url;?>home/profile";
                                 }

                                 
                                  if(data ==4) 
                                    {
                                    location.href = "<?php echo $base_url;?>/home/order_details";
                                 }


                            }
                        });
                        
                     // window.location.href = "<?php echo $base_url;?>";
                     //  },2500)
                    }
                    else{
                        toastr.warning("Email address already exists", "Notifications");
                    }
                }
            });
            return false;
        }
     });
})
    </script>
    <!-- plugins js -->
    <script src="<?php echo $base_url;?>assets/front/js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/lightcase.js"></script>
     <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/main.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/custom.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.full.min.js"></script>
      <script type="text/javascript">

            function PreviewImage() {
                $('.preview_select_id_file').css('display','block');
                pdffile=document.getElementById("uploadPDF").files[0];
                pdffile_url=URL.createObjectURL(pdffile);

                $('#viewer').attr('src',pdffile_url);
       
            }




/******** displaying profile image preview  ****/

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {

     $('#profile_preview').css("display","block");
      $('#profile_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".profile_image ").change(function() {
  readURL(this);
});

 jQuery("#login_now_form").validate({


   highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
  submitHandler: function(form) {


         var formData = new FormData(document.getElementsByName('login_now_form')[0]);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/login/processlogin", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {   

                console.log(data);                
                    if(data ==0)
                    {
                       
                        toastr.warning("Admin has not approved your account to login yet", "Notifications");
                        setTimeout(function(){ location.reload(); }, 3000); 
                    }

                      if(data ==1)
                    {
                       
                        toastr.warning("Invalid email address or password", "Notifications");
                    }

                    if(data ==2) // garage
                    {
                        location.href = "<?php echo $base_url;?>garage/profile";
                     }

                    if(data ==3)  //customer
                    {
                        location.href = "<?php echo $base_url;?>home/profile";
                     }

                     
                    if(data ==4)  //admin
                    {
                        location.href = "<?php echo $base_url;?>dashboard";
                     }
                     if(data == 5)
                     {
                        $("#blocked_user_content").modal('show');
                     }
                     if(data == 6)
                     {
                       $('#blocked_customer_content').modal('show');
                     }
                }
            });
            return false;
  }
      

     });


         
        </script>

    <script type="text/javascript">
   function initialize() {
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.setComponentRestrictions(
            {'country': ['us','in']});
      
   }
   google.maps.event.addDomListener(window, 'load', initialize);

</script>       
</body>
</html>





