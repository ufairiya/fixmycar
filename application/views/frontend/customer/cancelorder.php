<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
    </div>
        <div class="modal-body">
      		 <div class="heading_style">
                <h3>ORDER #<?php echo  $orderid;?></h3>
              </div>

              <select class="form-control" name="cancel_reason" id="cancel_reason" class="cancel_order_reason" required="">
              		<option value="">Please select a reason...</option>
              		<option value="Cancel for customer">Cancel for customer</option>
              		<option value="Cancel for myself">Cancel for myself</option>
              		<option value="Change date/arrival times">Change date/arrival times</option>
              		<option value="Can't reach customer">Can't reach customer</option>
              		<option value="Get paid">Get paid</option>
              		<option value="Other">Other</option>
              </select>

                <div class="alert alert-warning warning_display">
                  <b>Are you sure you want to cancel this order?</b> Canceling an order which has already been accepted is a big deal and your account will be <b>deactivated</b> unless you have a valid reason (accident, hospitalization, etc.)
                </div>

                <div class="alert alert-warning warning_display">
                  YOU MUST contact Movers immediately to give advance notice that you will not be showing up. <b>Call Movers Support ASAP at (800) 995-5003.</b>
                </div>

                <div class="alert alert-warning warning_display">
                  Once your message is sent, the order is not immediately cancelled. It will be waiting for a CSR to cancel on your behalf. What was your reason for cancelling this order?
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <textarea  rows="5"  class="form-control" name="notes_request" id="notes_request"></textarea>
                 </div>

                   <div class="col-md-12 align_right">

                      <button type="button" class="btn btn-danger  cancel_order" data-dismiss="modal" ><i class="fa fa-remove"></i>&nbsp;CANCEL</button> 
                       <button type="button" class="btn btn-success send_cancel_request"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;SEND REQUEST</button>
                        
                      </div>
                 </div>

          </div>

  <script type="text/javascript">
    
    jQuery(document).on("click",".admin_cancelorder",function()
    {
       jQuery('#cancelorder').modal('hide');

    });

    jQuery(document).on("click",".send_cancel_request",function()
{

  var order_id ='<?php echo  $orderid?>';
  var cancel_reason =jQuery("#cancel_reason option:selected").val();
  var notes_request =jQuery("#notes_request").val();

 // alert(cancel_reason + notes_request );
var cancel_order_reason = $('.cancel_order_reason').val();
if(cancel_order_reason){
   $.ajax({
                url: "<?php echo BASE_URL; ?>/home/cancel_order_by_admin", 
                type: "POST",             
                data: {'order':order_id,'cancel_reason':cancel_reason,'notes_request':notes_request},             
                dataType:'json',    
                success: function(data) {
                
              
               //  toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }, complete: function(data) {

                  
                 
                   toastr.success(" order cancelled successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });
 }
 else{
   toastr.warning("Please select a reason", "Notifications");
 }

});
  </script>