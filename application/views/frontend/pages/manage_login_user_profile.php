<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&libraries=places&callback=initAutocomplete"></script>

<div class="edit_manage_user">
<style type="text/css">
    label{color:#686868!important;font-size: 15px;}
     input[type=text], input[type=email], input[type=password]{background-color: white;}
     .form-control{height: 40px;margin-bottom: 13px;}

</style>

<section class="profile_edit_banner"> <img src="<?php echo $base_url;?>assets/front/images/contact/profile_edit.png" alt="Banner" style="max-height: 300px;width: 100%;">
        
    </section>
    
    <!--Contact area-->
    <section class="vendors">
        <div class="content-inner inner-bg inner_form_design page_stl">
            <div class="contact-box-title" style="border-top:0px;width: 100%;">
                
                <div class="title-text" style="color: gray;float: left;width: 50%;">
                    <h3 style="line-height: 0;">Edit profile</h3>
                    
                </div>
<div id="signup_message" style="width: 50%;float: right;background-color: green;">
        <?php 
 $this->session->flashdata('flash_message');

 $this->session->flashdata('error_message');
?>
</div>
            </div>
 
        <?php 


        $login_user_type = $this->session->userdata['user_type'];
        $curent_login_id = $this->session->userdata['user_id'];


$login_details = $this->db->query("SELECT * FROM user_master where id_user_master='".$curent_login_id."'");
$details = $login_details->result_array();
// print_r($details);


foreach ($details as $row) {


  ?>
  
            <form class="manage_profile_user" id="manage_profile_user" name="manage_profile_user" enctype="multipart/form-data" method="post">
            <input type="hidden" name="curent_login_id" value="<?php echo $curent_login_id;?>">
            <input type="hidden" name="update_profile_info" value="update_profile_info">

            <input type="hidden" name="old_id_proof" value="<?php echo $row['id_proof']; ?>">
            <input type="hidden" name="old_profile_image" value="<?php echo $row['profile_image']; ?>">
               
               <div class="col-md-6">
                       <label class="  ">Name</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $row['username'];?>"  readonly />

                </div>
                <div class="col-md-6">
                       <label class="  ">email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email'];?>"  readonly />
                        
                
                </div>
                 <div class="col-md-6">
                       <label class="  ">phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone'];?>"  required />
                        
                </div>
                <div class="col-md-6">
                       <label class="  ">address </label>
                       
                        <textarea rows="3" cols="50" id="address_customer" name="address" class="form-control"><?php echo $row['address'];?>
                        </textarea>
                    </div>
                     <!-- <div class="col-md-6 ">
                       <label class="  "> country</label>
                         <select class="selectcountry form-control" name="selectcountry" id="selectcountry"    style=" margin-bottom: 15px;" required>
                    <option value="">Select</option>
                  
                    <option value="usa" <?php if($row['country']=='usa') echo 'selected';?>>United States</option>
                    <option value="india" <?php if($row['country']=='india') echo 'selected';?>>India</option>
                    <option value="uk" <?php if($row['country']=='uk') echo 'selected';?>>United Kingdom</option>
                </select>
                        
                </div> 
                 <div class="col-md-6">
                       <label class=""> State</label>
                       <input type="hidden" class="hidden_city_value" value="<?php echo $row['state'];?> ">
                       <select id="select_city_value"  style=" margin-bottom: 15px;" name="select_city_value" class="form-control select_city_value" required>
                       
                        <option value="">select</option>
                </select>
                        
                </div> -->

                    
                
                

               
            <!--   <div class="col-md-6">

                                <label for="field-1" class=" control-label"><?php echo 'Photo';?></label>
                                
                               <div>
                                  <?php 
                                                $profile_image = getProfileImage();
// echo $profile_image;
                                                if( $profile_image != FALSE){?>
                                                 <img alt="" id="output" style="width:100px;height: 100px;"  src="<?php echo $base_url.$profile_image; ?>">
                                                <?php }else{ ?>
                                                <img alt="" id="output" style="width: 100px; height: 100px;" src="<?php echo $base_url;?>assets/images/profile_image.jpg">
                                                <?php }?>
                                             
                                            

                                  </div>
                                   <input type='file' name='userfile' onchange="loadFile(event)" style="color:gray;font-size: 15px;" />
                            </div>
                            <div class="col-md-6">
                

                                <label for="field-1" class=" control-label"><?php echo 'Photo';?></label>
                                
                               <div>
                                  <?php 
                                                $profile_image = getProfileuserid();

                                                if( $profile_image != FALSE){?>
                                                 <img alt="" id="output1" style="width:100px;height: 100px;"  src="<?php echo $base_url.$profile_image; ?>">
                                                <?php }else{ ?>
                                                <img alt="" id="output1" style="width: 100px; height: 100px;" src="<?php echo $base_url;?>assets/images/profile_image.jpg">
                                                <?php }?>
                                             
                                            

                                  </div>
                                   <input type='file' name='variousfiles' onchange="id_proof_file(event)" style="color:gray;font-size: 15px;" />
                            </div>
                            
 -->
          <div class="" >
      <br>
                    <button type="submit" class="update_vendor_stl btn login col-sm-offset-4 col-sm-3 " style="background-color: #00CACA;color:white;text-align: center;    margin-bottom: 30px;margin-top: 30px;"> Update Profile</button>
                    </div>
            </form>
  <?php echo form_close(); ?>


   <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
                   
                       <form class="manage_profile_password" id="manage_profile_password" name="manage_profile_password" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="curent_login_id" value="<?php echo $curent_login_id;?>">
                            <input type="hidden" name="update_profile_info" value="change_password">
                            <div class="current_password_stl" style="width: 100%;padding-bottom: 20px;clear: both;">
                                <label class="col-sm-3 control-label"><?php echo 'current password';?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" value="" required/>
                                </div><br>
                                </div>
                            <div class="current_password_stl" style="width: 100%;padding-bottom: 20px;">
                     
                                <label class="col-sm-3 control-label"><?php echo 'new password';?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="new_password" id="new_password" value="" required/>
                                </div><br>
                            </div>
                            <div class="current_password_stl" style="width: 100%;padding-bottom: 20px;">
                                <label class="col-sm-3 control-label"><?php echo 'confirm password';?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_new_password" value="" required/>
                                </div><br>
                            </div>
                            <div class="form-group update_prfile">
                              <div class="col-sm-offset-4 col-sm-5">
                                 
                    <button type="submit" class="btn   col-sm-8 " style="background-color: #00CACA;color:white;text-align: center;    margin-bottom: 30px;"> Update Password</button>
                    </div>
                              </div>

                                </div>
                       <?php echo form_close();?>
                      
                </div>
            </div>
         </div>        
<?php }?>
    </section>
</div>
 
<script type="text/javascript">
//       var loadFile = function(event) {
//     var output = document.getElementById('output');
//     output.src = URL.createObjectURL(event.target.files[0]);
//   };
//   //    var id_proof_file = function(event) {
//   //   var output = document.getElementById('output1');
//   //   output.src = URL.createObjectURL(event.target.files[0]);
//   // };
//   $(document).ready(function(){
//       var selectedCountry = $(".selectcountry option:selected").val();
//         $.ajax({
//             type: "POST",
//             url: "<?php echo $base_url;?>home/get_country",
//             data: { country : selectedCountry } 
//         }).done(function(data){
//             // $("#response").html(data);
//             jQuery('.select_city_value').html(data);
//                 // $("select.tb_yeargroup_id").select2({ dropdownParent: ".modal-body" });
//         });
//     $("select.selectcountry").change(function(){
//         var selectedCountry = $(".selectcountry option:selected").val();
//         $.ajax({
//             type: "POST",
//             url: "<?php echo $base_url;?>home/get_country",
//             data: { country : selectedCountry } 
//         }).done(function(data){
//             $("#response").html(data);
//             jQuery('.select_city_value').html(data);
    
//                 // $("select.tb_yeargroup_id").select2({ dropdownParent: ".modal-body" });
//         });
//     });
// });
</script>
<script type="text/javascript">
jQuery(document).ready(function(){

    //console.log("22222222222222222222222222");

     $("#manage_profile_user").validate({
        
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('manage_profile_user')[0]);
            console.log(formData);
            $.ajax({
                url: "<?php echo $base_url; ?>/home/manage_profile/"  , 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {

                    if(data==1){
                       window.setTimeout(function(){location.reload()},2000)
                      toastr.warning("Profile Updated successfully", "Notifications");
                      
                    }
                    if(data ==0) 
                        {
                        toastr.warning("Error in update profile", "Notifications");
                        window.setTimeout(function(){location.reload()},2000)
                     }
                    
                }
            });
            
        }
     });

     $("#manage_profile_password").validate({
        rules: {
            password:{required:true},
            new_password: {
                required: true,
                minlength: 5,
            },
            confirm_new_password: {
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
          confirm_new_password: {
            required: "Please provide a Confirm password",
            minlength: "Your Confirm password must be at least 5 characters long",
            equalTo: "Your Confirm password must be Equal to new password"
          },
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('manage_profile_password')[0]);
            console.log(formData);
            $.ajax({
                 url: "<?php echo $base_url; ?>/home/manage_profile/", 
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
})
    </script>

 <script type="text/javascript">
   function initialize() {
      var input = document.getElementById('address_customer');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.setComponentRestrictions(
            {'country': ['us','in']});
      
   }
   google.maps.event.addDomListener(window, 'load', initialize);


  
</script> 