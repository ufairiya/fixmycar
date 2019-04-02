<style type="text/css">
</style>
<?php 
$arrival_time='';
$mover_id='';
foreach ($order_results as $values) {

	 $move_date =$values['move_date'];
	 $arrival_time =$values['arrival_time'];
   $mover_id = $values['mover_id'];
}



$move_date_dispay_format =date('l, F jS Y',strtotime($move_date));
?>
  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
    </div>
        <div class="modal-body">

        <div class="row">
         <div class="col-md-12">
      		 <div class="heading_style">
                <h3>ORDER #<?php echo  $orderid;?></h3>
              </div>

              <div class="col-md-12">
                  <span class="Suggest_time">Suggest Different Time Or Date</span>

                  <p class="schedule_begin"> This move is currently scheduled to begin: <b><?php echo $move_date_dispay_format?>,<?php echo $arrival_time;?>. </b></p> 
                  <div class="Note_session_border_design">
                    <p class="schedule_begin"> <b>Note:</b> If you are unavailable during the original scheduled time call the movers first to discuss alternate timing. After a date/time has been discussed you may send a request using this form. You will get a confirmation regarding your request. HireMovers does not receive this request and will not call the movers to reschedule.</p>
                  </div>
                </div>


          
                  
                      <div class="col-md-6"> <span  class="Suggest_time">Alternate date:</span>
                             <br>
                       <?php
 // $Date = $move_date;
 // echo date('m/d/Y', strtotime($Date. ' - 1 days'));
 // echo date('m/d/Y', strtotime($Date. ' + 2 days'));

?>




                      <select class="form-control" name="alternate_date" id="alternate_date">
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' - 3 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' - 3 days'));?>(3 day Before)</option>
                           <option value="<?php echo date('m/d/Y', strtotime($move_date. ' - 2 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' - 2 days'));?>(2 day Before)</option>
                            <option value="<?php echo date('m/d/Y', strtotime($move_date. ' - 1 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' - 1 days'));?>(1 day Before)</option>                        
                          <option value="<?php echo date('m/d/Y', strtotime($move_date));?>" selected><?php echo date('m/d/Y', strtotime($move_date));?>(Same day)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 1 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 1 days'));?>(1 day After)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 2 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 2 days'));?>(2 days After)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 3 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 3 days'));?>(3 days After)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 4 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 4 days'));?>(4 days After)</option>
                          <option <?php echo date('m/d/Y', strtotime($move_date. ' + 5 days'));?>><?php echo date('m/d/Y', strtotime($move_date. ' + 5 days'));?>(5 days After)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 6 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 6 days'));?>(6 days After)</option>
                          <option value="<?php echo date('m/d/Y', strtotime($move_date. ' + 7 days'));?>"><?php echo date('m/d/Y', strtotime($move_date. ' + 7 days'));?>(7 days After)</option>
                      </select>

                      </div>
                      <div class="col-md-6"><span  class="Suggest_time">Alternate arrival window: </span>
                           <br>
                       <!-- <select class="form-control" name="alternate_arr_time" id="alternate_arr_time">
                                      <option value="Arrival Between 5 AM - 6 AM" <?php if( $arrival_time =='Arrival Between 5 AM - 6 AM') { echo "selected";} else { echo "";} ?> >Arrival Between 5 AM - 6 AM</option>

                                      <option value="Arrival Between 6 AM - 7 AM"  <?php if( $arrival_time =='Arrival Between 6 AM - 7 AM') { echo "selected";} else { echo "";} ?>  >Arrival Between 6 AM - 7 AM</option>

                                      <option value="Arrival Between 7 AM - 8 AM" <?php if( $arrival_time =='Arrival Between 7 AM - 8 AM') { echo "selected";} else { echo "rr";} ?> >Arrival Between 7 AM - 8 AM</option>

                                      <option value="Arrival Between 8 AM - 9 AM" <?php if( $arrival_time =='Arrival Between 8 AM - 9 AM') { echo "selected";} else { echo "";} ?> >Arrival Between 8 AM - 9 AM</option>

                                      <option value="Arrival Between 9 AM - 10 AM" <?php if( $arrival_time =='Arrival Between 9 AM - 10 AM') { echo "selected";} else { echo "";} ?> >Arrival Between 9 AM - 10 AM</option>

                                      <option value="Arrival Between 10 AM - 11 AM" <?php if( $arrival_time =='Arrival Between 10 AM - 11 AM') { echo "selected";} else { echo "";} ?> >Arrival Between 10 AM - 11 AM</option>

                                      <option value="Arrival Between 11 AM - 12 PM" <?php if( $arrival_time =='Arrival Between 11 AM - 12 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 11 AM - 12 PM</option>

                                      <option value="Arrival Between 12 PM - 1 PM" <?php if( $arrival_time =='Arrival Between 12 PM - 1 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 12 PM - 1 PM</option>

                                      <option value="Arrival Between 1 PM - 2 PM" <?php if( $arrival_time =='Arrival Between 1 PM - 2 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 1 PM - 2 PM</option>

                                      <option value="Arrival Between 2 PM - 3 PM" <?php if( $arrival_time =='Arrival Between 2 PM - 3 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 2 PM - 3 PM</option>

                                      <option value="Arrival Between 3 PM - 4 PM" <?php if( $arrival_time =='Arrival Between 3 PM - 4 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 3 PM - 4 PM</option>

                                      <option value="Arrival Between 4 PM - 5 PM" <?php if( $arrival_time =='Arrival Between 4 PM - 5 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 4 PM - 5 PM</option>

                                      <option value="Arrival Between 5 PM - 6 PM" <?php if( $arrival_time =='Arrival Between 5 PM - 6 PM') { echo "selected";} else { echo "";} ?> >Arrival Between 5 PM - 6 PM</option>
                      </select> -->
                      <select class="form-control alternate_arr_time" name="alternate_arr_time" id="alternate_arr_time" >
                          <option value="">Select arrival time</option>   
                      </select>
                      </div>

                      <div class="col-md-12">
                      <span  class="Suggest_time">Add a Note to the Request</span>
                      <textarea  rows="5"  class="form-control notes_request" name="notes_request"></textarea>
                      </div>

                      <div class="col-md-12 align_right">

                      <button type="button" class="btn btn-danger dontchange"><i class="fa fa-remove"></i>&nbsp;DON'T CHANGE</button> 
                       <button type="button" class="btn btn-success reschedule_request"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;SEND REQUEST</button>
                        
                      </div>
                

                  </div>
            </div>

 

     </div>
     



<script type="text/javascript">

 // jQuery('<div id="reschedule" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#ajax_modalh");
 //  jQuery('<div id="cancelorder" class="modal fade" role="dialog" ><div class="modal-dialog"><div class="modal-content"></div></div></div>').insertAfter("#reschedule");


</script>



   <script type="text/javascript">
     
       jQuery(document).on("click",".dontchange",function()
    {
       jQuery('#reschedule_customer').modal('hide');

    });


      jQuery(document).on("click",".reschedule_request",function()
{

  var order_id ='<?php echo  $orderid?>';
  var alternate_date =jQuery("#alternate_date option:selected").val();
  var alternate_arr_time =jQuery("#alternate_arr_time option:selected").val();
var notes_request = jQuery('.notes_request').val();
  //alert(alternate_date + alternate_arr_time );
// if(alternate_date!='' || alternate_arr_time!='' || notes_request!=''){
   $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/reschedule_request_customer", 
                type: "POST",             
                data: {'order':order_id,'alternate_date':alternate_date,'alternate_arr_time':alternate_arr_time,'notes_request':notes_request},             
                dataType:'json',    
                success: function(data) {
                
              if(data==0){
                toastr.success("Reschedule request mail send successfully", "Notifications");
               //  toastr.success("Service area updated successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 3000); 
              }
              if(data==1){
                toastr.success("Same time and same date  is requested ", "Notifications");
              }
}
                // }, complete: function(data) {
              
                //    toastr.success("Reschedule request mail send successfully", "Notifications");
                //   // setTimeout(function(){ location.reload(); }, 500); 
                // }
            });
// }
// else{
//    toastr.warning("Select alternate date and arrival time or note", "Notifications");
// }
});



/*kalai*/

jQuery(document).ready(function(){
  var arrival_time='';
  var date = $('#alternate_date').val();
  var booked_mover_id = '<?php echo $mover_id;?>';
  var arrival_time = '<?php echo $arrival_time?>';  
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL; ?>/home/get_movers_availtime_admin",
            data: {'date':date,'booked_mover_id':booked_mover_id,'selected_arrival_time':arrival_time},
        }).done(function(data){
           
            jQuery('.alternate_arr_time').html(data);
                // $("select.city").select2({ dropdownParent: ".modal-body" });
        });


})



  jQuery(document).on('change','#alternate_date',function(){
  var date = $('#alternate_date').val();
  var booked_mover_id = '<?php echo $mover_id;?>';
  var arrival_time='';
  if(booked_mover_id!='')
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL; ?>/home/get_movers_availtime_admin",
            data: {'date':date,'booked_mover_id':booked_mover_id},
        }).done(function(data){
           
            jQuery('.alternate_arr_time').html(data);
               
        });
    });

   </script>