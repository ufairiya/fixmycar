
    <style type="text/css">
    .container{padding-bottom: 30px;}
    .txt_form{
      border:1px solid #ccc ;
      width: 85%;
      margin: auto;
      background: #F6F6F6;
      margin-top:80px;
      padding-top: 5px;
      padding: 7px 21px 70px 21px;
      
    }
    .t_head{
    	font-size: 15px;
    }
    .crew_tb{
    border: 1px solid #ccc;
    width: 100%;
    margin: auto;
    position: relative;
    top: 26px;
    table-layout: fixed;
    background-color: white;

    }
    td {
    border-width: 0px 2px 1px 0;
    padding: 15px;
}
#text_agestment td{overflow: hidden;}
.txt_left
{
	font-size: 20px;
}
    .txt_right{
      text-align: right;
    }
    .btn_login {
    background-color: #3acbcc;
    color: #ffffff;
    padding: 4px 20px;
    margin-top: 4px;
}
.fnt{
  font-size: 13px;
    font-weight: bold;
    font-family: 'Proxima Nova', sans-serif;
    line-height: 1.75;
    
}
   
    .hr_line{
     border-bottom: 1px solid #00C9C8;
    padding-bottom: 0px;
    padding-top: 0px;
    margin-bottom: 33px;
    position: relative;
    /* bottom: -43px; */
    top: 43px;
    }
    .t_head{
      font-weight: bold;

    }
    table, th, td {
        border-bottom: 1px solid #ccc;
}
table{ border-width: 0;
     margin:0 !important;}

 .btn-theme-border{margin:3px !important;}

     </style>
      
  
            <div class="container">
                <div class="row">
                      
                            <div class="col-md-12 fnt stl_filter stl_option">
                           
                            <div class="col-md-12 stl_filter stl_option">


                            <div class="txt_form">
                            <div class="col-md-12 fm_head">
                                 <div class="col-md-6 txt_left">Your Crew</div>
                                     <div class="col-md-6 txt_right">

                                        <a href="<?php echo $base_url;?>home/add_crew1" data-toggle="modal" data-target="#modalForm"><button type="button" name="add" class="btn btn-theme-border float-righ"><i class="fa fa-plus-square pp">&nbsp &nbsp</i>Add New</button></a>
                                     </div>
                                     </div>
                                  <div class="hr_line"></div>  
                            <div class="crew_tb">
                            
                            <table id="text_agestment" >
                            <thead>
                            <tr class="row_style">
                        <td width="5%" >SNO</td>
                        <td width="18%" > Name</td>
                        <td width="22%" >Location</td>
                        <td width="25%" >Email</td>
                        <td width="15%" >Phone</td>
                         <!-- <td >Address</td> -->
                         <td width="15%" >Action</td>
                        
                        
                        </tr>
                        </thead>
                        <?php 


                         // print_r($h);


                        $count =0;
                       foreach($h as $row)

                       {

                       	// print_r($row);
                         $id=$row['id'];
                        $count ++;
                       	
                         $first_name=$row['first_name'].' '.$row['last_name'];
                         $location=$row['location'];
                         $email=$row['email'];
                         $phone=$row['phone'];
                         $address=$row['address'];


                           $address_new=$this->db->query("SELECT * FROM movers_servicearea  Where area_id='$location'")->row();

                    $address_new1 = $address_new->address;

                      //    if(!empty($address_new))

                      // {   $address_new = $address_new[0]['address']; }

                          ?>
                          <tbody>
                       <tr>

                       <td><?php echo $count;?></td>
                          
                          <td><?php echo $first_name;?></td>

                          <td><?php echo $address_new1;?></td>
                          <td><?php echo $email;?></td>
                          <td><?php echo $phone;?></td>
                          <!-- <td><?php echo $address;?></td> -->
                          <td width="10%">
                          <a href="<?php echo $base_url;?>home/edit_crew/<?php echo $id;?>" data-toggle="modal" data-target="#modalForm" class="btn btn-theme-border"><i class="fa fa-edit"></i> Edit </a>
                           
                          <a href="javascript:void(0)" class="btn btn-theme-border delete_crew" onClick="delete_crew(<?php echo  $id; ?>)"><i class="fa fa-trash"></i> Delete </a> 
                          </td>
        



<!-- 
<a href="javascript:void(0)" class="btn btn-theme-border delete_movers_rate" onClick="delete_movers_rate(<?php echo $movers_rate_list['id'] ?>)"><i class="fa fa-trash"></i> Delete </a> 
 -->        

                          </tr> 
                          </tbody>
 
                        <?php 

                        } 

                        ?>
                     
                            </table>

                            </div>

                            </div>
                            </div>
                           <!--  <div class="col-md-1"></div> -->
                            </div>
                            </div>
                            </div>
                            </div>
<div class="modal fade" id="modalForm" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content">
         
        </div>
    </div>
</div>

<!-- <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>  
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" /> -->

<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>  
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
<!-- kalai -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCEx9xjVJ1AtGCoR_u7Cb_k3Dry3ln9LIU&sensor=false&libraries=places&language=en-AU"></script>
<!-- kalai  -->
<script type="text/javascript">



function delete_crew(id)
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
                        url: "<?php echo BASE_URL;?>/home/delete_crew/"+id,
                        data: "id="+id,
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
   function initialize() {
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.setComponentRestrictions(
            {'country': ['us','in']});
      
   }
   google.maps.event.addDomListener(window, 'load', initialize);



</script>
 <script src="<?php echo BASE_URL;?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  jQuery(document).ready(function() {
   
   jQuery('#table-expert').DataTable(
    {
      // "order":[[0, 'DESC']],
       "oLanguage": {
            "sLengthMenu": " _MENU_ records"
        }
    });

   // jQuery('#order_details_table_filter input').addClass('form-control');
   // jQuery("#order_details_table_info").css("font-size","17px");

} );
</script>