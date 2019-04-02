<form id="customer_update" name="customer_update" enctype="multipart/form-data" method="post"> 
<div class="modal-header">
    <span style="font-weight: bold;">Edit details</span>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
if($customer_details) {
    foreach ($customer_details as $customer_detail) {
        $user_id = $customer_detail->id_user_master;
        $first_name = $customer_detail->first_name;
        $last_name = $customer_detail->last_name;
        $username = $customer_detail->username;
        $email = $customer_detail->email;
        $password = $customer_detail->password;
        $phone = $customer_detail->phone;
        $address = $customer_detail->address;
        $profile_image = $customer_detail->profile_image;

    }
 $profile_image = (!empty($profile_image)) ? $profile_image :'/images.png';
?>
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">First name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Last name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
                </div>
            </div>
            <br>
        </div> 
        <div style="clear:both;"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">address</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="<?php echo $address;?>" name="address" id="address" class="form-control from_address" placeholder="Enter address" aria-describedby="basic-addon1" onFocus="geolocate()" required>
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Email</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
                </div>
            </div>
            <br>
        </div> 
        <div style="clear:both;"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Phone no</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Profile Picture:</label>
                </div>
                <div class="col-md-8">
                    <input type="hidden" class="form-control" name="profile_image_old" value="<?php echo $profile_image; ?>">
                    <input type="file" name="profile_image" id="profile_image" class="profile_image form-control">
                    <img src="<?php echo BASE_URL;?>/uploads/images/profile_images/<?php echo $profile_image;?>" id="profile_img" class="profile_img" height="150px;" width="200px;">
                </div>
            </div>
            <br>
        </div> 
     
<?php
//  }
}
?>
        </div>

    </div>
</div>
<div class="modal-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-theme save_btn">Save</button>
</div>
</div>

</form>
<script type="text/javascript">

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


    jQuery("#customer_update").validate({
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
           
            phone: {
                required:true,
               
            },
           
        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email: "Please enter your Email ID",
          phone:{
           required: "Please enter your Mobile Number",

       },
       address:{required:"enter your address"},
      
       phone: {required:"please provide contact number"},
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('customer_update')[0]);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/admin/customer/update_details", 
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

<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script> 
 -->        <!-- <script>
      
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
       
        </script> -->
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
            /** @type {!HTMLInputElement} */(document.getElementById('address')),
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

//     jQuery("#autocomplete2").bind("keypress", function(e) {
//         if(e.keyCode == 13) {
// fillInAddress(autocomplete2, "");
//         }
//     });


//         jQuery('#autocomplete2').keypress(function(e) {
//   if (e.which == 13) {
//     google.maps.event.trigger(autocomplete2, 'place_changed');
//     return false;
//   }
// });






       

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