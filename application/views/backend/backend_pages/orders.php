<style type="text/css">
  .Completed_accepted{
    color:purple;
}
.edit_review{border: 2px solid white;padding: 8px;background: orange;color: white;border-radius: 5px!important;}
.approve_statusbtn {border: 2px solid white;padding: 8px;background: #17C4BB;color: white;border-radius: 5px!important;}
</style>

<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo 'Orders'; ?></h1>
                    <!--<?php echo "<pre>" ;print_r($result); echo "</pre>";?> -->
                 <!--  </div> -->

                 <ul class="nav nav-tabs bordered style_nav_tab">
            <!-- <li class="active">
                <a href="#order_details_list" data-toggle="tab"> 
                    <?php echo 'Order list';?>
                 </a>
            </li> -->
            <li class="active">
                <a href="#new_orders" data-toggle="tab"> 
                    <?php echo 'New orders';?>
                 </a>
            </li>
            <li class="">
                <a href="#Confirmed_orders" data-toggle="tab">
                    <?php echo 'Confirmed ';?>
                 </a>
            </li>
            <li class="">
                <a href="#rescheduled_list" data-toggle="tab"> 
                    <?php echo 'Needs Rescheduled';?>
                 </a>
            </li>
            <li class="">
                <a href="#Completed_orders" data-toggle="tab">
                    <?php echo 'Completed ';?>
                 </a>
            </li>
            
            <li class="">
                <a href="#Cancelled_orders" data-toggle="tab"> 
                    <?php echo 'Cancelled ';?>
                 </a>
            </li>
            <li class="">
                <a href="#approve_order_status" data-toggle="tab"> 
                    <?php echo 'Approve Order Status';?>
                 </a>
            </li>

        </ul>
        <div class="tab-content">
        
            <div class="tab-pane " id="order_details_list">
               <div class="tabs-vertical-env">
            
                    <div class="tab-content">
 <table  id="order_details_table" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Review</th>
                                      <th>Payment Details</th>
                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                               <?php 


                               foreach ($show_all_orders as $results) {

                                 // echo "<pre>";print_r($results);echo  "</pre>";

                                $orderid = $results['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($results['move_date']));
                                $b_First_name = $results['b_First_name'];
                                $pricevalue = $results['price'];
                                 $order_status = $results['order_status'];
                                 $company_name = $results['company_name'];
                                 if($order_status =='Cancelled'){ $style ="color:red";} else { $style ='';}

                               $price =  number_format((float)$pricevalue, 2, '.', '');
                               $star_count =$results['star_count'];
                               $mover_id =$results['mover_id'];

                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";


                    $get_admin_fee = $this->db->query("SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'")->result_array();
                                 $admin_fee  ='';

                                if(!empty($get_admin_fee))
                                {

                                  $admin_fee1 = $get_admin_fee[0]['admin_fee'];

                                  if( $admin_fee1 !=''){
                                   $admin_fee =  '$' .number_format((float)$admin_fee1, 2, '.', '');
                                  }
                                  else{
                                    $admin_fee1 = 0;
                                  }
                                }

                                $gross_margin = ($pricevalue - $admin_fee1);
                                $gross_margin = '$'.   number_format((float)$gross_margin, 2, '.', '');

                              
                               
                                ?> 

                                  <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo $price;?></td>
                                          <td><?php echo $admin_fee;?></td>
                                          <td><?php echo $gross_margin;?></td>
                                          <td style="<?php echo $style;?>"><?php echo $order_status;?></td>
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td></td>
                                          <td><a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a></td>
                                          

                                  </tr>

                                <?php 
                                 
                               }

                                ?>

                      </tbody>
                             

                        
                         
</table>

</div>
</div>
</div>
<!-- new orders -->
            <div class="tab-pane active" id="new_orders">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="new_order_details" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Reviews</th>
                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        $new_orders = $this->db->query("SELECT * from order_details where (order_status= 'Payment pending' or order_status ='Payment Success') and release_pay!=1")->result_array();
                        // $new_orders = $this->db->query("SELECT * from order_details where id=1137")->result_array();

                        // print_r($new_orders);

                        foreach ($new_orders as $key => $value) {
                          $total_mile_fee='';
                          $orderid = $value['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($value['move_date']));
                                $b_First_name = $value['b_First_name'];
                                $customer_book_order = $value['price'];
                                 $pricevalue = $value['final_price'];
                                $order_status = $value['order_status'];
                                 $company_name = $value['company_name'];
                                 $direct_url = $value['direct_url'];
                                 // if($order_status =='Cancelled'){ $style ="color:red";} else { $style ='';}

                                 
                               $star_count =$value['star_count'];
                               $mover_id =$value['mover_id'];
                               $movers_count = $value['movers_count'];

                               $Additional_hour = $value['additional_hours'];
                               $created_on = $value['created_on'];

                                $release_payment_amount = $value['release_pay_amount'];
                                $release_pay = $value['release_pay'];
                                $customer_paid_tip = $value['tip_amount'];
                                $total_mile_fee =$value['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                          //       // echo 'kkkkk';
                            if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
  $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}













                               if($order_status =='Payment Success')
                                { 
                                  $order_status ='Pending Mover Confirmation';
                                $style25 ="color:orange";
                              }   else { $style25 ='color:black';}




                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($created_on));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>                                             
                                          
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td style="<?php echo $style25;?>"><?php echo $order_status;?></td>
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td><a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button "  class="btn approve_statusbtn"> Approve </button></a></td>
                                          

                                  </tr>


                      <?php   
                        }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>
<!-- end new orders -->
<!-- reschedule tab -->
            <div class="tab-pane" id="rescheduled_list">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="rescheduled_list_details" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Reviews</th>
                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        $new_orders = $this->db->query("SELECT * from order_details where order_status ='Accepted' and re_request_status!='' and release_pay!=1")->result_array();
                        // echo '<pre>';print_r($new_orders);echo '</pre>';
                        foreach ($new_orders as $key => $value) {
                          $orderid = $value['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($value['move_date']));
                                $b_First_name = $value['b_First_name'];
                                // $pricevalue = $value['price'];

                                $customer_book_order = $value['price'];
                                $pricevalue = $value['final_price'];
                                 $order_status = $value['re_request_status'];
                                 $company_name = $value['company_name'];
                                 $direct_url = $value['direct_url'];
                                 // if($order_status =='Waiting for mover time Approval'){ $style1 ="color:green";} else { $style1 ='';}

                                 $direct_url = $value['direct_url'];
                                 
                                 




                               $created_date = $value['created_on'];
                               $star_count =$value['star_count'];
                               $mover_id =$value['mover_id'];

                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";
                               $movers_count = $value['movers_count'];

                               $Additional_hour = $value['additional_hours'];

                                $release_payment_amount = $value['release_pay_amount'];
                                $release_pay = $value['release_pay'];
                                $customer_paid_tip = $value['tip_amount'];
                                $total_mile_fee =$value['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                                // echo 'kkkkk';
                            if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}





                    
                                if($order_status != 'Date and time approved by customer' && $order_status!='Date and time approved by mover'){
                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($created_date));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>                                             
                                          
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td style="<?php echo $style1='color:blue';?>"><?php echo $order_status;?></td>
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td><a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a></td>
                                          
                                          

                                  </tr>


                      <?php   
                        } }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end reschedule -->
            <div class="tab-pane" id="Completed_orders">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="Completed_orders_details" class="table table-bordered datatable table-responsive" > 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Review</th>
                                      <th>Payment Details</th>
                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        $new_orders1 = $this->db->query("SELECT * from order_details where order_status ='Completed' ")->result_array();
                        foreach ($new_orders1 as $key => $values123) {
                          $orderid = $values123['id'];
                                $move_date = $values123['move_date'];
                               $customer_book_order = $values123['price'];
                                $pricevalue = $values123['final_price'];
                                 $order_status = $values123['re_request_status'];
                                 $company_name = $values123['company_name'];
                                 $direct_url = $values123['direct_url'];
                                 // if($order_status =='Waiting for mover time Approval'){ $style1 ="color:green";} else { $style1 ='';}
                                 $created_on = $values123['created_on'];
                                  $style ='color:green';
                               $star_count =$values123['star_count'];
                               $mover_id =$values123['mover_id'];

                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";
                               $movers_count = $values123['movers_count'];

                               $Additional_hour = $values123['additional_hours'];

                                $release_payment_amount = $values123['release_pay_amount'];
                                $release_pay = $values123['release_pay'];
                                $customer_paid_tip = $values123['tip_amount'];
                                $total_mile_fee =$values123['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                                // echo 'kkkkk';
                  
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}


                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($created_on));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>                                             
                                          
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td style="<?php echo $style;?>"><?php echo 'Completed'?></td>
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td><a href="<?php echo BASE_URL;?>/home/admin_mover_edit_payment/<?php echo $orderid;?>?x=<?php echo date('ymd'); ?>" data-toggle="modal" data-target="#modalForm" style="color:white;"><i class="fa fa-pen" style="padding-right: 3px;"></i><button type="button" class="btn-orange confirm_edit_btn" style="">Payments</button></a></td>
                                          <td>
                                             <!-- <?php
                                             // if($star_count != '')
                                          {
                                             ?> -->
                                             <a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>" style="margin:3px;"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a>
                                        <a href="<?php echo $base_url;?>dashboard/edit_review_admin/<?php echo $orderid;?>?x=<?php echo date('ymd');?>" data-target="#admin_orders_reviews" data-toggle="modal" ><button type="button" class="btn edit_review"> Edit Review </button> </a>
                                         
                        

                                       <button type="button" style="margin: 3px;" class="btn btn-danger " onclick="delete_review('<?php echo $orderid; ?>')">Delete Review</button> 
                                       
                                            <!-- <?php } ?> -->

                                         </td>
                                          
                                          

                                  </tr>


                      <?php   
                        }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>
<!-- completed orders -->
            <div class="tab-pane" id="Confirmed_orders">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="Confirmed_orders_details" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Reviews</th>
                                      <th>Action</th>
                                    <!--   <th>Source</th> -->
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        $new_orders = $this->db->query("SELECT * from order_details where order_status ='Accepted' and re_request_status='' and release_pay!=1")->result_array();
                        foreach ($new_orders as $key => $value) {
                          $orderid = $value['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($value['move_date']));
                                $b_First_name = $value['b_First_name'];
                                // $pricevalue = $value['price'];
                                 $pricevalue = $value['final_price'];
                                $customer_book_order = $value['price'];
                                $order_status = $value['order_status'];
                                 if($order_status == 'Accepted')
                                 {
                                  $order_status = 'Confirmed' ;
                                 }
                                 $company_name = $value['company_name'];
                                 $direct_url = $value['direct_url'];
                                 // if($order_status =='Cancelled'){ $style ="color:red";} else { $style ='';}
                                 $created_date = $value['created_on'];
                                                 
                               $star_count =$value['star_count'];
                               $mover_id =$value['mover_id'];

                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";
                               $movers_count = $value['movers_count'];

                               $Additional_hour = $value['additional_hours'];

                                $release_payment_amount = $value['release_pay_amount'];
                                $release_pay = $value['release_pay'];
                                $customer_paid_tip = $value['tip_amount'];
                                $total_mile_fee =$value['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                                // echo 'kkkkk';
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}


                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($created_date));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td  class="Completed_accepted" style="<?php ?>"><?php echo $order_status;?></td>
                                          
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          
                                         <td><a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a></td>
                                          
                                         
                                          <?php
                                          //      if($star_count != '')
                                          // {
                                            ?>
                                          <!-- <a href="<?php //echo BASE_URL;?>/dashboard/edit_review_admin/<?php //echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn"> Edit Review </button></a>  <br>
                                               

                                            <button type="button " style="margin-top: 5px;" class="btn btn-danger " onclick="delete_review('<?php //echo $orderid; ?>')">Delete Review</button> --> 
                                            <?php //} ?>

                                          
                                          

                                  </tr>   


                      <?php   
                        }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>

<!-- cancelled orders -->
<div class="tab-pane" id="Cancelled_orders">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="Cancelled_orders_details" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Reviews</th>

                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        $new_orders = $this->db->query("SELECT * from order_details where order_status ='Cancelled'")->result_array();
                        foreach ($new_orders as $key => $value) {
                          $orderid = $value['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($value['move_date']));
                                $b_First_name = $value['b_First_name'];
                                // $pricevalue = $value['price'];
                                $customer_book_order = $value['price'];
                                 $order_status = $value['order_status'];
                                 $company_name = $value['company_name'];
                                 $direct_url = $value['direct_url'];
                                 if($order_status =='Cancelled'){ $style ="color:red";} else { $style ='';}
                                 $pricevalue = $value['final_price'];
                                 $star_count =$value['star_count'];
                               $mover_id =$value['mover_id'];
                               $created_on = $value['created_on'];
                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";
                               $movers_count = $value['movers_count'];

                               $Additional_hour = $value['additional_hours'];

                                $release_payment_amount = $value['release_pay_amount'];
                                $release_pay = $value['release_pay'];
                                $customer_paid_tip = $value['tip_amount'];
                                $total_mile_fee =$value['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                                // echo 'kkkkk';
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}

                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($created_on));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td style="<?php echo $style;?>"><?php echo $order_status;?></td>
                                          
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td><a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a></td>

                                  </tr>


                      <?php   
                        }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>

<!-- approve order status -->
<div class="tab-pane" id="approve_order_status">
                <div class="tabs-vertical-env">
            
                    <div class="tab-content">

                        <div class="tab-pane active">

 <table  id="approve_order_status_list" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Order Created on</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      <th>Revenue</th>
                                      <th>HireMovers</th>
                                      <th>Gross Margin</th>
                                      <th>Status</th>
                                      <th>Reviews</th>
                                      <th>Action</th>
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
                        <?php 

                        
                        foreach ($order_details_approve as $key => $value) {
                          $orderid = $value['id'];
                                // $move_date = $results['move_date'];
                                $move_date = date("m/d/Y",strtotime($value['move_date']));
                                $b_First_name = $value['b_First_name'];
                                // $pricevalue = $value['price'];
                                $customer_book_order = $value['price'];
                                $order_status = $value['order_status'];
                                 $company_name = $value['company_name'];
                                 $direct_url = $value['direct_url'];
                                 if($order_status =='Cancelled'){ $style ="color:red";} else { $style ='';}
                                 $pricevalue = $value['final_price'];
                                 $star_count =$value['star_count'];
                               $mover_id =$value['mover_id'];

                               //echo "SELECT admin_fee  FROM   user_master where   id_user_master ='$mover_id'";
                               $order_createdon = $value['created_on'];
                               $movers_count = $value['movers_count'];

                               $Additional_hour = $value['additional_hours'];

                                $release_payment_amount = $value['release_pay_amount'];
                                $release_pay = $value['release_pay'];
                                $customer_paid_tip = $value['tip_amount'];
                                $total_mile_fee =$value['per_mile_cost'];
                            $get_permile_fee11 = $this->db->query("SELECT * from movers_rate_new where userid ='".$mover_id."' and movers_count = '".$movers_count."' ")->result_array();
                            
                            // print_r($get_permile_fee11);
                            
                            if(!empty($get_permile_fee11)){
                              foreach ($get_permile_fee11 as $key => $value) {
                                
                              $addtion_hour_fee = $value['addtional_hours'];
                              # code...
                              }
                              if($addtion_hour_fee!='0'){
                                 $addtion_hoursadmin_fee = $addtion_hour_fee;
                              }
                              else{
                                $addtion_hoursadmin_fee = 0;
                              }
                            

                                if($Additional_hour!=''){
                                  // echo $Additional_hour;

                                  $hour_timefrr = explode(':', $Additional_hour);
                                  $hour_time = $hour_timefrr[0];
                                  $min_time = $hour_timefrr[1];
                                  $addtion_hourfeess =$hour_time * $addtion_hoursadmin_fee;
                                  if($min_time ==15){
                                    $min_hours =$addtion_hoursadmin_fee/4;
                                  }
                                  else if($min_time==30){
                                    $min_hours =$addtion_hoursadmin_fee/2;
                                  }else if($min_time ==45 ){
                                    $min_hours =($addtion_hoursadmin_fee * 3) /4;
                                  }else {
                                    $min_hours = 0;
                                  }
                                   $total_additional_hourfee = ($addtion_hourfeess) + ($min_hours);
                                }
                                else{
                              $total_additional_hourfee = 0.00;
                            }
                            }else{
                              $total_additional_hourfee = 0.00;
                            }

/*kalai*/

                            
                          // if($release_pay==1)
                          // {

                          //   // echo 'sssss';
                          //     if($release_payment_amount!='' && $customer_paid_tip!=''){
                                // echo 'kkkkk';
                              if($total_mile_fee==''){
                                $total_mile_fee = 0;
                              }
                              if($total_additional_hourfee == ''){
                                $total_additional_hourfee =0;
                              }
                              if($customer_paid_tip == ''){
                                $customer_paid_tip =0;
                              }
                              if($customer_book_order=='')
                              {
                                $customer_book_order =0;
                              }
                              // echo $total_additional_hourfee;
                              // echo 'booking price',$customer_book_order,'mile fee ',$total_mile_fee,'additional_hours ',$total_additional_hourfee,'tip ',$customer_paid_tip;

                            // $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);
                             // if($total_additional_hourfee == $confirm_payed){
                              // echo '111111';
                                $pricevalue = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$total_additional_hourfee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
                             // }
                          //   }
                          // }
                          // else
                          // {
                          //      $pricevalue =$pricevalue;
                          // }

                                 $admin_fee1 =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;
                                
                    
                      

 $Gross_mar=0;
 $total_admin_fee = 0;
 if($pricevalue != 0 && $pricevalue!='' ){
if(($pricevalue > 250) && (($direct_url == 'NULL') || ($direct_url == '' )  ) )
{ 
 
  
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee1 + $amount_b ;
    $Gross_mar = $pricevalue - $total_admin_fee;

} 

elseif( ($pricevalue > 250 ) && (($direct_url != 'NULL') || ($direct_url != '' )))
{
   // echo 'direct move';
   $amount = $pricevalue - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee1 / 2) + $amount_b ;
   $Gross_mar = $pricevalue - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  
  if($admin_fee1==''){
    $admin_fee1 = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
$total_admin_fee = $admin_fee1;
// $customer_book_order,$total_mile_fee;

// echo $customer_book_order,'ss',$total_mile_fee,'dd',$customer_paid_tip,'ssdsfa',$admin_fee1;
   $Gross_mar = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee1;
  // $mover_fee = 0;
}
}else
{
  $total_admin_fee = $admin_fee1;
  $Gross_mar = 0;
}
                                  if($order_status == 'Accepted'){
                                    $order_status ='Confirmed';
                                    $style35='color:purple';
                                  }else if($order_status=='Cancelled'){
                                    $style35 ='color:red';
                                   
                                  }else if($order_status=='Payment pending'){
                                    $style35 = 'color:black';
                                  }
                                  else if($order_status == 'Pending HireMovers Confirmation')
                                  {
                                    
                                     $style35 ='color:#F600F7';
                                  }
                                  else if($order_status =='Pending Cancellation'){
                                    $style35 ='color:red';
                                  }
                                  else{$style35='color:green';}

                                  

                         ?>

                         <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->

                                          <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal"><?php echo $orderid;?></a>
                                          </td>
                                          <td><?php echo date('m/d/Y H:s:i',strtotime($order_createdon));?></td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $b_First_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          <td>$<?php echo sprintf('%.2f',$pricevalue);?></td>
                                          <td>$<?php echo sprintf('%.2f',$total_admin_fee);?></td>
                                          <td>$<?php echo sprintf('%.2f',$Gross_mar);?></td>
                                          <td style="<?php echo $style35; ?>"><?php echo $order_status;?></td>
                                          
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                                                                    <td>
                                          <?php 
                                          if($order_status != 'Completed') {?>
                                          <a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $orderid;?>>"  data-target="#admin_orders" data-toggle="modal" ><button type="button"  class="btn approve_statusbtn"> Approve </button></a> 
                                          <?php } ?>

                                  </tr>


                      <?php   
                      }
                        ?>
              </tbody>
              </table>
                        </div>
                    </div>
                </div>
            </div>





</div>

<div id="admin_orders" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">


    </div>
   </div>
</div> 
<div id="admin_orders_reviews" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">


    </div>
   </div>
</div>

</div> 

  <!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content">
         
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
<script>
jQuery(document).ready(function() {
   
   jQuery('#order_details_table').DataTable(
    {
        
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }

    });

   jQuery('#order_details_table_filter input').addClass('form-control');
   jQuery("#order_details_table_info").css("font-size","17px");

   jQuery('#new_order_details').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });
   
  jQuery('#Completed_orders_details').DataTable(
    {
        "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });
   jQuery('#Confirmed_orders_details').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });

   jQuery('#rescheduled_list_details').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });
   
   jQuery('#Cancelled_orders_details').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });
jQuery('#approve_order_status_list').DataTable(
    {
      "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });
   

});

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


function delete_review(orderid) { 

// alert(orderid);

 swal({
  title: "Are you sure? Want to Delete the Review !",
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
     $.ajax(
                    {
                        type: "post",
                        url: "<?php echo BASE_URL;?>/dashboard/delete_review ",
                        data: {"orderid":orderid},
                       dataType: 'json', 
                    success: function(data)
                    { 
                         
                 } 
                 
                 });


     console.log('jjjjjjjjjjj');

      swal("Review Deleted!", "Delete Review", "success");
        setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 2000);
     

   }  
   else{
     swal("Cancelled", "cancelled", "error");
   }
   
 });

}
 

</script>

    
<style type="text/css">
  #admin_orders .modal-dialog {
    width: 65%;}

@media screen and (min-width: 300px) and (max-width: 500px){
  #admin_orders .modal-dialog {
    width: 90%;}
}  
@media screen and (min-width: 501px) and (max-width: 700px){
  #admin_orders .modal-dialog {
    width: 95%;}
}    
</style>



