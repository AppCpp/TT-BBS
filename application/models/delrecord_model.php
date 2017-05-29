<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/27
 * Time: 19:25
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class delrecord_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 获取所有的发帖记录，根据删除时间排序
     */
    public function get_all_record(){
        $this->db->order_by('deltime');
        return $this->db->get('del')->result();
    }
}

?>