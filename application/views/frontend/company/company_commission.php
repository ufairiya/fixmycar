<style type="text/css">
    .commissionHead{
        background-color: #E0F1E2;
    }
     .captionb20{
         margin-bottom: 20px;
    }

.upaid{
    background-color:#FFD2D3;
}
.paid{
    background-color:#FEE5CB;
}
.fullpaid{
    background-color:#E4F7D7;
}
</style>
<div class="table-container">
   <div class="caption captionb20">
        <span class="caption-subject font-green-haze bold uppercase">Commission List</span>
    </div>
<div class="clearfix"></div>
    <div class="table-actions-wrapper">
        <span> </span>
        <select class="table-group-action-input form-control input-inline input-small input-sm">
            <option value="">Select...</option>
            <option value="pending">Pending</option>
            <option value="paid">Paid</option>
            <option value="canceled">Canceled</option>
        </select>
        <button class="btn btn-sm yellow table-group-action-submit">
            <i class="fa fa-check"></i> Submit</button>
    </div>
   <!--  <div class="table-responsive"> -->
    <table class="table table-striped table-bordered table-hover" id="datatable_commission">
        <thead class="commissionHead">
            <tr role="row" class="heading">
                <th width="1%"> Line</th>
                <th width="5%"> Invoice&nbsp;# </th>
                <th width="15%"> Invoice&nbsp;Date </th>
                <th width="10%"> Qty </th>
                <th width="10%"> PO Total </th>
                <?php if($userType !='sales_rep'){?> 
                <th width="10%"> ComTotal </th>
                
                <?php } ?>
                <th width="10%"> CommPaid </th>
                
                <th width="10%"> Status </th>
                <th width="10%"> Actions </th>
            </tr>
            <tr role="row" class="filter">
           
                <td> </td>
                <td>
                    <input type="text" class="form-control form-filter input-sm" name="comm_invoice_no" id="comm_invoice_no"> 
                </td>                
                <td>
                    <div class="input-group date date-picker margin-bottom-5" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="comm_invoice_date_from" placeholder="From" id="comm_invoice_date_from">
                        <span class="input-group-btn">
                            <button class="btn btn-sm default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                    <div class="input-group date date-picker" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control form-filter input-sm" readonly name="comm_invoice_date_to" placeholder="To" id="comm_invoice_date_to">
                        <span class="input-group-btn">
                            <button class="btn btn-sm default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </td>
                <td>
                    <input type="text" class="form-control form-filter input-sm" name="comm_invoice_qty" id="comm_invoice_qty"> 
                </td>
                <td>
                    <div class="margin-bottom-5">
                        <input type="text" class="form-control form-filter input-sm" name="comm_invoice_amount_from" placeholder="From" id="comm_invoice_amount_from" /> </div>
                    <input type="text" class="form-control form-filter input-sm" name="comm_invoice_amount_to" placeholder="To" id="comm_invoice_amount_to"/>
               </td>
                <?php if($userType !='sales_rep'){?> 
                <td> <div class="margin-bottom-5">
                        <input type="text" class="form-control form-filter input-sm" name="comm_commission_amount_from" placeholder="From" id="comm_commission_amount_from" /> </div>
                    <input type="text" class="form-control form-filter input-sm" name="comm_commission_amount_to" placeholder="To" id="comm_commission_amount_to"/>
                </td>
                <?php } ?>
               
                <td> <select name="comm_paid_status" id="comm_paid_status" class="form-control form-filter input-sm">
                            <option value="">Select...</option>
                           
                            <option value="paid">Paid</option>
                            <option value="unpaid">Unpaid</option>
                        </select> 
              </td>
                <td> </td>
                <td>
                    <div class="margin-bottom-5">
                        <button class="btn btn-sm yellow filter-submit margin-bottom btn-comm-submit">
                            <i class="fa fa-search"></i> Search</button>
                    </div>
                    <button class="btn btn-sm red filter-cancel btn-comm-cancel">
                        <i class="fa fa-times"></i> Reset</button>
                </td>
               
            </tr>
        </thead>
        <tbody> 
        <?php if($custCommissionList != FALSE){
            // echo '<pre>';
            // print_R($custCommissionList);
            // exit;
            $i=0;
            foreach($custCommissionList as $custCommission){
                $i++;
                $po_Id = isset($custCommission->id_purchase_order) ? $custCommission->id_purchase_order : FALSE;
                $po_number = isset($custCommission->po_number) ? $custCommission->po_number : FALSE;
                $po_date = (isset($custCommission->po_date) && validateDate($custCommission->po_date)) ? date('m/d/Y',strtotime($custCommission->po_date)) : FALSE;
                $po_total_qty = isset($custCommission->po_total_qty) ? $custCommission->po_total_qty : FALSE;
                $po_net_amount = isset($custCommission->po_net_amount) ? $custCommission->po_net_amount : FALSE;
                $id_inv_com = isset($custCommission->id_inv_com) ? $custCommission->id_inv_com : '';
                $po_status = isset($custCommission->po_status) ? $custCommission->po_status : FALSE;
                $comm_status = isset($custCommission->comm_status) ? $custCommission->comm_status : FALSE;
                $comm_paid_date = (isset($custCommission->comm_paid_date) && validateDate($custCommission->comm_paid_date)) ? date('m/d/Y',strtotime($custCommission->comm_paid_date)) : FALSE;
                $save_status = isset($custCommission->save_status) ? $custCommission->save_status : FALSE;
                if($save_status == 'default'){

                  $total_commission = isset($custCommission->total_commission) ? $custCommission->total_commission : FALSE;

                }elseif ($save_status == 'percent') {

                  $total_commission = isset($custCommission->total_commission_percentage) ? $custCommission->total_commission_percentage : FALSE;

                }
                else{

                  $total_commission = isset($custCommission->total_commission_dollar) ? $custCommission->total_commission_dollar : FALSE;
                  
                }
                $status = ($comm_status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($comm_status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
                $viewCommLink =  ($id_inv_com !=FALSE) ?$base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;               
                $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;
                
        ?>
       
           <tr>
           <td><?php echo $i;?></td>
           <td><?php echo $po_number;?></td>
           <td><?php echo $po_date;?></td>
           <td><?php echo $po_total_qty;?></td>
           <td><?php echo getCurrencyFormat($po_net_amount);?></td>
            <?php if($userType !='sales_rep'){?> 
           <td><?php echo getCurrencyFormat($total_commission);?></td>
           
           <?php } ?>
           <td><?php echo  $comm_paid_date;?></td>
           <td><?php echo $status;?></td>           
           <td>
            
            <div class="clearfix">
          
              <?php if( $EditCommLink != FALSE){?>
            <a href="<?php echo $EditCommLink;?>" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>
             
              <?php } ?>
               <?php if( $viewCommLink != FALSE){?>
            <a href="<?php echo $viewCommLink;?>" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static">
                <i class="fa fa-eye"></i>

               
            </a>
             <?php } ?>
            </div>  
           </td>
          
           
        </tr>
        <?php } } ?>
        </tbody>
    </table>
   <!--  </div> -->
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
var table = jQuery('#datatable_commission');
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
                  "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ commission",
                "infoEmpty": "No invoice found",
                "infoFiltered": "(filtered1 from _MAX_ total commission)",
                "lengthMenu": "_MENU_ commission",
                "search": "<?php echo $this->lang->line('search'); ?>:",
                "zeroRecords": "No matching records found"
            },
        "ajax": {
            url : '<?php echo $base_url?>company/commission_search',
            "type": "POST",
            data : {'cid':'<?php echo $company_id;?>'},
            datasrc:'data',

        },
         "initComplete":function( settings, json){
           $(".fullpaid").parent().addClass('fullpaid'); 
           $(".paid").parent().addClass('paid');
           $(".upaid").parent().addClass('upaid'); 
        }
        
    } );
  setTimeout(function(){ 
          
           jQuery('.tooltips').tooltip();
          }, 500);  
    });

    function commissionInfo(){
        var invoiceNo = jQuery('#comm_invoice_no').val();
        var invDateFrom= jQuery('#comm_invoice_date_from').val();
        var invDateTo = jQuery('#comm_invoice_date_to').val();
        var invQty = jQuery('#comm_invoice_qty').val();
        var invAmtFrom= jQuery('#comm_invoice_amount_from').val();
        var invAmtTo = jQuery('#comm_invoice_amount_to').val();

        var comAmtFrom= jQuery('#comm_commission_amount_from').val();
        var comAmtTo = jQuery('#comm_commission_amount_to').val();
        var comPaidStatus = jQuery('#comm_paid_status').val();
        var formData = new Array();
        formData.push({ name: "invoiceNo", value:invoiceNo });
        formData.push({ name: "invDateFrom", value:invDateFrom });
        formData.push({ name: "invDateTo", value:invDateTo });
        formData.push({ name: "invQty", value:invQty });
        formData.push({ name: "invAmtFrom", value:invAmtFrom });
        formData.push({ name: "invAmtTo", value:invAmtTo });
        formData.push({ name: "comPaidStatus", value:comPaidStatus });

        formData.push({ name: "comAmtFrom", value:comAmtFrom });
        formData.push({ name: "comAmtTo", value:comAmtTo });
        formData.push({ name: "cid", value:'<?php echo $company_id;?>' });
       
                jQuery.ajax({
                    url : '<?php echo $base_url?>company/commission_search',
                    type: 'POST',
                    dataType:'JSON',
                    data: formData,
                    success:function(response){                      
                         var table;
                         
                         table = $('#datatable_commission').DataTable();    
                         if(response!='') {   
                             table.clear();          
                             table.rows.add(response.data);
                         }
                         table.draw();
                      }                     
             });
         setTimeout(function(){ 
          
           jQuery('.tooltips').tooltip();
          }, 500);  
    }
    jQuery(document).on('click','.btn-comm-submit',function(){
        commissionInfo();
    })
 jQuery(document).on('click','.btn-comm-cancel',function(){
     jQuery('#comm_invoice_no').val('');
     jQuery('#comm_invoice_date_from').val('');
     jQuery('#comm_invoice_date_to').val('');
     jQuery('#comm_invoice_qty').val('');
     jQuery('#comm_invoice_amount_from').val('');
     jQuery('#comm_invoice_amount_to').val('');
     jQuery('#comm_commission_amount_from').val('');
     jQuery('#comm_commission_amount_to').val('');
     jQuery('#comm_paid_status').val('');
     commissionInfo();
    })
</script>