<style type="text/css">
    .direct_url_address .from_address{color: white;}
    /*kalai*/
.review_comments_date{color: #949490;clear: both;font-size: 14px; font-family: initial;}
.review_comments_new{font-size: 18;  color: gray;font-family: initial;}
.error_sites{font-size: 14px; color: red;}
.cont{font-size: 23px;
    font-weight: 300;
    color: white;
    text-align: center;
    line-height: 1.5;}
.mover_name_dir{color:#3acbcc;}
</style>
<?php 

 
?>
 <!--Banner Area-->
 <div class="home direct_booking_page">
    <section class="banner bg banner-bg">
    
        <div class="slider-area homepage_stl_filter">
            <div class="slider-area-inner myslide">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10  text-center">
                            <div class="single-slider slider-1">
                               <!--  <p class="slider-title">Search <span class="text-uppercase slider-span">Moving providers direct</span> </p> -->

<h3 class="mover_name_dir slider-title" style="color:#3acbcc;"><?php echo $mover_name;?></h3>
                                <p class="sub-title">Please 
                                Enter Zipcode and Date to search the available providers</p>
                                <div class="row bg_white">
                                    <div class="col-md-12">
                                        <form action="<?php echo BASE_URL; ?>/home/compare_movers/<?php echo mt_rand(); ?>" method="post" id="direct_form_submit" class="mv_search_form row tm-section-pad-2">
 
<?php

function distance1($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "M") {
      return (($miles * 1.609344)*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

?>

            <input type="hidden" name="from_street_number" class="field" id="from_street_number">
            <input type="hidden" name="from_route" class="field" id="from_route">
            <input type="hidden" name="from_locality" class="field" id="from_locality">
            <input type="hidden" name="from_administrative_area_level_1" class="field" id="from_administrative_area_level_1">
            <input type="hidden" name="from_postal_code" class="field" id="from_postal_code">
            <input type="hidden" name="from_country" class="field" id="from_country">
            <input type="hidden" name="from_lat" class="field" id="from_lat">
            <input type="hidden" name="from_lng" class="field" id="from_lng">

            <input type="hidden" name="to_street_number" class="field" id="to_street_number">
            <input type="hidden" name="to_route" class="field" id="to_route">
            <input type="hidden" name="to_locality" class="field" id="to_locality">
            <input type="hidden" name="to_administrative_area_level_1" class="field" id="to_administrative_area_level_1">
            <input type="hidden" name="to_postal_code" class="field" id="to_postal_code">
            <input type="hidden" name="to_country" class="field" id="to_country">
            <input type="hidden" name="to_lat" class="field" id="to_lat">
            <input type="hidden" name="to_lng" class="field" id="to_lng">
            <input type="hidden" name="direct_url" id="direct_url"  value="<?php echo $email;?>">


                                            <div class="form-row col-md-12 tm-search-form-row basic_stl_silter">
                                                <div class="col-md-6 home_add_fltr_stlr direct_url_address">
                                                    <div class="input-group group_div ">
                                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                                      <input type="text" name="from_address" id="autocomplete" class="form-control from_address" placeholder="Moving From Zipcode or City" aria-describedby="basic-addon1" onFocus="geolocate()" required>
                                                    </div>
                                                    <span class="error_sites" style="display: none;">Please select the address from the list</span>
                                                </div>
                                           
                                                <div class="col-md-3 home_date_picker">
                                                    <div class="input-group group_div">
                                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                      <input type="text" name="move_date" class="form-control moving_date" placeholder="Move Date" autocomplete="off" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group tm-form-element tm-form-element-2">
                                                    <button type="submit" class="btn btn-theme tm-btn-search home_search_btn_stlr"><i class="fa fa-search" aria-hidden="true"></i> Search Movers</button>
                                                </div>
                                                </div>
                                                
                                            </div>
                                            <br><br><br><br>
<div class="cont">  Movers advertised on HireMovers are required to have insurance. Watch out for sites that do not require insurance!</div>
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="direct_book_pages_content">

    <div class="col-md-12  dir_movers_hours ">
            <div class="row">
                    <div class="col-md-6">

                          <div class="Company_hrs_title">
                                 About us:
                            </div>
                            <div><?php echo $about_content;?></div>
                        
                    </div>
                    <div class="col-md-6 Company_working_hrs">

                             <div class="Company_hrs_title">
                                 Working Hours:
                            </div>

                            <div class="row working_hrs_detls">

                           

                            <table class="working_hours_tab">
                                    <thead>
                                        <tr>
                                            <th>Days</th>
                                            <th>Start time</th>
                                            <th>End time</th>
                                        </tr>
                                    </thead>
                                    <tbody >       
                                        <?php 
                                        $available_days = array();
                                        if(!empty($Userdaysdetails)){
                                       foreach ($Userdaysdetails as $Userdaysdetails1) {
                                            $day_value = $Userdaysdetails1->day_value;
                                            $start_time = $Userdaysdetails1->start_time;
                                            $end_time = $Userdaysdetails1->end_time;
                                            $status = $Userdaysdetails1->status;
                                            $available = $Userdaysdetails1->available;
                                            $available_days[$day_value] = array('day_value' => $day_value,'start_time' => $start_time,'end_time' => $end_time,'status' => $status,'available'=>$available  );
                                       }
                                       
                                       foreach ($available_days as $keyvalue) {

                                      

                                        if($keyvalue['day_value'] =='0') 
                                        { if($keyvalue['available']=='yes'){ ?>
                                                  
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Sunday'; ?> 
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time'])); ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time =date("g A", strtotime($keyvalue['end_time']));?>
                                                </td> 
                                            </tr>
                                            <?php  } else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Sunday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  }if($keyvalue['day_value'] =='1'){ if($keyvalue['available']=='yes'){  ?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Monday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time = date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  }else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Monday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  } if($keyvalue['day_value'] =='2'){ if($keyvalue['available']=='yes'){  ?>
                                                <tr>
                                                <td>
                                                    <?php echo $day ='Tuesday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time = date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  }else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Tuesday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  } if($keyvalue['day_value'] =='3'){ if($keyvalue['available']=='yes'){  ?>
                                                <tr>
                                                <td>
                                                    <?php echo $day ='Wednesday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time = date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  }else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Wednesday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  } if($keyvalue['day_value'] =='4'){ if($keyvalue['available']=='yes'){  ?>
                                                <tr>
                                                <td>
                                                    <?php echo $day ='Thursday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time =date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  } else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Thursday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  }if($keyvalue['day_value'] =='5'){ if($keyvalue['available']=='yes'){  ?>
                                                <tr>
                                                <td>
                                                    <?php echo $day ='Friday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time =date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  }else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Friday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  } if($keyvalue['day_value'] =='6'){ if($keyvalue['available']=='yes'){  ?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Saturday'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $start_time = date("g A", strtotime($keyvalue['start_time']));  ?>
                                                </td>
                                                <td>
                                                    <?php echo $end_time = date("g A", strtotime($keyvalue['end_time']));?>
                                                </td>
                                            </tr>
                                            <?php  }  else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $day ='Saturday'; ?> 
                                                </td>
                                                <td colspan="2">
                                                    <?php echo 'Closed';?>
                                                </td> 
                                            </tr>


                                            <?php }  }?>

                                        <?php   }} else{?>
                                        <td colspan="3">No Details Available</td>
                                        <?php }?>
                                    </tbody>
                                </table>

                         
                            </div>


                    </div>
                
            </div>

    </div>


    <div style="clear: both;"></div>


<section style="display: none;">

 <div class=" " id="">
                <div class="">
                    
                    <div class="tab-content">
                        <div class="map_div" style="padding: 20px;">
                            <h5 style="font-weight: bold;">Coverage Map:</h5>
                                <iframe class="google_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125323.4021794471!2d76.897022659643!3d11.01187004144617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C+Tamil+Nadu!5e0!3m2!1sen!2sin!4v1528430432448"  frameborder="0" width="500" height="300" style="margin:auto;">
                                    
                                </iframe> 

           
                        </div>
                        <div class="servies_areas">
                            <h5 style="font-weight: bold;">Service Areas:</h5>
                           
                            
                            <table class="table day_table service_table" style="width: 80%;margin: auto;background-color: white;">
                              <thead style="color: #485566;">
                                <tr>
                                  <th width="60px">S.no</th>
                                  <th>Address</th>
                                  <th>Radius</th>
                                  <th>Latitude</th>
                                  <th>Longitude</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                if($serviceareas)
                                {
                                  $arcount = 0;
                                  foreach($serviceareas as $serviceareas)
                                  {
                                    $arcount++;
                                    $area_id = $serviceareas->area_id;
                                    $address = $serviceareas->address;
                                    $radius = $serviceareas->radius;
                                    $latitude = $serviceareas->latitude;
                                    $longitude = $serviceareas->longitude;
                                    ?>
                                    <tr>
                                      <td><?php echo $arcount; ?></td>
                                      <td><?php echo $address; ?></td>
                                      <td><?php echo $radius; ?></td>
                                      <td><?php echo $latitude; ?></td>
                                      <td><?php echo $longitude; ?></td>
                                      
                                    </tr>
                                    <?php
                                  }
                                }
                                ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</section>

<br>

<section class="customer_review_dir_b_page">
<!-- customer reviews -->

                        <div class="row">
                            <div class="col-md-12">
                      
                               <h6 style="color:#485566;font-weight: bold;"> Customer Review:</h6>
                            </div>

                            <div class="col-md-12">
                          
                           
                           <?php 
                           $count =0;

                           $UserReviews11111 = $this->db->query("SELECT * from order_details where mover_id ='".$mover_id."' and star_count!='' order by id DESC ")->result_array();
                           // print_r($UserReviews11111);
                            $stars ='';
                          $review_comments ='';
                          if(!empty($UserReviews11111)){
                           foreach ($UserReviews11111 as $UserReviews1) {

                           $star =$UserReviews1['star_count'];
                          
                          
                          // $sty  ='';

                          if($star !='')
                          {
                            // print_r($UserReviews1);

                               $stars =  $UserReviews1['star_count'];
                              $review_comments = $UserReviews1['review_comments'];
                              $firstname = $UserReviews1['b_First_name'];
                              $lastname123 = $UserReviews1['b_Last_name'];
                              $last_name = substr($lastname123, 0, 1);
                              $address = $UserReviews1['b_street'];
                              if(strpos($address, ',') == true) 
                                {
                                    $show_address = explode(',', $address);
                                   $address = $show_address[1].','.$show_address[2];
                                    // $address = 
                                }else{
                                    $address = $address;
                                }
                               $dates = $UserReviews1['review_date'];
                              if($dates!='' && $dates!='0000-00-00'){
                              $date =date('m/d/Y',strtotime($UserReviews1['review_date']));
                          }else{$date = '';}

                              $count++;


                                if($count % 2 == 0){
                                        $sty ="clear:both;margin-bottom:15px;";
                                    }
                                    else{
                                        $sty ="";
                                    }
                  ?>
                            <div class="review_list col-md-6">

                            <span class="firstname"><?php echo $firstname;?></span> &nbsp;
                            <span class="last_name"><?php echo $last_name;?></span>
                            
                            <span class="stars_count_display"></span>
                            <br>
                            <span class="review_comments_date" style=""><?php echo $date;?></span>
                            <span class="review_comments_date" style="clear: both;"><?php echo $address;?></span>
                            <p class="review_comments_new"><?php echo $review_comments;?></p>
                            <input type="hidden" name="star_count"  class="star_count" value="<?php echo $stars;?>">
                            
                           
                            
                            
                        </div>

                         <div style="<?php echo $sty;?>"></div> 
                    

                              <?php 
                          }
                          ?>  
                        
                           <?php }}else{

                           ?>
                           <div style="">No Reviews Available</div>
                           <?php }?>
                           </div>

                        <div style="clear:both;"></div>
                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6 pagination_stl_filter">
                        <ul id="pagin">
                                 
                        </ul>
                        </div>



                        </div>

</section>

<div style="clear: both;"></div>


<br>
<section class="direct_book_bus_cre" style="display: none;">
    <div class="business_proof" style="">
                            
                             <h5 style="font-weight: bold;margin-top: 10px;">Business Credential:</h5>

                                <?php 
                                        $movers_id_proof = $this->db->query("SELECT id_proof FROM user_master where user_type= 'movers' AND  id_user_master ='$mover_id'")->result_array();
                                        // print_r($movers_id_proof); 
                                        if($movers_id_proof!=''){
                                        foreach ($movers_id_proof as $keysvalue) {
                                            $id_proofs = $keysvalue['id_proof'];

                                           $id_proof_name = explode('/',$id_proofs);
                                                                     
                                ?> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-11">
                                                                             
                                            <div class=" view_credential_content" style="text-align: left;" >
                                           <i class="fa fa-hand-o-right"></i>  <?php echo $id_proof_name[2];?>  <a target="_blank" style="font-size: 17px;" href="<?php echo ($id_proofs !='') ?BASE_URL.'/'.$id_proofs:'';?>"> <span style="color:#3ACBCC;text-decoration: underline;"> (view) </span> </a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>                        
                                
                            <?php }  }?> 
                          
                           
                        </div>

</section>


<br>


<!-- <div id="map" style="width:500px; height: 500px;">

</div> -->

<?php 
$service_areas_map = $this->db->query("SELECT * FROM movers_servicearea where user_id='".$mover_id."'")->row();
// print_r($service_areas_map);

if($service_areas_map!=''){
                                $map_latitude = $service_areas_map->latitude;
                                $map_longitude = $service_areas_map->longitude;
                                $map_radius = $service_areas_map->radius;
                            }
                            else{
                                $map_latitude = '';
                                $map_longitude = '';
                                $map_radius = '';
                            }



?>
<div id="service_map" style="width: 100%; height: 400px; margin-bottom: 20px;"></div>

</div> <!-- direct book page content end -->




    <section class="clients" style="background: #F3F3F3; margin: 0 auto; text-align: center;display: none;"> <img src="<?php echo $base_url;?>assets/front/images/client.png" alt="Clients"> </section>



</div>

<!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&region=in" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="IE=edge"> -->
<script type="text/javascript">

</script>

<script>

jQuery('.pac-container').on('touchend', function(e){e.stopPropagation();})
      var placeSearch, autocomplete,autocomplete2;
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
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            options);
        autocomplete.setComponentRestrictions(
            {'country': ['us','in']});

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
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete2.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete2, "to");
  });



//console.log("sstaddert r=dfgdfgdf");
      }

      function fillInAddress(autocomplete, unique) {

//console.log("filllllllllllllllllllll");
$('.error_sites').hide();
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
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }


  
</script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete" async defer></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript">
         jQuery(document).ready(function(){
    var date = new Date();


var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();


//    $('.moving_date').datetimepicker({
   
// minDate: new Date(y, m, d+1),

//   formatTime:" h:i a",
//    step:60,
//    format:"Y/m/d h:i a",
// validateOnBlur:false,
   
//      });

$('.moving_date').datepicker({
     minDate : 1
   });
 });
    </script>


   <script type="text/javascript">
    
    jQuery(".review_list").each(function() {

 var count_star = jQuery(this).find(".star_count").val();

 if(count_star !='')

 {
 
  var results = getStars(count_star);

  jQuery(this).find(".stars_count_display").html(results);

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

// //Pagination
    
pageSize =10;

var countt ='<?php echo $count?>';
 console.log(countt);
 // pageSize = count/10;
 var pageCount =  countt/ pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin").append('<li><a href="javascript:void(0)">'+(i+1)+'</a></li> ');
     }
        $("#pagin li").first().find("a").addClass("current")
    showPage = function(page) {
        $(".review_list").hide();
        $(".review_list").each(function(n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                $(this).show();
        });        
    }
    
    showPage(1);

    $("#pagin li a").click(function() {
        $("#pagin li a").removeClass("current");
        $(this).addClass("current");
        showPage(parseInt($(this).text())) 
    });





</script>

<!-- <script>
    var myMap;
    var myLatlng = new google.maps.LatLng('<?php echo $map_latitude;?>','<?php echo $map_longitude;?>');
    function initialize() {
        var mapOptions = {

            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP  ,
            scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('service_map'), mapOptions);
        var marker = new google.maps.Marker({
            radius:'<?php echo $map_radius;?>',
            position: myLatlng,
            map: myMap,
            title: 'Name Of Business',
            icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript">
    // console.log('location.href', window.location.href);


    
  var   url = window.location.href;
    var res = url.split("index");
    var response = res[0]+'?text=?'+res[1];
console.log(response);
</script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
<script type="text/javascript">
 // LOCATION IN LATITUDE AND LONGITUDE.
    var center = new google.maps.LatLng('<?php echo $map_latitude;?>','<?php echo $map_longitude;?>');     

    function initialize() {
        // MAP ATTRIBUTES.
        var mapAttr = {
            center: center,
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // THE MAP TO DISPLAY.
        var map = new google.maps.Map(document.getElementById("service_map"), mapAttr);
        var radius123 = parseFloat('<?php echo $map_radius;?>');
        var circle = new google.maps.Circle({
            center: center,
            map: map,
            // color:'black',
            radius: radius123,          // IN METERS.
            fillColor: '#7476cf',
            fillOpacity: 0.3,
            strokeColor: "#7476df",
            strokeWeight: 0         // DON'T SHOW CIRCLE BORDER.
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>


<script type="text/javascript">
jQuery(document).on('keypress','#autocomplete',function(){
  $('#from_lat').val('');
  $('#from_lng').val('');
})


$("#direct_form_submit").submit(function(e) {


   var lat = $('#from_lat').val();
    var lang = $('#from_lng').val();
    var entered_address = $('#autocomplete').val();
        e.preventDefault(); // avoid to execute the actual submit of the form.

    if(entered_address!='' && lat!='' && lang!=''){

        // alert(entered_address);
    //     $.ajax({
    // url: "<?php echo BASE_URL; ?>/home/validate_addressfill", 
    // type: "POST",             
    // data: {'entered_address': entered_address,'lang' : lang , 'lat' : lat},              
    //             dataType:'json',    
    //             success: function(data) {                             
    //                 console.log(data)  ;



    //                 if(data==1){
    //                     $('.error_sites').show();
    //                 return false;

    //                 }
    //                 if(data==0){

                        // alert('ssssssssssss');
                      
 $('#direct_form_submit').unbind('submit').submit();return true;
                //     }
                 
                // },
                // complete:function(data)
                // {

                     
                // }
  // });
    }

});

</script>





