<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <br>
                    <h1 class="page-title"> <?php echo 'Approve Order Status'; ?></h1>
                    <br>
                    <!--<?php echo "<pre>" ;print_r($result); echo "</pre>";?> -->
                 <!--  </div> -->
 <table  id="order_details_approve" class="table table-bordered datatable table-responsive"> 
           <thead class="order_table_head">
             
                   <tr>
                                      <th>Order #</th>
                                      <th>Job Date</th> 
                                      <th>Customer Name</th>
                                      <th>Movers</th>
                                      
                                      <th>Status</th>
                                      <th>Review</th>
                                      <th>Action</th>
                                    <!--   <th>Source</th> -->
                  </tr>
           </thead>

                                           
             <tbody class="order_table_body">
             <?php 
             // echo '<pre>';print_r($order_details);echo '</pre>';

foreach ($order_details as $key => $value) {
  # code...

  $order_id = $value['id'];
  $move_date = date('m/d/Y',strtotime($value['move_date']));
  $customer_name = $value['b_First_name'].' '.$value['b_Last_name'];
  $company_name = $value['company_name'];
  $status = $value['order_status'];
  $star_count = $value['star_count'];


if($status =='Cancelled'){ $style ="color:red";} else { $style ='';}

             ?>
             <tr class="row_start">

                                          <td class="order_id_color ">
                                          <!-- <a href="<?php echo BASE_URL;?>/movers/order_details_change/<?php echo $orderid;?>>"  data-target="#ajax" data-toggle="modal" ><?php echo $orderid;?></a> -->
                                          <?php echo $order_id;?>
                                          <!-- <a href="<?php echo BASE_URL;?>/home/order_details_change/<?php echo $order_id;?>>"  data-target="#admin_orders" data-toggle="modal"></a> -->
                                          </td>
                                          <td><?php echo $move_date;?></td>
                                          <td><?php echo $customer_name?></td>
                                          <td><?php echo $company_name;?></td>
                                          
                                          <td style="<?php echo $style;?>"><?php echo $status;?></td>
                                          <td  class="stars_count" data-value="<?php echo $star_count;?>"></td>
                                          <td>
                                          <?php 
                                          if($status != 'Completed') {?>
                                          <a href="<?php echo BASE_URL;?>/home/order_status_change/<?php echo $order_id;?>>"  data-target="#ajax" data-toggle="modal" ><button type="button"  class="btn"> Approve </button></a> 
                                          <?php } ?>


                                          </td>

                                  </tr>
                                  <?php } ?>

                              
                      </tbody>
                             

                        
                         
</table>

</div>
 
<div id="ajax" class="modal fade" role="dialog" >
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">


    </div>
   </div>
</div>
</div> 


         <script src="<?php echo BASE_URL;?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

             <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>  

<link rel='stylesheet' href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script>
jQuery(document).ready(function() {
   
   jQuery('#order_details_approve').DataTable(
    {
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });

   // jQuery('#order_details_table_filter input').addClass('form-control');
   // jQuery("#order_details_table_info").css("font-size","17px");

} );

jQuery(".row_start").each(function() {

 var count_star = jQuery(this).find(".stars_count").attr('data-value');

 if(count_star !='')

 {
 
  var results = getStars(count_star);

  jQuery(this).find(".stars_count").html(results);

}


});



function getStars(rating) {


  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  return output.join('');

}



</script>

    




