<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Authenticated_Controller
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
      
        $this->add_script('js/modules/shop/categories/models/CategoriesModel.js');
        $this->add_script('js/modules/shop/categories/models/CategoriesDetailsModel.js');
        $this->add_script('js/modules/shop/categories/views/CategoriesView.js');
        $this->add_script('js/modules/shop/categories/views/CategoriesDetailsView.js');
        $this->add_script('js/modules/shop/categories/collections/CategoriesCollection.js');
        $this->add_script('js/modules/shop/categories/collections/CategoriesDetailsCollection.js');
        $this->add_script('js/modules/shop/categories/CategoriesController.js');
        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'Categories',
            'heading' => 'Categories',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('Categories');
        $this->render($data);
    }

    /**
     * [ajax_create_shop_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_create_shop_categories() {
        // Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Shop_model');

        // Update data
        $query = $this->Shop_model->create_shop_categories($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_get_shop_list_categories_default]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_shop_list_categories_default() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $param=[];
        $this->load->model('Shop_model');

        // Update data
        $query = $this->Shop_model->get_shop_list_categories_default($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_get_shop_list_categories_by_id]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_get_shop_list_categories_by_id() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Shop_model');

        // Update data
        $query = $this->Shop_model->get_shop_list_categories_by_id($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_remove_shop_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_shop_categories() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Shop_model');

        // Update data
        $query = $this->Shop_model->remove_shop_categories($param);
        
        // export data
        $this->render_json($query);
    }
    /**
     * [ajax_remove_shop_all_categories]
     *
     * @author PhuongTT
     * @date 10/08/2018
     */
    public function ajax_remove_shop_all_categories() {
        //Setting parametter call action update from model PHP
        $requestBody = $this->input->post('requestBody');
        $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $this->load->model('Shop_model');

        // Update data
        $query = $this->Shop_model->remove_shop_all_categories($param);
        
        // export data
        $this->render_json($query);
    }

}
