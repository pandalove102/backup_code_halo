<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Sidebar Menu
| -------------------------------------------------------------------------
| Icon cheatsheet: https://github.com/google/material-design-icons/blob/master/iconfont/codepoints
| https://material.io/tools/icons/?search=store&icon=store&style=baseline
*/
$config['sidebar_menu'] = array(
    array(
        'label' => 'Dashboard',
        'url' => 'dashboard',
        'children' => array(
            array(
                'label' => 'Analytics',
                'url' => 'dashboard/overview',
                'icon' => ''
            ),
            array(
                'label' => 'Broadcast Notification',
                'url' => 'dashboard/overview/broadcast_notification',
                'icon' => 'edit'
            ),
            array(
                'label' => 'Components',
                'url' => 'dashboard/overview/components',
                'icon' => 'edit'
            ),
        )
    ),
    array(
        'label' => 'Resources',
        'url' => 'resources',
        'children' => array(            
            array(
                'label' => 'User',
                'url' => 'user',
                'icon' => ''
			),
            array(
                'label' => 'Hotel',
                'url' => 'hotel',
                'icon' => '',
                'children' => array(
                    array('label' => 'Facilities', 'url' => 'hotel/facilities'),
                    array('label' => 'Services', 'url' => 'hotel/services'),
                )
            ),
            array(
                'label' => 'Tour',
                'url' => 'tour',
                'icon' => '',
                'children' => array(
                    array('label' => 'Topics', 'url' => 'tour/topics'),
                )
            ),
            array(
                'label' => 'Shop',
                'url' => 'shop',
                'icon' => '',
                'children' => array(
                    array('label' => 'Categories', 'url' => 'shop/categories'),
                    array('label' => 'CarrierPackage', 'url' => 'shop/carrierPackage'),
                    array('label' => 'demo', 'url' => 'shop/demo'),
                )
            ),
			array(
                'label' => 'Service',
                'url' => 'service',
                'icon' => '',
                'children' => array(
                    array('label' => 'Timezone', 'url' => 'service/timezone'),
                    array('label' => 'Currencies', 'url' => 'service/currencies'),
                    array('label' => 'Languages', 'url' => 'service/languages'),
                    array('label' => 'Countries', 'url' => 'service/countries'),
                    array('label' => 'Cities', 'url' => 'service/cities'),
                    array('label' => 'Regions', 'url' => 'service/regions'),
                )
            ),
            // array(
            //     'label' => 'Other',
            //     'url' => '#',
            //     'icon' => 'shopping_basket',
			// ),
			// array(
            //     'label' => 'User Account',
            //     'url' => 'resources',
            //     'icon' => '',
            //     'children' => array(
            //         array('label' => 'User Profile', 'url' => '#'),
            //         array('label' => 'User Profile Lite', 'url' => '#'),
            //         array('label' => 'Personal Blog', 'url' => '#'),
            //         array('label' => 'Edit User Profile', 'url' => '#'),
            //         array('label' => 'Login', 'url' => '#'),
            //         array('label' => 'Register', 'url' => '#'),
            //     )
            // ),
        )
    ),
);
