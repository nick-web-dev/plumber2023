<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// ------------------------------------------------------------------------

function showSuccessMessage() {
    $ci = &get_instance()
    ?>
    <div class="alert alert-block alert-success fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Success!</strong> <?php echo $ci->session->flashdata('success'); ?>
    </div>
<?php
}

function showErrorMessage($error) {
    ?>
    <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close close-sm" type="button">
            <i class="icon-remove"></i>
        </button>
        <strong>Error! </strong> <?php echo ' ' . $error; ?>
    </div>
<?php
}

if (!function_exists('get')) {

    function get($table, $where = FALSE, $limit = FALSE, $order_by = FALSE) {
        $CI = &get_instance();
        return $CI->global_model->get($table, $where, $limit, $order_by);
    }

}

if (!function_exists('get_data')) {

    function get_data($table, $where) {
        $CI = &get_instance();
        return $CI->global_model->get_data($table, $where);
    }

}

if (!function_exists('row_count')) {

    function row_count($table, $where) {
        $CI = &get_instance();
        return $CI->global_model->row_count($table, $where);
    }

}



//pagination
// create paggination configuratin
if (!function_exists('createPagging')) {

    function createPagging($page_url, $total_rows, $per_page, $uri_segment = 3, $num_links = 2) {
        $CI = &get_instance();
        //load the pagging library
        $CI->load->library('pagination');
        // set the configuration
        $config['base_url'] = $page_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = $uri_segment;
        $config['num_links'] = $num_links;
        // pagging design section
        // open full tag
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //echo print_r($config);
        $CI->pagination->initialize($config);
    }

}

if (!function_exists('uploadConfiguration')) {
    function uploadConfiguration() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;

        //$config['max_size'] = '51200000';
        $config['file_name'] =time();
//        $config['max_width'] = '1024';
//        $config['max_height'] = '768';
        $CI->upload->initialize($config);
    }

}


if (!function_exists('uploadEvent')) {
    function uploadEvent() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/event/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadInsideBlog')) {
    function uploadInsideBlog() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/insideblog/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadMessage')) {
    function uploadMessage() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/message/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadGroup')) {
    function uploadGroup() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/group/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadPersonals')) {
    function uploadPersonals() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/personals/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadCES')) {
    function uploadCES() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/ces/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}


if (!function_exists('uploadProduct')) {
    function uploadProduct() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/product/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}


if (!function_exists('uploadpublicweb')) {
    function uploadpublicweb() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/publicweb/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

if (!function_exists('uploadprivateweb')) {
    function uploadprivateweb() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/privateweb/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}
if (!function_exists('uploadforum')) {
    function uploadforum() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/forum/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}


//faruk.....
if (!function_exists('uploadBLOG')) {
    function uploadBLOG()
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        
        
        $config['upload_path'] = './assets/file/blog/';
        $config['max_size'] = '2048';

        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = time();
        $CI->upload->initialize($config);
    }

}



    if (!function_exists('countryNameByID')) {

    function countryNameByID($countryId) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('countries', array('id' => $countryId));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('getStatesByCountry')) {

    function getStatesByCountry($personalId) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('personals', array('id' => $personalId));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}


//////////////////////// private web


if (!function_exists('privategetStatesByCountry')) {

    function privategetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('private_website', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}
//////////////////////// Public web


if (!function_exists('publicgetStatesByCountry')) {

    function publicgetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('public_website', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}


/////////////////////////classifiedget

if (!function_exists('classifiedgetStatesByCountry')) {

    function classifiedgetStatesByCountry($id) {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('classified', array('id' => $id));

        if ($result['country']) {
            $states = $CI->global_model->get('states', array('country_id' => $result['country']));
            return $states;
        } else {
            return false;
        }
    }

}

if (!function_exists('getDepartment')) {

    function getDepartment($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('department', array('dep_id' => $Id));
        if ($result['dep_name']) {
            return $result['dep_name'];
        } else {
            return false;
        }
    }

}


if (!function_exists('getDesignation')) {

    function getDesignation($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('designation', array('dg_id' => $Id));
        if ($result['dg_name']) {
            return $result['dg_name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('getNameById')) {

    function getNameById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('users', array('id' => $Id));
        if ($result['full_name']) {
            return $result['full_name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('catNameById')) {

    function catNameById($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('insideblog_cat', array('id' => $Id));
        if ($result['cat_name']) {
            return $result['cat_name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('classifiedcatName')) {

    function classifiedcatName($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('classified_main_cat', array('id' => $Id));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('productCatName')) {

    function productCatName($Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('product_main_cat', array('id' => $Id));
        if ($result['cat_name']) {
            return $result['cat_name'];
        } else {
            return false;
        }
    }

}

if (!function_exists('getImage')) {

    function getImage($imageType='',$Id='') {
        $CI = &get_instance();

        $result = $CI->global_model->get_data('photos', array('ref_id' => $Id,'ref_name'=>$imageType));
        if ($result['name']) {
            return $result['name'];
        } else {
            return false;
        }
    }

}
if (!function_exists('get_email_tmpl_by_email_name')) {

    function get_email_tmpl_by_email_name($name)
    {
        $CI = &get_instance();
        $query = $CI->db->get_where('emailtmpl',array('email_name'=>$name));
        if($query->num_rows()>0)
        {
            $row = $query->row();
            $values = json_decode($row->values);
            return $values;
        }
        else
        {
            $values = array('subject'=>'Subject Not found','body'=>'body not found');
        }
        return $values;
    }

}

if (!function_exists('confirm_email')) {

    function confirm_email($code)
    {
        $CI = &get_instance();
        //$email = base64_decode($email);
        $query = $CI->db->get_where('users',array('confirmation_key'=>$code));
        if($query->num_rows()>0)
        {
            $CI->load->helper('date');
            $datestring = "%Y-%m-%d %h:%i:00";
            $time = time();

            $data['confirmed'] = 1;
            /*$data['confirmed_date'] = mdate($datestring, $time);*/
            $data['confirmation_key'] = '';
            $CI->db->update('users',$data,array('confirmation_key'=>$code));
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

}

if (!function_exists('register_user_if_not_exists')) {

    function register_user_if_not_exists($user,$network='')
    {
        $CI = &get_instance();
        $query = $CI->db->get_where('users',array('email'=>$user['email']));
        if($query->num_rows()>0)
        {
            $row = $query->row_array();
            return $row;
        }
        else
        {
            $userdata 				= array();
            //$userdata['user_type']	= ($this->session->userdata('signup_user_type')!='')?$this->session->userdata('signup_user_type'):2;//2 = users
            $userdata['first_name'] = $user['first_name'];
            $userdata['last_name'] 	= $user['last_name'];
            $userdata['gender'] 	= $user['gender'];
            if($network=='google')
            {
                if($user['username']=='')
                {
                    $CI->db->like('user_name','gp_');
                    $query = $CI->db->get_where('users');
                    $total = $query->num_rows();
                    $tmp_username = 'gp_user'.($total+1);
                }
                else
                {
                    $tmp_username = 'gp_'.$user['username'];
                }

                $userdata['user_name'] 	= $tmp_username;
            }
            else
            {
                if($user['username']=='')
                {
                    $CI->db->like('user_name','fb_');
                    $query = $CI->db->get_where('users');
                    $total = $query->num_rows();
                    $tmp_username = 'fb_user'.($total+1);
                }
                else
                {
                    $tmp_username = 'fb_'.$user['username'];
                }

                $userdata['user_name'] 	= $tmp_username;

                $ch = curl_init();
                curl_setopt ($ch, CURLOPT_URL, $user['picture']['data']['url']);
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                $data = curl_exec($ch);
                curl_close($ch);
                $fileName = base_url().'assets/uploads/profile_photos/'.$tmp_username.'.jpg';
                $file = fopen($fileName, 'w+');
                fputs($file, $data);
                fclose($file);
                $fileName = base_url().'assets/uploads/profile_photos/thumb/'.$tmp_username.'.jpg';
                $file = fopen($fileName, 'w+');
                fputs($file, $data);
                fclose($file);

                $userdata['profilepicture'] =  ''.$tmp_username.'.jpg';
            }
            $userdata['email'] = $user['email'];
            $userdata['password'] 	= '';
            $userdata['confirmed'] 	= 1;
            $userdata['status']		= 1;
            $CI->db->insert('users',$userdata);
            $userdata['id']			= $CI->db->insert_id();
            return $userdata;
        }
    }

}

if (!function_exists('set_recovery_key')) {
    function set_recovery_key($email){
        $CI = &get_instance();
        $recovery_key = uniqid();
        $CI->db->update('users',array('recovery_key'=>$recovery_key),array('email'=>$email));

        $query = $CI->db->get_where('users',array('email'=>$email));
        $data = $query->row_array();
        $data['recovery_key'] = $recovery_key;
        //echo '<pre>';print_r($data);die;
        return $data;

    }
}

if (!function_exists('uploadVarification')) {
    function uploadVarification() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './assets/file/varification/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

//// CRICKET USE START FORM HERE
function en2bnSomeCommonString($string) {
    $search_array = array("Female", "Male", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "pm", "am", "Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
    $replace_array = array("মহিলা", "পুরুষ", "জানুয়ারী", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর", "বিকাল", "সকাল", "শনিবার", "রোববার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহস্পতিবার", "শুক্রবার");
    $en_number = str_replace($search_array, $replace_array, $string);
    return $en_number;
}

function en2bnNumber($number) {
    $search_array = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "-", "এ-এম", "পি-এম");
    $replace_array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "AM", "PM");
    $en_number = str_replace($replace_array, $search_array, $number);
    return $en_number;
}

function strikerate($run,$ball)
{
    if($run != 0 && $ball != 0) {
       $economy = $run * 100 / $ball;
    }
    else{
        $economy = "0.00";
    }
    return number_format((float)$economy, 2, '.', '');

}

function overstoballs($overs)
{
    return 10 * $overs -4 * (int)$overs;
}

function ballstoover_int($balls)
{
    return (int)($balls / 6) + .1 * ( $balls % 6);
}

function ballstoovers($ball_number)
{
    if($ball_number > 0){
        $balls_in_this_over = fmod($ball_number,6)/10;
        $overs_only = floor( $ball_number/6);
        if($balls_in_this_over > 0)
        {
            return $overs_total = ((($overs_only)) + ($balls_in_this_over));
        }
        elseif($balls_in_this_over == 0)
        {
            $balls_in_this_over = 0.6;
            return  $overs_total = ((($overs_only) -1) + ($balls_in_this_over));
        }

    }
    else{
        return  $overs_total = 0.0;
    }

}


if (!function_exists('upload_documents')) {
    function upload_documents() {
        $CI = &get_instance();
        $CI->load->library('upload');
        $config['upload_path'] = './public/img/';

        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] =time();
        $CI->upload->initialize($config);
    }

}

/// this function use for ball color changing
function getBallColor($run){
    if($run==0){
        $color = 'bg-inverse';
    }elseif($run==1){
        $color = 'bg-theme';
    }elseif($run==2){
        $color = 'bg-theme';
    }elseif($run==3){
        $color = 'bg-primary';
    }elseif($run==4){
        $color = 'bg-success';
    }elseif($run==5){
        $color = 'bg-inverse';
    }elseif($run==6){
        $color = 'bg-warning';
    }
    elseif($run==7){
        $color = 'bg-warning';
    }

return $color;
}


function matchtype($mtype){
    if($mtype==1){
        $playball = 2700;
    }
    elseif($mtype==2){
        $playball = 300;
    }
    elseif($mtype==3){
        $playball = 120;
    }
    elseif($mtype==4){
        $playball = 60;
    }
    return $playball;
}

if ( ! function_exists('create_large'))
{
    function create_large($img,$dest)
    {
        $seg = explode('.',$img);
        $thumbType      = 'jpg';
        $thumbSize      = 400;
        $thumbWidth     = 900;
        $thumbHeight    = 400;
        $thumbPath      = $dest;
        $thumbQuality   = 90;

        /*$thumbSize      = 100;
        $thumbWidth     = 100;
        $thumbHeight    = 100;
        $thumbPath      = $dest;
        $thumbQuality   = 100;*/

        $last_index = count($seg);
        $last_index--;

        if(strcasecmp($seg[$last_index], 'jpg') == 0 || strcasecmp($seg[$last_index], 'jpeg') == 0)
        {
            if (!$full = imagecreatefromjpeg($img)) {
                return 'error';
            }
        }
        else if(strcasecmp($seg[$last_index], 'png') == 0)
        {
            if (!$full = imagecreatefrompng($img)) {
                return 'error';
            }
        }
        else if(strcasecmp($seg[$last_index], 'gif') == 0)
        {
            if (!$full = imagecreatefromgif($img)) {
                return 'error';
            }
        }

        $width  = imagesx($full);
        $height = imagesy($full);

        /* work out the smaller version, setting the shortest side to the size of the thumb, constraining height/wight */
        if ($height > $width) {
            $divisor = $width / $thumbHeight;
        } else {
            $divisor = $height / $thumbWidth;
        }

        $resizedWidth   = ceil($width / $divisor);
        $resizedHeight  = ceil($height / $divisor);

        /* work out center point */
        $thumbx = floor(($resizedWidth  - $thumbWidth) / 2);
        $thumby = floor(($resizedHeight - $thumbHeight) / 2);

        /* create the small smaller version, then crop it centrally to create the thumbnail */
        $resized  = imagecreatetruecolor($resizedWidth, $resizedHeight);
        $thumb    = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresized($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
        imagecopyresized($thumb, $resized, 0, 0, $thumbx, $thumby, $thumbWidth, $thumbHeight, $thumbWidth, $thumbHeight);

        $name = name_from_url($img);

        imagejpeg($thumb, $thumbPath.str_replace('_large.jpg', '_thumb.jpg', $name), $thumbQuality);
    }

}

if ( ! function_exists('create_rectangle_thumb'))
{
    function create_rectangle_thumb($img,$dest)
    {
        $seg = explode('.',$img);
        $thumbType      = 'jpg';
        $thumbSize      = 300;
        $thumbWidth     = 300;
        $thumbHeight    = 226;
        $thumbPath      = $dest;
        $thumbQuality   = 100;

        /*$thumbSize      = 100;
        $thumbWidth     = 100;
        $thumbHeight    = 100;
        $thumbPath      = $dest;
        $thumbQuality   = 100;*/

        $last_index = count($seg);
        $last_index--;

        if(strcasecmp($seg[$last_index], 'jpg') == 0 || strcasecmp($seg[$last_index], 'jpeg') == 0)
        {
            if (!$full = imagecreatefromjpeg($img)) {
                return 'error';
            }
        }
        else if(strcasecmp($seg[$last_index], 'png') == 0)
        {
            if (!$full = imagecreatefrompng($img)) {
                return 'error';
            }
        }
        else if(strcasecmp($seg[$last_index], 'gif') == 0)
        {
            if (!$full = imagecreatefromgif($img)) {
                return 'error';
            }
        }

        $width  = imagesx($full);
        $height = imagesy($full);

        /* work out the smaller version, setting the shortest side to the size of the thumb, constraining height/wight */
        if ($height > $width) {
            $divisor = $width / $thumbHeight;
        } else {
            $divisor = $height / $thumbWidth;
        }

        $resizedWidth   = ceil($width / $divisor);
        $resizedHeight  = ceil($height / $divisor);

        /* work out center point */
        $thumbx = floor(($resizedWidth  - $thumbWidth) / 2);
        $thumby = floor(($resizedHeight - $thumbHeight) / 2);

        /* create the small smaller version, then crop it centrally to create the thumbnail */
        $resized  = imagecreatetruecolor($resizedWidth, $resizedHeight);
        $thumb    = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresized($resized, $full, 0, 0, 0, 0, $resizedWidth, $resizedHeight, $width, $height);
        imagecopyresized($thumb, $resized, 0, 0, $thumbx, $thumby, $thumbWidth, $thumbHeight, $thumbWidth, $thumbHeight);

        $name = name_from_url($img);

        imagejpeg($thumb, $thumbPath.str_replace('_large.jpg', '_thumb.jpg', $name), $thumbQuality);
    }

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    if (!function_exists('get_hr_email')) {

        function get_hr_email() {
            $CI = &get_instance();

            $result = 'tania_mahbub@unitrendbd.com';
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

    }
    if (!function_exists('get_md_email')) {

        function get_md_email() {
            $CI = &get_instance();

            $result = 'muneer_ahmed@unitrendbd.com';
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

    }
    if (!function_exists('get_gm_email')) {

        function get_gm_email() {
            $CI = &get_instance();

            $result = 'ashraful_alam@unitrendbd.com';
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

    }
    if (!function_exists('get_leaveall_email')) {

        function get_leaveall_email() {
            $CI = &get_instance();

            $result = 'leaveall@unitrendbd.com';
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }

    }

}

?>