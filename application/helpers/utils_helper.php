<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getRequestBody')) {
    function getRequestBody()
    {
		$CI =& get_instance();
		$requestBody = $this->input->post('requestBody');

        return $requestBody ? json_encode($requestBody, TRUE, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : NULL;
    }
}

if (!function_exists('dump')) {
    function dump($var, $exit = FALSE)
    {
        if (ENVIRONMENT !== ENV_PRODUCTION) {
            // Add formatting
            echo '<pre><code>';
            print_r($var);
            echo '</code></pre>';

            // Exit ?
            if ($exit == TRUE) {
                exit;
            }
        }
    }
}

if (!function_exists('menu_is_active')) {
    function menu_is_active($menu_url)
    {
        $CI =& get_instance();
        $menu_url = trim($menu_url);
        $route_class = $CI->router->fetch_class();
        $route_class_method = implode('/', $CI->router->uri->rsegments);
        return $menu_url == $route_class || $menu_url == $route_class_method;
    }
}
