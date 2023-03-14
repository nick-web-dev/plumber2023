<?php

class Global_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * @param $table
     * @param $data
     *
     * @return mixed
     */
    public function get_product($table, $brand_id = false, $model = false, $keyword = false, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($brand_id)) {

            $this->db->where('brand_id', $brand_id);
        }
        if (!empty($model)) {

            $this->db->like('name', $model, 'both');
        }

        if (!empty($keyword)) {

            $this->db->like('title', $keyword, 'both');
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //$this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    /**
     * @param $table
     * @param $where
     *
     * @return bool
     */
    public function get_data($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->result()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    /**
     * @param $table
     * @param $data
     * @param $where
     *
     * @return mixed
     */
    public function update($table, $data, $where, $limit = false, $order_by = false) {
        $this->db->where($where);

        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        return $this->db->update($table, $data);
    }

    /**
     * @param $table
     * @param $where
     * @return mixed
     */
    public function delete($table, $where) {
        return $this->db->delete($table, $where);
    }

    /**
     * @param $table
     *
     * @return bool
     */
    public function get($table, $where = false, $limit = false, $order_by = false) {        
        $this->db->select('*')->from($table);

        if (!empty($where)) {
            $this->db->where($where);
        }

        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //$this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * @param      $table
     * @param      $like
     * @param bool $where
     *
     * @return bool
     */
    public function get_like($table, $like, $where = false) {

        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->like($like);
        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param      $table
     * @param      $join_table
     * @param      $jon_on
     * @param bool $where
     * @param bool $all
     *
     * @return bool
     */
    public function get_with_join($table, $join_table, $join_on, $where = false, $all = false) {
        $this->db->select('*')->from($table);

        $this->db->join($join_table, $join_table . '.' . $join_on . ' = ' . $table . '.' . $join_on);

        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            if ($all) {
                return $query->result();
            } else {
                return $query->row_array();
            }
        } else {
            return false;
        }
    }

    /**
     * @param $table
     * @param $where
     *
     * @return bool
     */
    public function get_row($table, $where) {
        $query = $this->db->get_where($table, $where);

        if ($result = $query->result()) {

            return true;
        } else {
            return false;
        }
    }


    ///// ONLY TOTAL ROW COUNT
    public function count_row($table) {
        $this->db->select('*');
        $query = $this->db->get($table);
        return $query->num_rows();
    }



    ///// WHERE WITH COUNT THE ROW---- >>>>
    public function count_row_where($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->result()) {
            return $query->num_rows();
        } else {
            return false;
        }
    }



    public function check_table_data($table, $where) {
        $all_datas = array();
        $this->db->select('*')->from($table);
        $this->db->where($where);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function  get_classified_data($user_id){
        $get_data=$this->db->select('classified.*,classified.id as classified_id,classified.phone as classified_phone,audio.*,files.*,photos.name as photo_name,video.*,users.*')
            ->from('classified')
            ->where('classified.user_id',$user_id)
            ->join('users','users.id =classified.user_id','left')
            ->join('classified_main_cat','classified_main_cat.id =classified.main_cat','left')
            ->join('audio','audio.ref_id=classified.id','left')
            ->join('video','video.ref_id=classified.id','left')
            ->join('files','files.ref_id=classified.id','left')
            ->join('photos','photos.ref_id=classified.id','left')
            ->group_by('classified.id')
            ->get();
       return $get_data;
    }
    public function  get_classified_data_edit($user_id){
        $get_data=$this->db->select('classified.*,classified.id as classified_id,classified.phone as classified_phone,audio.*,files.*,photos.name as photo_name,video.*,users.*')
            ->from('classified')
            ->where('classified.id ',$user_id)
            ->join('users','users.id =classified.user_id','left')
            ->join('classified_main_cat','classified_main_cat.id =classified.main_cat','left')
            ->join('audio','audio.ref_id=classified.id','left')
            ->join('video','video.ref_id=classified.id','left')
            ->join('files','files.ref_id=classified.id','left')
            ->join('photos','photos.ref_id=classified.id','left')
            ->group_by('classified.id')
            ->get();
        return $get_data;
    }

    public function get_personal_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['city'])) {

            $this->db->like('city', $data['city']);
        }
        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }

        if (!empty($data['iam'])) {

            $this->db->where('iam', $data['iam']);
        }

        if (!empty($data['interestedin'])) {

            $this->db->where('interestedin', $data['interestedin']);
        }



        if (!empty($data['maritalstatus'])) {

            $this->db->like('maritalstatus', $data['maritalstatus']);
        }
        if (!empty($data['lang'])) {

            $this->db->like('lang', $data['lang']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

       //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_ces_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['postcode'])) {

            $this->db->like('postcode', $data['postcode']);
        }
        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }
        if (!empty($data['business_name'])) {

            $this->db->like('business_name', $data['business_name']);
        }
        if (!empty($data['business_phone'])) {

            $this->db->like('business_phone', $data['business_phone']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }



    public function get_event_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        $value['title'] = (!empty($postData['title']))?$postData['title']:'';
        $value['summary'] = (!empty($postData['summary']))?$postData['summary']:'';
        $value['description'] = (!empty($postData['description']))?$postData['description']:'';
        $value['category'] = (!empty($postData['category']))?$postData['category']:'';
        $value['location'] = (!empty($postData['location']))?$postData['location']:'';


        if (!empty($data['category'])) {

            $this->db->where('category', $data['category']);
        }


        if (!empty($data['title'])) {

            $this->db->like('title', $data['title']);
        }
        if (!empty($data['summary'])) {

            $this->db->like('summary', $data['summary']);
        }
        if (!empty($data['description'])) {

            $this->db->like('description', $data['description']);
        }
        if (!empty($data['location'])) {

            $this->db->like('location', $data['location']);
        }




        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }



    public function get_group_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

//        $value['title'] = (!empty($postData['title']))?$postData['title']:'';
//        $value['summary'] = (!empty($postData['summary']))?$postData['summary']:'';
//        $value['description'] = (!empty($postData['description']))?$postData['description']:'';
//        $value['category'] = (!empty($postData['category']))?$postData['category']:'';
//        $value['location'] = (!empty($postData['location']))?$postData['location']:'';


        if (!empty($data['category'])) {

            $this->db->where('category', $data['category']);
        }


        if (!empty($data['group_name'])) {

            $this->db->like('group_name', $data['group_name']);
        }
        if (!empty($data['discussion'])) {

            $this->db->like('discussion', $data['discussion']);
        }
        if (!empty($data['description'])) {

            $this->db->like('description', $data['description']);
        }

        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }




    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function getPublicSearchData($data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('u.id, u.profession,u.first_name,u.last_name,u.user_name,u.email, u.profilepicture as photo,u.gender,u.phone,u.country,u.state,u.city,
                            public_website.business_name,public_website.appointment');
        $this->db->from('users as u');
        $this->db->join('public_website', 'u.id = public_website.user_id' );

        if (!empty($data['country'])) {

            $this->db->where('u.country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('u.state', $data['state']);
        }

        if (!empty($data['profession'])) {

            $this->db->where('u.profession', $data['profession']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }
        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }



    public function details_data($data) {
        $this->db->select('u.id, u.profession,u.first_name,u.last_name,u.user_name,u.email, u.profilepicture as photo,u.gender,u.phone,u.country,u.state,u.created,u.city,
                            public_website.business_name,public_website.business_website,public_website.business_email,public_website.business_telephone,public_website.business_fax,public_website.postal,
                            public_website.appointment,public_website.address_1,public_website.description,public_website.country,
                            public_website.state,public_website.city,public_website.specialty,public_website.special_interest,public_website.appointment_start_day,
                            public_website.appointment_end_day,public_website.start_time,public_website.end_time');
        $this->db->from('users as u');
        $this->db->join('public_website', 'u.id = public_website.user_id' );



        $this->db->where('u.id', $data['getid']);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    ///// GET DATA PRIVATE PROFILE
    public function get_private_website_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['postcode'])) {

            $this->db->like('postal', $data['postcode']);
        }
        if (!empty($data['profession'])) {

            $this->db->like('profession', $data['profession']);
        }
        if (!empty($data['business_name'])) {

            $this->db->like('business_name', $data['business_name']);
        }
        if (!empty($data['business_phone'])) {

            $this->db->like('business_phone', $data['business_phone']);
        }
        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_profile_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['country'])) {

            $this->db->where('country', $data['country']);
        }
        if (!empty($data['state'])) {

            $this->db->like('state', $data['state']);
        }

        if (!empty($data['city'])) {

            $this->db->like('city', $data['city']);
        }
        if (!empty($data['profession'])) {

            $this->db->where('profession', $data['profession']);
        }

        if (!empty($data['first_name'])) {

            $this->db->where('first_name', $data['first_name']);
        }

        if (!empty($data['last_name'])) {

            $this->db->where('last_name', $data['last_name']);
        }

        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_classified_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['main_cat'])) {

            $this->db->where('main_cat', $data['main_cat']);
        }
        if (!empty($data['title'])) {

            $this->db->like('title', $data['title']);
        }

        if (!empty($data['price'])) {

            $this->db->like('price', $data['price']);
        }
        if (!empty($data['description'])) {

            $this->db->like('description', $data['description']);
        }

        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function get_product_search_data($table, $data, $limit = FALSE, $order_by = FALSE) {
        $this->db->select('*')->from($table);

        if (!empty($data['type'])) {

            $this->db->where('type', $data['type']);
        }
        if (!empty($data['name'])) {

            $this->db->like('name', $data['name']);
        }

        if (!empty($data['price'])) {

            $this->db->like('price', $data['price']);
        }
        if (!empty($data['description'])) {

            $this->db->like('description', $data['description']);
        }

        if (!empty($limit)) {

            $this->db->limit($limit['limit'], $limit['start']);
        }

        if (!empty($order_by)) {
            $this->db->order_by($order_by['filed'], $order_by['order']);
        }

        $query = $this->db->get();

        //echo $this->db->last_query();exit();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        //return $query;
    }

    public function getProductByProfession($table,$profession){

        $productList = array();
        $sql = $this->db->select('*')
            ->from('product')
            ->get();

        $array=$sql->result_array();

        foreach ($array as $row){
            if($row['profession_view'] != null){
                $professions = $row['profession_view'];
                $testPro = explode(',',$professions);
                if (in_array($profession, $testPro)) {
                    $productList[] = $row;
                }
            }
        }
        return $productList;

    }

    public function getViewByProfession($table, $profession){
        $productList = array();
        $this->db->order_by("$table" ."."."id", "DESC");
        $sql = $this->db->select('*')
            ->from($table)
            ->get();
        $array=$sql->result_array();
        foreach ($array as $row){
            if($row['profession_view'] != null){
                $professions = $row['profession_view'];
                $testPro = explode(',',$professions);
                $pro = 0;
                if (in_array($profession, $testPro) || $row['profession_view'] == 0) {
                    $productList[] = $row;
                }
            }
        }

        ///echo $this->db->last_query();exit();


        return $productList;
    }

    public function getBlogByProfession($table, $profession){
        $productList = array();
        $this->db->order_by("$table" ."."."id", "DESC");
        $sql = $this->db->select('*')
            ->from($table)
            ->where('status=', 1)
            ->get();
        $array=$sql->result_array();
        foreach ($array as $row){
            if($row['profession_view'] != null){
                $professions = $row['profession_view'];
                $testPro = explode(',',$professions);
                $pro = 0;
                if (in_array($profession, $testPro) || $row['profession_view'] == 0) {
                    $productList[] = $row;
                }
            }
        }

        ///echo $this->db->last_query();exit();


        return $productList;
    }

    public function get_message($id){
        $this->db->select('u.profilepicture, m.id, m.subject, m.message, m.timestamp');
        $this->db->from('users as u');
        $this->db->join('messages as m', 'u.id = m.receiver_id');
        $this->db->where('u.id', $id);
        $this->db->where('m.status', '0');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function teamPlayer($mid='',$tid=''){
        $this->db->select('tp.team_id, tp.player_id, tp.is_captain, tp.is_wicketkeeper, tp.is_debut,tp.status, p.id, p.player_full_name,p.player_en_name,p.player_picture');
        $this->db->from('p1_crick_team_player as tp');
        $this->db->join('p1_crick_players as p', 'tp.player_id = p.id','left');
        $this->db->where('tp.team_id', $tid);
        $this->db->where('tp.status', 0);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getteamPlayer($tid=''){
        $this->db->select('tp.team_id, tp.player_id, tp.is_captain, tp.is_wicketkeeper, tp.is_debut,tp.status, p.id, p.player_full_name,p.player_en_name');
        $this->db->from('p1_crick_team_player as tp');
        $this->db->join('p1_crick_players as p', 'tp.player_id = p.id','left');
        $this->db->where('tp.team_id', $tid);
        $this->db->where('tp.status', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


    public function teamPlayer_11_id_ByMatch($mid='',$tid=''){
        $ids = array();
        $this->db->select('tp.team_id, tp.player_id, tp.is_captain, tp.is_wicketkeeper, tp.is_debut,tp.status, p.id, p.player_full_name');
        $this->db->from('p1_crick_team_player as tp');
        $this->db->join('p1_crick_playing_eleven as p11', 'tp.player_id = p11.player_id','left');
        $this->db->join('p1_crick_players as p', 'tp.player_id = p.id','left');
        $this->db->where('p11.match_id ', $mid);
        $this->db->where('tp.team_id', $tid);
        $this->db->where('tp.status', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result();
             foreach ($result as $val){
                 $ids[] = $val->player_id;
             }
             return $ids;
        } else {
            return false;
        }
    }

    public function get_join_data($table, $tableID){
        $this->db->select('t.*, c.name as country_name');
        $this->db->from($table." as t");
        $this->db->join("countries as c", "c.id = " . "t.".$tableID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_point(){
        $this->db->select('tp.*, s.series_id, s.series_name, t.team_id, t.team_name');
        $this->db->from('p1_tournament_point as tp');
        $this->db->join("p1_crick_series as s", "s.series_id = tp.series_id");
        $this->db->join("p1_crick_team as t", "t.team_id = tp.team_id");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_point_by_series($series_id){
        $this->db->select('tp.*, s.series_id, s.series_name, t.team_id, t.team_name,t.team_short_name,t.team_flag');
        $this->db->from('p1_tournament_point as tp');
        $this->db->join("p1_crick_series as s", "s.series_id = tp.series_id");
        $this->db->join("p1_crick_team as t", "t.team_id = tp.team_id");
        $this->db->where('s.series_id ', $series_id);
        $this->db->order_by('tp.standing_number', 'ASC');


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function get_player_rank($data=''){
        $this->db->select('rk.prg_id,rk.team_id,rk.player_id,rk.types_bat_ball_all,rk.rating_point,rk.types_crk_match,tm.team_name,tm.team_short_name,tm.team_flag,p.player_full_name,p.player_en_name,p.player_picture');
        $this->db->from('p2_ranking_players_global as rk');
        $this->db->join('p1_crick_team as tm', 'tm.team_id = rk.team_id');
        $this->db->join('p1_crick_players as p', 'p.id = rk.player_id');
        $this->db->order_by('rk.rating_point', 'DESC');

        if (!empty($data['types_bat_ball_all'])) {

            $this->db->where('rk.types_bat_ball_all', $data['types_bat_ball_all']);
        }

        if (!empty($data['types_crk_match'])) {

            $this->db->where('rk.types_crk_match', $data['types_crk_match']);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function getteamPlayer_rank($tid=''){
        $this->db->select('tp.team_id, tp.player_id, tp.is_captain, tp.is_wicketkeeper, tp.is_debut,tp.status, p.id, p.player_full_name,p.player_en_name');
        $this->db->from('p1_crick_team_player as tp');
        $this->db->join('p1_crick_players as p', 'tp.player_id = p.id','right');
        $this->db->where('tp.team_id', $tid);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function search_player_rank($data='', $getid){
        $this->db->select('rk.prg_id,rk.team_id,rk.player_id,rk.types_bat_ball_all,rk.rating_point,rk.types_crk_match,tm.team_name,tm.team_short_name,tm.team_flag,p.player_full_name,p.player_en_name,p.player_picture');
        $this->db->from('p2_ranking_players_global as rk');
        $this->db->join('p1_crick_team as tm', 'tm.team_id = rk.team_id');
        $this->db->join('p1_crick_players as p', 'p.id = rk.player_id');
        $this->db->order_by('rk.rating_point', 'DESC');

        if (!empty($data['types_bat_ball_all'])) {

            $this->db->where('rk.types_bat_ball_all', $data['types_bat_ball_all']);
        }

        if (!empty($getid['types_crk_match'])) {

            $this->db->where('rk.types_crk_match', $getid['types_crk_match']);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function get_statistic_detials($data=''){
        $this->db->select('sp.*,tm.team_short_name,tm.team_short_name,tm.team_flag,p.player_full_name,p.player_en_name,p.player_picture');
        $this->db->from('player_score_profile as sp');
        $this->db->join('p1_crick_team as tm', 'tm.team_id = sp.team_id');
        $this->db->join('p1_crick_players as p', 'p.id = sp.player_id');

        if (!empty($data['team_id'])) {

            $this->db->where('sp.team_id', $data['team_id']);
        }

        if (!empty($data['player_id'])) {

            $this->db->where('sp.player_id', $data['player_id']);
        }


        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }






    
    /// getting baller runs and name
    public function matchList($id = ''){
        $this->db->select('m.match_id, m.series_id, m.score_status, m.match_status, m.match_date, m.match_time, m.bat_first, m.ball_first, m.team_A, m.team_B,m.status, m.win_Toss, m.archive_match, t.team_id, t.team_name as team_a, t2.team_id, t2.team_name as team_b, s.series_id, s.series_name ');
        $this->db->from('p1_crick_match as m');
        $this->db->join('p1_crick_team as t', 't.team_id = m.team_A');
        $this->db->join('p1_crick_team as t2', 't2.team_id = m.team_B');
        $this->db->join('p1_crick_series as s', 's.series_id = m.series_id');
        if($id == ''){
            $this->db->where('m.status', 1);
        }else{
            $this->db->where('m.status', $id);
        }
        $this->db->order_by('m.match_date', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }


	public function get_leave_data($table, $data, $limit = FALSE, $order_by = FALSE) {
		$this->db->select('*')->from($table);

		if (!empty($data['leave_start_date'])) {

			$this->db->where('leave_start_date >=', $data['leave_start_date']);
		}

		if (!empty($data['leave_end_date'])) {

			$this->db->where('leave_end_date <=', $data['leave_end_date']);
		}


		if (!empty($data['steps'])) {
		    if($data['steps'] == 99){
                $this->db->where('steps', '0');
            }
		    else{
                $this->db->where('steps', $data['steps']);
            }




		}


		if (!empty($data['purpose_of_leave'])) {

			$this->db->where('purpose_of_leave', $data['purpose_of_leave']);
		}


		if (!empty($limit)) {

			$this->db->limit($limit['limit'], $limit['start']);
		}

		if (!empty($order_by)) {
			$this->db->order_by($order_by['filed'], $order_by['order']);
		}

		$query = $this->db->get();

		//echo $this->db->last_query();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
		//return $query;
	}





    public function all_emp($uid){
        $this->db->select('u.*,dp.dep_name');
        $this->db->from('users as u');
        $this->db->join('department as dp', 'dp.dep_id = u.dep_id');
        $this->db->where('u.id !=', $uid);
        $this->db->where('u.id !=', 1);
        $this->db->where('u.id !=', 48);
        $this->db->where('u.id !=', 20);
        $this->db->where('u.id !=', 11);
        $this->db->order_by('u.full_name', 'ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }




}

