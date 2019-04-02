<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// date_default_timezone_set('America/New_York');
class Pages extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		 $this->load->model('common_model');
		 $this->load->model('customer_model');
		 $this->load->model('garage_model');
		 $this->load->model('pages_model');

	}

    public function index() {

		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "pages_details";
		$data['current_menu']  = "pages";
		$where =array('post_type'=>'page');
		$data['customer_details'] =$this->pages_model->get_pages_details($where );
		$this->template->load_backend_template($data);
    }
    public function pagesview($pageid)
    {
    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();

    }
    public function editpages()
    {

      $post_id = $this->input->post('ID');
      $post_content = $this->input->post('post_content');
      $post_title = $this->input->post('post_title');
      $post_name = $this->input->post('post_name');

     $data=array('post_author'=>'1','post_content'=>$post_content,'post_title'=>$post_title,'post_status'=>'publish','post_type'=>'page');
            $this->db->where('ID' , $post_id);
            $this->db->update('pages' , $data);
            $profile_image_old = $_POST['banner_image_old'];
			
            $target_dir = "uploads/images/";

			if($_FILES["banner_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["banner_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["banner_image"]["tmp_name"], 'uploads/images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = 'uploads/images/'.$profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}
			$banner_content = $this->input->post('banner_content');
			$data= array('meta_value'=>$profile_image);
			$where =array('post_id'=>$post_id,'meta_key'=>'banner_image');
			$data1=array('meta_value'=>$banner_content);
			$where1 =array('post_id'=>$post_id,'meta_key'=>'banner_content');
		 
            $this->pages_model->update_page_meta($data,$where);
            $this->pages_model->update_page_meta($data1,$where1); 
              redirect(BASE_URL . '/admin/pages/edit_pagedetails/'.$post_id, 'refresh');

    }
    public function editpagesfaq()
    {

      $post_id = $this->input->post('ID');
      $post_content = $this->input->post('post_content');
      $post_title = $this->input->post('post_title');
      $post_name = $this->input->post('post_name');
      $post_status =$this->input->post('post_status');
       $terms_Select =$this->input->post('terms_Select');


     $data=array('post_author'=>'1','post_content'=>$post_content,'post_title'=>$post_title,'post_status'=>$post_status,'post_type'=>'faq','post_parent'=>$terms_Select);
            $this->db->where('ID' , $post_id);
            $this->db->update('pages' , $data);
           
               redirect(BASE_URL . '/admin/pages/edit_pagedetailsfaq/'.$post_id, 'refresh');

    }
    public function edit_pagedetails($pageid='')
    {
    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "pages_edit";
		$data['current_menu']  = "pages";
		$param =array('ID'=>$pageid);
		$data['page_details'] =$this->pages_model->get_pages_fulldetails($param,'','','row');
		$data['banner_image']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_image','post_id'=>$pageid))->row()->meta_value;  
		$data['banner_content']=$this->db->get_where('pages_meta' , array('meta_key' => 'banner_content','post_id'=>$pageid))->row()->meta_value; 
		$this->template->load_backend_template($data);
     }
  
    public function insert_page_abtdetails()
    {
    	if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='superuser')
		{
			redirect(BASE_URL);
		}
		if(isset($_POST))
		{
			$user_id = $_POST['user_id'];$title = $_POST['title'];$page_id = $_POST['page_id'];
			$content = htmlentities($_POST['content']);
		 

		}
		else
		{
			echo 0;
		}
		exit;
    }

    public function approve($user_id ='')
    {

    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$user_id = $_POST['user_id'];
    	$update_array = array('site_admin' => 1);
    	$update_result = $this->common_model->update('user_master',$update_array,array('id_user_master' => $user_id));
   
    }


     public function edit_details($userid = '' ){

	   if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "customer_edit";
		$data['customer_details'] =$this->customer_model->get_customer_details($userid);
		$this->load->view('backend/backend_pages/customer_edit',$data);

     }


     public function update_details(){
		if( $this->session->userdata['user_type'] =='customer' || $this->session->userdata['user_type'] =='superuser'  )
		{
			
		if(isset($_POST))
		{
			$user_id = $_POST['user_id'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $first_name.' '.$last_name;
			$address = $_POST['address'];
			$profile_image_old = $_POST['profile_image_old'];
			$target_dir = "uploads/images/profile_images/";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = $profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}
			$update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' => $username,'email' => $email, 'phone' => $phone, 'address' => $address, 'profile_image' => $profile_image );
			$update_result = $this->common_model->update('user_master',$update_array,array('id_user_master' => $user_id));

			echo 1;


		}
		else
		{
			echo 0;
		}
		exit;
	}
	else{redirect(BASE_URL);
		}
	}




	public function delete_pages()
	{
 		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
 		$page_id = $_POST['key'];
    	$update_result = $this->pages_model->delete_pages('pages',array('ID' => $page_id));
        echo 1;
	}
	public function delete_termsdet()
	{
		if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
 		$page_id = $_POST['key'];
    	$update_result = $this->pages_model->delete_pagestrems('pages_terms',array('term_id' => $page_id));
        echo 1;
	}
/********************** STA ARUL******************************/
 public function create()
 {
 	  if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);

		$data['base_url'] = base_url();
		$data['view_file']  = "pages_add";
		$data['user_id'] = $this->session->userdata('user_id');
		//$data['customer_details'] =$this->customer_model->get_customer_details($userid);
		$this->load->view('backend/backend_pages/pages_add',$data);

 }
 public function add_details()
 {
 	//if( $this->session->userdata['user_type'] =='customer' || $this->session->userdata['user_type'] =='superuser'  )
	//	{
			
		if(isset($_POST))
		{
			$action = $_POST['action'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$username = $first_name.' '.$last_name;
			$address = $_POST['address'];
			$password = $_POST['password'];
			$profile_image_old = $_POST['profile_image_old'];
			$target_dir = "uploads/images/profile_images/";

			if($_FILES["profile_image"]["name"] !='')
			{
				$profile_milsec = round(microtime(true) * 1000);
				$profile_milsec = number_format($profile_milsec, 0, '.', '');
				$profile_image_file = $target_dir . basename($_FILES["profile_image"]["name"]);
				$profile_ext = strtolower(pathinfo($profile_image_file,PATHINFO_EXTENSION));
				move_uploaded_file($_FILES["profile_image"]["tmp_name"], 'uploads/images/profile_images/'.$profile_milsec.'.'.$profile_ext);

				$profile_image = $profile_milsec.'.'.$profile_ext;
			}
			else
			{
				$profile_image = $profile_image_old;
			}
			 $update_array = array('first_name' => $first_name,'last_name' => $last_name,'username' => $username,'email' => $email, 'phone' => $phone, 'address' => $address, 'profile_image' => $profile_image,'user_type' =>'customer','password'=>sha1($password));
		     $update_result = $this->customer_model->createcustomer($update_array);

			echo 1;


		}
		else
		{
			echo 0;
		}
		exit;
	//}
	//else{redirect(BASE_URL);
		//}
 }
 /*************************************** FAQ ************************************/
	 public function faqs()
	 {
	 	if($this->session->userdata('user_type')!='superuser')
				redirect(BASE_URL);
			$data['base_url'] = base_url();
			$data['view_file']  = "faqs_details";
			$data['submenu']='faqs';
			$data['current_menu']  = "faqs";$where = array('post_type'=>'faq');
			$data['faq_details'] =$this->pages_model->get_pages_details_faq($where);
			$this->template->load_backend_template($data);
	 }
	 public function faqscategory()
	 {
            if($this->session->userdata('user_type')!='superuser')
				redirect(BASE_URL);
			$data['base_url'] = base_url();
			$data['view_file']  = "faqs_categ_details";
			$data['current_menu']  = "faqs";
			$data['submenu']  = "faqscategory";
		//	$where = array('post_type'=>'faq');
			$data['category_details'] =$this->pages_model->get_terms_faqs();
			$this->template->load_backend_template($data);
	 }

 	public function faq_new()
	 {
	 	  if($this->session->userdata('user_type')!='superuser')
				redirect(BASE_URL);

			$data['base_url'] = base_url();
			$data['view_file']  = "faq_add";
			//$data['customer_details'] =$this->customer_model->get_customer_details($userid);
			$this->load->view('backend/backend_pages/faq_add',$data);

    }
    public function add_termdetails()
    {
    	if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='superuser')
		{
			redirect(BASE_URL);
		}
		if(isset($_POST))
		{
			$term_desc =$_POST['term_desc'];
			$term_slug=$_POST['term_slug'];
			$term_icon=$_POST['term_icon'];
			$term_name=$_POST['term_name'];
			$status = 1;
			$data=array('term_name'=>$term_name,'term_slug'=>$term_slug,'term_desc'=>$term_desc,'term_icon'=>$term_icon,'status'=>1);
            //$this->db->where('term_id' , $post_id);
            $this->db->insert('pages_terms' , $data);
              //  redirect(BASE_URL . '/admin/pages/faqscategory/', 'refresh');
			//$user_id = $_POST['user_id'];$title = $_POST['title'];$page_id = $_POST['page_id'];
			//$content = htmlentities($_POST['content']);
                echo '1';
 		}
		else
		{
			echo 0;
		}
		exit;
    }
    public function edit_termdetails()
    {
    	if(!isset($this->session->userdata['user_id']) || $this->session->userdata['user_type'] !='superuser')
		{
			redirect(BASE_URL);
		}
		if(isset($_POST))
		{
			$term_desc =$_POST['term_desc'];
			$term_slug=$_POST['term_slug'];
			$term_icon=$_POST['term_icon'];
			$term_name=$_POST['term_name'];
			$term_id=$_POST['term_id'];
			$status = $_POST['status'];
			$data=array('term_name'=>$term_name,'term_slug'=>$term_slug,'term_desc'=>$term_desc,'term_icon'=>$term_icon,'status'=>1);
			$this->db->where('term_id' , $term_id);
			$this->db->update('pages_terms' , $data);
			echo 1;
		}
		else{
			echo 0;
		}
		exit;
    }
    public function pagesfaq_add()
    {
    	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "pagesfaq_add";
		$data['current_menu']  = "faqs";
		$data['term_details'] =$this->pages_model->get_terms_faqs();
		$this->template->load_backend_template($data);
    }
    public function addpagesfaq()
    {

      $post_id = $this->input->post('ID');
      $post_content = $this->input->post('post_content');
      $post_title = $this->input->post('post_title');
      $post_name = $this->input->post('post_name');
      $post_status =$this->input->post('post_status');
       $terms_Select =$this->input->post('terms_Select');
      $data=array('post_author'=>'1','post_content'=>$post_content,'post_title'=>$post_title,'post_status'=>$post_status,'post_type'=>'faq','post_parent'=>$terms_Select);
            $this->db->where('ID' , $post_id);
            $this->db->insert('pages' , $data);
           
               redirect(BASE_URL . '/admin/pages/faqs/'.$post_id, 'refresh');

    }
    public function edit_pagedetailsfaq($pageid='')
     {
     	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "pagesfaq_edit";
		$data['current_menu']  = "faqs";
		$param =array('ID'=>$pageid);
		$data['page_details'] =$this->pages_model->get_pages_fulldetails($param,'','','row');
		$prent_cate = $this->db->get_where('pages', array('ID' => $pageid))->row()->post_parent;
 		$data['parent_name']=$this->db->get_where('pages_terms' , array('term_id' =>$prent_cate))->row()->term_name;  
		$data['parent_id']=$prent_cate;
		$data['term_details'] =$this->pages_model->get_terms_faqs();
 		$this->template->load_backend_template($data);
     }
     public function edit_detailsfaq($prent_cate='')
     {
     	if($this->session->userdata('user_type')!='superuser')
			redirect(BASE_URL);
		$data['base_url'] = base_url();
		$data['view_file']  = "pagesfaqterm_edit";
		$data['current_menu']  = "faqs";
  		$data['term_details'] =$this->db->get_where('pages_terms' , array('term_id' =>$prent_cate))->row();
  		$this->load->view('backend/backend_pages/pagesfaqterm_edit',$data);
 		 
      }
}
	