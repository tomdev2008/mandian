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
                $id = $this->attachment_bll->insert_img($json['upload_data']);
                $json['img_id'] = $id;
            }
            $json = $this->json->encode($json);
            exit($json);
        }
        $data['_callback'] = $this->input->get_post('_callback');
        $data['_t'] = 'swf';
        $this->view('/admin/attachment/header', $data);
        $this->view('/admin/attachment/swfupload');
    }

    function db_list()
    {
        //用户权限验证
        $page = intval($this->input->get_post('p'));
        $rows = 6;
        $r['rows'] = $this->attachment_bll->get_img_list($page, $rows);
        $r['total'] = ceil( $this->attachment_bll->get_img_list_count() / $rows);
        $data['_callback'] = $this->input->get_post('_callback');
        $data['_t'] = 'db';
        $this->view('/admin/attachment/header', $data);
        $this->view('/admin/attachment/db_list', $r);
    }

    function direct_list()
    {

    }

    function get_img()
    {
        $id = intval($this->input->get_post('id'));
        $json = $this->attachment_bll->get_img($id);
        $json['state'] = empty($json) ? false : true ;
        $json['path'] = img_url($json['img_url'],$json['upload_time']);
        $json = $this->json->encode($json);
        exit($json);
    }


}