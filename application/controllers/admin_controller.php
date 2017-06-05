<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/26
 * Time: 13:10
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class admin_controller extends base_controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('role_model');
        $this->load->model('article_model');
        $this->load->model('comment_model');
        $this->load->model('delrecord_model');

    }
    /*
     * 后台首页
     */
    public function index(){

        $user_flag=false;
        $data=array();
        //判断用户是否登陆
        $user_id=$_GET['user_id'];
        if($user_id===""){
            redirect();
            return;
        }
        if($this->isAdmin()===true){
            $this->load->view('admin/home',array('page'=>'index'));
        }else{
            redirect('home_controller/index');
        }
    }

    /*
     * 帖子管理（后台）
     */
    public function article(){

        $article_array=$this->article_model->get_all_article();
        $this->load->view('admin/article',array('arts'=>$article_array,'page'=>'article'));

    }

    public function detail_article(){

    }
    /*
     * 帖子管理（后台），删除帖子
     */
    public function del_article(){
        $article_id=$_GET['article_id'];
        $this->article_model->del_article($article_id);

        redirect('admin_controller/article');
    }

    /*
     * 审核
     */
    public function shenhe(){
        $article_id=$_GET['article_id'];
        $this->article_model->change_status(1,$article_id);
        redirect('admin_controller/article');
    }
    /*
     * 取消审核
     */
    public function cancel_shenhe(){
        $article_id=$_GET['article_id'];
        $this->article_model->change_status(0,$article_id);
        redirect('admin_controller/article');
    }

    /*
     * 用户列表（后台）
     */
    public function user_list(){
        $user_array=$this->user_model->get_all_user();
        $user_defaut=$user_array['0']->user_id;
        $user_name=$user_array['0']->name;
        $art_array=$this->article_model->getarticlebyuserid($user_defaut);

        $data=array(
            'username'=>$user_name,
            'users'=>$user_array,
            'arts'=>$art_array
        );

        //获取所有的admin
        $admin_array=$this->role_model->get_all_admin('admin');
        $data['admin_array']=$admin_array;
        $data['page']='user';

        $this->load->view('admin/user',$data);
    }

    /*
     * 改变用户状态（是不是管理员）
     */
    public function change_admin(){
        //判断是不是管理员
        if($this->isAdmin()===false){
            redirect('home_controller/index');
            return;
        }

        $user_id=$_GET['user_id'];
        $roles=$this->role_model->getrolebyuserid($user_id);

        //初始化为1表示管理员，当是管理员时，更改为0，不是管理员。这样实现了状态的切换
        $status=1;
        $role_id=0;
        foreach ($roles as $role){
            if($role['role']==='admin'){
                $status=0;
                $role_id=$role['role_id'];
            }
        }

        //当是管理员时，删除管理员对应的数据
        if($status===0){
            $this->role_model->del_userrole($role_id,$user_id);
        }elseif($status===1){
            //不是管理员，添加关系
            //获取admin的role_id
            $admin_id='admin';
            $role_array=$this->role_model->get_role_by_rolename($admin_id);
            $admin_id=$role_array['0']->role_id;
            $data=array(
                'userrole_id'=>$this->get_new_id(),
                'role_id'=>$admin_id,
                'user_id'=>$user_id
            );

            $this->role_model->add_userrole($data);
        }
        redirect('admin_controller/user_list');
    }

    /*
     * 删除用户
     */
    public function del_user(){
        $user_id=$_GET['user_id'];
        $this->user_model->del_user($user_id);

        redirect('admin_controller/user_list');
    }

    /*
     * 角色列表
     */
    public function role_list(){
        $role_array=$this->role_model->get_all_role();
        $this->load->view('admin/role',array('roles'=>$role_array,'page'=>'role'));

    }
    /*
     * 添加角色
     */
    public function add_role(){
        $role_id=md5(uniqid(mt_rand(), true));
        $data=array(
            'role_id'=>$role_id,
            'name'=>$_POST['name'],
            'role'=>$_POST['role']
        );
        $this->role_model->add_role($data);
        redirect('admin_controller/role_list');
    }

    public function del_role(){
        $role_id=$_GET['role_id'];
        $this->role_model->del_role($role_id);
        redirect('admin_controller/role_list');
    }

    /*
     * 删除帖子的记录
     */
    public function del_article_record(){

        $records=$this->delrecord_model->get_all_record();

        $this->load->view('admin/del_article_record',array('records'=>$records,'page'=>'record'));
    }



    /*
     * 帖子管理/用户管理（后台），审核状态更改
     */
    public function update_shenhe(){



    }

    /*
     * 后台判断是不是管理员
     */
    public function isAdmin(){
        $role=$_SESSION['role'];
        foreach ($role as $row){
            if($row['role']==='admin'){
                return true;
            }
        }
        return false;
    }

}
?>
