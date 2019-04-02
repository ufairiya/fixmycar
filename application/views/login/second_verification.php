<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <div style="text-align:center">
           <h3 class="form-title"> Verification code sent to mobile <?php echo $phone_number;?>   </h3>           
              <form method="post" id="second_step_verfication" >
                <div class="form-body">
                    <div class="form-group">
                        <label for="form_control">Enter Your Phone Verification Code </label>
                        <input type="text" class="form-control" name="secert_key" id="secert_key">
                    </div>
                
                    <div class="form-actions">
                    		<input type="hidden" name="code" value="<?php echo $key?>" />
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn dark">Verify</button>
                                </div>
                            </div>
                    </div>
                </div>
           </div>
           </form>
           
        </div>
<script type="text/javascript">
 jQuery(document).ready(function(e) {
       var form1 = $('#second_step_verfication');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input          
            rules: {
                secert_key: {
                    required: true
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
					url : '<?php echo $base_url;?>login/second_step_verification',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
							if(response == 'fail'){
								alert("Not Valid Verification Code");
							}
							if(response == 'success'){
								window.location ="<?php echo $base_url; ?>dashboard";
							}
						}
					});
            }
        });
	});
</script>

        
        
        
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2017 &copy; ARYA </div>