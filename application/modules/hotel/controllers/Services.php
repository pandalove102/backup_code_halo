<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Authenticated_Controller
{

	protected $model_file = 'Hotel_model';

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
            'title' => 'Hotel',
            'heading' => 'Services',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('services');
        $this->render($data);
    }

    /**
     * [ajax_create_hotel_group_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_create_hotel_group_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->create_hotel_group_service($param);

        $this->render_json($query);
    }
    /**
     * [ajax_get_hotel_group_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_hotel_group_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->get_hotel_group_service($param);

        $this->render_json($query);
    }
    /**
     * [ajax_get_hotel_list_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_hotel_list_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->get_hotel_list_service($param);

        $this->render_json($query);
    }
    /**
     * [ajax_create_hotel_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_create_hotel_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->create_hotel_facilities($param);

        $this->render_json($query);
    }
    /**
     * [ajax_remove_hotel_facilities_or_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_hotel_facilities_or_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->remove_hotel_facilities_or_service($param);

        $this->render_json($query);
    }
    /**
     * [ajax_remove_hotel_group_facilities_or_service]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_hotel_group_facilities_or_service() {
        $param = getRequestBody();

        $query = $this->Hotel_model->remove_hotel_group_facilities_or_service($param);

        $this->render_json($query);
    }

}
