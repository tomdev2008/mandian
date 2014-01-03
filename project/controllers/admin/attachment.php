<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Attachment extends CI_Admin
{
    protected $is_login = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->bll('attachment_bll');
        $this->load->library('json');
    }

    function index()
    {
        $this->view('/admin/public/swfupload');
    }

    /**
     * ------------------------------
     * flash组件上传
     * @param $is_submit
     * ------------------------------
     */
    function swfupload($is_submit)
    {
        if ($is_submit) {
            $json = $this->attachment_bll->upload_file();
            if ($json['state']) {
                $this->attachment_bll->insert_img($json['upload_data']);
            }
            $json = $this->json->encode($json);
            exit($json);
        }
        $this->view('/admin/attachment/swfupload');
    }

    function db_list()
    {
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 6;
        $r['rows'] = $this->attachment_bll->get_img_list($page, $rows);
        $r['total'] = ceil( $this->attachment_bll->get_img_list_count() / $rows);
        $this->view('/admin/attachment/db_list', $r);
    }

    function direct_list()
    {

    }


}