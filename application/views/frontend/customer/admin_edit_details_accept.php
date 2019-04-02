  <style type="text/css">
    
    .order_request_status {
      text-align: right;
    }
  </style>



  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" style="text-align: center;">Order Details Changed By Admin</h3>
      </div>
      <div class="modal-body">
      <?php

      foreach ($order_results as $value) {
        $id =$value['id'];

      	$move_date  = $value['move_date'];
      	$arrival_time  = $value['arrival_time'];

      	$admin_order_details_edit = $value['admin_order_details_edit'];
        $customer_needtopay = $value['customer_needtopay'];
        $admin_refund_amt = $value['admin_refund_amt'];
        $final_price = $value['final_price'];


	?>
     <h5><b>Before Change Location:</b></h5>
     <span>Paid Amount: </span> <span>$ <?php echo $final_price ?></span>
     <h5><b>After Change Location:</b> </h5> 
     <?php if($admin_refund_amt!=''){?>
         <span>Refound Amount: </span> <span>$ <?php echo $admin_refund_amt ?> </span>
     <?php }?>

     <?php if($customer_needtopay!=''){?>
         <span>Need To Pay Amount: </span> <span>$ <?php echo $customer_needtopay ?></span>
     <?php }?>
     




      	<?php  }
?>

<br>
          <div class="row">
           <div class="col-md-12 order_request_status">

                      <button type="button" class="btn btn-danger  reject_request_time"><i class="fa fa-remove"></i>&nbsp;Reject</button> 
                       <button type="button" class="btn btn-success  approve_request_time"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;Approve</button>
                        
              </div>
            </div>


      </div>

      <script type="text/javascript">
        

        jQuery(document).on("click",".approve_request_time",function()
        {

var order_id ='<?php echo  $id ?>';
var re_request_move_date  = '<?php echo $re_request_move_date?>';
var re_request_arraival_time  = '<?php echo $re_request_arraival_time?>';

 $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/approve_request_time", 
                type: "POST",             
                data: {'order':order_id,'re_request_move_date':re_request_move_date,'re_request_arraival_time':re_request_arraival_time},             
                dataType:'json',    
                success: function(data) {

                  //  toastr.success(" updated  successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 


                }, complete: function(data) {

                   // exit();
                 
                 toastr.success(" updated  successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });





        })


         jQuery(document).on("click",".reject_request_time",function()
        {

var order_id ='<?php echo  $id ?>';
var re_request_move_date  = '<?php echo $re_request_move_date?>';
var re_request_arraival_time  = '<?php echo $re_request_arraival_time?>';

 $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/reject_request_time", 
                type: "POST",             
                data: {'order':order_id,'re_request_move_date':re_request_move_date,'re_request_arraival_time':re_request_arraival_time},             
                dataType:'json',    
                success: function(data) {

                  //  toastr.success(" updated  successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 


                }, complete: function(data) {

                   // exit();
                 
                 toastr.success(" rejected  successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });





        })


      </script>