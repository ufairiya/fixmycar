<!-- BEGIN CONTENT -->
<style type="text/css">
/* css class for the login generated errors */

.profilepress-reset-status {
  width: 450px;
  text-align: center;
  background-color: #e74c3c;
  color: #ffffff;
  border: medium none;
  border-radius: 4px;
  font-size: 17px;
  font-weight: normal;
  line-height: 1.4;
  padding: 8px 5px;
  margin: auto;
}

.memo-reset-success {
   width: 450px;
  text-align: center;
  background-color: #2ecc71;
  color: #ffffff;
  border: medium none;
  border-radius: 4px;
  font-size: 17px;
  font-weight: normal;
  line-height: 1.4;
  padding: 8px 5px;
  margin: auto;
}

#sc-password {
  background: #f0f0f0;
  width: 50%;
  margin: 0 auto;
  margin-top: 8px;
  margin-bottom: 2%;
  transition: opacity 1s;
  -webkit-transition: opacity 1s;
}

@media screen and (min-width: 300px) and (max-width: 420px){
   #sc-password { width: 90%;}
}

#sc-password h1 {
  background: #17C4BB;
  padding: 16px 0;
  font-size: 140%;
  font-weight: bold;
  text-align: center;
  color: #fff;
}


div#sc-password .sc-container {
  background: #f0f0f0;
  padding: 6% 4%;
}


div#sc-password input[type="password"]{
	margin: auto;
  width: 100%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 95%;
  color: #555;
}

.password_btn{background-color: #3acbcc;
    color: #ffffff;
    padding: 7px 30px;
    font-size: 14px;
    font-weight: bold;
    margin-top: 10px;
}
label{font-size: 13px;vertical-align:bottom;}
.sc-container .error{color:red;}
</style>
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h5 class="page-title"> <?php echo 'Profile Password Edit'; ?></h5>
                    <!-- <?php echo "<pre>";print_r($_SESSION);echo "</pre>"; ?> -->

                    <div class="page-bar">
                     <form  type="POST" id="reset_pass_details"  name="reset_pass_details" class="movers-users-form  " >
                    	<div id="sc-password">
						  <h1>Edit password</h1>
						  
						  <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
						  <input type="hidden" name="user_type" value="<?php echo $this->session->userdata('user_type');?>">
						  <div class="sc-container">
						  <div class="col-md-12">
						 <label class="col-sm-5">Current password:</label>
						 <div class="col-sm-7">
						    <input type="password" class="" name="current_password" placeholder="Current password" />
						    </div>
						    </div>
						    <div class="col-md-12">
						    <label class="col-sm-5">New password:</label>
						 <div class="col-sm-7">
						    <input type="password" class="" name="new_password" id="new_password" placeholder="New password" />
						    </div>
						    </div>
						    <div class="col-md-12">
						    <label class="col-sm-5">Confirm password:</label>
						 <div class="col-sm-7">
						    <input type="password" class="" name="confirm_password" id="confirm_password" placeholder="Confirm password" />
						    </div>
						   </div>
						   		<button type="submit" class="btn btn-sm password_btn col-sm-offset-4">submit</button>
						
						  </div>


						</div>
						</form>
                    </div>
                    

                   
       

                  




               
                </div>

               
                
                
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            



<!--<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script> -->
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
 <script src="<?php echo BASE_URL;?>/assets/pages/scripts/table-bootstrap.min.js" type="text/javascript"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
jQuery(document).ready(function(){

    //console.log("22222222222222222222222222");

     $("#reset_pass_details").validate({
        rules: {
            current_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 5,
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo : "#new_password"
            },
            
            
        },
        messages: {
         
          new_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
          },
          confirm_password: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to new password"
          },
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('reset_pass_details')[0]);
            console.log(formData);
            $.ajax({
                url: "<?php echo $base_url; ?>login/admin_reset_password", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    if(data==1){
                    	toastr.warning("password reset and send mail successfully.", "Notifications");
                    }
                    if(data ==0) 
                        {
                        toastr.warning("password mismatch ", "Notifications");
                     }
                    
                }
            });
            return false;
        }
     });
})
    </script>
