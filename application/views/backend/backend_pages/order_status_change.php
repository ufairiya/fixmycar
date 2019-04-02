

<style type="text/css">
	
#order_stauts_update .status_heading{font-weight: bold;text-align: center;}
.send_order_status {border: 2px solid white;padding: 8px;background: #17C4BB;color: white;border-radius: 5px!important;}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


  <div class="modal-header">
  <?php if(strpos($order_id, '%') != false){
    $order_ids =explode('%', $order_id);
    $order_id =$order_ids[0];
    // print_r($order_details);
    if(!empty($order_details)){
    $order_status_show = $order_details->order_status;
    
  }else{
     $order_status_show = '';
  }
}?>
        <!-- <h3>#Order <?php echo $order_id;?></h3> -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
    </div>
        <div class="modal-body">
<form action="" id="order_stauts_update" name="order_stauts_update" enctype="multipart/form-data" method="post">
          <h3 class="status_heading"> Update status for order #<?php echo $order_id;?></h3>
          <br>
          <div class="row">
          <div class="col-md-12">
              <div class="col-md-6">
              <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
            <select class="form-control"  name="order_status" id="order_status" required="">
          	<option value="">Select order Status</option>
            <option value="Accepted" <?php if($order_status_show == 'Accepted'){echo $selected = 'selected'; } ?>>Confirmed</option>
          	<option value="Completed" <?php if($order_status_show == 'Completed'){echo $selected = 'selected'; } ?>>Completed</option>
          	<!-- <option value="Payment incomplete">Payment Pending</option> -->
            <option value="Cancelled" <?php if($order_status_show == 'Cancelled'){echo $selected = 'selected'; } ?>>Cancelled</option>
          	
          </select> 
          </div>
          <!-- <div class="" style="clear:both;"> -->
          <div class="col-md-6">
          	<span><button type="button" class="btn send_order_status">update</button></span>
          </div>
          </div>
          </div>
          <br>
          <br>
          <br>

          



</form>
      </div>

<script type="text/javascript">

 jQuery(document).on("click",".cancel_comment",function()
    {

       jQuery('#ajax').modal('hide');

    });

jQuery(document).ready(function(){
  jQuery('.error_reviewstar').hide();
})


 jQuery(document).on("click",".send_order_status",function(e)
{

  var order_id = $('#order_id').val();
  //alert(order_id);

  // var star_count =jQuery("#star_count").val();
  var order_status =jQuery("#order_status").val();
 // alert(order_status);

  // var review_comments_box =jQuery("#review_comments_box").val();

// if(order_status==''){
// jQuery('.error_reviewstar').show();
//   // alert('order_status' + order_status );
// }else{
//   jQuery('.error_reviewstar').hide();
// }
if(order_status!=''){
   $.ajax({
                url: "<?php echo BASE_URL; ?>/home/update_order_status", 
                type: "POST",
                async: true,     
                data: {'order_id':order_id,'order_status':order_status},             
                dataType:'json',    
                success: function(data) {
                //   console.log(data);

                      if(data['status'] ==1)
                    { 
                      toastr.success(data['message'], "Notifications");
                      setTimeout(function(){ 
                          // $('#alert_modal_accept').modal('hide');
                          location.reload();
}, 3000); 
                    }else{
                      if(data['message'] !='')
                        toastr.error(data['message'], "Notifications");
                      else
                        toastr.error("Error in status update", "Notifications");


                    }

               
               
                    setTimeout(function(){ location.reload();}, 3000); 
                
          

                }
            });

    e.stopImmediatePropagation();
    return false;
  }


// else{
//    toastr.success("please fill all fields", "Notifications");
// }
 });
      </script>