<?php
/**
 * @package     Frontend
 * @subpackage  Section Name
 * @category    Module Name
 * @author      PhuongTT
 * @link        http://domain.local/{name_method}
 * @create_at   9/11/18 3:51 PM
 */

class Service_model extends MY_Model {

    /*
    |--------------------------------------------------------------------------
    | Constructor default
    |--------------------------------------------------------------------------
    */
    function __construct() {
		parent::__construct();
    }
    
    /**
     * [get_languages]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_languages ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/language/getLang', $params);
    }
    
    /**
     * [get_currency]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_currency ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/currency/currency', $params);
    }
    /**
     * [create_list_currency]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_list_currency ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/createCurrency', $params);
    }
    /**
     * [update_currency]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function update_currency ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/updateCurrency', $params);
    }
    /**
     * [find_currency_by_code]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_currency_by_code ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/currency/findByCode', $params);
    }
    /**
     * [remove_currency]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_currency ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/remove', $params);
    }
    /**
     * [update_currency_by_date]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function update_currency_by_date ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/updateCurrencyByDate', $params);
    }
    /**
     * [get_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_timezone ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/currency/timezone', $params);
    }
    /**
     * [create_timezone_from_external]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function create_timezone_from_external ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/createTimezone', $params);
    }
    /**
     * [update_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function update_timezone ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/updateTimezone', $params);
    }
    /**
     * [remove_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_timezone ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/currency/removeTimeZone', $params);
    }
    ///////////////////countries/////////////////////////////////////
    /**
     * [find_country_by_code]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_country_by_code ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/country/findByCode', $params);
    }
    /**
     * [find_country_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_country_by_id ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/country/findById', $params);
    }
    /**
     * [find_country_by_name]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_country_by_name ($params) {  
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/country/findByName', $params);
    }
    /**
     * [find_country_by_continent]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_country_by_continent ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/country/findByCodeContinent', $params);
    }
    /**
     * [get_all_country]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_all_country ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/country/findAll', $params);
    }
    /**
     * [remove_country]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function remove_country ($params) {        
        return $this->post_api(API_PATH_SERVICE_SERVICE, '/country/removeCountry', $params);
    }
    ////////////////////CITY/////////////////////////////////
    /**
     * [find_city_by_code]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_city_by_code ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/city/findByCode', $params);
    }
    /**
     * [find_city_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_city_by_id ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/city/findById', $params);
    }
    /**
     * [find_city_by_name]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function find_city_by_name ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/city/findByName', $params);
    }
    /**
     * [get_all_city]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param object $params
     * @return $data
     */
    public function get_all_city ($params) {        
        return $this->get_api(API_PATH_SERVICE_SERVICE, '/city/getCities', $params);
    }

}
