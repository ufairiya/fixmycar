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
		$user_id = $UserDetails->id_user_master;
		$first_name = $UserDetails->first_name;
		$last_name = $UserDetails->last_name;
		$username = $UserDetails->username;
		$email = $UserDetails->email;
		$password = $UserDetails->password;
		$phone = $UserDetails->phone;
		$company_name = $UserDetails->company_name;
		$year_found = $UserDetails->year_found;
		$country = $UserDetails->country;
		$address = $UserDetails->address;
		$state = $UserDetails->state;
		$id_proof = $UserDetails->id_proof;
		$profile_image = $UserDetails->profile_image;
	//	$direct_url = $UserDetails->direct_url; 
		// $slot_per_day = $UserDetails->slot_per_day;
	//	$admin_fee = $UserDetails->admin_fee;
?>
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">First name:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Last name:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
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
		        	<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">phone no:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
		        </div>
		    </div>
		</div> 
		<div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Company name:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="company_name" value="<?php echo $company_name; ?>">
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Year founded:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="year_found" value="<?php echo $year_found; ?>">
		        </div>
		    </div>
		</div> 
		<div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">address:</label>
		        </div>
		        <div class="col-md-8">
		        	<textarea class="form-control" id="address_feilds" name="address" aria-describedby="basic-addon1" onFocus="geolocate()" ><?php echo $address; ?></textarea>
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
		<div style="clear:both;"></div>
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Profile Picture:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="hidden" class="form-control" name="profile_image_old" value="<?php echo $profile_image; ?>">
		        	<input type="file" name="profile_image" id="profile_image" class="profile_image form-control">
		        	<img src="<?php echo ($profile_image !='') ?BASE_URL.'/'.$profile_image:'';?>" id="profile_img" class="profile_img" height="150px;">
		        </div>
		    </div>
		</div> 
		<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">ID Proof:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="hidden" class="form-control" name="id_proof_old" value="<?php echo $id_proof; ?>">
		        	<input type="file" name="id_proof" id="id_proof" class="id_proof form-control" onchange="PreviewImagefile();">
		        	<iframe src="<?php echo ($id_proof !='') ?BASE_URL.'/'.$id_proof:'';?>" class="id_proof_img" width="150px" height="150px;"></iframe>
		        	
		        </div>
		    </div>
		</div> 

		<br>
		<div style="clear: both;"></div>
		<br>
		 

		

	<!-- 	<div class="col-md-6">
			<div class="row">
		        <div class="col-md-4">
		          <label class="form-label">Slots per day:</label>
		        </div>
		        <div class="col-md-8">
		        	<input type="text" class="form-control" name="slots_per_day" value="<?php echo $slot_per_day;?>">
		        </div>
		    </div>
		</div>  -->
		<!-- <div style="clear: both;"></div> -->

		 



<?php
//	}
}
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
	    var selectedCountry = $(".country option:selected").val();
	    var selectedsate = "<?php echo $state; ?>";
        $.ajax({
            type: "POST",
            url: "<?php echo $base_url;?>home/get_country",
            data: { country : selectedCountry,state:selectedsate } 
        }).done(function(data){
           
            jQuery('.state').html(data);
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });

    jQuery("select.country").change(function(){
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "<?php echo $base_url;?>home/get_country",
            data: { country : selectedCountry } 
        }).done(function(data){
           
            jQuery('.state').html(data);
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });
    });


document.getElementById("profile_image").onchange = function () {
    if (this.value.match(/\.(jpeg|bmp|jpg|gif|png)$/)) {
        // document.getElementById("profie_picture").value = this.value;
         // $('#output1').css('display','block');
    var output2 = document.getElementById('profile_img');
    output2.src = URL.createObjectURL(event.target.files[0]);
    } else {
        this.value = "";
        alert("selected file Must be a jpeg or jpg or gif or png.");
    }
};

    function PreviewImagefile() {
                //$('.preview_id_file').css('display','block');
                pdffile=document.getElementById("id_proof").files[0];
                pdffile_url=URL.createObjectURL(pdffile);

                $('.id_proof_img').attr('src',pdffile_url);
       
            }


            jQuery("#movers_update").validate({
         debug: true,
        rules: {
             address:{required:true,},
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            // state: {
            //     required: true,
            // },
            // password: {
            //     required: true,
            //     minlength: 5
            // },
            // confirm_pass: {
            //     required: true,
            //     minlength: 5,
            //     equalTo : "#password"
            // },
            company_name: {
                required:true,
            },
            // country :{
            //     required:true,
            // },
            phone: {
                required:true,
               
            },
            year_found: {
                required:true,
            },
         

        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email: "Please enter your Email ID",
          // state: "Please select any state",
          phone:{
           required: "Please enter your Mobile Number",

       },
       address:{required:"enter your address"},
          // password: {
          //   required: "Please provide a password",
          //   minlength: " password must be at least 5 characters long"
          // },
          // confirm_pass: {
          //   required: "Please provide a Confirm password",
          //   minlength: " Confirm password must be at least 5 characters long",
          //   equalTo: " Confirm password must be Equal to password"
          // },
          company_name: { required: "Please provide a company name"},
          // contry : { required: "Please select any country"},
          phone: {required:"please provide contact number"},
          year_found: { required:"please provide year found"},
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('movers_update')[0]);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo $base_url; ?>garage/update_garage_details", 
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

