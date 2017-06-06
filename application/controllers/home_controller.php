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
        $prePageNum=3;
        if(@$_GET['page']===null){
            $requestPage=1;
        }else{
            $requestPage=$_GET['page'];
        }

        $result=$this->article_model->article_by_status(1,$requestPage,$prePageNum);
        $pageCount=$this->article_model->get_page_count();
        $data['result']=$result;
        $pageCount=ceil($pageCount/$prePageNum);
        $data['pageCount']=$pageCount;
        $data['currentPage']=$requestPage;
        $this->load->view('home',$data);
    }
}

?>