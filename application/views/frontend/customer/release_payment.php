 <style type="text/css">
 .checkboc_proceed{text-align: left;margin-bottom: 20px;}
 .payment_feild_stlrs span{font-size: 19px;}
 .payment-errors,.error_tipamount{color: red;font-size: 15px;}
 #release_payment_customer .heading_style{min-height: 200px;}
 </style>
<?php 
$additional_hour_amount='';
$add_hour_amout='';
$add_min_amount=''; 
$additional_hour_amounts ='';
        // print_r($order_results);

foreach ($order_results as $value) {

  
  // echo '<pre>';print_r($value);echo '</pre>';

  $order_id =$value['id'];
  $b_First_name =$value['b_First_name'].' '.$value['b_Last_name'];
  $b_Phone_no =$value['b_Phone_no'];
  $b_email =$value['b_email'];
  //$move_date =$value['move_date'] ;
$move_date = date("m/d/Y",strtotime($value['move_date']));
  $booked_mover_id  = $value['mover_id'];
  
  $arrival_time =$value['arrival_time'];
  $movers_count =$value['movers_count'];
  $hours =$value['hours'];
  $loading_location =ucfirst($value['loading_location']);
  $unloading_location =ucfirst($value['unloading_location']);
  $loading_by = str_replace('_', ' ', $value['loading_by']);
  $loading_address =ucfirst($value['loading_address']);
  $loading_city =ucfirst($value['loading_city']);

  $loading_state =ucfirst($value['loading_state']);
  $unloading_address =$value['unloading_address'];
  $unloading_city =ucfirst($value['unloading_city']);
  $unloading_state =ucfirst($value['unloading_state']);
  $unloading_city =ucfirst($value['unloading_city']);

  $location_loading =ucfirst($value['location_loading']);
  $location_loading_address =ucfirst($value['location_loading_address']);
  $location_loading_city=ucfirst($value['location_loading_city']);
  $location_loading_state =ucfirst($value['location_loading_state']);

  $price =  number_format((float)$value['price'], 2, '.', '');
  $additional_details =$value['additional_details'];
  $service_id =$value['service_id'];
  $order_status =$value ['order_status'];
  $created_on =$value['created_on'];
  $modified_on =$value['modified_on'];

  $disabled_buttons ='';
  $company_name = $value['company_name'];
  $release_pay = $value['release_pay'];
  $additional_hours =$value['additional_hours'];
  $request_hours = $value['request_hours'];
  
  $admin_order_details_edit = $value['admin_order_details_edit'];
  $customer_needtopay_location_change = $value['customer_needtopay'] ;

if($admin_order_details_edit ==1){
  if($customer_needtopay_location_change != ''){ $customer_needtopay_location_change = sprintf('%.2f',$customer_needtopay_location_change);}else{$customer_needtopay_location_change = 0.00;}}
  else{
    $admin_order_details_edit=0;
  }



}
// echo $adnal_houramount;
 $additional_hour_amounts = sprintf('%.2f',$adnal_houramount);
 if($customer_needtopay_location_change==''){
  $customer_needtopay_location_change =0.00;
 }
 $need_to_pay_amount = $additional_hour_amounts + $customer_needtopay_location_change;
        ?>


  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
    </div>
        <div class="modal-body">
        
        
          <div class="row"> 
            <div class="col-md-12">
              <div class="heading_style">
              
                
                  <div class="col-md-12">
                    <div class="checkboc_proceed">
            					<span>Would you like to tip your movers?</span>
                      <span class="radio_buttons_style">
              					<input type="radio" name="proceed_payments" class="proceed_payments" id="proceed_payments_yes" value="yes">Yes
              					<input type="radio" name="proceed_payments"  class="proceed_payments"  value="no">No
                      </span>
                    </div>
                  </div>
               
                
                <div class="payment_feild_stlrs" style="display: none;">
                 <!-- <h5>Enter an amount:</h5> -->
                 <div class="tip_amount">
                  <div class="col-md-6">
                   <span >Tip Amount:</span>
                   </div>
                   <div class="col-md-6">
                   <input type="number"  name="pay_amount" id="payment_amounts" class=" form-control pay_amount "   >
                   <span class="error_tipamount"></span>
                   </div>
                  </div>
                
                  <div class="col-md-12">
                    
                      <!-- <span >Additional Hours :<?php echo $additional_hours;?></span> -->
                      
                      <span class="col-md-6 col-xs-6 col-sm-6 additional_hr_amtspan">Additional Hours Amount:</span><span  class="col-md-6 col-xs-6 col-sm-6 get_add_hramt">$<?php echo $additional_hour_amounts; ?></span>
                      <div style="clear: both;"></div>
                      <?php 
                      if($admin_order_details_edit ==1){ ?>
                      <span class="col-md-6 col-xs-6 col-sm-6 location_chg_span">Location Change Amount:</span><span class="col-md-6 get_add_dist_amt" >$<?php echo sprintf('%.2f',$customer_needtopay_location_change);?></span>
                      <?php } ?>
                      <input type="hidden" value="<?php echo $customer_needtopay_location_change;?>" class="location_change_amt">
                      <span style="clear: both;"  class="col-md-6 col-xs-6 col-sm-6 total_amt_span">Total amount to pay:</span>
                      <span  class="col-md-6 col-xs-6 col-sm-6">$<span id="total_amount_show"><?php echo sprintf('%.2f',$need_to_pay_amount); ?></span></span>

                         <input type="hidden" name="hiddeninputname" id="hiddeninputname" value="" />


                      
                      </div>
                       <div style="clear: both;"></div><br>
                     
                       <input type="hidden" name="order_id" class="order_id" value="<?php echo $order_id;?>">
                <input type="hidden" name="booked_mover_id" class="booked_mover_id" value="<?php echo $booked_mover_id;?>">
                <input type="hidden" name="move_date" class="move_date" value="<?php echo $move_date;?>">
                <input type="hidden" name="username" value="<?php echo $b_First_name;?>" class="b_First_name">

                <div class="payment_details_div">

                    <div class="col-xs-6">
                      <span>Card Number *

                      <input type="text" name="card_numer"  id="card_numer" class="form-control submit" value ="">
                      </span>

                    </div>
                    <div class="col-xs-6">
                      <span>CVC *

                      <input type="text" name="cvc"  id="cvc" class="form-control" value ="">
                      </span>

                    </div>
                     <div style="clear: both;"></div>
                    <div class="col-xs-6">
                      <span> Exp Month *
                      
                        <input type="text" class="form-control" name="exp_date" id="exp_date" value="">
                        </span>
                    </div>

                    <div class="col-xs-6">
                    <span> Exp Year *

                        <input type="text" class="form-control" name="exp_year" id="exp_year" value="">
                        </span>
                    </div>

                      <div class="" style="clear: both;"></div>
                    <span class="payment-errors"> </span>
                    
                    
                  
                  
                  </div>
                  <div class="col-md-12" style="text-align: center;">
                  
                  <br>
                  <button  type="button" class="btn  btn-primary" data-target="#proceed_payment_tomovers" data-toggle="modal"   >     
                          &nbsp;Submit 
                      </button>
                  </div>
                </div>
                
             
              
            </div>
          </div>


        </div>
        
<!-- alert popup -->
<div id="proceed_payment_tomovers" class="modal fade" role="dialog" >
  <div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
          <button type="button" class="close cancel_payment_details" >&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
    </div>
        <div class="modal-body">
        

          <div class="row">
            <div class="col-md-12">
              <!-- <div class="heading_style"> -->
                <h3>Are you sure you want to release payment to your mover?</h3>
                <input type="hidden" name="order_id" class="order_id" value="<?php echo $order_id;?>">
                <input type="hidden" name="booked_mover_id" class="booked_mover_id" value="<?php echo $booked_mover_id;?>">
                <input type="hidden" name="move_date" class="move_date" value="<?php echo $move_date;?>">
                <input type="hidden" name="proceed_payment" class="proceed_payment_tomover" value=""/>
                <input type="hidden" name="username" value="<?php echo $b_First_name;?>" class="b_First_name">
                <br>
                <div class="button_align_release">
                  <span><button name="i_agree" value="I Agree" class="btn btn-success agree_to_releasepay">I Agree</button></span>
                  <span><button name="cancel_payment" value="cancel" class="btn cancel_payment_details btn-danger" >Cancel</button></span>
                <!-- </div> -->
              </div>
            </div>
          </div>

          </div>
        </div>
</div>
</div>

<script type="text/javascript">

 


$(document).ready(function(){
$(".checkboc_proceed input:checkbox").on('click', function() {
 $('.payment_details_div').find('input:text').val('');    



  var $box = $(this);
  if ($box.is(":checked")) {
 
    var group = "input:checkbox[name='" + $box.attr("name") + "']";

    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
});
</script>
<script type="text/javascript">

jQuery(document).on("click",".proceed_payments",function()
{

  $('#payment_amounts').val('');
// $('.proceed_payments').click(function(){
var total_amount =0;
var final_amount='';
 var checked_val = $('input[name="proceed_payments"]:checked').val();
 
// alert('checked_val' +checked_val);
if(checked_val == 'yes'){
  // $('.payment_details_div').find('input:text').val('');    
$('.payment_details_div').find('input:text').val('');    
  $('.payment_details_div').show();
  $('.payment_feild_stlrs').show();
  $('.tip_amount').show();
}
if(checked_val == 'no'){
	$('.payment_details_div').find('input:text').val('');    
    $('.payment_details_div').show();
  $('.payment_feild_stlrs').show();
    $('.tip_amount').hide();


 var get_add_hramt= $('.get_add_hramt').text();
 var get_add_dist_amt =0;







 var get_add_dist_amt1 = $('.location_change_amt').val();
if(get_add_dist_amt1!=0 && get_add_dist_amt1!=''){   
   get_add_dist_amt1 = get_add_dist_amt1;
}else{
  get_add_dist_amt1 =0;
}
    get_add_hramt = get_add_hramt.replace('$','');
    
    var final_amount123 =  parseFloat(get_add_hramt) + parseFloat(get_add_dist_amt1);
    // alert(get_add_hramt);
    $("#total_amount_show").text(parseFloat(final_amount123).toFixed(2));

    $("#hiddeninputname").val(parseFloat(final_amount123).toFixed(2));
    if(final_amount123!='0.00' && final_amount123!=''){
      $('.payment_details_div').show();
    }else{
      $('.payment_details_div').hide();
    }
 }

});



jQuery(document).on("click",".cancel_payment_details",function()
{
// $('.cancel_payment_details').click(function(){
  $('#proceed_payment_tomovers').modal('hide');
});


// jQuery(document).on('focusout','.test_values','input',function(){
// 	var vallu = jQuery('.test_values').val();
// 	alert(vallu);
// })

jQuery(document).on("focusout","#payment_amounts",'input',function()
{
// jQuery( "#payment_amounts" ).focusout(function() {

      var price_value = jQuery('#payment_amounts').val();
      var final_amount='';
      var num = price_value;
      // 

      //  var checkdoller = num.doesInclude('$');

      // if(checkdoller ==true ) {

      //     var  newString = num.replace('$','');
      //     var result =  parseFloat(newString).toFixed(2);
      //     jQuery('#payment_amounts').val('$'+result); 
      // } 

      //  if(checkdoller ==false )
      // {

      //     if(num !='') {
      //       var result =  parseFloat(num).toFixed(2);
      //       jQuery('#payment_amounts').val('$'+result); 

      //   }

      // } 



  // var newStr = price_value.replace('$', '');


var newStr = price_value;
console.log(newStr);  // Prints: Hy World!
 var additional_hramt = $('.get_add_hramt').html();

additional_hramt = additional_hramt.replace('$', '');
// alert(additional_hramt);
if(newStr == ''){
  newStr =0;
}
var get_add_dist_amt1 =0;
var  get_add_dist_amt2 = $('.location_change_amt').val();
// alert(get_add_dist_amt2);
 
 // alert('avails' +avails);
  if(get_add_dist_amt2!=0 && get_add_dist_amt2!=''){   
    
    
    var final_amount =  parseFloat(additional_hramt) +  parseFloat(newStr) + parseFloat(get_add_dist_amt2);
}
else{
  get_add_dist_amt =0;
  var final_amount =  parseFloat(additional_hramt) +  parseFloat(newStr) 
}


   
    
    // var final_amount123 =  parseFloat(get_add_hramt) + parseFloat(get_add_dist_amt);
    // alert(get_add_hramt);
//     $("#total_amount_show").text(parseFloat(final_amount123).toFixed(2));

//     $("#hiddeninputname").val(parseFloat(final_amount123).toFixed(2));
// var excess_dist_amt = '<?php echo $customer_needtopay_location_change ?>';
// alert('excess_dist_amt' +excess_dist_amt);
       

        // alert('chec' + total_amount);
          final_amount = final_amount.toFixed(2);
         // alert(final_amount); 
        $("#total_amount_show").text(final_amount);

        $("#hiddeninputname").val(final_amount);

     // }
if(price_value!=''){
       jQuery('#payment_amounts').val(parseFloat(price_value).toFixed(2)); 
      }


  });


// jQuery(document).ready(function(){

// })


// jQuery(document).on("focusout","#payment_amounts",function()
// {
// jQuery( "#payment_amounts" ).focusout(function() {
// var final_amount='';
//       var price_value = jQuery('#payment_amounts').val();
//       // alert(price_value);

// var newStr = price_value.replace('$', '');
// console.log(newStr);  // Prints: Hy World!
//  var additional_hramt = $('.get_add_hramt').html();
//  alert(additional_hramt);
//   total_amount = +newStr + +'<?php echo $additional_hour_amounts?>';
//  var final_amount = total_amount.toFixed(2);
//    // alert(total_amount); 
//    $("#total_amount_show").text(final_amount);

//        $("#hiddeninputname").val(final_amount);
     
  //});

</script>


<!-- payment option -->

 <script type="text/javascript">
//set your publishable key

var STRIPE_PUBLIC_API_KEY = "<?php echo STRIPE_PUBLIC_API_KEY; ?>";
// Stripe.setPublishableKey('pk_test_XCYqdDIIwJWQ1JJ7OQqo4ptl');
Stripe.setPublishableKey(STRIPE_PUBLIC_API_KEY);
//callback to handle the response from stripe
function stripeResponseHandler(status, response) {

var tipamount = jQuery('#payment_amounts').val();

    if (response.error) {
        //enable the submit buttonpay_amount
        // jQuery('#make_reservation').removeAttr("disabled");
        //display the errors on the form
        jQuery(".payment-errors").html(response.error.message);
        jQuery("#proceed_payment_tomovers").modal('hide');
    } 
    // else if(tipamount==''){
    //   jQuery("#proceed_payment_tomovers").modal('hide');
    //   jQuery('.error_tipamount').html('Please enter tip amount');
    //   jQuery('#payment_amounts').css('margin-bottom','0px!important');
    // }
    else {

      jQuery(".payment-errors").html('')
jQuery('.error_tipamount').html('');
        var form$ =jQuery("#relase_pay_customer");
        //get token id
        var token = response['id'];
        
      var tip_amount = $('.pay_amount').val();
       var orderid = $('.order_id').val();
       var move_date = $('.move_date').val();
       var mover_id = $('.booked_mover_id').val();
       var total_amount_pay = $('#hiddeninputname').val();
       var location_change_amt = $('.location_change_amt').val();
 // alert(total_amount_pay);
        // form$.get(0).submit();
        $.ajax({
                url: "<?php echo BASE_URL; ?>/Customer/release_payment_mover/", 
                type: "POST",             
                data: {'orderid':orderid,'mover_id':mover_id,'move_date':move_date,'tip_amount':tip_amount,'stripeToken':token,'price':total_amount_pay,'location_change_amt':location_change_amt},
                
                dataType:'json',    
                success: function(data) {
                 if(data==0){
                toastr.success("Contact mail send successfully", "Notifications");
                  setTimeout(function(){ 

                     window.location.reload();
                   }, 3000); 

                 }
                 if(data==1){
                  toastr.error("Payment Failed", "Notifications");
                  
                  jQuery('#proceed_payment_tomovers').modal('hide');
                  // $("#total_amount_show").text('<?php echo $additional_hour_amounts;?>');

                 }
                  // exit();
                  // alert("ssssssss");
                             
                // 
                  

                }
            });




             
             
    }


   
}






jQuery(document).on("click",".agree_to_releasepay",function()
{

var checked_val = $('input[name="proceed_payments"]:checked').val();

// alert("checked_val" +checked_val);

if(checked_val=='yes'){
var tipamount = jQuery('#payment_amounts').val();
tipamount = tipamount.replace('$','');
    // alert(tipamount);
if(tipamount==''){
      jQuery("#proceed_payment_tomovers").modal('hide');
      jQuery('.error_tipamount').html('Please enter tip amount');
      jQuery('#payment_amounts').css('margin-bottom','0px!important');
      // toastr.warning("Please enter amount", "Notifications");
  document.getElementById("proceed_payments_yes").checked = true;

  $('.payment_feild_stlrs').show();
  // $("#total_amount_show").text('<?php echo $additional_hour_amounts;?>');
  // setTimeout(function(){
  //     $('#proceed_payment_tomovers').modal('hide');
  //   }, 1000); 
    }


    else{
      if(tipamount > 0){

      jQuery('.error_tipamount').html('');
    Stripe.createToken({

        number: jQuery('#card_numer').val(),
        cvc: jQuery('#cvc').val(),
        exp_month: jQuery('#exp_date').val(),
        exp_year: jQuery('#exp_year').val()
    }, stripeResponseHandler);
    
    //submit from callback

     return false;
   }else{

    $('.error_tipamount').show();
    jQuery("#proceed_payment_tomovers").modal('hide');
      jQuery('.error_tipamount').html('Please enter tip amount');
      jQuery('#payment_amounts').css('margin-bottom','0px!important');
      // toastr.warning("Please enter amount", "Notifications");
  document.getElementById("proceed_payments_yes").checked = true;

  $('.payment_feild_stlrs').show();
   }
   }

 }
 else{
  if(checked_val=='no'){
    $('#payment_amounts').val('');
    var pay_amounts = $('#total_amount_show').text();
// $('#item1 span').text();
// alert('pay_amounts' +pay_amounts);
    
   
    if(pay_amounts=='0.00' || pay_amounts==''){
      $('.payment_details_div').hide();
      var orderid = $('.order_id').val();
       var move_date = $('.move_date').val();
       var mover_id = $('.booked_mover_id').val();
      
 // alert(total_amount_pay);
        // form$.get(0).submit();
        $.ajax({
                url: "<?php echo BASE_URL; ?>/Customer/release_payment_without_tip/", 
                type: "POST",             
                data: {'orderid':orderid,'mover_id':mover_id,'move_date':move_date},
                
                dataType:'json',    
                success: function(data) {
                 if(data==0){
                toastr.success("Contact mail send successfully", "Notifications");
                  setTimeout(function(){ 

                     window.location.reload();
                   }, 3000); 

                 }
                 if(data==1){
                  toastr.error("Payment Failed", "Notifications");
                  
                  jQuery('#proceed_payment_tomovers').modal('hide');
                  // $("#total_amount_show").text('<?php echo $additional_hour_amounts;?>');

                 }
                  // exit();
                  // alert("ssssssss");
                             
                // 
                  

                }
            });
    }
    else{
      // alert('sssssss else part');
      $('.payment_details_div').show();
      Stripe.createToken({

        number: jQuery('#card_numer').val(),
        cvc: jQuery('#cvc').val(),
        exp_month: jQuery('#exp_date').val(),
        exp_year: jQuery('#exp_year').val()
    }, stripeResponseHandler);
    
    //submit from callback

     return false;
    }
  }
 }
});




</script>
