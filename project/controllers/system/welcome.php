<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
        $this->load->bll('user_bll');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->view('/user/user_login');
    }

    function logout(){
        $this->user_bll->logout();
        show_message('登录退出，正在跳转……', '登陆页', for_url('system','welcome', 'index') );
    }

    public function login_act()
    {
        $user_name = $this->input->get_post('user_name');
        $password = $this->input->get_post('password');
        if (empty($user_name) || empty($password)) {
            show_message('用户名、密码不能为空');
        }
        $r = $this->user_bll->login($user_name, $password);
        if(!$r){
            show_message('登录失败，请重新登录。');
        }
        show_message('登录成功，正在跳转……', '进入工作台', for_url('system','user', 'user_list') );
    }
}