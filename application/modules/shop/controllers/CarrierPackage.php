<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarrierPackage extends Authenticated_Controller
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
      
        $this->add_script('js/modules/shop/carrierPackage/models/CarrierPackageModel.js');
        $this->add_script('js/modules/shop/carrierPackage/views/CarrierPackageView.js');
        $this->add_script('js/modules/shop/carrierPackage/collections/CarrierPackageCollection.js');
        $this->add_script('js/modules/shop/carrierPackage/models/CarrierPackageLangModel.js');
        $this->add_script('js/modules/shop/carrierPackage/views/CarrierPackageLangView.js');
        $this->add_script('js/modules/shop/carrierPackage/collections/CarrierPackageLangCollection.js');
        $this->add_script('js/modules/shop/carrierPackage/CarrierPackageController.js');
        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $data = array(
            'title' => 'CarrierPackage',
            'heading' => 'CarrierPackage',
            'message' => 'My Message'
        );

        /*
        |--------------------------------------------------------------------------
        | RENDER
        |--------------------------------------------------------------------------
        */
        $this->view('CarrierPackage');
        $this->render($data);
    }
    //  CarrierPackage 
    /**
     * [ajax_create_carrierpackage_language]
     * Panda
     */
        public function ajax_create_carrierpackage_language() {
            $requestBody = $this->input->post('requestBody');
            $param = json_encode($requestBody, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $this->load->model('Shop_model');

            // Update data
            $query = $this->Shop_model->ajax_create_carrierpackage_language($param);
            
            // export data
            $this->render_json($query);
        }
    /**
     * [ajax_list_carrierpackage_language]
     * Panda
     */
        public function ajax_list_carrierpackage_language() {
            $this->load->model('Shop_model');
            // Update data
            $query = $this->Shop_model->ajax_list_carrierpackage_language();
            // export data
            $this->render_json($query);
        }

   

}
