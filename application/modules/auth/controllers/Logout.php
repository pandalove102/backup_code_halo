<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        // Clear all session
        $this->session->sess_destroy();

        redirect(LOGIN_URL);
    }
}
