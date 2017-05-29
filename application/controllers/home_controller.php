<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/23
 * Time: 23:49
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class home_controller extends base_controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');

    }

    //入口函数
    function index(){

        $result=$this->article_model->article_by_status(1);
        $site_name=$this->site_model->getsiteinfo('site_name');

        $data['result']=$result;
        $this->load->view('home',$data);
    }
}

?>