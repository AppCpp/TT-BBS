<?php
/**
 * Created by PhpStorm.
 * User: arter
 * Date: 2017/5/24
 * Time: 15:52
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class user_controller extends base_controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('role_model');
        $this->load->helper('security');
    }
    /*
     * 登陆界面
     */
    public function index(){
        $this->load->view('login');

    }
    /*
     * 登陆验证
     */
    public function login ()
    {
        //$this->load->view('test');

        $password = $_POST['password'];
        $loginname = $_POST['email'];

        $password = do_hash($password).''.do_hash($loginname);

        if ($this->user_model->getUserAndPsd($password, $loginname) === TRUE) {
            $msg = 'success';
            $user = $this->session->userdata('user');
            //根据用户的id查找用户拥有的角色
            $role=$this->role_model->getrolebyuserid($user['0']['user_id']);

            $this->session->set_userdata('role',$role);


            redirect();
        } else {
            $msg = 'error';
            $data['msg']=$msg;


            $this->load->view('login',$data);

        }
    }

    public function info(){
        $userid=$_GET['user_id'];
        //判断用户是否登陆
        if($userid===""){
            redirect('user_controller/index');
            return;
        }

        $this->load->view('myinfo');

    }
    /*
     * 更改用户信息
     */
    public function update(){

        $data=array(
            'user_id'=>$_POST['user_id'],
            'name'=>$_POST['name'],
            'loginname'=>$_POST['loginname'],
            'email'=>$_POST['email'],
            'password'=>md5($_POST['pwd'])
        );
        $this->user_model->updateuser($data);

        unset($data['password']);
        $user=array(
            $data
        );
        $this->session->set_userdata('user',$user);
        $user_id=$this->session->userdata('user')['0']['user_id'];
        redirect('user_controller/info?user_id='.$user_id);
    }
    /*
     * 注册
     */
    public function go_register(){
        $this->load->view('register');
    }
    public function register(){
        $user_id=md5(uniqid(mt_rand(), true));
        //判断用户名是否存在
        $loginname=$_POST['loginname'];

        /*loginname_is_exist作用
         * 判断用户名是否存在（注册）
         * 存在返回false
         * 不存在返回true
         */
        if($this->user_model->loginname_is_exist($loginname)===false){
            $msg=array(
                'name'=>$_POST['name'],
                'loginname'=>$_POST['loginname'],
                'password'=>$_POST['pwd'],
                'email'=>$_POST['email'],
                'msg'=>'loginname_exist'
            );
            redirect('user_controller/go_register',$msg);
            return;
        }else{
            $data=array(
                'user_id'=>$user_id,
                'name'=>$_POST['name'],
                'loginname'=>$_POST['loginname'],
                'password'=>do_hash($_POST['pwd']).''.do_hash($_POST['loginname']),
                'email'=>$_POST['email']
            );
            $this->user_model->register($data);
            redirect('user_controller/index');
            return;
        }


    }


    /*
     * 退出登陆
     */
    public function loginout(){
        $this->session->sess_destroy();
        redirect('user_controller/index');
        //$this->load->view('login');
        return;
    }

}

?>