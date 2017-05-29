<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 0:25
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Site_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getsiteinfo($name){
        $query = $this->db->get_where('site',array('name'=>$name));
        return $query->row_array();

    }
}


?>