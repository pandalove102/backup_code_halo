<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Authenticated_Controller
{

    protected $model_file = 'User_model';

    public function __construct()
    {
        parent::__construct();
	}

    public function index()
    {
        $this->add_script('js/modules/user/models/UserModel.js');
        $this->add_script('js/modules/user/views/UserView.js');
        $this->add_script('js/modules/user/collections/UserCollection.js');
        $this->add_script('js/modules/user/UserController.js');

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Manage user',
            'heading' => 'Users',
            'message' => NULL
        );
        $this->view('User');
        $this->render($data);
    }
    /**
     * [ajax_search_user]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_search_user() {
        //Setting parametter call action update from model PHP
        $params = $this->input->get(['q','l','a']);

        // Update data
        $query = $this->User_model->search_user($params);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_search_user]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_lock_or_unlock_user() {
        //Setting parametter call action update from model PHP
        $params = $this->input->post(array('nv109', 'nn132', 'f_id'));
        $params['nv109'] = MD5($params['nv109']);

        // Update data
        $query = $this->User_model->lock_or_unlock_user($params);
        
        // export data
        $this->render_json($query);
    }
}
