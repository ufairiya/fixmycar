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
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"><?php echo $title;?></h1>
                    <div class="page-bar">
                <ul class="page-breadcrumb">
              <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
              <li> <span><?php echo $title;?></span> </li>
            </ul>
           </div>
           <?php
// echo '<pre>';print_R($get_company);echo '</pre>';
$custCode = isset($get_company->company_cust_code) ? $get_company->company_cust_code : '';
$companyName = (isset($get_company->company_name) && $get_company->company_name !='') ? $get_company->company_name : '';
$companyID = (isset($get_company->id_company) && $get_company->id_company !='') ? $get_company->id_company : '';
$companyContact= (isset($get_company->company_contact) && $get_company->company_contact !='') ? $get_company->company_contact : '';
$companyPhone = (isset($get_company->company_phone) && $get_company->company_phone !='') ? $get_company->company_phone : '';
$companyCustType = (isset($get_company->cust_type_name) && $get_company->cust_type_name !='') ? $get_company->cust_type_name : '';

$customer_notes = (isset($get_company->customer_notes) && $get_company->customer_notes !='') ? $get_company->customer_notes : FALSE;

if($customer_notes == 'Null'){
  $customer_notes = '';
}
$customer_terms = (isset($get_company->cust_terms) && $get_company->cust_terms !='') ? $get_company->cust_terms : 'Add terms';
$companyEmail = (isset($get_company->company_email_address) && $get_company->company_email_address !='') ? $get_company->company_email_address : '';
$companyAddress = (isset($get_company->company_address_Details) && $get_company->company_address_Details !='') ? $get_company->company_address_Details : array();

$companyContacts = (isset($get_company->company_contact_Details) && $get_company->company_contact_Details !='') ? $get_company->company_contact_Details : array();
$add_Contact_link = BASE_URL.'/company/get_company_add_contact_temple/'.$companyID;
$add_address_link = BASE_URL.'/company/get_company_add_address_temple/'.$companyID;
$PO_create_link = BASE_URL.'/purchase_order/create/'.$companyID;
$add_custnotes_link = BASE_URL.'/company/get_customer_add_notes_temple/'.$companyID;
$edit_custnotes_link = BASE_URL.'/company/get_customer_add_notes_temple/'.$companyID.'/edit';
$Add_assigned_rep_link = BASE_URL.'/company/get_customer_add_sales_rep_temple/'.$companyID.'/add';
$custInfoEdit = BASE_URL.'/company/get_company_template/'.$companyID;
// $custInfoEdit = '#';
$contactCount  =0;
?>
           
               <div class="row">
                 <div class="col-md-12"> 
                 <div class="tab-content">
                 <div class="tab-pane active" id="companyInfo">  
                  <div class="portlet light bordered">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="icon-equalizer font-green-haze"></i>
                              <span class="caption-subject font-green-haze bold uppercase">Customer Information</span>
                              <span class="caption-helper">(Cust Code # <?php echo $custCode;?>)</span>
                          </div>

                         
                      </div>

                      <div class="portlet-body form">
                              <a class="btn btn-success" href="<?php echo $add_Contact_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" >
                              Add New Contact <i class="fa fa-plus"></i>
                              </a>

                              <a class="btn btn-success" href="<?php echo $add_address_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" >
                              Add New Address <i class="fa fa-plus"></i>
                              </a> 

                              <a class="btn btn-primary sblue" href="<?php echo $PO_create_link;?>"  >
                              Add New Invoice <i class="fa fa-plus"></i>
                              </a>

                             
                          
                              <div class="form-body">
                                  <h2 class="margin-bottom-20"> Customer Info - <span id="cname"><?php echo $companyName;?></span> </h2>

                                <div class="row">
                                    <div class="col-md-6"  >
                                <div class="portlet box green">
                                  <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-gift"></i>Customer Info
                                    </div>
                                  <div class="actions">
                                    <a href="<?php echo $custInfoEdit;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>
                                  </div>
                                  </div>
                                  <div class="portlet-body form" style="min-height: 187px;">
                                 

                                  <div class="row">
                                      <div class="col-md-12" >
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Code #:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $custCode;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>

                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Name:</label>
                                              <div class="col-md-9">

                                                  <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="company_name"> <?php echo $companyName;?> </a></p>
                                              </div>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                   <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Type:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"><?php echo $companyCustType;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                       <div class="form-group">
                                       <label class="control-label col-md-3">Assigned REPS:
                                       <a href="<?php echo $Add_assigned_rep_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" class="">
                                        <i class="fa fa-pencil"></i>  </a></label>
                                         <div class="col-md-9">
                                       <div class="control-label bootstrap-tagsinput salestag">
                                       <?php if(count($assignedSalesREP) > 0 && $assignedSalesREP != FALSE){
                                       
                                        foreach($assignedSalesREP as $key => $val){
                                          ?>
                                        <span class="tag label label-info"  ><?php echo $val;?></span> 
                                          <?php }}?>
                                        </div>
                                         </div>
                                        </div>
                                         </div>
                                  
                                  </div>

                                 <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Terms:</label>
                                              <div class="col-md-9">

                                                  <p class="form-control-static"><a href="javascript:;" data-type="text" class=" wclor editable" data-pk="<?php echo $companyID;?>"  id="customer_terms"> <?php echo $customer_terms;?> </a></p>
                                              </div>
                                          </div>
                                      </div>

                                  </div>

                                  </div>

                                  </div>
                                  </div>

                                  <div class="col-md-6">
                                  <div class="portlet box green">
                                  <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-gift"></i>Customer Notes
                                    </div>
                                  <div class="actions">
                                  <?php $noteLink = ($customer_notes != FALSE) ? $edit_custnotes_link : $add_custnotes_link; 
                                    $notesLabel = ($customer_notes != FALSE) ? 'Edit' : 'Add';
                                  ?>
                                    
                                    <a href="<?php echo $noteLink;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> <?php echo $notesLabel;?> </a>
                                  </div>
                                  </div>
                                 
                                  <div class="portlet-body">
                                 

                                  <div class="row">
                                   <div class="col-md-12">

                                          <div class="form-group">
                                              
                                              <div class="col-md-12 scroller" style="    height: 150px; overflow-y: scroll;">
                                               <?php if($customer_notes != FALSE){?>
                                                  <p class="form-control-static"  ><?php echo $customer_notes;?> </p>
                                               <?php }else{ ?>
                                                    --
                                               <?php } ?>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                  
                                 

                                  </div>

                                  </div>
                                  </div>
                                  </div>
                                 <div class="row ui-sortable" id="sortable_portlets">
                                  <?php if(count($companyContacts) > 0) {
                                    $i  =0;
                                    $k=0;

                                    $contactCount = count($companyContacts);
                                  foreach($companyContacts as $contactInfo){
                                    $i++;
                                    $k++;
                                    $id_company_contact = (isset($contactInfo['id_company_contact'])) ? $contactInfo['id_company_contact'] : FALSE;

                                    $company_id = (isset($contactInfo['company_id'])) ? $contactInfo['company_id'] : FALSE;
                                    $display_order = (isset($contactInfo['display_order'])) ? 
                                    $contactInfo['display_order'] : FALSE;
                                   
                                    $contact_title = (isset($contactInfo['contact_title'])) ? ucfirst($contactInfo['contact_title']) : '-';
                                    $contact_person = (isset($contactInfo['contact_person'])) ? $contactInfo['contact_person'] : '-';
                                    $contact_position = (isset($contactInfo['contact_position'])) ? $contactInfo['contact_position'] : '-';
                                    $contact_email = (isset($contactInfo['contact_email'])) ? $contactInfo['contact_email'] : '-';
                                    $desk_phone = (isset($contactInfo['desk_phone']) && $contactInfo['desk_phone'] !='') ? $contactInfo['desk_phone'] : '-';
                                    $main_phone = (isset($contactInfo['main_phone']) && $contactInfo['main_phone'] !='') ? $contactInfo['main_phone'] : '-';
                                    $mobile_phone = (isset($contactInfo['mobile_phone']) && $contactInfo['mobile_phone'] !='') ? $contactInfo['mobile_phone'] : '-';
                                  $edit_Contact_link = BASE_URL.'/company/get_company_contact_template/'.$id_company_contact;
                                  $aDisplayOrderLabel = array(
                                    '0'=>'Primary',
                                    '1'=>'Backup',
                                  );
                                  $orderLabel = (in_array($display_order,array_keys($aDisplayOrderLabel))) ? $aDisplayOrderLabel[$display_order] : 'Other';
                                  ?>
                                  <!--  <?php if($k ==1){?>
                                    <div class="row">
                                    <?php } ?> -->

                                    <div class="col-md-6 col-sm-12 sortable" data-id="<?php echo $id_company_contact;?>" data-ref="contact">
                                  <div class="portlet portlet-sortable box red lightgreen"  data-id="<?php echo $i;?>">
                                  <div class="portlet-title">
                                  <div class="caption">
                                  <i class="fa fa-gift"></i>Contact Info #<?php echo $i;?>
                                  (<?php echo $orderLabel;?>)
                                  </div>
                                  <div class="actions">
                                    <a href="<?php echo $edit_Contact_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>
                                    <?php if($contactCount > 1){?> 
                                    <a data-title="Do you want delete contact?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d"  data-task-type="contact" data-cid="<?php echo $company_id ;?>" data-uid="<?php echo $id_company_contact;?>" class="btn btn-default btn-sm mt-sweetalert-delete">
                                    <i class="fa fa-times"></i> Delete </a>
                                    <?php }?>
                                  </div>
                                  
                                  </div>
                                  <div class="portlet-body">
                                  <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">                  
                                              <label class="control-label">Name:</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p class="form-control-static"> <?php echo $contact_title.'.'.$contact_person;?> </p>
                                      </div>
                                          
                                  </div>
                                      <!--/span-->
                                  <div class="row">
                                      <div class="col-md-6">                                         
                                              <label class="control-label ">Position:</label>
                                       </div>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> <?php echo $contact_position;?> </p>
                                       
                                    </div>
                                      </div>
                                      
                                 
                                   <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">
                                          
                                              <label class="control-label ">Main Phone:</label>
                                      </div>
                                              <div class="col-md-6">
                                                  <p class="form-control-static"> <?php echo $main_phone;?></p>
                                              </div>
                                          
                                      </div>
                                      <!--/span-->
                                      <div class="row">
                                        <div class="col-md-6">

                                          <label class="control-label ">Desk Phone:</label>
                                        </div>
                                        <div class="col-md-6">
                                          <p class="form-control-static"> <?php echo $desk_phone  ;?> </p>
                                        </div>
                                      </div>
                                  <!--/row-->
                                   <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">
                                         
                                              <label class="control-label ">Mobile Phone:</label>
                                       </div>
                                        <div class="col-md-6">
                                            <p class="form-control-static"> <?php echo $mobile_phone;?> </p>
                                        </div>
                                         
                                  </div>

                                   <div class="row">   <!--/span-->
                                      <div class="col-md-6">
                                          
                                              <label class="control-label">Email :</label>
                                      </div>
                                      <div class="col-md-6">
                                          <p class="form-control-static"> <?php echo $contact_email;?></p>
                                      </div>
                                          
                                   </div>
                                      <!--/span-->
                                     
                                      
                                  </div>
                                  </div>
                                  </div>
                                  <?php if($k == 2){
                                     $k = 0;
                                    ?>
                                     <div class="clearfix"></div>
                                    <?php
                                    }?>
                                  
                                  <!--  <?php if(($k ==2) ||($contactCount == $i)){
                                    $k=0;
                                    ?>
                                    </div>
                                    <?php } ?> -->
                                  <?php  }
                                  } ?>

                      
                        <?php if(count($companyAddress) > 0){
                          $j=0;$l = 0;
                          $companyAddrCount = count($companyAddress);
                          foreach ($companyAddress as $key => $companyAddressInfo) {
                          $j++;$l++;                      
                          $address_title = (isset($companyAddressInfo['address_label']) && $companyAddressInfo['address_label'] !='') ? $companyAddressInfo['address_label'] : 'Address';
                          $id_address = (isset($companyAddressInfo['id_company_address']) && $companyAddressInfo['id_company_address'] !='') ? $companyAddressInfo['id_company_address'] : '';

                           $company_id = (isset($companyAddressInfo['company_id']) && $companyAddressInfo['company_id'] !='') ? $companyAddressInfo['company_id'] : FALSE;
                          
                          $street_address = (isset($companyAddressInfo['street_address']) && $companyAddressInfo['street_address'] !='') ? $companyAddressInfo['street_address'] : '';
                          $city = (isset($companyAddressInfo['city']) && $companyAddressInfo['city'] !='') ? $companyAddressInfo['city'] : '';
                          $state = (isset($companyAddressInfo['state']) && $companyAddressInfo['state'] !='') ? $companyAddressInfo['state'] : '';
                          $country = (isset($companyAddressInfo['country']) && $companyAddressInfo['country'] !='') ? $companyAddressInfo['country'] : '';
                          $zip_code = (isset($companyAddressInfo['zip_code']) && $companyAddressInfo['zip_code'] !='') ? $companyAddressInfo['zip_code'] : '';
                          $shipping_acnt = (isset($companyAddressInfo['shipping_acnt']) && $companyAddressInfo['shipping_acnt'] !='') ? $companyAddressInfo['shipping_acnt'] : '-';
                          $edit_Address_link = BASE_URL.'/company/get_company_edit_address_temple/'.$id_address;
                                  
                        ?>
                       <!--  <?php if($j ==1){?>
                        <div class="row">
                        <?php } ?> -->

                        <div class="col-md-6 col-sm-12 sortdisable">
                        <div class="portlet  green-meadow box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i> <?php echo $address_title;?> </div>
                                <div class="actions">
                                    <a  href="<?php echo $edit_Address_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" class="btn btn-default btn-sm">
                                        <i class="fa fa-pencil"></i> Edit </a>
                                    <?php if($companyAddrCount > 1){?>
                                     <a data-title="Do you want delete address?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want address" data-confirm-button-text="Yes" data-task="d"  data-task-type="address"  data-cid="<?php echo $company_id ;?>" data-uid="<?php echo $id_address;?>" class="btn btn-default btn-sm mt-sweetalert-delete">
                                    
                                    <i class="fa fa-times"></i> Delete </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="portlet-body">
                               
                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label ">Address:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static"><?php echo $street_address;?> </p>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label ">City:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static"><?php echo $city;?> </p>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label">State:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static"><?php echo $state;?> </p>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label ">Zip Code:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static"><?php echo $zip_code;?> </p>
                                      </div>
                                    </div>


                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label ">Country:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static"><?php echo $country;?> </p>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                       <label class="control-label ">Shipping Acnt:</label>
                                      </div>
                                       <div class="col-md-6">
                                        <p class="form-control-static">
                                        <?php echo $shipping_acnt;?> </p>
                                      </div>
                                    </div>
                                   
                                
                            </div>
                        </div>
                        </div>
                         <?php if($j == 2 && ($contactCount > 1)){
                                     $j = 0;
                                    ?>
                                     <div class="clearfix"></div>
                                    <?php
                                    }?>
                       <!--  <?php if(($j ==2) || ($companyAddrCount == $l)){
                          $j=0;
                        ?>
                        </div>
                         <?php } ?>   -->     
                                  
                         <?php 
                         }
                         } ?>
                               </div>    
                              </div>
                                                        
                      </div>
                  </div>
                  <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        </div>
                        </div>
                    </div>
  </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->        
<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img src="<?php echo $base_url;?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
            <span> &nbsp;&nbsp;Loading... </span>
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
     SweetAlert.init();
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

jQuery('#company_name').editable({
    type: 'text',
    title: 'Enter Customer Name',   
    url:  '<?php echo $base_url?>/company/company_save',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       $('#cname').text(newValue);
    }
});

jQuery('#customer_terms').editable({
    type: 'text',
    title: 'Enter Customer Terms',   
    url:  '<?php echo $base_url?>/company/customer_terms_save',
    success: function(response, newValue) {
      console.log(response);
       if(response.status == 'error') return response.msg; 
       
    }
});
 
  jQuery(".modal").on("hidden.bs.modal", function(){
    jQuery(this).find(".modal-content").html("");
  });

});

 
</script>      
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js" type="text/javascript"></script>

