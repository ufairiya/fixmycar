<style type="text/css">
    .invHead{
        background-color: #C7DEFE;
    }
    .captionb20{
         margin-bottom: 20px;
    }

    .fancybox-lock .fancybox-overlay{
        z-index: 9999 !important;
    }
</style>
<div class="table-container">
    <div class="caption captionb20">
        <span class="caption-subject font-green-haze bold uppercase">Invoice List</span>
        <?php if($createInvAction == TRUE){?>
          <a href="<?php echo BASE_URL.'/invoice/create/'.$company_id;?>" class="btn btn-sm green" style="margin-left:30px;"><i class="fa fa-plus"></i> New Invoice   </a>
       <?php }?>
    </div>

<div class="clearfix"></div>
    <!-- <div class="table-actions-wrapper">
        <span> </span>
        <select class="table-group-action-input form-control input-inline input-small input-sm">
            <option value="">Select...</option>
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
            <option value="canceled">Canceled</option>
        </select>
        <button class="btn btn-sm yellow table-group-action-submit">
            <i class="fa fa-check"></i> Submit</button>
    </div> -->
   <!--  <div class="table-responsive"> -->
    <table class="table table-striped table-bordered table-hover" id="datatable_invoices">
        <thead class="invHead">
            <tr role="row" class="heading">
               <!--  <th width="1%">Line</th> -->
                <th width="5%"> Invoice&nbsp;# </th>
                <th width="5%">PO#</th> 
                <th width="15%"> Invoice&nbsp;Date </th>
                <th width="10%"> Qty </th>
                <th width="10%"> Totals </th>
                <th width="10%"> ComAction </th>
                <th width="10%"> InvAction </th>
                <th width="10%"> Status </th>
            </tr>
            <tr role="row" class="filter">
           
                <td> 
                    <input type="text" class="form-control form-filter input-sm" name="order_invoice_no" id="order_invoice_no">    
                </td>
                <td>
                    <input type="text" class="form-control form-filter input-sm" name="order_po_no" id="order_po_no"> 
                </td>                
                <td>
                    <div class="input-group date date-picker margin-bottom-5" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_from" placeholder="From" id="order_invoice_date_from">
                        <span class="input-group-btn">
                            <button class="btn btn-sm default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group date date-picker" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="order_invoice_date_to" placeholder="To" id="order_invoice_date_to">
                        <span class="input-group-btn">
                            <button class="btn btn-sm default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </td>
                <td>
                    <input type="text" class="form-control form-filter input-sm" name="order_invoice_qty" id="order_invoice_qty"> </td>
                <td>
                    <div class="margin-bottom-5">
                        <input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_from" placeholder="From" id="order_invoice_amount_from" /> </div>
                    <input type="text" class="form-control form-filter input-sm" name="order_invoice_amount_to" placeholder="To" id="order_invoice_amount_to"/> </td>

                
                <td> </td>
                <td>
                    <div class="margin-bottom-5">
                        <button class="btn btn-sm yellow filter-submit margin-bottom btn-inv-submit">
                            <i class="fa fa-search"></i> Search</button>
                    </div>
                    <button class="btn btn-sm red filter-cancel btn-inv-cancel">
                        <i class="fa fa-times"></i> Reset</button>
                </td>
                <td>
                  
                </td>
               
            </tr>
        </thead>
        <tbody id="invlist"> 
        <?php if($custInvoiceList != FALSE){
            // echo '<pre>';
            // print_R($custInvoiceList);
            // exit;
            $i=0;
            foreach($custInvoiceList as $custInvoice){
                $i++;
                $po_Id = isset($custInvoice->id_purchase_order) ? $custInvoice->id_purchase_order : FALSE;
                $po_number = isset($custInvoice->po_number) ? $custInvoice->po_number : FALSE;
                 $invoice_number = isset($custInvoice->invoice_number) ? $custInvoice->invoice_number : FALSE;
                $po_date = (isset($custInvoice->po_date) && validateDate($custInvoice->po_date)) ? date('m/d/Y',strtotime($custInvoice->po_date)) : FALSE;
                $po_total_qty = isset($custInvoice->po_total_qty) ? $custInvoice->po_total_qty : FALSE;
                $po_net_amount = isset($custInvoice->po_net_amount) ? $custInvoice->po_net_amount : FALSE;
                $id_inv_com = isset($custInvoice->id_inv_com) ? $custInvoice->id_inv_com : '';
                $po_status = isset($custInvoice->po_status) ? $custInvoice->po_status : FALSE;
                $status = ($po_status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($po_status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
               $viewCommLink =  ($id_inv_com !=FALSE) ?$base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;  
                $AddCommLink =  ($id_inv_com ==FALSE) ? $base_url.'commission/add/'.$po_Id : FALSE;
                $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;
                 $viewLink = BASE_URL.'/invoice/PDF/'.$po_Id;
                 $packageLink = BASE_URL.'/invoice/PackageSlipPDF/'.$po_Id;
                
        ?>
       
           <tr>
           <td><?php echo $invoice_number;?></td>
           <td><?php echo $po_number;?></td>
           <td><?php echo $po_date;?></td>
           <td><?php echo $po_total_qty;?></td>
           <td><?php echo '$'.$po_net_amount;?></td>
           <td>
            
            <div class="clearfix">
           <?php if( $AddCommLink != FALSE){?>
            <a href="<?php echo $AddCommLink;?>" class="btn btn-circle btn-icon-only green tooltips" data-container="body" data-placement="top" data-original-title="Add Commission">
                <i class="fa fa-plus"></i>
            </a>
             <?php } ?>
              <?php if( $EditCommLink != FALSE){?>
            <a href="<?php echo $EditCommLink;?>" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>
             
              <?php } ?>
               <?php if( $viewCommLink != FALSE){?>
            <a href="<?php echo $viewCommLink;?>" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                <i class="fa fa-eye"></i>
            </a>
             <?php } ?>
            </div>  
           </td>
          <td><a href="<?php echo BASE_URL.'/invoice/edit/'.$po_Id;?>" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="Edit Invoice"><i class="fa fa-edit"></i></a>
        <a class="btn btn-circle btn-icon-only btn-default fancybox btn-view" href="<?php echo $packageLink;?>" data-container="body" data-placement="top" data-original-title="View Package Slip"   >
        <i class="fa fa-file-powerpoint-o"></i>
        </a>
        <a class="btn btn-circle btn-icon-only btn-default fancybox btn-view tooltips" href="<?php echo $viewLink;?>" data-container="body" data-placement="top" data-original-title="View Invoice"  >
        <img src="<?php echo BASE_URL.'/assets/images/invoice.png';?>"/>
        </a>
        <a class=" btn btn-circle btn-icon-only btn-default mt-sweetalert-delete btn-delete" data-title="Do you want delete this invoice?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="d" data-uid="<?php echo $po_id;?>" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </a>
        </td>
        <td><?php echo $status;?></td>
          <!--  <td><?php //echo $status;?></td> -->
        </tr>
        <?php } } ?>
        </tbody>
    </table>
   <!--  </div> -->
</div>
<script type="text/javascript">

    jQuery(document).ready(function(e) {
        
        
// var table = jQuery('#datatable_invoices');

//         var oTable = table.dataTable({

            // "language": {
            //     "aria": {
            //         "sortAscending": ": activate to sort column ascending",
            //         "sortDescending": ": activate to sort column descending"
            //     },
            //     "emptyTable": "No data available in table",
            //       "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ invoices",
            //     "infoEmpty": "No invoice found",
            //     "infoFiltered": "(filtered1 from _MAX_ total invoices)",
            //     "lengthMenu": "_MENU_ invoice",
            //     "search": "<?php echo $this->lang->line('search'); ?>:",
            //     "zeroRecords": "No matching records found"
            // },

        

//             buttons: [
//                 // { extend: 'pdf', className: 'btn default' },
//                 // { extend: 'csv', className: 'btn default' }
//             ],

//             "order": [
//                 // [0, 'asc']
//             ],
            
//             "lengthMenu": [
//                 [5, 10, 15, 20, -1],
//                 [5, 10, 15, 20, "All"] // change per page values here
//             ],
//             "pageLength": 10,

//         });
var table = jQuery('#datatable_invoices');
var oTable = table.dataTable({
        "processing": true,
        "serverSide": false,
        "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
          "language": {
                // "aria": {
                //     "sortAscending": ": activate to sort column ascending",
                //     "sortDescending": ": activate to sort column descending"
                // },
                "emptyTable": "No data available in table",
                  "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ invoices",
                "infoEmpty": "No invoice found",
                "infoFiltered": "(filtered1 from _MAX_ total invoices)",
                "lengthMenu": "_MENU_ invoice",
                "search": "<?php echo $this->lang->line('search'); ?>:",
                "zeroRecords": "No matching records found"
            },
        "ajax": {
            url : '<?php echo $base_url?>company/invoice_search',
            "type": "POST",
            data : {'cid':'<?php echo $company_id;?>'},
            datasrc:'data'
        },
        
    } );


 
    setTimeout(function(){ 
           jQuery('[data-toggle="tooltip"]').tooltip();
           jQuery('.tooltips').tooltip();
     }, 500);
// invoiceInfo();

    });

    jQuery(document).on('click','.btn-delete',function(){
    var sa_title = $(this).data('title');
    var sa_message = $(this).data('message');
    var sa_type = $(this).data('type'); 
    var sa_allowOutsideClick = $(this).data('allow-outside-click');
    var sa_showConfirmButton = $(this).data('show-confirm-button');
    var sa_showCancelButton = $(this).data('show-cancel-button');
    var sa_closeOnConfirm = $(this).data('close-on-confirm');
    var sa_closeOnCancel = $(this).data('close-on-cancel');
    var sa_confirmButtonText = $(this).data('confirm-button-text');
    var sa_cancelButtonText = $(this).data('cancel-button-text');
    var sa_popupTitleSuccess = $(this).data('popup-title-success');
    var sa_popupMessageSuccess = $(this).data('popup-message-success');
    var sa_popupTitleCancel = $(this).data('popup-title-cancel');
    var sa_popupMessageCancel = $(this).data('popup-message-cancel');
    var sa_confirmButtonClass = $(this).data('confirm-button-class');
    var sa_cancelButtonClass = $(this).data('cancel-button-class');
   
    var key = $(this).attr('data-uid');
    var task = $(this).attr('data-task');
    //console.log(sa_btnClass);
    swal({
      title: sa_title,
      text: sa_message,
      type: sa_type,
      allowOutsideClick: sa_allowOutsideClick,
      showConfirmButton: sa_showConfirmButton,
      showCancelButton: sa_showCancelButton,
      confirmButtonClass: sa_confirmButtonClass,
      cancelButtonClass: sa_cancelButtonClass,
      closeOnConfirm: sa_closeOnConfirm,
      closeOnCancel: sa_closeOnCancel,
      confirmButtonText: sa_confirmButtonText,
      cancelButtonText: sa_cancelButtonText,
    },
    function(isConfirm){
        if (isConfirm){
            jQuery.ajax({
                url : '<?php echo $base_url?>/purchase_order/delete_PO',
                type: 'POST',
                data: {'key':key,'task':task},
                success:function(response){
                    console.log(response);

                    toastr.options = {
                    "closeButton": true,
                    }
                    toastr.warning("Purchase Order Deleted Succesfully", "Notifications");
                    setTimeout(function(){ location.reload(); }, 500);      
                }
                });
        } else {
            swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");
        }
    });
               
})

    function invoiceInfo(){
        var invoiceNo = jQuery('#order_invoice_no').val();
        var po_no = jQuery('#order_po_no').val();
        var invDateFrom= jQuery('#order_invoice_date_from').val();
        var invDateTo = jQuery('#order_invoice_date_to').val();
        var invQty = jQuery('#order_invoice_qty').val();
        var invAmtFrom= jQuery('#order_invoice_amount_from').val();
        var invAmtTo = jQuery('#order_invoice_amount_to').val();
        var formData = new Array();
        formData.push({ name: "invoiceNo", value:invoiceNo });
        formData.push({ name: "po_no", value:po_no });
        formData.push({ name: "invDateFrom", value:invDateFrom });
        formData.push({ name: "invDateTo", value:invDateTo });
        formData.push({ name: "invQty", value:invQty });
        formData.push({ name: "invAmtFrom", value:invAmtFrom });
        formData.push({ name: "invAmtTo", value:invAmtTo });
        formData.push({ name: "cid", value:'<?php echo $company_id;?>' });
       
                jQuery.ajax({
                    url : '<?php echo $base_url?>company/invoice_search',
                    type: 'POST',
                    dataType:'JSON',
                    data: formData,
                    success:function(response){                      
                         var table;
                         
                         table = $('#datatable_invoices').DataTable();    
                         if(response!='') {   
                             table.clear();          
                             table.rows.add(response.data);
                         }
                         table.draw();

                      }                     
             });
    jQuery('.tooltips').tooltip();
    }
    jQuery(document).on('click','.btn-inv-submit',function(){
        invoiceInfo();
    setTimeout(function(){ 
           jQuery('[data-toggle="tooltip"]').tooltip();
           jQuery('.tooltips').tooltip();
     }, 500);    
        
    })
 jQuery(document).on('click','.btn-inv-cancel',function(){
     jQuery('#order_invoice_no').val('');
     jQuery('#order_po_no').val('');
     jQuery('#order_invoice_date_from').val('');
     jQuery('#order_invoice_date_to').val('');
     jQuery('#order_invoice_qty').val('');
     jQuery('#order_invoice_amount_from').val('');
     jQuery('#order_invoice_amount_to').val('');
     invoiceInfo();

    })
</script>
<link href="<?php echo BASE_URL.'/assets/global/plugins/fancybox/source/jquery.fancybox.css';?>"  rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo BASE_URL.'/assets/global/plugins/fancybox/source/jquery.fancybox.js';?>"></script>
<script type="text/javascript">
jQuery('.fancybox').fancybox({  type   :'iframe'
});

</script>

