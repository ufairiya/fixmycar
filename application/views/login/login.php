<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- BEGIN LOGIN ss-->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
			<?php $attributes = array('autocomplete' => 'off', 'name' => 'login-form',"class"=>'login-form',"id"=>'login_form',"novalidate"=>"novalidate");
            echo form_open('login/processlogin', $attributes);
            echo getFlashMsg(); ?>
    
                <h3 class="form-title"><?php echo $this->lang->line('login ac'); ?></h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo $this->lang->line('enter_any_username_password'); ?>. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('username'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="<?php echo $this->lang->line('username'); ?>" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9"><?php echo $this->lang->line('password'); ?></label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="<?php echo $this->lang->line('password'); ?>" name="password" /> </div>
                </div>
                <div class="form-actions">
                   <!--  <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> <?php echo $this->lang->line('rememberme'); ?>
                        <span></span>
                    </label> -->
                    <input type="submit" class="btn green pull-right" name="login_now" id="login_now" value="<?php echo $this->lang->line('LOGIN');?>" /> 
                </div>                
                <div class="register">
                    <h4>Don't have an account</h4>
                    <p> Please 
                        <a href="javascript:;" id="register"> Register here </a></p>
                </div>
                <div class="forget-password">
                    <h4><?php echo $this->lang->line('forgot'); ?> ?</h4>
                    <p> Click  
                        <a href="javascript:;" id="forget-password"> here </a>to reset your password </p>
                </div>
          
           <?php echo form_close(); ?>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="register-form" id="register_form" method="post">
                <h3>Registration Form</h3>
                <p> Please enter your e-mail address below to reset your password.</p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="First Name" id="rf_fstname" name="rf_fstname" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Last Name" id="rf_lstname" name="rf_lstname" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" id="rf_username" name="rf_username" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" id="rf_emailid" name="rf_emailid" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="rf_password" name="rf_password" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" id="rf_confirmpwd" name="rf_confirmpwd" /> 
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn1" class="btn red btn-outline">Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN Register FORM -->
            <form class="forget-form" id="forget_password" method="post">
                <h3>Forgot Password ?</h3>
                <p> Please enter your e-mail address below to reset your password.</p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" id="useremail" name="useremail" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>

            </form> 
           <?php  $config['Client_ID']       = '81ocqy5kg5rxdi';
        $config['Client_Secret']    = '6OGFWdzNR9tiiLFr';
        $config['callback_url']  = 'http://stallioni.in/fixmycar/login/linlogin/';?>
          <button class="btn btn-block btn-insta login-insta" type="button"> 
                                   <?php echo '<a href="https://www.linkedin.com/uas/oauth2/authorization?response_type=code&client_id='.$config['Client_ID'].'&redirect_uri='.$config['callback_url'].'&state=98765EeFWf45A53sdfKef4233&scope=r_basicprofile r_emailaddress"><i class="fa fa-linkedin btn-icon"></i><span> Login Linkedin</span></a>'; ?>
                                        </button> 
            <!-- END Register FORM -->
       
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> <?php echo date('Y');?> &copy; <?php echo SITE_NAME;?>  </div>
        
        
  <script type="application/javascript">
jQuery(document).ready(function(e) {
       var form1 = $('#forget_password');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
 
				 'useremail': {
                    required: 'Please enter the e-mail',
					email: 'Please Enter valid email',
					remote : "Enter Email ID is not valid"
					
                },
            },
            rules: {
             	useremail: {
                    required: true,
					email:true,
					remote: {
					url: "<?php echo $base_url?>forgot/unquie_email",
					type: "post",
					data: {
						type:'email',
						useremail: function() {
							return $( "#useremail" ).val();
							}
						}
					}
					
                },
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
				jQuery.ajax({
					url : '<?php echo $base_url?>forgot/process_forgot',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
							window.location.href = '<?php echo $base_url?>login';	
					}
				});
            }
        });

               var form2 = $('#register_form');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
 
                 'rf_emailid': {
                    required: 'Please enter the e-mail',
                    email: 'Please Enter valid email',
                    remote : "Enter Email ID is already exit"
                    
                },
                'rf_username': {
                    required: 'Please enter the username',
                    remote : "Enter Username is already exit"
                    
                },
                 rf_fstname: {
                    required: "Please enter the firstname",
                },
                 rf_lstname: {
                    required: "Please enter the lastname",
                },
                 rf_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                rf_confirmpwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            },
            rules: {
                rf_emailid: {
                    required: true,
                    email:true,
                    remote: {
                    url: "<?php echo $base_url?>login/check_emailid",
                    type: "post",
                    data: {
                        type:'email',
                        rf_emailid: function() {
                            return $( "#rf_emailid" ).val();
                            }
                        }
                    }
                    
                },
                rf_username: {
                    required: true,
                    remote: {
                    url: "<?php echo $base_url?>login/check_username",
                    type: "post",
                    data: {
                        type:'username',
                        rf_username: function() {
                            return $( "#rf_username" ).val();
                            }
                        }
                    }
                    
                },
                rf_fstname : {
                    required: true,
                },
                rf_lstname : {
                    required: true,
                },
                rf_password : {
                    minlength : 5,
                    required: true,
                },
                rf_confirmpwd : {
                    required: true,
                    minlength : 5,
                    equalTo : "#rf_password"
                }
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form) {
                jQuery.ajax({
                    url : '<?php echo $base_url?>login/register',
                    type: 'POST',
                    data: jQuery(form).serialize(),
                    success:function(response){
                            window.location.href = '<?php echo $base_url?>login';   
                    }
                });
            }
        });


});
</script>
