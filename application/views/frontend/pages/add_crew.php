<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .add_text {
            position: relative;
            left: 4px;
        }
        
        .loc_1 {
            font-family: 'Proxima Nova', sans-serif;
        }
        
        .form-control {
            height: 40px;
        }
        
        .but_left {
            text-align: left;
            width: 15%;
        }
        
        .but_right {
            text-align: right;
            width: 100%;
        }
        
       
        
        .butt_1 {
            margin-top: 30px;
            margin-right: 13px;
            width: 10%;
        }
        
        .modal.in .modal-dialog {
            width: 1000px;
        }
        
        .inp_txt {
            background: transparent;
            padding: 18px 10px;
            height: 35px;
            width: 10%;
            margin-bottom: 13px;
        }
    </style>

</head>

<body>

   <div class="modal-header">
        <span style="font-weight: bold;">Fill basic details</span>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <span style="border: 1px solid black;border: 10px; "></span>
    <div class="modal-body">
        <form id="add_crew" name="add_crew" enctype="multipart/form-data" method="post" >
         <input type="hidden" name="current_user" id="current_user" value="<?php echo $current_user;?>">
            <div class="row">

                <div class="main_1">
                    <div class="col-md-12">
                        <!-- lo -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-5">

                                   <label class="form-label">First name</label> </div>
                                <div class="col-sm-7">
                                    <input type="text" id="fname" name="fname" class="form-control input-sm  inp_txt" placeholder="First Name" style="background-color: white;" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-5"><label class="form-label">Last Name</label></div>
                                <div class="col-sm-7">
                                    <input type="text" id="lname" name="lname" class="form-control input-sm  valid inp_txt" placeholder="Last Name" style="background-color: white;" required="">
                                </div>
                            </div>
                        </div>
                        </div>


                        <!-- <div class="col-md-6">
                      <div class="col-md-6"></div>
                       <div class="col-md-6"></div>
                       </div> -->
                        <!-- first -->

                        <div class="col-md-12">

                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="col-sm-5">

                                        <label class="form-label">Email Address</label></div>
                                    <div class="col-sm-7">

                                        <input type="email" id="email" name="email" class="form-control input-sm inp_txt" placeholder="Email" style="background-color: white;" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-5"><label class="form-label">Phone</label></div>
                                <div class="col-sm-7">
                                    <input type="text" id="phone" name="phone"  placeholder="Enter phone number"
           class="form-control input-sm inp_txt"  style="background-color: white;" required="" >
            <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="col-md-6">
                                <div class="col-sm-5">
                                   <label class="form-label">Address</label> </div>
                                <div class="col-sm-7">
                                    <textarea class="form-control formdesignstyle add_123" name="address" id="address" placeholder="enter your address" rows="2" cols="20" style="font-size:13px;    " required=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-5 loc_1 "><label class="form-label">Location</label> </div>
                                    <div class="col-sm-7">
                                        <select class="selected_country form-control formdesignstyle valid"  name="location" id="location" style="font-size:15px;" required="" aria-invalid="false">
                                            <?php 

                                                foreach ($location_results as $keyvalue) {
                                                    $user_id=$keyvalue['user_id'];
                                                    $address = $keyvalue['address'];
                                                    $area_id = $keyvalue['area_id'];

                                            ?>
                                            <option value="<?php echo $area_id;?>" data-id="<?php echo $area_id;?>"> <?php echo $address;?></option>


                                            <?php } ?>
                                        </select>
                                     </div> 
                             </div>
                            <!-- <div class="col-md-6">
                                <div class="col-sm-5"><label class="form-label">Zip</label> </div>
                                <div class="col-sm-7">

                                    <input type="text" id="zip" name="zip" class="form-control inp_txt" placeholder="Zip" style="background-color: white;" required="">
                                </div>
                            </div> -->
                        </div>

                        <!-- <div class="col-md-12">
                            <div class="col-md-6">

                                <div class="col-sm-5"><label class="form-label">City</label></div>
                                <div class="col-sm-7">
                                    <input type="text" id="city" name="city" class="form-control inp_txt" placeholder="City" style="background-color: white;" required="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-sm-5"><label class="form-label">state</label></div>
                                <div class="col-sm-7">
                                    <input type="text" id="state" name="state" class="form-control inp_txt" placeholder="state" style="background-color: white;" required="">
                                </div>
                            </div>
                        </div> -->

                        <div class="col-md-12">

                           
                                <!-- <div class="col-md-6">
                                    <div class="col-sm-5 loc_1 "><label class="form-label">Location</label> </div>
                                     <div class="col-sm-7">
                                        <select class="selected_country form-control formdesignstyle valid"  name="location" id="location" style="font-size:15px;" required="" aria-invalid="false">
                                            <?php 

                                                foreach ($location_results as $keyvalue) {
                                                    $user_id=$keyvalue['user_id'];
                                                    $address = $keyvalue['address'];
                                                    $area_id = $keyvalue['area_id'];

                                            ?>
                                            <option value="<?php echo $area_id;?>" data-id="<?php echo $area_id;?>"> <?php echo $address;?></option>


                                        <?php } ?>
                                        </select>
                                    

                                   
                                        </div> 
                             </div> -->
                            <div class="col-md-6">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-7">
                                    <!-- <input type="text" id="state" name="state" class="form-control inp_txt" placeholder="Phone" style="background-color: white;" required=""> -->
                                </div>
                            </div>

                        </div>



                        <div class="col-md-12">
                            <div class="col-md-6 but_left">

                               <!--  <button type="submit" class="btn btn-theme">Save</button> -->
                            </div>

                            <div class="col-md-6 but_right">
                               <button type="submit" class="btn btn_login  button_save butt_1 ">Save</button>
                               <!-- <button type="submit" name="add" class="btn btn_login  button_save butt_1"> Save</button> -->
                            </div>

                        </div>
                    </div>

                </div>

            </div>
           
        </form>
        </span>
</body>

</html>

<input type="hidden" name="service_id" value="">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->



<script type="text/javascript">

    jQuery("#add_crew").validate({


        //alert('sssssssssssssssss');
        debug: true,
        rules: {

            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                
            },
            address: {
                required: true,
            },

            // city: {
            //     required: true,
            // },
            // state: {
            //     required: true,
            // },
            // zip: {
            //     required: true,
            // }
        },

        messages: {
            fname: "please enter First Name",
            lname: "please enter Last Name",
            email: "please enter Email",
            phone :"please enter Valid mobile number",
            // state: "please enter state",
            // city: "please enter city",
            // zip: "please enter zip"
        },

        submitHandler: function(form) {
        

            var formData = new FormData(document.getElementsByName('add_crew')[0]);
      
           
            // formData.append('content', CKEDITOR.instances['content'].getData());
            // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo BASE_URL; ?>/home/add_new",
                type: "POST",
                //data: {"service_id":service_id},
                data:formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data) {
                    if(data =='1')
                    {
                        
                  toastr.success("Added New crew member successfully", "Notifications");
                   setTimeout(function(){ location.reload(); }, 2000); 
                    }
                    else
                    {
                     
                  toastr.warning("Email id already exist", "Notifications");

                    }
                },
                
            });
            //return false;
        }
    });


    
</script>
<!-- auto fill address -->
<script>
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>