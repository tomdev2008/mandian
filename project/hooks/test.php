<?php
class test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pp()
    {
        echo 'hook here';
    }
}