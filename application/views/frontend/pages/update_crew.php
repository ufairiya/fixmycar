<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .but_left {
            text-align: left;
            width: 100%;
        }
        .but_right {
            text-align: right;
              width: 100%;
        }
        
       .modal.in .modal-dialog {
            width: 1000px;
        }
        
        
        .butt_1 {
            margin-top: 30px;
              margin-right: 13px;
            width: 10%;
        }
        
    </style>

</head>



<body>

    <div class="modal-header">
        <span style="font-weight: bold;">Edit details</span>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <span style="border: 1px solid black;border: 10px; "></span>
    <div class="modal-body">
        <div class="row">

            <form id="update_crew" name="update_crew" enctype="multipart/form-data" method="post">
                <?php 
                // print_r($_POST);

                    foreach ($result_array as $value) {

                        // echo "<pre>"; print_r($value); echo "</pre>";
                        
                        $id =$value['id'];

                        $first_name=$value['first_name'];
                        $last_name=$value['last_name'];
                        $email=$value['email'];
                        $phone=$value['phone'];
                        $address=$value['address'];
                        $location=$value['location'];


                         $address_new=$this->db->query("SELECT * FROM movers_servicearea  Where area_id='$location'")->result_array();

                         // print_r( $address_new);
                    ?>

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-5">

                                    <label class="form-label">First name</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $first_name;?>" style="background-color: white;" required="">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-5">

                                    <label class="form-label">last name</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $last_name;?>" style="background-color: white;" required="">

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="col-md-6">
                            <div class="form-group">

                                <div class="col-sm-5">

                                    <label class="form-label">Email Address</label>
                                </div>
                                <div class="col-sm-7">

                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email;?>" >
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                         <div class="form-group">

                            <div class="col-sm-5">
                                <label class="form-label">Phone</label>
                            </div>
                            <div class="col-sm-7">

                                <input type="text" id="phone" name="phone" class="form-control"  placeholder="Enter phone number"
            value="<?php echo $phone;?>" style="background-color: white;" required="">
            <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
                            </div>
                            </div>
                        </div>

                    </div>

                     <div class="col-md-12">


                        <div class="col-md-6">
                         <div class="form-group">
                            <div class="col-sm-5">
                                <label class="form-label">Address</label>
                            </div>
                            <div class="col-sm-7">

                                <textarea class="form-control formdesignstyle add_123" name="address" id="address" value="<?php echo $address;?>" rows="2" cols="15" style="background-color: white;" required=""><?php echo $address;?></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="col-sm-5">
                                <label class="form-label">Location</label>
                            </div>
                            <div class="col-sm-7">
                                                                   


<select class="selected_country form-control formdesignstyle valid" name="location" id="location" style="font-size:15px;" required="" aria-invalid="false">
                       <?php 
// print_r($_SESSION);  
 $userid= $this->session->userdata('user_id'); 
 $user_details=$this->db->query("SELECT * FROM movers_servicearea where user_id ='".$userid."' ")->result_array(); 

  // print_r($user_details);
foreach ($user_details as $keyvalue) {
    $area_id = $keyvalue['area_id'];
    $user_id=$keyvalue['user_id'];
    $address = $keyvalue['address'];
if($area_id == $location){

    $selected = "selected";
}
else{$selected = '';}

  ?>
                                        <option value="<?php echo $area_id;?>" <?php echo $selected;?>> <?php echo $address;?></option>


<?php }?></select>
                          


 </div>

                        </div>






                            
                           

                    </div>
                    <?php
            }
            ?>





                        <div class="col-md-12">
                            <div class="col-md-6 but_left">
                             
                             <!--    <span style="position:relative;top:7px;"><button type="button" name="add" class="btn btn_login " >Cancel</button></span> -->
                               </div>

                            <div class="col-md-6 but_right">
                               
                                <button type="submit" name="add" class="btn btn_login  button_save butt_1"> Save</button>

                                <input type="hidden" id="update_save" name="update_save" value="<?php echo $id;?>" />
                                <input type="hidden" id="delete_row" name="delete_row" value="<?php echo $id;?>" />
                         
                        </div>
</div>
            </form>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    
</script>
<script type="text/javascript">
    jQuery("#update_crew").validate({

        submitHandler: function(form) {
            var id = '<?php echo $id;?>';
            var formData = new FormData(document.getElementsByName('update_crew')[0]);
            // formData.append('content', CKEDITOR.instances['content'].getData());
            // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/home/update_crew/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    // alert("ssssssss");

                     toastr.success("Updated Crew Member successfully", "Notifications");
                    setTimeout(function(){ location.reload(); }, 3000); 

                },
                complete: function(data) {
                    // alert('complete');

                    toastr.success("Updated   Crew Member successfully", "Notifications");
                     setTimeout(function(){ location.reload(); }, 3000); 
                }
            });
            //return false;
        }
    });
</script>
<script type="text/javascript">
    
</script>
<script>
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>