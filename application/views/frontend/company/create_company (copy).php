<?php global $mobile_country_code,$country_array;?>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                   <!-- BEGIN FORM-->
                    <form id="company_info" novalidate="novalidate" method="POSR"> 
                   <div class="row">
                   <div class="col-md-6">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Company Information</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="fa fa-save"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                                                           
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="company_name" id="form_control_1">
                                                <label for="form_control_1">Company</label>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="contact" id="form_control_1">
                                                <label for="form_control_1">Contact</label>
                                                
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="phone" id="form_control_1">
                                                <label for="form_control_1">Phone</label>
                                            </div>
                                                                                    
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email">
                                                    <label for="form_control_1">Email</label>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                       
                                   
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                   </div>
                   <div class="col-md-6">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Billing Information</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="fa fa-save"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                                                           
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_street_address" id="form_control_1">
                                                <label for="form_control_1">Address</label>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_state" id="form_control_1">
                                                <label for="form_control_1">State</label>
                                                
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_city" id="form_control_1">
                                                <label for="form_control_1">City</label>
                                            </div>

                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_zip_code" id="form_control_1">
                                                <label for="form_control_1">Zip Code</label>
                                            </div>

                                             <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_shipping_acnt" id="form_control_1">
                                                <label for="form_control_1">Shipping Acnt</label>
                                            </div>
                                                                                    
                                            
                                        </div>
                                       
                                   
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                   </div>
                   </div>
                   <div class="row">
                   <div class="col-md-6">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Billing Information</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="fa fa-save"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                                                           
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_street_address" id="form_control_1">
                                                <label for="form_control_1">Address</label>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_state" id="form_control_1">
                                                <label for="form_control_1">State</label>
                                                
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_city" id="form_control_1">
                                                <label for="form_control_1">City</label>
                                            </div>

                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_zip_code" id="form_control_1">
                                                <label for="form_control_1">Zip Code</label>
                                            </div>

                                             <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_shipping_acnt" id="form_control_1">
                                                <label for="form_control_1">Shipping Acnt</label>
                                            </div>
                                                                                    
                                            
                                        </div>
                                       
                                   
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                   </div>
                   <div class="col-md-6">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Billing Information</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="fa fa-save"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
                                                                           
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_street_address" id="form_control_1">
                                                <label for="form_control_1">Address</label>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" name="billing_state" id="form_control_1">
                                                <label for="form_control_1">State</label>
                                                
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_city" id="form_control_1">
                                                <label for="form_control_1">City</label>
                                            </div>

                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_zip_code" id="form_control_1">
                                                <label for="form_control_1">Zip Code</label>
                                            </div>

                                             <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control phone" name="billing_shipping_acnt" id="form_control_1">
                                                <label for="form_control_1">Shipping Acnt</label>
                                            </div>
                                                                                    
                                            
                                        </div>
                                       
                                   
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                   </div>
                   </div>
                     </form>                                       
                         <!-- END FORM-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->        
         

<script type="application/javascript">
jQuery(document).ready(function(e) {
       var form1 = $('#add_new_user');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'first_name': {
                    required: 'Please Enter the first name',
                },
				 'last_name': {
                    required: 'Please Enter the last name',
                },
				 'last_name': {
                    required: 'Please Enter the last name',
                },
				
				 'username': {
                    required: 'Please Enter the username',
					remote : " Username already taken"
                },
				 'useremail': {
                    required: 'Please Enter the email',
          email: 'Please Enter valid email',
           remote : " Email already taken"
                },
				 'password': {
                    required: 'Password should not empty',					
                },
				 'user_type': {
                    required: 'Please Enter the user type',
                },
             phone: 'Please Enter phone Number',
          street_address: 'Please Enter Address',
          city: 'Please Enter City',
          state: 'Please Enter State',
          postcode: 'Please Enter Zip Code',
         
            },
            rules: {
                first_name: {
                    required: true
                },
				last_name: {
                    required: true
                },
				username: {
                    required: true,
					remote: {
					url: "<?php echo $base_url?>/user/unquie",
					type: "post",
					data: {
						type:'username',
						username: function() {
							return $( "#username" ).val();
							}
						}
					}
                },
				phone: {
					required: true,
					
				},
             	useremail: {
                    required: true,
					email:true,
					remote: {
					url: "<?php echo $base_url?>/user/unquie",
					type: "post",
					data: {
						type:'email',
						useremail: function() {
							return $( "#useremail" ).val();
							}
						}
					}
					
                },
				password: {
                    required: true,
           minlength: 6
                },
        street_address: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
        city: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
        state: {
                    required: {
                      depends: function(element) {
                          return $("#user_type").val() != 'superuser';
                      }
                     }
                },
       postcode: {
                          required: {
                            depends: function(element) {
                                return $("#user_type").val() != 'superuser';
                            }
                           },
                           digits:true,
                      }, 
      country: {
                          required: {
                            depends: function(element) {
                                return $("#user_type").val() != 'superuser';
                            }
                           }
                      },

				user_type: {
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
            //event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>/user/create_new_user',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){            
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("New user Create Succesfully", "Notifications");		
					}
					});
            }
        });
});

jQuery(document).ready(function(){
    jQuery('#user_type').on('change', function() {
      if ( this.value != 'superuser')
     
      {
        $("#address").show();
      }
      else
      {
        $("#address").hide();
      }
    });
});
 
</script> 