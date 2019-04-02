<!-- BEGIN CONTENT -->
<style type="text/css">
.control-label {
    margin-top: 7px !important;
   
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
//echo '<pre>';print_R($get_company);echo '</pre>';
$custCode = isset($get_company->company_cust_code) ? $get_company->company_cust_code : '';
$companyName = (isset($get_company->company_name) && $get_company->company_name !='') ? $get_company->company_name : '';
$companyID = (isset($get_company->id_company) && $get_company->id_company !='') ? $get_company->id_company : '';
$companyContact= (isset($get_company->company_contact) && $get_company->company_contact !='') ? $get_company->company_contact : '';
$companyPhone = (isset($get_company->company_phone) && $get_company->company_phone !='') ? $get_company->company_phone : '';
$companyCustType = (isset($get_company->cust_type_name) && $get_company->cust_type_name !='') ? $get_company->cust_type_name : '';
$companyEmail = (isset($get_company->company_email_address) && $get_company->company_email_address !='') ? $get_company->company_email_address : '';
$companyAddress = (isset($get_company->company_address_Details) && $get_company->company_address_Details !='') ? $get_company->company_address_Details : array();

$companyContacts = (isset($get_company->company_contact_Details) && $get_company->company_contact_Details !='') ? $get_company->company_contact_Details : array();
$add_Contact_link = BASE_URL.'/company/get_company_add_contact_temple/'.$companyID;
$add_address_link = BASE_URL.'/company/get_company_add_address_temple/'.$companyID;
?>
           
               <div class="row">
                 <div class="col-md-12"> 
                 <div class="tab-content">
                 <div class="tab-pane active" id="companyInfo">  
                  <div class="portlet light bordered">
                      <div class="portlet-title">
                          <div class="caption">
                              <i class="icon-equalizer font-green-haze"></i>
                              <span class="caption-subject font-green-haze bold uppercase">Company Information</span>
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
                          
                              <div class="form-body">
                                  <h2 class="margin-bottom-20"> View Company Info - <?php echo $companyName;?> </h2>
                                  <h3 class="form-section">Company Info </h3>

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Code #:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $custCode;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Name:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $companyName;?> </p>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Type:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"><?php echo $companyCustType;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>

                                  <?php if(count($companyContacts) > 0) {
                                    $i  =0;
                                  foreach($companyContacts as $contactInfo){
                                    $i++;
                                    $id_company_contact = (isset($contactInfo['id_company_contact'])) ? 
                                    $contactInfo['id_company_contact'] : FALSE;
                                   
                                    $contact_title = (isset($contactInfo['contact_title'])) ? ucfirst($contactInfo['contact_title']) : '-';
                                    $contact_person = (isset($contactInfo['contact_person'])) ? $contactInfo['contact_person'] : '-';
                                    $contact_position = (isset($contactInfo['contact_position'])) ? $contactInfo['contact_position'] : '-';
                                    $contact_email = (isset($contactInfo['contact_email'])) ? $contactInfo['contact_email'] : '-';
                                    $desk_phone = (isset($contactInfo['desk_phone']) && $contactInfo['desk_phone'] !='') ? $contactInfo['desk_phone'] : '-';
                                    $main_phone = (isset($contactInfo['main_phone']) && $contactInfo['main_phone'] !='') ? $contactInfo['main_phone'] : '-';
                                    $mobile_phone = (isset($contactInfo['mobile_phone']) && $contactInfo['mobile_phone'] !='') ? $contactInfo['mobile_phone'] : '-';
                                  $edit_Contact_link = BASE_URL.'/company/get_company_contact_template/'.$id_company_contact;
                                  
                                  ?>
                                   <h3 class="form-section">Contact Info #<?php echo $i;?>
                                   <a class="btn btn-circle btn-outline green" href="<?php echo $edit_Contact_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" >
                                            <i class="fa fa-pencil"></i> Edit 
                                   </a>

                                   
                                   
                                    </h3>
                                 
                                  <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Name:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $contact_title.'.'.$contact_person;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Position:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $contact_position;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                                   <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Main Phone:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $main_phone;?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Desk Phone:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $desk_phone;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                                  <!--/row-->
                                   <!--/row-->
                                  <div class="row">
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Mobile Phone:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $mobile_phone;?> </p>
                                              </div>
                                          </div>
                                      </div>

                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Email :</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $contact_email;?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                     
                                      
                                  </div>
                                 
                                  <?php  }
                                  } ?>

                        
                        <?php if(count($companyAddress) > 0){
                          foreach ($companyAddress as $key => $companyAddressInfo) {
                                                   
                          $address_title = (isset($companyAddressInfo['address_label']) && $companyAddressInfo['address_label'] !='') ? $companyAddressInfo['address_label'] : 'Address';
                          $id_address = (isset($companyAddressInfo['id_company_address']) && $companyAddressInfo['id_company_address'] !='') ? $companyAddressInfo['id_company_address'] : '';
                          
                          $street_address = (isset($companyAddressInfo['street_address']) && $companyAddressInfo['street_address'] !='') ? $companyAddressInfo['street_address'] : '';
                          $city = (isset($companyAddressInfo['city']) && $companyAddressInfo['city'] !='') ? $companyAddressInfo['city'] : '';
                          $state = (isset($companyAddressInfo['state']) && $companyAddressInfo['state'] !='') ? $companyAddressInfo['state'] : '';
                          $country = (isset($companyAddressInfo['country']) && $companyAddressInfo['country'] !='') ? $companyAddressInfo['country'] : '';
                          $zip_code = (isset($companyAddressInfo['zip_code']) && $companyAddressInfo['zip_code'] !='') ? $companyAddressInfo['zip_code'] : '';
                          $shipping_acnt = (isset($companyAddressInfo['shipping_acnt']) && $companyAddressInfo['shipping_acnt'] !='') ? $companyAddressInfo['shipping_acnt'] : '';
                          $edit_Address_link = BASE_URL.'/company/get_company_edit_address_temple/'.$id_address;
                                  
                        ?>
                                  <!--/row-->
                                  <h3 class="form-section"><?php echo $address_title;?> <a class="btn btn-circle btn-outline green" href="<?php echo $edit_Address_link;?>" data-target="#ajax" data-toggle="modal" data-backdrop="static" >
                                            <i class="fa fa-pencil"></i> Edit
                                   </a> </h3>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Address:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"><?php echo $street_address;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">City:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"><?php echo $city;?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">State:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo  $state;?></p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                  </div>
                                  <!--/row-->
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Zip Code:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $zip_code;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Country:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $country;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                      <!--/span-->
                                      </div>
                                     <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label col-md-3">Shipping Acnt:</label>
                                              <div class="col-md-9">
                                                  <p class="form-control-static"> <?php echo $shipping_acnt;?> </p>
                                              </div>
                                          </div>
                                      </div>
                                       </div>
                         <?php 
                         }
                         } ?>
                                  
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
  jQuery(document).ready(function() {
 
  jQuery(".modal").on("hidden.bs.modal", function(){
    jQuery(this).find(".modal-content").html("");
  });

});
</script>      


