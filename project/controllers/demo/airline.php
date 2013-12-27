<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit(0);

class Airline extends CI_Controller
{

    var $module = 'demo';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $this->load->view($this->module . '/tpl/airline');
        /* $this->load->helper('curl');
         $this->load->helper('xml');
         $citys = $this->citys();
         $citys2 = $this->citys2();
         $citys = array_reverse($citys);
         $citys2 = array_reverse($citys2);
         foreach($citys as $c1){
             foreach($citys2 as $c2){
                 $url = 'http://www.feeye.com/feeye/Feeye/GNTicketSearch.asp?VoyageType=0&Departure='.$c1['enname'].'&Arrival='.$c2['enname'].'&DepartureDate=2013-11-27&CarrierCode=&Tue%20Nov%2026%202013%2017:30:25%20GMT+0800%20(%E4%B8%AD%E5%9B%BD%E6%A0%87%E5%87%86%E6%97%B6%E9%97%B4)';
                 $lines = trim(_curl($url));
                 if(!empty($lines)){
                     echo xml_convert($lines);
                     exit;
                 }
             }
         }*/

    }

    public function citys()
    {
        $query = $this->db->query('SELECT * FROM city WHERE type = 0');
        $citys = $query->result_array();
        return $citys;
    }

    public function citys2()
    {
        $query = $this->db->query('SELECT * FROM city WHERE type = 1');
        $citys = $query->result_array();
        return $citys;
    }

    public function get_lines()
    {
        $page = $this->input->post('page');
        $rows = $this->input->post('rows');
        $citys['rows'] = $this->lines($page, $rows);
        $citys['total'] = $this->lines_count();
        exit(json_encode($citys));
    }

    public function lines($page = 1, $rows = 25)
    {
        $start = ($page - 1) * $rows;
        $sql = 'select l.Airline,l.FlightNo,c1.cnname  as dCity,l.DepartureTime,c2.cnname as aCity,l.ArrivalTime,l.PlaneType,l.AirportTax,l.FuelTax from `lines` l
                left join city c1
                on c1.enname = l.Departure
                left join city c2
                on c2.enname = l.Arrival
                where c1.type <> 2 and  c2.type <> 2 limit  ' . $start . ',' . $rows;
        $query = $this->db->query($sql);
        $citys = $query->result_array();
        return $citys;
    }
    public function lines_count($page = 1, $rows = 25)
    {
        $start = ($page - 1) * $rows;
        $sql = 'select l.* from `lines` l
                left join city c1
                on c1.enname = l.Departure
                left join city c2
                on c2.enname = l.Arrival
                where c1.type <> 2 and  c2.type <> 2 ';
        $query = $this->db->query($sql);
        $citys = $query->num_rows();
        return $citys;
    }


}

function ex_iconv($inCharset, $outCharset, $strArr)
{
    if (is_array($strArr)) {
        $returnArr = array();
        foreach ($strArr as $key => $str) {
            $returnArr[$key] = ex_iconv($inCharset, $outCharset, $str);
        }
        return $returnArr;
    } else {
        return iconv($inCharset, $outCharset, $strArr);
    }
}

