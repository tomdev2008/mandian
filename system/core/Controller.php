<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Libraries
 * @author        ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller
{

    private static $instance;

    /**
     * Constructor
     */
    public function __construct()
    {
        self::$instance =& $this;

        // Assign all the class objects that were instantiated by the
        // bootstrap file (CodeIgniter.php) to local class variables
        // so that CI can run as one big super object.
        foreach (is_loaded() as $var => $class) {
            $this->$var =& load_class($class);
        }

        $this->load =& load_class('Loader', 'core');

        $this->load->initialize();

        log_message('debug', "Controller Class Initialized");
    }

    public static function &get_instance()
    {
        return self::$instance;
    }
}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */

/**
 * Class CRM_Controller 新的controller
 */
class CI_Action extends CI_Controller
{

    protected $_sys = null;

    protected $module = 'default';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 设置模型目录
     * @param null $val
     */
    protected function set_module($val = null){
        $this->module = empty($val) ? 'defalut' : $val ;
    }


    /**
     * 加载模板
     * @param string $act
     * @param array $data
     * @param bool $return
     */
    protected function view($act = null, $data = array(), $return = false)
    {
        if(empty($act)){
            $act = '/' . $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        }
        $this->load->view($this->module . $act, $data, $return);
    }

    /**
     * 加载 bll
     * @param null $bll
     */
    protected function BLL($bll = null)
    {
        $this->load->bll($bll);
    }

    /**
     * 加载类库
     * @param null $class_name
     * @param null $params
     */
    protected function lib($class_name = null, $params = null)
    {
        $this->load->library($class_name, $params);
    }
}

class CI_Admin extends CI_Action{

    protected $user_name = '';
    protected $user_id = '';

    /**
     * 不需要验证的位置
     * @var array
     */
    private $unpriv = array(
        'login',
        'login_act'
    );

    public function __construct()
    {
        parent::__construct();
        self::check_admin();
        self::check_priv();
        //self::check_hash();
        self::check_ip();
    }


    /**
     * 判断用户是否已经登陆
     */
    final public function check_admin() {
        $m = $this->router->fetch_module();
        $c = $this->router->fetch_class();
        $a = $this->router->fetch_method();

        if($m =='admin' && $c =='index' && in_array($a, $this->unpriv)) {
            return true;
        } else {
            $user_id = $this->session->userdata('user_id');
            if(!isset($_SESSION['user_id']) || !$_SESSION['user_id'] || $user_id != $_SESSION['user_id']){
                showmessage('校验失败,请重新登录', for_url('admin', 'index', 'login') );
            }
        }
    }

    /**
     * 按父ID查找菜单子项
     * @param integer $parentid   父菜单ID
     * @param integer $with_self  是否包括他自己
     */
    public function admin_menu() {
        $role_id = $this->session->userdata('role_id');
        $this->load->bll('user_bll');
        $array = $this->user_bll->get_user_role_access_header($role_id);
        return $array;
    }

    /**
     * 当前位置
     *
     * @param $id 菜单id
     */
    final public static function current_pos($id) {
        return '';
    }

    /**
     * 权限判断
     */
    final public function check_priv() {
        $m = $this->router->fetch_module();
        $c = $this->router->fetch_class();
        $a = $this->router->fetch_method();

        if($m =='admin' && $c =='index' && in_array($a, $this->unpriv)) {
            return true;
        }
        if($_SESSION['role_id'] == 1){
            return true;
        }
        $this->load->bll('system_bll');
        $act = $this->system_bll->get_sys_by_action( $this->router->module, $this->router->class, $this->router->method);

        if (empty($act) ) {
            showmessage('您没有权限操作该项','blank');
        }
    }

    /**
     *
     * 后台IP禁止判断 ...
     */
    final private function check_ip(){

    }

    /**
     * 检查hash值，验证用户数据安全性
     */
    final private function check_hash() {
        if(isset($_GET['pc_hash']) && $_SESSION['pc_hash'] != '' && ($_SESSION['pc_hash'] == $_GET['pc_hash'])) {
            return true;
        } elseif(isset($_POST['pc_hash']) && $_SESSION['pc_hash'] != '' && ($_SESSION['pc_hash'] == $_POST['pc_hash'])) {
            return true;
        } else {
            showmessage('哈希校验失败，请重新登录');
        }
    }



    function init_header()
    {
        $role_id= $this->session->userdata('role_id');
        if(empty($role_id)){
            show_message('请重新登录', '点击跳转', for_url('welcome', 'login') );
        }

        $this->_sys['user_name'] = $this->session->userdata('user_name');
        $this->_sys['role_name'] = $this->session->userdata('role_name');
        //导航
        $this->_sys['navgition'] = $this->user_bll->get_user_role_access_header($role_id);
    }

    /**
     * 判断是否已登录
     */
    protected function is_login()
    {
        $this->BLL('user_bll');
        //登录验证
        $r = $this->user_bll->is_login();
        if (!$r) {
            show_message('请重新登录', '点击跳转', for_url('system', 'user', 'user_list') );
        }
    }

    /**
     * 判断是否有权限
     */
    protected function is_valiate()
    {
        $user_name = $this->session->userdata('user_name');
        $action_list = unserialize($this->session->userdata('action_list'));

        if ($user_name == 'admin') {
            return;
        }

        $act = $this->system_bll->get_sys_by_action( $this->router->module, $this->router->class, $this->router->method);

        if (empty($act) || !in_array($act['sys_id'], $action_list)) {
            show_message('您没有权限操作，正在跳转……');
        }
    }
}