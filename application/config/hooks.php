<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
|  HOOKS
| -------------------------------------------------------------------------
*/

if(ENVIRONMENT === ENV_PRODUCTION):
    $hook['post_controller_constructor'][] = array(
        'function' => 'force_ssl',
        'filename' => 'ssl.php',
        'filepath' => 'hooks'
    );
endif;

// Compress HTML
if(config_item('compress_output')){
    $hook['display_override'][] = array(
        'class' => '',
        'function' => 'compress',
        'filename' => 'compress.php',
        'filepath' => 'hooks'
    );
}
