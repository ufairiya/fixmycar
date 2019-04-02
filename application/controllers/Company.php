<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if user already logged in then redirect the user to dashboard page
		if(!is_user_active('', FALSE))
		{
			redirect('login');
			
		}
		//$this->load->model('type_model');
		$this->userType =  get_user_type();
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
		$this->quickViewCompany = array(
			'View Customer' => array('icon'=>'icon-users','href'=>BASE_URL.'/company'),
			'Add Customer' => array('icon'=>'icon-user','href'=>BASE_URL.'/company/create'),
		);
		$this->quickPageTop = array(
			'Add Customer' => array('icon'=>'icon-user','href'=>BASE_URL.'/company/create'),	
			'View Customer Type' =>  array('icon'=>'icon-user','href'=>BASE_URL.'/type/customer_type'),
			'View Customer' => array('icon'=>'icon-users','href'=>BASE_URL.'/company'),
			
		);
		$this->companyInfo = getCompanyDetails(array('company_status'=>1),'result','',$option=array('format'=>'array'));
		$this->load->model('type_model');
		$this->load->model('company_model');
		$this->load->model(array('purchase_order_model'=>'invoice'));

		/*Customer*/
		$this->deleteCustAction = (user_access_permission('delete_customer') == TRUE) ? TRUE : FALSE;
		$this->viewCustAction = (user_access_permission('view_customer') == TRUE) ? TRUE : FALSE;
		$this->createCustAction = (user_access_permission('create_new_customer') == TRUE) ? TRUE : FALSE;
		$this->editCustAction = (user_access_permission('edit_customer') == TRUE) ? TRUE : FALSE;
        
        /*Invoice*/
		$this->deleteInvAction = (user_access_permission('delete_invoice') == TRUE) ? TRUE : FALSE;
		$this->viewInvAction = (user_access_permission('view_invoice') == TRUE) ? TRUE : FALSE;
		$this->createInvAction = (user_access_permission('create_invoice') == TRUE) ? TRUE : FALSE;
		$this->editInvAction = (user_access_permission('edit_invoice') == TRUE) ? TRUE : FALSE;

		 /*Commission*/
		$this->deleteCommAction = (user_access_permission('delete_commission') == TRUE) ? TRUE : FALSE;
		$this->viewCommAction = (user_access_permission('view_commission') == TRUE) ? TRUE : FALSE;
		$this->createCommAction = (user_access_permission('create_commission') == TRUE) ? TRUE : FALSE;
		$this->editCommAction = (user_access_permission('edit_commission') == TRUE) ? TRUE : FALSE;
	}

	public function index()
	{		
		
		$entries_val= $this->session->userdata('entrieval');
		$data['deleteCustAction'] = $this->deleteCustAction;
		$data['viewCustAction'] = $this->viewCustAction;
		$data['createCustAction'] =$this->createCustAction;
		$data['editCustAction'] = $this->editCustAction;
		$data['NewpoTop']  = ($this->createCustAction) ? TRUE : FALSE;	
		$data['base_url'] = base_url();
		$data['title']  = "List of Customer";
		$data['quickView']  = ($this->createCustAction) ? $this->quickViewCompany : FALSE;
		$data['pageTop']  = ($this->createCustAction) ? $this->quickPageTop  : FALSE;	
		$data['view_file']  = "company/company_list";
		$data['userType']  = $this->userType;
		$data['current_menu']  = "company";
		$data['entries_val']  = $entries_val;
		$data['customer_type_details'] = $this->type_model->get_customer_type();
		//print_r($data['customer_type_details']);
		$option = array(
			'orderby'=>'company_cust_code',
			'disporder'=>'DESC',

		);

		if($this->input->get())
		{
		$status=$_GET['status'];
		}else
		{
			$status="";
		}

		// if(!is_admin() && $this->userType == 'sales_rep'){
		// 	$option = array(
		// 		'orderby'=>'company_cust_code',
		// 		'disporder'=>'DESC',
		// 		'groupby'=>'id_company'
		// 	);
		// 	$user_id = get_active_user_id();
			
			
			
		// 	// $data['list_of_company'] = $this->invoice->getSalesRepCustomerInfo(array('sales_rep_id'=>$user_id),'',$option,'result',array('custinfo'=>TRUE));
		// 	$data['list_of_company'] = $this->invoice->getCustomerBySalesREP($user_id);
		// 	// echo '<pre>';print_r($data['list_of_company']);
		// 	// echo $this->db->last_query();
		// 	// exit;
		// }
		// else 
	

		 if($status =='active'){
			$data['list_of_company']  = $this->company_model->getCompany($param=array('company_status' => 1), $column='',$option);
			//print_r($data['list_of_company']);
			$data['current_menu']  = "active_customer";
		}
		else if($status =='inactive'){
			$data['list_of_company']  = $this->company_model->getCompany($param=array('company_status' => 3), $column='',$option);
			$data['current_menu']  = "inactive_customer";
		}
		else if($status =='pilot'){
			$data['list_of_company']  = $this->company_model->getCompany($param=array('company_status' => 4), $column='',$option);
			$data['current_menu']  = "pilot_customer";
		}
		else {
			$data['list_of_company']  = $this->company_model->getCompany($param=array(), $column='',$option);
		}
	

		$this->template->load_frontend_template($data);
	}
	public function entries_val()
	{
		$entriesval=$this->input->post('entrieval');
		$this->load->library('session');
		$this->session->set_userdata('entrieval',$entriesval);
		$result=$this->session->userdata('entrieval');
		   $aResponse['status']=TRUE;    
		   $aResponse['result']=$result;
			echo json_encode($aResponse);
		
	}
	public function search_cus_type()
	{
		
		$cus_type=$this->input->post('cus_type');
		$option = array(
			'orderby'=>'company_cust_code',
			'disporder'=>'DESC',
			);
		if($cus_type =='all' )
		{
			$list_of_company  = $this->company_model->getCompany($param=array(), $column='',$option);
		}
		else if($cus_type =='active')
		{
			$list_of_company  = $this->company_model->getCompany($param=array('company_status' => 1), $column='',$option);
		}
		else if($cus_type =='inactive')
		{
			$list_of_company  = $this->company_model->getCompany($param=array('company_status' => 3), $column='',$option);
		}
		else if($cus_type =='pilot')
		{
			$list_of_company  = $this->company_model->getCompany($param=array('company_status' => 4), $column='',$option);
		}
		else{
			$list_of_company  = $this->company_model->getCompany($param=array('customer_type' => $cus_type), $column='',$option);
		}
		   $result=$this->getcus_typeval($list_of_company);
		   $aResponse['status']=TRUE;    
		   $aResponse['result']=$result;
			echo json_encode($aResponse);
	}
	public function getcus_typeval($list_of_company =array())
	{
		$format = '';
      if ($list_of_company == false)
      {
         return false;
      }
        $deleteCustAction = $this->deleteCustAction;
		$viewCustAction = $this->viewCustAction;
		$createCustAction =$this->createCustAction;
		$editCustAction = $this->editCustAction;
		$quickView  = ($this->createCustAction) ? $this->quickViewCompany : FALSE;
		$userType  = $this->userType;
		$base_url = base_url();
      $i = 0;
      foreach($list_of_company as $userkey =>$companyInfo)
      {
        $i++;
	 $urefNumber = isset($companyInfo->company_cust_code) ? $companyInfo->company_cust_code : '';
      $companyname = isset($companyInfo->company_name) ? $companyInfo->company_name  :'';
      $fname = isset($companyInfo->company_contact) ? $companyInfo->company_contact  :'';
      $phone = isset($companyInfo->company_phone) ? $companyInfo->company_phone  :'';
      $extention = isset($companyInfo->extention) ?$companyInfo->extention  :'';
      if($phone !='Null' && $extention !='' )
      {
      $ext=', ext '.$extention;
    }
      else{
        $ext ='';
      }
      
      $email_address = isset($companyInfo->company_email_address) ? $companyInfo->company_email_address  :'';
      $status = isset($companyInfo->company_status) ? $companyInfo->company_status  :'';
      $companyId = isset($companyInfo->id_company) ? $companyInfo->id_company  :'';
      $customer_type = isset($companyInfo->cust_type_name) ? $companyInfo->cust_type_name  :'';
      $active_rep = 0;
      if($status == 4)
      {
        $dispstatus = '<span class="label label-sm label-warning"> Pilot </span>' ;
      }
        
     else{
     $dispstatus = ($status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-info"> InActive </span>' );
     }
      if(!is_admin() && $userType !='sales_rep'){
       $active_rep = isset($companyInfo->active_rep) ? $companyInfo->active_rep  :'';
         $dispLinkstatus = ($active_rep == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : '<span class="label label-sm label-info"> InActive </span>' ;
      }else{
        

          $dispLinkstatus  ='';
          $active_rep = 1;
      }
    
		                      
     $aActions = array(
        // 'Edit' => array('icon'=>'fa fa-edit','href'=>$base_url.'company/get_company_template/'.$companyId,'popup'=>'data-target="#ajax" data-toggle="modal"'),
        'View' => array('icon'=>'icon-docs','href'=>$base_url.'company/view/'.$companyId),
        'Delete' => array('icon'=>'icon-trash',
          'class'=>"mt-sweetalert-delete",
          'href'=>'#','popup'=>'data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete" data-confirm-button-text="Yes" data-task="d" data-uid="'.$companyId.'"'
          ),
        'Create PO' => array('icon'=>'icon-docs','href'=>$base_url.'purchase_order/create/'.$companyId),

      );
     $viewLink = $base_url.'company/view/'.$companyId;
     
      
        $format .='<tr>
           <td style="display: none">'.$i.'</td>
           <td>'.$urefNumber.'</td>
            <td>'.$companyname.'</td>
            <td>'.$fname.' </td>
          <td>'.$phone.$ext.' </td> 
           <td>'.$customer_type.' </td>        
           <td>'.$email_address.' </td>';
            if(!is_admin() && $userType !='sales_rep'){
            $format .='<td>'.$dispLinkstatus.' </td>';
            } 
            $format .='<td><div style="width:100px !important;">';
             if($viewCustAction == TRUE && $active_rep == 1 || $active_rep != 1){ 
             $format .=' <a class="btn btn-circle btn-icon-only btn-default" href="'.$viewLink.'">
              <i class="fa fa-eye"></i>
              </a>';
             } 
             if($status !=2  && $deleteCustAction  == TRUE){
             $format .='<a class=" btn btn-circle btn-icon-only btn-default mt-sweetalert-delete" data-title="Do you want delete this user?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="p" data-uid="'.$companyId.'" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </a>';
             } 
             $format .='</div>
             </td> <td>'.$dispstatus.' </td>
        </tr>';
         
     }
   
     return $format;
	}
	public function updateCustomer_staus(){
		$aResponse['status']=FALSE;
		$aResponse['message']='Can\'t Update';
		if($this->input->is_ajax_request())
			{
				
				$cid = $this->input->post('customer_id');
				//echo "dhjfhjgh";
				 $status_val = $this->input->post('status');
				$data=array('company_status'=>$status_val);
				$this->db->where('id_company',$cid);
                $this->db->update('company',$data);
                //echo $this->db->last_query();exit;
                $aResponse['status']=TRUE;
		        $aResponse['message']='Customer Status Update Successfully';
		        $aResponse['status_val']=$status_val;
			}
			echo json_encode($aResponse);
	}

	public function customer_delete(){
		$aResponse['status']=FALSE;
		$aResponse['message']='Can\'t Delete';

		if ($this->input->is_ajax_request()){	
			$cid = $this->input->post('cid');
			$type = $this->input->post('type');
			$key = $this->input->post('key');
			$task = $this->input->post('task');
			if( $type =='contact'){
				$aResponse['message']='Can\'t Delete Contact - In Use';
			}
			if($task == 'd' && $type =='contact' && $key != FALSE){
				$delete = $this->company_model->delete('company_contact',array('id_company_contact'=>$key));
				$aResponse['status']=TRUE;
				$aResponse['message']='User Contact Deleted Successfully';
			}
			if($task == 'd' && $type =='address' && $key != FALSE && $cid != FALSE){
				$this->load->model('purchase_order_model');
				$custAddressCount = $this->purchase_order_model->getPurchaseOrder(array('company_id'=>1),'count(*)',array('or_where'=>array('billing_address'=>$key,'shipping_address'=>$key)),'row');
				if($custAddressCount == 0){
					$delete = $this->company_model->delete('company_address',array('id_company_address'=>$key));
					$aResponse['status']=TRUE;
				    $aResponse['message']='User Address Deleted Successfully';
				}else{
					$aResponse['status']=FALSE;
				    $aResponse['message']='Can\'t Delete Address - In Use';
				}
			}

		}
		echo json_encode($aResponse);
	}

	public function view($company_id=''){

		$this->quickViewCompany = array(
			
			'View Customer' =>  array('icon'=>'icon-users','href'=>BASE_URL.'/company'),
			'Customer Info' =>  array('icon'=>'icon-users','href'=>BASE_URL.'/company/info/'.$company_id),
			'Purchase Orders' => array('icon'=>'icon-user','href'=>'#'),
			'Commission Details' => array('icon'=>'icon-user','href'=>'#'),
			'Customer History' => array('icon'=>'icon-user','href'=>'#'),
			
		);
		$rep_option = array(
				'orderby'=>'sort_order',
				'disporder'=>'ASC',
			);
		$aAssignedSalesRep = $this->company_model->getCustSalesRep(array('company_id'=>$company_id,'cust_map_status'=>1),$column='', $rep_option,'result',array('join'=>TRUE,'format'=>TRUE));

		$access_data['deleteCustAction'] = $this->deleteCustAction;
		$access_data['viewCustAction'] = $this->viewCustAction;
		$access_data['createCustAction'] =$this->createCustAction;
		$access_data['editCustAction'] = $this->editCustAction;

		$access_data['deleteInvAction'] = $this->deleteInvAction;
		$access_data['viewInvAction'] = $this->viewInvAction;
		$access_data['createInvAction'] =$this->createInvAction;
		$access_data['editInvAction'] = $this->editInvAction;

		$access_data['deleteCommAction'] = $this->deleteCommAction;
		$access_data['viewCommAction'] = $this->viewCommAction;
		$access_data['createCommAction'] =$this->createCommAction;
		$access_data['editCommAction'] = $this->editCommAction;

		

		$companyInfoData['base_url']  = base_url();
		$companyInfoData['assignedSalesREP']  = $aAssignedSalesRep;
		$companyInfoData['get_company'] = $this->company_model->getCompany(array('id_company'=>$company_id),'',array(),"row");	
		$companyInfoData = array_merge($companyInfoData,$access_data);
		
		$data['customerName'] = isset($companyInfoData['get_company']->company_name) ? $companyInfoData['get_company']->company_name : '';
		$data['customerID'] = isset($companyInfoData['get_company']->id_company) ? $companyInfoData['get_company']->id_company : '';
		$data['customerStatus'] = isset($companyInfoData['get_company']->company_status) ? $companyInfoData['get_company']->company_status : '';
		$data['companyDetailsView'] = $this->load->view('frontend/company/company_details',$companyInfoData,TRUE);
		$option = array(
			'orderby'=>'id_purchase_order',
			'disporder'=>'DESC',

		);
 

		/*Invoice Details*/
		$invoiceData['company_id'] = $company_id;
		 $invoiceData['custInvoiceList'] = $this->invoice->getPurchaseOrder($param=array('company_id'=>$company_id,'po_status'=>1), $column='',$option);
		 //echo "<pre>";print_r( $invoiceData['custInvoiceList']);echo "</pre>";
		//$invoiceData['custInvoiceList'] = FALSE;
		$invoiceData = array_merge($invoiceData,$access_data);
		$data['customerInvoices'] = $this->load->view('frontend/company/company_invoices',$invoiceData,TRUE);

		/*commission Details*/
		$commissionData['company_id'] = $company_id;
		$commissionData['userType'] = $this->userType;
		 $commissionData['custCommissionList'] = $this->invoice->getInvoiceCommission(array('company_ids'=>$company_id,'comm_status'=>1),'',array('orderby'=>'id_inv_com','disporder'=>'DESC')); 
		//$commissionData['custCommissionList'] = FALSE;
		$commissionData = array_merge($commissionData,$access_data);
		$data['customerCommission'] = $this->load->view('frontend/company/company_commission',$commissionData,TRUE);

		/*Customer History*/
		$historyInfo = $this->invoice->getCustomerHistoryFormat($company_id);
		$historyData['company_id'] = $company_id;
		$historyData['userType'] = $this->userType;
		$historyData['custHistoryList'] = $historyInfo;
		//echo "<pre>";print_r( $historyData['custHistoryList']);echo "</pre>";
		$historyData = array_merge($historyData,$access_data);
		$data['customerHistory'] = $this->load->view('frontend/company/company_history',$historyData,TRUE);
		// echo '<pre>';
		// print_R($historyInfo);
		// exit;
		
		$data['base_url'] = base_url();
		$data['title']  = "View Customer";
		$data['assignedSalesREP']  = $aAssignedSalesRep;
		$data['view_file']  = "company/company_view";
		$data['current_menu']  = "company";	
		$data['userType'] = $this->userType;
		
		$data['quickView']  = ($this->createCustAction) ? $this->quickViewCompany : FALSE;
		$data['pageTop']  = ($this->createCustAction) ? $this->quickPageTop  : FALSE;

		

		$this->template->load_frontend_template($data);
	}

	public function invoice_search(){
		// echo '<pre>';
		// print_R($this->input->post());
		// $aResponse['status'] = FALSE;
		// $aResponse['result'] = '';
		$aResponse = array();
		$company_id = $this->input->post('cid');
		$invoiceNo = $this->input->post('invoiceNo');
		$po_no = $this->input->post('po_no');
		$invDateFrom = $this->input->post('invDateFrom');
		$invDateTo = $this->input->post('invDateTo');
		$invAmtFrom = $this->input->post('invAmtFrom');
		$invAmtTo = $this->input->post('invAmtTo');
		$invQty = $this->input->post('invQty');
		$param = array('company_id'=>$company_id,'po_status'=>1);
		$option = array('orderby'=>'id_purchase_order','disporder'=>'DESC');
		$invDateFrom = ($invDateFrom != '') ? date('Y-m-d',strtotime($invDateFrom)) : FALSE;;
		$invDateTo = ($invDateTo != '') ? date('Y-m-d',strtotime($invDateTo)) : FALSE;
		if(validateDate($invDateFrom)){
			$fromPoDate = date('Y-m-d',strtotime($invDateFrom));
		}else{
			$fromPoDate = FALSE;
		}
		if(validateDate($invDateTo)){
			$toPoDate = date('Y-m-d',strtotime($invDateTo));
		}else{
			$toPoDate = FALSE;
		}
		if($fromPoDate != FALSE && $toPoDate != FALSE ){
			$option['or_where_date'] = array('invoice_date >='=>$fromPoDate,'invoice_date <='=>$toPoDate);
		}

		if($invoiceNo != FALSE){
			$param['invoice_number'] = $invoiceNo;
		}
		if($po_no != FALSE){
			$param['po_number'] = $po_no;
		}
		if($invQty != FALSE){
			$param['po_total_qty >='] = $invQty;
		}

		if($invAmtFrom != FALSE && $invAmtTo != FALSE ){
			$option['or_where_amt'] = array('po_net_amount >='=>$invAmtFrom,'po_net_amount <='=>$invAmtTo);
		}
		
		if($company_id != FALSE){
			// if(!is_admin() && $this->userType =='sales_rep'){
			// 	$param['sales_rep_id']=get_active_user_id();
			// 	$result = $this->invoice->getPurchaseOrderSearch($param, $column='',$option,'result',array('sales_rep'=>TRUE));
			// }else{
				$result = $this->invoice->getPurchaseOrderSearch($param, $column='',$option);
			// }
			
			 //echo $this->db->last_query();

			$aResponse['data'] =  $this->invoiceSearchAjaxFormat($result);
			echo json_encode($aResponse);
			exit;
		}
		echo json_encode($aResponse);
		exit;
	}

	public function commission_search(){
		// echo '<pre>';
		// print_R($this->input->post());
		// $aResponse['status'] = FALSE;
		// $aResponse['result'] = '';
		$aResponse = array();
		$company_id = $this->input->post('cid');
		$invoiceNo = $this->input->post('invoiceNo');
		$invDateFrom = $this->input->post('invDateFrom');
		$invDateTo = $this->input->post('invDateTo');
		$invAmtFrom = $this->input->post('invAmtFrom');
		$invAmtTo = $this->input->post('invAmtTo');
		$invQty = $this->input->post('invQty');
		$comAmtFrom = $this->input->post('comAmtFrom');
		$comAmtTo = $this->input->post('comAmtTo');
		$comPaidStatus = $this->input->post('comPaidStatus');
		$param = array('company_id'=>$company_id,'po_status'=>1);
		$option = array('orderby'=>'id_inv_com','disporder'=>'DESC');
		$invDateFrom = ($invDateFrom != '') ? date('Y-m-d',strtotime($invDateFrom)) : FALSE;;
		$invDateTo = ($invDateTo != '') ? date('Y-m-d',strtotime($invDateTo)) : FALSE;
		if(validateDate($invDateFrom)){
			$fromPoDate = date('Y-m-d',strtotime($invDateFrom));
		}else{
			$fromPoDate = FALSE;
		}
		if(validateDate($invDateTo)){
			$toPoDate = date('Y-m-d',strtotime($invDateTo));
		}else{
			$toPoDate = FALSE;
		}
		if($fromPoDate != FALSE && $toPoDate != FALSE ){
			$option['or_where_date'] = array('invoice_date >='=>$fromPoDate,'invoice_date <='=>$toPoDate);
		}

		if($comPaidStatus == 'paid'){
			$param['comm_paid_date !='] = '0000-00-00';
		}

		if($comPaidStatus == 'unpaid'){
			$param['comm_paid_date'] = NULL;
			$option['or_where'] = array('comm_paid_date'=>'0000-00-00');
		}

		if($invoiceNo != FALSE){
			$param['invoice_number'] = $invoiceNo;
		}
		if($invQty != FALSE){
			$param['po_total_qty >='] = $invQty;
		}

		if($invAmtFrom != FALSE && $invAmtTo != FALSE ){
			$option['or_where_amt'] = array('po_net_amount >='=>$invAmtFrom,'po_net_amount <='=>$invAmtTo);
		}

		if($comAmtFrom != FALSE && $comAmtTo != FALSE ){
			$option['or_where_amt1'] = array('total_commission >='=>$comAmtFrom,'total_commission <='=>$comAmtTo);
		}
		$option['groupby']= 'id_inv_com';
		if($company_id != FALSE){
			// if(!is_admin()  && $this->userType =='sales_rep'){
			// 	$param['sales_rep_id']=get_active_user_id();
			// 	$result = $this->invoice->getInvoiceCommissionSearch($param, $column='',$option,'result',array('sales_rep'=>TRUE));
			// }else{
				
				$result = $this->invoice->getInvoiceCommissionSearch($param, $column='',$option);	

				//echo '<pre>'; print_r($result);exit;		
			// }
			
			$aResponse['data'] =  $this->commissionSearchAjaxFormat($result);
			echo json_encode($aResponse);
			exit;
		}
		echo json_encode($aResponse);
		exit;
	}

	public function invoiceSearchFormat($result){
		$tableContent = FALSE;
		$base_url = base_url();
		 if($result != FALSE){
		 	 $tableContent = '';
		 	 $i=0;
		 	foreach($result as $custInvoice){
                $i++;
                $tableContent .= '<tr>';
                $po_Id = isset($custInvoice->id_purchase_order) ? $custInvoice->id_purchase_order : FALSE;
                $po_number = isset($custInvoice->po_number) ? $custInvoice->po_number : FALSE;
                $po_date = (isset($custInvoice->po_date) && validateDate($custInvoice->po_date)) ? date('m/d/Y',strtotime($custInvoice->po_date)) : FALSE;
                $po_total_qty = isset($custInvoice->po_total_qty) ? $custInvoice->po_total_qty : FALSE;
                $po_net_amount = isset($custInvoice->po_net_amount) ? $custInvoice->po_net_amount : FALSE;
                $id_inv_com = isset($custInvoice->id_inv_com) ? $custInvoice->id_inv_com : '';
                $po_status = isset($custInvoice->po_status) ? $custInvoice->po_status : FALSE;
                $status = ($po_status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($po_status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
               $viewCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;  
                $AddCommLink =  ($id_inv_com ==FALSE) ? $base_url.'commission/add/'.$po_Id : FALSE;
                $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;

                $commLink ='<div class="clearfix">';
            if( $AddCommLink != FALSE){
             $commLink .='<a href="'.$AddCommLink.'" class="btn btn-circle btn-icon-only green tooltips" data-container="body" data-placement="top" data-original-title="Add Commission">
                <i class="fa fa-plus"></i>
            </a>';
            }
            if( $EditCommLink != FALSE){
            $commLink .='<a href="'.$EditCommLink.'" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>';
              }  if( $viewCommLink != FALSE){
            $commLink .='<a href="'.$viewCommLink.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static">
                <i class="fa fa-eye"></i>
            </a>';
             } 
            $commLink .='</div>'; 
                
                    
                    $tableContent .= '<td>'.$i.'</td>';
                    $tableContent .= '<td>'.$po_number.'</td>';
                    $tableContent .= '<td>'.$po_date.'</td>';
                    $tableContent .= '<td>'.$po_total_qty.'</td>';
                    $tableContent .= '<td>'.'$'.$po_net_amount.'</td>';                    
                    $tableContent .= '<td>'.$status.'</td>';                    
                    $tableContent .= '</tr>';
            }
		 }
		 return $tableContent;
	}

	public function invoiceSearchAjaxFormat($result){
		
		$tableContent = FALSE;
		$base_url = base_url();
		$aData = array();
		 if($result != FALSE){
		 	 $tableContent = '';
		 	 $i=0;
		 	foreach($result as $custInvoice){
		 		$i++;
                 $Data = array();
                $tableContent .= '<tr>';
                $po_Id = isset($custInvoice->id_purchase_order) ? $custInvoice->id_purchase_order : FALSE;
                $po_number = isset($custInvoice->po_number) ? $custInvoice->po_number : FALSE;
               
                $po_date = (isset($custInvoice->po_date) && validateDate($custInvoice->po_date)) ? date('m/d/Y',strtotime($custInvoice->po_date)) : FALSE;
                $invoice_number = isset($custInvoice->invoice_number) ? $custInvoice->invoice_number : '-';
                $invoice_date = (isset($custInvoice->invoice_date) && validateDate($custInvoice->invoice_date)) ? date('m/d/Y',strtotime($custInvoice->invoice_date)) : '-/-/-';
                $po_total_qty = isset($custInvoice->po_total_qty) ? $custInvoice->po_total_qty : FALSE;
                $po_net_amount = isset($custInvoice->po_net_amount) ? $custInvoice->po_net_amount : FALSE;
                $id_inv_com = isset($custInvoice->id_inv_com) ? $custInvoice->id_inv_com : '';
                $po_status = isset($custInvoice->po_status) ? $custInvoice->po_status : FALSE;
                $status = ($po_status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($po_status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
               $viewCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;  
                $AddCommLink =  ($id_inv_com ==FALSE) ? $base_url.'commission/add/'.$po_Id : FALSE;
                $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;
                 
                $viewLink = BASE_URL.'/invoice/view/'.$po_Id.'?action=view';
                 $packageLink = BASE_URL.'/invoice/package/'.$po_Id.'?action=view';

				$downloadPsLink = BASE_URL.'/invoice/PackingSlipPDF/'.$po_Id.'?action=download';
				$downloadInvLink = BASE_URL.'/invoice/PDF/'.$po_Id.'?action=download';

                $commLink ='<div class="clearfix">';
            if( $AddCommLink != FALSE && $this->createCommAction  == TRUE){
             $commLink .='<a href="'.$AddCommLink.'" class="btn btn-circle btn-icon-only green tooltips" data-container="body" data-placement="top" data-original-title="Add Commission">
                <i class="fa fa-plus"></i>
            </a>';
            }
            if( $EditCommLink != FALSE && $this->editCommAction  == TRUE){
            $commLink .='<a href="'.$EditCommLink.'" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>';
              }  if( $viewCommLink != FALSE && $this->viewCommAction  == TRUE){
            $commLink .='<a href="'.$viewCommLink.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static">
                <i class="fa fa-eye"></i>
            </a>';
             } 
            $commLink .='</div>'; 

            $invEditLink = '';
            if($this->editInvAction){
            	$invEditLink .= '
            <a href="'.BASE_URL.'/invoice/edit/'.$po_Id.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="Edit Invoice" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
            <a href="'.BASE_URL.'/invoice/copy/'.$po_Id.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="Duplicate Invoice" data-toggle="tooltip"><i class="fa fa-copy"></i></a>';
            }
            if($this->viewInvAction){
            $invEditLink .= '
             
        <a class="btn btn-circle btn-icon-only grey-cascade fancybox btn-view tooltips" href="'.$viewLink.'" data-container="body" data-placement="top" data-original-title="View Invoice"  >
        <i class="fa fa-file-text-o"></i>
        </a>

         <a class="btn btn-circle btn-icon-only grey-cascade fancybox btn-view tooltips" href="'.$packageLink.'" data-container="body" data-placement="top" data-original-title="View Packing Slipt"   >
        <i class="fa fa-file-powerpoint-o"></i>
        </a>

        <a class=" btn btn-circle btn-icon-only btn-default mt-sweetalert-delete btn-delete" data-title="Do you want delete this invoice?" data-type="warning" data-allow-outside-click="true" data-show-confirm-button="true" data-show-cancel-button="true" data-cancel-button-class="btn-danger" data-cancel-button-text="No, I dont want Delete Permanently " data-confirm-button-text="Yes" data-task="d" data-uid="'.$po_Id.'" data-confirm-button-class="btn-info"><i class="icon-trash"></i>  </a>
                   
            ';
            }
            
            // $Data['id'] = $i;
            // $Data['po_number'] = $po_number;
            // $Data['po_date'] = $po_date;
            // $Data['po_total_qty'] = $po_total_qty;
            // $Data['po_net_amount'] ='$'.$po_net_amount;
            // $Data['status'] =$status;
            // $Data['commLink'] =$commLink;
            // $Data['editLink'] =$commLink;

            $Data[] = $invoice_number;
            $Data[] = $po_number;
            $Data[] = $invoice_date;
            $Data[] = $po_total_qty;
            $Data[] = getCurrencyFormat($po_net_amount);
            $Data[] =$commLink;
            $Data[] =$invEditLink;
            $Data[] =$status;
          
             $aData[] = $Data;    
                  
            }
		 }
		 return $aData;
	}

	public function commissionSearchAjaxFormat($result){
		
		$tableContent = FALSE;
		$base_url = base_url();
		$aData = array();
		//echo '<pre>';print_r($result);exit;
		 if($result != FALSE){
		 	 $tableContent = '';
		 	 $i=0;
		 	foreach($result as $custCommission){
		 		$i++;
                 $Data = array();
                $tableContent .= '<tr>';
                 $po_Id = isset($custCommission->id_purchase_order) ? $custCommission->id_purchase_order : FALSE;
                $po_number = isset($custCommission->po_number) ? $custCommission->po_number : FALSE;
                $po_date = (isset($custCommission->po_date) && validateDate($custCommission->po_date)) ? date('m/d/Y',strtotime($custCommission->po_date)) : FALSE;
                $po_total_qty = isset($custCommission->po_total_qty) ? $custCommission->po_total_qty : FALSE;
                $po_net_amount = isset($custCommission->po_net_amount) ? $custCommission->po_net_amount : FALSE;
                $id_inv_com = isset($custCommission->id_inv_com) ? $custCommission->id_inv_com : '';
                $po_status = isset($custCommission->po_status) ? $custCommission->po_status : FALSE;
                $comm_status = isset($custCommission->comm_status) ? $custCommission->comm_status : FALSE;

                $invoice_number = isset($custCommission->invoice_number) ? $custCommission->invoice_number : '-';
                $invoice_date = (isset($custCommission->invoice_date) && validateDate($custCommission->invoice_date)) ? date('m/d/Y',strtotime($custCommission->invoice_date)) : '-/-/-';
                $comm_paid_dates = (isset($custCommission->comm_paid_dates) ) ? $custCommission->comm_paid_dates : '-/-/-';
               $save_status = isset($custCommission->save_status) ? $custCommission->save_status : '';
               if($save_status == 'default'){

                  $total_commission = isset($custCommission->total_commission) ? $custCommission->total_commission : FALSE;

                }elseif ($save_status == 'percent') {

                  $total_commission = isset($custCommission->total_commission_percentage) ? $custCommission->total_commission_percentage : FALSE;

                }
                else{

                  $total_commission = isset($custCommission->total_commission_dollar) ? $custCommission->total_commission_dollar : FALSE;
                  
                }
                // $total_commission = isset($custCommission->total_commission) ? $custCommission->total_commission : FALSE;
                // $total_commission_percentage = isset($custCommission->total_commission_percentage) ? $custCommission->total_commission_percentage : FALSE;
                // $total_commission_dollar = isset($custCommission->total_commission_dollar) ? $custCommission->total_commission_dollar : FALSE;
                

                $comm_paid_date = (isset($custCommission->comm_paid_date) && validateDate($custCommission->comm_paid_date)) ? date('m/d/Y',strtotime($custCommission->comm_paid_date)) : '-/-/-';
                 $paidStatus = isset($custCommission->balance_amt) ? $custCommission->balance_amt : 0;
                $status = ($comm_status == 1) ? '<span class="label label-sm label-success">'.$this->lang->line('Active').'</span>' : (($comm_status == 2) ? '<span class="label label-sm label-danger">'.$this->lang->line('deleted').'</span>' : '<span class="label label-sm label-warning"> '.$this->lang->line('not_active').' </span>' );
                $viewCommLink =  ($id_inv_com !=FALSE) ?$base_url.'commission/get_commission_template/'.$id_inv_com : FALSE;               
                $EditCommLink =  ($id_inv_com !=FALSE) ? $base_url.'commission/edit/'.$id_inv_com : FALSE;

                $commLink ='<div class="clearfix">';
           
            if( $EditCommLink != FALSE && $this->editCommAction == TRUE){
            $commLink .='<a href="'.$EditCommLink.'" class="btn btn-circle btn-icon-only red tooltips" data-container="body" data-placement="top" data-original-title="Edit Commission">
                <i class="fa fa-edit"></i>
            </a>';
              }  if( $viewCommLink != FALSE && $this->viewCommAction == TRUE){
            $commLink .='<a href="'.$viewCommLink.'" class="btn btn-circle btn-icon-only grey-cascade tooltips" data-container="body" data-placement="top" data-original-title="View Commission" data-target="#ajax" data-toggle="modal" data-backdrop="static">
                <i class="fa fa-eye"></i>
            </a>';
             } 
            $commLink .='</div>'; 
            if($paidStatus == 0){
			
				 $labelClass = 'upaid';
				 $paymentLabel = 'Zero Payment : <br/>';
				}if($paidStatus == 1){
				
				$labelClass = 'paid';
				$paymentLabel = 'Partial Payment : <br/>';
                 $comm_paid_date = $comm_paid_date.''.',<br/>-/-/-';
				}
				if($paidStatus == 2){
				
				$labelClass = 'fullpaid';
				$paymentLabel = 'Paid in Full : <br/>';
				}
            
            $Data[] = $i;
            $Data[] = $invoice_number;
            $Data[] = $invoice_date;
            $Data[] = $po_total_qty;
            $Data[] = getCurrencyFormat($po_net_amount);
            if($this->userType !='sales_rep'){
            	 $Data[] = getCurrencyFormat($total_commission);
            }
            $Data[] = '<p class="'.$labelClass.'" ><span style="font-size: 10px;font-weight: bold;;">'.$paymentLabel.'</span>'.$comm_paid_dates.'</p>';
            
            $Data[] =$status;
            $Data[] =$commLink;
                     
             $aData[] = $Data;    
                  
            }
		 }
		 return $aData;
	}
		
	public function address(){
		print_r($this->input->post());
	}

	public function select_sales_rep(){
		$q = $this->input->get('q');
		$aResponse = array();
		$salesREPInfo = $this->users_model->getUsers(array('user_type'=>'sales_rep','status'=>1),'result',FALSE,$where_or=array('first_name'=>$q,'last_name'=>$q));
		foreach ($salesREPInfo as $key => $salesRep) {
			$Response  = array();
			$id_user = isset($salesRep->id_user_master) ? $salesRep->id_user_master  :'';
			$fullName = isset($salesRep->fullName) ? $salesRep->fullName  :'';
			$Response['id'] = $id_user;
			$Response['name'] = $fullName;
			$aResponse['items'][] = $Response;
		}
		echo json_encode($aResponse);
		
	}

	public function get_customer_add_notes_temple($company_id = 0,$action='add'){
		if ($this->input->is_ajax_request()){			
			$data['base_url'] = base_url();	
			$data['companyId'] = $company_id;			
			$data['action_type'] = $action;			
			$data['title'] = ($action !='add') ? 'Edit Notes' : 'Add Notes';			
			$data['customer_notes'] = $this->company_model->getCompany(array('id_company'=>$company_id),'customer_notes',array(),"row");			
			$this->load->view('frontend/company/company_note_edit_template',$data);		
		}
	}

	public function get_customer_add_sales_rep_temple($company_id = 0,$action='add'){
		if ($this->input->is_ajax_request()){	
			$rep_option = array(
				'orderby'=>'sort_order',
				'disporder'=>'ASC',
			);
		    $aAssignedSalesRep = $this->company_model->getCustSalesRep(array('company_id'=>$company_id,'cust_map_status'=>1),$column='', $rep_option,'result',array('join'=>TRUE,'format'=>TRUE));
		    $aSalesRepInfo = $this->company_model->getSalesREPNotAssigned($company_id,'format');

		    $previous  =FALSE;
		    if($aAssignedSalesRep != FALSE){
		    	$previous = array_keys($aAssignedSalesRep);
		    }
		    
		    $previous_sales ='';
		    if($previous != FALSE){
		    	$previous_sales = implode(',',$previous);
		    	$action = 'update';
		    }
		    $data['previous_sales_rep'] = $previous_sales;
		    $data['salesRep'] = $aSalesRepInfo;		
		    $data['assigned_salesRep'] = $aAssignedSalesRep;		
			$data['base_url'] = base_url();	
			$data['companyId'] = $company_id;			
			$data['action_type'] = $action;			
			$data['title'] = ($action !='add') ? 'Edit Assigned Sales REP' : 'Add Sales REP';			
			$data['customer_notes'] = $this->company_model->getCompany(array('id_company'=>$company_id),'customer_notes',array(),"row");			
			$this->load->view('frontend/company/customer_sales_rep_map',$data);		
		}
	}

	public function cust_sales_rep_map(){
		// echo '<pre>';
		// print_r($this->input->post());
		if ($this->input->is_ajax_request()){
		$company_id = $this->input->post('company_id');
		$sales_rep = $this->input->post('sales_rep');
		$action_type = $this->input->post('action_type');
		$aSalesRep = array();
		if($sales_rep != FALSE){
			$aSalesRep = explode(',',$sales_rep);
		}
		
		$previous_sales_rep = $this->input->post('previous_sales_rep');
		if($action_type == 'update' && $previous_sales_rep != FALSE ){
			// DELETE SALES REP
			
			if($previous_sales_rep != FALSE){
				$previous_sales_rep = explode(',',$previous_sales_rep);
			}else{
				$previous_sales_rep = array();
			}

			$salesREPDiff=array_diff($previous_sales_rep,$aSalesRep);

			if($salesREPDiff != FALSE && count($salesREPDiff) >0){
				$this->company_model->delete('cust_sales_rep_map',array(
					'company_id'=>$company_id,
					'where_in'=>array(
					'id_sales_rep'=>$salesREPDiff
				)));
			}
		}

		
		if(count($aSalesRep) > 0 && $aSalesRep != FALSE){
			foreach($aSalesRep as $skey => $sval){
				$aSalesREPData = array(
					'id_sales_rep'=>$sval,
					'sort_order'=>$skey,
					'company_id'=>$company_id,
					'cust_map_status'=>1,
				);

				$aSalesCondition = array(
					'company_id'=>$company_id,
					'id_sales_rep'=>$sval,
				);
				$this->company_model->insert_cust_sales_rep_map($aSalesREPData,$aSalesCondition);
			}
		}
		
	   }
		
	}

	

	public function custnotes_save(){
		
		if ($this->input->is_ajax_request()){
		$company_id = $this->input->post('company_id');
			if($company_id !=''){
				$cust_notes = $this->input->post('cust_notes');
				$NotesData = array(
				'customer_notes' =>$cust_notes
				);
				$NotesDataCondition = array(
					'id_company'=>$company_id
				);
				return $this->company_model->company_update($NotesData,$NotesDataCondition);
			}
			return TRUE;
	  }
	  return FALSE;
	}


	public function create_new_user()
	{		
		// echo '<pre>';
		// print_r($this->input->post());
		// exit;
		
		if ($this->input->is_ajax_request()){
			$usetType = $this->input->post("user_type");
			$userCustCode = $this->input->post('sales_rep_number');
			$create_new_user = array(
				"first_name"=>$this->input->post("first_name"),
				"last_name"=>$this->input->post("last_name"),
				"phone"=>'',
				"extention"=>'',
				"username"=>$this->input->post("username"),
				"email"=>$this->input->post("useremail"),
				"password"=>sha1($this->input->post("password")),
				"tumb_pass"=>sha1($this->input->post("password")),
				"user_notes"=>$this->input->post("sales_notes"),
				"user_type"=>$usetType,
				"user_cust_code"=>$userCustCode,
				"created_on"=>getCurrentDateTime(),						
			);
			// print_r($create_new_user);
			// exit;
			$this->usertracking->track_this("New  user create");
			$user_id = $this->users_model->user_insert($create_new_user);

			$useraddress = $this->input->post('address');
				if(count($useraddress) > 0 &&  $user_id !=''){
					foreach($useraddress as $key => $user_address){
						$street_address = isset($user_address['street_address']) ? $user_address['street_address'] : '';
						$city = isset($user_address['city']) ? $user_address['city'] : '';
						$state = isset($user_address['state']) ? $user_address['state'] : '';
						$postcode = isset($user_address['postcode']) ? $user_address['postcode'] : '';
						$country = isset($user_address['country']) ? $user_address['country'] : '';
						$address_type = 'address_'.$key;

						$address_label = isset($user_address['address_label']) ? $user_address['address_label'] : 'Address';
						
						if($street_address == ''){
							continue;
						}
						$userAddressData = array(
							'pk_id_user'=>$user_id,					
							'address_1'=>$street_address,
							'city'=>$city,
							'state'=>$state,
							'counry'=>$country,
							'post_code'=>$postcode,					
							'phone_number'=>'',
							'extention'=>'',
							'address_created_on'=>getCurrentDateTime(),
							'address_status'=>1,
							'address_type'=>$address_type,
							'address_label'=>$address_label,
					    );
						$userAddressDataCondition = array(
							'pk_id_user'=>$user_id,
							'address_type'=>$address_type,
						);
					    $user_address_id = $this->users_model->insert_user_address($userAddressData,$userAddressDataCondition);

					}
				}	

				// Contact Insert/Update
				$usercontact = $this->input->post('contact_phone');
				if(count($usercontact) > 0 && $user_id !=''){
					foreach($usercontact as $key => $user_contact){
						$number = isset($user_contact['number']) ? $user_contact['number'] : '';
						$type = isset($user_contact['type']) ? $user_contact['type'] : '';
						$extention = isset($user_contact['extention']) ? $user_contact['extention'] : '';
						if($type !='' && $number!=''){
							$contact_label = 'contact_'.$key;
							$userContactData = array(
							'pk_id_user'=>$user_id,					
							'contact_type'=>$type,
							'contact_number'=>$number,
							'extention'=>$extention,
							'contact_label' =>$contact_label,
							'contact_status'=>1
							);
							$userContactDataCondition = array(
								'pk_id_user'=>$user_id,					
								'contact_label' =>$contact_label,
							
							);
						 $this->users_model->insert_user_contact($userContactData,$userContactDataCondition);
						}
						
					}
				}
							
				
		}
			
		
	}

	public function update_user(){
		// echo '<pre>';
		// print_r($this->input->post());
		if ($this->input->is_ajax_request()){
			$id_user_master = $this->input->post("user_id");			
			$user_cust_code = $this->input->post("user_cust_code");
			$userType = $this->input->post("user_type");
			$userCustCode = $this->input->post('sales_rep_number');
			
			$update_user = array(
				"first_name"=>$this->input->post("first_name"),
				"last_name"=>$this->input->post("last_name"),
				"phone"=>$this->input->post("phone"),
				"extention"=>$this->input->post("extention"),
				"country_code"=>$this->input->post("country_code"),
				"username"=>$this->input->post("username"),
				"email"=>$this->input->post("useremail"),				
				"user_type"=>$userType,
				"user_cust_code"=>$userCustCode,
				"user_notes"=>$this->input->post("sales_notes"),
				"update_on"=>getCurrentDateTime(),	
				"status"=>$this->input->post("user_status"),					
			);
			// Update Customer Sales REP
			if($this->input->post("user_status") != FALSE){
			  $status =	$this->input->post("user_status");
			  $this->company_model->user_sales_rep_map_update(array('cust_map_status'=>$status),array('id_sales_rep'=>$id_user_master));
			}
			if($this->input->post("password") != ""){
				$this->usertracking->track_this("Updating User Password");
				$update_user["password"] = sha1($this->input->post("password"));
				$update_user["tumb_pass"]=$this->input->post("password");
			}

			$this->usertracking->track_this("Updating User ");
			$this->users_model->user_update($update_user,array("id_user_master"=>$id_user_master));

			if($id_user_master != FALSE && $userType !='superuser'){

				$useraddress = $this->input->post('address');
				if(count($useraddress) > 0){
					foreach($useraddress as $key => $user_address){
						$street_address = isset($user_address['street_address']) ? $user_address['street_address'] : '';
						if($street_address == ''){
							continue;
						}
						$city = isset($user_address['city']) ? $user_address['city'] : '';
						$state = isset($user_address['state']) ? $user_address['state'] : '';
						$postcode = isset($user_address['postcode']) ? $user_address['postcode'] : '';
						$country = isset($user_address['country']) ? $user_address['country'] : '';
						$id_user_address = isset($user_address['id_user_address']) ? $user_address['id_user_address'] : '';
						
						$address_label = isset($user_address['address_label']) ? $user_address['address_label'] : 'Address';
						$address_type = 'address_'.$key;
							$userAddressData = array(
							'pk_id_user'=>$id_user_master,					
							'address_1'=>$street_address,
							'city'=>$city,
							'state'=>$state,
							'counry'=>$country,
							'post_code'=>$postcode,					
							'address_type'=>$address_type,					
							'phone_number'=>$this->input->post("phone"),
							'extention'=>$this->input->post("extention"),
							'address_created_on'=>getCurrentDateTime(),
							'address_label'=>$address_label,
							'address_status'=>1,
							
					    );					    

			    if($id_user_address > 0){
				 $user_id = $this->users_model->user_address_update($userAddressData,array("id_user_address"=>$id_user_address
				 	));
			    }else{
			    	$userAddressData['pk_id_user'] = $id_user_master;
			    	$userAddressData['address_type'] = $address_type;
			    	 $user_address_id = $this->users_model->user_address_insert($userAddressData);
			    }

					}
				}

				// Delete Contact

				$delete_Contact = $this->input->post('delete_contact');
				if($delete_Contact !=''){
					$aDelete = explode(',',$delete_Contact);
					foreach($aDelete as $key => $delete){
						$this->users_model->user_contact_delete(array('id_user_contact' =>$delete));
					}
				}
				
				// Contact Insert/Update
				$usercontact = $this->input->post('contact_phone');
				if(count($usercontact) > 0){
					foreach($usercontact as $key => $user_contact){
						$number = isset($user_contact['number']) ? $user_contact['number'] : '';
						$type = isset($user_contact['type']) ? $user_contact['type'] : '';
						$extention = isset($user_contact['extention']) ? $user_contact['extention'] : '';
						$id_user_contact = isset($user_contact['id_user_contact']) ? $user_contact['id_user_contact'] : '';
						if($type !='' && $number!=''){
							$contact_label = 'contact_'.$key;
							$userContactData = array(	
								'pk_id_user'=>$id_user_master,								
								'contact_type'=>$type,
								'contact_number'=>$number,
								'extention'=>$extention,
								'contact_label' =>$contact_label,
								'contact_status' =>1,
							);
							$userContactDataCondition = array(
								'pk_id_user'=>$id_user_master,	
								'id_user_contact' =>$id_user_contact,
							
							);
						 $this->users_model->insert_user_contact($userContactData,$userContactDataCondition);
						}
					}
				}
				// End
			}
		}
	}

	public function update_user_address(){
		// echo '<pre>';
		// print_r($this->input->post());
		// exit;
		if ($this->input->is_ajax_request()){

		$useraddress = $this->input->post('address');
		$id_user_address = $this->input->post('user_address_id');
				if(count($useraddress) > 0){
					foreach($useraddress as $key => $user_address){
						$street_address = isset($user_address['street_address']) ? $user_address['street_address'] : '';
						if($street_address == ''){
							continue;
						}
						$city = isset($user_address['city']) ? $user_address['city'] : '';
						$state = isset($user_address['state']) ? $user_address['state'] : '';
						$postcode = isset($user_address['postcode']) ? $user_address['postcode'] : '';
						$country = isset($user_address['country']) ? $user_address['country'] : '';
						$id_user_address = isset($user_address['id_user_address']) ? $user_address['id_user_address'] : '';
						
						$address_label = isset($user_address['address_label']) ? $user_address['address_label'] : 'Address';
						
							$userAddressData = array(
							'address_1'=>$street_address,
							'city'=>$city,
							'state'=>$state,
							'counry'=>$country,
							'post_code'=>$postcode,
							'phone_number'=>' ',
							'address_modified_on'=>getCurrentDateTime(),
							'address_label'=>$address_label,
							'address_status'=>1,
							
					    );					    

		
				 $user_id = $this->users_model->user_address_update($userAddressData,array("id_user_address"=>$id_user_address
				 	));
			   
					}
				}
			}
	}

	public function info($company_id=''){
		$this->quickViewCompany = array(
			
			'View Customer' =>  array('icon'=>'icon-users','href'=>BASE_URL.'/company'),
			'Customer Info' =>  array('icon'=>'icon-users','href'=>BASE_URL.'/company/info/'.$company_id),
			'Purchase Orders' => array('icon'=>'icon-user','href'=>'#'),
			'Commission Details' => array('icon'=>'icon-user','href'=>'#'),
			'Customer History' => array('icon'=>'icon-user','href'=>'#'),
			
		);
		$rep_option = array(
				'orderby'=>'sort_order',
				'disporder'=>'ASC',
			);
		$aAssignedSalesRep = $this->company_model->getCustSalesRep(array('company_id'=>$company_id,'cust_map_status'=>1),$column='', $rep_option,'result',array('join'=>TRUE,'format'=>TRUE));
		$data['base_url'] = base_url();
		$data['title']  = "View Customer";
		$data['assignedSalesREP']  = $aAssignedSalesRep;
		$data['quickView']  = $this->quickViewCompany;
		$data['pageTop']  = $this->quickPageTop;
		$data['view_file']  = "company/company_info";
		$data['current_menu']  = "company";
		$data['get_company'] = $this->company_model->getCompany(array('id_company'=>$company_id),'',array(),"row");	
					
		$this->template->load_frontend_template($data);
	}

	public function create()
	{
		$data['base_url'] = base_url();
		$data['title']  = "Add Customer";
		$data['pageTop']  = $this->quickPageTop;
		$data['quickView']  = $this->quickViewCompany;
		$data['view_file']  = "company/create_company";
		$data['current_menu']  = "company";
		$cust_type = array();
		$custTypeInfo =  $this->type_model->get_customer_type(array('status'=>'1'));
		if($custTypeInfo != FALSE){
			foreach($custTypeInfo as $cust){
				$cust_type[$cust->customer_type_code] = $cust->cust_type_name;
			}
		 
		}
		$rep_option = array(
		'orderby'=>'sort_order',
		'disporder'=>'ASC',
		);
		
		$salesREPInfo = $this->users_model->getUsers(array('user_type'=>'sales_rep','status'=>1),'result',FALSE,array());
		$aResponse = array();

		if(count($salesREPInfo) >0 && $salesREPInfo != FALSE){
			foreach($salesREPInfo as $salesREP){
				$id_user = isset($salesREP->id_user_master) ? $salesREP->id_user_master  :'';
				$fullName = isset($salesREP->fullName) ? $salesREP->fullName  :'';
				$aResponse[$id_user] = $fullName;
				
			}
		}
		$data['previousLink'] = BASE_URL.'/company';	
		$data['salesREP']  = $aResponse;
		$data['assignedSalesREP']  = array();
		$data['customer_type']  = $cust_type;
		$data['customer_type_details'] = $this->type_model->get_customer_type();		
		$this->template->load_frontend_template($data);
	}

	public function get_company_contact_template($contact_id = 0)
	{
		
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();			
			$data['contact_id'] = $contact_id;			
			$data['title'] = ($contact_id > 0) ? 'Edit Contact' : 'Add Contact';			
			$data['get_company_contact'] = $this->company_model->getCompanyContact(array('id_company_contact'=>$contact_id),'',array(),"row");
			// echo '<pre>';print_r($data['get_company_contact']); echo '</pre>';
			$this->load->view('frontend/company/company_contact_edit_template',$data);		
		}
	}

	public function get_company_add_contact_temple($company_id = 0){
		if ($this->input->is_ajax_request()){
			$contact_id = 0;
			$data['base_url'] = base_url();			
			$data['contact_id'] = $contact_id;			
			$data['companyId'] = $company_id;			
			$data['title'] = ($contact_id > 0) ? 'Edit Contact' : 'Add Contact';			
			$data['get_company_contact'] = $this->company_model->getCompanyContact(array('id_company_contact'=>$contact_id),'',array(),"row");			
			$this->load->view('frontend/company/company_contact_edit_template',$data);		
		}
	}

	public function get_company_add_address_temple($company_id = 0){
		if ($this->input->is_ajax_request()){
			$address_id = 0;
			$data['base_url'] = base_url();			
			$data['address_id'] = $address_id;			
			$data['companyId'] = $company_id;			
			$data['title'] = ($address_id > 0) ? 'Edit Address' : 'Add Address';			
			$data['get_company_address'] = $this->company_model->getCompanyAddress(array('id_company_address'=>$address_id),'',array(),"row");			
			$this->load->view('frontend/company/company_address_edit_template',$data);		
		}
	}

	public function get_company_edit_address_temple($address_id = 0){
		if ($this->input->is_ajax_request()){			
			$data['base_url'] = base_url();			
			$data['address_id'] = $address_id;	
			$data['title'] = ($address_id > 0) ? 'Edit Address' : 'Add Address';			
			$data['get_company_address'] = $this->company_model->getCompanyAddress(array('id_company_address'=>$address_id),'',array(),"row");			
			$this->load->view('frontend/company/company_address_edit_template',$data);		
		}
	}
	public function address_save(){
		
		$action_type = $this->input->post('action_type');
		$company_id = $this->input->post('company_id');
		$id_company_address = $this->input->post('id_company_address');
		$street_address = $this->input->post('street_address');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		$zip_code = $this->input->post('zip_code');
		$country = $this->input->post('country');
		$state_other = $this->input->post('state_other');
		$shipping_acnt = $this->input->post('shipping_acnt');
		$address_label = $this->input->post('address_label');

		if($state == 'others')
		{
			$state = $state_other;
		}
		if($id_company_address !='' && $action_type=='update_address'){
			$label = ($address_label !='') ? $address_label :'Address';
			$AddressData = array(						
						'street_address'=>$street_address,
						'state'=>$state,
						//'state_other' => $state_other,
						'city'=>$city,
						'zip_code'=>$zip_code,
						'country'=>$country,
						'shipping_acnt'=>$shipping_acnt,
						'address_label'=>$label,	
						'address_status'=>1
		   );
			$AddressDataCondtion = array(
				'company_id'=>$company_id,
				'id_company_address'=>$id_company_address,
			);
			$this->company_model->insert_company_address($AddressData,$AddressDataCondtion);
		}
		if($id_company_address =='' && $action_type=='insert_address'){
			$key = $this->company_model->getCompanyAddressId(array('company_id'=>$company_id));
			$address_label_type = 'address_'.$key;
			$label = ($address_label !='') ? $address_label :'Address';
			$AddressData = array(
			            'company_id'=>$company_id,						
						'street_address'=>$street_address,
						'state'=>$state,
						'city'=>$city,
						'zip_code'=>$zip_code,
						'country'=>$country,
						'shipping_acnt'=>$shipping_acnt,	
						'address_type'=>$address_label_type,
						'address_label'=>$label,
						'address_status'=>1
		   );
			$AddressDataCondtion = array(
				'company_id'=>$company_id,
				'address_type'=>$address_label_type,
			);
			$this->company_model->insert_company_address($AddressData,$AddressDataCondtion);
		}
	}

	public function get_company_template($company_id = 0)
	{
		if ($this->input->is_ajax_request()){
			$data['base_url'] = base_url();			
			$data['get_company'] = $this->company_model->getCompany(array('id_company'=>$company_id),'',array(),"row");
		$cust_type = array();
		$custTypeInfo =  $this->type_model->get_customer_type(array('status'=>'1'));
		if($custTypeInfo != FALSE){
			foreach($custTypeInfo as $cust){
				$cust_type[$cust->customer_type_code] = $cust->cust_type_name;
			}
		 
		}

		$rep_option = array(
		'orderby'=>'sort_order',
		'disporder'=>'ASC',
		);
		$aAssignedSalesRep = $this->company_model->getCustSalesRep(array('company_id'=>$company_id,'cust_map_status'=>1),$column='', $rep_option,'result',array('join'=>TRUE,'format'=>TRUE));
		$salesREPInfo = $this->users_model->getUsers(array('user_type'=>'sales_rep','status'=>1),'result',FALSE,array());
		$aResponse = array();

		if(count($salesREPInfo) >0 && $salesREPInfo != FALSE){
			foreach($salesREPInfo as $salesREP){
				$id_user = isset($salesREP->id_user_master) ? $salesREP->id_user_master  :'';
				$fullName = isset($salesREP->fullName) ? $salesREP->fullName  :'';
				$aResponse[$id_user] = $fullName;
				
			}
		}
		$aSelectdata = array();
		if(count($aAssignedSalesRep) > 0 && $aAssignedSalesRep != FALSE){
			foreach ($aAssignedSalesRep as $key => $value) {
				 $selectData = array();
				$selectData['id']=$key;
				$selectData['text']=$value;
				$aSelectdata[] = $selectData;
			}
		}
		$aSalesREFDetail = array();
		
		if($aAssignedSalesRep != FALSE){
			$aSalesREFDetail = array_keys($aAssignedSalesRep);
		}


		$data['salesREP']  = $aResponse;
		$data['assignedSalesREP']  = $aSalesREFDetail;
		$data['aSelectData']  = json_encode($aSelectdata);
		$data['customer_type']  = $cust_type;
			$this->load->view('frontend/company/company_edit_template',$data);		
		}
	}
    
    public function cust_contact_sort(){
    	if ($this->input->is_ajax_request()){
    		
    		$sortorder = $this->input->post('sortorder');
    		$type = $this->input->post('type');
    		if($sortorder != FALSE){
    			if(!is_array($sortorder)){
    				$aContactSort = explode(',',$sortorder);
    			}else{
    				$aContactSort = $sortorder ;
    			}
    			
    			
    			foreach($aContactSort as $key => $val){
    				if($val == FALSE){
                        continue;
    				}
					$id_company_contact =$val;
					$ContactData = array(				
						'display_order'=>$key,
					);

					$ContactDataCondtion = array(				
						'id_company_contact'=>$id_company_contact,				
					);
			  		$this->company_model->insert_company_contact($ContactData,$ContactDataCondtion);
    			}
    			
		 
    		}
	    	return TRUE;
	    }
    }
	public function contact_save(){
		 //~ echo '<pre>';
		 //~ print_r($this->input->post());exit;
		
		$action_type = $this->input->post('action_type');
		$company_id = $this->input->post('company_id');
		$id_company_contact = $this->input->post('id_company_contact');
		$title = $this->input->post('title');
		$person = $this->input->post('person');
		$position = $this->input->post('position');
		$main_phone = $this->input->post('main_phone');
		$main_ext = $this->input->post('main_ext');
		$desk_phone = $this->input->post('desk_phone');
		$desk_ext = $this->input->post('desk_ext');
		$mobile_phone = $this->input->post('mobile_phone');
		$email = $this->input->post('email');
		$address_label = $this->input->post('address_label');
		if($action_type == 'update_contact' && $id_company_contact !=''){
			$label = ($address_label !='') ? $address_label :'Address';
			$ContactData = array(				
				'contact_title'=>$title,
				'contact_person'=>$person,
				'contact_position'=>$position,
				'main_phone'=>$main_phone,						
				'main_ext'=>$main_ext,
				'desk_phone'=>$desk_phone,						
				'desk_ext'=>$desk_ext,
				'mobile_phone'=>$mobile_phone,
				'contact_email'=>$email,
				'contact_label'=>$label,				
				'contact_status'=>1
			);
			  
			  $ContactDataCondtion = array(
				'company_id'=>$company_id,
				'id_company_contact'=>$id_company_contact,				
			  );
		 $this->company_model->insert_company_contact($ContactData,$ContactDataCondtion);
		}
		if($action_type == 'insert_contact' && $id_company_contact ==''){
			 $contact_key = $this->company_model->getCompanyContactId(array('company_id'=>$company_id));
			
			$contact_label = 'contact_'.$contact_key;
			$label = ($address_label !='') ? $address_label :'Address';
			$ContactData = array(	
				'company_id'=>$company_id,			
				'contact_title'=>$title,
				'contact_person'=>$person,
				'contact_position'=>$position,
				'main_phone'=>$main_phone,						
				'desk_phone'=>$desk_phone,
				'mobile_phone'=>$mobile_phone,
				'contact_email'=>$email,
				'contact_label'=>$label,
				'contact_type'=>$contact_label,				
				'contact_status'=>1
			);
			  
			  $ContactDataCondtion = array(
				'company_id'=>$company_id,
				'contact_type'=>$ContactData['contact_type'],				
			  );
			 
		 $this->company_model->insert_company_contact($ContactData,$ContactDataCondtion);
		}

	}

	public function unquie()
	{
		if ($this->input->is_ajax_request()){
			
			$type = $this->input->post('type');		
				
			if($type == 'email'){
				$company_email = $this->input->post('company_email');
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getCompanyuseruniqueDetails(array('company_email_address'=>$company_email,'id_company !='=>$u_key));
					exit;
				}
				echo getCompanyuseruniqueDetails(array('company_email_address'=>$company_email));
				exit;
			}
			if($type == 'cust_number'){
				$cust_number = $this->input->post('cust_number');
				$cust_number=isset($cust_number) ? $cust_number :'';
				$cust_alph = $this->input->post('cust_alph');
				$cust_alph=isset($cust_alph) && !empty($cust_alph) ? $cust_alph.'-' :'';
				$company_cust_code=$cust_alph.$cust_number;
				$u_key = $this->input->post('u_key');
				
				if($u_key != ""){
					echo getCompanyuseruniqueDetails(array('company_cust_code'=>$company_cust_code,'id_company !='=>$u_key));
					exit;
				}
				echo getCompanyuseruniqueDetails(array('company_cust_code'=>$company_cust_code));
				exit;
			}
			
		}
	}

	public function phoneValidation(){
		if ($this->input->is_ajax_request()){
			
			$type = $this->input->post('type');		
				
			if($type == 'phone'){
				$company_phone = $this->input->post('company_phone');
				$u_key = $this->input->post('u_key');
				$phone = preg_replace("/[^0-9]/","",$company_phone);
				if(strlen($phone) == 10){
					echo 'true';
				}else{
					echo 'false';
				}
				exit;				
			}
		}

	}

	public function delete_company()
	{
		if ($this->input->is_ajax_request()){
			$company_id = $this->input->post('key');
			$task = $this->input->post('task');
			if($task  == 'd'){
				$this->usertracking->track_this("Deleting Company");
				$this->company_model->company_delete(array("company_status"=>"2"),array("id_company"=>$company_id));
			}
			if($task  == 'p'){
					$this->usertracking->track_this("Deleting Company permanently");
					$this->company_model->company_delete_permanently(array("id_company"=>$company_id));
			}
			echo TRUE;
			exit;
		}
	}
	public function company_save(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'company_name'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_company'=>$pk
		);
		$message = 'Please enter the customer name correctly';
		if($value != ''){
			$companyId = $this->company_model->company_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the customer name';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}

	public function customer_terms_save(){
		$error = FALSE;
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');
		$companyData = array(
			'cust_terms'=>$value,
			
		);
		$cmpnayDataCondition = array(
			'id_company'=>$pk
		);
		$message = 'Please enter the customer terms correctly';
		if($value != ''){
			$companyId = $this->company_model->company_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			$message = 'Please enter the customer terms';
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}

	public function customer_save(){
	
		
		$company_id = $this->input->post('company_id');
		$company_name = $this->input->post('company_name');
		$cust_code = $this->input->post('cust_code');
		$cust_terms = $this->input->post('cust_terms');
		$customer_type = $this->input->post('customer_type');
		$cust_number = $this->input->post('cust_number');
		$cust_number=isset($cust_number) ? $cust_number :'';
		$cust_alph = $this->input->post('cust_alph');
		$cust_alph=isset($cust_alph) && !empty($cust_alph) ? $cust_alph.'-' :'';
		 $company_cust_code=$cust_alph.$cust_number;
		$sales_rep = $this->input->post('sales_rep');
		$pilot_status = $this->input->post('pilot_status');
		
		$companyData = array(
			'company_name'=>$company_name,
			'customer_type'=>$customer_type,
			'cust_terms'=>$cust_terms,
			'company_cust_code'=>$company_cust_code,
			'company_status'=>$pilot_status
		);
		//print_r($companyData);exit;
		$companyId = $this->company_model->company_update($companyData,array('id_company'=>$company_id));



		if(count($sales_rep) > 0 && $sales_rep != FALSE){

			$updateCustRep = array('cust_map_status'=>3);
			$updateCustRepCondition = array('company_id'=>$company_id);
			$updateCustRepCondition['where_not_in'] = array('id_sales_rep'=>$sales_rep);
			$this->company_model->company_sales_rep_update($updateCustRep,$updateCustRepCondition);
			
			foreach($sales_rep as $skey => $sval){
				$aSalesREPData = array(
					'id_sales_rep'=>$sval,
					'sort_order'=>$skey,
					'company_id'=>$company_id,
					'cust_map_status'=>1,
				);

				$aSalesCondition = array(
					'company_id'=>$company_id,
					'id_sales_rep'=>$sval,
				);
				$this->company_model->insert_cust_sales_rep_map($aSalesREPData,$aSalesCondition);
			}
		}
	}

	
	public function save(){
		// echo '<pre>';
		// print_r($this->input->post());
		// exit;
		if ($this->input->is_ajax_request()){
			$company_id = $this->input->post('company_id');
			$action_type = $this->input->post('action_type');
			$customer_type = $this->input->post('customer_type');
			$cust_number = $this->input->post('cust_number');
		$cust_number=isset($cust_number) ? $cust_number :'';
		$cust_alph = $this->input->post('cust_alph');
		$cust_alph=isset($cust_alph) && !empty($cust_alph) ? $cust_alph.'-' :'';
		$company_cust_code=$cust_alph.$cust_number;
			$address = $this->input->post('address');
			$contact = $this->input->post('contact');
			$sales_rep = $this->input->post('sales_rep');
			$pilot_status = $this->input->post('pilot_status');
			$companyAddress = array();
			if($company_id == '' && $action_type =='insert'){
				// $dataCompany = array(
				// 	'customer_type'=>$customer_type
				// );
				// $custCode = $this->company_model->getCompanyCode($dataCompany);
				$contactPerson = isset($contact[0]['person']) ? $contact[0]['person'] : '';
				$contactPhone = isset($contact[0]['main_phone']) ? $contact[0]['main_phone'] : '';
				$extention = isset($contact[0]['main_phone_ext']) ? $contact[0]['main_phone_ext'] : '';
				
				$contactEmails = isset($contact[0]['email']) ? $contact[0]['email'] : '';
				$companyData = array(
					'company_name'=>$this->input->post('company_name'),
					'customer_type'=>$customer_type,
					'company_contact'=>$contactPerson,
					'company_phone'=>$contactPhone,
					'extention'=>$extention,
					'company_email_address'=>$contactEmails,
					'company_cust_code'=>$company_cust_code,
					'company_created_on'=>getCurrentDateTime(),
					'company_status'=>$pilot_status
				);
			   $companyId = $this->company_model->company_insert($companyData);

				if(count($sales_rep) > 0 && $sales_rep != FALSE && $companyId != FALSE){
					foreach($sales_rep as $skey => $sval){
						$aSalesREPData = array(
							'id_sales_rep'=>$sval,
							'sort_order'=>$skey,
							'company_id'=>$companyId,
							'cust_map_status'=>1,
						);

						$aSalesCondition = array(
							'company_id'=>$company_id,
							'id_sales_rep'=>$sval,
						);
					$this->company_model->insert_cust_sales_rep_map($aSalesREPData,$aSalesCondition);
					}
				}
			   if(count($address) > 0){
			   	  foreach ($address as $key => $addressInfo) {
			   	  	  $address_label = 'address_'.$key;
			   	  	  $label = (isset($addressInfo['address_label']) && $addressInfo['address_label'] !='') ? $addressInfo['address_label'] : 'Address'; 

			   	  	  $state = $addressInfo['state'];
			   	  	  $state_other = $addressInfo['state_other'];
			   	  	  if($state == 'others')
						{
							$state = $state_other;
						}

				   	  $AddressData = array(
						'company_id'=>$companyId,
						'street_address'=>$addressInfo['street_address'],
						'state'=>$state,
						'city'=>$addressInfo['city'],
						'zip_code'=>$addressInfo['zip_code'],
						'country'=>$addressInfo['country'],
						'shipping_acnt'=>$addressInfo['shipping_anct'],
						'address_type'=>$address_label,
						'address_label'=>$label,
						'address_status'=>1
					);

					$AddressDataCondtion = array(
						'company_id'=>$AddressData['company_id'],
						'address_type'=>$AddressData['address_type'],
					);
					$companyAddress[] = $this->company_model->insert_company_address($AddressData,$AddressDataCondtion);

			   	  }
			   		
			   }

			   $contactIds = array();
			   if(count($contact) > 0){
			   	  foreach ($contact as $key => $contactInfo) {
			   	  	$contact_label = 'contact_'.$key;
			   	  	$ContactData = array(
						'company_id'=>$companyId,
						'contact_title'=>$contactInfo['title'],
						'contact_person'=>$contactInfo['person'],
						'contact_position'=>$contactInfo['position'],
						'main_phone'=>$contactInfo['main_phone'],
						'main_ext'=>$contactInfo['main_phone_ext'],						
						'desk_phone'=>$contactInfo['desk_phone'],
						'desk_ext'=>$contactInfo['desk_phone_ext'],
						'mobile_phone'=>$contactInfo['mobile_phone'],
						'contact_email'=>$contactInfo['email'],
						'contact_type'=>$contact_label,
						'contact_status'=>1
					);
			   	  
			   	  $ContactDataCondtion = array(
						'company_id'=>$ContactData['company_id'],
						'contact_type'=>$ContactData['contact_type'],
					);
					$contactIds[] = $this->company_model->insert_company_contact($ContactData,$ContactDataCondtion);

			   	  }
			   	}		

				
				$company_address = implode(',',$companyAddress);
				$company_contacts = implode(',',$contactIds);
				$companyUpdateData = array(
					'company_address'=>$company_address,
					'company_contacts'=>$company_contacts
				);
				$companyUpdateCondition = array(
					'id_company'=>$companyId
				);
				$update_company = $this->company_model->company_update($companyUpdateData,$companyUpdateCondition);
			}

			if($company_id != '' && $action_type =='update'){
				
				$customer_type = $this->input->post('customer_type');
				$previous_customer_type = $this->input->post('previous_customer_type');	

				$companyData = array(
					'company_name'=>$this->input->post('company_name'),
					// 'customer_type'=>$customer_type,
					'company_contact'=>$this->input->post('company_contact'),
					'company_phone'=>$this->input->post('company_phone'),
					'company_email_address'=>$this->input->post('company_email'),
					'company_modified_on'=>getCurrentDateTime(),
					'company_status'=>1
				);				

				$companyCondition = array(
					'id_company'=> $company_id
				);
			   $companyId = $this->company_model->company_update($companyData,$companyCondition);
				
			
			
			
			}
		}
		return TRUE;

	}

	public function cust_additional_info(){

		$error = FALSE;
		$message = 'Please enter the customer information correctly';
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		$pk = $this->input->post('pk');

		if($name == 'customer_fob'){
			$message = 'Please enter the customer fob';
			$companyData = array(
			 'customer_FOB'=>$value			
		     );
		}
		if($name == 'customer_ship_date'){
			$message = 'Please select Ship Date';
			$companyData = array(
			 'cust_ship_date'=>$value			
		     );
		}
		if($name == 'cust_ship_info'){
			$message = 'Please enter customer ship info';
			$companyData = array(
			 'cust_ship'=>$value			
		     );
		}
		if($name == 'customer_ship_via'){
			$message = 'Please enter customer ship via';
			$companyData = array(
			 'cust_ship_via'=>$value			
		     );
		}if($name == 'customer_project'){
			$message = 'Please enter customerproject';
			$companyData = array(
			 'cust_project'=>$value			
		     );
		}

		
		
		$cmpnayDataCondition = array(
			'id_company'=>$pk
		);
		
		if($value != ''){
			$companyId = $this->company_model->company_update($companyData,$cmpnayDataCondition);
			if($companyId == FALSE){
				$error = TRUE;
			}
		}else{
			$error = TRUE;
			
		}
	    if($error){
			$this->output->enable_profiler(false); 
			$this->output->set_status_header('500');
			$this->output->set_content_type('application/json');
			echo $message; 
	    }
		
		return TRUE;
	}


	public function custo_type(){

		if ($this->input->is_ajax_request()){
			
			$customer_type = $this->input->post('customer_type');		
				
			$sql="SELECT * FROM company where company_status ='1' and customer_type = '$customer_type' ORDER BY id_company DESC LIMIT 1";
											
                      $query=$this->db->query($sql);
											
                      $results=$query->row(); 

                      $company_cust_code=isset($results->company_cust_code) ? $results->company_cust_code:'';

                      if (strpos($company_cust_code, '-') !== false) {

                          $Custnum=explode("-",$company_cust_code);
                      }
                      else {
                      
                          $Custnum = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $company_cust_code);
                      }

											foreach($Custnum as $key => $num)
											{
												if($key =='0')
												{
													$val1 = $num;
												}else
												{	
												$val2 = $num;
												}
											}
											$custnumber =isset($val2) ? $val2 :'';
											if($custnumber !=''){
											$numberCust=$custnumber + 1;
										    }else{
												$numberCust ='';
											}

											$aResponse['val1'] = $val1;
											$aResponse['numberCust'] = $numberCust;


											echo json_encode($aResponse);
		}

	}
	
}
