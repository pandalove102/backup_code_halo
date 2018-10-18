<?php
/**
 * @package     Backend
 * @subpackage  Auth
 * @author      trihuynh
 * @link        http://domain.local/{name_method}
 * @create_at   9/11/18 3:51 PM
 */

class Auth_model extends MY_Model {
    public function check_user_credentials($params){
        return $this->authenticate(API_PATH_OAUTH, '/oauth/token?grant_type=client_credentials', $params);
    }
}
