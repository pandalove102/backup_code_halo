<?php
/**
 * @package     Frontend
 * @subpackage  Section Name
 * @category    Module Name
 * @author      PhuongTT
 * @link        http://domain.local/{name_method}
 * @create_at   9/11/18 3:51 PM
 */

class Shop_model extends MY_Model {
    
    /*
    |--------------------------------------------------------------------------
    | Constructor default
    |--------------------------------------------------------------------------
    */
    function __construct() {
		parent::__construct();
    }
    
    //  CarrierPackage 
    /**
     * [ajax_create_carrierpackage_language]
     * Panda
     */
    public function ajax_create_carrierpackage_language($params){
        return $this->post_api(API_PATH_SHOP_SERVICE,'/carrierPackage/create',$params);
    }
     /**
     * [ajax_list_carrierpackage_language]
     * Panda
     */
    public function ajax_list_carrierpackage_language(){
        return $this->get_api(API_PATH_SHOP_SERVICE,'/carrierPackage/carrierPackages',[]);
    }
   








    //  end CarrierPackage

    /**
     * [create_shop_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_shop_categories ($params) {        
        return $this->post_api(API_PATH_SHOP_SERVICE, '/categories/create', $params);
    }
    /**
     * [get_shop_list_categories_default]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_shop_list_categories_default ($params) {      
        return $this->get_api(API_PATH_SHOP_SERVICE, '/carrierPackage/carrierPackages', $params);
    }
    /**
     * [get_shop_list_categories_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_shop_list_categories_by_id ($params) {        
        return $this->get_api(API_PATH_SHOP_SERVICE, '/categories/findById', $params);
    }
    /**
     * [remove_shop_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_shop_categories ($params) {        
        return $this->post_api(API_PATH_SHOP_SERVICE, '/categories/remove', $params);
    }
    /**
     * [remove_shop_all_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_shop_all_categories ($params) {        
        return $this->post_api(API_PATH_SHOP_SERVICE, '/categories/removeAll', $params);
    }
}
