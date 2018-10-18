<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends Authenticated_Controller
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
        
        $this->add_script('js/modules/service/countries/models/CountriesModel.js');
        $this->add_script('js/modules/service/countries/views/CountriesView.js');
        $this->add_script('js/modules/service/countries/collections/CountriesCollection.js');
        $this->add_script('js/modules/service/countries/CountriesController.js');


        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Service',
            'heading' => 'Countries',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Countries');
        $this->render($data);
    }
    
    /*
    |--------------------------------------------------------------------------
    | METHOD CALL API
    |--------------------------------------------------------------------------
    */
    /**
     * [ajax_find_country_by_code]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_country_by_code() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['code']);

        // Update param
        $query = $this->Service_model->find_country_by_code($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_find_country_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_country_by_id() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['_id']);
        
        // Update param
        $query = $this->Service_model->find_country_by_id($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_find_country_by_name]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_country_by_name() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['name']);
        
        // Update param
        $query = $this->Service_model->find_country_by_name($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_find_country_by_continent]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_find_country_by_continent() {
        //Setting parametter call action update from model PHP
        $param = $this->input->get(['code']);
        
        // Update param
        $query = $this->Service_model->find_country_by_continent($param);

        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_get_all_country]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_all_country() {
        //Setting parametter call action update from model PHP
        $param = null;
        
        // Update param
        $query = $this->Service_model->get_all_country($param);
        // Response data 
        $this->render_json($query);
    }
    /**
     * [ajax_get_all_country]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_country() {
        //Setting parametter call action update from model PHP
		$param = getRequestBody();
        // Update param
        $query = $this->Service_model->remove_country($param);
        // Response data 
        $this->render_json($query);
    }

}
