<!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo 'Customers List'; ?>                
                    </h1>
 
                    <a href="<?php echo $base_url;?>admin/customer/create"  data-toggle="modal"  class="aedit_details" data-target="#customeradd"> <i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs" >Add New Customer&nbsp;</span>&nbsp; </a>
                      <br></br>
                        

                           <table id="customer_details" class="table table-bordered datatable table-responsive" > 
                            <thead  class="thead_styles">
                                <tr>
                                    <th>#</th>
                                    <!-- <th>Profile Picture</th>  -->
                                    <th>Name</th>
                                    <th>Mail Id</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                 $i=0;
                                if(!empty($customer_details)){
                                foreach ($customer_details as $details) {  

                                    $i++; 
                                    $userid = $details->id_user_master;
                                    $site_admin = $details->site_admin;
                                    $status = $details->status;
                                    $profile_image  =$details->profile_image;
                                    if(!empty($site_admin))
                                    {
                                      if($status =='1') { $status_dis = '<span class="label label-sm label-success">Active</span>'; }
                                      else if($status =='0') { $status_dis = '<span class="label label-sm  label-warning">In Active</span>'; }
                                      else {  $status_dis = '<span class="label label-sm  label-danger">Deleted </span>';}
                                    } else { $status_dis = '<span class="label label-sm label-info">Pending</span>';  }

                                    ?>
                                    <tr>
                                        <td ><?php echo $i;?></td>
                                       
                                      <!--   <td><img alt=""  class="profile_images" src="<?php echo BASE_URL;?>/uploads/images/profile_images/<?php echo $profile_image;?>"></td> -->
                                        <td><?php echo $details->username;?></td>
                                        <td><?php echo $details->email;?></td>
                                        <td><?php echo $status_dis;?></td>
                                        <td>
                                           <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo BASE_URL;?>/admin/customer/customerview/<?php echo $userid;?>">
                                 <i class="fa fa-eye"></i>
                                 </a>
                                          <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo $base_url;?>admin/customer/edit_details/<?php echo $userid;?>?x=<?php echo date('ymd'); ?>" data-toggle="modal"  class="edit_details" data-target="#customer"><i class="fa fa-edit"></i></a> 

                                          <?php 

                                            if(empty($site_admin))
                                              {?>


  <a class="btn btn-circle btn-icon-only btn-default approve_details" onclick="approve_customer('<?php echo $userid;?>')" data-toggle="modal"  class="edit_details" data-target="#customer"><i class="fa fa-check"></i></a> 
                                               <!--  <a  onclick="approve_customer('<?php echo $userid;?>')" class="approve_details"><i class="fa fa-check-square-o"></i></a> 
 -->
                                             <?php  }
                                          ?>
                                               <a class=" btn btn-circle btn-icon-only btn-default mt-sweetalert-delete" data-title="Are you sure you want to delete user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="Cancel" data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $userid;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </a>

                                        <!--   <a onclick="delete_customer('<?php echo $userid;?>')"  class="delete_details"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                           
                                        </td>

                                    </tr>       



                                <?php } } else{echo '<td colspan= 6 >No data available </td>';}?>
                          

                                       
                           
                    
                            </tbody>
                            </table>
             
</div>
</div>


  <!-- Modal -->
<div class="modal" id="customeradd" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content">
         
        </div>
    </div>
</div>

           <!-- END CONTENT -->
  <!-- Modal -->
<div class="modal fade" id="customer" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content">
         
        </div>
    </div>
</div>

           <!-- END CONTENT -->


<script>
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
                                 url: '<?php echo $base_url?>/admin/customer/delete_company',
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
jQuery(document).ready(function() {

  $('#customer_details').DataTable();
})


function approve_customer(userid){

var activate = 'deactivate';
   
swal({
  title: "Are you sure? Want to approve  the customer !",
  // text: "Want to confirm the user !",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Confirm!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
        if (isConfirm) {
           $.ajax(
                          {
                              type: "post",
                              url: "<?php echo BASE_URL;?>/admin/customer/approve",
                              data: {"user_id":userid},
                             dataType: 'json',
                          success: function(response)
                          { 

                          },
                          failed: function (response)
                          {
                            alert('failde');
                            exit();
                          }
                         })

                 swal("User Approved successfully!", "success");
              setTimeout(
                        function() 
                        {
                           location.reload();
                        }, 2000);
        } else {
          swal("Cancelled", "Approved cancelled", "error");
        }

});
 // location.reload(); 
}



function delete_customer(userid){

   
swal({
  title: "Are you sure? Want to delete  the customer !",
  // text: "Want to confirm the user !",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Confirm!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
        if (isConfirm) {
           $.ajax(
                          {
                              type: "post",
                              url: "<?php echo BASE_URL;?>/admin/customer/delete_customer",
                              data: {"user_id":userid},
                             dataType: 'json',
                          success: function(response)
                          { 

                          },
                          failed: function (response)
                          {
                            
                          }
                         })

                 swal("User Deleted successfully!", "success");
              setTimeout(
                        function() 
                        {
                           location.reload();
                        }, 2000);
        } else {
          swal("Cancelled", "Cancelled", "error");
        }

});
 // location.reload(); 
}


</script>
