<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends Authenticated_Controller
{

    protected $model_file = 'Service_model';

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
        
        $this->add_script('js/modules/service/cities/models/CitiesModel.js');
        $this->add_script('js/modules/service/cities/views/CitiesView.js');
        $this->add_script('js/modules/service/cities/collections/CitiesCollection.js');
        $this->add_script('js/modules/service/cities/CitiesController.js');


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Service',
            'heading' => 'Cities',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Cities');
        $this->render($data);
    }
    
    /*
    |--------------------------------------------------------------------------
    | METHOD CALL API
    |--------------------------------------------------------------------------
    */
    /**
     * [ajax_find_city_by_code]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_city_by_code() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['code']);
        // Update param
        $query = $this->Service_model->find_city_by_code($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_find_city_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_city_by_id() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['_id']);
        // Update param
        $query = $this->Service_model->find_city_by_id($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_find_city_by_name]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_city_by_name() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['name']);
        // Update param
        $query = $this->Service_model->find_city_by_name($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_get_all_city]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_all_city() {
        //Setting parametter call action update from model PHP
        $param = null;
        if ($this->input->get(['code'])) {
            $param = $this->input->get(['code']);
        }
        // Update param
        $query = $this->Service_model->get_all_city($param);

        // Response data 
        $this->render_json($query);
    }


}
