<style type="text/css">
    .commissionHead{
        background-color: #E0F1E2;
    }
     .captionb20{
         margin-bottom: 20px;
    }
</style>
<?php 
$custHistoryListInfo = FALSE;
$custHistoryItemInfo = FALSE;
$custHistoryREPInfo = FALSE;
//echo '<pre>';print_r($custHistoryList);exit;
if($custHistoryList != FALSE && count($custHistoryList) > 0){
    $custHistoryListInfo = isset($custHistoryList['po_list']) ? $custHistoryList['po_list'] : FALSE;
    $custHistoryItemInfo = isset($custHistoryList['item_type_info']) ? $custHistoryList['item_type_info'] : FALSE;
    $custHistoryREPInfo = isset($custHistoryList['company_rep_info']) ? $custHistoryList['company_rep_info'] : FALSE;
}
?>
<div class="table-container">
   <div class="caption captionb20">
        <span class="caption-subject font-green-haze bold uppercase">History List</span>
    </div>
<!-- <div class="clearfix"></div>
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
    </div> -->
   <!--  <div class="table-responsive"> -->
    <table class="table table-striped table-bordered table-hover" id="datatable_history">
        <thead class="commissionHead">
            <tr role="row" class="heading">
                <th width="10%">  </th>
                <th width="1%"> Line</th>
                <th width="5%"> Invoice&nbsp;# </th>
                <th width="15%"> Invoice&nbsp;Date </th>
                <th width="10%"> Qty </th>
                <th width="10%"> PO Total </th>
                <?php 
                    if($custHistoryItemInfo != FALSE){
                        foreach($custHistoryItemInfo as $itemInfo){
                            $labelName = isset($itemInfo['name']) ? $itemInfo['name'] : '-';
                            echo '<th> '.$labelName.' - Total</th>';
                        }
                    }

                    //$colspan1 = '6' + count($custHistoryItemInfo);
                ?>
                 <?php if($userType !='sales_rep'){?> 
                <th width="10%"> CommTotal</th>
                <?php } ?>
                 <?php 
                    if($custHistoryREPInfo != FALSE){
                        foreach($custHistoryREPInfo as $srefInfo){
                            $labelName = isset($srefInfo['name']) ? $srefInfo['name'] : '-';
                            $labelCodeName = isset($srefInfo['cust_code']) ? $srefInfo['cust_code'] : '-';
                            echo '<th> '.$labelName.'<br/>'.$labelCodeName.' </th>';
                        }
                    }

                    //$colspan2 = count($custHistoryItemInfo) + '1';
                ?>
                <th width="10%"> CommPaid </th>
                
            </tr>
                     
        </thead>
        <tbody> 
          <?php 
         
          $i=0;
          if($custHistoryListInfo != FALSE){
                //echo '<pre>';print_r($custHistoryListInfo);exit();
                foreach($custHistoryListInfo as $poInfo){
                    $i++;
                    $tableContent = '<tr>';
                    $po_Id  =isset($poInfo['po_id']) ? $poInfo['po_id'] :  FALSE;
                    $po_number  =isset($poInfo['po_number']) ? $poInfo['po_number'] :  FALSE;
                    $invoice_number  =isset($poInfo['invoice_number']) ? $poInfo['invoice_number'] :  FALSE;
                                       
                    $po_date  =(isset($poInfo['po_date']) && validateDate($poInfo['po_date'])) ? date('m/d/Y',strtotime($poInfo['po_date']))  :  FALSE;
                    $invoice_date  =(isset($poInfo['invoice_date']) && validateDate($poInfo['invoice_date'])) ? date('m/d/Y',strtotime($poInfo['invoice_date']))  :  FALSE;
                    
                    $comm_paid_date  =$poInfo['comm_paid_date'];
                    $po_tqty  =isset($poInfo['po_tqty']) ? $poInfo['po_tqty'] :  0.00;
                    $id_inv_com  =isset($poInfo['comm_id']) ? $poInfo['comm_id'] :  FALSE;
                    $po_total  =isset($poInfo['po_total']) ? $poInfo['po_total'] :  0.00;
                    $save_status  =isset($poInfo['save_status']) ? $poInfo['save_status'] :  FALSE;
                    if($save_status == 'default'){

                      $commission_total = isset($poInfo['commission_total']) ? $poInfo['commission_total'] :  0.00;

                    }elseif ($save_status == 'percent') {

                      $commission_total = isset($poInfo['total_commission_percentage']) ? $poInfo['total_commission_percentage'] :  0.00;

                    }
                    else{

                      $commission_total = isset($poInfo['total_commission_dollar']) ? $poInfo['total_commission_dollar'] :  0.00;
                      
                    }
                    // $commission_total  =isset($poInfo['commission_total']) ? $poInfo['commission_total'] :  0.00;
                    // $total_commission_percentage  =isset($poInfo['total_commission_percentage']) ? $poInfo['total_commission_percentage'] :  0.00;
                    // $total_commission_dollar  =isset($poInfo['total_commission_dollar']) ? $poInfo['total_commission_dollar'] :  0.00;
                    $totals  =isset($poInfo['totals']) ? $poInfo['totals'] :  array();
                    $REP  =isset($poInfo['REP']) ? $poInfo['REP'] :  array();

                    $viewCommLink =  ($id_inv_com !=FALSE) ?$base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;  
                    $AddCommLink =  ($id_inv_com ==FALSE) ? $base_url.'commission/add/'.$po_Id : FALSE;
                    $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;

                  $commLink ='<div class="clearfix">';
            if( $AddCommLink != FALSE && $createCommAction == TRUE){
             $commLink .='<a href="'.$AddCommLink.'" class="btn btn-circle btn-icon-only green tooltips" data-container="body" data-placement="top" data-original-title="Add Commission">
                <i class="fa fa-plus"></i>
            </a>';
            }
            if( $EditCommLink != FALSE && $editCommAction == TRUE){
            $commLink .='<a href="'.$EditCommLink.'" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>';
              }  if( $viewCommLink != FALSE && $viewCommAction == TRUE){
            $commLink .='<a href="'.$viewCommLink.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static">
                <i class="fa fa-eye"></i>
            </a>';
             } 
            $commLink .='</div>'; 
                
                    $tableContent .= '<td>'.$commLink.'</td>';
                    $tableContent .= '<td>'.$i.'</td>';
                    $tableContent .= '<td>'.$invoice_number.'</td>';
                    $tableContent .= '<td>'.$invoice_date.'</td>';
                    $tableContent .= '<td>'.$po_tqty.'</td>';
                    $tableContent .= '<td>'.getCurrencyFormat($po_total).'</td>';
                    if($custHistoryItemInfo != FALSE){
                        foreach($custHistoryItemInfo as $key => $itemInfo){
                            $itemTotal = isset($totals[$key]) ? $totals[$key] : 0.00;
                            $tableContent .= '<td>'.getCurrencyFormat($itemTotal).'</td>';
                        }
                    }
                    if($userType !='sales_rep'){ 
                        $tableContent .= '<td>'.getCurrencyFormat($commission_total).'</td>';
                    }
                    if($custHistoryREPInfo != FALSE){
                        foreach($custHistoryREPInfo as $rkey => $srefInfo){
                            $rep_com_total = isset($REP[$rkey]['price']) ? $REP[$rkey]['price'] : 0.00;
                            $tableContent .= '<td>'.getCurrencyFormat($rep_com_total).'</td>';
                        }
                    }
                    $tableContent .= '<td>'.$comm_paid_date.'</td>';
                    
                    $tableContent .= '</tr>';
          ?>


          <?php
            echo $tableContent;
           }
            
          } 
            
          ?>
        </tbody>
    </table>
   <!--  </div> -->
</div>
<script type="text/javascript">
    jQuery(document).ready(function(e) {
var table = jQuery('#datatable_history');

        var oTable = table.dataTable({

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                  "info": "<?php echo $this->lang->line('Showing'); ?> _START_ <?php echo $this->lang->line('to'); ?> _END_ <?php echo $this->lang->line('of'); ?> _TOTAL_ History",
                "infoEmpty": "No History found",
                "infoFiltered": "(filtered1 from _MAX_ total History)",
                "lengthMenu": "_MENU_ History",
                "search": "<?php echo $this->lang->line('search'); ?>:",
                "zeroRecords": "No matching records found"
            },

        

            buttons: [
                // { extend: 'pdf', className: 'btn default' },
                // { extend: 'csv', className: 'btn default' }
            ],

            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", 
        });
    });
    
</script>