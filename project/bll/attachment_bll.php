<?php

/**
 * Class Attachment_bll
 */
class Attachment_bll extends CI_Bll
{
    /**
     * ------------------------------
     * 服务器路径
     * ------------------------------
     */
    protected $_path = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('attachment_model');

        $_path = ROOTPATH . '/uploads/';
        $time = time();
        $_path .= date('Ym', $time) . '/';
        if (!file_exists($_path)) {
            mkdir($_path);
        }
        $this->_path = '/uploads/' . date('Ym', $time) . '/';
        $config['upload_path'] = $_path;
        $config['allowed_types'] = '*';
        $config['max_size'] = '2000';
        $this->load->library('upload', $config);
    }

    /**
     * ------------------------------
     * flash组件上传 下载操作
     * @param $is_submit
     * ------------------------------
     */
    function upload_file()
    {
        if (!$this->upload->do_upload()) {
            $result = array(
                'state' => false,
                'error' => $this->upload->display_errors()
            );
        } else {
            $result = array(
                'state' => true,
                'upload_data' => $this->upload->data()
            );
            $result['upload_data']['url_path'] = $this->_path;
        }
        return $result;
    }

    function download_file()
    {

    }

    /**
     * ------------------------------
     * 图片管理
     * @param array $post
     * @return mixed
     * ------------------------------
     */
    function insert_img($post = array())
    {
        $data = array(
            'img_url' => $post['file_name'],
            'upload_time' => time(),
        );
        return $this->attachment_model->insert_img($data);
    }

    function get_img_list($page = null, $rows = null)
    {
        return $this->attachment_model->get_img_list($page, $rows);
    }

    function get_img_list_count()
    {
        return $this->attachment_model->get_img_list_count();
    }

    function get_img($id = null)
    {
        return $this->attachment_model->get_img($id);
    }


}