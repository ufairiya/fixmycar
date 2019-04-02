<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
			<?php $attributes = array('autocomplete' => 'off', 'name' => 'forget_password',"class"=>'forget_password',"id"=>"forget_password");
            echo form_open('login/processlogin', $attributes);
            echo getFlashMsg(); ?>
    
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Enter Your New Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="New Password" name="password"  id="password"/> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Enter Your Confirm Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="confirm_password" /> </div>
                </div>
                <div class="form-actions">
                <input type="submit" class="btn green" name="reset_password" value="Reset Password" /> 
                </div>
           <?php echo form_close(); ?>
            <!-- END LOGIN FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> <?php echo date('Y');?> &copy; <?php echo SITE_NAME;?> </div>
        
        
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
				 'password': {
                    required: 'Enter Password',
					minlength: 'Enter minimum 6 characters'
                },
				 'confirm_password': {
                    required: 'Enter Confirm Password',
					minlength: 'Enter minimum 6 characters',
					equalTo : "Password must be equal"
                },
            },
            rules: {
             	password: {
                    required: true,
					minlength : 6
                },
				confirm_password:{
					required: true,
					minlength : 6,
					equalTo : "#password"
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
					url : '<?php echo $base_url?>forgot/reset_password/<?php echo $user_key;?>',
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