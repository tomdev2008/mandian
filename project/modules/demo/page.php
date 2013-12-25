<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{

    var $module = 'demo';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view($this->module.'/tpl/page');
    }

}