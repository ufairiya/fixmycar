<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style type="text/css">
  body{    background-color: #f4f4f4;}
  .database_details_box{background-color: #fff;
    border:1px solid #d1d1d1;
      margin-bottom: 20px;
    padding-bottom: 20px;}
    table{border-width: 0px !important;}
    td.first_td {width: 40px;}
      button.review_button{  background-color: #5E9E37;
    border: 1px solid #5E9E37;}
    button.request_button{background-color: #E48F41;
     border:1px solid #E48F41;}
    div.buttons a.button {
    color: #FFFFFF;
    text-transform: uppercase;
    padding: 15px;
    font-family: "Museo Sans W01_500", sans-serif;
    font-size: 15px;
    font-weight: 400;
    line-height: 1em;} 
    div .title {
    font-size: 30px;
    text-transform: uppercase;
    color: #0f2355;
    font-family: inherit;
    font-weight: normal;}
    div .address_details {
    font-family: "Museo Sans W01_500", sans-serif;
    color: #505050;
    font-size: 16px;}
    .table_details {
    font-family: "Museo Sans W01_500", sans-serif;
    color: #505050;
    font-size: 16px;
    padding: 10px 0;}
    .col-md-12.about_content {
    font-size: 16px;
    color: #505050;
    font-family: "Museo Sans W01_500", sans-serif;
    padding-top: 20px;}
    
 
</style>
</head>



<?php $movers_ids =  $temp_cart_id =$random_number =0;
?>
<div class="container"> 
     <div style="clear: both;"></div>
       <div class="row">
    <!-- sidebar start -->


        <div class="col-md-3" id="helper-list-sidebar" style="">
            <div>
              <h4 class="small_title">Opening times:</h4>
               <div class="row">
                
                         
              <?php //print_R($openingtiming);
              $arrayvalue = array('0'=>'Sunday','1'=>'Monday','2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Firday','6'=>'Saturday');
              foreach($openingtiming as $data)
              {
                $dayvalue= $data['day_value'];
                $start_time=$data['start_time'];
                $end_time =$data['end_time'];
                
                echo ' <div class="col-md-6">'. $arrayvalue[$dayvalue].'</div> <div class="col-md-6">'.$start_time.'-'.$end_time.'</div>';
              }
              ?>
              </div>

            </div>
                                
          <hr style="margin-top: 10px;" class="border_style">
              <div>
                <h3 class="small_title">Get an estimate:</h3>
                   Submit a quick form to get an estimate from <?php echo 'adsfasd';?>
          
              </div>
          <div>
        </div>
    </div>
   
      <input type="hidden" name="random_number" id="random_number" value="<?php echo $random_number?>">

      <div class="col-md-9 movers_filter_content">
             <?php  
              //echo '<pre>';print_r($garage_companydetail); echo '</pre>';
        //   echo '<pre>';print_r($garage_companydetail); echo '</pre>';  

            
          if(!empty($garage_companydetail))

          {

            foreach ($garage_companydetail as $key => $value) {
                 
                    $pizza  = $value->garage_photos;
                    $pieces = explode(",", $pizza);
                    $countpices = count($pieces);
                    if($countpices == 3) { $div = '<div class="col-md-4">';}
                    if($countpices == 2) { $div = '<div class="col-md-6">';}
                       // echo  $value->garage_name; ?>
                    <!-- <div><?php echo $value->garage_phone;?></div> -->

                  <div class="col-md-12 database_details_box">
                    
                    <div class="col-md-4">
                    </div>
<!--*******************************************************************-->
 
<!-------------******************************************-->





                    <div class="col-md-8">
                       <div class="title"> 
                       <?php echo  $value->garage_name; ?></div>
                       <div class="address_details">
                       <?php echo $value->address_line_1;?> , <?php echo $value->address_line_2;?> , <?php echo $value->country;?> , <?php echo $value->eir_code;?>
                     </div>

                     <div class="table_details">

                      <table>
                        <tr>
                          <td class="first_td"><i class='fas fa-phone' style='font-size:15px'></i></td>
                          <td><?php echo $value->garage_phone;?></td>
                        </tr>
                         <tr>
                          <td class="first_td"><i class='fas fa-envelope' style='font-size:15px'></i></td>
                          <td><?php echo $value->garage_email;?></td>
                        </tr>
                        <tr>
                          <td class="first_td"><i class='fas fa-arrow-right' style='font-size:14px'></i></td>
                          <td><?php echo $value->garage_website;?></td>
                          </tr>

                        <tr>
                          <td class="first_td"><i class='fas fa-user' style='font-size:15px'></i></td>
                          <td><?php echo $value->owner_name;?></td>
                        </tr>
                      </table>
                      
                    </div>

                    <div class="buttons">
                      <button class="review_button">
                      <a href="https://www.trustmygarage.co.uk/garage/autohaus-london-ltd-t-autodeutsche/5364/review" class="button">Review garage</a></button>
                      <button class="request_button">
                      <a href="https://www.trustmygarage.co.uk/garage/autohaus-london-ltd-t-autodeutsche/5364/request" class="button button--dark">Request estimate</a></button>
                      </div>


                  </div>
              
       <?php     }
          } ?>
           <div class="col-md-12 about_content">
                  <?php if(isset($about_garage->content)) { echo htmlspecialchars_decode($about_garage->content); }
                  else{
                    //no con tent
                  }
                  ?>
             <!-- <div class="summary_line">   <?php echo $value->summary_line;?></div>  -->
                </div>
        
      </div>
         <div class="reviewsdiv database_details_box" id="review">
          <div class="title"> REVIEWS </div>
          <?php ///print_r($reviewsdata); 
         if(!empty($reviewsdata))
         {
            foreach($reviewsdata as $values)
            {
              $review_id =  $values['review_id'];
              $order_id = $values['order_id'];
              $garage_id = $values['garage_id'];
              $customer_id = $values['customer_id'];
              $review_comment = $values['review_comment'];
              $review_reply = $values['review_reply'];
              $review_date = $values['review_date'];
              $star_count_tol = $values['star_count'];
              $admin_approve = $values['admin_approve'];
              
               $newDate = date("F d, Y", strtotime($review_date));
             $valueret='';
                      //  $star_count_tol=$average_rating; 
                         for( $i=1 ; $i<= 5; $i++ )
                           
                            { 
                                if($i <=  $star_count_tol)
                                {  

                                   $valueret .='<input type="hidden" class="stars_count reviews_details" data-value ="'.$star_count_tol.' "> 
                                     <li class="star  stars_count" data-value=" '.$i.' " selected style="list-style: none;float:left;">
                                      <i class="fa fa-star fa-fw" style="color: #579c3a;"></i>
                                       </li>';

                                }
                                else
                                { 

                                   $valueret .='<li style="list-style: none;float:left;color:#c3d9ba;" class="star" data-value="'.$i.' " >
                                     <i class="fa fa-star fa-fw"></i>
                                     </li>';

                                }


                            } 
                  echo  '<div class="review">'.$valueret;
                  echo '<div style="clear:both;"></div><div class="review_comment">'.$review_comment.'</div>';
                  echo '<span class="latest-reviews__review__date"> Reviewed: '.$newDate.'</span>
                  </div>';  
               
            }    
         }else{
          ?>
           <p>There are currently no reviews for this garage.</p> <?php }?>
         
         </div>
                

    </div>  
    <!-- /Movers list end -->
  </div>
</div>

<!-- change search modal start -->

<div class="modal fade" id="modal_change_search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
          <span>Search Movers</span>
         

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>  
        </div>
         

        <div class="modal-body">


        


        </div>
            <div class="row">
              <form action="<?php echo BASE_URL; ?>/home/compare_movers/<?php echo mt_rand(); ?>" method="post" id="compare_mv_form_submit" class="mv_search_form row tm-section-pad-2">

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
                <input type="hidden" name="direct_url" class="direct_url" value="">



                <div class="form-row col-md-12 tm-search-form-row">
                  <div class="col-md-5">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                      <input type="text" name="from_address" id="autocomplete" class="form-control from_address" placeholder="Moving From Zipcode or City" aria-describedby="basic-addon1" onFocus="geolocate()" required>
                    </div>
                     <span class="error_sites" style="display: none;">Please select the address from the list</span>
                  </div>
                  <div class="col-md-6" style="display: none;">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                      <input type="text" name="to_address" id="autocomplete2" class="form-control to_address" placeholder="Moving To Zipcode or City" aria-describedby="basic-addon1" onFocus="geolocate()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                      <input type="text" name="move_date"  autocomplete="off"  class="form-control moving_date" placeholder="Move Date" aria-describedby="basic-addon1" required>
                    </div>
                  </div>
                 <!--  <div class="col-md-6"></div> -->
                  <div class="col-md-3">
                    <div class="form-group tm-form-element tm-form-element-2">
                      <button type="submit" class="btn btn-theme tm-btn-search"><i class="fa fa-search" aria-hidden="true"></i> Search Movers</button>
                    </div>
                  </div>
                                                
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- view profile page content here -->
<div class="modal fade" id="movers_profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <!-- Modal content-->
      <div class="modal-content">
         
      </div>
   </div> 

</div>


<script type="text/javascript">
jQuery(".tablinks").css("display","none");
jQuery(".tablink").click(function()
{
jQuery("#London").css("display","block");
jQuery("#Paris").css("display","none");
});
jQuery(".active_work").click(function()
{
jQuery(".tablinks").css("display","block");
jQuery("#London").css("display","none");
});
</script>

<script type="text/javascript">
  
     jQuery("#ajax").on("hidden.bs.modal", function(){

   console.log("dfgddfgdgf");
    jQuery(this).find(".modal-content").html("");
    $("#ajax").modal('show');
     });

 


jQuery(document).on('change','.ajax_filter',function(){


    // var values = jQuery(this).val();
    // alert(values);

  // if(values !='lowest_prcie')
  // {
   // $(document).ready(function () {

  
       


  var movers_ids = jQuery(".movers_ids").val();
  var temp_cart_id = jQuery(".temp_cart_id").val();

  var filter_sort = jQuery(".filter_sort").val();

  var filter_helper = jQuery(".filter_helper").val();


  var filter_hours = jQuery(".filter_hours").val();


  var random_number =jQuery("#random_number").val();
   var booking_day_name =jQuery(".booking_day_name").val();
     var sort_by_reviews =jQuery(".sort_by_reviews").val();
      var  move_date_stl =jQuery(".move_date_stl").val();
  var direct_url = jQuery('.direct_url').val();
/*direct url added by kalai*/
  // alert(direct_url);
  $.ajax({
    url: "<?php echo BASE_URL; ?>/home/filter_movers", 
    type: "POST",             
    data: {'movers_ids': movers_ids,'temp_cart_id' : temp_cart_id,'filter_sort' : filter_sort,'filter_helper' : filter_helper, 'filter_hours' : filter_hours , 'random_number' :random_number  , 'booking_day_name' :booking_day_name ,'sort_by_reviews':sort_by_reviews,'move_date_stl' : move_date_stl,'direct_url':direct_url},
   
                //contentType : false,
                //cache: false,
               // processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);

                      // exit();







                    if(data['status'] == '1')
                    {
                        jQuery(".movers_filter_content").html(data['movers_content']);



                       if(filter_sort == 'lowest_prcie' )
                       {
                             var $divs = $("div.movers_singlediv");
                           
        // console.log($(a).find(".book_mover .price").val());
        // console.log($(b).find(".book_mover .price").val());
           if($(".book_mover .price").val() != '' )
 {
        var numericallyOrderedDivs = $divs.sort(function (a, b) {

        return  $(a).find(".book_mover .price").val() - $(b).find(".book_mover .price").val();

    }); 
            
      console.log(numericallyOrderedDivs);
      $(".movers_filter_content").html(numericallyOrderedDivs);
      $('.movers_singlediv').find('br').remove();
      $('.movers_singlediv').css("margin-top", "20px");


}
}
     }
                    else if(data['status'] =='2')
                    {
                      toastr.options = {"closeButton": true,}
                      toastr.error("Movers not found for your selection", "Notifications");
                    }
                    else
                    {
                      toastr.options = {"closeButton": true,}
                      toastr.warning("Error in filter movers", "Notifications");
                    }
                }
  });

// }

})
$('.modal_change_search_div').click(function(){
	var direct_url = $('.direct_url').val();
	if(direct_url!=''){
		// alert(direct_url);
		// var direct_url = direct_url123.split("/");
  //   	alert(direct_url[6]);
		$("#modal_change_search .direct_url").val( direct_url );
	}
})

    </script>


    <script type="text/javascript">
      
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

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete, "from");
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

 
jQuery(document).on('click','.book_this_btn',function(){
  var mover_id = jQuery(this).closest('.movers_singlediv').find('.mover_id').val();
  var movers_count = jQuery(this).closest('.movers_singlediv').find('.movers_count').val();
  var hour_txt = jQuery(this).closest('.movers_singlediv').find('.hour_txt').val();
  var price = jQuery(this).closest('.movers_singlediv').find('.price').val();

})

    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&libraries=places&callback=initAutocomplete"></script>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


jQuery('#helper-list-sidebar').animate({ scrollBottom: jQuery('#helper-list-sidebar').offset().top }, 'slow');
var scrollBottom = jQuery(window).scrollTop() + jQuery(window).height();

jQuery(window).on("scroll", function() {
    //get height of the (browser) window aka viewport
    var scrollHeight = jQuery(document).height();
    // get height of the document 

    // console.log('sssssssssssssssssssss');
    var scrollPosition = jQuery(window).height() + jQuery(window).scrollTop();

    // console.log(scrollPosition);
    // console.log(scrollHeight + 'scrollHeight');

    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
        // code to run when scroll to bottom of the page
    }
});



 jQuery(document).ready(function(){
    var date = new Date();


var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
 
$('.moving_date').datepicker({
      minDate : 1
   });
   }); 
</script>
  
<script type="text/javascript">
jQuery(document).on('keypress','#autocomplete',function(){
  $('#from_lat').val('');
  $('#from_lng').val('');
})
    $("#compare_mv_form_submit").submit(function(e) {


   var lat = $('#from_lat').val();
    var lang = $('#from_lng').val();
    var entered_address = $('#autocomplete').val();
        e.preventDefault(); // avoid to execute the actual submit of the form.

     if(entered_address!='' && lat!='' && lang!=''){

                       
 $('#compare_mv_form_submit').unbind('submit').submit();return true;
 
    }
else{
        $('.error_sites').show();
    }
});


</script>



  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/apps/css/jquery.datetimepicker.css">
   <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/apps/css/jquery.datetimepicker.min.css">
     <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.full.min.js"></script>

<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>