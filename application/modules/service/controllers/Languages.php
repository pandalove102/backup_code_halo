<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languages extends Authenticated_Controller
{

    public function __construct()
    {
        parent::__construct();
	}

	public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | SCRIPTS
        |--------------------------------------------------------------------------
        */
        $this->add_script('js/modules/service/languages/models/LanguagesModel.js');
        $this->add_script('js/modules/service/languages/views/LanguagesView.js');
        $this->add_script('js/modules/service/languages/collections/LanguagesCollection.js');
        $this->add_script('js/modules/service/languages/LanguagesController.js');
        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Service',
            'heading' => 'Languages',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Languages');
        $this->render($data);
    }
    
    /*
    |--------------------------------------------------------------------------
    | METHOD CALL API
    |--------------------------------------------------------------------------
    */

    /**
     * [ajax_get_languages]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_languages() {
        //Setting parametter call action update from model PHP
        $param = [];
        $this->load->model('Service_model');

        // Update data
        $query = $this->Service_model->get_languages($param);
        
        // export data
        $this->render_json($query);
    }
}
