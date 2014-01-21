<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 用户管理
 * Class User
 */
class User extends CI_Admin
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * ---------------------------------------------------
     * 用户管理
     * ---------------------------------------------------
     */
    public function user_list()
    {
        $this->load->bll('user_bll');
        //用户权限验证
        $page = $this->input->get_post('p');
        $rows = 20;
        $r['rows'] = $this->user_bll->get_user_list($page, $rows);
        $r['total'] = ceil( $this->user_bll->get_user_list_count() / $rows);

        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/user_list', $r);
        $this->view( '/admin/public/pager_footer');
    }

    public function user_add()
    {

        $user = array('user_id' => '', 'user_name' => '', 'password' => '', 'email' => '', 'enabled' => 1);
        $data['data'] = $user;
        $this->view( '/admin/public/pager_header');
        $this->view( '/admin/index/user_edit', $data);
        $this->view( '/admin/public/pager_footer');
    }

    public function user_edit($id = null)
    {
        $this->load->bll('user_bll');
        $user = $this->user_bll->get_user_by_id($id);
        if ($user) {
            $data['data'] = $user;
            $this->view( '/admin/public/pager_header');
            $this->view( '/admin/index/user_edit', $data);
            $this->view( '/admin/public/pager_footer');
        } else {
            showmessage('获取用户失败');
        }

    }

    public function user_save()
    {
        $this->load->bll('user_bll');
        $user = $this->input->post('user');
        if (empty($user['user_id'])) {
            if (empty($user['user_name']) || empty($user['password'])) {
                showmessage('用户名、密码不能为空');
            }
        } else {
            if (empty($user['user_name'])) {
                showmessage('用户名不能为空');
            }
        }

        if (empty($user['user_id'])) {
            $r = $this->user_bll->insert_user($user);
        } else {
            $r = $this->user_bll->save_user($user);
        }
        if ($r) {
            showmessage('用户保存成功',for_url('admin','user','user_edit', array($r)));
        } else {
            showmessage('用户保存失败');
        }
    }

    public function user_del($id = null)
    {
        $ids = $this->input->get_post('$ids');
        $this->load->bll('user_bll');
        if (!empty($id)) {
            $r = $this->user_bll->del_user($id);
        }
        if ($r) {
            showmessage('用户删除成功',for_url('admin','user','user_list'));
        } else {
            showmessage('用户删除失败');
        }
    }
}