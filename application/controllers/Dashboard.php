<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!is_user_active('', FALSE))
		{
			redirect('login');
		}
		
		$this->load->model('users_model');
		//$this->load->model('dynamic_model');
		$site_lang = $this->session->site_lang;
		$this->lang->load('message',$site_lang );
	}
		
	public function index()
	{	
		
		$user_id = get_active_user_id();

		if($this->session->userdata['user_type']=='superuser' || $this->session->userdata['user_type']=='garage'){
		$data['base_url'] = base_url();
		$data['view_file']  = "dashboard";
		$data['current_menu']  = "dashboard";
		$data['user_type'] = $this->session->userdata['user_type'];
        $data['username'] = $this->session->userdata['user_name'];
		$data['dashboardHeaderInfo']  = FALSE;
		$data['user_id'] = $user_id;


		$this->template->load_backend_template($data);
	    }
	    else { 

	    	redirect(BASE_URL);
	    }
	}

	public function edit_review_admin($orderid)
	{	
		// print_r($orderid) ;
		
		$data['base_url'] = base_url();
		$data['orderid'] =$orderid;
		$data['review_details'] = $this->db->query("SELECT * FROM order_details where id ='".$orderid."' ")->row();
		// print_r($data['review_details']->review_date);
       $this->load->view('backend/backend_pages/edit_review_admin',$data);

	}
     

    public function update_review_admin()

    {

      $usertype =  $this->session->userdata('user_type');
      
        
			$order =$_POST['order'];
			$star_count =$_POST['star_count'];
			$review_comments_box =$_POST['review_comments_box'];
			$response = $_POST['mover_response_text'];
			$id =$_POST['order'];

		if ($star_count =='') {
				echo  2;
				exit;
				
			}

			else if ($review_comments_box =='') {

				echo  3;
				exit;
				# code...
			}

			else { 
				echo  0;}
			
			 
			$data =array('star_count' =>$star_count,
				// 'order_status' =>$order_status,
				'review_comments' =>$review_comments_box,
                'movers_review_replay'=>$response,
				'review_date' =>date("Y-m-d"),
				);

			// print_r($data);
			// print_r($id);
			// exit(); 

			$result = $this->users_model->update_reviews_comments($id,$data);
 

    }
    public function delete_review()
    { 
        
            $id = $_POST['orderid'];
			$data =array('star_count' =>'',
				     'review_comments' =>'',
				     'movers_review_replay'=>'',

				
				);
			// print_r($data);
		    // print_r($id);
			// exit();  

			$result = $this->users_model->update_reviews_comments($id,$data);

    }
}	
