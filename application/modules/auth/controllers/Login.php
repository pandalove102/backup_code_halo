<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
	}

    public function index()
    {
        if ($this->session->has_userdata(USER_INFO_SESSION_NAME)) {
            if($afterLoginURL = $this->session->userdata(REDIRECT_AFTER_AUTH_SESSION_NAME)){
                $this->session->unset_userdata(REDIRECT_AFTER_AUTH_SESSION_NAME);
                redirect($afterLoginURL);
            } else{
                redirect(HOME_URL);
            }
        }

        $this->add_script('js/modules/auth/models/CredentialsModel.js');
        $this->add_script('js/modules/auth/views/CredentialsView.js');
        $this->add_script('js/modules/auth/LoginController.js');

        /* Page login */
        $this->layout('blank')->view('auth/login')->render();
    }

    public function ajax_authorize()
    {
        if ($this->isRequestMethod(METHOD_POST)) {

            if ($userInfo = $this->session->userdata(USER_INFO_SESSION_NAME)) {
                $this->render_json($userInfo);
            } else {// Nếu đã đăng nhập
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');

                $params = $this->input->post(array('username', 'password'));

                if ($this->form_validation->set_data($params)->run()) {

                    $this->load->model('Auth_model');

                    $params['password'] = MD5($params['password']);

                    if ($query = $this->Auth_model->check_user_credentials($params)):
                        $this->session->sess_expiration = $query['expires_in'];
                        $this->session->set_userdata(USER_INFO_SESSION_NAME, $query);
                        $this->render_json($query);
                    else:
                        $this->render_json(NULL, FALSE, 'Invalid Credentials');
                    endif;

                } else {
                    $this->render_json(NULL, FALSE, $this->form_validation->error_array());
                }
            }
        }
    }
}
