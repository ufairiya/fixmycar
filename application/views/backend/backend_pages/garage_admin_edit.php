<!DOCTYPE html>
<html>
<head>
</head>
<!-- BEGIN CONTENT -->
<body>

<style type="text/css">
.control-label {
    margin-top: 7px !important;
   
}
.portlet.box.red>.portlet-title, .portlet.red, .portlet>.portlet-body.red,.lightgreen{
  background-color :#4CB755 !important;
}
.salestag{
      border: none !important;
}
.salestag .label-info {
  background-color: #4CB755;
  font-weight: bold !important;
}
.bootstrap-tagsinput {
    background-color: #fff;
    border: 1px solid #ccc;    
    display: inline-block;
    padding: 4px 6px;
    margin-bottom: 10px;
    color: #555;
    vertical-align: middle;
    border-radius: 4px;
    max-width: 100%;
    line-height: 22px;
    cursor: text;
}

.bootstrap-tagsinput input {
    border: none;
    box-shadow: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    margin: 0;
    width: auto !important;
    max-width: inherit;
}

.bootstrap-tagsinput input:focus {
    border: none;
    box-shadow: none;
}

.bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white;
}
.md-radio:before {
    content: close-quote !important;
}
.up_status
{
    margin-left:20%;
}
th{
    text-align: center;
}
</style>
 
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
  <!-- BEGIN PAGE HEADER-->
  <h1 class="page-title"><?php echo $title;?></h1>
  <div class="page-bar">
<ul class="page-breadcrumb">
<li> <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?></a> <i class="fa fa-angle-right"></i> </li>
<li> <span><?php echo $title;?></span> </li>
</ul>
</div>


<?php foreach($garage_details as $data)
{
    $id_user_master = $data->id_user_master;
    $first_name = $data->first_name;    $last_name = $data->last_name;
    $username = $data->username;
     $email = $data->email;
     $customerStatus =$data->status;
}
?>
   <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Begin: life time stats -->
                            <div class="portlet light portlet-fit portlet-datatable ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase"> Customer Info - <?php echo $username.$id_user_master;?>
                                        </span>
                                    </div>
                                     <form id="status_update_form" action="javascript:void(0)" class="form-horizontal" method="POST">
                                     <div class="md-radio-inline up_status">
                                     <input type="hidden" name="customer_id" value="<?php echo $user_id;?>" class="cus_id">
                                                   

                                                    <div class="md-radio has-success">
                                                        <input type="radio" id="radio15" name="status" class="md-radiobtn" value="1"  <?php if($userstatus == 1){
                                                            echo "checked=''";}?>>
                                                        <label for="radio15">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Active </label>
                                                    </div>
                                                    <div class="md-radio has-error">
                                                        <input type="radio" id="radio16" name="status" class="md-radiobtn" value="0"
                                                        <?php if($userstatus == 0){
                                                            echo "checked=''";}?>>
                                                        <label for="radio16">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> InActive </label>
                                                    </div>
                                                    <a href="javascript:;" class="btn btn-success status_update">Save</a>
                                                </div>
                                                </form>
                                   <!--  <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i>
                                                <span class="hidden-xs"> Tools </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to XML </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print Invoices </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                   <!--  <form id="status_update_form" action="javascript:void(0)" class="form-horizontal" method="POST">
                                     <div class="md-radio-inline up_status">
                                     <input type="hidden" name="customer_id" value="<?php echo $id_user_master;?>" class="cus_id">
                                                    <div class="md-radio has-warning">
                                                        <input type="radio" id="radio14" name="status" class="md-radiobtn" value="4" <?php if($customerStatus == 4){
                                                            echo "checked=''";}?>>
                                                        <label for="radio14">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>  Pilot </label>
                                                    </div>
                                                    <div class="md-radio has-success">
                                                        <input type="radio" id="radio15" name="status" class="md-radiobtn" value="1"  <?php if($customerStatus == 1){
                                                            echo "checked=''";}?>>
                                                        <label for="radio15">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> Active </label>
                                                    </div>
                                                    <div class="md-radio has-error">
                                                        <input type="radio" id="radio16" name="status" class="md-radiobtn" value="3"
                                                        <?php if($customerStatus == 3){
                                                            echo "checked=''";}?>>
                                                        <label for="radio16">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> InActive </label>
                                                    </div>
                                                    <a href="javascript:;" class="btn btn-success status_update">Save</a>
                                                </div>
                                                </form> -->
                                </div>
                               
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav-tabs-lg">
                                            <li class="active">
                                                <a href="#customerinfo" data-toggle="tab"> User Details </a>
                                            </li>
                                            <li>
                                                <a href="#invoices" data-toggle="tab"> Garage Details
                                                   <!--  <span class="badge badge-success">4</span> -->
                                                </a>
                                            </li>
                                            <!-- <li>
                                                <a href="#commission" data-toggle="tab"> Commission </a>
                                            </li>
                                            <li>
                                                <a href="#history" data-toggle="tab"> History
                                                   <span class="badge badge-danger"> 2 </span> -->
                                                 <!--  </a>
                                            </li> -->
                                          
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="customerinfo">
                                               <?php  echo $companyUserView;?>
                                               
                                            </div>
                                            <div class="tab-pane" id="invoices">
                                                <?php echo $customerInvoices;?>
                                               
                                            </div>
                                            
                                            <!-- <div class="tab-pane" id="salesREP">
                                               
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End: life time stats -->
                        </div>
                    </div>
 

</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->        
<div class="modal fade" id="ajax" role="basic" aria-hidden="true" >
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <img src="<?php echo $base_url;?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
            <span> &nbsp;&nbsp;Loading... </span>
        </div>
    </div>
</div>
</div>



<script type="text/javascript">
  // Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show') ;

 
} 

// With HTML5 history API, we can easily prevent scrolling!
$('.nav-tabs a').on('shown.bs.tab', function (e) { 
    jQuery('#ajaxLoad').remove();
    if(history.pushState) {
        history.pushState(null, null, e.target.hash); 
    } else {
        window.location.hash = e.target.hash; //Polyfill for old browsers
    }
})
jQuery(document).on('click','.status_update',function(){
  var form1 = $('#status_update_form');
    jQuery.ajax({
    url : '<?php echo BASE_URL;?>/admin/garage/updateCustomer_staus',
    type: 'POST',
    dataType:'JSON',
    data: jQuery(form1).serialize(),
    success:function(response){
        console.log(response);
      // console.log(response);
      // return false;
     
    jQuery(form1)[0].reset();
        toastr.options = {
            "closeButton": true,
             }
              
         toastr.success("Customer Status Update Succesfully", "Notifications").delay(600);
          window.location.reload(true);
      }
   
    });
})
</script>