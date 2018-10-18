<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * assets_css('example.css');
 * assets_css('example.css', array('media' => 'screen'));
 * assets_js('example.js');
 * assets_js('example.js', array('charset' => 'utf-8'));
 * assets_img('example.png');
 * assets_img('example.png', array('title' => 'Awesome Helper'));
 * ================================
 * MULTIPLE FILES
 * $multiple_css = array('example.css', 'style.css');
 * assets_css($multiple_css);
 * $multiple_js = array('example.js', array('style.js', array('charset' => 'utf-8')));
 * assets_js($multiple_js);
 * $multiple_img = array(array('example.png', array('alt' => 'ranisalt rules')), array('style.css', array('title' => 'Awesome Helper')));
 * assets_img($multiple_img);
 */

if (!function_exists('_getConfig')) {
    function _getConfig()
    {
        $CI =& get_instance();
        $CI->load->config('assets');
        $config = array();
        $config['path_base'] = $CI->config->item('path_base');
        $config['path_js'] = $CI->config->item('path_js');
        $config['path_css'] = $CI->config->item('path_css');
        $config['path_img'] = $CI->config->item('path_img');

        return $config;
    }
}
if (!function_exists('_process_array')) {
    function _process_array($data, $type)
    {
        if (is_array($data)) {
            $head = '';
            $attr = '';
            foreach ($data as $parent) {
                if (is_array($parent)) {
                    foreach ($parent as $child_1_key => $child_1_value) {
                        if (is_array($child_1_value)) {
                            $attr .= ' ';
                            foreach ($child_1_value as $child_2_key => $child_2_value) {
                                $attr .= $child_2_key . '="' . $child_2_value . '"';
                            }
                        } else {
                            $file = $child_1_value;
                        }
                    }
                } else {
                    $file = $parent;
                }

                $config = _getConfig();

                if (strpos($file, 'http') === FALSE) {
                    $path = base_url($config['path_base'] . DIRECTORY_SEPARATOR . $config['path_' . $type] . DIRECTORY_SEPARATOR . $file);
                } else{
                    $path = $file;
                }

                if ($type == 'js')
                    $head .= '<script type="text/javascript" src="' . $path . '"' . $attr . '></script>' . "\n";
                else if ($type == 'css')
                    $head .= '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attr . '>' . "\n";
                else if ($type == 'img')
                    $head .= '<img src="' . $path . '"' . $attr . '/>';
            }
            return $head;
        }
    }
}
if (!function_exists('_assets_base')) {
    function _assets_base($file, $attr, $type)
    {
        if (is_array($file)) {
            return _process_array($file, $type);
        } else {
            $attribute = ' ';
            if (!empty($attr) && is_array($attr)) {
                foreach ($attr as $key => $value) {
                    $attribute .= ' ' . $key . '="' . $value . '"';
                }
            }

            $config = _getConfig();
            if (strpos($file, 'http') === FALSE) {
                $path = base_url($config['path_base'] . DIRECTORY_SEPARATOR . $config['path_' . $type] . DIRECTORY_SEPARATOR . $file);
            } else{
                $path = $file;
            }

            if ($type == 'js')
                return '<script type="text/javascript" src="' . $path . '"' . $attribute . '></script>' . "\n";
            else if ($type == 'css')
                return '<link rel="stylesheet" type="text/css" href="' . $path . '"' . $attribute . '>' . "\n";
            else if ($type == 'img')
                return '<img src="' . $path . '"' . $attribute . '/>';
        }
    }
}
if (!function_exists('assets_css')) {
    function assets_css($file, $attr = array())
    {
        return _assets_base($file, $attr, 'css');
    }
}
if (!function_exists('assets_js')) {
    function assets_js($file, $attr = array())
    {
        return _assets_base($file, $attr, 'js');
    }
}
if (!function_exists('assets_img')) {
    function assets_img($file, $attr = array())
    {
        return _assets_base($file, $attr, 'img');
    }
}