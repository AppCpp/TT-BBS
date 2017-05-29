<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 13:15
 */
class base_controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('site_model');
        $this->load->helper('date');

        $result=$this->site_model->getsiteinfo('site_name');
        $data['site_name']=$result['VALUE'];

        $result=$this->site_model->getsiteinfo('site_home');
        $data['site_home']=$result['VALUE'];

        //全局输出
        $this->load->vars($data);
    }
    /*
     * 时间
     */
    public function get_time(){
        date_default_timezone_set('PRC');
        return date('Y-m-d H:i:s');
    }
    public function get_new_id(){
        return md5(uniqid(mt_rand(), true));
    }
}

?>