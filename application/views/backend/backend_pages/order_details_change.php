

<!-- <link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
 -->
 <style type="text/css">
  

  #admin_orders .modal-dialog {

    width: 65%; 
  }
p{margin: 10px 0;}
 #admin_orders .order_details_values  .heading_style {   text-align: center; }

 #admin_orders .order_details_values   .sub-heading {
      color: #485566;
    line-height: 1.2em;
    font-size: 20px;
 }

  #admin_orders .tex_transform_stl {
  text-transform: capitalize;
 }

  #admin_orders .tabel_head {
      background-color: #20C2BA;
    font-weight: normal;
    font-family: fantasy;
    color: white;
    font-size: 17px;
 }

  #admin_orders .align_center {
  text-align: center;
 }

  #admin_orders .table_td_style {
      font-size: 14px;
    font-weight: bold;
    text-align: center;
    font-family: sans-serif;
 }

  #admin_orders .order_notice  strong{
     /* font-size: 17px;*/
      /*font-family: initial;
*/
 }

  #admin_orders .order_notice  .alert-success{ 
     border: 1px solid #D3ECD9 !important;
    background: #D3ECD9 !important;
    color: #155724 !important;
     }


    #admin_orders  .order_details_values table {
    border-collapse: separate;
    border-spacing: 0;
    border-width: 1px 0 0 1px;
    margin: 0 0 1.75em;
    table-layout: fixed;
    width: 100%;
    border: 1px solid #d1d1d1;
}


  #admin_orders  .order_details_values table , th , td{
      border: 1px solid #d1d1d1;
}

 #admin_orders  .order_details_values table  th , td{
     padding: 0.4375em;
}

#admin_orders  .order_details_values select.form-control {
    margin-bottom: 13px;
}

 #admin_orders  .order_details_values .order_summery{
      padding-top: 25px;
}
   
   #admin_orders  .order_details_values   .crew_members{
    font-weight: bold;
    line-height: 3.2;
   } 

      #admin_orders  .order_details_values  .btn-primary:hover {
    color: #fff;
    background-color: #286090;
    border-color: #204d74;
}

   #admin_orders  .order_details_values .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}

   #admin_orders  .order_details_values .btn-danger {
    color: #fff;
    background-color: #ed6b75;
    border-color: #ea5460;
}

 #admin_orders  .order_details_values .btn-danger:hover{
        color: #fff;
    background-color: #e73d4a;
    border-color: #e31d2d;

}
#admin_orders .admin_success_btn{color: #fff;
    background-color: #2bb8c4;
    border-color: #2bb8c4;}

</style>
<?php 
// echo 'tetst';

// print_r($order_results);

foreach ($order_results as $value) {
$direct_block_option = $value['direct_block'];

  $order_id =$value['id'];
  $b_First_name =$value['b_First_name'];
  $b_last_name = $value['b_Last_name'];
  $b_Phone_no =$value['b_Phone_no'];
  $b_email =$value['b_email'];
  $move_date =date('m/d/Y',strtotime($value['move_date']));
  $arrival_time =$value['arrival_time'];
  $movers_count =$value['movers_count'];
  $hours =$value['hours'];

    $move_date123 =$value['move_date'] ;

  $loading_location =ucfirst($value['loading_location']);
  $unloading_location =ucfirst($value['unloading_location']);
  $loading_by =ucfirst($value['loading_by']);
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
  $loading_apt = $value['loading_apt'];
$unloading_apt = $value['unloading_apt'];
$location_loading_apt = $value['location_loading_apt'];
  $mover_id = $value['mover_id'];

$additional_hours_rq = $value['additional_hours'];
$request_hours_true = $value['request_hours'];
$additional_hr_req_mv = $value['mover_adtin_hr_status'];
$mover_request_hours = $value['mover_request_hours'];
$arrival_time =$value['arrival_time'];
$order_confirmed_date = $value['confirmed_date'];
  if($order_confirmed_date=='0000-00-00'){
    $order_confirmed_date='';
  }
$order_cancel_date = $value['cancel_date'];
  if($order_cancel_date=='0000-00-00'){
    $order_cancel_date='';
  }
$completed_date = $value['completed_date'];
if($completed_date =='0000-00-00')
{
  $completed_date ='';
}
$start_time_stl = explode('Between',$arrival_time);
// print_r($start_time_stl);
$get_start = explode('-',$start_time_stl[1]);
// print_r($get_start);
  $srtat_times =  $get_start[0];
 $get_start_times = date('H:i',strtotime($srtat_times));
  $movers_count =$value['movers_count'];
  $hours =$value['hours'];
  $get_time_value = explode(' ',$hours);
 
 
$end_timess = date('g A', strtotime($get_start_times.'+'.$get_time_value[0].' hour'));

  $select_drop_time = $srtat_times.' - '.$end_timess;


// print_r($hours);
   if( $hours =='hour2') { $hours ="2 Hours"; }
            if( $hours =='hour3') { $hours ="3 Hours"; }
            if( $hours =='hour4') { $hours ="4 Hours"; }
            if( $hours =='hour5') { $hours ="5 Hours"; }
            if( $hours =='hour6') { $hours ="6 Hours"; }
            if( $hours =='hour7') { $hours ="7 Hours"; }
            if( $hours =='hour8') { $hours ="8 Hours"; }
            if( $hours =='hour9') { $hours ="9 Hours"; }
            if( $hours =='hour10') { $hours ="10 Hours"; }
            if( $hours =='hour11') { $hours ="11 Hours"; }
                        if( $hours =='hour12') { $hours ="12 Hours"; }

}
/*================*/
$loading_type = $value['loading_type'];
$distance_from_to = $value['distance'];
$total_mile_fee = $value['per_mile_cost'];
$final_booking_amount = $value['final_price'];
if($final_booking_amount==''){
  $final_booking_amount =0;
}
$customer_book_order = $value['price'];
$extra_hours = $value['additional_hours'];
if($extra_hours=='')
{
  $additiona_hour_total_fee =0;
}
$release_payment_amount = $value['release_pay_amount'];
$release_pay = $value['release_pay'];
$customer_paid_tip = $value['tip_amount'];
$completed_date = $value['completed_date'];

 $direct_book_mover = $value['direct_url'];
  $res =$this->db->query( "SELECT * from user_master where id_user_master = '".$mover_id."' ")->row();
  // print_r($res);
  $mover_address = $res->address ;
  $admin_fee = $res->admin_fee;
  $distance_address='';
if($loading_type!=''){
	if($loading_type == 'loading' || $loading_type =='loading,unloading')
	{
		$distance_cal_address = $loading_address;
	}
	else if($loading_type =='unloading')
	{
		$distance_cal_address =$unloading_address;
	}
	else{
		$distance_cal_address = $location_loading_address;
	}
}
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
                             <strong><?php echo $order_status;?></strong><?php if($order_cancel_date!=''){?> on <?php echo  date("m/d/Y" ,strtotime($order_cancel_date)); }?>
                            </div>
                  </div>

                <?php }
               if($order_status =='Completed'  )
                { ?>

                          <div class="col-md-12  order_notice">
                              <div class="alert alert-success">
                                <strong><?php echo 'Completed';?> </strong><?php if($completed_date!=''){ echo  ' on ',date("m/d/Y" ,strtotime($completed_date));}?>
                              </div>
                          </div>
                      

                <?php }
              ?>
              <div class="col-md-12" style=" text-align: right;margin-bottom: 15px;">
        
                   <button  type="button"  href="<?php echo BASE_URL;?>/home/edit_order_details/<?php echo $order_id;?>"  data-target="#edit_order_details" data-toggle="modal" class="btn admin_success_btn ">     
                          <i class="fa fa-clock-o"></i>&nbsp;Edit Order Details 
                      </button>

                     <!-- <button  type="button"  href="<?php echo BASE_URL;?>/home/reschedule/<?php echo $order_id;?>"  data-target="#admin_reschedule" data-toggle="modal" class="btn btn-primary  reschedule_btn">     
                          <i class="fa fa-clock-o"></i>&nbsp;Reschedule 
                      </button>
                  

                  <button  href="<?php echo BASE_URL;?>/home/cancelorder/<?php echo $order_id;?>"  data-target="#admin_cancelorder" data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-remove"></i>&nbsp;Cancel Job</button>  -->
                  
                 <!--  <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-usd"></i>&nbsp;Get Paid</button> -->
                    
              </div>

              
                  
     <div class="col-md-12 order_summery">
                        <div class="col-md-6">                
                         <strong class="sub-heading">Reservation</strong>                       
                         <p>Date of Move: <?php echo $move_date;?></p>
                          <p><?php echo $arrival_time;?></p>
                          <p><?php echo $movers_count?> Movers , <?php echo $hours;?></p>
                        </div>
                        <div class="col-md-6">
                          
                          <strong class="sub-heading">Contact Info</strong>
                          <p class="tex_transform_stl">Name: <?php echo $b_First_name.' '.$b_last_name;?></p>
                          <p class="con_style">Phone No: <?php echo $b_Phone_no;?></p>
                          <span>Email: </span><a href style="color: #693238;font-size: 13px;" ="#"><u><?php echo $b_email;?></u></a>
                           <br>
                        </div>
                              


      </div>

    <div class="col-md-12">
<input type="hidden" name='block_moverid' class="blocked_mover_id" value="<?php echo $mover_id;?>">
      <input type="hidden" name='blocked_mover_dates' class="block_dates" value="<?php echo $move_date123;?>">
      <input type="hidden" name="mover_order_id" class="mover_order_id" value="<?php echo $order_id;?>">
    <?php if($loading_location !='') { ?>
        <div class="col-md-6">
        <strong class="sub-heading">Loading Details</strong>
        <p class="tex_transform_stl">Moving From: <?php echo str_replace("_"," ",$loading_location);?></p>
        <p class="tex_transform_stl">Loading: <?php echo str_replace("_"," ",$loading_by);?></p>
        <p >Address:<br>
        <?php echo $loading_address;?>
        
        </p>
         <?php if($loading_apt != '') { ?>
        <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $loading_apt; ?></p> <?php } ?>
        </div>
        <?php } ?>

        <?php if($unloading_location !='') { ?>

         <div class="col-md-6">
             <strong class="sub-heading">Unloading Details</strong>
             <p class="tex_transform_stl">Moving To:<?php echo str_replace("_"," ",$unloading_location);?></p>
             <?php if($loading_location =='' && $unloading_location!='') { ?>
             <p class="tex_transform_stl">Loading:<?php echo str_replace("_"," ",$loading_by);?></p>
             <?php }?>
             <p>Address:<br>
             <?php echo $unloading_address;?>
             
             </p>
             <?php if($unloading_apt!=''){?>
             <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $unloading_apt; ?></p><br>
         
             <?php }?>
         

        </div>

        <?php } ?>

        <?php if($location_loading !='') { ?>

         <div class="col-md-6">
             <strong class="sub-heading">Location Details</strong>
             <p class="tex_transform_stl">Location:<?php echo str_replace("_"," ",$location_loading);?></p>
             <p>Address:<br>
             <?php echo $location_loading_address;?>
            
             </p>
         <?php if($location_loading_apt){?>
             <p class="tex_transform_stl">Apt./Suite/Unit: <?php echo $location_loading_apt; ?></p>
             <?php }?>

        </div>

        <?php } ?>
        
                <?php  if($request_hours_true != 2 && $request_hours_true!='' ){ if($additional_hours_rq!=''){?>

               <div class="col-md-6">
              
                <strong class="sub-heading">Additional Hours:</strong>
                <p> <?php echo $additional_hours_rq;?> Hours </p>
                </div>

                <?php } } if($additional_hr_req_mv!=2 && $additional_hr_req_mv!=''){  if($mover_request_hours!=''){?>
                 <div class="col-md-6">
                <strong class="sub-heading">Additional Hours Requested:</strong>
                <p> <?php echo $mover_request_hours;?> Additional Hours </p>
                </div>
                <?php } }?>

            
            <br><br>

    </div>


          <br>




            <div class="col-md-12">

               <div class="col-md-6">
              
                <strong class="sub-heading">Move Description:</strong>
                <p> <?php echo $additional_details;?></p>

                <br>
                <div class="direct_block_time">
                  <span><input type="checkbox" name="selected_block_time" class="selected_block_time_stlrs" <?php if($direct_block_option=='yes'){echo $checked = 'checked';}?>>Block me from receiving jobs during this time</span>
                  <select class="time_block_directly form-control">
                    <option value="<?php echo $select_drop_time; ?>"><?php echo $select_drop_time; ?>&nbsp;(<?php echo $hours;?>)</option>
                  </select>
                </div>
                </div>

                <div class="col-md-6">
                  <strong class="sub-heading"> Crew Info:</strong><br>
                  <span class="crew_members">Crew Members:</span> <br>

                  <?php  $movers_count;


                   $query = $this->db->query("SELECT crew_members from allocated_crew_members Where order_id='$order_id'" )->result_array();

                      if(!empty($query))
                      {

                          
                           $members_all = $query[0]['crew_members'];

                           $members_all =  explode(',',$members_all);

                      }
                        
//echo "<pre>";print_r($members_all);echo "</pre>";


                  for($count =0;$count<$movers_count;$count++)
                  { 
                    if(!empty($crew_members)) {
                     
                     ?>
                    <select   name="assign_crew_<?php echo $count;?>"  id="assign_crew_<?php echo $count;?>" class="form-control assign_crew">
                    <option value="">Assign crew...</option> 

                      <?php       
                      foreach ($crew_members as $members) {

                         $selected ='';
                         //$disabled ='';

                          if($members['id'] == $members_all[$count])
                        {
                          $selected ="selected";
                          // $disabled ="disabled";
                          
                        }




                 ?>



                         <option value="<?php echo $members['id'];?>"<?php echo $selected;?> ><?php echo $members['first_name'];?></option>
                         
                      <?php }


                      ?>
                      <option value="new" >Add crew member</option>
                    </select>

                  <?php }
                }

                  ?>
                

                 <!--  <input type="button" name="send_job" value="Send job Details to crew"> -->

                 <button class="btn btn-primary  send_job_to_crew">Send job Details to crew</button>

              
                </div>

            </div>


	<div class="col-md-12">
		<div class="col-md-6">
			<strong class="sub-heading">Invoice</strong> 
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
 			<button class="print_order" style="font-size:15px;background-color:#20C2BA;color: white;">Print Order Details</button> 

		</div>
		
<input type="hidden" name="mover_address" class="form-control loading_address" id="mover_address" value="<?php echo $mover_address ;?>">

<!-- <input type="hidden" name="cus_address" class="form-control loading_address" id="cus_address" value="<?php echo $cus_address; ?>"> -->

<div class="col-md-12" id="printTable">
<table class="order_table_head" id="stl_datatable" style="margin-top: 15px;">
  <thead>
      <tr>
          <th>Items</th>
          <th id="result">Quantity</th>
          <th>Rate</th>
          <th>Subtotal</th>
      </tr>
  </thead>

  <tbody>   
  <tr>   <?php $doller = '$'; 
          $any_string = $hours;
          $total_admin_fee ='';
              
          preg_match_all('!\d+!', $any_string, $get_num); 
         // print_r( $matches );
           $get_num[0][0]; ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size:15px;"><?php echo $movers_count;?>  <?php if($movers_count ==1) { echo "Mover"; } else { echo "Movers";} ?>, <?php echo  $get_num[0][0],' Hours'?></td>
         <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"></td>
         <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $doller,sprintf('%.2f',$customer_book_order);?></td>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $doller,sprintf('%.2f',$customer_book_order); ?></td>
  </tr> 
      <tr>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"> Per Mile Fee</td>
<?php 
 
 $mile = ' Miles' ;
 $h = 'hour';
 $hoursvalue = $get_num[0][0];
 $hours_count = $h.$hoursvalue;
 $total_hour = $hours_count;

 // $get_permile_fee = $this->db->query("SELECT * from movers_rate_new where userid ='$mover_id' and movers_count = '$movers_count' and movers_min_time = '$total_hour' ")->row();
  $get_permile_fee = $this->db->query("SELECT * from movers_rate_new where userid ='$mover_id' and movers_count = '$movers_count' ")->row();

   $milefee = $get_permile_fee->per_mile;

    $additional_hours_fee = $get_permile_fee->addtional_hours;

  
if($loading_type == 'loading' || $loading_type == 'loading,unloading')
{ ?>
          
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
"> <?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>
<?php 
      if($distance_from_to != 0)
      {
      	 ?>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
 <?php
      }
      else 
      { ?> 
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>
<?php }


} 

elseif ($loading_type == 'unloading') 
{ ?>

    <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
"> <?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>

<?php 
 
      if($distance_from_to != 0)
      { ?>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
 <?php
      }
      else 
      { ?> 
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>
<?php }

}

elseif($loading_type == 'move_on_site_only')
{ ?>
  
    <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
"> <?php echo sprintf('%.2f',$distance_from_to),$mile; ?></td>
<?php 
      if($distance_from_to != 0)
      {
      	 ?>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $milefee;?></td>
 <?php
      }
      else 
      { ?> 
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo 'No Fee';?></td>
<?php }

} 
 
  $str = '$';
?>

   <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str, sprintf('%.2f',$total_mile_fee);?></td>
  
      </tr>

<tr>

    <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"> <?php echo ' Additional Hours'; ?> </td>
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
      
       $not_point = $matches[0][0]; 
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

    </tr> 

  
      <tr> 
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Tip</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;text-align: center;">-</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;text-align: center;">-</td> 
     <?php 
     if($customer_paid_tip != '' ) 
     { ?>

    <td style="border:1px solid #E5E5E5;font-size: 15px;text-align: center;
"><?php echo $customer_paid_tip ;?></td> 
    
    <?php  }
    else 
    { ?>
        <td style="border:1px solid #E5E5E5;font-size: 15px;text-align: center;"><?php echo $str, sprintf('%.2f','0'); ?></td> 

<?php   }
   
     ?> 

      </tr>
<?php 
// echo 'booking price', $customer_book_order,'mile fee',$total_mile_fee,'additional_hours',$additiona_hour_total_fee,'tip',$customer_paid_tip;


// if($release_payment_amount!='' && $customer_paid_tip!=''){

if($customer_book_order==''){
$customer_book_order =0;
}
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
//  if($additiona_hour_total_fee == $confirm_payed){
   $final_booking_amount = sprintf('%.2f',$customer_book_order) + sprintf('%.2f',$total_mile_fee) + sprintf('%.2f',$additiona_hour_total_fee) + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip));
   // echo 'seeeeeeeeee';
//  // }
// }

// else{
//   echo 'sssss';
//   $final_booking_amount =$final_booking_amount;
// }
?>
      <tr>
          <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Customer Paid</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;"></td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;"></td>
<?php 

$str = '$'; ?>
 <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$final_booking_amount); ?> </td>
</tr>


<?php


 $mover_fee=0;
 // echo $final_booking_amount;
 if($final_booking_amount != 0 && $final_booking_amount!='' ){
if(($final_booking_amount > 250) && (($direct_book_mover == 'NULL') || ($direct_book_mover == '' )  ) )
{ 
  // echo 'ssssss';
  
   $amount = $final_booking_amount - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = $admin_fee + $amount_b ;
    $mover_fee = $final_booking_amount - $total_admin_fee;

} 

elseif( ($final_booking_amount > 250 ) && (($direct_book_mover != 'NULL') || ($direct_book_mover != '' )))
{
   // echo 'direct move';
   $amount = $final_booking_amount - 250 ;
   $amount_a = $amount * 5;
   $amount_b = $amount_a / 100 ; 
   $total_admin_fee = ($admin_fee / 2) + $amount_b ;
   $mover_fee = $final_booking_amount - $total_admin_fee;
}
else
{
  // echo 'hiiiiiiiii';
  if($admin_fee==''){
    $admin_fee = 0;
  }
   if($total_mile_fee ==''){
    $total_mile_fee =0;
  }
  if($customer_paid_tip == ''){
    $customer_paid_tip =0;
  }
  $mover_fee = ($customer_book_order + $total_mile_fee + sprintf('%.2f',str_replace('$', ' ',$customer_paid_tip))) - $admin_fee;
  // $mover_fee = 0;
}
}else
{
  $mover_fee = 0;
}
?>

<tr>
    <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;">HireMovers Fee </td>
    <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
    <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
<?php 

	if($final_booking_amount != 0) 
	{ 
    if($total_admin_fee==''){ $total_admin_fee =$admin_fee;
    ?>
       <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$total_admin_fee) ; ?></td>
<?php 
     } 
else
     { ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str, sprintf('%.2f',$total_admin_fee) ; ?> </td>

<?php
     } }


     else
     { ?>
        <td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str, sprintf('%.2f','0') ; ?> </td>

<?php
     } ?>
</tr>



<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;
">Total</td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
          <td style="border:1px solid #E5E5E5;font-size: 15px;
"></td>
<td style="text-align: center;border:1px solid #E5E5E5;font-size: 15px;"><?php echo $str,sprintf('%.2f',$mover_fee) ; ?></td>
  
</tr>
 
  </tbody>
</table>
</div>
<!-- ***************************jamuna*************************************** -->


</div>
</div>
</div>    


<script type="text/javascript">
jQuery('<div id="edit_order_details" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#admin_orders");
 jQuery('<div id="admin_reschedule" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#admin_orders");
  jQuery('<div id="admin_cancelorder" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#admin_orders");


</script>


<script type="text/javascript">
  
jQuery('select').on('change', function(event ) {
   var prevValue = jQuery(this).data('previous');

  jQuery('select').not(this).find('option[value="'+prevValue+'"]').removeAttr('disabled');
   var value = jQuery(this).val();

   var idd =jQuery(this).attr('id');

   // alert('idddddddd' + idd);

  jQuery(this).data('previous',value);

  if(value !='') {
  jQuery('select').not(this).find('option[value="'+value+'"]').attr('disabled', 'disabled');

    var movers_count ='<?php echo $movers_count?>';


        for(var count=0; count<movers_count;count++)
        {

            id='assign_crew_'+count;
            idnew='#assign_crew_'+count;

            if(idd != id) {
         var result1 =jQuery( ''+idnew+' option:selected').val();

          if(result1  ==value){

            jQuery(''+idnew+'').prop('selectedIndex',0); }
        }
      
      }

    
  } 
  
});



jQuery(document).on("click",".send_job_to_crew",function()
{


  var order_id='<?php echo  $order_id;?>';
  var service_id='<?php echo  $service_id;?>';
  var movers_count ='<?php echo $movers_count?>';

   var result = [];

  for(var count=0; count<movers_count;count++)
  {

   var result1 =jQuery('#assign_crew_'+count+' option:selected').val();
   if(result1 =='new')
   {
    //alert('ssssssssssss');

   }
  result.push(result1);
       
  }
      $.ajax({
                url: "<?php echo BASE_URL; ?>/movers/send_job_to_crew", 
                type: "POST",             
                data: {'order':order_id,'service_id':service_id,'crew_members':result},             
                dataType:'json',    
                success: function(data) {
                
              
               //  toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }, complete: function(data) {

                   // exit();
                 
                   toastr.success(" Updated crew members  successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });
});


jQuery(document).on("click",".assign_crew",function()
{

   var crew_values = jQuery('option:selected',this).attr('value');
   if(crew_values =="new")

   {
      window.location.href = "<?php echo BASE_URL;?>/home/your_crew";


   }


});



</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.direct_block_time input[type="checkbox"]').click(function(){

            if($(this).prop("checked") == true){
// alert('kjkjkjk');
              var block_time = $('.time_block_directly').val();
              var block_date_mover = $('.block_dates').val();
              var block_moverid = $('.blocked_mover_id').val();
              var mover_order_id = $('.mover_order_id').val();
              if(block_time!='' && block_date_mover!='' && block_moverid!=''){
                $.ajax({
                url: "<?php echo BASE_URL; ?>/movers/direct_block_time", 
                type: "POST",             
                data: {'moverid':block_moverid,'order_id':mover_order_id,'block_date':block_date_mover,'block_time':block_time,'block_option':'yes'},             
                dataType:'json',    
                success: function(data) {
                if(data==0){
                   toastr.success("Block time updated successfully", "Notifications");
                }
                if(data==1){
                  toastr.success("Block time deleted successfully", "Notifications");
                }
                if(data==2){
                  toastr.success("Block time already added for your selected time", "Notifications");
                }
              
                // toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }
            });
              }
            }
            else{
             if($(this).prop("checked") == false){
                // alert("Checkbox is unchecked.");
              var block_time = $('.time_block_directly').val();
              var block_date_mover = $('.block_dates').val();
              var block_moverid = $('.blocked_mover_id').val();
              var mover_order_id = $('.mover_order_id').val();
              if(block_time!='' && block_date_mover!='' && block_moverid!=''){
                $.ajax({
                url: "<?php echo BASE_URL; ?>/movers/direct_block_time", 
                type: "POST",             
                data: {'moverid':block_moverid,'order_id':mover_order_id,'block_date':block_date_mover,'block_time':block_time,'block_option':'no'},             
                dataType:'json',    
                success: function(data) {
                
              if(data==0){
                   toastr.success("Block time updated successfully", "Notifications");
                }
                if(data==1){
                  toastr.success("Block time deleted successfully", "Notifications");
                }
                if(data==2){
                  toastr.success("Block time already added for your selected time", "Notifications");
                }
                // toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }
            });
              }
            }
          }
        });
    });
</script>
<script type="text/javascript">
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