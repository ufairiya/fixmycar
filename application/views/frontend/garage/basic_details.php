<style type="text/css">
  .update_password_moversss{
    background:#00CACA!important;
  }
  .update_password_moversss:hover{background: #09eaea!important;color: white;font-weight: bold;}
</style>
 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


 <!--  <div class="col-md-12 movers_form">
      <div class="col-md-12 movers_title">
          <div class="col-md-6">Stripe Details</div>
         
      </div>

  <div class="col-md-12 "> -->
    <?php $style = 'display:block'; 
  //  if($UserDetails->stripe_accountid !=''){ $style = 'display:block'; ?>
     <!--  <div class="col-md-12">
        <div class="alert alert-success">Stripe account connected</div>
      </div> -->
    <?php //}else{  $style = 'display:none';  ?>
    <!--   <div class="col-md-12">
        <div class="alert alert-danger">Stripe account not connected Please connect stripe account</div>
      </div> -->
    <?php //} ?>
  <!--  <center> <a href='https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?php echo STRIPE_CLIENT_ID; ?>&scope=read_write' target="_blank"><img src="<?php echo BASE_URL; ?>/assets/images/stripebtn.png"></a></center>


  </div>
  </div> -->


<?php //echo "<pre>";print_r($UserDetails);echo "</pre>"; ?>
<div class="col-md-12 movers_form movers_profile" style="display:block">
  <div class="col-md-12 movers_title">
      <div class="col-md-6">Profile Details</div>
      <div class="col-md-6 text_right">
         <a href="<?php echo BASE_URL;?>/garage/edit_basic/<?php echo $user_id; ?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" data-keyboard="false" class="btn btn-theme-border float-right"><i class="fa fa-edit"></i> Edit </a>
          <!--  <button type="button" class="btn btn-theme-border float-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-edit"></i> Edit</button> -->
      </div>
  </div>
  
	<div class="col-md-12 stl_filter">
    <?php
    if($UserDetails) { 
     // foreach($UserDetails as $UserDetail) { ?>
		<div class="col-md-6">
			<div class="row">
        <div class="col-md-6">
          <label class="control-label ">Name:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->first_name.' '.$UserDetails->last_name;?> 
            </p>
        </div>
      </div>
		</div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Email ID:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->email;?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Phone:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->phone;?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Address:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->address;?> 
            </p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Country:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->country;?> 
            </p>
        </div>
      </div>
    </div> -->
    <!-- <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">State:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->state;?> 
            </p>
        </div>
      </div>
    </div> -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Company Name:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->company_name;?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Year Found:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo $UserDetails->year_found;?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Profile Image:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <img src="<?php echo BASE_URL.'/'.$UserDetails->profile_image;?>" width="150px" alt="Profile image">
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">ID Proof:</label>
        </div>
       
        <div class="col-md-6">
            <p class="form-control-static">
              <?php if($UserDetails->id_proof){  ?>
              <iframe src="<?php echo BASE_URL.'/'.$UserDetails->id_proof;?> " width="150px" height="150px" ></iframe>
              <?php } ?>
              
            </p>
        </div>
      </div>
    </div>

<div style="clear: both;"></div>
    <!--  <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label "> Direct Book URL:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
            
              <?php echo $UserDetails->direct_url;?>
              
            </p>
        </div>
      </div>
    </div> -->

<div style="clear: both;"></div>

    <!--  <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Slot per day:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
            
              <?php echo $UserDetails->slot_per_day;?>
              
            </p>
        </div>
      </div>
    </div> -->

  <!--    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Admin fee:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
            
              <?php echo $UserDetails->admin_fee;?>
              
            </p>
        </div>
      </div>
    </div> -->






  <?php //} 
} ?>
	</div>
</div>

<div class="col-md-12 movers_form"  style="<?php echo $style;?>">
      <div class="col-md-12 movers_title">
          <div class="col-md-6">Change Password</div>
         
      </div>

  <div class="col-md-12 movers_change_password">
<form class="movers_passowrd_update" id="movers_passowrd_update" name="movers_passowrd_update" enctype="multipart/form-data" method="post">
         <div class="col-md-12 stl_filter">
              <div class="row">
                  <div class="col-md-3 stl_filter">
                    <label class="control-label ">Current Password</label>
                  </div>
                  <div class="col-md-3 stl_filter">
                  <input type="text"  class="form-control current_password_movers"  name="current_password_movers"  required>
                      
                  </div>
              </div>
        </div>
       

         <div class="col-md-12 stl_filter">
              <div class="row">
                  <div class="col-md-3 stl_filter">
                    <label class="control-label ">New Password</label>
                  </div>
                  <div class="col-md-3 stl_filter">
                  <input type="text" name="new_password_movers" id="new_password_movers"   class="form-control new_password_movers"  required >
                      
                  </div>
              </div>
        </div>
       <!-- <?php echo $user_id; ?> -->

         <div class="col-md-12 stl_filter">
              <div class="row">
                  <div class="col-md-3 stl_filter">
                    <label class="control-label ">Conform Password</label>
                  </div>
                  <div class="col-md-3 stl_filter">
                  <input type="text" name="conform_password_movers"  class="form-control conform_password_movers" required  >
                      
                  </div>
              </div>
        </div>
       
       

        <div class="col-md-12 stl_filter">
              <div class="row">
                  <div class="col-md-3 stl_filter">
                
                  </div>
                  <div class="col-md-3 stl_filter">
                    <input type="submit"    class="btn btn-sm update_password_moversss" value="Update">                      
                  </div>
              </div>
        </div>
       </form>

  </div>
  </div>

<script type="text/javascript">
 $("#movers_passowrd_update").validate({
       rules: {
            current_password_movers:{required:true},
            new_password_movers: {
                required: true,
                minlength: 5,
            },
            conform_password_movers: {
                required: true,
                minlength: 5,
                equalTo : "#new_password_movers"
            },
            
            
        },
        messages: {
         
          new_password_movers: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
          },
          conform_password_movers: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to new password"
          },
        },
        
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('movers_passowrd_update')[0]);
            var user_id = '<?php echo $user_id?>';
         
            $.ajax({
                 url: "<?php echo BASE_URL; ?>/garage/garage_update_stlpswd/" +user_id, 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {

                    if(data==1){
                       window.setTimeout(function(){location.reload()},2000)
                      toastr.warning("Password reset successfully", "Notifications");
                      
                    }
                    if(data ==0) 
                        {
                        toastr.warning("Error in password reset", "Notifications");
                        window.setTimeout(function(){location.reload()},2000)
                     }
                    
                }
            });
            
        }
     });
</script>