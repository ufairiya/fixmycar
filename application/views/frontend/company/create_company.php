<?php global $mobile_country_code,$country_array,$astate_list;
$aTitle = array(
  'mr' => 'Mr',
  'miss' => 'Miss',
  'mrs' => 'Mrs',
);
?>
<style type="text/css">
   .select2 {
     width: 100% !important;
   }
   .select2-selection__choice {
    background-color: #4CB755!important;
    border: 1px solid #4CB755!important;
    font-weight: bold !important;
    color: white !important;
}
.select2-selection__choice__remove{
      float: right !important;
    color: #000 !important;
    padding-left: 6px !important;
}


    .pclass{
        background-color: #4169E1;
        border-bottom: 0;
        padding: 0 10px;
        margin-bottom: 0;
        color: #fff !important;
    }

    .editable-container  {
       left :0px !important;
    }
   .popover-title {   
     color: #000 !important;
   }
   .wclor{
    color: #fff !important;
   }
   .error{
    color:#e73d4a !important;
   }
   .editlabel{
    font-size: 10px;
   }
   .last_custnum{
	position: relative;
    margin-left: 25%;
    font-size: 11px;
    font-weight: bold;
		}
</style>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                   <div class="row">
                     <div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Create Customer</span>
                                    </div>
                                    <!-- <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" method="POST" id="company_info" role="form">    <?php  echo form_hidden('action_type','insert');?>                             
                                        <div class="form-body">
											<?php
											$sql="SELECT * FROM company where company_status ='1' and customer_type = 'retailergen' ORDER BY id_company DESC LIMIT 1";
											
                      $query=$this->db->query($sql);
											
                      $results=$query->row(); 

                      $company_cust_code=isset($results->company_cust_code) ? $results->company_cust_code:'';

                      if (strpos($company_cust_code, '-') !== false) {

                          $Custnum=explode("-",$company_cust_code);
                      }
                      else {
                      
                          $Custnum = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $company_cust_code);
                      }

											foreach($Custnum as $key => $num)
											{
												if($key =='0')
												{
													$val1 = $num;
												}else
												{	
												$val2 = $num;
												}
											}
											$custnumber =isset($val2) ? $val2 :'';
											if($custnumber !=''){
											$numberCust=$custnumber + 1;
										    }else{
												$numberCust ='';
											}
											?>
											
											<span class="last_custnum">Last Customer # : <?php echo $company_cust_code;?></span> 
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">Customer #<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-1">
											
                                                    <input type="text" class="form-control cust_alph"  name="cust_alph"  placeholder="Alphabets" value="<?php echo $val1;?>">
                                                    
                                                </div>
                                                 <div class="col-md-5">
											
                                                    <input type="text" class="form-control cust_number"  name="cust_number" placeholder="Enter Customer Number" value="<?php echo $numberCust;?>">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Customer<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">

                                                    <input type="text" class="form-control"  name="company_name" placeholder="Enter Customer Name">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Customer Type<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                  
                                                 <?php 
                                                  $attributes = array(
                                                  'id'       => 'customer_type',
                                                  'class'       => 'form-control',
                                                  );
                                                  echo form_dropdown('customer_type', $customer_type,'',$attributes);

                                                  ?>
                                                </div>
                                                <div class="col-md-3">
                                                  <a class="btn blue btn-outline dark" data-toggle="modal" href="#customer_type_list"> View Customer Type List </a>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                              <label class="col-md-3 control-label" >Assign Sales REP <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                  <?php 

                                                  $salesattributes = array(
                                                  'id'       => 'sales_rep',
                                                  'class'       => 'form-control ',
                                                  'multiple' => 'multiple',

                                                  );
                                                  echo customform_dropdown('sales_rep[]', $salesREP,$assignedSalesREP,$salesattributes);

                                                  ?> 
                                                </div>   
                                              </div>                           
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">Status</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="pilot_status">
                                                    <option value="1">Active</option>
                                                    <option value="3">Inactive</option>
                                                     <option value="4">Pilot</option>
                                                     </select>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>
                                            <div class="mt-repeater">
                                            
                                            <div data-repeater-list="contact">            
                                                <div data-repeater-item="" class="">
                                                 <h3 class="form-section pclass" ><span class="contact_label"> Contact Info #1</span>
                                             </h3>
                                         <div class="form-group">
                                                <label class="col-md-3 control-label">Title<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                              
                                               <?php 
                                                  $battributes = array(                                    
                                                    'class'       => 'form-control',
                                                  );
                                                  echo form_dropdown('contact[0][title]', $aTitle,'mr',$battributes);
                                              ?>
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>                                          
                                          <div class="form-group">
                                                <label class="col-md-3 control-label">Name of Contact<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="contact[0][person]" placeholder="Enter Contact Person Name" required="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Position</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="contact[0][position]" placeholder="Enter Contact Position" >
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                             <div class=" form-group ">
                                                   
                                                <label class="col-md-3 control-label">Main Phone<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control phone1"  name="contact[0][main_phone]"   placeholder="Enter Main Phone Number" required="">
                                                    <span class="help-block"></span>
                                                
                                                    </div>
                                                     <label class="col-md-1 control-label">MainExt#</label>
                                                    <div class="col-md-2">
                                                    <input type="text" class="form-control"  name="contact[0][main_phone_ext]"   maxlength="6" placeholder="Extention">
                                                    <span class="help-block"></span>
                                                
                                                    </div>
                                                </div>
                                             <div class=" form-group ">
                                                   
                                                <label class="col-md-3 control-label">Desk Phone</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control phone1"  name="contact[0][desk_phone]"  i placeholder="Enter Desk Phone Number">
                                                    <span class="help-block"> </span>
                                                
                                                    </div>
                                                    <label class="col-md-1 control-label">DeskExt#</label>
                                                    <div class="col-md-2">
                                                    <input type="text" class="form-control"  name="contact[0][desk_phone_ext]"   maxlength="6" placeholder="Extention" >
                                                    <span class="help-block"></span>
                                                
                                                    </div>
                                                </div>
                                             <div class=" form-group ">
                                                   
                                                <label class="col-md-3 control-label">Mobile Phone</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="contact[0][mobile_phone]"   placeholder="Enter Mobile Phone Number">
                                                    <span class="help-block"> </span>
                                                
                                                    </div>
                                                </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email Address<span class="required" aria-required="true"></span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope font-purple"></i>
                                                        </span>
                                                        <input type="email" class="form-control" name="email" placeholder="Email Address"> 
                                                    </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            
                                           <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-6">
                                                   <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete del_contact">
                                                        <i class="fa fa-close"></i> Delete</a>

                                                </div>
                                            </div>
                                                </div>


                                            </div>
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-success mt-repeater-add add_contact">
                                                <i class="fa fa-plus"></i> Add contact</a>
                                        </div>
                                           
                                        <div class="mt-repeater">
                                        <div data-repeater-list="address">
                                            <div data-repeater-item="" class="mt-repeater-item">
                                             <h3 class="form-section pclass"><a href="javascript:;" data-type="text" class=" wclor address editable" data-type="text" data-pk="1" data-title="Enter Address Label" name="address[0][address_labels]"> Address</a> <span class="editlabel"> (click on "Address" to edit)</span>
                                             </h3>
                                             <input type="hidden" name="address[0][address_label]" value="">
                                                <!-- jQuery Repeater Container -->
                                                
                                     
                                                <div class="form-group">
                                                <label class="col-md-3 control-label">Address<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="address[0][street_address]" placeholder="" required="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                          <div class="form-group ">
                                                <label class="col-md-3 control-label">State<span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                  <?php 
                                  $sattributes = array(
                                    'class'       => 'form-control state',
                                    'required'    => 'required'
                                  );
                                  echo form_dropdown('address[0][state]', $astate_list,'',$sattributes);
                                 ?>
                                                    <input type="text" class="state_other form-control" name="address[0][state_other]" value="" style="display: none;">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">City <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="address[0][city]" placeholder="" required="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>


                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Zip <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control digists"  name="address[0][zip_code]" maxlength="6" minlength="4" placeholder="" required="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Country <span class="required" aria-required="true"> * </span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="address[0][country]" placeholder="" required="" value="US">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Shipping Acnt</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control"  name="address[0][shipping_anct]" placeholder="">
                                                    <span class="help-block"> </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-6">
                                                   <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">
                                                        <i class="fa fa-close"></i> Delete</a>
                                                </div>
                                            </div>
                                                
                                                
                                            </div>
                                        </div>

                                          <a href="javascript:;" data-repeater-create="" class="btn btn-success mt-repeater-add">
                                                <i class="fa fa-plus"></i> Add Address</a>
                                        </div>
                                         </div>
                                         
                                                        
                                        <div class="form-actions">
                                            <div class="row">

                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn blue btn-submit">
                                                    <i class="fa fa-check"></i> Save</button>
                                                     <button class=" btn default btn-cancel mt-sweetalert-cancel" data-title="Do you want to save changes?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-infos" data-cancel-button-text="Yes" data-confirm-button-text="No" data-task="d"  data-confirm-button-class="btn-danger" type="button"> Cancel </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                      </div>
                                    
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            
                        </div>
                   
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->  
            <?php
                // $sql="SELECT * FROM customer_type where status ='1' ORDER BY id_customer_type DESC ";
                                 
                //       $query=$this->db->query($sql);
                                 
                //       $results=$query->result(); 

                      //print_r($customer_type_details);
            ?>
            <div class="modal fade" id="customer_type_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Customer Type List</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                         <div class="table-responsive">
                             <table class="table table-hover table-bordered table-striped" id="customer_type_list">
                                 <thead>
                                     <tr>
                                         <th>
                                             <?php echo $this->lang->line('customer type'); ?> Name </th>
                                         <th>
                                             <?php echo $this->lang->line('description'); ?>
                                         </th>
                                         <th>Cust#</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       if($customer_type_details != FALSE)
                                       {
                                          $i =1;
                                             foreach($customer_type_details as $custkey => $custvalue){
                                                   echo '<tr>
                                                      <td>'.$custvalue->cust_type_name.'</td>
                                                      <td>'.$custvalue->description.'</td>
                                                      <td>'.$custvalue->cust_start_number.'</td>
                                                   </tr>';
                                                $i++;
                                             }
                                       }
                                    ?> 
                                </tbody>
                             </table>
                         </div>
                     </div>
                 
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
               </div>
         </div>

<script type="application/javascript">
jQuery(document).ready(function(e) {
    console.log('form');
     
       var form1 = $('#company_info');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
         jQuery.validator.addMethod("digists", function(value, element) {
    return this.optional(element) || value.match(/.*[0-9]+.*/);
},"Please enter digits only.");
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

        form1.validate({
            onfocusout: false,
            // onkeyup: false,
            // onclick: false,
            // debug: false,
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            messages: {              
                'company_name': {
                    required: 'Please Enter Customer Name',
                },
                'cust_number': {
                    required: 'Please Enter Customer Number',
                    remote : 'Customer Number already Exist',
                },
                 'sales_rep[]': {
                    required: 'Please select Sales REP',
                },
                'company_email': {
                    required: 'Please Enter Customer email',
                    email: 'Please Enter valid email',
                    remote : " Email already taken"
                },
                'company_phone': {
                    required: 'Please Enter Customer phone number',                   
                    remote : " Please enter 10 digits phone number"
                },
                'company_contact': {
                    required: 'Please Enter Customer contact person', 
                },
                // 'pilot_status': {
                //     required: 'Please select option',
                // },
				billing_street_address: {
                    required: 'Please Enter Billing street address',                
                }, 
                billing_state: {
                    required: 'Please select Billing State',                   
                },
                billing_city: {
                    required:'Please Enter Billing City',                  
                },
                billing_zip_code: {
                    required: 'Please Enter Billing Zip code',                  
                },
                billing_country_code: {
                    required: 'Please Enter Billing Country Name',                  
                },

                shipping_street_address: {
                    required: 'Please Enter Shipping street address',                     
                },
                shipping_state: {
                    required: 'Please select Shipping State',                   
                },
                shipping_city: {
                    required: 'Please Enter Shipping City',                    
                },
                shipping_zip_code: {
                    required: 'Please Enter Shipping Zip code',                   
                },
                shipping_country_code: {
                    required: 'Please Enter Shipping Country Name',                   
                },
         
            },
            rules: {
                company_name: {
                    required: true
                }, 
                cust_number: {
                    required: true,
                     remote: {
                    url: "<?php echo $base_url?>/company/unquie",
                    type: "post",
                     data: {
                      type:'cust_number',
                       cust_number: function() {
                        return $("[name='cust_number']").val();
                        },
                        cust_alph: function() {
                        return $("[name='cust_alph']").val();
                        }
                     
                        } 
                    }
                }, 
                'sales_rep[]':{
                   required: true
                 },
                // 'pilot_status': {
                //     required: true
                // },
				company_contact: {
                    required: true
                },
				'company_phone': {
                    required: true,
                     remote: {
                    url: "<?php echo $base_url?>/company/phoneValidation",
                    type: "post",
                     data: {
                      type:'phone',
                      company_phone: function() {
                        return $("[name='company_phone']").val();
                        }
                     
                        } 
                    }                      
                },
                company_email: {
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

            submitHandler: function(form) {
            //event.preventDefault();
			
				jQuery.ajax({
					url : '<?php echo $base_url?>/company/save',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){ 
                        // console.log(response);
                        // return false;                            
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("New Company Create Succesfully", "Notifications");		
					}
					});
            }
        });
});

// $(document).ready(function(){
//     $('.address').trigger('click');
// })


 jQuery(document).on('click','.add_contact,.del_contact',function(){
    var $repeater = $('.mt-repeater').repeaterVal();
    var repalContact = $repeater.contact.length;
    console.log(repalContact);
    console.log($repeater);
    jQuery(".contact_label").each(function(index,value) {
        var id = parseInt(index)+1;
        console.log($(this).text('Contact Info #'+id));       
    });

    FormInputMask.init();
    
 })

 // $(document).on('change', '.phone',function (e) {
 //        var currentclass = $(this);
 //        jQuery.ajax({
 //        url : '<?php echo $base_url?>/company/phoneValidation',
 //        type: 'POST',
 //        data: {
 //          type:'phone',
 //          'company_phone':$(this).val()
 //         },
 //         success:function(response){ 
 //            if(response == 'false'){ 
 //                $(currentclass).next().append('<span class="error">Please enter 10 digits number</span>');
 //            }
            
 //         }
          

 //        });
    
 // });
jQuery(document).on('click', '.address',function (e) {
        // $.fn.editable.defaults.mode = 'inline';
        e.preventDefault();
        e.stopPropagation(); 
        $this = jQuery(this);
        if($this.hasClass('editable-click')){
            jQuery(this).editable();
        }else{
              jQuery(this).editable('toggle');
        }
        
        var name = $(this).attr('name');     
        var parts = name.split(/[[\]]{1,2}/);
        var cid = parts[1];
                     
        jQuery(this).on('save', function(e, params) {
        jQuery("[name='address["+cid+"][address_label]']").val(params.newValue);
            $(this).removeClass('editable-unsaved'); 
        });
    });
  
</script> 
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
<!--Style -->
 <link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
 <script type="text/javascript">
jQuery(document).ready(function(e) {
  
$("#sales_rep").html($("#sales_rep option").sort(function (a, b) {
     var adata = $(a).attr('data-id');
     var bdata = $(b).attr('data-id');    
    return adata == bdata ? 1 : adata < bdata ? -1 : 1
}))
  $("#sales_rep").select2();
  // $("ul.select2-selection__rendered").sortable({
  //      containment: 'parent'
  // });

  $("#sales_rep").on("select2:select", function (evt) {
      var element = evt.params.data.element;
      var $element = $(element);
      $element.detach();
      $(this).append($element);
      $(this).trigger("change");
  });



  

});

jQuery(document).on('click','.btn-cancel',function(){
    var sa_title = $(this).data('title');
    var sa_message = $(this).data('message');
    var sa_type = $(this).data('type'); 
    var sa_allowOutsideClick = $(this).data('allow-outside-click');
    var sa_showConfirmButton = $(this).data('show-confirm-button');
    var sa_showCancelButton = $(this).data('show-cancel-button');
    var sa_closeOnConfirm = $(this).data('close-on-confirm');
    var sa_closeOnCancel = $(this).data('close-on-cancel');
    var sa_confirmButtonText = $(this).data('confirm-button-text');
    var sa_cancelButtonText = $(this).data('cancel-button-text');
    var sa_popupTitleSuccess = $(this).data('popup-title-success');
    var sa_popupMessageSuccess = $(this).data('popup-message-success');
    var sa_popupTitleCancel = $(this).data('popup-title-cancel');
    var sa_popupMessageCancel = $(this).data('popup-message-cancel');
    var sa_confirmButtonClass = $(this).data('confirm-button-class');
    var sa_cancelButtonClass = $(this).data('cancel-button-class');
    
    //console.log(sa_btnClass);
    swal({
      title: sa_title,
      text: sa_message,
      type: sa_type,
      allowOutsideClick: sa_allowOutsideClick,
      showConfirmButton: sa_showConfirmButton,
      showCancelButton: sa_showCancelButton,
      confirmButtonClass: sa_confirmButtonClass,
      cancelButtonClass: sa_cancelButtonClass,
      closeOnConfirm: sa_closeOnConfirm,
      closeOnCancel: sa_closeOnCancel,
      confirmButtonText: sa_confirmButtonText,
      cancelButtonText: sa_cancelButtonText,
    },
    function(isConfirm){
        if (isConfirm){
            window.onbeforeunload = '';
            window.location.href='<?php echo $previousLink;?>';
        } else {
            swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");
        }
    });
});

jQuery(document).on('change','#customer_type',function(){

  var customer_type = jQuery("#customer_type").val();

  // alert(customer_type);

   $.ajax({
              async: false,

              type: "post",

              dataType: 'json',

              url: "<?php echo $base_url?>/company/custo_type",  

              data: {'customer_type':customer_type},

              success: function(objResponse){

                jQuery(".cust_alph").val(objResponse['val1']);
                jQuery(".cust_number").val(objResponse['numberCust']);

               }
              
            });
  
});

jQuery(document).on('click','.state',function(){
  var state_val = jQuery(this).val();
  if(state_val == 'others')
  {
    jQuery(this).closest('div').find(".state_other").show();
  }
  else
  {
    jQuery(this).closest('div').find(".state_other").hide();
  }
});
</script>
