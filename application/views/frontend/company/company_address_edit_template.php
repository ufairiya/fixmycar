<?php global $mobile_country_code,$country_array,$astate_list;
?>

 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $title;?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        
        <?php 

        $street_address = (isset($get_company_address->street_address)) ? $get_company_address->street_address : '';
        $state = (isset($get_company_address->state)) ? $get_company_address->state : '';
        $city = (isset($get_company_address->city)) ? $get_company_address->city : '';
        $zip_code = (isset($get_company_address->zip_code)) ? $get_company_address->zip_code : '';
        $country = (isset($get_company_address->country)) ? $get_company_address->country : 'US';
        $shipping_acnt = (isset($get_company_address->shipping_acnt)) ? $get_company_address->shipping_acnt : '';
        $address_label = (isset($get_company_address->address_label) && $get_company_address->address_label !='') ? $get_company_address->address_label : 'Address';
        
       
        $id_company_address = (isset($get_company_address->id_company_address)) ? $get_company_address->id_company_address : '';

        $action_type = ($address_id > 0) ? 'update_address' : 'insert_address';
        $company_id = isset($get_company_address->company_id) ? $get_company_address->company_id  : 0;
        if($action_type == 'insert_address'){
          $company_id = (isset($companyId)) ? $companyId : 0;
          $action = 'insert';
        }else{
          $action = 'update';
        }        

        $customHiddenData = array(
          'action_type'  => $action_type,       
          'action'  => $action,       
          'company_id'  => $company_id,       
          'id_company_address'  => $id_company_address,       
              
        );
          
        ?>
        <form id="update_company_address" method="post">
           <?php  echo form_hidden($customHiddenData); ?>  
            <div class="form-body"> 
            <div class="row">
                  <div class="col-md-12 ">
             <h3><a href="javascript:;" data-type="text" class=" wclor address editable" data-type="text" data-pk="1" data-title="Enter Address Label" id="address"> <?php echo $address_label;?> </a> <span class="editlabel"> (click on "<?php echo $address_label;?>" to edit)</span></h3>
              <input type="hidden" class="form-control" name="address_label" id="address_label" value="<?php echo $address_label;?>">
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12 ">
                      <div class="form-group">
                          <label>Street <span class="required" aria-required="true"> * </span></label>
                          <input type="text" class="form-control" name="street_address" id="street_address" value="<?php echo $street_address;?>"> </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>City <span class="required" aria-required="true"> * </span></label>
                          <input type="text" class="form-control" name="city" id="city" value="<?php echo $city;?>"> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>State <span class="required" aria-required="true"> * </span></label>
                           <?php 
                                if (array_key_exists($state, $astate_list))
                                  {
                                    $state_style="display:none;";
                                    $state_val = $state;
                                    $state_txt = '';
                                  }
                                  else
                                  {
                                    $state_style = "display:block;";
                                    $state_val = 'others';
                                    $state_txt  = $state;
                                  }

                                  $battributes = array(
                                    'id'       => 'state',
                                    'class'       => 'form-control',
                                  );
                                  echo form_dropdown('state', $astate_list,$state_val,$battributes);

                          ?>
                         <input type="text" class="state_other form-control" name="state_other" value="<?php echo $state_txt; ?>" style="<?php echo $state_style; ?>">
                          </div>
                  </div>
                  <!--/span-->
              </div>
              <!--/row-->
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Zip Code <span class="required" aria-required="true"> * </span></label>
                          <input type="text" class="form-control digists" name="zip_code" id="zip_code" maxlength="6" minlength="4" value="<?php echo $zip_code;?>"> </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Country <span class="required" aria-required="true"> * </span></label>
                          <input type="text" class="form-control" name="country" id="country" value="<?php echo $country;?>"> </div>
                  </div>
                </div>
                <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Shipping Acnt</label>
                          <input type="text" class="form-control" name="shipping_acnt" id="shipping_acnt" value="<?php echo $shipping_acnt;?>"> </div>
                  </div>
                 
              </div>
               
             </div>             
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
       
      </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
 
</div>
               
<script type="application/javascript">
jQuery(document).on('click', '.address',function (e) {  
    e.preventDefault();
    e.stopPropagation(); 
    $this = jQuery(this);
    if($this.hasClass('editable-click')){
    jQuery(this).editable();
    }else{
      jQuery(this).editable('toggle');
    }
    jQuery(this).on('save', function(e, params) {
        jQuery("#address_label").val(params.newValue);
            $(this).removeClass('editable-unsaved'); 
        });
});

(function($){   
   var action =  jQuery("[name='action']").val();
      
       FormInputMask.init();
       var form1 = $('#update_company_address');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        jQuery.validator.addMethod("phone",function(value) {
            var phone = false;
            if(value == ''){
             phone = true;
            }
          
            $.ajax({
              async: false,
              type: "post",
             url: "<?php echo $base_url?>/company/phoneValidation",   
              data: {type:"phone",'company_phone':value},
                   // AJAX OK, return true/false
              success: function(objResponse){
                if(objResponse =='true'){
                   phone =  true;
                }
               }
              
            });
            console.log(phone);
     return phone;
        
}, "Please enter 10 digits number");

 jQuery.validator.addMethod("digists", function(value, element) {
    return this.optional(element) || value.match(/.*[0-9]+.*/);
},"Please enter digits only.");
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
         messages: {              
               street_address:{
                required:'Please enter street address'
              },
               city:{
                required:'Please enter city'
              },
               state:{
                required:'Please select state'
              }, 
              zip_code:{
                required:'Please enter zip code'
              },
              country:{
                required:'Please enter Country name'
              },   
            },
            rules: {
              street_address:{
                required:false
              },
               city:{
                required:false
              },
               state:{
                required:false
              }, 
              zip_code:{
                required:false,
                digits:true
              },
              country:{
                required:false,
              },
            },
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
                } else {
                error.insertAfter(element);
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

            submitHandler: function(form,event) {
              var tmessage =  'Company Address Updated Succesfully';
          //  event.preventDefault();
            if(action == 'insert'){
              tmessage = 'Company Address Inserted Succesfully';
            }
				jQuery.ajax({
					url : '<?php echo $base_url?>/company/address_save',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
            // console.log(response);
            // return false;     
						//jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success(tmessage, "Notifications");
						setTimeout(function(){ location.reload(); }, 500);			
						}
					});
            }
        });
})(jQuery);

jQuery(document).on('click','#state',function(){
  var state_val = jQuery(this).val();
  if(state_val == 'others')
  {
    jQuery(".state_other").show();
  }
  else
  {
    jQuery(".state_other").hide();
  }
});

</script>
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>