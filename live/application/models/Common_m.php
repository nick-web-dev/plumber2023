<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


class Common_m extends CI_Model
{	

	public function get_user($user_id)
	{
		return $this->db->where("user_id",$user_id)->get("users")->row_array();
	}	
	//Dashboard counts
	public function get_user_count() {
        $this->db->select("count(*) as total_ussers");
        $this->db->from('users as c');
		$this->db->where('otp_status',1);
		$this->db->where('auth_level',3);
        $query = $this->db->get();
        return $query->result_array();
    }
    	public function get_user_admin_count() {
        $this->db->select("count(*) as total_ussers");
        $this->db->from('users as c');
		$this->db->where('otp_status',1);
		$this->db->where('auth_level',2);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_contact_count() {
        $this->db->select("count(*) as contact_req");
        $this->db->from('contact_us as c');
		
        $query = $this->db->get();
        return $query->result_array();
    }
	
	 public function get_newsletter_count() {
        $this->db->select("count(*) as news_letter");
        $this->db->from('newsletter as c');
		
        $query = $this->db->get();
        return $query->result_array();
    }


	public function get_user_details($id='')
	{
		if(@$id){
	     	return  $this->db->get_where('users',array('user_id'=>$id))->row();
		}else{
			return	 $this->db->get_where('users',array('auth_level'=>9))->row();			
		}	 
	}

	public function single_data($table,$where)
    {
    //echo $table;
    //echo $where;die;
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->get()->row();   
}
	public function get_home_banner()
	{	  
	      return $this->db->select('*')->from('home_banner')->order_by('id','desc')->get()->result_array();
	}
	public function get_about()
	{	  
	      return $this->db->select('*')->from('about')->order_by('id','desc')->get()->result_array();
	}
		public function get_welcome_mail_content()
	{	  
	      return $this->db->select('*')->from('welcome_content')->order_by('id','desc')->get()->result_array();
	}
	
		public function get_subscription_plan_text()
	{	  
	      return $this->db->select('*')->from('subscription_plan_text')->order_by('id','desc')->get()->result_array();
	}
	public function get_payment()
	{	  
	      return $this->db->select('*')->from('payment')->order_by('id','desc')->get()->result_array();
	}
		public function get_services_details($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('services',array('id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('services')->order_by('id','desc')->get()->result_array();    
	    }
	}
		public function get_services()
	{	  
	      return $this->db->select('*')->from('services')->order_by('id','desc')->get()->result_array();
	}
		public function get_home_content()
	{	  
	      return $this->db->select('*')->from('home_content')->order_by('id','desc')->get()->result_array();
	}
			public function get_testimonials()
	{	  
	      return $this->db->select('*')->from('testimonials')->order_by('id','desc')->get()->result_array();
	}
		public function get_testimonials_details($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('testimonials',array('id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('testimonials')->order_by('id','desc')->get()->result_array();    
	    }
	}
		public function get_privacy_policy()
	{	  
	      return $this->db->select('*')->from('footer_content')->order_by('id','desc')->get()->result_array();
	}
		public function get_four_types()
	{	  
	      return $this->db->select('*')->from('four_types')->order_by('id','desc')->get()->result_array();
	}
		public function get_newsletter()
	{	  
	      return $this->db->select('*')->from('newsletter')->order_by('id','desc')->get()->result_array();
	}
			public function get_reply_to($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('newsletter',array('id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('newsletter')->order_by('id','desc')->get()->result_array();    
	    }
	}
	public function get_contact_requests()
	{	  
	      return $this->db->select('*')->from('contact_us')->order_by('id','desc')->get()->result_array();
	}
	public function get_reply_to_contact($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('contact_us',array('id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('contact_us')->order_by('id','desc')->get()->result_array();    
	    }
	}
	public function get_plumber()
	{	  
	    return  $this->db->select('*')->from('users')->where('auth_level !=',9)->where('otp_status',1)->where('auth_level',3)->order_by('user_id','desc')->get()->result_array();
	}
		public function get_listed()
	{	  
	      return $this->db->select('*')->from('users')->where('otp_status',1)->where('auth_level',2)->order_by('user_id','desc')->get()->result_array();
	}
		public function get_view_plumber_details($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('users',array('user_id'=>$id))->row_array();
	    }
	}
	public function get_type_of_plumbing_details()
	{	  
	      return $this->db->select('*')->from('type_of_plumbing')->order_by('id','desc')->get()->result_array();
	}
	public function get_banners()
	{	  
	      return $this->db->select('*')->from('banners')->order_by('id','desc')->get()->result_array();
	}
	public function get_advertisements()
	{	  
	      return $this->db->select('*')->from('advertisements')->order_by('id','desc')->get()->result_array();
	}
			public function get_testimonial()
	{	  
	      return $this->db->select('*')->from('testimonial')->order_by('id','desc')->get()->result_array();
	}
	public function get_plumber_data($search="",$company_name="",$state="",$city="",$zip_code="",$rating="")
{
    // echo "<pre>";print_r($rating);exit;
    $this->db->select('add.*');
    $this->db->from('users as add');
     if($search !=""){
        $this->db->group_start();
       $this->db->where('add.city like "%'.$search.'%"');
       $this->db->or_where('add.zip_code like "%'.$search.'%"');
       $this->db->or_where('add.zip_code_covered like "%'.$search.'%"');
        $this->db->group_end();
     
    }
     if($company_name !="" || $state !="" || $city !="" || $zip_code !="" || $rating !=""){
         if($rating !=""){
           $this->db->join('rating as c','c.user_id = add.user_id');
             $this->db->where('c.rating',$rating);
            $this->db->group_by('c.user_id'); 
         }
          $this->db->group_start();
          $this->db->where('add.company_name like "%'.$company_name.'%"');
          $this->db->where('add.state like "%'.$search.'%"');
          $this->db->where('add.city like "%'.$city.'%"');
          $this->db->where('add.zip_code like "%'.$zip_code.'%"');
           
        $this->db->group_end();
     }
       $this->db->where('add.user_status',1);
    $this->db->where('add.auth_level !=',9);
    $this->db->order_by('add.created_date','desc');
    $query= $this->db->get()->result_array();
    // echo "<pre>";print_r($this->db->last_query());exit;
    return $query;
}
	public function get_addplumber_details($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('users',array('user_id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('users')->order_by('user_id','desc')->get()->result_array();    
	    }
	}
	public function get_expiredplumber()
	{	
	    return $this->db->select('*')->from('users')->where('auth_level !=',9)->order_by('user_id','desc')->get()->result_array();
	}
	public function get_plumber_send_mail()
	{	
	    return $this->db->select('*')->from('users')->where('auth_level !=',9)->where('user_status',1)->order_by('user_id','desc')->get()->result_array();
	}
		public function get_renewalplumbers()
	{	
	    return $this->db->select('*')->from('users')->where('auth_level !=',9)->where('payment_status',1)->order_by('user_id','desc')->get()->result_array();
	}
		public function get_subscription_plan()
	{	  
	      return $this->db->select('*')->from('subscription_plan')->order_by('id','desc')->get()->result_array();
	}
	public function get_users_details($per_page,$offset,$searched_data="")
	{	
// 	echo "<pre>";print_r($searched_data);exit;  
	 $this->db->select('*');
     if($searched_data !=""){
     	 $this->db->or_where('users.company_name like "%'.$searched_data.'%"');
     	 $this->db->or_where('users.email like "%'.$searched_data.'%"');
     	 $this->db->or_where('users.mobile_no like "%'.$searched_data.'%"');
     }
      $this->db->limit($per_page,$offset);
     $this->db->where('users.otp_status',1);
     $this->db->where('users.auth_level',2);
     $this->db->order_by('users.user_id','desc');
     $result=$this->db->get('users');
      return $result->result_array();
	}
}