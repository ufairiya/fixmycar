<style type="text/css">
    .password_reset{    background-color: #3acbcc;
    color: #ffffff;
    padding: 7px 30px;
    font-size: 14px;
    font-weight: bold;}
    .email_id_style{padding-left: 0px;}
    .email_srg{text-align: right;}
</style>

<div class="modal-header">
            <span>Forgot Password</span>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
         
           <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                
                     <!-- <form role="form" action="<?php echo $base_url;?>login/forgotpassword" class="form-horizontal" method="post" id="forgot_password">   -->
                     <form role="form"  class="form-horizontal" method="post" >
                        <br>
                         <div class="form-group ">
                            <span class="email_srg col-sm-3" >Email</span>
                            <div class="col-sm-9 email_id_style" >
                                <input type="email" name="reset_email_id" class="form-control reset_email_id" placeholder="Enter your email id" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-sm col-sm-offset-3 password_reset">
                                <span >Submit</span>
                            </button>
                        </div>
                      </form>
                    <div id="OR" class="hidden-xs">
                            <i class="flaticon-logistics3"></i></div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            
                            <img src="<?php echo $base_url; ?>/assets/front/images/logo/logo.jpg">
                            
                        </div>
                    </div>
                </div>
            </div> 
             <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            

<script type="text/javascript">
 
      $('.password_reset').click(function(){
        var mailid = $('.reset_email_id').val();
        console.log(mailid);


        if( /(.+)@(.+){2,}\.(.+){2,}/.test(mailid) ){
         
         $.ajax({
                url: "<?php echo BASE_URL;?>/login/forgotpassword", 
                type: "POST",             
                data: {'mailid' : mailid},
                
                dataType:'json',    
                success: function(data) {   

                console.log(data);                
                    if(data ==0)
                    {
                       
                        toastr.warning("Password update link send to registered mailid", "Notifications");
                        setTimeout(function(){ location.reload(); }, 3000);
                        // setTimeout(function(){ location.reload(); }, 500); 
                    }

                      if(data ==1)
                    {
                       
                        toastr.warning("failed to send mail", "Notifications");
                        setTimeout(function(){ location.reload(); }, 3000);
                        // setTimeout(function(){ location.reload(); }, 500); 
                    }

                    if(data ==2) 
                        {
                        toastr.warning("mail id is not match ", "Notifications");
                        setTimeout(function(){ location.reload(); }, 3000);
                     }

                    


                }
            });
            return false;
  

        } else {
          toastr.warning("not a valid mail id", "Notifications");
        }
        
      }) 

</script>