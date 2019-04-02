<?php global $mobile_country_code,$country_array,$astate_list;?>
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
 .last_custnum{
	position: relative;
    margin-left: 11%;
    font-size: 11px;
    font-weight: bold;
		}
 </style>
 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Customer</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        <?php if($get_company != FALSE){
            // echo '<pre>';
            // print_R($get_company);
            //  echo '</pre>';
           // exit;         
          $id_company = isset($get_company->id_company) ? $get_company->id_company : '';
          $custName = isset($get_company->company_name) ? $get_company->company_name : '';
          $custCode = isset($get_company->company_cust_code) ? $get_company->company_cust_code : '';          
          $com_customer_type = isset($get_company->customer_type) ? $get_company->customer_type : '';
          $cust_terms = isset($get_company->cust_terms) ? $get_company->cust_terms : '';
          $status = isset($get_company->company_status) ? $get_company->company_status : '';
         $hiddenData = array(
          'prev_sales_rep' =>implode(',',$assignedSalesREP),
          'company_id' =>$id_company,
         );
        
          
        ?>
        <form id="update_company" method="post">
          <?php echo form_hidden($hiddenData);

          ?>
            <div class="form-body">               
               <h3 class="form-section">Customer Info</h3>
               <div class="row">
                  <div class="col-md-6 ">
					  <?php
						$sql="SELECT * FROM company where company_status ='1' ORDER BY id_company DESC LIMIT 1";
						$query=$this->db->query($sql);
						$results=$query->row(); 
						$company_cust_code=isset($results->company_cust_code) ? $results->company_cust_code:'';
						$count=substr_count ($custCode, '-');
						if($count >0)
						{
						$Custnum=explode("-",$custCode);
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
							$custalph =isset($val1) ? $val1 :'';
							$custnumber =isset($val2) ? $val2 :'';
						}
						else
						{
						$custalph =isset($val1) ? $val1 :'';
						$custnumber =isset($val2) ? $val2 :$custCode;
						}	
						?>
					   
                      <div class="form-group">
                       <label class="col-md-12">Customer # <span class="last_custnum">Last Customer # : <?php echo $company_cust_code;?></span></label>
                       <div class="col-md-4">
                        <?php 
                        $custNoAttr = array(
                          'id' => 'cust_alph',
                          'type'=>'text',
                          'class' => 'form-control',
                          'name' => 'cust_alph',
                          'value' => $custalph,

                        );
                        echo form_input($custNoAttr);
                       ?>
                       </div>
                       <div class="col-md-8">
                       <?php 
                        $custNoAttr = array(
                          'id' => 'cust_number',
                          'type'=>'text',
                          'class' => 'form-control',
                          'name' => 'cust_number',
                          'value' => $custnumber,

                        );
                        echo form_input($custNoAttr);
                       ?>
                       </div>
                       </div>
                  </div>
                  <div class="col-md-6 ">
                      <div class="form-group">
                          <label>Customer Name <span class="required" aria-required="true"> * </span></label>
                          <?php 
                        $custNameAttr = array(
                          'id' => 'company_name',
                          'type'=>'text',
                          'class' => 'form-control',
                          'name' => 'company_name',
                          'value' => $custName,

                        );
                        echo form_input($custNameAttr);
                       ?>
                       </div>
                  </div>
                  
               </div>
              
                <div class="row">
                   
                    <div class="col-md-6 ">
                          <div class="form-group">
                              <label>Customer Type <span class="required" aria-required="true"> * </span></label>
                                <?php 
                                  $attributes = array(
                                  'id'       => 'customer_type',
                                  'class'       => 'form-control',
                                  );
                                  echo form_dropdown('customer_type', $customer_type,$com_customer_type,$attributes);

                                ?>
                      </div>
                </div>

                 <div class="col-md-6 ">
                          <div class="form-group">
                              <label>Terms <span class="required" aria-required="true"> * </span></label>
                              <?php 
                                $custTermsAttr = array(
                                  'id' => 'cust_term',
                                  'type'=>'text',
                                  'class' => 'form-control',
                                  'name' => 'cust_terms',
                                  'value' => $cust_terms,

                                );
                                echo form_input($custTermsAttr);
                             ?>                               
                      </div>
                </div>

                </div>

                  <div class="row clearfix">
                     
                      <div class="col-md-12 ">
                                <div class="form-group">
                                <label >Assigned Sales REP</label>
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
                  </div>
                
                  <div class="form-group">
                                                <label class="col-md-3 control-label">Status</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="pilot_status">
                                                    <option value="1" <?php if($status == 1){echo "selected=selected";}?>>Active</option>
                                                    <option value="2" <?php if($status == 2){echo "selected=selected";}?>>Delete</option>
                                                    <option value="3" <?php if($status == 3){echo "selected=selected";}?>>Inactive</option>
                                                     <option value="4" <?php if($status == 4){echo "selected=selected";}?>>Pilot</option>
                                                     </select>
                                                    <span class="help-block"> </span>
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
        <?php } ?>
      </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
 
</div>
               
<script type="application/javascript">
var baseUrl = '<?php echo BASE_URL;?>';
(function($){
       var form1 = $('#update_company');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
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
                
         
            },
            rules: {
                company_name: {
                    required: true
                },
                cust_number : {
                   required:true,
                    remote: {
                    url: "<?php echo $base_url?>company/unquie",
                    type: "post",
                     data: {
                      type:'cust_number',
                      cust_number: function() {
                        return $("[name='cust_number']").val();
                        },
                        cust_alph: function() {
                        return $("[name='cust_alph']").val();
                        },
                      u_key: function() {
                        return $("[name='company_id']").val();
                        }
                     
                        } 
                    }
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
					url : '<?php echo $base_url?>/company/customer_save',
					type: 'POST',
					data: jQuery(form).serialize(),
					success:function(response){
                     
						//jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Customer Updated Succesfully", "Notifications");
						setTimeout(function(){ location.reload(); }, 500);			
						}
					});
            }
        });
})(jQuery);

</script>
<!--Style -->
 <link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Scripts -->
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>

 <script type="text/javascript">
 (function($){
  var datuser = '<?php echo $aSelectData;?>';
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



  

})(jQuery);



</script>
