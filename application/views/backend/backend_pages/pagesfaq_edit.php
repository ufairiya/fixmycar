 <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- BEGIN CONTENT -->
<script type="text/javascript" src="<?php echo $base_url; ?>/assets/global/plugins/ckeditor/ckeditor.js"></script> 
     <script type="text/javascript"> 
    $(document).ready(function(){
     CKEDITOR.replace( 'post_content',
        {
            fullPage : true,
            uiColor : '#fffffff',
        });
   
 });
 
</script>
 <style>
  #post_status{ text-transform: capitalize; }
  .page-content{ min-height:1200px!important;  height: auto !important;}
  button.student_parent#update {
    background-color: #5E9E37 !important;
    color: #fff !important;}
    .page-content .panel-primary>.panel-heading {
    background-color: darkgrey;
    border-color: darkgrey !important;}
    .page-content .panel-primary { border-color: darkgrey !important;}



</style>

 <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
     <div class="page-content" style="height:auto;">
           <form action="<?php echo $base_url;?>admin/pages/editpagesfaq/<?php echo $page_details->ID;?>" class="form-horizontal1 validate1" target="_top" method="post"  enctype="multipart/form-data">
                        
   <div class="col-md-12 movers_form movers_profile" style="display:block">

        <div class="col-md-9"> 
            <div class="panel panel-primary">
                  <div class="panel-heading">
                     <div class="panel-title"> <b>Question:</b></div>
                  </div>
                  <div class="panel-body">
                      <div class="form-group col-md-12">
                         <input type="hidden" name="ID" value="<?php echo $page_details->ID;?>">
                         <input type="text" class="form-control" name="post_title" placeholder="Write Your Mail Subject" value="<?php echo $page_details->post_title;?>">
                      </div>
                  </div>
            </div>
 
            <div class="panel panel-primary">
                <div class="panel-heading">
                   <div class="panel-title">Answer:</div>
                </div>
                <div class="panel-body">
               
                     <div class="form-group">
                         <label for="subject"><b>Page Content:</b></label>  
                         <textarea name="post_content" id="post_content" placeholder="write_your_mail_content" class="post_content form-control" row="10"><?php echo $page_details->post_content; ?></textarea>                             
                     </div>
                   
                 </div>  
                </div>

              </div>

              <div class="col-md-3">
                   <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="panel-title">FAQ type</div>
                      </div>

                     <div class="panel-body">
                        <div class="col-md-12">
                          <select name="terms_Select" class="form-control" id="terms_Select">
                            <option name="terms_Select" value="">Select type</option>
                         <?php //print_r($term_details);
                         foreach($term_details as $terms){
                          $selected ='';
                           $termid = $terms->term_id;
                           $term_name = $terms->term_name;
                           if($termid == $parent_id) { $selected ='selected';}
                           echo '<option name="terms_Select" value="'.$termid.'" '.$selected.'>'.$term_name.'</option>';
                         }?>
                       </select>
                       </div><br/><br/>
                      
                    </div>
                 </div>
                 <div class="panel panel-primary">
                      <div class="panel-heading">
                          <div class="panel-title">Status</div>
                      </div>
                    <div class="panel-body">
                 <div class="col-md-12" style="margin-bottom:20px">
                        <select name="post_status" class="form-control" id="post_status">
                            <option name="terms_Select" value="">Select Status</option>
                             <?php //print_r($term_details);
                             $post_status = $page_details->post_status; 
                             $term_status = array('publish','draft');$term_status1 = array('Active','Inactive');
                             $i=0;
                         foreach($term_status as $terms){
                            $selected ='';
                            if($terms === $post_status) { $selected ='selected';}
                           echo '<option name="terms_Select" value="'.$terms.'" '.$selected.'>'.$term_status1[$i].'</option>';
                           $i++;
                         }?>
                          </select>
                     </div>
                     <div style="height:20px;"></div>
                                <button type="submit" class="btn btn-icon pull-right student_parent"  name="update" id="update" value="Update">Update</button>
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
                 url: "<?php echo BASE_URL; ?>/customer/customer_update_stlpswd/" +user_id, 
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