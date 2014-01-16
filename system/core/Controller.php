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
    protected function set_module($val = null)
    {
        $this->module = empty($val) ? 'defalut' : $val;
    }


    /**
     * 加载模板
     * @param string $act
     * @param array $data
     * @param bool $return
     */
    protected function view($act = null, $data = array(), $return = false)
    {
        if (empty($act)) {
            $act = '/' . $this->router->fetch_module() . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
        }
        return $this->load->view($this->module . $act, $data, $return);
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

class CI_Admin extends CI_Action
{

    protected $user_name = '';
    protected $user_id = '';

    protected $pc_hash = '';

    /**
     * -------------------------
     * 是否需要登陆
     * @var bool
     * -------------------------
     */
    protected $is_login = true;

    public function __construct()
    {
        parent::__construct();
        $this->lib('Log');
        if (!$this->is_login) {
            return true;
        }
        self::check_admin();
        self::check_priv();
        self::check_hash();
        self::check_ip();
    }


    /**
     * -------------------------
     * 判断用户是否已经登陆
     * -------------------------
     */
    final public function check_admin()
    {
        if ($this->session->userdata('user_name') === 'admin') {
            return true;
        }

        $user_id = $this->session->userdata('user_id');
        if (!isset($_SESSION['user_id']) || !$_SESSION['user_id'] || $user_id != $_SESSION['user_id']) {
            showmessage('校验失败,请重新登录', for_url('admin', 'index', 'login'));
        }
    }

    /**
     * -------------------------
     * 按父ID查找菜单子项
     * @param integer $parentid 父菜单ID
     * @param integer $with_self 是否包括他自己
     * -------------------------
     */
    public function admin_menu()
    {
        $role_id = $this->session->userdata('role_id');
        $this->load->bll('user_bll');
        $array = $this->user_bll->get_user_role_access_header($role_id);
        return $array;
    }

    /**
     * -------------------------
     * 当前位置
     * @param $id 菜单id
     * -------------------------
     */
    function current_pos()
    {
        $this->load->bll('system_bll');
        $act = $this->system_bll->get_sys_by_action($this->router->module, $this->router->class, $this->router->method);
        if ($act) {
            return $act['sys_name'] . '>' . $act['p_name'];
        }
        return '';
    }

    /**
     * -------------------------
     * 权限判断
     * -------------------------
     */
    final public function check_priv()
    {
        if ($this->session->userdata('user_name') === 'admin') {
            return true;
        }
        $m = $this->router->fetch_module();
        $c = $this->router->fetch_class();

        $this->load->bll('system_bll');
        $act = $this->system_bll->get_sys_by_action($m, $c);
        $current_act = unserialize($this->session->userdata('action_list'));
        $inter = array_intersect($act, $current_act);

        if (empty($inter)) {
            showmessage('您没有权限操作该项');
        }
    }

    /**
     * -------------------------
     * 后台IP禁止判断 ...
     * -------------------------
     */
    final private function check_ip()
    {

    }

    /**
     * -------------------------
     * 检查hash值，验证用户数据安全性
     * -------------------------
     */
    final private function check_hash()
    {
        if ($this->session->userdata('user_name') === 'admin') {
            return true;
        }
        $hash = $_SESSION['pc_hash'];
        $pc_hash = $this->session->userdata('pc_hash');
        if ($pc_hash != '' && ($pc_hash == $hash)) {
            return true;
        }  else {
            showmessage('哈希校验失败，请重新登录', for_url('admin', 'index', 'login'));
        }
    }


}