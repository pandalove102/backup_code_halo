<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class topics extends Authenticated_Controller
{

	protected $model_file = 'Tour_model';

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
        // Example $this->add_script('vendor/chart.js/dist/Chart.min.js', TRUE);
        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Tour',
            'heading' => 'Topics',
            'message' => NULL
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Topics');
        $this->render($data);
    }
    /**
     * [ajax_create_tour_topic]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_create_tour_topic() {
		$param = getRequestBody();

        $query = $this->Tour_model->create_tour_topic($param);

        $this->render_json($query);
    }
    /**
     * [ajax_get_tour_list_topic]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_tour_list_topic() {
        $param = getRequestBody();

        $query = $this->Tour_model->get_tour_list_topic($param);

        $this->render_json($query);
    }
    /**
     * [ajax_remove_tour_topic]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_tour_topic() {
		$param = getRequestBody();

        $query = $this->Tour_model->remove_tour_topic($param);

        $this->render_json($query);
    }


}
