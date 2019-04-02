 <style type="text/css">
   /* Styles go here */

.box-container {
  height: auto;
}

.box-item,.sortable{
  width: 100%;
  z-index: 1000
}
.modal{
    display: block !important; /* I added this to see the modal, you don't need this */
}

/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 500px;
    overflow-y: auto;
}
 </style>
 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Assigned Sales REP</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        
        <?php 
               
        $customHiddenData = array(
          'action_type'  => $action_type,       
          'company_id'  => $companyId, 
          'sales_rep' =>$previous_sales_rep,
          'previous_sales_rep' =>$previous_sales_rep,
        );
       
        ?>
        <form id="update_company_sales" method="post">
           <?php  echo form_hidden($customHiddenData); ?>  
            <div class="form-body">  
          <div class="container-fluid">
      <div class="row">
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Sales REP</h1>
            </div>
           
            <ul id="container1" class="panel-body box-container connected sortable list">
            
             <?php 
             if(count($salesRep) > 0 && $salesRep != FALSE){
             foreach($salesRep as $key => $sales_rep){?>
              <li draggable="true" itemid="itm-<?php echo $key;?>" data-id="<?php echo $key;?>" class=" ui-state-default btn btn-default box-item "><?php echo $sales_rep;?></li>              
            <?php } }?>
           
            </ul>
            
          </div>
        </div>
        <div class="col-xs-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Assigned Sales REP</h1>
            </div>
            <ul id="container2" class="panel-body box-container box-assigned connected sortable list">
             <?php 
             if(count($assigned_salesRep) > 0 && $assigned_salesRep != FALSE){
             foreach($assigned_salesRep as $key => $sales_rep){?>
              <li draggable="true" itemid="itm-<?php echo $key;?>" data-id="<?php echo $key;?>" class=" ui-state-default btn btn-default box-item "><?php echo $sales_rep;?></li>              
            <?php } }?>
           
            </ul>

           
            
          </div>
        </div>
        <div class="col-xs-4">
           <button type="submit" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
             </div>
         </div>

       
    </div>
       
               
                          
           
        </form>
       
      </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
 
</div>
 <script src="<?php echo BASE_URL;?>/assets/jquery.ui.touch-punch.min.js"></script> 
              
<script type="application/javascript">
(function($){
       FormInputMask.init();
       var form1 = $('#update_company_sales');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
  
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
         messages: {              
                    
            },
            rules: {
              
                
            },
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
                } else {
                error.insertAfter(element);
                }
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form,event) {
          //  event.preventDefault();
       
        jQuery.ajax({
          url : '<?php echo $base_url?>company/cust_sales_rep_map',
          type: 'POST',
          data: jQuery(form).serialize(),
          success:function(response){
            // console.log(response);
            // return false;     
            jQuery(form)[0].reset();
            toastr.options = {
              "closeButton": true,
            }
            toastr.success("Customer Sales REP Assigned Succesfully", "Notifications");
            setTimeout(function(){ location.reload(); }, 500);      
            }
          });
            }
        });
})(jQuery);
(function($){
   // $( "#container2" ).sortable();

   // $('#sortable4, #sortable5').sortable({
   //      connectWith: '.connected'
   //    });

   $('#container1, #container2').sortable({
        connectWith: '.connected',
        update: function( event, ui ) {
          var sortedIDs = $( "#container2" ).sortable( "toArray",{attribute: 'data-id'} );
       console.log('sort-->'+sortedIDs);
       $('[name="sales_rep"]').val(sortedIDs);
        }
      });

   
  $("#container1").droppable({
    drop: function(event, ui) {
      var itemid = $(event.originalEvent.toElement).attr("itemid");
      console.log('B1-->'+itemid); 
      var assignedREP = {};     
      $('.box-item').each(function() {
        if ($(this).attr("itemid") === itemid) {
          $(this).appendTo("#container1");         
          $(this).removeClass('sortable');
        }
        if($(this).parent().hasClass('box-assigned')){              
          assignedREP[$(this).attr('data-id')] = $(this).attr('data-id');
        }
      });
      console.log(assignedREP);
      
    }
  });

  
  $("#container2").droppable({
    drop: function(event, ui) {
      var itemid = $(event.originalEvent.toElement).attr("itemid");
      console.log('B2-->'+itemid);
      var assignedREP = {};     
      $('.box-item').each(function() {
        if ($(this).attr("itemid") === itemid) {         
          $(this).appendTo("#container2");            
        }

        if($(this).parent().hasClass('box-assigned')){              
          assignedREP[$(this).attr('data-id')] = $(this).attr('data-id');
        }
       
      });
   
     
     
    }
  });

})(jQuery);
</script>
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL;?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> 

<script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>  
