

<div class="vendors vendors_stl_option">
<style type="text/css">
    label{color:#686868!important;font-size: 15px;}
     input[type=text], input[type=email], input[type=password]{background-color: white;}
     .form-control{height: 40px;}
     .alert-success,.alert-danger{
     font-weight: bold;
    margin-bottom: 0px;
    height: 40px;
    line-height: 16px;}
    .loaderstl{padding-left: 5px;}
    #userfile-error, #variousfiles-error{width: 50%;}
    .create_moverssss{background-color: #00CACA;color:white;text-align: center;margin-top: 20px;font-weight: bold;}
    .inst{
      padding: 10px; 
    }
</style>


<section class="vendor_login_banner"> <img src="<?php echo $base_url;?>assets/front/images/contact/banner.png" alt="Banner">
        <!-- <div class="banner-inner text-center">
            <div class="content">
                <p>HAVE QUESTIONS?
                    <br> WE'VE GOT ANSWERS. </p>
                <div class="">
                    <p>Get answers to your questions from our Customer Happiness Team. Five ways to get in touch!</p>
                </div>
            </div>
        </div> -->
    </section>
    
    <!--Contact area-->
    <section class="vendors">
        <div class="content-inner inner-bg inner_form_design">
            <div class="" >
                
                <div class="title-text" >
                    <h3 style=>Movers Registration</h3>
                    
                </div>
               
            </div>
            <div class="inst">
                 <span> We are a marketplace that sends you actual orders not time wasting leads. Search results will show your company name, reviews, service area, and prices. You can set your own rates, availability, and service area. Our fees include $50 per order +5% of everything over $250. If you use your Direct Book URL you only pay $25 per order +5% of everything over $250. 
                   If you don't like the marketplace you can quit at anytime, no fees involved. </span>
            </div>
            <form class="vendors_page" id="vendr_login" name="vendr_login" enctype="multipart/form-data" method="post">
             
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">First name&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="text" id="first_name" name="first_name" class=" form-control" placeholder="First name"  required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Last name&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name"  required />
                      </div>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Email&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="email" id="email_mover" name="email_mover" class=" form-control" placeholder="Email"  required/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Company name&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="text" id="company_name" name="company_name" class=" form-control" placeholder="company name"  required />
                      </div>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="col-md-6 ">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Password&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="password" id="password" name="password" class=" form-control" placeholder="password"  required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Confirm password &nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="password" id="confirm_pass" name="confirm_pass" class=" form-control" placeholder="Confirm password"  required />
                      </div>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Director phone no&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="text" id="phone" name="phone" class=" form-control" placeholder="Director phone number"  required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Year founded&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                         <input type="text" id="year_found" name="year_found" class=" form-control" placeholder="Year founded"  required />
                      </div>
                    </div>
                  </div>
                  <div style="clear: both;"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Address &nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                          <textarea name="address_mover" id="movers_address" class="form-control address" style="background-color: white;" placeholder="enter your address"></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="form-label">country&nbsp;*</label>
                      </div>
                      <div class="col-md-8">
                         <select class="country form-control" name="country" id="country" style="background-color: white;" required>
                              <option>Select</option>
                              <option value="usa" selected>United States</option>
                              <option value="india">India</option>
                              <option value="uk">United Kingdom</option>
                          </select>
                      </div>
                    </div>
                  </div> -->
                  <div style="clear: both;"></div>
                  <!-- <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label class="form-label">state&nbsp;*</label>
                      </div>
                      <div class="col-md-8">
                        <select id="state"  id="state" style="background-color: white;" name="state" class="form-control state  form-control" required>
                       
                            <option value="">select</option>
                        </select>
                      </div>
                    </div>
                  </div> -->
                  
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">Photo&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                        <div class="fileinput-new thumbnail" style="max-width: 140px; max-height: 120px;" data-trigger="fileinput">
                              <img id="getuserfiles_output" style="width:140px;height: 120px;background-color: white;" />
                        </div>

                        <input type='file' name='userfile' id="movers_files"  style="color:gray;font-size: 15px;" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-sm-12 ">
                        <label class="form-label">ID Proof&nbsp;*</label>
                      </div>
                      <div class="col-sm-12 ">
                          <div style="max-width: 200px; max-height: 120px;background-color: white;    border: 1px solid lightgray;" class="preview_id_file">
                            <iframe id="movers_id"  frameborder="0" scrolling="yes" style="max-width: 200px; max-height: 120px;background-color: white;border: 0.5px solid gray;" ></iframe>
                          </div>  
                          <input id="uploadmovers_pdf" type="file" style="color: gray;font-size: 15px;"  onchange="PreviewImagefile();" name="variousfiles" required />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                  <br>

                  <b>Note:</b>
                   <span>
                    We require you provide proof of valid insurance, and business licenses or DOT # if applicable.
                     </span>
                  </div>
                  <div class="col-sm-12">
                  <br><input type="checkbox" name="check-value" required="" />
                  <span>I agree to Terms & Conditions of this website. I also agree that I follow any laws and regulations required and I have insurance that covers any damages.</span>
                    
                  </div>

                  <div style="clear: both;"></div>
                  <div class="col-md-12 ">

                    <button type="submit" class="btn login col-sm-offset-4 col-sm-3 create_moverssss" style=""><span> Create vendor</span> <i class="loaderstl fa fa-spinner fa-spin"></i></button>
                  </div>



                </div>



                
            </form>
 
            
                      
            
         </div>        

    </section>
</div>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&libraries=places&language=en-AU"></script>
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU;libraries=places;callback=initAutocomplete"></script> -->
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#movers_address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
  
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->

<script type="text/javascript">

  //     var getuserfiles = function(event) {
  //   var output1 = document.getElementById('getuserfiles_output');
  //   output1.src = URL.createObjectURL(event.target.files[0]);
  // };
  //    var getuserproof = function(event) {
  //   var output2 = document.getElementById('getuserproof_output');
  //   output2.src = URL.createObjectURL(event.target.files[0]);
  // };


document.getElementById("movers_files").onchange = function () {
    if (this.value.match(/\.(jpeg|bmp|jpg|gif|png)$/)) {
        // document.getElementById("profie_picture").value = this.value;
         // $('#output1').css('display','block');
    var output2 = document.getElementById('getuserfiles_output');
    output2.src = URL.createObjectURL(event.target.files[0]);
    } else {
        this.value = "";
        alert("selected file Must be a jpeg or jpg or gif or png.");
    }
};



 function PreviewImagefile() {
                $('.preview_id_file').css('display','block');
                pdffile=document.getElementById("uploadmovers_pdf").files[0];
                pdffile_url=URL.createObjectURL(pdffile);

                $('#movers_id').attr('src',pdffile_url);
       
            }

// $('.vendors_page').on('submit', function (e) {

//           e.preventDefault();

// var password= $('#password').val();
// var confirm_pass = $('#confirm_pass').val();
// if(password == confirm_pass){
//     $.ajax({
//             type: 'POST',
//             url: '<?php echo $base_url; ?>home/mover_details',
//             data: $('form').serialize(),
           
//           });
// }
// else{
//     alert('password mis match');
// }
 

// });


// })

   

// function readURL(input) {
//             if (input.files && input.files[0]) {
//                 var reader = new FileReader();

//                 reader.onload = function (e) {
//                     $('#blah')
//                         .attr('src', e.target.result);
//                 };

//                 reader.readAsDataURL(input.files[0]);
//             }
//         }
jQuery(document).ready(function(){
$('.loaderstl').hide();
     jQuery("#vendr_login").validate({
         debug: true,
        rules: {
             address_mover:{required:true,},
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email_mover: {
                required: true,
                email: true
            },
            // state: {
            //     required: true,
            // },
            password: {
                required: true,
                minlength: 5
            },
            confirm_pass: {
                required: true,
                minlength: 5,
                equalTo : "#password"
            },
            company_name: {
                required:true,
            },
            // country :{
            //     required:true,
            // },
            phone: {
                required:true,
               
            },
            year_found: {
                required:true,
            },
         

        },
        messages: {
          first_name: "Please enter your firstname",
          last_name: "Please enter your lastname",
          email_mover: "Please enter your Email ID",
          // state: "Please select any state",
          phone:{
           required: "Please enter your Mobile Number",

       },
       address_mover:{required:"Enter your address"},
          password: {
            required: "Please provide a password",
            minlength: " password must be at least 5 characters long"
          },
          confirm_pass: {
            required: "Please provide a Confirm password",
            minlength: " Confirm password must be at least 5 characters long",
            equalTo: " Confirm password must be Equal to password"
          },
          company_name: { required: "Please provide a company name"},
          // contry : { required: "Please select any country"},
          phone: {required:"Please provide contact number"},
          year_found: { required:"Please provide year found"},
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('vendr_login')[0]);
            $('#address_mover').prop("required", true);
            // $('.vendors_page').hide();
            $('.loaderstl').show();
            $.ajax({
                url: "<?php echo $base_url; ?>home/mover_details", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                    // $('#signup_loading').hide();
                    //  $('#signup_message').show();
                    // $("#signup_message").html(data.message);
                     $('.loaderstl').hide();
                    if(data['success_status'] =='1')
                    {
                        $('#vendr_login')[0].reset();
                       
                         toastr.success("Details Registered successfully.You can login after admin approval.", "Notifications");
                         setTimeout(function(){
                         window.location.href = "<?php echo $base_url;?>";
                      },4000)

                    }
                     if(data['success_status'] =='0')
                    {
                      
                       toastr.success("Mail id already exists.", "Notifications");
                       
                    }
                   

                }
            });
            return false;
            
        }
     });
   
})

// jQuery(document).ready(function(){
//    $('#signup_message').hide();
//     var selectedCountry = $(".country option:selected").val();
//         $.ajax({
//             type: "POST",
//             url: "<?php echo $base_url;?>home/get_country",
//             data: { country : selectedCountry } 
//         }).done(function(data){
           
//             jQuery('.state').html(data);
//                 // $("select.city").select2({ dropdownParent: ".modal-body" });
//         });
//     jQuery("select.country").change(function(){
//         var selectedCountry = $(".country option:selected").val();
//         $.ajax({
//             type: "POST",
//             url: "<?php echo $base_url;?>home/get_country",
//             data: { country : selectedCountry } 
//         }).done(function(data){
           
//             jQuery('.state').html(data);
//                 // $("select.city").select2({ dropdownParent: ".modal-body" });
//         });
//     });
// });
    </script>
  <script type="text/javascript">
           

            // var autocomplete1 = new google.maps.places.Autocomplete($("#address_mover")[0], {});

            // google.maps.event.addListener(autocomplete1, 'place_changed', function() {
            //     var place = autocomplete1.getPlace();
            //     console.log(place.address_components);
            // });
           
        </script>
