<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


class Website_Model extends CI_Model {


    public function __construct()
    {
        parent :: __construct();
       
    }    

    public function get_sub_toatl_price($user_id)
    {
        return $this->db->select("sum(total_price) as sub_total")->from("cart")->where("user_id",$user_id)->get()->row_array()['sub_total'];
    }   

    public function get_user_followings($user_id)
    {
        return $this->db->query("select * from users where user_id in (select follower_id from followers where user_id=$user_id) and status=1")->result_array();
    }     

    public function insert_order_items($data = array()) 
    {  
        $insert = $this->db->insert_batch("order_items",$data);
        return $insert?true:false;
    }

    public function get_order_items($order_id)
    {
        return $this->db->select('order_items.*,products.*,users.user_name')->from('order_items')->join('products','order_items.product_id=products.product_id')->join('users','products.user_id=users.user_id')->where("order_items.order_id",$order_id)->get()->result_array();
    }

    public function get_order_data($order_id="")
    {
        $order = $this->db->where("order_id",$order_id)->get("orders")->row_array();
        if($order)
        {
            $order["order_items"] =  $this->db->select('order_items.*,products.*')->from('order_items')->join('products','order_items.product_id=products.product_id')->where("order_items.order_id",$order_id)->get()->result_array();
        }
        return $order;
    }

    public function insert_order($data)
    {        
        $insert = $this->db->insert("orders",$data);
        return $insert?$this->db->insert_id():false;
    }

    public function get_products_by_category($category)
    {
        $this->db->select('products.*,brands.brand_name_en,brands.brand_name_ar,brands.image as brand_image,sub_categories.sub_cat_name_en,sub_categories.sub_cat_name_ar,sub_categories.image as subcat_image,categories.category_name_en,categories.category_name_ar,categories.image as cat_image,users.user_name');
        $this->db->from('products');
        $this->db->join('brands','products.brand = brands.brand_id');
        $this->db->join('categories','products.category = categories.cat_id');
        $this->db->join('sub_categories','products.sub_category = sub_categories.sub_cat_id');
        $this->db->join('users','products.user_id = users.user_id');
        $this->db->where('products.status',1);           
        $this->db->where('products.category',$category);
        return $this->db->get()->result_array();
    }

    public function get_products_by_brand($brand)
    {
        $this->db->select('products.*,brands.brand_name_en,brands.brand_name_ar,brands.image as brand_image,sub_categories.sub_cat_name_en,sub_categories.sub_cat_name_ar,sub_categories.image as subcat_image,categories.category_name_en,categories.category_name_ar,categories.image as cat_image,users.user_name');
        $this->db->from('products');
        $this->db->join('brands','products.brand = brands.brand_id');
        $this->db->join('categories','products.category = categories.cat_id');
        $this->db->join('sub_categories','products.sub_category = sub_categories.sub_cat_id');
        $this->db->join('users','products.user_id = users.user_id');
        $this->db->where('products.status',1);           
        $this->db->where('products.brand',$brand);
        return $this->db->get()->result_array();
    }

    public function get_address($user_id,$address_id="")
    {
        if($address_id != "")
        {
            return $this->db->where(array("address_id"=>$address_id,"user_id"=>$user_id))->get("shipping_adress")->row_array();
        }
        else
        {
            return $this->db->order_by("default_address",'desc')->where(array("user_id"=>$user_id))->get("shipping_adress")->result_array();
        }
    }

    public function set_default_address($user_id,$address_id)
    {
            $this->db->where(array("user_id"=>$user_id))->update("shipping_adress",array("default_address"=>0));
            $result = $this->db->where(array("address_id"=>$address_id,"user_id"=>$user_id))->update("shipping_adress",array("default_address"=>1));
            return ($result)?true:false;
    }

    public function filter_products($data)
    {
        $this->db->select('products.*,brands.brand_name_en,brands.brand_name_ar,brands.image as brand_image,sub_categories.sub_cat_name_en,sub_categories.sub_cat_name_ar,sub_categories.image as subcat_image,categories.category_name_en,categories.category_name_ar,categories.image as cat_image,users.user_name');
        $this->db->from('products');
        $this->db->join('brands','products.brand = brands.brand_id');
        $this->db->join('categories','products.category = categories.cat_id');
        $this->db->join('sub_categories','products.sub_category = sub_categories.sub_cat_id');
        $this->db->join('users','products.user_id = users.user_id');

        if(@$data['brand'] != "")
        {
            $this->db->where('products.brand',$data['brand']);
        }

        if(@$data['category'] != "")
        {
            $this->db->where('products.category',$data['category']);
        }

        if(@$data['subcategory'] != "")
        {
            $this->db->where('products.sub_category',$data['subcategory']);
        }

       if($data['disscount'] != "")
        {
            $this->db->where('products.disscount',$data['disscount']);
        }

        if($data['price'] != "")
        {
            $this->db->order_by('products.price',$data['price']);
        }

        if($data['products'] != "")
        {
            $this->db->order_by('products.product_id',$data['products']);
        }
        
        $this->db->where('products.status',1);           
        return $this->db->get()->result_array();
    }

    //Updated Methods Above
}

?>