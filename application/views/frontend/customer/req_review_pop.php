<div class="modal-header">
<div class="col-md-12">
      <div class="col-md-6">
        <h2 class="heading" style="font-size:13px;">Subject: Request to Edit a Review</h2>
      </div>
      <div class="col-md-6">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
</div>
          
</div>
<div class="modal-body">
<form id="review_edit_pop" name="review_edit" type="multipart/form-data" method="post">
          <p class="heading" style="font-size:15px;">Please Explain Your Reason for
          waiting to Edit a Review</p>

          <textarea class="form-control" id="review_reason" name="reason"></textarea>
          <input type="hidden" name="orderid" id="orderid" value="<?php echo $orderid;?>">

    <div>
   
    <button type="button" class="btn send_button" onclick="get_idhyftgg('<?php echo $orderid;?>')">SEND</button>
    <button class="btn btn-danger cancel_comment">CANCEL</button> 

    
</div>

</form>
</div>

<script type="text/javascript">
    
/****************************jamuna*********************************/
  function get_idhyftgg(order_id)
  {
   console.log(order_id);
  
  var get_reason = $('#review_reason').val();
   //alert(get_reason);

  $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/review_request_mail/",
                type: "POST",             
                data: {'order':order_id,'get_reason':get_reason},             
                dataType:'json',    
                success: function(data) {
                // console.log(data);
              
                }, complete: function(data) {

                   // exit();
                 
                 toastr.success(" Your Mail Request Send Successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 
                 }
            });





        }

/******************************jamuna**************************************/






</script>