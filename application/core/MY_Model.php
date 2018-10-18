<?php

use GuzzleHttp\TransferStats;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_active_record $db              This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      //dead
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property CI_Driver_Library $driver            CodeIgniter Driver Library Class
 * @property CI_Cache $cache                      CodeIgniter Caching Class
 */
class MY_Model extends CI_Model
{

    protected $restClient;

    protected $access_token;

    /*
    |--------------------------------------------------------------------------
    | INIT
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        parent::__construct();

        $this->restClient = new \GuzzleHttp\Client(array(
            'base_uri' => API_REST_URL,
            'timeout' => API_MAX_TIMEOUT,
        ));

        $user_info = $this->session->userdata(USER_INFO_SESSION_NAME);
        $this->access_token = isset($user_info['access_token']) ? $user_info['access_token'] : NULL;
        // var_dump($user_info);
        // die;
    }


    private function debug($method, $url, $params, $result, $error)
    {
        $debug_output = "\n\n\n";
        $api_url = $method == METHOD_POST ? $url : $url . '?' . http_build_query($params);
        if (strpos($api_url, 'http') === FALSE) {
            $api_url = API_REST_URL . '/' . $api_url;
        }

        $debug_output .= "*===============================================*\n";
        $debug_output .= "REQUEST: \t" . current_url() . "\n";
        $debug_output .= $method . ": \t\t" . $api_url . "\n";
        if ($method == METHOD_POST):
            $debug_output .= "------------------- PARAMS ---------------------\n" .
                json_encode($params, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK) . "\n";
        endif;
        if ($error):
            $debug_output .= "------------------- ERRORS --------------------\n";
            $debug_output .= $error;
        else:
            $debug_output .= "------------------- RESULTS --------------------\n";
//            $debug_output .= trim(strip_slashes(json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK)), '"') . "\n";
            $debug_output .= json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK) . "\n";
        endif;
        $debug_output .= "*===============================================*\n\n";
        log_message('debug', $debug_output);
    }

    /*
    |--------------------------------------------------------------------------
    | METHOD
    |--------------------------------------------------------------------------
    | http://docs.guzzlephp.org/en/stable/quickstart.html
    */
    public function get_api($path, $route, $params)
    {
        $params = (array) $params;
		$params['access_token'] = $this->access_token;
        $url = $path . $route;
        $result = NULL;
        $error = NULL;

        if ($this->restClient) {
            try {
                $response = $this->restClient->request('GET', $url, array(
                    'query' => $params
                ));
                $result = json_decode($response->getBody()->getContents(), TRUE);
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                $error = $e->getMessage();
            } finally {
                $this->debug(METHOD_GET, $url, $params, $result, $error);

            }
        }
        return $result;
    }

    public function post_api($path, $route, $params)
    {
        $url = $path . $route;
        $result = NULL;
        $error = NULL;

        if ($this->restClient) {
            try {
                $response = $this->restClient->request('POST', $url, array(
					'json' => (array) $params,
					'query'=> array('access_token' => $this->access_token),
					'on_stats' => function (TransferStats $stats) use (&$url) {
						$url = $stats->getEffectiveUri();
					}
                ));
                $result = json_decode($response->getBody()->getContents(), TRUE);
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                $error = $e->getMessage();
            } finally {
                $this->debug(METHOD_POST, $url, $params, $result, $error);
            }
        }
        return $result;
    }

    public function authenticate($path, $route, array $params)
    {
        $url = $path . $route;
        $result = NULL;
        $error = NULL;

        if ($this->restClient) {
            try {
                $response = $this->restClient->request('POST', $url, array(
                    'auth' => array($params['username'], $params['password']),
                    'headers' => [
                        'Cache-Control' => 'no-cache'
                    ]
                ));
                $result = json_decode($response->getBody()->getContents(), TRUE);
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                $error = $e->getMessage();
            } finally {
                $this->debug(METHOD_POST, $url, $params, $result, $error);
            }
        }

        return $result;
    }
}
