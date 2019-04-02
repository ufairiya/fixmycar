<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<style type="text/css">
  body{    background-color: #f4f4f4;}
  .database_details_box{background-color: #fff;
    border:1px solid #d1d1d1;
      margin-bottom: 20px;
    padding-bottom: 20px;}

h1.form_title {
    font-size: 30px;
    text-transform: uppercase;
    color: #0f2355;
    line-height: 1.5;
    font-weight: 400;}    
.form-label {
    color: #0f2355;
    margin: 10px 0;
    line-height: 1.5em;
    cursor: pointer;
    font-size: 16px;
}

p.sub_heading{    font-size: 24px !important;
    border-bottom: 2px solid #ededed;
    color: #0f2355;
    padding-bottom: 5px;
    padding-top: 25px;}
.database_details_box input{border-radius: 10px;}
 .database_details_box select{border-radius: 10px;}  
 .database_details_box textarea#comment {border-radius: 10px;}
.submit_buttons button.btn {
    background-color: #5E9E37;
    color: #fff !important;
    text-transform: uppercase;
    font-size: 15px;
}
.back_button{
    background-color: #E48F41 !important;
    float: right;}

::placeholder {
    color: black !important;
}


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
            
               xcvdfgsxvgdsfv dsfdsfdsfsdf
               sdf sdf
               df f
               ds
               f s
              
               fds
               f

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
             // echo '<pre>';print_r($garage_companydetail); echo '</pre>';
           //echo '<pre>';print_r($garage_companydetail); echo '</pre>';  

            
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
                    
                    <h1 class="form_title">REQUEST ESTIMATE FROM "AUTOHAUS LONDON LTD T/A AUTODEUTSCHE"</h1>

                 <form id="ftp_connection"  name="ftp_connection" enctype="multipart/form-data" method="post" novalidate="novalidate"> 
                              
                              <p class="sub_heading"> Your details</p>
                                <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">

                                         <div class="col-md-4">                                            
                                                  <label class="form-label">Title</label>
                                                     <select class="form-control">
                                                         <option value="">-- select --</option>
                                                         <option value="mr">Mr</option>
                                                         <option value="miss">Miss</option>
                                                         <option value="mrs">Mrs</option>
                                                         <option value="ms">Ms</option>
                                                         <option value="dr">Dr</option>
                                                      </select>
                                          </div> 

                                         <div class="col-md-4">             
                                             <label class="form-label">First Name<?php echo $this->lang->line('location_id'); ?>:</label>
                                              <input type="text" placeholder="  ..." class="form-control" name="" value="">
                                        </div> 

                                        <div class="col-md-4">                                         
                                                <label class="form-label">Last Name<?php echo $this->lang->line('location_name'); ?>:</label>   
                                                 <input type="text" placeholder="  ..." class="form-control" name="" value=""> 
                                        </div> 

                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">
                                                <label class="form-label">Email<?php echo $this->lang->line('latitude'); ?>:</label>
                                                <input type="email" class="form-control" name="" placeholder="  ..." value=""> 
                                        </div> 

                                        <div class="col-md-6">
                                                  <label class="form-label">Phone day<?php echo $this->lang->line('longitude'); ?>:</label>
                                                   <input type="text" class="form-control" name="" value="" placeholder="  ...">  
                                         </div> 
                                 
                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">
                                           <div class="row">                                                
                                           	  <label class="form-label">Phone evening<?php echo $this->lang->line('station_code'); ?>:</label>
                                              <input type="text" value="" name="" id="ftp_path" placeholder="  ..." class="form-control from_address">
                                            </div>
                                         </div>
                                            
                                          <div class="col-md-6">
                                                <label class="form-label">Phone mobile<?php echo $this->lang->line('coordinates'); ?>:</label>
                                                <input type="text" value="" name="" id="ftp_path" placeholder="  ..." class="form-control from_address">
                                        </div>

                                          <div style="clear:both;"></div>
                                      </div>
                                      <br>

                                <div style="clear:both;"></div>
                              
                                  <p class="sub_heading"> Vehicle details</p>
                              
                                     <div class="row">

                                            <div class="col-md-12">
                                             
                                         <div class="col-md-6">             
                                             <label class="form-label">Vehicle make<?php echo $this->lang->line('location_id'); ?>:</label>
                                              <input type="text" placeholder="  ..." class="form-control" name="" value="">
                                        </div> 

                                        <div class="col-md-6">                                         
                                                <label class="form-label">Vehicle model<?php echo $this->lang->line('location_name'); ?>:</label>   
                                                 <input type="text" placeholder="  ..." class="form-control" name="" value=""> 
                                        </div> 

                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">
                                                <label class="form-label">Vehicle registration<?php echo $this->lang->line('latitude'); ?>:</label>
                                                <input type="text" class="form-control" placeholder="  ..." name="" value=""> 
                                        </div> 

                                        <div class="col-md-6">
                                                  <label class="form-label">Engine size<?php echo $this->lang->line('longitude'); ?>:</label>
                                                   <input type="text" class="form-control" placeholder="  ..." name="" value="">  
                                         </div> 
                                 
                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">

                                           <div class="row">                                                
                                           	  <label class="form-label">Fuel type<?php echo $this->lang->line('station_code'); ?>:</label>
                                              <input type="text" value="" name="" id="ftp_path" placeholder="  ..." class="form-control from_address">
                                            </div>
                                         </div>
                                            
                                          <div class="col-md-6">
                                               
                                        </div>

                                         
                                  </div> 
                                         <div style="clear:both;"></div>
                              
                                  <p class="sub_heading">Service details</p>
                              
                                     <div class="row">

                                            <div class="col-md-12">
                                             
                                         <div class="col-md-6">             
                                             <label class="form-label">Date<?php echo $this->lang->line('location_id'); ?>:</label>
                                              <input type="date" class="form-control" name="" value="">
                                        </div> 

                                        <div class="col-md-6">                                         
                                                <label class="form-label">Time<?php echo $this->lang->line('location_name'); ?>:</label>   
                                                 <input type="time"  class="form-control" name="" value=""> 
                                        </div> 

                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">
                                                <label class="form-label">Service<?php echo $this->lang->line('latitude'); ?>:</label>
                                                <input type="text" class="form-control" placeholder="  ..." name="" value=""> 
                                        </div> 

                                        <div class="col-md-6">
                                                  <label class="form-label">Service type<?php echo $this->lang->line('longitude'); ?>:</label>
                                                   <input type="text" class="form-control" placeholder="  ..." name="" value="">  
                                         </div> 
                                 
                                        <div style="clear:both;"></div>

                                        <div class="col-md-6">

                                           <div class="row">                                                
                                           	  <label class="form-label">Repairs<?php echo $this->lang->line('station_code'); ?>:</label>
                                              <input type="text" value="" placeholder="  ..." name="" id="ftp_path" class="form-control from_address">
                                            </div>
                                         </div>
                                            
                                          <div class="col-md-6">
                                                <label class="form-label">Repair required<?php echo $this->lang->line('station_code'); ?>:</label>
                                              <input type="text" value="" placeholder="  ..." name="" id="ftp_path" class="form-control from_address">
                                        </div>

                                        <div class="col-md-12">
                                        	 <label class="form-label">Comments<?php echo $this->lang->line('station_code'); ?>:</label>
                                                <textarea class="form-control" rows="10" cols="30" id="comment"></textarea>
                                        </div>

                                         <div style="clear:both;"></div>
                                          <div style="clear:both;"></div><br>
                                  </div> 
                                        </div>

                                  <div class="col-md-12 submit_buttons">      
                                   <div class="col-md-5">
                                       <button type="submit" class="btn">Submit estimate request</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                    	 <button type="submit" class="btn back_button">Back to garage</button>
                                    </div>
                                        </div></div> 
                                  </div> 





                                 
                               </div>


                             </form>
                            </div></div>
                            

                       





                    
                   

                  


                  </div>
              
       <?php     }
          } ?>
           
        
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

jQuery( document ).ready(function() {

    var movers_ids = jQuery(".movers_ids").val();
    var temp_cart_id = jQuery(".temp_cart_id").val();
    var filter_sort = jQuery(".filter_sort").val();
    var filter_helper = jQuery(".filter_helper").val();
    var filter_hours = jQuery(".filter_hours").val();
    var random_number =jQuery("#random_number").val();
    var booking_day_name =jQuery(".booking_day_name").val();
    var sort_by_reviews =jQuery(".sort_by_reviews").val();
    var  move_date_stl =jQuery(".move_date_stl").val();
    var direct_url123 = jQuery('.direct_url').val();
    if(direct_url123!=''){

    	var direct_url = direct_url123.split("/");
    	direct_url = direct_url[6];
    	// alert(direct_url[6]);

    }
    /*kalai added direct url*/
 
 
  

  $.ajax({
    url: "<?php echo BASE_URL; ?>/home/filter_movers", 
    type: "POST",             
    data: {'movers_ids': movers_ids,'temp_cart_id' : temp_cart_id,'filter_sort' : filter_sort,'filter_helper' : filter_helper, 'filter_hours' : filter_hours , 'random_number' :random_number  , 'booking_day_name' :booking_day_name ,'sort_by_reviews' :sort_by_reviews ,'move_date_stl' : move_date_stl,'direct_url':direct_url }  ,
   
                //contentType : false,
                //cache: false,
               // processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);
                    if(data['status'] == '1')
                    {
                        jQuery(".movers_filter_content").html(data['movers_content']);
                        // jQuery('.names_style').html(move_date_stl);

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