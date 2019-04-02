<?php global $mobile_country_code,$country_array,$astate_list;
$aTitle = array(
  'mr' => 'Mr',
  'miss' => 'Miss',
  'mrs' => 'Mrs',
);
?>

 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $title;?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        
        <?php 

        $contact_title = (isset($get_company_contact->contact_title)) ? $get_company_contact->contact_title : '';
        $contact_person = (isset($get_company_contact->contact_person)) ? $get_company_contact->contact_person : '';
        $contact_position = (isset($get_company_contact->contact_position)) ? $get_company_contact->contact_position : '';
        $main_phone = (isset($get_company_contact->main_phone)) ? $get_company_contact->main_phone : '';
        $main_ext = (isset($get_company_contact->main_ext)) ? $get_company_contact->main_ext : '';
        $desk_phone = (isset($get_company_contact->desk_phone)) ? $get_company_contact->desk_phone : '';
        $desk_ext = (isset($get_company_contact->desk_ext)) ? $get_company_contact->desk_ext : '';
        $mobile_phone = (isset($get_company_contact->mobile_phone)) ? $get_company_contact->mobile_phone : '';
        $contact_email = (isset($get_company_contact->contact_email)) ? $get_company_contact->contact_email : '';
        $id_company_contact = (isset($get_company_contact->id_company_contact)) ? $get_company_contact->id_company_contact : '';
        $contact_label = (isset($get_company_contact->contact_label) && $get_company_contact->contact_label !='') ? $get_company_contact->contact_label : 'Title';

        $action_type = ($contact_id > 0) ? 'update_contact' : 'insert_contact';
        $company_id = isset($get_company_contact->company_id) ? $get_company_contact->company_id  : 0;
        if($action_type == 'insert_contact'){
          $company_id = (isset($companyId)) ? $companyId : 0;
        }        

        $customHiddenData = array(
          'action_type'  => $action_type,       
          'company_id'  => $company_id,       
          'id_company_contact'  => $id_company_contact,       
              
        );
          
        ?>
        <form id="update_company_contact" method="post">
           <?php  echo form_hidden($customHiddenData); ?>  
            <div class="form-body">               
                          
              <div class="row">
				  
                  <div class="col-md-12 ">
             <h3><a href="javascript:;" data-type="text" class=" wclor address editable" data-type="text" data-pk="1" data-title="Enter Address Label" id="address"> <?php echo $contact_label;?> </a> <span class="editlabel"> (click on "<?php echo $contact_label;?>" to edit)</span></h3>
              <input type="hidden" class="form-control" name="address_label" id="address_label" value="<?php echo $contact_label;?>">
               
              </div>
               <div class="col-md-6 ">
                      <div class="form-group">
                          <label>Title <span class="required" aria-required="true"> * </span></label>                        
                          <?php 
                              $battributes = array(                                    
                                'class'       => 'form-control',
                              );
                              echo form_dropdown('title', $aTitle,$contact_title,$battributes);
                          ?>
                          <span class="help-block"></span> 
                  </div>
                 </div>
                 <div class="col-md-6 ">
                      <div class="form-group">
                          <label>Name of Contact <span class="required" aria-required="true"> * </span></label>
                          <input type="text" class="form-control"  name="person" placeholder="Enter Contact Person Name" value="<?php echo $contact_person;?>" required="">
                        <span class="help-block"> </span>
                      </div>
                  </div>
                   
               </div>
             

              <div class="row">
               <div class="col-md-6 ">
                      <div class="form-group">
                          <label>Position </label>
                          <input type="text" class="form-control"  name="position" placeholder="Enter Contact Position" value="<?php echo $contact_position;?>">
                          <span class="help-block"> </span>
                       </div>
                  </div>
                 <div class="col-md-6 ">
                      <div class="col-md-6 form-group">
                        <label class="control-label">Main Phone<span class="required" aria-required="true"> * </span></label>

                        <input type="text" class="form-control phone1"  name="main_phone"   placeholder="Enter Main Phone Number" value="<?php echo $main_phone; ?>" required="">
                        <span class="help-block"></span>             
                                                    
                      </div>
                      <div class="col-md-4 form-group">
                        <label class="control-label">Main Ext</label>
                         <input type="text" class="form-control phone1"  name="main_ext"   value="<?php echo $main_ext;?>" maxlength="6">
                         <span class="help-block"> </span>            
                                                    
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6 ">
                      <div class="col-md-6 form-group">
                        <label class="control-label">Desk Phone</label>
                         <input type="text" class="form-control phone1"  name="desk_phone"  i placeholder="Enter Desk Phone Number" value="<?php echo $desk_phone;?>">
                         <span class="help-block"> </span>            
                                                    
                      </div>
                      <div class="col-md-4 form-group">
                        <label class="control-label">Desk Ext</label>
                         <input type="text" class="form-control "  name="desk_ext"   value="<?php echo $desk_ext;?>" maxlength="6">
                         <span class="help-block"> </span>            
                                                    
                      </div>
                  </div>

                  <div class="col-md-6 ">
                      <div class="col-md-6 form-group">
                        <label class="control-label">Mobile Phone</label>
                         <input type="text" class="form-control  "  name="mobile_phone"   placeholder="Enter Mobile Phone Number" value="<?php echo $mobile_phone;?>">
                         <span class="help-block"> </span>            
                                                    
                      </div>
                      
                  </div>

               </div>

               <div class="row">

               <div class="col-md-6 ">
                      <div class="form-group">
                       <label class="control-label">Email Address<span class="required" aria-required="true"> * </span></label>
                        <div class="input-group">
                          <span class="input-group-addon">
                              <i class="fa fa-envelope font-purple"></i>
                          </span>
                          <input type="email" class="form-control" name="email" placeholder="Email Address" required=''  value="<?php echo $contact_email;?>"> 
                        </div>
                        <span class="help-block"></span>     
                                                    
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
       FormInputMask.init();
       var form1 = $('#update_company_contact');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
        /*jQuery.validator.addMethod("phone",function(value) {
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
        
}, "Please enter 10 digits number");*/
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
         messages: {              
                        
            },
            rules: {
                title: {
                    required: true
                },
          person: {
                      required: true
                  },
          main_phone: {
                      required: true
                  },
        /*main_phone1: {
                    required: true,                   
                    remote: {
                    url: "<?php echo $base_url?>/company/phoneValidation",
                    type: "post",
                     data: {
                      type:'phone',
                      company_phone: function() {
                        return $("[name='main_phone1']").val();
                        }
                     
                        } 
                    }                       
                },*/
          email: {
                  required: true,
                    email:true,
                           
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
          //  event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>/company/contact_save',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
            // console.log(response);
            // return false;     
						//jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Company Contact Updated Succesfully", "Notifications");
						setTimeout(function(){ location.reload(); }, 500);			
						}
					});
            }
        });
})(jQuery);

</script>
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
