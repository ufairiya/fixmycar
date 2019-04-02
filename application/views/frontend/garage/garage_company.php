<!-- BEGIN CONTENT -->
<style type="text/css">
.control-label {
    margin-top: 7px !important;
   
}
.portlet.box.red>.portlet-title, .portlet.red, .portlet>.portlet-body.red,.lightgreen{
  background-color :#4CB755 !important;
}
.salestag{
      border: none !important;
}
.salestag .label-info {
  background-color: #4CB755;
  font-weight: bold !important;
}
.customer_po_btn{     background: #3bc5d2; padding: 6px; border-radius: 8px; color: white;  font-weight: bold;margin-bottom: 20px; }
#imggar img{ width:100%; }
.bootstrap-tagsinput {
    background-color: #fff;
    border: 1px solid #ccc;    
    display: inline-block;
    padding: 4px 6px;
    margin-bottom: 10px;
    color: #555;
    vertical-align: middle;
    border-radius: 4px;
    max-width: 100%;
    line-height: 22px;
    cursor: text;
}

.bootstrap-tagsinput input {
    border: none;
    box-shadow: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    margin: 0;
    width: auto !important;
    max-width: inherit;
}

.bootstrap-tagsinput input:focus {
    border: none;
    box-shadow: none;
}

.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white;
}

</style>
 <?php $editAction=TRUE;
 
 $user_id=$custCode = isset($user_id) ? $user_id : '';
  
    $user_id=$custCode = isset($user_id) ? $user_id : '';
    if($custCode == 'Null'){
      $custCode = '';
    }
     
    $companyName = (isset($get_company->company_name) && $get_company->company_name !='') ? $get_company->company_name : '';
    if($companyName == 'Null'){
      $companyName = '';
    }
    $companyID = (isset($get_company->id_user_master) && $get_company->id_user_master !='') ? $get_company->id_user_master : '';
    if($companyID == 'Null'){
      $companyID = '';
    }
    $first_name= (isset($get_company->first_name) && $get_company->first_name !='') ? $get_company->first_name : '';
    if($first_name == 'Null'){
      $first_name = '';
    }
    $username= (isset($get_company->username) && $get_company->username !='') ? $get_company->username : '';
    if($username == 'Null'){
      $username = '';
    }
    $last_name= (isset($get_company->last_name) && $get_company->last_name !='') ? $get_company->last_name : '';
    if($last_name == 'Null'){
      $last_name = '';
    }
    $contact_email= (isset($get_company->email) && $get_company->email !='') ? $get_company->email : '';
    if($contact_email == 'Null'){
      $contact_email = '';
    }
      $editAction =TRUE;
                                      
     $companyPhone = (isset($get_company->phone) && $get_company->phone !='') ? $get_company->phone : '';
    if($companyPhone == 'Null'){
      $companyPhone = '';
    }
    $profile_image = (isset($get_company->profile_image) && $get_company->profile_image !='') ? $get_company->profile_image : '';
     
    $contact_email =$companyEmail = (isset($get_company->email) && $get_company->email !='') ? $get_company->email : '';
    if($companyEmail == 'Null'){
      $companyEmail = '';
    }
    $companyAddress = (isset($get_company->address) && $get_company->address !='') ? $get_company->address : array();
    if($companyAddress == 'Null'){
      $companyAddress = array();
    }
 if(!empty($get_companydet))
 {
//  echo '<pre>';print_R($get_companydet);echo '</pre>';

 $garage_name= (isset($get_companydet->garage_name) && $get_companydet->garage_name !='') ? $get_companydet->garage_name : '';
  $garage_email= (isset($get_companydet->garage_email) && $get_companydet->garage_email !='') ? $get_companydet->garage_email : '';
   $garage_website= (isset($get_companydet->garage_website) && $get_companydet->garage_website !='') ? $get_companydet->garage_website : '';
    $garage_phone= (isset($get_companydet->garage_phone) && $get_companydet->garage_phone !='') ? $get_companydet->garage_phone : '';
     
  //  $contact_email= (isset($get_companydet->email) && $get_companydet->email !='') ? $get_companydet->email : '';
    //$summary_line= (isset($get_companydet->summary_line) && $get_companydet->summary_line !='') ? $get_companydet->summary_line : '';
     $address_line1= (isset($get_companydet->address_line_1) && $get_companydet->address_line_1 !='') ? $get_companydet->address_line_1 : '';
    $address_line2= (isset($get_companydet->address_line_2) && $get_companydet->address_line_2 !='') ? $get_companydet->address_line_2 : '';
     
     $posttown= (isset($get_companydet->posttown) && $get_companydet->posttown !='') ? $get_companydet->posttown : '';
      $eir_code= (isset($get_companydet->eir_code) && $get_companydet->eir_code !='') ? $get_companydet->eir_code : '';
       $country= (isset($get_companydet->country) && $get_companydet->country !='') ? $get_companydet->country : '';
       $owner_name= (isset($get_companydet->owner_name) && $get_companydet->owner_name !='') ? $get_companydet->owner_name : '';
        $garage_photos= (isset($get_companydet->garage_photos) && $get_companydet->garage_photos !='') ? $get_companydet->garage_photos : '';
        $status='1';
  $longitude = (isset($get_companydet->longitude) && $get_companydet->longitude !='') ? $get_companydet->longitude : ''; 
$latitude = (isset($get_companydet->latitude) && $get_companydet->latitude !='') ? $get_companydet->latitude :'';

 }
 else{
 //echo '<pre>';print_R($get_company);echo '</pre>';
 $garage_name= $garage_email= $garage_website=  $garage_phone=  $address_line2= $posttown=  $contact_email= $summary_line= $address_line1=$country=$eir_code=$owner_name=  $garage_photos=  $latitude =$longitude= $status='';
 }
// $companyContacts = (isset($get_company->company_contact_Details) && $get_company->company_contact_Details !='') ? $get_company->company_contact_Details : array();
// $add_Contact_link = BASE_URL.'/company/get_company_add_contact_temple/'.$companyID;
// $add_address_link = BASE_URL.'/company/get_company_add_address_temple/'.$companyID;
// $PO_create_link = BASE_URL.'/purchase_order/create/'.$companyID;
// $add_custnotes_link = BASE_URL.'/company/get_customer_add_notes_temple/'.$companyID;
// $edit_custnotes_link = BASE_URL.'/company/get_customer_add_notes_temple/'.$companyID.'/edit';
// $Add_assigned_rep_link = BASE_URL.'/company/get_customer_add_sales_rep_temple/'.$companyID.'/add';
// $custInfoEdit = BASE_URL.'/company/get_company_template/'.$companyID;
// // $custInfoEdit = '#';
// $contactCount  =0;
// $editAction = $editCustAction;
// $salesRepView = isset($salreRepView) ? $salreRepView : FALSE;
?>
            <div class="row">
                 <div class="col-md-12"> 
                 <div class="tab-content">
                 <div class="tab-pane active" id="invoices">  
                  <div class="portlet light bordered">
                       <div class="portlet-body form">
               
                           
                              <div class="form-body">
                               

                                <div class="row">
                                    <div class="col-md-12"  >
                                <div class="portlet box green">
                                  <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-gift"></i>Company Info
                                    </div>
                               
                                  <div class="actions">
                                    <a href="<?php //echo $custInfoEdit;?>" data-target="#basic_details" data-toggle="modal" data-backdrop="static"  data-backdrop="static" data-keyboard="false" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>

                                  </div>
                                  
                                  </div>
                                  <div class="portlet-body form" style="min-height: 187px;">
                                 

                                  <div class="row">
                                      <div class="col-md-12" >
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Cust #:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $custCode;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Owner Name:</label>
                                              <div class="col-md-9">

                                                  <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="owner_name"> <?php echo $owner_name;?> </a></p>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
 
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Garage Name:</label>
                                              <div class="col-md-9">

                                                  <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="garage_name"> <?php echo $garage_name;?> </a></p>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Garage email:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="garage_email"> <?php echo $garage_email;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                   <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Garage website:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="garage_website"> <?php echo $garage_website;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                            <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Phone:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="garage_phone"> <?php echo $garage_phone;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                      
                               <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Addressline1:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="address_line_1"> <?php echo $address_line1;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Addressline2:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="address_line_2"> <?php echo $address_line2;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                     <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Post town:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="posttown"> <?php echo $posttown;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Eir Code:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="eir_code"> <?php echo $eir_code;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                     <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Latitude:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="latitude"> <?php echo $latitude;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                     <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Longitude:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="longitude"> <?php echo $longitude;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                             <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Country:</label>
                                              <div class="col-md-9">
                                                   <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="country"> <?php echo $country;?> </a>
                                              </div>
                                          </div>
                                      </div>
                                    </div>


                            </div>

                            </div>
                             <!-- <div class="portlet-body form" style="min-height: 187px;">
                            <a href="<?php echo BASE_URL.'/garage/upload_cust_po/'.$companyID?>"  class="customer_po_btn btn" data-target="#ajax_modalk" data-toggle="modal" >
                              Upload Garage image
                              </a>
                              <br/>
                             <?php  $garage_photos;
                             $image_display = explode(',',$garage_photos);
                            
                              $i=1;
                             foreach($image_display as $dis)
                             {
                               if( $i>=5)
                               {
                                 echo '<div class="col-md-3" id="imggar"><img src="'.$base_url.'/'.$dis.'"></div>';
                                 echo '</div><div class="row">';
                               }
                               else{ 
                                  echo '<div class="col-md-3" id="imggar"><img src="'.$base_url.'/'.$dis.'"></div>';
                               }
                                $i++;
                                 
                             }
                             echo '</div>';
                             ?>
                              <div id="ajax_modalk" class="modal fade" role="dialog">
                                <div class="modal-dialog">
 
                                  <div class="modal-content">


                                  </div>
                                 </div>
                              </div>

                             </div> -->
                            </div>

                                  
                        </div>
                        </div>
                        </div>
                    </div>
     

<script type="text/javascript">
 var SweetAlert = function () {

    return {
        //main function to initiate the module
        init: function () {
          jQuery('.mt-sweetalert-delete').each(function(){
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
        
          
            jQuery(this).click(function(){
          var key = $(this).attr('data-uid');
          var task = $(this).attr('data-task');
          var type = $(this).attr('data-task-type');
          var cid = $(this).attr('data-cid');
          var successmsg = 'Customer Info Deleted Successfully';
          if(type =='contact'){
             successmsg = 'Customer Contact Deleted Successfully';
          }
          if(type =='address'){
             successmsg = 'Customer Address Deleted Successfully';
          }
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
              jQuery.ajax({
                url : '<?php echo $base_url?>/company/customer_delete',
                type: 'POST',
                dataType:'JSON',
                data: {'key':key,'task':task,'type':type,'cid':cid},
                success:function(response){                 
                  toastr.options = {
                  "closeButton": true,
                  }
                  toastr.warning(response.message, "Notifications");
                  if(response.status == true){
                     setTimeout(function(){ location.reload(); }, 500);  
                  }
                   
                }
                });
                } else {
              swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");
                }
          });
            });
          });    

      }
    }

}();
  jQuery(document).ready(function() {   
    jQuery('#ajaxLoad').remove();
     SweetAlert.init();
});
</script>
<?php if($editAction){?>
<script type="text/javascript">
 jQuery(document).ready(function() {

  $( "#sortable_portlets" ).sortable();
    $( ".sortdisable" ).disableSelection();
    $('#sortable_portlets').sortable({
       cancel: ".sortdisable",
       update: function( event, ui ) {
         var sortedIDs = $( "#sortable_portlets" ).sortable( "toArray",{attribute: 'data-id'} );
         console.log(sortedIDs);
       console.log('sort-->'+sortedIDs);
             // var order = []; 
             // $('#sortable_portlets .portlet-sortable').each( function(e) {
             //    order.push( $(this).attr('data-id') );
             //  });
             // var sortList =  order.join(",");
             // console.log(sortList);
             jQuery.ajax({
          url : '<?php echo $base_url?>company/cust_contact_sort',
          type: 'POST',
          data: {"sortorder":sortedIDs,"type":"contact"},
          success:function(response){    
            //  console.log(response);
            // return false;
            toastr.options = {
              "closeButton": true,
            }
            toastr.success("Customer Contact Order updated Successfully", "Notifications");
             setTimeout(function(){ location.reload(); }, 500);      
            }
          });
        }
    });
  /**************************************************/

 

jQuery('#garage_name').editable({
    type: 'text',
    title: 'Enter Customer Name', 
    data :  'garage_name',
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
       console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#cname').text(newValue);
    }
});
jQuery('#garage_email').editable({
    type: 'text',
    title: 'Enter Email',   
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#cname').text(newValue);
    }
});
jQuery('#latitude').editable({
    type: 'text',
    title: 'Enter latitude',   
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#latitude').text(newValue);
    }
});
jQuery('#longitude').editable({
    type: 'text',
    title: 'Enter longitude',   
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#longitude').text(newValue);
    }
});
jQuery('#garage_website').editable({
    type: 'text',
    title: 'Enter Website',   
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#cname').text(newValue);
    }
});
jQuery('#garage_phone').editable({
    type: 'text',
    title: 'Enter Phone no',   
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#cname').text(newValue);
    }
});
// jQuery('#about_garage').editable({
//     type: 'text',
//     title: 'Enter About',   
//     url:  '<?php echo $base_url?>/garage/garage_save_company',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
//        $('#cname').text(newValue);
//     }
// });
jQuery('#address_line_1').editable({
    type: 'textarea',
    title: 'Enter Address',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#address_line_2').editable({
    type: 'textarea',
    title: 'Enter Address',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#posttown').editable({
    type: 'textarea',
    title: 'Enter Address',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#country').editable({
    type: 'textarea',
    title: 'Enter country',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#garage_photos').editable({
    type: 'textarea',
    title: 'Enter Address',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#owner_name').editable({
    type: 'textarea',
    title: 'Enter owner name',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
jQuery('#eir_code').editable({
    type: 'textarea',
    title: 'Enter code',  
    placement: 'right',  
    url:  '<?php echo $base_url?>/garage/garage_save_company',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
}); 
 
// jQuery('#customer_fob').editable({
//     type: 'textarea',
//     title: 'Enter Customer FOB',   
//     placement: 'right', 
//     url:  '<?php echo $base_url?>/company/cust_additional_info',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
       
//     }
// });
// jQuery('#cust_ship_info').editable({
//     type: 'textarea',
//     title: 'Enter Customer Ship Info', 
//     placement: 'right',   
//     url:  '<?php echo $base_url?>/company/cust_additional_info',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
       
//     }
// });
// jQuery('#customer_ship_via').editable({
//     type: 'textarea',
//     title: 'Enter Customer Ship Via',   
//     placement: 'right', 
//     url:  '<?php echo $base_url?>/company/cust_additional_info',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
       
//     }
// });
// jQuery('#customer_project').editable({
//     type: 'textarea',
//     title: 'Enter Customer Project', 
//     placement: 'right',  
//     url:  '<?php echo $base_url?>/company/cust_additional_info',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
       
//     }
// });

// jQuery('#customer_ship_date').editable({
//     type: 'date',
//     format: 'mm/dd/yyyy',
//     title: 'Enter Customer Ship Date',   
//     url:  '<?php echo $base_url?>/company/cust_additional_info',
//     success: function(response, newValue) {
//       console.log(response);
//        if(response.status == 'error') return response.msg; 
       
//     }
// });

 jQuery(".modal").on("hidden.bs.modal", function(){
    jQuery(this).find(".modal-content").html("");
     });


 
 }); 

 
</script>   
<script type="text/javascript">
  
jQuery(document).ready(function()
{


   jQuery("#garage_edit").validate({
         debug: true,
        rules: {
             address:{
                required:true
            },
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },

            phone: {
                required:true,
               
            },
        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email: "Please enter your Email ID",
          phone:{
           required: "Please enter your Mobile Number",

       },
       address:{required:"enter enter your address"},
    phone: {required:"please provide contact number"},
        },

     highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('garage_edit')[0]);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/update_details", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    if(data =='1')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.success("Details updated successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }
                    
                    else
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Error in update", "Notifications");
                    }
                }
            });
            return false;
        }
     });



     jQuery("#garage_password_change").validate({
         debug: true,
        rules: {
             current_password:{
                required:true
            },
            new_password: {
                required: true,
            },
            conform_password: {
                required: true,
                equalTo : "#new_password"
            },
        
        },
        messages: {
          current_password: "Please enter your password",
          new_password: "Please enter your new password",
           conform_password: {
            required: "Please enter a confirm password",
            equalTo: "Your Confirm password must be Equal to  new password"
          },
          },

     highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('garage_password_change')[0]);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/changepassword", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    if(data =='1')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.success("Details updated successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }

                       else if(data =='2')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Current password is not valid", "Notifications");
                        //setTimeout(function(){ location.reload(); }, 500); 
                    }
                    
                    else
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Error in update", "Notifications");
                    }
                }
            });
            return false;
        }
     });


})



    document.getElementById("profile_image").onchange = function () {
    if (this.value.match(/\.(jpeg|bmp|jpg|gif|png)$/)) {
        // document.getElementById("profie_picture").value = this.value;
         // $('#output1').css('display','block');
    var output2 = document.getElementById('profile_img');
    output2.src = URL.createObjectURL(event.target.files[0]);
    } else {
        this.value = "";
        alert("selected file Must be a jpeg or jpg or gif or png.");
    }
};


    function PreviewImagefile() {
                //$('.preview_id_file').css('display','block');
                pdffile=document.getElementById("id_proof").files[0];
                pdffile_url=URL.createObjectURL(pdffile);

                $('.id_proof_img').attr('src',pdffile_url);
       
            }

</script>

<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>
<?php }?>
