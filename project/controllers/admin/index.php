<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Admin
{
    protected $is_login = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ---------------------------------------------------
     * 视图
     * ---------------------------------------------------
     */
    function index()
    {
        parent::check_admin();
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');
        $data['pc_hash'] = $this->pc_hash;
        $data['tree_list'] = parent::admin_menu();
        $this->view('/admin/public/index', $data);
    }

    function home()
    {
        parent::check_admin();
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');

        $this->view('/admin/public/pager_header');
        $this->view('/admin/public/home', $data);
        $this->view('/admin/public/pager_footer');
    }

    /**
     * ---------------------------------------------------
     * 验证码
     * ---------------------------------------------------
     */
    function verify_image() {

        $conf['name'] = 'verify_code'; //作为配置参数
        $this->load->library('captcha', $conf);
        $this->captcha->show();
        $yzm_session = $_SESSION['verify_code'];
        echo $yzm_session;
    }

    /**
     * ---------------------------------------------------
     * 登陆 注销登陆 操作
     * ---------------------------------------------------
     */
    public function login()
    {
        $this->view('/admin/public/login');
    }

    function logout()
    {
        $this->load->bll('user_bll');
        $this->user_bll->logout();
        showmessage('登录退出，正在跳转……', for_url('admin', 'index', 'login'));
    }

    public function login_act()
    {
        $this->load->bll('user_bll');
        $user_name = $this->input->get_post('user_name');
        $password = $this->input->get_post('password');
        $verify_code = $this->input->get_post('verify_code');

        if (empty($verify_code) || empty($_SESSION['verify_code'])) {
            showmessage('验证码为空，请重试');
        }
        if (strcmp($verify_code, $_SESSION['verify_code']) !== 0) {
            $this->log->write_log('error', '登录失败_验证码不对[' . $user_name . ']');
            showmessage('验证码验证失败，请重试');
        }

        if (empty($user_name) || empty($password)) {
            $this->log->write_log('error', '登录失败_用户名密码空[' . $user_name . ']');
            showmessage('用户名、密码不能为空');
        }
        $r = $this->user_bll->login($user_name, $password);
        if (!$r) {
            $this->log->write_log('ERROR', '登录失败_用户名密码不对[' . $user_name . ']');
            showmessage('登录失败，请重新登录。');
        }
        $pc_hash = $this->session->userdata('pc_hash');
        showmessage('登录成功，正在跳转……', for_url('admin', 'index', 'index'));
    }


}