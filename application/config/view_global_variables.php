<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| VIEW GLOBAL VARIABLE
|--------------------------------------------------------------------------
| Render ra global variable để phía js dùng
*/

$config['view_global_variables'] = array(
    'BASE_URL' => config_item('base_url'),
    'NO_AVATAR' => config_item('base_url') . 'assets/img/no-avatar.jpg',
);