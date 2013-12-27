<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{

    var $module = 'demo';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /*$s = array(
            'name' => '123',
            'sex' => 'man'
        );
        $this->session->set_userdata($s);*/
        $p =  $this->session->all_userdata();
        var_dump($p);
    }

}