<?php

/**
 * 用户表业务逻辑层
 * User: Administrator
 * Date: 13-12-16
 * Time: 下午3:35
 */
class System_bll extends CI_Bll
{


    function __construct()
    {
        parent::__construct();
        //加载用户模型
        $this->load->model('system_model');
        $this->_model = $this->system_model;
    }

    /**
     * 站点设置
     */
    function get_site_setting()
    {
        return $this->_model->get_site_setting();
    }

    function set_site_setting($post = array())
    {
        $this->_model->del_site_setting();
        return $this->_model->set_site_setting($post);
    }

    function site_setting_cache()
    {
        if (!defined('ENVIRONMENT') OR !file_exists($file_path = APPPATH . 'config/' . ENVIRONMENT . '/config.php')) {
            $file_path = APPPATH . 'config/config.php';
        }
        $config_content = str_replace('<?php', '', read_file($file_path));
        $config = array();
        eval($config_content);
        if (!$config) {
            return false;
        }

        $setting = $this->system_bll->get_site_setting();
        foreach ($setting as $key => $val) {
            $config[$key] = $val;
        }
        $config_str = "<?php\r\n\$config = " . var_export($config, true) . ";";
        if (write_file($file_path, $config_str)) {
            return true;
        } else {
            return false;
        }
    }

    function get_sys_by_role_id($role_id = null)
    {
        $role_id = intval($role_id);
        if (empty($role_id)) {
            return false;
        }

        $r = $this->_model->get_system_by_role_id($role_id);
        $result = array();
        foreach ($r as $val) {
            $result[] = $val['sr_sys_id'];
        }
        return $result;
    }

    function get_sys_by_action($m = null, $c = null, $a = null)
    {

        $r = $this->_model->get_sys_by_action($m, $c, $a);
        $result = array();
        foreach ($r as $act) {
            $result[] = $act['sys_id'];
        }
        return $result;
    }

    function get_backup_list()
    {
        $sql_path = ROOTPATH . 'temp' . DS . 'sqldump' . DS;
        $this->load->helper('directory');
        return directory_map($sql_path);
    }

    function restore_back($sql)
    {
        $db = $this->_model->get_db();
        $this->load->library('sqldump', array('db' => $db, 'max_size' => 0));

        $sql_path = ROOTPATH . 'temp' . DS . 'sqldump' . DS . $sql;
        if (!file_exists($sql_path)) {
            return false;
        }
        $sql_str = @file_get_contents($sql_path);
        $r = $this->sqldump->sql_import($sql_str);
        if (!$r) {
            show_message($this->sqldump->error_msg);
        }
        return true;
    }

    /**
     * 数据库备份
     */
    function backup($dump = array())
    {
        $path = ROOTPATH . 'temp' . DS . 'sqldump';
        if (!is_dir($path)) {
            mkdir($path);
            chmod($path, 0777);
        }

        /* 设置最长执行时间为5分钟 */
        @set_time_limit(300);

        $db = $this->_model->get_db();

        /* 初始化 */
        $this->load->library('sqldump', array('db' => $db, 'max_size' => 0));
        $run_log = ROOTPATH . '/temp/log/run.log';

        /* 初始化输入变量 */
        if (empty($dump['name'])) {
            $sql_file_name = $this->sqldump->get_random_name();
        } else {
            $sql_file_name = str_replace("0xa", '', trim($dump['name'])); // 过滤 0xa 非法字符
            $pos = strpos($sql_file_name, '.sql');
            if ($pos !== false) {
                $sql_file_name = substr($sql_file_name, 0, $pos);
            }
        }

        $max_size = empty($dump['length']) ? 0 : intval($dump['length']);
        $vol = empty($dump['vol']) ? 1 : intval($dump['vol']);
        $is_short = empty($dump['extend']) ? false : true;

        $this->sqldump->is_short = $is_short;

        /* 变量验证 */
        $allow_max_size = intval(@ini_get('upload_max_filesize')); //单位M
        if ($allow_max_size > 0 && $max_size > ($allow_max_size * 1024)) {
            $max_size = $allow_max_size * 1024; //单位K
        }

        if ($max_size > 0) {
            $this->sqldump->max_size = $max_size * 1024;
        }

        /* 获取要备份数据列表 */
        $type = empty($_POST['type']) ? 'full' : trim($_POST['type']);
        $tables = array();

        switch ($type) {
            case 'full':
                $temp = $this->_model->get_all_table();
                foreach ($temp AS $table) {
                    $tables[$table] = -1;
                }

                $this->sqldump->put_tables_list($run_log, $tables);
                break;
        }

        /* 开始备份 */
        $tables = $this->sqldump->dump_table($run_log, $vol);

        if ($tables === false) {
            die($this->sqldump->errorMsg());
        }

        if (empty($tables)) {
            /* 备份结束 */
            if ($vol > 1) {
                /* 有多个文件 */
                if (!@file_put_contents(ROOTPATH . 'temp' . DS . 'sqldump' . DS . $sql_file_name . '_' . $vol . '.sql', $this->sqldump->dump_sql)) {
                    show_message('备份数据库失败');
                }
            } else {
                /* 只有一个文件 */
                if (!@file_put_contents(ROOTPATH . 'temp' . DS . 'sqldump' . DS . $sql_file_name . '.sql', $this->sqldump->dump_sql)) {
                    show_message('备份数据库失败');
                }
            }

        }
    }

    /**
     * 权限编辑啊
     * @param null $sys
     * @param null $role_id
     * @return bool
     */
    function system_role_edit($sys = null, $role_id = null)
    {
        $role_id = intval($role_id);
        if (empty($role_id) || empty($sys)) {
            return false;
        }

        //清空权限
        if (!($this->_model->del_system_role($role_id))) {
            return false;
        }

        //新建权限
        foreach ($sys as $sys_id) {
            $r = $this->_model->insert_system_role(array('role_id' => $role_id, 'sys_id' => $sys_id));
            if (!$r) {
                return false;
            }
        }
        return true;

    }

    /**
     * 获取用户数据
     * @param int $page
     * @param int $rows
     * @return mixed
     */
    function get_system_list($params = array(), $page = null, $rows = null)
    {
        return $this->_model->get_system_list($params, $page, $rows);
    }

    /**
     * 获取树形菜单
     * @param array $params
     * @param null $page
     * @param null $rows
     * @return array
     */
    function get_nav_tree_list($params = array(), $page = null, $rows = null)
    {
        $r = $this->get_system_list($params, $page, $rows);
        $result = array();
        $result_sub = array();
        foreach ($r as $val) {
            if (intval($val['sys_parent_id']) === 0) {
                $result[$val['sys_id']] = array(
                    'id' => $val['sys_id'],
                    'text' => $val['sys_name'],
                    'children' => array(),
                    "state" => "closed"
                );
            } else {
                $result_sub[$val['sys_parent_id']][] = array(
                    'id' => $val['sys_id'],
                    'text' => $val['sys_name'],
                    'attributes' => array(
                        'url' => $val['sys_module'] . '/' . $val['sys_controller'] . '/' . $val['sys_action'],
                    )
                );
            }
        }
        $r = array();
        foreach ($result as $key => $val) {
            if (isset($result_sub[$key])) {
                $val['children'] = $result_sub[$key];
            }
            $r[] = $val;
        }
        return $r;
    }

    /**
     * 获取树形菜单
     * @param array $params
     * @param null $page
     * @param null $rows
     * @return array
     */
    function get_system_tree_list($params = array(), $page = null, $rows = null)
    {
        $r = $this->get_system_list($params, $page, $rows);
        $result = array();
        $result_sub = array();
        foreach ($r as $val) {
            if (intval($val['sys_parent_id']) === 0) {
                $result[$val['sys_id']] = array(
                    'sys_id' => $val['sys_id'],
                    'sys_name' => $val['sys_name'],
                    'sys_module' => $val['sys_module'],
                    'sys_controller' => $val['sys_controller'],
                    'sys_action' => $val['sys_action'],
                    'enabled' => $val['enabled'],
                    'visiabled' => $val['visiabled'],
                    'sys_order_id' => $val['sys_order_id'],
                    'children' => array(),
                    "state" => "closed"
                );
            } else {
                $result_sub[$val['sys_parent_id']][] = array(
                    'sys_id' => $val['sys_id'],
                    'sys_name' => $val['sys_name'],
                    'sys_module' => $val['sys_module'],
                    'sys_controller' => $val['sys_controller'],
                    'sys_action' => $val['sys_action'],
                    'sys_order_id' => $val['sys_order_id'],
                    'enabled' => $val['enabled'],
                    'visiabled' => $val['visiabled'],
                );
            }
        }
        $r = array();
        foreach ($result as $key => $val) {
            if (isset($result_sub[$key])) {
                $val['children'] = $result_sub[$key];
            }
            $r[] = $val;
        }
        return $r;
    }

    function get_system_list_count()
    {
        return $this->_model->get_system_list_count();
    }

    function get_system_by_id($id = null)
    {
        return $this->_model->get_system_by_id($id);
    }

    function insert_system($post = array())
    {
        return $this->_model->insert_system($post);
    }

    function save_system($post = array())
    {
        return $this->_model->save_system($post);
    }

    public function del_system($id = null)
    {
        return $this->_model->del_system($id);
    }

    /**
     * 获取系统日志
     */
    function get_log_list($page = 1, $rows = 20, $date = null)
    {
        $date = empty($date) ? date('Y-m-d', time()) : $date;
        $log_path = ROOTPATH . 'temp/log/log-' . $date . '.php';
        if (!file_exists($log_path)) {
            return array();
        }
        $offset = ($page - 1) * $rows;
        $data = array();
        include($log_path);
        $data = array_slice($data['ERROR'], $offset, $rows);
        return $data;
    }

    function get_log_list_count($date = null)
    {
        $date = empty($date) ? date('Y-m-d', time()) : $date;
        $log_path = ROOTPATH . 'temp/log/log-' . $date . '.php';
        if (!file_exists($log_path)) {
            return 0;
        }
        $data = array();
        @include($log_path);
        return count($data['ERROR']);
    }

    function system_log_clear()
    {
        $this->load->helper('file');
        $log_path = ROOTPATH . 'temp/log/';
        return delete_files($log_path);
    }

}