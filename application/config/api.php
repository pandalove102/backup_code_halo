<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| CORE CONSTANTS
|--------------------------------------------------------------------------
*/

define('API_REST_URL', 'http://alp-api.hahalolo.com:8080');
define('API_ES_URL', 'http://esapi.hahalolo.com:3000');
define('API_MAX_TIMEOUT', 3.0); // 3s

/*
|--------------------------------------------------------------------------
| API PATH
|--------------------------------------------------------------------------
*/

define('API_PATH_PAYMENT_SERVICE', 'api-rest-payment/service');
define('API_PATH_OAUTH', 'api-rest-oauth');
define('API_PATH_USER_SERVICE', 'api-rest-user/service');
define('API_PATH_OAUTH_SERVICE', 'api-rest-oauth/service');
define('API_PATH_BUSINESS_SERVICE', 'api-rest-business/service');
define('API_PATH_PAGE_SERVICE', 'api-rest-pages/service');
define('API_PATH_SERVICE_SERVICE', 'api-rest-service/service');
define('API_PATH_ORDER_SERVICE', 'api-rest-order/service');
define('API_PATH_HOTEL_SERVICE', 'api-rest-hotel/service');
define('API_PATH_ORDER_HOTEL_SERVICE', 'api-rest-order-hotel/service');
define('API_PATH_EXPERIENCE_SERVICE', 'api-rest-experience/service');
define('API_PATH_SETTING_SERVICE', 'api-rest-setting/service');
define('API_PATH_TOUR_SERVICE', 'api-rest-tour/service');
define('API_PATH_SHOP_SERVICE', 'api-rest-shop/service');