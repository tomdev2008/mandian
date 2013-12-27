<?php
/*
 * -------------------------------------------------------------------
 *  -- Codebox
 *  -- 根据ci改掉的，基本满足mvc、模块化、数据集合
 *
 * -------------------------------------------------------------------
 *  -- //目录
 *  |-- project     项目存放目录
 *      ├ cache     缓存文件
 *      ├ config    配置文件
 *      ├ hooks     钩子文件
 *      ├ logs      日志文件
 *      ├ models    模型文件位置
 *      └ modules   模块继承（系统全放这里）
 *  |-- system      系统运行主目录
 *      ├ core      核心类文件
 *      ├ database  数据库核心类， 已集成主流数据库
 *      ├ errors    错误模板
 *      ├ fonts     字体
 *      ├ helpers   帮助函数
 *      ├ language  语言提示选项
 *      └ library   帮助类
 *  |-- index.php
 *
 * -------------------------------------------------------------------
 */

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

define('ENVIRONMENT', 'development');
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            ini_set('display_errors',1);
            break;

        case 'testing':
        case 'production':
            error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}
$system_path = 'system';
$application_folder = 'project';

if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path) . '/';
}

$system_path = rtrim($system_path, '/') . '/';

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The PHP file extension
// this global constant is deprecated.
define('EXT', '.php');

define('DS', DIRECTORY_SEPARATOR);

define('ROOTPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the front controller (this file)
define('FCPATH', str_replace(SELF, '', __FILE__));

// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

// The path to the "application" folder
define('APPPATH', $application_folder . '/');

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 */
require_once BASEPATH . 'core/Codebox.php';