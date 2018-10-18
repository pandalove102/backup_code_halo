<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timezone extends Authenticated_Controller
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
        $this->add_script('vendor/chart.js/dist/Chart.min.js', TRUE);
        $this->add_script('https://www.gstatic.com/charts/loader.js', TRUE);
        $this->add_script('js/app/other/init_chart.js', TRUE);

        $this->add_script('js/modules/dashboard/custom-ui/page_index.js');
        $this->add_script('js/modules/dashboard/models/todoModel.js');
        $this->add_script('js/modules/dashboard/collections/todoCollection.js');
        $this->add_script('js/modules/dashboard/views/todoView.js');
        $this->add_script('js/modules/dashboard/dashboardApp.js');

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Service',
            'heading' => 'Timezone',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Timezone');
        $this->render($data);
    }
    
    /*
    |--------------------------------------------------------------------------
    | METHOD CALL API
    |--------------------------------------------------------------------------
    */

    /**
     * [ajax_get_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_timezone() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Service_model');

        // Update data
        $query = $this->Service_model->get_timezone($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_create_timezone_from_external]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_create_timezone_from_external() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Service_model');

        // Update data
        $query = $this->Service_model->create_timezone_from_external($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_update_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_update_timezone() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Service_model');

        // Update data
        $query = $this->Service_model->update_timezone($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_remove_timezone]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_timezone() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Service_model');

        // Update data
        $query = $this->Service_model->remove_timezone($param);
        
        // export data
        $this->render_json($query);
    }

}
