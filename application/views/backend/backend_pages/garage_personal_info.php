    <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> Personal Information            
                    </h1>

                    <?php 
                    	//echo '<pre>';print_r($garage_details);echo '</pre>';
					if($garage_details) {

					    foreach ($garage_details as $key => $garage_detail) {

					        $user_id = $garage_detail->id_user_master;
					        $first_name = $garage_detail->first_name;
					        $last_name = $garage_detail->last_name;
					        $username = $garage_detail->username;
					        $email = $garage_detail->email;
					        $password = $garage_detail->password;
					        $phone = $garage_detail->phone;
					        $address = $garage_detail->address;
					        $profile_image = $garage_detail->profile_image;    }
					    }
					                    ?>

                    <div class="col-md-8">

                    	<div class="row">

		                    <div class="portlet box green"> 
			                     <div class="portlet-title">
			                        <div class="caption">
			                           <span class="caption-subject sbold">Basic Details</span>
			                        </div>
			                        <div class="actions">
			                           <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#changepassword">Change Password</button>
			                          <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#basic_details">Edit</button>
			                        </div>
			                     </div>

			                     <div class="portlet-body">
			                         <div class="form-group">
			                          <label class="control-label col-md-6 ">First name </label>
			                          <label class="control-label col-md-6"><?php echo $first_name;?></label>
			                        </div>
			                        <div style="clear: both;"></div>
			                        <div class="form-group">
			                          <label class="control-label col-md-6 ">Last name </label>
			                          <label class="control-label col-md-6"><?php echo $last_name;?></label>
			                        </div>			                                                
			                        <div style="clear: both;"></div>
			                        <div class="form-group">
			                           <label class="control-label col-md-6 ">Mobile No </label>
			                          <label class="control-label col-md-6"><?php echo $phone;?></label>
			                        </div>
			                        <div style="clear: both;"></div>
			                        <div class="form-group">
			                           <label class="control-label col-md-6 ">Email ID </label>
			                          <label class="control-label col-md-6"><?php echo $email;?></label>
			                        </div>
			                        <div style="clear: both;"></div>
			                        <div class="form-group">
			                           <label class="control-label col-md-6 ">Address </label>
			                          <label class="control-label col-md-6"><?php echo $address;?></label>
			                        </div>
			                        <div style="clear: both;"></div>
			                        <div class="form-group">
			                           <label class="control-label col-md-6 ">Profile image </label>
			                           <img src="<?php echo BASE_URL.'/'.$profile_image?>" style="width:25%;" class=" col-md-6">
			                        </div>
			                        <div style="clear: both;"></div>
			                     </div> <!-- portlet-body-->

		                     </div>

                    	</div> <!-- row end -->

                    </div> <!-- col-md-8 end -->

                    <div style="clear: both;"></div>

                 </div> <!-- BEGIN PAGE HEADER-->
     </div> <!-- BEGIN CONTENT BODY -->




 <div id="basic_details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form method="post" name="garage_edit" id="garage_edit" enctype="multipart/form-data" method="post">
    
      <div class="modal-body">

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
	        </div> 

	        <div style="clear:both;"></div>
	        <br>
	        <div class="col-md-6">
	            <div class="row">
	                <div class="col-md-4">
	                  <label class="form-label">address</label>
	                </div>
	                <div class="col-md-8">
	                       <input type="text" value="<?php echo $address;?>" name="address" id="autocomplete" class="form-control from_address" placeholder="Enter your address" aria-describedby="basic-addon1" onFocus="geolocate()" required>

	                </div>
	            </div>
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
	        </div> 


	        <div style="clear:both;"></div><br>
	        <div class="col-md-6">
	            <div class="row">
	                <div class="col-md-4">
	                  <label class="form-label">Phone no</label>
	                </div>
	                <div class="col-md-8">
	                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
	                </div>
	            </div>
	        </div> 
        
	        <div class="col-md-6">
	            <div class="row">
	                <div class="col-md-4">
	                  <label class="form-label">Profile Picture</label>
	                </div>
	                <div class="col-md-8">
                    <?php echo $profile_image;?>
	                    <input type="hidden" class="form-control" name="profile_image_old" value="<?php echo $profile_image;?>">
	                    <input type="file" name="profile_image" id="profile_image" class="profile_image form-control">
	                    <img src="<?php echo BASE_URL;?>/<?php echo $profile_image;?>" id="profile_img" class="profile_img" height="150px;" width="200px;">
	                </div>
	            </div>
	        </div> 
	    

           <div style="clear:both;"></div>
        </div><!--modal-body end -->


 <div class="modal-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-theme save_btn">Save</button>
   </div>
</div>


     <div style="clear:both;"></div>

     </form>
    </div><!-- modal-content -->

  </div>
</div>





 <div id="changepassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form method="post" name="garage_password_change" id="garage_password_change" enctype="multipart/form-data" method="post">
    
      <div class="modal-body">

	         <input type="hidden" name="user_id_garage" value="<?php echo $user_id; ?>">
	        <div class="col-md-12">
	            <div class="row">
	                <div class="col-md-6 labels_stl">
	                  <label class="form-label">Current Password</label>
	                </div>
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="current_password" id="current_password" value=""><br>
	                </div>
	            </div>
	        </div>  
	        
	        <div class="col-md-12">
	            <div class="row">
	                <div class="col-md-6 labels_stl">
	                  <label class="form-label">New Password</label>
	                </div>
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="new_password"  id="new_password" value=""> <br>
	                </div>
	            </div>
	        </div>  

	          <div class="col-md-12">
	            <div class="row">
	                <div class="col-md-6 labels_stl">
	                  <label class="form-label">Conform Password</label>
	                </div>
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="conform_password" value=""><br>
	                </div>
	            </div>
	        </div> 

	      
        
	    

           <div style="clear:both;"></div>
        </div><!--modal-body end -->


 <div class="modal-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-theme save_btn">Save</button>
   </div>
</div>


     <div style="clear:both;"></div>

     </form>
    </div><!-- modal-content -->

  </div>
</div>





<script type="text/javascript">
	
jQuery(document).ready(function()
{


	 jQuery("#garage_edit").validate({
         debug: true,
        rules: {
             address:{
                required:true
            },
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
       address:{required:"enter enter your address"},
    phone: {required:"please provide contact number"},
        },

     highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('garage_edit')[0]);
            console.log(formData);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/update_details", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    if(data =='1')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.success("Details updated successfully", "Notifications");
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



     jQuery("#garage_password_change").validate({
         debug: true,
        rules: {
             current_password:{
                required:true
            },
            new_password: {
                required: true,
            },
            conform_password: {
                required: true,
                equalTo : "#new_password"
            },
        
        },
        messages: {
          current_password: "Please enter your password",
          new_password: "Please enter your new password",
           conform_password: {
            required: "Please enter a confirm password",
            equalTo: "Your Confirm password must be Equal to  new password"
          },
          },

     highlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        unhighlight: function(element) {
            $(element).parent().children(':first-child').addClass("error_label");
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('garage_password_change')[0]);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/changepassword", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    if(data =='1')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.success("Details updated successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }

                       else if(data =='2')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Current password is not valid", "Notifications");
                        //setTimeout(function(){ location.reload(); }, 500); 
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


})



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

</script>