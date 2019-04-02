<!-- customer order details page -->
 <style>
label { color: black; }


.order_details  {
  text-align: center;
  text-transform: uppercase;
}

.order_table_head tr th{

    background-color: #20C2BA;
    color: white;
    font-size: 17px;
        text-align: center;
}

 #order_details_table_wrapper{
      width: 95%;
    margin: auto;
    font-size: 18px;
}


.order_table_body tr td{ font-size: 15px;     text-align: center;}
.order_id_color , .update_review{
  color: #20C2BA;

}

div.dataTables_wrapper div.dataTables_length select {

    background: transparent;
    width: auto;
    padding: 2px 0px;

}


 </style>

 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<div class="container">
<br>
 <div class="order_details">
            <h3> Order details </h3>
      </div>
<div class="col-md-12">

 <table  id="order_details_table" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Job Date</th> 
                                      <!-- <th>Customer Name</th> -->
                                      <th>Movers</th>
                                      <th>Total</th>
                                      <!-- <th>HireMovers</th>
                                      <th>Gross Margin</th> -->
                                      <th>Order Status</th>
                                      <th>Review</th>
                                      <th>Action</th>
                  </tr>
           </thead>
 
                                           
             <tbody class="order_table_body">
                               <?php 

 // $order_results1=$this->db->query("SELECT * from order_details where id='1139'")->result_array();
                               foreach ($order_results as $results) {

                                 // echo "<pre>";print_r($results);echo  "</pre>";

                                $orderid = $results['id'];
                                // $move_date = $results['move_date'];
                                 $move_date1 = date("m/d/Y",strtotime($results['move_date']));
                                 $arrival_time = $results['arrival_time'];
                                $show_arrival = explode('Between', $arrival_time);
                                $start_arrival = explode('-', $show_arrival[1]);
                                $move_date = $move_date1.'<br>'.$start_arrival[0];
                                
                                $b_First_name = $results['b_First_name'];
                                $pricevalue = $results['final_price'];
                                if($pricevalue==''){
                                   $pricevalue =0;
                                }
                               $release_payment_amount = $results['release_pay_amount'];
                               if($release_payment_amount =='')
                               {
                                  $release_payment_amount = 0;
                               }
                                $release_pay = $results['release_pay'];
                                $customer_paid_tip = $results['tip_amount'];
                                $total_mile_fee =$results['per_mile_cost'];
                                 $order_status = $results['order_status'];
                                 $star_count =$results['star_count'];
                                 $re_request_move_date =$results['re_request_move_date'];
                                 $resche_re_status=$results['re_request_status']; 
                                 $company_name = $results['company_name']  ;
                                 $star_count_customer = $results['star_count'];
                                 $review_comments_customer = $results['review_comments'];
                                 $admin_order_details_edit = $results['admin_order_details_edit'];
                                 $customer_needtopay = $results['customer_needtopay'];
                                 $admin_refund_amt = $results['admin_refund_amt'];

                                 if($order_status =='Cancelled')
                                  { $style ="color:red";}
                                else if($order_status=='Pending Cancellation'){
                                  $style ='color:red';
                                }
                                else if($order_status =='Payment Success')
                                {
                                  $style ='color:orange';
                                }
                                else if($order_status=='Completed'){
                                  $style = 'color:green';
                                    }
                                 else if($order_status=='Accepted'){
                                $style = 'color:#800058'; #DD9819
                                    }
                                 else if($order_status=='Payment pending' || $order_status =='Pending'){
                                $style = 'color:black'; 
                                    }
                                    else if( $order_status ='Pending HireMovers Confirmation') 
                                    {
                                       $style = 'color:#F600F7'; 
                                    }

                                    else if($order_status=='Request'){
                                $style = 'color:darkorange'; 
                                    }
                                      else if($order_status=='Rejected'){
                                $style = 'color:#ae4c4c'; 

                                    }
                                      


                                  else { $style ='';}
                                  $admin_fee =  number_format((float)$admin_fee, 2, '.', '');


                                  if($release_pay!=1){
                                   
                                    // echo $release_payment_amount;
                                     $price = $pricevalue;
                                  }
                                  else{
                                    if($pricevalue!='')
                                    {
                                      //   if($customer_needtopay!=''){
                                      //   $price = $pricevalue + $release_payment_amount - $customer_needtopay;
                                      // }else{
                                      //   $price = $pricevalue + $release_payment_amount;
                                      // }
                                       $price = $pricevalue + $release_payment_amount;
                                    }
                                    else
                                      {
                                        $price =0;
                                      }
                                  }
                                  // $price = $pricevalue + $release_payment_amount;
                               $price =  number_format((float)$price, 2, '.', '');    
 
                                 $disabled ='';

                      if( $order_status =='Completed' || $order_status !='Accepted' || $order_status == 'Payment pending')
                      {
                       $disabled ="disabled_buttons";
                      }  
 
                      if($order_status == 'Payment Success')    {$order_status_values ='Pending Mover Confirmation';}
                      else if($order_status == 'Accepted' && $resche_re_status==''){
                        $order_status_values = 'Confirmed';
                        $style = 'color:purple';

                      }
                      else if($order_status == 'Pending'){
                        $order_status_values ='Payment pending';

                      }
                      // else if($order_status =='Payment pending')
                      // {
                      //    $order_status ='Pending HireMovers Confirmation';
                      // }
                      else if($order_status == 'Pending Cancellation'){
                        $order_status_values ='Pending Cancellation';
                      }
                      else if($resche_re_status == 'Date and time approved by mover' && $order_status == 'Accepted')
                        {
                          $order_status_values = 'Confirmed' ;
                          $style = 'color:purple'; 
                        }
                      else if($resche_re_status == 'Waiting for mover time Approval'  && $order_status == 'Accepted'){
                        $order_status_values = 'Waiting for mover time Approval';
                        $style = 'color:blue';
                      }
                      else if($resche_re_status == 'Waiting for customer time Approval'  && $order_status == 'Accepted'){
                        $order_status_values = 'Waiting for customer time Approval';
                        $style ='color:blue';
                      }
                      else if($resche_re_status == 'Date and time rejected by customer' && $order_status=='Accepted'){
                        $order_status_values='Reschedule request rejected by customer';
                        $style ="color:blue";
                      }
                      else if($resche_re_status == 'Date and time rejected by mover' && $order_status=='Accepted'){
                        $order_status_values='Reschedule request rejected by mover';
                        $style ="color:blue";
                      }

                      else{
                        $order_status_values = $order_status;
                      }
                      if($order_status == 'Waiting for mover time Approval'){
                        $style='color:blue';
                      }
                      if($order_status == 'Reschedule request rejected by mover')
                      {
                        $style='color:blue';
                      }
                      // if($order_status == 'Confirmed' )
                      // {
                      //   $style='color:#800058';
                      // }

                         
                      

                                ?>
               
                                  <tr class="row_start">

                                          <td class="order_id_color">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/customer/order_popup/<?php echo $orderid;?>" data-target="#order_popup" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo $move_date;?></td>
                                          <!-- <td><?php echo $b_First_name?></td> -->
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo $price;?></td>
                                        
                                          <td style="<?php echo $style;?>"><?php if($order_status_values == 'Accepted'){echo 'Confirmed';}else{echo $order_status_values;}?></td>


                                          
                                          <td class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                         <!--  <td> <a href="<?php echo BASE_URL;?>/customer/reviews_update/<?php echo $orderid;?>"  data-target="#ajax" data-toggle="modal" >Update order status & Review</a></td> -->
                                         <td> 
  <!-- /**********************jamuna**************************************-->
 <?php
$old_date = $results['completed_date'];
if($old_date != '' )
{
  //echo  "Not Empty";
$next_due_date = date('d-m-Y', strtotime($old_date. ' +30 days'));
//echo  $next_due_date;
}
else
{
  //echo "empty"; 
}


$date1=date_create("$old_date");
$date2=date_create("$next_due_date");
if($date1!='' && $date2!=''){
  $diff=date_diff($date1,$date2);
  $days=$diff->format("%a");
}
else{
  $days = 0;

}
 $reviews = $results['star_count'];

if($order_status == 'Completed' )
{ 
  // if($days >= 30)
  // { ?>
       <!-- <button style="background-color: goldenrod;"; class="btn btn-primary" <?php //echo  $disabled;?>><a href="<?php //echo BASE_URL;?>/customer/reviews_popup/<?php //echo $orderid;?>"  data-target="#ajax" data-toggle="modal"><span class="glyphicon glyphicon-envelope" style=""></span> &nbsp;Rquest to Edit </a></button>
 -->
 <?php 
// } 

 // else 
  // { 
if($star_count_customer=='' || $review_comments_customer==''){
   ?>
       <a href="<?php echo BASE_URL;?>/customer/reviews_update/<?php echo $orderid;?>"  data-target="#ajax" data-toggle="modal"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Write Review </button></a>

      <!--  <a href="<?php echo BASE_URL;?>/customer/reviews_update/<?php echo $orderid;?>" data-target="#ajax" data-toggle="modal"><?php echo $orderid;?>Write Review</a>
 -->

 <?php } }

// }


 ?> 
          <input type="hidden" id="order_id" name="" value="<?php echo $orderid; ?>">
        

  
                                         <?php

                                             if(  $resche_re_status =='Waiting for customer time Approval' && $order_status_values != 'Completed')
                                          {

                                            ?>

                                             <a href="<?php echo BASE_URL;?>/customer/Approve_reschedule_time/<?php echo $orderid;?>"  data-target="#Approve_reschedule_time" data-toggle="modal"> <button class="btn btn-primary"><span class="fa fa-check"></span> &nbsp;Approve</button> </a>

                                         <?php  } 

                                         else if($order_status_values == 'Reschedule request rejected by mover')
                                         { ?>

                                        <button class="btn btn-primary" Onclick="status_val_change('<?php echo $orderid ?>')">OK</button>
                                     <?php } ?>

                                          <?php  if($admin_order_details_edit == 1){?>


                                         <!--  <a href="<?php echo BASE_URL;?>/customer/admin_order_details_edit_approvecustomer/<?php echo $orderid;?>"  data-target="#Approve_reschedule_time" data-toggle="modal"> <button class="btn btn-primary"><span class="fa fa-check"></span> &nbsp;Approve</button> </a> -->

                                         <?php } ?>
                                        

                                         </td>

                                  </tr>

                                <?php 
                                 
                               }

                                ?>

                      </tbody>
                                                
                         
</table>

</div>
<div id="ajax" class="modal fade" role="dialog" >
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">


    </div>
   </div>
</div> 
<!-- <div id="order_popup" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-dialog1">

    <div class="modal-content modal-content">


    </div>
   </div>
</div> 
 -->


<div id="order_popup" class="modal order_details_change_stlp fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">


    </div>
   </div>
</div>  


<div id="Approve_reschedule_time" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">


    </div>
   </div>
</div> 


</div>
         <script src="<?php echo BASE_URL;?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

             <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>  

<link rel='stylesheet' href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel='stylesheet' href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.css">

<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>  
<script>
jQuery(document).ready(function() {
   
   jQuery('#order_details_table').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });

   jQuery('#order_details_table_filter input').addClass('form-control');
   jQuery("#order_details_table_info").css("font-size","17px");

});


function status_val_change(orderid)

{
  //alert(orderid);

 
swal({
  title: "Are you sure? Want to confirm!",
  // text: "Want to confirm the user !",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Confirm!",
  cancelButtonText: "No, cancel pls!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
  $.ajax({
             type:"post",
             url :"<?php echo BASE_URL;?>/customer/update_status",
             data: {'order':orderid }, 
             datatype: "json",

               success: function(data)
                    { 
                      console.log(data);
                      if(data==1){
                            swal("Success!", "Order comfirmed", "success");
                setTimeout(function() 
                  {
                     location.reload();
                  }, 2000);
                      }
                      else{
                        swal("Failed", "Order not confirmed", "error");
                      }
                      } 
                       }) ;

} else {
    swal("Cancelled", "MAKE SURE YOU CONFIRM YOUR ORDER", "error");
  }

});
 // location.reload(); 
}



jQuery(".row_start").each(function() {

 var count_star = jQuery(this).find(".stars_count").attr('data-value');

 if(count_star !='')

 {
 
  var results = getStars(count_star);

  jQuery(this).find(".stars_count").html(results);

}


});



function getStars(rating) {


  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  return output.join('');

}

  </script>
