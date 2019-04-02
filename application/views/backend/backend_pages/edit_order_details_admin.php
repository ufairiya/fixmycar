<style type="text/css">
    /*.from_address{position: relative;}*/
.pac-container{ z-index: 100000;}
.locations{margin-bottom: 15px;}
.heading_order_details h4{text-align: center;font-weight: bold;}
#edit_order_details .modal-dialog{width: 60%;}
.error,.unloading_address_error,.move_site_error,.error_for_notvaliddate{color: red;display: inline-block;clear: both;}

@media screen and (min-width: 300px) and (max-width: 500px){
  #edit_order_details .modal-dialog{width: 90%;}

}

@media screen and (min-width: 501px) and (max-width: 700px){
  #edit_order_details .modal-dialog{width: 95%;}

}


</style>
<!-- Script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&sensor=false&libraries=places&callback=initAutocomplete" async defer></script>
<script src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2-bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/select2/select2.css">

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<div class="backend_admin_editdetails">
<input type="hidden" name="from_street_number" class="field" id="from_street_number">
            <input type="hidden" name="from_route" class="field" id="from_route">
            <input type="hidden" name="from_locality" class="field" id="from_locality">
            <input type="hidden" name="from_administrative_area_level_1" class="field" id="from_administrative_area_level_1">
            <input type="hidden" name="from_postal_code" class="field" id="from_postal_code">
            <input type="hidden" name="from_country" class="field" id="from_country">
            <input type="hidden" name="from_lat" class="field from_lat" id="from_lat">
            <input type="hidden" name="from_lng" class="field from_lng" id="from_lng">

            <input type="hidden" name="to_street_number" class="field" id="to_street_number">
            <input type="hidden" name="to_route" class="field" id="to_route">
            <input type="hidden" name="to_locality" class="field" id="to_locality">
            <input type="hidden" name="to_administrative_area_level_1" class="field" id="to_administrative_area_level_1">
            <input type="hidden" name="to_postal_code" class="field" id="to_postal_code">
            <input type="hidden" name="to_country" class="field" id="to_country">
            <input type="hidden" name="to_lat" class="field to_lat" id="to_lat">
            <input type="hidden" name="to_lng" class="field to_lng" id="to_lng">

            <input type="hidden" name="move_site_street_number" class="field" id="move_site_street_number">
            <input type="hidden" name="move_site_route" class="field" id="move_site_route">
            <input type="hidden" name="move_site_locality" class="field" id="move_site_locality">
            <input type="hidden" name="move_site_administrative_area_level_1" class="field" id="move_site_administrative_area_level_1">
            <input type="hidden" name="move_site_postal_code" class="field" id="move_site_postal_code">
            <input type="hidden" name="move_site_country" class="field" id="move_site_country">
            <input type="hidden" name="move_site_lat" class="field move_site_lat" id="move_site_lat">
            <input type="hidden" name="move_site_lng" class="field move_site_lng" id="move_site_lng">
</div>
<form id="movers_order_update" name="movers_order_update" enctype="multipart/form-data" method="post"> 

<div class="modal-header heading_order_details">
	<h4>Edit order details</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
// echo '<pre>';print_r($order_results);echo '</pre>';
$array_value = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12');
$hour_value = array(2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12');

$arrival_time='';
$booked_mover_id='';
$distance_amount_bk ='';
// echo '<pre>'; print_r($order_results);echo '</pre>';
foreach ($order_results as $kvalue) {
  # code...
  $order_id = $kvalue['id'];
  $company_name = $kvalue['company_name'];
  $move_date = $kvalue['move_date'];
  $movers_count = $kvalue['movers_count'];
  $hours = $kvalue['hours'];
  $hours_milefee = $kvalue['hours'];
  $price = $kvalue['price'];
  $booked_mover_id = $kvalue['mover_id'];
  $additional_hours = $kvalue['additional_hours'];
  $service_id = $kvalue['service_id'];
  $loading_type = $kvalue['loading_type'];
  $arrival_time =$kvalue['arrival_time'];
  $loading_type_loading123='';
  $loading_type_unloading123 = '';
  if(strpos($loading_type, ',') == true) {
    $loading_type_loding = explode(',', $loading_type);
     $loading_type_loading123 = $loading_type_loding[0];
     $loading_type_unloading123 = $loading_type_loding[1];
  }else{
    if($loading_type!=''){
      if($loading_type=='loading'){
        $loading_type_loading123 = $loading_type;
      }
      else if($loading_type=='unloading'){
        $loading_type_unloading123 = $loading_type;
      }
      else{
        $loading_type=$loading_type;
      }
    }
  }
$distance_amount_bk = $kvalue['final_price'];
  $loading_by = $kvalue['loading_by'];
  $loading_location = $kvalue['loading_location'];

  $loading_address = $kvalue['loading_address'];
  $loading_apt = $kvalue['loading_apt'];
  $unloading_location = $kvalue['unloading_location'];
  $unloading_address = $kvalue['unloading_address'];
  $unloading_apt = $kvalue['unloading_apt'];

  $location_loading = $kvalue['location_loading'];

  if($additional_hours!=''){
    $additional_hours = explode(':', $additional_hours);
    $add_hours = $additional_hours[0];
    $add_mins = $additional_hours[1];
   
  }else{
    $add_hours = '';
    $add_mins = '';
  }


$location_loading_bk = $kvalue['location_loading'];
  $location_loading_address_bk = $kvalue['location_loading_address'];
    $location_loading_apt_bk = $kvalue['location_loading_apt'];
    $additional_details_bk = $kvalue['additional_details'];
    $loading_type_back = $kvalue['loading_type'];
    $b_First_name_bk = $kvalue['b_First_name'];
    $b_Last_name_bk = $kvalue['b_Last_name'];
    $b_email_bk = $kvalue['b_email'];
    $b_Phone_no_bk = $kvalue['b_Phone_no'];
    $b_street_bk = $kvalue['b_street'];
    $loading_by_bk1 = $kvalue['loading_by'];

    $unloading_location_bk = $kvalue['unloading_location'];
    $unloading_address_bk = $kvalue['unloading_address'];
    $unloading_apt_bk = $kvalue['unloading_apt'];

    $loading_location_bk = $kvalue['loading_location'];
    $loading_address_bk = $kvalue['loading_address'];
    $loading_apt_bk = $kvalue['loading_apt'];


    if($loading_type_back!='')
    {
      if(strpos($loading_type_back, ',') == true) {
        $loading_type_back = explode(',', $loading_type_back);
        $move_loading_bk = $loading_type_back[0];
        $move_unloading_bk = $loading_type_back[1];
      }
      else{
         $move_site_bk1 = $loading_type_back;
        if($move_site_bk1!='')
        {
          if($move_site_bk1 == 'loading'){
            $move_loading_bk = $move_site_bk1;
          }else if($move_site_bk1 == 'unloading'){
            $move_unloading_bk = $move_site_bk1;
          }else{
            $move_site_bk = $move_site_bk1;
          }
        }
      }
    }
/*end if*/


  if($loading_by_bk1!='')
  {
    if(strpos($loading_by_bk1, ',') == true) 
    {
      $loading_type_rentalbk = explode(',',$loading_by_bk1);
       count($loading_type_rentalbk);
      if(count($loading_type_rentalbk) == 2){
        if($loading_type_rentalbk[0]== 'rental_truck'){
          $loading_by_bk = $loading_type_rentalbk[0];
        }else if($loading_type_rentalbk[0] == 'container'){
          $loading_by_container_bk = 'container';
        }else{
          $loading_by_trailer_bk  = 'freight_trailer';
        }

        if($loading_type_rentalbk[1]== 'rental_truck'){
          $loading_by_bk = $loading_type_rentalbk[1];
        }else if($loading_type_rentalbk[1] == 'container'){
          $loading_by_container_bk = 'container';
        }else{
          $loading_by_trailer_bk  = 'freight_trailer';
        }
      }

        /*end*/

        if(count($loading_type_rentalbk) == 3){
        
          $loading_by_bk = $loading_type_rentalbk[0];
        
          $loading_by_container_bk = $loading_type_rentalbk[1];
        
          $loading_by_trailer_bk  = $loading_type_rentalbk[2];
        }

      
    }
    else{
      
      if($loading_by_bk1!=''){
        if($loading_by_bk1 == 'rental_truck'){
          $loading_by_bk = $loading_by_bk1;
        }else if($loading_by_bk1 == 'container'){
          $loading_by_container_bk = $loading_by_bk1;
        }else{
          $loading_by_trailer_bk  = $loading_by_bk1;
        }
      }
    }

  

  }


$select_name = $this->db->query("SELECT  * FROM user_master where id_user_master = '".$booked_mover_id."'")->row();
$mover_name_booked = $select_name->username;
  
 }
?>
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

		<!-- <div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Company name:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control company_name" name="company_name" value="<?php echo $company_name ?>">
		        </div>
		    </div>
		</div> --> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Move date:</label>
		        </div>
		        <div class="col-md-8">
		        	<input class="form-control avail_date_movers" id="date" value="<?php echo date('m/d/Y',strtotime($move_date));?>" name="date" placeholder="MM/DD/YYY" type="text"/>
		        </div>
		    </div>
        <span class="error_for_notvaliddate" style="display: none;">Mover blocked on that date. Please select another date</span>
		</div> 
    <div class="col-md-6">
      <div class="row">
            <div class="col-md-4">
              <label class="form-label">Mover name</label>
            </div>
            <div class="col-md-8">

            <select name="movers_name" id="movers_name" class="form-control tb_yeargroup_id" style="width:100%;"  readonly>
                  <option value="<?php echo $booked_mover_id?>"><?php echo $mover_name_booked?></option>

                </select>
               <!-- <select name="movers_name" id="movers_name" class="form-control tb_yeargroup_id" style="width:100%;"  required>
                  <option value=""><?php echo 'select name';?></option>

                </select> -->
            </div>
        </div>
    </div>
		<!-- <div style="clear:both;"></div>
    <br> -->
		<!-- <div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Movers count:</label>
		        </div>
		        <div class="col-md-8">
		        	 <select class="movers_count form-control" name="movers_count" >
              <?php foreach ($array_value as $ke) {
                # code...
                if($ke==1){
                  $mover = ' mover';
                }
                else{$mover = ' movers';}
                if($ke == $movers_count){
                  $selected = 'selected';
                }
                else{
                  $selected ='';
                }
                echo '<option value="'.$ke.'" '.$selected.' > '.$ke .$mover.' </option>';
              }
              ?>
                    
              </select> 

              
		        </div>
		    </div>
		</div> --> 
		<!-- <div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Hours:</label>
		        </div>
		        <div class="col-md-8">
		        	<select class="select_hours form-control" name="hours">
               <?php 

foreach ($hour_value as $value) {

 echo ' <option value="hour'.$value.'">'.$value.' hours</option>';
}

              ?> <?php $hours_change=$hours?>

              <option value="hour2" <?php   if($hours_change =='2 Hours') { echo "selected"; }  else { echo ""; }?> >2 hours</option>
                <option value="hour3" <?php   if($hours_change =='3 Hours') { echo "selected"; }  else { echo ""; }?> >3 hours</option>
                <option value="hour4" <?php   if($hours_change =='4 Hours') { echo "selected"; }  else { echo ""; }?> >4 hours</option>
                <option value="hour5" <?php   if($hours_change =='5 Hours') { echo "selected"; }  else { echo ""; }?> >5 hours</option>
                <option value="hour6" <?php   if($hours_change =='6 Hours') { echo "selected"; }  else { echo ""; }?> >6 hours</option>
                <option value="hour7" <?php   if($hours_change =='7 Hours') { echo "selected"; }  else { echo ""; }?> >7 hours</option>
                <option value="hour8" <?php   if($hours_change =='8 Hours') { echo "selected"; }  else { echo ""; }?> >8 hours</option>
                <option value="hour9" <?php   if($hours_change =='9 Hours') { echo "selected"; }  else { echo ""; }?> >9 hours</option>
                <option value="hour10" <?php   if($hours_change =='10 Hours') { echo "selected"; }  else { echo ""; }?> >10 hours</option>
                <option value="hour11" <?php   if($hours_change =='11 Hours') { echo "selected"; }  else { echo ""; }?> >11 hours</option>
                <option value="hour12" <?php   if($hours_change =='12 Hours') { echo "selected"; }  else { echo ""; }?> >12 hours</option>
               
              </select>
		        </div>
		    </div>
		</div>  -->
		<div style="clear:both;"></div><br>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Arrival Window:</label>
		        </div>
		        <div class="col-md-8">
		        	<select class="form-control arrival_time" name="arrival_time" >
                <option value="">Select arrival time</option>   
              </select>
		        </div>
		    </div>
		</div> 
		<!-- <div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Additional Hours</label>
		        </div>
		        <div class="col-md-8">
              <div class="col-sm-6" style="padding: 0px">
		        	<select class="additional_hours form-control" name="additional_hours"  >
              <option value="">Hours</option>
                

              <?php 

foreach ($array_value as $value) {

  if($add_hours == $value){
     $selected = 'selected';
  }else{
    $selected = '';
  }
if($value == 1){
  $hours = 'Hour';
}else{
  $hours = 'Hours';

}
 echo ' <option value="'.$value.'" '.$selected.'>'.$value.' '.$hours.' </option>';


}

              ?>
               </select>
               </div>
            
               <div class="col-sm-6" style="padding: 0px 0px 0px 10px;">
               <select class="additional_min form-control" name="additional_min"  >
                <option value="">mins</option>
          
                <option value="0" <?php if($add_mins=='00'){echo 'selected';}?>>0 mins</option>
                <option value="15" <?php if($add_mins=='15'){echo 'selected';}?>>15 mins</option> 

               <option value="30" <?php if($add_mins=='30'){echo 'selected';}?>>30 mins</option>
               <option value="45" <?php if($add_mins=='45'){echo 'selected';}?>>45 mins</option>  
 

              <?php 

foreach ($array_value as $value) {

 echo ' <option value="hour'.$value.'">'.$value.' Hours</option>';
}

              ?>                </select>
               </div>
		        </div>
		    </div>
		</div>  
  <?php 



  ?> -->
		<div style="clear:both;"></div><br>
    <div class="col-md-12">

                  <div class="col-md-3" style="text-align: left;"> <small>Choose one or more options </small> *</div>

                  <div class="col-md-9 loading_by">
                          
                            <div class=" col-md-4  stl_checkbox loading_t_loading_checkboc" >
                                                <label>
                                                <input type="checkbox" name="loading_type[]"  id="loading_t_loading"  class="locading_stl" value="loading" <?php if(isset($move_loading_bk)){if($move_loading_bk!=''){echo 'checked';}else{echo '';} } ?>>Loading
                                                <span class="stl_checkmark"></span>
                                                </label>
                            </div>
                            <div class="col-md-4  stl_checkbox">
                                <label>
                                <input type="checkbox" name="loading_type[]"     id="loading_t_unloading"  class="locading_stl"   value="unloading" <?php if(isset($move_unloading_bk)){ if($move_unloading_bk!=''){ echo 'checked';}else{echo '';} }?> >Un loading
                                <span class="stl_checkmark"></span>
                                </label>
                            </div>
                            <div class="col-md-4  stl_checkbox ">

                                    <label>

                                    <input type="checkbox" name="loading_type[]"   id="loading_t_moveonsite"  class="locading_stl move_on_site_only"   value="move_on_site_only" <?php if(isset($move_site_bk)){ if($move_site_bk!=''){ if($move_site_bk == 'move_on_site_only'){echo 'checked';}else{echo '';} } }?> >Move on site only
                                    <span class="stl_checkmark"></span>
                                    </label>
                            </div>

                   </div>

              
                                                                     
                </div>


                  <div class="col-md-12  hide_loading_by">

                  <div class="col-md-3" style="text-align: left;"> <small>Choose one or more options</small></div>

                  <div class="col-md-9 loading_by">
                          
                              
                            <div class="col-md-4  stl_checkbox " >
                                                <label>
                                                <input type="checkbox" name="loading_by[]"  id="loading_by_rental_truck"  class="loading_by_stl" value="rental_truck" <?php if(isset($loading_by_bk)){ if($loading_by_bk == 'rental_truck'){echo 'checked'; }else{echo '';}} ?> >Rental Truck
                                                <span class="stl_checkmark"></span>
                                                </label>
                            </div>
                            <div class="col-md-4  stl_checkbox">
                                <label>
                                <input type="checkbox" name="loading_by[]"  id="loading_by_container"  class="loading_by_stl" value="container" <?php if(isset($loading_by_container_bk)){ if($loading_by_container_bk == 'container'){echo 'checked'; }else{echo '';}} ?> >Container
                                <span class="stl_checkmark"></span>
                                </label>
                            </div>
                            <div class="col-md-4  stl_checkbox">
                                    <label>
                                    <input type="checkbox" name="loading_by[]"  class="loading_by_stl"  id="loading_by_freight_trailer" value="freight_trailer" <?php if(isset($loading_by_trailer_bk)){ if($loading_by_trailer_bk == 'freight_trailer'){echo 'checked'; }else{echo '';}} ?>  >Freight Trailer
                                    <span class="stl_checkmark"></span>
                                    </label>
                            </div>

                   </div>

              
                                                                     
                </div>


                  <div class="col-md-12 Select_Location_div"  style="border: 1px solid rgb(204, 204, 204);">
                  <br>
                 <div class="col-md-2" style="font-family: sans-serif; font-size: 17px;    text-align: right;"> 
                <!--  <strong>Select Location</strong> -->  <span class="order_title">Select Location *</span>
                 </div>

                 
                  
                   <div class="col-md-10 locations">
                                <div class="col-sm-2 stl_radio_boxdesign">
                                  <input type="radio"  name="location_loading"  class="location_loading_stl_house" value="house" <?php if(isset($location_loading_bk)){if($location_loading_bk=='house'){echo 'checked';}else{echo '';}}?> >
                                     <label class="stl_radio_box">House
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-sm-4 stl_radio_boxdesign">
                                  <input type="radio"  name="location_loading"  class="location_loading_stl_apt" value="condo/apt" <?php if(isset($location_loading_bk)){if($location_loading_bk=='condo/apt'){echo 'checked';}else{echo '';}}?>>
                                     <label class="stl_radio_box">CONDO/APT
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-sm-2 stl_radio_boxdesign ">
                                  <input type="radio"  name="location_loading"  class="location_loading_stl_office" value="Office" <?php if(isset($location_loading_bk)){if($location_loading_bk=='Office'){echo 'checked';}else{echo '';}}?>>
                                     <label class="stl_radio_box">Office
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>
                                <div class="col-sm-4 stl_radio_boxdesign">
                                  <input type="radio" name="location_loading" class="location_loading_stl_unit" value="storage_unit" <?php if(isset($location_loading_bk)){if($location_loading_bk=='storage_unit'){echo 'checked';}else{echo '';}}?>>
                                     <label class="stl_radio_box">Storage Unit
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                    <div class="col-md-10 moveonsit_select" style="clear: both;"><label>Address *</label>
                                      
                                <input type="text" name="location_loading_address" class="form-control move_on_site_only" id="location_loading_address" value="<?php if(isset($location_loading_address_bk)){ if($location_loading_address_bk!=''){echo $location_loading_address_bk;}else{echo '';} }?>"  aria-describedby="basic-addon1" onFocus="geolocate()">
                                <span id="move_site_error" class="move_site_error">selected address not in the movers area.please select another
                                </div>

                                <div class="col-md-2" ><label>Apt./Suite</label>

                                <input type="text" name="location_loading_apt"  class="form-control" id="location_loading_apt" value="<?php if(isset($location_loading_apt_bk)){ if($location_loading_apt_bk!=''){echo $location_loading_apt_bk;}else{echo '';} }?>">
                                </div>

                                <!-- <div class="col-md-6"><label>City *</label>
                                 <input type="text" name="location_loading_city" class="form-control"  id="location_loading_city" value="">
                                </div>

                                <div class="col-md-6"><label>State *</label>

                                <input type="text" name="location_loading_state" class="form-control"  id="location_loading_state" value="">
                                </div>  -->



                            

                            
                  </div>   
                                                                            
                </div> 

                


                <div class="col-md-12 Select_loading_location_div" style="    border: 1px solid #ccc;"> <br>
                <div class="col-md-2" style="font-family: sans-serif; font-size: 17px;font-weight: normal;text-align: right;"> 
                   <!--  <strong style="    font-weight: bold;"> Loading location:</strong> -->

                    <span class="order_title"> Loading location *</span>
                    </div>

                 
                  
                   <div class="col-md-10 locations loading_location_checkboxval">
                                <div class="col-md-2 stl_radio_boxdesign">
                                   <input type="radio"  name="loading_location" class="loading_location_stl_house"  value="house" <?php if(isset($loading_location_bk)) { if($loading_location_bk=='house'){ echo 'checked';
                                      } else{echo '';} }?> required>
                                     <label class="stl_radio_box">House
                                   
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-md-3 stl_radio_boxdesign">
                                  <input type="radio"  name="loading_location"  class="loading_location_stl_apt" value="condo/apt" <?php if(isset($loading_location_bk)) { if($loading_location_bk=='condo/apt'){ echo 'checked';
                                      } else{echo '';} }?>>
                                     <label class="stl_radio_box">CONDO/APT
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-md-2 stl_radio_boxdesign">
                                  <input type="radio"  name="loading_location" class="loading_location_stl_office" value="Office"  <?php if(isset($loading_location_bk)) { if($loading_location_bk=='Office'){ echo 'checked';
                                      } else{echo '';} }?> >
                                     <label class="stl_radio_box">Office
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>
                                <div class="col-md-4 stl_radio_boxdesign">
                                  <input type="radio" name="loading_location"  class="loading_location_stl_unit"  value="storage_unit"  <?php if(isset($loading_location_bk)) { if($loading_location_bk=='storage_unit'){ echo 'checked';
                                      } else{echo '';} }?>  >
                                     <label class="stl_radio_box">Storage Unit
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>   

                                   <div class="col-md-10 slect_loading_tupe"><label>Address *</label>

                                <input type="text" name="loading_address" class="form-control loading_address" id="loading_address" value="<?php if(isset($loading_address_bk)){ if($loading_address_bk!=''){echo $loading_address_bk;} else{echo '';}}?>"   aria-describedby="basic-addon1" onFocus="geolocate()"  >



                                <span id="loading_address_error" class="loading_address_error error">selected address not in the movers area.please select another</span>
                                </div>
                                

                                <div class="col-md-2 "><label>Apt./Suite</label>

                                <input type="text" name="loading_apt"  class="form-control" id="loading_apt" value="<?php if(isset($loading_apt_bk)){if($loading_apt_bk!=''){echo $loading_apt_bk;}else{echo '';}}?>">
                                </div>

                                <!-- <div class="col-md-6"><label>City *</label>
                                 <input type="text" name="loading_city" class="form-control"  id="loading_city" value="">
                                </div>

                                <div class="col-md-6"><label>State *</label>

                                <input type="text" name="loading_state" class="form-control"  id="loading_state" value="">
                                </div>  --> 

                            
                     </div>                                                                         
                </div>

                  <div style="clear: both;"></div>
                

                 <div class="col-md-12 Select_unloading_location_div" style="    border: 1px solid #ccc;"> <br>
                 <div class="col-md-2" style="text-align: right;">
                  <!-- <strong style="font-family: sans-serif; font-size: 17px;font-weight: bold;text-align: right;"> Unoading location:</strong> -->
                  <span class="order_title">Unloading location *</span>


                  </div>

                 
                  
                   <div class="col-md-10 locations">
                                <div class="col-md-2 stl_radio_boxdesign">
                                  <input type="radio"  name="unloading_location" class="unloading_location_stl_house" value="house" <?php if(isset($unloading_location_bk)){if($unloading_location_bk == 'house'){echo 'checked';}else{echo '';}} ?>>
                                     <label class="stl_radio_box">House
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-md-3 stl_radio_boxdesign">
                                  <input type="radio"  name="unloading_location"   class="unloading_location_stl_apt"  value="condo/apt" <?php if(isset($unloading_location_bk)){if($unloading_location_bk == 'condo/apt'){echo 'checked';}else{echo '';}} ?>>
                                     <label class="stl_radio_box">CONDO/APT
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>

                                <div class="col-md-2 stl_radio_boxdesign">
                                  <input type="radio"  name="unloading_location"  class="unloading_location_stl_office"  value="Office" <?php if(isset($unloading_location_bk)){if($unloading_location_bk == 'Office'){echo 'checked';}else{echo '';}} ?> >
                                     <label class="stl_radio_box">Office
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>
                                <div class="col-md-4 stl_radio_boxdesign">
                                  <input type="radio" name="unloading_location" class="unloading_location_stl_unit"  value="storage_unit" <?php if(isset($unloading_location_bk)){if($unloading_location_bk == 'storage_unit'){echo 'checked';}else{echo '';}} ?> >
                                     <label class="stl_radio_box">Storage Unit *
                                    
                                    <span class="stl_checkmark_radio"></span>
                                      </label>

                                </div>  

                                  <div class="col-md-10 unloadin_select_type"><label>Address *</label>
                                     

                                <input type="text" name="unloading_address" class="form-control unloading_add " id="unloading_address" value="<?php if(isset($unloading_address_bk)){ if($unloading_address_bk!=''){echo $unloading_address_bk;}else{echo '';}} ?>" aria-describedby="basic-addon1" onFocus="geolocate()" >
                                <span id="unloading_address_error" class="unloading_address_error">selected address not in the movers area.please select another
                                </div>

                                <div class="col-md-2" ><label>Apt./Suite</label>

                                <input type="text" name="unloading_apt"  class="form-control" id="unloading_apt" value="<?php if(isset($unloading_apt_bk)){if($unloading_apt_bk!=''){echo $unloading_apt_bk;}else{echo '';}} ?>">
                                </div>

                                <!-- <div class="col-md-6"><label>City *</label>
                                 <input type="text" name="unloading_city" class="form-control"  id="unloading_city" value="">
                                </div>

                                <div class="col-md-6"><label>State *</label>

                                <input type="text" name="unloading_state" class="form-control"  id="unloading_state" value="">
                                </div> --> 





                            </div>   

                                

                            
                     </div>    
                     <div style="clear: both;"></div> 
<div class="col-md-12 price_div" style="">
             
             
              <input type="hidden" class="distance" name="mile_distance">
              <input type="hidden" class="total_amount_value" name="per_mile_fee" value="">  
              <br>
              <span><b>Customer paid amount: $</b><?php if(isset($distance_amount_bk)){ if($distance_amount_bk!=''){echo $distance_amount_bk;} }?></span>
              <br><br>
               <span style="">Changed Price : </span><span class="final_price"></span> 
               <input type = "hidden" value="" name="total_cost" class="final" />
               

             
              


              
             </div>
                   
                <div style="clear: both;"></div>
                <br>


    </div>
</div>
<div class="modal-footer">
	<div class="col-md-3">
	<button type="submit" class="btn btn-theme " id="make_reservation">Save</button>
</div>
</div>

</div>
</form>
<script type="text/javascript">
   jQuery("#movers_order_update").validate({
         debug: true,
        rules: {
             date:{required:true,},
            movers_name: {
                required: true,
            },
            movers_count: {
                required: true,
            },
            
            hours: {
                required:true,
            },
            arrival_time:{required:true},
            loading_type:{required:true},
        },
        messages: {
          loading_type: "select any loading type",
         move_date:'Please select move date',
         
         
          
        },
        submitHandler: function(form) {

     
            var formData = new FormData(document.getElementsByName('movers_order_update')[0]);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/home/movers_order_details_update", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);
                    if(data =='1')
                    {
                        
                  toastr.success("Order details updated successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                    }
                    else
                    {
                     
                  toastr.warning("Movers are blocked that date or time", "Notifications");
                    }
                }
            });
            return false;
        }
     });

</script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<script type="text/javascript">

// jQuery(document).ready(function(){
//   var date = $('.avail_date_movers').val();
//   var booked_mover_id = '<?php echo $booked_mover_id?>';
//         $.ajax({
//             type: "POST",
//             url: "<?php echo BASE_URL; ?>/home/get_movers_availablity",
//             data: {'date':date,'booked_mover_id':booked_mover_id},
//         }).done(function(data){
           
//             jQuery('.tb_yeargroup_id').html(data);
//                 // $("select.city").select2({ dropdownParent: ".modal-body" });
//         });
// })

//  jQuery(document).on('change','.avail_date_movers',function(){
//         var date = $('.avail_date_movers').val();
//         var booked_mover_id = '<?php echo $booked_mover_id?>';
//         $.ajax({
//             type: "POST",
//             url: "<?php echo BASE_URL; ?>/home/get_movers_availablity",
//             data: {'date':date,'booked_mover_id':booked_mover_id},
//         }).done(function(data){
           
//             jQuery('.tb_yeargroup_id').html(data);
//                 // $("select.city").select2({ dropdownParent: ".modal-body" });
//         });
//     });

jQuery(document).on('change','.avail_date_movers',function(){


       var date = $('.avail_date_movers').val();
        var booked_mover_id = '<?php echo $booked_mover_id?>';
       var arrival_time = '<?php echo $arrival_time?>';  
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL; ?>/home/check_mover_avail_date",
            data: {'date':date,'booked_mover_id':booked_mover_id},
        }).done(function(data){
           
            if(data==1){
              $('.error_for_notvaliddate').hide();
              jQuery('.avail_date_movers').removeAttr('required');
            }
            if(data == 0){
              $('.error_for_notvaliddate').show();

              jQuery(".avail_date_movers").attr("required","required");
            }
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });
    });

//   /*arrival time select*/
jQuery(document).ready(function(){ 
       var date = $('.avail_date_movers').val();
        var booked_mover_id = '<?php echo $booked_mover_id?>';
       var arrival_time = '<?php echo $arrival_time?>';  
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL; ?>/home/get_movers_availtime_admin",
            data: {'date':date,'booked_mover_id':booked_mover_id,'selected_arrival_time':arrival_time},
        }).done(function(data){
           
            jQuery('.arrival_time').html(data);
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });
    });
 // jQuery(".avail_date_movers").change(function(){
  jQuery(document).on('change','.avail_date_movers',function(){
        var date = $('.avail_date_movers').val();
        var booked_mover_id = '<?php echo $booked_mover_id?>';
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL; ?>/home/get_movers_availtime_admin",
            data: {'date':date,'booked_mover_id':booked_mover_id},
        }).done(function(data){
           
            jQuery('.arrival_time').html(data);
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });
    });



</script>

<?php 

$mover_details = $this->db->query("SELECT * FROM user_master where id_user_master = '".$booked_mover_id."' ")->row();
 $mover_address1 = $mover_details->address;


 $mover_address1 = str_replace(' ','%20',$mover_address1);

   //$mapApiKey= 'AIzaSyBaEjohZpjSWkzIXQP0u01FZpZSe5Uxuhs';
   $mapApiKey='AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU' ;
    $url = "https://maps.google.com/maps/api/geocode/json?&address=".$mover_address1 ."&key=".$mapApiKey." " ;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                // echo '<pre>';
                // print_r($response_a);
                // echo '</pre';
                if(isset($response_a))
                {
                $mover_lat = $response_a->results[0]->geometry->location->lat;
                $mover_lon  = $response_a->results[0]->geometry->location->lng;
                }


  $movers_count; 
  $str = $hours_milefee ; 
  
  preg_match_all('!\d+!', $str, $matches);
  // print_r($matches);
  $hoursvalue = $matches[0][0];
  $h = 'hour';
  $hours_count = $h.$hoursvalue;
  $hours_cor = $hours_count;
 

// $mover_info = $this->db->query("SELECT * FROM movers_rate_new where userid = '".$movers_ids."' and movers_count = '".$movers_count."' and movers_min_time = '".$hours_cor."' ")->row();

  $mover_info = $this->db->query("SELECT * FROM movers_rate_new where userid = '".$booked_mover_id."' and movers_count = '".$movers_count."' ")->row();
// echo '<pre>';
// print_r($mover_info);
// echo '</pre>';
  // if($mover_info == '' )
  // {
  //    $m_per_mile_fee = 12.00 ;
  // }
  // else
  // { 


   $m_per_mile_fee = $mover_info->per_mile;
  //}
   $str11 = $m_per_mile_fee ; 
// }
if($str11!=''){
  $cost = str_replace('$','',$str11);
}


?>



<script>

jQuery('.pac-container').on('touchend', function(e){e.stopPropagation();})
      var placeSearch, autocomplete,autocomplete2,autocomplete3,autocomplete4;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };


      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

        // var options = {componentRestrictions: {country: "AU"}};
          var options;


        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('loading_address')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete, "from");
  });

    jQuery("#autocomplete").bind("keypress", function(e) {
        if(e.keyCode == 13) {
fillInAddress(autocomplete, "");
        }
    });






        autocomplete2 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('unloading_address')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete2.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete2, "to");
  });

        autocomplete3 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('location_loading_address')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete3.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete3, "move_site");
  });

           

//console.log("sstaddert r=dfgdfgdf");
      }

      function fillInAddress(autocomplete, unique) {

//console.log("filllllllllllllllllllll");
console.log("address selectionnnnnnnnnnnn");
          // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
//console.log("fill in address");
  for (var component in componentForm) {
    if (!!document.getElementById(unique+"_"+component)) {
      document.getElementById(unique+"_"+component).value = '';
      document.getElementById(unique+"_"+component).disabled = false;
    }
  }
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
   var place = autocomplete.getPlace();


   var lat = place.geometry.location.lat();
// get lng
var lng = place.geometry.location.lng();

document.getElementById(unique+"_lat").value = lat;
document.getElementById(unique+"_lng").value = lng;

if(place.address_components)
{
            console.log(place.address_components);
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];

    if (componentForm[addressType] && document.getElementById(unique+"_"+addressType)) {
      var val = place.address_components[i][componentForm[addressType]];


      document.getElementById(unique+"_"+addressType).value = val;
    }
  }
var from_lat = $('.from_lat').val();
var from_lng = $('.from_lng').val();

var service_id = '<?php echo $service_id; ?>';
if((from_lat!='') && (from_lng!='')){

      if($('.slect_loading_tupe .loading_address').prop('id')=='loading_address' ) 
      {

          var lat1 = from_lat;
          var lon1 = from_lng;
          var lat2 = '<?php echo $mover_lat; ?>';
          var lon2 = '<?php echo $mover_lon; ?>';

function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {


    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2-lat1);  // deg2rad below
    var dLon = deg2rad(lon2-lon1); 
    var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2) ; 

    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c; // Distance in km
    return d;

     }
function deg2rad(deg) {
  return deg * (Math.PI/180)
 }

var distance_from_to = getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2).toFixed(1);

console.log('loading_type');

console.log(distance_from_to);

var per_mile_fee = '<?php echo $cost ; ?>' ;
console.log('per_mile_fee' +per_mile_fee);
var mile_fee_total = distance_from_to * per_mile_fee ;

console.log('mile_fee_total' +mile_fee_total);

jQuery('.distance').val(parseFloat(distance_from_to));

jQuery('.total_amount_value').val(parseFloat(mile_fee_total));

//jQuery(".total_amount_value").html(parseInt(mile_fee_total));

var price = '<?php echo $price; ?>';

var sum = parseFloat(price) + parseFloat(mile_fee_total);

console.log(sum);
var total_amt = sum.toFixed(2);
jQuery('.final').val(total_amt);
//jQuery(".final").html(sum);
jQuery('.final_price').html('$'+total_amt);


 }
  else{

  }





$.ajax({
                url: "<?php echo BASE_URL; ?>/home/check_selected_radius_admin/" +service_id, 
                type: "POST",             
                data: {'from_lat':from_lat,
                'from_lng':from_lng},
                
                dataType:'json',
                success: function(data) {

console.log(data);
                    if(data==0){
                        document.getElementById("loading_address_error").style.display = "block";
                      
                        jQuery('#make_reservation').attr("disabled", "disabled");
                    }
                    else{
                      document.getElementById("loading_address_error").style.display = "none";
                      jQuery('#make_reservation').removeAttr("disabled");
                    }
                    
                } 

});

}
else{
      document.getElementById("loading_address_error").style.display = "none";
      jQuery('#make_reservation').removeAttr("disabled");
    }


var to_lat = $('.to_lat').val();
var to_lng = $('.to_lng').val();
// alert('to_lng' +to_lng);

if((to_lat!='') && (to_lng!='')){




/*****jjjjjjjjj********************/

if($('.unloadin_select_type .unloading_add').prop('id')=='unloading_address')
 {

   var lat11 = to_lat;
   var lon11 = to_lng;
   var lat22 = '<?php echo $mover_lat; ?>';
   var lon22 = '<?php echo $mover_lon; ?>';


 function getDistanceFromLatLonInKm(lat11,lon11,lat22,lon22) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat22-lat11);  // deg2rad below
  var dLon = deg2rad(lon22-lon11); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat11)) * Math.cos(deg2rad(lat22)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;

}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}


var distance_from_to1 = getDistanceFromLatLonInKm(lat11,lon11,lat22,lon22).toFixed(1);

console.log(distance_from_to1);

var per_mile_fee = '<?php echo $cost ; ?>' ;

var total_mile_fee1 = distance_from_to1 * per_mile_fee ;

console.log('unloading_type');

console.log(total_mile_fee1);

jQuery('.distance').val(parseFloat(distance_from_to1));

jQuery('.total_amount_value').val(parseFloat(total_mile_fee1));
// jQuery(".total_amount_value").html(parseInt(total_mile_fee1));

var price = '<?php echo $price; ?>';

var add = parseFloat(price) + parseFloat(total_mile_fee1);

console.log(add);
var add_amouont =  add.toFixed(2);

if (jQuery("#loading_t_loading").is(":checked")) {
  // alert('sssssssssssssss');
  var from_lat = $('.from_lat').val();
var from_lng = $('.from_lng').val();

if(from_lat =='' && from_lng==''){
  if('<?php echo $distance_amount_bk; ?>'!='' && '<?php echo $distance_amount_bk; ?>' !=0){
  jQuery('.final').val('<?php echo $distance_amount_bk; ?>');
jQuery('.final_price').html('$'+'<?php echo $distance_amount_bk; ?>');
}
 }
 else{


jQuery('.final').val(add_amouont);
jQuery('.final_price').html('$'+add_amouont);
// jQuery(".final").html(add);
}
}else{


jQuery('.final').val(add_amouont);
jQuery('.final_price').html('$'+add_amouont);
// jQuery(".final").html(add);
}


 }
else 
{

}
/**************jjjjjjjj**********/



$.ajax({
                url: "<?php echo BASE_URL; ?>/home/check_selected_radius_admin/" +service_id, 
                type: "POST",             
                data: {'from_lat':to_lat,
                'from_lng':to_lng},
                
                dataType:'json',
                success: function(data) {

                  console.log(data);
                    if(data==0){
                       document.getElementById("unloading_address_error").style.display = "block";
                      
                        jQuery('#make_reservation').attr("disabled", "disabled");
                    }
                    else{
                       document.getElementById("unloading_address_error").style.display = "none";
                       jQuery('#make_reservation').removeAttr("disabled");
                    }
                    
                } 
});

}else{
  document.getElementById("unloading_address_error").style.display = "none";
  jQuery('#make_reservation').removeAttr("disabled");
}



if((from_lat!='' && from_lng!='') && (to_lat!='' && to_lng!=''))
{

  if(($('.unloadin_select_type .unloading_add').prop('id')=='unloading_address' && $('.slect_loading_tupe .loading_address').prop('id')=='loading_address' ) || ($('.slect_loading_tupe .loading_address').prop('id')=='loading_address' && $('.unloadin_select_type .unloading_add').prop('id')=='unloading_address' ))
{ 
  // console.log(sum); 
  // console.log(add);
  // var load_unload_totalcoast = parseInt(sum) + parseInt(add) ;
    console.log('loading and unloading');
  // console.log(load_unload_totalcoast);
   
    console.log(mile_fee_total);

    jQuery('.distance').val(parseFloat(distance_from_to));

    jQuery('.total_amount_value').val(parseFloat(mile_fee_total));

     jQuery('.final').val(total_amt);

    jQuery('.final_price').html('$'+total_amt);

   

}
else{}

}



var move_site_lat = $('.move_site_lat').val();
var move_site_lng = $('.move_site_lng').val();
// alert('to_lng' +to_lng);

if((move_site_lat!='') && (move_site_lng!='')){


  /******jjjjjjjjjjjjj****/

  if($('.moveonsit_select .move_on_site_only').prop('id')=='location_loading_address') 
   {

   var latt1 = move_site_lat;
   var long1 = move_site_lng;
   var latt2 = '<?php echo $mover_lat; ?>';
   var long2 = '<?php echo $mover_lon; ?>';

function getDistanceFromLatLonInKm(latt1,long1,latt2,long2) 
{
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(latt2-latt1);  // deg2rad below
  var dLon = deg2rad(long2-long1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(latt1)) * Math.cos(deg2rad(latt2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;

}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}


var distance_from_to33 = getDistanceFromLatLonInKm(latt1,long1,latt2,long2).toFixed(1); 

console.log(distance_from_to33);

var per_mile_fee33 = '<?php echo $cost ; ?>' ;

var total_mile_fee33 = distance_from_to33 * per_mile_fee33 ;

console.log('move_on_site_only');
console.log(total_mile_fee33);

jQuery('.distance').val(parseFloat(distance_from_to33));

jQuery('.total_amount_value').val((total_mile_fee33));
// jQuery(".total_amount_value").html((total_mile_fee33));

var price = '<?php echo $price; ?>';

var final_rate = '';
final_rate = parseFloat(price) + parseFloat(total_mile_fee33);

var final_rate_123 =final_rate.toFixed(2);

console.log(final_rate_123);

jQuery('.final').val('');
jQuery('.final').val(final_rate_123);
// jQuery(".final").html(final_rate);
jQuery('.final_price').html('$'+final_rate_123);


 }
else
{ 
      
}





  /*******jjjjjjjjj*******/

  
$.ajax({
                url: "<?php echo BASE_URL; ?>/home/check_selected_radius_admin/" +service_id, 
                type: "POST",             
                data: {'from_lat':move_site_lat,
                'from_lng':move_site_lng},
                
                dataType:'json',
                success: function(data) {

                  console.log(data);
                    if(data==0){
                      document.getElementById("move_site_error").style.display = "block";
                          jQuery('#make_reservation').attr("disabled", "disabled");
                      
                    }
                    else{
                      document.getElementById("move_site_error").style.display = "none";
                      jQuery('#make_reservation').removeAttr("disabled");
                    }
                    
                } 
});

}else{
  document.getElementById("move_site_error").style.display = "none";
  jQuery('#make_reservation').removeAttr("disabled");
}




}
else
{
  //console.log("tt");
}

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
           alert(geolocation);
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }

// jQuery(document).ready(function(){
//    jQuery('.moving_date').datepicker({

//      minDate: 1
    

//    }).datepicker('setDate', 'today');;
// });


$(document).ready(function(){
  document.getElementById("loading_address_error").style.display = "none";
  document.getElementById("unloading_address_error").style.display = "none";
  document.getElementById("move_site_error").style.display = "none";
 
  
  
})

//   jQuery(".loading_address").on("change",function(){

// // alert('hiiiiiii');
// if($('#loading_address_error').css('display') == 'none'){
//   jQuery('#make_reservation').removeAttr("disabled");
// }
// if($('#loading_address_error').css('display') == 'block'){
//  jQuery('#make_reservation').attr("disabled", "disabled");
// }
//   })


jQuery(document).ready(function(){
  jQuery(document).on("change" ,".loading_address" ,function()
{

  var loading_address = $('.loading_address').val();
  if(loading_address==''){
    $('.loading_address_error').css('display','none');
  }
})

   jQuery(document).on("change" ,"#unloading_address" ,function()
{

  var unloading_address = $('#unloading_address').val();
  if(unloading_address==''){
    $('.unloading_address_error').css('display','none');
  }
})

      jQuery(document).on("change" ,"#location_loading_address" ,function()
{

  var location_loading_address = $('#location_loading_address').val();
  if(location_loading_address==''){
    $('.move_site_error').css('display','none');

  }
})
})


</script>
<script type="text/javascript">
  


var count = jQuery('input[name="loading_type[]"]:checked').length;

// alert(count);


if(count ==0) {


  jQuery('#loading_t_loading').attr('required', 'required');
}


    var count1 = jQuery('input[name="loading_by[]"]:checked').length;
 if(count1 ==0) { jQuery("#loading_by_rental_truck").attr("required","required");}


  jQuery(".Select_Location_div").css('display','none'); 
  jQuery(".Select_loading_location_div").css('display','block'); 
  jQuery(".Select_unloading_location_div").css('display','none');


  jQuery(".loading_by_stl").on("click",function()


  {
 var count = jQuery('input[name="loading_by[]"]:checked').length;
 if(count ==0) { jQuery("#loading_by_rental_truck").attr("required","required");} 
 else {  jQuery('#loading_by_rental_truck').removeAttr('required');}

 var count1 = jQuery('input[name="loading_type[]"]:checked').length;

if(count1==0) { jQuery('#loading_t_loading').attr('required', 'required');}



  });

  // jQuery('#loading_t_loading').on("click", function() {
     jQuery(document).on("click" ,"#loading_t_loading" ,function()
{

    var count = jQuery('input[name="loading_by[]"]:checked').length;
 if(count ==0) { jQuery("#loading_by_rental_truck").attr("required","required");} 
 else {  jQuery('#loading_by_rental_truck').removeAttr('required');}

  var location_ad_count = jQuery('input[name="loading_location[]"]:checked').length;
 if(location_ad_count ==0) { jQuery(".loading_location_stl_house").attr("required","required");} 
 else {  jQuery('.loading_location_stl_house').removeAttr('required');}

jQuery('.location_loading_stl_house').removeAttr('required');
 jQuery("input[name=location_loading]").removeAttr('checked');


     document.getElementById("loading_t_moveonsite").checked = false;
     jQuery('#move_site_locality').val('');
     jQuery('#move_site_lat').val('');
     jQuery('#move_site_lng').val('');



       if (jQuery("#loading_t_loading").is(":not(:checked)")) {

        jQuery(".Select_unloading_location_div").css('margin-top' , '0px');

                             /*  loading required false**/

                        jQuery('#loading_address').removeAttr('required');
                        // jQuery('#loading_apt').removeAttr('required');
                        // jQuery('#loading_city').removeAttr('required');
                        // jQuery('#loading_state').removeAttr('required');

                            


                              jQuery('#unloading_address').removeAttr('required');
                              // jQuery('#unloading_apt').removeAttr('required');
                              // jQuery('#unloading_state').removeAttr('required');
                              // jQuery('#unloading_city').removeAttr('required');

                              jQuery('.loading_location_stl_house').removeAttr('required');
                              // kalai
                          


      }

    if(jQuery('#loading_t_loading').is(":checked")) {

      jQuery(".Select_unloading_location_div").css('margin-top' , '0px');
                                jQuery(".Select_Location_div").css('display','none'); 
                                jQuery(".Select_loading_location_div").css('display','block'); 
                                jQuery(".Select_unloading_location_div").css('display','none');

                                // alert('locading checked');
                                /*kalai add 10112018*/
                                jQuery('#move_site_locality').val('');
                  jQuery('#move_site_lat').val('');
                  jQuery('#move_site_lng').val('');

                  jQuery('#to_locality').val('');
                  jQuery('#to_lat').val('');
                  jQuery('#to_lng').val('');


                                /*  loading required **/
                                jQuery('#loading_address').attr('required', 'required');
                                // jQuery('#loading_apt').attr('required', 'required');
                                // jQuery('#loading_city').attr('required', 'required');
                                // jQuery('#loading_state').attr('required', 'required');


                                /** unloading required false **/

                                jQuery('#unloading_address').removeAttr('required');
                                // jQuery('#unloading_apt').removeAttr('required');
                                // jQuery('#unloading_state').removeAttr('required');
                                // jQuery('#unloading_city').removeAttr('required');

                     


                                /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                          





                                jQuery('#loading_t_loading').removeAttr('required');
                                


         }
     if(jQuery('#loading_t_unloading').is(":checked"))
    {
     // alert('unlocading checked');
                        jQuery(".Select_unloading_location_div").css('margin-top' , '0px');

                        jQuery(".Select_Location_div").css('display','none'); 
                        jQuery(".Select_loading_location_div").css('display','none'); 
                        jQuery(".Select_unloading_location_div").css('display','block');

                        jQuery('#from_locality').val('');
                        jQuery('#from_lat').val('');
                        jQuery('#from_lng').val('');


                        // jQuery("#location_loading_address").val('');
                        //     jQuery("#loading_address").val('');
                        //     jQuery('#loading_address_error').css('display','none');
                        //     jQuery('#move_site_error').css('display','none');
                        //     jQuery('#make_reservation').removeAttr("disabled");
                            /*kalai*/


                        /*  loading required false**/

                        jQuery('#loading_address').removeAttr('required');
                        // jQuery('#loading_apt').removeAttr('required');
                        // jQuery('#loading_city').removeAttr('required');
                        // jQuery('#loading_state').removeAttr('required');

                        

                        /*** unloading required **/

                        jQuery('#unloading_address').attr('required', 'required');
                        // jQuery('#unloading_apt').attr('required', 'required');
                        // jQuery('#unloading_state').attr('required', 'required');
                        // jQuery('#unloading_city').attr('required', 'required');



                        /*** location ***/

                        jQuery('#location_loading_address').removeAttr('required');
                        // jQuery('#location_loading_apt').removeAttr('required');
                        // jQuery('#location_loading_city').removeAttr('required');
                        // jQuery('#location_loading_state').removeAttr('required');

                 

                        jQuery('#loading_t_loading').removeAttr('required');
                          jQuery('.loading_location_stl_house').removeAttr('required');
                          // kalai
    }
     
    if (jQuery('#loading_t_loading').is(":checked")  && jQuery('#loading_t_unloading').is(":checked")  )
    {
var location_ad_count = jQuery('input[name="loading_location[]"]:checked').length;
 if(location_ad_count ==0) { jQuery(".loading_location_stl_house").attr("required","required");} 
 else {  jQuery('.loading_location_stl_house').removeAttr('required');}

 var unloading_ad_count = jQuery('input[name="unloading_location[]"]:checked').length;
 if(unloading_ad_count ==0) { jQuery(".unloading_location_stl_house").attr("required","required");}

 else {  jQuery('.unloading_location_stl_house').removeAttr('required');}
         
jQuery('.location_loading_stl_house').removeAttr('required');
 jQuery("input[name=location_loading]").removeAttr('checked');

// kalai
                          jQuery(".Select_unloading_location_div").css('margin-top' , '25px');

                          jQuery(".Select_Location_div").css('display','none'); 
                          jQuery(".Select_loading_location_div").css('display','block'); 
                          jQuery(".Select_unloading_location_div").css('display','block');



                           jQuery("#location_loading_address").val('');
                           jQuery('#location_loading_apt').val('');
                           jQuery('#move_site_error').css('display','none');
                            jQuery('#make_reservation').removeAttr("disabled");
                            /*kalai*/

                          /*** loading and unloading required ***/

                          jQuery('#loading_address').attr('required', 'required');
                          // jQuery('#loading_apt').attr('required', 'required');
                          // jQuery('#loading_city').attr('required', 'required');
                          // jQuery('#loading_state').attr('required', 'required');

                          jQuery('#unloading_address').attr('required', 'required');
                          // jQuery('#unloading_apt').attr('required', 'required');
                          // jQuery('#unloading_state').attr('required', 'required');
                          // jQuery('#unloading_city').attr('required', 'required');


                                 /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                          


                          jQuery('#loading_t_loading').removeAttr('required');

    }

      jQuery(".hide_loading_by").css({'opacity':'1','pointer-events' :'auto'});
    

  });



   jQuery('#loading_t_unloading').on("click", function() {

        var count = jQuery('input[name="loading_by[]"]:checked').length;
 if(count ==0) { jQuery("#loading_by_rental_truck").attr("required","required");}
 else {  jQuery('#loading_by_rental_truck').removeAttr('required');}

 var unloading_ad_count = jQuery('input[name="unloading_location[]"]:checked').length;
 if(unloading_ad_count ==0) { jQuery(".unloading_location_stl_house").attr("required","required");} 
 else {  jQuery('.unloading_location_stl_house').removeAttr('required');}
 jQuery('.location_loading_stl_house').removeAttr('required');
  jQuery("input[name=location_loading]").removeAttr('checked');

 // kalai



     document.getElementById("loading_t_moveonsite").checked = false;

    if(jQuery('#loading_t_loading').is(":checked")){
                         jQuery(".Select_unloading_location_div").css('margin-top' , '0px');
 
                        jQuery(".Select_Location_div").css('display','none'); 
                        jQuery(".Select_loading_location_div").css('display','block'); 
                        jQuery(".Select_unloading_location_div").css('display','none');
jQuery("input[name=unloading_location]").removeAttr('checked');

                        jQuery("#unloading_address").val('');
                        jQuery("#unloading_apt").val('');
                        jQuery("#unloading_address_error").css('display','none');
                        jQuery("#location_loading_address").val('');
                        jQuery('#location_loading_apt').val('');
                        jQuery('#move_site_error').css('display','none');
                        jQuery('#make_reservation').removeAttr("disabled");

    var location_ad_count = jQuery('input[name="loading_location[]"]:checked').length;
     if(location_ad_count ==0) { jQuery(".loading_location_stl_house").attr("required","required");} 
     else {  jQuery('.loading_location_stl_house').removeAttr('required');}
     jQuery('.location_loading_stl_house').removeAttr('required');

      jQuery("input[name=location_loading]").removeAttr('checked');

                            /*kalai*/



                        jQuery('#loading_t_loading').removeAttr('required');


                        /*  loading required **/
                        jQuery('#loading_address').attr('required', 'required');
                        // jQuery('#loading_apt').attr('required', 'required');
                        // jQuery('#loading_city').attr('required', 'required');
                        // jQuery('#loading_state').attr('required', 'required');

                    



                        /** unloading required false **/

                        jQuery('#unloading_address').removeAttr('required');
                        // jQuery('#unloading_apt').removeAttr('required');
                        // jQuery('#unloading_state').removeAttr('required');
                        // jQuery('#unloading_city').removeAttr('required');

                    



                          /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');    


                       jQuery('.unloading_location_stl_house').removeAttr('required');
                       // kalai



     

    }
     if(jQuery('#loading_t_unloading').is(":checked"))
    {
     // alert('unlocading checked');

                          jQuery(".Select_unloading_location_div").css('margin-top' , '0px');

                          jQuery(".Select_Location_div").css('display','none'); 
                          jQuery(".Select_loading_location_div").css('display','none'); 
                          jQuery(".Select_unloading_location_div").css('display','block');


                          /*  loading required false**/

                          jQuery('#loading_address').removeAttr('required');
                          // jQuery('#loading_apt').removeAttr('required');
                          // jQuery('#loading_city').removeAttr('required');
                          // jQuery('#loading_state').removeAttr('required');


                        

                          /*** unloading required **/

                          jQuery('#unloading_address').attr('required', 'required');
                          // jQuery('#unloading_apt').attr('required', 'required');
                          // jQuery('#unloading_state').attr('required', 'required');
                          // jQuery('#unloading_city').attr('required', 'required');


                                 /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                           


                          jQuery('#loading_t_loading').removeAttr('required');

                          jQuery('.loading_location_stl_house').removeAttr('required');
                          // kalai



    }
     
    if (jQuery('#loading_t_loading').is(":checked")  && jQuery('#loading_t_unloading').is(":checked")  )
    {

var location_ad_count = jQuery('input[name="loading_location[]"]:checked').length;
 if(location_ad_count ==0) { jQuery(".loading_location_stl_house").attr("required","required");} 
 else {  jQuery('.loading_location_stl_house').removeAttr('required');

}

 var unloading_ad_count = jQuery('input[name="unloading_location[]"]:checked').length;
 if(unloading_ad_count ==0) { jQuery(".unloading_location_stl_house").attr("required","required");} 
 else {  jQuery('.unloading_location_stl_house').removeAttr('required');}

 jQuery('.location_loading_stl_house').removeAttr('required');

 jQuery("input[name=location_loading]").removeAttr('checked');
 // kalai

                      jQuery(".Select_unloading_location_div").css('margin-top' , '25px');

                      jQuery(".Select_Location_div").css('display','none'); 
                      jQuery(".Select_loading_location_div").css('display','block'); 
                      jQuery(".Select_unloading_location_div").css('display','block');


                      /*** loading and unloading required ***/

                      jQuery('#loading_address').attr('required', 'required');
                      // jQuery('#loading_apt').attr('required', 'required');
                      // jQuery('#loading_city').attr('required', 'required');
                      // jQuery('#loading_state').attr('required', 'required');

                      jQuery('#unloading_address').attr('required', 'required');
                      // jQuery('#unloading_apt').attr('required', 'required');
                      // jQuery('#unloading_state').attr('required', 'required');
                      // jQuery('#unloading_city').attr('required', 'required');

                      /*** location ***/

                        jQuery('#location_loading_address').removeAttr('required');
                        // jQuery('#location_loading_apt').removeAttr('required');
                        // jQuery('#location_loading_city').removeAttr('required');
                        // jQuery('#location_loading_state').removeAttr('required');


                        


                      jQuery('#loading_t_loading').removeAttr('required');




    }

    if (jQuery("#loading_t_unloading").is(":not(:checked)")) {


                        jQuery(".Select_unloading_location_div").css('margin-top' , '0px');

                        jQuery(".Select_Location_div").css('display','none'); 
                        jQuery(".Select_loading_location_div").css('display','block'); 
                        jQuery(".Select_unloading_location_div").css('display','none');


                        /*  loading required false**/

                        jQuery('#loading_address').removeAttr('required');
                        // jQuery('#loading_apt').removeAttr('required');
                        // jQuery('#loading_city').removeAttr('required');
                        // jQuery('#loading_state').removeAttr('required');
// 

                        /*** unloading required **/

                        jQuery('#unloading_address').removeAttr('required');
                        // jQuery('#unloading_apt').removeAttr('required');
                        // jQuery('#unloading_state').removeAttr('required');
                        // jQuery('#unloading_city').removeAttr('required');


                     



                               /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                            



    }

      jQuery(".hide_loading_by").css({'opacity':'1','pointer-events' :'auto'});
    

  });

    jQuery('#loading_t_moveonsite').on("click", function() {

 var location_loading_count = jQuery('input[name="location_loading[]"]:checked').length;
 if(location_loading_count ==0) { jQuery(".location_loading_stl_house").attr("required","required");} 
 else {  jQuery('.location_loading_stl_house').removeAttr('required');}

      jQuery('.loading_location_stl_house').removeAttr('required');
jQuery('.unloading_location_stl_house').removeAttr('required');


jQuery('#loading_by_rental_truck').removeAttr('required');
jQuery("input[name=loading_location]").removeAttr('checked');
jQuery("input[name=unloading_location]").removeAttr('checked');



                        jQuery('#from_locality').val('');
                        jQuery('#from_lat').val('');
                        jQuery('#from_lng').val('');

                        jQuery('#to_locality').val('');
                        jQuery('#to_lat').val('');
                        jQuery('#to_lng').val('');

       document.getElementById("loading_by_rental_truck").checked = false;
   document.getElementById("loading_by_container").checked = false;
    document.getElementById("loading_by_freight_trailer").checked = false;


         // jQuery('#loading_by_rental_truck').removeAttr('required');

         document.getElementById("loading_t_loading").checked = false;
   document.getElementById("loading_t_unloading").checked = false;


     if(jQuery('#loading_t_moveonsite').is(":checked"))
    {
     // alert('unlocading checked');

                            jQuery('#loading_t_loading').removeAttr('required');

                            jQuery(".Select_Location_div").css('display','block'); 
                            jQuery(".Select_loading_location_div").css('display','none'); 
                            jQuery(".Select_unloading_location_div").css('display','none');
                            jQuery("#unloading_address").val('');
jQuery("input[name=unloading_location]").removeAttr('checked');
jQuery("input[name=loading_location]").removeAttr('checked');

                            jQuery("#unloading_apt").val('');
                            jQuery("#loading_address").val('');
                            jQuery('#loading_apt').val('');
                            jQuery('#loading_address_error').css('display','none');
                            jQuery('#unloading_address_error').css('display','none');
                            jQuery('#make_reservation').removeAttr("disabled");
                            /*kalai*/



                            jQuery(".hide_loading_by").css({'opacity':'0.5','pointer-events' :'none'});


                            /*  loading required false**/

                            jQuery('#loading_address').removeAttr('required');
                            // jQuery('#loading_apt').removeAttr('required');
                            // jQuery('#loading_city').removeAttr('required');
                            // jQuery('#loading_state').removeAttr('required');
// 
                         

                            /** unloading required false **/

                            jQuery('#unloading_address').removeAttr('required');
                            // jQuery('#unloading_apt').removeAttr('required');
                            // jQuery('#unloading_state').removeAttr('required');
                            // jQuery('#unloading_city').removeAttr('required');

                         


                            /***** location required ***/

                          jQuery('#location_loading_address').attr('required', 'required');
                          // jQuery('#location_loading_apt').attr('required', 'required');
                          // jQuery('#location_loading_state').attr('required', 'required');
                          // jQuery('#location_loading_city').attr('required', 'required');
     



    } else {

                  jQuery(".Select_Location_div").css('display','none'); 
                  jQuery(".Select_loading_location_div").css('display','block'); 
                  jQuery(".Select_unloading_location_div").css('display','none');; 
                  jQuery(".hide_loading_by").css({'opacity':'1','pointer-events' :'auto'});


                  /*  loading required **/
                        jQuery('#loading_address').attr('required', 'required');
                        // jQuery('#loading_apt').attr('required', 'required');
                        // jQuery('#loading_city').attr('required', 'required');
                        // jQuery('#loading_state').attr('required', 'required');


                       
    }

    
    });



/*kalai */
jQuery(document).ready(function(){
if(jQuery('#loading_t_moveonsite').is(":checked")){

          jQuery('#from_locality').val('');
                        jQuery('#from_lat').val('');
                        jQuery('#from_lng').val('');

                        jQuery('#to_locality').val('');
                        jQuery('#to_lat').val('');
                        jQuery('#to_lng').val('');

       document.getElementById("loading_by_rental_truck").checked = false;
   document.getElementById("loading_by_container").checked = false;
    document.getElementById("loading_by_freight_trailer").checked = false;





         // jQuery('#loading_by_rental_truck').removeAttr('required');

         document.getElementById("loading_t_loading").checked = false;
   document.getElementById("loading_t_unloading").checked = false;
                            jQuery('#loading_t_loading').removeAttr('required');

                            jQuery(".Select_Location_div").css('display','block'); 
                            jQuery(".Select_loading_location_div").css('display','none'); 
                            jQuery(".Select_unloading_location_div").css('display','none');
                            jQuery("#unloading_address").val('');

jQuery("input[name=unloading_location]").removeAttr('checked');
jQuery("input[name=loading_location]").removeAttr('checked');

                            jQuery("#unloading_apt").val('');
                            jQuery("#loading_address").val('');
                            jQuery('#loading_apt').val('');
                            jQuery('#loading_address_error').css('display','none');
                            jQuery('#unloading_address_error').css('display','none');
                            jQuery('#make_reservation').removeAttr("disabled");
                            /*kalai*/



                            jQuery(".hide_loading_by").css({'opacity':'0.5','pointer-events' :'none'});


                            /*  loading required false**/

                            jQuery('#loading_address').removeAttr('required');
                            // jQuery('#loading_apt').removeAttr('required');
                            // jQuery('#loading_city').removeAttr('required');
                            // jQuery('#loading_state').removeAttr('required');
// 
                         

                            /** unloading required false **/

                            jQuery('#unloading_address').removeAttr('required');
                            // jQuery('#unloading_apt').removeAttr('required');
                            // jQuery('#unloading_state').removeAttr('required');
                            // jQuery('#unloading_city').removeAttr('required');

                         


                            /***** location required ***/

                          jQuery('#location_loading_address').attr('required', 'required');


                          jQuery('#loading_by_rental_truck').removeAttr('required');
                          jQuery('#loading_by_container').removeAttr('required');

                          jQuery('#loading_by_freight_trailer').removeAttr('required');


}
})

jQuery(document).ready(function(){

  if(jQuery('#loading_t_unloading').is(":checked")) {

        var count = jQuery('input[name="loading_by[]"]:checked').length;
 if(count ==0) { jQuery("#loading_by_rental_truck").attr("required","required");}
 else {  jQuery('#loading_by_rental_truck').removeAttr('required');}



     document.getElementById("loading_t_moveonsite").checked = false;

     jQuery(".Select_unloading_location_div").css('margin-top' , '0px');

                          jQuery(".Select_Location_div").css('display','none'); 
                          jQuery(".Select_loading_location_div").css('display','none'); 
                          jQuery(".Select_unloading_location_div").css('display','block');


                          /*  loading required false**/

                          jQuery('#loading_address').removeAttr('required');
                          // jQuery('#loading_apt').removeAttr('required');
                          // jQuery('#loading_city').removeAttr('required');
                          // jQuery('#loading_state').removeAttr('required');


                        

                          /*** unloading required **/

                          jQuery('#unloading_address').attr('required', 'required');
                          // jQuery('#unloading_apt').attr('required', 'required');
                          // jQuery('#unloading_state').attr('required', 'required');
                          // jQuery('#unloading_city').attr('required', 'required');


                                 /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                           


                          jQuery('#loading_t_loading').removeAttr('required');

}

})

jQuery(document).ready(function(){
  if(jQuery('#loading_t_loading').is(":checked")) {
                    jQuery(".Select_Location_div").css('display','none'); 
                                jQuery(".Select_loading_location_div").css('display','block'); 
                                jQuery(".Select_unloading_location_div").css('display','none');

                                // alert('locading checked');
                                /*kalai add 10112018*/
                                jQuery('#move_site_locality').val('');
                  jQuery('#move_site_lat').val('');
                  jQuery('#move_site_lng').val('');

                  jQuery('#to_locality').val('');
                  jQuery('#to_lat').val('');
                  jQuery('#to_lng').val('');


                                /*  loading required **/
                                jQuery('#loading_address').attr('required', 'required');
                                // jQuery('#loading_apt').attr('required', 'required');
                                // jQuery('#loading_city').attr('required', 'required');
                                // jQuery('#loading_state').attr('required', 'required');


                                /** unloading required false **/

                                jQuery('#unloading_address').removeAttr('required');
                                // jQuery('#unloading_apt').removeAttr('required');
                                // jQuery('#unloading_state').removeAttr('required');
                                // jQuery('#unloading_city').removeAttr('required');

                     


                                /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                          





                                jQuery('#loading_t_loading').removeAttr('required');

         }

})
jQuery(document).ready(function(){
  if (jQuery('#loading_t_loading').is(":checked")  && jQuery('#loading_t_unloading').is(":checked")  )
    {

         

                          jQuery(".Select_unloading_location_div").css('margin-top' , '25px');

                          jQuery(".Select_Location_div").css('display','none'); 
                          jQuery(".Select_loading_location_div").css('display','block'); 
                          jQuery(".Select_unloading_location_div").css('display','block');



                           jQuery("#location_loading_address").val('');
                           jQuery('#location_loading_apt').val('');
                           jQuery('#move_site_error').css('display','none');
                            jQuery('#make_reservation').removeAttr("disabled");
                            /*kalai*/

                          /*** loading and unloading required ***/

                          jQuery('#loading_address').attr('required', 'required');
                          // jQuery('#loading_apt').attr('required', 'required');
                          // jQuery('#loading_city').attr('required', 'required');
                          // jQuery('#loading_state').attr('required', 'required');

                          jQuery('#unloading_address').attr('required', 'required');
                          // jQuery('#unloading_apt').attr('required', 'required');
                          // jQuery('#unloading_state').attr('required', 'required');
                          // jQuery('#unloading_city').attr('required', 'required');


                                 /*** location ***/

                              jQuery('#location_loading_address').removeAttr('required');
                              // jQuery('#location_loading_apt').removeAttr('required');
                              // jQuery('#location_loading_city').removeAttr('required');
                              // jQuery('#location_loading_state').removeAttr('required');

                          


                          jQuery('#loading_t_loading').removeAttr('required');

    }
})

// jQuery(document).ready(function(){
//   var ready_amount = '<?php if(isset($distance_amount_bk)){ if($distance_amount_bk!=''){echo $distance_amount_bk;} }?>';
//   if(ready_amount!=''){
//     jQuery('.final').val('ready_amount');
//     // jQuery('.final_price').hide();
//   }
// })

// jQuery(document).ready(function(){
//   jQuery('#loading_address').trigger("click");
// var valuses = jQuery('#loading_address').val();
// alert(valuses);
// jQuery('#loading_address').val(valuses);
// })

</script>