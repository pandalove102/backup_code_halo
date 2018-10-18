<?php
/**
 * @package     Backend
 * @subpackage  User
 * @author      trihuynh
 * @link        http://domain.local/{name_method}
 * @create_at   9/11/18 3:51 PM
 */

class User_model extends MY_Model {

    /**
     * [search_user]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param $params
     * @return mixed|null $data
     */
    public function search_user($params){
        return $this->get_api(API_ES_URL,'/users/search', $params);
    }

    /**
     * [lock_or_unlock_user]
     *
     * @author PhuongTT
     * @date 10/08/2018
     * @param $params
     * @return mixed|null $data
     */
    public function lock_or_unlock_user($params){
        return $this->post_api(API_PATH_OAUTH_SERVICE,'/user/lock', $params);
    }
}
