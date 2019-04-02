<!-- BEGIN CONTENT -->
<style type="text/css">
   .searchbtn{
   margin-top: 24px!important;
   }
</style>
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h1 class="page-title">Customer List</h1>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
            <li> <span>List of customer</span> </li>
         </ul>
      </div>
      <div class="row">
         <div class="col-md-6">
            <form id="searchuser_type" class="horizontal-form" method="post">
               <div class="form-group">
                  <label for="form_control_1"><?php echo $this->lang->line('user type'); ?></label>
                  <select name="user_type" class="form-control user_type" id="user_type">
                     <option value="">Select User Type</option>
                     <option value="all">All</option>
                     <optgroup label="Status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pilot">Pilot</option>
                     </optgroup>
                     <optgroup label="Customer Type">
                        <?php if($customer_type_details != FALSE){
                           foreach($customer_type_details as $customer_type){
                           ?>
                        <option value="<?php echo $customer_type->customer_type_code ?>"><?php echo $customer_type->cust_type_name ?></option>
                        <?php }                                         
                           } ?> 
                     </optgroup>
                  </select>
               </div>
         </div>
         <div class="form-actions right">          
         <button type="button" class="btn blue searchbtn">
         <i class="fa fa-check"></i> Filter List</button>
         </div>
         </form>
      </div>
      <div class="row">
         <div class="col-md-12">
            <?php ?>                                           
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
               <div class="portlet-title">
                  <div class="caption">
                     <span class="caption-subject sbold">Customer List</span>
                  </div>
               </div>
               <div class="portlet-body">
                  <table class="table table-striped table-bordered table-hover font_body" id="users_list">
                     <thead>
                        <tr>
                           <th style="display: none"> SL.NO # </th>
                           <th> Cust # </th>
                           <th> Customer</th>
                           <th> Contact</th>
                           <th> Phone</th>
                           <th> Type</th>
                           <th> <?php echo $this->lang->line('email'); ?> </th>
                           <?php if(!is_admin() && $userType !='sales_rep'){?>
                           <th>LinkedRep</th>
                           <?php } ?>
                           <th> <?php echo $this->lang->line('action'); ?> </th>
                           <th> <?php echo $this->lang->line('status'); ?> </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           if($list_of_company != FALSE){ 
                           $i = 0;
                           foreach($list_of_company as $userkey =>$companyInfo){
                              $i++;
                              $urefNumber = isset($companyInfo->company_cust_code) ? $companyInfo->company_cust_code : '';
                              $companyname = isset($companyInfo->company_name) ? $companyInfo->company_name  :'';
                              if($companyname == 'Null'){
                                 $companyname = '-';
                              }
                              $fname = isset($companyInfo->company_contact) ? $companyInfo->company_contact  :'';
                              if($fname == 'Null'){
                                 $fname = '-';
                              }
                              $phone = isset($companyInfo->company_phone) ? $companyInfo->company_phone  :'';
                              if($phone == 'Null'){
                                 $phone = '-';
                              }
                              $extention = isset($companyInfo->extention) ?$companyInfo->extention  :'';
                              if($extention == 'Null'){
                                 $extention = '';
                              }
                              if($phone !='Null' && $extention !='Null' )
                              {
                                 $ext=', ext '.$extention;
                              }
                             else{
                                  $ext ='';
                              }
                             
                              $email_address = isset($companyInfo->company_email_address) ? $companyInfo->company_email_address  :'';
                              if($email_address == 'Null'){
                                 $email_address = '-';
                              }
                              $status = isset($companyInfo->company_status) ? $companyInfo->company_status  :'';
                              if($status == 'Null'){
                                 $status = '-';
                              }
                              $companyId = isset($companyInfo->id_company) ? $companyInfo->id_company  :'';
                              if($companyId == 'Null'){
                                 $companyId = '-';
                              }
                              $customer_type = isset($companyInfo->cust_type_name) ? $companyInfo->cust_type_name  :'';
                              if($customer_type == 'Null'){
                                 $customer_type = '-';
                              }
                              $active_rep = 0;
                              if($status == 4)
                              {
                                 $dispstatus = '<span class="label label-sm label-warning"> Pilot </span>' ;
                              }
                               
                               else{
                              $dispstatus = ($status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-info"> InActive </span>' );
                            }
                             if(!is_admin() && $userType !='sales_rep'){
                              $active_rep = isset($companyInfo->active_rep) ? $companyInfo->active_rep  :'';
                                $dispLinkstatus = ($active_rep == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : '<span class="label label-sm label-info"> InActive </span>' ;
                             }else{
                               
                           
                                 $dispLinkstatus  ='';
                                 $active_rep = 1;
                             }
                           
                           
                            $aActions = array(
                               // 'Edit' => array('icon'=>'fa fa-edit','href'=>$base_url.'company/get_company_template/'.$companyId,'popup'=>'data-target="#ajax" data-toggle="modal"'),
                               'View' => array('icon'=>'icon-docs','href'=>$base_url.'company/view/'.$companyId),
                               'Delete' => array('icon'=>'icon-trash',
                                 'class'=>"mt-sweetalert-delete",
                                 'href'=>'#','popup'=>'data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="'.$companyId.'"'
                                 ),
                               'Create PO' => array('icon'=>'icon-docs','href'=>$base_url.'purchase_order/create/'.$companyId),
                           
                             );
                            $viewLink = $base_url.'company/view/'.$companyId;
                             ?>
                        <tr>
                           <td style="display: none"><?php echo $i;?></td>
                           <td> <?php echo $urefNumber;?> </td>
                           <td> <?php echo $companyname;?> </td>
                           <td> <?php echo $fname;?> </td>
                           <td> <?php echo $phone.$ext;?> </td>
                           <td> <?php echo $customer_type;?> </td>
                           <td> <?php echo $email_address;?> </td>
                           <?php if(!is_admin() && $userType !='sales_rep'){?>
                           <td> <?php echo $dispLinkstatus;?> </td>
                           <?php } ?>
                           <td>
                              <div style="width:100px !important;">
                                 <?php if($viewCustAction == TRUE && $active_rep == 1 || $active_rep != 1){?> 
                                 <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo $viewLink;?>">
                                 <i class="fa fa-eye"></i>
                                 </a>
                                 <?php } ?>
                                 <?php if($status !=2  && $deleteCustAction  == TRUE){?>
                                 <a class=" btn btn-circle btn-icon-only btn-default mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="<?php echo $companyId;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </a>
                                 <?php } ?>
                              </div>
                           </td>
                           <td> <?php echo $dispstatus;?> </td>
                        </tr>
                        <?php } }?>
                     </tbody>
                  </table>
               </div>
            </div>
            <?php ?>
            <!-- END EXAMPLE TABLE PORTLET-->
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

<script type="application/javascript">
   jQuery(document).ready(function(e) {
      var table = jQuery('#users_list');

      var oTable = table.dataTable({

         "language": {
            "aria": {
               "sortAscending": ": activate to sort column ascending",
               "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ <?php echo $this->lang->line('entries'); ?>",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ <?php echo $this->lang->line('entries'); ?>",
            "search": "<?php echo $this->lang->line('search'); ?>:",
            "zeroRecords": "No matching records found"
         },

         "bDestroy": true,

         buttons: [
            // { extend: 'pdf', className: 'btn default' },
            // { extend: 'csv', className: 'btn default' }
         ],

         "order": [
            [0, 'asc']
         ],

         "lengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "All"] // change per page values here
         ],
         "pageLength": localStorage.getItem("entrievalues"),

         "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
      });


      var SweetAlert = function() {

         return {
            //main function to initiate the module
            init: function() {
               jQuery('.mt-sweetalert-delete').each(function() {
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


                  jQuery(this).click(function() {
                     var key = $(this).attr('data-uid');
                     var task = $(this).attr('data-task');
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
                        function(isConfirm) {
                           if (isConfirm) {
                              jQuery.ajax({
                                 url: '<?php echo $base_url?>/company/delete_company',
                                 type: 'POST',
                                 data: {
                                    'key': key,
                                    'task': task
                                 },
                                 success: function(response) {
                                    // alert(response);
                                    //         return false;
                                    toastr.options = {
                                       "closeButton": true,
                                    }
                                    toastr.warning("User Deleted Succesfully", "Notifications");
                                    setTimeout(function() {
                                       location.reload();
                                    }, 500);
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
         jQuery(".modal").on("hidden.bs.modal", function() {
            jQuery(this).find(".modal-content").html("");
         });
         jQuery('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
            e.stopPropagation();
         });
      });

      function Custable() {
         var table = jQuery('#users_list');

         var oTable = table.dataTable({

            "language": {
               "aria": {
                  "sortAscending": ": activate to sort column ascending",
                  "sortDescending": ": activate to sort column descending"
               },
               "emptyTable": "No data available in table",
               "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ <?php echo $this->lang->line('entries'); ?>",
               "infoEmpty": "No entries found",
               "infoFiltered": "(filtered1 from _MAX_ total entries)",
               "lengthMenu": "_MENU_ <?php echo $this->lang->line('entries'); ?>",
               "search": "<?php echo $this->lang->line('search'); ?>:",
               "zeroRecords": "No matching records found"
            },

            "bDestroy": true,

            buttons: [
               // { extend: 'pdf', className: 'btn default' },
               // { extend: 'csv', className: 'btn default' }
            ],

            "order": [
               [0, 'asc']
            ],

            "lengthMenu": [
               [25, 50, 100, -1],
               [25, 50, 100, "All"] // change per page values here
            ],
            "pageLength": localStorage.getItem("entrievalues"),

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
         });

      }
      jQuery(document).on('click', '.searchbtn', function() {
         var cus_type = jQuery('.user_type').val();
         console.log(cus_type);
         jQuery.ajax({
            url: '<?php echo $base_url?>company/search_cus_type',
            type: 'POST',
            data: {
               'cus_type': cus_type
            },
            dataType: 'JSON',
            success: function(response) {
               console.log(response);
               //var table = jQuery('#users_list');
               oTable.fnDestroy();
               jQuery('#users_list tbody').html(response['result']);


               //oTable.destroy();
               //table.empty();
               // $('#users_list').dataTable();

               Custable();
               SweetAlert.init();

            }
         });
      })
   });
   jQuery(document).ready(function() {
      jQuery('#users_list_length select').on('change', function(e) {
         var optionSelected = jQuery(".user_select").val();
         localStorage.setItem("entrievalues", optionSelected);
         jQuery.ajax({
            url: '<?php echo $base_url?>company/entries_val',
            type: 'POST',
            data: {
               'entrieval': store
            },
            dataType: 'JSON',
            success: function(response) {
               console.log(response);
            }
         });
      });
   });
   // jQuery(document).ready(function() {
   //     var entrievalue = <?php echo $entries_val;?>

   //     alert(localStorage.getItem("entrievalues"));

   //     // var i;
   //     // var x = jQuery('.user_select').find('option').length;
   //     // console.log(x);
   //     // for (i = 0; i < x.length; i++) {
   //     //     var txt = txt + "\n" + x.options[i].value;
   //     // }
   //     // alert(txt);

   // });
</script>

