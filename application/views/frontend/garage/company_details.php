<?php // echo "<pre>";print_r($UsercompanyDetails);echo "</pre>"; ?>
<div class="col-md-12 movers_form company_abt">
  <div class="col-md-12 movers_title">
      <div class="col-md-6">Company Details</div>
        <div class="col-md-6 text_right">
         <a href="<?php echo BASE_URL;?>/garage/edit_companydetails/<?php echo $user_id; ?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" data-keyboard="false" class="btn btn-theme-border float-right"><i class="fa fa-edit"></i> Edit </a>
          <!--  <button type="button" class="btn btn-theme-border float-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-edit"></i> Edit</button> -->
      </div>
    </div>
   <div class="col-md-12 stl_filter">
    <?php
     
     // foreach($UserDetails as $UserDetail) { ?>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Garage name:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->garage_name)?$UsercompanyDetails->garage_name:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Website:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->garage_website)?$UsercompanyDetails->garage_website:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Email:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->garage_email)?$UsercompanyDetails->garage_email:'';?> 
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
              <?php echo isset($UsercompanyDetails->garage_phone)?$UsercompanyDetails->garage_phone:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Address Line 1:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->address_line_1)?$UsercompanyDetails->address_line_1:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Address Line 2:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->address_line_2)?$UsercompanyDetails->address_line_2:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Post town :</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->posttown)?$UsercompanyDetails->posttown:'';?> 
            </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Country:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->country)?$UsercompanyDetails->country:'';?> 
            </p>
        </div>
      </div>
    </div>
      <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <label class="control-label ">Eir code:</label>
        </div>
        <div class="col-md-6">
            <p class="form-control-static">
              <?php echo isset($UsercompanyDetails->eir_code)?$UsercompanyDetails->eir_code:'';?> 
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
     
  <!--   <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <label class="control-label ">Garage Image:</label>
        </div>
        <div class="col-md-12">
             
              <?php $garage_photos = $UsercompanyDetails->garage_photos;
              $images = explode(',',$garage_photos);
              foreach( $images as $data)
              {
                 ?>
                 <div class="col-md-3">
                  <img src="<?php echo BASE_URL.'/'.$data;?>" width="150px" alt="Profile image">
                </div>
                 <?php 
              }
              ?>
              
            
        </div>
      </div>
    </div> -->
 </div>

<div style="clear: both;"></div>
  </div>
<div style="clear: both;"></div>
<div class="col-md-12 movers_form company_abt">
  <div class="col-md-12 movers_title">
      <div class="col-md-6">Garage Gallery</div>
        <div class="col-md-6 text_right">
         <a href="<?php echo BASE_URL;?>/garage/upload_cust_po/<?php echo $user_id; ?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" data-keyboard="false" class="btn btn-theme-border float-right"><i class="fa fa-edit"></i> Edit </a>
          <!--  <button type="button" class="btn btn-theme-border float-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-edit"></i> Edit</button> -->
      </div>
    </div>
      <div class="col-md-12">
        <?php //print_r($UsergarageimageDetails);?>
        <?php if(!empty($UsergarageimageDetails))
          {foreach($UsergarageimageDetails as $data)
        {
             $id = $data->image_id ;
             $cutomer_polink = $data->cutomer_polink ;
             echo '<div class="col-md-3"><img src="'.BASE_URL.'/'.$cutomer_polink.'"><button type="button" style="background-color: red;    position: absolute;color: white;font-weight: bold;    padding: 0px 4px;height: 20px;" class="btn delete_btns" onclick="delete_values('.$id.')">X</button></div>';
        }}?>
      </div>
  </div>
  <div style="clear: both;"></div>
<div class="col-md-12 movers_form company_abt">
  <div class="col-md-12 movers_title">
      <div class="col-md-6">About Us</div>
      <div class="col-md-6 text_right">
         <a href="<?php echo BASE_URL;?>/garage/edit_companyabt/<?php echo $user_id; ?>" data-target="#ajax" data-toggle="modal" data-backdrop="static"  data-backdrop="static" data-keyboard="false" class="btn btn-theme-border float-right"><i class="fa fa-edit"></i> Edit </a>
          <!--  <button type="button" class="btn btn-theme-border float-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-edit"></i> Edit</button> -->
      </div>
  </div>
	<div class="col-md-12">
    <?php
   // echo "<pre>";print_r($UserAbtDetails);echo "</pre>";
    if($UserAbtDetails) {  ?>
		<div class="col-md-12">
			<div class="row">
        <p> <?php echo htmlspecialchars_decode($UserAbtDetails->content); ?></p>
      </div>
		</div>

  <?php } 
  else {
    echo "<p>No content found</p>";
  } ?>
	</div>
</div>
<br><br>
<div class="col-md-12 movers_form">
  <div class="col-md-12 movers_title">
      <div class="col-md-6">Working Hours</div>
      <div class="col-md-6 text_right">
          <a href="#" class="btn btn-theme-border float-right btn_savedays"><i class="fa fa-save"></i> Save </a> 
          <!--  <button type="button" class="btn btn-theme-border float-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-edit"></i> Edit</button> -->
      </div>
  </div>
  <div class="col-md-12">
    <?php
   // echo "<pre>";print_r($UserdaysDetails);echo "</pre>";

    $available_days = array();
    if($UserdaysDetails) {
      //$aday=0;
      foreach($UserdaysDetails as $UserdaysDetail)
      {
        $day_value = $UserdaysDetail->day_value;
        $start_time = $UserdaysDetail->start_time;
        $end_time = $UserdaysDetail->end_time;
        $status = $UserdaysDetail->status;
        $available_days[$day_value] = array('day_value' => $day_value,'start_time' => $start_time,'end_time' => $end_time,'status' => $status  );
       // $aday++;

      }
    }
    $Days_array = json_decode(Days_array);
    if($Days_array)
    {
      $count = 0;
      echo "<form class='movers_days' name='movers_days'><input type='hidden' name='user_id' value='".$user_id."'><table class='table day_table'><thead><tr><td>Days</td><td>Start Time</td><td>End Time</td></tr></thead><tbody>";
      foreach($Days_array as $daykey=>$dayval)
      {
        if(array_key_exists($daykey,$available_days))
        {
          $day_status = $available_days[$daykey]['status'];
          $start_time = $available_days[$daykey]['start_time'];
          $end_time = $available_days[$daykey]['end_time'];
          ($day_status == '1')?$checkbox = 'checked':$checkbox = '';

        }
        else
        {
          $start_time = '';
          $end_time = '';
          $checkbox  = '';
        }
        echo "<tr class='timeOnlyExample'>
          <td>
            <div class='checkbox stl_checkbox'>
              <label>
                <input type='checkbox' name='dayvalues[".$count."][dayval]' value='".$daykey."' ".$checkbox.">".$dayval." 
                <span class='stl_checkmark'></span>
              </label>
            </div>
          </td>
          <td>
            <input type='text' class='form-control time start'    data-time-format='H:i' data-step='60' data-min-time='00:00' data-max-time='23:00' data-show-2400='true' name='dayvalues[".$count."][start_time]' value='".$start_time."'>
          </td>
          <td>
            <input type='text'   data-time-format='H:i' data-step='60' data-min-time='00:00' data-max-time='23:00' data-show-2400='true' class='form-control time end' name='dayvalues[".$count."][end_time]' value='".$end_time."'>
          </td>
        </tr>";
        $count++;
      }
      echo "</tbody></table></form>";
    }
  else {
    echo "<p>No Days found</p>";
  } ?>

<!--   <p class="timeOnlyExample">
                    <input type="text" class="time start" /> to
                    <input type="text" class="time end" />
                </p> -->

  </div>
</div>

 


 

<link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/global/plugins/jquery-timepicker/jquery.timepicker.css" />

<!-- <script type="text/javascript" src='<?php echo BASE_URL;?>assets/global/plugins/jquery-timepicker/jquery.timepicker.js'></script> -->

<!-- <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/global/plugins/jquery-ui/jquery-ui.min.css"> -->


<script type="text/javascript">
  function delete_values(id )
  {
     $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/delete_garage_images?id="+id, 
                type: "POST", 
                success: function(data) {
                 if(data =='1')
                    {
                        toastr.options = {
                    "closeButton": true,
                  }
                  toastr.success(" Deleted successfully", "Notifications");
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
  }
  jQuery(document).ready(function(){


 jQuery('.timeOnlyExample .time').timepicker(
                    // 'showDuration': true,
                    // 'timeFormat': 'g:ia'
                );


   jQuery("#ajax").on("hidden.bs.modal", function(){

    jQuery(this).find(".modal-content").html("");
     });

              });


  jQuery(document).on('click','.btn_savedays',function(){
    var formData = new FormData(document.getElementsByName('movers_days')[0]);
    $.ajax({
                url: "<?php echo BASE_URL; ?>/garage/update_movers_days", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);
                    if(data =='1')
                    {
                        toastr.options = {
                    "closeButton": true,
                  }
                  toastr.success("Working days and hours updated successfully", "Notifications");
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

  });

    jQuery(document).on('click','.btn_saverates',function(){
    var formData = new FormData(document.getElementsByName('movers_rates')[0]);
    $.ajax({
                url: "<?php echo BASE_URL; ?>/movers/update_movers_rate", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);
                    if(data =='1')
                    {
                        toastr.options = {
                    "closeButton": true,
                  }
                  toastr.success("Movers rate updated successfully", "Notifications");
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

  });




</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&sensor=false&libraries=places'></script>



<!-- hemalatha  -->

<style type="text/css">
  
</style>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>  
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function delete_movers_rate(userid)
{
  //alert(userid);

swal({
  title: "Are you sure? Want to delete !",
  // text: "Want to confirm the user !",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Confirm!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax(
                    {
                        type: "post",
                        url: "<?php echo BASE_URL;?>/movers/delete_movers_rate_stl/"+userid,
                        data: "userid="+userid,
                       dataType: 'json',
                    success: function(response)
                    { 

                 }
                    })

    swal("Deleted Successfully!");
setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 2000);
  } else {
    swal("Cancelled");
  }

});


}


function delete_service_area(area_id)
{
  // alert(area_id);

swal({
  title: "Are you sure? Want to delete !",
  // text: "Want to confirm the user !",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, Confirm!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
     $.ajax(
                    {
                        type: "post",
                        url: "<?php echo BASE_URL;?>/movers/delete_movers_service_areas/"+area_id,
                        data: "area_id="+area_id,
                       dataType: 'json',
                    success: function(response)
                    { 

                 }
                    })

    swal("Deleted Successfully!");
setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 2000);
  } else {
    swal("Cancelled");
  }

});


}

  
</script>
<style type="text/css">
  .sweet-alert h1{font-size: 20px;}
  .sweet-alert h2{font-size: 20px;}
</style>