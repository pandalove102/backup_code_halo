<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * A Controller base that provides lots of flexible basics for CodeIgniter applications,
 * including:
 *     - A basic template engine
 *     - More readily available 'flash messages'
 *     - autoloading of language and model files
 *     - flexible rendering methods making JSON simple.
 *     - Automatcially migrating.
 *
 * NOTE: This class assumes that a couple of other libraries are in use in your
 * application:
 *     - eldarion-ajax (https://github.com/eldarion/eldarion-ajax) for simple AJAX.
 *         Only used by the render_json method to return profiler info and
 *
 */

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
class MY_Controller extends CI_Controller
{
    protected $acceptMethod = METHOD_GET;

    /**
     * The type of caching to use. The default values are
     * set here so they can be used everywhere, but
     */
    protected $cache_type = 'apc';
    protected $backup_cache = 'file';

    // If TRUE, will send back the notices view
    // through the 'render_json' method in the
    // 'fragments' array.
    protected $ajax_notices = TRUE;

    // If set, this language file will automatically be loaded.
    protected $language_file = NULL;

    // If set, this model file will automatically be loaded.
    protected $model_file = NULL;

    private $use_view = '';
    private $use_layout = '';

    protected $core_scripts = array();
    protected $external_scripts = array();
    protected $core_stylesheets = array();
    protected $external_stylesheets = array();

    // Stores data variables to be sent to the view.
    protected $vars = array();
    protected $user_info = array();

    // For status messages
    protected $message;

    //--------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();

        //--------------------------------------------------------------------
        // Cache Setup
        //--------------------------------------------------------------------

        // Make sure that caching is ALWAYS available throughout the app
        // though it defaults to 'dummy' which won't actually cache.
        // $this->load->driver('cache', array('adapter' => $this->cache_type, 'backup' => $this->backup_cache));

        //--------------------------------------------------------------------
        // Language & Model Files
        //--------------------------------------------------------------------

        if (!is_null($this->language_file)) $this->lang->load($this->language_file);

        if (!is_null($this->model_file)) {
            /*
                This does not automatically load the database.
                If you're using my MY_Model, it will load it for you.
                otherwise, you should load it in your autoload config
                or within your model itself.
             */
            $this->load->model($this->model_file);
        }

        //--------------------------------------------------------------------
        // Profiler
        //--------------------------------------------------------------------

        // The profiler is dealt with twice so that we can set
        // things up to work correctly in AJAX methods using $this->render_json
        // and it's cousins.
        if ($this->config->item('enable_profiler') == TRUE) {
            $this->output->enable_profiler(TRUE);
        }

        //--------------------------------------------------------------------
        // Add Global Assets
        //--------------------------------------------------------------------
        if ($global_stylesheets = $this->config->item('global_stylesheets')) {
            foreach ($global_stylesheets as $stylesheet) {
                $this->add_style($stylesheet, TRUE);
            }
        }

        if ($global_scripts = $this->config->item('global_scripts')) {
            foreach ($global_scripts as $script) {
                $this->add_script($script, TRUE);
            }
        }

        //--------------------------------------------------------------------
        // User Info
        //--------------------------------------------------------------------
        $this->user_info = $this->session->userdata(USER_INFO_SESSION_NAME);

    }

    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
    // "Template" Functions
    //--------------------------------------------------------------------

    /**
     * A Very simple templating system designed not for power or flexibility
     * but to use the built in features of CodeIgniter's view system to easily
     * create fast templating capabilities.
     *
     * The view is assumed to be under the views folder, under a folder with the
     * name of the controller and a view matching the name of the method.
     *
     * The theme is simply a set of files located under the views/ui folder. By default
     * a view named index.php will be used. You can specify different layouts
     * with the scope method, 'layout()'.
     *
     *      $this->layout('two_left')->render();
     *
     * You can specify a non-default view name with the scope method 'view'.
     *
     *      $this->view('another_view')->render();
     *
     * Within the template the string '{view_content}' will be replaced with the
     * contents of the view file that we're rendering.
     *
     * @param  [type]  $layout      [description]
     * @param  boolean $return_data [description]
     * @return [type]               [description]
     */
    protected function render($data = array())
    {

        // Calc our view name based on current method/controller
        $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class() . '/' . $this->router->fetch_method();

        // Merge any saved vars into the data
        $data = array_merge($data, $this->vars);

        // Make sure any scripts/stylesheets are available to the view
        $data['core_scripts'] = $this->core_scripts;
        $data['external_scripts'] = $this->external_scripts;
        $data['core_stylesheets'] = $this->core_stylesheets;
        $data['external_stylesheets'] = $this->external_stylesheets;
        $data['user_info'] = $this->user_info;

        // We'll make the view content available to the template.
        $data['view_content'] = $this->load->view($view, $data, TRUE);

        // Build our notices from the theme's view file.
        $data['notice'] = $this->load->view('theme/notice', array('notice' => $this->message()), TRUE);


        // Render our layout and we're done!
        $layout = !empty($this->use_layout) ? $this->use_layout : 'index';

        $this->load->view('theme/' . $layout, $data, FALSE, TRUE);

        // Reset our custom view attributes.
        $this->use_view = $this->use_layout = '';
    }

    //--------------------------------------------------------------------

    /**
     * Sets a data variable to be sent to the view during the render() method.
     *
     * @param string $name
     * @param mixed $value
     */
    public function set_var($name, $value = NULL)
    {
        if (is_array($name)) {
            foreach ($name as $k => $v) {
                $this->vars[$k] = $v;
            }
        } else {
            $this->vars[$name] = $value;
        }
    }

    //--------------------------------------------------------------------


    /**
     * Specifies a custom view file to be used during the render() method.
     * Intended to be used as a chainable 'scope' method prioer to calling
     * the render method.
     *
     * Examples:
     *      $this->view('my_view')->render();
     *      $this->view('users/login')->render();
     *
     * @param  string $view The relative path/name of the view file to use.
     * @return MY_Controller instance
     */
    public function view($view)
    {
        $this->use_view = $view;

        return $this;
    }

    //--------------------------------------------------------------------

    /**
     * Specifies a custom layout file to be used during the render() method.
     * Intended to be used as a chainable 'scope' method prioer to calling
     * the render method.
     *
     * Examples:
     *      $this->layout('two_left')->render();
     *
     * @param  string $view The relative path/name of the view file to use.
     * @return MY_Controller instance
     */
    public function layout($view)
    {
        $this->use_layout = $view;

        return $this;
    }

    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
    // Status Messages
    //--------------------------------------------------------------------

    /**
     * Sets a status message (for displaying small success/error messages).
     * This is used in place of the session->flashdata functions since you
     * don't always want to have to refresh the page to show the message.
     *
     * @param string $message The message to save.
     * @param string $type The string to be included as the CSS class of the containing div.
     */
    public function set_message($message = '', $type = 'info')
    {
        if (!empty($message)) {
            if (isset($this->session)) {
                $this->session->set_flashdata('message', $type . '::' . $message);
            }

            $this->message = array(
                'type' => $type,
                'message' => $message
            );
        }
    }

    //--------------------------------------------------------------------

    /**
     * Retrieves the status message to display (if any).
     *
     * @param  string $message [description]
     * @param  string $type [description]
     * @return array
     */
    public function message($message = '', $type = 'info')
    {
        $return = array(
            'message' => $message,
            'type' => $type
        );

        // Does session data exist?
        if (empty($message) && class_exists('CI_Session')) {
            $message = $this->session->flashdata('message');

            if (!empty($message)) {
                // Split out our message parts
                $temp_message = explode('::', $message);
                $return['type'] = $temp_message[0];
                $return['message'] = $temp_message[1];

                unset($temp_message);
            }
        }

        // If message is empty, we need to check our own storage.
        if (empty($message)) {
            if (empty($this->message['message'])) {
                return '';
            }

            $return = $this->message;
        }

        // Clear our session data so we don't get extra messages on rare occassions.
        if (class_exists('CI_Session')) {
            $this->session->set_flashdata('message', '');
        }

        return $return;
    }

    //--------------------------------------------------------------------


    //--------------------------------------------------------------------
    // Other Rendering Methods
    //--------------------------------------------------------------------

    /**
     * Renders a string of aribritrary text. This is best used during an AJAX
     * call or web service request that are expecting something other then
     * proper HTML.
     *
     * @param  string $text The text to render.
     * @param  bool $typography If TRUE, will run the text through 'Auto_typography'
     *                          before outputting to the browser.
     *
     * @return [type]       [description]
     */
    public function render_text($text, $typography = FALSE)
    {
        // Note that, for now anyway, we don't do any cleaning of the text
        // and leave that up to the client to take care of.

        // However, we can auto_typogrify the text if we're asked nicely.
        if ($typography === TRUE) {
            $this->load->helper('typography');
            $text = auto_typography($text);
        }

        $this->output->enable_profiler(FALSE)
            ->set_content_type('text/plain')
            ->set_output($text);
    }

    //--------------------------------------------------------------------

    private function wrapData($data = NULL, $isSuccess = TRUE, $error = NULL, $message = NULL, $messageType = 'info')
    {
        if($messageType == 'error') $messageType = 'danger';

        $output = array(
            'success' => !!$isSuccess,
            'data' => $data,
            'errors' => array(),
        );
        if (!empty($error)) {
            if (is_string($error)) {
                $this->set_message($error, 'danger');
            } else {
                $output['errors'] = $error;
            }
        }
        if(!empty($message)){
            $this->set_message($message, $messageType);
        }
        return $output;
    }

    /**
     * Converts the provided array or object to JSON, sets the proper MIME type,
     * and outputs the data.
     *
     * Do NOT do any further actions after calling this action.
     *
     * @param  mixed $json The data to be converted to JSON.
     * @return [type]       [description]
     */
    public function render_json($data, $isSuccess = TRUE, $error = NULL, $message = NULL, $messageType = NULL)
    {
        $json = $this->wrapData($data, $isSuccess, $error, $message, $messageType);

//        if (is_resource($json)) {
//            throw new RenderException('Resources can not be converted to JSON data.');
//        }

        // If there is a fragments array and we've enabled profiling,
        // then we need to add the profile results to the fragments
        // array so it will be updated on the site, since we disable
        // all profiling below to keep the results clean.
//        if (is_array($json)) {
        if (!isset($json['fragments'])) {
            $json['fragments'] = array();
        }

        if ($this->config->item('show_profile')) {
            $this->load->library('profiler');
            $json['fragments']['#profiler'] = $this->profiler->run();
        }

        // Also, include our notices in the fragments array.
        if ($this->ajax_notices === TRUE) {
            $json['fragments']['#notices'] = $this->load->view('theme/notice', array('notice' => $this->message()), TRUE);
        }
//        }

        $this->output->enable_profiler(FALSE)
            ->set_content_type('application/json')
            ->set_output(json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    //--------------------------------------------------------------------

    /**
     * Sends the supplied string to the browser with a MIME type of text/javascript.
     *
     * Do NOT do any further processing after this command or you may receive a
     * Headers already sent error.
     *
     * @param  mixed $js The javascript to output.
     * @return [type]       [description]
     */
    public function render_js($js = NULL)
    {
        if (!is_string($js)) {
            throw new RenderException('No javascript passed to the render_js() method.');
        }

        $this->output->enable_profiler(FALSE)
            ->set_content_type('application/x-javascript')
            ->set_output($js);
    }

    //--------------------------------------------------------------------

    /**
     * Breaks us out of any output buffering so that any content echo'd out
     * will echo out as it happens, instead of waiting for the end of all
     * content to echo out. This is especially handy for long running
     * scripts like might be involved in cron scripts.
     *
     * @return void
     */
    public function render_realtime()
    {
        if (ob_get_level() > 0) {
            end_end_flush();
        }
        ob_implicit_flush(TRUE);
    }

    //--------------------------------------------------------------------

    /**
     * Integrates with the bootstrap-ajax javascript file to
     * redirect the user to a new url.
     *
     * If the URL is a relative URL, it will be converted to a full URL for this site
     * using site_url().
     *
     * @param  string $location [description]
     */
    public function ajax_redirect($location = '')
    {
        $location = empty($location) ? '/' : $location;

        if (strpos($location, '/') !== 0 || strpos($location, '://') !== FALSE) {
            if (!function_exists('site_url')) {
                $this->load->helper('url');
            }

            $location = site_url($location);
        }

        $this->render_json(array('location' => $location));
    }

    //--------------------------------------------------------------------

    /**
     * Attempts to get any information from php://input and return it
     * as JSON data. This is useful when your javascript is sending JSON data
     * to the application.
     *
     * @param  strign $format The type of element to return, either 'object' or 'array'
     * @param  int $depth The number of levels deep to decode
     *
     * @return mixed    The formatted JSON data, or NULL.
     */
    public function get_json($format = 'object', $depth = 512)
    {
        $as_array = $format == 'array' ? TRUE : FALSE;

        return json_decode(file_get_contents('php://input'), $as_array, $depth);
    }

    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
    // 'Asset' functions
    //--------------------------------------------------------------------

    /**
     * Adds an external javascript file to the 'external_scripts' array.
     *
     * @param [type] $filename [description]
     */
    public function add_script($filename, $isCore = FALSE)
    {
        if (strpos($filename, 'http') === FALSE) {
            $filename = base_url() . 'assets/' . $filename;
        }

        if ($isCore) {
            $this->core_scripts[] = $filename;
        } else {
            $this->external_scripts[] = $filename;
        }

    }

    //--------------------------------------------------------------------

    /**
     * Adds an external stylesheet file to the 'stylesheets' array.
     */
    public function add_style($filename, $isCore = FALSE)
    {
        if (strpos($filename, 'http') === FALSE) {
            $filename = base_url() . 'assets/' . $filename;
        }

        if ($isCore) {
            $this->core_stylesheets[] = $filename;
        } else {
            $this->external_stylesheets[] = $filename;
        }

    }

    //--------------------------------------------------------------------

    protected function isRequestMethod($requestMethod = METHOD_ANY)
    {
        if ($requestMethod !== METHOD_ANY && $requestMethod !== $this->input->method(TRUE)) {
            $this->render_json(NULL, 'Method Not Allowed', FALSE);
            return FALSE;
        }
        return TRUE;
    }

    //--------------------------------------------------------------------


}


/*
|--------------------------------------------------------------------------
| AUTHENTICATED CONTROLLER
|--------------------------------------------------------------------------
| Simply makes sure that someone is logged in and ready to roll.
*/

class Authenticated_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata(USER_INFO_SESSION_NAME)) {
            $this->session->sess_expiration = '300'; // 5 min
            $this->session->set_userdata(REDIRECT_AFTER_AUTH_SESSION_NAME, current_url());
            redirect(LOGIN_URL);
        }
    }
}
