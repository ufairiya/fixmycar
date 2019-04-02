<style type="text/css">
  #order_popup .modal-dialog {width: 57%;}
 #add_hours_customer .select_aditional_hours{ padding: 10px;
    background: white;color: #555555;
    border:1px solid #c2cad8;font-size: 14px;
    border-radius: 4px;box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }
.order_details_values .order_notice .alert-success {
    border: 1px solid #D3ECD9 !important;
    background: #D3ECD9 !important;
    color: #155724 !important;
}
</style>

<?php 

// print_r($order_results);

foreach ($retrive_details as $value) {
   // echo '<pre>';print_r($value);echo '</pre>';
  $order_id =$value['id'];
  $b_First_name =$value['b_First_name'].' '.$value['b_Last_name'];
  $b_Phone_no =$value['b_Phone_no'];
  $b_email =$value['b_email'];
  //$move_date =$value['move_date'] ;
$move_date = date("m/d/Y",strtotime($value['move_date']));
   $booked_mover_id  = $value['mover_id'];
     $mover_details = $this->db->query("SELECT * FROM user_master where id_user_master = '".$booked_mover_id."' ")->row(); 
     // echo '<pre>';print_r($mover_details);echo '</pre>';
      $mover_name = $mover_details->first_name; 
      $mover_address = $mover_details->address;
      $mover_company_name = $mover_details->company_name;
$customer_paid_tip = $value['tip_amount'];
  if($customer_paid_tip==''){
    $customer_paid_tip =0.00;
  }
  $arrival_time =$value['arrival_time'];
  $movers_count =$value['movers_count'];
  $hours =$value['hours'];
  $loading_location =ucfirst(str_replace('_', ' ',$value['loading_location']));
  // if($loading_location == 'Storage_unit'){
  //   $loading_location = 'Storage Unit';
  // }
  $unloading_location =ucfirst(str_replace('_', ' ',$value['unloading_location']));
  // if($unloading_location == 'Storage_unit'){
  //   $unloading_location = 'Storage Unit';
  // }
  $loading_by = ucfirst(str_replace('_', ' ', $value['loading_by']));
  $loading_address =ucfirst($value['loading_address']);
  $loading_city =ucfirst($value['loading_city']);

  $loading_state =ucfirst($value['loading_state']);
  $unloading_address =$value['unloading_address'];
  $unloading_city =ucfirst($value['unloading_city']);
  $unloading_state =ucfirst($value['unloading_state']);
  $unloading_city =ucfirst($value['unloading_city']);

   $location_loading =ucfirst(str_replace('_', ' ',$value['location_loading']));
  // if($location_loading == 'Storage_unit'){
  //   $location_loading = 'Storage Unit';
  // }
  $location_loading_address =ucfirst($value['location_loading_address']);
  $location_loading_city=ucfirst($value['location_loading_city']);
  $location_loading_state =ucfirst($value['location_loading_state']);

  $price =  number_format((float)$value['price'], 2, '.', '');
  $additional_details =$value['additional_details'];
  $service_id =$value['service_id'];
  $order_status =$value ['order_status'];
  $created_on =$value['created_on'];
  $order_confirmed_date = $value['confirmed_date'];
  if($order_confirmed_date=='0000-00-00'){
    $order_confirmed_date='';
  }
  $order_cancel_date = $value['cancel_date'];
  if($order_cancel_date=='0000-00-00'){
    $order_cancel_date='';
  }
  $modified_on =$value['modified_on'];
  $completed_date = $value['completed_date'];
  $disabled_buttons ='';
  $company_name = $value['company_name'];
  $release_pay = $value['release_pay'];
  $loading_apt = $value['loading_apt'];
  $unloading_apt = $value['unloading_apt'];
$location_loading_apt = $value['location_loading_apt'];
  $additional_hr_req_mv = $value['mover_adtin_hr_status'];
  $mover_request_hours = $value['mover_request_hours'];
if($release_pay == 1){
  $class_name = 'disabled_buttons';
}
else{
  $class_name ='';
}
// if($order_status =='Payment pending') 
//   {
//     $disabled_buttons = 'disabled'; 
//   }

  // if(  $order_status =='Completed' ||  $order_status =='Accepted' )
  // {
  //   $disabled_buttons = 'disabled'; 
  // }
$hours1 =$value['hours'];
if( $hours1 =='hour2') { $hours1 ="2 Hours"; }
            if( $hours1 =='hour3') { $hours1 ="3 Hours"; }
            if( $hours1 =='hour4') { $hours1 ="4 Hours"; }
            if( $hours1 =='hour5') { $hours1 ="5 Hours"; }
            if( $hours1 =='hour6') { $hours1 ="6 Hours"; }
            if( $hours1 =='hour7') { $hours1 ="7 Hours"; }
            if( $hours1 =='hour8') { $hours1 ="8 Hours"; }
            if( $hours1 =='hour9') { $hours1 ="9 Hours"; }
            if( $hours1 =='hour10') { $hours1 ="10 Hours"; }
            
            if( $hours1 =='hour12') { $hours1 ="12 Hours"; }

} 

$hour_value = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12');

 $additional_hours_rq = $value['additional_hours'];
$request_hours_true = $value['request_hours'];
// if($request_hours_true==1){
//   $style_disabled = 'disabled';
// }
// else{
//   $style_disabled='';
// }
?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body order_details_values">
        <div class="row">
          <div class="heading_style">
                <h3>ORDER #<?php echo  $order_id;?></h3>
         </div> <br>
                        <?php 

//$order_status ='Cancelled';
                if($order_status =='Accepted')
                {?>

                          <div class="col-md-12  order_notice">
                              <div class="alert alert-success">

                                <strong><?php echo 'Confirmed';?></strong> <?php if($order_confirmed_date!=''){ echo ' on ', date("m/d/Y" ,strtotime($order_confirmed_date)); }?>
                              </div>
                          </div>
                      

                <?php }

                if($order_status =='Cancelled'){?>

                  <div class="col-md-12 order_notice">

                            <div class="alert alert-danger">
                             <strong><?php echo $order_status ;?>  </strong><?php if($order_cancel_date!=''){echo ' on ', date("m/d/Y" ,strtotime($order_cancel_date)); } ?>
                            </div>
                  </div>

                <?php }
              if($order_status =='Completed'){?>

                  
                  <div class="col-md-12  order_notice">
                              <div class="alert alert-success">
                                <strong><?php echo 'Completed';?> on </strong> <?php echo  date("m/d/Y" ,strtotime($completed_date));?>
                              </div>
                          </div>

                <?php }
              ?>

              <div class="col-md-12" style=" text-align: right;margin-bottom: 10px;">
        
                  
              <!--     <button  type="button"  href="<?php echo BASE_URL;?>/movers/reschedule/<?php echo $order_id;?>"  data-target="#reschedule" data-toggle="modal" class="btn btn-primary  reschedule_btn" <?php echo $disabled_buttons?> >     
                          <i class="fa fa-clock-o"></i>&nbsp;Reschedule 
                      </button> -->
<?php 
 if($order_status != 'Completed' && $order_status !='Cancelled' && $order_status != 'Payment pending' && $order_status != 'Pending HireMovers Confirmation'){?>
                       <button  type="button"  href="<?php echo BASE_URL;?>/customer/reschedule/<?php echo $order_id;?>?>?x=<?php echo date('ymd');?>"  data-target="#reschedule_customer" data-toggle="modal" class="btn btn-primary  reschedule_btn" <?php //echo $disabled_buttons?> >     
                          <i class="fa fa-clock-o"></i>&nbsp;Reschedule 
                      </button>
    
               <button    data-target="#contact_mover_customer" data-toggle="modal" type="button" class="btn btn-info" <?php //echo $disabled_buttons?>><i class="fa fa-phone"></i>&nbsp;Contact HireMovers</button>
               <?php  if($additional_hr_req_mv == 0 && $additional_hr_req_mv!=''){?> 
                  <button  href="<?php echo BASE_URL;?>/movers/add_hours_request/<?php echo $order_id;?>"  data-target="#add_hours_for_order" data-toggle="modal" type="button" class="btn  btn-primary " <?php //echo $style_disabled;?> ><i class=""></i>&nbsp;Approve Additional Hours </button> 
                   <?php } ?> 

               <!-- <button   data-target="#add_hours_customer" data-toggle="modal" type="button" class="btn btn-primary" <?php echo $disabled_buttons?>><i class="fa fa-clock-o"></i>&nbsp;Add Hours</button> -->
        <?php     if( $release_pay != 1 || $release_pay=='' ) { ?>

              
                 <button   href="<?php echo BASE_URL;?>/customer/release_payment/<?php echo $order_id;?>?x=<?php echo date('ymd');?>"  data-target="#release_payment_customer" data-toggle="modal" type="button" class="btn btn-success " <?php //echo $disabled_buttons?>><i class="fa fa-dollar"></i>&nbsp;Release Payment</button>
<?php 
 } } ?>
                 <!-- <button  href="<?php echo BASE_URL;?>/customer/cancelorder/<?php echo $order_id;?>"      data-target="#cancelorder_customer" data-toggle="modal" type="button" class="btn btn-danger" <?php echo $disabled_buttons?>><i class="fa fa-remove"></i>&nbsp;Cancel Job</button> -->

                 


                  
                    
              </div>

              
                  
     <div class="col-md-12">
                        <div class="col-md-6">                
                         <strong class="sub-heading">Reservation</strong>   
                         <p class="cus_mover_name">Movers:&nbsp;<?php echo $company_name;?></p>
                         <!-- <p>Phone:&nbsp;<?php //echo $mover_phone;?></p>  
                         <p>Email:&nbsp;<?php //echo $mover_email;?></p>  -->          
                         <p>Date of Move: <?php echo $move_date;?></p>
                          <p><?php echo $arrival_time;?></p>
                          <p><?php echo $movers_count; 
                          if($movers_count == 1){$movers_name = ' Mover';} else{$movers_name =' Movers';}

                           echo $movers_name;  ?>, <?php echo $hours1;?></p>
                        </div>
                        <div class="col-md-6">
                          

                          <?php 

                          //if($order_status =='Accepted' ||  $order_status =='Completed')
               // {?>
                          <strong class="sub-heading">Contact Info</strong>
                          <p>Name: <?php echo $mover_name ; ?></p>
                          <p class="tex_transform_stl">Phone: <?php 
                          //echo $b_First_name; 
                          echo $mover_phone?></p>
                          <p class="con_style">Email: <?php 
                          //echo $b_Phone_no;
                          echo $mover_email;
                          ?></p> 
                       
                          <a href style="color: #693238;font-size: 13px;" ="#"><u><?php 
                          //echo $mover_email;?>
                          	
                          </u></a>

                          <?php //} ?>

                          
                        </div>
                              

 
      </div>

    <div class="col-md-12">

    <?php if($loading_location !='') { ?>
        <div class="col-md-6">
        <strong class="sub-heading">Loading Details</strong>
        <p class="tex_transform_stl">Moving From:&nbsp;<?php echo $loading_location;?></p>
        <p class="tex_transform_stl">Loading:&nbsp;<?php echo $loading_by;?></p>
        <p >Address: <br>
        <?php echo $loading_address;?>
        <?php echo $loading_city;?>
        <?php echo $loading_state;?>
        </p>
        <?php if($loading_apt != '') { ?>
        <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $loading_apt; ?></p> <?php } ?>

        </div>
        <?php } ?>

        <?php if($unloading_location !='') { ?>

         <div class="col-md-6">
             <strong class="sub-heading">Unloading Details</strong>
             <p class="tex_transform_stl">Moving To:&nbsp;<?php echo $unloading_location;?></p>
             <?php if(($loading_location =='') && ($unloading_location !='' )){ ?>
             <p class="tex_transform_stl">Loading:<?php echo str_replace("_"," ",$loading_by);?></p>
             <?php }?>
             <p>Address: <br>
             <?php echo $unloading_address;?>
             <?php echo $unloading_city;?>
             <?php echo $unloading_state;?>
             </p>
            <?php if($unloading_apt!=''){?>
             <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $unloading_apt; ?></p>
         
             <?php }?>
         

        </div>

        <?php } ?>

        <?php if($location_loading !='') { ?>

         <div class="col-md-6">
             <strong class="sub-heading">Location Details</strong>
             <p class="tex_transform_stl">Location:&nbsp;<?php echo $location_loading;?></p>
             <p>Address: <br>
             <?php echo $location_loading_address;?>
             <?php echo $location_loading_city;?>
             <?php echo $location_loading_state;?>
             </p>
             <?php if($location_loading_apt){?>
             <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $location_loading_apt; ?></p>
             <?php }?>
             
         

        </div>

        <?php } ?>

    </div>
          
            <div class="col-md-12">
               <div class="col-md-6">
                <strong class="sub-heading">Move Description:</strong>
                <p> <?php echo $additional_details;?></p>
              </div>
            </div>

             


              
              <div class="col-md-12">
              <?php  if($request_hours_true != 2 && $request_hours_true!=''){ if($additional_hours_rq!=''){?>
               <div class="col-md-6">
                <strong class="sub-heading">Additional Hours:</strong>
                <p> <?php echo $additional_hours_rq;?>  Hours </p>
                </div>
                <?php } } if($additional_hr_req_mv!=2 && $additional_hr_req_mv!=''){ if($mover_request_hours!=''){?>
                 <div class="col-md-6">
                <strong class="sub-heading">Additional Hours Requested:</strong>
                <p> <?php echo $mover_request_hours;?> Additional Hours </p>
                </div>
                <?php } }?>
            </div>
            <br>
            

<!--  *******************jamuna**************************** -->
<div class="col-md-12">
<div class="col-md-6">
<strong class="sub-heading">Invoice</strong> 
</div>
</div>

<div class="col-md-12">
<div class="col-md-6">
 <button class="print_order" style="font-size:15px;background-color:#20C2BA;color: white;">Print Order Details</button> 
</div>
</div>

<?php 
   $mover_id = $value['mover_id'];
   $cus_address = $value['loading_address'];
   $extra_hours = $value['additional_hours'];
   if($extra_hours==''){
    $additiona_hour_total_fee =0;
   }
   $loading_type = $value['loading_type'];
   $direct_book_mover = $value['direct_url'];
   $customer_book_order = $value['price'];
   $release_pay = $value['release_pay'];
   $release_payment_amount = $value['release_pay_amount'];
   $distance_from_to = $value['distance'];
   $total_mile_fee = $value['per_mile_cost'];
   $final_booking_amount = $value['final_price'];
if($final_booking_amount==''){
  $final_booking_amount =0;
}


 $res =$this->db->query( "select * from user_master where id_user_master = '".$mover_id."' ")->row();
  $mover_address = $res->address ;

$admin_fee =$this->db->query("SELECT admin_fee FROM  user_master where id_user_master='$mover_id'")->row()->admin_fee;

// if($loading_type == 'loading' || $loading_type == 'loading,unloading')
// {
//    $from = str_replace(' ','%20', $cus_address)  ; /* loadind address */
//    $to =  str_replace(' ','%20', $mover_address);
//   // echo $from;
//   // echo $to;
//   if($from == $to)
//   {
//     $distance = 0;
//     $value11 = 0;
//   }
//   else 
//   {      
// $ch = curl_init();

// // define options
// $optArray = array(
//     CURLOPT_URL => 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$from.'&destinations='.$to.'&key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU',
//     CURLOPT_RETURNTRANSFER => true
// );
// // apply those options
// curl_setopt_array($ch, $optArray);
// // execute request and get response
// $result = curl_exec($ch);
// // echo '<pre>';
// // print_r($result);
// // echo '</pre>';
// $distance_val = json_decode($result);

// $value11 =  $distance_val->rows[0]->elements[0]->distance->text;
// }
// $str = $value11; 
// preg_match_all('!\d+!', $str, $matches);

// if(!empty($matches[0][1]))
//  {
//    $distance = $matches[0][0].'.'.$matches[0][1];
//  }
//  else
//  {
//   $distance = $matches[0][0].'.0';
//  }
// }
// elseif($loading_type == 'unloading')
// {
 
//   $from1 = str_replace(' ','%20',$unloading_address) ;
//   $to1 = str_replace(' ','%20',$mover_address);

//   if($from1 == $to1 )
//   {
//     $distance1 = 0 ;
//      $value12 = 0;
//   }
//    else 
//    {
//    $time1 =  $data->rows[0]->elements[0]->duration->text;

// $ch = curl_init();
// $optArray = array(
//     CURLOPT_URL => 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$from1.'&destinations='.$to1.'&key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU',
//     CURLOPT_RETURNTRANSFER => true
// );
 
// curl_setopt_array($ch, $optArray);

// $result = curl_exec($ch);
// $distance_val1 = json_decode($result);
//    $value12 =  $distance_val1->rows[0]->elements[0]->distance->text;
//  }
// $str1 = $value12; 
// preg_match_all('!\d+!', $str1, $matches);

// //print_r( $matches );

// if(!empty($matches[0][1]))
//  {
//    $distance1 = $matches[0][0].'.'.$matches[0][1];
//  }
//  else
//  {
//   $distance1 = $matches[0][0].'.0';
//  }

// }
// elseif($loading_type == 'move_on_site_only')

// {
//    $from2 = str_replace(' ','%20',$location_loading_address) ;

//    $to2 = str_replace(' ','%20',$mover_address);

//    if($from2 == $to2 )
//    {

//     $distance2 = 0 ;
//      $value13 = 0;

//    }
   
//    else 
//    {
//   $ch = curl_init();
//  $optArray = array(
//     CURLOPT_URL => 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.$from2.'&destinations='.$to2.'&key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU',
//     CURLOPT_RETURNTRANSFER => true
// );
 
// curl_setopt_array($ch, $optArray);
// $result = curl_exec($ch);
// $distance_val3 = json_decode($result);
 
// $value13 =  $distance_val3->rows[0]->elements[0]->distance->text;
// }
// $str3 = $value13; 
// preg_match_all('!\d+!', $str3, $matches);

// if(!empty($matches[0][1]))
//  {
//    $distance2 = $matches[0][0].'.'.$matches[0][1];
//  }
//  else
//  {
//   $distance2 =  $matches[0][0].'.0';
//  }

// }
// $additional_hours_rq = $value['additional_hours'];
// $request_hours_true = $value['request_hours'];
?>

<div class="col-md-12" id="printTable">
<table class="order_table_head" id="stl_datatable" style="margin-top: 15px;">
 <thead>
      <tr>
          <th>Item</th>
          <th id="result">Quantity</th>
          <th>Rate</th>
          <th>Subtotal</th>
      </tr>
  </thead>
  <tbody>
   <tr>   
      <?php 
      $doller = '$';
          $any_string = $hours;
          preg_match_all('!\d+!', $any_string, $get_num); 
           $get_num[0][0];

      ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $movers_count;?>  <?php if($movers_count ==1) { echo "Mover"; } else { echo  "Movers";} ?>, <?php echo  $get_num[0][0],' Hour';?></td>
         <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"></td>
         <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $doller,sprintf('%.2f',$customer_book_order);?></td>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $doller,sprintf('%.2f',$customer_book_order); ?></td>
  </tr>

   <tr>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'Per Mile Fee' ; ?></td>

<?php $mile = ' Miles' ;

 
 $get_permile_fee = $this->db->query("SELECT * from movers_rate_new where userid ='$mover_id' and movers_count = '$movers_count' ")->row();

   $milefee = $get_permile_fee->per_mile;

   $additional_hours_fee = $get_permile_fee->addtional_hours;

if($loading_type == 'loading' || $loading_type == 'loading,unloading') 
  { ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>


<?php  
       if($distance_from_to !=0 )
        { ?>
         
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
<?php   }
        else
        { ?>

          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>

<?php   }

}

  elseif ($loading_type == 'unloading') 
  { ?> 
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>

<?php
      if($distance_from_to !=0 )
        { ?>
         
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
<?php   }
        else
        { ?>

          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>

<?php   }
 } 
 elseif($loading_type == 'move_on_site_only')
  { ?>
  
     <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>
<?php 

       if($distance_from_to !=0 )
        { ?>
         
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
<?php   }
        else
        { ?>

          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>

<?php    }

 }

$var = $milefee;

 $str = '$';
 ?>


   <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$total_mile_fee);?></td>


 </tr>

 <tr>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo ' Additional Hours'; ?></td>
        
<?php 
// 
     if($extra_hours != '' )
      {
     $extra_hours ;
     preg_match_all('!\d+!', $extra_hours, $matches); 
     //print_r( $matches );
      $matches[0][0]; 
      $matches[0][1];
      $dot = '.' ;
      $extra_hr = $matches[0][0].$dot.$matches[0][1];
      $extra_hr;
       $additional_hours_fee; 
       $not_point = $matches[0][0]; 
       $additional_hour =$matches[0][0] * $additional_hours_fee;

      if($matches[0][1] == '15') 
      {
         $hour_total_fee = $additional_hours_fee / 4 ; 
         
         $addtional_hour_fee = $matches[0][0]*$additional_hours_fee; 
         $additiona_hour_total_fee = $addtional_hour_fee + $hour_total_fee;
      }
      else if($matches[0][1] == '30')
      {
         $hour_total_fee = $additional_hours_fee / 2 ; 
         $addtional_hour_fee = $matches[0][0]*$additional_hours_fee; 
         $additiona_hour_total_fee = $addtional_hour_fee + $hour_total_fee;
      }
      else if($matches[0][1] == '45') 
      {
         $hour_total = $additional_hours_fee * 3 ; 
         $hour_total_fee = $hour_total / 4 ;
         $addtional_hour_fee = $matches[0][0]*$additional_hours_fee;
         $additiona_hour_total_fee = $addtional_hour_fee + $hour_total_fee;
      }
      else if($matches[0][1] == '00')
      {
          $addtional_hour_fee = $matches[0][0]*$additional_hours_fee; 
         $additiona_hour_total_fee = $addtional_hour_fee;
         }
         
      ?>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $extra_hours ; ?></td>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,$additional_hours_fee;?></td>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$additiona_hour_total_fee); ?></td>
      
      
    <?php }
    else 
    { ?>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">-</td>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,$additional_hours_fee;?></td>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">No fee</td>

    <?php } ?>
  <tr>
  <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">Tip</td>
  <td style="border:1px solid #E5E5E5;"></td>
  <td style="border:1px solid #E5E5E5;"></td>
<?php if($release_pay == 1 && $customer_paid_tip!= '')
 { ?>
  <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo sprintf('%.2f',$customer_paid_tip); ?></td>
  </tr>
<?php }
else { ?>
         <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$customer_paid_tip); ?></td>
 <?php } ?>



<!-- kalai -->
<?php 
// echo 'booking price', $customer_book_order,'mile fee',$total_mile_fee,'additional_hours',$additiona_hour_total_fee,'tip',$customer_paid_tip;

// if($release_pay==1){
// if($release_payment_amount!='' && $customer_paid_tip!=''){

if($total_mile_fee==''){
  $total_mile_fee = 0;
}
if($additiona_hour_total_fee == ''){
  $additiona_hour_total_fee =0;
}
if($customer_paid_tip == ''){
  $customer_paid_tip =0;
}


// $confirm_payed = $release_payment_amount - str_replace('$', ' ',$customer_paid_tip);

   $final_booking_amount = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$additiona_hour_total_fee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
 
// }
// }
// else{
//   $final_booking_amount =$final_booking_amount;
// }
?>

<!-- kalai -->
      <tr>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Total</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
<?php 
if($final_booking_amount != 0)
{ 
  
  ?>
      <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
"><?php echo $str,sprintf('%.2f',$final_booking_amount) ; ?></td>
  
<?php }
else
{ 
 ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
"><?php echo $str,sprintf('%.2f',0) ; ?></td>

<?php } ?> 

</tr>

<?php 




// if($loading_type == 'loading' || $loading_type == 'loading,unloading')
// {

//  $grand_toal = (round($total_fee)) + $extra_fee;  ?>

<?php 
// if(($grand_toal > 250) && ($direct_book_mover == 'NULL') || ($direct_book_mover == '' ) && $grand_toal != 0 ) 
// { 
  
//    $amount = $grand_toal - 250 ;
//    $amount_a = $amount * 10;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal - round($total_admin_fee);
//    // echo 'AAAA if';

// } 

// elseif(($direct_book_mover != 'NULL') && ($grand_toal > 250 )&& ($direct_book_mover != '' ))
// {
   
//    $amount = $grand_toal - 250 ;
//    $amount_a = $amount * 5;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal - round($total_admin_fee);
//    // echo 'AAAA elseif';
// }
// else
// {
//   $grand_toal = (round($total_fee)) + $extra_fee ;
//   $mover_fee = 0;
// }
?>
    <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$grand_toal); ?></td> -->

 <?php //}
// elseif($loading_type == 'unloading')
// {
  
//   $grand_toal1 = round($total_fee1) + $extra_fee ;
  
//   if(($grand_toal1 > 250) && ($direct_book_mover =='NULL') || ($direct_book_mover =='') && $grand_toal1 != 0 )
//   { 
//    $amount = $grand_toal1 - 250 ;
//    $amount_a = $amount * 10;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal1 - round($total_admin_fee);
//    // echo 'BBBB if';

//  }
 
//  elseif($direct_book_mover != 'NULL' && $grand_toal1 > 250 && $direct_book_mover != '' )
//  {
//    $amount = $grand_toal1 - 250 ;
//    $amount_a = $amount * 5;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal1 - round($total_admin_fee);
//    // echo 'BBBB elseif';
//  }
// else 
//  {
//   $grand_toal1 = (round($total_fee1)) + $extra_fee ;
//    $mover_fee = 0;
//  }

 ?>

<!--   <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$grand_toal1); ?> </td> -->

 <?php //}
// elseif($loading_type == 'move_on_site_only')
// {

//  $grand_toal2 = (round($total_fee2)) + $extra_fee + $release_payment_amount  ;
// if(($grand_toal2 > 250) && ($direct_book_mover =='NULL') || ($direct_book_mover =='') && $grand_toal2 != 0) 
// { 
//    $amount = $grand_toal2 - 250 ;
//    $amount_a = $amount * 10;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal2 - round($total_admin_fee);
//    // echo 'CCCC if';
// } 

// elseif( $direct_book_mover != 'NULL' && $grand_toal2 > 250 && $direct_book_mover != '')
// {
//    $amount = $grand_toal2 - 250;
//    $amount_a = $amount * 5;
//    $amount_b = $amount_a / 100 ; 
//    $total_admin_fee = $admin_fee + $amount_b ;
//    $mover_fee = $grand_toal2 - round($total_admin_fee);
//    // echo 'CCCC elseif';
// }
// else  
// {
//   $grand_toal2 = (round($total_fee2)) + $extra_fee ;
//   $mover_fee = 0;
// }

?>

 <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$grand_toal2); ?> </td> -->

 <?php //} ?> 

    

<!-- <tr>
    <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">Less Hire Helper</td>
    <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
    <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td> -->
 <?php 
// if($loading_type == 'loading' || $loading_type == 'loading,unloading')
// {
//        if($grand_toal != 0 )
//         { ?> 

        <!--  <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$total_admin_fee) ; ?></td> -->

 <?php  // }
//         else
//         { ?>
          
          <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">-</td> -->

<?php
      //  }
//}


// elseif($loading_type == 'unloading')
// {
//      if($grand_toal1 != 0 ) 

//      { ?>
          <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$total_admin_fee) ; ?></td>
 -->
 <?php //}
//       else
//       { ?>
          
         <!--  <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">-</td> -->
<?php //}
// }
// elseif($loading_type == 'move_on_site_only')
// {  
//        if($grand_toal2 != 0 )
//        { ?>

          <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$total_admin_fee) ; ?></td> -->
<?php // }
       //else
       //{ ?>

         <!-- <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">-</td>   --> 
<?php  //}
//}
?>
<!--</tr>


 <tr>
<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Hire Movers</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$admin_fee) ; ?> </td>
 
</tr>
<tr>
<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Mover Fee</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$mover_fee) ; ?></td>
  
</tr> 
 </tr> -->
  </tbody>
  </table>
  </div>

<!-- ************************jamuna******************** -->

</div>
</div>    
<!-- kalai -->
<div id="add_hours_customer" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">
    <div class="modal-header">
    <span class="close hours_add_popup" >&times;</span>
    <h3>Add Hours</h3>
  </div>
 
   
<br>
        <div class="row">

          <div class="col-md-12">
<?php $hours_change=$hours;?>
      
          <div class="col-md-3">

              <select class="select_hours form-control" name="select_hours" >
               <?php 

foreach ($hour_value as $value) {

 echo ' <option value='.$value.'>'.$value.' hours</option>';
}

              ?>
              </select>
              <input type="hidden" name="order_id" class="get_changed_hour_id" value="<?php echo $order_id; ?>">
              <input type="hidden" name="user_name" value="<?php echo $b_First_name;?>">
              <input type="hidden" name="user_email" value="<?php echo $b_email;?>">
              <input type="hidden" name="mover_id" value="<?php echo $booked_mover_id; ?>">

              
            </div>
<!-- <div class="" style="clear: both;"></div>
 -->         
          
           
          
              
              <div class="col-md-3">
                <select class=" select_aditional_hours " name="select_aditional_hours">
                  <option value="0">0 mins</option>
                  <option value="15">15 mins</option>
                  <option value="30">30 mins</option>
                  <option value="45">45 mins</option>
                </select>
                </div>
                <div class="col-md-3">

            <div>
                <button class="btn btn-theme fa fa-edit changed_hours_update_order_poup">&nbsp;Update</button>
                </div>
            </div>
              
          </div>
          <br>


            <br><br>

            
</div>
        </div>


</div>
    </div>
   </div>
</div>

<form role="form"  name ="contact_mover_customer123"  id ="contact_mover_customer123" class="form-horizontal" method="POST">
<div id="contact_mover_customer" class="modal contact_mover_customer fade" role="dialog" >
  <div class="modal-dialog">

    <div class="modal-content">
   
<div class="modal-header">
        <button type="button" class="close contact_mover_customer_close" >&times;</button>
        <h3>ORDER #<?php echo $order_id;?></h3>
      </div> 
      <div class="modal-body">
                <h5 class="contact_heading_style">CONTACT HIREAMOVER ABOUT THIS ORDER</h5>
                <input type="hidden" name="order_id" class="order_id_valurs" value="<?php echo $order_id; ?>">

                <input type="hidden" name="user_email" class="user_email" value="<?php echo $b_email; ?>">
                <input type="hidden" name="user_name" class="user_name" value="<?php echo $b_First_name; ?>">
                <input type="hidden" name="mover_id" class="booked_mover_id" value="<?php echo $booked_mover_id;?>">
                <select class="form-control reason_for_contact" name="reason_for_contact" id="reason_for_contact">
                  <option value="">Please select a reason......</option>
                  <option value="Moving company cancelled">Moving company cancelled</option>
                  <option value="I am cancelling for myself">I am cancelling for myself</option>
                  
                  <option value="Can't reach mover">Can't reach mover</option>
                  <option value="Payments">Payments</option>
                  <option value="Other">Other</option>
                </select>
                <div class="selected_company_cancel" style="display: none;" >
                
                <label>Reason:</label><br>

                
                <input type="checkbox" class="reason_for_comp_cancel"  name="moving_company_cancelled1" value="Wants to take payment directly">Wants to take payment directly<br>
                <input class="reason_for_comp_cancel"  type="checkbox" name="moving_company_cancelled1" value="Said they are unavailable"> Said they are unavailable<br>

                <input  class="reason_for_comp_cancel" type="checkbox" name="moving_company_cancelled1" value="Unable to accommodate a new date/time">Unable to accommodate a new date/time<br>

                <input class="reason_for_comp_cancel"  type="checkbox" name="moving_company_cancelled1" value="Never showed up" > Never showed up<br>


                <input  class="reason_for_comp_cancel" type="checkbox" name="moving_company_cancelled1" value="Other" >Other<br> 
                </div>
                

          <div class="selected_company_cancel123" style="display: none;" >
                
                <label>Reason:</label><br>

                
                <input type="checkbox" class="reason_for_comp_cancel"  name="moving_company_cancelled1" value="Mover wants to take payment directly">Mover wants to take payment directly<br>
                <input class="reason_for_comp_cancel"  type="checkbox" name="moving_company_cancelled1" value=" Movers are not available"> Movers are not available<br>

                <input  class="reason_for_comp_cancel" type="checkbox" name="moving_company_cancelled1" value="Movers unable to accommodate a new date/time">Movers unable to accommodate a new date/time<br>

                <input class="reason_for_comp_cancel"  type="checkbox" name="moving_company_cancelled1" value="No longer moving" >  No longer moving<br>


                <input  class="reason_for_comp_cancel" type="checkbox" name="moving_company_cancelled1" value="Do not need to hire movers now" >Do not need to hire movers now<br> 
                </div>
                <br>



                <textarea cols="5" rows="7" id="description_for_contact" name="description_for_contact" class="form-control description_for_contact"></textarea>
                
                  
                  
                
              
        </div>
        <div class="modal-footer">
        <span><button type="button"  value="cancel" class="btn btn-danger contact_mover_customer_close">Close</button></span>
         <span>
          <button type="submit" class="btn  btn-success ">Send Message</button></span>
        </div>
     
     
      </div>

    </div>
  </div>
</form>






<script type="text/javascript">

 jQuery('<div id="reschedule_customer" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");

  jQuery('<div id="contact_mover_customer" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");

  jQuery('<div id="add_hours_customer" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");

  jQuery('<div id="release_payment_customer" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");

  jQuery('<div id="cancelorder_customer" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");
  
  jQuery('<div id="proceed_payment" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#release_payment_customer");
  jQuery('<div id="add_hours_for_order" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");
 // jQuery('<div id="kalai" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#order_popup");

</script>




<script type="text/javascript">
  $(document).ready(function(){
    jQuery(document).on('click','.changed_hours_update_order_poup',function(){
    // $('.changed_hours_update_order_poup').click(function(){
      var changed_hours = $('.select_hours').val();
      
      // alert(changed_hours);
      var normal_hour = $('.normal_hour').val();
      var additional_hours = $('.select_aditional_hours').val();
      var order_id = $('.get_changed_hour_id').val();
      // alert(order_id);
      if(order_id!='' && changed_hours!=''){
        $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/change_added_hours", 
                type: "POST",             
                data: {'changed_hours':changed_hours,'order_id':order_id,'additional_hours':additional_hours,'normal_hour':normal_hour,},             
                dataType:'json',    
                success: function(data) {
                
              if(data==0){
                   toastr.success("Order hours added successfully", "Notifications");
                   setTimeout(function(){ 

                 

                     window.location.reload();
                  
                    }, 3000);
                   
                }
                if(data==1){
                  toastr.success("Error in update", "Notifications");
                }
                // toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }
            });
      }

    })
  })
  $('.hours_add_popup').click(function(){
    $('#add_hours_customer').modal('hide');
  })
  $('.contact_mover_customer_close').click(function(){

    $('#contact_mover_customer').modal('hide');


  })
</script>

<script type="text/javascript">
  $('.mail_to_hiremover').click(function(){
   $(' input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                alert("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
                alert("Checkbox is unchecked.");
            }
        });

    var checkboxval = $(".reason_for_comp_cancel").val();
    var order_id = $('.order_id_valurs').val();
    
    var user_email = $('.user_email').val();
    var user_name = $('.user_name').val();
    var mover_id = $('.booked_mover_id').val();
    var reason_for_contact = $('.reason_for_contact').val();
    var description_for_contact = $('.description_for_contact').val();


    if(reason_for_contact!='' && description_for_contact){


            $.ajax({
                url: "<?php echo BASE_URL; ?>/Customer/contact_hiremover/"+order_id, 
                type: "POST",             
                data: {'order_id':order_id,'mover_id':mover_id,'reason_for_contact':reason_for_contact,'description_for_contact':description_for_contact,'user_name':user_name,'user_email':user_email,'reason_value':checkboxval},
                
                dataType:'json',    
                success: function(data) {
                  // exit();
                  // alert("ssssssss");
                   if(data==0)          {
                toastr.success("Contact mail send successfully", "Notifications");
                  setTimeout(function(){ 

                    

                     window.location.reload();
               
                   }, 3000); 
                  
                }
                if(data==1){
                  toastr.success("Please check any reason", "Notifications");
                }
                }
            });
            //return false;
         
       }
       else{
        toastr.success("Select Any Reason or Description", "Notifications");
       }
      
    

 });

</script>
<script type="text/javascript">
  $('.reason_for_contact').change(function(){
    var reson_value = $('.reason_for_contact').val();
    // alert(reson_value);

    if(reson_value=='Moving company cancelled'){
      // alert('hiiiiiiiiiiii');
      $('.selected_company_cancel').show();
        $('.selected_company_cancel123').hide();
    }
    else if(reson_value == 'I am cancelling for myself'){
      $('.selected_company_cancel123').show();
      $('.selected_company_cancel').hide();

    }
    else{
       $('.selected_company_cancel123').hide();
      $('.selected_company_cancel').hide();
    }
  })


  $(".selected_company_cancel input:checkbox").on('click', function() {
 
  var $box = $(this);
  if ($box.is(":checked")) {
 
    var group = "input:checkbox[name='" + $box.attr("name") + "']";

    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
  
  $(".selected_company_cancel123 input:checkbox").on('click', function() {
 
  var $box = $(this);
  if ($box.is(":checked")) {
 
    var group = "input:checkbox[name='" + $box.attr("name") + "']";

    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>

<script type="text/javascript">
  jQuery(document).ready(function(){

    //console.log("22222222222222222222222222");

     $("#contact_mover_customer123").validate({
        rules: {
            reason_for_contact: {
                required: true,
            },
            description_for_contact: {
                required: true,
            },
           
        },
        
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('contact_mover_customer123')[0]);
            $.ajax({
                url: "<?php echo $base_url; ?>/customer/contact_hiremover", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    
                    // $("#signup_customer_message").html(data.message);
                    console.log(data);
                    if(data=='1')
                    {
                        // $('#customer_register')[0].reset();
                        toastr.warning("Please select any reason.", "Notifications");
                     
                        
                     // window.location.href = "<?php echo $base_url;?>";
                     //  },2500)
                    }
                    if(data=='0'){
                       
                         toastr.success("Contact mail send successfully", "Notifications");

                         setTimeout(function(){ 
                         window.location.reload();
               
                        }, 3000); 
                  
                    }
                }
            });
            return false;
        }
     });
});

  function printData()
{
   var divToPrint=document.getElementById("printTable");
   // alert(divToPrint);
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('.print_order').on('click',function(){
printData();
});
</script>