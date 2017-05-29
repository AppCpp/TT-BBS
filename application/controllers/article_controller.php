<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class article_controller extends base_controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('comment_model');

    }

    /*
     * 文章详情
     */
    public function detail(){
        $articleid=$_GET['article_id'];
        $article_datail=$this->article_model->get_article_byid($articleid);
        $article_comment=$this->comment_model->get_comment_by_articleid($articleid);

        $data=array(
            'article_datail'=>$article_datail,
            'article_comment'=>$article_comment
        );

        $this->load->view('article_detail',$data);

    }
    /*
     * 我的文章
     */
    public function myarticle(){
        $userid=$_GET['user_id'];
        //判断用户是否登陆
        if($userid===""){
            redirect('user_controller/index');
            return;
        }
        $myart=$this->article_model->getarticlebyuserid($userid);
        $data['result']=$myart;
        $this->load->view('myarticle',$data);
    }

    /*
     * 对帖子发表评论
     */
    public function add_comment(){
        $art_id=$_POST['article_id'];
        //根据article_id获取这个帖子现在的最高楼层

        $floor=$this->comment_model->get_top_floor($art_id)+1;

        $user_id=$this->session->userdata('user')['0']['user_id'];
        $user_name=$this->session->userdata('user')['0']['name'];

        $data=array(
          'comment_id' =>$this->get_new_id(),
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'comment_text'=>$_POST['comment'],
            'createtime'=>$this->get_time(),
            'article_id'=>$_POST['article_id'],
            'floor'=>$floor
        );

        $this->comment_model->add_comment($data);
        redirect('home_controller/index');

    }

    /*
     * 发帖
     */
    public function add_article(){
        $user_id=$this->session->userdata('user')['0']['user_id'];
        $user_name=$this->session->userdata('user')['0']['name'];

        $data=array(
            'article_id'=>$this->get_new_id(),
            'title'=>$_POST['title'],
            'kind'=>$_POST['kind'],
            'content'=>$_POST['content'],
            'shenhe'=>0,
            'createuser'=>$user_name,
            'user_id'=>$user_id,
            'createtime'=>$this->get_time()
        );
        $this->article_model->add_article($data);
        redirect('home_controller/index');
    }
}

?>

