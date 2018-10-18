<?php
/**
 * @package     Frontend
 * @subpackage  Section Name
 * @category    Module Name
 * @author      PhuongTT
 * @link        http://domain.local/{name_method}
 * @create_at   9/11/18 3:51 PM
 */

class Hotel_model extends MY_Model {
    
    /*
    |--------------------------------------------------------------------------
    | Constructor default
    |--------------------------------------------------------------------------
    */
    function __construct() {
		  parent::__construct();
    }
    
    /**
     * [create_hotel_group_facilities]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_hotel_group_facilities ($params) {        
        return $this->post_api(API_PATH_HOTEL_SERVICE, '/hotelAdmin/createGroupFacilities', $params);
    }
    /**
     * [get_hotel_group_facilities]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_hotel_group_facilities ($params) {        
        return $this->get_api(API_PATH_HOTEL_SERVICE, '/hotelAdmin/groupFacilities', $params);
    }
    /**
     * [create_hotel_group_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_hotel_group_service ($params) {        
        return $this->post_api(API_PATH_HOTEL_SERVICE, '/hotelAdmin/createGroupService', $params);
    }
    /**
     * [get_hotel_group_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_hotel_group_service ($params) {        
        return $this->get_api(API_PATH_HOTEL_SERVICE, '/hotelAdmin/groupService', $params);
    }
    /**
     * [remove_hotel_group_facilities_or_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_hotel_group_facilities_or_service ($params) {        
        return $this->post_api(API_PATH_HOTEL_SERVICE, '/hotelAdmin/remove', $params);
    }
    /**
     * [create_hotel_facilities]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_hotel_facilities ($params) {        
        return $this->post_api(API_PATH_HOTEL_SERVICE, '/haloFacilities/create', $params);
    }
    /**
     * [get_hotel_facilities]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_hotel_facilities ($params) {        
        return $this->get_api(API_PATH_HOTEL_SERVICE, '/haloFacilities/facilities', $params);
    }
    /**
     * [get_hotel_list_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_hotel_list_service ($params) {        
        return $this->get_api(API_PATH_HOTEL_SERVICE, '/haloFacilities/services', $params);
    }
    /**
     * [remove_hotel_facilities_or_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_hotel_facilities_or_service ($params) {        
        return $this->post_api(API_PATH_HOTEL_SERVICE, '/haloFacilities/remove', $params);
    }

}
