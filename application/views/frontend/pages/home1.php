  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <!--Banner Area-->
 <div class="home">
    <section class="banner bg banner-bg">
        <!--       Indicator-->
        <!-- <div class="indicator">
            <ul>
                <li class="slide-count"><span class="current">1 </span>/<span> 5</span></li>
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div> -->
        <?php  $user_type =$this->session->userdata('user_type') ;
        if(isset($user_type)){ $userlogin='login';} else{$userlogin='nologin';}?>
        <div class="slider-area homepage_stl_filter">
            <div class="slider-area-inner myslide">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10  text-center">
                            <div class="single-slider slider-1">
                                <p class="slider-title">Find reliable garages in your neighbourhood <!-- <span class="text-uppercase slider-span">Garages</span> --> <br/>Fix your car the easy way!</p>
                               <!--  <p class="sub-title">Fix your car the easy way!</p> -->
                                <div class="row bg_white">
                                    <div class="col-md-12">
                                        <form id="example_form">
                                            <div class="address_container">
                                                <div class="form-group">
                                                    
                                                    <div class="clear"></div>
                                                    <div class="col-md-3 col-sm-6" id="seelctaadd">
                                                          <!-- <input type="hidden" name="logindet" id="logindet" value="<?php echo $userlogin;?>">
                                                        <input type="text" class="form-control" id="address" placeholder="e.g. Manor Farm Barns, Framingham Pigot or NR14 7PZ" aria-owns="address_result" autocomplete="on" autocorrect="on"> -->
                                                        <a href="#" data-toggle="modal" data-target="#loginmodal" class="login_or_signup"> <button type="submit" class="btn btn-theme tm-btn-search home_search_btn_stlr"  >Get Started<button>
                                                        </a>
                                                      </div>
                                                     <!-- div class="col-md-2  ">
                                                    <select class="form-control" id="radius" name="radius">
                                                      
                                                       <option selected="" value="2">2 miles</option>
                                                    <option  value="5">5 miles</option>
                                                    <option value="10">10 miles</option>
                                                    <option value="30">30 miles</option>
                                                    <option value="60">60 miles</option>
                                                    <option value="90">90 miles</option>
                                                     
                                                     </select>
                                                 </div> -->
                                                     <!-- <div class="col-md-2 col-sm-12"> <button type="submit" class="btn btn-theme tm-btn-search home_search_btn_stlr"  ><i class="fa fa-search" aria-hidden="true"></i> Search </button></div> -->
                                                    </div>
                                                </div>
                                                 <div class="clear"></div>
                                                <div class="col-md-8"><div id="address_results"></div>
                                                </div>
                                                <!-- <button type="submit" class="btn btn-default searchgargae" id="search">Search</button> -->
                                                <div id="address_status" aria-live="assertive" aria-atomic="true" role="status" class="sr-only"></div>
                                               
                                            </div>
                                        </form>
                 <form id="output_form">
                    <div class="form-group">
                     <!--    <label for="address_line_1">Address line 1</label> -->
                        <input type="hidden" class="form-control" id="address_line_1" value="">
                    </div>
                    <div class="form-group">
                       <!--  <label for="address_line_2">Address line 2</label> -->
                        <input type="hidden" class="form-control" id="address_line_2" value="">
                    </div>
                    <div class="form-group">
                      <!--   <label for="posttown">Post town</label> -->
                        <input type="hidden" class="form-control" id="posttown" value="">
                    </div>
                    <div class="form-group">
                      <!--   <label for="postcode">Postcode</label> -->
                        <input type="hidden" class="form-control" id="postcode" value="">
                    </div>

                     <div class="form-group">
                        <!-- <label for="latitude">latitude</label> -->
                        <input type="hidden" class="form-control" id="latitude" value="">
                    </div>
                     <div class="form-group">
                        <!-- <label for="longitude">longitude</label> -->
                        <input type="hidden" class="form-control" id="longitude" value="">
                    </div>
                </form>
                <div data-notify="container" id="mapnotify" class="col-xs-11 col-sm-4 alert alert-success animated zoomIn" role="alert" data-notify-position="bottom-center" style="display:none; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; left: 0px; right: 0px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title"></span> <span data-notify="message">Map updated...</span><a href="#" target="_blank" data-notify="url"></a></div>

                                        <form action="<?php echo BASE_URL; ?>/home/compare_movers/<?php echo mt_rand(); ?>" method="post" id="form_submit" class="mv_search_form row tm-section-pad-2" >

<?php
  echo distance1(11.0168445, 76.95583209999995, 11.3410364, 77.71716420000007, "MI") . " Miles<br>";
 // echo distance1(11.0168445, 76.95583209999995, 11.3410364, 77.71716420000007, "K") . " Kilometers<br>";
 //echo distance1(11.0168445, 76.95583209999995, 11.3410364, 77.71716420000007, "M") . " Meters<br>";
 //echo distance1(11.0168445, 76.95583209999995, 11.5753059, 77.58922910000001, "N") . " Nautical Miles<br>";

function distance1($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "MI") {
      return (($miles * 1.609344)*0.621371);
  } else if ($unit == "M") {
      return (($miles * 1.609344)*1000);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

               

?>

         <!--    <input type="hidden" name="from_street_number" class="field" id="from_street_number">
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
                                                <div class="col-md-6 home_add_fltr_stlr">
                                                    <div class="input-group group_div ">
                                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                                      <input type="text" name="from_address" id="autocomplete" class="form-control from_address" placeholder="Moving From Zipcode or City" aria-describedby="basic-addon1" required>
                                                    </div>
                                                    <span class="error_sites" style="display: none;">Please select the address from the list</span>
                                                </div>
                                        
                                                <div class="col-md-3 home_date_picker">
                                                    <div class="input-group group_div">
                                                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                      <input type="text" name="move_date" class="form-control moving_date" placeholder="Move Date" autocomplete="off" aria-describedby="basic-addon1" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group tm-form-element tm-form-element-2">
                                                    <button type="submit" class="btn btn-theme tm-btn-search home_search_btn_stlr"><i class="fa fa-search" aria-hidden="true"></i> Search Movers</button>
                                                </div>
                                                </div>
                                                
                                            </div>


<br><br><br><br>
  -->
 
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
<!-------------- script for EIRCODE Location---------------------->
      <script>
            
           // // Replace with your API key, test key is locked to NR14 7PZ postcode search
             var api_key = "PCW2W-VMKNB-TFNWW-3HPN6"; //my api_key
            // var api_key = "PCWN4-SVKXQ-MQ3KG-VLZMP";   //client given api_key
            
            var example_form = document.getElementById("example_form");
 
            example_form.addEventListener("submit", function(e) {
                e.preventDefault();
                var logindet = document.getElementById("logindet").value;
               // alert(logindet); 
                // The field we will use for search term input
                var address = document.getElementById("address");
                
                // Where we will put our search results
                var address_results = document.getElementById("address_results");
                
                // Accessible status messages for assisted technologies like screen readers
                var address_status = document.getElementById("address_status");
                if(logindet =='nologin')
                {
                   e.preventDefault(); $(".login_or_signup").trigger("click"); //alert('please login');
                }else{
                 address_search(address, address_results, address_status); 
             }
            });
            
            function address_search(input_element, address_results, status_element, page) {
                
                var page = page || 0;
                
                var address = input_element.value.trim();
                
                if (address != "") {

                    // Remove any previous validation results
                    if(page == 0) address_results.innerHTML = "";

                    
                    var loading_html = document.createElement("div");
                    loading_html.setAttribute("id","address_loading");
                    loading_html.textContent = "Searching addresses...";
                    
                    input_element.insertAdjacentElement("afterend", loading_html);
                    
                    status_element.textContent = "Searching addresses";
                    
                    // Country hard coded to GB for this example
                      var country_code = "IN"; 
                    // var country_code = "IE";
                   
                    var address_url = "https://ws.postcoder.com/pcw/" + api_key + "/address/"+country_code+"/" + encodeURIComponent(address) + "?lines=2&addtags=latitude,longitude&page=" + page;

                    // Call the API
                    var address_request = new XMLHttpRequest();
                    address_request.open("GET", address_url, true);
                    
                    address_request.onload = function () {
                        if (address_request.status >= 200 && address_request.status < 400) {
                            
                            loading_html.remove();

                            var data = JSON.parse(address_request.responseText);
                            console.log(data);
                            // For only one result, simply populate the fields, rather than asking the user to select from list
                            if (data.length == -1) {

                                select_address(data[0], address_results, status_element);

                                status_element.textContent = "\"" + data[0].summaryline + "\" selected, address fields below populated";

                            } else if (data.length >= 1) {
                                
                                for (var i = 0; i < data.length; i++) {
                                    
                                    var address_option = document.createElement("div");
                                    address_option.className = "radio";
                                    
                                    address_option.onclick = (function(item) { 
                                        
                                        return function(e) {
                                        
                                            // Only trigger if it's a click with the mouse, not caused by using arrow keys
                                            if (e.type === "click" && e.offsetX !== 0 && e.offsetY !== 0) {
                                                e.preventDefault();
                                                select_address(item, address_results, status_element);
                                            }
                                            
                                        };
                                        
                                    })(data[i]);
                                    
                                    address_option.onkeydown = (function(item) { 
                                        
                                        return function(e) {
                                            
                                            // When using the keyboard, on return/enter select the item
                                            var code = e.keyCode || e.which;
                                            if(code == 13) {
                                                e.preventDefault();
                                                select_address(item, address_results, status_element);
                                            }

                                        };
                                        
                                    })(data[i]);
                                   // var address_option_li = document.createElement("li");
                                    var address_option_label = document.createElement("label");
                                    address_option_label.textContent = data[i].summaryline;
                                    
                                    var address_option_radio = document.createElement("input");
                                    address_option_radio.setAttribute("type", "radio");
                                    address_option_radio.setAttribute("name", "address_radio");
                                    address_option_radio.setAttribute("id", "address_" + page + "_" + i);
                                    address_option_radio.value = page + "_" + i;
                                    
                                    // Insert radio into label, at start
                                   //  address_option_label.insertAdjacentElement("afterbegin", address_option_li);

                                    address_option_label.insertAdjacentElement("afterbegin", address_option_radio);
                                    
                                    // Insert label into option div, at end
                                    address_option.insertAdjacentElement("beforeend", address_option_label);
                                    
                                    // Insert option div into output_element, at end
                                    address_results.insertAdjacentElement("beforeend", address_option);

                                }
                                
                                // Check if we have more than one page of results (Slight edge case)
                                // Either let your user page through the results using button or 
                                // show a message to encourage them to refine their search.
                                // Typically adding a house number or name along with postcode helps
                                
                                var last_index = data.length - 1;
                                    
                                try { 
                                    // Remove existing more button, if exists
                                    document.getElementById("show_more_button").remove();
                                } catch(e) { }
                                
                                if (data[last_index].morevalues) {
                                    
                                    // Create the more button and add some context to text, using totalresutls element
                                    var show_more_button = document.createElement("button");
                                    show_more_button.textContent = data[last_index].totalresults + " addresses found, click to show next 100";
                                    show_more_button.setAttribute("id", "show_more_button");
                                    
                                    // Bind a click to the button which will pass the nextpage element through
                                    show_more_button.onclick = (function(last_item) {
                                        return function(e) {
                                            e.preventDefault();
                                            address_search(input_element, address_results, status_element, last_item.nextpage);
                                        }                       
                                    })(data[last_index]);
                                    
                                    // Insert button at end of existing results
                                    address_results.insertAdjacentElement("beforeend", show_more_button);
                                    document.getElementById("address_results").style.height = "180px";


                                    // Accessible status message to say more than 100 addresses
                                    status_element.textContent = data[last_index].totalresults + " addresses found, showing 100 per page. This is page " + (parseInt(page) + 1) + ". Use tab to reach next page button, after address results.";
                                    
                                } else {
                                    
                                    status_element.textContent = data.length + " addresses found";
                                    
                                }
                        
                            } else {

                                address_results.textContent = "No addresses found";

                                status_element.textContent = "No addresses found";

                            }
                            
                        } else {

                            loading_html.remove();

                            status_element.textContent = "Error occurred";

                            address_results.textContent = "Error occurred";

                            // Triggered if API does not return HTTP code between 200 and 399
                            // More info - https://developers.alliescomputing.com/postcoder-web-api/error-handling

                        }

                    };

                    address_request.onerror = function() {

                        loading_html.remove();
                        
                        status_element.textContent = "Error occurred";
                        
                        address_results.textContent = "Error occurred";

                        // Triggered if API cannot be reached
                        // More info - https://developers.alliescomputing.com/postcoder-web-api/error-handling

                    };

                    address_request.send();
                    
                } else {
                    
                    // Could show an "Address search term is required" message here
                    
                }
                
            }
            
            function select_address(address, address_results, status_element) {
                
                address_results.innerHTML = "";
                
                status_element.textContent = "\"" + address.summaryline + "\" selected, address fields below populated";
                 // Populate fields
                document.getElementById("address_line_1").value = address.addressline1 || "";
                document.getElementById("address_line_2").value = address.addressline2 || "";
                document.getElementById("posttown").value = address.posttown || "";
                document.getElementById("postcode").value = address.postcode || "";
                 document.getElementById("latitude").value = address.latitude || "";
                 document.getElementById("longitude").value = address.longitude || "";
                 document.getElementById("address_results").style.height = "0px";
                 document.getElementById("address").value = address.summaryline  ;
               
                 geolocate_function(address.postcode,address.latitude,address.longitude);
               //  $('.home_search_btn_stlr').removeAttr("disabled");
             
            }
    function geolocate_function(postcode,latitude,longitude)
    {
       console.log(postcode + latitude +longitude ); 
       //get nearest garage
        jQuery.ajax({
            url : '<?php echo BASE_URL;?>/home/getnearst_garages?postcode='+postcode+'&latitude='+latitude+'&longitude='+longitude,
              type: 'POST',
              success:function(response){
               // alert(response);
              //  $( "#map" ).data( "markers" ,response );
              var mapElement = document.getElementById('map');
              var locations = JSON.parse("[" + response + "]");
                var map = new google.maps.Map(mapElement, {
                  zoom: 4,
                   mapTypeId: google.maps.MapTypeId.ROADMAP
                });
               var markerBounds = new google.maps.LatLngBounds();
               var infowindow = new google.maps.InfoWindow();
               var marker, i, content;

                for (i = 0; i < locations.length; i++) {
                   point = new google.maps.LatLng(locations[i][0], locations[i][1]);
                   marker = new google.maps.Marker({
                    position: point,
                     icon:'<?php echo BASE_URL;?>/assets/front/images/mapicon1.png',
                    map: map,type: 'info'
                  });
 
                   marker.setMap(map)
                   markerBounds.extend(point);
                   content =locations[i][3];// '<a href="' + locations[i][2] + '">' + locations[i][3] + '</a>';
                   google.maps.event.addListener(marker, 'click', (function(marker, i, content) {
                    return function() {
                      //infowindow.setContent(content);
                      $('#modalMarkerInfo'+content).fadeIn();
                     // infowindow.open(map, marker);
                    }
                  })(marker, i, content));
                  //notice how we pass the variables in the callback and how we bind those variable values at the end of the function
                } map.fitBounds(markerBounds);
                 // ('#mapnotify').fadeIn('fast').delay(1000).fadeOut('fast');
              } //success
         }); //ajax
     } //function
 </script>
<!------------------------------ end of the location ---------------------------->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA08uUPUXToEy_MzeLmEXkTdem9ct9X3wY&libraries=places&libraries=geometry&sensor=false"></script>
     <div id="garagesMap">
         <div  id="map"  data-markers=' [-26.8178664, -65.198473, "/microsite/play-test", "1"],
  [-26.8082848, -65.2175903, "/microsite/asdsad", "100"],
  [-26.8409129, -65.2194755, "/microsite/fut-five", "102"],
  [-26.8073086, -65.2380249, "/microsite/fulbolito", "103"]'>
        </div>
 </div> -->
<?php 
/***********************************************************************
                   Gagae Model popup
***********************************************************************/
///echo '<pre>';print_R($garage_detailsdata);echo '</pre>';
foreach($garage_detailsdata as $gdata){
    $garage_id =  $gdata['garage_id'];
    $user_id = $gdata['user_id'];
    $garage_name = $gdata['garage_name'];
    $garage_email = $gdata['garage_email'];
    $garage_website = $gdata['garage_website'];
    $summary_line = $gdata['summary_line'];
    $address_line_1 = $gdata['address_line_1'];
    $address_line_2= $gdata['address_line_2'];
     $posttown= $gdata['posttown'];
    $country = $gdata['country'];
    $eir_code = $gdata['eir_code'];
    $garage_photos = $gdata['garage_photos'];
     $garage_photo = explode(',',$garage_photos);
?>
<div class="modal modal__garage-info" id="modalMarkerInfo<?php echo $garage_id;?>">
    <div class="block">
      <div class="block__content modal__content" itemscope="" itemtype="http://schema.org/LocalBusiness">
         <a href="#" class="modal__close"><span class="modal__close__text">Close</span> <span class="icon icon--close"><i class="fa fa-close"></i></span></a>
         <div class="row">
          <div class="col-xs-3">
                                        <img src="<?php echo $base_url.$garage_photo[0];?> " alt="<?php echo $garage_name;?>">
                      </div><!-- Column ends -->

          <div class="col-xs-9">
            <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                         <span id="garageName" itemprop="name" class="page-heading"><?php echo $garage_name;?></span>
            </div>
          <address class="address block__profile__address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
          <span itemprop="streetAddress"><?php echo $address_line_1;?></span>,<br> 
           <span itemprop="streetAddress"><?php echo $address_line_2;?></span>,<br>     
          <span itemprop="addressCity"><?php echo $posttown;?></span>,<br>    
          <span itemprop="addressPostcode"><?php echo $eir_code;?></span>
         </address>
          </div><!-- Column ends -->
        </div><!-- Row ends -->
      </div><!-- Block Content ends -->
       <div class="centeralign"><a id="viewlink" href="<?php echo $base_url;?>home/garagedetail/<?php echo $garage_id;?>" class="button">View Garage Profile</a></div>
     </div><!-- Block ends -->
  </div>
  <?php
}
?>
<?php 
 $star_count_tol=3;$movers_div='';
for( $i=1 ; $i<= 5; $i++ )
                           
                            { 
                                if($i <=  $star_count_tol)
                                {  

                                  $movers_div .='<input type="hidden" class="stars_count reviews_details" data-value ="'.$star_count_tol.' "> 
                                     <li class="star  stars_count" data-value=" '.$i.' " selected style="list-style: none;float:left;">
                                      <i class="fa fa-star fa-fw" style="color: gold;"></i>
                                       </li>';

                                }
                                else
                                { 

                                   $movers_div .='<li style="list-style: none;float:left;color:black" class="star" data-value="'.$i.' " >
                                     <i class="fa fa-star fa-fw"></i>
                                     </li>';

                             }


                            } 
                         //   echo $movers_div;

?> 
    <!--   How it works-->
    <section class="how-it-works section-padding section_pading_stl">
        <div class="how-it-works-inner content">
            <div class="section-title text-center">
                <h2>
                   HOW IT WORKS
               </h2> 
               <div class="decor-1"><i class="icon flaticon-delivery36"></i></div>
           </div>
            <div class="section-content row text-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner"> <img src="<?php echo $base_url;?>assets/front/images/service_1_new.jpg" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner service_content"> 
                                <!-- <img src="<?php echo $base_url;?>assets/front/images/How-1-icon.svg" alt="work-icon"> -->
                                <i class="howit_icons icon flaticon-head39 "></i>
                                <h3>Search and Compare</h3>
                                <h5>Read customer reviews and compare prices for moving labor services. All local mover prices are displayed so there are no hidden costs or fees to you.</h5> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner "> <img class="service_2_margin" src="<?php echo $base_url;?>assets/front/images/service.png" style="" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner service_content"> 
                                <!-- <img src="<?php echo $base_url;?>assets/front/images/How-2-icon.svg" alt="work-icon"> -->
                                <i class="howit_icons flaticon-delivery56 "></i>
                                <h3>Select Garages</h3>
                                <h5>Choose the Service Provider based on your moving needs. Within 24 hours of placing your order, your labor provider will contact you to confirm order details.</h5> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner "> <img class="service_3_border" src="<?php echo $base_url;?>assets/front/images/serviceafter.png" style="" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner service_content"> 
                                <!-- <img src="<?php echo $base_url;?>assets/front/images/How-3-icon.svg" alt="work-icon"> -->
                                <i class="howit_icons icon flaticon-logistics3"></i>
                                <h3>Move</h3>
                                <h5>Your mover does not receive payment until the moving services are completed to your satisfaction. Once satisfied, simply log on to release the payment to your Service Provider!</h5> </div>
                        </div>
                    </div>
                </div> 
                
               
                    
                </div>
                <div  style="" class="book_now_btn_cntr"><a href="#" class="bttn button_booking_stl">Book Now</a></div>
</div>

    </section>

    <!--   criteria Area-->
    <section class="criteria criteria-bg section-padding criteria_section_stl">
        <div class="criteria_content">
            <div class="section-title text-center">
                <h2 class="paragraph_style_filter_option">Finding trusted Garages for you</h2>
                <p> We provide a marketplace for customers and garages to connect. Garages go through extensive identity and background checks in order to offer services in the marketplace. Customers can search through a variety of service providers and select the best fit. Trust and safety are our top priority so we collect payment to ensure projects are completed exactly as requested. Customers have the authority to dispute a case if work is not completed as promised. We will not emit payment to the mover without our customers satisfaction. With HireMovers, you can always have peace of mind.
 
                </p>
            </div>
            <div class="section-content">
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-1.svg" alt="Criteria"> </div>
                    <p>Experienced & Professional</p>
                </div>
                <div class="criteria-box">
                    <div class="icon"> <img class="Communication_imgae" src="<?php echo $base_url;?>assets/front/images/how-2_new.png" alt="Criteria"> </div>
                    <p>Outstanding Communication</p>
                </div>
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-3.svg" alt="Criteria"> </div>
                    <p>Background & Reference Checked</p>
                </div>
                <!-- <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-4.svg" alt="Criteria"> </div>
                    <p>Interviewed in-person </p>
                </div> -->
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-5.svg" alt="Criteria"> </div>
                    <p>Verified Garages and Customer Reviews</p>
                </div>
            </div>
        </div>
    </section>

    <!--   Customer Area-->
    <section class="customer section-padding bg customer-bg" style="display: none;">
        <div class="content">
            <div class="section-title">
                <h2>THE HIGHEST STANDARDS. THE HAPIEST CUSTOMERS</h2> </div>
            <div class="section-content">
                <div id="demo" class="carousel slide" data-ride="carousel">
                     
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="item-inner text-center"> <img src="<?php echo $base_url;?>assets/front/images/quoat.png" alt="Quote">
                                <h4 class="full_paragaraph_stl">[Your Company Name] cleaned my home today - they did a terrific job. They even moved the folding chairs beside the washer to be sure the laundry floor was cleaned - they really paid attention to detail. Thank you!</h4>
                                <p>MARK, NORTH LYNNWOOD</p>
                            </div>
                        </div>
                       
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev"> <img src="<?php echo $base_url;?>assets/front/images/indicator-left.svg" alt="Indicator" class="indicator"> </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next"><img src="<?php echo $base_url;?>assets/front/images/indicator-right.svg" alt="Indicator" class="indicator"></a>
                </div>
            </div>
        </div>
    </section>


    <section class="clients" style="background: #F3F3F3; margin: 0 auto; text-align: center;display: none;"> <img src="<?php echo $base_url;?>assets/front/images/client.png" alt="Clients"> </section>
</div>
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
            {'country': ['ie','in']});

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

 
      }
function fillInAddress(autocomplete, unique) {
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
} //fillInAddress

 // Bias the autocomplete object to the user's geographical location,
 // as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
        if (navigator.geolocation) 
        {
          
          navigator.geolocation.getCurrentPosition(function(position) {
            alert(position);
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
             
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            console.log(geolocation);

            autocomplete.setBounds(circle.getBounds());
          });
        }
 }
 </script>

 <script>
  //  var map = null;
  // var radius_circle = null;
  // var markers_on_map = [];
  
  //all_locations is just a sample, you will probably load those from database
  // var all_locations = [
  //     {type: "Restaurant", name: "Restaurant 1", lat: 40.723080, lng: -73.984340},
  //     {type: "School", name: "School 1", lat: 40.724705, lng: -73.986611},
  //     {type: "School", name: "School 2", lat: 40.724165, lng: -73.983883},
  //     {type: "Restaurant", name: "Restaurant 2", lat: 40.721819, lng: -73.991358},
  //     {type: "School", name: "School 3", lat: 40.732056, lng: -73.998683}];

  //initialize map on document ready
  // $(document).ready(function(){
  //     var latlng = new google.maps.LatLng(40.723080, -73.984340); //you can use any location as center on map startup
  //     var myOptions = {
  //       zoom: 14,
  //       center: latlng,
  //       mapTypeControl: true,
  //       mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
  //       navigationControl: true,
  //       mapTypeId: google.maps.MapTypeId.ROADMAP
  //     };
  //     map = new google.maps.Map(document.getElementById("map"), myOptions);
      
  //     google.maps.event.addListener(map, 'click', showCloseLocations);
  // });
  
  // function showCloseLocations(e) {
  //   var i;
  //   var radius_km =10; $('#radius_km').val();
  //   var address = $('#address').val();

  //   //remove all radii and markers from map before displaying new ones
  //   if (radius_circle) {
  //       radius_circle.setMap(null);
  //       radius_circle = null;
  //   }
  //   for (i = 0; i < markers_on_map.length; i++) {
  //       if (markers_on_map[i]) {
  //           markers_on_map[i].setMap(null);
  //           markers_on_map[i] = null;
  //       }
  //   }
    
    // var address_lat_lng = e.latLng;
    // radius_circle = new google.maps.Circle({
    //     center: address_lat_lng,
    //     radius: radius_km * 1000,
    //     clickable: false,
    //     map: map
    // });
  //   if(radius_circle) map.fitBounds(radius_circle.getBounds());
  //   for (var j = 0; j < all_locations.length; j++) {
  //       (function (location) {
  //           var marker_lat_lng = new google.maps.LatLng(location.lat, location.lng);
  //           var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(address_lat_lng, marker_lat_lng); //distance in meters between your location and the marker
  //           if (distance_from_location <= radius_km * 1000) {
  //               var new_marker = new google.maps.Marker({
  //                   position: marker_lat_lng,
  //                   map: map,
  //                   title: location.name
  //               });
  //               google.maps.event.addListener(new_marker, 'click', function () {
  //                   alert(location.name + " is " + distance_from_location + " meters from my location");
  //               });
  //               markers_on_map.push(new_marker);
  //           }
  //       })(all_locations[j]);
  //   }
  // }

 
jQuery('.modal__close').click(function( )
{
   jQuery(this).parents('div.modal').fadeOut();
});

// var iconBase =
//             'https://developers.google.com/maps/documentation/javascript/examples/full/images/';

//         var icons = {
//           parking: {
//             icon: iconBase + 'parking_lot_maps.png'
//           },
//           library: {
//             icon: iconBase + 'library_maps.png'
//           },
//           info: {
//             icon: iconBase + 'info-i_maps.png'
//           }
//         };

/******************* MAP display************************************/
   var mapElement = document.getElementById('map');
   var locations = JSON.parse("[" + mapElement.getAttribute('data-markers') + "]");
   var map = new google.maps.Map(mapElement, {
     zoom: 8,
     mapTypeId: google.maps.MapTypeId.ROADMAP
    });

   var markerBounds = new google.maps.LatLngBounds();
   var infowindow = new google.maps.InfoWindow();
   var marker, i, content;
     for (i = 0; i < locations.length; i++) {
        point = new google.maps.LatLng(locations[i][0], locations[i][1]);
         marker = new google.maps.Marker({
          position: point, icon:'<?php echo BASE_URL;?>/assets/front/images/mapicon1.png',
          map: map,type: 'info'
        });
     marker.setMap(map)
     markerBounds.extend(point);
     content =locations[i][3];// '<a href="' + locations[i][2] + '">' + locations[i][3] + '</a>';
       google.maps.event.addListener(marker, 'click', (function(marker, i, content) {
          return function() {
            //infowindow.setContent(content);
            $('#modalMarkerInfo'+content).fadeIn();
           // infowindow.open(map, marker);
           }
       })(marker, i, content));
   } //foreach
 map.fitBounds(markerBounds);
 </script>  
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/apps/css/jquery.datetimepicker.css"> -->
   <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/apps/css/jquery.datetimepicker.min.css"> -->
     <!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.datetimepicker.full.min.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script> -->





<!--    <link href="http://stallioni.in/551/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" rel="stylesheet" type="text/css" /> -->

   <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css"/> -->

 
    <!-- <script src="<?php echo BASE_URL; ?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> -->
    <script type="text/javascript">
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
$('.home_search_btn_stlr').click(function(e){
   $('#seelctaadd .errorspan').html('');
    var lat = $('#latitude').val();
    var lang = $('#longitude').val();
    var postcode = $('#postcode').val();
    var logindet = $('#logindet').val();
    //alert(postcode);
    if(logindet =='nologin')
                {
                   e.preventDefault(); $(".login_or_signup").trigger("click"); //alert('please login');
                } 

    var radius = $( "#radius option:selected" ).val(); 
    if( (postcode=='' || postcode==' '))
    {
       $('#seelctaadd .errorspan').html(' Please Search address or zipcode ');
      e.preventDefault();

    }else{ $('#seelctaadd .errorspan').html('');
              
                       //$('.home_search_btn_stlr').removeAttr("disabled");
                       
    //alert(lat + lang+ postcode+ radius);
    geolocate_function_search(postcode,lat,lang,radius);
  }
});
function geolocate_function_search(postcode,latitude,longitude,miles)
    {
       console.log(postcode + latitude +longitude +miles); 
       //get nearest garage
        jQuery.ajax({
            url : '<?php echo BASE_URL;?>/home/getnearst_garages_miles?postcode='+postcode+'&latitude='+latitude+'&longitude='+longitude+'&miles='+miles,
              type: 'POST',
              success:function(response){
                ///alert(response);
              //  $( "#map" ).data( "markers" ,response );
              var mapElement = document.getElementById('map');
              var locations = JSON.parse("[" + response + "]");
                var map = new google.maps.Map(mapElement, {
                  zoom: 8,
                   mapTypeId: google.maps.MapTypeId.ROADMAP
                });
               var markerBounds = new google.maps.LatLngBounds();
               var infowindow = new google.maps.InfoWindow();
               var marker, i, content;

                for (i = 0; i < locations.length; i++) {
                  point = new google.maps.LatLng(locations[i][0], locations[i][1]);
                   marker = new google.maps.Marker({
                    position: point, 
                    icon:'<?php echo BASE_URL;?>/assets/front/images/mapicon1.png',
                    map: map,type: 'info'
                  });
 
                   marker.setMap(map)
                   markerBounds.extend(point);
                   content =locations[i][3];// '<a href="' + locations[i][2] + '">' + locations[i][3] + '</a>';
                   google.maps.event.addListener(marker, 'click', (function(marker, i, content) {
                    return function() {
                      //infowindow.setContent(content);
                      $('#modalMarkerInfo'+content).fadeIn();
                     // infowindow.open(map, marker);
                    }
                  })(marker, i, content));
                  //notice how we pass the variables in the callback and how we bind those variable values at the end of the function
                } map.fitBounds(markerBounds);
              } //success
         }); //ajax
     } //function
    $("#form_submit").submit(function(e) {


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
                      
 $('#form_submit').unbind('submit').submit();return true;
 
    }else{
        $('.error_sites').show();
    }

});


</script>
 