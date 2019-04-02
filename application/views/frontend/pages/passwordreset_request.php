<style type="text/css">



#password_reset_design{
  background: #f0f0f0;
  width: 50%;
  margin: 0 auto;
  margin-top: 8px;
  margin-bottom: 2%;
  transition: opacity 1s;
  -webkit-transition: opacity 1s;
}

#password_reset_design h1 {
  background: #100b66;
  line-height: 60px;
 /* padding: 10px 0;*/
  font-size: 140%;
  font-weight: 300;
  text-align: center;
  color: #fff;
}

div#password_reset_design .sc-container {
  background: #f0f0f0;
  padding: 6% 4%;
}

div#password_reset_design input[type="email"],
div#password_reset_design input[type="text"],
div#password_reset_design input[type="password"] {
  width: 100%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 15px;
  color: #555;
}

div#password_reset_design button[type="submit"] {
 
  background: rgb(183,136,8);
  border: 0;
  margin-top: 10px;
  font-family: 'Open Sans', sans-serif;
  font-size: 100%;
  color: #fff;
  cursor: pointer;
  transition: background .3s;
  -webkit-transition: background .3s;
}

div#password_reset_design button[type="submit"]:hover {
     background: rgb(226, 171, 22);
}
.sc-container span{font-size: 18px;padding: 4px;}


@media screen and (min-width: 300px) and (max-width: 420px){
  #password_reset_design{width:90% !important;}
  div#password_reset_design button[type="submit"]{margin: 0px 30%;}
}

</style>
<div class="pswd_reset_stl">
<div id="password_reset_design">
  <h1>Reset Password</h1>
  	<div class="sc-container">
  		<form  method="POST" id="password_reset_validate123"  name="password_reset_validate123"  >
			<div class="col-md-12">
				<span class="col-sm-5">Mail Id:</span>
				<div class="col-sm-7">
					<span><?php echo $mailid; ?></span>
					<input type="hidden" name="mail_id" value="<?php echo $mailid; ?>">
				</div>
			</div>
			<div class="col-md-12">
				<span class="col-sm-5">New password:</span>
				<div class="col-sm-7">
					<input type="password" class="" name="newpassword" id="newpassword" placeholder="New password" />
				</div>
			</div>
			<div class="col-md-12">
			    <span class="col-sm-5">Confirm password:</span>
			 	<div class="col-sm-7">
			    	<input type="password" class="" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" />
			    </div>
			</div>
			<button type="submit" class="btn btn-sm col-sm-offset-5">submit</button>
		</form>			
	</div>
</div>
</div>

<script>
jQuery(document).ready(function(){

    //console.log("22222222222222222222222222");

     $("#password_reset_validate123").validate({
        rules: {
            
            newpassword: {
                required: true,
                minlength: 5,
            },
            confirmpassword: {
                required: true,
                minlength: 5,
                equalTo : "#newpassword"
            },
            
            
        },
        messages: {
         
          newpassword: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
          },
          confirmpassword: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to new password"
          },
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('password_reset_validate123')[0]);
            console.log(formData);
            $.ajax({
                url: "<?php echo $base_url; ?>login/users_reset_password", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {

                    if(data==1){
                      toastr.warning("Password reset successfully", "Notifications");
                    	 setTimeout(function(){

                    	
                     window.location.href = "<?php echo $base_url;?>";
                      },2500)
                     

                       
                       
                    	
                    }

                    if(data ==0) 
                        {
                        toastr.warning("Error in password reset", "Notifications");
                        
                     }
                    
                }
            });
            
        }
     });
})
    </script>
