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
    function index(){
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');
        $this->view('/admin/public/index',$data);
    }
    function home(){
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');
        $this->view('/admin/public/home',$data);
    }
    function top(){
        $data['user_name'] = $this->session->userdata('user_name');
        $data['role_name'] = $this->session->userdata('role_name');
        $this->view('/admin/public/top',$data);
    }
    function left(){
        $this->view('/admin/public/left');
    }


    /**
     * ---------------------------------------------------
     * 登陆 注销登陆 操作
     * ---------------------------------------------------
     */
    public function login()
    {
        $this->view();
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
        if (empty($user_name) || empty($password)) {
            showmessage('用户名、密码不能为空');
        }
        $r = $this->user_bll->login($user_name, $password);
        if (!$r) {
            showmessage('登录失败，请重新登录。');
        }
        showmessage('登录成功，正在跳转……', for_url('admin', 'index', 'index'));
    }
}