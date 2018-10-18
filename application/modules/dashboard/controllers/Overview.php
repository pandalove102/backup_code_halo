<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends Authenticated_Controller
{

	protected $model_file = 'User_model';

    public function __construct()
    {
        parent::__construct();
	}

	public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | SCRIPS
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
            'title' => 'Overview',
            'heading' => 'Analytics',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('index');
        $this->render($data);
    }

    public function broadcast_notification(){
        /*
        |--------------------------------------------------------------------------
        | STYLESHEETS
        |--------------------------------------------------------------------------
        */
        $this->add_style('vendor/quill/dist/quill.snow.css', TRUE);

        /*
        |--------------------------------------------------------------------------
        | SCRIPTS
        |--------------------------------------------------------------------------
        */
        $this->add_script('vendor/quill/dist/quill.js');
        $this->add_script('js/modules/dashboard/custom-ui/page_broadcast_notification.js');

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Overview',
            'heading' => 'Analytics',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
		$this->view('broadcast_notification');
        $this->render($data);
    }

    public function components(){
        /*
        |--------------------------------------------------------------------------
        | STYLESHEETS
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | SCRIPTS
        |--------------------------------------------------------------------------
        */
        $this->add_script('js/modules/dashboard/custom-ui/page_components.js');

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Overview',
            'heading' => 'Component',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('components');
        $this->render($data);
    }

    public function ajaxGetTest()
    {
        $params = array();
        $response = $this->User_model->testGet($params);
        $this->render_json(array('ABC'=>111));
    }

}
