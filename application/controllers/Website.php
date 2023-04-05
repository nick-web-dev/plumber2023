<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();

        $this->load->helper('mail');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->data['footer_content'] = $this->db->where("id", 1)->get("footer_content")->row_array();
        $this->data['advertisements'] = $this->db->select('*')->from('advertisements')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        require_once(APPPATH . 'third_party/sdk-php-master/autoload.php');
    }

    public function index()
    {
        $this->data['banner_content'] = $this->db->where("id", 1)->get("home_banner")->row_array();
        $this->data['four_types'] = $this->db->select('*')->from('four_types')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->data['about_us'] = $this->db->where("id", 1)->get("about")->row_array();
        $this->data['services'] = $this->db->select('*')->from('services')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->data['home_content'] = $this->db->where("id", 1)->get("home_content")->row_array();
        $this->data['testimonials'] = $this->db->select('*')->from('testimonials')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->data['testimonial_single'] = $this->db->select('*')->from('testimonials')->order_by('id', 'desc')->limit(1)->get()->row_array();
        $this->load->view('website/includes/home_header', $this->data);
        $this->load->view('website/index');
        $this->load->view('website/includes/home_footer');
        // $this->load->view('website/comingsoon');
    }

    public function plumbers()
    {
        $allrecord = $this->db->select('*')->from('users')->where('auth_level !=', 9)->where('user_status', 1)->get()->num_rows();

        $baseurl = base_url() . $this->router->class . '/' . $this->router->method;

        $paging = array();
        $paging['base_url'] = $baseurl;
        $paging['total_rows'] = $allrecord;
        $paging['per_page'] = 3;
        $paging['uri_segment'] = 3;
        $paging['num_links'] = 2;
        $paging['first_link'] = 'First';
        $paging['first_tag_open'] = '<li>';
        $paging['first_tag_close'] = '</li>';
        $paging['num_tag_open'] = '<li>';
        $paging['num_tag_close'] = '</li>';
        $paging['prev_link'] = 'Prev';
        $paging['prev_tag_open'] = '<li>';
        $paging['prev_tag_close'] = '</li>';
        $paging['next_link'] = 'Next';
        $paging['next_tag_open'] = '<li>';
        $paging['next_tag_close'] = '</li>';
        $paging['last_link'] = 'Last';
        $paging['last_tag_open'] = '<li>';
        $paging['last_tag_close'] = '</li>';
        $paging['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $paging['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($paging);

        $this->data['limit'] = $paging['per_page'];
        $this->data['number_page'] = $paging['per_page'];
        $this->data['offset'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : '0';
        $this->data['nav'] = $this->pagination->create_links();

        $this->data['plumber'] = $this->db->select('*')->from('users')->where('auth_level !=', 9)->where('user_status', 1)->limit($this->data['limit'], $this->data['offset'])->order_by('created_date', 'desc')->order_by('sort_by', 'desc')->get()->result_array();

        $this->data['banner_content'] = $this->db->where("id", 1)->get("home_banner")->row_array();

        $this->data['four_types'] = $this->db->select('*')->from('four_types')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header_plumber', $this->data);
        $this->load->view('website/plumber');
        $this->load->view('website/includes/footer');
    }

    public function search_plumber()
    {
        if ($this->input->post('city_or_zip_code')) {
            $this->data['city_or_zip_code'] = $this->input->post('city_or_zip_code');
            $search = trim($this->input->post('city_or_zip_code'));
        }
        if ($this->input->post('company_name')) {
            $this->data['company_name'] = $this->input->post('company_name');
            $company_name = trim($this->input->post('company_name'));
        }
        if ($this->input->post('state')) {
            $this->data['state'] = $this->input->post('state');
            $state = trim($this->input->post('state'));
        }
        if ($this->input->post('city')) {
            $this->data['city'] = $this->input->post('city');
            $city = trim($this->input->post('city'));
        }
        if ($this->input->post('zip_code')) {
            $this->data['zip_code'] = $this->input->post('zip_code');
            $zip_code = $this->input->post('zip_code');
        }
        if ($this->input->post('rating')) {
            $this->data['rating'] = $this->input->post('rating');
            $rating = $this->input->post('rating');
        }

        $this->data['plumber'] = $this->common_m->get_plumber_data($search, $company_name, $state, $city, $zip_code, $rating);
        $this->data['banner_content'] = $this->db->where("id", 1)->get("home_banner")->row_array();
        $this->data['four_types'] = $this->db->select('*')->from('four_types')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header_plumber', $this->data);
        $this->load->view('website/search_plumber');
        $this->load->view('website/includes/footer');
    }

    public function plumber_profiles()
    {

        $id = $_POST['id'];
        $_SESSION['pid'] = $id;

        if (isset($_SESSION['pid']) && !empty($_SESSION['pid'])) {
            $id = base64_decode($_SESSION['pid']);
            $this->data['value'] = $this->db->select('*')->from('users')->where("user_id", $id)->get()->row_array();
        } else {
            $company_name = explode(' ', str_replace('-', ' ', $this->uri->segment(5)));

            //str_replace(',','',str_replace('and','&',str_replace('-', ' ',strtolower($plumb['company_name']))))

            $this->data['value'] = $this->db->select('*')->from('users')->like("company_name", $company_name[0])->get()->row_array();
        }

        $this->load->view('website/includes/header_plumber', $this->data);
        $this->load->view('website/plumber_profile');
        $this->load->view('website/includes/footer');


    }

    public function plumber_profile()
    {

        $user_id = $this->uri->segment(5);

        if (isset($user_id) && $user_id != '') {
            //  echo  $user_id ;
            //  $_SESSION['pid'] =  $user_id;

        } else {
            $id = $this->uri->segment(3);
            $_SESSION['pid'] = $id;
        }

        if (isset($_SESSION['pid']) && !empty($_SESSION['pid'])) {
            $id = base64_decode($_SESSION['pid']);
            $this->data['value'] = $this->db->select('*')->from('users')->where("user_id", $id)->get()->row_array();
        } else {
            $company_name = explode(' ', str_replace('-', ' ', $this->uri->segment(5)));

            //str_replace(',','',str_replace('and','&',str_replace('-', ' ',strtolower($plumb['company_name']))))

            $this->data['value'] = $this->db->select('*')->from('users')->like("company_name", $company_name[0])->get()->row_array();
        }

        $this->load->view('website/includes/header_plumber', $this->data);
        $this->load->view('website/plumber_profile');
        $this->load->view('website/includes/footer');
    }

    public function testimonial()
    {
        $this->data['contant_banner'] = $this->db->where("id", 4)->get("banners")->row_array();
        $this->data['testimonial'] = $this->db->select('*')->from('testimonial')->where('status', 1)->order_by('id', 'desc')->get()->result_array();
        $this->data['plumber_names'] = $this->db->select('username,user_id')->from('users')->where('user_status', 1)->where('auth_level !=', 9)->order_by('user_id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/testimonial');
        $this->load->view('website/includes/footer');
    }

    public function add_testimonaial()
    {
        $data = $this->input->post('data');
        if ($data['rating'] != "") {
            $this->db->insert('testimonial', $data);
            $id = $this->db->insert_id();
            $data_insert = array
            (
                'rating' => $data['rating'],
                'user_id' => $data['plumbers_name'],
                'testimonial_id' => $id,
            );

            $this->db->insert('rating', $data_insert);
            $this->session->set_flashdata('success', 'Data Inserted Successfully !');
            echo json_encode(["status" => "success", "message" => "Data Inserted Successfully"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Data Inserted Successfully"]);
        }
    }

    public function contact_us()
    {
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/contact_us');
        $this->load->view('website/includes/footer');
    }

    public function pricingplans()
    {
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();
        $this->data['subscription_plan_text'] = $this->db->select('*')->from('subscription_plan_text')->where("id", 1)->get()->row_array();
        $this->data['subscription_plan'] = $this->db->select('*')->from('subscription_plan')->order_by('id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/pricing_plans');
        $this->load->view('website/includes/footer');
    }

    public function login()
    {
        $this->data['contant_banner'] = $this->db->where("id", 2)->get("banners")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/login');
        $this->load->view('website/includes/footer');
    }

    public function editplumberprofile($user_id = "")
    {
        $id = base64_decode(@$user_id);
        $this->data['user_id'] = base64_decode(@$user_id);
        $this->data['value'] = $this->db->select('*')->from('users')->where("user_id", $id)->get()->row_array();
        $this->data['type_of_plumbing'] = $this->db->select('*')->from('type_of_plumbing')->order_by('id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/editplumberprofile');
        $this->load->view('website/includes/footer');
    }

    public function updateprofile($user_id = "")
    {
        $id = base64_decode(@$user_id);
        $this->data['user_id'] = base64_decode(@$user_id);
        $this->data['value'] = $this->db->select('*')->from('users')->where("user_id", $id)->get()->row_array();
        $this->data['type_of_plumbing'] = $this->db->select('*')->from('type_of_plumbing')->order_by('id', 'desc')->get()->result_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/updateprofile');
        $this->load->view('website/includes/footer');
    }

    public function plumber_signup()
    {
        $this->data['contant_banner'] = $this->db->where("id", 1)->get("banners")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/plumber_signup');
        $this->load->view('website/includes/footer');
    }

    public function registration_form()
    {
        $data = $this->input->post('data');
        $arr = $data['type_of_plumbling'];
        $data['type_of_plumbling'] = implode(',', $arr);

        if ($data['type_of_plumbling'] != "") {
            $otp = $this->order_random_number();
            $data['otp'] = $otp;
            $data['type'] = 2;
            $data['user_status'] = 0;
            $data['otp_status'] = 0;
            $data['auth_level'] = 3;
            $mobile = $data['mobile_no'];


            if (!empty($_FILES['user_image']['name'])) {
                $data["user_image"] = $this->upload_images_all('user_image', 1);
            }
            if (!empty($_FILES['banner_image']['name'])) {
                $data["banner_image"] = $this->upload_images_all('banner_image', 1);
            }
            $data['password'] = base64_encode($data['password']);
            $data['created_date'] = Date("Y-m-d H:i:s");

            if($data['street_address'] == ''){
                $data['street_address']    = $data['address'];
            }

            if( $data['street']  == ''){
                $data['street']= $data['address'];
            }



// 		echo "<pre>";print_r($data);exit;
            $this->db->insert('users', $data);
            $id = $this->db->insert_id();
            if ($id) {
                $this->send_sms($mobile, $otp, $data['country_code']);
            }
            echo json_encode(["status" => "success", "user_id" => base64_encode($id)]);
        } else {
            echo json_encode(["status" => "fail"]);
        }
    }

    public function check_login()
    {

        $data = $this->input->post('data');

        $password = $data['password'];
        $check_user = $this->db->get_where('users', array('mobile_no' => $data['mobile_no']))->row_array();
        //  echo "<pre>";print_r($check_user);exit;
        if ($check_user) {
            if ($password == base64_decode($check_user['password'])) {

                if ($check_user['otp_status'] == 1) {
                    if ($check_user['user_status'] == 1) {
                        // $now = date('Y-m-d');
                        // //$dd = $check_user['created_date'];
                        // $dd = date("Y-m-d", strtotime("+6 months", strtotime($check_user['created_date'])));
                        //              if($now <= $dd){ 

                        $the_session = array(
                            "user_id" => $check_user['user_id'],
                            "username" => $check_user['username'],
                            "user_image" => $check_user['user_image'],
                            "email" => $check_user['email'],
                            "address" => $check_user['address'],
                            "hobbies" => $check_user['hobbies'],
                            "career" => $check_user['career'],
                            "retired" => $check_user['retired'],
                            "membership" => $check_user['membership'],
                            "about" => $check_user['about'],
                            "payment_status" => $check_user['payment_status'],
                        );
                        $this->session->set_userdata('check_user', $the_session);
                        $result = ["status" => "success", "message" => 'Logged In Successfully.'];
                        // }else{
                        //   $result = ["status"=>"payment_done","message"=>'Payment is pending.',"user_id"=>base64_encode($check_user['user_id'])];
                        // }

                    } else {
                        $message = 'Admin Approval Required..!';
                        $result = ["status" => "fail", "message" => $message];
                    }
                } else {
                    $otp = $this->order_random_number();
                    $data_insert = array
                    (
                        'otp' => $otp,
                    );
                    $res = $this->db->where("user_id", $check_user['user_id'])->get("users")->row_array();
                    $this->send_sms($res['mobile_no'], $otp, $res['country_code']);
                    $this->db->where('user_id', $check_user['user_id']);
                    $update = $this->db->update('users', $data_insert);
                    $message = 'Please enter your otp';
                    $result = ["status" => "varification", "message" => $message, "user_id" => base64_encode($check_user['user_id'])];
                }
            } else {
                $message = 'Invalid Credentials';
                $result = ["status" => "fail", "message" => $message];
            }
        } else {
            $message = 'Please enter registered phone number';
            $result = ["status" => "fail", "message" => $message];
        }
        echo json_encode($result);
    }

    public function payment($id = "")
    {
        $this->data['user_id'] = base64_decode(@$id);
        // echo "<pre>";print_r($this->data['user_id']);exit;
        $this->data['payment'] = $this->db->where("id", 1)->get("payment")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/payment');
        $this->load->view('website/includes/footer');
    }

    public function payment_success()
    {
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/payment_success');
        $this->load->view('website/includes/footer');
    }

    public function upload_images_all($books, $flag)
    {
        if ($flag == 1) {
            $path = 'user_profiles';
        } else {
        }

        $config['upload_path'] = 'assets/uploads/' . $path;
        $config['allowed_types'] = '*';
        $config['file_name'] = $_FILES[$books]['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($books)) {
            $uploadData = $this->upload->data();
            return $config['upload_path'] . '/' . $uploadData['file_name'];
        } else {
            return '';
        }
    }

    public function varification($id = "")
    {
        $this->data['user_id'] = base64_decode(@$id);
        // echo "<pre>";print_r($this->data['user_id']);exit;
        $this->data['user_details'] = $this->db->where("user_id", $this->data['user_id'])->get("users")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/varification');
        $this->load->view('website/includes/footer');
    }

    public function sendmessages()
    {

        $id = $_POST['id'];
        $_SESSION['sid'] = $id;
    }

    public function requestquotes()
    {

        $id = $_POST['id'];
        $_SESSION['rid'] = $id;
    }

    public function sendmessage()
    {
        //echo $_SESSION['sid'];
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();
        //$this->data['user_id'] = base64_decode(@$id);
        $this->data['user_id'] = base64_decode($_SESSION['sid']);
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/sendmessage');
        $this->load->view('website/includes/footer');
    }

    public function requestquote($id = "")
    {
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();
        //$this->data['user_id'] = base64_decode(@$id);
        $this->data['user_id'] = base64_decode($_SESSION['rid']);
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/requestquote');
        $this->load->view('website/includes/footer');
    }

    public function requestfile()
    {
        //   echo "<pre>";print_r($_POST);exit;
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();
        $this->data['user_id'] = base64_decode(@$id);
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/requestfile');
        $this->load->view('website/includes/footer');
    }
//     public function callthisplumner($user_id)
//   {
//       $this->data['contant_banner'] = $this->db->where("id",3)->get("banners")->row_array();

//       $id = base64_decode(@$user_id);
//         //  echo "<pre>";print_r($id);exit;
//       $this->data['phonenumber'] = $this->db->where("user_id",$id)->get("users")->row_array();

//       $this->load->view('website/includes/header',$this->data);
//       $this->load->view('website/requestfile1');
//       $this->load->view('website/includes/footer');
//   }
    public function callthisplumner()
    {
        $this->data['contant_banner'] = $this->db->where("id", 3)->get("banners")->row_array();

        $id = base64_decode(@$_POST['id']);
        //  echo "<pre>";print_r($id);exit;
        $this->data['phonenumber'] = $this->db->where("user_id", $id)->get("users")->row_array();

        //   $this->load->view('website/includes/header');
        $this->load->view('website/requestfile1', $this->data);
        //   $this->load->view('website/includes/footer');
    }

    public function save_chech_otp()
    {
        $user_id = $_POST['user_id'];
        $otp = $_POST['otp'];
        $varify_otp = $this->db->where("user_id", $user_id)->get("users")->row_array();
        if ($varify_otp['otp'] == $otp) {
            $check_user = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
            $data_insert = array
            (
                'otp_status' => 1,
                'user_status' => 1,
            );
            $this->db->where('user_id', $_POST['user_id']);
            $update = $this->db->update('users', $data_insert);

//   	     $the_session = array(
//                         "user_id" => $check_user['user_id'], 
//                         "username" => $check_user['username'], 
//                         "user_image" => $check_user['user_image'], 
//                         "email" => $check_user['email'],
//                         "address" => $check_user['address'],
//                         "payment_status"=>$check_user['payment_status'],
//                         );
//                      $this->session->set_userdata('check_user',$the_session);
            echo json_encode(["status" => "success", "message" => "Data Updated Successfully", "user_id" => base64_encode($check_user['user_id'])]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Invalid otp"]);
        }
    }

    public function website_logout()
    {
        $this->session->set_userdata('check_user');
        redirect(base_url());
    }

    public function check_email()
    {
        $email = $this->input->post("email");
        $user_id = $this->input->post("user_id");
        if (!empty($user_id)) {
            $check = $this->db->get_where("users", array("email" => $email, "user_id!=" => $user_id))->row_array();
        } else {
            $check = $this->db->get_where("users", array("email" => $email))->row_array();
        }
        if (!empty($check)) {
            if ($check['otp_status'] == 0) {
                echo json_encode(["status" => "otp_status"]);
            } else {
                echo json_encode(["status" => "success"]);
            }
        } else {
            echo json_encode(["status" => "fail"]);
        }
    }

    public function check_mobile_no()
    {
        $mobile_no = $this->input->post("mobile_no");
        $user_id = $this->input->post("user_id");
        if (!empty($user_id)) {
            $check = $this->db->get_where("users", array("mobile_no" => $mobile_no, "user_id!=" => $user_id))->row_array();
        } else {
            $check = $this->db->get_where("users", array("mobile_no" => $mobile_no))->row_array();
        }
        if (!empty($check)) {
            //      if($check['otp_status']==0){
            //   echo json_encode(["status"=>"otp_status"]);
            //  }else{
            //      echo json_encode(["status"=>"success"]);
            //  }
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "fail"]);
        }
    }

    public function save_newsletter_form()
    {
        $data = $this->db->where("email", $_POST['email'])->get("newsletter")->row_array();
        if ($data['email'] == "") {
            $arr = explode("@", $_POST['email']);
            $name = $arr[0];
            //print_r($data);exit;
            $template_data['name'] = $name;
            $template_data['heading'] = "News Letter";
            $template_data['msg'] = "Welcome to call the plumber! We’re happy to have you with us and look forward to providing you with
an excellent experience. If you require any assistance, please don’t hesitate to reach out";
            $message = $this->parser->parse("admin/contact.php", $template_data, TRUE);
            //print_r($message);exit;
            $mail = send_mail($_POST['email'], 'Welcome to call the plumber', $message);
            $data_insert = array
            (
                'email' => $_POST['email'],
            );
            $this->db->insert('newsletter', $data_insert);
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "fail"]);
        }

    }

    public function save_contact_form()
    {
        $adminemail = $this->db->where("user_id", 2)->get("users")->row_array();
        $email = $adminemail['email'];
        $template_data['name'] = $_POST['name'];
        $template_data['email'] = $_POST['email'];
        $template_data['message'] = $_POST['message'];
        $template_data['subject'] = $_POST['subject'];
        $message = $this->parser->parse("admin/conatctusmail.php", $template_data, TRUE);
        $mail = send_mail($email, 'Contact Request', $message);
        $data_insert = array
        (
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
            'subject' => $_POST['subject'],
        );

        $this->db->insert('contact_us', $data_insert);
        echo json_encode(["status" => "success"]);

    }

    public function view_services_details()
    {
        $id = $this->input->post('id');

        $data['value'] = "";
        if ($id != '') {

            $data['value'] = $this->common_m->single_data('services', array('id' => $id));
        }

        $this->load->view('website/view_services_details', $data);
    }

    public function resend_otp()
    {
        //  echo "<pre>";print_r($_POST);exit;
        $otp = $this->order_random_number();
        $data_insert = array
        (
            'otp' => $otp,
        );
        $res = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
        $this->send_sms($res['mobile_no'], $otp, $res['country_code']);
        $this->db->where('user_id', $_POST['user_id']);
        $update = $this->db->update('users', $data_insert);
        echo json_encode(["status" => "success", "message" => "Data Updated Successfully"]);
    }

    public function order_random_number()
    {
        $alphabet = "0123456789";
        $alphaLength = strlen($alphabet) - 1;
        $random_pass = array();
        for ($i = 0; $i < 4; $i++) {
            $n = rand(0, $alphaLength);
            $random_pass[] = $alphabet[$n];
        }
        return implode($random_pass);
    }

    public function forget_form()
    {
        $data = $this->input->post('data');
        //  echo "<pre>";print_r($data);exit;
        $res = $this->db->where("email", $data["email"])->get("users")->row_array();
        if (!empty($res)) {
            $enc_id = base64_encode(($res['user_id']));
            $email = urlencode(base64_encode($where['email']));
            $base_email = rtrim($email, '%3D');
            $template_data['user_name'] = $res['username'];
            $template_data['email'] = $base_email;
            $template_data['enc_id'] = $enc_id;
            $psmessage = $this->parser->parse("web_forgot_password.html", $template_data, TRUE);
            $mm = send_mail($data["email"], 'Forgot Password', $psmessage);
            $result = ["status" => "success", "message" => "The verification code was sent to your email, please check your junk/spam folder"];
        } else {
            $result = ["status" => "fail", "message" => "Please enter registered email"];
        }
        echo json_encode($result);
    }


    public function save_verification_code()
    {
        $res = $this->db->group_start()->where("email", $_POST["phone_number_or_email"])->or_where("mobile_no", $_POST["phone_number_or_email"])->group_end()->where("user_id", $_POST['user_id'])->get("users")->row_array();
        if (!empty($res)) {
            // $now = date('Y-m-d');
            // $dd = date("Y-m-d", strtotime("+6 months", strtotime($res['created_date'])));
            // if($now <= $dd){ 
            $verification_code = $this->order_random_number();
            $data_insert = array
            (
                'verification_code' => $verification_code,
            );
            $arr = explode("@", $_POST["phone_number_or_email"]);
            $name = $arr[1];
            if ($name) {
                $template_data['user_name'] = $res['username'];
                $template_data['verification_code'] = $verification_code;
                $psmessage = $this->parser->parse("verification.html", $template_data, TRUE);
                $mm = send_mail($res["email"], 'Verification Code', $psmessage);
            } else {
                $this->send_sms_v($res['mobile_no'], $verification_code, $res['country_code']);
            }


            $this->db->where('user_id', $res['user_id']);
            $update = $this->db->update('users', $data_insert);
            $res1 = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();
            $result = ["status" => "success", "message" => "The verification code was sent to your phone number"];

            // } else{
            //   $result = ["status"=>"payment_done","message"=>'The verification code was sent to your phone number.',"user_id"=>base64_encode($res['user_id'])];
            // }
        } else {
            $result = ["status" => "fail", "message" => "Enter registered email id "];
        }
        echo json_encode($result);
    }

    public function check_code_form()
    {
        $res = $this->db->where("verification_code", $_POST["code"])->where("user_id", $_POST['user_id'])->get("users")->row_array();
        if (!empty($res)) {

            $now = date('Y-m-d');
            $dd = date("Y-m-d", strtotime("+5 months", strtotime($res['created_date'])));

            if ($now <= $dd) {
                //   echo "<pre>";print_r("hi");exit;
                $data_insert = array
                (
                    'hide_show' => 1,
                );

                $this->db->where('user_id', $res['user_id']);
                $update = $this->db->update('users', $data_insert);
                $res1 = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();

                $check_user = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();
                $the_session = array(
                    "user_id" => $check_user['user_id'],
                    "username" => $check_user['username'],
                    "user_image" => $check_user['user_image'],
                    "email" => $check_user['email'],
                    "address" => $check_user['address'],
                    "payment_status" => $check_user['payment_status'],
                );
                $this->session->set_userdata('check_user', $the_session);
                $result = ["status" => "success", "message" => "The verification code successfully. Now you can edit your profile"];
            } else {
                //   echo "hello";exit;
                $result = ["status" => "payment_done", "message" => 'Your account is expired. Please do payment.', "user_id" => base64_encode($res['user_id'])];
            }

        } else {
            $result = ["status" => "fail", "message" => "Please enter valid verification code "];
        }
        echo json_encode($result);
    }

    public function check_code_form_v()
    {
        $res = $this->db->where("verification_code", $_POST["code"])->where("user_id", $_POST['user_id'])->get("users")->row_array();
        if (!empty($res)) {
            $now = date('Y-m-d');
            $dd = date("Y-m-d", strtotime("+5 months", strtotime($res['created_date'])));

            if ($now <= $dd) {
                $data_insert = array
                (
                    'hide_show' => 1,
                );

                $this->db->where('user_id', $res['user_id']);
                $update = $this->db->update('users', $data_insert);
                $res1 = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();

                $check_user = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();
                $the_session = array(
                    "user_id" => $check_user['user_id'],
                    "username" => $check_user['username'],
                    "user_image" => $check_user['user_image'],
                    "email" => $check_user['email'],
                    "address" => $check_user['address'],
                    "payment_status" => $check_user['payment_status'],
                );
                $this->session->set_userdata('check_user', $the_session);
                $result = ["status" => "success", "message" => "The verification code successfully. Now you can edit your profile", "user_id" => base64_encode($res['user_id'])];
            } else {
                //   echo "hello";exit;
                $result = ["status" => "payment_done", "message" => 'Your account is expired. Please do payment.', "user_id" => base64_encode($res['user_id'])];
            }

        } else {
            $result = ["status" => "fail", "message" => "Please enter valid verification code "];
        }
        echo json_encode($result);
    }

    public function edit_company_form()
    {
        $data = $this->input->post('data');
        $check = $this->db->get_where("users", array("email" => $data['email'], "user_id!=" => $_POST['user_id']))->row_array();

        if (!empty($check)) {
            echo json_encode(["status" => "fail", "user_id" => base64_encode($id)]);
        } else {

            $data = $this->input->post('data');
            $id = $_POST['user_id'];
            $data['hide_show'] = 0;
            $data['password'] = base64_encode($data['password']);
            $arr = $data['type_of_plumbling'];
            $data['type_of_plumbling'] = implode(',', $arr);
            $image = '';
            if ($id) {
                $category_details = $this->db->get_where('users', ['user_id' => $id])->row_array();
                $profile_pic = $category_details['banner_image'];
            }
            if (!empty($_FILES['banner_image']['name'])) {
                $data["banner_image"] = $this->upload_images_all('banner_image', 1);
                if ($data['banner_image'] && $profile_pic != '') {
                    //unlink($profile_pic);
                }
            }
            if (!empty($_FILES['user_image']['name'])) {
                $data["user_image"] = $this->upload_images_all('user_image', 1);
                if ($data['user_image'] && $profile_pic != '') {
                    //unlink($profile_pic);
                }
            }

            $data['street_address']    = $data['address'];


            if ($id) {
                $this->db->where('user_id', $_POST['user_id']);
                unset($_POST['user_id']);
                $update = $this->db->update('users', $data);

                echo json_encode(["status" => "success", "message" => "Data Updated Successfully"]);
            } else {
                $this->db->insert('users', $data);
                echo json_encode(["status" => "success", "message" => "Data Inserted Successfully"]);
            }
        }

    }

    public function updateplumberprofile()
    {
        $data = $this->input->post('data');
        $check = $this->db->get_where("users", array("email" => $data['email'], "user_id!=" => $_POST['user_id']))->row_array();

        if (!empty($check)) {
            echo json_encode(["status" => "fail", "user_id" => base64_encode($id)]);
        } else {

            $data = $this->input->post('data');
            $id = $_POST['user_id'];
            $data['hide_show'] = 0;
            $data['password'] = base64_encode($data['password']);
            $arr = $data['type_of_plumbling'];
            $data['type_of_plumbling'] = implode(',', $arr);
            $image = '';
            if ($id) {
                $category_details = $this->db->get_where('users', ['user_id' => $id])->row_array();
                $profile_pic = $category_details['banner_image'];
            }
            if (!empty($_FILES['banner_image']['name'])) {
                $data["banner_image"] = $this->upload_images_all('banner_image', 1);
                if ($data['banner_image'] && $profile_pic != '') {
                    //unlink($profile_pic);
                }
            }
            if (!empty($_FILES['user_image']['name'])) {
                $data["user_image"] = $this->upload_images_all('user_image', 1);
                if ($data['user_image'] && $profile_pic != '') {
                    //unlink($profile_pic);
                }
            }
            if ($id) {
                $this->db->where('user_id', $_POST['user_id']);
                unset($_POST['user_id']);
                $update = $this->db->update('users', $data);

                echo json_encode(["status" => "success", "message" => "Data Updated Successfully"]);
            } else {
                $this->db->insert('users', $data);
                echo json_encode(["status" => "success", "message" => "Data Inserted Successfully"]);
            }
        }

    }
// 	public function testsms(){

//         $code ="91";
//         $phone_num ="6305589539";
//         $msg = "Test Message";
//                     // $msga = str_replace(" ", "+", $msg);
//                   $sid = "ACb17424059321b775a816b4eedc4a91f6"; // Your Account SID from www.twilio.com/console
//                     $token = "c8664695c6efe36bc48d5159caba5260"; // Your Auth Token from www.twilio.com/console
//     //print_r($code);exit;
//                     $client = new Twilio\Rest\Client($sid, $token);
//                 // echo "<pre>";print_r($client->messages);exit;
//                     $message = $client->messages->create(
//                       "+".$code.$phone_num, // Text this number
//                       array(
//                         'from' => '+12059646386', // From a valid Twilio number
//                         'body' => $msg
//                       )
//                     ); 
//             // Use the client to do fun stuff like send text messages!


//     }
    public function send_sms($phone_number, $otp, $country_code)
    {

        $id = "AC6f88b6b1c6a3bf5931c6d32ed117b993";
        $token = "cc255011c9f7d03455dfa7b229e63285";
        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = "+18559761708";
        //   $phone_number="6305589539";
        $to = $country_code . $phone_number; // twilio trial verified number
        //$body = "Dear Customer,.".$otp." is your OTP to verify your Mobile Number. Thank you";
        //   $otp=1234;
        $body = $otp . " is your Call The plumber OTP. Do not share the OTP with anyone.";
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        // print_r($y);exit;
        curl_close($x);
        //var_dump($post);
        return $y;
    }

    public function send_sms_v($phone_number, $otp, $country_code)
    {

        $id = "AC6f88b6b1c6a3bf5931c6d32ed117b993";
        $token = "cc255011c9f7d03455dfa7b229e63285";

        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = "+18559761708";
        //   $phone_number="6305589539";
        $to = $country_code . $phone_number; // twilio trial verified number
        //$body = "Dear Customer,.".$otp." is your OTP to verify your Mobile Number. Thank you";
        //   $otp=1234;
        $body = $otp . " is your Call The plumber verification code. Do not share the verification code with anyone.";
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        //   print_r($y);exit;
        curl_close($x);
        //var_dump($post);
        return $y;
    }

    public function send_meaasge()
    {

        $res = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
        $this->send_message_to_plumber($res['mobile_no'], $res['country_code'], $_POST['name'], $_POST['email'], $_POST['message']);
        echo json_encode(["status" => "success"]);

    }

    public function send_message_to_plumber($phone_number, $country_code, $name, $email, $message)
    {

        $id = "AC6f88b6b1c6a3bf5931c6d32ed117b993";
        $token = "cc255011c9f7d03455dfa7b229e63285";


        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = "+18559761708";
        //   $phone_number="6305589539";
        $to = $country_code . $phone_number; // twilio trial verified number
        //$body = "Dear Customer,.".$otp." is your OTP to verify your Mobile Number. Thank you";
        //   $otp=1234;
        $body = "Hi " . $name . ", Please check below details. Email:" . $email . ", message:" . $message;
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        //   print_r($y);exit;
        curl_close($x);
        //var_dump($post);
        return $y;
    }

    public function send_reqestquote()
    {
        $data = $this->input->post('data');
        $res = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
        $this->send_reqestquote_to_plumber($res['mobile_no'], $res['country_code'], $data);
        echo json_encode(["status" => "success"]);

    }

    public function send_reqestquote_to_plumber($phone_number, $country_code, $data)
    {

        $id = "AC6f88b6b1c6a3bf5931c6d32ed117b993";
        $token = "cc255011c9f7d03455dfa7b229e63285";

        $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
        $from = "+18559761708";
        //   $phone_number="6305589539";
        $to = $country_code . $phone_number; // twilio trial verified number
        //$body = "Dear Customer,.".$otp." is your OTP to verify your Mobile Number. Thank you";
        //   $otp=1234;
        $body = "Hi " . $data['name'] . ".Please check below details. Email:" . $data['email'] . ", phone pumber:" . $data['phone_pumber'] . ", zip-code" . $data['zip_code'] . ", Your request" . $data['your-request'] . ", Your project details" . $data['message'];
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        //   print_r($y);exit;
        curl_close($x);
        //var_dump($post);
        return $y;
    }

    public function check_register_mobile_number()
    {
        $data = $this->input->post('data');
        $res = $this->db->where("mobile_no", $data['mobile_no'])->get("users")->row_array();
        if (!empty($res)) {
            $result = ["status" => "success", "message" => "The phone number verified successfully", "user_id" => base64_encode($res['user_id'])];
        } else {
            $result = ["status" => "fail", "message" => "Please enter registered  phone number"];
        }
        echo json_encode($result);
    }
//   public function check_register_mobile_number_from_profile_page(){
//       $data = $this->input->post('data');
//     $res =  $this->db->where("mobile_no",$data['mobile_no'])->get("users")->row_array();
//         if(!empty($res))
//         {  

//             $result = ["status"=>"success","message"=>"The phone number verified successfully","user_id"=>base64_encode($res['user_id'])];
//         } 
//         else
//         {
//           $result = ["status"=>"fail","message"=>"Please enter registered  phone number"];
//         }
//          echo json_encode($result);
// }

    public function check_register_mobile_number_from_profile_page()
    {
        $data = $this->input->post('data');
        $res = $this->db->group_start()->where("email", $data['mobile_no'])->or_where("mobile_no", $data['mobile_no'])->group_end()->where("user_id", $_POST['user_id'])->get("users")->row_array();
        if (!empty($res)) {
            // $now = date('Y-m-d');
            // $dd = date("Y-m-d", strtotime("+6 months", strtotime($res['created_date'])));
            // if($now <= $dd){ 
            $verification_code = $this->order_random_number();
            $data_insert = array
            (
                'verification_code' => $verification_code,
            );
            $arr = explode("@", $data["phone_number_or_email"]);
            $name = $arr[1];
            if ($name) {
                $template_data['user_name'] = $res['username'];
                $template_data['verification_code'] = $verification_code;
                $psmessage = $this->parser->parse("verification.html", $template_data, TRUE);
                $mm = send_mail($res["email"], 'Verification Code', $psmessage);
            } else {
                $this->send_sms_v($res['mobile_no'], $verification_code, $res['country_code']);
            }


            $this->db->where('user_id', $res['user_id']);
            $update = $this->db->update('users', $data_insert);
            $res1 = $this->db->where("user_id", $res['user_id'])->get("users")->row_array();
            $result = ["status" => "success", "message" => "The verification code was sent to your phone number", "user_id" => base64_encode($res['user_id'])];

            // } else{
            //   $result = ["status"=>"payment_done","message"=>'Your account is expired. Please do payment.',"user_id"=>base64_encode($res['user_id'])];
            // }
        } else {
            $result = ["status" => "fail", "message" => "Enter registered phone number"];
        }
        echo json_encode($result);
    }


    public function phone_number_varification($id = "")
    {
        $this->data['user_id'] = base64_decode(@$id);
        // echo "<pre>";print_r($this->data['user_id']);exit;
        $this->data['user_details'] = $this->db->where("user_id", $this->data['user_id'])->get("users")->row_array();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/phone_number_varification');
        $this->load->view('website/includes/footer');
    }

    public function registration_for_signup()
    {
        $data = $this->input->post('data');
        $otp = $this->order_random_number();
        $data['otp'] = $otp;
        $data['type'] = 2;
        $data['user_status'] = 0;
        $data['otp_status'] = 0;
        $data['auth_level'] = 3;
        $mobile = $data['mobile_no'];
        $data['created_date'] = Date("Y-m-d H:i:s");
// 		echo "<pre>";print_r($data);exit;
        $this->db->insert('users', $data);
        $id = $this->db->insert_id();
        if ($id) {
            $this->send_sms($mobile, $otp, $data['country_code']);
        }
        echo json_encode(["status" => "success", "user_id" => base64_encode($id)]);
    }

    public function plumber_create($user_id = "")
    {
        $id = base64_decode(@$user_id);
        $this->data['user_id'] = base64_decode(@$user_id);
        $this->data['contant_banner'] = $this->db->where("id", 1)->get("banners")->row_array();
        $this->data['type_of_plumbing'] = $this->db->select('*')->from('type_of_plumbing')->where('status', 1)->order_by('id', 'desc')->get()->result_array();

        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/plumber_create');
        $this->load->view('website/includes/footer');
    }

    public function updateplumberplumber()
    {

        $data = $this->input->post('data');
        $id = $_POST['user_id'];
        $data['password'] = base64_encode($data['password']);
        $arr = $data['type_of_plumbling'];
        $data['type_of_plumbling'] = implode(',', $arr);
        $image = '';
        if ($id) {
            $category_details = $this->db->get_where('users', ['user_id' => $id])->row_array();
            $profile_pic = $category_details['banner_image'];
        }
        if (!empty($_FILES['banner_image']['name'])) {
            $data["banner_image"] = $this->upload_images_all('banner_image', 1);
            if ($data['banner_image'] && $profile_pic != '') {
                //unlink($profile_pic);
            }
        }
        if (!empty($_FILES['user_image']['name'])) {
            $data["user_image"] = $this->upload_images_all('user_image', 1);
            if ($data['user_image'] && $profile_pic != '') {
                //unlink($profile_pic);
            }
        }
        if($data['street'] ==""){
            $data['street']    = 0;
        }

        $data['street_address']    = $data['address'];




        $check_user = $this->db->where("user_id", $id)->get("users")->row_array();
        $enc_id = base64_encode($id);
        $template_data1['enc_id'] = $enc_id;
        $template_data1['name'] = $data['username'];
        $template_data1['heading'] = "Welcome to call the plumber";
        $banner_content = $this->db->where("id", 1)->get("welcome_content")->row_array();
        $template_data1['msg'] = $banner_content['content'];
        // $template_data1['msg']     =  "Welcome to call the plumber! We’re happy to have you with us and look forward to providing you with
        //                                  an excellent experience. If you require any assistance, please don’t hesitate to reach out";
        $message1 = $this->parser->parse("admin/welcomemail.php", $template_data1, TRUE);
        //print_r($message);exit;
        $email1 = $data['email'];
        $mail2 = send_mail($email1, 'Welcome to call the plumber', $message1);
        if ($id) {

            $this->db->where('user_id', $_POST['user_id']);
// 			unset($_POST['user_id']);
            $update = $this->db->update('users', $data);
            $adminemail = $this->db->where("user_id", 2)->get("users")->row_array();
            $email = $adminemail['email'];
            $template_data['name'] = $data['username'];
            $template_data['email'] = $data['email'];
            $template_data['mobile_no'] = $check_user['mobile_no'];
            $template_data['company_name'] = $data['company_name'];
            $message = $this->parser->parse("admin/plumberadminmail.php", $template_data, TRUE);
            $mail = send_mail($email, 'New Plumber Registered', $message);
            echo json_encode(["status" => "success", "message" => "Data Updated Successfully"]);
        } else {
            $this->db->insert('users', $data);
            echo json_encode(["status" => "success", "message" => "Data Inserted Successfully"]);
        }
    }

    //authorize code start here
    public function save_payment()
    {
        $card = strlen($_POST['card_no']);
        $cvv = strlen($_POST['cvv']);
        if ($card == 16 && $cvv == 3) {
            $check_user = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
            $the_session = array(
                "user_id" => $check_user['user_id'],
                "username" => $check_user['username'],
                "user_image" => $check_user['user_image'],
                "email" => $check_user['email'],
                "address" => $check_user['address'],
                "payment_status" => $check_user['payment_status'],
            );
            $this->session->set_userdata('check_user', $the_session);
            $data_insert = array
            (
                'name_on_card' => $_POST['name_on_card'],
                'cvv' => $_POST['cvv'],
                'expiry_date' => $_POST['expiry_date'],
                'card_no' => $_POST['card_no'],
                'membership' => $_POST['id'],
                'payment_status' => 1,
                "created_date" => Date("Y-m-d H:i:s"),
            );

            $this->db->where('user_id', $_POST['user_id']);
            unset($_POST['user_id']);
            $update = $this->db->update('users', $data_insert);
            echo json_encode(["status" => "success", "message" => "Data Updated Successfully"]);
        } else {
            echo json_encode(["status" => "fail", "message" => "Invalid card details"]);
        }
    }


    public function authorize_net()
    {

        $name = $_POST['name_on_card'];
        $email = $_POST['email'];
        $card_number = $_POST['card_no'];
        $card_exp_month = $_POST['month'];
        $card_exp_year = $_POST['year'];
        $card_exp_year_month = $card_exp_year . '-' . $card_exp_month;
        $card_cvc = $_POST['cvv'];

        // Set the transaction's reference ID
        $refID = 'REF' . time();

        // Create a merchantAuthenticationType object with authentication details
        // retrieved from the config file
        $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
        // $merchantAuthentication->setName("4YsMu5h3FU3");
        // $merchantAuthentication->setTransactionKey("9pS36RUKwE7v75nN");


        $merchantAuthentication->setName("5n3sB39Tdx5");
        $merchantAuthentication->setTransactionKey("895Qu7nG5CV7PUn3");

        // Create the payment data for a credit card
        $creditCard = new net\authorize\api\contract\v1\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($card_exp_year_month);
        $creditCard->setCardCode($card_cvc);

        // Add the payment data to a paymentType object
        $paymentOne = new net\authorize\api\contract\v1\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $order = new net\authorize\api\contract\v1\OrderType();
        $order->setDescription($itemName);

        // Set the customer's identifying information
        $customerData = new net\authorize\api\contract\v1\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setEmail($email);

        // Create a transaction
        $transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($_POST['amount']);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setCustomer($customerData);
        $request = new net\authorize\api\contract\v1\CreateTransactionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setRefId($refID);
        $request->setTransactionRequest($transactionRequestType);
        $controller = new net\authorize\api\controller\CreateTransactionController($request);
        $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::PRODUCTION"));
        // $response = $controller->executeWithApiResponse(constant("\\net\authorize\api\constants\ANetEnvironment::SANDBOX"));


        // echo "<pre>";print_r($response);exit;
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();
                if ($tresponse != null && $tresponse->getMessages() != null) {
                    $check_user = $this->db->where("user_id", $_POST['user_id'])->get("users")->row_array();
                    $the_session = array(
                        "user_id" => $check_user['user_id'],
                        "username" => $check_user['username'],
                        "email" => $check_user['email'],
                        "payment_status" => $check_user['payment_status'],
                    );
                    $this->session->set_userdata('check_user', $the_session);
                    $data_insert = array
                    (
                        'hide_show' => 1,
                        'name_on_card' => $_POST['name_on_card'],
                        'cvv' => $_POST['cvv'],
                        'month' => $_POST['month'],
                        'year' => $_POST['year'],
                        'card_no' => $_POST['card_no'],
                        'payment_status' => 1,
                        "payment_date" => Date("Y-m-d H:i:s"),
                        "created_date" => Date("Y-m-d H:i:s"),
                    );

                    $this->db->where('user_id', $_POST['user_id']);
                    unset($_POST['user_id']);
                    $update = $this->db->update('users', $data_insert);
                    $result = ["status" => "success", "message" => "The payment done successfully. Now you can edit your profile", "user_id" => base64_encode($check_user['user_id'])];
                } else {
                    $result = ["status" => "fail", "message" => "Transaction Failed"];
                }
                // Or, print errors if the API request wasn't successful
            } else {
                $result = ["status" => "fail", "message" => "Transaction Failed"];
            }
        }
        echo json_encode($result);
    }

    public function expired_plumber_email()
    {
        //   echo "<pre>";print_r($_POST);exit;
        $plumber = $this->db->select('*')->from('users')->where('auth_level !=', 9)->order_by('user_id', 'desc')->get()->result_array();
        foreach ($plumber as $key) {
            $now = date('Y-m-d');
            // //$dd = $check_user['created_date'];
            $dd = date("Y-m-d", strtotime("+6 months", strtotime($key['created_date'])));
            if ($now >= $dd) {
                $enc_id = base64_encode($key['user_id']);
                $template_data['enc_id'] = $enc_id;
                $template_data['name'] = $key['username'];
                $template_data['heading'] = "Your account has expired";
                $template_data['msg'] = "Your account has expired. Please Renew your account.";
                $message = $this->parser->parse("admin/expiredemail.php", $template_data, TRUE);
                //print_r($message);exit;
                $mail = send_mail($key['email'], 'Your account has expired', $message);
            }
        }
    }
}