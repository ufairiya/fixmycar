<form id="movers_update" name="movers_update" enctype="multipart/form-data" method="post"> 
<div class="modal-header">
	<span>Edit basic details</span>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
if($UserDetails) {
 
	//foreach ($UserDetails as $UserDetail) {
		$user_id = $UserDetails->user_id;
		$garage_name = $UserDetails->garage_name;
		$garage_phone = $UserDetails->garage_phone;
		$garage_website = $UserDetails->garage_website;
		$garage_email = $UserDetails->garage_email;
		$address_line_1 = $UserDetails->address_line_1;
		$address_line_2 = $UserDetails->address_line_2;
		$posttown = $UserDetails->posttown;
		$eir_code = $UserDetails->eir_code;
		$country = $UserDetails->country;
		$latitude = $UserDetails->latitude;
		$longitude = $UserDetails->longitude;
		$owner_name = $UserDetails->owner_name;
		$garage_photos = $UserDetails->garage_photos;
  }
  else{
$garage_name =$garage_phone =$garage_website = $garage_email =$address_line_1 = $address_line_2 = $posttown =$eir_code =$country =$latitude =$longitude =$owner_name =$garage_photos ='';
  }
	 
?>
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Garage name:</label>
		        </div>
		        <div class="col-md-8">
               
              <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
		        	<input type="text" class="form-control" name="garage_name" value="<?php echo $garage_name; ?>">
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Website:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="garage_website" value="<?php echo $garage_website; ?>">
		        </div>
		    </div>
		</div> 
		<div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Email:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="email" value="<?php echo $garage_email; ?>" >
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">phone no:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="garage_phone" value="<?php echo $garage_phone; ?>">
		        </div>
		    </div>
		</div> 
		<div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Address Line 1:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="address_line_1" value="<?php echo $address_line_1; ?>">
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Address Line 2:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="address_line_2" value="<?php echo $address_line_2; ?>">
		        </div>
		    </div>
		</div> 
		<div style="clear:both;"></div>
 <div class="col-md-6">
      <div class="row">
            <div class="col-md-4">
              <label class="form-label">Post town:</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="posttown" value="<?php echo $posttown; ?>">
            </div>
        </div>
    </div> 
    <div class="col-md-6">
      <div class="row">
            <div class="col-md-4">
              <label class="form-label">Country:</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="country" value="<?php echo $country; ?>">
            </div>
        </div>
    </div> 
      <div style="clear:both;"></div>
      <div class="col-md-6">
      <div class="row">
            <div class="col-md-4">
              <label class="form-label">Eir code:</label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" name="eir_code" value="<?php echo $eir_code; ?>">
            </div>
        </div>
    </div> 
		<!-- <div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">country:</label>
		        </div>
		        <div class="col-md-8">
		        	<select class="country form-control" name="country" id="country"  required>
                    	<option value=''>Select</option>
                    	<option value="usa" <?php echo ($country == 'usa')?'selected':''; ?> >United States</option>
                    	<option value="india" <?php echo ($country == 'india')?'selected':''; ?>>India</option>
                    	<option value="uk" <?php echo ($country == 'uk')?'selected':''; ?>>United Kingdom</option>
                	</select>
		        </div>
		    </div>
		</div>  -->
		<!-- <div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">State:</label>
		        </div>
		        <div class="col-md-8">
		        	<select id="state" name="state" class="form-control state " required>
                       
                        <option value="">select</option>
                	</select>
		        </div>
		    </div>
		</div>  -->
	 
		<div style="clear: both;"></div>
		<br>
	 


<?php
//	}
//}
?>
        </div>

    </div>
</div>
<div class="modal-footer">
	<div class="col-md-3">
	<button type="submit" class="btn btn-theme">Save</button>
</div>
</div>

</form>
<script type="text/javascript">
	    

// document.getElementById("profile_image").onchange = function () {
//     if (this.value.match(/\.(jpeg|bmp|jpg|gif|png)$/)) {
//         // document.getElementById("profie_picture").value = this.value;
//          // $('#output1').css('display','block');
//     var output2 = document.getElementById('profile_img');
//     output2.src = URL.createObjectURL(event.target.files[0]);
//     } else {
//         this.value = "";
//         alert("selected file Must be a jpeg or jpg or gif or png.");
//     }
// };

//     function PreviewImagefile() {
//                 //$('.preview_id_file').css('display','block');
//                 pdffile=document.getElementById("id_proof").files[0];
//                 pdffile_url=URL.createObjectURL(pdffile);

//                 $('.id_proof_img').attr('src',pdffile_url);
       
//             }


            jQuery("#movers_update").validate({
         debug: true,
        rules: {
             garage_name:{required:true,},
            garage_phone: {
                required: true,
            },
            eir_code: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
           
            posttown: {
                required:true,
            },
            // country :{
            //     required:true,
            // },
            country: {
                required:true,
               
            },
            // year_found: {
            //     required:true,
            // },
         

        },
        messages: {
          garage_name: "Please enter your firstname",
          country: "Please enter country",
          email: "Please enter your Email ID",
          // state: "Please select any state",
          garage_phone:{
           required: "Please enter your Mobile Number",

       },
       eir_code:{required:"enter your eir code"},
         
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('movers_update')[0]);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo $base_url; ?>garage/update_company_details", 
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
                        toastr.options = {
			              "closeButton": true,
			            }
			            toastr.success("Basic details updated successfully", "Notifications");
			            setTimeout(function(){ location.reload(); }, 500); 
                    }
                     
                    else
                    {
                    	toastr.options = {
			              "closeButton": true,
			            }
			            toastr.warning("Error in update", "Notifications");
                    }
                }
            });
            return false;
        }
     });

</script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&libraries=places&callback=initAutocomplete"></script>
  
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
            /** @type {!HTMLInputElement} */(document.getElementById('address_feilds')),
            options);

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', function() {
    //  console.log("value changeed")
    fillInAddress(autocomplete, "edit");
  });

    jQuery("#autocomplete").bind("keypress", function(e) {
        if(e.keyCode == 13) {
fillInAddress(autocomplete, "");
        }
    });








//console.log("sstaddert r=dfgdfgdf");
      }

      function fillInAddress(autocomplete, unique) {

//console.log("filllllllllllllllllllll");

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

// jQuery(document).ready(function(){
//    jQuery('.moving_date').datepicker({

//      minDate: 1
    

//    }).datepicker('setDate', 'today');;
// });



// jQuery('.direct_url').focusout(function(){
 
//  var direct_url = $('.direct_url').val();

//  alert(direct_url);

//  var mover_id = '<?php if($user_id!='' ){echo $user_id;}else{echo '';}?>';
//  if(mover_id!='' && direct_url!=''){




// $.ajax({
//                 url: "<?php echo BASE_URL; ?>/movers/check_directurl_availability", 
//                 type: "POST",             
//                 data: {'mover_id':mover_id,'direct_url':direct_url},             
//                 dataType:'json',    
//                 success: function(data) {
                
//                 if(data==1){

//                 }
              
               

//                 }
//             });
// }

// });


</script>

