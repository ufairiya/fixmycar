<style type="text/css">
    .pac-container{ z-index: 100000;}

</style>

<div class="modal-header">
    <span>Payment</span>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
 
if($invoice_details) {
         $order_id = $invoice_details->order_id;
        $booked_price = $invoice_details->booked_price;
        $mile_fee = $invoice_details->mile_fee;
        $admin_fee = $invoice_details->admin_fee;
        $additional_hours = $invoice_details->additional_hours;
        $mover_fee = $invoice_details->mover_fee;
        $admin_milefee_amount = $invoice_details->admin_milefee_amount;
      
        $customer_paid_famt = $invoice_details->customer_paid_famt;
        $addtion_hoursadmin_fee = $invoice_details->addtion_hoursadmin_fee;
        $stripe_paymentid = $invoice_details->stripe_paymentid;
       
?>
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Booked price:</label>
                </div>
                <div class="col-md-8">
                     <?php echo '$'.$booked_price; ?>
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Mile fee:</label>
                </div>
                <div class="col-md-8">
                    <?php echo '$'.$mile_fee;?>
                </div>
            </div>
            <br>
        </div> 
        <div style="clear:both;"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Admin Fee:</label>
                </div>
                <div class="col-md-8">
                     <?php echo '$'.$admin_fee;?>
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Additional hours:</label>
                </div>
                <div class="col-md-8">
                      <?php echo '$'.$additional_hours;?>
                </div>
            </div>
            <br>
        </div> 

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Transfered amount for Movers:</label>
                </div>
                <div class="col-md-8">
                      <?php echo '$'.$mover_fee;?>
                </div>
            </div>
            <br>
        </div> 
  
        
        <div style="clear:both;"></div>
       

<?php
//  }
}
?>
        </div>

    </div>
</div>
<div class="modal-header">
    <span>Reverse Payment</span>
    
</div>
<form id="customer_update" name="customer_update" enctype="multipart/form-data" method="post"> 
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">

                <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Reverse amount:</label>
                </div>
                <div class="col-md-8">
                      $<input type="text" name="amount" id="amount" value="">
                      <input type="hidden" name="id" id="id" value="<?php echo $stripe_paymentid;?>">
                      <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id;?>">
                       
                </div>
            </div>
            <br>
        </div> 
         <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Quantity:</label>
                </div>
                <div class="col-md-8">
                     <input type="text" name="quantity" id="quantity" value="">
                </div>
            </div>
            <br>
        </div> 
        <div style="clear:both;"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Reason:</label>
                </div>
                <div class="col-md-8">
                    <textarea name="reason" id="reason"> </textarea>
                </div>
            </div>
            <br>
        </div> 
          <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <button type="submit" class="btn btn-theme">Reverse</button>
                </div>
                
            </div>
            <br>
        </div> 

       </div>
    </div>
 </div>
 </form>
</div>


<script type="text/javascript">
     
            jQuery("#customer_update").validate({
         debug: true,
        rules: {
        //      address:{required:true,},
        //     first_name: {
        //         required: true,
        //     },
        //     last_name: {
        //         required: true,
        //     },
        //     email: {
        //         required: true,
        //         email: true
        //     },
            // state: {
            //     required: true,
            // },
            // password: {
            //     required: true,
            //     minlength: 5
            // },
            // confirm_pass: {
            //     required: true,
            //     minlength: 5,
            //     equalTo : "#password"
            // },
            // company_name: {
            //     required:true,
            // },
            // country :{
            //     required:true,
            // },
            amount: {
                required:true,
               
            },
            // year_found: {
            //     required:true,
            // },
         

        },
        messages: {
            amount: "Please enter your amount",
       //    first_name: "Please enter your firstname",
       //    last_name: "Please enter your lastname",
       //    email: "Please enter your Email ID",
       //    // state: "Please select any state",
       //    phone:{
       //     required: "Please enter your Mobile Number",

       // },
       // address:{required:"enter your address"},
          // password: {
          //   required: "Please provide a password",
          //   minlength: " password must be at least 5 characters long"
          // },
          // confirm_pass: {
          //   required: "Please provide a Confirm password",
          //   minlength: " Confirm password must be at least 5 characters long",
          //   equalTo: " Confirm password must be Equal to password"
          // },
          //company_name: { required: "Please provide a company name"},
          // contry : { required: "Please select any country"},
   //year_found: { required:"please provide year found"},
        },
        submitHandler: function(form) {
var formData = new FormData(document.getElementsByName('customer_update')[0]);          //  alert(formData);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/home/reverse_amount_details", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    
                    if(data == 1)
                    {
                      toastr.success("Payment Reversed Successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }else{
                      toastr.success("Error", "Notifications");
                        // setTimeout(function(){ location.reload(); }, 500); 
                    }
                   
                }
            });
           //  return false;
        }
     });

</script>

 