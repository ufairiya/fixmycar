
<style type="text/css">
	.heading_style {   text-align: center; }

.Suggest_time{ 
     font-size: 22px;
    line-height: 1.4;
    color: #6f6f6f;
    font-weight: normal;
}

.schedule_begin{
      font-size: 17px;
     /* line-height: 35px;*/
      line-height: 30px;
   /* font-family: fantasy; */
}
.align_right {
  text-align: right;
}


    #admin_reschedule .modal-dialog {

    width: 65% ; 
  }

@media screen and (min-width: 300px) and (max-width: 500px){
   #admin_reschedule .modal-dialog { width: 90% ; }
} 
@media screen and (min-width: 501px) and (max-width: 700px){
   #admin_reschedule .modal-dialog { width: 95% ; }
} 

     #admin_reschedule   .btn-danger {
    color: #fff;
    background-color: #ed6b75;
    border-color: #ea5460;
}

 #admin_reschedule   .btn-danger:hover{
        color: #fff;
    background-color: #e73d4a;
    border-color: #e31d2d;

}

#admin_reschedule  .btn-success {
    color: #fff;
    background-color: #36c6d3;
    border-color: #2bb8c4;
}

 #admin_reschedule  .btn-success:hover{
  color: #fff;
    background-color: #208992;
    border-color: #14565c
}

</style>


<?php 

// print_r($order_results);

foreach ($order_results as $values) {

	 $move_date =$values['move_date'];
	 $arrival_time =$values['arrival_time'];

}

 



// echo $date1 =  $move_date +1;
//  echo $date = strtotime("+1 day", $move_date);

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

                    <p class="schedule_begin"> <b>Note:</b> If you are unavailable during the originally scheduled time, first call the customer to discuss alternate timing, then use this form to send the new date and time for the customer to confirm. Once the customer electronically confirms, you will again be required to electronically accept the new order time.</p>
                </div>

          
                  
                      <div class="col-md-6"> <span  class="Suggest_time">Alternate date:</span>
                             <br>
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
                       <select class="form-control" name="alternate_arr_time" id="alternate_arr_time">
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
                      </select>
                      </div>

                      <div class="col-md-12">
                      <span  class="Suggest_time">Add a Note to the Request</span>
                      <textarea  rows="5"  class="form-control" name="notes_request"></textarea>
                      </div>

                      <div class="col-md-12 align_right">

                      <button type="button" class="btn btn-danger dontchange"><i class="fa fa-remove"></i>&nbsp;DON'T CHANGE</button> 
                       <button type="button" class="btn btn-success reschedule_request"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;SEND REQUEST</button>
                        
                      </div>
                

                  </div>
            </div>

 

     </div>
     

   <script type="text/javascript">
     
       jQuery(document).on("click",".dontchange",function()
    {
       jQuery('#admin_reschedule').modal('hide');

    });


      jQuery(document).on("click",".reschedule_request",function()
{

  var order_id ='<?php echo  $orderid?>';
  var alternate_date =jQuery("#alternate_date option:selected").val();
  var alternate_arr_time =jQuery("#alternate_arr_time option:selected").val();

  //alert(alternate_date + alternate_arr_time );

   $.ajax({
                url: "<?php echo BASE_URL; ?>/home/reschedule_by_admin", 
                type: "POST",             
                data: {'order':order_id,'alternate_date':alternate_date,'alternate_arr_time':alternate_arr_time},             
                dataType:'json',    
                success: function(data) {
                
              
               //  toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }, complete: function(data) {

                  jQuery(".reschedule_request").attr('disabled', 'disabled');
              
                   toastr.success(" order  details updated successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });

});


   </script>