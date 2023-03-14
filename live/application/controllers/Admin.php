<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent :: __construct();
		$this->load->helper("notification");
		//date_default_timezone_set("Asia/Kolkata");
		if($this->session->userdata('auth_level'))
		{ 
		  define('USER_ID',$this->session->userdata('user_id'),true);
		  define('AUTH_LEVEL',$this->session->userdata('auth_level'),true);
		}
		 $this->load->library('email');
    $this->load->library('parser');
    $this->load->helper('mail'); 
	}

	public function index()
	{
		$this->load->view("login");
	}	

	public function dashboard()
	{
		
		if($this->session->userdata('auth_level'))
		{ 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="dashboard";
				$data['page_name'] ="dashboard";
				$data['user_count'] = $this->common_m->get_user_count();
				$data['user_admin_count'] = $this->common_m->get_user_admin_count();
				$data['contact'] = $this->common_m->get_contact_count();
				$data['newsletter'] = $this->common_m->get_newsletter_count();
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/index',$data);
			}
			else
			{
				redirect(base_url().'admin');
			}
		}
		else
		{
			redirect(base_url().'admin');
		}
	}

	//Update above methods

	public function login()
	{		
//echo "Hi";exit;	
		$data = $this->input->post('data');
		
		if(@$data)
		{
			 $pwd = $data['password'];
			 unset($data['password']);
			 $auth_data = $this->db->select("*")->from('users')->where($data)->get()->row_array();	
			 //echo "<pre>";print_r($auth_data);exit;
           //  $menu = $this->db->select("*")->from('menu_permissions')->where("user_id =",$auth_data['user_id'])->get()->row_array();			 
			if($auth_data)
			{				
				if($auth_data['user_status'] == 1)
				{
					
					if($pwd == base64_decode($auth_data['password']))
					{						
						
						if($auth_data['auth_level']==9)
						{
							$this->session->set_userdata('username',$auth_data['username']);
							$this->session->set_userdata('email',$auth_data['email']);
							$this->session->set_userdata('auth_level',$auth_data['auth_level']);
							$this->session->set_userdata('user_id',$auth_data['user_id']);
							$this->session->set_userdata('user_type',$auth_data['type']);
							//$this->session->set_userdata('menu_list',$menu['menu_id']);
							redirect("admin/dashboard");
						}
						else
						{
							$e_data['error'] = "Please check login credentials";
							$this->load->view('login.php', $e_data);
						}
					}
					else
					{					
					    $e_data['error'] = "Please check Your Password";
						$this->load->view('login', $e_data);
					}		
					
			    }
				else
				{					
					 $e_data['error'] = "Your Account Was In-Active Please Contact Admin";
					 $this->load->view('login', $e_data);
				}			
			}
			else
			{					
				$e_data['error'] = "Invalid Login Credentials";
			    $this->load->view('login.php', $e_data);
			}
		}
		else
		{
			redirect('admin/index');
		}
	}
public function profile()
	{
		if($this->session->userdata('auth_level'))
		{ 
			$data['user_info'] = $this->common_m->get_user_details(user_id);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/footer');
			$this->load->view('admin/profile');
		}
		else
		{
			redirect(base_url().'admin/index');
		}
	}
	
	
    public function profile_update()
	{
	    
		$data = $this->input->post('data');
		$old_image = $this->input->post('old_image');
		if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
        {
		if(!empty($_FILES['profile_image']['name']))
		{
	       $config['upload_path'] = 'assets/uploads/user_profiles/';
	       $config['allowed_types'] = '*';
	       $config['file_name'] = $_FILES['profile_image']['name'];
	       $this->load->library('upload',$config);
	       $this->upload->initialize($config);
	       if($this->upload->do_upload('profile_image'))
	       {
	       		$uploadData = $this->upload->data();
	       		$data['user_image'] = $config['upload_path'].$uploadData['file_name'];
	       }
	       else
	       {
	       		$data['user_image'] = '';
	       }
	    }
	    else
	    {
	    	$data['user_image'] =$old_image; 
	    }
	    
	    /* CSV*/
	    /*$this->load->library('csvimport');
	    if ($this->csvimport->get_array($data['user_image'])) {
                $csv_array = $this->csvimport->get_array($data['user_image']);
                $dataList = [];
                foreach ($csv_array as $row) {
                	          		
                	$insert_data = array(
	                        'username'=>$row['Contact First'],
	                        'company_name'=>$row['Company Name'],
	                        'address'=>$row['Address'].' ,'.$row['County'],
	                        'city'=>$row['City'],
	                        'state'=>$row['State'],
	                        'zip_code'=>$row['Zip'],
							'mobile_no'=>$row['Phone'],
							'first_name'=>$row['Contact First'],
							'last_name'=>$row['Contact Last'],
							'email'=>$row['Email'],
							'website_url'=>$row['Website'],
							'country_code'=>'+1'
	                    );
	                   
	                    $this->db->insert('users',$insert_data);
	                    
                }
               
            	}*/
            	
            	//print_r($csv_array); exit;
	    /* CSV*/
		$this->db->where('user_id',$data['user_id'])->update('users',$data);
		$this->session->set_flashdata('success','Profile Updated Successfully !');
		echo json_encode(["status"=>"success","message"=>"Profile Updated Successfully"]);	
        }else{
          	echo json_encode(["status"=>"error","message"=>"Please enter valid email address"]);	  
        }
		
	}
		public function update_pwd()
	{	 
	     $data2=$this->input->post('data2');
		 $id = $data2['user_id'];
		 $oldpassword =$data2['old_pass'];
		 $password =$data2['new_pass']; 
		 $data2['password']=base64_encode($password);
		 $res = $this->db->where('user_id',$id)->get('users')->row();
		 $db_pass = base64_decode($res->password);
		 
		 if($db_pass===$oldpassword)
		 {
		    $id = $data2['user_id'];
			$this->session->set_flashdata('success','Password Updated Successfully');
	        $this->db->set('password',$data2['password'])->where('user_id',$id)->update('users');
		    echo json_encode(["status"=>"success","message"=>"Password Updated Successfully"]);			
		}
		else
		{
			echo json_encode(["status"=>"error","message"=>"Old Password is Incorrect !"]);
		}	   
	}
	
	
     public function ckeditor_image()
{		
   if(isset($_FILES['upload']['name']))
    {
	     $file = $_FILES['upload']['tmp_name'];
	     $file_name = $_FILES['upload']['name'];
	     $file_name_array = explode(".", $file_name);
	     $extension = end($file_name_array);
	     $new_image_name = rand() . '.' . $extension;
	    // chmod('upload', 0777);
	     $allowed_extension = array("jpg","gif","png","jpeg");
	     if(in_array($extension, $allowed_extension))
	     {
	      move_uploaded_file($file, 'assets/uploads/ckeditor_images/'.$new_image_name);
	      $function_number =   $_GET['CKEditorFuncNum'];
	      $url = base_url().'assets/uploads/ckeditor_images/'.$new_image_name;			    
	      $message = '';
	      echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$message');</script>";
	     }
    }	 
}

//Home banner

   public function home_banner()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="home_banner";
				$data['page_name'] ="home_banner";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_home_banner();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/home_banner');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }

  public function save_home_banner()
	{
		$data = $this->input->post('data');	
		$data['created_date'] = Date("Y-m-d H:i:s");
		$id = $data['id'];
		if($id){
			$category_details = $this->db->get_where('home_banner',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('home_banner',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('home_banner',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
	
	 public function about()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="about";
				$data['page_name'] ="about";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_about();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/about');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_about()
	{
		$data = $this->input->post('data');	
		$data['created_date'] = Date("Y-m-d H:i:s");
		$id = $data['id'];
		if($id){
			$category_details = $this->db->get_where('about',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('about',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('about',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
	//Services
	
     public function services()
  {
           
		   if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
			
				$data['current_page'] ="services";
				$data['page_name'] ="services";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['banners'] = $this->common_m->get_services();
               
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/services',$data);
				
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_services()
	{
		$data = $this->input->post('data');		
        $image = '';
		$id = $data['id'];
		$data['created_date'] = Date("Y-m-d H:i:s");
		if($id){
			$category_details = $this->db->get_where('services',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',2);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('services',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('services',$data);	
// 			echo "<pre>";print_r($this->db->last_query());exit;
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
  	  public function add_services($id="")
  {
       if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
             $data       = array();
            $data['id'] = base64_decode(@$id);
            $data['current_page'] ="services";
            $data['page_name'] ="services";
            $data['user_info'] = $this->common_m->get_user_details(user_id);
            $data['value']  = ($data['id'] != "") ? $this->common_m->get_services_details($data['id']):array();
            $this->load->view('admin/includes/header',$data);
            $this->load->view('admin/includes/footer');
            $this->load->view('admin/add_services',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
    public function delete_image_record()
  {
    $id=$this->input->post('id');
    $table=$this->input->post('table');
    if($id)
    {
    	$category_details = $this->db->get_where($table,['id'=>$id])->row_array();
    	$image = $category_details['image'];
			if($image != ''){
				unlink($image);
			}
        $this->db->where('id',$id)->delete($table);
        $this->session->set_flashdata('success','Data deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }
  }	
      public function delete_image_record_t()
  {
    $id=$this->input->post('id');
    $table=$this->input->post('table');
    if($id)
    {
    	$category_details = $this->db->get_where($table,['id'=>$id])->row_array();
    	$image = $category_details['image'];
			if($image != ''){
				unlink($image);
			}
        $this->db->where('id',$id)->delete($table);
        $this->db->where('testimonial_id',$id)->delete('rating');
        $this->session->set_flashdata('success','Data deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }
  }	
   public function like_your_home()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="like_your_home";
				$data['page_name'] ="like_your_home";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_home_content();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/like_your_home');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }

  public function save_home_content()
	{
		$data = $this->input->post('data');	
		$data['created_date'] = Date("Y-m-d H:i:s");
		$id = $data['id'];
		if($id){
			$category_details = $this->db->get_where('home_content',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('home_content',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('home_content',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
	   public function testimonials_content()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="testimonials_content";
				$data['page_name'] ="testimonials_content";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_home_content();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/testimonials_content');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
   public function save_testimonials_content()
	{
		$data = $this->input->post('data');	
		$data['created_date'] = Date("Y-m-d H:i:s");
		$id = $data['id'];
		if($id){
			$category_details = $this->db->get_where('home_content',['id'=>$id])->row_array();
			$image = $category_details['image_t'];
			$image_logo = $category_details['image_logo'];
		}
		if(!empty($_FILES['image_t']['name'])){
			$data["image_t"] = $this->upload_images_all('image_t',1);
			if($data['image_t'] && $image != ''){
				unlink($image);
			}
		}
			if(!empty($_FILES['image_logo']['name'])){
			$data["image_logo"] = $this->upload_images_all('image_logo',1);
			if($data['image_logo'] && $image_logo != ''){
				unlink($image_logo);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('home_content',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('home_content',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}

	public function upload_images_all($books,$flag){
		if($flag==1){
			 $path='banners';
		}else if($flag==2){
			$path='services';
		}else if($flag==3){
			$path='testimonials';
		}else if($flag==4){
			$path='oasis_magazine';
		}else if($flag==5){
			$path='village_happening';
		}else if($flag==6){
			$path='village_happening_images';
		}else if($flag==7){
			$path='articles';
		}else if($flag==8){
			$path='landing_page';
		}else if($flag==9){
			$path='documents';
		}else if($flag==10){
		    $path='user_profiles';
		}else if($flag==11){
		    $path='advertisements';
		}
		
		else{
		}
		
	    $config['upload_path'] = 'assets/uploads/'.$path;
	    $config['allowed_types'] = '*';
		$config['file_name'] = $_FILES[$books]['name'];
		$config['encrypt_name']=TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if($this->upload->do_upload($books)){
			$uploadData = $this->upload->data();
			return $config['upload_path'].'/'.$uploadData['file_name'];
		}else{
			return '';
		}
	}
 public function testimonials()
   {
		   if($this->session->userdata('auth_level')) { 
	
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="testimonials";
				$data['page_name'] ="testimonials";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['sub_category'] = $this->common_m->get_testimonials();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/testimonials');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
    public function add_testimonials($id="")
	{
	     if($this->session->userdata('auth_level')) { 
	
		if($this->session->userdata('auth_level') == 9)
			{
	    $data 			= array();
		$data['id'] = base64_decode(@$id);
		$data['current_page'] ="testimonials";
		$data['page_name'] ="testimonials";
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_testimonials_details($data['id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/add_testimonials',$data);
		}
		else
	     {
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
	}
	public function save_testimonials()
	{
		$data = $this->input->post('data');	
	   $data['created_date'] = Date("Y-m-d H:i:s");
       $image = '';
		$id = $data['id'];
		$image = '';
		if($id){
			$category_details = $this->db->get_where('testimonials',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',3);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}		

		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('testimonials',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('testimonials',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
	     public function footer_content()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="footer_content";
				$data['page_name'] ="footer_content";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_privacy_policy();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/footer_content');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
   public function save_privacy_policy()
	{
		$data = $this->input->post('data');	
		$data['created_date'] = Date("Y-m-d H:i:s");
			$id = $data['id'];
		if($id){
			$category_details = $this->db->get_where('footer_content',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		
	
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('footer_content',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('footer_content',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
    public function four_types()
  {
           
		   if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
			
				$data['current_page'] ="four_types";
				$data['page_name'] ="four_types";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['four_types'] = $this->common_m->get_four_types();
               
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/four_types',$data);
				
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_four_types()
	{
		$data = $this->input->post('data');		
        $image = '';
		$id = $data['id'];
		$data['created_date'] = Date("Y-m-d H:i:s");
		if($id){
			$category_details = $this->db->get_where('four_types',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('four_types',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('four_types',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
	  public function add_four_types()
  {
    $id=$this->input->post('id');
	
    $data['value']="";
    if($id!='')
    {
		
        $data['value'] = $this->common_m->single_data('four_types',array('id'=>$id)); 
    }
	
    $this->load->view('admin/add_four_types',$data);
  }
   public function newsletter(){      
		   if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9){
				$data['current_page'] ="newsletter";
				$data['page_name'] ="newsletter";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['newsletter'] = $this->common_m->get_newsletter();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/newsletter');
			} else {
				redirect(base_url().'home/index');
			}
		} else {
			redirect(base_url().'home/index');
	    }
  }
   public function reply_to($id="")
	{
	     if($this->session->userdata('auth_level')) {
	    $data 			= array();
		$data['id'] = base64_decode(@$id);
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_reply_to($data['id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/reply_to',$data);
	     } else {
			redirect(base_url().'home/index');
	    }
	}
	public function send_reply()
{
    $data = $this->input->post('data');
     $arr = explode("@", $data['email']);
    $name = $arr[0];
    //print_r($data);exit;
    $template_data['name']    =     $name;
    $template_data['heading']    =  "News Letter";
    $template_data['msg']    =     $data['description'];
    $message = $this->parser->parse("admin/contact.php", $template_data, TRUE);
    //print_r($message);exit;
    $mail = send_mail($data['email'],'Reply to your news Letter',$message);  
    $this->session->set_flashdata('success','Your reply sent successfuly');
    echo json_encode(["status"=>"success","message"=>"Your reply sent successfuly"]);
}
 public function contact_requests(){      
		   if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9){
				$data['current_page'] ="Contact_Requests";
				$data['page_name'] ="Contact_Requests";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['contact_requests'] = $this->common_m->get_contact_requests();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/contact_requests');
			} else {
				redirect(base_url().'home/index');
			}
		} else {
			redirect(base_url().'home/index');
	    }
  }
   public function reply_to_contact($id="")
	{
	    $data 			= array();
		$data['id'] = base64_decode(@$id);
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_reply_to_contact($data['id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/reply_to_contact',$data);
	}
	public function send_reply_contact()
{
    $data = $this->input->post('data');
     $arr = explode("@", $data['email']);
    $name = $arr[0];
    //print_r($data);exit;
    $template_data['name']    =     $name;
    $template_data['heading']    =  "Contact";
    $template_data['msg']    =     $data['description'];
    $message = $this->parser->parse("admin/contact.php", $template_data, TRUE);
    //print_r($message);exit;
    $mail = send_mail($data['email'],'Reply to your contact',$message);  
    $this->session->set_flashdata('success','Your reply sent successfuly');
    echo json_encode(["status"=>"success","message"=>"Your reply sent successfuly"]);
}

	  public function plumber()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="plumber";
				$data['page_name'] ="plumber";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['users'] = $this->common_m->get_plumber();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/plumber');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
      public function update_sp_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if($status ==1){
        $this->db->query("UPDATE users SET user_status='0' WHERE user_id=$id");
        } else {
        $check_user=  $this->db->where("user_id",$id)->get("users")->row_array();
        $template_data['username'] = $check_user['username'];
		$message = $this->parser->parse("admin/activationmail.php", $template_data, TRUE); 
		$mail = send_mail($check_user['email'],'Your accout was activated',$message);
        $this->db->query("UPDATE users SET user_status='1' WHERE user_id=$id");   
        }
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Status Updated successfully!');
             echo 1;
        } else {
            $this->session->set_flashdata('error', 'Please try again !');
        }
    }
    	public function delete_record(){
    $id=$this->input->post('id');
	$table=$_POST['table'];
	$param=$_POST['param'];
    if($id){
        $this->db->where($param,$id)->delete($table);
          $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;

    } else{
         echo 0;
     }
   }
      public function view_plumber_details($id="")
	{
	     if($this->session->userdata('auth_level')) { 
	
		if($this->session->userdata('auth_level') == 9)
			{
	    $data 			= array();
		$data['id'] = base64_decode(@$id);
			$data['user_id'] = base64_decode(@$id);
		$data['current_page'] ="plumber";
		$data['page_name'] ="plumber";
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_view_plumber_details($data['id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/view_plumber_details',$data);
		}
		else
	     {
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
	}
	 public function type_of_plumbing()
  {
           
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				
				$data['current_page'] ="type_of_plumbing";
				$data['page_name'] ="type_of_plumbing";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['banners'] = $this->common_m->get_type_of_plumbing_details();
               
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/type_of_plumbing',$data);
				
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }

   public function add_type_of_plumbing()
  {
    $id=$this->input->post('id');

    $data['value']="";
    if($id!='')
    {
		
        $data['value'] = $this->common_m->single_data('type_of_plumbing',array('id'=>$id)); 
    }
	
    $this->load->view('admin/add_type_of_plumbing',$data);
  }
  public function save_type_of_plumbing()
	{
	    $data = $this->input->post('data');	
		 $image = '';
		$id = $data['id'];
		$data['created_date'] = Date("Y-m-d H:i:s");
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('type_of_plumbing',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('type_of_plumbing',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
  public function banners()
  {
           
		   if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="Banners";
				$data['page_name'] ="Banners";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['banners'] = $this->common_m->get_banners();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/banner',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_banners()
	{
		$data = $this->input->post('data');		
        $image = '';
		$id = $data['id'];
		$data['created_date'] = Date("Y-m-d H:i:s");
		if($id){
			$category_details = $this->db->get_where('banners',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('banners',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('banners',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
	  public function add_banners()
  {
    $id=$this->input->post('id');
	
    $data['value']="";
    if($id!='')
    {
		
        $data['value'] = $this->common_m->single_data('banners',array('id'=>$id)); 
    }
	
    $this->load->view('admin/add_banners',$data);
  }
   public function testimonial()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="testimonial";
				$data['page_name'] ="testimonial";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['member_corner'] = $this->common_m->get_testimonial();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/testimonial');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
    public function view_testimonial(){
    $id=$this->input->post('id');
    $data['value']="";
    if($id!=''){
      $data['value'] = $this->common_m->single_data('testimonial',array('id'=>$id)); 
    }
    $this->load->view('admin/view_testimonial',$data);
  }
   public function update_sp_status_m() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if($status ==1){
        $this->db->query("UPDATE testimonial SET status='0' WHERE id=$id");
        } else {
        $this->db->query("UPDATE testimonial SET status='1' WHERE id=$id");   
        }
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Status Updated successfully!');
             echo 1;
        } else {
            $this->session->set_flashdata('error', 'Please try again !');
        }
    }
    	 public function payment()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="about";
				$data['page_name'] ="about";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_payment();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/payment');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
   public function save_payment()
	{
		$data = $this->input->post('data');	
// 		$data['created_date'] = Date("Y-m-d H:i:s");
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('payment',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('payment',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
     public function addplumber($id="")
	{
	     if($this->session->userdata('auth_level')) { 
	
		if($this->session->userdata('auth_level') == 9)
			{
	    $data 			= array();
		$data['user_id'] = base64_decode(@$id);
		$data['current_page'] ="listed_plumber";
		$data['page_name'] ="listed_plumber";
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_addplumber_details($data['user_id']);
		$data['type_of_plumbing'] = $this->db->select('*')->from('type_of_plumbing')->where('status',1)->order_by('id','desc')->get()->result_array();
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/addplumber',$data);
		}
		else
	     {
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
	}
	public function save_addplumber()
	{
		$data = $this->input->post('data');	
	   $data['created_date'] = Date("Y-m-d H:i:s");
       $image = '';
		$id = $data['user_id'];
		if($data['type_of_plumbling'] !=""){
		$arr        = $data['type_of_plumbling'];     
       $data['type_of_plumbling']    = implode(',',$arr);   
		}else{
		  $data['type_of_plumbling'] ="";  
		}
		$image = '';
		
		if($id){
			$category_details = $this->db->get_where('users',['user_id'=>$id])->row_array();
			$image = $category_details['user_image'];
		}
		if(!empty($_FILES['user_image']['name'])){
			$data["user_image"] = $this->upload_images_all('user_image',10);
			if($data['user_image'] && $image != ''){
				unlink($image);
			}
		}else{
		   $data["user_image"]="assets/uploads/avatar-5.png"; 
		}	
			if(!empty($_FILES['banner_image']['name'])){
			$data["banner_image"] = $this->upload_images_all('banner_image',10);
			if($data['banner_image'] && $profile_pic != ''){
				//unlink($profile_pic);
			}
		}

		if(!empty($data['user_id']))
		{
			$this->db->where('user_id',$data['user_id']);
			
			unset($data['user_id']);
			$update=$this->db->update('users',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
		     
			$this->db->insert('users',$data);	
			  $id = $this->db->insert_id();
			  $enc_id= base64_encode($id);
			 $email=$data['email'];
			 $template_data['username'] = $data['username'];
			 $template_data['enc_id']      = $enc_id; 
  	        $message = $this->parser->parse("admin/usermail1.php", $template_data, TRUE); 
            $mail = send_mail($email,'Welcome To call the plumber',$message);
            
            
              
          $adminemail =$this->db->where("user_id",2)->get("users")->row_array();
		  $email_n=$adminemail['email'];
		  $template_data1['name'] = $data['username'];
          $template_data1['email'] = $data['email'];
		  $template_data1['mobile_no'] = $data['mobile_no'];
		  $template_data1['company_name'] = $data['company_name'];
   	    //   $message_n = $this->parser->parse("admin/plumberadminmail.php", $template_data1, TRUE); 
        //   $mail_n = send_mail($email_n,'New Plumber Registered',$message_n);
            
// 			echo "<pre>";print_r($this->db->last_query());exit;
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
		 public function check_email() 
   {
    $email = $this->input->post("email");
    $user_id = $this->input->post("user_id");
    if(!empty($user_id))
    {
        $check = $this->db->get_where("users",array("email"=>$email,"user_id!="=>$user_id))->row_array();
    }else
    {
        $check = $this->db->get_where("users",array("email"=>$email))->row_array();
    }    
    if (!empty($check))
    {
       echo json_encode(["status"=>"success"]);
    }
    else 
    {
       echo json_encode(["status"=>"fail"]);
    }
}
 public function check_mobile_no() 
   {
    $mobile_no = $this->input->post("mobile_no");
    $user_id = $this->input->post("user_id");
    if(!empty($user_id))
    {
        $check = $this->db->get_where("users",array("mobile_no"=>$mobile_no,"user_id!="=>$user_id))->row_array();
    }else
    {
        $check = $this->db->get_where("users",array("mobile_no"=>$mobile_no))->row_array();
    }    
    if (!empty($check))
    {
       echo json_encode(["status"=>"success"]);
    }
    else 
    {
       echo json_encode(["status"=>"fail"]);
    }
}
	  public function expiredplumber()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="expiredplumber";
				$data['page_name'] ="expiredplumber";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['users'] = $this->common_m->get_expiredplumber();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/expiredplumber');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
      public function viewplumberdetails($id="")
	{
	     if($this->session->userdata('auth_level')) { 
	
		if($this->session->userdata('auth_level') == 9)
			{
	    $data 			= array();
		$data['id'] = base64_decode(@$id);
			$data['user_id'] = base64_decode(@$id);
		$data['current_page'] ="expiredplumber";
		$data['page_name'] ="expiredplumber";
		$data['user_info'] = $this->common_m->get_user_details(user_id);
		$data['value']  =$this->common_m->get_view_plumber_details($data['id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/footer');
		$this->load->view('admin/view_plumber_details',$data);
		}
		else
	     {
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
	}
	 public function export_csv()
   {
     $host = 'https://api.twilio.com/2010-04-01/Accounts/AC6f33937785967949684ac2761ecb364c/Calls.json';
    //  $get = file_get_contents('https://api.twilio.com/2010-04-01/Accounts/ACea128158d12592e6cb1606c822da675d/Calls.csv');
    //  $arr = simplexml_load_string($get);
    // print_r($arr);
        $username   =   'AC6f33937785967949684ac2761ecb364c';
        $password   =   '6cba0dd63208c7594ec55d703c2b75d4';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$host);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $response=curl_exec($ch);
        curl_close ($ch);
        $response= json_decode($response);
        $calldata=$response->calls;
        include_once APPPATH."libraries/PHPExcel/Classes/PHPExcel.php";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=data_sheet.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        flush();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("export")->setDescription("none");
        $objPHPExcel->setActiveSheetIndex(0);
        $col = 0;
        $filename = date('Y-m-d')."callList.xls";
        header("Content-Disposition: attachment; filename=".$filename);
        $fields = array("S.No","Date","From","To","Status","Duration");
        foreach ($fields as $field) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
            $col++;
        }
         $row = 2;
        foreach ($calldata as $key => $value) {  
            $data[] = array("S.No"=>$key+1,
            "Date"=>$value->date_updated,
            "From"=>"+18559761708",
            "To"=>$value->to,
            "Status"=>$value->status,
            "Duration"=>$value->duration      
            );
        }
        foreach ($data as $data) {
            $col = 0;
            foreach ($fields as $field) {
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data[$field]);
                $col++;
            }
            $row++;
        }
        $objPHPExcel->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    
   }
   	  public function exportcsv()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="exportcsv";
				$data['page_name'] ="exportcsv";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/exportcsv');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  	  public function sendemail()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="sendemail";
				$data['page_name'] ="sendemail";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['all_users'] = $this->common_m->get_plumber_send_mail();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/sendemail');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function sendemail_to_plumbers()
{
   $data = $this->input->post('data');
  if($data['type']==2){
    $user_details  = $this->db->where("user_id",$data['user_id'])->get("users")->row_array();
   $template_data['username']=$user_details['username'];
   $template_data['body']  = $data['text'];
   $psmessage = $this->parser->parse("custom_mail.html", $template_data, TRUE);
  $attachment="";
   $mm = send_mail($user_details['email'],$data['subject'],$psmessage,$attachment);
  }else{
   
   $emails = $this->db->where("user_status",'1')->get("users")->result_array(); 
//   echo "<pre>";print_r($emails);exit;
   foreach($emails as $emaildata){
   $template_data['username']=$emaildata['username'];
   $template_data['body']  = $data['text'];
   $psmessage = $this->parser->parse("custom_mail.html", $template_data, TRUE);
  $attachment="";
   $mm = send_mail($emaildata['email'],$data['subject'],$psmessage,$attachment);	   
   }
  }
   echo json_encode(["status"=>"success","message"=>"Mails sent successfully"]);
   $this->session->set_flashdata('success','Mails sent successfully');
}
	  public function renewalplumbers()
  {
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="renewalplumbers";
				$data['page_name'] ="renewalplumbers";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['users'] = $this->common_m->get_renewalplumbers();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/renewalplumbers');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }

	  public function listed_plumber()
  {
      ini_set('memory_limit', '-1');
		ini_set('post_max_size', '4000M');
		ini_set('upload_max_filesize', '4000M');
      if($this->session->userdata('auth_level')) { 
			if($this->session->userdata('auth_level') == 9)
			{
			 //   echo "<pre>";print_r($_Request);exit;
			    $this->load->library('pagination');
				$data['current_page'] ="listed_plumber";
				$data['page_name'] ="listed_plumber";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				// $data['users'] = $this->common_m->get_listed();
				
				 if($_POST['search_data'] !=""){
               $search=$_POST['search_data'];
               $allrecord = $this->db->from('users')->group_start()->where('users.company_name like "%'.$search.'%"')->or_where('users.email like "%'.$search.'%"')->or_where('users.mobile_no like "%'.$search.'%"')->where('otp_status',1)->where('auth_level',2)->group_end()->order_by('user_id','desc')->get()->num_rows();
          $value['name']=$search;
           }else{
           $allrecord = $this->db->from('users')->where('otp_status',1)->where('auth_level',2)->order_by('user_id','desc')->get()->num_rows();
           }
				
		   $config["uri_segment"] = 3;
           $config["base_url"] = base_url().$this->router->class.'/'.$this->router->method;
        
           $config["per_page"] = 10;

            //add this also
            $config['use_page_numbers'] = TRUE;
            $config['first_url'] = '1';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
            $config['cur_tag_close'] = '</a></li>';
            $config['enable_query_strings'] = TRUE;
            $config['use_page_numbers'] = TRUE;

	 if($_POST['search_data'] !=""){
               $search=$_POST['search_data'];
               $config["total_rows"]  = $this->db->from('users')->group_start()->where('users.company_name like "%'.$search.'%"')->or_where('users.email like "%'.$search.'%"')->or_where('users.mobile_no like "%'.$search.'%"')->where('otp_status',1)->where('auth_level',2)->group_end()->order_by('user_id','desc')->get()->num_rows();
           }else{
            $config["total_rows"] = $this->db->from('users')->where('otp_status',1)->where('auth_level',2)->order_by('user_id','desc')->get()->num_rows();
           }

        //   $config["total_rows"] = $this->db->from('users')->where('otp_status',1)->where('auth_level',2)->order_by('user_id','desc')->get()->num_rows();
            $this->pagination->initialize($config);
            if($_POST['page_number'] !=""){
             $page = $_POST['page_number'];
            }else{
              $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            }
            //  echo "<pre>";print_r($page);exit;
            if ($_POST['page_number'] !="") {
                $sgm = $_POST['page_number'];
                $segment = $config['per_page'] * ($sgm - 1);
            } else {
               $offset = ($page == 0 ? 0 : ($page - 1) * $config["per_page"]);
            }
            // $offset = ($page == 0 ? 0 : ($page - 1) * $config["per_page"]);

           $data['links'] = $this->pagination->create_links();
          

           $data['start'] = ($page == 0 ? 1 : (($page - 1) * $config["per_page"] + 1));
           
           
           
		  // $data['users']=  $this->db->select('*')->from('users')->limit($config["per_page"],$offset)->where('otp_status',1)->where('auth_level',2)->order_by('user_id','desc')->get()->result_array();
		   $data['users']=  $this->common_m->get_users_details($config["per_page"],$offset,$search);
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/listed_plumber');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
    	  public function import_csv($id="")
  {
       if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
             $data       = array();
            $data['id'] = base64_decode(@$id);
            $data['current_page'] ="import_csv";
            $data['page_name'] ="import_csv";
            $data['user_info'] = $this->common_m->get_user_details(user_id);
            $this->load->view('admin/includes/header',$data);
            $this->load->view('admin/includes/footer');
            $this->load->view('admin/import_csv',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
    public function upload_events()
{
    // ini_set('max_execution_time', 10000);
    // echo "<pre>";print_r($_FILES);exit;
    $data1 = $this->input->post('data'); 
    $config['upload_path'] = 'assets/uploads/csv/';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('csv_file'))
    {
      $upload_data = $this->upload->data();
      $file_path = $upload_data['full_path'];
      $products = [];
      $h = fopen($file_path, "r");
      while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
      {
        $products[] = $data;
      }       
      fclose($h);
      $header = $products[0];
      unset($products[0]);
      foreach ($products as $k => $product) 
      {
          
          
        $p = [];
        foreach ($product as $key => $value) 
        {
           
          $p[$header[$key]] = $value;
        } 
        $products[$k] = $p;
      }
    //   print_r($products); exit;
      echo $this->InsertProducts($products,$data1);
    }
}
    public function InsertProducts($products,$data1)
{
     $headings = [ 
                  "username"                => "username", 
                  "email"                 => "email", 
                  "user_image"           => "user_image",  
                  "auth_level"             => "auth_level",  
                  "created_date"          => "created_date",
                  "user_status"              => "user_status",
                  "mobile_no"                 => "mobile_no", 
                  "longitude"             => "longitude",
                  "street"             => "street", 
                  "city"            =>"city",
                  "state"              =>"state",
                  "latitude"=>"latitude",
                  "street_address"              =>"street_address",
                  "company_name"              =>"company_name",
                 "website_url"                => "website_url", 
                //   "open_hours"                 => "open_hours", 
                //   "emergency_service"           => "emergency_service",  
                //   "type_of_plumbling"             => "type_of_plumbling",  
                //   "company_description"          => "company_description",
                //   "response_time"              => "response_time",
                //   "years_of_business"                 => "years_of_business", 
                //   "number_of_tracks"             => "number_of_tracks",
                  "address"           =>"address",
                  "zip_code_covered"             => "zip_code_covered", 
                  "zip_code"            =>"zip_code",
                //   "banner_image"              =>"banner_image",
                  "country_code"              =>"country_code",
                ];

    foreach ($products as $key => $product) 
    {
       $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($product['street_address'])."&key=AIzaSyAF6EFjA1WaQHwFZ5RCrROzSDQVZysSPzM";
		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_URL, $url);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		        $response = curl_exec($ch);
		        curl_close($ch);
		         $response_a = json_decode($response, true);
		         $data['latitude'] = ($response_a['results'][0]['geometry']['location']['lat'])?$response_a['results'][0]['geometry']['location']['lat']:"";
		         $data['longitude'] = ($response_a['results'][0]['geometry']['location']['lng'])?$response_a['results'][0]['geometry']['location']['lng']:""; 
        
      $insert = [];
      $insert[$headings['username']]               = $product['username'];
      $insert[$headings['email']]                = $product['email'];
      $insert[$headings['user_image']]                   ="assets/uploads/user_profiles/dd476408b52389dccb729da37cf316bd.png" ; //$product['Category'];
      $insert[$headings['auth_level']]                 = 3 ; //$product['Category'];
      $insert[$headings['created_date']]                = Date("Y-m-d H:i:s");;
      $insert[$headings['user_status']]         = 1;
      $insert[$headings['mobile_no']]                       = $product['mobile_no'];      
      $insert[$headings['longitude']]                =  $data['longitude'];
      $insert[$headings['street']]                = $product['street'];
      $insert[$headings['city']]                = $product['city'];
      $insert[$headings['state']]                = $product['state'];
      $insert[$headings['latitude']]                = $data['latitude'];
      $insert[$headings['street_address']]                = $product['street_address'];
      $insert[$headings['company_name']]                = $product['company_name'];
      $insert[$headings['website_url']]                = $product['website_url'];
    //   $insert[$headings['open_hours']]                = $product['open_hours'];
    //   $insert[$headings['emergency_service']]                = $product['emergency_service'];
    //   $insert[$headings['type_of_plumbling']]                = $product['type_of_plumbling'];
        // $insert[$headings['company_description']]                       = $product['company_description'];  
        //   $insert[$headings['response_time']]                       = $product['response_time'];   
    //   $insert[$headings['years_of_business']]                = $product['years_of_business'];
    //   $insert[$headings['number_of_tracks']]                = $product['number_of_tracks'];
    
      $insert[$headings['address']]                = $product['street_address'];
      $insert[$headings['zip_code_covered']]                = $product['zip_code'];
      $insert[$headings['zip_code']]                = $product['zip_code'];
    //   $insert[$headings['banner_image']]                = $product['banner_image'];
      $insert[$headings['country_code']]                       ="+1";      
      $flag = $this->db->insert('users',$insert);
      $item_id = $this->db->insert_id();
    }

    if($flag)
    {
      return true;
    }
    return false;
}


  public function advertisements()
  {
           
		   if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="advertisements";
				$data['page_name'] ="advertisements";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['banners'] = $this->common_m->get_advertisements();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/advertisements',$data);
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_advertisements()
	{
		$data = $this->input->post('data');		
        $image = '';
		$id = $data['id'];
		$data['created_date'] = Date("Y-m-d H:i:s");
		if($id){
			$category_details = $this->db->get_where('advertisements',['id'=>$id])->row_array();
			$image = $category_details['image'];
		}
		if(!empty($_FILES['image']['name'])){
			$data["image"] = $this->upload_images_all('image',1);
			if($data['image'] && $image != ''){
				unlink($image);
			}
		}
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('advertisements',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('advertisements',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
	  public function add_advertisements()
  {
    $id=$this->input->post('id');
	
    $data['value']="";
    if($id!='')
    {
		
        $data['value'] = $this->common_m->single_data('advertisements',array('id'=>$id)); 
    }
	
    $this->load->view('admin/add_advertisements',$data);
  }


	 public function subscription_plan()
  {
           
		   if($this->session->userdata('auth_level')) { 
		 
			if($this->session->userdata('auth_level') == 9)
			{
			
				$data['current_page'] ="subscription_plan";
				$data['page_name'] ="subscription_plan";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['banners'] = $this->common_m->get_subscription_plan();
               
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/subscription_plan',$data);
				
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_subscription_plan()
	{
		$data = $this->input->post('data');		
        $image = '';
		$id = $data['id'];
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('subscription_plan',$data);
			$this->session->set_flashdata('success','Data Updated Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('subscription_plan',$data);		
			$this->session->set_flashdata('success','Data Inserted Successfully !');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		}		
	}
  	  public function add_subscription_plan()
  {
    $id=$this->input->post('id');
	
    $data['value']="";
    if($id!='')
    {
		
        $data['value'] = $this->common_m->single_data('subscription_plan',array('id'=>$id)); 
    }
	
    $this->load->view('admin/add_subscription_plan',$data);
  }
  
  	 public function subscription_plan_text()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="subscription_plan_text";
				$data['page_name'] ="subscription_plan_text";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_subscription_plan_text();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/subscription_plan_text');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_subscription_plan_text()
	{
		$data = $this->input->post('data');	
		$id = $data['id'];
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('subscription_plan_text',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('subscription_plan_text',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
	
	
		 public function welcome_mail_content()
  {
		   if($this->session->userdata('auth_level')) { 
		  
			if($this->session->userdata('auth_level') == 9)
			{
				$data['current_page'] ="welcome_mail_content";
				$data['page_name'] ="welcome_mail_content";
				$data['user_info'] = $this->common_m->get_user_details(user_id);
				$data['terms'] = $this->common_m->get_welcome_mail_content();
				$this->load->view('admin/includes/header',$data);
				$this->load->view('admin/includes/footer');
				$this->load->view('admin/welcome_mail_content');
			}
			else
			{
				redirect(base_url().'home/index');
			}
		}
		else
		{
			redirect(base_url().'home/index');
	    }
  }
  public function save_welcome_mail_content()
	{
		$data = $this->input->post('data');	
// 		$data['created_date'] = Date("Y-m-d H:i:s");
		$id = $data['id'];
		if(!empty($data['id']))
		{
			$this->db->where('id',$data['id']);
			unset($data['id']);
			$update=$this->db->update('welcome_content',$data);
			$this->session->set_flashdata('success','Data Updated Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Updated Successfully"]);
		}
		else 
		{
			$this->db->insert('welcome_content',$data);
			$this->session->set_flashdata('success','Data Inserted Successfully!');
			echo json_encode(["status"=>"success","message"=>"Data Inserted Successfully"]);
		
		}		
	}
		 public function check_pageno() 
   {
    $pageno = $this->input->post("pageno");
    if (!empty($pageno))
    {
       echo json_encode(["status"=>"success","pageno"=>$pageno]);
    }
    else 
    {
       echo json_encode(["status"=>"fail"]);
    }
}
}
