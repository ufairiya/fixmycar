<form id="customer_update" name="customer_update" enctype="multipart/form-data" method="post"> 
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
		//$company_name = $UserDetails->company_name;
		//$year_found = $UserDetails->year_found;
		$country = $UserDetails->country;
		$address = $UserDetails->address;
		$state = $UserDetails->state;
		 
		$profile_image = $UserDetails->profile_image;
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
		          <label class="form-label">address:</label>
		        </div>
		        <div class="col-md-8">
		        	<textarea class="form-control" name="address"><?php echo $address; ?></textarea>
		        </div>
		    </div>
		</div> 
		
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
            // company_name: {
            //     required:true,
            // },
            // country :{
            //     required:true,
            // },
            phone: {
                required:true,
               
            },
            // year_found: {
            //     required:true,
            // },
         

        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email: "Please enter your Email ID",
          //state: "Please select any state",
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
          //company_name: { required: "Please provide a company name"},
         // contry : { required: "Please select any country"},
          phone: {required:"please provide contact number"},
          //year_found: { required:"please provide year found"},
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('customer_update')[0]);
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo $base_url; ?>customer/update_customer_details", 
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

